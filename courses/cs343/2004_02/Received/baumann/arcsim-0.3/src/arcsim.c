/*
 * arcsim.h - ARC Simulator
 *
 * Copyright (C) 2004  Richard Baumann
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

/* screw portability to non-glibc systems... I like getline and asprintf */
#define _GNU_SOURCE

#include <stdbool.h>
#include <stdlib.h>
#include <stddef.h>
#include <string.h>
#include <stdio.h>
#include "arcsim_private.h"
#include "values.h"

#ifdef	__cplusplus
extern	"C" {
#endif

arcsim *
arcsim_init(void)
{
	arcsim *self;
	int     i;

	/* allocate */
	self = (arcsim *)malloc(sizeof(arcsim));
	if(self == NULL)
	{
		perror("Initialization Failure");
		return NULL;
	}

	/* initialize memory */
	self->_memory = arcsim_memory_init();
	if(self->_memory == NULL)
	{
		perror("Initialization Failure");
		free(self);
		return NULL;
	}

	/* initialize cpu */
	self->_cpu = arcsim_processor_init(self->_memory);
	if(self->_cpu == NULL)
	{
		perror("Initialization Failure");
		arcsim_memory_free(self->_memory);
		free(self);
		return NULL;
	}

	/* initialize the commands index */
	self->_index = arcsim_index_init();
	if(self->_index == NULL)
	{
		perror("Initialization Failure");
		arcsim_processor_free(self->_cpu);
		arcsim_memory_free(self->_memory);
		free(self);
		return NULL;
	}

	/* register the command information with the information index */
	for(i = 0; i < arcsim_index_info_list_length; ++i)
	{
		if(!arcsim_index_register(self->_index, &(arcsim_index_info_list[i])))
		{
			perror("Initialization Failure");
			arcsim_index_free(self->_index);
			arcsim_processor_free(self->_cpu);
			arcsim_memory_free(self->_memory);
			free(self);
			return NULL;
		}
	}

	/* null data to be free'd */
	self->_free_me = NULL;

	/* return the new simulator */
	return self;
}

void
arcsim_main(arcsim *self)
{
	char            *buf;
	char            *ptr;
	char            *name;
	char           **argv;
	int              argc;
	size_t           buflen;
	size_t           arglen;
	arcsim_command   cmd;

	/* allocate line buffer */
	buflen = 512;
	buf = (char *)malloc(buflen);
	if(buf == NULL)
	{
		/* deallocate */
		arcsim_free(self);

		/* report error and exit */
		perror("Initialization Failure");
		exit(1);
	}

	/* allocate argument buffer */
	arglen = 256;
	argv = (char **)malloc(arglen);
	if(argv == NULL)
	{
		/* deallocate */
		arcsim_free(self);
		free(buf);

		/* report error and exit */
		perror("Initialization Failure");
		exit(1);
	}

	/* main simulator loop */
	while(true)
	{
		/* present command prompt */
		printf("arcsim: ");

		/* read command line */
		if(getline(&buf, &buflen, stdin) == -1)
		{
			/* deallocate */
			arcsim_free(self);
			free(buf);
			free(argv);

			/* report an error if there is one, and exit */
			if(feof(stdin)) { exit(0); }
			perror("IO Failure");
			exit(1);
		}

		/* read the command name from the line */
		name = strtok_r(buf, " \t\n\r", &ptr);
		if(name == NULL) { continue; }

		/* read the arguments from the line */
		argc = -1;
		do
		{
			if(++argc >= (int)arglen)
			{
				char **tmp;
				tmp = (char **)realloc(argv, arglen*2);
				if(tmp == NULL)
				{
					perror("Command Failure");
					arcsim_free(self);
					free(buf);
					free(argv);
					exit(1);
				}
				arglen *= 2;
				argv = tmp;
			}
			argv[argc] = strtok_r(NULL, " \t\n\r", &ptr);
		}
		while(argv[argc] != NULL);

		/* look up the command */
		cmd = arcsim_lookup_command(self, name);

		/* execute the command if found, otherwise report an error */
		if(cmd == NULL)
		{
			fprintf(stderr, "Unknown Command: %s\n", name);
		}
		else
		{
			self->_free_me = argv;
			(*cmd)(self, argc, argv);
			self->_free_me = NULL;
		}
	}

	/* deallocate - we should never get here, but just in case */
	free(buf);
}

void
arcsim_free(arcsim *self)
{
	/* free the simulator data */
	arcsim_memory_free(self->_memory);
	arcsim_index_free(self->_index);
	if(self->_free_me != NULL)
	{
		free(self->_free_me);
		self->_free_me = NULL;
	}
	self->_memory = NULL;
	self->_index = NULL;

	/* free the simulator */
	free(self);
}

static void
arcsim_command_help(arcsim *self, int argc, char *argv[])
{
	arcsim_help_info *info;

	/* print help information based on arguments */
	if(argc == 0)
	{
		int i;

		for(i = 0; i < arcsim_command_info_list_length; ++i)
		{
			info = &((arcsim_command_info_list[i])._help);
			printf("%s\n\t%s\n", info->_name, info->_message);
		}
	}
	else
	{
		info = arcsim_lookup_help(self, argv[0]);
		if(info == NULL)
		{
			fprintf(stderr, "Unknown Command: %s\n", argv[0]);
			info = &((arcsim_command_info_list[INDEX_help])._help);
			fprintf(stderr, info->_usage);
		}
		else
		{
			printf(info->_usage);
		}
	}
}

static void
arcsim_command_load(arcsim *self, int argc, char *argv[])
{
	char              *buf;
	int                i;
	size_t             len;

	/* allocate */
	len = 512;
	buf = malloc(len);
	if(buf == NULL)
	{
		perror("Load Failure");
		arcsim_free(self);
		exit(1);
	}

	/* read all the files into memory */
	for(i = 0; i < argc; ++i)
	{
		FILE   *f;
		char   *ptr;
		bool    success;
		uint32  address;
		uint32  value;
		uint32  highest;
		uint32  lowest;
		uint32  count;

		/* attempt to open the file */
		f = fopen(argv[i], "r");
		if(f == NULL)
		{
			/* report the error */
			if(asprintf(&ptr, "Load Failure (%s)", argv[i]) < 0)
			{
				perror(argv[i]);
			}
			else
			{
				perror(ptr);
			}
			continue;
		}

		/* load the file into memory */
		success = true;
		highest = 0x00000000;
		lowest = 0xFFFFFFFF;
		count = 0;
		while(true)
		{
			/* attempt to read a line */
			if(getline(&buf, &len, f) == -1)
			{
				if(!feof(f))
				{
					/* report the error */
					if(asprintf(&ptr, "Load Failure (%s)", argv[i]) < 0)
					{
						perror(argv[i]);
					}
					else
					{
						perror(ptr);
					}
					success = false;
				}
				break;
			}

			/* parse the address and value */
			address = (uint32)strtoul(buf, &ptr, 16);
			value = (uint32)strtoul(ptr, NULL, 16);

			/* update the output data (min, max, and count) */
			if(address > highest) { highest = address; }
			if(address < lowest) { lowest = address; }
			++count;

			/* attempt to perform the write operation */
			if(!arcsim_memory_write(self->_memory, address, value))
			{
				/* deallocate */
				free(buf);

				/* free simulator and exit with failure */
				arcsim_free(self);
				exit(1);
			}
		}

		/* report success */
		if(success)
		{
			printf
				("Load Successful (%s): %d words loaded into MEM[%08X] - MEM[%08X]\n",
				 argv[i], count, lowest, highest);
		}

		/* attempt to close the file */
		if(fclose(f)) { perror(argv[i]); }
	}

	/* deallocate */
	free(buf);
}

static void
arcsim_command_memory(arcsim *self, int argc, char *argv[])
{
	uint32 first;
	uint32 last;

	/* get the addresses from the arguments */
	if(argc == 1)
	{
		first = (uint32)strtoul(argv[0], NULL, 16);
		last = first;
	}
	else if(argc == 2)
	{
		first = (uint32)strtoul(argv[0], NULL, 16);
		last = (uint32)strtoul(argv[1], NULL, 16);
	}
	else
	{
		arcsim_help_info *info;

		/* print the usage information and return */
		info = &((arcsim_command_info_list[INDEX_memory])._help);
		fprintf(stderr, info->_usage);
		return;
	}

	/* print the values in memory for the given range of addresses */
	arcsim_memory_print(self->_memory, first, last);
}

static void
arcsim_command_pc(arcsim *self, int argc, char *argv[])
{
	if(argc == 1)
	{
		uint32 value;

		/* parse the value */
		value = (uint32)strtoul(argv[0], NULL, 16);

		/* set the pc */
		arcsim_processor_setpc(self->_cpu, value);
	}
	else
	{
		arcsim_help_info *info;

		/* print the usage information */
		info = &((arcsim_command_info_list[INDEX_pc])._help);
		fprintf(stderr, info->_usage);
	}
}

static void
arcsim_command_quit(arcsim *self, int argc, char *argv[])
{
	/* keep the compiler quiet */
	argc = 0;
	argv = NULL;

	/* print cycle data */
	arcsim_processor_print_cycles(self->_cpu);

	/* shutdown simulator and exit */
	arcsim_free(self);
	exit(0);
}

static void
arcsim_command_register(arcsim *self, int argc, char *argv[])
{
	uint32 first;
	uint32 last;

	if(argc == 1)
	{
		/* parse the register number */
		first = (uint32)strtoul(argv[0], NULL, 0);

		/* print the register */
		arcsim_processor_print_regs(self->_cpu, first, first);
	}
	else if(argc == 2)
	{
		/* parse the register numbers */
		first = (uint32)strtoul(argv[0], NULL, 0);
		last = (uint32)strtoul(argv[1], NULL, 0);

		/* print the registers */
		arcsim_processor_print_regs(self->_cpu, first, last);
	}
	else
	{
		arcsim_help_info *info;

		/* print the usage information */
		info = &((arcsim_command_info_list[INDEX_register])._help);
		fprintf(stderr, info->_usage);
	}
}

static void
arcsim_command_run(arcsim *self, int argc, char *argv[])
{
	bool halt;

	/* keep the compiler quiet */
	argc = 0;
	argv = NULL;

	/* run until a halt instruction */
	halt = false;
	while(!halt)
	{
		/* execute an instruction and exit the simulator on a fatal error */
		if(!arcsim_processor_major(self->_cpu, &halt))
		{
			arcsim_free(self);
			exit(0);
		}
	}
}

static void
arcsim_command_step(arcsim *self, int argc, char *argv[])
{
	bool halt;

	/* keep the compiler quiet */
	argc = 0;
	argv = NULL;

	/* execute an instruction and exit the simulator on a fatal error */
	if(!arcsim_processor_major(self->_cpu, &halt))
	{
		arcsim_free(self);
		exit(0);
	}
}

static arcsim_command
arcsim_lookup_command(arcsim *self, char *name)
{
	arcsim_index_info *info;

	/* lookup the index information */
	info = arcsim_index_lookup(self->_index, name);
	if(info == NULL) { return NULL; }

	/* return the command from the command information list */
	return (arcsim_command_info_list[info->data])._func;
}

static arcsim_help_info *
arcsim_lookup_help(arcsim *self, char *name)
{
	arcsim_index_info *info;

	/* lookup the index information */
	info = arcsim_index_lookup(self->_index, name);
	if(info == NULL) { return NULL; }

	/* return the help information from the command information list */
	return &((arcsim_command_info_list[info->data])._help);
}

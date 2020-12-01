/*
 * arcsim_private.h - ARC Simulator
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

#ifndef	_ARC_SIMULATOR_PRIVATE_H
#define	_ARC_SIMULATOR_PRIVATE_H

#include "arcsim.h"
#include "memory.h"
#include "processor.h"
#include "index.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* structure of an arc simulator */
struct _tag_arcsim
{
	arcsim_processor *_cpu;
	arcsim_memory    *_memory;
	arcsim_index     *_index;
	void             *_free_me;
};

/* arc simulator command function prototype */
typedef void (*arcsim_command) (arcsim *self, int argc, char *argv[]);

/* structure of arc simulator help information */
typedef struct _tag_arcsim_help_info arcsim_help_info;
struct _tag_arcsim_help_info
{
	const char *_name;
	const char *_message;
	const char *_usage;
};

/* structure of arc simulator command information */
typedef struct _tag_arcsim_command_info arcsim_command_info;
struct _tag_arcsim_command_info
{
	arcsim_command    _func;
	arcsim_help_info  _help;
};

/* display help */
static void arcsim_command_help(arcsim *self, int argc, char *argv[]);

/* load programs from files into the simulator's memory */
static void arcsim_command_load(arcsim *self, int argc, char *argv[]);

/* display the contents of the simulator's memory */
static void arcsim_command_memory(arcsim *self, int argc, char *argv[]);

/* load a value into the program counter */
static void arcsim_command_pc(arcsim *self, int argc, char *argv[]);

/* shutdown the simulator */
static void arcsim_command_quit(arcsim *self, int argc, char *argv[]);

/* display the contents of the simulator's registers */
static void arcsim_command_register(arcsim *self, int argc, char *argv[]);

/* execute instructions until halt, displaying the operations performed */
static void arcsim_command_run(arcsim *self, int argc, char *argv[]);

/* execute a single instruction, displaying the operations performed */
static void arcsim_command_step(arcsim *self, int argc, char *argv[]);

/* lookup the implementation for a command given a command name or alias */
static arcsim_command arcsim_lookup_command(arcsim *self, char *name);

/* lookup the help information for a command given a command name or alias */
static arcsim_help_info *arcsim_lookup_help(arcsim *self, char *name);

/* indices into the command information list */
#define INDEX_help     0
#define INDEX_load     1
#define INDEX_memory   2
#define INDEX_pc       3
#define INDEX_quit     4
#define INDEX_register 5
#define INDEX_run      6
#define INDEX_step     7

/* mapping of command names to information list indices */
static arcsim_index_info arcsim_index_info_list[] =
{
	/* commands */
	{ "help",     INDEX_help     },
	{ "load",     INDEX_load     },
	{ "memory",   INDEX_memory   },
	{ "pc",       INDEX_pc       },
	{ "quit",     INDEX_quit     },
	{ "register", INDEX_register },
	{ "run",      INDEX_run      },
	{ "step",     INDEX_step     },

	/* aliases */
	{ "?",        INDEX_help     },
	{ "g",        INDEX_run      },
	{ "go",       INDEX_run      },
	{ "h",        INDEX_help     },
	{ "l",        INDEX_load     },
	{ "m",        INDEX_memory   },
	{ "p",        INDEX_pc       },
	{ "q",        INDEX_quit     },
	{ "r",        INDEX_register },
	{ "re",       INDEX_register },
	{ "ru",       INDEX_run      },
	{ "s",        INDEX_step     },
};

/* length of command index list */
static const int arcsim_index_info_list_length =
	sizeof(arcsim_index_info_list) / sizeof(arcsim_index_info);

/* list of command information */
static arcsim_command_info arcsim_command_info_list[] =
{
	{
		arcsim_command_help,
		{
			"help            (h, ?)",
			"Display this help message.",
			"Usage: help [COMMAND]\n"
				"\tDisplays a list of available commands and\n"
				"\ta short description of their function.\n"
				"\tWhen supplied with a command name, help\n"
				"\tprovides a detailed description of the command.\n",
			
		}
	},
	{
		arcsim_command_load,
		{
			"load            (l)",
			"Load a file or files into simulator memory.",
			"Usage: load FILE [FILES]\n"
				"\tLoads the file (or files) supplied to it\n"
				"\tinto simulator memory. The files are\n"
				"\texpected to be in the ARC .bin format.\n"
		}
	},
	{
		arcsim_command_memory,
		{
			"memory          (m)",
			"Display the contents of memory.",
			"Usage: memory FIRST_ADDRESS [LAST_ADDRESS]\n"
				"\tDisplays the contents of memory at the\n"
				"\tgiven address (or range of addresses).\n"
				"\tThe addresses are expected to be given\n"
				"\tin hexadecimal format.\n"
		}
	},
	{
		arcsim_command_pc,
		{
			"pc              (p)",
			"Set the value of the program counter.",
			"Usage: pc VALUE\n"
				"\tSets the value of the program counter\n"
				"\tto the given value. The value is expected\n"
				"\tto be given in hexadecimal format.\n"
		}
	},
	{
		arcsim_command_quit,
		{
			"quit            (q)",
			"Exit the simulator.",
			"Usage: quit\n"
				"\tExits the simulator, after displaying\n"
				"\tthe major and minor cycles gone through\n"
				"\tsince the simulator was started.\n"
		}
	},
	{
		arcsim_command_register,
		{
			"register        (re, r)",
			"Display the contents of registers.",
			"Usage: register FIRST_REGISTER [LAST_REGISTER]\n"
				"\tDisplays the contents of the register(s) in\n"
				"\tthe given range. The register numbers are\n"
				"\texpected to be given in C constant format.\n"
		}
	},
	{
		arcsim_command_run,
		{
			"run             (go, ru, g)",
			"Execute instructions until the next halt.",
			"Usage: run\n"
				"\tExecutes the instructions in simulator\n"
				"\tmemory until a halt instruction is\n"
				"\tencountered. Displays the instructions\n"
				"\tand the operations performed.\n"
		}
	},
	{
		arcsim_command_step,
		{
			"step            (s)",
			"Execute the next instruction.",
			"Usage: step\n"
				"\tExecutes the next instruction in simulator\n"
				"\tmemory. Displays the instruction and the\n"
				"\toperations performed.\n"
		}
	},
};

/* length of command information list */
static const int arcsim_command_info_list_length =
	sizeof(arcsim_command_info_list) / sizeof(arcsim_command_info);

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_SIMULATOR_PRIVATE_H */

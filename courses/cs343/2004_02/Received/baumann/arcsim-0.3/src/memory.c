/*
 * memory.c - ARC Memory
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

#include <stdlib.h>
#include <stddef.h>
#include <string.h>
#include <stdio.h>
#include "memory_private.h"

#ifdef	__cplusplus
extern	"C" {
#endif

arcsim_memory *
arcsim_memory_init(void)
{
	arcsim_memory *self;
	uint32         address;

	/* allocate */
	self = (arcsim_memory *)malloc(sizeof(arcsim_memory));
	if(self == NULL) { return NULL; }

	/* initialize the count */
	self->_count = 1;

	/* create the page tree */
	self->_pages = rbtree_init
		(arcsim_memory_page_compare, arcsim_memory_page_free);
	if(self->_pages == NULL)
	{
		free(self);
		return NULL;
	}

	/* create the first page */
	address = 0;
	self->_curr_page = arcsim_memory_page_init(address);
	if(self->_curr_page == NULL)
	{
		rbtree_free(self->_pages);
		free(self);
		return NULL;
	}

	/* attempt to add the new page to the page tree */
	if(!(rbtree_insert(self->_pages, &address, self->_curr_page)))
	{
		arcsim_memory_page_free(self->_curr_page);
		rbtree_free(self->_pages);
		free(self);
		return NULL;
	}

	/* return new memory */
	return self;
}

bool
arcsim_memory_read(arcsim_memory *self, uint32 address, uint32 *value)
{
	uint32 page;
	uint32 offset;

	/* argument checks */
	if(!arcsim_memory_check_address(address, true)) { return false; }

	/* convert the address into a page and offset */
	page = GETPAGE(address);
	offset = GETOFFSET(address);

	/* first check the current page to avoid searching the tree */
	if(self->_curr_page->_address != page)
	{
		arcsim_memory_page *tmp;

		/* search for the page */
		tmp = rbtree_search(self->_pages, &page);
		if(tmp == NULL)
		{
			*value = 0;
			return true;
		}

		/* save the current page for faster access */
		self->_curr_page = tmp;
	}

	/* perform the read operation */
	*value = self->_curr_page->_value[offset];

	/* read succeeded */
	return true;
}

bool
arcsim_memory_write(arcsim_memory *self, uint32 address, uint32 value)
{
	uint32 page;
	uint32 offset;

	/* argument checks */
	if(!arcsim_memory_check_address(address, false)) { return false; }

	/* convert the address into a page and offset */
	page = GETPAGE(address);
	offset = GETOFFSET(address);

	/* first check the current page to avoid searching the tree */
	if(self->_curr_page->_address != page)
	{
		arcsim_memory_page *tmp;

		/* search for the page, and create a new one if needed */
		tmp = rbtree_search(self->_pages, &page);
		if(tmp == NULL)
		{
			/* enforce limit on maximum number of pages */
			if(self->_count >= MAXPAGES)
			{
				fprintf(stderr, "Memory Failure: memory limit exceeded\n");
				return false;
			}

			/* create the new page */
			tmp = arcsim_memory_page_init(page);
			if(tmp == NULL) { return false; }

			/* attempt to add the new page to the page tree */
			if(!(rbtree_insert(self->_pages, &page, tmp)))
			{
				perror("Memory Failure");
				arcsim_memory_page_free(tmp);
				return false;
			}

			/* update page count */
			self->_count += 1;
		}

		/* save the current page for faster access */
		self->_curr_page = tmp;
	}

	/* perform the write operation */
	self->_curr_page->_value[offset] = value;
	return true;
}

void
arcsim_memory_print(arcsim_memory *self, uint32 first, uint32 last)
{
	uint32 fpage;
	uint32 foffset;
	uint32 lpage;
	uint32 loffset;
	int    count;

	/* argument checks */
	if(!arcsim_memory_check_address(first, true)) { return; }
	if(!arcsim_memory_check_address(last, true)) { return; }

	/* swap the addresses if they're out of order */
	if(first > last) { ARC_VALUE_SWAP(first, last, uint32); }

	/* convert the addresses into pages and offsets */
	fpage = GETPAGE(first);
	foffset = GETOFFSET(first);
	lpage = GETPAGE(last);
	loffset = GETOFFSET(last);

	/* set up for line formatting */
	count = 0;

	/* print all of the data */
	do
	{
		arcsim_memory_page *tmp;
		uint32 end;

		/* calculate the end of the reads for this page */
		end = ((fpage == lpage) ? loffset+1 : PAGESIZE);

		/* get the page */
		if(self->_curr_page->_address != fpage)
		{
			tmp = rbtree_search(self->_pages, &fpage);
		}
		else
		{
			tmp = self->_curr_page;
		}

		/* I hate having to repeat myself. ;) */
		#define ARCSIM_MEMORY_PRINT_VALUE(x) \
			do { \
				if(count == 3) \
				{ \
					printf("%08X\n", (x)); \
					count = 0; \
				} \
				else \
				{ \
					if(count == 0) \
					{ \
						printf("%08X: ", GETADDRESS(fpage, foffset)); \
					} \
					printf("%08X ", (x)); \
					++count; \
				} \
			} while(0)

		/* read the values of the current page */
		if(tmp == NULL)
		{
			/* pages which haven't been created are all zeroes */
			while(foffset < end)
			{
				ARCSIM_MEMORY_PRINT_VALUE(0);
				++foffset;
			}
		}
		else
		{
			/* print the values from the page */
			while(foffset < end)
			{
				ARCSIM_MEMORY_PRINT_VALUE(tmp->_value[foffset]);
				++foffset;
			}
		}

		/* set up for next loop */
		foffset = 0;
		++fpage;
	}
	while(fpage <= lpage);

	/* start a new line if we haven't already done so */
	if(count != 0) { printf("\n"); }
}

void
arcsim_memory_free(arcsim_memory *self)
{
	/* free the pages */
	rbtree_free(self->_pages);
	self->_pages = NULL;

	/* free the memory */
	free(self);
}

static arcsim_memory_page *
arcsim_memory_page_init(uint32 address)
{
	arcsim_memory_page *self;

	/* allocate */
	self = (arcsim_memory_page *)malloc(sizeof(arcsim_memory_page));
	if(self == NULL)
	{
		perror("Memory Failure");
		return NULL;
	}

	/* initialize data */
	self->_address = address;
	memset(self->_value, 0, PAGEBYTES);

	/* return new page */
	return self;
}

static int
arcsim_memory_page_compare(void *key, void *item)
{
	return *((uint32 *)key) - (((arcsim_memory_page *)item)->_address);
}

static void
arcsim_memory_page_free(void *item)
{
	free(item);
}

static bool
arcsim_memory_check_address(uint32 address, bool read)
{
	char *msg;

	/* set the msg based on whether we're reading or writing */
	if(read)
	{
		msg = "Memory Failure: attempted to read from MEM[%08X]\n";
	}
	else
	{
		msg = "Memory Failure: attempted to write to MEM[%08X]\n";
	}

	/* perform the checks */
	if(address == 0 || (address & 3) != 0)
	{
		fprintf(stderr, msg, address);
		return false;
	}
	return true;
}

#ifdef	__cplusplus
};
#endif

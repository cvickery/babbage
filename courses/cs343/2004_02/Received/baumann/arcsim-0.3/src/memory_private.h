/*
 * memory_private.h - ARC Memory
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

#ifndef	_ARC_MEMORY_PRIVATE_H
#define	_ARC_MEMORY_PRIVATE_H

#include "memory.h"
#include "rbtree.h"

#ifdef	__cplusplus
extern	"C" {
#endif

#define PAGESIZE   256
#define PAGEBYTES 1024
#define MAXPAGES  1024
#define GETADDRESS(page, offset) (((page) << 10) | (((offset) << 2) & 0x000003FC))
#define GETPAGE(address) ((address) >> 10)
#define GETOFFSET(address) (((address) & 0x000003FC) >> 2)

/* structure of an arc simulator memory page */
typedef struct _tag_arcsim_memory_page arcsim_memory_page;
struct _tag_arcsim_memory_page
{
	uint32 _address;
	uint32 _value[PAGESIZE];
};

/* structure of arc simulator memory */
struct _tag_arcsim_memory
{
	rbtree             *_pages;
	arcsim_memory_page *_curr_page;
	uint32              _count;
};

/* create a new arc simulator memory page */
static arcsim_memory_page *arcsim_memory_page_init(uint32 address);

/* compare an arc simulator memory page to a page address */
static int arcsim_memory_page_compare(void *key, void *item);

/* free an arc simulator memory page */
static void arcsim_memory_page_free(void *item);

/* check the address and, if it is invalid, report an error and return false */
static bool arcsim_memory_check_address(uint32 address, bool read);

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_MEMORY_PRIVATE_H */

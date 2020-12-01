/*
 * memory.h - ARC Memory
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

#ifndef	_ARC_MEMORY_H
#define	_ARC_MEMORY_H

#include <stdbool.h>
#include "values.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* opaque declaration of arc simulator memory structure */
typedef struct _tag_arcsim_memory arcsim_memory;

/*
 * Constructor.
 *
 * returns null if allocation failed, otherwise returns the new memory
 */
arcsim_memory *arcsim_memory_init(void);

/*
 * Read the value of memory at a given address.
 *
 * self: the memory to retrieve the value from
 * address: the word address of the memory to be read
 * value: the value to be read
 *
 * returns true on success, false otherwise
 */
bool arcsim_memory_read(arcsim_memory *self, uint32 address, uint32 *value);

/*
 * Write a value into memory at a given address.
 *
 * self: the memory into which the write should be made
 * address: the word address of the destination in memory
 * value: the value to be written
 *
 * returns true on success, false otherwise
 */
bool arcsim_memory_write(arcsim_memory *self, uint32 address, uint32 value);

/*
 * Print the value of memory in the given range of addresses to stdout.
 *
 * self: the memory to print from
 * first: the word address of the first value to print
 * last: the word address of the last value to print
 */
void arcsim_memory_print(arcsim_memory *self, uint32 first, uint32 last);

/*
 * Free the memory.
 *
 * self: the memory to be free'd
 */
void arcsim_memory_free(arcsim_memory *self);

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_MEMORY_H */

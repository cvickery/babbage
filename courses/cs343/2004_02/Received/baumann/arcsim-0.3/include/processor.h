/*
 * processor.h - ARC Processor
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

#ifndef	_ARC_PROCESSOR_H
#define	_ARC_PROCESSOR_H

#include <stdbool.h>
#include "values.h"
#include "memory.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* opaque declaration of the arc simulator processor */
typedef struct _tag_arcsim_processor arcsim_processor;

/*
 * Constructor.
 *
 * mem: reference to the simulator memory
 *
 * returns null if allocation failed, otherwise returns the new processor
 */
arcsim_processor *arcsim_processor_init(arcsim_memory *mem);

/*
 * Process a single arc instruction.
 *
 * self: the processor on which to execute
 * halt: set to true if the instruction is a halt instruction, false otherwise
 *
 * returns true on success, false otherwise
 */
bool arcsim_processor_major(arcsim_processor *self, bool *halt);

/*
 * Print the number of major and minor cycles to stdout.
 *
 * self: the processor to query
 */
void arcsim_processor_print_cycles(arcsim_processor *self);

/*
 * Print the values of the given range of registers to stdout.
 *
 * self: the processor containing the registers
 * first: the first register whose value is to be printed
 * last: the last register whose value is to be printed
 */
void arcsim_processor_print_regs(arcsim_processor *self, uint32 first, uint32 last);

/*
 * Set the value of the program counter to the given value.
 *
 * self: the processor containing the program counter
 * value: the new value for the program counter
 */
void arcsim_processor_setpc(arcsim_processor *self, uint32 value);

/*
 * Free the processor.
 *
 * self: the processor to be free'd
 */
void arcsim_processor_free(arcsim_processor *self);

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_PROCESSOR_H */

/*
 * datapath.h - ARC Datapath
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

#ifndef	_ARC_DATAPATH_H
#define	_ARC_DATAPATH_H

#include <stdbool.h>
#include "values.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* public register ids */
#define ARC_REG_R0     0
#define ARC_REG_R1     1
#define ARC_REG_R2     2
#define ARC_REG_R3     3
#define ARC_REG_R4     4
#define ARC_REG_R5     5
#define ARC_REG_R6     6
#define ARC_REG_R7     7
#define ARC_REG_R8     8
#define ARC_REG_R9     9
#define ARC_REG_R10   10
#define ARC_REG_R11   11
#define ARC_REG_R12   12
#define ARC_REG_R13   13
#define ARC_REG_R14   14
#define ARC_REG_R15   15
#define ARC_REG_R16   16
#define ARC_REG_R17   17
#define ARC_REG_R18   18
#define ARC_REG_R19   19
#define ARC_REG_R20   20
#define ARC_REG_R21   21
#define ARC_REG_R22   22
#define ARC_REG_R23   23
#define ARC_REG_R24   24
#define ARC_REG_R25   25
#define ARC_REG_R26   26
#define ARC_REG_R27   27
#define ARC_REG_R28   28
#define ARC_REG_R29   29
#define ARC_REG_R30   30
#define ARC_REG_R31   31

/* private register ids */
#define ARC_REG_PC    32
#define ARC_REG_TEMP0 33
#define ARC_REG_TEMP1 34
#define ARC_REG_TEMP2 35
#define ARC_REG_TEMP3 36
#define ARC_REG_IR    37
#define ARC_REG_LINK  ARC_REG_R15

/* alu operations codes */
#define ARC_ALU_ANDCC     0
#define ARC_ALU_ORCC      1
#define ARC_ALU_NORCC     2
#define ARC_ALU_ADDCC     3
#define ARC_ALU_SRL       4
#define ARC_ALU_AND       5
#define ARC_ALU_OR        6
#define ARC_ALU_NOR       7
#define ARC_ALU_ADD       8
#define ARC_ALU_LSHIFT2   9
#define ARC_ALU_LSHIFT10 10
#define ARC_ALU_SIMM13   11
#define ARC_ALU_SEXT13   12
#define ARC_ALU_INC      13
#define ARC_ALU_INCPC    14
#define ARC_ALU_RSHIFT5  15

/* opaque declaration of the arc simulator datapath */
typedef struct _tag_arcsim_datapath arcsim_datapath;

/* type of an arc simulator alu operation */
typedef uint32 (*arcsim_datapath_op) (arcsim_datapath *self, uint32 src1, uint32 src2);

/*
 * Constructor.
 *
 * returns null if allocation failed, otherwise returns the new datapath
 */
arcsim_datapath *arcsim_datapath_init(void);

/*
 * Read the value of a register.
 *
 * self: the datapath containing the register
 * reg: the register from which to read
 * value: the value to be read
 *
 * returns true on success, false otherwise
 */
bool arcsim_datapath_read(arcsim_datapath *self, uint32 reg, uint32 *value);

/*
 * Write a value into a register.
 *
 * self: the datapath containing the register
 * reg: the register in which to write
 * value: the value to be written
 *
 * returns true on success, false otherwise
 */
bool arcsim_datapath_write(arcsim_datapath *self, uint32 reg, uint32 value);

/*
 * Print the values of the given range of registers to stdout.
 *
 * self: the datapath containing the registers
 * first: the first register whose value is to be printed
 * last: the last register whose value is to be printed
 */
void arcsim_datapath_print(arcsim_datapath *self, uint32 first, uint32 last);

/*
 * Print the value of the given register and the condition codes to stdout.
 *
 * self: the datapath containing the register and condition codes
 * reg: the register whose new value is to be printed
 */
void arcsim_datapath_print_change(arcsim_datapath *self, uint32 reg);

/*
 * Get the function associated with the given alu operation code.
 *
 * alu_opcode: the alu operation code for the function to be retrieved
 *
 * returns null if the alu operation code is invalid, otherwise returns the
 * function associated with the given alu operation code
 */
arcsim_datapath_op arcsim_datapath_getop(uint32 alu_opcode);

/*
 * Get the value of the "is negative" condition code.
 *
 * self: the datapath containing the condition code to check
 *
 * returns true if the condition code is set, false otherwise
 */
bool arcsim_datapath_n(arcsim_datapath *self);

/*
 * Get the value of the "is zero" condition code.
 *
 * self: the datapath containing the condition code to check
 *
 * returns true if the condition code is set, false otherwise
 */
bool arcsim_datapath_z(arcsim_datapath *self);

/*
 * Get the value of the "has overflow" condition code.
 *
 * self: the datapath containing the condition code to check
 *
 * returns true if the condition code is set, false otherwise
 */
bool arcsim_datapath_v(arcsim_datapath *self);

/*
 * Get the value of the "has carry" condition code.
 *
 * self: the datapath containing the condition code to check
 *
 * returns true if the condition code is set, false otherwise
 */
bool arcsim_datapath_c(arcsim_datapath *self);

/*
 * Get the value of bit 13 of the instruction register.
 *
 * self: the datapath containing the ir to check
 *
 * returns true if bit 13 of the ir is set, false otherwise
 */
bool arcsim_datapath_ir13(arcsim_datapath *self);

/*
 * Free the datapath.
 *
 * self: the datapath to be free'd
 */
void arcsim_datapath_free(arcsim_datapath *self);

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_DATAPATH_H */

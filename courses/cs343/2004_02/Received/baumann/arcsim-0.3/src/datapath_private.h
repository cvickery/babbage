/*
 * datapath_private.h - ARC Datapath
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

#ifndef	_ARC_DATAPATH_PRIVATE_H
#define	_ARC_DATAPATH_PRIVATE_H

#include "datapath.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* number of registers */
#define NUMREGS 38

/* structure of an arc simulator datapath */
struct _tag_arcsim_datapath
{
	uint32 _regs[NUMREGS];
	uint32 _n : 1;
	uint32 _z : 1;
	uint32 _v : 1;
	uint32 _c : 1;
};

/* arc simulator register name information type */
typedef const char *arcsim_register_name_info;

/* check the register and, if it is invalid, report an error and return false */
static bool arcsim_datapath_check_register(uint32 reg, bool read);

/* perform an and operation and change condition codes */
static uint32 arcsim_datapath_andcc(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform an or operation and change condition codes */
static uint32 arcsim_datapath_orcc(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform a nor operation and change condition codes */
static uint32 arcsim_datapath_norcc(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform an add operation and change condition codes */
static uint32 arcsim_datapath_addcc(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform a shift operation */
static uint32 arcsim_datapath_srl(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform an and operation */
static uint32 arcsim_datapath_and(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform an or operation */
static uint32 arcsim_datapath_or(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform a nor operation */
static uint32 arcsim_datapath_nor(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform an add operation */
static uint32 arcsim_datapath_add(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform a shift operation */
static uint32 arcsim_datapath_lshift2(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform a shift operation */
static uint32 arcsim_datapath_lshift10(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform a simm13 operation */
static uint32 arcsim_datapath_simm13(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform a sext13 operation */
static uint32 arcsim_datapath_sext13(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform an increment operation */
static uint32 arcsim_datapath_inc(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform an increment operation */
static uint32 arcsim_datapath_incpc(arcsim_datapath *self, uint32 src1, uint32 src2);

/* perform a shift operation */
static uint32 arcsim_datapath_rshift5(arcsim_datapath *self, uint32 src1, uint32 src2);

/* list of arc simulator alu operations */
static arcsim_datapath_op arcsim_alu_ops[] =
{
	arcsim_datapath_andcc,
	arcsim_datapath_orcc,
	arcsim_datapath_norcc,
	arcsim_datapath_addcc,
	arcsim_datapath_srl,
	arcsim_datapath_and,
	arcsim_datapath_or,
	arcsim_datapath_nor,
	arcsim_datapath_add,
	arcsim_datapath_lshift2,
	arcsim_datapath_lshift10,
	arcsim_datapath_simm13,
	arcsim_datapath_sext13,
	arcsim_datapath_inc,
	arcsim_datapath_incpc,
	arcsim_datapath_rshift5
};

/* length of arc simulator alu operations list */
static const int arcsim_alu_ops_length =
	sizeof(arcsim_alu_ops) / sizeof(arcsim_datapath_op);

/* list of arc simulator register names */
static arcsim_register_name_info arcsim_register_names[] =
{
	"%r0",    "%r1",    "%r2",    "%r3",
	"%r4",    "%r5",    "%r6",    "%r7",
	"%r8",    "%r9",    "%r10",   "%r11",
	"%r12",   "%r13",   "%r14",   "%r15",
	"%r16",   "%r17",   "%r18",   "%r19",
	"%r20",   "%r21",   "%r22",   "%r23",
	"%r24",   "%r25",   "%r26",   "%r27",
	"%r28",   "%r29",   "%r30",   "%r31",
	"%pc",    "%temp0", "%temp1", "%temp2",
	"%temp3", "%ir"
};

/* length of arc simulator register names list */
static const int arcsim_register_names_length =
	sizeof(arcsim_register_names) / sizeof(arcsim_register_name_info);

/* length of longest register name (for padding output) */
#define REGNAMEWIDTH 6

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_DATAPATH_PRIVATE_H */

/*
 * datapath.c - ARC Datapath
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
#include "datapath_private.h"

#ifdef	__cplusplus
extern	"C" {
#endif

arcsim_datapath *
arcsim_datapath_init(void)
{
	arcsim_datapath *self;

	/* allocate */
	self = (arcsim_datapath *)malloc(sizeof(arcsim_datapath));
	if(self == NULL)
	{
		perror("Initialization Failure");
		return NULL;
	}

	/* initialize data */
	memset(self->_regs, 0, sizeof(self->_regs));
	self->_n = 0;
	self->_z = 0;
	self->_v = 0;
	self->_c = 0;

	/* return new datapath */
	return self;
}

bool
arcsim_datapath_read(arcsim_datapath *self, uint32 reg, uint32 *value)
{
	/* argument checks */
	if(!arcsim_datapath_check_register(reg, true)) { return false; }

	/* get value */
	*value = self->_regs[reg];

	/* read succeeded */
	return true;
}

bool
arcsim_datapath_write(arcsim_datapath *self, uint32 reg, uint32 value)
{
	/* argument checks */
	if(!arcsim_datapath_check_register(reg, false)) { return false; }

	/* set value */
	if(reg != ARC_REG_R0) { self->_regs[reg] = value; }

	/* write succeeded */
	return true;
}

void
arcsim_datapath_print(arcsim_datapath *self, uint32 first, uint32 last)
{
	char *name;
	uint32 value;

	/* argument checks */
	if(!arcsim_datapath_check_register(first, true)) { return; }
	if(!arcsim_datapath_check_register(last, true)) { return; }

	/* swap the registers if they're out of order */
	if(first > last) { ARC_VALUE_SWAP(first, last, uint32); }

	/* print all of the data */
	for(; first <= last; ++first)
	{
		/* get the register name and value */
		name = (char *)arcsim_register_names[first];
		value = self->_regs[first];

		/* display the register name and value */
		printf("%*s: %08X\n", REGNAMEWIDTH, name, value);
	}
}

void
arcsim_datapath_print_change(arcsim_datapath *self, uint32 reg)
{
	char *name;
	uint32 value;

	/* argument checks */
	if(!arcsim_datapath_check_register(reg, true)) { return; }

	/* get the register name and value */
	name = (char *)arcsim_register_names[reg];
	value = self->_regs[reg];

	/* print the register name and new value */
	printf("\t%*s <- %08X\t", REGNAMEWIDTH, name, value);

	/* print the condition codes */
	printf("(N=%d Z=%d V=%d C=%d)\n", self->_n, self->_z, self->_v, self->_c);
}

arcsim_datapath_op
arcsim_datapath_getop(uint32 alu_opcode)
{
	if(alu_opcode >= ((uint32)arcsim_alu_ops_length)) { return NULL; }
	return arcsim_alu_ops[alu_opcode];
}

bool
arcsim_datapath_n(arcsim_datapath *self)
{
	return (self->_n == 1);
}

bool
arcsim_datapath_z(arcsim_datapath *self)
{
	return (self->_z == 1);
}

bool
arcsim_datapath_v(arcsim_datapath *self)
{
	return (self->_v == 1);
}

bool
arcsim_datapath_c(arcsim_datapath *self)
{
	return (self->_c == 1);
}

bool
arcsim_datapath_ir13(arcsim_datapath *self)
{
	return ((self->_regs[ARC_REG_IR] & 0x00001000) != 0);
}

void
arcsim_datapath_free(arcsim_datapath *self)
{
	/* free the datapath */
	free(self);
}

static bool
arcsim_datapath_check_register(uint32 reg, bool read)
{
	char *msg;

	/* set the msg based on whether we're reading or writing */
	if(read)
	{
		msg = "Datapath Failure: attempted to read from REG[%08X]\n";
	}
	else
	{
		msg = "Datapath Failure: attempted to write to REG[%08X]\n";
	}

	/* perform the checks */
	if(reg >= NUMREGS)
	{
		fprintf(stderr, msg, reg);
		return false;
	}
	return true;
}

static uint32
arcsim_datapath_andcc(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	uint32 result;

	/* perform the and operation */
	result = (src1 & src2);

	/* set the condition codes */
	self->_n = (((int32)result) < 0);
	self->_z = (result == 0);
	self->_v = false;
	self->_c = false;

	/* return result */
	return result;
}

static uint32
arcsim_datapath_orcc(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	uint32 result;

	/* perform the or operation */
	result = (src1 | src2);

	/* set the condition codes */
	self->_n = (((int32)result) < 0);
	self->_z = (result == 0);
	self->_v = false;
	self->_c = false;

	/* return result */
	return result;
}

static uint32
arcsim_datapath_norcc(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	uint32 result;

	/* perform the nor operation */
	result = ((~src1) & (~src2));

	/* set the condition codes */
	self->_n = (((int32)result) < 0);
	self->_z = (result == 0);
	self->_v = false;
	self->_c = false;

	/* return result */
	return result;
}

static uint32
arcsim_datapath_addcc(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	bool   a_neg;
	bool   b_neg;
	bool   c_neg;
	uint32 result;

	/* perform the add operation */
	result = src1 + src2;

	/* figure out what's negative */
	a_neg = (((int32)src1) < 0);
	b_neg = (((int32)src2) < 0);
	c_neg = (((int32)result) < 0);

	/* set the condition codes */
	self->_n = c_neg;
	self->_z = (result == 0);
	self->_v = ((!a_neg && !b_neg && c_neg) || (a_neg && b_neg && !c_neg));
	self->_c = (!c_neg ? (a_neg || b_neg) : (a_neg && b_neg));

	/* return result */
	return result;
}

static uint32
arcsim_datapath_srl(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;

	/* perform the shift operation and return the result */
	return (src1 >> src2);
}

static uint32
arcsim_datapath_and(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;

	/* perform the and operation and return the result */
	return (src1 & src2);
}

static uint32
arcsim_datapath_or(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;

	/* perform the or operation and return the result */
	return (src1 | src2);
}

static uint32
arcsim_datapath_nor(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;

	/* perform the nor operation and return the result */
	return ((~src1) & (~src2));
}

static uint32
arcsim_datapath_add(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;

	/* perform the add operation and return the result */
	return (src1 + src2);
}

static uint32
arcsim_datapath_lshift2(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;
	src2 = 0;

	/* perform the shift operation and return the result */
	return (src1 << 2);
}

static uint32
arcsim_datapath_lshift10(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;
	src2 = 0;

	/* perform the shift operation and return the result */
	return (src1 << 10);
}

static uint32
arcsim_datapath_simm13(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;
	src2 = 0;

	/* perform the simm13 operation and return the result */
	return (src1 & 0x00001FFF);
}

static uint32
arcsim_datapath_sext13(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	uint32 result;

	/* keep the compiler quiet */
	self = NULL;
	src2 = 0;

	/* perform the sext13 operation */
	result = (src1 & 0x00001FFF);
	if((result & 0x00001000)) { result |= 0xFFFFE000; }

	/* return result */
	return result;
}

static uint32
arcsim_datapath_inc(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;
	src2 = 0;

	/* perform the increment operation and return the result */
	return (src1 + 1);
}

static uint32
arcsim_datapath_incpc(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;
	src2 = 0;

	/* perform the increment operation and return the result */
	return (src1 + 4);
}

static uint32
arcsim_datapath_rshift5(arcsim_datapath *self, uint32 src1, uint32 src2)
{
	/* keep the compiler quiet */
	self = NULL;
	src2 = 0;

	/* perform the shift operation and return the result */
	return ((uint32)(((int32)src1) >> 5));
}

#ifdef	__cplusplus
};
#endif

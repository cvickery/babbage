/*
 * processor_private.h - ARC Processor
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

#ifndef	_ARC_PROCESSOR_PRIVATE_H
#define	_ARC_PROCESSOR_PRIVATE_H

#include "processor.h"
#include "datapath.h"

#ifdef	__cplusplus
extern	"C" {
#endif

/* structure of an arc simulator processor */
struct _tag_arcsim_processor
{
	arcsim_datapath *_datapath;
	arcsim_memory   *_memory;
	uint32           _major_cycles;
	uint32           _minor_cycles;
};

/* structure of an arc simulator instruction */
typedef struct _tag_arcsim_instruction arcsim_instruction;
struct _tag_arcsim_instruction
{
	uint32 op     :  2;
	uint32 opcode :  8;
	uint32 cond   :  4;
	uint32 rd     :  6;
	uint32 rs1    :  6;
	uint32 rs2    :  6;
	uint32 is_imm :  1;
};

/* structure of an arc simulator micro instruction */
typedef struct _tag_arcsim_instruction_micro arcsim_instruction_micro;
struct _tag_arcsim_instruction_micro
{
	uint32 a      : 6;
	uint32 b      : 6;
	uint32 c      : 6;
	uint32 alu    : 4;
	uint32 mem_rd : 1;
	uint32 mem_wr : 1;
};

/* fetch the instruction at the address stored in the program counter */
static bool arcsim_processor_fetch(arcsim_processor *self);

/* execute the current instruction */
static bool arcsim_processor_execute(arcsim_processor *self, bool *halt);

/* decode the current instruction */
static bool arcsim_processor_decode
	(arcsim_processor *self, arcsim_instruction *instr, bool *halt);

/* increment the program counter */
static void arcsim_processor_incpc(arcsim_processor *self);

/* process one clock cycle */
static bool arcsim_processor_minor
	(arcsim_processor *self, arcsim_instruction_micro *instr);

/* instruction cond field values */
#define ARC_INSTR_COND_BE   1
#define ARC_INSTR_COND_BCS  5
#define ARC_INSTR_COND_BNEG 6
#define ARC_INSTR_COND_BVS  7
#define ARC_INSTR_COND_BA   8

/* instruction op field values */
#define ARC_INSTR_OP_SB   0
#define ARC_INSTR_OP_CALL 1
#define ARC_INSTR_OP_MATH 2
#define ARC_INSTR_OP_MEM  3

/* instruction op2 field values */
#define ARC_INSTR_OP2_NOP    0
#define ARC_INSTR_OP2_BRANCH 2
#define ARC_INSTR_OP2_SETHI  4

/* instruction op3 field values */
#define ARC_INSTR_OP3_ADD   0x00000000
#define ARC_INSTR_OP3_AND   0x00000001
#define ARC_INSTR_OP3_OR    0x00000002
#define ARC_INSTR_OP3_XOR   0x00000003
#define ARC_INSTR_OP3_SUB   0x00000004
#define ARC_INSTR_OP3_ORN   0x00000006
#define ARC_INSTR_OP3_ADDCC 0x00000010
#define ARC_INSTR_OP3_ANDCC 0x00000011
#define ARC_INSTR_OP3_ORCC  0x00000012
#define ARC_INSTR_OP3_XORCC 0x00000013
#define ARC_INSTR_OP3_SUBCC 0x00000014
#define ARC_INSTR_OP3_ORNCC 0x00000016
#define ARC_INSTR_OP3_SRL   0x00000026
#define ARC_INSTR_OP3_SRA   0x00000027
#define ARC_INSTR_OP3_JMPL  0x00000038
#define ARC_INSTR_OP3_LD    0x00000000
#define ARC_INSTR_OP3_ST    0x00000004

/* instruction opcodes */
#define ARC_INSTR_OPCODE_NOP    ((ARC_INSTR_OP_SB   << 6) | ARC_INSTR_OP2_NOP)
#define ARC_INSTR_OPCODE_SETHI  ((ARC_INSTR_OP_SB   << 6) | ARC_INSTR_OP2_SETHI)
#define ARC_INSTR_OPCODE_BRANCH ((ARC_INSTR_OP_SB   << 6) | ARC_INSTR_OP2_BRANCH)
#define ARC_INSTR_OPCODE_CALL   ((ARC_INSTR_OP_CALL << 6))
#define ARC_INSTR_OPCODE_ADD    ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_ADD)
#define ARC_INSTR_OPCODE_AND    ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_AND)
#define ARC_INSTR_OPCODE_OR     ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_OR)
#define ARC_INSTR_OPCODE_XOR    ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_XOR)
#define ARC_INSTR_OPCODE_SUB    ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_SUB)
#define ARC_INSTR_OPCODE_ORN    ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_ORN)
#define ARC_INSTR_OPCODE_ADDCC  ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_ADDCC)
#define ARC_INSTR_OPCODE_ANDCC  ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_ANDCC)
#define ARC_INSTR_OPCODE_ORCC   ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_ORCC)
#define ARC_INSTR_OPCODE_XORCC  ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_XORCC)
#define ARC_INSTR_OPCODE_SUBCC  ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_SUBCC)
#define ARC_INSTR_OPCODE_ORNCC  ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_ORNCC)
#define ARC_INSTR_OPCODE_SRL    ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_SRL)
#define ARC_INSTR_OPCODE_SRA    ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_SRA)
#define ARC_INSTR_OPCODE_JMPL   ((ARC_INSTR_OP_MATH << 6) | ARC_INSTR_OP3_JMPL)
#define ARC_INSTR_OPCODE_LD     ((ARC_INSTR_OP_MEM  << 6) | ARC_INSTR_OP3_LD)
#define ARC_INSTR_OPCODE_ST     ((ARC_INSTR_OP_MEM  << 6) | ARC_INSTR_OP3_ST)

/* halt and nop instruction codes (new is arctools 1.2.8 compatible) */
#define ARC_INSTR_HALT     0x91D02000
#define ARC_INSTR_HALT_NEW 0xFFFFFFFF
#define ARC_INSTR_NOP      0x00000000

#ifdef	__cplusplus
};
#endif

#endif /* _ARC_PROCESSOR_PRIVATE_H */

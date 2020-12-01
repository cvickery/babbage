/*
 * processor.c - ARC Processor
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
#include <stdio.h>
#include "processor_private.h"

#ifdef	__cplusplus
extern	"C" {
#endif

arcsim_processor *
arcsim_processor_init(arcsim_memory *mem)
{
	arcsim_processor *self;

	/* allocate */
	self = (arcsim_processor *)malloc(sizeof(arcsim_processor));
	if(self == NULL)
	{
		perror("Initialization Failure");
		return NULL;
	}

	/* initialize datapath */
	self->_datapath = arcsim_datapath_init();
	if(self->_datapath == NULL)
	{
		free(self);
		perror("Initialization Failure");
		return NULL;
	}

	/* initialize memory reference */
	self->_memory = mem;

	/* initialize cycle data */
	self->_major_cycles = 0;
	self->_minor_cycles = 0;

	/* return new processor */
	return self;
}

bool
arcsim_processor_major(arcsim_processor *self, bool *halt)
{
	/* fetch instruction */
	if(!arcsim_processor_fetch(self)) { return false; }

	/* execute instruction */
	if(!arcsim_processor_execute(self, halt)) { return false; }

	/* increment major cycle count */
	++self->_major_cycles;

	/* major-cycled successfully */
	return true;
}

void
arcsim_processor_print_cycles(arcsim_processor *self)
{
	printf("Major Cycles: %d\n", self->_major_cycles);
	printf("Minor Cycles: %d\n", self->_minor_cycles);
}

void
arcsim_processor_print_regs(arcsim_processor *self, uint32 first, uint32 last)
{
	arcsim_datapath_print(self->_datapath, first, last);
}

void
arcsim_processor_setpc(arcsim_processor *self, uint32 value)
{
	arcsim_datapath_write(self->_datapath, ARC_REG_PC, value);
}

void
arcsim_processor_free(arcsim_processor *self)
{
	/* free the datapath */
	arcsim_datapath_free(self->_datapath);

	/* null references */
	self->_datapath = NULL;
	self->_memory = NULL;

	/* free the processor */
	free(self);
}

static bool
arcsim_processor_fetch(arcsim_processor *self)
{
	arcsim_instruction_micro instr =
	{
		ARC_REG_PC,
		ARC_REG_R0,
		ARC_REG_IR,
		ARC_ALU_AND,
		1, 0
	};
	return arcsim_processor_minor(self, &instr);
}

static bool
arcsim_processor_execute(arcsim_processor *self, bool *halt)
{
	arcsim_instruction instr;

	/* decode the instruction */
	if(!arcsim_processor_decode(self, &instr, halt)) { return false; }

	/* handle halt special case */
	if(*halt)
	{
		/* increment the program counter */
		arcsim_processor_incpc(self);

		/* executed successfully */
		return true;
	}

	/* sign extend the simm13 field and put it into temp0, if needed */
	if(instr.op >= ARC_INSTR_OP_MATH && instr.is_imm)
	{
		arcsim_instruction_micro micro =
		{
			ARC_REG_IR,
			ARC_REG_R0,
			ARC_REG_TEMP0,
			ARC_ALU_SEXT13,
			0, 0
		};
		if(!arcsim_processor_minor(self, &micro)) { return false; }

		/* set the rs2 field to temp0 */
		instr.rs2 = ARC_REG_TEMP0;
	}

	/* add the source operands together to obtain the address, if needed */
	if(instr.op == ARC_INSTR_OP_MEM || instr.opcode == ARC_INSTR_OPCODE_JMPL)
	{
		arcsim_instruction_micro micro =
		{
			instr.rs1,
			instr.rs2,
			ARC_REG_TEMP1,
			ARC_ALU_ADD,
			0, 0
		};
		if(!arcsim_processor_minor(self, &micro)) { return false; }

		/* set the rs1 field to temp1 */
		instr.rs1 = ARC_REG_TEMP1;
	}

	/* execute the instruction */
	switch(instr.opcode)
	{
		case ARC_INSTR_OPCODE_ADD:
		{
			/* perform the add operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_ADD,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_ADDCC:
		{
			/* perform the add operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_ADDCC,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_AND:
		{
			/* perform the and operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_AND,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_ANDCC:
		{
			/* perform the and operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_ANDCC,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_BRANCH:
		{
			bool branch;

			/* determine if we should branch or not */
			switch(instr.cond)
			{
				case ARC_INSTR_COND_BE:
				{
					branch = arcsim_datapath_z(self->_datapath);
				}
				break;

				case ARC_INSTR_COND_BCS:
				{
					branch = arcsim_datapath_c(self->_datapath);
				}
				break;

				case ARC_INSTR_COND_BNEG:
				{
					branch = arcsim_datapath_n(self->_datapath);
				}
				break;

				case ARC_INSTR_COND_BVS:
				{
					branch = arcsim_datapath_v(self->_datapath);
				}
				break;

				case ARC_INSTR_COND_BA:
				{
					branch = true;
				}
				break;

				default: { return false; }
			}

			/* perform the branch operation or increment the program counter */
			if(branch)
			{
				/* copy the displacement into temp2, left-shifted by ten */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_IR,
						ARC_REG_R0,
						ARC_REG_TEMP2,
						ARC_ALU_LSHIFT10,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* right-shift the displacement by ten */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_TEMP2,
						ARC_REG_R0,
						ARC_REG_TEMP2,
						ARC_ALU_RSHIFT5,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* left-shift the displacement by two */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_TEMP2,
						ARC_REG_R0,
						ARC_REG_TEMP2,
						ARC_ALU_LSHIFT2,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* perform branch operation */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_TEMP2,
						ARC_REG_PC,
						ARC_REG_PC,
						ARC_ALU_ADD,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}
			}
			else
			{
				/* increment the program counter */
				arcsim_processor_incpc(self);
			}
		}
		break;

		case ARC_INSTR_OPCODE_CALL:
		{
			/* perform the link operation */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_PC,
					ARC_REG_R0,
					ARC_REG_LINK,
					ARC_ALU_OR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* copy the displacement into temp2, left-shifted by two */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_IR,
					ARC_REG_R0,
					ARC_REG_TEMP2,
					ARC_ALU_LSHIFT2,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* perform the call operation */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP2,
					ARC_REG_PC,
					ARC_REG_PC,
					ARC_ALU_ADD,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}
		}
		break;

		case ARC_INSTR_OPCODE_JMPL:
		{
			/* perform the link operation */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_PC,
					ARC_REG_R0,
					instr.rd,
					ARC_ALU_OR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* perform the jump operation */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs1,
					ARC_REG_R0,
					ARC_REG_PC,
					ARC_ALU_OR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}
		}
		break;

		case ARC_INSTR_OPCODE_LD:
		{
			/* perform the load operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				ARC_REG_R0,
				instr.rd,
				ARC_ALU_OR,
				1, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_NOP:
		{
			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_OR:
		{
			/* perform the or operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_OR,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_ORCC:
		{
			/* perform the or operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_ORCC,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_ORN:
		{
			/* perform the nor operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_NOR,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_ORNCC:
		{
			/* perform the nor operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_NORCC,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_SETHI:
		{
			/* perform the sethi operation */
			arcsim_instruction_micro micro =
			{
				ARC_REG_IR,
				ARC_REG_R0,
				instr.rd,
				ARC_ALU_LSHIFT10,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_SRA:
		{
			bool negative;

			/* determine if sign-extension is needed */
			{
				/* put four into temp2 */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_R0,
						ARC_REG_R0,
						ARC_REG_TEMP2,
						ARC_ALU_INCPC,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* put eight into temp2 */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_TEMP2,
						ARC_REG_R0,
						ARC_REG_TEMP2,
						ARC_ALU_INCPC,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* put nine into temp2 */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_TEMP2,
						ARC_REG_R0,
						ARC_REG_TEMP2,
						ARC_ALU_INC,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* put eighteen into temp2 */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_TEMP2,
						ARC_REG_TEMP2,
						ARC_REG_TEMP2,
						ARC_ALU_ADD,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* shift rs1[31] into ir[13] */
				{
					arcsim_instruction_micro micro =
					{
						instr.rs1,
						ARC_REG_TEMP2,
						ARC_REG_IR,
						ARC_ALU_SRL,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* get the value of the i bit from the ir */
				negative = arcsim_datapath_ir13(self->_datapath);
			}

			/* perform the shift operation */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs1,
					instr.rs2,
					instr.rd,
					ARC_ALU_SRL,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* sign extend if needed */
			if(negative)
			{
				/* put minus one into temp3 */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_R0,
						ARC_REG_R0,
						ARC_REG_TEMP3,
						ARC_ALU_NOR,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* shift temp3 into place for or'ing */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_TEMP3,
						instr.rs2,
						ARC_REG_TEMP3,
						ARC_ALU_SRL,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* complement temp3 to obtain the high ones */
				{
					arcsim_instruction_micro micro =
					{
						ARC_REG_TEMP3,
						ARC_REG_R0,
						ARC_REG_TEMP3,
						ARC_ALU_NOR,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}

				/* or the high ones into the destination register */
				{
					arcsim_instruction_micro micro =
					{
						instr.rd,
						ARC_REG_TEMP3,
						instr.rd,
						ARC_ALU_OR,
						0, 0
					};
					if(!arcsim_processor_minor(self, &micro)) { return false; }
				}
			}

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_SRL:
		{
			/* perform the shift operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rs2,
				instr.rd,
				ARC_ALU_SRL,
				0, 0
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_ST:
		{
			/* perform the store operation */
			arcsim_instruction_micro micro =
			{
				instr.rs1,
				instr.rd,
				ARC_REG_R0,
				ARC_ALU_OR,
				0, 1
			};
			if(!arcsim_processor_minor(self, &micro)) { return false; }

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_SUB:
		{
			/* form the one's complement negative of the subtrahend */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs2,
					ARC_REG_R0,
					ARC_REG_TEMP0,
					ARC_ALU_NOR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* form the two's complement negative of the subtrahend */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP0,
					ARC_REG_R0,
					ARC_REG_TEMP0,
					ARC_ALU_INC,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* perform the subtraction operation */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs1,
					ARC_REG_TEMP0,
					instr.rd,
					ARC_ALU_ADD,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_SUBCC:
		{
			/* form the one's complement negative of the subtrahend */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs2,
					ARC_REG_R0,
					ARC_REG_TEMP0,
					ARC_ALU_NOR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* form the two's complement negative of the subtrahend */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP0,
					ARC_REG_R0,
					ARC_REG_TEMP0,
					ARC_ALU_INC,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* perform the subtraction operation */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs1,
					ARC_REG_TEMP0,
					instr.rd,
					ARC_ALU_ADDCC,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_XOR:
		{
			/* form the complement of the first input */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs1,
					ARC_REG_R0,
					ARC_REG_TEMP2,
					ARC_ALU_NOR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* form the complement of the second input */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs2,
					ARC_REG_R0,
					ARC_REG_TEMP3,
					ARC_ALU_NOR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* form the product: (~A)(B) */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP2,
					instr.rs2,
					ARC_REG_TEMP2,
					ARC_ALU_AND,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* form the product: (A)(~B) */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP3,
					instr.rs1,
					ARC_REG_TEMP3,
					ARC_ALU_AND,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* perform the xor operation (sum the products) */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP2,
					ARC_REG_TEMP3,
					instr.rd,
					ARC_ALU_OR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		case ARC_INSTR_OPCODE_XORCC:
		{
			/* form the complement of the first input */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs1,
					ARC_REG_R0,
					ARC_REG_TEMP2,
					ARC_ALU_NOR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* form the complement of the second input */
			{
				arcsim_instruction_micro micro =
				{
					instr.rs2,
					ARC_REG_R0,
					ARC_REG_TEMP3,
					ARC_ALU_NOR,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* form the product: (~A)(B) */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP2,
					instr.rs2,
					ARC_REG_TEMP2,
					ARC_ALU_AND,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* form the product: (A)(~B) */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP3,
					instr.rs1,
					ARC_REG_TEMP3,
					ARC_ALU_AND,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* perform the xor operation (sum the products) */
			{
				arcsim_instruction_micro micro =
				{
					ARC_REG_TEMP2,
					ARC_REG_TEMP3,
					instr.rd,
					ARC_ALU_ORCC,
					0, 0
				};
				if(!arcsim_processor_minor(self, &micro)) { return false; }
			}

			/* increment the program counter */
			arcsim_processor_incpc(self);
		}
		break;

		default: { return false; }
	}

	/* executed successfully */
	return true;
}

static bool
arcsim_processor_decode(arcsim_processor *self, arcsim_instruction *instr, bool *halt)
{
	uint32 ir;
	uint32 op;
	uint32 op2;
	uint32 op3;
	uint32 fld13;
	uint32 fld22;
	uint32 fld30;

	/* read the value of the instruction register */
	arcsim_datapath_read(self->_datapath, ARC_REG_IR, &ir);

	/* decode the op fields of the instruction */
	op  = ((ir >> 30) & 0x00000003);
	op2 = ((ir >> 22) & 0x00000007);
	op3 = ((ir >> 19) & 0x0000003F);

	/* decode the data fields of the instruction */
	instr->cond   = ((ir >> 25) & 0x0000000F);
	instr->rd     = ((ir >> 25) & 0x0000001F);
	instr->rs1    = ((ir >> 14) & 0x0000001F);
	instr->rs2    = ((ir >>  0) & 0x0000001F);
	instr->is_imm = ((ir >> 13) & 0x00000001);
	fld13         = ((ir >>  0) & 0x00001FFF);
	fld22         = ((ir >>  0) & 0x003FFFFF);
	fld30         = ((ir >>  0) & 0x3FFFFFFF);

	/* set the op information */
	instr->opcode = (op << 6) | ((op == 0) ? op2 : ((op > 1) ? op3 : 0));
	instr->op     = op;

	/* handle halt special case */
	if(ir == ARC_INSTR_HALT_NEW || ir == ARC_INSTR_HALT)
	{
		*halt = true;
		printf("halt\n");
		return true;
	}
	*halt = false;

	#define ARC_DECODE_FAIL() \
			do { \
				fprintf(stderr, "Decode Failure: malformed instruction (%08X)\n", ir); \
				return false; \
			} while(0)

	/* check for required zeroes */
	if(instr->opcode == ARC_INSTR_OPCODE_BRANCH)
	{
		if((ir & 0x20000000) != 0) { ARC_DECODE_FAIL(); }
	}
	else if(instr->opcode == ARC_INSTR_OPCODE_NOP)
	{
		if(ir != ARC_INSTR_NOP) { ARC_DECODE_FAIL(); }
	}
	else if(op >= ARC_INSTR_OP_MATH && !instr->is_imm)
	{
		if((ir & 0x00001FE0) != 0) { ARC_DECODE_FAIL(); }
	}

	/* output disassembled instruction information */
	switch(op)
	{
		case ARC_INSTR_OP_SB:
		{
			switch(op2)
			{
				case ARC_INSTR_OP2_BRANCH:
				{
					char *opname;

					/* get the name of the instruction */
					switch(instr->cond)
					{
						case ARC_INSTR_COND_BE:   { opname = "be    "; } break;
						case ARC_INSTR_COND_BCS:  { opname = "bcs   "; } break;
						case ARC_INSTR_COND_BNEG: { opname = "bneg  "; } break;
						case ARC_INSTR_COND_BVS:  { opname = "bvs   "; } break;
						case ARC_INSTR_COND_BA:   { opname = "ba    "; } break;

						default: { ARC_DECODE_FAIL(); }
					}

					/* print the disassembled branch instruction */
					printf("%s0x%06X\n", opname, fld22);
				}
				break;

				case ARC_INSTR_OP2_NOP:
				{
					printf("nop\n");
				}
				break;

				case ARC_INSTR_OP2_SETHI:
				{
					printf("sethi 0x%06X, %%r%d\n", fld22, instr->rd);
				}
				break;

				default: { ARC_DECODE_FAIL(); }
			}
		}
		break;

		case ARC_INSTR_OP_CALL: { printf("call  0x%08X\n", fld30); } break;

		case ARC_INSTR_OP_MATH:
		case ARC_INSTR_OP_MEM:
		{
			char   *opname;
			char   *fmt;
			uint32  src2;

			/* get the name of the instruction */
			switch(instr->opcode)
			{
				case ARC_INSTR_OPCODE_ADD:   { opname = "add   "; } break;
				case ARC_INSTR_OPCODE_AND:   { opname = "and   "; } break;
				case ARC_INSTR_OPCODE_OR:    { opname = "or    "; } break;
				case ARC_INSTR_OPCODE_XOR:   { opname = "xor   "; } break;
				case ARC_INSTR_OPCODE_SUB:   { opname = "sub   "; } break;
				case ARC_INSTR_OPCODE_ORN:   { opname = "orn   "; } break;
				case ARC_INSTR_OPCODE_ADDCC: { opname = "addcc "; } break;
				case ARC_INSTR_OPCODE_ANDCC: { opname = "andcc "; } break;
				case ARC_INSTR_OPCODE_ORCC:  { opname = "orcc  "; } break;
				case ARC_INSTR_OPCODE_XORCC: { opname = "xorcc "; } break;
				case ARC_INSTR_OPCODE_SUBCC: { opname = "subcc "; } break;
				case ARC_INSTR_OPCODE_ORNCC: { opname = "orncc "; } break;
				case ARC_INSTR_OPCODE_SRL:   { opname = "srl   "; } break;
				case ARC_INSTR_OPCODE_SRA:   { opname = "sra   "; } break;
				case ARC_INSTR_OPCODE_JMPL:  { opname = "jmpl  "; } break;
				case ARC_INSTR_OPCODE_LD:    { opname = "ld    "; } break;
				case ARC_INSTR_OPCODE_ST:    { opname = "st    "; } break;

				default: { ARC_DECODE_FAIL(); }
			}

			/* set format and second source based on immediate bit */
			if(instr->is_imm)
			{
				fmt = "%s%%r%d, 0x%04X, %%r%d\n";
				src2 = fld13;
			}
			else
			{
				fmt = "%s%%r%d, %%r%d, %%r%d\n";
				src2 = instr->rs2;
			}

			/* print the disassembled math or memory instruction */
			printf(fmt, opname, instr->rs1, src2, instr->rd);
		}
		break;

		default: { ARC_DECODE_FAIL(); }
	}

	#undef ARC_DECODE_FAIL

	/* decoded successfully */
	return true;
}

static void
arcsim_processor_incpc(arcsim_processor *self)
{
	arcsim_instruction_micro instr =
	{
		ARC_REG_PC,
		ARC_REG_R0,
		ARC_REG_PC,
		ARC_ALU_INCPC,
		0, 0
	};
	arcsim_processor_minor(self, &instr);
}

static bool
arcsim_processor_minor(arcsim_processor *self, arcsim_instruction_micro *instr)
{
	arcsim_datapath_op alu_op;
	uint32             src1;
	uint32             src2;
	uint32             dst;

	/* read from the source registers */
	if(!arcsim_datapath_read(self->_datapath, instr->a, &src1)) { return false; }
	if(!arcsim_datapath_read(self->_datapath, instr->b, &src2)) { return false; }

	/* get the alu operation */
	alu_op = arcsim_datapath_getop(instr->alu);

	/* perform the alu operation */
	dst = alu_op(self->_datapath, src1, src2);

	/* perform the memory operation */
	if(instr->mem_rd)
	{
		if(!arcsim_memory_read(self->_memory, src1, &dst)) { return false; }
	}
	else if(instr->mem_wr)
	{
		if(!arcsim_memory_write(self->_memory, src1, src2)) { return false; }
		printf("\tMEM[%08X] <- %08X\n", src1, src2);
	}

	/* write the value to the destination register */
	if(!instr->mem_wr)
	{
		if(!arcsim_datapath_write(self->_datapath, instr->c, dst)) { return false; }
		if(instr->c != ARC_REG_R0)
		{
			arcsim_datapath_print_change(self->_datapath, instr->c);
		}
	}

	/* increment minor cycle count */
	++self->_minor_cycles;

	/* minor-cycled successfully */
	return true;
}

#ifdef	__cplusplus
};
#endif

# CSCI 343 Spring 2008
# Assignment 05
# Name: Daniel Strusser
# Email: dynomite1234@aol.com
# Date: April 01, 2008


	.data
	.globl addem
	.text
addem:
		move $t0, $0         # Initialize
		move $t1, $0
		move $t2, $0	     	
		move $t3, $0

Loop:
		sll $t1, $t0, 2      # Multiply by 4 to make word aligned
		add $t1, $t1, $a0    # $t1 = address of ar[i]
		lw $t3, 0($t1)       # Load ar[i]
	

		addi $t0, $t0, 1     # Increment counter
		add $s0, $s0, $t3    # Add value $s0 = $s0 + ar[i]
		bne $t0, $a1, Loop   # If counter Not 0, then Loop.
	
		move $v0, $s0	       # Return our value
		jr $ra               # Return to caller
	.end

# Instruction1 = A. 0x00400024, B. 0x00004021, C. addu $8, $0, $0,  D, move $t0, $0,      E. 8,  F. 0x00000000, G. 0x00000000, H. Set to 0
# Instruction2 = A. 0x00400028, B. 0x00004821, C. addu $9, $0, $0,  D. move $t1, $0,      E. 9,  F. 0xFFFF000C, G. 0x00000000, H. Set to 0
# Instruction3 = A. 0x0040002C, B. 0x00005021, C. addu $10, $0, $0, D. move $t2, $0,      E. 10, F. 0x00000001, G. 0x00000000, H. Set to 0
# Instruction7 = A. 0x0040003C, B. 0x8D2B0000, C. lw $11, 0($9),    D. lw $t3, 0($t1),    E. 11, F. 0x00000000, G. 0x00000002, H. Retrieved first number user inputted.
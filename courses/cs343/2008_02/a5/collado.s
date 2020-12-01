           .globl  addem
           .text
      
	addem:
                  li      $v0,0             # val=0
	loop:	  lw      $a2, 0($a0)	    # loads number into register
		  addi	  $a0, $a0, 4	    # go to next memory address in array
		  addi	  $a1, $a1, -1	    # count down array
		  add     $v0, $a2, $v0	    # add new number to sum
		  bne     $a1, $zero, loop  # loop back to add another number
		  jr      $ra               # Return to caller
                  .end
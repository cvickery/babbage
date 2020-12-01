             .globl  addem
                  .text
      addem:
            # Your code goes here.
      addi $v0 $zero, 0
	loop:	
    lw   $t0, 0($a0)
		add  $v0,$v0,$t0  # v0 += t0
    addi $a0, $a0, 4
		addi $a1, $a1,-1
    bne  $a1,$0,loop
		             jr      $ra               # Return to caller
                  .end

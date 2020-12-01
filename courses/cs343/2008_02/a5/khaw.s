         .globl  addem
         .text
      addem:
           add $v0,$0,$0 # crete to place the result
           add $t0,$a1,$zero #put the temp registar 0 to how many elements in the array
           
      loop:
            lw $t1,0($a0)#load the temp registar 1 to array $a0
            add $v0,$t1,$v0#add $a0 in $v0
            addi $t0,$t0,-1#add immediate to -1
            beq $t0,0,end#if $t0 is 0 finish
            addi $a0,$a0,4#if not add register $a0 to 4 to go to next register
            j loop#jump to the loop
      end:
            jr      $ra               # Return to caller
                  .end
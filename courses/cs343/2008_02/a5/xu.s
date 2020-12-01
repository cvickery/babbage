.globl  addem
                  .text
      addem:
            # Your code goes here.
            li $v0, 0             #initial the register to zero  
      loop: lw $t0, 0($a0)        #load from array 
            add $v0, $v0, $t0     #put it to the return register
            addi $a0, $a0, 4      #increase the index of array 
            addi $a1, $a1, -1     #decrease the size       
            bne $a1, $zero, loop  #if size of array != zero loop again


            jr      $ra               # Return to caller
            .end


.globl  addem
.text
      
addem:
        
	addi $v0,$zero,0 #set the sum to 0
	sll $a1,$a1,2 #multiply the number of places by 4
loop:
	add $t1,$a0,$a1 #get the address of the next number
	lw $t1,-4($t1) #load the next number
	add $v0,$v0,$t1  #add the number to the count

	addi $a1,$a1,-4 #move to the next place

	slt $t1,$zero,$a1 #did we pass the end	

	bne $t1,$zero,loop #if so loop
	jr      $ra               # Return to caller
.end
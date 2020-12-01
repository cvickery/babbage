# Function addem is used to add the elements of an array
# Terry Ramdeholl	

	.globl addem
	.text

	
addem:	
	
	lw $t0, 0($a0)		# $t0 = contents of array address in register
	add $t8, $t8, $t0	# $t8 = $t8 + $t0
	addi $a1, $a1, -1	# $a1 is decreased by 1
	addi $a0, $a0, 4	# go to address of next element in array
	bne $a1, $zero, addem	# if $a1 is not equal to 0 then go to addem
	add $v0, $t8, $zero	# $v0 = sum of array elements
	jr $ra			# else return to caller
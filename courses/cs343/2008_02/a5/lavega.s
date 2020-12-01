#Leonardo Lavega
#Assigment #5

.globl  addem
.text

addem:

	add	$t0,$a1,$0	# register t0 = number of elements in the array
	add	$v0,$0,$0	# v0 = 0 
loop:		
	lw	$t1,0($a0)	# $t1 = arr[$a0]	 
	add	$v0,$t1,$v0	# $V0 += arr[$ao]	
	addi	$a0,4		# a0 += 4 (next index of the array)
	addi	$t0,-1		# t0 = t0 - 1
	beq	$t0,$0,finish	# if (t0 == 0) goto finish 
	j loop			# else jump back to loop	

finish:
	
	jr      $ra               # Return to caller


.end


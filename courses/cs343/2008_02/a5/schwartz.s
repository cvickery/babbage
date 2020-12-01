##########################################################################################################################################
##	 _____         _      _____     _                 _          ___ ___ ___ ___ 							##
##	|     |___ ___| |_   |   __|___| |_ _ _ _ ___ ___| |_ ___   |_  |   |   | . |							##
##	| | | | .'|  _| '_|  |__   |  _|   | | | | .'|  _|  _|- _|  |  _| | | | | . |							##
##	|_|_|_|__,|_| |_,_|  |_____|___|_|_|_____|__,|_| |_| |___|  |___|___|___|___|							##
##																	##
## (c) Mark J. Schwartz -- 03/27/2008													##
## CS343 -- Dr. Vickery, Queens College													##
## addem.s -- a subroutine to add an array of integers, in MIPS assembly.								##
##																	##
## Register usage:															##
##	$a0	- initialy it is the starting address of the array, 4 is added in each successive loop to go to the next word		##
##	$a1	- hold a value which is equal to the number of elements in a0								##
##	$t0	- tempoaray storage area to hold a word, which is the value of a0[i] at the address a0					##
##	$v0	- the sum that will be returned to the caller										##
##########################################################################################################################################

		.globl addem
		.text
		

addem:
		
		lw	$t0, ($a0)		# load word from the address at a0 and place into s0
		add 	$v0, $v0, $t0		# add sum v0 and element at s0 and place into sum v0
		addi	$a1, $a1, -1		# subtract the number of elements by 1 and place value into a1
		addi 	$a0, $a0, 4		# add 4 to element address array to go to the next "word"
		bne	$a1, $zero, addem	# loop till a1 is 0
		beqz 	$a1, next		# go to next if a1 equals 0
next:		
		addi	$v0, $v0, -4		# subtract 4 from the sum register that contained a 0x4 when we started this subroutine
	
		jr	$ra			# return to the caller
		.end


                                                          
                                                                             
 

 


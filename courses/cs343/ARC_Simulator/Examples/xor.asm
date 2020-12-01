	.begin
	.org 2048

a_start .equ 3000
	ld [length], %g1
	ld [address], %g2

	xorcc %g1, %g2, %g3
	

length:		1
address:	2


	.end

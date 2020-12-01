	.org 2048
	ld [minus1], %g4
	srl	%g4, 1, %g5
	sra	%g4, 1, %g6 
	sra	%g4, 16, %r9
	sll	%g4, 8, %g7
	sll	%g4, 4, %r8
	.org 2096
minus1:		-1

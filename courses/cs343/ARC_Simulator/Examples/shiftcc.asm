	.org 2048
	ld [minus1], %g4
	srlcc	%g4, 1, %g5
	sracc	%g4, 1, %g6
	sracc	%g4, 16, %r9
	sllcc	%g4, 8, %g7
	sllcc	%g4, 4, %r8
	halt
	.org 2096
minus1:		-1

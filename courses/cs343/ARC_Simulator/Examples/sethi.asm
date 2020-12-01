	.org 2048

	ld [x], %r1
	sethi 0, %r1

	ld [x], %r2	!load -1 into %r2
	sethi 0xffffff, %r2 !value too big

	halt
x:	-1

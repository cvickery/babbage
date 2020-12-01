	.org 2048
	
	ld [len], %r1
	ld [len2], %r2
	add %r1, %r2, %r3
	halt

len:	2
len2:	-1
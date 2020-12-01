	.org 04000
astart	.equ 0xbb8
	add %r1, %r1, %r2
	ld [a], %r1
	ld [b], %r2
	ld [c], %r3
	.end
	.org astart
a:	05000
b:	0xbbb
c:	25
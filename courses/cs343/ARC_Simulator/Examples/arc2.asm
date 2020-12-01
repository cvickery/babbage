	begin
	.org 2048

a_start .equ 3000
	ld [length], %g1
	ld [address], %g2
	ld [a], %g3
	and %g3, %r0, %r4
	sub %g3, %r1, %r5
 	and %r1, %r1, %r0
	add %r1, -4, %r7
	add %r1, %r2, %r6
	or %r1, %r2, %i0
	sub %r6, %r2, %r6
	add %r15, 4, %i7

length:		20
address:	a_start

	.org 12288
a:		25
	.end

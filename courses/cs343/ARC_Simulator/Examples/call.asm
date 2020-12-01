	.begin 		!Begin assembly
!Random comments

	.org 2048	! Comment a trial....
a_start .equ 3000

	!Test coment
	sethi 0x304f1, %r0 ! with a comment
	sethi 0x304f1, %r0
	ld [length], %r1
	ld [address], %r2
	ld [a_start],%r14	!mmmmm
	andcc %r3, %r0, %r3

	call callpt
	halt

callpt: addcc %r1, -4, %r1
	halt
length:		20
address:	a_start

	.org a_start
a:		25
		-10	!test
		33
		-5
		7
		9
	.end
!More comments

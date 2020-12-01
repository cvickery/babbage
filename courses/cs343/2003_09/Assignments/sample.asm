
		.org	0x300
start:		add 	%r0, x,   %r1
		add	%r0, 4,   %r2
		addcc  %r0, 0,   %r3
loop:		ld	%r1, %r4
		add	%r3, %r4, %r3
		add	%r1, 4,   %r1
		addcc	%r2, -1,  %r2
		bne	loop
		st	%r3, %r1
		halt

		.org	0x400
x:		5 10 15 20
		.end

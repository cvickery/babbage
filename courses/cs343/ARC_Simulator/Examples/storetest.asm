	.org 3000	

	ld [len], %r1
! each one of the locations will contain -1
	ld [disp], %r2
	st %r1, [st1]
	st %r1, %r2 + st1
	st %r1, %r0, [st3]
	halt
	.org 3032
disp:	4
len:	-1
st1:	20
st2:	20
st3:	20

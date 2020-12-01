	
	ld [len], %r1 
	ld [len], %r0, %r2 
	ld %r0+len, %r3 
	ld [len2], %r4 
	ld [len2], %r0, %r5 
	ld [len2], %r6 
	halt
len:	 -1
len2:	 20

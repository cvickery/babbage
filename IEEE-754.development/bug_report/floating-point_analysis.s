	.section	__TEXT,__text,regular,pure_instructions
	.section	__TEXT,__literal4,4byte_literals
	.align	2
LCPI1_0:
	.long	1123516416
	.section	__TEXT,__text,regular,pure_instructions
	.globl	_main
	.align	4, 0x90
_main:
Leh_func_begin1:
	pushq	%rbp
Ltmp0:
	movq	%rsp, %rbp
Ltmp1:
	subq	$96, %rsp
Ltmp2:
	movl	%edi, -4(%rbp)
	movq	%rsi, -16(%rbp)
	flds	LCPI1_0(%rip)
	fstpt	-48(%rbp)
	movl	-4(%rbp), %eax
	cmpl	$2, %eax
	##FP_REG_KILL
	jne	LBB1_2
	movq	-16(%rbp), %rax
	movq	8(%rax), %rax
	xorl	%ecx, %ecx
	movq	%rax, %rdi
	movq	%rcx, %rsi
	callq	_strtold
	fstpt	-48(%rbp)
	##FP_REG_KILL
LBB1_2:
	leaq	-64(%rbp), %rax
	fldt	-48(%rbp)
	fstpt	(%rax)
	movq	-64(%rbp), %rax
	movq	-56(%rbp), %rcx
	fldt	-64(%rbp)
	movq	%rsp, %rdx
	fstpt	(%rdx)
	xorb	%dl, %dl
	leaq	L_.str(%rip), %rsi
	movq	%rsi, %rdi
	movq	%rax, %rsi
	movb	%dl, -65(%rbp)
	movq	%rcx, %rdx
	movb	-65(%rbp), %al
	callq	_printf
	xorl	%eax, %eax
	movl	%eax, %edi
	callq	_exit
	##FP_REG_KILL
Leh_func_end1:

	.section	__TEXT,__cstring,cstring_literals
	.align	3
L_.str:
	.asciz	 "Binary128\n  Value:       %Lg (%016lX%016lX)\n"

	.section	__TEXT,__eh_frame,coalesced,no_toc+strip_static_syms+live_support
EH_frame0:
Lsection_eh_frame:
Leh_frame_common:
Lset0 = Leh_frame_common_end-Leh_frame_common_begin
	.long	Lset0
Leh_frame_common_begin:
	.long	0
	.byte	1
	.asciz	 "zR"
	.byte	1
	.byte	120
	.byte	16
	.byte	1
	.byte	16
	.byte	12
	.byte	7
	.byte	8
	.byte	144
	.byte	1
	.align	3
Leh_frame_common_end:
	.globl	_main.eh
_main.eh:
Lset1 = Leh_frame_end1-Leh_frame_begin1
	.long	Lset1
Leh_frame_begin1:
Lset2 = Leh_frame_begin1-Leh_frame_common
	.long	Lset2
Ltmp3:
	.quad	Leh_func_begin1-Ltmp3
Lset3 = Leh_func_end1-Leh_func_begin1
	.quad	Lset3
	.byte	0
	.byte	4
Lset4 = Ltmp0-Leh_func_begin1
	.long	Lset4
	.byte	14
	.byte	16
	.byte	134
	.byte	2
	.byte	4
Lset5 = Ltmp1-Ltmp0
	.long	Lset5
	.byte	13
	.byte	6
	.align	3
Leh_frame_end1:


.subsections_via_symbols

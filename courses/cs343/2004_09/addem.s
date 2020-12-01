#   Add five numbers
#   C. Vickery
#   CS-343

#   Entry point
        .globl  main

#   Values to sum
        .data
alpha:  .word   5, -5, 10, -10, -123

#   Code
        .text
main:   li      $t0, 0          # i   = 0
        li      $a0, 0          # sum = 0
        li      $t1, 0x14       # lim = 20

loop:   lw      $a1, alpha($t0) # x = alpha(i)
        add     $a0, $a0, $a1   # sum += x
        addi    $t0, $t0, 4     # i++
        blt     $t0, $t1, loop  # i < lim

        li      $v0, 1          # print_in
        syscall
        li      $v0, 10         # exit
        syscall

        .end

# My version of the students' code


# ccv 2006-03-29


# addem()
# Vector Sum

# $a0 Address of vector
# $a1 Number of elements
# $v0 Sum is returned here.
            .globl  addem
            .text
addem:

# Initialize
            li      $v0,0           #  Sum

addem_1:    lw      $t0,0($a0)
            add     $v0,$v0,$t0
            addi    $a0,$a0,4
            addi    $a1,$a1,-1
            bne     $a1,$zero,addem_1;

#force_an_error:            addi    $v0,$v0,1
            jr      $ra

          .end


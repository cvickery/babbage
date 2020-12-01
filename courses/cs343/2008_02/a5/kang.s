
.globl addem
.text

addem: lw $16,0($4)
add $24, $24, $16
addi $4, $4, 4
sub $5, $5, 1
bne $5, $zero, addem
move $2, $24
jr $ra
.end


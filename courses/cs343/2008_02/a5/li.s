#Shufeng Li
#CS343

        .globl addem
        .text
        
addem:
      
        addi $v0, $zero, 0        #initialize sum
addem_1:lw   $t0, 0($a0)          #load value in $a0 to $t0(temp)
        add  $v0, $v0, $t0        #sum=sum+temp
        addi $a0, $a0, 4          #shift $a0 to the next value
        addi $a1, $a1, -1         #reduce # of words by 1
        bne  $a1, $0, addem_1     #loop if # of word is not = 0
        jr   $ra                  #jump to return address
        .end



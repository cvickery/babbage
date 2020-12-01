//  ControlWord.java

public class ControlWord
{
  private static final int NUM_CONTROL_BITS = 10;
  private static final int Jump     = 9;
  private static final int RegDst   = 8;
  private static final int ALUSrc   = 7;
  private static final int MemToReg = 6;
  private static final int RegWrite = 5;
  private static final int MemRead  = 4;
  private static final int MemWrite = 3;
  private static final int Branch   = 2;
  private static final int ALUOp1   = 1;
  private static final int ALUOp0   = 0;

  private static final int r_type   = 0x00;
  private static final int lw       = 0x23;
  private static final int sw       = 0x2B;
  private static final int beq      = 0x04;
  private static final int bne      = 0x05;
  private static final int addi     = 0x08;
  private static final int andi     = 0x0C;
  private static final int j        = 0x02;
  private static final int ori      = 0x0D;
  private static final int slti     = 0x0A;
  private static final int lui      = 0x0F;

  char[] theWord;
  String mnemonic = "   op?";

  private void setBits(String bits)
  {
    if (bits.length() != NUM_CONTROL_BITS)
    {
      throw new RuntimeException("setbits: " + bits.length() + "!=" +
          NUM_CONTROL_BITS);
    }
    for (int i=0; i<NUM_CONTROL_BITS; i++)
    {
      theWord[i] = bits.charAt(i);
    }
  }


  public ControlWord(int opcode, int rs, int rt, int rd, int shamt,
      int func, int immediate, int address)
  {
    theWord = new char[NUM_CONTROL_BITS];
    for (int i=0; i<NUM_CONTROL_BITS; i++)
    {
      theWord[i] = '?';
    }
    switch (opcode)
    {
      case r_type:
        mnemonic = "r_type";
        setBits("0100100010");
        break;

      case lw:
        mnemonic = "    lw";
        setBits("0011110000");
        break;

      case sw:
        mnemonic = "    sw";
        setBits("0X1X001000");
        break;

      case beq:
        mnemonic = "   beq";
        setBits("0X0X000101");
        break;

      case bne:
        mnemonic = "   bne";
        break;

      case addi:
        mnemonic = "  addi";
        setBits("0110100010");
        break;

      case andi:
        mnemonic = "  andi";
        setBits("0110100010");
        break;

      case j:
        mnemonic = "     j";
        setBits("1XXX0X0XXX");
        break;

      case lui:
        mnemonic = "   lui";
        break;

      case ori:
        mnemonic = "   ori";
        setBits("0110100010");
        break;

      case slti:
        mnemonic = "  slti";
        setBits("0110100010");
        break;

      
      default:  System.err.println("Unhandled opcode: " + opcode);
    }
  }

  public String toString()
  {
    StringBuffer sb = new StringBuffer();
    sb.append(mnemonic + ": ");
    sb.append("Jmp="+theWord[Jump]+" ");
    sb.append("RgDs="+theWord[RegDst]+" ");
    sb.append("ASrc="+theWord[ALUSrc]+" ");
    sb.append("M2Rg="+theWord[MemToReg]+" ");
    sb.append("RgWr="+theWord[RegWrite]+" ");
    sb.append("MRd="+theWord[MemRead]+" ");
    sb.append("MWr="+theWord[MemWrite]+" ");
    sb.append("Br="+theWord[Branch]+" ");
    sb.append("AOp1="+theWord[ALUOp1]+" ");
    sb.append("AOp0="+theWord[ALUOp0]+" ");
    return sb.toString();
  }
}


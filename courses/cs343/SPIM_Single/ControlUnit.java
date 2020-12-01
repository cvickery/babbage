//  ControlUnit.java

import java.io.*;

public class ControlUnit
{
  public static ControlWord generateControlWord(long instruction)
  {
    int opcode  =   (int)((instruction & 0x0FC000000) >> 26);
    int rs      =   (int)((instruction & 0x003E00000) >> 21);
    int rt      =   (int)((instruction & 0x0001F0000) >> 16);
    int rd      =   (int)((instruction & 0x00000F800) >> 11);
    int shamt   =   (int)((instruction & 0x0000007C0) >>  6);
    int func    =   (int)(instruction & 0x00000003F);
    int immediate = (int)(instruction & 0x0000FFFF);
    int address   = (int)(instruction & 0x03FFFFFF);
    return new ControlWord(opcode, rs, rt, rd, shamt, func, immediate,
        address);
  }
  public static void main(String[] args) throws IOException,
                                          NumberFormatException
  {
    for (int arg = 0; arg < args.length; arg++ )
    {
      BufferedReader br = new BufferedReader(
        new FileReader( args[arg] ) );
      System.out.println("\nFile: " + args[arg] );
      String  lineBuf;
      while ( (lineBuf = br.readLine()) != null )
      {
        lineBuf.trim();
        System.out.println(lineBuf);
        int firstSpace = lineBuf.indexOf(" ");
        lineBuf = lineBuf.substring(0, firstSpace);
        Long LongVal = Long.decode(lineBuf);
        long instruction = LongVal.longValue();
        ControlWord cw = ControlUnit.generateControlWord(instruction);
        System.out.println( "  " + cw );
      }
    }
    System.exit(0);
  }
}

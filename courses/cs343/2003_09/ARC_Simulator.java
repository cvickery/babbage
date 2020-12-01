/* $Id: ARC_Simulator.java,v 1.1 2003/11/21 19:05:14 vickery Exp $
 * 
 *  Created on: Nov 19, 2003
 *  Author:     C. Vickery
 *
 *  Copyright (c) 2003, Queens College of the City University
 *  of New York.  All rights reserved.
 * 
 *  Redistribution and use in source and binary forms, with or
 *  without modification, are permitted provided that the
 *  following conditions are met:
 *
 *      * Redistributions of source code must retain the above
 *        copyright notice, this list of conditions and the
 *        following disclaimer.
 * 
 *      * Redistributions in binary form must reproduce the
 *        above copyright notice, this list of conditions and
 *        the following disclaimer in the documentation and/or
 *        other materials provided with the distribution.  
 * 
 *      * Neither the name of Queens College of CUNY
 *        nor the names of its contributors may be used to
 *        endorse or promote products derived from this
 *        software without specific prior written permission.
 *
 *  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
 *  CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED
 *  WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 *  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 *  PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 *  OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 *  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 *  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR
 *  BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 *  LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 *  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT
 *  OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *  POSSIBILITY OF SUCH DAMAGE.
 *
 *    $Log: ARC_Simulator.java,v $
 *    Revision 1.1  2003/11/21 19:05:14  vickery
 *    Changed name of main class to ARC_Simulator.
 *    Added class UnimplementedOpCodeException.
 *
 *    Revision 1.2  2003/11/21 06:11:29  vickery
 *    Added Javadoc version tags.
 *
 *    Revision 1.1  2003/11/21 06:05:39  vickery
 *    Initial version of a simulator for the ARC CPU and memory.
 *
 */

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.StringTokenizer;
import javax.swing.JFrame;


//  Class Simulator
//  ------------------------------------------------------------------
/**
 *    <p>A simulator for the ARC Processor in the Murdocca and Heuring
 *    text, <i>Principles of Computer Architecture</i>.  This version
 *    of the simulator operates from the command line, and has no
 *    graphical user interface.</p>
 *
 *    <p>Use the assembler available with the Murdocca and Heuring
 *    program to assemble programs to be run.  In the editor for that
 *    assembler, click on File-&gt;Save (Ctrl-S), which will save a
 *    ".bin" file, which can be loaded into this simulator for
 *    execution.</p>
 *
 *    <p>The .bin files produced by the text's assembler and
 *    recognized by this assembler are simple text files with each
 *    line giving the contents of one 4 byte word of simulated memory,
 *    specified as two hexadecimal strings, representing an address
 *    and a data value.  This program assumes execution starts at the
 *    first word of memory that does not contain 0x00000000.</p>
 *    
 *    <p>This simulator is invoked by the command line using the
 *    following form:</p>
 *    <pre>
 *          java Simulator [options] file ...
 *    </pre>
 *
 *    <p><a name="params">The program recognizes the following command
 *    line options:</a></p>
 *    <pre>
 *          -m  size    Size is the size of the simulated memory
 *                      in bytes.  The default value is 1 MB.  This
 *                      value should be made smaller if Java gives an
 *                      out of memory error.
 *
 *          -n  num     Num is the maximum number of nop instructions
 *                      the simulator should execute before stopping.
 *                      The default number is ten.
 *    </pre>
 *
 *    <p>Any number of file names may be listed after the options;
 *    each will be loaded into a fresh copy of simulated memory and
 *    executed.</p>
 *
 *    <p>The program displays a cycle-by-cycle description of what it
 *    is doing as it runs.  It will stop either when the nop limit has
 *    been reached or a halt instruction is encountered.  Nop
 *    instructions are all zeros, and will be found in all
 *    uninitialized words of memory.  Halt is a special instruction
 *    that the textbook's assembler recognizes in addition to the ones
 *    listed in the book.  That assembler also recognizes bne (branch
 *    not equal) and add (add but don't change condition code bits),
 *    which this simulator processes also.</p>
 *
 *    @author   C. Vickery
 *    @version  $Revision: 1.1 $
 */
  public class ARC_Simulator  extends     JFrame
                          implements  Register_Names, ALU_Operations
  {
    /** Memory size, in bytes.                          */
    static int memSize          = 1 << 20;
    /** Maximum number of nops before simulation stops. */
    static int maxNops          = 10;
    /** Number of nops encountered so far.              */
    static int numNops          = 0;
    /** Number of instructions executed so far.         */
    static int numInstructions  = 0;
    /** Number of unimplemented opcodes                 */
    static int numUnimplemented = 0;
    /** Number of clock cycles so far.                  */
    static int numClocks        = 0;
    
    /** Should memory write operations be logged?       */
    static boolean logWrites    = false;
    /** Should memory read operations be logged?        */
    static boolean logReads     = true;
    /** Should register updates be logged?              */
    static boolean logRegs      = true;


  //  Constructor
  //  ----------------------------------------------------------------
  /**
   *    Creates a Graphical User Interface for interacting with the
   *    simulator.  Or will when the code for it has been written!
   * 
   *    @param  title   String to display in the title bar, which
   *                    should be the name of the file being executed.
   *
   */
    ARC_Simulator( String title )
    {
      super( title );
    }

  //  hexadize()
  //  ----------------------------------------------------------------
  /**
   *    Generates the n-digit hexadecimal representation of an int.
   */
    static String hexadize( int val, int numDigits )
    {
      StringBuffer sb = new StringBuffer( Long.toHexString( val ) );
      while (sb.length() < numDigits )
      {
        sb.insert(0, '0' );
      }
      if ( sb.length() > numDigits )
      {
        sb.delete( 0,  (sb.length() - numDigits) );
      }
      for (int i = 0; i < numDigits; i++ )
      {
        char c = Character.toUpperCase( sb.charAt( i ) );
        sb.setCharAt( i, c );
      }
      return new String( sb );
    }


    //  log()
    //  --------------------------------------------------------------
    /**
     *    <p>Displays messages about the simulation process without
     *    appending a newline so more information can be appended
     *    to the same line.</p>
     * 
     *    <p>Right now it writes to the console.  A future version
     *    would display these messages in the gui.</p>
     */
      static void log( String msg )
      {
        System.out.print( msg );
      }


    //  lognl()
    //  --------------------------------------------------------------
    /**
     *    <p>Displays messages about the simulation process, including
     *    a newline at the end.</p>
     * 
     *    <p>Right now it writes to the console.  A future version
     *    would display these messages in the gui.</p>
     */
      static void lognl( String msg )
      {
        System.out.println( msg );
      }


  //  main()
  //  ----------------------------------------------------------------
  /**
   *  <p>Processes command line arguments, loads files into simulated
   *  memory, and manages the simulation(s).</p>
   *
   *  @param  args  The command line arguments, as specified in the
   *                <a href="#params">description of this class</a>.
   */
    public static void main(String[] args)
    {
      for (int f = 0; f < args.length; f++ )
      {
        //  Read a program into memory
        logWrites = false;    //  Makes program loading silent.
        try
        {
          BufferedReader br = new BufferedReader(
                                         new FileReader( args[ f ]) );
          String line = null;
          System.out.println( "\nProcessing file: " + args[ f ] );
          Memory.clear( memSize );
          while ( (line = br.readLine()) != null )
          {
            StringTokenizer st = new StringTokenizer( line );
            String addr     = st.nextToken();
            String cont     = st.nextToken();
            long address    = Long.parseLong( addr, 16 );
            long data       = Long.parseLong( cont, 16 );
            Memory.writeWord( (int)(address & 0x7FFFFFFF), 
                              (int)(data    & 0x0FFFFFFFF) );
          }
        }
        catch (NumberFormatException e)
        {
          System.err.println( "Content error while processing " + 
                                                  args[f] + ": " + e);
          continue;
        }
        catch (FileNotFoundException e)
        {
          System.err.println( "File not found: " + args[f] );
          continue;
        }
        catch (IOException e)
        {
          System.err.println(e);
          continue;
        }
        
        //  Memory is initialized; assume first non-zero location is
        //  first instruction.
        int initPC = Memory.findFirst();
        if ( initPC < 0 )
        {
          lognl( "Empty file" );
          continue;
        }
        log(   "Program loaded." );
        lognl( "  First non-zero location is " + 
                                              hexadize( initPC, 6 ) ); 

        Registers.setValue( pc, initPC );
        lognl( "First instruction found at " + 
                               hexadize( Registers.getValue(pc), 6) );
        
      //  The fetch-execute Cycle
      //  ----------------------------------------------------------
      /*
       *  Execute until a halt instruction or the limit on nop
       *  instructions is reached.
       */
        logWrites         = true;
        numClocks         = 0; 
        numInstructions   = 0;
        numUnimplemented  = 0;
        numNops           = 0;
        while ( numNops < maxNops )
        {
          /*
           *    Fetch
           */
            Registers.setValue( ir, 
                           Memory.readWord( Registers.getValue(pc) ));
            log( "           " );
            log( "  PC: " + hexadize( Registers.getValue(pc), 6 ) +
                 "  IR: " + hexadize( Registers.getValue(ir), 8 ) );
  
          /*
           *    Decode
           */
            IR.decode();
  
          /*
           *    Execute
           */
            if ( Registers.getValue( ir ) == 0x91d02000 )
            {
              lognl( "  halt" );
              break;
            }
            numInstructions++;

            try
            {
              switch ( IR.op )
              {
                case 0:
                  doBranch();
                  break;
              
                case 1:
                  //  Execute call instructions.
                  Registers.setValue( 15, Registers.getValue( pc ) );
                  Registers.setValue( pc, 
                          Registers.getValue( pc ) + IR.disp30 << 2 );
                  break;
              
                case 2:
                  doArithmetic();
                  break;
              
                case 3:
                  doMemory();
                  break;
              
                default:
                  throw new RuntimeException( "Invalid op field: " +
                                                              IR.op );
              }
            }
            catch ( UnimplementedOpcodeException uoe )
            {
              lognl( uoe.getMessage() );
              numUnimplemented++;
              Registers.setValue( pc, 
                       ALU.do_op( Registers.getValue(pc), 0, INCPC ));
            }
        }
        //  Execution complete.  Log statistics and go on to next
        //  program.
        lognl( "\nExecution summary for file " + args[ f ] + ":" );
        lognl( "  Instructions executed:  " + numInstructions   );
        lognl( "  Invalid op codes:       " + numUnimplemented  );
        lognl( "  Nops:                   " + numNops           );
        lognl( "  Clock cycles:           " + numClocks         );
      }
    }

  //  doBranch()
  //  ----------------------------------------------------------------
  /**
   *    Process branch, sethi, and nop instructions.
   * 
   *    @throws UnimplementedOpcodeException if the op2 field is not
   *            recognized or if op2 is  branch and the cond field is
   *            not recognized.
   */
    static void doBranch()         throws UnimplementedOpcodeException
    {
      switch ( IR.op2 )
      {
        case 0:
          lognl( "  nop");
          numNops++;
          break;
          
        case 2:
        boolean doBranch = false;

          switch ( IR.cond )
          {
            case 000:
              lognl( "  be" );
              doBranch = ALU.Z_bit;
              break;
              
            case 005:
              lognl( "  bcs" );
              doBranch = ALU.C_bit;
              break;
            
            case 006:
              lognl( "  bneg" );
              doBranch = ALU.N_bit;
              break;
              
            case 007:
              lognl( "  bvs" );
              doBranch = ALU.V_bit;
              break;
              
            case 010:
              lognl( "  ba" );
              doBranch = true;
                return;
              
            case 011: // Extended opcode
              lognl( "  bne" );
              doBranch = ! ALU.Z_bit;
              break;

            default:
              throw new UnimplementedOpcodeException( 
                          "  Unimplemented Branch cond: " + IR.cond );
          }
          if ( doBranch )
          {
            //  Calculate branch target address, and branch
            Registers.setValue( t0,
              ALU.do_op( Registers.getValue( pc ), IR.disp22, ADD ) );
            Registers.setValue( pc, Registers.getValue( t0 ) );
            return;
          }
          break;

        case 4:
          lognl( "  sethi");
          Registers.setValue( IR.rd,
                                ALU.do_op( IR.disp22, 0, LSHIFT10 ) );
          break;

        default:
          throw new UnimplementedOpcodeException( 
                      "  Unimplemented Branch/sethi op2: " + IR.op2 );
      }
      //  nop, sethi, and failed branch update the pc.
      Registers.setValue( pc, 
             ALU.do_op( Registers.getValue(pc), 0, INCPC ));
    }


  //  doArithmetic()
  //  ----------------------------------------------------------------
  /**
   *    Process arithmetic instructions.
   *
   *    @throws UnimplementedOpcodeException if the op3 field is not
   *            recognized.
   */
    static void doArithmetic()     throws UnimplementedOpcodeException
    {
      switch ( IR.op3 )
      {
        case 000: //  add - Extended opcode
          lognl( "  add" );
          Registers.setValue( IR.rd, ALU.do_op( 
                       Registers.getValue( IR.rs1 ), (IR.i_bit == 1) ?
                    IR.simm13 : Registers.getValue( IR.rs2 ), ADD ) );
          break;

        case 020: //  addcc
          lognl( "  addcc" );
          Registers.setValue( IR.rd, ALU.do_op( 
                       Registers.getValue( IR.rs1 ), (IR.i_bit == 1) ?
                  IR.simm13 : Registers.getValue( IR.rs2 ), ADDCC ) );
          break;

        case 021: //  andcc
          lognl( "  andcc" );
          Registers.setValue( IR.rd, ALU.do_op( 
                       Registers.getValue( IR.rs1 ), (IR.i_bit == 1) ?
                  IR.simm13 : Registers.getValue( IR.rs2 ), ANDCC ) );
          break;

        case 022: //  orcc
          lognl( "  orcc" );
          Registers.setValue( IR.rd, ALU.do_op( 
                       Registers.getValue( IR.rs1 ), (IR.i_bit == 1) ?
                   IR.simm13 : Registers.getValue( IR.rs2 ), ORCC ) );
          break;

        case 026: //  orncc
          lognl( "  orncc" );
          Registers.setValue( IR.rd, ALU.do_op( 
                       Registers.getValue( IR.rs1 ), (IR.i_bit == 1) ?
                  IR.simm13 : Registers.getValue( IR.rs2 ), NORCC ) );
          break;

        case 046: //  srl
          lognl( "  srl" );
          Registers.setValue( IR.rd, ALU.do_op( 
                       Registers.getValue( IR.rs1 ), (IR.i_bit == 1) ?
                    IR.simm13 : Registers.getValue( IR.rs2 ), SRL ) );
          break;

        case 070: //  jmpl
          lognl( "  jmpl" );
          Registers.setValue( IR.rd, Registers.getValue( pc ) );
          Registers.setValue( IR.pc, 
            ALU.do_op( Registers.getValue( IR.rs1 ), (IR.i_bit == 1) ?
                    IR.simm13 : Registers.getValue( IR.rs2 ), ADD ) );
          return;  // Don't update PC

        default:
          throw new UnimplementedOpcodeException( 
                        "  Unimplemented Arithmetic op3: " + IR.op3 );
      }
      //  All arithmetic instructions except jmpl update the pc.
      Registers.setValue( pc, 
             ALU.do_op( Registers.getValue(pc), 0, INCPC ));
    }


  //  doMemory()
  //  ----------------------------------------------------------------
  /**
   *    Process ld/st instructions.
   * 
   *    @throws UnimplementedOpcodeException if the op3 field is not
   *            recognized.
   */
    static void doMemory()         throws UnimplementedOpcodeException
    {
      switch ( IR.op3 )
      {
        case 000:
          lognl( "  ld" );
          Registers.setValue( t0,
                              ALU.do_op( Registers.getValue( IR.rs1 ),
           (IR.i_bit == 1) ? IR.simm13 : Registers.getValue( IR.rs2 ),
                                                               ADD ));
          Registers.setValue( IR.rd,
                        Memory.readWord( Registers.getValue( t0 ) ) );
          break;

        case 004:
          lognl( "  st" );
          Registers.setValue( t0,
                              ALU.do_op( Registers.getValue( IR.rs1 ),
           (IR.i_bit == 1) ? IR.simm13 : Registers.getValue( IR.rs2 ),
                                                               ADD ));
          Memory.writeWord( Registers.getValue( t0 ), 
                            Registers.getValue( IR.rd ));
          break;

        default:
          throw new UnimplementedOpcodeException( 
                            "  Unimplemented Memory op3: " + IR.op3 );
      }

      //  Both memory operations update the pc.
      Registers.setValue( pc, 
             ALU.do_op( Registers.getValue(pc), 0, INCPC ));
    }
  }

/* $Id: FixedPoint.java,v 1.2 2003/11/17 00:09:43 vickery Exp $
 * 
 *  Created on: Nov 15, 2003
 *  $Log: FixedPoint.java,v $
 *  Revision 1.2  2003/11/17 00:09:43  vickery
 *  Generated documentation.
 *  Cleaned up option processing for file and stdin input.
 *
 */

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.text.DecimalFormat;
import java.util.Hashtable;

//  Class FixedPoint
//  ------------------------------------------------------------------
/**
 *  <p>Application to generate Handel-C fixed-point literals from
 *  floating-point values supplied as command line arguments and/or
 *  from the contents of a text file.</p>
 *
 *  <p>The Handel-C Fixed-Point library generates fixed-point literals
 *  only for real numbers that can be exactly represented within
 *  the number of integer and fraction bits available.  This program
 *  generates <i>FixedLiteral()</i> calls with the last parameter (the 
 *  value) set to the nearest floating-point number to the desired
 *  value that can be exactly represented within the number of bits
 *  available for the integer and fraction fields.</p>
 * 
 *  <p>The program can also generate a typedef statement before each
 *  distinct form of literal requested.</p>
 * 
 *  <p>Output lines consist of a call to <i>FixedLiteral()</i>
 *  followed by a comma (so the call can be part of an initialization
 *  list for an array or rom), and a comment indicating the value
 *  requested and the difference between the requested value and the
 *  value used as the last parameter passed to <i>FixedLiteral()</i>.
 *  </p>
 * 
 * <p>If a value requested is outside the range of values that can
 *  be represented in fixed point notation, the maximum positive (or
 *  minimum negative) value is used, and the comment field indicates
 *  overflow.</p>
 * 
 * <p> <b>Usage:</b> <code>java FixedPoint [args]</code>
 *
 *  @author C. Vickery
 *
 */
  public class FixedPoint
  {
    /* Format for generating comments and variable names */
    /*  Parameters for generating literals  */
    static boolean        isSigned    = true;
    static short          intBits     = 2;
    static short          fracBits    = 2;
    static boolean        doTypedefs  = true;

    static BufferedReader in          = null;
    static Hashtable      typedefs    = new Hashtable();


  //  Constructor
  //  ----------------------------------------------------------------
  /**
   *    Disable constructor; everything is static.
   */
    private FixedPoint( ) {}


  //  main()
  //  ----------------------------------------------------------------
  /**
   *  Prints a Handel-C fixed-point literal declaration for each
   *  command line argument.
   * 
   *  @param  args                  List of numeric arguments for
   *                                which fixed-point literals will
   *                                be generated.
   *
   *  <p>The following options may be specified any number of times on
   *  the command line, and determine the interpretation of all
   *  arguments to the right of them:</p>
   *  <pre>                              
   *    -i  number          Number of integer bits. (default is 2)
   *    -f  number          Number of fraction bits. (default is 2)
   *    -s                  Generate signed literals. (default)
   *    -u                  Generate unsigned literals.
   *    -t                  Toggle whether to generate typedefs
   *                        or not. (Initially true)
   *
   *    -file [file_name]   Read values from a file, or from stdin
   *                        if file_name is "-" or if there are no
   *                        more arguments.
   *    -input [file_name]  Same as -file.
   *  </pre>
   */
    public static void main(String[] args)
    {
      //  If no args, read values from stdin
      if ( args.length == 0 )
      {
        try
        {
          in = new BufferedReader( 
                           new InputStreamReader( System.in ) );
          String arg = in.readLine();
          while ( arg != null )
          {
            generate( arg );
            arg = in.readLine();
          }
          System.exit( 0 );
        }
        catch ( IOException ioe )
        {
          System.err.println( ioe );
          System.exit( 1 );
        }
      }

      //  Process command line args from left to right
      for( int a = 0; a < args.length; a++ )
      {
        try
        {
          //  Process options
          //  --------------------------------------------------------
          if ( "-s".equals(args[a]) )
          {
            isSigned = true;
            continue;
          }
          if ( "-u".equals(args[a]) )
          {
            isSigned = false;
            continue;
          }
          
          if ( "-f".equals(args[a]) )
          {
            fracBits = Integer.decode(args[++a]).shortValue();
            if ( fracBits < 0 )
            {
              System.err.println( "Number of fraction bits (" +
              fracBits + ") may not be negative." );
              fracBits = 0;
            }
            checkNumBits();
            continue;
          }
          
          if ( "-i".equals(args[a]) )
          {
            intBits = Integer.decode(args[++a]).shortValue();
            if ( intBits < 0 )
            {
              System.err.println( "Number of integer bits (" +
              intBits + ") may not be negative." );
              intBits = 0;
            }
            checkNumBits();
            continue;
          }
          
          if ( "-t".equals(args[a]) )
          {
            doTypedefs = !doTypedefs;
            continue;
          }

          //  File or stdin processing ...
          if ( "-input".equals(args[a]) || "-file".equals(args[a]) )
          {
            if ( (args.length > ++a) && ! "-".equals( args[a]) )
            {
              try
              {
                in = new BufferedReader( new FileReader(args[a]) );
              }
              catch( IOException ioe )
              {
                System.err.println( ioe );
                continue;
              }
            }
            else
            {
              in = new BufferedReader( 
                                 new InputStreamReader( System.in ) );
            }
            String arg = in.readLine();
            while ( arg != null )
            {
              generate( arg );
              arg = in.readLine();
            }
            continue;
          }
          
          //  Process values
          generate( args[a] );
        }
        catch ( NumberFormatException nfe )
        {
          System.err.println( "\"" + nfe.getMessage() + "\"" +
                                           " is not a valid number" );
          continue;
        }
        catch ( IOException ioe )
        {
          System.err.println( ioe );
        }
      }
    }
    
  //  generate()
  //  ----------------------------------------------------------------
  /**
   *    Generates a Handel-C Fixed-Point literal suitable for
   *    inclusion in an initialization list.
   *
   *    Algorithm:
   *      Scale argument to an integer value, and then extract
   *      the integer and fraction parts.
   *
   *    Also generates a typedef for this literal's structure if
   *    none has been generated yet and the -t option is set.
   *
   */
    static void generate( String arg )
    {
      //  First generate the typedef, if needed.
      if ( doTypedefs )
      {
        String typeName = 
                       new String( (isSigned ? "fixed_" : "ufixed_") +
         String.valueOf( intBits) + "_" + String.valueOf( fracBits) );
        if ( ! typedefs.containsValue(typeName) )
        {
          typedefs.put(arg, typeName);
          System.out.println( "typedef FIXED" + (isSigned ? 
                                        "_SIGNED( " : "UNSIGNED( " ) +
                  intBits + ", " + fracBits + ") " + typeName + ";" );
        }
      }

      //  Get the floating-point value to convert
      double desiredVal = 0.0;
      try
      {
        desiredVal = Double.parseDouble(arg);
        if ( (desiredVal < 0.0) && (isSigned == false) )
        {
          System.out.println( "// Cannot generate an unsigned literal"
                                  + " for a negative value: " + arg );
          return;
        }
      }
      catch ( NumberFormatException nfe )
      {
        System.err.println( 
                           "\"" + arg + "\" is not a valid number." );
        return;
      }
      
      //  Scale to int; check for overflow
      long rawVal = (long) (desiredVal * (1 << fracBits) );
      long intPart = rawVal >> fracBits;
      long fracPart = rawVal & ((1 << fracBits) - 1);
      boolean overflow = false;

      if ( ((intBits + fracBits) == 0) && (desiredVal != 0) )
      {
        //  Special case: Only 0.0 can be used as the value if
        //  there are no int and no frac bits.
        overflow = true;
        intPart = fracPart = 0;
      }
      else if ( isSigned )
      {      
        //  Check for signed overflow:  Pos args must be &lt;=
        //  +2^(n-1) - 1 and neg args must be >= -2^(n-1).
        if (  (desiredVal > 0.0) &&
              ( (rawVal < 0.0) ||
                (rawVal >= (1 << (intBits + fracBits - 1))) ) )
        {
            overflow = true;
            intPart = (1 << (intBits - 1)) -1;
            fracPart = (1 << fracBits) - 1;
        }
        if ( (desiredVal < 0.0) && 
             ( (rawVal > 0.0) ||
               (rawVal < (-1 << (fracBits + intBits - 1))) ) )
        {
          //  Negative overflow
          overflow = true;
          intPart = (-1 << (intBits - 1) );
          fracPart = 0;
        }

      }
      else
      {
        //  Check for unsigned overflow:  All the bits to the left of
        //  the integer part (if any) in rawVal must be zero.
        long mask = (-1 << (intBits + fracBits) );
        if ( (rawVal & mask) != 0 )
        {
          overflow = true;
          intPart = (1 << intBits) - 1;
          fracPart = (1 << fracBits) -1;
        }
      }
      
      //  Compute the approximation and print the literal.
      double approxVal = intPart + 
                                ((double)fracPart) / (1 << fracBits );
      DecimalFormat errFmt = new DecimalFormat( "0.0" );
      errFmt.setMaximumFractionDigits( arg.length() - 
                                         (arg.lastIndexOf('.') + 1) );
      errFmt.setPositivePrefix( "+" );
      String error = errFmt.format( approxVal - desiredVal );
      System.out.println( "  FixedLiteral( " +
        "FIXED_IS" + ((isSigned ? "" : "UN") + "SIGNED( ") + intBits +
                  ", " + fracBits + ", " + approxVal +")," + "  // " + 
                   desiredVal + (overflow ? ": (Overflow)" : error) );

    }


  //  checkNumBits()
  //  ----------------------------------------------------------------
  /**
   *    Makes sure we can represent the value in a long.
   *
   */
    static void checkNumBits()
    {
      if ( (intBits + fracBits) > 64 )
      {
        System.err.println( "This program cannot handle " +
        "the combination of " + intBits + " integer bits and " +
        fracBits + "fraction bits.  The sum of the two must be 64 " +
        "or less." );
        System.exit( 1 );
      }
    }
  }

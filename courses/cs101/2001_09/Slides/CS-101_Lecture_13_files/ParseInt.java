//  Class ParseInt
//  -----------------------------------------------------------------
/** 
 *    Crude String to int converter.  Does not handle negative numbers
 *    or strings with non-decimal-digit characters correctly.
 *
 *    @author   C. Vickery
 */
  class ParseInt
  {
    //  main()
    //  --------------------------------------------------------------
    /**
     *    Converts each command line argument string into an integer
     *    value.  Works only for Strings that consist entirely of
     *    decimal characters.  The numeric value of a decimal character
     *    is the difference between that character and the character
     *    '0'.
     *
     *    @param args The command line arguments to be converted to
     *    integers.
     */
      public static void main( String[] args )
      {
        for (int i=0; i<args.length; i++)
        {
          int val = 0;
          for (int j=0; j<args[i].length(); j++)
          {
            val = 10 * val + (args[i].charAt(j) - '0');
          }
          System.out.println( args[i] + " has the value " + val );
        }
        System.exit( 0 );
      }
  }

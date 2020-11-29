//  Gimmie.java
//
//    Demonstrate Numeric Input from Command Line
//
//    Problem:  User has to type Enter an second time to terminate the
//              application. ??
//
//    @author C. Vickery
//    February, 1998
//

import java.io.*;

//  class Gimmie
//  ------------------------------------------------------------------
/**
 *    Use a StreamTokenizer to read tokens from stdin and comment on
 *    any tokens that are numeric.
 */
public class Gimmie {

  //  main()
  //  ----------------------------------------------------------------
  /**
   *    Engage in a dialog with the user to demonstrate reading
   *    numbers from the command line.
   */
  public static void main( String[] args ) throws IOException {

  BufferedReader  stdin = new BufferedReader(
                            new InputStreamReader( System.in ) );
  StreamTokenizer in    = new StreamTokenizer( stdin );


    in.eolIsSignificant( true );

    System.out.print( "Kindly enter a line for me to admire: " );
    
    while ( in.nextToken() != StreamTokenizer.TT_EOL ) {
      
      if ( in.ttype == StreamTokenizer.TT_NUMBER ) {
        
        if ( (long) in.nval == in.nval ) {
          
          System.out.print( " " +
            (long) in.nval +
            " looks like a very nice integer, " );
          
          }
        
        else {
          
          System.out.print( " " + 
            in.nval +
            " is a very nice real number, " );
          
          }
        
        System.out.println( (in.nval == 123) ?
          "and it\'s just what I always wanted!" :
        "but it\'s not really what I wanted." );
        
        }
      
      else {
        
        System.out.println( " \"" +
          in.sval +
          "\" doesn\'t look like a number to me.");
        }
      
      }

    System.out.println(" Thank you. ");
    System.exit( 0 );

    }

  }
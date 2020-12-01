//  HowTrue.java

//  Prints the truth value of a matrix of booleans.

import java.io.*;
import java.util.*;

//  Class HowTrue
//  -----------------------------------------------------------------
/**
  *   Reads t/f tokens from the user, builds a two-dimensional Vector
  *   of Booleans, and prints the proportion of the elements in the
  *   matrix that have the value true.
  *
  *   @author C. Vickery
  *
  */
  public class HowTrue {

  //  These two objects are used to populate the matrix.
  //  They are used in place of the large set of new Booleans shown
  //  during lecture.
  public static final Boolean  TRUE  = new Boolean( true );
  public static final Boolean  FALSE = new Boolean( false );

  public static final String   NL    =
                                System.getProperty( "line.separator" );

  //  main()
  //  ------------------------------------------------------------------
  /**
    *   Defines a matrix of Booleans and uses the howtrue() method to
    *   calculate the proportion of cells that are true.  Uses a
    *   Vector of Vectors to hold the Booleans as they are read from
    *   the console.
    *
    */
    public static void main( String[] args ) throws IOException {

    Vector          rows  = new Vector();
    Vector          cols;
    StringTokenizer st;
    BufferedReader  br    = new BufferedReader(
                              new InputStreamReader( System.in ) );
    String          inBuf;

      //  Tell the user what to do
      System.out.println( "Enter lines with the letters t and/or f, "+
                          "separated by spaces." + NL +
                          "Press ^Z (DOS/Windows) or ^D (UNIX) to stop."
                        );

      //  Outer Loop: Read strings from console until eof
      while ( (inBuf = br.readLine()) != null ) {

        cols = new Vector();
        rows.addElement( cols );
        st = new StringTokenizer( inBuf );

        //  Inner Loop: Use t/f tokens to add Booleans to current row
        while ( st.hasMoreTokens() ) {

          String t = st.nextToken();

          if ( t.equalsIgnoreCase( "t" ) ) {

            cols.addElement( TRUE );  // This line modified after class

            }

          else if ( t.equalsIgnoreCase( "f" ) ) {

            cols.addElement( FALSE ); // This line modified after class

            }

            else {

              System.err.println(
                "Error: " + t + " is neither t nor f (ignored)." );
            }
            
          }

        }

      //  Matrix has been initialized; Show how many rows and per cent
      //  of elements that are true.

      System.out.println( "The matrix has " + rows.size() + " rows." );
      System.out.println(
        "The matrix is " + (100 * howTrue( rows )) + "% true." );
      System.exit( 0 );

      }

  //  howTrue()
  //  -----------------------------------------------------------------
  /**
    *   Computes how true a matrix of Booleans is.
    *
    */
    private static float howTrue( Vector rv ) {

    Boolean b;
    int     row, col;
    int     numTrue     = 0;
    int     numElements = 0;
    int     numRows     = rv.size();

    Vector cv;

      //  Iterate over the elements of the Vectors, counting how many
      //  are true.  Also, count total number of elements in all rows.

      for (row = 0; row < numRows; row++) {

        cv = (Vector) rv.elementAt( row );
        numElements += cv.size();

        for (col = 0; col < cv.size(); col++) {

          b = (Boolean) cv.elementAt( col );

          if ( b.booleanValue() ) {

            numTrue++;

            }

          }

        }

      if (numElements > 0) {

        return (float) numTrue / numElements;

        }

      else  { // Avoid division by zero

        return (float) 0.0;

        }

      }

    }




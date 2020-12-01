//  Array_2D.java

import javax.swing.*;

class Array_2D {

  //  Method main()
  //  ----------------------------------------------------------------
  public static void main( String[] argv ) {

  //  Declare, create, and initialize -- all together
  boolean[][] anArray = { { true, true, false },
                          { false, false, true },
                          { false, false },
                          { true, true, true, true, true },
                          { true, true, false, true },
                        };

    showInfo( anArray );
    JOptionPane.showMessageDialog(  null,
                                    "Press OK to Continue",
                                    "Pause",
                                    JOptionPane.DEFAULT_OPTION
                                  );

    //  Create the array of rows
    anArray = new boolean[7][];

    //  Create the arrays of columns
    for ( int i = 0; i < anArray.length; i++ ) {
      anArray[ i ] = new boolean[ i + 3 ];
    }

    showInfo( anArray );
    JOptionPane.showMessageDialog(  null,
                                    "Press OK to Continue",
                                    "Pause",
                                    JOptionPane.DEFAULT_OPTION
                                  );

    //  Display the contents of the array
    anArray[ 2 ][ 1 ] = true;
    for ( int row = 0; row < anArray.length; row++ ) {
      System.out.print( "Row " + row + ":" );
      for (int col = 0; col < anArray[ row ].length; col++ ) {
        System.out.print( " " + anArray[ row ][ col ] );
      }
      System.out.println();
    }

  }


  //  Method showInfo()
  //  ----------------------------------------------------------------
  static void showInfo( boolean[][] obj ) {
    System.out.println( "\nHashcode: " + obj );
    System.out.println( "Number of Rows: " + obj.length );
    for (int i = 0; i < obj.length; i++ ) {
      System.out.println( "Length of row " +
                          i +
                          ": " +
                          obj[ i ].length );
    }
  }
}

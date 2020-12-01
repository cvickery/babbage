//  Array_1D.java

import javax.swing.*;

class Array_1D {

  public static void main( String[] argv ) {

  int[] anArray = { 1, 3, 5, 7, 9, };

    System.out.println( "Element 3:\t"  + anArray[ 3 ] );
    System.out.println( "Length:\t\t"   + anArray.length );
    System.out.println( "Hashcode:\t"   + anArray );

    JOptionPane.showMessageDialog( null, "Press OK to Continue",
                                "Pause", JOptionPane.DEFAULT_OPTION );

    anArray = new int[ 3 ];
    anArray[0] = 99;
    anArray[1] = 98;
    anArray[2] = 97;

  int[] anOtherArray = new int[7];

    System.out.println( "\nHashcode:\t" +
                                    anArray + "\t\t" + anOtherArray );
    System.out.println( "Length:\t\t" + anArray.length +
                                       "\t\t" + anOtherArray.length );

    System.out.println( "index\t\tanArray\t\tanOtherArray" );
    for ( int i = 0; i < anOtherArray.length; i++ ) {
      System.out.println( i + ":\t\t" +
        ( i < anArray.length ? Integer.toString( anArray[ i ] ) :
                                                                "" ) +
        "\t\t" +
        anOtherArray[ i ] );
    }

    JOptionPane.showMessageDialog( null, "Press OK to Continue",
                                "Pause", JOptionPane.DEFAULT_OPTION );

    anOtherArray = anArray;

    System.out.println( "\nHashcode:\t" +
                                    anArray + "\t\t" + anOtherArray );
    System.out.println( "Length:\t\t" + anArray.length +
                                       "\t\t" + anOtherArray.length );

    System.out.println( "index\t\tanArray\t\tanOtherArray" );
    for ( int i = 0; i < anOtherArray.length; i++ ) {
      System.out.println( i + ":\t\t" +
        anArray[ i ] + "\t\t" +
        anOtherArray[ i ] );
    }

    System.exit( 0 );

  }
}

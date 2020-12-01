//  Ragged.java
//
//    Show dimensions of a possibly-ragged array
//    @author C. Vickery
//    CS-101, Spring 1998
//

//  class Ragged
//  -------------------------------------------------------------------
/**
 *    Wrapper for a method to show the dimensions of an array.
 */
public class Ragged {

  //  Sample array
  static int a[][] = { { 1, 2, 3, 4, 5 },
                       { 1, 2, 3 },
                       {  },
                       { 1 },
                       { 1, 2, 3, 4, 5, 6, 7, 8 },
                      };

  //  main()
  //  -----------------------------------------------------------------
  /**
   *    Display the dimensions of a possibly-ragged array
   */
  public static void main( String[] args ) {

    System.out.println( "There are " + a.length + " rows." );

    for ( int i = 0; i < a.length; i++ )

      System.out.println( "Row " + i +
                          " has " + a[i].length + " column" +
                          ( ( a[i].length != 1 ) ? "s." : "." ) );

    }

  }

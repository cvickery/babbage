//  $Id$
//
//  Class Direction
//  ---------------------------------------------------------------
/**
  *   Eight compass points stored as ints, print as strings.
  *
  */
  public class Direction {
  int d;

  public final static int N  = 0;
  public final static int NE = 1;
  public final static int E  = 2;
  public final static int SE = 3;
  public final static int S  = 4;
  public final static int SW = 5;
  public final static int W  = 6;
  public final static int NW = 7;

  public final static String[] stringName = {
    "N", "NE", "E", "SE", "S", "SW", "W", "NW"
    };
  public final static int[] deltaX = {  0, +1, +1, +1,  0, -1, -1, -1 };
  public final static int[] deltaY = { -1, -1,  0, +1, +1, +1,  0, -1 };

  //  Constructor
  //  -----------------------------------------------------------------
  /**
    *   Construct a direction from an int; zero is N, one is NE, etc.
    *
    */
  public Direction (int dir) {

    d = dir % 8;

    }

  //  toString()
  //  -----------------------------------------------------------------
  /**
    *   Return the name of a Direction
    *
    */
  public String toString() {
  
    return stringName[ d ];
    
    }

  //  intValue()
  //  -----------------------------------------------------------------
  /**
    *   Return the direction as an integer between 0 and 7;
    *
    */
  public int intValue() {

    return d;

    }    

  }

//  Exam.java
//
//    This is my solution to Question 1 on Exam 2
//      CS-101
//      Spring 1998.
//
//

import java.util.*;

//  class Exam
//  -----------------------------------------------------------------
/**
  *   Question 1:  Save command line arguments in a Vector, and
  *   implement methods getArgs() to return the Vector, and
  *   moreThan( n ) to tell whether there were more than n args.
  *
  *     @author C. Vickery
  *
  */
public class Exam {

private static Vector  vec = new Vector();

  //  main()
  //  ---------------------------------------------------------------
  public static void main( String[] args ) {

    for ( int i = 0; i < args.length; i++ ) {

      vec.addElement( args[i] );

      }

    new X().init();
    
    }
    
  //  getArgs()
  //  ---------------------------------------------------------------
  public static Vector getArgs() {

    return vec;

    }
    
  //  moreThan()
  //  ---------------------------------------------------------------
  public static boolean moreThan( int n ) {

    if ( vec.size() > n )
      return true;

    return false;

    }
    
  }

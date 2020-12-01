//  File X.java
//
//  This is the class "X" that exercises class Exam.  It was not part of the
//  second exam, but is needed to test it.
//

import java.io.*;
import java.util.*;

//  Class X
//  -----------------------------------------------------------------
/**
  *   This class provides the init method that makes sure class Exam
  *   works properly.
  *
  *     @author C. Vickery
  *
  */
public class X {

  //  init()
  //  ---------------------------------------------------------------
  /**
    *   Use Exam.getArgs() to get the vector of Strings containing
    *   the command line arguments.  Use an Enumeration to print
    *   them, and then test Exam.moreThan() for argument values from
    *   zero to four.
    *
    */
  public void init() {

    Vector v = Exam.getArgs();
    Enumeration e = v.elements();

    System.out.println( "The command line arguments were:" );

    while ( e.hasMoreElements() ) {

      System.out.println( "  " + e.nextElement() );

      }

    for ( int i = 0; i < 5; i++ ) {

      System.out.println( "There were " +
                          ( Exam.moreThan( i ) ? "" : "not " ) +
                          "more than " + i + " command line arguments." );
      }

    System.exit( 0 );

    }

  }
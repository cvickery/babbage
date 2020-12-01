//  ReadANum.java
//
//    This application illustrates how to read a numeric string from
//    the command line and convert it to an int.
//
//    @author   C. Vickery
//    Spring 1998
//

import java.io.*;

//  class ReadANum
//  -------------------------------------------------------------------
/**
 *    This is a "wrapper" class for a main() method that reads
 *    characters from the command line, and converts them to an
 *    int.
 */
public class ReadANum {

  //  main()
  //  -----------------------------------------------------------------
  /**
   *    There are better ways than this to do the conversion of intput
   *    characters into a number in Java.  For example, one limitation
   *    of this code is that it handles only positive integers, or
   *    zero, and treats anything that doesn't start with a digit as
   *    the value zero.
   *
   *    What follows is fairly detailed commentary about this method;
   *    you would never write comments like these because you can
   *    always assume the reader of your code already knows about
   *    Java's built-in classes, like Character.
   *
   *      System.in.read() returns the integer value of the Unicode
   *      representation of one character typed by the user.  This int
   *      can be saved in a char by using a cast; casts tell the
   *      compiler we know what we are doing (or at least think we do);
   *      without the cast, the compiler thinks that assigning an int
   *      to a char is a syntax error.
   *
   *      The built-in class Character has a method called isDigit()
   *      which takes a char as an argument, and will tell if the char
   *      is a valid decimal digit or not by returning a boolean
   *      value.  So the while loop reads input characters until it
   *      gets one that is not a valid decimal digit.
   *
   *      The int, "value," is initialzed to zero, and is scaled up by
   *      factor of 10 for every decimal digit that is read, and
   *      incremented by the numeric value of the character, which is
   *      obtained using the digit() method of class Character.  This
   *      method has to be told what radix to use, which is 10
   *      (decimal) in our case.  Try printing value each time through
   *      the loop to see how this works.
   */

  public static void main ( String[] args ) throws IOException {

  char  character;
  int   value = 0;

    // Prompt the user to enter a number
    System.out.print("Enter a number: ");

    //  Read characters, building up the decimal value as we go.
    while (Character.isDigit( character = (char) System.in.read() )) {

      value *= 10;
      value += Character.digit( character, 10 );

      }

    //  Prove we really have a number by doing some arithmetic with it
    System.out.println( "One less than that is " + (value - 1) );

    //  Terminate the program
    System.exit( 0 );

    }

  }

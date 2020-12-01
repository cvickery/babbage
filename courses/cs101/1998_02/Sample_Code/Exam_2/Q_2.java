//
//  Q_2.java
//
//    This is my solution to Question 2 on Exam 2
//      CS-101
//      Spring 1998.
//

import java.io.*;

//  Class Q_2
//  -----------------------------------------------------------------
/**
  *   Question 2: Prompt for and read a file name from the user.
  *   Then read the file, and print the longest line.
  *
  *     @author C. Vickery
  *
  */
public class Q_2 {

  //  main()
  //  ---------------------------------------------------------------
  /**
    *   Prompt the user to enter a file name, then try to open that
    *   file.  Throw an exception if file can't be opened.  Then read
    *   all the lines in the file.  Throw an exception if there is an
    *   I/O error while reading.  At eof, print the longest line found.
    *
    */
  public static void main( String[] args ) {
  
  BufferedReader  fin       = null;
  String          fileName  = null;
  String          longest   = "";
  String          thisLine  = null;

    try {
      BufferedReader  sin = new BufferedReader(
                              new InputStreamReader(System.in));
      System.out.print( "Enter the name of a file: ");
      fileName = sin.readLine();
        }
    catch ( IOException e ) {    
      System.err.println( "Unable to access console." );
      System.exit( 1 );
      }
    
    try {
      fin = new BufferedReader( new FileReader( fileName ) );
      }
    catch (IOException e) {
      System.err.println( fileName + " is not a valid file name." );
      System.exit( 1 );
      }
      
    try {
      while ( null != ( thisLine = fin.readLine() ) ) {
        if ( thisLine.length() > longest.length() )
          longest = thisLine;
        }
      }
    catch (IOException e) {
      System.err.println( "Error reading file: " + e.getMessage() );
      }
    
    System.out.println("The longest line in " + fileName + " was:" );
    System.out.println( longest );
    System.exit( 0 );
    
    }

  }

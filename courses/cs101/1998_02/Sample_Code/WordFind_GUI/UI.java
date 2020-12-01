//  $Id$
//
//    User Interface for the WordFind project.
//    @author C. Vickery
//    CS-101, Spring 1998
//    Project 3
//

import java.io.*;
import java.util.*;

//  Class UI
//  --------------------------------------------------------------------
/**
  *   Command line interface for dealing with WordFind Puzzles.
  *
  */
public class UI {

  //  main()
  //  ------------------------------------------------------------------
  /**
    *   Create a Puzzle from each puzzle file named on the command line,
    *   and let the user interact with it.
    */
  public static void main( String[] args ) throws IOException {

  Puzzle          p = null;
  int             nWds;
  BufferedReader  r = new BufferedReader(
                        new InputStreamReader( System.in ) );
  String          inBuf;
  String          ls = System.getProperty( "line.separator" );
  Answer          a;

    //  Loop through the command line arguments
    for ( int i = 0; i < args.length; i++ ) {

      System.out.println( ls + "Puzzle File " + args[i] + "." );

      try {
        p = new Puzzle( args[i] );
        }
      catch ( Exception e ) {
        System.err.println( " Error: " + e.getMessage() );
        continue;
        }

      //  Show the Puzzle
      System.out.print( p );
      nWds = p.getNumberOfWords();
      System.out.println( "There " +
                          (( nWds == 1 ) ? "is " : "are ") +
                          p.getNumberOfWords() +
                          " word" + (( nWds == 1 ) ? "" : "s") +
                          " in " +
                          p.getPuzzleName() + "." );

      //  Let the user interact with the Puzzle
      while ( true ) {  

        //  Issue prompt, and read reply
        System.out.print(
          "Enter a word, or" + ls +
          "  l - display the word list" + ls +
          "  n - next puzzle"+ ls +
          "  p - display the puzzle" + ls +
          "  q - exit " + ls +
          "(<word>l[n]pq): " );
        inBuf = r.readLine();

        //  Exit the program
        if ( inBuf.equalsIgnoreCase( "q" ) )     
          System.exit(0);

        //  Go to next Puzzle file
        if ( inBuf.equalsIgnoreCase( "n" ) || inBuf.equals( "" ) )
          break;

        //  Print the matrix
        if ( inBuf.equalsIgnoreCase( "p" ) ) {
          System.out.println( p );
          System.out.println( "There " +
                              (( nWds == 1 ) ? "is " : "are ") +
                              p.getNumberOfWords() +
                              " word" + (( nWds == 1 ) ? "" : "s") +
                              " in " +
                              p.getPuzzleName() + "." );
          continue;
          }
        
        //  Display the word list
        if ( inBuf.equalsIgnoreCase( "l" ) ) {
        
          Enumeration e = p.getWordList().elements();
          int n = 0;
          while ( e.hasMoreElements() ) {
            System.out.print( "\t" + e.nextElement() );
            n++;
            if ( (n %= 6) == 0 ) System.out.println();
            }
          System.out.println( ((n == 0) ? "" : ls ) +
            p.getPuzzleName() + " has " +
            p.getNumberOfWords() + " words.");
          continue;
          }

        // Default: find the word
        a = p.findWord( inBuf );
        if ( a == null )
          System.out.println( "Not found." );
        else
          System.out.println( a );
        }

      }

    }

  }


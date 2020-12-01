//  $Id$
//
//    Word Find Puzzle
//
//    @author C. Vickery
//    CS-101, Spring 1998
//

import java.io.*;
import java.util.*;
import java.applet.*;

//  Class Puzzle
//  --------------------------------------------------------------------
/**
  *
  *   WordFind Puzzles consist of a matrix of letters and a list of
  *   words.  There are lots of nice constructors and methods.
  */
public class Puzzle {

private int       numRows, numCols, numWords;
private char[][]  thePuzzle;
private Vector    wordList = new Vector();
private String    puzzleName = "unknown";


  //  Puzzle( String )
  //  ------------------------------------------------------------------
  /**
    *   Build a puzzle from a puzzle file.
    *
    */
  public Puzzle( String fileName ) throws Exception {

  String          inBuf;
  StringTokenizer st;

    numRows = -1;
    numCols = -1;

    puzzleName = fileName;

    try {

      BufferedReader r =  new BufferedReader(
                            new FileReader( fileName ) );

      inBuf = r.readLine( );
      if ( inBuf == null )
        throw new Exception( "Empty puzzle file" );
      st = new StringTokenizer( inBuf );
      numRows = Integer.parseInt( st.nextToken() );

      if ( numRows < 1 )
        throw new Exception( "Invalid number of rows: " + numRows );

      thePuzzle = new char[ numRows ][];

      // The first line determines the number of columns in the puzzle
      inBuf = r.readLine( );
      if ( inBuf == null )
        throw new Exception( "Not enough lines in puzzle file" );
      inBuf = inBuf.toUpperCase();
      numCols = inBuf.length();
      thePuzzle[0] = new char[ inBuf.length() ];
      inBuf.getChars( 0, inBuf.length(), thePuzzle[0], 0 );

      //  Get the remainder of the lines
      for ( int i = 1; i < numRows; i++ ) {
        inBuf = r.readLine( );
        if ( inBuf == null )
          throw new Exception( "Not enough lines in puzzle file" );
        inBuf = inBuf.toUpperCase();
        if ( inBuf.length() != numCols ) {
          String msg = "Row " + (i + 1) + " is too " +
            (inBuf.length() < numCols ? "short" : "long" ) +
            "; it should have " + numCols + " characters instead of " +
            inBuf.length();
          throw new Exception( msg );
          }
        thePuzzle[i] = new char[ inBuf.length() ];
        inBuf.getChars( 0, inBuf.length(), thePuzzle[i], 0 );
        }

      //  Read the word list
      while ( (inBuf = r.readLine()) != null ) {

        if ( null == findWord( inBuf ) ) {
          throw new Exception(
            "Word \"" + inBuf + "\" is not in the puzzle" );
          }
        wordList.addElement( inBuf );

        }

      }
    catch ( IOException e ) {
      throw new Exception ( "Unable to read puzzle file " +
                            e.getMessage() );
      }
    catch ( NumberFormatException e ) {
      throw new Exception ( "Invalid number of rows: " + e.getMessage() );
      }

    }

  //  Puzzle( Applet )
  //  ---------------------------------------------------------------
  /**
    *   Build a Puzzle from an applet's param tags.
    *
    */
  public Puzzle(Applet a) throws Exception {

  String inBuf = a.getParameter( "name" );

    //  name that puzzle
    if ( inBuf != null )
      puzzleName = inBuf;

    //  Get numRows
    inBuf = a.getParameter( "numRows" );
    try {
      numRows = Integer.parseInt( inBuf );
      if (numRows < 1) throw new Exception();
      }
    catch (Exception e) {
      throw new Exception( "Missing or invalid numRows parameter" );
      }

    thePuzzle = new char[numRows][];

    //  Process row_xx params
    inBuf = a.getParameter( "row_0" );
    if ( inBuf == null )
      throw new Exception( "Missing row_0 parameter" );
    numCols = inBuf.length();
    thePuzzle[0] = inBuf.toCharArray();

    for (int i = 1; i < numRows; i++ ) {

      inBuf = a.getParameter( "row_" + i );
      if ( inBuf == null || numCols != inBuf.length() )
        throw new Exception( "row " + i + " is missing or wrong length" );
      thePuzzle[ i ] = inBuf.toCharArray();

      }

    //  Process word_xx params

    numWords = 0;

    while (null != (inBuf = a.getParameter( "word_" + numWords ) ) ) {

      if (null == findWord( inBuf ) ) {

        throw new Exception( "\"" + inBuf + "\" is not in the puzzle" );

        }

      wordList.addElement( inBuf );
      numWords++;

      }

    }

  //  getPuzzle()
  //  ----------------------------------------------------------------
  /**
    *   Give out the matrix
    *
    */
  public char[][] getPuzzle() {
    return thePuzzle;
    }

  //  toString()
  //  ------------------------------------------------------------------
  /**
    *   Convert puzzle matrix to a printable string.
    *
    */

  public String toString() {
  StringBuffer sb = new StringBuffer( "" );

    for ( int row = 0; row < thePuzzle.length; row++) {
      for ( int col = 0; col < thePuzzle[row].length; col++) {
        sb.append( " " );
        sb.append( thePuzzle[row][col] );
        }
      sb.append( System.getProperty( "line.separator" ) );
      }
    return new String( sb );
    }


  //  getPuzzleName()
  //  -----------------------------------------------------------------
  /**
    *   Tell the name of the puzzle.
    *
    */
  public String getPuzzleName() {

    return puzzleName;

    }


  //  getNumberOfWords()
  //  -----------------------------------------------------------------
  /**
    *   Tell how many words are in the word list for this puzzle.
    *
    */
  public int getNumberOfWords() {

    return wordList.size();

    }


  //  getWordList()
  //  -----------------------------------------------------------------
  /**
    *   Return the word list vector.
    */
  public Vector getWordList() {

    return wordList;

    }

  // findWord()
  // ------------------------------------------------------------------
  /**
    *   Find a word in the puzzle.
    *
    */
    public Answer findWord( String target ) {

    if ( (target == null) || (target.length() < 1) )
      return null;
    int     r, c;
    boolean found;
    char[]  chars = new char[ target.length() ];
    Answer  a;
      target = target.toUpperCase();
      target.getChars(0, target.length(), chars, 0);

      for (int row = 0; row < numRows; row++ ) {
        for (int  col = 0; col < numCols; col++ ) {
          if ( chars[0] == thePuzzle[row][col] ) {
            for (int  dir = 0; dir < 8; dir++ ) {
              if ( isPossible( row, col, dir, chars.length ) ) {
                r = row; c = col; found = true;
                for (int k = 0; k < chars.length; k++ ) {
                  if ( chars[k] != thePuzzle[r][c] ) {
                    found=false;
                    break;
                    }
                  r += Direction.deltaY[dir];
                  c += Direction.deltaX[dir];
                  }
                if (found)
                  return new Answer(row, col, dir);
                }
              }
            }
          }
        }
      return null;
      }

  //  isPossible()
  //  ------------------------------------------------------------------
  /**
    *   See if a word will fit in the puzzle given the starting
    *   position and direction.
    *
    */
  private boolean isPossible(int x, int y, int d, int l) {

    if (  (x + (l - 1) * Direction.deltaY[d] < 0) ||
          (x + (l - 1) * Direction.deltaY[d] >= numRows) ||
          (y + (l - 1) * Direction.deltaX[d] < 0) ||
          (y + (l - 1) * Direction.deltaX[d] >= numCols) )
      return false;

    return true;

    }

  }

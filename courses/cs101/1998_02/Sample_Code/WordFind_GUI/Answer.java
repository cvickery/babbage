//  $Id$
//
//    The Answer when searching for a word in a puzzle.
//    @author C. Vickery

//  Class Answer
//  ------------------------------------------------------------------
/**
  *   Hold row, column, and direction for a word in a puzzle.
  *
  */
  public class Answer {

  int         row, col;
  Direction   direction;

  public Answer( int r, int c, int d ) {
    row = r;
    col = c;
    direction = new Direction( d );
    }

  //  Answer.toString()
  //  -----------------------------------------------------------------
  public String toString() {
    return "row " + row + ", col " + col + ", " + direction;
    }

  }

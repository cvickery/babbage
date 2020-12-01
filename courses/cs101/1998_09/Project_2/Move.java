//  Move.java

import java.awt.*;

//  Class Move
//  -------------------------------------------------------------------
/**
  *   A Move is a valid move or jump by a piece from a Square.
  *
  *   @author C. Vickery
  *
  */
  public class Move implements Piece {

    private int     fromRow = 0, fromCol = 0, toRow = 0, toCol = 0;
    private int     piece;
    private boolean isJump;
    private Move    next;

  //  Constructor
  //  -----------------------------------------------------------------
  /**
    *   A Move may be a move or a jump, and has both a starting square
    *   and an ending square.
    *
    */
    public Move(  int r1, int c1, int r2, int c2,
                  int p, boolean ij, Move  n ) {

      piece   = p;
      fromRow = r1;
      toRow   = r2;
      fromCol = c1;
      toCol   = c2;
      isJump  = ij;
      next    = n;

      }

  //  Getter and Setter for the link
  //  ----------------------------------------------------------------
  public Move getNext()         { return next;  }
  public void setNext( Move m ) { next = m;     }

  //  Accessor Methods
  //  ----------------------------------------------------------------
  public boolean  isJump()  { return isJump;                        }
  public Point    getFrom() { return new Point( fromRow, fromCol ); }
  public Point    getTo()   { return new Point( toRow,   toCol   ); }


  //  toString()
  //  ----------------------------------------------------------------
  /**
    *   Returns a printable representation of the piece, the squares
    *   involved, and whether it is a move (<) or a jump (^).
    *
    */
    public String toString() {

      String pieceString;

        switch ( piece ) {
          case NO_PIECE:    pieceString = ".";
                            break;
          case RED_PAWN:    pieceString = "r";
                            break;
          case RED_KING:    pieceString = "R";
                            break;
          case BLACK_PAWN:  pieceString = "b";
                            break;
          case BLACK_KING:  pieceString = "B";
                            break;
          default:          pieceString = "?";
          }

      return  "(" + pieceString + ")[" +
              (fromRow+1) + "][" + (fromCol+1) +
              ( isJump ? "]^[" : "]>[" ) +
              (toRow+1) + "][" + (toCol+1) + "]";

      }

  }


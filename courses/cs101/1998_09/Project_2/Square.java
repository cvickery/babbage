//  Square.java

//  Class Square
//  -------------------------------------------------------------------
/**
  *   Information about a checkerboard square, suitable for use in a
  *   linked list.
  *
  *   @author C. Vickery
  *
  */
  public class Square implements Piece {
    private int       row = 0, col = 0, piece = NO_PIECE;
    private Square    next = null;

    //  Constructors
    //  --------------------------------------------------------------
    /**
      *   A Square has a row, column, a piece, and a next Square, all
      *   of which must be valid.
      *
      */
      public Square( int r, int c, int p )        throws CBException {
        initSquare( r, c, p, null );
        }

      public Square( int r, int c, int p, Square n )
                                                  throws CBException {
        initSquare( r, c, p, n );
        }

      //  initSquare()
      //  ------------------------------------------------------------
      /**
        *   Helper method for constructors
        */
      private void initSquare( int r, int c, int p, Square n )
                                                  throws CBException {
        if ( r < 0 || r > 7 )
          throw new CBException( r + " is not a valid row" );
        row = r;

        if ( c < 0 || c > 7 )
          throw new CBException( c + " is not a valid column" );
        col = c;

        switch ( piece ) {

          case RED_PAWN:
          case RED_KING:
          case BLACK_PAWN:
          case BLACK_KING:
          case NO_PIECE:

            break;

          default:
            throw new CBException( p + " is not a valid piece" );
          }

        piece = p;
        next =  n;

        }

      //  Getters and Setters
      //  --------------------------------------------------------------

      public Square getNext()           { return next;    }
      public void   setNext( Square n ) { next = n;       }
      public int    getRow()            { return row;     }
      public int    getColumn()         { return col;     }
      public int    getCol()            { return col;     }
      public int    getPiece()          { return piece;   }

      //  toString()
      //  --------------------------------------------------------------
      /**
        *   Returns a printable string of the Square's row, col, and
        *   piece, using user coordinates.
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

          return "[" +  (row + 1) + "][" +
                        (col + 1) + "]: " + pieceString;

        }


      //  getMoves()
      //  ------------------------------------------------------------
      /**
        *   Returns a list of Moves possible from this Square.
        *
        */
        public Move getMoves() {

          Move  theList = null, current;

          return theList;

          }

    }



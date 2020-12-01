//  Checkerboard.java

//  Class Checkerboard
//  -------------------------------------------------------------------
/**
  *   Provides a Checkerboard and methods for manipulating/displaying
  *   it.
  *
  *   @author C. Vickery
  *
  */
  public class Checkerboard implements Piece {

  private int[][] theBoard = new int[8][8];

  //  Constructors
  //  -----------------------------------------------------------------
  /**
    *   Initialize a new Checkerboard.
    *
    */
    public Checkerboard () {
      //  Nothing to do that I can think of.
      }

  //  zero()
  //  -----------------------------------------------------------------
  /**
    *   Zeros out the chessboard.
    *
    */
    public void zero() {

      for ( int r = 0; r < 8; r++ )
        for ( int c = 0; c < 8; c++ )
          theBoard[r][c] = 0;

      }

  //  init()
  //  -----------------------------------------------------------------
  /**
    *   Initializes the board for a new game.
    *
    */
    public void init() {

    int row, col;

      zero();

      row = 0;
      for ( col = 0; col < 8; col += 2 )
        addPiece( Checkerboard.BLACK_PAWN, row, col );
      row = 1;
      for ( col = 1; col < 8; col += 2 )
        addPiece( Checkerboard.BLACK_PAWN, row, col );
      row = 2;
      for ( col = 0; col < 8; col += 2 )
        addPiece( Checkerboard.BLACK_PAWN, row, col );
      row = 5;
      for ( col = 1; col < 8; col += 2 )
        addPiece( Checkerboard.RED_PAWN, row, col );
      row = 6;
      for ( col = 0; col < 8; col += 2 )
        addPiece( Checkerboard.RED_PAWN, row, col );
      row = 7;
      for ( col = 1; col < 8; col += 2 )
        addPiece( Checkerboard.RED_PAWN, row, col );

      }


  //  validate()
  //  -----------------------------------------------------------------
  /**
    *   Checks that a row/column pair is on a black square on the
    *   board.
    *
    */
    public boolean validate( int row, int col ) {

      //  Check for On Board
      if ( row < 0 || row > 7 || col < 0 || col > 7 ) {
        return false;
        }

      //  Check for On Black

      if (  ( 0 == row % 2 && 0 != col % 2 ) ||
            ( 1 == row % 2 && 1 != col % 2 ) ) {
        return false;
        }

      return true;

      }

  //  occupant()
  //  -----------------------------------------------------------------
  /**
    *   Tells what occupies a square.
    *   Row and col must be valid.
    *
    */
    public int occupant( int row, int col ) {

      return theBoard[ row ][ col ];

        }

  //  pickUp()
  //  -----------------------------------------------------------------
  /**
    *   Returns the value of the piece at a given square, clearing the
    *   square in the process.
    *
    */
    public int pickUp( int row, int col ) {

    int   piece = theBoard[ row ][ col ];

      theBoard[ row ][ col ] = 0;
      return piece;
      
      }


  //  addPiece()
  //  -----------------------------------------------------------------
  /**
    *   Puts a piece on the board at a particular position.  OK to add
    *   a pawn to a pawn of the same color already on the square (make
    *   a king).
    *
    */
    public boolean addPiece( int piece, int row, int col ) {

    int targetSquare;

      //  Check for InvalidPiece exception
      switch ( piece ) {
        case BLACK_KING:
        case RED_KING:
        case BLACK_PAWN:
        case RED_PAWN:
        case NO_PIECE:
                        break;
        default:
          System.err.println("addPiece: invalid piece: " + piece);
          return false;
          }

      if ( !validate( row, col ) )
        return false;

      targetSquare = theBoard[ row ][ col ];

      if (  (targetSquare != NO_PIECE) && (
            ( piece == RED_KING || piece == BLACK_KING) ||
            ( piece != targetSquare ) ) ) {

        System.err.println( "addPiece: target occupied: " + piece +
                            " to " + targetSquare);
        return false;

        }

      switch ( targetSquare ) {

        case RED_PAWN:    targetSquare = RED_KING;
                          break;
        case BLACK_PAWN:  targetSquare = BLACK_KING;
                          break;
        case NO_PIECE:    targetSquare = piece;
                          break;
        default:          System.err.println( "addPiece: bad switch" );
                          System.exit( 1 );
        }

      theBoard[ row ][ col ] = targetSquare;
      return true;

      }


  //  getMoves()
  //  -----------------------------------------------------------------
  /**
    *   Returns a linked list of Move objects, one for each the move
    *   and jump available to both sides.
    *
    */
    public Move getMoves() {

    Move  theList = null, m, current;

      for ( int r = 0; r < 8; r++ ) {
        for (int c = 0; c < 8; c++ ) {
          if ( (m = getMoves( r, c )) != null ) {
            if ( theList == null )
              theList = m;
            else {
              current = theList;
              while ( current.getNext() != null )
                current = current.getNext();
              current.setNext( m );
            }
          }
        }
      }
      return theList;
    }

  //  getMoves( row, col )
  //  -----------------------------------------------------------------
  /**
    *   Returns a linked list of Move objects, one for each the move
    *   and jump available from the square.
    *
    */
    public Move getMoves( int r1, int c1 ) {

    Move  theList = null, m;
    int   p       = occupant( r1, c1 );

      if ( p == NO_PIECE ) return theList;
      for ( int r2 = r1 - 2; r2 <= r1 + 2; r2++ ) {
        for ( int c2 = c1 - 2; c2 <= c1 + 2; c2++ ) {

          if ( validate(r2, c2) ) {
            if ( isMove( r1, c1, r2, c2 ) ) {
              theList = new Move( r1, c1, r2, c2, p, false, theList );
            }
            if ( isJump( r1, c1, r2, c2 ) ) {
              theList = new Move( r1, c1, r2, c2, p, true, theList );
            }
          }
        }
      }
      return theList;
    }


  //  kingRow()
  //  -----------------------------------------------------------------
  /**
    *   Returns the index of the kingRow for a piece.
    *
    */
    public static int kingRow( int piece ) {

      return ( isBlack( piece ) ? 7 : 0 );

      }

  //  isBlack()
  //  -----------------------------------------------------------------
  /**
    *   Returns true if a piece is black, false otherwise.
    *
    */
    public static boolean isBlack( int piece ) {

      return ( piece == BLACK_PAWN || piece == BLACK_KING );

      }

  //  isRed()
  //  -----------------------------------------------------------------
  /**
    *   Returns true if a piece is red, false otherwise.
    *
    */
    public static boolean isRed( int piece ) {

      return ( piece == RED_PAWN || piece == RED_KING );

      }


  //  isPawn()
  //  -----------------------------------------------------------------
  /**
    *   Returns true if the piece is a pawn.
    *
    */
    public static boolean isPawn( int piece ) {

      return ( piece == RED_PAWN || piece == BLACK_PAWN );

      }

    //  isMove()
    //  -------------------------------------------------------------
    /**
      *   Returns true if the starting and ending squares, assumed to
      *   be on the board, have the correct relationship to each
      *   other for making a move.  Checks that destination is not
      *   occupied.
      */
    public boolean isMove( int row1, int col1,
                           int row2, int col2 ) {

    int piece = occupant( row1, col1);

      if ( piece == NO_PIECE ) return false;
      if ( occupant( row2, col2 ) != NO_PIECE ) return false;

      // Black Pawn
      if ( isBlack( piece ) && isPawn( piece ) ) {
        if ( ( row2 == row1 + 1 ) &&
             ( col2 == col1 - 1 || col2 == col1 + 1 ) ) return true;
        }

      // Black King
      if ( isBlack( piece ) && !isPawn( piece ) ) {
        if ( ( row2 == row1 - 1 || row2 == row1 + 1 ) &&
             ( col2 == col1 - 1 || col2 == col1 + 1 ) ) return true;
        }

      // Red Pawn
      if ( !isBlack( piece ) && isPawn( piece ) ) {
        if ( ( row2 == row1 - 1 ) &&
             ( col2 == col1 - 1 || col2 == col1 + 1 ) ) return true;
        }

      // Red King
      if ( !isBlack( piece ) && !isPawn( piece ) ) {
        if ( ( row2 == row1 - 1 || row2 == row1 + 1 ) &&
             ( col2 == col1 - 1 || col2 == col1 + 1 ) ) return true;
        }

      return false;

      }

    //  isJump()
    //  -------------------------------------------------------------
    /**
      *   Returns true if the starting and ending squares, assumed to
      *   be on the board, have the correct relationship to each
      *   other for making a jump.  All rows and cols must be valid.
      */
    public boolean isJump(  int row1, int col1,
                            int row2, int col2 ) {

    int piece = occupant( row1, col1);

      if ( piece == NO_PIECE ) return false;
      if ( occupant( row2, col2 ) != NO_PIECE ) return false;

      // Black Pawn
      if ( isBlack( piece ) && isPawn( piece ) ) {
        if ( row2 == row1 + 2 ) {
          if ( col2 == col1 - 2 &&
            isRed( occupant( row1 + 1, col1 - 1) ) ) return true;
          if ( col2 == col1 + 2 &&
            isRed( occupant( row1 + 1, col1 + 1) ) ) return true;
        }
      }

      // Black King
      if ( isBlack( piece ) && !isPawn( piece ) ) {
        if ( row2 == row1 - 2 ) {
          if ( col2 == col1 - 2 &&
            isRed( occupant( row1 - 1, col1 - 1) ) ) return true;
          if ( col2 == col1 + 2 &&
            isRed( occupant( row1 - 1, col1 + 1) ) ) return true;
        }
        if ( row2 == row1 + 2 ) {
          if ( col2 == col1 - 2 &&
            isRed( occupant( row1 + 1, col1 - 1) ) ) return true;
          if ( col2 == col1 + 2 &&
            isRed( occupant( row1 + 1, col1 + 1) ) ) return true;
        }

      }

      // Red Pawn
      if ( isRed( piece ) && isPawn( piece ) ) {
        if ( row2 == row1 - 2 ) {
          if ( col2 == col1 - 2 &&
            isBlack( occupant( row1 - 1, col1 - 1) ) ) return true;
          if ( col2 == col1 + 2 &&
            isBlack( occupant( row1 - 1, col1 + 1) ) ) return true;
        }
      }

      // Red King
      if ( isRed( piece ) && !isPawn( piece ) ) {
        if ( row2 == row1 - 2 ) {
          if ( col2 == col1 - 2 &&
            isBlack( occupant( row1 - 1, col1 - 1) ) ) return true;
          if ( col2 == col1 + 2 &&
            isBlack( occupant( row1 - 1, col1 + 1) ) ) return true;
        }
        if ( row2 == row1 + 2 ) {
          if ( col2 == col1 - 2 &&
            isBlack( occupant( row1 + 1, col1 - 1) ) ) return true;
          if ( col2 == col1 + 2 &&
            isBlack( occupant( row1 + 1, col1 + 1) ) ) return true;
        }

      }

      return false;

      }


  //  toString()
  //  -----------------------------------------------------------------
  /**
    *   Returns a printable string representing the state of the
    *   board.
    *
    */
    public String toString() {

    String        nl  = System.getProperty( "line.separator" );
    StringBuffer  sb  = new StringBuffer();

      for ( int row = 7; row >= 0; row-- ) {
        sb.append( (row + 1) + ": " );
        for ( int col = 0; col < 8; col++ ) {
          switch ( theBoard[ row ][ col ] ) {
            case RED_KING:    sb.append( " R " );
                              break;
            case RED_PAWN:    sb.append( " r " );
                              break;
            case BLACK_KING:  sb.append( " B " );
                              break;
            case BLACK_PAWN:  sb.append( " b " );
                              break;
            default:          sb.append( " . " );
            }
          }
        sb.append( nl );
        }

      sb.append( "    1  2  3  4  5  6  7  8" + nl );
      return new String( sb );

      }


  //  getBoardList()
  //  ----------------------------------------------------------------
  /**
    *   Returns a linked list of Squares, one for each occupied
    *   square on theBoard.  If the list is empty, returns null.
    *
    */
    public Square getBoardList() throws CBException {

      int     piece;
      Square  theList = null, current;

        for ( int row = 0; row < 8; row++ ) {
          for ( int col = 0; col < 8; col++ ) {
            if ( ( piece = occupant( row, col ) ) != NO_PIECE ) {
              current = new Square( row, col, piece, theList );
              theList = current;
              }
            }
          }

        return theList;

        }

    }


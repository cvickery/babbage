//  TestJavaLexemes.java

import java.io.*;

//  Class TestJavaLexemes
//  ------------------------------------------------------------------
/**
  *   Displays lexemes returned by JavaLexemes.  Used during the
  *   development of JavaLexemes.
  *
  *     @author   C. Vickery
  *     @version  1.0 - March, 2000
  *
  */
  public class TestJavaLexemes
  {
    private static final String NL      = System.getProperty(
                                                   "line.separator" );
    private static final int    MAX_COL = 72;

  //  Method main()
  //  ----------------------------------------------------------------
  /**
    *   For each file name on the command line, checks if it is a
    *   .java file, and parses it if it is.
    *
    *     @param  argv  List of files to parse.
    *     @return Void.
    *
    */
    public static void main( String argv[] )
    {
      BufferedReader  br  = null;
      JavaLexemes     jl  = null;
      int             columnNum = 0;
      int             thisLexeme = JavaLexemes.LT_NOTHING;

      //  Loop over command line arguments.
      for ( int f=0; f<argv.length; f++ )
      {

        //  Check for valid file name.
        if ( ! argv[f].endsWith( ".java" ) )
        {
          System.err.println( "Ignoring " + argv[f] +
                                              ": Not a .java file." );
          continue;
        }

        //  Try to parse the file.
        try
        {

          br = new BufferedReader( new FileReader( argv[f] ) );
          jl = new JavaLexemes( br );

          System.out.println( NL + "Parsing: " + argv[f] );

          thisLexeme  = JavaLexemes.LT_EOL;

          while ( thisLexeme != JavaLexemes.LT_EOF )
          {
            if ( thisLexeme == JavaLexemes.LT_UNTERMCOMM )
            {
              System.err.println( "<Unterminated Comment>" );
              columnNum = 1;
              break;
            }

            if ( thisLexeme == JavaLexemes.LT_UNTERMSTR )
            {
              System.err.println( NL + "<Unterminated String>" );
              columnNum = 1;
              break;
            }

            if ( thisLexeme == JavaLexemes.LT_UNTERMCHR )
            {
              System.err.println( NL + "<Unterminated Character>" );
              columnNum = 1;
              break;
            }

            if ( thisLexeme == JavaLexemes.LT_EOL )
            {
              System.out.println( NL + "Line " + jl.lineNum + ":" );
              columnNum = 1;
              thisLexeme = jl.nextLexeme();
              continue;
            }
            switch ( thisLexeme )
            {
              case jl.LT_SLASHSLASH:
                System.out.print( " <//>" );
                columnNum += 5;
                break;
              case jl.LT_SLASHASTER:
                System.out.print( " </*>" );
                columnNum += 5;
                break;
              case jl.LT_SLASHDOC:
                System.out.print( " </**>" );
                columnNum += 6;
                break;
              case jl.LT_LITERALSTR:
                System.out.print( " <\">" );
                columnNum += 4;
                break;
              case jl.LT_LITERALCHR:
                System.out.print( " <'>" );
                columnNum += 4;
                break;
              case jl.LT_LEXEME:
                System.out.print( " <lex>" );
                columnNum += 6;
                break;
              default:
                System.err.println( NL + argv[f] +
                  ": Invalid Lexeme (" + thisLexeme + ") " + jl.theLexeme
                   + " at line " + jl.lineNum );
                continue;
            }
            columnNum += jl.theLexeme.length();
            if ( columnNum > MAX_COL )
            {
              System.out.println();
              columnNum = jl.theLexeme.length();
              if ( columnNum > MAX_COL )
              {
                //  Need to truncate a long lexeme to print it.
                jl.theLexeme = jl.theLexeme.substring( 0, MAX_COL-5 ) +
                                                               "...";
              }
            }
            System.out.print( jl.theLexeme );
            thisLexeme = jl.nextLexeme();
          }
          System.out.println( NL + argv[f] + ": End of file." );
        }
        catch ( IOException e )
        {
          System.err.println( NL + e + ": " + e.getMessage() );          
        }
      }
    }
    
  }



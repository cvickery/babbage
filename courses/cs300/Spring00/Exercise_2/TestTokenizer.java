//  TestTokenizer.java

import java.io.*;

//  Class TestTokenizer
//  ------------------------------------------------------------------
/**
  *
  */
  public class TestTokenizer
  {
  //  Method main()
  //  --------------------------------------------------------------
  /**
    *
    */
    public static void main( String[] argv )       throws IOException
    {
      if ( argv.length != 1 )
      {
        System.err.println( "Need a file name." );
        System.exit( 1 );
      }
      if ( ! argv[0].endsWith( ".java" ) )
      {
        System.err.println( "Not a .java file." );
        System.exit( 1 );
      }
      BufferedReader  br  = new BufferedReader (
                              new FileReader( argv[0] ) );
      JavaLexemes     jl  = new JavaLexemes( br );
      JavaTokenizer   jt  = new JavaTokenizer( jl );

      while ( jt.hasNext() )
      {
        System.out.println( "  " + jt.next() );
      }
    }
  }


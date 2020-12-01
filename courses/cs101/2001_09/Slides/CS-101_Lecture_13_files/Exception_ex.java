public class HelloException extends Exception
{
  public HelloException( String str )
  {
    super( str );
  }
}

class Exception_ex
{
  public static void main( String[] args )
  {
    int a= 0, b = 0;
    if ( args.length > 0 )
      a = Integer.parseInt( args[0] );
    if ( args.length > 1 )
      b = Integer.parseInt( args[1] );
    try
    {
      if ( a != b )
      {
        throw new HelloException( a + " is not " + b );
      }
      System.out.println( "Arguments match." );
    }
    catch ( Exception e )
    {
      System.out.println( "Caught Exception" );
      System.err.println( e );
      System.out.println( e.getMessage() );
      System.exit( 1 );
    }
    finally
    {
      System.out.println( "Executing finally block." );
    }

    System.out.println( "Normal exit from program." );
    System.exit( 0 );
  }
}



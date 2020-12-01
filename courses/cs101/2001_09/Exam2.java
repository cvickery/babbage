import java.io.*;

/**
  *   Provides an exception class for Exam 2.
  *   @author C. Vickery
  */
  class Exam2Exception extends Exception
  {
    public Exam2Exception( String msg )
    {
      super( msg );
    }
  }

/**
  *   Test files to see if they are Java class files.  Only the magic
  *    number and the minor version number are checked.
  *   @author C. Vickery
  */
  public class Exam2
  {
  /**
    *   Tests each file named on the command line to see if it is a
    *   valid Java class file.
    *   @param  args  File names given on the command line.
    *   @throws Exam2Exception if any file name is not a valid class
    *           file.  
    */
    public static void main( String[] args ) throws Exam2Exception
    {
      try
      {
        for (int i = 0; i < args.length; i++ )
        {
          DataInputStream dis = new DataInputStream(
              new FileInputStream( args[i] ) );
          if ( dis.readInt() != 0xCAFEBABE )
          {
            throw new Exam2Exception( "bad magic number" );
          }
          int minorVersion = dis.readUnsignedShort();
          if ( minorVersion != 3 )
          {
            throw new Exam2Exception( "bad minor version" );
          }
          System.out.println( args[i] + ": Valid class file" );
        }
      }
      catch ( IOException ioe )
      {
        throw new Exam2Exception( "I/O error: " + ioe.getMessage() );
      }
      System.exit( 0 );
    }
  }



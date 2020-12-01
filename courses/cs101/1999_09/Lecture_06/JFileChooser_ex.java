//  JFileChooser_ex.java

import java.io.*;
import javax.swing.*;

public class JFileChooser_ex {

  public static void main( String[] argv )
  {
  JFileChooser  fc;
  File          f;

    while ( true ) {

      fc = new JFileChooser( argv.length ==1 ? argv[0] : "." );

      if ( fc.showOpenDialog( null ) == JFileChooser.APPROVE_OPTION )
      {
        f = fc.getSelectedFile();
        if ( f.exists() )
        {
          System.out.println( "Able to read " +
                              f.getAbsolutePath() );
          System.out.println( f.getName() + " is " +
                              f.length() + " bytes long." );
        }
        else
        {
          System.out.println( f.getName() + " does not exist." );
        }
      }
      else
      {
        System.exit( 0 );
      }
    }
  }
}

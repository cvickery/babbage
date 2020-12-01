//  WindowListener_ex.java

import java.awt.*;
import java.awt.event.*;
import java.text.*;
import java.util.Date;
import javax.swing.*;

//  Class WindowListener_ex
//  ------------------------------------------------------------------
/**
  *     Implements interface java.awt.event.WindowListener to
  *     illustrate Event handling.
  *
  *       @author C. Vickery
  */
  public class WindowListener_ex implements WindowListener
  {

    //  Here are six of the seven methods declared in interface
    //  WindowListener ... a prize if you can figure out how to get
    //  windowClosed() to be called.
    public void windowActivated( WindowEvent we )
    {
      System.err.println( we );
    }
    public void windowClosed( WindowEvent we )
    {
      System.err.println( we );
    }
    public void windowDeactivated(WindowEvent we )
    {
      System.err.println( we );
    }
    public void windowDeiconified (WindowEvent we )
    {
      System.err.println( we );
    }
    public void windowIconified( WindowEvent we )
    {
      System.err.println( we );
    }
    public void windowOpened( WindowEvent we )
    {
      System.err.println( we );
    }

    //  windowClosing()
    //  --------------------------------------------------------------
    /**
      *   Sleeps for 5 seconds, and then exits the application.  Prints
      *   messages telling the starting and ending times of the five
      *   second interval.
      *
      *     @param  we  The WindowEvent object that was created by the
      *     AWT thread in response to the user's clickin on the window
      *     close button (the one with the x in it).
      */
      public void windowClosing( WindowEvent we )
      {
        System.err.println( we );

        //  Display the name of the Thread that called this method.
        System.err.println( "This is windowClosing(), being executed "
            + "by thread \""
            + Thread.currentThread().getName() + ".\"" );
        listThreads();

        //  Format a message that shows the last six digits of the
        //  current time, in milliseconds since Jan 1, 1970.
        DecimalFormat df = new DecimalFormat( "000000" );
        System.err.println( df.format( new Date().getTime() % 100000 )
            + ": Sleeping ..." );

        //  Put this thread to sleep for 5 seconds.
        try
        {
          Thread.currentThread().sleep( 5000 );
        }
        catch ( InterruptedException ie ) { }

        //  Display the current time, which will be *approximately* five
        //  seconds after the previous time displayed.
        System.err.println( df.format( new Date().getTime() % 100000 )
            + ": Woke up" );

        //  Exit the application
        System.exit( 0 );
      }

      //  main()
      //  ------------------------------------------------------------
      /**
        *     Print this Thread's name, construct a GUI that shows how
        *     BorderLayout works, and register the WindowListener for
        *     the JFrame.
        *
        *     @param  args  Command line arguments.
        */
        public static void main( String[] args )
        {
          //  Display this thread's name
          System.err.println( "This is main(), being executed by "
              + "thread \"" + Thread.currentThread().getName() 
              + ".\"" );
          listThreads();

          //  Construct a JFrame with different colored labels in the
          //  five locations where Components can be placed.

          //  Create the Container (JFrame) and the five Components
          //  (JLabels)
          JFrame jf = new JFrame( "WindowListener_ex" );
          JLabel center = new JLabel( "Window Listener Example",
              SwingConstants.CENTER );
          JLabel north = new JLabel( "North",
              SwingConstants.CENTER );
          JLabel east = new JLabel( "East",
              SwingConstants.CENTER );
          JLabel south = new JLabel( "South",
              SwingConstants.CENTER );
          JLabel west = new JLabel( "West",
              SwingConstants.CENTER );

          //  Set the background colors of the labels, and make them
          //  opaque.  (Default is for them to be transparent, so the
          //  container's background shows through.)
          north.setBackground( Color.yellow );
          south.setBackground( Color.yellow );
          east.setBackground( Color.green );
          west.setBackground( Color.green );
          north.setOpaque( true );
          south.setOpaque( true );
          east.setOpaque( true );
          west.setOpaque( true );

          // Add the labels to the content pane.
          Container cp = jf.getContentPane();
          cp.add( center, BorderLayout.CENTER );
          cp.add( north,  BorderLayout.NORTH );
          cp.add( east,   BorderLayout.EAST );
          cp.add( south,  BorderLayout.SOUTH );
          cp.add( west,   BorderLayout.WEST );
          //  Invoke the layout manager(s) for the application, and
          //  display it.
          jf.pack();
            //  Use hard-coded coordinates to position the application
            //  on the screen.  This is a temporary hack to simplify the
            //  code.
            jf.setLocation( 400, 200 ); jf.show();

          //  Instantiate this class, and make the instance a listener
          //  for WindowEvents.
          jf.addWindowListener( new WindowListener_ex() );

          //  Print messages before leaving main()
          System.err.println( "About to return from main() ..." );
          listThreads();
          return;
        }
      //  listThreads()
      //  ------------------------------------------------------------
      /**
        *     Prints the names of up to 30 currently-active threads.
        */
        static void listThreads()
        {
          Thread[] tarray = new Thread[ 30 ];
          int n = Thread.currentThread().enumerate( tarray );
          System.err.println( "  Current thread names:" );
          for (int i=0; i<n; i++ )
            System.err.println( "    " + tarray[i].getName() );
        }
  }


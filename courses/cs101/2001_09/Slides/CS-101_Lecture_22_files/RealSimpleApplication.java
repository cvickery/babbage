import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

//  Class RealSimpleApplication
//  ------------------------------------------------------------------
/**   Illustrates essential steps in producing a Graphical User
  *   Interface: setting the layout, adding components, registering
  *   event handlers, computing layout geometry, and showing the
  *   interface on the screen.
  *
  *   @author C. Vickery
  *   CS-101, Fall 2001
  */
  public class RealSimpleApplication extends JFrame
  {
    //  Instance variables.
    //    Initialized after constructor calls super(), but before the
    //    rest of the constructor runs.
    Container cp = getContentPane();
    JButton   jb = new JButton( "Exit" );

    //  Constructor
    //  --------------------------------------------------------------
    /**   Initializes the GUI.  User exits application by closing the
      *   window; the exit button is displayed, but does nothing.
      */
      public RealSimpleApplication()
      {
        super( "Really Simple" );         // Parameter is window title.

        //  Add a component to a container's layout.
        cp.add( jb, BorderLayout.NORTH  );

        //  Register an event listener
        addWindowListener( new WindowAdapter()
        {
          public void windowClosing( WindowEvent we )
          {
            System.exit( 0 );
          }
        } );

        //  Compute the layout's geometry, and display the GUI.
        pack();
        show();
      }

    //  main()
    //  --------------------------------------------------------------
    /**   Instantiates this class; the constructor does all the work.
      *   @param  args  Command line arguments.
      */
      public static void main( String[] args )
        {
          new RealSimpleApplication();
        }
  }


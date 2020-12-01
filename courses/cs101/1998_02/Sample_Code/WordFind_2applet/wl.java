import java.applet.*;
import java.awt.*;
import java.awt.event.*;

//  Class wl
//  -----------------------------------------------------------------
/**
  *   This is a WindowAdapter, which provides empty implementations
  *   of all the WindowListener interface's methods.  This particular
  *   adapter overrides the windowClosing method so the Frame's
  *   close buttons will work.
  */
class wl extends WindowAdapter {

Frame   frame;
Applet  applet;

  //  Constructor
  //  ---------------------------------------------------------------
  /**
    *   Normally, the windowClosing() method is called when the user
    *   clicks on one of the close buttons in a Frame's decorations
    *   and is used to exit the application.  However, if the
    *   Frame was created by an Applet, trying to exit the application
    *   will cause a SecurityException (it would shut down the whole
    *   browser).  Instead, the best we can do is to make the Frame
    *   disappear if the user tries to close it.  To do this, the
    *   constructor has to be given a reference to the Frame so the
    *   windowClosing method will be able to control its visibility,
    *   and some sort of indicator that tells whether the Frame was
    *   created by an Applet or not; the second argument to this
    *   constructor is a reference to the Applet that created the
    *   Frame, or null if the Frame was created by an application.
    */
  public wl( Frame f, Applet a ) {

    frame = f;
    applet= a;

    }

  //  windowClosing()
  //  ---------------------------------------------------------------
  /**
    *   Exit when user closes the Frame, unless it was created by an
    *   applet, in which case, just make the Frame invisible.
    */
  public void windowClosing( WindowEvent e ) {

    if ( applet == null ) {

      System.exit( 0 );

      }

    else {

      frame.setVisible( false );

      }

    }

  }

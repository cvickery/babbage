//  WL.java
//

import java.awt.*;
import java.awt.event.*;

//  Class WL
//  -----------------------------------------------------------------
/**
  *   This is a WindowAdapter, which provides empty implementations
  *   of all the WindowListener interface's methods.  This particular
  *   adapter overrides the windowClosing method so the Frame's
  *   close buttons will work.
  *
  *   @author C. Vickery
  *   @date   Spring 1998
  */
class WL extends WindowAdapter {

Frame frame;

  //  Constructors
  //  ---------------------------------------------------------------
  /**
    *   Normally, the windowClosing() method is called when the user
    *   clicks on one of the close buttons in a Frame's decorations
    *   and is used to exit the application.  However, if the
    *   application has other windows that are supposed to remain
    *   active, or if the window was created by an applet, then this
    *   class can be used to make the window the user closes disappear,
    *   even though it isn't really deleted.  The caller has to
    *   a reference to the window to be made invisible.
    */
  public WL( Frame  f ) {

    frame = f;

    }

  //  windowClosing()
  //  ---------------------------------------------------------------
  /**
    *   Make the Frame invisible.
    */
  public void windowClosing( WindowEvent e ) {

    frame.setVisible( false );

    }

  }

import java.applet.*;
import java.awt.*;
import java.awt.event.*;

//  class WF_Frame
//  -----------------------------------------------------------------
/**
  *   This class is sets up a window for the user interface.  If
  *   the program is run as an application, clicking on the frame's
  *   close button will exit the application.  If the program is run
  *   as an applet, clicking on the close button will hide the window.
  *
  */
public class WF_Frame  extends Frame {

  //  Constructor for the class
  //  ---------------------------------------------------------------
  /**
    *   The applet or application that constructs this Frame must
    *   supply a String to be used in the title bar, and a reference
    *   to the Applet that is creating the Frame.  If the caller is
    *   not an Applet, it should pass null as the second parameter.
    */
  public WF_Frame( String str, Applet applet ) {

    super( str ); // Frame's constructor know how to handle the title.
    //  Create a WindowListener to deal with this Frame's decorations.
    //  It has to know whether this Frame was created by an Applet or
    //  not.
    addWindowListener( new wl( this, applet ) );

    }

  public void init() {
    // This is where the user interface will be defined.
    }

  }


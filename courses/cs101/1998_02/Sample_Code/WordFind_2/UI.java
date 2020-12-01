//  $Id$
//
//    Graphical UI for WordFind Project 2
//    CS-101, Spring 1998
//    @author C. Vickery
//
import java.awt.*;
import java.applet.Applet;
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
class WF_Frame  extends Frame {

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

//  class UI
//  -----------------------------------------------------------------
/**
  *   This is class constructs the User Interface for the program,
  *   but it is not the user interface itself.  Instead it creates
  *   a Frame (actually, a WF_Frame) for the user interface.  This
  *   class can be run as either an applet or as an application.  If
  *   run as an application, it doesn't do anything but create the
  *   WF_Frame, but if run as an Applet, it provides a button the user
  *   can click on to hide and un-hide the WF_Frame.
  */
public class UI extends Applet
                implements ActionListener {

static boolean  isApplet  = true;
Button          doit;

WF_Frame        wff;

  //  main()
  //  ---------------------------------------------------------------
  /**
    *   This is the entry point if the UI class is run as an
    *   application.  It turns off the isApplet flag and instantiates
    *   the class so it can call init(), which is the entry point
    *   when the class is loaded by appletviewer or a web browser.
    */
  public static void main( String[] args ) {

    isApplet = false;
    new UI().init();

    }

  //  init()
  //  ---------------------------------------------------------------
  /**
    *   This is the entry point if the class is run from appletviewer
    *   or from a web browser.  If run from appletviewer or a browser,
    *   put up a button so the user can hide/unhide the application.
    *   Whichever way it is run, create the window for the user
    *   interface, and show it.
    */
  public void init() {

    //  If run from appletviewer or a browser, put up the hide/show
    //  button and activate it.
    if ( isApplet ) {
      doit = new Button( "Hide" );
      add( doit );
      doit.addActionListener( this );
      repaint();
      }

    //  Create the window for the user interface.  Let the constructor
    //  know whether this is an applet or not by passing null if not,
    //  or a reference to this object otherwise.
    wff = new WF_Frame( "WordFind Puzzle", isApplet ? this : null );
    wff.setSize( 300, 200 );
    wff.show();

    }

  //  actionPerformed()
  //  ---------------------------------------------------------------
  /**
    *   Respond to clicks of the hide/show button.
    */
  public void actionPerformed( ActionEvent e ) {
      wff.setVisible( ! wff.isVisible() );
      doit.setLabel( wff.isVisible() ? " Hide " : " Show " );
      repaint();
      }

  }


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

//  $Id$
//
//    Graphical UI for WordFind Project 2
//    CS-101, Spring 1998
//    @author C. Vickery
//
import java.awt.*;
import java.applet.Applet;
import java.awt.event.*;

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



//  Powers of 2 Applet
//
//    User enters a range of integers, and the program displays all
//    powers of 2 within that range.
//
//    Exit appletviewer to terminate this program.
//
//    @author K. Lord
//    @author C. Vickery
//
import java.applet.Applet;
import java.awt.*;
import java.awt.event.*;


public class Power2 extends Applet implements ActionListener {

  Label     prompt;     //  Tell user what to do
  TextField starting,   //  Places for user's replies
            ending;
  int       firstPower, //  Converted input values
            lastPower;

  boolean   powersDefined = false;

  //    init()
  //    -------------------------------------------------
  /**   Set up the graphical user interface components
   *    and initialize variables
   */
  public void init() {

    //  First input area: ignore events from this one.
    prompt = new Label( "Enter starting power of 2 and press Tab: " );
    add( prompt );

    starting = new TextField( 3 );
    add( starting );

    //  Second input area: setup to respond to events from this one.
    prompt = new Label( "Enter ending power of 2 and press Enter:" );
    add( prompt );

    ending = new TextField( 3 );
    ending.addActionListener( this );
    add( ending );

    prompt = new Label( "Powers must be between 0 and 31." );
    add( prompt );

  }

  //    actionPerformed()
  //    -----------------------------------------------------
  /**   Process user's input when <Enter> is pressed in second
   *    input area.
   */
   public void actionPerformed( ActionEvent e ) {

     // Get the user's strings and convert them to integers
     firstPower  = Integer.parseInt( starting.getText() );
     lastPower   = Integer.parseInt( ending.getText() );

     powersDefined = true;
     repaint();

    }

  //   paint()
  //   ----------------------------------------------------
  /**  Display the list of powers of two requested by the
   *   user.
   */
  public void paint( Graphics g )  {

  int ColForP     = 40;
  int ColForPower = 80;
  int row         = 100;

    if ( powersDefined && firstPower >= 0 && lastPower <= 31 ) {

      for ( int p = firstPower; p <= lastPower; p++ ) {

        g.drawString( Integer.toString( p ), ColForP, row );
        g.drawString( Integer.toString( (int)Math.pow( 2, p )),
                      ColForPower, row );
        row += 15;

        }

      }

    else {

      g.drawString( powersDefined ?
                      "Invalid Powers!" : "Enter Powers Now",
                    ColForPower, row );

      }

    }

  }

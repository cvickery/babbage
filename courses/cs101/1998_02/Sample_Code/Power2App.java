//  Powers of 2 Application
//
//    User enters a range of integers, and the program displays all
//    powers of 2 within that range.
//
//    The applet creates a Frame, where the interaction with the user
//    takes place.
//
//    Exit with difficulty
//
//    @author K. Lord
//    @author C. Vickery
//
import java.applet.Applet;
import java.awt.*;
import java.awt.event.*;
import java.text.*;

public class Power2App extends Applet {

  static boolean isApplet;
  P2A     calculator;

  public static void main( String[] args ) {

    new Power2App().init();
    isApplet = false;

    }

  //  init() for the Applet
  //  ----------------------------------------------------------------
  /**
   *    Put a message and Exit button in the applet, and create
   *    a Frame for the Powers-of-Two calculator.
   */
  public void init() {

  Button  exitButton = new Button ( "Press this to Exit Calculator" );

    isApplet = true;
    add( new Label( "Hi!  Go use the Powers-of-Two Calculator." ) );

    exitButton.addActionListener( new ExitHandler() );
    add( exitButton );

    repaint();

    calculator = new P2A();
    calculator.init();
    calculator.setVisible( true );

    }


  //  start() and stop()
  //  -----------------------------------------------------------------
  //
  //    Hide/Show calculator when applet stops/starts.
  //
  public void start() {
    calculator.setVisible( true );
    }
  public void stop() {
    calculator.setVisible( false );
    }


  class ExitHandler implements ActionListener {
    
    //  actionPerformed for the Exit Button
    //  ----------------------------------------------------------------
    /**
     *    When user clicks Exit, hide the calculator Frame
     */

    public void actionPerformed( ActionEvent e ) {
      
      calculator.setVisible( false );
      
      }
    
    }

  }


class P2A extends Frame implements ActionListener {

  Label     prompt;     //  Tell user what to do
  TextField starting,   //  Places for user's replies
            ending;
  List      pot;        //  Powers of Two list
  DecimalFormat powerFmt  = new DecimalFormat( "  00: ; -00: " );
  DecimalFormat fracFmt   = new DecimalFormat();
  DecimalFormat intFmt    = new DecimalFormat();

  int       firstPower, //  Converted input values
            lastPower;

  boolean   powersDefined = false,
            newInput      = true;


  //    P2A Constructor
  //    -------------------------------------------------
  /**
   *    The constructor puts a title string on the Frame
   */
  public P2A() {

    super( "Powers of Two Calculator" );

    }

  //    init()
  //    -------------------------------------------------
  /**   Set up the graphical user interface components
   *    and initialize variables
   */
  public void init() {

    addWindowListener( new wa() );

    GridBagConstraints gbc = new GridBagConstraints();
    GridBagLayout       lm = new GridBagLayout();

    setLayout( lm );
    fracFmt.setMaximumFractionDigits( 19 );
    intFmt.setMaximumFractionDigits( 0 );


    //  First input area: ignore events from this one.

    gbc.gridy = 0;

    prompt = new Label( "Enter starting power of 2 and press Tab: " );
    gbc.gridx = 0;
    lm.setConstraints( prompt, gbc );
    add( prompt ); 

    starting = new TextField( 3 );
    gbc.gridx = 1;
    lm.setConstraints( starting, gbc );
    add( starting );

    //  Second input area: setup to respond to events from this one.

    gbc.gridy = 1;

    prompt = new Label( "Enter ending power of 2 and press Enter:" );
    gbc.gridx = 0;
    lm.setConstraints( prompt, gbc );
    add( prompt );

    ending = new TextField( 3 );
    ending.addActionListener( this ); 
    gbc.gridx = 1;
    lm.setConstraints( ending, gbc );
    add( ending );

    //  Instructions

    gbc.gridy = 2;
    gbc.gridwidth = 2;
    gbc.anchor = GridBagConstraints.CENTER;
    prompt = new Label( "Powers must be between -63 and 63." );
    gbc.gridx = 0;
    lm.setConstraints( prompt, gbc );
    add( prompt );

    //  Powers of Two List; Use fixed-width font

    gbc.gridy = 3;
    gbc.fill = GridBagConstraints.BOTH;
    pot = new List( 32, false );
    pot.setFont( new Font( "Courier", Font.PLAIN, 12 ) );
    gbc.weighty = 1;
    lm.setConstraints( pot, gbc );
    add( pot );

    setSize( 300, 500 );
    show();

  }

  //    actionPerformed()
  //    -----------------------------------------------------
  /**   Process user's input when &lt;Enter&gt; is pressed in second
   *    input area.
   */
   public void actionPerformed( ActionEvent e ) {

     // Get the user's strings and convert them to integers
     try {

       firstPower  = Integer.parseInt( starting.getText() );
       lastPower   = Integer.parseInt( ending.getText() );

       }

     catch ( NumberFormatException nfe ) {

       //  Unable to convert string(s); set illegal values
       firstPower = lastPower = -99;

       }

     powersDefined = true;
     newInput = true;
     repaint();

    }

  //   paint()
  //   ----------------------------------------------------
  /**  Display the list of powers of two requested by the
   *   user.
   */
  public void paint( Graphics g )  {


    //  Don't do anything if the user hasn't typed anything new
    if ( newInput ) {
      
      //  Clear the List
      pot.removeAll();
      
      //  Check for valid range of powers
      if ( powersDefined && firstPower >= -63 && lastPower <= 63 ) {
        
        for ( int p = firstPower; p <= lastPower; p++ ) {
          
          //  Negative and Positive powers are printed differently
          pot.addItem(  powerFmt.format( p ) +
            ( ( p < 0 ) ?
            fracFmt.format( Math.pow( 2, p ) ) :
          intFmt.format( (long) Math.pow( 2, p ) ) ) );
          
          }
        
        }
      
      else {
        
        //  If actionListener has been called, user entered bad value(s)
        pot.addItem( powersDefined ? 
          "Invalid Powers!" : "Enter Powers Now");
        
        }
      
      newInput = false;
      
      }

    }


  //  Inner class wa provides WindowAdapter Interface for the app
  //  -----------------------------------------------------------
  //
  //      Exit when user clicks on the close button.
  //
  class wa extends WindowAdapter {

    public void windowClosing( WindowEvent e ) {

      if ( !Power2App.isApplet ) {

        System.exit( 0 );

        }

      else {

        pot.removeAll();
        pot.addItem( "Go to appletviewer and exit from there." );

        }

      }

    }

  }

//  AudioSampling.java

import java.util.*;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import javax.swing.event.*;
import javax.swing.table.*;

//  Class AudioSampling
//  ------------------------------------------------------------
/** Illustrates effects of sampling rate and bits per sample on
  * quantization and encoding of a sine wave.  Command line
  * arguments are the frequency, sampling rate, and bits per
  * sample of the sine wave.  Amplitude of the wave is assumed to
  * be 2 VDC peak to peak.
  *
  *   @author   C. Vickery
  *   @version  1.0 - Fall 2000
  */
  public class AudioSampling
  {
    //  Constants
    static final double twoPi = 2.0 * Math.PI;

    //  Global variables
    static JFrame jf = new JFrame( "Audio Sampling Exercise" );
    static JLabel signalDisplay = new JLabel( " 1 KHz" );
    static JLabel rateDisplay = new JLabel( "4 KHz" );
    static JLabel intervalDisplay = new JLabel( "0.250 msec" );
    static JLabel bitsPerSampleDisplay = new JLabel( "4" );
    static JLabel numRangesDisplay = new JLabel( "16" );
    static JLabel voltsPerRangeDisplay = new JLabel(
                                                "0.0625 volts" );

    //  Primary parameters
    static  double  signalFrequency   = 1000.0;  //  Hertz
    static  int     bitsPerSample     = 4;
    static  double  samplingRate      = 4000.0;  // Samps per sec

    //  Derived parameters
    static  double    samplingInterval;
    static  double    signalPeriod;
    static  double[]  sampleValues;
    static  int[]     digitalSamples;
    static  double    voltsPerRange;
    static  int       numSamples;
    static  int       numRanges;

  //  Method main()
  //  ----------------------------------------------------------
  /** Captures command line argument values, then displays a
    *  table showing the binary encoding for each of the voltage
    *  ranges.
    *
    *  @param  argv  Command line arguments, in the form
    *  "name=value ..." where name may be any of the following:
    *  frequency - Frequency of the sine wave in KHz.  Default
    *              is 1.
    *  bits      - Bits per sample, default is 4.
    *  rate      - Sampling frequency in kilo-samples per
    *              second.  Default is 4.
    */
    public static void main( String[] argv )
    {
      //  Process each command line argument.
      for (int i = 0; i < argv.length; i++)
      {
        StringTokenizer st = new StringTokenizer(
                                    argv[i].toLowerCase(), "=" );

        //  Check that the argument is a <name>=<value> pair.
        if ( st.countTokens() != 2 )
        {
          usage();
          System.exit( 1 );
        }

        String  name = st.nextToken().trim();
        int     value = 0;
        try
        {
          value = Integer.parseInt( st.nextToken().trim() );
        }
        catch ( NumberFormatException nfe )
        {
          System.err.println( "Error: " + argv[i] +
                    " does not contain a valid integer value." );
          System.exit( 1 );
        }

        //  Determine the <name> and store the appropriate value.
        if ( "frequency".startsWith( name ) )
        {
          if ( value < 1 )
          {
            System.err.println( "Error: Signal frequency must " +
            "be greater than one." );
            System.exit( 1 );
          }

          signalFrequency = value * 1000;
          continue;
        }
        if ( "rate".startsWith( name ) )
        {
          if ( value < 1 )
          {
            System.err.println( "Error: Sampling rate must " +
            "be greater than one." );
            System.exit( 1 );
          }

          samplingRate = value * 1000;
          continue;
        }
        if( "bitspersample".startsWith( name ) )
        {
          if ( value < 1 )
          {
            System.err.println( "Error: Bits per sample must " +
            "be greater than one." );
            System.exit( 1 );
          }

          bitsPerSample = value;
          continue;
        }
        //  No matching parameter name
        System.err.println( "Error: " + name +
                        " is not a recognized parameter name." );
        usage();
      }

    //  Default values have now been overridden by any command
    //  line parameters.  Calculate derived values and generate
    //  the array of samples.
    calcDerived();

    //  Setup main GUI window
    //  --------------------------------------------------------
    jf.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
    JPanel contentPane = new JPanel( new BorderLayout( 15, 15) );
    contentPane.setBorder( BorderFactory.createLineBorder(
                             contentPane.getBackground(), 10 ) );
    jf.setContentPane( contentPane );

    //  Set up all the controls for the application
    //  --------------------------------------------------------
    {
      JPanel controlsPanel  = new JPanel(
                                new GridLayout( 1, 0, 20, 10 ) );
      JPanel rateControl    = new JPanel(   new BorderLayout() );
      JPanel resolutionControl = new JPanel(
                                            new BorderLayout() );
      JPanel buttonControls = new JPanel( new BorderLayout() );
      controlsPanel.add( rateControl );
      controlsPanel.add( resolutionControl );
      controlsPanel.add( buttonControls );

      //  Set up the sampling rate controls and display
      final JSlider samplesPerSecond = new
                          JSlider(JSlider.HORIZONTAL, 0, 100,
                                   (int)( samplingRate / 1000 ));
      samplesPerSecond.addChangeListener(new ChangeListener()
      {
        public void stateChanged( ChangeEvent ce )
        {
          samplingRate = Math.max( 1,
                            samplesPerSecond.getValue() ) * 1000;
          updateDisplay();
        }
      } );
      samplesPerSecond.setMajorTickSpacing(10);
      samplesPerSecond.setMinorTickSpacing(5);
      samplesPerSecond.setPaintTicks(true);
      samplesPerSecond.setPaintLabels(true);
      rateControl.add( samplesPerSecond, BorderLayout.CENTER );
      JPanel rateInfo = new JPanel( new GridLayout( 0, 2 ) );
      rateInfo.add( new JLabel( "Signal Frequency " ) );
      rateInfo.add( signalDisplay );
      rateInfo.add( new JLabel( "Sampling Rate " ) );
      rateInfo.add( rateDisplay );
      rateInfo.add( new JLabel( "Sampling Interval " ) );
      rateInfo.add( intervalDisplay );
      rateControl.add( rateInfo, BorderLayout.SOUTH );


      //  Set up the resolution controls and display
      final JSlider bitsPerSample =
                           new JSlider(JSlider.HORIZONTAL, 0, 16,
                                    AudioSampling.bitsPerSample);

      bitsPerSample.addChangeListener(new ChangeListener()
      {
        public void stateChanged( ChangeEvent ce )
        {
          AudioSampling.bitsPerSample = Math.max( 1,
                                      bitsPerSample.getValue() );
          updateDisplay();
        }
      } );
      bitsPerSample.setMajorTickSpacing(4);
      bitsPerSample.setMinorTickSpacing(1);
      bitsPerSample.setPaintTicks(true);
      bitsPerSample.setPaintLabels(true);
      resolutionControl.add( bitsPerSample, BorderLayout.CENTER
      );
      JPanel resolutionInfo = new JPanel(
                                        new GridLayout( 0, 2 ) );
      resolutionInfo.add( new JLabel( "Bits per Sample " ) );
      resolutionInfo.add( bitsPerSampleDisplay );
      resolutionInfo.add( new JLabel( "Number of Ranges " ) );
      resolutionInfo.add( numRangesDisplay );
      resolutionInfo.add( new JLabel( "Resolution " ) );
      resolutionInfo.add( voltsPerRangeDisplay );
      resolutionControl.add( resolutionInfo,
                                           BorderLayout.SOUTH );

      //  Set up the button controls
      JButton exitButton = new JButton( "Exit" );
      exitButton.addActionListener( new ActionListener()
      {
        public void actionPerformed( ActionEvent ae )
        {
          System.exit( 0 );
        }
      } );
      JPanel bc = new JPanel();
      bc.add( exitButton );
      buttonControls.add( bc, BorderLayout.SOUTH );

      //  Add the controls to the GUI
      contentPane.add( controlsPanel, BorderLayout.SOUTH );
    }


    //  Display the voltage-to-binary mapping table
    //  --------------------------------------------------------

    //  Define the TableModel for the values to be displayed.
    TableModel dataModel = new AbstractTableModel() {
        public int getColumnCount()
        {
          return 2;
        }
        public int getRowCount()
        {
          return numRanges;
        }
        public Object getValueAt(int row, int col)
        {
          int intervalNumber = numRanges - row - 1;
          if ( col == 0 )
          {
            //  Range of voltages for the row
            double v1 = 1.0 - (row * voltsPerRange);
            double v2 = 1.0 - ((row + 1) * voltsPerRange);
            return Math.min( v1, v2 ) +
                   " to " +
                   Math.max( v1, v2 );
          }
          else
            //  Binary code for the row
            return binaryString( intervalNumber, bitsPerSample );

        }
        public String getColumnName( int colNum )
        {
          String[] columnName = { "Voltage Range",
                                  "Binary Encoding" };
          return columnName[ colNum ];
        }
      };

    JTable      table = new JTable( dataModel );
    JScrollPane sp    = new JScrollPane( table );

//  Unable to set initial widths of table columns ...
    TableColumn col   = table.getColumnModel().getColumn( 0 );
    col.setPreferredWidth( 75 );
    col = table.getColumnModel().getColumn( 1 );
    col.setPreferredWidth( 15 );

    //  Create Panels for plotting the data
    //  --------------------------------------------------------

    //  Plot the sampled voltages
    //  --------------------------------------------------------
    JPanel voltagePanel = new JPanel();
    voltagePanel.setLayout( new BorderLayout() );
    voltagePanel.add( new JLabel( "Sampled Voltages",
                                                  JLabel.CENTER),
                      BorderLayout.NORTH);
    JPanel vp = new JPanel()
    {
      public void paint( Graphics g )
      {
        Dimension d = getSize();

        //  Draw axes
        g.drawLine( 4, d.height/2, d.width - 4, d.height/2 );
        g.drawLine( 4, 4, 4, d.height - 8 );
        g.drawRect( 1, 1, d.width - 2, d.height - 2 );

        //  Plot the measured voltages
        double pixelsPerSample = (double)(d.width - 10) /
                                                      numSamples;
        int pixelsPerVolt = (int) ((d.height - 10) / 2.0 );
        double curX = 10.0;
        int diam = (samplingRate < 15000.0) ? 6 : 4;
        diam = (samplingRate > 25000.0) ? 3 : diam;
        for ( int i = 0; i < sampleValues.length; i++ )
        {
          g.fillOval( (int)curX,
                      (int) ((1.0 - sampleValues[i]) *
                                              pixelsPerVolt) + 4,
                      diam, diam );
         curX += pixelsPerSample;
        }
      }
      public Dimension getPreferredSize()
      {
        return new Dimension( Math.min( 300, 50 * numSamples),
                                              2 * numRanges );
      }
    };
    voltagePanel.add( vp, BorderLayout.CENTER );

    //  Graph the generated waveform
    //  --------------------------------------------------------
    JPanel outputPanel = new JPanel();
    outputPanel.setLayout( new BorderLayout() );
    outputPanel.add( new JLabel( "Generated Waveform",
                                 JLabel.CENTER ),
                     BorderLayout.NORTH) ;
    JPanel op = new JPanel()
    {
      public void paint( Graphics g )
      {
        Dimension d = getSize();

        //  Draw axes
        g.drawLine( 4, d.height/2, d.width - 4, d.height/2 );
        g.drawLine( 4, 4, 4, d.height - 8 );
        g.drawRect( 1, 1, d.width - 2, d.height - 2 );

        //  Draw step function
        int origin = d.height - 10; // Y axis increases downward
        double pixelsPerSample = (double) (d.width - 10) /
                                                      numSamples;
        double pixelsPerRange  = (double)(d.height - 10) /
                                                      numRanges ;
        double curX = 10.0;
        double curY = 4.0 + (origin - digitalSamples[ 0 ] *
                                                 pixelsPerRange);
        int x1, x2;
        int y1, y2;

        x1 = (int) curX;
        y1 = (int) curY;
        for ( int i = 1; i < numSamples; i++ )
        {
          curX += pixelsPerSample;
          curY = 4.0 + (origin - digitalSamples[ i ] *
                                                 pixelsPerRange);
          x2 = (int)curX;
          y2 = (int)curY;
          g.drawLine( x1, y1, x2, y1 );
          g.drawLine( x2, y1, x2, y2 );
          x1 = x2;
          y1 = y2;
        }
      }
      public Dimension getPreferredSize()
      {
        return new Dimension( Math.min( 300, 50 * numSamples),
                                              2 * numRanges );
      }
    };
    outputPanel.add( op, BorderLayout.CENTER );

    contentPane.add( voltagePanel, BorderLayout.WEST );
    contentPane.add( sp, BorderLayout.CENTER );
    contentPane.add( outputPanel, BorderLayout.EAST );


    //  Put the Window up on the screen.
    //  --------------------------------------------------------
    jf.pack();
    centerIt( jf );
    jf.show();
  }

  //  Method usage()
  //  ----------------------------------------------------------
  /**
    * Writes command line syntax message to error output.
    */
    private static void usage()
    {
      System.err.println( "Usage: java AudioSampling " +
                               "[<name>=<value>]...\n" +
                    "<value> must be an integer, and " +
         "<name> must be { frequency | rate | bits }." );
    }

  //  Method centerIt()
  //  ----------------------------------------------------------
  /**
    * Centers a window on the screen.
    *
    *   @param  theWindow The Window to be centered.
    */
    private static void centerIt( Window theWindow )
    {
      Dimension scr =
                     Toolkit.getDefaultToolkit().getScreenSize();
      Dimension win = theWindow.getSize();
      Point upperLeft = new Point( (scr.width - win.width) / 2,
                                 (scr.height - win.height) / 2 );
      theWindow.setLocation( upperLeft );
    }

  //  Method binaryString()
  //  ----------------------------------------------------------
  /**
    *   Converts an integer into a binary string.
    *
    *     @param  theInt  The integer to be converted.
    *     @param  bits    Length of string to be returned.
    *     @return The bits in the int as a string.
    */
    private static String binaryString( long theInt, long bits )
    {
      StringBuffer sb = new StringBuffer();
      for ( int i = 0; i < bits; i++ )
      {
        sb.append( theInt % 2 );
        theInt = theInt / 2;
      }
      return new String( sb.reverse() );
    }

  //  Method updateDisplay()
  //  ----------------------------------------------------------
  /**
    *   Called when input parameters change to calculate
    *   derived parameters and show the new results.
    */
    private static void updateDisplay()
    {
      calcDerived();
      jf.repaint();
    }

  //  Method calcDerived()
  //  ----------------------------------------------------------
  /**
    *   Calculates derived parameters from signal frequency,
    *   sampling rate, and bits per sample.  Generates array of
    *   sampled voltages.
    */
    private static void calcDerived()
    {
      samplingInterval = 1.0 / samplingRate;
      signalPeriod = 1.0 / signalFrequency;
      numSamples = 1 + (int) (signalPeriod / samplingInterval);
      sampleValues = new double[ numSamples ];
      digitalSamples = new int[ numSamples ];
      numRanges = (int) Math.pow( 2, bitsPerSample );
      voltsPerRange = 2.0 / numRanges;

      double offset = 0.0;
      for ( int i = 0; i < sampleValues.length; i++ )
      {
        sampleValues[ i ] = Math.sin( (offset / signalPeriod) *
                            twoPi );
        digitalSamples[ i ] = Math.min( numRanges - 1,
             (int)(( 1.0 + sampleValues[ i ]) / voltsPerRange) );
        offset += samplingInterval;
      }

      signalDisplay.setText( (int)(signalFrequency / 1000) +
                                                        " KHz" );
      rateDisplay.setText( (int)(samplingRate / 1000 ) +
                                                        " KHz" );
      int x = (int) (samplingInterval * 10000000.0);
      intervalDisplay.setText( ((double) x / 10.0) +
                                                  " \u00b5sec" );
      bitsPerSampleDisplay.setText( bitsPerSample + "" );
      numRangesDisplay.setText( numRanges + "" );
      voltsPerRangeDisplay.setText( voltsPerRange + " volts" );
    }
  }



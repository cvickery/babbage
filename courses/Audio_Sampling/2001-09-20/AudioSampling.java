//  AudioSampling.java

import java.util.*;
import java.awt.*;
import java.awt.event.*;
import java.awt.print.*;
import javax.swing.*;
import javax.swing.event.*;
import javax.swing.table.*;

//  Class AudioSampling
//  ------------------------------------------------------------------
/**   Illustrates effects of sampling rate and bits per sample on
  *   quantization and encoding of a sine wave.  Command line
  *   arguments are the frequency, sampling rate, and bits per sample
  *   of the sine wave.  Amplitude of the wave is assumed to be 2 VDC
  *   peak to peak.
  *
  *   Version 1.2 - September 20, 2000 Cleaned up the display of
  *   voltage-to-binary mappings so it is updated properly as
  *   parameters change, and so the binary strings are centered in
  *   their column.  Added option to display the sampled values in a
  *   dialog box.  Added Print option, but don't actually use it
  *   because it's not very good.  Version 1.1 - September 18, 2000
  *   Replaced sampleValues and digitalSamples arrays with functions
  *   to deal with garbage collection overhead.
  *
  *   @author   C. Vickery 
  *   @version  1.2 - Fall 2000
  */
  public class AudioSampling {
    //  Constants
    static final double twoPi = 2.0 * Math.PI;

    //  Global variables
    static JFrame     jf = new JFrame( "Audio Sampling Laboratory" );
    static JPanel   contentPane;
    static JPanel   voltagePanel; //  Sampled waveform
    static JPanel   outputPanel;  //  Reconstructed waveform

    static JLabel   signalDisplay = new JLabel( " 1 KHz" );
    static JLabel   rateDisplay = new JLabel( "4 KHz" );
    static JLabel   intervalDisplay = new JLabel( "0.250 msec" );
    static JLabel   bitsPerSampleDisplay = new JLabel( "4" );
    static JLabel   numRangesDisplay = new JLabel( "16" );
    static JLabel   voltsPerRangeDisplay = new JLabel(
                                                "0.0625 volts" );
    static JDialog  samplesDialog = new JDialog( jf,
                                         "Sample Values", true );
    static JButton  samplesButton = new JButton(
                                                "Show Samples" );
    static JButton  printButton = new JButton( "Print" );
    static JButton  exitButton = new JButton( "Exit" );
    static JTable   encodingTable = null;
    static JTable   samplesTable  = null;

    //  Primary parameters
    static  double  signalFrequency   = 1000.0;  //  Hertz
    static  int     bitsPerSample     = 4;
    static  double  samplingRate      = 4000.0;  // Samps per sec

    //  Derived parameters
    static  double    samplingInterval;
    static  double    signalPeriod;
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

    //  Setup main GUI window.
    //  --------------------------------------------------------

    //  Make the close button work, and set up a border around
    //  the top-level components in the frame.
    jf.setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
    contentPane = new JPanel( new BorderLayout( 15, 15 ));
    contentPane.setBorder( BorderFactory.createLineBorder(
                             contentPane.getBackground(), 10 ) );
    jf.setContentPane( contentPane );

    //  Plot the sampled voltages.
    //  --------------------------------------------------------
    voltagePanel = new JPanel();
    voltagePanel.setLayout( new BorderLayout() );
    voltagePanel.add( new JLabel( "Sampled Voltages",
                                                  JLabel.CENTER),
                      BorderLayout.NORTH);
    JPanel vp = new JPanel()
    {
      public void paint( Graphics g )
      {
        Dimension d = getSize();

        //  Draw axes.
        g.drawLine( 4, d.height/2, d.width - 4, d.height/2 );
        g.drawLine( 4, 4, 4, d.height - 8 );
        g.drawRect( 1, 1, d.width - 2, d.height - 2 );

        //  Plot the measured voltages.
        double pixelsPerSample = (double)(d.width - 10) /
                                                      numSamples;
        int pixelsPerVolt = (int) ((d.height - 10) / 2.0 );
        double curX = 10.0;
        int diam = (samplingRate < 15000.0) ? 6 : 4;
        diam = (samplingRate > 25000.0) ? 3 : diam;
        for ( int i = 0; i < numSamples; i++ )
        {
          g.fillOval( (int)curX,
                      (int) ((1.0 - sampleValues( i )) *
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


    //  Display the voltage-to-binary mapping table.
    //  --------------------------------------------------------

    //  Define the TableModel for the values to be displayed.
    TableModel voltsToBinaryModel = new AbstractTableModel() {
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

    //  Define a renderer for the encoding table that uses
    //  centered labels for the binary values and left-aligned
    // labels for the voltage ranges.
    final TableCellRenderer alignedRenderer = new
                                              TableCellRenderer()
    {
      public Component getTableCellRendererComponent(
                  JTable table, Object value, boolean isSelected,
                           boolean hasFocus, int row, int column)
      {
        if ( column == 0 )
          // Voltage ranges
          return new JLabel( (String)value );
        // else ...
        // binary strings
        return new JLabel( (String) value, JLabel.CENTER );
      } };

    //  Now create the encoding table from the data model, and
    //  install the custom cell renderer.
    encodingTable = new JTable( voltsToBinaryModel )
    {
      public TableCellRenderer getCellRenderer(int row,
                                                      int column)
      {
        return alignedRenderer;
	    }
    };

    //  Make the encoding table scrollable as needed.
    JScrollPane encodingPane = new JScrollPane( encodingTable );

    //  Set initial widths of table columns.
    //  (These turn out to be relative, not absolute, widths ...)
    TableColumn tabCol =
                   encodingTable.getColumnModel().getColumn( 0 );
    tabCol.setPreferredWidth( 75 );
    tabCol = encodingTable.getColumnModel().getColumn( 1 );
    tabCol.setPreferredWidth( 15 );


    //  Graph the generated waveform.
    //  --------------------------------------------------------
    outputPanel = new JPanel();
    outputPanel.setLayout( new BorderLayout() );
    outputPanel.add( new JLabel( "Generated Waveform",
                                 JLabel.CENTER ),
                     BorderLayout.NORTH) ;
    JPanel op = new JPanel()
    {
      public void paint( Graphics g )
      {
        Dimension d = getSize();

        //  Draw axes.
        g.drawLine( 4, d.height/2, d.width - 4, d.height/2 );
        g.drawLine( 4, 4, 4, d.height - 8 );
        g.drawRect( 1, 1, d.width - 2, d.height - 2 );

        //  Draw step function.
        int origin = d.height - 10; // Y axis increases downward
        double pixelsPerSample = (double) (d.width - 10) /
                                                      numSamples;
        double pixelsPerRange  = (double)(d.height - 10) /
                                                      numRanges ;
        double curX = 10.0;
        double curY = 4.0 + (origin - digitalSamples( 0 ) *
                                                 pixelsPerRange);
        int x1, x2;
        int y1, y2;

        x1 = (int) curX;
        y1 = (int) curY;
        for ( int i = 1; i < numSamples; i++ )
        {
          curX += pixelsPerSample;
          curY = 4.0 + (origin - digitalSamples( i ) *
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

    //  Add the sampled voltage plot, the voltage to binary
    //  encoding table, and the generated waveform plot to the
    //  upper part of the window.
    contentPane.add( voltagePanel,  BorderLayout.WEST );
    contentPane.add( encodingPane,  BorderLayout.CENTER );
    contentPane.add( outputPanel,   BorderLayout.EAST );


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


      //  Set up the resolution controls and display.
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

      //  Set up the button controls.
      //  ======================================================

      //  Set up the samples dialog box.
      //  ------------------------------------------------------

      //  Define a renderer that uses centered labels for the
      //  samples table.

      final TableCellRenderer centeredRenderer = new
                                              TableCellRenderer()
      {
        public Component getTableCellRendererComponent(
                  JTable table, Object value, boolean isSelected,
                           boolean hasFocus, int row, int column)
        {
          return new JLabel( value.toString(), JLabel.CENTER );
        } };

      //  Define the TableModel for the values to be displayed.
      TableModel samplesModel = new AbstractTableModel() {
          public int getColumnCount()
          {
            return 2;
          }
          public int getRowCount()
          {
            return numSamples;
          }
          public Object getValueAt(int row, int col)
          {
            int x = 0;
            int intervalNumber = numRanges - row - 1;
            if ( col == 0 )
            {
              //  The moment of sampling
              x = (int)(1000000 * row * samplingInterval );
              return new Double( x / 10.0 );
            }
            else
              //  The voltage sampled
              x = (int)(1000 * sampleValues( row ));
              return new Double( x / 1000.0 );

          }
          public String getColumnName( int colNum )
          {
            String[] columnName = { "Sample Time in \u00B5sec",
                                    "Sampled Voltage" };
            return columnName[ colNum ];
          }
        };

      //  Create the table of samples and install the centered
      //  renderer for it.
      samplesTable = new JTable( samplesModel )
      {
        public TableCellRenderer getCellRenderer(int row,
                                                 int column)
        {
          return centeredRenderer;
  	    }
      };
      JScrollPane samplesPane = new JScrollPane( samplesTable );
      samplesDialog.getContentPane().add( samplesPane,
                                           BorderLayout.CENTER );

      //  Set up the "Dismiss" button for the samples dialog.
      JButton dismissSamples = new JButton( "Dismiss" );
      dismissSamples.addActionListener( new ActionListener()
      {
        public void actionPerformed( ActionEvent ae )
        {
          samplesDialog.hide();
        }
      } );
      samplesDialog.getContentPane().add( dismissSamples,
                                            BorderLayout.SOUTH );

      //  Set up the "Show Samples" button in the button
      //  controls.
      samplesButton.addActionListener( new ActionListener()
      {
        public void actionPerformed( ActionEvent ae )
        {
          samplesButton.setEnabled( false );
          printButton.setEnabled( false );
          exitButton.setEnabled( false );
          samplesTable.revalidate();
          samplesDialog.pack();
          centerIt( samplesDialog );
          samplesDialog.show();
          samplesButton.setEnabled( true );
          printButton.setEnabled( true );
          exitButton.setEnabled( true );
        }
      } );


      //  Set up the "Print" button in the button controls.
      printButton.addActionListener( new ActionListener()
      {
        public void actionPerformed( ActionEvent ae )
        {
          PrintWindow pw = new PrintWindow( outputPanel );
          PrinterJob  pj = PrinterJob.getPrinterJob();
          PageFormat  pf = pj.defaultPage();
          Book bk = new Book();
          bk.append( pw, pf );
          pj.setPageable( bk );
          try
          {
            pj.print();
          }
          catch ( PrinterException pe )
          {
            System.err.println( pe );
          }
        }
      } );


      //  Set up the "Exit" button in the button controls.
      exitButton.addActionListener( new ActionListener()
      {
        public void actionPerformed( ActionEvent ae )
        {
          System.exit( 0 );
        }
      } );


      //  Add the buttons to the button control panel.
      JPanel bc = new JPanel( new GridLayout( 0, 1 ) );
      bc.add( samplesButton );
//    bc.add( printButton );
      bc.add( exitButton );
      buttonControls.add( bc, BorderLayout.SOUTH );

      //  Add the controls to the GUI
      contentPane.add( controlsPanel, BorderLayout.SOUTH );
    }


    //  Put the Window up on the screen.
    //  --------------------------------------------------------
    jf.pack();
    centerIt( jf );
    jf.show();
  }


  //  Utility Methods
  //  ==========================================================

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
      encodingTable.revalidate();
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
      numRanges = (int) Math.pow( 2, bitsPerSample );
      voltsPerRange = 2.0 / numRanges;

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

  //  Method sampleValues()
  //  -----------------------------------------------------------
  /**
    *   Returns the voltage sampled at interval intervalNum.
    *
    *     @param intervalNum  The index of the sampling interval,
    *                         between zero and numSamples -1.
    *     @return             The analog voltage during that
    *                         sampling interval.
    */
    private static double sampleValues( int intervalNum )
    {
      return Math.sin( (intervalNum * samplingInterval) /
                                          signalPeriod * twoPi );
    }


  //  Method digitalSamples()
  //  -----------------------------------------------------------
  /**
    *   Returns the output of the A/D converter for sampling
    *   interval intervalNum.
    *
    *     @param intervalNum  The index of the sampling interval.
    *     @return             The digital output of the A/D
    *                         converter for that interval.
    */
    private static int digitalSamples( int intervalNum )
    {
      return Math.min( numRanges - 1,
               (int)(( 1.0 + sampleValues( intervalNum )) /
                                                voltsPerRange) );
    }
}

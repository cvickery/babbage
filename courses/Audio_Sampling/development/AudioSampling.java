//$Id: AudioSampling.java,v 1.16 2007/01/13 09:40:43 vickery Exp $

/*  Copyright (c) 2007, Queens College of the City University
 *  of New York.  All rights reserved.
 *
 *  Redistribution and use in source and binary forms, with or
 *  without modification, are permitted provided that the
 *  following conditions are met:
 *
 *      * Redistributions of source code must retain the above
 *        copyright notice, this list of conditions and the
 *        following disclaimer.
 *
 *      * Redistributions in binary form must reproduce the
 *        above copyright notice, this list of conditions and
 *        the following disclaimer in the documentation and/or
 *        other materials provided with the distribution.
 *
 *      * Neither the name of Queens College of CUNY
 *        nor the names of its contributors may be used to
 *        endorse or promote products derived from this
 *        software without specific prior written permission.
 *
 *  THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND
 *  CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED
 *  WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 *  WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 *  PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 *  OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 *  INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 *  (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR
 *  BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 *  LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 *  (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT
 *  OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 *  POSSIBILITY OF SUCH DAMAGE.
 *
 *  $Log: AudioSampling.java,v $
 *  Revision 1.16  2007/01/13 09:40:43  vickery
 *  Turn start or stop audio on each iteration of the audio generation
 *  thread.
 *
 *  Revision 1.15  2007/01/13 03:23:04  vickery
 *  Added tooltips and cleaned up UI details.  Reworked audio output
 *  to get rid of a buzz caused by audio system dropping out for 1.5
 *  msec periodically one one Windows computer.  The buzz remains.
 *
 *  Revision 1.14  2007/01/12 09:36:33  vickery
 *  Debugging difference between Windows and Macintosh sound
 *  systems.
 *
 *  Revision 1.13  2007/01/12 04:36:48  vickery
 *  Probabilistic downsampling didn't work so now the sampling rate must
 *  be an integer divisor of the audio system's sampling rate if there
 *  is an audio system.  Added a command line option for disabling audio
 *  system.
 *
 *  Revision 1.12  2007/01/11 09:42:43  vickery
 *  Ready for testing on other systems.
 *
 *  Revision 1.11  2007/01/11 04:29:01  vickery
 *  Improved simulation of degraded audio system parameters.
 *  Show when Nyquist frequency exceeded.
 *
 *  Revision 1.10  2007/01/10 09:26:10  vickery
 *  UI Fixed; generating audio, but frequency do not match 'scope.
 *
 *  Revision 1.9  2007/01/09 09:15:14  vickery
 *  Re-cleaning up UI.
 *
 *  Revision 1.8  2007/01/09 02:52:56  vickery
 *  ContinuousSound comments reflect PC experiments.
 *
 *  Revision 1.5  2007/01/03 07:17:55  vickery
 *  Debugging audio output.
 *
 *  Revision 1.4  2007/01/01 04:57:12  vickery
 *  Added abscissae labels for voltage samples.
 *  Fixed error in initial signal frequency slider position.
 *  Started fixing changing width of generated waveform.
 *
 *  Revision 1.3  2006/12/16 00:05:36  vickery
 *  Generated Waveforms panel displays step function scaled to the size
 *  of the panel.
 *  Bits per sample upper limit, except for command line argument, is
 *  limited to log2(height of Generated Waveforms) panel.
 *  Promoted some local variables (bitsPerSecond Slider) to fields; doing
 *  more would make it easier to navigate the code.
 *
 *  Revision 1.2  2006/12/15 10:34:31  vickery
 *  Cleaned up bits per sample management.  Now creating arrays of the
 *  voltage and digital samples.
 *  Working on problem of displaying generated waveform properly.
 *
 *  Revision 1.1  2006/12/15 01:38:17  vickery
 *  Added ability to control frequency as well as sampling rate at run time.
 *  Now allowing non-integer KHz values for both frequency and sampling rate.
 *  Made the rate/frequency control panel more compact.
 *  The PrintWindow class remains an orphaned part of the project.
 *
 */

//  Class AudioSampling
//  -----------------------------------------------------------------------
/**   Illustrates effects of sampling rate and bits per sample on
 *   quantization and encoding of a sine wave.  Command line arguments are
 *   the frequency, sampling rate, and bits per sample of the sine wave.
 *   Amplitude of the wave is fixed at 2 VDC peak to peak.
 *
 *   Version 1.2 - September 20, 2000
 *   Cleaned up the display of voltage-to-binary mappings so it is updated
 *   properly as parameters change, and so the binary strings are centered
 *   in their column.  Added option to display the sampled values in a
 *   dialog box.  Added Print option, but don't actually use it because
 *   it's not very good.
 *   Version 1.1 - September 18, 2000
 *   Replaced sampleValues and digitalSamples arrays with functions
 *   to deal with garbage collection overhead.
 *
 *   @author   C. Vickery
 *   @version  1.2 - Fall 2000
 */

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Component;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.GridLayout;
import java.awt.Point;
import java.awt.Toolkit;
import java.awt.Window;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.nio.ByteOrder;
import java.text.DecimalFormat;
import java.util.Dictionary;
import java.util.Hashtable;
import java.util.StringTokenizer;

import javax.sound.sampled.AudioFormat;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Line;
import javax.sound.sampled.LineUnavailableException;
import javax.sound.sampled.Mixer;
import javax.sound.sampled.SourceDataLine;
import javax.sound.sampled.AudioFormat.Encoding;
import javax.swing.BorderFactory;
import javax.swing.Box;
import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JSlider;
import javax.swing.JSpinner;
import javax.swing.JTable;
import javax.swing.SpinnerListModel;
import javax.swing.ToolTipManager;
import javax.swing.border.Border;
import javax.swing.border.TitledBorder;
import javax.swing.event.ChangeEvent;
import javax.swing.event.ChangeListener;
import javax.swing.table.AbstractTableModel;
import javax.swing.table.TableCellRenderer;
import javax.swing.table.TableColumn;
import javax.swing.table.TableModel;

public class AudioSampling
{

  //  Constants
  static final double twoPi = 2.0 * Math.PI;

  //  Global variables
  static final JFrame     jf =    new JFrame( "Audio Sampling Laboratory" );
  static final JPanel     contentPanel =
                                    new JPanel( new BorderLayout( 15, 15 ));

  static final JPanel     voltagePanel =     new JPanel(new BorderLayout());
  static final JPanel     outputPanel =      new JPanel(new BorderLayout());
  static final Dimension  preferredPanelSize =      new Dimension(300, 200);

  static final JPanel   voltagePanelAbscissae =
                                             new JPanel(new BorderLayout());
  static final JLabel   voltageAbscissaeLeftLabel =
                                            new JLabel("0", JLabel.LEADING);
  static final JLabel   voltageAbscissaeCenterLabel =
                                           new JLabel("0.5", JLabel.CENTER);
  static final JLabel   voltageAbscissaeRightLabel =
                                         new JLabel("1.0", JLabel.TRAILING);
  static final JLabel   voltageAbscissaeUnitsLabel =
                                  new JLabel("milliseconds", JLabel.CENTER);

  static final Border   boxBorder
                              = BorderFactory.createLineBorder(Color.green);
  static final TitledBorder frequencyBoxBorder =
            BorderFactory.createTitledBorder(boxBorder, "Signal Frequency");
  static final JLabel   samplingRateLabel =     new JLabel("Sampling Rate");
  static final JLabel   samplingRateSpinnerLabel =         new JLabel("Hz");
  static final TitledBorder resolutionBoxBorder =
             BorderFactory.createTitledBorder(boxBorder, "Bits per Sample");
  static final JLabel   voltsPerRangeLabel =
                         new JLabel("Sampling Resolution: 0.0078125 volts");
  static final JDialog  samplesDialog =
                                     new JDialog(jf, "Sample Values", true);
  static final JButton  playSoundButton =
                                     new JButton("Play Generated Waveform");
  static final JButton  showSamplesButton =     new JButton("Show Samples");
  static final JButton  exitButton =                  new JButton( "Exit" );
  static final EnumeratedVector supportedSamplingRates =
                                                     new EnumeratedVector();
  static       JTable   encodingTable = null;
  static       JTable   samplesTable = null;
  static final JSlider  bitsPerSampleSlider =
                                  new JSlider(JSlider.HORIZONTAL, 0, 20, 8);


  //  Primary parameters
  static  double  signalFrequency       = 441.0; //  Hertz
  static  int     bitsPerSample         = 8;
  static  double  samplingRate          = 44100.0; //  Samples per sec
  static  boolean doPlay                = false;  //  Play Sound Control

  //  Derived parameters
  static  double  samplingInterval;
  static  double  signalPeriod;
  static  double  voltsPerRange;
  static  int     numSamples;
  static  int     numRanges;
  static  float[] voltageSamples;
  static  int[]   binarySamples;
  static  int     maxBinary;          //  2^bitsPerSample - 1


  //  Audio System Parameters
  /**   Minimum number of samples to write to the audio system at a time.
   *    Value was determined empirically using ContinuousSound.        */
  static  final int       minSamplesPerGeneration   = 8;

  //  Parameters based on user's detected audio system
  static  SourceDataLine  audioOut                  = null;
  static  int             afBitsPerSample           = -1;
  static  float           afSamplingRate            = -1;
  static  int             afBytesPerSample          = -1;
  static  int             afNumChannels             = -1;
  static  int             afFrameSize               = -1;
  static  boolean         afIsSigned;
  static  ByteOrder       afEndian                  = null;
  static  int             afBufferSize              = -1;

  //  Dynamic Audio System Parameters
  static  int             bitsPerSampleMask         = -1;
  static  double          radiansPerSample          = -1;
  static  int             downsamplingRatio         = -1;
  static  int             samplesPerGeneration      = -1;
  static  final String    nyqWarningMsg =     " (Exceeds Nyquist Limit) ";
  static  final String    asWarningMsg = " (Exceeds Audio System Limit) ";
  static  final Color     warningColor =              new Color(0xffcccc);

  //  Number Formats
  static final DecimalFormat sampFreqFormat =    new DecimalFormat("0.0");
  static final DecimalFormat signalFreqFormat = new DecimalFormat("0.00");
  static final DecimalFormat timeFormat =      new DecimalFormat("0.000");
  static final DecimalFormat unsignedVoltageFormat =
                                            new DecimalFormat("0.000000");
  static final DecimalFormat signedVoltageFormat =
                                 new DecimalFormat("+0.000000;-0.000000");

  //  Write debugging info to stdout?
  private static boolean debug = false;
  //  Make false to simulate missing audio for debugging:
  private static boolean audioEnabled = true;

  //  main()
  //  ---------------------------------------------------------------------
  /** Captures command line argument values, then displays a
   *  table showing the binary encoding for each of the voltage
   *  ranges.
   *
   *  @param  args  Command line arguments: the keyword "debug,"
   *  "disableAudio," or "name=value" pairs, where name may be any of the
   *  following:
   *  frequency - Frequency of the sine wave in KHz.  Default is 0.441.
   *  bits      - Bits per sample. Default is 8.
   *  rate      - Sampling frequency in kilo-samples per second.  Default
   *              is 44.100.
   */
  public static void main( String[] args )
  {
    //  Process each command line argument.
    for (String arg: args)
    {
      //  Check for debug and disableAudio options
      if ("debug".startsWith(arg))
      {
        debug = true;
        continue;
      }
      if ("disableaudio".startsWith(arg.toLowerCase()))
      {
        audioEnabled = false;
        continue;
      }
      StringTokenizer st = new StringTokenizer(arg.toLowerCase(), "=");

      //  Check that the argument is a <name>=<value> pair.
      if ( st.countTokens() != 2 )
      {
        usage();
        System.exit( 1 );
      }

      String  name = st.nextToken().trim();
      float     value = 0;
      try
      {
        value = Float.parseFloat( st.nextToken().trim() );
      }
      catch ( NumberFormatException nfe )
      {
        System.err.println( "Error: " + arg + " is not a number." );
        System.exit( 1 );
      }

      //  Determine the <name> and store the appropriate value.
      if ("frequency".startsWith( name ))
      {
        //  Frequency in KiloHertz 0.1 to 25
        if ((value < 0.1) || (value > 25))
        {
          System.err.println( "Error: Signal frequency must " +
                                            "be between 0.1 and 25 KHz." );
          System.exit(1);
        }
        signalFrequency = value * 1000;
        continue;
      }
      if ("rate".startsWith( name ))
      {
        if ( (value < 0.1)  || (value > 50))
        {
          System.err.println( "Error: Sampling rate must " +
                                            "be between 0.1 and 50 KHz." );
          System.exit( 1 );
        }

        samplingRate = value * 1000;
        continue;
      }
      if("bitspersample".startsWith(name) || "bps".startsWith(name))
      {
        if ((value < 1) || (value > 20) || (value != ((int)value)))
        {
          System.err.println( "Error: Bits per sample must " +
                                     "be an integer between one and 20." );
          System.exit( 1 );
        }
        bitsPerSample = (int) value;
        bitsPerSampleSlider.setValue(bitsPerSample);
        continue;
      }
      //  No matching parameter name
      System.err.println( "Error: " + name +
                                  " is not a recognized parameter name." );
      usage();
    }

    //  Generate list of supported sampling rates (integer divisors of
    //  afSamplingRate).
    int maxSamplingRate;
    if (!audioEnabled)
    {
      playSoundButton.setEnabled(false);
      playSoundButton.setText("Audio Disabled");
    }
    else
    {
      //  Setup Audio Output System
      //  -----------------------------------------------------------------
      //  Get the first SourceDataLine available, if any.
      Mixer.Info[] mixerInfos = AudioSystem.getMixerInfo();
      for (Mixer.Info mixerInfo : mixerInfos)
      {
        Mixer mixer = AudioSystem.getMixer(mixerInfo);
        Line.Info[] lineInfos = mixer.getSourceLineInfo();
        for (Line.Info lineInfo : lineInfos)
        {
          try
          {
            audioOut = (SourceDataLine) mixer.getLine(lineInfo);
            audioOut.open();
            break;
          }
          catch (LineUnavailableException lue)
          {
          }
          catch (ClassCastException icce)
          {
          }
        }
        if (audioOut != null) break; // search no further.
      }
      if (audioOut == null)
      {
        playSoundButton.setEnabled(false);
        playSoundButton.setText("Unable Play Sounds");
        audioEnabled    = false;
      }
      //  Capture default line attributes.
      AudioFormat af    = audioOut.getFormat();
      afSamplingRate    = af.getSampleRate();
      afBitsPerSample   = af.getSampleSizeInBits();
      afBytesPerSample  = (int) Math.ceil(afBitsPerSample / 8.0);
      //  Force monaural or binaural, even if "unspecified"
      afNumChannels = (af.getChannels() == 1) ? 1 : 2;
      afFrameSize = afBytesPerSample * afNumChannels;
      //  Be sure Encoding is PCM, either signed or unsigned.
      if ((af.getEncoding() == Encoding.ALAW)
                                    || (af.getEncoding() == Encoding.ULAW))
      {
        playSoundButton.setEnabled(false);
        playSoundButton.setText("Incompatible Audio System");
        audioEnabled = false;
      }
      if (audioEnabled)
      {
        afIsSigned = (af.getEncoding() == Encoding.PCM_SIGNED);
        afEndian = af.isBigEndian() ? ByteOrder.BIG_ENDIAN
                                                 : ByteOrder.LITTLE_ENDIAN;
        afBufferSize    = audioOut.getBufferSize();
        maxSamplingRate = (int) afSamplingRate;
        for (int i = 100; i > 0; i--)
        {
          if (0 == (maxSamplingRate % i))
          {
            supportedSamplingRates.add(maxSamplingRate / i);
          }
        }
        //  Set up sound generating parameters based on line attributes and
        //  current application parameters.
        bitsPerSampleMask     = (int) (Math.pow(2.0, bitsPerSample) - 1);
        if (afBitsPerSample > bitsPerSample)
        {
          bitsPerSampleMask <<= (afBitsPerSample - bitsPerSample);
        }
        radiansPerSample      = signalFrequency * twoPi / samplingRate;
        downsamplingRatio     = (int)(afSamplingRate / samplingRate);
        samplesPerGeneration  = minSamplesPerGeneration / downsamplingRatio;
      }
    }

    //  Default values have now been overridden by any command line
    //  parameters.  Calculate derived values and generate the initial
    //  array of samples.
    calcDerived();


    //  Setup main GUI window.
    //  ===================================================================
    ToolTipManager ttm = ToolTipManager.sharedInstance();
    ttm.setInitialDelay(0);
    ttm.setDismissDelay(3000);

    //  Make the close button work, and set up a border (padding) around
    //  the top-level components in the frame.
    jf.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
    contentPanel.setBorder(BorderFactory
                     .createLineBorder(contentPanel.getBackground(), 10 ));
    jf.setContentPane(contentPanel);
    samplingRateLabel.setBackground(warningColor);

    //  Plot the sampled voltages.
    //  -------------------------------------------------------------------
    voltagePanel.add( new JLabel( "Sampled Voltages", JLabel.CENTER),
                                                       BorderLayout.NORTH);
    voltagePanelAbscissae.add(voltageAbscissaeLeftLabel,
                                                        BorderLayout.WEST);
    voltagePanelAbscissae.add(voltageAbscissaeCenterLabel,
                                                      BorderLayout.CENTER);
    voltagePanelAbscissae.add(voltageAbscissaeRightLabel,
                                                        BorderLayout.EAST);
    voltagePanelAbscissae.add(voltageAbscissaeUnitsLabel,
                                                       BorderLayout.SOUTH);
    voltagePanel.add(voltagePanelAbscissae, BorderLayout.SOUTH);
    JPanel vp = new JPanel()
    {
      public static final long serialVersionUID = 1;
      public void paint( Graphics g )
      {
        Dimension d = getSize();

        //  Draw axes.
        g.drawLine( 4, d.height/2, d.width - 4, d.height/2 );
        g.drawLine( 4, 4, 4, d.height - 8 );
        g.drawRect( 1, 1, d.width - 2, d.height - 2 );

        //  Plot the measured voltages.
        double pixelsPerSample = (double)(d.width - 8) /
        Math.max(1, numSamples - 1);
        int pixelsPerVolt = (int) ((d.height - 10) / 2.0 );
        double curX = 4.0;
        int diam = (samplingRate < 15000.0) ? 6 : 4;
        diam = (samplingRate > 25000.0) ? 3 : diam;
        for ( int i = 0; i < numSamples; i++ )
        {
          g.fillOval( (int)curX,
              (int) ((1.0 - sampleValues( i )) *  pixelsPerVolt) + 4,
              diam, diam );
          curX += pixelsPerSample;
        }
      }
      //  getPreferredSize()
      //  -----------------------------------------------------------------
      public Dimension getPreferredSize()
      {
        return preferredPanelSize;
      }
    };
    voltagePanel.add( vp, BorderLayout.CENTER );

    //  Display the voltage-to-binary mapping table.
    //  -------------------------------------------------------------------

    //  Define the TableModel for the values to be displayed.
    TableModel voltsToBinaryModel = new AbstractTableModel()
    {
      public static final long serialVersionUID = 1;
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
          return signedVoltageFormat.format(Math.min( v1, v2 )) +
          " to " +
          signedVoltageFormat.format(Math.max( v1, v2 ));
        }
        else
        {
          //  Binary code for the row
          return binaryString( intervalNumber, bitsPerSample );
        }
      }
      public String getColumnName( int colNum )
      {
        String[] columnName = { "Voltage Range", "Binary Encoding" };
        return columnName[ colNum ];
      }
    };

    //  Define a renderer for the encoding table that uses
    //  centered labels for the binary values and left-aligned
    // labels for the voltage ranges.
    final TableCellRenderer alignedRenderer = new TableCellRenderer()
    {
      public Component getTableCellRendererComponent(
          JTable table, Object value, boolean isSelected,
          boolean hasFocus, int row, int column)
      {
        if (column == 0)
          // Voltage ranges
          return new JLabel( (String)value );
        // else ...
        // binary strings
        return new JLabel( (String) value, JLabel.CENTER );
      }
    };

    //  Now create the encoding table from the data model, and
    //  install the custom cell renderer.
    encodingTable = new JTable( voltsToBinaryModel )
    {
      public static final long serialVersionUID = 1;
      public TableCellRenderer getCellRenderer(int row, int column)
      {
        return alignedRenderer;
      }
    };

    //  Make the encoding table scrollable as needed.
    JScrollPane encodingPane = new JScrollPane( encodingTable );
    encodingPane.setPreferredSize(preferredPanelSize);

    //  Set initial widths of table columns.
    //  (These turn out to be relative, not absolute, widths ...)
    TableColumn tabCol =
      encodingTable.getColumnModel().getColumn( 0 );
    tabCol.setPreferredWidth( 75 );
    tabCol = encodingTable.getColumnModel().getColumn( 1 );
    tabCol.setPreferredWidth(15);

    //  Generated Waveform Panel
    //  ===============================================================
    JPanel generatedWaveformPanel = new JPanel()
    {
      public static final long serialVersionUID = 1;

      // paint()
      //  -------------------------------------------------------------
      /**
       *  Draws the step function representing the generated output
       *  from the digital samples.  Put a box around the whole
       *  function, and inset the axes to give space; height of
       *  ordinates has to be a multiple of the number of intervals so
       *  the tic marks will line up.
       */
      public void paint( Graphics g )
      {
        Dimension d = getSize();

        //  Draw framing box.
        g.setColor(Color.BLACK);
        g.drawRect( 0, 0, d.width - 1, d.height - 1);

        //  Draw axes with tic marks showing sample times and encoding
        //  values.
        int   numIntervals = Math.max(1, numSamples - 1);
        float deltaX = (d.width - 4) / (float)numIntervals;
        int   xMin = 2;
        int   xMax = d.width - 2;
        float deltaY = (d.height - 4) / (float)numRanges;
        int   yLen = (int)(numRanges * deltaY);
        int   yMin =( d.height - yLen) / 2;
        int   yMax = yMin + yLen;
        int   yMid = (int)(yMax - deltaY * ((numRanges + 1) / 2));
        // axes
        g.setColor(Color.LIGHT_GRAY);
        g.drawLine( xMin, yMid, xMax, yMid ); //  abscissa
        g.drawLine( xMin, yMin, xMin, yMax ); //  ordinates
        // tic marks
        g.setColor(Color.RED);
        int yPos = yMax;
        for (int y = 0; y <= numRanges; y++)
        {
          g.drawLine(xMin, yPos, xMin + 4, yPos);
          yPos -= deltaY;
        }

        //  Draw step function.
        g.setColor(Color.BLUE);
        float x1 = xMin, x2;
        int y1 = (int)(yMax - (binarySamples[0] * deltaY)), y2;
        for ( int i = 1; i < binarySamples.length; i++ )
        {
          x2 = x1 + deltaX;
          y2 = (int)(yMax - (binarySamples[i] * deltaY));
          g.drawLine( (int)x1, y1, (int)x2, y1 );
          g.drawLine( (int)x2, y1, (int)x2, y2 );
          //  Tic mark on abscissa
          g.setColor(Color.RED);
          g.drawLine((int)x1, yMid - 4, (int)x1, yMid + 4);
          g.setColor(Color.BLUE);
          x1 = x2;
          y1 = y2;
        }
        //  Final abscissa tic mark
        g.setColor(Color.RED);
        g.drawLine((int)x1, yMid - 4, (int)x1, yMid + 4);
      }

      // getPreferredSize()
      //  -------------------------------------------------------------
      /**
       *  Set "good" width and minimal height.
       *
       * @return  Preferred Dimension.
       */
      public Dimension getPreferredSize()
      {
        return preferredPanelSize;
      }
    };

    //  Graph the generated waveform.
    //  ---------------------------------------------------------------
    outputPanel.add( new JLabel( "Generated Waveform", JLabel.CENTER ),
        BorderLayout.NORTH);
    outputPanel.add( generatedWaveformPanel, BorderLayout.CENTER );


    //  Add the sampled voltage plot, the voltage to binary
    //  encoding table, and the generated waveform plot to the
    //  upper part of the window.
    contentPanel.add( voltagePanel,  BorderLayout.WEST );
    contentPanel.add( encodingPane,  BorderLayout.CENTER );
    contentPanel.add( outputPanel,   BorderLayout.EAST );


    //  Set up all the controls for the application
    //  -------------------------------------------------------------------
    {
      JPanel  controlsPanel               = new JPanel(
                                                new GridLayout(0, 3, 20, 0));
      Box           frequencyBox          = Box.createVerticalBox();
      Box           resolutionBox         = Box.createVerticalBox();
      JPanel        infoAndButtonsPanel   = new JPanel(new BorderLayout());
      new BoxLayout(frequencyBox, BoxLayout.Y_AXIS);
      controlsPanel.add(frequencyBox);
      controlsPanel.add(resolutionBox);
      controlsPanel.add(infoAndButtonsPanel);
      frequencyBox.setBorder(frequencyBoxBorder);
      resolutionBox.setBorder(resolutionBoxBorder);

      //  Signal frequency control
      final Dictionary<Integer,JLabel> signalFrequencySliderLabels =
                                       new Hashtable<Integer,JLabel>();
      for (int i = 0; i < 251; i += 50)
      {
        signalFrequencySliderLabels.put( new Integer(i),
                                 new JLabel(Integer.toString(i / 10)));
      }
      int initialSignalFrequency = (int)signalFrequency;
      final JSlider signalFrequencySlider = new
      JSlider(JSlider.HORIZONTAL, 0, 250,
                                        initialSignalFrequency / 100 );
      signalFrequencySlider.addChangeListener(new ChangeListener()
      {
        public void stateChanged( ChangeEvent ce )
        {
          signalFrequency = Math.max( 100.0,
                              signalFrequencySlider.getValue() * 100);
          updateDisplay();
        }
      });
      signalFrequencySlider.setLabelTable(signalFrequencySliderLabels);
      signalFrequencySlider.setMajorTickSpacing(5);
      signalFrequencySlider.setMinorTickSpacing(1);
      signalFrequencySlider.setPaintTicks(true);
      signalFrequencySlider.setPaintLabels(true);
      signalFrequencySlider.setSnapToTicks(false);
      frequencyBox.add(signalFrequencySlider);
      frequencyBox.add(Box.createVerticalStrut(20));

      //  Set up the sampling rate controls and display
      /*
       *    Provide a slider that allows arbitrary values if no audio
       *    system is available.  Otherwise, provide a spinner that
       *    restricts the rate to give integer downsamlingRatio values.
       */
      maxSamplingRate = 45000; //  Hz
      if (audioEnabled)
      {
        //  Audio system is available: set up spinner
        maxSamplingRate =
                         5000 * (int)(Math.round(afSamplingRate/5000));
        int initialSamplingRate =
                  supportedSamplingRates.getClosest((int)samplingRate);
        final SpinnerListModel samplingRatesModel =
                          new SpinnerListModel(supportedSamplingRates);
        final JSpinner samplingRatesSpinner =
                                      new JSpinner(samplingRatesModel);
        samplingRatesSpinner.setValue(initialSamplingRate);
        samplingRatesSpinner.addChangeListener(new ChangeListener()
        {
          public void stateChanged(ChangeEvent ce)
          {
            int newValue = (Integer)samplingRatesSpinner.getValue();
            samplingRate = newValue;
            updateDisplay();
          }
        });
        final JPanel samplingRateSpinnerPanel = new JPanel();
        samplingRateSpinnerPanel.add(new JLabel("Sampling Rate: "));
        samplingRateSpinnerPanel.add(samplingRatesSpinner);
        samplingRateSpinnerPanel.add(samplingRateSpinnerLabel);
        samplingRateSpinnerLabel.setToolTipText(
                                            "Maximum Rate : Current Rate");
        frequencyBox.add(samplingRateSpinnerPanel);

        //  Add Audio system parameters to info panel
        //  ---------------------------------------------------------------
        final JPanel audioInfoPanel = new JPanel(new GridLayout(0, 1));
        audioInfoPanel.add(new JLabel(" Maximum Sampling Rate:   " +
                   sampFreqFormat.format(afSamplingRate/1000.0) + " KHz"));
        audioInfoPanel.add(new JLabel(" Maximum Bits per Sample: " +
                                                         afBitsPerSample));

        audioInfoPanel.setBorder(BorderFactory.createTitledBorder(
                                                   "Audio System Limits"));
        infoAndButtonsPanel.add(audioInfoPanel, BorderLayout.NORTH);
      }
      else
      {
        //  No audio system: set up slider
        frequencyBox.add(samplingRateLabel);
        final Dictionary<Integer,JLabel> samplingRateSliderLabels =
                                           new Hashtable<Integer,JLabel>();
        for (int i = 0; i <= (maxSamplingRate / 1000);
                                               i += maxSamplingRate / 5000)
        {
          samplingRateSliderLabels.put( new Integer(i),
                                          new JLabel(Integer.toString(i)));
        }
        int initialSamplingRate = (int)samplingRate;
        final JSlider samplingRateSlider = new
                    JSlider(JSlider.HORIZONTAL, 0, maxSamplingRate / 1000,
                                              initialSamplingRate / 1000 );
        samplingRateSlider.addChangeListener(new ChangeListener()
        {
          public void stateChanged(ChangeEvent ce)
          {
            samplingRate =
                         Math.max(1, samplingRateSlider.getValue() * 1000);
            updateDisplay();
          }
        });
        samplingRateSlider.setLabelTable(samplingRateSliderLabels);
        samplingRateSlider.setMajorTickSpacing(5);
        samplingRateSlider.setMinorTickSpacing(1);
        samplingRateSlider.setPaintTicks(true);
        samplingRateSlider.setPaintLabels(true);
        samplingRateSlider.setSnapToTicks(false);
        frequencyBox.add(samplingRateSlider);
      }

      // bitsPerSampleSlider.addChangeListener()
      bitsPerSampleSlider.addChangeListener(new ChangeListener()
      {
        public void stateChanged( ChangeEvent ce )
        {
          bitsPerSample =
            Math.max( 1, bitsPerSampleSlider.getValue() );
          updateDisplay();
        }
      } );
      bitsPerSampleSlider.setMajorTickSpacing(5);
      bitsPerSampleSlider.setMinorTickSpacing(1);
      bitsPerSampleSlider.setPaintTicks(true);
      bitsPerSampleSlider.setPaintLabels(true);
      resolutionBox.add( bitsPerSampleSlider );
      resolutionBox.add( voltsPerRangeLabel );

      //  Set up the samples dialog box.
      //  -------------------------------------------------------------

      //  Define a renderer that uses centered labels for the samples
      //  table.
      final TableCellRenderer centeredRenderer = new
      TableCellRenderer()
      {
        public Component getTableCellRendererComponent(JTable table,
                        Object value, boolean isSelected, boolean hasFocus,
                                                       int row, int column)
        {
          return new JLabel( value.toString(), JLabel.CENTER );
        }
      };

      //  Define the TableModel for the values to be displayed.
      TableModel samplesModel = new AbstractTableModel()
      {
        public static final long serialVersionUID = 1;
        public int getColumnCount()
        {
          return 3;
        }
        public int getRowCount()
        {
          return numSamples;
        }
        public Object getValueAt(int row, int col)
        {
          int x = 0;
          switch ( col )
          {
          case 0:
            //  The moment of sampling
            x = (int)(1000000 * row * samplingInterval );
            return new Double( x );
          case 1:
            //  The voltage sampled
            return signedVoltageFormat.format(voltageSamples[row]);
          case 2:
            //  The digitized value
            return binaryString(binarySamples[row], bitsPerSample);
          default:
            return "Bad switch in samplesModel.getValueAt()";
          }
        }
        public String getColumnName( int colNum )
        {
          String[] columnName = {"Sample Time in \u00B5sec",
                                     "Sampled Voltage", "Binary Encoding"};
          return columnName[ colNum ];
        }
      };

      //  Create the table of samples and install the centered
      //  renderer for it.
      samplesTable = new JTable( samplesModel )
      {
        public static final long serialVersionUID = 1;
        public TableCellRenderer getCellRenderer(int row, int column)
        {
          return centeredRenderer;
        }
      };
      JScrollPane samplesPane = new JScrollPane(samplesTable);
      samplesDialog.getContentPane().add( samplesPane,
                                                      BorderLayout.CENTER);

      //  Set up the "Dismiss" button for the samples dialog.
      JButton dismissSamples = new JButton("Dismiss");
      dismissSamples.addActionListener( new ActionListener()
      {
        public void actionPerformed( ActionEvent ae )
        {
          samplesDialog.setVisible(false);
        }
      });
      samplesDialog.getContentPane().add( dismissSamples,
                                                      BorderLayout.SOUTH );

      //  Set up the "Play Sound" button.
      playSoundButton.setToolTipText(
                 "Approximates the sound of the generated waveform using" +
                                         " this computer's audio system.");
      playSoundButton.addActionListener( new ActionListener()
      {
        public void actionPerformed(ActionEvent ae)
        {
          doPlay = !doPlay;
          if (doPlay)
          {
            playSoundButton.setText("Stop Sound");
          }
          else
          {
            playSoundButton.setText("Play Generated Waveform");
          }
        }
      });

      //  Set up the "Show Samples" button.
      showSamplesButton.setToolTipText(
                    "Opens another window showing list of sample values.");
      showSamplesButton.addActionListener( new ActionListener()
      {
        public void actionPerformed( ActionEvent ae )
        {
          boolean playIsEnabled = playSoundButton.isEnabled();
          playSoundButton.setEnabled(false);
          showSamplesButton.setEnabled( false );
          exitButton.setEnabled( false );

          samplesTable.revalidate();
          samplesDialog.pack();
          centerIt( samplesDialog );
          samplesDialog.setVisible(true);

          playSoundButton.setEnabled(playIsEnabled);
          showSamplesButton.setEnabled( true );
          exitButton.setEnabled( true );
        }
      });

      //  Set up the "Exit" button.
      exitButton.addActionListener( new ActionListener()
      {
        public void actionPerformed( ActionEvent ae )
        {
          System.exit( 0 );
        }
      });

      //  Add the buttons to the button control panel.
      JPanel bc = new JPanel( new GridLayout( 0, 1 ) );
      bc.add(playSoundButton);
      bc.add(showSamplesButton);
      bc.add(exitButton);
      infoAndButtonsPanel.add( bc, BorderLayout.SOUTH );

      //  Add the controls to the GUI
      contentPanel.add( controlsPanel, BorderLayout.SOUTH );

      //  Put the Window up on the screen.
      //  -----------------------------------------------------------
      jf.pack();
      centerIt( jf );
      jf.setVisible(true);
    }

    if (audioEnabled)
    {
      //  Sound Generator Thread
      //  -----------------------------------------------------------------
      new Thread()
      {
        //  Thread.run()
        //  ---------------------------------------------------------------
        /**
         *    Generate audio output based on the current sound frequency,
         *    sampling rate, and bits per sample.
         */
        public void run()
        {
          final byte[] frameBytes = new byte[afFrameSize];
          double radiansNow = 0.0;

          //  Audio Output Loop
          //  -------------------------------------------------------------
          /*
           *  Generate frequencyPerGeneration binary sample values and
           *  write each one to the audio system downsampleRatio times.
           */
          while (true)
          {
            if (doPlay)
            {
              audioOut.start();
              //  Generate a new "generation" of frequency samples.
              for (int i = 0; i < samplesPerGeneration; i++)
              {
                //  Binary representation of next sample.  This could be
                //  done using shorts instead of longs if you are willing
                //  to assume bitsPerSample is never greater than CD
                //  quality (i.e., 16).
                long sineValue = (long)(Math.sin(radiansNow) *
                                                        Integer.MAX_VALUE);
                radiansNow += radiansPerSample;

                if ((!afIsSigned) && sineValue < 0)
                {
                  sineValue -= sineValue;
                }
                sineValue = (sineValue >> (32 - afBitsPerSample))
                                                       & bitsPerSampleMask;
                //  Convert the sample to an audio system frame
                for (int sampleByte = 0; sampleByte < afBytesPerSample;
                                                              sampleByte++)
                {
                  int index = ((afEndian == ByteOrder.LITTLE_ENDIAN) ?
                         sampleByte : (afBytesPerSample - sampleByte - 1));
                  frameBytes[index] = (byte)(sineValue & 0xFF);
                  if (afNumChannels == 2)
                  { //  Pseudo-stereo
                    frameBytes[index + afBytesPerSample] =
                                                         frameBytes[index];
                  }
                  sineValue >>= 8;
                }
                /*  Write the frame as many times as necessary, based on
                 *  the current downsampling ratio.
                 */
                for (int j = 0; j < downsamplingRatio; j++)
                {
                  audioOut.write(frameBytes, 0, frameBytes.length);
                }
              }
            }
            else
            {
              audioOut.stop();
              //  Not playing: stall 250 msec to avoid CPU loading.
              try { Thread.sleep(250); }
              catch (InterruptedException ie) {}
            }
          }
        }
      }.start();
    }
  }


  //  Utility Methods
  //  =====================================================================

  //  Method usage()
  //  ---------------------------------------------------------------------
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
  //  ---------------------------------------------------------------------
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

  //  Method sampleValues()
  //  ---------------------------------------------------------------------
  /**
   *   Returns the voltage sampled at interval intervalNum.
   *
   *     @param intervalNum  The index of the sampling interval,
   *                         between zero and numSamples - 1.
   *     @return             The analog voltage during that
   *                         sampling interval.
   */
  private static double sampleValues( int intervalNum )
  {
    return Math.sin( (intervalNum * samplingInterval) /
        signalPeriod * twoPi );
  }


  //  Method binaryString()
  //  ---------------------------------------------------------------------
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
  //  ---------------------------------------------------------------------
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
  //  ---------------------------------------------------------------------
  /**
   *   Calculates derived parameters from signal frequency, sampling rate,
   *   and bits per sample.  Generates arrays of sampled voltages and
   *   encoded values.
   */
  private static void calcDerived()
  {

    samplingInterval  = 1.0 / samplingRate;
    signalPeriod      = 1.0 / signalFrequency;
    //  Abscissae labels, in milliseconds, or microseconds
    if (signalPeriod >= 0.001)
    {
      voltageAbscissaeUnitsLabel.setText("milliseconds");
      voltageAbscissaeCenterLabel.setText(
                                      timeFormat.format(signalPeriod * 500));
      voltageAbscissaeRightLabel.setText(
                                     timeFormat.format(signalPeriod * 1000));
    }
    else
    {
      voltageAbscissaeUnitsLabel.setText("microseconds");
      voltageAbscissaeCenterLabel.setText(
                                   timeFormat.format(signalPeriod * 500000));
      voltageAbscissaeRightLabel.setText(
                                  timeFormat.format(signalPeriod * 1000000));
    }
    numSamples = 1 + (int) (signalPeriod / samplingInterval);
    numRanges = (int) Math.pow( 2, bitsPerSample );
    String addendum = "";
    if ((afBitsPerSample > 0) && (bitsPerSample > afBitsPerSample))
    {
      addendum = asWarningMsg;
      resolutionBoxBorder.setTitleColor(Color.red);
    }
    else
    {
      addendum = "";
      resolutionBoxBorder.setTitleColor(Color.black);
    }
    resolutionBoxBorder.setTitle( "Bits per Sample: " + bitsPerSample + addendum);
    voltsPerRange = 2.0 / numRanges;

    if (signalFrequency > (samplingRate / 2))
    {
      addendum = nyqWarningMsg;
      frequencyBoxBorder.setTitleColor(Color.red);
    }
    else
    {
      addendum = "";
      frequencyBoxBorder.setTitleColor(Color.black);
    }
    frequencyBoxBorder.setTitle("Signal Frequency: " +
          signalFreqFormat.format(signalFrequency / 1000) + " KHz" + addendum);
    if ((afSamplingRate > 0) && (samplingRate > afSamplingRate))
    {
      addendum = asWarningMsg;
      samplingRateLabel.setOpaque(true);
    }
    else
    {
      addendum = "";
      samplingRateLabel.setOpaque(false);
    }
    samplingRateLabel.setText( "Sampling Rate: " +
        sampFreqFormat.format(samplingRate / 1000 ) + " KHz" + addendum);
    voltsPerRangeLabel.setText( "Sampling Resolution: " +
                unsignedVoltageFormat.format(voltsPerRange) + " volts" );
    showSamplesButton.setText("Show " + numSamples + " Sample" +
                                         ((numSamples != 1) ? "s" : ""));

    //  Update models for voltage and generated values views
    voltageSamples  = new float[numSamples];
    binarySamples   = new int[numSamples];
    maxBinary       = (int)Math.pow(2.0, bitsPerSample) - 1;
    for (int i = 0; i < numSamples; i++)
    {
      voltageSamples[i] = (float)sampleValues(i);
      if (Math.abs(voltageSamples[i]) < 1E-6)
      {
        voltageSamples[i] = 0;
      }
      binarySamples[i] =
                  (int)(0.5 + (1.0 + voltageSamples[i]) / 2.0 * maxBinary);
    }

    if (audioEnabled)
    {
      //  Sound generating parameters
      bitsPerSampleMask     = (int)(Math.pow(2.0, bitsPerSample) - 1);
      if (afBitsPerSample > bitsPerSample)
      {
        bitsPerSampleMask <<= (afBitsPerSample - bitsPerSample);
      }
      radiansPerSample      = signalFrequency * twoPi / samplingRate;
      downsamplingRatio     = (int)(afSamplingRate / samplingRate);
      samplesPerGeneration  = minSamplesPerGeneration / downsamplingRatio;
      samplingRateSpinnerLabel.setText("Hz (" + downsamplingRatio + ":1)");
      if (debug)
      {
        System.out.println(Integer.toHexString(bitsPerSampleMask)+" : "+
                      unsignedVoltageFormat.format(radiansPerSample)+" : "+
                             downsamplingRatio+" : "+samplesPerGeneration);
      }
    }
  }
}

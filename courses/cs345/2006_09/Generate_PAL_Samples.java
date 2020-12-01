//  $Id: Generate_PAL_Samples.java,v 1.2 2003/11/23 05:05:30 vickery Exp $
/*
 *  Generates hexadecimal constants for initializing an array or rom
 *  of sine wave intensities for use with Celoxica's PAL macros for
 *  audio output.
 *
 *    Created on: Nov 5, 2003
 *    Author:     C. Vickery
 *
 *  $Log: Generate_PAL_Samples.java,v $
 *  Revision 1.2  2003/11/23 05:05:30  vickery
 *  Cleaned up parameters for controlling the fidelity of the generated
 *  waveform.
 *
 *  Revision 1.1  2003/11/22 05:07:29  vickery
 *  Initial version.
 *
 */

import java.text.DecimalFormat;

//  Class Generate_PAL_Samples
//  ------------------------------------------------------------------
/**
 *    <p>Generates sound intensity values for a sine wave in a form
 *    suitable for initializing Handel-C signed integer values.</p>
 *    <p>The values generated assume the Handel-C program has already
 *    defined a macro expression named bps, presumably with a
 *    statment like:</p>
 * <pre>
 *    macro expr bps = ( PalAudioOutGetMaxDataWidthCT() );
 * </pre>
 *    <p>This program generates 32 bit sample values for the sound
 *    intensities, but it outputs Handel-C constants that drop low
 *    order bits to result in a width of bps.</p>
 * 
 *    <p>The output of this program includes syntax markers so that
 *    it may be #included as initializers for a Handel-C array or
 *    rom of width bps.  It also generates macro expressions for the
 *    number of samples (numSamples_<i>fff</i>) and sampling rate
 *    (sampleRate_<i>fff</i>), where <i>fff</i> is the sine wave's
 *    frequency in Hz.</p>
 * 
 *    <p>The program generates enough sound samples for one complete
 *    sine wave cycle.  However, the period of the generated wave
 *    only approximates the period of the desired wave unless the
 *    period of the desired wave is an exact multiple of the sampling
 *    period.  The output of the program includes comments that tell
 *    the nominal and actual frequency values.</p>
 * 
 *    <p>There are command line options that can be used to control
 *    the operation of the program.  These are summarized in the Field
 *    list and in the documentation for the <i>main()</i> method.</p>
 *
 */
  public class Generate_PAL_Samples
  {
  //  User settable parameters and their defaults
  //  --------------------------------------------------------------
  /** <p>Sampling rate, in Hz.</p>
   *  <p>Default is 48000.</p>
   *  <p>Command line option: -r</p>
   */
    static double samplingRate   = 48000.0;  //  RC-200 default

  /** <p>Bits per sample.  Default is 32.</p>
   *  <p>Will be reduced to the value of the Handel-C <i>bps</i>
   *  macro expr.</p>
   *  <p>Command line option: -b</p>
   */
    static int    bitsPerSample = 32;

  /** <p>Desired frequency of the generated sine wave, in Hz.</p>
   *  <p>Default is 440 Hz.</p>
   *  <p>Command line option: -f</p>
   */
    static double desiredFrequency      = 440.0;
    
  /** <p>Acceptable maximum deviation of generated frequency from
   *  desired frequency, in Hz.</p>
   *  <p>Default value is -1.0, which means no limit.</p>
   *  <p>Command line option: -d</p>
   */
    static double maxDeviation    = -1.0;
    
  /** <p>Number of cycles to generate.  In general more cycles give
   *  better accuracy.</p>
   *  <p>Default value is 1, which is the minimum allowed.</p>
   *  <p>If maxDeviation is non-negative, the value of this parameter
   *  is the minimum number of cycles that will be generated.</p>
   *  <p>Command line option: -c</p>
   */
    static int    numCycles       = 1;       //  Num cycles!

    //  For computing radians.
    private static final  double twoPi = Math.PI + Math.PI;

  //  Derived parameters
    private static double  secondsPerSample = 0;
    private static double  secondsPerCycle  = 0;
    private static double  radiansPerSample = 0;
    private static long    scaleFactor      = 0;
    private static long    mask             = 0;


  //  Constructor
  //  ----------------------------------------------------------------
  /**
   *  The no-arg constructor is private.  This class is never
   *  instantiated.
   */
    private Generate_PAL_Samples() {}


  //  decize()
  //  ----------------------------------------------------------------
  /**
   *    Generate the n-digit decimal representation of an int.
   *    Assumes the int is positive.
   */
    private static String decize( int val, int numDigits )
    {
      StringBuffer sb = new StringBuffer( Integer.toString( val ) );
      while ( sb.length() < numDigits )
      {
        sb.insert(0, ' ' );
      }
      return new String( sb );
    }

  //  hexadize()
  //  ----------------------------------------------------------------
  /**
   *    Generate the n-digit hexadecimal representation of an int.
   */
    private static String hexadize( long val, int numDigits )
    {
      StringBuffer sb = 
                       new StringBuffer( Long.toHexString( val ) );
      while (sb.length() < numDigits )
      {
        sb.insert(0, '0' );
      }
      if ( sb.length() > numDigits )
      {
        sb.delete( 0,  (sb.length() - numDigits) );
      }
      for (int i = 0; i < numDigits; i++ )
      {
        char c = Character.toUpperCase( sb.charAt( i ) );
        sb.setCharAt( i, c );
      }
      sb.insert(0, "0x" );
      return new String( sb );
    }

  //  adjust()
  //  --------------------------------------------------------------
  /**
   *    Adjust for rounding errors -- the last sample has to be
   *    negative, but not the next one if there were a next one.
   */
    private static int adjust(  int     lastSample, 
                                double  radiansPerSample )
    {
      while ( Math.sin( radiansPerSample * lastSample ) >= 0.0 )
      {
        lastSample--;
      }
      while ( Math.sin( radiansPerSample * (1 + lastSample) ) < 0.0 )
      {
        lastSample++;
      }
      
      //  Assert correctness
      if ( !((Math.sin( radiansPerSample * lastSample) < 0.0 ) &&
           (Math.sin( radiansPerSample * (1+lastSample)) >= 0.0 )) )
      {
        System.err.println(            "Error: sine of last sample, ("
                            + Math.sin( radiansPerSample * lastSample) 
                    + ") should be negative, and sin of next sample ("
                       + Math.sin( radiansPerSample * (1+lastSample) )
                                      + ") should be non-negative." );
        System.exit( 0 );
      }
      return lastSample;
    }


  //  isZero()
  //  --------------------------------------------------------------
  /*
   *    Determines whether a value will be zero when represented as
   *    an int in the number of bits available.
   */
   private static boolean isZero( int sample )
   {
     double realSampleValue = Math.sin( sample * radiansPerSample );
     long longSampleValue = (long)(realSampleValue * scaleFactor);
     return (longSampleValue & mask) == 0;
   }


  //  main()
  //  --------------------------------------------------------------
  /**
   *    Process command line arguments and then generate a list of
   *    signed integer values suitable for compilation by the Handel-C
   *    compiler.
   *
   *<pre>
   *    Argument          Parameter                          (default)
   *    -f  [frequency]   Sine wave frequency in Hz.           (440.0)
   *    -r  [rate]        Sampling rate.                       (48000)
   *    -b  [bits]        Bits per Sample.                        (32)
   *    -d  [deviation]   Maximum deviation between generated and
   *                      nominal frequencies in Hz.            (-1.0)
   *    -c  [cycles]      Number of sound wave cycles to generate. (1)
   *
   *</pre>      
   */
    public static void main(String[] args)
    {
    //  Process command line options
    //  --------------------------------------------------------------
      for (int i = 0; i < args.length; i++ )
      {
        try
        {
          if ( "-f".equals( args[i] ) )
          {
            desiredFrequency = Double.parseDouble( args[++i] );
            //  Checked after all options processed.
            continue;
          }
          if ( "-r".equals( args[i] ) )
          {
            samplingRate = Double.parseDouble( args[ ++i] );
            if ( samplingRate <= 0.0 )
            {
              System.err.println( "Sampling rate must be positive." );
              System.exit( 1 );
            }
            continue;
          }
          if ( "-b".equals( args[i] ) )
          {
            bitsPerSample = Integer.decode( args[++i] ).intValue();
            if ( bitsPerSample < 1 || bitsPerSample > 32 )
            {
              System.err.println( 
                        "Bits per sample must be between 1 and 32 " );
              System.exit( 1 );
            }
            continue;
          }
          if ( "-d".equals( args[i] ) )
          {
            maxDeviation = Double.parseDouble( args[++i] );
            continue;
          }
          if ( "-c".equals( args[i] ) )
          {
            numCycles = Integer.decode( args[++i] ).intValue();
            if ( numCycles < 1 )
            {
              System.err.println( 
                      "Number of cycles must be greater than zero." );
              System.exit( 1 );
            }
            continue;
          }
        }
        catch (NumberFormatException e)
        {
          System.err.println( e + " is not a valid number." );
          System.exit( 1 );
        }
        catch (ArrayIndexOutOfBoundsException e)
        {
          System.err.println( "Missing option value. ");
          System.exit( 1 );
        }
        System.err.println( args[i] + " is not a valid option." );
        System.exit( 1 );
      }

    //  Validate frequency here ... depends on sampling rate, which
    //  may be specified either before or after -f.
    if ( desiredFrequency <= 0.0 || desiredFrequency > samplingRate )
    {
      System.err.println( "Error: Frequency ("+ desiredFrequency +
                                               ") must be positive" );
      System.err.println( "       and no more than " +
                            "sampling rate (" + samplingRate + ")." );
      System.exit( 1 );
    }

    //  Calculate derived parameters
    //  --------------------------------------------------------------
      secondsPerSample  = 1.0 / samplingRate;
      secondsPerCycle   = 1.0 / desiredFrequency;
      radiansPerSample  = twoPi * desiredFrequency / samplingRate;
      scaleFactor       = ((long)1) << (bitsPerSample - 1);
      mask              = scaleFactor - 1; // Mersenne

    //  Calculate number of samples.
    /*  Algorithm:
     *    The number of samples, n, will be the largest n for which
     *    n * radiansPerSample * cycles < 2 * pi * cycles, where
     *    cycles is the number of sine wave cycles to be generated.
     *
     *    With neither -c nor -d specified, cycles is 1.  If the
     *    -c option is specified, cycles is the value of that option.
     *    If the -d (deviation) option is specified, cycles is
     *    incremented until the average frequency within +/- deviation
     *    of the desired frequency.
     * 
     *    "Crossing Precision" is how close the final sample value is 
     *    to zero.  It is a derived statistic for this version of the
     *    program.
     */
      int samplesPerCycle = (int)(samplingRate / desiredFrequency);
      double actualFrequency = 1.0 / 
                                 (samplesPerCycle * secondsPerSample);
      int lastSample = numCycles * samplesPerCycle - 1;
      lastSample = adjust( lastSample, radiansPerSample );
      double averageFrequency =
                       numCycles / ( lastSample * secondsPerSample );
      double deviation = averageFrequency - desiredFrequency;
      if ( maxDeviation >= 0 )
      {
        while ( Math.abs(deviation) > maxDeviation )
        {
          numCycles++; 
          lastSample = numCycles * samplesPerCycle - 1;
          lastSample = adjust( lastSample, radiansPerSample );
          averageFrequency =
                        numCycles / ( lastSample * secondsPerSample );
          deviation = averageFrequency - desiredFrequency;
        }
      }

      //  A hack:  Drop samples from the end if they will come out
      //  zero in binary, and check there are any samples left when
      //  finished.
      while ( isZero( lastSample ) )
      {
        if ( --lastSample < 0 )
        {
          System.err.println( "No non-zero samples generated. " );
          System.exit( 1 );
        }
      }

      //  Parameters for formatting the output lines.
      DecimalFormat df5 = new DecimalFormat( " 0.00000;-0.00000" );
      DecimalFormat df1 = new DecimalFormat( "+0.0;-0.0" );
      int hexDigits           = (bitsPerSample + 3) / 4;


      //  Print heading information for the list of values to
      //  follow, including an open brace for beginning a list of
      //  initializers.
      System.out.println( 
                "//  Values generated by Generate_PAL_Samples.java" );
      System.out.println( "//    Samples per second: " +
                                                       samplingRate );
      System.out.println( "//    Frequency Desired: " +
                             df5.format( desiredFrequency ) + " Hz" );
      System.out.println( "//    Number of periods:  " +  numCycles );
      System.out.println( "//    Number of samples:  " +
                                                 ( lastSample + 1 ) );
      System.out.println( "//    Average Frequency: " +
                             df5.format( averageFrequency ) + " Hz" );
      System.out.println( "//    Frequency error:   " +
           df5.format( averageFrequency - desiredFrequency ) + " Hz ("
           + df1.format( 100.0 * (averageFrequency - desiredFrequency) 
                                         / desiredFrequency) + "%)" );
      System.out.println( "//    Zero precision:    " +
           df5.format( -Math.sin( lastSample * radiansPerSample ) ) );
      System.out.println();
      System.out.println(
        "//  - Signed integer value -   Sample#      Time " +
                                                    "  sin(2*pi*t)" );
      System.out.println( "  {" );

      for ( int sampleNum = 0; sampleNum <= lastSample; sampleNum++ )
      {
        //  Get Sine, a value between -1.0 and +1.0
        double realSampleValue = 
                             Math.sin( sampleNum * radiansPerSample );

        //  Convert to signed long between -2^(n-1) and +2^(n-1)-1.
        long longSampleValue = (long)(realSampleValue * scaleFactor);

        //  Display value in format suitable for generating
        //  Handel-C code, e.g.:  "  0x123456 \\ (32 - bps),"
        for (int i = 0; i < 8 - ( (3 + bitsPerSample) / 4); i++ )
          System.out.print( " " );  // Spacing to match heading.

        System.out.println( "    " 
          + hexadize( longSampleValue, hexDigits ) + " \\\\ ("
          + bitsPerSample + " - bps)"
          + ",  /* "
          + decize( sampleNum, 4 ) + ":  "
          + df5.format( sampleNum * secondsPerSample )  + "  "
          + df5.format( realSampleValue ) + "  */" );
      }
      //  End of initialization list
      System.out.println( "  };" );
      System.out.println();
      
    //  Tell Handel-C compiler integer values for parameters.
    double rate         = samplingRate / 1000.0;
    int intFrequency    = (int) desiredFrequency;
    int intSamplingRate = (int) samplingRate;
    System.out.println( "//  Parameters for a " + desiredFrequency  +
                 " Hz sine wave sampled at a " + rate + "KHz rate " );
    int sampleInterval = (int)(1E9 * 1.0 / samplingRate );
    System.out.println( "macro expr numSamples_" + intFrequency + 
                                 "     = " + (1 + lastSample) + ";" );
      System.out.println( "macro expr sampleRate_" + intFrequency 
                                + "     = " + intSamplingRate + ";" );
    }
  }


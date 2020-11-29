// $Id: JavaAudioExperiments.java,v 1.5 2007/01/11 09:42:43 vickery Exp $
/*
 * Created on Dec 29, 2006
 *
 *  Author:     C. Vickery
 *
 *  Copyright (c) 2006, Queens College of the City University
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
 *  $Log: JavaAudioExperiments.java,v $
 *  Revision 1.5  2007/01/11 09:42:43  vickery
 *  Ready for testing on other systems.
 *
 *  Revision 1.4  2007/01/09 02:52:56  vickery
 *  Continuous Sound comments reflect PC experiment.
 *
 *  Revision 1.2  2007/01/03 07:17:55  vickery
 *  Debugging audio output.
 *
 *  Revision 1.1  2007/01/01 02:28:12  vickery
 *  AudioExperiments is my investigation into Java Sampled Audio, done
 *  in preparation for including audio feedback in the AudioSampling class.
 *
 */
import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.Graphics;
import java.nio.ByteOrder;
import java.text.DecimalFormat;

import javax.sound.sampled.AudioFormat;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Control;
import javax.sound.sampled.Line;
import javax.sound.sampled.LineEvent;
import javax.sound.sampled.LineListener;
import javax.sound.sampled.LineUnavailableException;
import javax.sound.sampled.Mixer;
import javax.sound.sampled.SourceDataLine;
import javax.swing.JFrame;
import javax.swing.JPanel;

//	Class JavaAudioExperiments
//	--------------------------------------------------------------------
/**
 *    Surveys the audio resources on the system, and plays a tone using
 *    suitable ones.
 */
  public class JavaAudioExperiments extends AudioSampling
  {
    static final DecimalFormat withCommas = new DecimalFormat("###,###");

    //	main()
    //	----------------------------------------------------------------
    /**
     * @param args
     */
    public static void main(String[] args)
    {
      //  Line Format values
      boolean   doStereo          = true;
      boolean   doSigned          = true;
      ByteOrder endian            = ByteOrder.nativeOrder();
      float     sampleRate        = 44100;
      float     toneFrequency     = 9800;
      final int bitsPerSample     = 16;
      int       bytesPerSample    = (int)Math.ceil((double)bitsPerSample / 8.0);
      int       bytesPerFrame     = bytesPerSample * (doStereo ? 2 : 1);
      int       numSeconds        = 1;
      int       numFrames         = (int)(numSeconds * sampleRate);

      //  Generate Tone Samples
      byte[]      toneSamples    = new byte[bytesPerFrame * numFrames];
      final int[] testSamples    = new int[numFrames];
      final double interval = ((2 * Math.PI )/ sampleRate) * toneFrequency;
      double now            = 0.0;
      for (int i = 0; i < numFrames; i++ )
      {
        int sineVal =
              (int)(Math.sin(now) * Integer.MAX_VALUE) >> (32 - bitsPerSample);
        testSamples[i] = sineVal;
        
        //  Generate enough bytes to hold all the bits in a sample;
        //  Duplicate the bytes for stereo.
        for (int sampleByte = 0; sampleByte < bytesPerSample; sampleByte++)
        {
          int index = (i * bytesPerFrame) +
                             ((endian == ByteOrder.LITTLE_ENDIAN) ? 
                              sampleByte : (bytesPerSample - sampleByte - 1));
          toneSamples[index] = (byte)(sineVal & 0xFF);
          if (doStereo)
          { //  Pseudo-stereo
            toneSamples[index + bytesPerSample] = toneSamples[index];
          }
          sineVal >>= 8;
        }
        now += interval;
      }

      //  Stem plot of the values
      JFrame jf = new JFrame();
      JPanel jp = new JPanel()
      {
        public static final long serialVersionUID = 1L;
        public void paint(Graphics g)
        {
          Dimension d = this.getSize();
          g.drawLine(0, d.height/2, d.width, d.height/2);
          int numSamples = Math.min(d.width, testSamples.length);
          for (int i = 0; i < numSamples; i++)
          {
            double pixelScale = Math.pow(2, bitsPerSample)/d.height;
            g.drawLine(i, d.height/2, i,
                         (int)(testSamples[i]/pixelScale) + d.height/2);
          }
        }
        public Dimension getPreferredSize()
        {
          return new Dimension(784, 512);
        }
      };
      jf.add(jp, BorderLayout.CENTER);
      jf.pack();
      jf.setVisible(true);

//      try{Thread.sleep(5000);System.exit(0);}catch(Exception e) {}
        
      //  Line to send samples to.
      SourceDataLine lineOut = null;

      //  Look at all the Mixers
      Mixer.Info[] mixerInfoList = AudioSystem.getMixerInfo();
      for (Mixer.Info mixerInfo: mixerInfoList)
      {
        System.out.println("\nMixer: " + mixerInfo);
        Mixer mixer = AudioSystem.getMixer(mixerInfo);
        
        //  Look at all the lines for this mixer
        
        //  Show info for all of this mixer's source lines
        Line.Info[] sourceLineInfoList = mixer.getSourceLineInfo();
        for (Line.Info sourceLineInfo: sourceLineInfoList)
        {
          System.out.println("      Source Line Info: " + sourceLineInfo);
          Line thisLine = null;
          try
          {
            thisLine = mixer.getLine(sourceLineInfo);
          }
          catch (LineUnavailableException lue)
          {
            System.out.println("                  Oops! " + lue.getMessage());
          }
          try
          {
            //  If this works, this line will accept data samples, so write
            //  the samples to it.
            lineOut   = (SourceDataLine) mixer.getLine(sourceLineInfo);
            System.out.println("           Source Line: " + lineOut);
            System.out.println(
                            "         Source Format: " + lineOut.getFormat());
            Control[] controls = lineOut.getControls();
            if (controls.length > 0)
            {
              for (int i=0; i<controls.length; i++)
              {
                System.out.println(
                               "            Control["+i+"]: " + controls[i]);
              }
            }
            else
            {
              System.out.println(
                             "                        No Controls Available");
            }

            //  Log playback events
            lineOut.addLineListener(new LineListener()
            {
              public void update(LineEvent le)
              {
                System.out.println("-- " + System.currentTimeMillis() + ": " +
                    le.getType() +" at frame " + le.getFramePosition());
              }
            });

            //  Adjust line's attributes as desired.
            try
            {
              AudioFormat currentFormat = lineOut.getFormat();
              AudioFormat.Encoding encoding = doSigned ?
                  AudioFormat.Encoding.PCM_SIGNED :
                  AudioFormat.Encoding.PCM_UNSIGNED;
              boolean isBigEndian = currentFormat.isBigEndian();
              AudioFormat newFormat =  new AudioFormat(encoding, sampleRate,
                  bitsPerSample, (doStereo ? 2 : 1), bytesPerFrame, sampleRate,
                                                                  isBigEndian);
              lineOut.open(newFormat);
              System.out.println("-- Opened: " + lineOut.getFormat() );
            }
            catch (LineUnavailableException lue)
            {
              System.err.println("Eh?");
              System.exit(1);
            }
            
            //  Do the playback
            lineOut.start();
            long startTime = System.currentTimeMillis();
            lineOut.write(toneSamples, 0, toneSamples.length);
            lineOut.drain();
            lineOut.close();
            lineOut = null;
            System.out.println("-- pa-pa after " +
                  withCommas.format(System.currentTimeMillis() - startTime) +
                                                                  " msec\n");
            try
            {
              Thread.sleep(2000);
            }
            catch (InterruptedException ie) {}
          }
          catch (ClassCastException cce)
          {
            System.out.println("  Not a SourceDataLine: " + thisLine);
            if (thisLine != null)  // Eclipse doesn't know we can't get here
            {                      // if thisLine is null.
              Control[] controls = thisLine.getControls();
              if (controls.length > 0)
              {
                for (int i=0; i<controls.length; i++)
                {
                  System.out.println(
                                "            Control["+i+"]: " + controls[i]);
                }
              }
              else
              {
                System.out.println(
                             "                        No Controls Available");
              }
            }
          }
          //  Each line should exist
          catch (LineUnavailableException lue)
          {
            System.out.println("                  Oops! " + lue.getMessage());
          }
        }
        
        //  Show info for all of this mixer's target lines
        Line.Info[] targetLineInfoList = mixer.getTargetLineInfo();
        for (Line.Info targetLineInfo: targetLineInfoList)
        {
          System.out.println("      Target Line Info: " + targetLineInfo);
          try
          {
            Line theLine = mixer.getLine(targetLineInfo);
            System.out.println("           Target Line: " + theLine);
            Control[] controls = theLine.getControls();
            if (controls.length > 0)
            {
              for (int i=0; i<controls.length; i++)
              {
                System.out.println(
                                "            Control["+i+"]: " + controls[i]);
              }
            }
            else
            {
              System.out.println(
                             "                        No Controls Available");
            }
          }
          catch (LineUnavailableException lue)
          {
            System.out.println("                  Oops! " + lue.getMessage());
          }
        }
      }
      System.out.println("tsiom");
      System.exit(0);
    }
  }

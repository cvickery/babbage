// $Id: ContinuousSound.java,v 1.6 2007/01/13 03:23:04 vickery Exp $
/*
 * Created on Jan 08, 2007
 *
 *  Author:     C. Vickery
 *
 *  Copyright (c) 2007, Queens College of the City University
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
 *  $Log: ContinuousSound.java,v $
 *  Revision 1.6  2007/01/13 03:23:04  vickery
 *  Added tooltips and cleaned up UI details.  Reworked audio output
 *  to get rid of a buzz caused by audio system dropping out for 1.5
 *  msec periodically one one Windows computer.  The buzz remains.
 *
 *  Revision 1.5  2007/01/09 09:15:14  vickery
 *  Re-cleaning up UI.
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
import java.awt.Container;
import java.awt.Dimension;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.sound.sampled.AudioFormat;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Line;
import javax.sound.sampled.LineUnavailableException;
import javax.sound.sampled.Mixer;
import javax.sound.sampled.SourceDataLine;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;

//  class ContinuousSound
//  -------------------------------------------------------------------
/**
 *  Lets you turn a tone on and off.
 *  
 *  Writing one sample at a time to the output line:
 *  
 *  MacBook with 2 GHz Core Duo processor:
 *    Clean tone.  Moving mouse, running other apps, etc. has no effect
 *    on sound quality.
 *    Buffer size did not change (88200 bytes).
 *    CPU utilization by this app when not playing: 3.8%
 *    CPU utilization by this app when playing:     6.5%
 *  
 *  IBM Intellistation running XPSP2:
 *    Buzzy-poppy sound.  Moving the mouse degraded the sound.
 *    Buffer size did not change (88200 bytes).
 *    CPU utilization when not playing:  0%
 *    CPU utilization when playing:     50%
 *
 *  Writing two samples at a time cleans up tone purity problem on the PC.
 *  To be safe, I'll do eight samples at a time in the application.
 *  
 * @author C. Vickery
 *
 */
public class ContinuousSound extends JFrame
{
  public static final long serialVersionUID = 1L;

  //  UI
  final JPanel contentPanel = new JPanel(new BorderLayout());
  final JButton playStopButton = new JButton("Play");
  final JButton exitButton = new JButton("Exit");

  //  Audio
  SourceDataLine audioOut = null;
  static int afBitsPerSample = 0;
  static float afSamplingRate = 0;
  static boolean playSound = false;
  
  //  Constructor
  //  -----------------------------------------------------------------
  public ContinuousSound(String title)
  {
    super(title);
    
    //  UI
    contentPanel.add(playStopButton, BorderLayout.NORTH);
    contentPanel.add(exitButton, BorderLayout.SOUTH);
    setContentPane(contentPanel);
    pack();
    centerIt(this);
    setVisible(true);
    
    playStopButton.addActionListener(new ActionListener()
    {
      public void actionPerformed(ActionEvent ae)
      {
        playSound =! playSound;
        if (playSound)
        {
          playStopButton.setText("Stop");
        }
        else
        {
          System.out.println(audioOut.getBufferSize());
          playStopButton.setText("Play");
        }
      }
    });
    setDefaultCloseOperation( JFrame.EXIT_ON_CLOSE );
    exitButton.addActionListener(new ActionListener()
    {
      public void actionPerformed(ActionEvent ae)
      {
        System.exit(0);
      }
    });
    //  Get the first SourceDataLine available, if any.
    Mixer.Info[] mixerInfos = AudioSystem.getMixerInfo();
    for (Mixer.Info mixerInfo: mixerInfos)
    {
      Mixer       mixer     = AudioSystem.getMixer(mixerInfo);
      Line.Info[] lineInfos = mixer.getSourceLineInfo();
      for (Line.Info lineInfo: lineInfos)
      {
        try
        {
          audioOut = (SourceDataLine)mixer.getLine(lineInfo);
          break;
        }
        catch (LineUnavailableException lue) {}
        catch (ClassCastException cce) {}
      }
        if (audioOut != null)
        {
        try
        {
          audioOut.open();
          break;      //  Viable line found -- search no more!
        }
        catch (LineUnavailableException lue)
        {
          audioOut = null;
          continue;   //  Try another line or mixer
        }
      }
    }
    if (audioOut == null)
    {
      playStopButton.setEnabled(false);
      playStopButton.setText("Unable Play Sounds");
      return;
    }
    
    //  Capture default line attributes.
    final AudioFormat af = audioOut.getFormat();
    afBitsPerSample = af.getSampleSizeInBits();
    afSamplingRate = af.getSampleRate();

    //  Launch Playback Thread
    startPlayback();
    
  }

  //  startPlayback()
  //  -----------------------------------------------------------------
  /**
   * 
   */
  public void startPlayback()
  {
    final byte[] sample = new byte[8];
    new Thread()
    {
      final double inc = (Math.PI * 2) / 100; // 441 Hz
      double now = 0;
      short sineValue = 0;

      public void run()
      {
        audioOut.start();
        while (true)
        {
          for (int i=0; i<8; i++)
          {
          sineValue = (short)(Math.sin(now) * 32767);
          sample[0] = sample[2] = (byte)sineValue;
          sample[1] = sample[3] = (byte)(sineValue >> 8);
          now += inc;
          sineValue = (short)(Math.sin(now) * 32767);
          sample[4] = sample[6] = (byte)sineValue;
          sample[5] = sample[7] = (byte)(sineValue >> 8);
          now += inc;
          if (playSound)
          {
            for (int j=0; j<1; j++)
            {
            audioOut.write(sample, 0, sample.length);
            }
          }
          else
          {
            audioOut.flush();
            try
            {
              Thread.sleep(100);
            }
            catch (InterruptedException ie) {}
          }
          }
        }
      }
      
    }.start();

    return;

  }

  //  centerIt()
  //  -----------------------------------------------------------------
  /**
   *    Centers a component on the screen.
   *    
   */
  private void centerIt(Container it)
  {
    Dimension window = Toolkit.getDefaultToolkit().getScreenSize();
    Dimension component = it.getSize();
    it.setLocation(window.width/2 - component.width/2,
                                 window.height/2 - component.height/2);
  }
  
  //  main()
  //  ------------------------------------------------------------------
  /**
   * 
   *  @param args Not Used.
   */
  public static void main(String[] args)
  {
    new ContinuousSound("Continuous Sound");
  }
}

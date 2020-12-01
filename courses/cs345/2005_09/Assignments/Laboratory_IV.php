<?php
  if (array_key_exists("HTTP_ACCEPT", $_SERVER) &&
      stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml"))
  {
    header("Content-type: application/xhtml+xml");
    print("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n");
  }
  else
  {
    header("Content-type: text/html; charset=utf-8");
  }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

  <title>Assignment 3</title>

  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="/courses/css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="/courses/css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
        href="/courses/css/style-print.css" />        

</head>

<body>

  <div id="header">
    <h1>LaboratoryIV</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">

      <p>This lab deals with issues of generating signals to drive the
      FPGA&rsquo;s I/O pins directly. The RC-200E brings several FPGA pins
      out to the 50-pin expansion header, along with some power and
      ground connections. In this lab you will connect a servomotor to
      one of the pins in the expansion header and use the pushbuttons
      to make the motor rotate one way, the other way, or not at all.
      To operate correctly, your code must generate pulses of exactly
      the correct frequency and pulse widths, and you will verify the
      correct behavior both by simulation and by using an oscilloscope
      before actually connecting a servomotor to the RC200E.</p>

    </div>
    <h2>Laboratory Description</h2>
    <div class="whitebox">
    
      <h3>Specifications</h3>
      
      <p>Your program is to generate a pulse every 20 msec. If one
      pushbutton is pressed, the pulse is to be 1.0 msec long; if the
      other button is pressed, the pulse is to be 2.0 msec long. If
      neither button (or both buttons) is pressed, the pulse is to be
      1.5 msec long. The servomotors we are using, Futaba model number
      3003, rotates clockwise when it receives 1.0 msec pulses,
      counterclockwise when it receives 2.0 msec pulses, and not at
      all when it receives 1.5 msec pulses. (Clockwise and
      counterclockwise depend on your point of view.)</p>

      <p>There are several ways you could design your code to meet
      these specifications. But for this lab you are required to use
      one endless loop to time the millisecond intervals and a second
      endless loop to generate the pulses. The two loops must
      synchronize with each other using a Handel-C channel.</p>

      <h3>Activities</h3>
      
      <ol>
      <li>Work Through the First Waveform Analyzer Example</li>
      <li>Write a Program that Outputs to a Pin</li>
        <ol>
        <li>Verify your program using the Waveform Analyzer</li>
        <li>Verify your program using an Oscilloscope</li>
        </ol>
      <li>Write a Program that Controls a Servomotor</li>
        <ol>
        <li>Verify your program using the Waveform Analyzer</li>
        <li>Verify your program using an oscilloscope</li>
        <li>Verify your program using a servomotor</li>
        </ol>
      </ol>
    </div>

    <h2>Submit the Assignment</h2>
    <div class="whitebox">
    
      <h3>Due Date:</h3>
    </div>
  </div>

  <div id="footer">
  <hr />
    <p class="links"> <a href="/">Vickery Home</a>&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><i>Last updated
      <?php echo gmdate("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME']));
      ?>.</i>
    </p>
  </div>
</body>
</html>

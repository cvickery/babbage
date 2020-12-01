<?php
  $mime_type = "text/html";
  $html_attributes="lang=\"en\"";
  if ( array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml") ||
         stristr($_SERVER["HTTP_ACCEPT"], "application/xml") )
       ||
       (array_key_exists("HTTP_USER_AGENT", $_SERVER) &&
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator"))
     )
  {
    $mime_type = "application/xhtml+xml";
    $html_attributes = "xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\"";
    header("Content-type: $mime_type");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  }
  else
  {
    header("Content-type: $mime_type; charset=utf-8");
  }
?>
<!DOCTYPE html>
<html <?php echo $html_attributes;?>>
  <head>
    <title>Midterm Topics</title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/assignments.css" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/assignments-print.css" />
    <style type='text/css'>
    blockquote {
      line-height:1.4em;
      margin: 1em 5em;
      padding:1em;
      border: 1px solid black;
      border-radius:0.25em;
      text-align:justify;
    }
    .code-block, li {
      line-height:1.5em;
    }
    .text-image {
      height: 1em;
      border:none;
      display:inline;
    }
    .equation {
      text-align:center;
    }
    h3+* {border:none; margin-top:0;}
    </style>
  </head>
  <body>
    <h1>CSCI 100 Midterm Topics</h1>
    <blockquote class='not-yet'>
      <em>Note:</em> You are responsible for all material in the assignment web pages, even if
      it is not explicitly listed here.
    </blockquote>
    <h2>Topics</h2>
    <div>
      <h3>Information Theory and Artificial Intelligence</h3>
      <ul>
        <li>Ada Lovelace</li>
        <li>Claude Shannon</li>
        <li>Alan Turing</li>
        <li>The Turing Test</li>
        <li>Information Doesn’t Deserve To Be Free</li>
      </ul>
      <h3>Morse Code</h3>
      <ul>
        <li>Four symbols (dot; dash; letter space; word space)</li>
        <li>Relative durations of the four symbols</li>
        <li>The 'S' and 'O' code points</li>
        <li>Controlling the speed</li>
      </ul>
      <h3>Microcontroller Concepts</h3>
      <ul>
        <li>
          I/O pins: digital; analog; PWM
        </li>
        <li>
          Three types of storage: Flash ROM, RAM, and EEPROM.
          <ul>
            <li>Code</li>
            <li>Variables</li>
            <li>Lookup Tables (not covered)</li>
          </ul>
        </li>
      </ul>
      <h3>Arduino Coding</h3>
      <ul>
        <li>
          Why code layout (indentation, etc.) matters even if it makes no difference to
          the computer.
        </li>
        <li>Variables: declaring; assigning values; referencing values</li>
        <li>Assignment statements: syntax; left-hand side; right-hand side</li>
        <li>Functions: calling; defining; returning values</li>
        <li>Macros: defining (<code>#define</code>) and referencing</li>
        <li>
          Input and Output: pins; <em>digitalWrite()</em>; <em>analogRead()</em>;
          <em>analogWrite()</em> (<em>digitalRead()</em> not covered yet)
        </li>
        <li>
          The two essential function definitions in every Arduino sketch.
          <ul>
            <li>Their names</li>
            <li>What they do</li>
          </ul>
        </li>
      </ul>
      <h3>Basic Circuits</h3>
      <ul>
        <li>Connections: Arduino UNO; breadboard; computer</li>
        <li>Ohm’s Law: Voltage, Current, and Resistance</li>
        <h4 style="margin:0">Components</h4>
        <ul>
          <li>Resistors</li>
          <li>Potentiometers</li>
          <li>LEDs</li>
        </ul>
        <li>Analog and PWM LED brightness controls</li>
      </ul>
      <h3>Information Encoding</h3>
      <ul>
        <li>Positional Number Systems: decimal; binary</li>
        <li>
          Powers of two: positive and negative exponents; relate to positional number systems
        </li>
        <li>Using binary numbers to represent colors: mixing primary colors</li>
        <li>Pixels</li>
      </ul>
    </div>
    <div id="footer">
      <a href='./syllabus.php'>Syllabus</a> - <a href='./index.php'>Course Schedule</a>
    </div>
  </body>
</html>

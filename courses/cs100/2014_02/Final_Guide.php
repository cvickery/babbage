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
    <title>CSCI 100 Final Exam Guide</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/assignments.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="print"
          href="../../css/assignments-print.css"
    />
    <style type="text/css">
    h3 { font-size: 1em; }
    .outline       { list-style-type: upper-roman; }
    .outline ol    { list-style-type: upper-latin; }
    .outline ol ol { list-style-type: decimal;     }
    li {line-height: 1.5;}
    </style>
  </head>
  <body>
    <h1>CSCI 100 Final Exam Guide</h1>
    <h2>Spring 2014</h2>
    <div>
      <p>Links are to PDF copies of documents and code samples handed out in class.</p>
      <h3>Topics Since Midterm</h3>
      <ul>
        <li>Arduino code structure
        <ul>
          <li>Variable names and values</li>
          <li>Assignment statements</li>
          <li>Variable declarations
          <ul>
            <li>Scope</li>
          </ul>
          </li>
          <li><em>setup()</em>and <em>loop()</em> functions</li>
          <li>The <em>delay()</em> function</li>
          <li><strong>if</strong> statements</li>
        </ul>
        </li>
        <li><a href='./binary_counter.pdf'>Arduino Binary Counter as Finite State Machine</a>
        <ul>
          <li>Present State; Next State; Transitions</li>
          <li>Relate number of counter bits to number of states</li>
          <li><em>pinMode(), digitalRead(),</em> and <em>digitalWrite()</em> functions</li>
        </ul>
        </li>
        <li><a href='./servos.pdf'>Arduino servo motor control</a>
        <ul>
          <li>Period and duty cycle of waveform</li>
          <li>Potentiometers and the <em>analogRead()</em> function</li>
        </ul>
        </li>
        <li>Probability theory
        <ul>
          <li>Probabilities; proportions; percentages; odds</li>
          <li>Probability related to information: uncertainty and randomness</li>
        </ul>
        </li>
        <li>Bayesian reasoning
          <ul>
            <li>True Positive</li>
            <li>False Positive</li>
            <li>True Negative</li>
            <li>False Negative</li>
          </ul>
        </li>
        <li>Artificial Intelligence
          <ul>
            <li>Intelligent Agents</li>
            <li>Goal Searching</li>
            <li>Sensors and Actuators</li>
          </ul>
        </li>
        <li>Waveforms
          <ul>
            <li>Oscilloscope display</li>
            <li>Analog and Digital</li>
            <li>Period and frequency calculations</li>
            <li>Units of measure (seconds and Hertz).</li>
            <li>Audio sampling and quantization</li>
            <li>PWM parameters: period; frequency; width; duty cycle</li>
          </ul>
        </li>
        <li><a href='Encoding_Text.pdf'>Encoding Text</a>
        <ul>
          <li>Code Points</li>
          <li>Code Tables</li>
          <li>Escape Codes</li>
          <li>Baudot; ASCII; ISO-Latin-1; Unicode
            <ul>
              <li>Bits per code point</li>
              <li>Number of code points</li>
              <li>Bit layout (UUUUUUUU&#x00a0;UUUUUUUU&#x00a0;UUUUUUUU&#x00a0;LAAAAAAA)</li>
            </ul>
          </li>
          <li>Text Rendering</li>
        </ul>
        </li>
      </ul>

      <h3>Topics Before Midterm</h3>
      <ul>
        <li>Using bits to measure information</li>
        <li>Powers of two</li>
        <li>Prefixes for large numbers: K (Kilo); M (Mega); G (Giga); T (Tera); P (Peta)</li>
        <li>Prefixes for fractions: m (milli); μ (micro); n (nano); p (pico)</li>
        <li>Digital and analog information</li>
        <li>Resisters and LEDs, Arduino inputs/outputs</li>
        <li>Pulse width modulation (PWM) to control LED brightness</li>
      </ul>
    </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>

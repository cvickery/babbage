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
    <title>Second Morse Code Assignment</title>
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
    .code-block {
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
    <h1>CSCI 100 Assignment 3</h1>
    <h2>Morse Code Speed</h2>
    <div>
      <h2>
        Introduction
      </h2>
      <div>
        <p>
          In this project, you will learn about some of the digital signals that can serve
          as inputs and outputs for a microcontroller, a bit about electrical circuits (Ohm’s
          Law), and some basic components of Arduino code: macros, variables, and assignment
          statements. The context for all this is to design and build a version of the SOS
          project that lets you change the speed of the Morse Code by turning a knob.
        </p>
        <p>
          The following links were on this page before the rest of the page was available.
          Although they seem to deal with LEDs (actually, they do deal with LEDs!), their real
          purpose is to introduce you to electric circuits and Ohm’s Law. More on this below;
          if you haven't gone through these three lessons yet, do so now.
        </p>
        <ul style="line-height:1.5">
          <li>
            <a href='https://learn.adafruit.com/all-about-leds/overview'>About LEDs</a>
            Includes a video showing an LED being burned out.
          </li>
          <li>
            <a href='https://learn.adafruit.com/adafruit-arduino-lesson-2-leds/overview'>
              One way to change the brightness of a LED</a>: using a resistor.
          </li>
          <li>
            <a href='https://learn.adafruit.com/adafruit-arduino-lesson-8-analog-inputs/overview'>
              Analog Inputs</a> includes a section on potentiometers (what we will use for the
              speed control knob).
          </li>
        </ul>
      </div>
      <h2>
        Microcontroller I/O and Ohm’s Law
      </h2>
      <div>
        <h3>Arduino Functions</h3>
        <p>
          In the previous project, you used Arduino’s <em>digitalWrite()</em> function to turn an
          LED on and off. You should recall that you had to put two numbers inside the parentheses,
          a pin number (13 in our case), and a second number which either turned the LED on (if it
          was a 1) or off (if it was a 0). Some of you found that you could substitute the symbols
          HIGH and LOW for the numbers 1 and 0, respectively. HIGH and LOW are predefined <em>
          macros</em> in the Arduino language, just like the macro you used to make the symbol
          <em>led_pin</em> represent the number 13. The compiler substitutes all references to macros
          with their defined value before it starts translating the code into microcontroller
          machine language.
        </p>
        <p>
          <strong>Some terminology about functions:</strong> the two numbers that go inside the
          parentheses of a <em>digitalWrite()</em> statement are called the <em>arguments</em> that
          are <em> passed</em> to the function when it is <em>called</em>.
        </p>
        <p>
          There are two basic things
          you can do with functions in Arduino: <em>define</em> them, and <em>call</em> them.
          You saw examples of both in the first assignment: you <em>called</em> the
          <em>digitalWrite()</em> and <em>delay()</em> functions; you <em>defined</em> the
          <em>setup()</em> and <em>loop()</em> functions. For now, it’s sufficient for you to
          be aware that the difference exists and to pay attention to what is happening as you
          define and call functions in your code.
        </p>
        <h3>Digital and Analog I/O</h3>
        <p>
          A <em>digital</em> signal <img class='text-image' alt='' src='images/digital.png'/> is
          one that can can have only two values. In the Arduino Uno that we are using,
          these two values are 0 and 5 volts DC: the two voltages available using a USB
          cable or from certain batteries. An <em>analog</em> signal <img class='text-image'
          alt='' src='images/analog.png'/> is one that can have an unlimited number of
          values. In the case of the Arduino UNO, analog inputs are converted by the
          ATmega328 microcontroller to a number in the range 0 to 1023, representing voltages
          between 0 and 5 volts DC. However, the ATmega328 does not generate analog voltage
          outputs. Rather, it uses a technique called Pulse Width Modulation (PWM) to handle
          analog output. If we hope to understand these four kinds of signals digital input,
          digital output, analog input, PWM output, we’ll need some basic information about
          electrical circuits, which brings us to …
        </p>
        <h3>Ohm’s Law</h3>
        <p>
          So far we’ve talked about the size of an electrical signal as a number of volts, but
          there is another size involved: <em>current</em>. Voltage (properly called ”electromotive
          force”) is measured in volts, while current is measured in <em>amps</em>. If it helps,
          there is a crude analogy to water coming out of a hose: voltage tells how far the water
          will squirt out, while current tells how much water comes out. In an electric circuit,
          a battery or power supply will be specified as how much voltage it supplies and how much
          current can be drawn from it. The third concept that relates voltage and current in an
          elecrical circuit is <em>resistance</em>. The water hose analogy is that if you pinch the
          hose (add resistance to the circuit), less water will come out (less current will be
          used). Ohm’s Law relates voltage, current, and resistance using a simple equation:
        </p>
        <p class='equation'>E = IR</p>
        <p>
          That is, voltage (E for electromotive force) is equal to I (current in amps) times R
          (resistance, which is measured in Ohms, Ω). Basic algebra lets you solve for the other
          two values, I and R:
        </p>
        <p class='equation'>I = E / R</p>
        <p class='equation'>R = E / I</p>
        <p>
          There are two important concepts at this point.
        </p>
        <ol>
          <li>
            First, if you have a circuit with a fixed voltage (like a battery), <em>increasing
            the  resistance</em> in the circuit will <em>decrease the current</em>. You
            will sometimes hear a resistor called a “current limiting resistor” because
            that is often the reason for adding one to a circuit. This is what the first
            Adafruit lesson on LEDs was all about.
          </li>
          <li>
            It turns out that the ATmega328 is not symmetrical when it comes to analog I/O: it can
            convert an anlog input voltage into a digital value using a circuit called an analog
            to digital converter (ADC), but it doesn’t have any digital to analog converters (DACs)
            to generate analog output voltages. What it does have are circuits that can do
            interesting things with the <em>timing</em> of its digital outputs. So you can use
            <em>analogWrite()</em> to convert a number between 0 and 1023 into something that
            controls the brightness of an LED, but what it outputs is a PWM signal that controls
            the proportion of time that the output is on. We will come back to PWM later in the
            course, but it’s not important to us for now.
          </li>
        </ol>
      </div>
      <h2>
        Controlling the SOS Speed
      </h2>
      <div>
        <h3>Arduino Variables and Assignment Statements</h3>
        <p>
          You saw in the last assignment that you can use a symbol (such as <code>led_pin</code>) to
          represent a value (such as 13) in Arduino code by using a <code>#define</code> statement to
          create a macro. And you saw that macros work by preprocessing the code you wrote: the
          compiler goes through your code and substitutes the macro value for the macro symbol
          throughout the code, and then compiles the code as if you had typed the value instead
          of the symbol.
        </p>
        <p>
          But recall the four stages the code goes through in order to run: (1) Edit; (2) Compile;
          (3) Load; (4) Run. To vary the speed of the Morse Code at run time, we need to change
          the <em>delay()</em> times during stage (4), but our macro technique only works at compile
          time. The solution is to use <em>variables</em> to control the <em>delay()</em> statements
          instead of fixed values, like <code>delay(250);</code>. A variable is a symbol, just like
          the macro you used for the pin number, except:
        </p>
        <ul>
          <li>The value of a variable can change (“can vary”) by assigning a new value to it as the
            program runs</li>
          <li>Variables have to be <em>declared</em> before they can be used</li>
          <li>Their values can be <em>referenced</em> any place you could type a value</li>
          <li>Their values can be changed by executing <em>assignment statements</em></li>
        </ul>
        <p>
          Arduino variables can be of different <em>types</em>. Here is a declaration of a variable
          named <code>dot_time</code> as a variable of type <code>int</code>. The <em>int</em> type
          is used for integers, which are numbers with no
          fraction part. The ATmega328 uses <em>int</em>s that can have values between -32,768 and
          +32,767. (It won’t matter for this project, but knowing the range of possible values that
          you can assign to a variable is sometimes important.)
        </p>
        <div class='code-block'>int dot_time;</div>
        <p>
          Here is a statement that assigns a value to <code>dot_time</code>:
        </p>
        <div class='code-block'>  dot_time = 250;</div>
        <p>
          And here is a statement that references the value of <code>dot_time</code>:
        </p>
        <div class='code-block'>  delay(dot_time);</div>
        <p>
          You only define a variable once. That suggests that the definition statement belongs
          inside <em>setup()</em>, because that’s where code that gets executed just once, at the
          beginning of run time, goes.  Unfortunately that’s wrong! For reasons  that are perfectly
          reasonable but somewhat difficult to explain easily, variable declarations go
          <em>before</em> the code for <em>setup()</em>.
        </p>
        <p>
          Here’s a sketch that simply blinks a LED connected to pin 13 two times a second:
        </p>
        <div class='code-block'>#define led_pin 13

int dot_time;

void setup()
{
  pinMode(led_pin, OUTPUT);
}

void loop()
{
  dot_time = 250;
  digitalWrite(led_pin, HIGH);
  delay(dot_time);
  digitalWrite(led_pin, LOW);
  delay(dot_time);
}
        </div>
        <h3>Using Variables for Morse Code Timing</h3>
        <p>
          Now the task is to change the value of <code>dot_time</code> each time the code reaches
          the top of the <em>loop()</em> function, and to change it to a value that depends on the
          position of a potentiometer attached to one of the analog input pins. Unlike digital I/O
          pins, you don’t need to call <em>pinMode()</em> for analog input. There are six dedicated
          pins for analog input, with predefined names: <code>A0, A1, A2, A3, A4,</code> and
          <code>A5</code>. You use the <em>analogRead()</em> function to get the current value of
          one of the analog input pins. For example, the following code will change the value
          <code>dot_time</code> to a number between 0 and 1023 each time execution reaches the top
          of <em>loop()</em>:
        </p>
        <div class='code-block'>#define led_pin 13

int dot_time;

void setup()
{
  pinMode(led_pin, OUTPUT);
}

void loop()
{
  dot_time = analogRead(A0);
  digitalWrite(led_pin, HIGH);
  delay(dot_time);
  digitalWrite(led_pin, LOW);
  delay(dot_time);
}
        </div>
        <p>
            If you connect one side of a potentiometer to ground, connect the other side
            to +5 volts, and connect the middle pin to Arduino pin A0, you can turn the knob of
            the potentiometer to cause the LED connected to pin 13 to flash anywhere from too fast
            to see it change to v-e-r-y slow.
        </p>
        <h3>Using Expressions for Dashes and Spaces</h3>
        <p>
          Remember, there are four different delay intervals involved in sending Morse Code
          messages: the basic unit is the dot time, which is the on time of a dot as well as
          the off time between dots and dashes within a letter. The dash time (the on time of
          a dash) is three times the length of a dot, and so is the off time between letters.
          Finally, there is an off time between words that is seven times the dot time.
        </p>
        <p>
          An <em>expression</em> is a calculation that you can write on the right side of an
          assignment statement using arithmetic operators (<code>+</code> for add; <code>-</code>
          for subtract; <code>*</code> for multiply; <code>/</code> for divide.) For example, if
          you had declared a variable named <code>dash_time</code>, the following statements
          would set the value of <code>dash_time</code> to three times whatever the value of
          <code>dot_time</code> is:
        </p>
        <div class='code-block'>  dash_time = 3 * dot_time;</div>
        <p>
          I‘ll leave it to you to figure out how to turn this into a complete SOS with speed
          control project!
        </p>
      </div>

      <h2>
        Submitting Your Project
      </h2>
      <div>
        <p>
          When your code is working properly, and formatted clearly, send an email to <a
          href='mailto:christopher.vickery@qc.cuny.edu?subject=CSCI%20100%20Morse%20Code%20Speed'>
          Christopher.Vickery@qc.cuny.edu</a> telling me who your partner was and that you have
          completed the the project. Although you are working with a partner, <em>both members of
          the team have to submit their own copy of the code</em>.
        </p>
        <p>
          I will retrieve a copy of the code myself: do not attach it to your email
          message. (This is a test of how well you follow directions!)
        </p>
      </div>
    </div>
    <div id="footer">
      <a href='./syllabus.php'>Syllabus</a> - <a href='./index.php'>Course Schedule</a>
    </div>
  </body>
</html>


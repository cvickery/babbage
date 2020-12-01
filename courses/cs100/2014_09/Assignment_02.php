<?php
  header("Vary: Accept");
  if (array_key_exists("HTTP_ACCEPT", $_SERVER) &&
  stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml") ||
  stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator")
  )
  {
    header("Content-type: application/xhtml+xml");
    header("Last-Modified: "
    . date('r', filemtime($_SERVER['SCRIPT_FILENAME'])));
    print ("<?xml version=\"1.0\" encoding=\"utf-8\"
  ?>
  \n");
  }
  else
  {
    header("Content-type: text/html; charset=utf-8");
  }
?>
<!DOCTYPE html PUBLIC
          "-//W3C//DTD XHTML 1.1//EN"
          "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>Morse Code Assignment</title>
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
    h3+* {border:none; margin-top:0;}
    </style>
  </head>
  <body>
    <h1>CSCI 100 Assignment 2</h1>
    <h2>Morse Code</h2>
    <div>
      <h2>
        Introduction
      </h2>
      <div>
        <p>
          For your first Arduino project, your assignment is to make a LED (Light Emitting Diode)
          flash the <a href='http://en.wikipedia.org/wiki/Morse_code'>Morse Code</a> signal of
          distress, “<a href='http://en.wikipedia.org/wiki/Morse_code#mediaviewer/File:SOS.svg'>
          S-O-S</a>”.
        </p>
        <blockquote>
          <em>Note: the web pages linked to in this document are required readings for this
          assignment. You will be responsible for them in class discussions and on exams.</em>
        </blockquote>
        <p>
          If you are not familiar with Morse Code, consult the code tree handed out in class on
          September 2 and/or read the Wikipedia article linked in the previous paragraph. The Morse
          Code dots and dashes can be signaled using sound (tones or the clicking of a telegraph key)
          or visually buy turning a light on, as we will do in this assignment.
        </p>
        <p>
          You have already seen how to build an <a href='http://arduino.cc/en/Tutorial/Sketch'>Arduino
          sketch</a> to turn a LED on and off, but before jumping into the design of that code, we
          need to refine the description of the project a little bit.
        </p>
      </div>
      <h2 id='signals'>
        Morse Code Signals
      </h2>
      <div>
        <p>
          As a first approximation, we can say the goal is to flash the LED three short times, then
          three long times, then three short times again (· · ·  — — —  · · ·). The pattern is to
          repeat over and over again.
        </p>
        <p>
          But for Morse Code, “timing is everything.” The Wikipedia article linked above spells it
          out. The
          duration of a dot is the basic unit of time: each dot or dash is separated by an off
          time equal to the duration of a dot; each dash is three times as long as a dot, and each
          letter is separated by an off time equal to three dots. Finally, each word is separated
          by an interval equal to seven dots. So our SOS signal looks something like the following,
          where “on(1)” means to turn the LED on for one dot time.
        </p>
        <pre>
          on(1) off(1) on(1) off(1) on(1)     S
          off(3)                              letter space
          on(3) off(1) on(3) off(1) on(3)     O
          off(3)                              letter space
          on(1) off(1) on(1) off(1) on(1)     S
          off(7)                              word space
          start over
        </pre>
        <p>
          For this assignment, we will use a quarter of a second as the dot time. That should be
          slow enough so that you can see the pattern clearly, but not so slow that you will get
          bored waiting for the message to be displayed. In the next assignment you will have a
          chance to experiment with different dot times.
        </p>
      </div>
      <h2>The Arduino Sketch</h2>
      <div>
        <p>
          For this assignment, you need to know how to write the two framework functions,
          <em>setup()</em> and <em>loop()</em> as shown in class and in the <a
          href='http://arduino.cc/en/Tutorial/BareMinimum'>Arduino Tutorial</a> available online.
          You will also need to use the following three functions:
        </p>
        <ol>
          <li><em>pinMode()</em></li>
          <li><em>digitalWrite()</em></li>
          <li><em>delay()</em></li>
        </ol>
        <p>
          There are some other Arduino features that you could use to make this project easier to
          modify or require fewer lines of code. But for this first project, we’ll not use those
          so there are fewer new concepts to deal with.
        </p>
        <h3>Save Your Work Often</h3>
        <div>
          <p>
            Follow the instructions given in class for saving your Arduino sketches in your own
            “Sketchbook” in the lab. When you start a new sketch, it will have a name that has
            today’s date in it. Save the sketch even before you write any code by clicking on the
            Save icon: <img src='images/arduino_save.png' alt='screenshot showing Save icon' />
            You will be prompted to give the sketch a meaningful name. For example, you might name
            this project SOS.
          </p>
          <p>
            Every time you change your code, save it again so you won’t lose your work in case
            something goes wrong. Note that the syntax check and code upload buttons described
            below do <em>not</em> cause your code to be saved to disk: you have to do that yourself.
          </p>
          <blockquote>
            There are two other ways to save your work: there is a Save item under the File menu,
            but the quickest and easiest way is simply to use the keyboard shortcut: ⌘-S (hold ⌘, the
            "Command" key, and type S).
          </blockquote>
        </div>
        <h3>Arduino Syntax and Code Formatting</h3>
        <div>
          <p>
            “Syntax” refers to the rules you have to follow when you type code in order to get it
            to compile (build) without any errors. You have to get the syntax right before you can
            upload your sketch to your Arduino board. You can always check the syntax by clicking on
            the checkmark in the upper left corner of the Arduino program: <img
            src='images/arduino_check_syntax.png' alt='screenshot showing check syntax button' />
          </p>
          <p>
            Although you have to get the syntax of your code exactly right to get it to compile,
            the Arduino language, there is a good deal of flexibility about how you type the
            “whitespace” in your code.
          </p>
          <blockquote>
            Whitespace refers to whatever would appear white if you print something on a white piece
            of paper. That is, parts of the page without printing. The space character (when you hit
            the spacebar), the tab character, and the
            newline character (when you hit Enter or Return) are all examples of whitespace.
          </blockquote>
          <p>
            It is critical to use whitespace to show the structure of your code in a consistent way,
            even though the compiler ignores the whitespace when it analyzes the syntax. The reason
            is simply that it’s extremely difficult to find and fix problems in code that does not
            use whitespace to format the code so it is easy to read.
          </p>
          <blockquote>
            A significant feature of computer code is that parts of the code are often nested inside
            other parts, sort of like <a href='http://en.wikipedia.org/wiki/Matryoshka_doll'>matryoshka
            dolls</a>. <em>Indentation</em> (whitespace at the left end of lines) is used to show
            nesting. Here are two examples to show the difference:
          </blockquote>
          <div class='code-block'>void loop(){digitalWrite(13,1);
delay(1000);digitalWrite(13,0);delay(1000);}
          </div>
          <div class='code-block'>void loop()
{
  digitalWrite(13, 1);
  delay(1000);
  digitalWrite(13, 0);
  delay(1000);
}
          </div>
          <p>
            The second version clearly shows that there are four statements nested inside the
            <em>loop()</em> function, and that those four statements are all at the same nesting
            level, as shown by all four having the same left margin.
          </p>
          <p>
            Some people care (a lot!) about how much you indent nested code and/or where you put
            the curly braces relative to the other parts of the code. For this course, just make
            sure you use a consistent style that is easy to read.
          </p>
        </div>
        <h3>
          The SOS Algorithm
        </h3>
        <ul>
          <li>Use <em>pinMode()</em> inside <em>setup()</em> to make the pin you are going to
            connect to the LED an <em>output</em> pin.
          </li>
          <li>
            In the <em>loop()</em> function use <em>digitalWrite()</em> to turn the LED on and off
            for the “dot intervals” listed in the <a href='#signals'>Morse Code Signals</a> section
            of this web page. For example, to
            generate the three dots that make an “S” with
            a dot interval of 250 msec (250 milliseconds = a quarter if a second), you would turn the
            LED on; delay for 250 msec, turn it off; delay for 250 msec; turn it on; delay for 250 msec;
            turn it off; delay for 250 msec; turn it on; delay for 250 msec; and finally delay for 750
            msec to generate the end of letter space.
          </li>
          <li>
            The statements in the <em>loop()</em> function get repeated endlessly, so putting a
            word-space delay as the last statement inside <em>loop()</em> will cause the “word” SOS
            to be repeated with the proper time interval between repetitions.
          </li>
        </ul>
        <h3>Testing the Code</h3>
        <p>
          Under the Tools menu, be sure “Arduino UNO” is selected as the Board you are
          using and that the Serial Port is “/dev/tty.usbmodem<em>nnn</em>," where
          <em>nnn</em> is a number that varies from computer to computer. Click on the
          right-pointing arrow at the top of the Arduino window to upload your code to
          your UNO: <img src='images/arduino_upload_code.png' alt='screenshot showing
          upload code icon' />
        </p>
        <p>
          The LEDs on the board will flash as the code is loaded and initializes. Once it finishes
          that process, verify that your board is sending you its call for help in Morse Code!
        </p>
      </div>
      <h2>
        Submitting Your Project
      </h2>
      <p>
        When your code is working properly, and formatted clearly, send an email to <a
        href='mailto:christopher.vickery@qc.cuny.edu?subject="CSCI 100 Morse Code"'>
        Christopher.Vickery@qc.cuny.edu</a> from either
        member of your team, but signed by both of you, telling me which person’s account has
        the project. I will retrieve a copy of the code myself: do not attach it to your email
        message. (This is a test of how well you follow directions!)
      </p>
    </div>
    <div id="footer">
      <a href='./syllabus.php'>Syllabus</a> - <a href='./index.php'>Course Schedule</a>
    </div>
  </body>
</html>


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
    <title>Assignment 5</title>
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
    <h1>CSCI 100 Assignment 5</h1>
    <h2>Links</h2>
    <div>
      <p>
        For those who are looking for project ideas:
      </p>
      <ul>
        <li>
          <a href="http://www.nytimes.com/2014/10/09/fashion/wearable-technology-that-feels-like-skin.html">
            Wearable Technology</a>
        </li>
      </ul>
    </div>
    <h2>Binary Counter Project</h2>
    <div>
      <p>
        This is a complex project, but you can learn a lot by doing it. Here are some of the things
        you can learn:
      </p>
      <ul>
        <li>
          How binary numbers “work.” As you know binary numbers are the basis of information
          theory: any information can be represented using binary numbers. In this project, you
          will be able to understand the patterns that make up sequences of binary numbers.
        </li>
        <li>
          How to convert rules (in this case, rules about how to manipulate binary numbers), into
          algorithms. In this case, the algorithms are encapsulated in computer code for an Arduino
          microcontroller.
        </li>
        <li>
          How to break a complex problem into a sequence of manageable steps that build up to a
          complete solution. For this project, I will provide the steps for you. Pay attention to
          this sequence to see if it can serve as a model for doing the same sort of thing on your
          own.
        </li>
        <li>
          Learn how Finite State Machines / Finite State Automatata (FSMs / FSAs) can be used to
          strutcture control problems like the ones that microcontrollers are often used for.
        </li>
      </ul>
      <h3>Overview</h3>
      <p>
        The completed structure will uses an Arduino microcontroler to display a 5-bit binary
        number on five LEDs. When a LED is lit, it represents a 1; when it is not lit, it represents
        a 0. There will be a slide switch that will select whether the binary number should
        increment or decrement, and another slide switch that selects whether the binary number
        should change state because of the user pressing a pushbutton or because a certain amount of
        time has elapsed since the last state change.
      </p>
      <p>
        The project will be developed in the following stages, which are outlined in more detail
        below.
      </p>
      <ol>
        <li>Set up the FSM event loop, and use it to flash a LED on and off at a 1 Hz rate.</li>
        <li>
          Extend the next-state part of the FSM to create a 1 Hz 2-bit up counter, using the
          Serial Monitor to view the changes in the counter’s state.
        </li>
        <li>
          Implement a 1 Hz 5-bit up counter, still using the Serial Monitor to view the changes
          in the counter’s state.
        </li>
        <li>
          Add a switch to select whether the counter will count forwards (“up’) or backwards
          (“down”).
        </li>
        <li>
          Add a button to cause the state to change instead of elapsed time intervals.
        </li>
        <li>
          Add a switch to select between pushbutton and timed state changes.
        </li>
      </ol>
      <h3>Implementation Details</h3>
      <ol>
        <li>
          <strong>Set up the FSM event loop, and use it to flash a LED on and off at a 1 Hz rate.
          </strong>
          <p>
            The “FSM Event Loop” is the <em>loop()</em> function of your Arduino project. For an
            FSM it consists of four parts:
          </p>
          <ol>
            <li>Read control inputs (if there are any), and wait for the transition event</li>
            <li>Compute the next state</li>
            <li>Make the transition from the current state to the next state</li>
            <li>Display outputs, based on the current state</li>
          </ol>
          <p>
            This structure is called an “event loop” because part <em>a</em> is where the code
            waits for an event to occur, which causes it to proceed onto the next part. After
            processing the event by executing the next three parts of the loop, the code returns
            to the top, where it waits for the next event to occur.
          </p>
          <p>
            Since these four parts repeat endlessly, they could actually be coded in any order
            without any real effect on the behavior of the machine, as long as each step occurs
            exactly once per iteration of the <em>loop()</em> function. This is not an obvious
            concept, so don’t worry if it doesn’t make total sense. The sequence given is a
            “logical” sequence given the formal structure of finite state automata, so we can just
            work with that.
          </p>
          <p>
            For the first version of the project, start by entering comment lines for each of the
            four parts inside the <em>loop()</em> function definition.
          </p>
          <p>
            For this version, there are no control inputs, and the transition event is nothing
            other than the passage of time. In future versions,
            the first part is where the code will use <em>digitalRead()</em> to get the values of
            the switches and buttons.
          </p>
          <p>
            Since we want the LED to flash on and off at 1Hz, there
            will have to be <em>two</em> transitions per second (one to turn the LED on, and another
            to turn it off). Use a <em>delay()</em> statement in the first part of the event loop.
            So it will take two iterations of the event loop for one complete period of the 1 Hz
            flash rate.
          </p>
          <p>
            To represent the state of the machine, use global integer variables that will
            always have either the value 0 or 1. Since Arduino <em>int</em> variables are sixteen
            bit values, this design wastes 15/16 of the variable. You can reduce the wastage by
            using 8-bit integers instead of 15: the type <em>uint8_t</em> will accomplish this. But
            it still wastes 7/8 of the memory you need. But trying to use a more efficient way of
            storing the needed state information would require more storage to access the individual
            bits because one byte is the minimum amount of storage the microcontroller can store
            at at time in memory. As with the note about the order of the parts in the event loop,
            if this concept isn’t clear yet, just go with the flow for now!
          </p>
          <p>
            To compute the next state the code needs to invert the value of the variable: if it is
            0 make it 1; if it is 1 make it 0. There are two ways to accomplish this task. The clear
            way (provided you understand <em>if</em> statements):
          </p>
          <div class="code-block">
if (current_state == 0)
{
  next_state = 1;
}
else
{
  next_state = 0;
}
          </div>
          <p>
            Or the lazy way:
          </p>
          <div class="code-block">
next_state = 1 - current_state;
          </div>
        </li>
        <li>
          <strong>Extend the next-state part of the FSM to create a 1 Hz 2-bit up counter, using the
          Serial Monitor to view the changes in the counter’s state.</strong>
          <p>
            In this step, you will need two variables for the current state and another two
            variables for the next state. Since these bits will correspond to the rightmost two
            bits of a binary number, you can use numbers at the end of the variable names to
            indicate which is which. Pick your own numbering scheme: the right most bit could be
            0 because it is in the 2<sup>0</sup> position, or it could be 1 because it is in
            the position that has a value of 1.
          </p>
          <p>
            For now, use the Serial Monitor to show the states of the two current state variables
            in part <em>d</em> of the event loop. Call <em>Serial.begin()</em> inside
            <em>setup()</em>; call <em>Serial.print()</em> to print the left bit, and call
            <em>Serial.println()</em> to print the right bit.
          </p>
          <p>
            But how to compute the next state each time? There are a couple of techniques that
            would seem reasonable, but which will make the code very hard to extend to 3, 4, or
            more bits. Here are the two rules to use:
          </p>
          <ul>
            <li>The right bit always changes</li>
            <li>The left bit changes only if the right bit is currently 1</li>
          </ul>
          <p>
            Use an <em>if</em> statement to test the value of the left bit. There is a shortcut
            you can use: in the Arduino (C++) language, a varable with the value 0 is
            <em>false</em>, and a variable with the value 1 is <em>true</em>. So if the variable
            <em>x</em> is an integer that is either 0 or 1, the following two statements are
            equivalent:
          </p>
          <div class="code-block">
if (x == 1) { ... }
if (x) { ... }
          </div>
          <p>
            The second statement may seem obscure, but programmers with only a modest amount of
            experience will understand and use it because <u>it saves typing 5 whole keystrokes</u>!
            So it makes sense to get used to seeing/using it now.
          </p>
        </li>
        <li>
          <strong>Implement a 1 Hz 5-bit up counter, still using the Serial Monitor to view the
          changes in the counter’s state.</strong>
          <p>
            This step is the same as the previous step, but you need to figure out the rules for
            changing the states of the other three bits.
          </p>
        </li>
        <li>
          Add a switch to select whether the counter will count forwards (“up’) or backwards
          (“down”).
        </li>
        <li>
          Add a button to cause the state to change instead of elapsed time intervals.
        </li>
        <li>
          Add a switch to select between pushbutton and timed state changes.
        </li>
      </ol>
    </div>
    <div id="footer">
      <a href='./syllabus.php'>Syllabus</a> - <a href='./index.php'>Course Schedule</a>
    </div>
  </body>
</html>


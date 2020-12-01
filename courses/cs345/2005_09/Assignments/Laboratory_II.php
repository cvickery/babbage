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

  <title>CS-345 Laboratory II</title>

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
  <h1>CS-345/780 Laboratory II</h1>
</div>

<div id="content">
  <h2>Introduction</h2>
  <div class="whitebox">

    <p>This lab is an exercise in some of the parallelism and block
    storage features of Handel-C.  You will also look at the hardware
    complexity associated with division.</p>

  </div>

  <h2>Description</h2>
  <div class="whitebox">

    <h3>Division Experiment</h3>

    <p>Create a new workspace named Laboratory II, and create a new
    project there named "Division Experiment" (or something similar).
    Be sure your Editor is still set to substitute spaces for tabs,
    and the font for the Output Window is Monaco.  (These settings
    might have gotten lost in the process of fixing up your directory
    settings.)</p>

    <p>Write a Handel-C program that computes the average of 4
    sixteen-bit signed integers and display the low-order 8 bits of
    the answer on the two hexadecimal displays.  Make sure the project
    works using the Debug configuration, then do the division using
    both the '/' and '&gt;&gt;' operators, and observe the quantity of
    FPGA resources used when you build the project using the EDIF
    configuration. <strong>Note:</strong> If you compute the average
    using all constants or variables whose variables never change in
    the program, the compiler will calculate the result itself and you
    will not see any hardware resourses being used for the
    calculation in the project. You need to deal with this in your
    program's design. </p>

    <p>Now change the code so it computes the average of 5 numbers
    instead of 4, and observe the FPGA resources used.</p>

    <h3>Moving Average </h3>

    <p>Create a second project in your Laboratory II workspace named
    &quot;Moving Average&quot; (or something similar). This assignment
    is to have the program compute a moving average of an endless
    sequence of input values, with a new average computed each time
    the user presses one of the buttons on the side of the RC200E. To
    make things &ldquo;interesting&rdquo; (or &ldquo;dumb&rdquo;,
    depending on your point of view), use a dual-ported memory to hold
    the data values being averaged. Read a sequence of values from the
    rom port for computing the averages, and write the averages back
    into the wom port. Have the read and write addresses independently
    cycle through all the memory addresses, starting at zero. Make the
    memory hold 16 8-bit signed values, and initialize all sixteen
    values with a mix of positive and negative numbers.</p>

    <p>First develop this code without output to the seven segment
    displays and without the use of a pushbutton.  On each clock
    cycle, compute a new moving average value, store it in the wom,
    push the next rom value into the pipeline, and increment the wom
    and rom addresses.  Single step through the simulation, observing
    the contents of the pipeline registers, the memory, the average,
    and the addresses.  Verify that the program is manipulating the
    values correctly, and record the first 32 averages (in hex) on a
    piece of paper.</p>

    <p>Now add the code to display the current average using the seven
    segment displays. To help keep track of what's happening, code the
    program so the left and right decimal points take turns being on
    on successive cycles.  Have the program wait for button presses
    using the following logic: Have the endless loop you already coded
    now start with a read operation from a channel. Add a second main
    with its own endless loop. Whenever this loop finds that the
    button has been pressed, it writes a value to the channel.  Use a
    one-bit wide channel; it's being used only for synchronization, so
    it doesn't matter what value is actually written to (or read from)
    the channel. Make sure your design calculates exactly one average
    per button press! (Google &quot;switch debounce&quot; to see what
    I'm talking about.)</p>

    <p>Simulate and download the program and verify that for both
    configurations the first 32 values displayed agree with the values
    you recorded in the first simulation.</p>

  </div>

  <h2>Submitting the Assignment </h2>
  <div class="whitebox">
    <p>Write a report for the assignment:</p>
    <ol>

      <li>To practice writing the Method section of a research report,
      write a description of the procedures you followed for the two
      projects. Write this in the first person, and include just
      enough information so a reader who is already familiar with
      Handel-C and the RC200E would be able to do the same things you
      did and expect to get the same results you did.  But don't tell
      what your results were, just the procedures you followed.  It's
      okay to include a description of any problems you had to solve
      and how you solved them. Tiny snippits of code are okay to
      include if you think they would help, but describe algorithms
      verbally in general.</li>

      <li>Did the division experiment successfully show the overhead
      associated with division, and the difference between dividing by
      a power of two compared to a value that is not a power of two?
      Summarize your findings if it did, or suggest a better design
      for the experiment if it didn't.</li>

      <li>What did you learn from the second project? </li>

    </ol>

    <p>Instead of emailing the assignment to me, just email me the
    pathname to your Laboratory II workspace directory. Leave your
    report in the top level of the directory, and I'll use
    Administrator privileges to get at everything.</p>

    <h3>Due Date: Midnight September 27.</h3>

</div>


</div>

<div id="footer">
  <hr />
  <p class="links"> <a href="/">Vickery Home</a>&nbsp;
    <a href="/courses/cs345">CS-345 Home</a>&nbsp;
    <a href="/courses/cs345/2005_09">Fall 2005</a>&nbsp;
    <a href=".">Assignments</a>&nbsp;
    <a href="http://validator.w3.org/check?uri=referer">
    XHTML</a>&nbsp;
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
    CSS</a></p>
  <p>
    <em>Last updated
    <?php echo gmdate("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME'])); ?></em>
  </p>
</div>
</body></html>

<?php
  if (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml"))
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
<head><title>CS-343 Assignment 4</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="Assignment_01.php" />
<link rel="Prev" href="Assignment_03.php" />
<link rel="Next" href="Assignment_05.php" />
<link rel="stylesheet" type="text/css" href="style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style-screen.css" />
<link rel="stylesheet" type="text/css" media="print" href="style-print.css" />
</head>
<body>
<h1>CS-343 Assignment 4</h1>
<div class="whitebox">
  <h3>This assignment is due in class on March 2</h3>

  <ol>
  
  <li>Use CircuitMaker to implement a four-bit version of the ALU
  developed in Appendix B and and in class.  Use a hex key to input
  the function code, two hex keys to enter the values of A and B,a hex
  display to show the result.  Use logic indicators to show the values
  of Carry, Overflow, and Zero.</li>

  <li>(Bonus) What function code produces A NOR B?</li>

  </ol> 
  
  <h3>How to Submit</h3>
  
  <p>You may submit this assignment electronically by sending me a
  copy of your .ckt file as an attachment to an email message.  Be
  sure to put "CS-343 Assignment 4" in the Subject line of your
  message.  Send it to vickery <strong>at</strong> babbage.cs.qc.edu. 
  Alternatively, you may give me a printed copy of your circuit,
  preferably in color and showing an "interesting" set of input
  values.</p>

  <h3>CircuitMaker Help For This Assignment</h3>

  <p>The student edition of CircuitMaker places a limit of 50 devices
  on your design.  You could not complete this assignment within this
  limit if you used just AND, OR, and Invert gates.  However, you can
  implement all four full adders and all four 4x1 multiplexors using
  just three devices!  The trick is that CircuitMaker provides you
  with some packaged devices that implement common functions like
  adders and multiplexers.  For example device number 74LS283 contains
  four full adders with the internal carries already connected
  appropriately.</p>
  
  <p>Another useful device for this assignment is device number
  74LS153, which includes two 4x1 multiplexors in a single package;
  with two of them you get all four multiplexors for your design.  The
  control inputs to these multiplexors are labeled S0 and S1, which
  should be connected to pins 1 and 2 of the hex key used for entering
  the 4-bit function code.  The inputs are labeled I0a through I3a for
  one multiplexer in a package and I0b through I3b for the other
  multiplexer; the outputs are Ya and Yb.  The two pins marked Ea and
  Eb with bubbles next to them are actually inputs that are used to
  "Enable" the outputs.  We'll talk about what that means when we
  cover tristate gates in the course.  For now it's enough to know
  that these inputs should all be connected to ground (logic 0) so
  that the outputs will be "enabled".</p>

  <p>The only problem with this set up is that by using the 74LS283
  you won't have access to the internal carries of the adder, which is
  how we implemented the overflow detection logic in class.  Instead,
  you will have to compare the signs of the two operands with the sign
  of the output.  If both inputs are positive and the result is
  negative or if both inputs are negative and the result is positive,
  overflow is true.  You'll need to use inverters, AND gates, and an
  OR gate to compute the value of the expression (A4*B4S4') +
  (A4'*B4'*S4).  [The 74LS283 pins are numbered 1-4 instead of 0-3 as
  we have been doing in class.)</p>
  
  <p>We noted that pins 1 and 2 of the function hex key are used for
  F0 and F1 of the ALU function code.  Again, the pin numbers start at
  1 instead of 0 for these devices.  Use pin 3 for Bnegate and pin 4
  for Ainvert to be consistent with the book.  Only the following five
  functions need to be tested carefully for this assignment:</p>
  
  <table class="datatable">
    <tr class="datatable">
      <th scope="col">Hex Function</th>
      <th scope="col">Binary</th>
      <th scope="col">Function</th>
    </tr>
    <tr>
      <td>0</td><td>0000</td><td>A <em>AND</em> B</td>
    </tr>
    <tr>
      <td>1</td><td>0001</td><td>A <em>OR</em> B</td>
    </tr>
    <tr>
      <td>2</td><td>0010</td><td>A + B</td>
    </tr>
    <tr>
      <td>6</td><td>0110</td><td>A - B</td>
    </tr>
    <tr>
      <td>7</td><td>0111</td><td>A &lt; B (<em>SLT</em>)</td>
    </tr>
    <tr>
      <td>?</td><td>????</td><td>A <em>NOR</em> B</td>
    </tr>
  </table>

  <p>The bonus question for the assignment is to figure out what
  values the question marks represent.</p>

</div>

<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

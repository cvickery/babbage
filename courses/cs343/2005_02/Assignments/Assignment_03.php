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
<head><title>CS-343 Assignment 3</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="Assignment_01.php" />
<link rel="Prev" href="Assignment_02.php" />
<link rel="Next" href="Assignment_04.php" />
<link rel="stylesheet" type="text/css" href="style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style-screen.css" />
<link rel="stylesheet" type="text/css" media="print" href="style-print.css" />
</head>
<body>
<h1>CS-343 Assignment 3</h1>
<div class="whitebox">
  <h3>This assignment is due in class on February 23</h3>
  
  <p>Design and implement a traffic light controller, as begun in
  class on February 14.  The traffic light operates at the
  intersection of an east-west (EW) highway and a lightly used
  north-south(NS) road.  There is a sensor embedded in the NS road
  that tell when a car is waiting at the intersection from either
  direction.  So long as the sensor is not activated, the light shows
  green for the EW direction and red for the NS direction.  When a car
  activates the sensor, the EW light changes from green to yellow to
  red, and back to green.  The NS light goes green when the EW light
  goes red, and then goes to yellow to red, and the EW light turns
  green again once the NS light has returned to red.  Yellow lights
  last for 10" and red lights last for 30".</p>

  <p>In class, we based the design on a 0.1 Hz clock, and came up with
  a design that required 8 states.  The state table had sixteen rows
  consisting of the 8 states combined with the two possible values of
  the sensor.  There were three internal outputs to control three
  state flip-flops, and six external outputs to control the six pairs
  of signal lamps on the traffic light.  We named the external outputs
  EWG, EWY, and EWR for "east-west green," "east-west yellow," and
  "east-west red" respectively.  Likewise, we used the names NSG, etc.
  for the north-south light colors.</p>
  
  <p>For this assignment, you are to draw the complete state diagram
  and state table, which we did in class.  You are then to minimize
  all nine output functions, and to implement the controller using
  CircuitMaker.  Use a digital switch for the sensor input, a hex
  display to show the state flip-flop values, and use two of the
  traffic light displays for the traffic lights.  (You have to browse
  through the digital instruments to find the traffic lights.)  You
  will want to slow down the simulation speed to be able to watch the
  state transitions, but your circuit doesn't have to work in real
  time; you would grow old debugging it!  (About ten times real-time
  speed would be good.)  Draw your state diagram, write out your state
  table, show your minimized functions, and print out your circuit
  diagram with a timing diagram that shows the clock, sensor, and the
  six lights.</p>

  <p>You should be able to minimize the functions for this assignment
  by hand, but you can check your work by using a <a
  href="http://babbage.cs.qc.edu/courses/Minimize/">program that I
  wrote</a>.  The web page with the link to that program also has some
  tutorial information on minimization, and a link to a very nice
  interactive minimization program at a web site in Germany.  I plan
  to update my program "soon" to give it a graphical user interface:
  stay tuned.</p>

  <h3>Optional - Extra Credit</h3>
  
  <fieldset>
  <legend>Basic Extra</legend>

  <p>The controller we designed has some limitations that I imposed to
  keep the state table small enough that we could use Karnaugh Maps to
  minimize the output functions.  For extra credit (after you complete
  the basic requirement), introduce an extra pair of "safety" states
  when the lights are red in both directions for two seconds before
  switching the previously red light to green.  Because this design
  requires a state table with more than 16 rows, you won't be able to
  use Karnaugh Maps to minimize the output functions.  However you can
  use my minimization program to minimize the functions for you
  algebraically.</p>
  
  </fieldset>

  <fieldset>
  <legend>Extra Extra</legend>
  
  <p>There are lots of other variations you could add to this
  assignment to make it more "interesting" (and for more extra
  credit).  You could add an EW sensor, you could implement a delayed
  green design for traffic in one direction, or add left turn lights,
  etc.  Look at the traffic lights in NYC, and implement any pattern
  you find interesting!  If you do Extra Extra credit work, be sure to
  include a written description of your design in addition to the
  state table, state diagram, minimized functions, and CircuitMaker
  simulation.</p>

  </fieldset>

  <p><strong>Deadline</strong></p>
  
  <p>You may submit <em>Basic Extra</em> and/or <em>Extra Extra</em>
  assignments as late as March 2 (one week after the required
  assignment is due).</p>

</div>

<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

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
<head><title>CS-343 Assignment 2</title>
<style type="text/css">
  h1 { text-align: center; }
  p { margin-left: 1em; margin-right: 2em; }
</style>
<style type="text/css" media="screen">
  html, body { font-family: sans-serif; background: #ffffcc; }
  div.whitebox
  {
    background:white;
    border:solid 1px blue;
    margin:1em;
    padding:1em;
  }
  img { border: solid 3px black; background: white; padding:5px; }
</style>
</head>
<body>
<h1>CS-343 Assignment 2</h1>

<div class="whitebox">
  <p>Here is a logic circuit designed using CircuitMaker that is
  supposed to be a 4-bit counter that cycles through the values 0x0
  through 0xF on successive clock pulses.  There are four flip-flops
  labeled A<sub>3</sub> .. A<sub>0</sub>, a clock generator (on the
  left), and a hexadecimal display that shows the state of all four
  flip-flops.  But it only counts from 0 to 3 before going back to 0
  again.  Add more AND and OR gates to make it count all the way up to
  0xF before going back to zero.</p>
  
  <p><b>Note:</b>  You will have to reconstruct the entire circuit
  since I'm providing only a drawing of the circuit, not the actual
  CircuitMaker file.</p>

  <p>Complete the circuit and test it using CircuitMaker to be sure it
  works correctly.  Add five "testpoints" to the circuit, one for the
  clock and one for each flip-flop output. Name each testpoint
  appropriately and turn on the CircuitMaker trace window.  Single
  step the circuit to generate a trace that shows the circuit going
  through at least 16 clock cycles, then print both the circuit
  diagram and the trace window to hand in on the due date.</p>

</div>

<table style="margin:auto"><tr><td>
  <img src="./4-bit_up_counter.png" alt="Circuit Diagram" />
</td></tr></table>

<hr />
</body></html>

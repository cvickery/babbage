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
<head><title>CS-343 Assignment 5 Solutions</title>
<style type="text/css">
  html, body { background: #ffffcc; }
  h1   { text-align: center;  }
  p { margin-left: 1em; margin-right: 2em; }
  p.center {text-align:center;font-size:1.1em;}
  p.indent {margin-left: 2em; margin-right: 4em; }
  p.footer {text-align: center; font-size: smaller; }
  div.whitebox {background:white;border:solid 1px blue; margin:1em;
  padding:1em;}
  a       {padding-left:0.5em; padding-right:0.5em;}
  a:hover {text-decoration:none;background:#ffcccc;}
</style>
<style type="text/css" media="screen">
  body { font-family: sans-serif }
</style>
</head>
<body>
<h1>CS-343 Assignment 5 Solutions</h1>

<h2>Solutions</h2>

  <p>These are the answers provided by the authors of the textbook. 
  I've looked them over and think they are right, but let me know if
  you see any typos or cut-and-paste errors.  (I had to fix the
  multiplication signs and the exponentiation, but there might be
  others.)</p>
  
  <p class="center">And I encourage you to use the Discussion Board</a> as
  you study the answers in preparation for the next exam!</p>

<div class="whitebox">

    <p><strong>4.1</strong> For P1, M2 is 4/3 (2 sec/1.5 sec) times as
    fast as M1. For P2, M1 is 2 times as fast (10 sec/5 sec) as
    M2.</p>

    <p><strong>4.2</strong> We know the number of instructions and the
    total time to execute the program. The execution rate for each
    machine is simply the ratio of the two values. Thus, the
    instructions per second for P1 on M1 is (5 &#215; 10<sup>9</sup>
    instructions/2 seconds) = 2.5 &#215; 10<sup>9</sup> IPS, and the
    instructions for P1 on M2 is (6 &#215; 10<sup>9</sup>
    instructions/1.5 seconds) = 4 &#215; 10<sup>9</sup> IPS.</p>

    <p><strong>4.3</strong> M2 runs 4/3 as fast as M1, but it costs
    8/5 as much. As 8/5 is more than 4/3, M1 has the better value.</p>

    <p><strong>4.6</strong> Running P1 1600 times on M1 and M2
    requires 3200 and 2400 seconds respectively. This leaves 400
    seconds left for M1 and 1200 seconds left for M2. In that time M1
    can run (400 seconds/(5 seconds/iteration)) = 80 iterations of P2.
    M2 can run (1200 seconds/(10 seconds/iteration)) = 120 iterations.
    Thus M2 performs better on this workload. Looking at
    cost-effectiveness, we see it costs ($500/(80 iterations/hour)) =
    $6.25 per (iteration/hour) for M1, while it costs ($800/(120
    iterations/hour)) = $6.67 per (iteration/hour) for M2. Thus M1 is
    more cost-effective.</p>

    <p><strong>4.7</strong> <ol style="list-style-type: lower-alpha">

       <li>Time = (Seconds/cycle) &#215; (Cycles/instruction) &#215;
       (Number of instructions) Therefore the expected CPU time is (1
       second/5 &#215; 10<sup>9</sup> cycles) &#215; (0.8
       cycles/instruction) &#215; (7.5 &#215; 10<sup>9</sup>
       instructions) = 1.2 seconds</li>

       <li>P received 1.2 seconds/3 seconds or 40% of the total CPU
       time.</li>

      </ol></p>

    <p><strong>4.8</strong> The ideal instruction sequence for P1 is
    one composed entirely of instructions from class A (which have CPI
    of 1). So M1's peak performance is (4 &#215; 10<sup>9</sup>
    cycles/second)/(1 cycle/instruction) = 4000 MIPS. Similarly, the
    ideal sequence for M2 contains only instructions from A, B, and C
    (which all have a CPI of 2). So M2's peak performance is (6 &#215;
    10<sup>9</sup> cycles/second)/ (2 cycles/instruction) = 3000
    MIPS.</p>

    <p><strong>4.9</strong> The average CPI of P1 is (1 &#215; 2 + 2 +
    3 + 4 + 3)/6 = 7/3. The average CPI of P2 is (2 &#215; 2 + 2 + 2 +
    4 + 4)/6 = 8/3. P2 then is ((6 &#215; 10<sup>9</sup>
    cycles/second)/(8/3 cycles/instruction))/((4 &#215; 10<sup>9</sup>
    cycles/second)/(7/3 cycles/instruction)) = 21/16 times faster than
    P1.</p>

    <p><strong>4.10</strong> Using C1, the average CPI for I1 is (.4
    &#215; 2 + .4 &#215; 3 + .2 &#215; 5) = 3, and the average CPI for
    I2 is (.4 &#215; 1 + .2 &#215; 2 + .4 &#215; 2) = 1.6. Thus, with
    C1, I1 is ((6 &#215; 10<sup>9</sup> cycles/second)/(3
    cycles/instruction))/((3 &#215; 10<sup>9</sup> cycles/second)/(1.6
    cycles/instruction)) = 16/15 times as fast as I2.</p>

    <p>Using C2, the average CPI for I2 is (.4 &#215; 2 + .2 &#215; 3
    + .4 &#215; 5) = 3.4, and the average CPI for I2 is (.4 &#215; 1 +
    .4 &#215; 2 + .2 &#215; 2) = 1.6. So with C2, I2 is faster than I1
    by factor of ((3 &#215; 10<sup>9</sup> cycles/second)/(1.6
    cycles/instruction))/((6 &#215; 10<sup>9</sup> cycles/second)/(3.4
    cycles/instruction)) = 17/16.</p>

    <p>For the rest of the questions, it will be necessary to have the
    CPIs of I1 and I2 on programs compiled by C3. For I1, C3 produces
    programs with CPI (.6 &#215; 2 + .15 &#215; 3 + .25 &#215; 5) =
    2.9. I2 has CPI (.6 &#215; 1 + .15 &#215; 2 + .25 &#215; 2) =
    1.4.</p>

    <p>The best compiler for each machine is the one which produces
    programs with the lowest average CPI. Thus, if you purchased
    either I1 or I2, you would use C3.</p>

    <p>Then performance of I1 in comparison to I2 using their optimal
    compiler (C3) is ((6 &#215; 10<sup>9</sup> cycles/second)/(2.9
    cycles/instruction))/((3 &#215; 10<sup>9</sup> cycles/second)/(1.4
    cycles/instruction)) = 28/29. Thus, I2 has better performance and
    is the one you should purchase.</p>

    <p><strong>4.11</strong> Loosely speaking, Amdahl's Law says that
    the speedup you can achieve is limited by how much time is spent
    doing whatever it is that you are speeding up.  The question deals
    with an optimization that yields a 10% speedup and asks you,
    basically, what portion of the workload was being done by the
    multiply instructions.  The solution is:</p>

    <p class="indent">Program P running on machine M takes
    (10<sup>9</sup>&nbsp;cycles/second) &#215; 10 seconds =
    10<sup>10</sup> cycles. P' takes
    (10<sup>9</sup>&nbsp;cycles/second) &#215; 9 seconds = 9 &#215;
    10<sup>9</sup> cycles. This leaves 10<sup>9</sup> fewer cycles
    after the optimization. Every time we replace a mult with two
    adds, it takes 4&nbsp;-&nbsp;2&nbsp;&#215;&nbsp;1&nbsp;=&nbsp;2
    cycles less per replacement. Thus, there must have been
    10<sup>9</sup> cycles /(2 cycles/replacement) = 5 &#215;
    10<sup>8</sup> replacements to make P into P'.</p>

    <p>And we could therefore deduce that the multiplies took
    (4&nbsp;&#215;&nbsp;5&nbsp;)&#215;&nbsp;10<sup>8</sup> of the
    original 10<sup>10</sup> cycles, which is
    2&nbsp;&#215;&nbsp;10<sup>9</sup> cycles, or 20% of the original
    time spent by the program.  Which is another way of saying that
    that a 50% speedup applied to 20% of the execution time gives an
    overall speedup of 10%.</p>

    <p><strong>Dual-Core</strong> has to do with putting two
    processing units on a single chip.  Various definitions deal with
    just what a "processing unit" is.  Does it include two sets of
    registers? Two cache memory systems (to be covered later in the
    course)?  No matter what definition you came up with, the idea is
    that a dual-core processor has the potential to execute two
    instructions in one clock cycle.  In the ideal case, the CPI would
    be reduced from a minimum of 1 to a minimum of 0.5, leading in a
    100% speedup.  If only reality worked that way.</p>

</div>

<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

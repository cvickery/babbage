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

  <title>CS-343 Assignment 3</title>

  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="/courses/css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="/courses/css/style-screen.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="print"
        href="/courses/css/style-print.css"
  />

  <style type="text/css" media="all">

  table {
    border:           1px solid green;
    text-align:       center;
    width:            15em;
    }

  th {
    background-color: #ccc;
    color:            #000;
    vertical-align:   top;
    }

  fieldset {
    width:            60%;
    }

  .whitebox {
    margin:           1em 0 1em 2em;
    }

  </style>
</head>

<body>

  <div id="header">
    <h1>CS-343 Assignment 3</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">
      <p>This assignment is to make the four LEDs on the UP3 blink!</p>
    </div>

    <h2>Reading Material</h2>
    <div class="whitebox">
      <ul>

        <li>Sections 7, 8, 10, and 11 of <a
        href="../../COAD3e/Appendix_B.pdf">Appendix B</a> of the textbook.</li>

      </ul>
    </div>

    <h2>Requirements</h2>
    <div class="whitebox">

    <p>Your assignment is to build a finite state machine that simply cycles
    through sixteen states at a rate of 1 Hz.  You are to encode the sixteen
    states as 4-bit numbers using four flip-flops.  Connect the outputs of
    the flip-flops to the four LEDs on the UP3 so that they will show a
    sequence of binary numbers 0000, 0001, 0010, 0011, ... 1111, and then
    back to 0000 again.</p>

    </div>

    <h2>First Stage: Use a push button to change states.</h2>
    <div class="whitebox">

    <ol>

      <li>First you need to decide what kind of flip-flops to use for this
      project.  The textbook goes through the development of a D flip-flop
      with a falling-edge trigger (Figure B.8.4).  Quartus provides several
      types of flip-flops under the Primitives-&gt;Storage category.  The
      one named <span class="functionName">dff</span> is a D flip-flop with
      a rising-edge trigger, which is essentially the same as Figure B.8.4,
      but with an inverted clock input compared to the figure.  The Quartus
      flip-flop also has two inputs name PRN and CLRN, which are
      asynchronous inputs that can be used to turn the flip-flop on (PRN,
      which stands for &ldquo;PReset, Negated&rdquo;) or off (CLRN, which
      stands for &ldquo;CLeaR, Negated&rdquo;) without the need of any clock
      signal.  You&rsquo;ll need to connect all the CLRN and PRN flip-flop
      inputs to Vcc (Logic 1) to disable their effects on your flip-flops.

      <br />Quartus also provide J-K flip-flops and T flip-flops.  If you
      are interested in a more efficient way to do the assignment, you could
      find out how T flip-flops work (the <span
      class="functionName">tff</span> storage device in Quartus);
      they&rsquo;re great for counter circuits like this one.</li>

      <li>Create a <span class="filename">.bdf </span>file named <span
      class="filename">Counter </span>and put in four D flip-flops with
      their Q outputs connected to the four LEDs on the UP3.  Connect an
      input pin name &ldquo;Clock&rdquo; to the clock inputs of all four
      flip-flops (the ones with the triangles next to them).  For now,
      connect <span class="functionName">Clock</span> to one of the push
      buttons.

        <div class="whitebox">

          <p>For this assignment, you may skip the full state-machine design
          and simply wire the flip-flops as described below.  But it will
          help follow the description if you make a list of the sixteen
          possible states and what state the circuit goes into after a clock
          pulse. I&rsquo;ll refer to the rightmost flip-flop as 1, the next
          one as 2, the next one as 4, and the leftmost one as 8
          (corresponding to FPGA pins 53, 54, 55, and 56 respectively) in
          this table:</p>

          <table>
            <tr>
              <th scope="col">Present State<br />8421</th>
              <th scope="col">Next State<br />8421</th>
            </tr>
            <tr>
              <td>0000</td><td>0001</td>
            </tr>
            <tr>
              <td>0001</td><td>0010</td>
            </tr>
            <tr>
              <td>0010</td><td>0011</td>
            </tr>
            <tr>
              <td>0011</td><td>0100</td>
            </tr>
            <tr>
              <td>0100</td><td>0101</td>
            </tr>
            <tr>
              <td>0101</td><td>0110</td>
            </tr>
            <tr>
              <td>0110</td><td>0111</td>
            </tr>
            <tr>
              <td>0111</td><td>1000</td>
            </tr>
            <tr>
              <td>1000</td><td>1001</td>
            </tr>
            <tr>
              <td>1001</td><td>1010</td>
            </tr>
            <tr>
              <td>1010</td><td>1011</td>
            </tr>
            <tr>
              <td>1011</td><td>1100</td>
            </tr>
            <tr>
              <td>1100</td><td>1101</td>
            </tr>
            <tr>
              <td>1101</td><td>1110</td>
            </tr>
            <tr>
              <td>1110</td><td>1111</td>
            </tr>
            <tr>
              <td>1111</td><td>0000</td>
            </tr>
          </table>

          <p>The heart of this design is to control whether flip-flops
          change state or not when they receive a clock pulse.  With a D
          flip-flop we can do this by feeding the flip-flop&rsquo;s Q output
          into its D input when we want it to stay in the same state, and by
          feeding the complement (not) of the Q output into its D input when
          we want it to &ldquo;toggle&rdquo; (change state, either from one
          to zero or <i>vice-versa</i>).  If you think about the way a
          two-input XOR truth table works, you can see a way to set this up:
          connect the output of an XOR gate to the D input of a flip-flop,
          connect the Q output of the flip-flop to one input of the XOR
          gate, and the second input to the XOR gate becomes your toggle
          control.  If it&rsquo;s zero, the output of the XOR is the same as
          Q and the flip-flop doesn&rsquo;t change, but if it&rsquo;s one,
          the output is the opposite of Q and the flip-flop toggles.</p>

          <ul>

            <li>Connect XOR gates to the D inputs of all four flip-flops,
            and connect the Q output of each flip-flop to one input of its
            XOR.</li>


            <li>The rightmost flip-flop (flip-flop 1) is to toggle on every
            clock pulse, so connect its toggle control to logic 1
            (Vcc).</li>

            <li>Flip-flop 2 toggles only when flip-flop 1 is in its one
            state, so connect its toggle control to the Q output of
            flip-flop 1.</li>

            <li>Flip-flop 4 toggles only when both flip-flops 1 and 2 are in
            their one states, so connect its toggle control to the output of
            an AND gate that has the Q outputs of flip-flops 1 and 2 as its
            inputs.</li>

            <li>The logic for flip-flop 8 is left as an exercise!</li>

          </ul>

        </div>
      </li>


      <li><strong>Test this part of the design.</strong>  Every time you
      press and release the button you are generating one clock pulse, and
      the LEDs should make one step through the sixteen states in binary
      counting order.  <strong>But it won&rsquo;t appear to work
      right!</strong>  The buttons (and the slide switches too) are
      mechanical devices that work by moving a piece of metal so that it
      contacts another piece of metal (closing a circuit) or not (opening
      the circuit).  But the moving piece of metal is spring-loaded so that
      it &ldquo;snaps&rdquo; open and closed, and it physcially bounces open
      and closed for a few milliseconds before coming to rest.  The result
      is that every time you press or release the button your will get
      several pulses, and your counter will count very erratically.  As long
      as the LEDs turn on and off in various ways as you press and release
      the button, you may assume the circuit is working okay.  But if the
      LEDs don&rsquo;t turn on or off at all, there is a problem that you
      need to fix before proceeding.</li>

    </ol>

    </div>

    <h2>Second Stage: Use a real clock</h2>
    <div class="whitebox">

      <p>The UP3 provides several clock-generator circuits that produce
      streams of clock pulses at various frequencies.  The one we will use
      operates at 48 MHz.  It comes into the FPGA on pin number 29.  You can
      start by changing the pin assignment for your Clock input and testing
      your design.  But your four flip-flops will now go through their
      complete 16 state cycle 3 million times a second and the LEDs will
      just look like a dim blur.  (Each flip-flop is on exactly half the
      time, so they will all appear half as bright as when they are fully
      on.)</p>

      <p>You need to divide the 48 MHz clock signal on pin 29 down to a 1 Hz
      clock that you can use as the clock input to your flip-flops.  You
      need a <span class="functionName">divide-by-n</span> circuit that
      generates one pulse at its output for every n pulses at its input.  In
      this case you need to divide the input clock by 48,000,000.</p>


      <p>To build a <span class="functionName">divide-by-n counter</span>,
      you connect <em>ceil(log<sub>2</sub>(n))</em> flip-flops as a binary
      counter that resets whenever the count reaches <em>n</em>.  Or,
      equivalently, a counter that decrements from <em>n</em> to zero and then gets
      reset to n.  (Either design is okay; I&rsquo;ll use the latter, but
      you can do it the other way if you want to.)  The
      leftmost flip-flop will toggle twice for every <em>n</em> input
      pulses, and the Q output of that leftmost flip-flop will be the output
      of the circuit.</p>

      <p>Hmmm ... <span
      class="functionName">log<sub>2</sub>(48000000)</span> is 25.51653,
      which means we&rsquo;ll need a binary counter with <span
      class="functionName">ceil(25.5)</span>  flip-flops: 26 of them!</p>

      <p>It&rsquo;s your choice: you can build a circuit with 26 flip-flops
      wired as a binary counter that counts backwards and with a circuit
      that constantly compares the values of the those flip-flops to all
      zeros and resets them to 10110111000110110000000000<sub>2</sub> when
      zero is detected, or you can create a new Verilog file named <span
      class="fileName">divide_by_48M.v </span>and type the following code
      into it, which does the same thing.  (In Quartus, use File-&gt;New and
      select Verilog HDL File instead of Block Diagram/Schematic File.)</p>

      <div class="codeBlock">
        module divide_by_48M(dividedOut, clockIn);
        output      dividedOut;
        input       clockIn;
        reg [25:0]  counter;

        assign dividedOut = counter[25];

        always @(posedge clockIn)
        begin
          counter = counter - 26'd01;
          if (counter == 0)
          begin
            counter = 26'd48000000;
          end
        end
        endmodule
      </div>

      <fieldset>
      <legend>Description</legend>

        <p>The <span class="functionName">assign</span> statement says that
        the output of the module (<span
        class="functionName">dividedOut</span>) is to be the value of the
        leftmost bit of the 26-bit register named <span
        class="functionName">counter</span>.</p>

        <p>The <span class="functionName">always</span> statement says that
        the following block of code is to execute whenever there is a
        positive edge of the <span class="functionName">clockIn</span>
        input.</p>

        <p>The <span class="functionName">26'd</span> in front of the
        numbers says that they are 26-bit decimal values.</p>

        <p>You can see the actual implementation of this module by running
        Tools-&gt;RTL Viewer.  You&rsquo;ll first see your entire schematic,
        and you can double click the <span
        class="functionName">divide_by_48M</span> symbol to see how it was
        actually implemented.  Here is a <a href="divide_by_48M.pdf">link to
        what you will see</a> (PDF): it generates a 26-bit adder that adds
        minus one to the value of counter, and loads either that or the
        constant 26'd48000000 into the counter depending on whether the
        result is zero or not.</p>

      </fieldset>

      <p>Whether you decided to use a <span class="fileName">.v </span> or a
      <span class="fileName">.bdf </span> design for <span
      class="functionName">divide_by_48M</span>, save it as a symbol using
      File-&gt;Create/Update-&gt;Create Symbol Files for Current File. 
      (<em>If you actually did decide to build the schematic, I need to have
      a talk with you!</em>)</p>

      <p>Insert an instance of this symbol into your <span
      class="fileName">Counter.bdf </span> circuit, with the Clock input of
      your schematic connected to <span class="functionName">clockIn</span>
      and <span class="functionName">dividedOut</span> connected to the
      clock inputs of the four flip-flops.</p>

      <p>Test your circuit and make sure it takes exactly 16 seconds for the
      LEDs to go through one complete cycle of the binary numbers 0000,
      0001, ... 1111, 0000, ... .</p>

    </div>

  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="../../">CS-343 Home</a>&nbsp;-&nbsp;
      <a href="../">CS-343 Spring 2006</a>&nbsp;-&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME']));
      ?>.</em>
    </p>
  </div>
</body>
</html>

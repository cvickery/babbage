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

  <title>CS-343 Assignment 4</title>

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
    vertical-align:   bottom;
    border:           1px solid black;
    padding:          0.5em;
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
    <h1>CS-343 Assignments 4a and 4b</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">
      <p>This assignment is an exercise in Finite State Machine (FSM)
      design.  It builds on the previous assignment, which was to implement
      a simple FSM that acted as a binary counter.  For this assignment, you
      will add three external inputs to control the counter. <em>Up</em>
      will be a pushbutton which, when held, will cause the counter to count
      upward at a 1Hz rate, just like the previous assignment.  The second
      input will be another pushbutton called <em>Dn</em>.  When this button
      is pressed the counter is to count backwards (&ldquo;down&rdquo;).  If
      neither button is pressed or if both buttons are pressed at the same
      time, the counter is to do nothing, just stay in whatever state it was
      last in.  The third external input will be another button called
      <em>Rst</em> (&ldquo;reset&rdquo;).  When this button is pressed,
      regardless of whether the other buttons are pressed at the same time
      or not, the counter is to reset; that is, all four flip-flops are to
      get the value 0000<sub>2</sub> on the next clock pulse.</p>
    </div>

    <h2>Requirements</h2> <div class="whitebox"> <p>This assignment consists
    of both written and practical components.  For the written component,
    you are to draw a complete state diagram and state table for a
    ldquo;two-bit up-down counter with reset&rdquo; FSM. Because there are
    only two state bits along with the three external inputs, your state
    diagram will have only four states (circles) and your state table will
    haveldquo;only&rdquo; 2<sup>(3+2)</sup>=32 rows.  Please order the
    columns in your state table as follows to make it easier for me to
    check.  I&rsquo;ve set up the whole table for you and filled in the
    first few rows to get you started.  Note that the last sixteen rows can
    be collapsed into four rows because the values of <em>Up</em> and
    <em>Dn</em> are don&rsquo;t cares (X) when <em>Rst</em> is true.</p>

      <table>
        <tr>
          <th rowspan="2" scope="col">Rst</th>
          <th rowspan="2" scope="col">Up</th>
          <th rowspan="2" scope="col">Dn</th>
          <th colspan="2" scope="col">Present&nbsp;State</th>
          <th colspan="2" scope="col">Next&nbsp;State</th>
          <th rowspan="2" scope="col">LED_2</th>
          <th rowspan="2" scope="col">LED_1</th>
        </tr>
        <tr>
          <th scope="col">FF_2</th>
          <th scope="col">FF_1</th>
          <th scope="col">FF_2</th>
          <th scope="col">FF_1</th>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>1</td>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>

        <tr>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>0</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>0</td>
          <td>0</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>0</td>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>0</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>1</td>
          <td>X</td>
          <td>X</td>
          <td>0</td>
          <td>0</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>1</td>
          <td>X</td>
          <td>X</td>
          <td>0</td>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>1</td>
          <td>X</td>
          <td>X</td>
          <td>1</td>
          <td>0</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>1</td>
          <td>X</td>
          <td>X</td>
          <td>1</td>
          <td>1</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      
      <p>You are to submit this part of the assignment (&ldquo;Assignment
      4a&rdquo;) on a piece of paper in class on the due date.</p>
      
      <p>The second part of the assignment (&ldquo;Assignment 4b&rdquo;)is
      to implement the full 4-bit version of the &ldquo;up-down counter with
      reset&rdquo; FSM using the UP3 circuit board and Quartus development
      tools.  Create a new project directory and top-level design named
      UpDnCounter in your <span class="fileName">My Projects </span>
      directory, and implement the top-level design as a Block Diagram
      Schematic named <span class="fileName">UpDnCounter.bdf </span>.</p>

      <p>Implement the following truth table to convert three input pins
      into two intermediate values, which are named <em>F<sub>1</sub></em>
      and <em>F<sub>0</sub></em> in the truth table, but which don&rsquo;t
      actually need names in your schematic:</p>
      
      <table>
        <tr>
          <th scope="col">Rst</th>
          <th scope="col">Up</th>
          <th scope="col">Dn</th>
          <th scope="col">Function</th>
          <th scope="col">F<sub>1</sub></th>
          <th scope="col">F<sub>0</sub></th>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>0</td>
          <td>Do&nbsp;Nothing</td>
          <td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>0</td>
          <td>0</td>
          <td>1</td>
          <td>Down</td>
          <td>0</td>
          <td>1</td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>0</td>
          <td>Up</td>
          <td>1</td>
          <td>0</td>
        </tr>
        <tr>
          <td>0</td>
          <td>1</td>
          <td>1</td>
          <td>Do&nbsp;Nothing</td>
          <td>0</td>
          <td>0</td>
        </tr>
        <tr>
          <td>1</td>
          <td>X</td>
          <td>X</td>
          <td>Reset</td>
          <td>1</td>
          <td>1</td>
        </tr>
      </table>

      <p>Use four 4x1 multiplexers to supply the inputs to the four
      flip-flops, with the values of F<sub>1</sub> and F<sub>0</sub>
      connected to the two control inputs of all four multiplexers.  You may
      use the following Verilog code to generate a single symbol for a
      &ldquo;quad 4x1 mux&rdquo;. (This Verilog code could be simplified by
      using arrays, but I&rsquo;ve found that the resulting 4-bit busses for
      inputs and outputs are hard to work with in the schematic editor.) 
      Alternatively, you could select the device &ldquo;74153&rdquo; from
      the megafunctions-&gt;others-&gt;maxplus2 library, which gives a
      symbol with two 4x1 multiplexers, but you will need two of them and
      they have an extra input (GN) that you have to connect to ground. 
      <br />Here&rsquo;s the Verilog:</p>

      <pre class="codeBlock">
      //  File quad_4x1_mux.v

      //  Quad 4x1 Multiplexer
      //  Ugly code, but listing all the I/Os individually
      //  makes use in schematics easier.

      module q4x1_mux (y0, y1, y2, y3,
                       a0, a1, a2, a3,
                       b0, b1, b2, b3,
                       c0, c1, c2, c3,
                       d0, d1, d2, d3,
                       sel_0, sel_1);

      output  y0, y1, y2, y3;
      input   a0, a1, a2, a3,
              b0, b1, b2, b3,
              c0, c1, c2, c3,
              d0, d1, d2, d3;
      input   sel_0, sel_1;
      reg     y0, y1, y2, y3;

      //  Update outputs anytime any input changes.
      always @(a0 or a1 or a2 or a3 or 
               b0 or b1 or b2 or b3 or
               c0 or c1 or c2 or c3 or
               d0 or d1 or d2 or d3 or
               sel_0 or sel_1)
        case ({sel_1,sel_0})
          2'b00:  begin
                    y0 = a0;
                    y1 = a1;
                    y2 = a2;
                    y3 = a3;
                  end
          2'b01:  begin
                    y0 = b0;
                    y1 = b1;
                    y2 = b2;
                    y3 = b3;
                  end
          2'b10:  begin
                    y0 = c0;
                    y1 = c1;
                    y2 = c2;
                    y3 = c3;
                  end
          2'b11:  begin
                    y0 = d0;
                    y1 = d1;
                    y2 = d2;
                    y3 = d3;
                  end
          // In case selector bits aren&rsquo;t connected
          default:  begin
                    y0 = 1'bx;
                    y1 = 1'bx;
                    y2 = 1'bx;
                    y3 = 1'bx;
                  end
        endcase
      endmodule
      </pre>

      <p>Using the Verilog multiplexor, the <em>a</em> inputs are for
      F<sub>1</sub>F<sub>0</sub>=00, the <em>b</em> inputs are for
      F<sub>1</sub>F<sub>0</sub>=01, etc.</p>

      <p>Use the following pin assignments for this project:</p>
      
      <table>
        <tr>
          <th scope="row">Clock</th>
          <td>29</td>
        </tr>
        <tr>
          <th scope="row">Rst</th>
          <td>57</td>
        </tr>
        <tr>
          <th scope="row">Up</th>
          <td>49</td>
        </tr>
        <tr>
          <th scope="row">Dn</th>
          <td>48</td>
        </tr>
        <tr>
          <th scope="row">LEDs&nbsp;1,&nbsp;2,&nbsp;4,&nbsp;8</th>
          <td>53,&nbsp;54,&nbsp;55,&nbsp;56</td>
        </tr>
      </table>

      <p>Use the Divide By 48M circuit from the previous assignment so that
      state changes will happen at a 1Hz rate. Be sure to test your circuit
      carefully, and remember that you will have to hold buttons for up to a
      second before they will do anything because of the slow clock rate
      going into the FSM.</p>

      <h2>Due Date and Submission</h2>
      <div class="whitebox">

        <p><strong>The assignment is due March 14</strong>.  Bring
        Assignment 4a to class with you, and send me email when Assignment
        4b is ready for me to check.  Be sure your Quartus project has been
        saved to the server before you submit the assignment.  One way to do
        this is to be sure you can find it in your <span class="fileName">My
        Projects</span> directory when you log into your account from two
        different computers in the lab.  (Be sure you log out of the first
        computer before logging into the second one.)</p>

        <p><strong>NOTE:</strong> <em>The final date for submitting all
        assignments given so far in the course will be the date of the
        midterm exam.  You will not be able to receive any credit for them
        after that.</em></p>

      </div>
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

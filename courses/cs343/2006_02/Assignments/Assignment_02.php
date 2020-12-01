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

  <title>CS-343 Assignment 2</title>

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
  table { border: 1px solid green; }
  caption {
    font-size:    1.3em;
    padding:      0.5em;
    text-align:   left;
    }
  
  th {
    background-color: #ccc;
    color:            #000;
    vertical-align:   top;
    }
  </style>
</head>

<body>

  <div id="header">
    <h1>CS-343 Assignment 2</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">
      <p>This week&rsquo;s assignment is to review combinational logic and
      to start working with a schematic entry tool for configuring an
      FPGA.</p>
    </div>
    
    <h2>Reading Material</h2>
    <div class="whitebox">
      <ul>

        <li>Sections 1, 2, 3, and 5 of <a
        href="../../COAD3e/Appendix_B.pdf">Appendix B</a> of the textbook.</li>

        <li>My web page on <a href="../../../Minimize">Boolean
        Minimization</a></li>
        
        <li>My web page on <a href="quartus_start.php">Getting Started
        With Quartus</a></li>

      </ul>
    </div>

    <h2>Requirements</h2>
    <div class="whitebox">
    
      <p>Your assignment is to implement one slice of the MIPS ALU developed
      in Appendix B of the textbook using Altera&rsquo;s
      <cite>Quartus</cite> development system, and targeting Altera&rsquo;s
      UP3 prototyping board.  We&rsquo;d like to implement the full 32-bit
      ALU, but I haven&ldquo;t masterd the LCD dot matrix display yet, so
      there is no way to display the results.</p>

      <p>When you finish the assignment, send an email message to me that
      includes your account name in the message body.  I will then retrieve
      your Quartus project from your My Projects directory in the lab.  Be
      sure you always log off whichever computer you work on in A-205 so
      your project will be copied back to the server, from which I will get
      it.</p>

    </div>

    <h2>Development Steps</h2>
    <div class="whitebox">
    
      <p><strong>Note:</strong> The description of the development steps
    assumes you followed the in-class presentation from February 7.  If not,
    you might want to ask questions on the <a
    href="http://babbage.cs.qc.edu/Fora/Courses/index.php?c=3">course
    discussion forum</a> to get help.</p>

    <ol>

      <li>Start Quartus and click on the <em>File -&gt; New Project
      Wizard</em> menu item to start a new project.  Specify a directory
      under My&nbsp;Documents\My&nbsp;Projects as the project directory.  I
      suggest you use the name &rdquo;ALU_Slice&ldquo;.  I suggest that you
      use the directory name as both the project name and again as the name
      of the top-level design entity for the project.  The FPGA on the UP3
      board is a Cyclone EP1C6Q240C8.  You can select this part number from
      the list presented on the third page of the wizard, or you can use the
      filters (Any QFP, 240, 8) to help select the part.</li>

      <li>Use <em>File -&gt; New</em> to start a new schematic file.  Draw
      the schematic with inputs named Ainv, Bneg, F0, F1, Ai, Bi, and Cin. 
      Have two outputs named Ri and Cout. <br />There are shortcuts you
      could use to build the circuit, but for this assignment you are to use
      only the logic primitives available in the &rdquo;logic,&ldquo;
      &rdquo;other,&ldquo; and &rdquo;pin&ldquo; folders, which appear under
      the primitives folder when you select symbols.</li>
      
      <li><ul>

        <li>Where you need a permanent connection to a logic value of zero
        (for the SLT input), use the <em>gnd</em> (ground) symbol under the
        &rdquo;other&ldquo; folder.  If you find you need a permanent
        connection to a logic value of one, use the <em>vcc</em> symbol in
        the same folder.</li>

        <li>The switches and pushbuttons come into the FPGA with inverted
        values (pushed or on will be a 0 and not-pushed or off will be a 1).
        The easiest way to deal with this is probably just to put inverters
        between the input pins and the rest of your circuit.  (Except for
        Cin, you need both the normal and the inverted versions of all
        inputs anyway, so you can just connect each input to an inverter and
        remember that the <em>input</em> to the inverter is the complement
        of the switch or button setting and the <em>output</em> of the
        inverter is the actual value.)</li>

        
        <li>If you are feeling adventuresome, you can draw a separate
        circuit to use as a building block inside your diagram.  Just create
        a separate .bdf file, draw the circuit, and give meaningful names to
        the input and output pins.  Save the file, and then use <em>File
        -&gt; Create/Update -&gt; Create Symbol Files for Current File</em>
        to save the file as a symbol.  You will then find your symbol in the
        list of items you can insert under the AND gate toolbar button. 
        Look above the quartus50 library in the list.  Possibilities to
        consider are a 2x1 multiplexor, a 4x1 multiplexor, and a full
        adder.</li>   

      </ul></li>

      <li>Save the file as ALU_Slice.bdf in
      your project directory.  Compile it and be sure there are no
      errors.</li>
      
      <li>Assign pins to the inputs and outputs. (See below.)</li>
      
      <li>Program the device and try it out!</li>

    </ol>

    </div>

    <h2>Pin Assignments</h2>
    <div class="whitebox">

      <p>Here is a list of the FPGA pins to which the various buttons,
      switches, and LEDs on the Altera UP3 board are connected.  The last
      column gives the recommended ALU_Slice functions to use for each in
      this project.</p>

      <table  summary="List of buttons, switches, and LEDs on the Altera UP3
      board, their pin numbers, and suggested connections for the ALU_Slice
      project."
              cellpadding="5">
        <caption>Altera UP3 Board I/O Pins</caption>

        <tr>
          <th scope="col">&nbsp;</th>
          <th scope="col">Name</th>
          <th scope="col">Pin Number</th>
          <th scope="col">ALU_Slice Function</th>
        </tr>
        <tr>
          <th scope="row" rowspan="4">Buttons</th>
          <td>Sw 4</td>
          <td>48</td>
          <td>A<sub>i</sub></td>
        </tr>
        <tr>
          <td>Sw 5</td>
          <td>49</td>
          <td>B<sub>i</sub></td>
        </tr>
        <tr>
          <td>Sw 6</td>
          <td>57</td>
          <td>C<sub>in</sub></td>
        </tr>
        <tr>
          <td>Sw 7</td>
          <td>63</td>
          <td>Nothing</td>
        </tr>
        
        <tr>
          <th scope="row" rowspan="4">Switches</th>
          <td>Sw 3.1</td>
          <td>58</td>
          <td>A<sub>inv</sub></td>
        </tr>
        <tr>
          <td>Sw 3.2</td>
          <td>59</td>
          <td>B<sub>neg</sub></td>
        </tr>
        <tr>
          <td>Sw 3.3</td>
          <td>60</td>
          <td>F<sub>1</sub></td>
        </tr>
        <tr>
          <td>Sw 3.4</td>
          <td>61</td>
          <td>F<sub>0</sub></td>
        </tr>
        
        <tr>
          <th scope="row" rowspan="4">LEDs</th>
          <td>D3</td>
          <td>56</td>
          <td>R<sub>i</sub></td>
        </tr>
        <tr>
          <td>D4</td>
          <td>55</td>
          <td>C<sub>out</sub></td>
        </tr>
        <tr>
          <td>D5</td>
          <td>54</td>
          <td>Nothing</td>
        </tr>
        <tr>
          <td>D6</td>
          <td>53</td>
          <td>Nothing</td>
        </tr>
        
      </table>
    </div>

    <h2>Sample Diagrams</h2>
    <div class="whitebox">
      <p>Here are diagrams of a sample solution you may look at:</p>

      <ul>

        <li><a href="../../ALU_Slice.pdf">ALU_Slice.bdf</a></li>
        <li><a href="../../Full_Adder.pdf">Full_Adder.bdf</a></li>

      </ul>

    </div>

  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
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

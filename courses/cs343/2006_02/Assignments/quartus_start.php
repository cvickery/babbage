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

  <title>Quartus Start</title>

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

</head>

<body>

  <div id="header">
    <h1>Quartus Start</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">

      <p>Quartus is the name of the software tools provided by <a
      href="http://www.altera.com">Altera</a> for developing logic devices
      for their families of Field Programmable Gate Arrays (FPGAs).  This
      handout is intended to be a &ldquo;quick start guide&rdquo; for using
      Quartus to develop simple designs from schematics.</p>

    </div>

    <h2>Design Flow</h2>
    <div class="whitebox">
    
      <p>You will need to go through the following steps to implement a
      circuit on an Altera FPGA using Quartus:</p>
      
      <ol>

        <li>Start Quartus and create a project.</li>
        
        <li>Create a schematic of the logic network you are going to
        implement, and compile it.</li>
        
        <li>Assign FPGA pins to the inputs and outputs of your design.</li>
        
        <li>Connect a prototyping board to the computer using a special
        &ldquo;ByteBlaster&rdquo; cable, and program the device.</li>
        
        <li>Test your design and start at Step 2 again if necessary.</li>

      </ol>
    
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

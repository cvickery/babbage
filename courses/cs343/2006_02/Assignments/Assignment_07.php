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

  <title>CS-343 Assignment 7</title>

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
    <h1>CS-343 Assignment 7</h1>
  </div>

  <div id="content">
    <h2>Exercises</h2>
    <div class="whitebox">

      <p>Read Chapter 6 through section 6.6.  Go back to Figure 6.32, and
      list the all the pieces of information in each pipeline register and
      how many bits each piece requires, then tell the total number of bits
      in each pipeline register.  Use Figure 6.27 as your base model, and
      then add in the extra bits needed for register forwarding.  Send your
      answers to me by email by <strong>May 9</strong>.</p>
      <p><strong>Note:</strong> there is a typographical error in Figure
      6.32: there should be a line going from ID/EX to the topmost of the
      three Muxes in the EX stage.</p>

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

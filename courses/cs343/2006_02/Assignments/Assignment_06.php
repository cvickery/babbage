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

  <title>CS-343 Assignment 6</title>

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
    <h1>CS-343 Assignment 6</h1>
  </div>

  <div id="content">
    <h2>Exercises</h2>
    <div class="whitebox">
      <p>Write out the answers to the following exercises in the textbook:
      5.1, 5.1, 5.3, 5.7 (ok, you can skip that one), 5.8, 5.9, 5.10, 5.11,
      5.12, 5.13, 5.14, 5.28</p>
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

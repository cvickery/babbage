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
<head><title>Assignment 10</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="../index.php" />
<link rel="Prev" href="Assignment_09.php" />
<link rel="Next" href="Assignment_11.php" />
<link rel="stylesheet" type="text/css"  href="style-all.css" />
<link rel="stylesheet" type="text/css"  media="screen"
                                        href="style-screen.css" />
<link rel="stylesheet" type="text/css"  media="print"
                                        href="style-print.css" />
</head>
<body>
<h1>Assignment 10</h1>
<div class="whitebox">

  <p>The due date for this assignment is May 4.  But you can get full
  credit if you submit it by the cutoff date of May 9.</p>

  <ol>

    <li>Make up meaningful field names for all the pipeline registers
    in Fig. 6.27, tell each one's width, and how wide each register
    is.</li>

    <li>Write a pseudo-code description of the logic inside the
    "Forwarding Unit" block in Figure 6.30.  You can use
    if..then...else, and logical operators &amp;&amp;, ||, !, ==, !=
    along with pipeline register fields using the naming convention
    developed in class on May 2.</li>

  </ol>

</div>
<hr />
<p class="footer">Validate this page:
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

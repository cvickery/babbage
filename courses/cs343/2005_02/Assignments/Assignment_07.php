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
<head><title>CS-343 Assignment 7</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="Assignment_01.php" />
<link rel="Prev" href="Assignment_06.php" />
<link rel="Next" href="Assignment_08.php" />
<link rel="stylesheet" type="text/css" href="style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style-screen.css" />
<link rel="stylesheet" type="text/css" media="print" href="style-print.css" />
</head>
<body>
<h1>CS-343 Assignment 7</h1>

<h2>Amnesty Week!</h2>

<div class="whitebox">

  <p>There is no new assignment to hand in this week.  Instead you may
  submit or resubmit <em>all</em> assignments to date for which you
  have not yet received an "ok" for a chance to get full credit for
  them.</p>

  <p>In addition, use this break to catch up on and/or get ahead on
  your reading assignments from the textbook.  You should finish all
  reading assignments in Chapter 5 this week.</p>

</div>

<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

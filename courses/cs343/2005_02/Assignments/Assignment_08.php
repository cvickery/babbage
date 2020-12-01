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
<head><title>CS-343 Assignment 8</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="Assignment_01.php" />
<link rel="Prev" href="Assignment_07.php" />
<link rel="Next" href="Assignment_09.php" />
<link rel="stylesheet" type="text/css" href="style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style-screen.css" />
<link rel="stylesheet" type="text/css" media="print" href="style-print.css" />
</head>
<body>
<h1>CS-343 Assignment 8</h1>

<h2>Assignment and Due Date</h2>

<div class="whitebox">

<h3>Exercises</h3>

  <p>This assignment is due <strong>Wednesday, April 6</strong>.</p>

  <p>Exercise <strong>5.1</strong>: Your should be able to answer six
  of these.  See how many additional ones you can do, perhaps by
  googling them.</p>
  
  <p>Exercises <strong>5.2</strong> and <strong>5.3</strong>.</p>
  
  <p>Exercise <strong>5.7</strong>.  Remember, I was supposed to get
  this assignment ready for you by April 1!</p>
  
  <p>Exercises <strong>5.10</strong> and <strong>5.12</strong>.</p>

<h3>Submission</h3>

    <p>You may submit this assignment by email: Be sure it reaches me
    by midnight of the due date; be sure the Subject line is "CS-343
    Assignment 8;"  be sure your name is in the body of your
    message.</p>

    <p><strong>Notes:</strong>I prefer plain text over Word or PDF
    documents, and I prefer text in the body of your email message
    rather than an attachment.  For Exercise 5.10, describe the
    changes you would make in words rather than by submitting an
    actual figure.</p>

</div>

<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

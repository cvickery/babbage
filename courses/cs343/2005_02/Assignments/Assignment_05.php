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
<head><title>CS-343 Assignment 5</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="Assignment_01.php" />
<link rel="Prev" href="Assignment_04.php" />
<link rel="Next" href="Assignment_06.php" />
<link rel="stylesheet" type="text/css" href="style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style-screen.css" />
<link rel="stylesheet" type="text/css" media="print" href="style-print.css" />
</head>
<body>
<h1>CS-343 Assignment 5</h1>

<h2>Submission</h2>
<div class="whitebox">
  <p>You may submit this assignment either on paper in class on Monday
  the 14th, or by email by midnight of the 14th.  Be sure to write
  your name and section on the assignment if you submit it on paper. 
  Be sure to use "CS-343 Assignment 5" as the subject, and include
  your name in the message body, if you submit it by email.</p>
  
  <p>You are free to ask and answer questions about the assignment on
  the <a href="/Forums/cs343">Discussion Forum</a> for the course. 
  Don't give the actual answers to questions on the forum, but it's
  okay to give answers to similar questions.  For example, if the
  assignment had a question that said to compute 50% of 90 and
  somebody asked for help, it would be okay to say, <q><em>Take half
  of 90.  For example, 50% of 60 is 30.</em></q></p>

  <div class="whitebox">

    <p><strong>Bonus:</strong> The first three people to uset the
    Discussion Forum to ask good questions about the assignment and
    the first three people to give good answers to those questions
    will have one point added to their course averages at the end of
    the semester.  I'll decide what questions and answers qualify as
    "good!"</p>

  </div>

</div>

<h2>The Assignment</h2>
<div class="whitebox">
  <ol>

    <li>After reading Chapter 4, answer Exercises 4.1, 4.2, 4.3, 4.6,
    4.7, 4.8, 4.9, and 4.10.</li>

    <li>Define <q>Amdahl's Law,</q> and tell how it relates to
    Exercise 4.11.  Small bonus: answer Exercise 4.11.</li>

    <li>Find (at least) three definitions of "dual-core" on the web.
    List them all, with the URLs of the pages where you found them,
    and then try to define this term in your own words.  Relate it to
    the equations for CPU time on page 249.</li>

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

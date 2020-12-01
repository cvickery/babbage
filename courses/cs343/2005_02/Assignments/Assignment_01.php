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
<head><title>CS-343 Assignment 1</title>
<link rel="Index" href="index.php" />
<link rel="Next" href="Assignment_02.php" />
<style type="text/css">
  html, body { background: #ffffcc; }
  h1   { text-align: center;  }
  p { margin-left: 1em; margin-right: 2em; }
  p.footer { text-align: center; font-size: smaller; }
  div.whitebox {background:white;border:solid 1px blue; margin:1em;
  padding:1em;}
</style>
<style type="text/css" media="screen">
  body { font-family: sans-serif }
  a:hover { background: #ffcccc; text-decoration: none; }
</style>
</head>
<body>
<h1>CS-343 Assignment 1</h1>

<div class="whitebox">

  <p><strong>This assignment is due by class time on Monday February
  7.</strong></p>

  <p>This assignment is in <strong>four parts</strong>:</p>
  
  <ol>
  
  <li>For the <strong>first part</strong>, read the <a
  href="../../Background_Material.pdf">Background Material</a> (a PDF file) for
  the course.  (This material is an incomplete part of a chapter from
  a textbook I am working on.)  Write out the answers to all the
  questions in this document on paper and submit it at the end of the
  class meeting on the due date.</li>

  
  <li><p>The <strong>second part</strong> of the assignment has three
  steps:  You are reading this web page. so you have already completed
  the first step!</p>

  <p>The second step is for you to use the "Check Grades" feature to
  find your <em>secret word</em> for this assignment.  Depending on
  the section for which you are registered, click on one of the
  following two links:</p>

  <ul>

    <li><a href="../check_3m3wa.html">Afternoon Section 3M3WA, code 2832,
    (Meets Monday and Wednesdays in room SB D133 from 3:05 -
    4:20pm)</a></li>

    <li><a href="../check_e6mba.html">Evening Section E6MBA, code 2833,
    (Meets Mondays and Wednesdays in room SB A103 from 6:30 -
    7:45pm)</a></li>

  </ul>

  <p>Now you're ready to complete this part the assignment:  Send me
  an email message, structured as follows:</p>

  <ul>
  
    <li>Address the message to: <em>vickeryqc</em> <strong>at</strong>
    <em>gmail</em> <strong>dot</strong> <em>com</em>.</li>

    <li>Put <em>CS-343 Assignment 1</em> in the Subject of your
    message. <strong>Note:</strong> You must include the string
    "CS-343" in the subject of all messages you send to me.  My spam
    filter is pretty aggressive, and there is a very high probability
    that I will not see your message if you don't do this.</li>
    
    <li>In the body of your message, tell me what the <em>Check
    Grades</em> page told you is your secret word for the assignment. 
    Be sure to sign the message with your name as it appears in the
    class roster so I'll know who sent it.  (Always sign your name
    when you send me messages;  it might just be forgetfulness when
    you don't, but it comes across as rude. Furthermore, it causes me
    aggravation trying to figure out who sent unsigned messages.)</li>

  </ul>

  <p>Be sure to send your message from your own, real, email account.
  I will add it to my mailing list for the course, which I use
  actively to keep everyone abreast of what is happening.  The
  messages I send to this mailing list are an integral part of the
  course, so be sure to read messages addressed to this account
  regularly. If you would like to add other addresses to the list, you
  may do so by sending me a message from each other account that you
  want to use; just be sure to put CS-343 in the Subject, and to put
  your name in the body of these other messages, along with a note
  telling me that you want to add the additional address to the course
  mailing list.</p>
  </li>

  <li>The <strong>third part</strong> of this first assignment is to
  review the material in the textbook that should already be familiar
  to you from CS-240: Chapters 1 and 2, and Appendix B sections B.1,
  B.2, B.3, and B.5.  We will review that material in class as
  necessary, and then cover sections B.7 through the end of that
  appendix.</li>

  <li>The <strong>fourth part</strong> of this assignment is to use
  the <a href="../../Circuit_Maker">Circuit Maker</a> software to
  design a full-adder.  Build the full-adder using only AND, OR, and
  Inverter gates. Use switches for the three inputs, and connect
  binary indicators (LEDs) to the two outputs. Be sure the circuit
  generates the correct values for all possible combinations of
  inputs, and submit a printed copy of your circut diagram along with
  a hand-written truth table for the circuit. </li>

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

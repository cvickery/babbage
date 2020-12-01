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
<head><title>CS-343 Assignment 11</title>
<link rel= "Index" href="index.php" />
<link rel= "Start" href="../index.php" />
<link rel= "Prev"  href="Assignment_10.php" />
<link rel= "Next"  href="Assignment_12.php" />
<link rel= "Stylesheet" type="text/css"
                        href="style-all.css"    />
<link rel= "Stylesheet" type="text/css"
      media="screen"  href="style-screen.css" />
<link rel= "Stylesheet" type="text/css"
      media="print"   href="style-print.css"  />
</head>
<body>
<h1>CS-343 Assignment 11</h1>

<h2>Requirements</h2>
<div class="whitebox">
  <ol style="list-style-type: decimal;">
    <li>Define the following terms as they relate to cache memory
    systems:
      <ol style="list-style-type: lower-alpha;">
        <li>Memory Hierarchy</li>
        <li>DRAM</li>
        <li>SRAM</li>
        <li>Hit Ratio</li>
        <li>Miss Ratio</li>
        <li>Average Access Time</li>
        <li>Spatial Locality</li>
        <li>Temporal Locality</li>
        <li>Direct Mapped</li>
        <li>Write Through</li>
        <li>Write Back</li>
        <li>Valid Bit</li>
        <li>Optional (later in the chapter):
          <ol style="list-style-type: lower-roman;"> 
            <li>Associative</li>
            <li>Set Associative</li>
            <li>Dirty Bit</li>
            <li>Least Recently Used Algorithm</li>
          </ol></li>
      </ol>
    </li>
    <li>Explain the answer to the Check Yourself questions on page
    472 for all three choices.  (If by any chance you don't know that
    the answers to the Check Yourself questions are at the end of each
    chapter, well ... they are.)</li>
    <li>Fill values for the next row of Figure 7.12.</li>
    <li>Answer the following exercises from the end of chapter 7:
      7.2, 7.3, 7.4, 7.5, 7.9, 7.11, and 7.12.</li>
  </ol>
</div>

<h2>Submission</h2>
<div class="whitebox">
  <p>Because of network problems, I'm not sure when you will first see
  this assignment!  So I will accept it for full credit as much as one
  week "late."  That is, by May 16.  But that will also be the final
  date for submitting the assignment; there will be no chance to
  resubmit a "not ok" assignment in order to get full credit
  later.</p>
</div>
<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

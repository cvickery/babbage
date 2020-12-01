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
<head><title>CS-343 Assignments</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="../index.php" />
<link rel="Prev" href="Assignment_11.php" />
<link rel="Next" href="Assignment_01.php" />
<link rel="stylesheet" type="text/css" href="style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style-screen.css" />
<link rel="stylesheet" type="text/css" media="print" href="style-print.css" />
</head>
<body>
<h1>CS-343 Assignments</h1>
<div class="whitebox">

  <p>Written assignments are due at the end of the first class meeting
  of the week for which they are assigned.  You are responsible for
  handing assignments in without being prompted.  Each assignment will
  be graded "ok" (full credit) or "not ok" (half credit).  If you
  receive a grade of "not ok" you may submit a corrected version
  <em>in the next class</em> for a chance to raise your grade to an
  "ok."</p>

</div>

<table>
  <thead>
    <tr>
      <th>Week</th>
      <th>Dates</th>
      <th>Reading Assignment</th>
      <th>Homework Assignment</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>1</td>
      <td>January 31<br />February 2</td>
      <td><a href="../../Background_Material.pdf">Background Material</a>
      <br />Review Chapters 1 and 2, plus Appendix B sections B.1,
      B.2, B.3, and B.5.</td>
      <td>None</td>
    </tr>

    <tr>
      <td>2</td>
      <td>February 7<br />February 9</td>
      <td>Appendix B sections B.7 and B.8</td>
      <td>
        <a href="Assignment_01.php">Assignment 1</a>
      </td>
    </tr>

    <tr>
      <td>3</td>
      <td>February 14<br />February 16</td>
      <td>Appendix B sections B.9, B.10, B.11, B.12, and B.13</td>
      <td><a href="Assignment_02.php">Assignment 2</a></td>
    </tr>

    <tr>
      <td>4</td>
      <td>&nbsp;<br />February 23</td>
      <td>Appendix B, section B.10 and Appendix C, section C.3.</td>
      <td><a href="Assignment_03.php">Assignment 3</a></td>
    </tr>

    <tr>
      <td>5</td>
      <td>February 28<br />March 2</td>
      <td>Chapter 3 sections 3.1 through 3.3</td>
      <td><a href="Assignment_04.php">Assignment 4</a></td>
    </tr>

    <tr>
      <td>6</td>
      <td>March 7<br />March 9</td>
      <th colspan="2">First Exam<br />&nbsp;</th>
    </tr>

    <tr>
      <td>7</td>
      <td>March 14<br />March 16</td>
      <td>Chapter 4 sections 4.1 through 4.6</td>
      <td><a href="Assignment_05.php">Assignment 5</a></td>
    </tr>

    <tr>
      <td>8</td>
      <td>March 21<br />March23</td>
      <td>Chapter 5 sections 5.1 through 5.4</td>
      <td><a href="Assignment_06.php">Assignment 6</a></td>
    </tr>

    <tr>
      <th colspan="4">Easter Recess</th>
    </tr>

    <tr>
      <td>9</td>
      <td>&nbsp;<br />March 30</td>
      <td>Chapter 5 section 5.5</td>
      <td><a href="Assignment_07.php">Assignment 7</a></td>
    </tr>

    <tr>
      <td>10</td>
      <td>April 4<br />April 6</td>
      <td>Review Chapter 5</td>
      <td><a href="Assignment_08.php">Assignment 8</a></td>
    </tr>

    <tr>
      <td>11</td>
      <td>April 11<br />April 13</td>
      <th colspan="2">&nbsp;<br />Second Exam</th>
    </tr>

    <tr>
      <td>12</td>
      <td>April 18<br />April 20</td>
      <td>Chapter 6 sections 6.1 through 6.3</td>
      <td><a href="Assignment_09.php">Assignment 9</a>
        <br />(Extra Credit Assignment).
      </td>
    </tr>

    <tr>
      <th colspan="4">Spring Recess</th>
    </tr>

    <tr>
      <td>13</td>
      <td>May 2<br />May 4</td>
      <td>Chapter 6 sections 6.4 through 6.6 and 6.9</td>
      <td><a href="Assignment_10.php">Assignment 10</a>
        <br /><a href="Solutions_10.php">Solutions</a>
      </td>
    </tr>

    <tr>
      <td>14</td>
      <td>May 9<br />May 11</td>
      <td>Chapter 7</td>
      <td><a href="Assignment_11.php">Assignment 11</a>
        <br /><a href="Solutions_11.php">Solutions</a>
      </td>
    </tr>

    <tr>
      <td>15</td>
      <td>May 16<br />May 18</td>
      <td>Review chapter 7</td>
      <td><a href="Restricted/">Chapter 7 Review Document</a></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <th colspan="2">Third Exam
        <br />Section 3M3WA: Thu. May 26, 1:45 to 3:45
        <br />Section E6MBA: Mon. May 23, 6:15 to 8:15
        <br /><a href="../2004_09-Final_Exam.pdf">Last Semester's
        Third Exam</a>
      </th>
     </tr>

  </tbody>
</table>

<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>&nbsp;
  <a href="http://validator.w3.org/checklink?uri=babbage.cs.qc.edu/courses/cs343/2005_02/Assignments/">
    <strong>links</strong></a>
</p>
</body></html>

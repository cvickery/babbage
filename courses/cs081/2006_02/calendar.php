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

  <title>CS-081 Spring 2006 Class Schedule</title>

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
  <style type="text/css" media="all">
  th  {
    background: #eff;
    color:      #000;
    text-align: center;
    }
  .date_cell, .class_cell {
    text-align: center;
    width:      6em;
    }
  </style>
</head>

<body>

  <div id="header">
    <h1>CS-081 Spring 2006 Class Schedule</h1>
  </div>

  <div id="content">
    <table summary="CS-081 Class meeting schedule for Spring, 2006">
      <tr>
        <th scope="col" class="class_cell">Class</th>
        <th scope="col" class="date_cell">Date</th>
        <th scope="col">Topic</th>
        <th scope="col">Assignment</th>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 1</th>
        <td class="date_cell">Jan 27</td>
        <td>Course Introduction</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 2</th>
        <td class="date_cell">Jan 31</td>
        <td>Lab Familiarization</td>
        <td>Chapter 1</td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 3</th>
        <td class="date_cell">Feb 03</td>
        <td>Server-Browser Communication</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 4</th>
        <td class="date_cell">Feb 07</td>
        <td>Document Structure</td>
        <td>Chapter 2</td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 5</th>
        <td class="date_cell">Feb 10</td>
        <td>Tags, elements, attributes. Text, lists, and links</td>
        <td><a href="Assignments/Assignment_01.php">Assignment 1</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 6</th>
        <td class="date_cell">Feb 14</td>
        <td>Character entities, Images</td>
        <td>Chapter 3</td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 7</th>
        <td class="date_cell">Feb 17</td>
        <td>Objects, DOM</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">&nbsp;</th>
        <td class="date_cell">Feb 21</td>
        <td colspan="2"><strong>No class: Monday
          Schedule</strong></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 8</th>
        <td class="date_cell">Feb 24</td>
        <td>DOM Structure</td>
        <td><a href="Assignments/Assignment_02.php">Assignment 2</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 9</th>
        <td class="date_cell">Feb 28</td>
        <td><strong>Class cancelled</strong></td>
        <td>Chapter 4</td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">10</th>
        <td class="date_cell">Mar 03</td>
        <td>Tables: heading, footing, body; scope; colspan, rowspan
        <br />Javascript variables, functions and objects.</td>
        <td><a href="Assignments/Assignment_03.php">Assignment 3</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">11</th>
        <td class="date_cell">Mar 07</td>
        <td>Coding style; Tags, classes, ids; Firebug and other
        extensions.</td>
        <td>Chapter 7</td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">12</th>
        <td class="date_cell">Mar 10</td>
        <td>Using Firebug to Illuminate the DOM.  Colors.</td>
        <td>Chapter 8</td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">13</th>
        <td class="date_cell">Mar 14</td>
        <td>Colors and Backgrounds</td>
        <td><a href="Assignments/Assignment_04.php">Assignment 4</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">14</th>
        <td class="date_cell">Mar 17</td>
        <td>Selector syntax.  Background shortcuts and longhand.</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">15</th>
        <td class="date_cell">Mar 21</td>
        <td>Exam Review.  Assignment 5 walk-through.</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">16</th>
        <td class="date_cell">Mar 24</td>
        <td><strong>Midterm Exam</strong></td>
        <td>Topics: Class notes, Homework Assignments, and Chapters 1, 2, 3,
        4, 7, and 8.
        <br /><a href="Restricted/2005-09_Midterm_Exam.pdf">Last
        Semester&rsquo;s Midterm</a>
        <br /><a href="Assignments/Assignment_05.php">Assignment 5</a>
        </td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">17</th>
        <td class="date_cell">Mar 28</td>
        <td>Source Code Formatting, <a href="http://www.sitepoint.com/blogs/2006/03/15/do-you-know-your-character-encodings/">Character
        Encodings</a>, boxes/windows/viewports</td>
        <td>Chapter 11</td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">18</th>
        <td class="date_cell">Mar 31</td>
        <td>New Firebug, Box Model, Box Types</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">19</th>
        <td class="date_cell">Apr 04</td>
        <td>List and Table Styling.  Inkscape.</td>
        <td><a href="Assignments/Assignment_06.php">Assignment 6</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">20</th>
        <td class="date_cell">Apr 07</td>
        <td>CSS: Selectors</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">21</th>
        <td class="date_cell">Apr 11</td>
        <td>CSS: Positioning</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">&nbsp;</th>
        <td class="date_cell">Apr 12-21</td>
        <td colspan="2"><strong>Spring Recess</strong></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">22</th>
        <td class="date_cell">Apr 25</td>
        <td>Forms</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">23</th>
        <td class="date_cell">Apr 28</td>
        <td>Forms, continued</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">24</th>
        <td class="date_cell">May 02</td>
        <td>Javascript: variables and functions</td>
        <td><a href="Assignments/Assignment_07.php">Assignment 7</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">25</th>
        <td class="date_cell">May 05</td>
        <td>Javascript: objects, arrays, and loops</td>
        <td><a href="../Javascript_Tutorial">Javascript Tutorial</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">26</th>
        <td class="date_cell">May 09</td>
        <td>Javascript: DOM tree accesses</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">27</th>
        <td class="date_cell">May 12</td>
        <td>Javascript: strings and <span class="variableName">if</span>.</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">28</th>
        <td class="date_cell">May 16</td>
        <td>Review</td>
        <td><a href="Assignments/Assignment_08.php">Assignment 8</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">&nbsp;</th>
        <td class="date_cell">May 25
        <br />(Thursday)
        </td>
        <td colspan="2"><strong>Final Exam</strong>
          <br />8:30 am - 10:30 am
          <br /><a href="Restricted/2005-09_Final_Exam.pdf">Last Semester&rsquo;s Final Exam</a>
        </td>
      </tr>
    </table>
  </div>

  <div id="footer">
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="..">CS-081 Home</a>&nbsp;-&nbsp;
      <a href=".">CS-081 This Semester</a>&nbsp;-&nbsp;
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

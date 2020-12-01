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

  <title>CS-343 Spring 2006 Schedule</title>

  <link rel="shortcut icon" href="../favicon.ico" />
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
    <h1>CS-343 Spring 2006 Schedule</h1>
  </div>

  <div id="content" class="whitebox">

    <p><strong>The reading assignments for the semester are given in the <a
    href="../index.xhtml">Course Syllabus</a>.</strong></p>
    
    <p>The table below gives class meeting dates, exam dates, and assignment
    due dates for the course.</p>

    <table summary="Class schedule for Spring, 2006">
      <tr>
        <th scope="col" class="class_cell">Class</th>
        <th scope="col" class="date_cell">Date</th>
        <th scope="col">Assignment</th>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 1</th>
        <td class="date_cell">Jan 27</td>
        <td><a href="Assignments/Assignment_00.php">Assignment 0</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 2</th>
        <td class="date_cell">Jan 31</td>
        <td>Assignment 1: Questions 1-4 from the <a
        href="../Background_Material.pdf">Background Material</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 3</th>
        <td class="date_cell">Feb 03</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 4</th>
        <td class="date_cell">Feb 07</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 5</th>
        <td class="date_cell">Feb 10</td>
        <td><a href="Assignments/Assignment_02.php">Assignment 2</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 6</th>
        <td class="date_cell">Feb 14</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 7</th>
        <td class="date_cell">Feb 17</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">&nbsp;</th>
        <td class="date_cell">Feb 21</td>
        <td><strong>No class: Monday Schedule</strong></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 8</th>
        <td class="date_cell">Feb 24</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"> 9</th>
        <td class="date_cell">Feb 28</td>
        <td><strong>Class cancelled</strong></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">10</th>
        <td class="date_cell">Mar 03</td>
        <td><a href="Assignments/Assignment_03.php">Assignment 3</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">11</th>
        <td class="date_cell">Mar 07</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">12</th>
        <td class="date_cell">Mar 10</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">13</th>
        <td class="date_cell">Mar 14</td>
        <td><a href="Assignments/Assignment_04.php">Assignments 4a and
        4b</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">14</th>
        <td class="date_cell">Mar 17</td>
        <td><strong>First Exam</strong>
        <br /><a
        href="Restricted/2005-02_First_Exam.pdf">Last
        Year&rsquo;s First Exam</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">15</th>
        <td class="date_cell">Mar 21</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">16</th>
        <td class="date_cell">Mar 24</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">17</th>
        <td class="date_cell">Mar 28</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">18</th>
        <td class="date_cell">Mar 31</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">19</th>
        <td class="date_cell">Apr 04</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">20</th>
        <td class="date_cell">Apr 07</td>
        <td><a href="../SPIM_Assignment">Assignment 5</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">21</th>
        <td class="date_cell">Apr 11</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">&nbsp;</th>
        <td class="date_cell">Apr 12-21</td>
        <td><strong>Spring Recess</strong></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">22</th>
        <td class="date_cell">Apr 25</td>
        <td><a href="Assignments/Assignment_06.php">Assignment 6</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">23</th>
        <td class="date_cell">Apr 28</td>
        <td><strong>Second Exam</strong>
        <br /><a
        href="Restricted/2005-02_Second_Exam.pdf">Last
        Year&rsquo;s Second Exam</a></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">24</th>
        <td class="date_cell">May 02</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">25</th>
        <td class="date_cell">May 05</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">26</th>
        <td class="date_cell">May 09</td>
        <td><a href="Assignments/Assignment_07.php">Assignment 7</a>
        <br /><a href="Assignments/Assignment_07_Solution.txt">Solution</a>
        </td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">27</th>
        <td class="date_cell">May 12</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell">28</th>
        <td class="date_cell">May 16</td>
        <td></td>
      </tr>
      <tr>
        <th scope="row" class="class_cell"></th>
        <td class="date_cell">May 22
        <br />(Monday)</td>
        <td><strong>Final Exam</strong>
          <br />11:00 am - 1:00 pm
          <br /><a href="Restricted/2005-02_Third_Exam.pdf">Last 
            Semester&rsquo;s Third Exam</a>
        </td>
      </tr>
    </table>
  </div>

  <div id="footer">
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="../">CS-343 Home</a>&nbsp;-&nbsp;
      <a href="./">CS-343 Spring 2006</a>&nbsp;-&nbsp;
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

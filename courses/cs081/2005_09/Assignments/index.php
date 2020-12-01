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

  <title>Fall 2005 Class Schedule</title>

  <link rel="shortcut icon" href="/courses/cs081/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="../../../css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="../../../css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
        href="../../../css/style-print.css" />

  <style type="text/css">
    #schedTab   { width:            80%;
                  margin:           auto;
                  border-collapse:  collapse;
                  border:           solid 2px blue;
                  background:       white;
                }
    .weekNum    { vertical-align:   top;
                }
  </style>
</head>

<body>

<div id="header">
  <h1>Fall 2005 Class Schedule</h1>
</div>

<div id="body">
  <div class="whitebox">
    <p>Reading assignments are in &ldquo;Spring Into HTML and
    CSS&rdquo; by Molly E. Holzschlag.  Addison-Wesley, 2005.  ISBN
    0-13-185586-7.</p>
  </div>
  <hr />
  <table  id="schedTab"
          summary="Class meeting dates and assignments for the semester.">
    <colgroup>
      <col width="10%" align="center"           />
      <col width="10%" align="left"   span="2"  />
      <col width="10%" align="center"           />
      <col             align="left"             />
    </colgroup>
    <thead>
      <tr>
        <th>Week</th>
        <th>Day</th>
        <th>Date</th>
        <th>Class</th>
        <th >Notes</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="weekNum" rowspan="2">1</td>
        <td>Tue</td>
        <td>Aug 30</td>
        <td>1</td>
        <td><strong>First class</strong></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Sep 2</td>
        <td>2</td>
        <td>Read Chapter 1</td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">2</td>
        <td>Tue</td>
        <td>Sep 6</td>
        <td>3</td>
        <td></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Sep 9</td>
        <td>4</td>
        <td>Read Chapter 2</td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">3
        </td>
        <td>Tue</td>
        <td>Sep 13</td>
        <td>5</td>
        <td></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Sep 16</td>
        <td>6</td>
        <td>Read Chapter 3</td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">4
        </td>
        <td>Tue</td>
        <td>Sep 20</td>
        <td>7</td>
        <td><a href="./Assignment_01.php">Assignment 1</a> Due</td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Sep 23</td>
        <td>8</td>
        <td>Read Chapter 4</td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">5
        </td>
        <td>Tue</td>
        <td>Sep 27</td>
        <td>9</td>
        <td></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Sep 30</td>
        <td>10</td>
        <td></td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">6</td>
        <td>Tue</td>
        <td>Oct 4</td>
        <td></td>
        <td><strong>No class: Rosh Hashana</strong></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Oct 7</td>
        <td>11</td>
        <td><a href="./Assignment_02.php">Assignment 2</a> Due; Read
        Chapter 5</td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">7</td>
        <td>Tue</td>
        <td>Oct 11</td>
        <td></td>
        <td><strong>No class: Monday Schedule</strong></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Oct 14</td>
        <td>12</td>
        <td>Read Chapter 7</td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">8</td>
        <td>Tue</td>
        <td>Oct 18</td>
        <td>13</td>
        <td></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Oct 21</td>
        <td>14</td>
        <td></td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">9</td>
        <td>Tue</td>
        <td>Oct 25</td>
        <td>15</td>
        <td><strong>Midterm Exam: Chapters 1-5, 7, Assignments, and
        Class Notes</strong></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Oct 28</td>
        <td>16</td>
        <td><a href="./Assignment_03.php">Assignment 3
            Due</a></td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="3">10</td>
        <td>Tue</td>
        <td>Nov 1</td>
        <td>17</td>
        <td>Read Chapter 8</td>
      </tr>
      <tr>
        <td>Wed</td>
        <td>Nov 2</td>
        <td></td>
        <td><strong>Last day to drop.</strong></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Nov 4</td>
        <td>18</td>
        <td></td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">11</td>
        <td>Tue</td>
        <td>Nov 8</td>
        <td>19</td>
        <td>Election Day: Regular class meeting</td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Nov 11</td>
        <td>20</td>
        <td>Veteran's Day: Regular class meeting</td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">12</td>
        <td>Tue</td>
        <td>Nov 15</td>
        <td>21</td>
        <td><a href="Assignment_04.php">Assignment 4</a> Due</td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Nov 18</td>
        <td>22</td>
        <td></td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">13</td>
        <td>Tue</td>
        <td>Nov 22</td>
        <td>23</td>
        <td></td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Nov 25</td>
        <td></td>
        <td colspan="2"><strong>No class: Thanksgiving</strong></td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">14
<a id="now" />
        </td>
        <td>Tue</td>
        <td>Nov 29</td>
        <td>24</td>
        <td>Last day to submit assignments 1-4 for credit.</td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Dec 2</td>
        <td>25</td>
        <td></td>
      </tr>
      <tr>
        <td class="weekNum" rowspan="2">15</td>
        <td>Tue</td>
        <td>Dec 6</td>
        <td>26</td>
        <td><a href="Assignment_05.php">Assignment 5</a> Due</td>
      </tr>
      <tr>
        <td>Fri</td>
        <td>Dec 9</td>
        <td>27</td>
        <td></td>
      </tr>
      <tr>
        <td class="weekNum">16</td>
        <td>Tue</td>
        <td>Dec 13</td>
        <td>28</td>
        <td><strong>Last class</strong></td>
      </tr>
      <tr>
        <td class="weekNum">17</td>
        <td>Wed</td>
        <td>Dec 21</td>
        <td></td>
        <td><strong>Final Exam: SB D-133 from 1:45 to 3:45 pm</strong>
        <br />Chapters 8 and 11; W3C CSS 2.1 chapters 8 and 14; Chapters 9
        and 10. Chapters 1-5 and 7 assumed but not explicitly tested.
        </td>
      </tr>
    </tbody>
  </table>
</div>

<div id="footer">
  <hr />
  <p>
    <a href="../../../../">Vickery Home</a>&nbsp;-&nbsp;
    <a href="../..">Course Home</a>&nbsp;-&nbsp;
    <a href="../">Fall 2005 Home</a>&nbsp;-&nbsp;
    <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
  </p>
  <p><i>Last updated
    <?php echo gmdate("Y-m-d", filemtime("index.php"));
    ?>.</i>
  </p>
</div>

<hr />
</body></html>

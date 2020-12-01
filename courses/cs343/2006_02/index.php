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

  <title>CS-343 Spring 2006</title>

  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="../../css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="../../courses/css/style-screen.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="print"
        href="../../courses/css/style-print.css"
  />        

</head>

<body>

  <div id="header">
    <h1>CS-343 Spring 2006</h1>
    <h2>Section CS-343 9T3FA (2983)</h2>
    <h2>Dr. Vickery</h2>
  </div>

  <div id="content">

    <h2>Assignments and Exams</h2>
    <div class="whitebox">

      <p>The reading assignments are listed in the <a
      href="../index.xhtml"><strong>Course Syllabus</strong></a>.  You are
      expected to complete them as the class progresses from topic to
      topic.</p>

      <p>Homework assignments and exam dates are given in the <a
      href="calendar.php"><strong>Course Schedule</strong></a></p>

    </div>

    <h2>Administrivia</h2>
    <div class="whitebox">
      <ul>

        <li><strong>Class Meetings: </strong>Tuesdays and Fridays 9:25 to
        10:40 am, SB-141.</li>

        <li><strong><a href="../index.xhtml">Syllabus</a>: </strong>Lists
        topics and reading assignments for the course.</li>

        <li><strong>Textbook: </strong>See the <a
        href="../index.xhtml">Syllabus</a>.<br />Note that the textbook is
        <em>required</em>: virtually all reading and homework assignments
        will come from the book.</li>

        <li><strong><a href="/contact_info.php">Office Hours</a>: </strong>
        Tuesdays and Fridays from 12:15 to 1:15 pm.<br />Follow the link for
        more contact information.</li>
        
        <li><strong>Exams and Assignments: </strong>There will be three
        exams at the points indicated in the syllabus.  Each will count 30%
        of your grade for the course.  The remaining 10% of your course
        grade will be based on the assignments for the course.  For homework
        assignments, you will receive a grade of &ldquo;ok&rdquo; (full
        credit) or &ldquo;not ok&rdquo; (half credit) for each assignment
        you submit.  You do not have to do your own work on the homework
        assignments, but the answers you submit must be correct to receive
        full credit.  I will try to have a logic design project as one of
        the assignments this term.  If I do, it will count 6% of your course
        grade and the exams will be reduced to 28% each.</li>

        <li><strong>Extra Credit: </strong>If there is an extra credit
        option it will not be required, but will enable you to add up to
        five points to your course grade.</li>
        
        <li><strong><a href="check_grades.php">Check Grades</a>:
        </strong>Follow the link, enter your 4-digit student ID, and see
        what grades I have recorded for you so far this semester.
        <br /><strong>Note:</strong> exam and assignment grades become
        permanent two weeks after they are posted, so be sure to check your
        grades regularly to make sure there are no mistakes.</li>

        <li><strong>Discussion Forum: </strong>I encourage you to join the
        course discussion forum, which is open only to students registered
        in my courses.  The main purpose of the forum is to exchange help on
        the assignments and in preparing for exams.  I will award a small
        course grade bonus to students who participate actively in the forum
        &mdash; posting questions, and especially posting answers!</li>

      </ul>
    </div>

  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="../../../">Vickery Home</a>&nbsp;-&nbsp;
      <a href="../">CS-343 Home</a>&nbsp;-&nbsp;
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


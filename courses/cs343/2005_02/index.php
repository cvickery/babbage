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
<head><title>CS-343 Spring 2005</title>

<link rel="stylesheet" type="text/css" href="style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style-screen.css" />

<style type="text/css" media="print">
  fieldset    { display: none; }
</style>
</head>

<body>

  <div id="header">
    <h1>CS-343 Spring 2005</h1>
  </div>

  <div id="navigate">
    <div class="nav-box">
      <p>Links on This Page</p>
        <p><a href="#top">What's Here</a></p>
        <p><a href="#administrivia">Course Structure</a></p>
        <p><a href="#textbook">Textbook Information</a></p>
    </div>
    <div class="nav-box">

      <p>Links to Other Pages</p>

      <p><a href="Assignments">Assignments</a></p>
      <p><a href="check_3m3wa.html">Check
        Grades: Day</a></p>
      <p><a href="check_e6mba.html">Check
        Grades: Eve</a></p>
      <p>Discussion Forum</p>
      <hr />
      <p><a
         href="../Background_Material.pdf">Background Material (PDF)</a>
      </p>

      <p><a href="../Circuit_Maker">Circuit Maker</a></p>
      <p><a href="../../Minimize">Boolean Minimization</a></p>
      <p><a href="2004_09-First_Exam.pdf">Fall 2004
        Exam 1 (PDF)</a></p>
      <p><a href="2004_09-Second_Exam.pdf">Fall 2004
        Exam 2 (PDF)</a></p>
    </div>

  </div>

  <div id="content">

    <h2><a class="target" id="top">What's Here</a></h2>
    <div class="whitebox">

      <p>This is the web page for both sections of CS-343 taught by Dr.
      Vickery during the Spring 2005 semester.  <strong>Bookmark this
      page!</strong>  It is <em>the</em> source of information about
      assignments and exams, and will be updated regularly throughout
      the semester.  For now, it provides a preliminary overview of the
      course. As the semester progresses, it will be updated with
      critical information you will need to complete the course
      successfully.</p>

    </div>

    <h2><a class="target" id="administrivia">Course Structure</a></h2>
    <div class="whitebox">

        <p>The course meets twice a week on Mondays and Wednesdays.  I
        teach an afternoon section that meets from 3:05 to 4:20 in
        Science Building room D133 and an evening section that meets
        from 6:00 to 7:45 in Science Building room A103.  I don't mind
        if you occasionally attend the wrong section, but in general
        it's not a good idea because the two classes invariably get out
        of sync with each other.  And you definitely have to take all
        exams with your own section.</p>

        <p>There will be three exams in the course, which will all
        count equally.  The exams will be cumulative in the sense that
        they will require you to have mastered the material covered on
        previous exam(s), but each one will have a very strong
        emphasis on the material that was covered since the previous
        one.  The first two exams will be on Monday March 7 and
        Wednesday April 13.  The third exam will be given during
        finals week and there will be more time for it, but it will
        count just like the other two and will be structured
        similarly.  Exams will cover material from the reading and
        homework assignments, as well as the material covered in
        class.  The format will be largely multiple <span
        class="strike">guess</span> choice, with some diagrams and
        short answers mixed in.</p>

        <p>There are reading and homework assignments for each week of
        the course except for the weeks in which there are exams.  The
        homework assignments are to be written on paper and handed in at
        the end of the Monday class in which they are due.  Homeworks
        are graded on an "ok" or "not ok" basis.  You must get an "ok"
        to receive credit for the assignment.  If you get a "not ok" you
        may redo it and resubmit it <em>in the class after it is
        returned</em> for full credit.  Homework assignments will count
        10% of your course grade.</p>

        <p>There is a lot of material to cover in this course, and it is
        essential for you to keep current with the reading and homework
        assignments.  Remember, a full-time job requires you to work
        35-40 hours a week, and you are considered to be a full-time
        student if you take 12 credits of course work a semester.  So
        whether you are a full-time student or not, it is reasonable for
        a three credit course like this one to require six hours of
        preparation <em>per week</em> in addition to the three hours you
        spend in the classroom.</p>

    </div>

    <h2><a class="target" id="textbook">Textbook</a></h2>
    <div class="whitebox">

      <p>There is one required textbook for the course, <em>Computer
      Organization and Design: The Hardware/Software Interface, Third
      Edition</em> by David A. Patterson and John L. Hennessy
      (Morgan-Kaufmann, 2004)</p>

      <p>We will be covering Chapters 3-7 plus Appendix B in the
      course.  Note that Appendix B is on the CD for the book, not in
      the printed part.</p>

      <div class="notice"> <p>Be sure to check my <a
      href="../errata.php">list of errata</a> for the book before you
      read the assignments!</p> </div>

    </div>

    <div id="footer">
      <hr />
      <p>Validate this page: 
        <a href="http://validator.w3.org/check?uri=referer">
          <strong>XHTML</strong></a>&nbsp;
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
          <strong>CSS</strong></a>
      </p>
    </div>
  </div>

</body></html>

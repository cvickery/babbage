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

  <title>CS-081 Spring 2006</title>

  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="../../css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="../../courses/css/style-screen.css" />
</head>
<body>

  <div id="header">
    <h1>CS-081 HTML and Web Programming</h1>
    <h2 id="section">Section AT3FA (2935) &ndash; Spring 2006</h2>
    <h2>Dr. Christopher Vickery</h2>
  </div>
  
  <div id="content">

    <h2>Assignments</h2>
    <div class="whitebox">

      <p>In general, course topics will be covered in the same sequence as
      the textbook chapters.  It is critical that you study each chapter
      before we cover the corresponding topic in class.</p>

      <p>Other assignments are listed here:</p>

      <ul>

        <li><strong>Due May 25.</strong> <a
        href="Assignments/Assignment_08.php">Assignment 8</a></li>

        <li>Study the <a href="../Javascript_Tutorial">Javascript
        Tutorial</a></li>

        <li><strong>Due May 2.</strong> <a
        href="Assignments/Assignment_07.php">Assignment 7</a></li>

        <li><strong>Due April 11.</strong> <a
        href="Assignments/Assignment_06.php">Assignment 6</a></li>

        <li><strong>Due March 28.</strong> <a
        href="Assignments/Assignment_05.php">Assignment 5</a></li>

        <li><strong>Midterm Exam March 24</strong></li>

        <li><strong>Due March 14.</strong> <a
        href="Assignments/Assignment_04.php">Assignment 4</a></li>

        <li><strong>Due March 7.</strong> <a
        href="Assignments/Assignment_03.php">Assignment 3</a></li>

        <li><strong>Due February 17.</strong> <a
        href="Assignments/Assignment_02.php">Assignment 2</a></li>

        <li><strong>Due February 10.</strong> <a
        href="Assignments/Assignment_01.php">Assignment 1</a>.</li>

        <li><strong>Due Immediately.</strong> Send an email message to me
        with the string, &ldquo;CS-081 Contact Information&rdquo; as the
        subject.  (Omit the quotes.)  In the body of your message, put your
        name and your 4-digit college ID number.  See the <a
        href="/contact_info.php">Contact Information</a> web page for my
        email address.<br /> Be sure the email address you send your message
        from is one that you will be using regularly this semester.  I will
        add that address to my spam filter&rsquo;s &ldquo;whitelist&rdquo;
        so you will be able to send messages to me during the course.  In
        addition, I will add that address to the mailing list for the
        course, which I will use to send out administrative messages about
        the course during the term. Finally, I will also verify the email
        address when you join the <a
        href="http://babbage.cs.qc.edu/Fora/Courses/index.php?c=2">discussion
        forum for the course</a>.<br />If you want to use multiple email
        addresses, send me a separate message from each one you want to
        use.</li>

      </ul>

    <h2>Administrivia</h2>
    <div class="whitebox">
      <ul>

        <li><strong><a href="calendar.php">Calendar</a>: </strong>Class
        meeting dates, topics covered, and assignments.</li>

        <li><strong><a
        href="http://babbage.cs.qc.edu/Fora/Courses/index.php?c=2">Discussion
        Forum</a></strong>: I encourage you to join the course discussion
        forum, which is open only to students registered in my courses.  The
        main purpose of the forum is to exchange help on the assignments and
        in preparing for exams.  I will award a small course grade bonus to
        students who participate actively in the forum &mdash; posting
        questions, and especially posting answers!</li>

        <li><strong><a href="check_grades.php">Check Grades</a>:
        </strong>Follow the link, enter your 4-digit student ID, and see
        what grades I have recorded for you so far this semester. 
        <strong>Note:</strong> exam and assignment grades become permanent
        two weeks after they are posted, so be sure to check your grades
        regularly to make sure there are no mistakes.</li>
        
        <li><strong>Class Meetings: </strong> Tuesdays and Fridays 10:50 am
        to 12:05 pm.  SB B-145.</li>

        <li><strong><a href="../index.php">Course Description</a>: </strong>
        Follow the link for a summary of what the course will cover.</li>
        
        <li><strong>Textbook: </strong>See the course description.  The
        textbook is <em>required</em> for the course.  You will need your
        own copy because the reading assignments are a crucial part of the
        course.</li>
        
        <li><strong><a href="/contact_info.php">Office Hours</a>:
        </strong>Tuesdays and Fridays from 12:15 to 1:15 pm.  Follow the
        link for more contact information.</li>
        
        <li><strong>Exams and Assignments: </strong>There will be a midterm
        and a final exam.  Each exam will count 40% of your course grade. 
        The remaining 20% of your grade will be based on the programming
        assignments.  Each programming assignment you submit will be graded
        as &ldquo;ok&rdquo; (full credit) or &ldquo;not ok&rdquo; (half
        credit).  It is all right to get help on the assignments any way you
        wish.  But your assignments must be correct to receive full credit. 
        Furthermore, the exams will test how well you know the techniques
        covered by the assignments.  So even if you get a lot of help on the
        assignments, you still have to be able to do them on your own in the
        end.</li>

      </ul>

    </div>

    </div>
  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="../../../">Vickery Home</a>&nbsp;-&nbsp;
      <a href="..">CS-081 Course Home Page</a>&nbsp;-&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("Y-m-d", filemtime("index.php"));
      ?>.</em>
    </p>
  </div>
</body>
</html>


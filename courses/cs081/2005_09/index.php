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

  <title>CS-081 HTML &amp; WWW Programming</title>

  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="../../css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="../../css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
        href="../../css/style-print.css" />

</head>

<body>

<div id="header">
  <h1>CS-081 HTML &amp; WWW Programming</h1>
  <h2>Section 1T3FA (2978)</h2>
  <h3>SB D-133 Tue &amp; Fri 1:40 - 2:55 pm</h3>
</div>

<div id="body">
  <div class="whitebox">
    <h2><a href="../molly_errata.php">Errata For the Textbook</a></h2>
    <div class="whitebox">
      <p>There are some mistakes in the textbook that I've found.  Let
      me know if you find others.</p>
    </div>
    <h2><a href="./Assignments">Class Meetings and
    Assignments</a></h2>
    
      <div class="whitebox">
        <p>The link above takes you to the course calendar for the
        semester.  I'll be updating it as I make new assignments.</p>
      </div>
    
    <h2><a href="./check_grades.php">Check Grades</a></h2>

      <div class="whitebox">
        <p>The link above takes you to a page where you can find out
        what grades I have recorded for you so far this semester. 
        It's a good idea to monitor this information regularly so you
        can catch any mistakes early.  The report you get will tell
        you the date and time when I last updated the information on
        the web, so don't panic if you don't see your grade for
        something that I graded more recently than that timestamp.</p>
      </div>  

    <h2>Course Discussion Forum</h2>

  <div class="whitebox">
      <p>You can use the discussion forum to post questions and
      answers relating to any aspect of the course.  You can help each
      other with homework assignments here, and by making your help
      public, everyone in the class can contribute suggestions or
      alternate approaches.  That way everyone benefits.  I will read
      the messages posted here and sometimes post my own responses. 
      But in general, the forum is intended as a medium of exchange
      among students.</p>
      
      <p>Anyone can read the messages on the forum, but you have to
      register to be able to reply to anything or to post new
      messages.  Please use the same email address you sent me for use
      in the class mailing list when you register.</p>
      
      <p>To encourage you to use the discussion board, I'm giving 2
      points extra credit on your course average if you register on
      the forum, and an unspecified number of extra credit points if
      you post questions and/or answer questions on it.  (I haven't
      figured out how many points to award for forum participation
      yet.</p>
    </div>

    <h2><a href="../">Course Description</a></h2>
    <div class="whitebox">
      <p>Click on the link above to see a description of the
      course.</p>
    </div>
      
  </div>
</div>

<div id="footer">
  <hr />
  <p> <a href="../../../">Vickery Home</a>&nbsp;
      <a href="../">Course Home</a>&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a></p>
</div>
</body></html>

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

<head><title>CS345/780 Logic Design Lab</title>

  <link rel="shortcut icon" href="/courses/cs345/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="/courses/css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="/courses/css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
        href="/courses/css/style-print.css" />

</head>

<body>

<div id="header">
  <h1>CS345/780 Logic Design Lab</h1>
    <p class="center">Section AT4FA (3025/3026)</p>
  <h2>Meeting Times and Places</h2>
    <pre style="margin-top: -3em;">
       Tue  9:15-10:05  SB A-103
       Tue 10:15-12:05  SB A-227
       Fri 10:15-12:05  SB A-227
    </pre>

</div>

<div id="body">
  <div class="whitebox">

    <h2><a href="./Assignments#now">Class Meetings and
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

    <h2><a href="../Manuals">Manuals</a></h2>
      <div class="whitebox">
        <p>The manuals you need for the course are available on the
        computers in the lab.  The link above takes you to a page
        where you can get at copies from outside the lab.</p>
      </div>

    <h2>Course Discussion Forum</h2>

    <div class="whitebox">
      <p>You can use the discussion forum to post questions and
      answers relating to any aspect of the course.  You can help each
      other with laboratory assignments here, and by making your help
      public, everyone in the class can contribute suggestions or
      alternate approaches.  That way everyone benefits.  I will read
      the messages posted here and sometimes post my own responses. 
      But in general, the forum is intended as a medium of exchange
      among students.</p>

      <p>Anyone can read the messages on the forum, but you have to
      register to be able to reply to anything or to post new
      messages.  Please use the same email address you sent me for use
      in the class mailing list when you register.</p>
      
      <p><strong>Note:</strong> There is also a <a
      href="http://www.doc.ic.ac.uk/~akf/handel-c/cgi-bin/forum.cgi">
      world-wide Handel-C forum</a> sponsored by Celoxica and run from
      Imperial College in London.  This is a great resource not only
      because you get people from all over the world responding to
      your questions, but also because the folks from Celoxica have
      been known to contribute answers here as well.</p>

    </div>
  </div>
</div>

<div id="footer">
<hr />
  <p class="links"> <a href="/">Vickery Home</a>&nbsp;
      <a href="..">Course Home</a>&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a></p>
</div>
</body></html>

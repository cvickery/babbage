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

  <title>CS-343 Assignment 0</title>

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

  table {
    border:           1px solid green;
    text-align:       center;
    width:            15em;
    }

  th {
    background-color: #ccc;
    color:            #000;
    vertical-align:   bottom;
    border:           1px solid black;
    padding:          0.5em;
    }

  fieldset {
    width:            60%;
    }

  .whitebox {
    margin:           1em 0 1em 2em;
    }

  </style>
</head>

<body>

  <div id="header">
    <h1>CS-343 Assignment 0</h1>
  </div>

  <div id="content">
    <h2>Assignment</h2>
    <div class="whitebox">

      <p>Send an email message to me with the string, &ldquo;CS-343 Contact
      Information&rdquo; as the subject.  (Omit the quotes.)  In the body of
      your message, put your name and your 4-digit college ID number.  See
      the <a href="/contact_info.php">Contact Information</a> web page for
      my email address.<br /> Be sure the email address you send your
      message from is one that you will be using regularly this semester.  I
      will add that address to my spam filter&rsquo;s
      &ldquo;whitelist&rdquo; so you will be able to send messages to me
      during the course.  In addition, I will add that address to the
      mailing list for the course, which I will use to send out
      administrative messages about the course during the term. Finally, I
      will also verify the email address when you join the <a
      href="http://babbage.cs.qc.edu/Fora/Courses/index.php?c=3">discussion
      forum for the course</a>.<br />If you want to use multiple email
      addresses, send me a separate message from each one you want to
      use.</p>

    </div>

    <h2>Due Date</h2>
    <div class="whitebox">
    
      <p><strong>Immediately!</strong>  If you want to add more email
      addresses to my whitelist or mailing list, or if your email address
      changes during the semester, repeat this assignment as necessary.</p>

    </div>
  </div>
  
  <div id="footer">
  <hr />
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="../../">CS-343 Home</a>&nbsp;-&nbsp;
      <a href="../">CS-343 Spring 2006</a>&nbsp;-&nbsp;
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

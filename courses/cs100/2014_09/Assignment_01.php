<?php
  $this_dir       = opendir('.');
  $this_link      = '';
  $this_year      = '';
  $this_term      = '';
  $this_notes     = '';
  while ($dir_entry = readdir($this_dir))
  {
    if (is_dir($dir_entry) && preg_match('/(\d{4})_(\d{2})/', $dir_entry, $year_term))
    {
      $this_year      = $year_term[1];
      $this_term      = ($year_term[2] === '02') ? 'Spring' : 'Fall';
      $this_link      = $dir_entry;
      $this_notes     = "$this_year-{$year_term[2]}_Notes.php";
    }
  }
  header("Vary: Accept");
  if (array_key_exists("HTTP_ACCEPT", $_SERVER) &&
  stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml") ||
  stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator")
  )
  {
    header("Content-type: application/xhtml+xml");
    header("Last-Modified: "
    . date('r', filemtime($_SERVER['SCRIPT_FILENAME'])));
    print ("<?xml version=\"1.0\" encoding=\"utf-8\"
  ?>
  \n");
  }
  else
  {
    header("Content-type: text/html; charset=utf-8");
  }
?>
<!DOCTYPE html PUBLIC
          "-//W3C//DTD XHTML 1.1//EN"
          "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>The Setup Assignment</title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/assignments.css" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/assignments-print.css" />
  </head>
  <body>
    <h1>CSCI 100 Assignment 1</h1>
    <h2>“The Setup”</h2>
    <div>
    <p>
      <a href='http://usesthis.com'>The Setup</a> is a website that publishes highly structured
      interviews with people, usually people involved in technology. The interview always consists
      of the same four questions:
    </p>
    <ol>
      <li>Who are you and what do you do?</li>
      <li>What hardware do you use?</li>
      <li>And what software?</li>
      <li>What would be your dream setup?</li>
    </ol>
    <p>
      This assignment is in three parts, the first of which is to visit the web site and read at least
      five of the interviews. While you are there, click on the “Interviews” link on the left and
      look at the topics used to tag the interviews.
    </p>
    <p>
      The second part is to think about the interviews you see. Some things to consider include:
    </p>
    <ul>
      <li>
        How do the things these people do relate to your ideas about working in technology
        related fields. Are there things that seem appealing to you, or unappealing? Can you
        say why?
      </li>
      <li>
        People come in all flavors: gender; age; religion; ethnicity; interests; politics;
        psychological state, etc.
        Think about what “flavors” you identify with and how those identities align, or not, with
        the people whose interviews you read.
      </li>
    </ul>
    <p>
      Finally, write out your own interview to answer the four questions. But since by definition
      everyone in the class is a Queens College freshman, answer the first question by telling
      what you are thinking about studying here. Use your thoughts about technology and people
      “flavors” as you write this section of your interview.
    </p>
    <p>
      Notice the writing style of the interviews on The Setup, and try to follow that style as
      best you can. That is, think of this as a piece written for “the public” even though no one
      but Dr. Vickery will actually read it. You may be asked to share all or part of your interview
      with others in the class, but sharing will not be required.
    </p>
    <p>
      Write out your interview as a word processing document, and submit it as an attachment to <a
      href="mailto:christopher.vickery@qc.cuny.edu?subject=CSCI 100 The Setup Assignment">Dr.
      Vickery</a> by midnight on the due date (September 4).
    </p>
    </div>
    <div id="footer">
      <a href='./syllabus.php'>Syllabus</a> - <a href='./index.php'>Course Schedule</a>
    </div>
  </body>
</html>


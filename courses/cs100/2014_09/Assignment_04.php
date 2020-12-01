<?php
  $mime_type = "text/html";
  $html_attributes="lang=\"en\"";
  if ( array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml") ||
         stristr($_SERVER["HTTP_ACCEPT"], "application/xml") )
       ||
       (array_key_exists("HTTP_USER_AGENT", $_SERVER) &&
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator"))
     )
  {
    $mime_type = "application/xhtml+xml";
    $html_attributes = "xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\"";
    header("Content-type: $mime_type");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  }
  else
  {
    header("Content-type: $mime_type; charset=utf-8");
  }
?>
<!DOCTYPE html>
<html <?php echo $html_attributes;?>>
  <head>
    <title>Assignment 4</title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/assignments.css" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/assignments-print.css" />
    <style type='text/css'>
    blockquote {
      line-height:1.4em;
      margin: 1em 5em;
      padding:1em;
      border: 1px solid black;
      border-radius:0.25em;
      text-align:justify;
    }
    .code-block, li {
      line-height:1.5em;
    }
    .text-image {
      height: 1em;
      border:none;
      display:inline;
    }
    .equation {
      text-align:center;
    }
    h3+* {border:none; margin-top:0;}
    </style>
  </head>
  <body>
    <h1>CSCI 100 Assignment 4</h1>
    <h2>Instructions</h2>
    <div>
      <p>
        Use the first two links below to access two documents related to the current lab
        assignments. When you get to either document, you will see a cursor that says “You are
        suggesting”. You <em>could</em> edit the document. But instead, use the <code>Comments
        </code> button in the upper right, and add comments/questions to the documents. If you
        make a real contribution to the discussion about the documents, even if it’s just a
        question, your Takeaway for October 7 will be eligible for an upgrade from “ok” to “good”
        (extra credit).
      </p>
      <p>
        The third link below is to a lesson consisting of a 10-minute video and a set of questions
        about it. Answer all the questions to receive an “ok” for this assignment, which will count
        the same as an-class quiz. Explore the “Dig Deeper” section; you may find material there
        that gives you ideas for a paper that you could write for this course. (I plan to change
        the course requirements to allow you to substitute a paper for the final Arduino project.)
      </p>
      <blockquote>
        <strong>Note: Be sure to use your real name when you sign into the lesson in
          order to receive credit for the assignment.</strong>
      </blockquote>
      <p>
        There is a “Discuss” section at the end of the lesson. Students started a discussion
        thread here last semester. If you contribute (meaningfully) to this segment of the assignment,
        you can receive a grade of “good” (extra credit) for this assignment.
      </p>
      <ul>
        <li>
          <a href='https://docs.google.com/document/d/1PhbZM8tPH_fCJrCuhycaVgg3uShZaGSCo73Bat58H0c/edit?usp=sharing'>
          Analog LED Brightness Setup</a>
        </li>
        <li>
          <a href='https://docs.google.com/document/d/1DXQOC5AIPcq6tfdPCAgINH3vPK4Kf6J6AkC9bCahllY/edit?usp=sharing'>
            PWM LED Brightness Setup</a>
        </li>
        <li>
          <a href='http://ed.ted.com/on/6vc6TFFz'>
            TED-Ed Lesson on Information and Communication
          </a>
        </li>
      </ul>
      <p>
        Thanks to Lizandra for creating the TED-Ed lesson!
      </p>
      <h3>Addendum</h3>
      <div>
        <p>I've written an essay about
          <a href='https://docs.google.com/document/d/1dFhbwq5lYYSspdY-caQChZqjUJJtFJ88PLqfNiL0Ygo/edit?usp=sharing'>
          Beautiful Code</a> in which I chronicle my effort to make my code for the SOS Speed
          project more beautiful. I invite you to read it and to comment on it. But please don’t
          expect to understand the code. It’s much more complicated than you should be able to deal
          with at this point. But I hope the ideas in the essay make some sense as we wrestle with
          the idea of the beauty of code and using code to communicate with both computers and
          people.
        </p>
      </div>
    </div>
    <div id="footer">
      <a href='./syllabus.php'>Syllabus</a> - <a href='./index.php'>Course Schedule</a>
    </div>
  </body>
</html>


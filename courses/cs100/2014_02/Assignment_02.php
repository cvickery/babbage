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
    <title>CSCI 100 Assignment 2</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/assignments.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="print"
          href="../../css/assignments-print.css"
    />
  </head>
  <body>
    <h1>CSCI 100 Assignment 2</h1>
    <h2>Special Class March 4, 2014</h2>
    <div>
      <p>
        I will be attending a workshop on Tuesday, March 4, and Lizandra Friedland will be conducting the class on my behalf.
        Contrary to what I announced when we met in the lab on February 27, this class will meet in the regular classroom,
        SB A-141, not in the lab. (I had forgotten that the workshop will be March 4 when I made that announcement.)
      </p>
      <p>
        To prepare for the class, answer the questions on the “Filter Bubble” video that I have posted at the ed.ted.com web
        site: <a href='http://ed.ted.com/on/HW6W83pm'>Beware online “filter bubbles”</a>. Be sure to log in before answering
        your questions so you will receive credit for answering them.
      </p>
      <p>

        Note that one of the questions requires a written answer. You may leave that question blank online, but you must
        bring your written answer to class on March 4; it will count as part of your "brief quiz" for that class.

      </p>
      <p>

        <strong>Extra Credit</strong>There is a “Discuss” part of the ed.ted.com lesson where you can discuss the
        question you are to answer for class. I’ve started two discussion threads there as starting points. You can
        receive an extra point for the course (like an extra ‘t’ or ‘q’) by participating in those discussions before
        the class.

      </p>
    </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>

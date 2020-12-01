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
    <title>CSCI 100 Assignment 4</title>
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
    <h1>CSCI 100 Assignment 4</h1>
    <h2>Information Theory TED Talks</h2>
    <div>
      <p>
        For Tuesday, March 25, your assignment is to view a TED-ed lesson that Lizandra Friedland prepared:
        <a href='http://ed.ted.com/on/6vc6TFFz'>On Information and Communication</a>. Be sure to log in to the
        site so your answers will be recorded.
        Answer all the short answer questions and the two longer questions before class.
      </p>
      <p>
        Be sure to look at the references in the “Dig Deeper” section of the lesson for material that should
        give you some ideas as you develop your term paper for the course.
      </p>
      <p>
        Lizandra has prepared another TED-ed lesson on information theory that can also help you prepare for the
        term paper. The video is an hour-long program produced by the BBC, and because of
        its length so we are making it an optional
        assignment. You can get extra credit for doing the assignment (equivalent to the credit for the required
        one) if you answer all the questions. In this case you will need to send me an email telling me you are
        submitting the assignment. The cutoff date for submitting it is April 10, the last class before Spring
        Break. The lesson is at <a href='http://ed.ted.com/on/yvQUmOsA'>The Story of Information</a>.
      </p>
      <p>
        But remember, the purpoe of both videos is to help you get started in thinking about your term paper
        topic.
      </p>
      <p>
        Finally, I promised to provide a link to the videos on digital-analog conversions. They are at
        <a href='https://wiki.xiph.org/Videos/Digital_Show_and_Tell'>Xiph.org</a>.
      </p>
    </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>

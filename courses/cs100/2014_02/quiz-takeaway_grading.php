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

    <title>Quiz/Takeaway Grading</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/style-all.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="screen"
          href="../../css/style-screen.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="print"
          href="../../css/style-print.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/calendar.css"
    />
  </head>

  <body>
    <h1>Brief Quizzes and Takeaways</h1>
    <div class='whitebox'>
      <h2>Points for in-class written exercises</h2>
      <p>
        Most class meetings start with a “brief quiz” to check whether you have done
        the reading/video assignments for the day, and thus are prepared to participate
        in the class (or not). All classes include a "takeaway" exercise at the end in
        which you write one-two sentences giving your response to the class. The “response”
        should tell what you found interesting, confusing, or edifying about the class.
      </p>
      <p>
        Neither of these daily exercises affects your grade for the course very much, but across the
        semster, they do add up to count 10% of your course grade. Here is how they are scored:
        The basic score for each is an “ok” or checkmark, each of which is worth one point. So
        if your brief quiz is okay and you submit a takeaway, you will get two points per class.
        There are 28 class meetings per semester, but there will be full quizzes, a midterm exam,
        and a final exam that will all reduce the number of brief quizzes and takeaways that
        you will submit. But to work with round numbers, we’ll say there are 50 points you could
        possibly get for your brief quizzes and takeaways. That means that each quiz/takeaway
        point will count just 10% ÷ 50 = 0.2% of your final course grade.
      </p>
      <p>
        But wait, there’s more!
      </p>
      <p>
        Sometimes a brief quiz is not quite right but not totally wrong. In that case you can still
        get half a point for the quiz. Or you might hand in a takeaway that doesn’t really say
        anything. “The class was very nice” would be an example. In that case, too, you would get
        half a point instead of a full point. On the other hand it’s sometimes possible to get extra
        credit for a quiz or takeaway by answering the question particularly well, or by submitting
        a takeaway that is particularly insightful or asks a particularly interesting question. In
        those cases you can get extra credit, typically half a point each.
      </p>
      <h2>Check your grades</h2>
      <p>
        When I enter the grades, I will use the letters t and q to indicate your takeaway and brief quiz
        scores for the day, with + or minus for extra credit or deficiency. So tq is two points; tq- is
        1.5 points (full credit for the takeaway but deficient quiz), t+q+ is 3 points (extra credit for
        both the takeaway and the quiz), etc. Every two weeks or so, I’ll add up all your points to date
        and replace the individual daily scores with a running sum for the semester. So be sure to check
        your grades regularly to make sure they get recorded properly. Once they’ve been collapsed into
        a sum, there is no way to change them.
      </p>

    </div>
    <div id="footer">
      <a href="http://validator.w3.org/check?uri=referer">XHTML</a>—<a
         href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">CSS</a>
    </div>
  </body>
</html>

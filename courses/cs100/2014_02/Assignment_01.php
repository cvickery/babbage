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
    <title>CSCI 100 Assignment 1</title>
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
    <h1>CSCI 100 Assignment 1</h1>
    <h2>Course Administration and Introduction</h2>
    <div>
      <p>
        This course is intended as a General Education course, and satisfies either the NS requirement
        under the Perspectives (PLAS) curriculum or the SW requirement under the Pathways structure. General
        Education courses generally serve to introduce students to a discipline, to show how the discipline
        relates to other disciplines within the Liberal Arts and Sciences.
      </p>
      <p>
        This course is also offered as part of a Freshman "Learning Community" during the Fall semester. Students
        register for this course and a corresponding section of English 110, and the two courses coordinate with
        each other to some extent.
      </p>
      <p>
        But this is the Spring term, not the Fall, and only two freshmen are enrolled in the course. Furthermore, three-quarters
        of the people in the class are Computer Science majors or minors (or both). It’s a challenge, but I intend to make the
        course valuable and useful for everyone from first year students who have not selected a major yet to fifth year students
        nearing completion of the CSCI major. As you answer the questions in the second part of this assignment you will see the
        this approach start to play out.
      </p>
      <h3>The assignment is in two parts:</h3>
      <p>
        <strong>I.</strong> The first part is to print out and fill in
        this <a href='Contact_Agreement.pdf'>Contact Agreement</a> telling how you want
        us to contact you when there are announcements for the course. It is so critical
        for you to keep up with the course between classes that we are requiring you to
        provide us with your contact information on an “opt-in” basis.
        You may provide an email address (not necessarilty the one you have on file with
        the University), provide a phone number for text messages, or follow the course
        on Twitter or Facebook.
      </p>
      <p><strong>If you don’t agree to at least one of the contact options by February 4,
        your grade for the course will automatically be reduced by 10%!</strong>
      </p>
      <p>
        <strong>II.</strong>
        The second part of the assignment is to answer the following questions. You must submit
        this part <a href='mailto:Christopher.Vickery@qc.cuny.edu?subject=Assignment%201'>by email</a>
        and you must be prepared to discuss the answers in class on January 30.
        </p>
        <p>
          Answer these questions after reviewing <a href="..">the syllabus for the course</a> and
          viewing/reading <a href='.#now'>the video and article assignments for January 30</a>.
        </p>

        <ol>
          <li>How much will the final exam count towards your course grade?</li>
          <li>Might this percentage change at some point?</li>
          <li>What activity will begin each class?</li>
          <li>What will you hand in at the end of each class?</li>
          <li>
            What do you think the goal of the video is, and did it achieve that
            goal for you? Explain why or why not.
            <ol>
              <li>
                If you are not a computer science major or minor, did you find the video informative?
              </li>
              <li>
                What was your reaction to it?
              </li>
            </ol>
            <ol>
              <li>
                If you are a computer science student, did you find the video to be accurate?
              </li>
              <li>
                Do you think it would help attract non-majors to computer science?
              </li>
            </ol>
          </li>
          <li>
            Answer Question 5 for the “What is Computer Science” article.
          </li>
        </ol>
  </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>

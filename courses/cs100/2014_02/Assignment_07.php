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
    <title>CSCI 100 Assignment 7</title>
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
    <style type="text/css">
    h3 { font-size: 1em; }
    .outline       { list-style-type: upper-roman; }
    .outline ol    { list-style-type: upper-latin; }
    .outline ol ol { list-style-type: decimal;     }
    </style>
  </head>
  <body>
    <h1>CSCI 100 Assignment 7</h1>
    <h2>Paper/Project Outline</h2>
    <div>
      <p>
        This assignment, due by midnight on May 8, is to submit an outline of your term paper or a
        development plan for your term project. This web page gives more details about what is expected
        in these two artifacts.
      </p>
      <h3>Term Paper Outline</h3>
      <div>
        <p>
          You are required to decide what you are going to write about, and what points you intend to
          cover <em>before</em> you start writing. You may well have already prepared a draft of your
          paper, but you are to submit a logically structured outline of the paper now. If you have
          already written parts of it, you may find you will have to reorganize what you have already
          written so it matches the structure of your outline.
        </p>
        <p>
          The top-level struture of your outline is standard:
        </p>
        <ol class='outline'>
          <li>Introduction</li>
          <li>Body</li>
          <li>Conclusion</li>
        </ol>
        <p>
          For this assignment you are to add another level to the outline:
        </p>
        <ol class='outline'>
          <li>Introduction
            <ol>
              <li>Context</li>
              <li>Topic Sentences</li>
            </ol>
          </li>
          <li>Body
            <ol>
              <li>Title of first topic</li>
              <li>Title of second topic</li>
              <li>&#x2026;</li>
              <li>Title of last topic</li>
            </ol>
          </li>
          <li>Conclusion
            <ol>
              <li>You don’t have to outline this part of the paper</li>
            </ol>
          </li>
        </ol>
        <p>
          We went over this struture in class on May 6. You can get a copy of the handout from that
          class at
          <a href='http://www.unwsp.edu/c/document_library/get_file?uuid=a208956c-88e0-46db-a445-87686aadbe72&amp;groupId=2273328'>
          The University of Northwestern </a>.
        </p>
        <p>
          If you are unsure how to proceed, you may
          do <a href='http://ed.ted.com/on/qNuI3O0H'>the TED-Ed lesson that Lizandra prepared</a>.
          This lesson is not required,
          but will count as an extra-credit “brief quiz” assignment for the course if you complete
          it <em>before</em> Tuesday May 13.
        </p>
      </div>
      <h3>Arduino Project Design Plan</h3>
      <div>
        <p>
          Unlike a term paper, an Arduino project is likely to involve some
          experimenting before actually building the final project. “Prototyping” is the word
          for making this sound as important an activity as it actually is.
          Nonetheless, you need to have an idea ahead of time of what you hope to build and
          how you pland to do the development. Like the outline of a term paper, the Design Plan
          lays out the logical structure of what you plan to do. However, instead of a formal
          outline structure, your project plan can be an ordered set of short paragraphs.
        </p>
        <ul>
          <li>
            The opening paragraph gives the overview and context of the project. Given unlimited
            time and resources, what would you build? In the same paragraph, tell how much of
            this project you think you actually will be able to complete.
          </li>
          <li>
            Next, tell what you will need to learn about Arduino hardware in order to implement
            your project. We understand that this part of the project may require a significant
            portion of the effort that you put into it.
          </li>
          <li>
            Finally, indicate the sequence of steps you will go through to actually build the
            project once you have become proficient with the parts you will be using. How will
            your team handle the relationships between the hardware and software? How will
            you structure the development so that “something” is working at each stage of
            development? We know there will probably not be enough time to do everything, so
            you need to plan ahead to have something at the end to show for your effort rather
            than a lot of “stuff” that doesn’t work.
          </li>
        </ul>
        <p>
          If you are working in a group, only one copy of your design plan needs to be submitted
          for the whole group.
        </p>
      </div>
    </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>

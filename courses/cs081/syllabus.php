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

  <title>CS-081 Syllabus</title>

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
  <!-- Styling for this page only -->
  <style type="text/css" media="all">
  th {
    background-color: #eee;
    color:            #000;
    }
  td {
    background-color: #ffe;
    color:            #000;
    }
  </style>

</head>

<body>

  <div id="header">

    <h1>CS-081 Syllabus</h1>
    <h2>Dr. Vickery</h2>

  </div>

  <div id="content">

    <div class="whitebox">

      <p>All reading assignments are in the text for the course,
      <cite>Spring into HTML and CSS</cite> by M. E. Holzschlag
      (Addison-Wesley, 2005).</p>

      <p>The text has some typographical errors (&rsquo;errata&rdquo;), and
      I have prepared a <a href="./molly_errata.php">list of the ones I have
      found</a>.  I suggest you go through the errata list and write in all
      the needed changes in your copy of the book before you start
      studying.  Let me know if you find more, and I&rsquo;ll update the
      list.</p>
      
      <p>In addition to the reading assignments listed here, there will be
      a series of homework assignments to hand in.  Consult the web page for
      this semester for those assignments and their due dates.</p>

    </div>

  <hr />

    <div class="whitebox">

      <table summary="List of topics and reading assignments for the course.">
      <tr>
        <th scope="col">Topic</th>
        <th scope="col">Reading Assignments</th>
      </tr>

      <tr>
        <td>Course Introduction: Laboratory Facilities and Web Standards</td>
        <td>Chapter 1</td>
      </tr>

      <tr>
        <td>Text, Links, and Lists</td>
        <td>Chapter 2</td>
      </tr>

      <tr>
        <td>Images, Media, and Scripts</td>
        <td>Chapter 3</td>
      </tr>

      <tr>
        <td>Tables</td>
        <td>Chapter 4</td>
      </tr>

      <tr>
        <td>DOM and Javascript Concepts</td>
        <td></td>
      </tr>

      <tr>
        <td>Introduction to CSS</td>
        <td>Chapter 7</td>
      </tr>

      <tr>
        <td>Colors and Backgrounds</td>
        <td>Chapter 8</td>
      </tr>

      <tr>
        <td><strong>Midterm Exam</strong></td>
        <td>A copy of last semester&rsquo;s first exam will be available in
        the restricted part of this semester&rsquo;s web site.</td>
      </tr>

      <tr>
        <td>CSS Box Model</td>
        <td>Chapter 11</td>
      </tr>

      <tr>
        <td>Styling Text</td>
        <td>Chapter 9</td>
      </tr>

      <tr>
        <td>Accepting User Input</td>
        <td>Chapter 5</td>
      </tr>

      <tr>
        <td>Dynamic HTML and Dynamic CSS</td>
        <td></td>
      </tr>

      <tr>
        <td><strong>Final Exam</strong></td>

        <td>A copy of last semester&rsquo;s final exam will be available in
        the restricted part of this semester&rsquo;s web site.</td>

      </tr>

      </table>

    </div>

  </div>

  <div id="footer">
    <p>
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="/courses/cs081">CS-081 Home</a>&nbsp;-&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("Y-m-d", filemtime("syllabus.php"));
      ?>.</em>
    </p>
  </div>

</body>
</html>

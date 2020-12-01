<?php
  header("Vary: Accept");
  if (  array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml") ||
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator")
      )
  {
    header("Content-type: application/xhtml+xml");
    header("Last-Modified: "
                    .gmdate('r',filemtime($_SERVER['SCRIPT_FILENAME'])));
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

  <title>CS-343 Syllabus</title>

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

    <h1>CS-343 Syllabus</h1>
    <h2>Dr. Vickery</h2>

  </div>

  <div id="content">

    <hr />

    <div class="whitebox">

      <p>All reading assignments, except the Background Material listed for
      the first assignment, are in the text for the course, <cite>Computer
      Organization and Design, <strong>Third Edition</strong></cite> by D.
      Patterson and J. Hennessy (Morgan Kaufmann, 2004).  The third edition
      is quite different from earlier ones, so be sure to get the right
      one.</p>

      <p>The first printing of the book has quite a few typographical and
      other errors (&ldquo;<em>errata</em>&rdquo;).  Some of these might
      have been corrected in successive printings.  The <a
      href="http://www.mkp.com/companions/1558606041">companion web site for
      the book</a> has an &ldquo;official&rdquo; errata list, but I suggest
      you also use <a href="./errata.php">my list of errata for the
      book</a>.  Go through the errata lists and write in all the needed
      changes in your copy of the book before you start studying.</p>

    </div>

  <hr />

    <div class="whitebox">

      <table summary="List of topics and reading assignments for the course.">
      <tr>
        <th scope="col">Topic</th>
        <th scope="col">Reading Assignments</th>
      </tr>

      <tr>
        <td>Review of Assembly Language and Combinational Logic</td>
        <td><a href="Background_Material.pdf">CS-343 Background Material</a>
          <br />Chapters 1 and 2.
          <br />Appendix B, Sections B.1 through B.6</td>
      </tr>

      <tr>
        <td>Sequential Logic</td>
        <td>Appendix B, Sections B.7 through B.13</td>
      </tr>

      <tr>
        <td>ALU Design and Implementation</td>
        <td>Chapter 3, Sections 3.1 through 3.6</td>
      </tr>

      <tr>
        <td><strong>First Exam</strong></td>
        <td>A copy of last semester&rsquo;s first exam will be available in
        the restricted part of this semester&rsquo;s web site.</td>
      </tr>

      <tr>
        <td>Processor Performance</td>
        <td>Chapter 4.</td>
      </tr>

      <tr>
        <td>Datapath and Control</td>
        <td>Chapter 5.</td>
      </tr>

      <tr>
        <td>Pipelining</td>
        <td>Chapter 6, Sections 6.1 through 6.6.</td>
      </tr>

      <tr>
        <td><strong>Second Exam</strong></td>
        <td>A copy of last semester&rsquo;s second exam will be available in
        the restricted part of this semester&rsquo;s web site.</td>
      </tr>

      <tr>
        <td>Memory Hierarchy</td>
        <td>Chapter 7, Sections 7.1 through 7.5.</td>
      </tr>

      <tr>
        <td>Storage and I/O</td>
        <td>Chapter 8, Sections 8.1, 8.2, and 8.4 through 8.6.</td>
      </tr>

      <tr>
        <td><strong>Final Exam</strong></td>
        <td>A copy of last semester&rsquo;s final exam will be available in the
        restricted part of this semester&rsquo;s web site.</td>
      </tr>

      </table>

    </div>

  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="/courses/cs343">CS-343 Home</a>&nbsp;-&nbsp;
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

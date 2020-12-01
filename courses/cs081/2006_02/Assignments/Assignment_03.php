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

  <title>CS-081 Assignment 3</title>

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

</head>

<body>

  <div id="header">
    <h1>CS-081 Assignment 3</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">
      <p>This assignment is an exercise in building tables.  Tables
      make sense for displaying any sort of information that has an
      inherent grid or matrix structure.  In the past they were also
      used to control the position of visual elements of web pages,
      but that use of tables has been replaced by Cascading Style
      Sheets (CSS), which we have not covered yet.  If you think of
      tables as two-dimensional lists you will be on the right track
      towards using them correctly.</p>
    </div>
    
    <h3>Description</h3>
    <div class="whitebox">

      <p>Start your web page by copying the course template into the <span
      class="fileName">index.php </span> file of a directory named <span
      class="fileName">Assignment_03 </span>.  Change the page title and the
      level 1 heading to &ldquo;Tables by ...&rdquo; with your name in place
      of the &ldquo;...&rdquo;.</p>

      <p>Change the &lt;h2&gt; for the content div to something meaningful,
      and inside the content div create a table with information about media
      you own and/or like, including books, movies, CDs, games, etc.  Create
      column headings for: the title of each item, the author or performer
      of the item, the media format (Book, CD, etc.), your numerical rating
      for the item (a number from 1 to 10), and your comments about the
      item.  Do not format the table in any way, but use &lt;th&gt; tags for
      the column headings, and use the scope attribute to indicate that they
      are column headings.  Your table is to have at least four rows.  Be
      sure to validate your code; you&rsquo;ll find there is a required
      attribute for tables in order to pass validation.  Use a meaningful
      value for that attribute in your code.</p>

      <p>Create a caption for your table using the &lt;caption&gt; tag.</p>
      
      <p>Add a footer row to your table.  Make the leftmost column be a
      header named Average Rating, make it span three columns, and use the
      scope attribute to indicate that it is a row header.  Put your average
      rating at the bottom of the proper column.  Leave the comments column
      for this row blank.</p>

      <p>Use the &lt;tfoot&gt;, &lt;thead&gt;, and &lt;tbody&gt; elements to
      structure your table properly, and be sure you used the scope
      attribute with the proper value for all your &lt;th&gt; tags.</p>

      <p>That&rsquo;s it!  Make sure you test your page carefully, make sure
      it validates correctly using the XHTML link at the bottom of the page,
      and let me know when it is ready for me to check.  Remember to put
      your name in the body of your email message, and use &ldquo;CS-081
      Assignment 3&rdquo; for the Subject.</p>

      <p><strong>Due Date:</strong> March 7.</p>
      
    </div>
  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="../..">CS-081 Home Page</a>&nbsp;-&nbsp;
      <a href="..">CS-081 Spring 2006</a>&nbsp;-&nbsp;
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

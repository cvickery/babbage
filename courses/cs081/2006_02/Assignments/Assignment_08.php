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

  <title>CS-081 Assignment 8</title>

  <link rel="shortcut icon" href="favicon.ico" />

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
<!--  Copy and paste:
        <p><span class="aq">Activity Question</span></p>
-->
<body>

  <div id="header">
    <h1>CS-081 Assignment 8</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">

      <p>This is your final assignment for the semester, and you are free to
      modify the basic requirements listed provided you check with me first.
       The basic idea is for you to demonstrate that you have masterd the
       basic techniques involved in structuring content, styling the
       content, and basic client-side programming.</p>

    </div>

    <h2>Requirements</h2>
    <div class="whitebox">

      <p>You are to design a multi-page web site.  It may implement any type
      of function you wish, such as a blog, discussion forum, shopping site,
      etc.  It must have a home page that serves as the starting point for
      users first visiting the site, and it must include at least one page
      that provides a form for users to fill out and submit.</p>

      <p>The site does not have to actually do anything in the sense that it
      will not connect to a database or involve any server-side
      programming.  But it must provide a well-styled user interface, and
      must include Javascript code that does something meaningful.</p>

      <p>Unlike other assignments this semester, which were graded either
      &ldquo;ok&rdquo; or &ldquo;not ok,&rdquo; this one will be graded on a
      ten point scale, and will count 10% of your course grade.</p>

      <p>The home page for your site is to be <span
      class="fileName">index.php </span> in a directory named <span
      class="fileName">Final_Assignment </span> in your My Web Pages
      directory.  Put any images that you use in an <span
      class="fileName">images </span> subdirectory, put your Javascript code
      in a <span class="fileName">scripts </span> subdirectory, and put your
      style sheet(s) in a subdirectory named <span class="fileName">css
      </span>.  Be sure your project works even if it is not installed in
      the web server&rsquo;s document root.  Be careful about upper/lower
      case file names: your project will be evaluated on a Unix system where
      case matters.</p>

      <p>Your site will be graded using the following criteria:</p>
      
      <ul>

        <li><strong>Site structure and navigation.</strong>  Does the home
        (index) page tell what the site is about?  Is there a logical
        structure to the different pages in the site that is clear to the
        user?</li>

        <li><strong>Visual Appeal.</strong>  Does the site use colors,
        images, text, and page layout to create an attractive and easy to
        understand presentation?  Are links clearly indicated and
        well-styled?</li>

        <li><strong>Form Validation.</strong>  There must be at least one
        form, and it must use Javascript to validate that all required
        fields have been filled in, that an email address is entered twice
        and that both copies agree with each other.  If you decide to build
        a site where that sort of form doesn&rsquo;t make sense, provide
        something of equivalent complexity, both in the design of the form
        and in the complexity of the Javascript.</li>

        <li><strong>W3C Validation.</strong>  As always, all parts of your
        project must validate as XHTML 1.1 strict, and all CSS must validate
        with no warnings and no errors.</li>

      </ul>

      <p>Dynamic effects, use of advanced layout techniques (floats, fixed
      positioning, etc.), and use of <span
      class="functionName">XMLHTTPRequest() </span> will all enhance your
      grade for the projct, but are not required in order to get a grade of
      8/10 for the assignment.</p>

    </div>

    <h2>Submit the Assignment</h2>
    <div class="whitebox">

      <p>The assignment is due by midnight <strong>May 25</strong> (the day
      of the final exam for the course).  If there is anything I should know
      about your web site that won&rsquo;t be obvious by starting at the
      home page, put a note in your email message when you submit the
      assignment.</p>

    </div>

  </div>

  <div id="footer">
    <p class="links">
      <a
        href="/">Vickery Home</a>&nbsp;-&nbsp;<a
        href="../..">CS-081 Home</a>&nbsp;-&nbsp;<a
        href="..">CS-081 This term</a>&nbsp;-&nbsp;<a
        href="http://validator.w3.org/check?uri=referer">XHTML</a>&nbsp;-&nbsp;<a
        href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME']));
      ?></em>
    </p>
  </div>
</body>
</html>

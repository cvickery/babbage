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

  <title>CS-081 Assignment 5</title>

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

  <style type="text/css" media="all">
    body {
      counter-reset:      aq;
      }

    .aq {
      background-color:   #cfc;
      color:              #303;
      }

    .aq:after {
      counter-increment:  aq;
      content:            " " counter(aq) ": ";
      }
  </style>
</head>

<body>

  <div id="header">
    <h1>CS-081 Assignment 5</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">

      <p>Finally, it&rsquo;s time to start using CSS to control the
      appearance (&ldquo;presentation&rdquo;) of your web pages!</p>

    </div>
    
    <h3>Description</h3>
    <div class="whitebox">

      <p>From now on you are to set up your assignments a little
      differently.  Create a project directory named <span
      class="fileName">Assignment_05 </span>.  Create subdirectories for
      your scripts, your images, and your stylesheets for the assignment. 
      Name them <span class="fileName">scripts </span>, <span
      class="fileName">images </span>, and <span class="fileName">css
      </span> respectively.  There won&rsquo;t be any scripts for this
      assignment, so that directory will remain empty.  But future
      assignments will have scripts, so this remains the basic structure for
      all the remaining assignments in the course.  In a real web site, you
      would probably put the <span class="fileName">scripts </span>, <span
      class="fileName">images </span>, and <span class="fileName">css
      </span> directories in the Document Root, but we need to keep each
      assignment&rsquo;s files separate from one another and will put them
      under the assignment directory instead.</p>

      <p>Look at your  <span class="fileName">course_template.php </span>
      file and observe that the head section contains links to three
      sytlesheets and that they are all use relative hrefs into the <span
      class="fileName">css </span> subdirectory.  Until now, none of these
      stylesheets have existed, but that fact hasn&rsquo;t prevented your
      web pages from validating.</p>

      <p>Copy your <span class="fileName">index.php </span> file from
      Assignment 3 (the one with your table of media) into your <span
      class="fileName">Assignment_05 </span> directory. Create a stylesheet
      for the &ldquo;all&rdquo; media type; you should be able to figure out
      what file name to use from the links in your course template.  Add the
      following code to the beginning of your stylesheet, and verify that
      the page now shows up with a red background:</p>

      <div class="codeBlock">
      
      html, body {
        background-color: red;
        }
      </div>

      <p>Once you have the assignment page set up and you have verified that
      you are linking to a stylesheet successfully, make the following
      changes to the content for this assignment: Add one paragraph of
      <em>Lorem Ipsum</em> text above the table, and five more paragraphs of
      <em>Lorem Ipsum</em> text below the table.  Assign the attribute value
      &ldquo;odd&rdquo; to all the odd numbered rows in the table.  Verify
      that the page looks the same except for the extra paragraphs of text. 
      The table&rsquo;s appearance should not have changed.  Now close <span
      class="fileName">index.php</span>. You won&rsquo;t be making any more
      changes to it because everything for this assignment is to be done
      using only the stylesheet.</p>

      <p>Here are the requirements for this assignment:</p>

      <ol>

        <li>Change the background color of the page to something less
        saturated than pure red, and set the foreground color of the page
        (the color property for the html and body tags) to something that
        contrasts enough so that the text is clear and easy to read.

        <br />But how to pick these colors?  To get started, visit the <a
        href="http://wellstyled.com/tools/colorscheme2/index-en.html">color
        schemes generator at wellstyled.com</a>.  This is an interactive
        site that has many options you can explore.  Try the following:
        decide whether you want a &ldquo;warm&rdquo; or a &ldquo;cool&rdquo;
        color scheme, and click around the circle on the top left to pick a
        basic color you would like to work with.  This assignment calls for
        you to pick foreground and background colors that contrast with each
        other enough to be visible, so select the &ldquo;contrast&rdquo; box
        under the color wheel so that you get two sets of colors.  Try
        clicking on the six variations buttons (Default, Pastel, etc.) to
        find a combination of colors you like.  (You will <em>not</em> be
        graded on your taste in colors!) You will see two sets of colors
        listed on the right, used to color various backgrounds, tabs, and
        text in the sample area.  You can click the up arrow buttons next to
        the colors to get different ones used for various parts of the
        sample area.  Once you have a combination that looks good, click the
        drop down list that starts out showing &ldquo;Normal vision&rdquo;
        and check that your color scheme still looks okay for color blind
        people (deuteranopes and protanopes in particular), copy down the
        hex values of the colors you want to use, and use them to set the
        background-color and color properties of your web page. <br
        />Another tool you should look at is <a
        href="http://www.siteprocentral.com/cgi-bin/feed/feed.cgi">Colour
        Scheme Chooser at Site Pro Central</a>.  I like the interactivity of
        this page better, but it doesn&rsquo;t give you the color-blind
        simulation.  Click the question mark in the upper right corner of
        the display for help.</li>

        <li>Now pick an image to use as the background for the &lt;h1&gt;
        element of your web page.  You can use one of the images I supplied
        for Assignment 2, or one of your own.  Make the image tile in the X
        direction behind the level-one heading.  Be sure the text color
        contrasts with the image enough so that the text is legible.  Pick a
        lighter or darker color from the set given by the color scheme page
        if necessary to make the text legible.  <em>Hint: </em> pick a
        backgound image that is uniformly light or dark so you can use a
        single contrasting color for the text.</li>
        
        <li>Use another image as the background for the &lt;h2&gt; element. 
        Make it appear just once and on the right side of the heading.</li>
        
        <li>Set separate background and foreground colors for the table as a
        whole, for the table caption, and for table heading elements
        (&lt;th&gt;).</li>
        
        <li>Make the odd numbered rows of the table slightly lighter in
        color than the others.</li>
        
        <li>Add a background image to the bottom of the page that does not
        scroll with the page.  For your convenience, here is a version of
        the <a href="images/transparent_rocks.png">&ldquo;rocks&rdquo;
        image</a> with a transparent background you might like to use. 
        Alternatively, you might try a <a
        href="images/transparent_rocks.gif">GIF version</a> of the same
        images to see if you can see what the difference is between GIF and
        PNG images.  (<em>Hint:</em> It&rsquo;s a browser issue.)</li>

      </ol>


      <h2>Due Date and Submission</h2>
      
      <p>Be your web page passes both XHTML <strong>and CSS</strong>
      validation now.  Be careful: the CSS Validator will say a page is
      valid even if there are warnings for the page.  For this course, you
      must get no errors <em>and no warnings</em> for all of your validation
      reports.</p>
      
      <p>Test your web page using Firefox, Opera, and Internet Explorer. 
      Note any differences among them that you observe in the email you send
      me to let me know the assignment is ready for grading.</p>

      <p><strong>Due March 28</strong>.  Note, however, that much of this
      material will be on the exam on March 24th, so do the assignment
      before then, if possible, to help prepare for the exam.</p>

    </div>
  </div>

  <div id="footer">
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

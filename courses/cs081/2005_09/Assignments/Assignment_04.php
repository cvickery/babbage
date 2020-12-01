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

  <title>Assignment 4</title>

  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="/courses/css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="/courses/css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
        href="/courses/css/style-print.css" />        

</head>

<body>

  <div id="header">
    <h1>Assignment 4</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">
      <p>With this assignment, you will set up the basic structure of
      a styled web site, and start investigating some of the basic
      features of CSS.</p>
    </div>
    <h2>Description</h2>
    <div class="whitebox">

      <p>You will always use linked style sheets for your web pages in
      this course.  So create a development directory for this
      assignment at &ldquo;My Documents/Assignment 4&rdquo; with a
      subdirectory for your style sheets named &ldquo;css&rdquo; uder
      that.  Also, create another subdirectory named
      &ldquo;images&rdquo; under the development directory too.</p>
      
      <p>Copy your image files from Assignment 2 (the one with the
      images and table) into the images subdirectory, and copy your main
      web page from Assignment 2 into &ldquo;Assignment
      4/index.php&rdquo;.  Adjust the img tags in the web page to
      refer properly to the actual image files if necessary.  Validate
      and test your assignment on the server to make sure everything
      works correctly.</p>
      
      <p>Use Vim or Dreamweaver to create a new stylesheet named
      &ldquo;css/style-all.css&rdquo; and put the following rule in
      it:</p>
      <fieldset><legend>CSS rule</legend>
        <div class="codeBlock">
          html { background-color: red; }
        </div>
      </fieldset>
      <p>Put a link to your stylesheet in the head of your index.php
      document:</p>
      <fieldset><legend>XHTML code</legend>
        <div class="codeBlock">
          &lt;link rel="stylesheet" type="text/css" media="all"
                href="css/style-all.css" /&gt;
        </div>
      </fieldset>
      <p>Be sure your page now shows up with a red background.</p>
      
      <p>From now on, you are to put a second link at the bottom of
      each of your web pages to get your style information validated. 
      The URL of the W3C CSS Validator is:</p>
      
      <fieldset><legend>URL to CSS Validator</legend>
        <div class="codeBlock">
          http://jigsaw.w3.org/css-validator/check/referer
        </div>
      </fieldset>
      
      <p>Test this link and make sure the page passes the CSS
      Validation.  But look carefully at the validations results and
      you will see a warning. What is that warning, and why should you
      pay attention to it?</p>

      <p>Finally, it's time for you to be creative.  Your assignment
      is to make your page look &ldquo;nice.&rdquo;  Here are the
      guidelines for what you must do.  As long as you include the
      features listed here, you can do anything you want.  Just make
      sure all styling is done by editing your style sheet and that
      your styling effects all pass the W3C CSS validation with no
      warnings or errors.</p>

      <ul>

        <li>Change the ugly red background of the page to something
        pleasing.  Be sure to avoid the CSS warning mentioned
        above.  You may use a solid color, or you can experiment with
        a background image.  See the URL under Figure 8-6 for a source
        of free background images you can use.</li>
        
        <li>Make sure the title of your web page appears in an H1
        heading at the beginning of the page.  This should be the only
        H1 in the page.  Use CSS to make it centered on the page. 
        Hint: the property name is text-align.  See Page 294 of the
        textbook.</li>

        <li>Give solid colored backgrounds to all the headings.  Use
        colors that complement each other and go well with the
        background you are using for the whole page.  Again, be sure
        to avoid the CSS warning mentioned above.  Use the online <a
        href="http://www.wellstyled.com/tools/colorscheme2/index-en.html">Color
        Scheme Generator</a> to pick your colors.</li>

        <li>Make all your images have the same height, and give them a
        border.  In addition to my sunset and peaches pictures, here
        is vertically-oriented <a href="hoist.jpg">picture of a chain
        hoist</a> you should include to make sure you don't distort
        any images.  And here's the <a href="wing.jpg">wing
        picture</a> if you would like to add that to your collection.
        The crane and the wing have different (larger) sizes compared
        to the <a href="peaches.jpg">peaches</a> and <a
        href="sunset.jpg">sunset</a>.  The idea is to make them all
        the same height in order to make the whole web page fit well
        in the browser window.  Even if you decide to use your own
        pictures, make sure your page works well with mine first to be
        sure you are doing it right.</li>

        <li>Use Example 8-4 on page 124 as a guide, and format your
        table so it has borders and backgrounds.</li>
        
      </ul>
      
    </div>
    <h2>Submission</h2>
    <div class="whitebox">
      <p><strong>Due Date:</strong> November 15</p>

      <p>When you finish coding and testing your web page, send an
      me an email message:</p>
      <ul>

        <li>Use &ldquo;CS-081 Assignment 4&rdquo; as the Subject. To
        be safe about avoiding my spam filters, make your
        captialization, spelling, and spacing look just like
        that.</li>

        <li>Put your login id, your real name, and your 4-digit ID
        number in your message.</li>
        
        <li>Starting with &ldquo;My Documents&rdquo; put the exact
        pathname to the directory containing your web page and all
        associated files and directories in your message.  Be sure
        spelling and punctuation are exactly right.  Use forward
        slashes ('/') for pathname separators.</li>

      </ul>

    </div>
  </div>

  <div id="footer">
  <hr />
    <p>
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="../..">CS-081 Home</a>&nbsp;-&nbsp;
      <a href="../">Fall 2005 Home</a>&nbsp;-&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("c", filemtime("Assignment_04.php"));
      ?>.</em>
    </p>
  </div>
</body>
</html>


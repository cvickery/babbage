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

  <title>CS-081 Assignment 6</title>

  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="../../../css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="../../../css/style-screen.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="print"
        href="../../../css/style-print.css"
  />
  <style type="text/css" media="all">
  	h3 { clear:both; }
    img { float:right;}
  </style>

</head>

<body>

  <div id="header">
    <h1>CS-081 Assignment 6</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">
      <p>For this assignment, you are going to modify your Assignment 2
      Photo Gallery so that it looks more like a real web page.  You will
      change the list of image names into a list of thumbnails, learn to
      create your own background images, and generally let your creative
      juices start flowing.</p>
    </div>
    <h2>Procedure</h2>
    <div class="whitebox">
      <h3>Make the navigation list into a clickable set of
      thumbnails</h3>

      <p>Start by creating a new project directory named <span
      class="fileName">Assignment_06 </span>, and create <span
      class="fileName">css </span>, <span class="fileName">images </span>,
      and <span class="fileName">scripts </span> directories under it.  Copy
      the images from Assignment 2 into the <span class="fileName">images
      </span> directory, and copy all the <span class="fileName">.php
      </span> files from Assignment 2 into the project directory.  There is
      no need to copy the script file from Assignment 2 because you
      won&rsquo;t be using it for this assignment.  You do need to create a
      stylesheet for the assignment (<span
      class="fileName">css/style-all.css </span>) and either create empty
      versions of the other two style sheets or remove the links to them
      from <span class="fileName">index.php </span>.  Be sure all your <span
      class="fileName">.php files include a link to your
      stylesheet.</span></p>

      <p>Make sure all image file names, web pages, and links to images and
      web pages match each other with regard to upper/lower case letters. 
      For example, in Assignment 2, several people used
      &ldquo;Rocks.png&rdquo; and/or &ldquo;Rocks.php&rdquo; for file names,
      but had &ldquo;rocks.png&rdquo; and/or &ldquo;rocks.php&rdquo; in
      their &lt;a&gt; or &lt;img&gt; tags.  It doesn&rsquo;t matter on
      Windows computers, which can&rsquo;t tell the difference between
      letter cases, but it does matter on the Unix computer where I grade
      your assignments.</p>
      
      <p>In Assignment 2 you used an unordered list, with each list item
      containing two links: one to the page that displayed the picture, and
      one that used Javascript to generate a pop-up window containing the
      picture.  For this assignment, you will use the same list, but with
      two differences: (i) the body of the link is to be a copy of the image
      itself, and (ii) there will be no pop-up link.  So edit the list to
      replace the text inside each link to a <span class="fileName">.php
      </span> with an &lt;img&gt; tag, and remove the links to the popups. 
      For the Flash movies, it is all right if you just leave the link
      contents as the text name of the movie.  (If you do make a thumbnail
      of the Numa Numa Guy, be sure you set the movie <em>not</em> to play
      when the page loads!)  Use a stylesheet rule to make all the
      &lt;img&gt; tags (and &lt;object&gt; tags if you are putting in
      thumbnails for the movies) have a height of 4 <em>ems</em>.</p>
     
      <img src="images/screenshot_6a.jpg"
           alt="screen shot" />

      <p>At this point, you should have a bullet list of clickable
      thumbnails for each of your picture pages.  Make sure your page
      validates, looks something like the screenshot to the right, and is
      working correctly (clicking on a thumbnail should bring up the page
      that displays the full-sized image) before proceeding.</p>
      
      <p>The goal now is to make no more changes to <span
      class="fileName">index.php </span>; all further changes are to be done
      only by editing the stylesheet.</p>
      
      <p>The first issue is to convert the list of thumbnails into a
      horizontal list with no bullets.  You can do this by setting two
      property values for &lt;li&gt; elements: set the <span
      class="functionName">display</span> property to <span
      class="codeSnippet">inline</span> to convert the list items from block
      to inline, and set the <span class="functionName">list-style</span> to
      <span class="codeSnippet">none</span> to change the marker symbols
      from bullets to nothing.  Add padding and/or margins to the list items
      to get them spaced the way you like.</p>
      
      <p>Next, add some feedback for the user that shows when thumbnails are
      selected and ready to be clicked on.  To do this, set the <span
      class="functionName">outline</span> property of the list items so
      there is a solid border of some color and width of your choosing.  But
      the outline should appear only when the mouse hovers over the list
      item.  You do this using the &ldquo;:hover&rdquo; pseudo-selector for
      the list items (<span class="codeSnippet">li:hover</span> instead of
      just <span class="codeSnippet">li</span>).</p>
      
      <p>Add an attractive colored background for the page and you&rsquo;re
      ready for the next step!</p>

      <h3>Create a gradient background for the page
      heading</h3>
      
      <p>For this part of the assignment, you are to give the page heading
      a little bit pizazz. Specifically, we&rsquo;re going for an effect
      like this:</p>
      
      <img src="images/screenshot_6b.jpg" alt="screen shot"/>

      <p>You can come close to this effect by simply setting the background
      color of the &lt;h1&gt; element to a dark color and the text to a
      light color. (I made the text color match the background color of the
      page.)  But the effect we&rsquo;re after uses a color gradient for the
      background.  The gradient starts with the dark color on the left, and
      fades to transparent (which becomes the page background color) on the
      right. We&rsquo;ll use a PNG image for this, which will work in all
      browsers except Internet Explorer versions earlier than 7.  This
      approach would not be appropriate where older browsers have to be
      supported.  But for this assignment we&rsquo;ll assume
      &ldquo;everyone&rdquo; uses Firefox, Opera, or IE7.</p>

      <p>There are several ways to create images you can use on web pages;
      we&rsquo;ll use the free tool available in the lab, <span
      class="programName">Inkscape</span>.  It&rsquo;s the program with the
      black &ldquo;inkblot&rdquo; icon on the desktop in the lab.  You can
      download it for free from <a
      href="http://www.inkscape.org">inkscape.org</a> if you want to install
      it on another computer.</p>

      <p>Start Inkscape, and try some of the tutorials under the Help menu
      if you would like to explore how the program works.  When you are
      ready to work on the assignment, create a new drawing.  From the
      File-&gt;New menu, you can select <span
      class="functionName">web_banner_468x60</span> or <span
      class="functionName">web_banner_728x90</span>. The numbers are the
      width and height of the image you will create, in pixels.  You can
      also use <span class="functionName">File-&gt;Document
      Preferences</span> to set the image size.  The actual dimensions
      don&rsquo;t matter much so long as the image is wide enough to cover
      the width of the text in the heading and tall enough to cover the
      entire heading bounding box.  Excess size will be clipped to fix the
      heading on the screen.</p>
      
      <p>Use the rectangle tool (the blue box on the left) to draw a
      rectangle that covers the entire image.  It&rsquo;s better to make the
      rectangle a little larger than the image rather than smaller. The
      rectangle will show up filled with some color.  Use the gradient tool,
      the one just above the eyedropper on the left, to create a color
      gradient across the image.  Just click on the left end, and again on
      the right.</p>
      
      <p>Open the <span
      class="functionName">Object-&gt;Fill&nbsp;and&nbsp;Stroke</span> menu,
      and edit the fill color.  You can edit the RGB mix, use a &ldquo;color
      wheel&rdquo; or use the Cyan-Magenta-Yellow-Black or the
      Hue-Saturation-Lightness tabs to pick the color any way you like.  You
      will also see an &ldquo;A&rdquo; slider for setting the opacity of
      your fill color. (Opacity is conventionally known as the
      <em>alpha</em> channel; hence the <em>A</em> abbreviation.)  Move the
      color editor panel so you can see your image, and adjust the
      parameters until you get the gradient appearance you want.</p>

      <p>Save your drawing.  I suggest putting it in your <span
      class="fileName">images </span> directory.  It will have an extension
      of <span class="fileName">.svg </span>, which stands for Scalable
      Vector Graphics.  Although all browsers (except IE6) can display SVG
      images, they don&rsquo;t display them as background images.  For that,
      you will need to convert the SVG file into a PNG, which you can do
      using Inkscape&rsquo;s <span class="functionName">File-&gt;Export
      Bitmap</span>menu item.  Be sure the &ldquo;Drawing&rdquo; button is
      selected so you will generate a PNG with the correct dimensions.  The
      PNG file should definitely be saved in your assignment&rsquo;s <span
      class="fileName">images </span> directory so you can link to it from
      your stylesheet.</p>

    </div>
    
    <h2>Testing and Submission</h2>
    <div class="whitebox">

      <p>Feel free to adjust the style of anything in your web page, but be
      sure as a minimum that your final version has a list of clickable
      thumbnails arranged across the page, and be sure the background of the
      page heading is a gradient image.</p>
      
      <p><strong>Bonus: </strong> You can get a &ldquo;good&rdquo; for this
      assignment instead of just &ldquo;ok&rdquo; if the images on the
      separate pages are larger than the thumbnails on the index page and if
      they are centered on the page.  I encourage you to use the <a
      href="http://babbage.cs.qc.edu/Fora/Courses/viewforum.php?f=2">Discussion
      Forum</a> for the course as you work on trying to figure this out.</p>

      <p>Make sure your page passes both XHTML and CSS validation with no
      errors <em>and no warnings</em> (you have to check the CSS
      validator&rsquo;s output carefully to check for warnings).</p>
      
      <p>I do not expect your assignment to work properly in IE6, although
      it should function properly; it just won&rsquo;t look right because of
      the lack of support for transparent PNGs.</p>

      <p>Send me email when your assignment is ready for grading by midnight
      of the due date: <strong>April 11</strong>.</p>

    </div>
  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
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

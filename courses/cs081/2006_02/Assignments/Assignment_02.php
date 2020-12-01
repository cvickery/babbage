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

  <title>CS-081 Assignment 2</title>

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
    <h1>CS-081 Assignment 2</h1>
  </div>

  <div id="content">

    <h2>Introduction</h2>
    <div class="whitebox">

        <p>This assignment is an exercise in using headings, text, lists,
        links, and images.</p>

    </div>

    <h2>Requirements</h2>
    <div class="whitebox">

      <h3>Set Up the Project</h3>

      <p>Your assignment is to build a photo gallery web site.  To start,
      create a directory named &ldquo;Assignment_02&rdquo; under your
      &ldquo;My Web Pages&rdquo; directory.  Copy your <span
      class="filename">course_template.php </span>file into this directory,
      and rename it <span class="filename">index.php</span>.  Create a
      subdirectory of Assignment_02 named &ldquo;images&rdquo;, and copy a
      few images into that directory.  I am providing images for you to use,
      but you may include some of your own, provided yours (a) include both
      JPEG and PNG formats and (b) include files with image sizes and aspect
      ratios. My images are in a <a href="images.zip">Zip file</a> that is
      quite large because it includes a Flash movie as well as JPEGs and a
      PNG.  Because my images are so large, I have put copies of the zip
      file in the C:\Downloads\CS-081 directory of the computers in A-205,
      as well as some of the other computers in the TREE domain (Peach,
      Mimosa, ...).  You can just unzip the local copy into your
      project&rsquo;s &ldquo;images&rdquo; directory.</p>

      <h3>Separate Web Page for Each Image</h3>

      <p>Make a copy of the course template for each image in the images
      directory.  Give each one a name that matches the image name, but with
      an extension of <span class="filename">.php</span>.  For example, one
      if the images I am providing is named <span
      class="filename">peaches.jpg</span>, so the corresponding web page
      would be <span class="filename">peaches.php</span>.  Be sure the
      Assignment_02 directory contains only <span
      class="filename">.php </span>files, and the images directory contains
      only <span class="filename">.jpg</span>, <span
      class="filename">.png</span>, and <span class="filename">.swf </span>
      files.</p>
      
      <h3>Create a Photo Gallery</h3>
      
      <p><strong>NOTE:</strong> Do not do anything with the presentation
      features of the web pages for this assignment.  That is, do nothing to
      try to make the pages look &ldquo;good.&rdquo;  We&rsquo;ll take care
      of that when we start working with CSS.  Do not use any CSS in this
      assignment!</p>
      
      <p>Make the default page of your site (<span
      class="filename">index.php </span>)have a meaningful title in the
      title bar and the same title in an H1 element at the top of the page.
      Put in an unordered list, with each list item being a link to one of
      the images.  The text of each link should be the image&rsquo;s file
      name with no extension.  Edit each of the other pages so that the
      title and H1 element are the name of the image.  Display the image on
      the page, and make the image be a link to the next image in your
      gallery.  The last image should link to the first one.  Put a link
      back to the index page below the image on each page.</p>

      <div class="whitebox">
      
      <h3>Include Flash Movie(s)</h3>
      
      <p>The <span class="filename">images.zip </span> file that I provided
      contains a big Flash movie.  There is also a second small movie named
      <a href="Untitled.swf"><span class="filename">Untitled.swf </span></a>
      in the copy of  <span class="filename">images.zip </span> on babbage,
      that you can also get by right-clicking the link in this sentence. 
      (If you left-click on the link, the movie will just play instead
      of letting you download it.)</p>

      <p>The text discusses how to display Flash movies using the
      &lt;object&gt;, &lt;param&gt;, and &lt;embed&gt; tags.  But that
      technique, as the author point out, will not validate.  See my <a
      href="/courses/cs081/using_flash.xhtml">Using Flash</a> web page for my
      instructions on how to use Flash movies for this assignment.</p>

      </div>

      <h3>Add Pop-ups To The Index Page</h3>
      
      <p>Nobody likes pop-ups, but you need to know how to make them
      anyway!</p>
      
      <p>For each item in the list on the index page, add a second link
      named &ldquo;thumbnail.&rdquo;  Create a second subdirectory named
      &ldquo;scripts&rdquo; under Assignment_02, and put a file named <span
      class="filename">popup.js </span> in it.  The contents of this file
      should be the definition of the <span
      class="functionName">newWindow()</span> function given in Example 3-9
      of the textbook, but without the &lt;script&gt; and &lt;/script&gt;
      tags.  Make the title bar of the popup match the image name.  Put the
      link to your <span class="filename">popup.js </span> in the head of
      your index file, as shown in Example 3-10 of the text.  The line of
      XHTML at the bottom of page 43 shows how to make the links invoke the
      pop-ups.  Don&rsquo;t bother to create a pop-up for your <span
      class="filename">.swf </span> image(s).</p>
      
      <p>Test this version of your project both with Javascript enabled and
      disabled.</p>

    </div>

    <h2>Submit the Assignment</h2>
    <div class="whitebox">
    
      <p>Be sure to check that your project functions correctly, make sure
      you have green checkmarks from TIDY and Firebug, that the W3C gives
      all your pages a green &ldquo;This page is Valid XHTML 1.1!&rdquo; bar
      (except the pop-ups, and the movies if you use the &lt;embed&gt;
      tag.)</p>
      
      <p>When everything has been tested, send me email with &ldquo;CS-081
      Assignment 2&rdquo; in the Subject line and your name (and anything
      else you want to mention) in the message body.</p>

    </div>

  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="..">CS-081 This Semester</a>&nbsp;-&nbsp;
      <a href="../..">CS-081 Course Home Page</a>&nbsp;-&nbsp;
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

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

  <title>Dreamweaver Setup</title>

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
    <h1>Dreamweaver Setup</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>

    <div class="whitebox">

      <p>Dreamweaver is one of the most widely used tools for writing web
      pages.  It was developed by <a
      href="http://macromedia.com">Macromedia</a>, the same company that
      developed the <a
      href="http://www.macromedia.com/software/flash/flashpro/">Flash</a>
      system for animating web pages.  Macromedia was purchased by <a
      href="http://www.adobe.com">Adobe</a>, the developers of <a
      href="http://www.adobe.com/products/acrobat/main.html">Acrobat</a> and
      <a href="http://www.adobe.com/creativesuite/main.html">Photoshop</a>
      in December, 2005.</p>

      <p>Dreamweaver (and all the other components of Macromedia&rsquo;s
      &ldquo;Studio 8&rdquo; suite of programs, including Flash) is
      available on all the computers in the lab.  But while it&rsquo;s great
      to use for professionals who do web design for a living, it is also
      big and complex.  I recommend that beginners use a simpler
      programmer&rsquo;s text editor for the projects in this course to
      avoid the overhead of learning to work with Dreamweaver.  But if you
      are serious about learning web development, you should take the
      opportunity to become familiar with the Dreamweaver option whether you
      decide to stay with it in the long run or not.</p>

      <p>There are lots of Dreamweaver books and online tutorials available,
      and I don&rsquo;t claim to have surveyed them well enough to make any
      serious recommendations.  But I have looked at Rachel Andrew&rsquo;s
      <em>Build Your Own Standards Compliant Website Using Dreamweaver
      8</em> published by Sitepoint and can recommend it.  You can get a
      copy from <a

href="http://www.amazon.com/gp/product/0975240234/ref=cm_arms_pdp_dp/102-3447518-5180939?%5Fencoding=UTF8&amp;v=glance&amp;n=283155">Amazon</a>
      for about $27, or directly from <a
      href="http://www.sitepoint.com/books/dreamweaver1/">Sitepoint</a>,
      where you can download sample chapters if you want to look at (most)
      of the book before deciding whether to buy it.</p>

      <p>This web page guides you through the steps to take so that
      Dreamweaver
      will generate web pages that you can submit for this course.  That
      means changing some of the default settings so the code you write will
      be formatted to match the requirements I set up for course
      projects.</p>

    </div>

    <h2>Setting Up</h2>

    <div class="whitebox">

      <p>Start Dreamweaver by clicking the green Dreamweaver icon on the
      desktop.  It&rsquo;s a big program, so be patient while you wait for
      it to load.  You should see a set of tabs down the right side of thw
      window called CSS, Application, Tag Inspector, and Files.  The Files
      tab should be open.  You can use the Files tab to navigate to your
      &ldquo;My Web Pages&rdquo; folder under &ldquo;My Documents&rdquo;.</p>

      <p>From the Edit menu at the top, select Preferences, the bottom
      item.  This opens up a big panel with lots of items, a few of which
      need to be changed.  Select the fourth item, Code Formatting, and make
      sure the following settings are in place: Indent (checked) with 2
      spaces.  Tab size: 4 (or 2 if you prefer).  Default tag case:
      &lt;lowercase&gt;.  Default attribute case: lowercase="value".
      Centering: Use DIV tag.</p>

      <p>Now go down to the New Document preferences. Change Default
      document from HTML to PHP (or PHP Template, but that will require more
      setting up).  Make the default extension .xhtml.  Make the default
      Document Type (DTD) XHTML 1.1.  Make the Default encoding Unicode
      (UTF-8).</p>

      <p>In the Preview in Browser section, make sure Firefox is set as the
      primary browser and Internet Explorer as the secondary browser.</p>

      <p>In the Validate section, turn off the checkbox for HTML 4.0 and
      turn on the one for XHTML 1.0 strict.</p>

      <p>Exit the preferences panel and be patient while it is saved.</p>

      <p>If you want to use the course template as your Dreamweaver
      template, type it in using Dreamweaver, or open it from within
      Dreamweaver if you have already typed it elsewhere.  Then use
      File-&gt;Save As Template and fill in the dialog box to save it.
      Don&rsquo;t worry about the message that says the template has no
      editable regions.</p>

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
      <?php echo gmdate("Y-m-d", filemtime("dreamweaver_setup.php"));
      ?>.</em>
    </p>
  </div>
</body>
</html>

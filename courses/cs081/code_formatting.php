<?php
  if (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml"))
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

  <title>Source Code Formatting</title>

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

<body>

  <div id="header">
    <h1>Source Code Formatting</h1>
  </div>

  <div id="content">
    <h2>What&rsquo;s The Issue?</h2>

    <p>A large amount of web content is produced by tools that isolate the
    author from the actual code (HTML, XHTML, CSS, Javascript, PHP, etc.)
    behind the pages.  An example would be pages generated by Dreamweaver
    operating only in Design Mode, or the <a
    href="http://pages.google.com">Google Page Creator</a>.  Working in this
    environment, it&rsquo;s easy to get the sense that it really
    doesn&rsquo;t matter what the code behind a page looks like as long as
    the result looks good in the web browser.</p>

    <p>But web pages, unlike a traditional graphics design artifact, depends
    typically change over time.  Some of the changes take place while the
    page is first being developed based on feedback from the client who is
    paying for the pages, and some of the changes take place much later as
    the content needs to be updated or new material needs to be added, or
    perhaps the &ldquo;look&rdquo; needs to be refreshed.  Whatever the
    reason, the case remains: the code behind the pages needs to be
    changed.</p>

    <p>Traditional software design has always had to deal with this problem
    of &ldquo;maintaining code&rdquo;, and many books have been written on
    how best to do it.  But working in Design View or with Page Creator can
    isolate the developer from the code and lead to the belief that what the
    code itself looks like doesn&rsquo;t really matter.  Indeed, page
    maintenance may well be done using tools that hide the code.  But
    invariably somebody does have to look at, understand, and modify the
    code behind web pages.  It may be because the design tool doesn&rsquo;t
    support a feature someone wants to add, or it may be that a different
    design tool is used to maintain the pages from the one that was used to
    build the pages originally, and that the new (presumably
    &ldquo;better&rdquo; tool is somehow incompatible with the code
    generated by the original tool.</p>

    <p>Once the time arrives that a human is going to work on code, the way
    the code is formatted makes a big difference in how productive that
    human is going to be able to work.  If the code is well-structured, fits
    nicely in an editing window, and uses consistent indentation, the person
    working on the code will have a much easier time finding the parts of
    the code that need to be changed, and will be able to make those changes
    with a much greater degree of confidence that the changes are
    correct.</p>

    <p>All web design tools provide access to code in one form or another.
    For example, Dreamweaver has its Code View or Split View, and Page
    Creator provides an Edit HTML option.  In all cases, working directly
    with code involves using some sort of <em>text editor</em>.  In CS-081,
    you do all your work using a text editor anyway, so what follows applies
    to all the web pages you develop for the course.  Outside the course,
    for the reasons just discussed, you still need to pay attention to these
    formatting issues even if you normally work with a tool that isolates
    you from the code.</p>

    <p>Before going on to the Guidlines, aword about &ldquo;code
    readers.&rdquo;  A code reader might be your professor trying to grade
    your assignment, or some stranger who inherits the job of updating your
    code long after you stopped working on it and have left the organization
    where you developed it.  But all too often, the reader is
    <strong>you</strong>!  It may be that you need to fix something while
    you are developing the original version, but much of the time it is a
    matter of you going back to update a page you wrote a long time ago and
    haven&rsquo;t thought about since.  In all cases the principle is the
    same: write your code so it is easy to read and understand.  You never
    know who might have to look at it, and it might be somebody
    important.</p>

    <h2>Coding Guidelines</h2>

    <h3>Tabs and Spaces</h3>

    <p>Indenting code to show its logical structure is critical for helping
    code readers to understand it.  There are organizations that lay out
    very strict rules about how to handle indentation, and others that take
    a casual attitude about it.  For this course, the rules are quite
    strict:  There must be no tab characters in your code, and the code must
    be indented consistently to show the nesting structure of the document
    elements.  I personally use an indentation of two spaces, but
    don&rsquo;t mind if you use anything from one to four spaces so long as
    you are consistent.  The reason for not going beyond four will be
    mentioned below.</p>

    <p><strong>Dreamweaver:</strong>Edit -&gt; Preferences -&gt; Code
    Format.  At the top of the panel, select indenting with 2 spaces and Tab
    size of 2.</p>

    <p><strong>Vim: The installation of Vim in the lab is all set up to
    expand tabs into spaces and to make the tab size 2.  If you install Vim
    at home, see the <a href="using_vim.xhtml">Using Vim</a> web page for
    instructions on copying the settings from the lab to home.</strong>
    </p>

    <p><strong>Nedit:</strong>The installation of Nedit in the lab is also
    configured to handle tabs correctly.</p>


    <h3>Line Width</h3>

    <p>Lines of code or text that are wider than the window they are being
    edited in are very hard to work with because you typically cannot see
    important context around the parts you are working on.  The solution is
    to ...........................................</p>


    <p><strong>Dreamweaver:</strong></p>

    <p><strong>Vim:</strong></p>

    <p><<strong>Nedit:</strong></p>

  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo date("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME']));
      ?></em>
    </p>
  </div>
</body>
</html>
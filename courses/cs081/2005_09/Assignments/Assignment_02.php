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
  <title>Assignment 2</title>
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
          href="../../../css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
          href="../../../css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
          href="../../../css/style-print.css" />
  </head>

  <body>
  <div id="header">
    <h1>Assignment 2</h1>
  </div>
  <div id="content">
    <h2>Setting Up</h2>
    <div class="whitebox">

      <p>
        Create a separate directory (folder) to hold this assignment
        somewhere under your &ldquo;My Documents&rdquo; folder in the lab.
        You are going to put a file named index.php and two jpeg image files
        in this directory (and nothing else). For testing purposes, it may
        be convenient to use your login account name as the name of this
        folder.
      </p>

    </div>
    <h2>Assignment Description</h2>
    <div class="whitebox">

      <p>This is an assignment to make sure you can build a valid web page
        that incorporates a variety of HTML visual elements: headings,
        paragraphs, images, and tables. The web page is to be
        &ldquo;unstyled.&rdquo;  By that I mean that the page is not to use
        any CSS at all. For example, if you start with the page template you
        worked on for the first assignment, you are to take out the LINKs to
        stylesheets that were in the &lt;head&gt; node of that page.</p>

      <p>The page is to use no presentational features of HTML. That is, use
        no attributes that affect the appearance of the material you are
        presenting. For images, that means you are not to set the height or
        width, and for the table, it means that you are not to specify
        border or cellpadding attributes. Your page may not look very
        interesting, but all that will come when we start working with CSS
        in the next assignment. For now, plain vanilla.</p>

      <p>The name of your page is to be <em>index.php</em>. This is a
        special file name that the Apache server will recognize as the page
        within a directory that is to be sent if a browser requests a URL
        for a directory instead of for a file within a directory. (This is
        an Apache configuration option that we set up for the computers in
        the lab.)</p>

      <p>Code you web page so it has the following content:</p>

      <ul>

        <li>Use a meaningful title for the titlebar.</li>

        <li>Create a <code>&lt;div&gt;</code> with an <em>id</em> of
          <code>&ldquo;heading&rdquo;</code>, and put a level-1 header
          (<code>&lt;h1&gt;</code>) with the same text as the page title
          inside this <em>div</em>.</li>

        <li>Create a second <code>&lt;div&gt;</code> with an <em>id</em> of
          <code>&ldquo;content&rdquo;</code>, and put three level-2 headings
          inside it:

          <ol>
            <li>Information</li>
            <li>Pictures</li>
            <li>Media</li>
          </ol>

          <ul>

            <li>
              Write two paragraphs of &quot;information&quot; underneath the
              Information heading. (You may use text from <a
              href="http://www.lipsum.com/" tabindex="1" title="Site that
              generates Latin text." accesskey="L">lorem ipsum</a> if you
              want to save your creativity for other things.)
            </li>

            <li>Put two pictures next to each other under the Pictures heading.
              You may use your own, or you may borrow these two from me:
              <ul>
                <li><a  href="sunset.jpg" tabindex="2"
                            title="Sunset"
                            accesskey="1">A picture</a></li>
                <li><a  href="peaches.jpg" tabindex="3"
                            title="Peaches"
                            accesskey="2">Another picture</a></li>
              </ul>
            </li>

            <li>
              Put a table with four columns in it under the Media heading.
              Make the headings for the four columns
              &ldquo;Author/Artist,&rdquo; &ldquo;Title,&rdquo;
              &ldquo;Medium,&rdquo; and &ldquo;Comments.&rdquo;  Enter
              several rows in the table for items in different media
              categories, such as &ldquo;Book,&rdquo; &ldquo;CD&rdquo;, etc.
            </li>

          </ul>
        </li>

        <li>
          Create a third <code>&lt;div&gt;</code> with an <em>id</em> of
          <code>&ldquo;footer&rdquo;</code>. In it, put a horizontal rule
          (<em>i.e.</em> a line: &lt;hr&gt;) and a link to <code>
          http://validator.w3.org/check?uri=referer</code>.
        </li>

      </ul>
    </div>
    <h2>Test Your Page</h2>
    <div class="whitebox">

      <p>You may use any editor you like to write your web page:
        <em>Vim</em>, <em>Dreamweaver</em>, or some other one that&rsquo;s
        available to you. But write your code so it is indented to reflect
        the structure of the DOM tree you are creating, eliminate tab
        characters from your code, and make sure no code lines are wider
        than 76 columns except in very rare circumstances.</p>

      <p>As you write your code, make sure to use valid XHTML 1.1 elements
        only. Dreamweaver can help you with this, but you need to test the
        code regularly with Firefox's HTML Tidy extension. Be sure to set
        Tidy&rsquo;s Accessibility option to &ldquo;Normal&rdquo; instead of
        its default value of &ldquo;None&rdquo;. Only a green circle with a
        checkmark is acceptable.</p>

      <p>Use Firefox's &ldquo;Page Info&rdquo; feature (under the Tools
        menu) to verify that your page has &ldquo;application
        xhtml+xml&rdquo; (not text/html) for its Type, and &ldquo;Standards
        compliance mode&rdquo; (not Quirks mode) for its Render Mode.</p>

      <p>When the page displays correctly in Firefox, check to make sure it
        also displays correctly in Internet Explorer and Opera.</p>

      <p>Finally, be sure the link at the bottom of the page works, and that
        the W3C Validator says the page is valid XHTML 1.1.</p>

    </div>
    <h2>Submit the Assignment</h2>
    <div class="whitebox">

      <p>Once you have coded and tested your page, send me an email
        containing your name, 4-digit ID, account name in the lab, and the
        path to the directory containing your page and images. Be sure the
        Subject: of your email is &ldquo;CS-081 Assignment 2&rdquo;</p>

      <h3>Due Date: Midnight, October 7</h3>

    </div>
  </div>
  <div id="footer">
    <hr />
    <p>
      <a href="../../../../">Vickery Home</a>&nbsp;-&nbsp;<a
         href="../..">CS-081 Home</a>&nbsp;-&nbsp;<a
         href="../">Fall 2005 Home</a>&nbsp;-&nbsp;<a
         href="./">Fall 2005 Assignments</a>
    </p>
    <p>
      <a href="http://validator.w3.org/check?uri=referer">XHTML</a>&nbsp;-&nbsp;<a
         href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    </p>
    <p>
      <i>Last updated <?php echo gmdate("Y-m-d", filemtime("index.php"));
          ?>.</i>
    </p>
  </div>
  </body>
</html>

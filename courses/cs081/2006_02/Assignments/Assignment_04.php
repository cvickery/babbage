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

  <title>CS-081 Assignment 4</title>

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
    <h1>CS-081 Assignment 4</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">

      <p>For this assignment, you will use Javascript to explore and modify
      the DOM tree of a sample web page.  This is a somewhat unconventional
      approach to working with CSS, but if it works out, you will have a
      better understanding of what you are doing when you write your own
      style sheets.  On top of that, you will also be prepared for working
      with some of the dynamic effects that can make web pages more
      interesting.</p>
      
      <p>You will not be constructing web page for this assignment.  Rather,
      you will do a sequence of activities.  To assess your progress through
      the actitites, there is a sequence of 
      &ldquo;Activity Questions&rdquo; below.  To
      complete the assignment, you are to send me an email with the answers
      to the activity questions in it.</p>

    </div>
    
    <h3>Description</h3>
    <div class="whitebox">

      <p>To get started with this assignment, you will need to install the
      &ldquo;Firebug&rdquo; extension into your copy of Firefox.  We
      pre-installed several extensions for you when we set up your account
      for the course, but this one came out after that, so you will need to
      install it yourself.  Click on the link below, scroll down the page
      and click on the big &ldquo;Install Now&rdquo; button, follow the
      instructions, and restart Firefox to install it:</p>

      <ul>
        <li><a
href="https://addons.mozilla.org/extensions/moreinfo.php?application=firefox&#38;category=Developer%20Tools&#38;id=1843">
         Firebug Extension Page</a>
        </li>
      </ul>

      <p><span class="aq">Activity Question</span> Use the
      Tools-&gt;Extensions menu to open up a panel that lists all the
      extentions you have installed.  List all their names and version
      numbers.</p>

      <p>To keep things manageable, I am providing a small sample web page
      for you to work with for the rest of this assignment:</p>

        <ul>
          <li><a href="dom_tree.php">Sample Web Page</a></li>
        </ul>

      <p>The first step is to look at the page source of the sample page. 
      Open the page and view the page source, which you can do in one of
      several ways: click on the TIDY icon in the status bar at the bottom
      of your browser, select View-&gt;Page Source from the menu bar at the
      top of your browser, or type Control-U.</p>

      <p><span class="aq">Activity Question</span> What are values of the
      href attributes of each style sheet linked to from the sample page? 
      Open the page info panel (Tools-&gt;Page Info) and click on the Links
      tab.  What are the Name and Type of each style sheet?  What is the
      heading for the middle column? How does the content of the middle
      column compare to the href attribute of the link tags?</p>

      <p>Start Firebug.  You can do this by clicking the smaller green icon
      in the status bar (next to the TIDY icon), or by pressing the F12
      key.  <strong>NOTE: </strong>Firebug reports a CSS error for the
      sample web page, even though there are no errors.  Thus, the
      &ldquo;smaller green icon&rdquo; probably started out as a small red
      icon in the status bar.  Click on the Firebug Errors tab and uncheck
      CSS errors, and reload the sample web page.  This is a case of
      eliminating an error by pretending it isn&rsquo;t there, which is not
      a good idea.  But in this case I would like to eliminate the
      distraction of what I know is a spurious error message, at least for
      now.</p>
      
      <p>Click the Inspect Element tab, and hover over the various parts of
      the sample web page, observing that different parts of the page are
      highlighted (with a blue border) as you hover over them.</p>
      
      <p><span class="aq">Activity Question</span> How wide is the H1
      element of the page?</p>
      
      <p>Click on the Pretty Peaches Picture text, and observe that an
      information bar appears in the Firebug panel with &lt;img&gt; in green
      in it.  At the right side of the information bar are four buttons you
      can click.  Click on each of them to answer the following
      questions:</p>
      
      <p><span class="aq">Activity Question</span> What is the difference
      between the XML shown by Firebug and the XHTML code for the
      &lt;img&gt; tag in the web page?</p>
      
      <p><span class="aq">Activity Question</span> What formatting rule(s)
      apply to this &lt;img&gt; tag?</p>
      
      <p><span class="aq">Activity Question</span> Look over the Box
      information for the &lt;img&gt; tag, and write down the values of the
      <em>display</em>, <em>position</em>, <em>visibility</em>, and
      <em>float</em> properties.</p>
      
      <p>Click on the JS (Javascript) button.  There is a wealth of
      information displayed there.  The trick is to find just those parts we
      want to work with and ignore the rest.  To start with, create a
      Javascript variable that you can use to reference the img node in the
      DOM tree by typing the following line in the command line at the
      bottom of the Firebug panel.  Be sure to capitalize it exactly as
      shown or you will get an error message:</p>

      <div class="codeBlock">
        img = document.getElementsByTagName('img')[0]
      </div>

      <p>The name <span class="variableName">img</span> on the left side of
      the equal sign can be anything you like; I used <span
      class="variableName">img</span> because it is easy to remember what it
      means and it is easy to type.  In a Javascript program you would have
      to declare that <span class="variableName">img</span> is a variable by
      putting &ldquo;var&rdquo; before it, and you would have to put a
      semicolon at the end of the statement.  But in the Firebug command
      line, you don&rsquo;t need either one.  In fact, if you say
      &ldquo;var&nbsp;img&nbsp;=&nbsp;document.&nbsp;etc.&rdquo; it
      won&rsquo;t work.</p>
      
      <p>The &ldquo;[0]&rdquo; at the end of the command is needed because
      <span class="functionName">getElementsByTagName()</span> returns a
      list of <em>all</em> the img tags in the document.  I know there is
      exactly one of them in this document, and the &ldquo;[0]&rdquo; says
      to get the zero-th item from the list.  (It&rsquo;s the first item,
      but list positions are numbered starting at zero.)</p>
      
      <p><span class="aq">Activity Question</span> Enter the Javascript
      expresson <span class="variableName">img.src</span>, and write down
      the value displayed.</p>

      <p>There is a copy of the peaches picture in the <span
      class="fileName">images </span> directory under the one where the
      sample web page is.  Assign the string
      &ldquo;images/peaches.jpg&rdquo; to <span
      class="variableName">img.src</span> and observe that the picture
      replaces the &ldquo;Pretty Peaches Picture&rdquo; text.  Be sure you
      put quotation marks around the string on the right side of the equal
      sign.  If the picture doesn&rsquo;t appear, you need to re-work the
      exercise until you do get the picture to show up.</p>

      <p><span class="aq">Activity Question</span> Type the <span
      class="variableName">img.src</span> expression again and write down
      what value is displayed now.</p>

      <p>What we really want to work with is the style information for the
      &lt;img&gt; tag because that corresponds to the CSS information we
      will be setting up with style sheets later on in the course.  Type
      either of the the following two Javascript statements in the command
      line at the bottom of the Firebug panel in order to set up an object
      named <span class="variableName">sty</span> (short for
      &ldquo;style&rdquo;).  Again, the name of the varible is arbitrary and
      I chose <span class="variableName">sty</span> because it is easy to
      type and easy to remember what it stands for.</p>

      <div class="codeBlock">
        sty=document.getElementsByTagName('img')[0].style
      </div>
      <p>or just:</p>
      <div class="codeBlock">
        sty=img.style
      </div>
      <p>The second assignment works because you already defined <span
      class="variableName">img</span> before.</p>
      
      <p><span class="aq">Activity Question</span> Now type in each of the
      following statements and write down what happens for each.  Be sure to
      put spaces inside the strings exactly as shown.  For example, &ldquo;2
      px&rdquo; is not the same as &ldquo;2px&rdquo;.</p>

      <div class="codeBlock">
        sty.display = "none"
        sty.display = "block"
        sty.border  = "2px solid green"
        sty.padding = "4px"
        sty.margin  = "auto"
      </div>

      <p>That is the end of the written requirements for this assignment. 
      Here are some other experiments you should try, but there is nothing
      you have to hand in for them:  Change the backgroundColor property of
      the H1 tag to a color of your choice.  Set the textDecoration property
      of the link (the first &lt;a&gt; tag in the page) to
      &ldquo;overline&rdquo;.  Set the fontSize property of the span element
      to &ldquo;3em&rdquo;.  Use the function <span
      class="functionName">document.getElementById()</span> to get the
      &ldquo;content&rdquo; node of the document.  This function returns the
      desired node, not a list, so do not put the &ldquo;[0]&rdquo; at the
      end.  Change the width property of the content element to
      &ldquo;50%&rdquo;.</p>
      
      <h2>Due Date and Submission</h2>
      
      <p>Send me an email with you answers to the Activity Questions in the
      message body (no attachments) by <strong>March 14</strong></p>.

    </div>
  </div>

  <div id="footer">
  <hr />
    <p>
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

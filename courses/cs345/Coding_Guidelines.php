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
<title>CSCI-345 Coding Guidelines</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="/courses/css/style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/courses/css/style-screen.css" />
<link rel="stylesheet" type="text/css" media="print" href="/courses/css/style-print.css" />
</head>
<body>
<div id="header">
  <h1>CSCI-345 Coding Guidelines</h1>
</div>
<div id="content">
  <h2>Introduction</h2>
  <div class="whitebox">
    <p>All Handel-C code written for this course must follow the coding guidelines
    outlined in this document. The goals are for you to write code that is easy
    to read and which has the maximum likelihood of running correctly.</p>
  </div>
  <h2>Guidelines</h2>
  <div class="whitebox">
  <ul>
    <li>Set your editor to substitute spaces for tab characters. In DK, you do
      this from Tools -&gt; Options -&gt; Tabs.</li>
    <li>No line of code, including comments, may extend beyond column 80.</li>
    <li>Put the name of each source file in a comment in the first line of the
      file.</li>
    <li>Put a comment block at the beginning of each source file telling what
      the program does, who the author(s) is(are), and when the program was written.</li>
    <li>Put a comment block before each function, macro proc definition, and
      endless loop. Make sure this comment block stands out on the page. For
      example, put a horizontal line below the name of the function or macro
      proc name, such as the following:
      <fieldset><legend>Sample comment block for a function or macro proc</legend>
      <pre><code>
    //  main()
    //  -------------------------------------------------------------
    /*
     *    Description of what the function does goes here.
     */
      void main(void) ...
      </code></pre>
      </fieldset>
    </li>
    <li>Be sure there is at least one space between comment leaders and the text
      that follows. (&ldquo;Comment leaders&rdquo; are // for single line comments,
      or /* or * for comment blocks.) Format the comments so they are easy to
      read and document the logical structure of the code.</li>
    <li>Put spaces around operators to make the code easier to read. &ldquo;x += 3;&rdquo; is
      easier to read than &ldquo;x+=3;&rdquo;</li>
    <li>Be sure all code compiles and builds with no errors or warnings for both Debug
      and EDIF configurations. The only exceptions are the Pal macro
      expansion warnings (&ldquo;possible infinite expansion&rdquo;) that do not indicate
      a problem.</li>
    <li>Be sure the Xilinx tools report no problems, such as an inability to meet
      timing constraints</li>
  </ul>
  </div>
</div>
<div id="footer">
  <hr />
  <p class="links">
		<a href="/">Vickery Home</a>&nbsp;-
		<a href=".">CS-345/780 Home</a>&nbsp;-
		<a href="http://validator.w3.org/check?uri=referer">XHTML</a>&nbsp;-
		<a href="http://jigsaw.w3.org/css-validator/check/referer"> CSS</a><br />
  <i>Last updated <?php echo date("c", filemtime("index.php")); ?>.</i>
	</p>
</div>
</body>
</html>

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

  <title>Spring Into HTML and CSS Errata</title>

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
    <h1>Spring Into HTML and CSS Errata</h1>
  </div>

  <div id="content" class="whitebox">

    <p><strong>Page 62, Example 4-13, line 5:</strong> Missing first
    quote mark in what should be colspan="2".</p>

    <p><strong>Page 109, second paragraph of The Cascade:</strong>
    "... inline trumps embedded ... embedded takes precedence over
    inline ..."  The first part is correct.  That is, if you specify
    conflicting values for an attribute in both an embedded rule and
    an inline rule, the inline rule is the one that is used.  The real
    problem here is that the cascade takes much more than one
    paragraph to cover accurately.</p>

    <p><strong>Page 113, line -4:</strong> "In this case, the media is
    defined as screen." But Figure 7-3 uses media="all".</p>

    <p><strong>Page 120, line 6:</strong> "...can be represented by a
    single number or character..." should be "...can be represented by
    just two numbers or characters..."  (Each hexadecimal digit
    represents 4 bits.)</p>

    <p><strong>Page 124, paragraph 4:</strong>  "This is because there
    is no effective means of providing cellspacing in CSS."  True. 
    But the box model (padding) should be used in place of
    cellpadding.</p>

    <p><strong>Page 124, Example 8-4:</strong> "th ... border:}"
    should be "th ... border: 1px solid black;}"</p>

    <p><strong>Page 124, Example 8-4:</strong> Note that the color
    orange doesn't pass W3C validation yet; it's part of CSS 2.1, not
    2.0. But Firefox supports it.</p>

    <p><strong>Page 129, last paragraph:</strong> "...it simply
    strengthens the case that the property will be inherited by its
    decendents." This statement is ambiguous as it stands.  An
    attribute value of "inherit" means that the element inherits the
    property's value from its parent.  This is the normal case, so
    this value is seldom used.</p>

  </div>

  <div id="footer">
    <p class="links">
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="/courses/cs081">CS-081 Home</a>&nbsp;-&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo date("c", filemtime("molly_errata.php"));
      ?>.</em>
    </p>
  </div>
</body>
</html>

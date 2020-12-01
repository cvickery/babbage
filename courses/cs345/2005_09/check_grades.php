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
    <title>Check My Grades</title>
    <link rel="shortcut icon" href="/courses/cs345/favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all"
          href="/courses/css/style-all.css" />
    <link rel="stylesheet" type="text/css" media="screen"
          href="/courses/css/style-screen.css" />
    <link rel="stylesheet" type="text/css" media="print"
          href="/courses/css/style-print.css" />        

  </head>

  <body>

    <div id="header">
      <h1>Check CS-345 Grades</h1>
    </div>

    <div id="body">

      <form method="get"
            action="http://babbage.cs.qc.edu/cgi-bin/gen_grades-txt">
        <p style="margin-left: 5em;">
          Enter your 4-digit student ID:
          <input type="text" name="idNum" size="4" />
        </p>
        <p style="margin-left: 5em;">
          <input type="submit" value="Show Me My Grades for CS-345" />
          <input type="hidden" name="file" value="345-2005_09" />
        </p>

    </form>

    </div>

    <div id="footer">
    <hr />
      <p> <a href="/">Vickery Home</a>&nbsp;
          <a href="..">Course Home</a>&nbsp;
          <a href=".">Fall 2005 Home</a>&nbsp;
          <a href="http://validator.w3.org/check?uri=referer">
          XHTML</a>&nbsp;
          <a href="http://jigsaw.w3.org/css-validator/check/referer">
          CSS</a></p>
    </div>
  </body>
</html>

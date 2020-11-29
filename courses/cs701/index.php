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
<head><title>CS-701 Software Design</title>
<style type="text/css">
  html, body { background: #ffffcc; }
  h1   { text-align: center;  }
  p { margin-left: 1em; margin-right: 2em; }
  p.footer { text-align: center; font-size: smaller; }
  div.whitebox {background:white;border:solid 1px blue; margin:1em;
  padding:1em;}
</style>
<style type="text/css" media="screen">
  body { font-family: sans-serif }
</style>
</head>
<body>
<h1>CS-701 Software Design</h1>

<h2>Inactive Course</h2>
  <p>
    I last offered this course in the spring of 2003.
  </p>
  <p>
    Links below are to a directory containing course handouts and to
    course material for individual semesters when I taught the course.
  </p>
  <ul>
    <li><a href="Handouts">Course Handouts</a></li>
    <?php
    $dir = opendir('.');
    while ($file = readdir($dir))
    {
      if (preg_match('/^(\d{4})_(\d{2})/', $file, $matches))
      {
				$semester = $matches[2] === '02' ? 'Spring' : 'Fall';
        echo "<li><a href='$file'>$semester {$matches[1]}</a></li>\n";
      }
    }
    ?>
  </ul>  
<hr />
<p class="footer">
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

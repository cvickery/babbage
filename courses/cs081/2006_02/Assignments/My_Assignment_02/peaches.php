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

  <title>Peaches</title>

</head>

<body>

  <div id="header">
    <h1>Peaches</h1>
  </div>

  <div id="content">
    <a href="sunset.php">
      <img src="images/peaches.jpg" alt="Pretty Peach Pair Picture" />
    </a>
    <p><a href="index.php">Index</a></p>
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

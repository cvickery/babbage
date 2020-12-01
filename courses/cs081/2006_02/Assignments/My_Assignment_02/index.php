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

  <title>Vickery Assignment 2</title>

<!-- Remove links to simulate student situation
  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="css/style-screen.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="print"
        href="css/style-print.css"
  />        
  -->

  <script type="text/javascript" src="scripts/popup.js">
  </script>

</head>

<body>

  <div id="header">
    <h1>Vickery Picture Gallery</h1>
  </div>

  <div id="content">
    <ul>
      <li><a href="Rocks.php">Rocks</a>
          <a href="javascript:newWindow('Rocks','./images/Rocks.png')">thumb</a>
      </li>
      <li><a href="Untitled.php">Untitled</a></li>
      <li><a href="hoist.php">Hoist</a>
          <a href="javascript:newWindow('Hoist','./images/hoist.jpg')">thumb</a>
      </li>
      <li><a href="myhero.php">Numa Numa Dance</a></li>
      <li><a href="peaches.php">Peaches</a>
          <a href="javascript:newWindow('Peaches','./images/peaches.jpg')">thumb</a>
      </li>
      <li><a href="sunset.php">Sunset</a>
          <a href="javascript:newWindow('Sunset','./images/sunset.jpg')">thumb</a>
      </li>
      <li><a href="wing.php">Wing</a>
          <a href="javascript:newWindow('Wing','./images/wing.jpg')">thumb</a>
      </li>
    </ul>
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

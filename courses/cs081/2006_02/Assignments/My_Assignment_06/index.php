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

  <title>Vickery Assignment 6</title>

  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="css/style_all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="css/style_screen.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="print"
        href="css/style_print.css"
  />        

  <style type="text/css" media="screen">
    object { display: inline }
  </style>

</head>

<body>

  <div id="header">
    <h1>Vickery Picture Gallery</h1>
  </div>

  <div id="nav">
    <ul>

      <li><a href="rocks.php"><img src="./images/rocks.png" alt="Rocks!"
      /></a></li>

      <li><a href="Untitled.php">
        <object type="x-application-shockwave-flash"
                data="images/Untitled.swf"
                height="80"
                width="80">
          <param name="play" value="true"/>
          <param name="loop" value="true"/>
          <param name="menu" value="true"/>
          <param name="movie" value="images/Untitled.swf"/>
        </object>
          </a>
      </li>

      <li><a href="hoist.php"><img src="./images/hoist.jpg" alt="Hoist"
      /></a></li>

      <li>
        <a href="myhero.php">
        <object type="x-application-shockwave-flash"
                data="images/myhero.swf"
                height="80"
                width="80">
          <param name="play" value="false"/>
          <param name="loop" value="true"/>
          <param name="menu" value="true"/>
          <param name="movie" value="images/myhero.swf"/>
        </object>
        </a>
      </li>

      <li><a href="peaches.php"><img src="./images/peaches.jpg"
      alt="Peaches" /></a></li>

      <li><a href="sunset.php"><img src="./images/sunset.jpg" alt="Sunset"
      /></a></li>

      <li><a href="wing.php"><img src="./images/wing.jpg" alt="Wing" /></a>
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

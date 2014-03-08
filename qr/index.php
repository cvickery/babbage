<?php

//  Generate a QR Code and corresponding PNG file.
//  ----------------------------------------------
/*  Designed to be used by me for generating links
 *  to web pages in this directory.
 */
set_include_path("qrlib");
require_once("qrlib.php");

$page_path  = '';
$img_file   = './images/noname.png';
$url_base   = "http://{$_SERVER['SERVER_NAME']}";
$level      = 'H';
$size       = 4;

foreach ($_GET as $name => $value)
{
  switch ($name)
  {
    case 'host':
      $url_base = "http://$value/";
      break;

    case 'path':
      $path_parts = pathinfo($value);
      $extension  = '';
      $page_path = "$value";
      $img_file = "./images/{$path_parts['filename']}.png";
      break;

    case 'level':
      $level = strtoupper($value);
      if (! in_array($level, array('L', 'M', 'Q', 'H')))
      {
        die("Invalid ECC level: musst be L, M, Q, or H");
      }
      break;

    case 'size':
      $size = $value;
      if (! in_array($size, array(1, 2, 3, 4)))
      {
        die("Invalid size: must be 1, 2, 3, or 4");
      }
      break;

    default:
      die("'$name' is not a valid option");
  }
}
$url = "$url_base/$page_path";
QRcode::png($url, $img_file, 'QR_ECLEVEL_' . $level, $size);

?>
<html>
  <head>
    <title>QR Code</title>
    <style type='text/css'>
      html, body { background-color: lightgreen;}
    </style>
  </head>
  <body>
  <?php
    echo "<a href='$url'><img src='$img_file'/></a>";
    ?>
  </body>
</html>

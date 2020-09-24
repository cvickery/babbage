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
<head><title>Photos</title>
<link rel="stylesheet" type="text/css" href="photos.css" />

<?php
  require_once("photos.php");
  generateImageArrays(false);
  $current_image = $_GET['current'];
  $current_image = ($current_image + 1) % $num_images;
  list($width, $height, $type, $attr) =
                         getimagesize($low_res_files[$current_image]);
  $scale_x = 1.0;
  $scale_y = 1.0;
  if ($width > 600)
    $scale_x = 600 / $width;
  if ($height > 400)
    $scale_y = 400 / $height;
  $scale_factor = ($scale_x < $scale_y) ? $scale_x : $scale_y;
  $width = round($width * $scale_factor);
  $height = round($height * $scale_factor);
?>

</head>
<body>
<div id="noscriptDiv">
  <p>Click on the picture to go to the next one, or
  <br />enable Javascript and <a href="index.php">click here</a> for
  more options.</p>
  <p style="width: 80%; margin-left: auto; margin-right: auto;">
    <a href="./showNext.php?current=<?php echo $current_image ?>">
      <img <?php echo "
        src=\"$low_res_files[$current_image]\"
        alt=\"$low_res_files[$current_image]\" ";
        if ( ($width > 0) && ($height>0) )
          echo "
        width=\"$width\"
        height=\"$height\"";
        ?> /> </a>
  </p>
</div>
<div id="nojsfooterDiv">
  <hr />
  <p id="footer">
    <a href="http://validator.w3.org/check?uri=referer">
      <strong>XHTML</strong></a>&nbsp;
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
      <strong>CSS</strong></a>
  </p>
</div>
</body></html>

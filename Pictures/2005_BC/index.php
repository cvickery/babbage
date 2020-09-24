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
  <title>2005 British Columbia Vacation Pictures</title>
  <link rel="shortcut icon" href="./favicon.ico" />
  <link rel="stylesheet" type="text/css" href="photos.css" />

<?php
  require_once('./photos.php');
  generateImageArrays(true);
 ?>

<script type="text/javascript" src="photos.js">
</script>

</head>
<body>
<?php
  //  Alert user if site was set up wrong
  if ($missing_thumbs > 0)
        echo ($missing_thumbs == 1) ? 
           "<h2>There is a missing thumbnail.</h2>\n" :
           "<h2>There are $missing_thumbs missing thumbnails.</h2>\n";
  if ($missing_images > 0)
       echo ($missing_images == 1) ?
            "<h2>There is a missing image file.</h2>\n" :
            "<h2>There are $missing_images missing image files.</h2>";
  if ($num_images == 0)
                      echo "<h2>There are no images to display!</h2>";
?>
<div id="noscriptDiv">
  <p>Your browser's javascript feature is turned off.</p>
  <p>Click on the picture to go to the next one, or
  <br />enable Javascript and <a href="index.php">click here</a> for
  more options.</p>
  <p style="width: 80%; margin-left: auto; margin-right: auto;">
    <a href="./showNext.php?current=0">
      <?php echo "<img
       src=\"$low_res_files[0]\"
        alt=\"$low_res_files[0]\"
      />\n"; ?>
    </a>
  </p>
</div>
<div id="optionsDiv">

  <h2>Help</h2>

    <p class="option">If you got here by clicking the "Help/Options"
    button because no pictures showed up, it means your browser has
    blocked Javascript from changing the images on a page, and you
    need to turn that feature back on to be able to see the pictures.
    How you do that differs across browsers; you will need to look at
    advanced Javascript options under "Preferences," or something
    similar.</p>

    <p class="option"> Otherwise, read on ...</p>

  <h2>You have options!</h2>

  <button type="button" id="dismissOptions">Back to the Pictures</button>

  <div id="optionsText">
    <h3>Download Time and Image Quality</h3>

      <p>Do the pictures look fuzzy?  If it's not because your glasses
      are dirty, you can check the following option to get higher
      quality images delivered, at the cost of longer download
      times:</p>

      <p class="option"> <input type="checkbox" class="optionBox"
      id="hiResOption" /> Display higher-quality images, which take
      more time to load.  This is the "resolution" option, which you
      can also change with the 'R' key.</p>

    <h3>Image Size</h3>

      <p>You control the size if the pictures on the screen by
      changing the size of your browser's window.  Each picture will
      be made big enough to fill your browser's window comfortably,
      regardless of the sizes and shapes of the window and
      picture.</p>

      <p>But sometimes you might make your browser window so big that
      it's too big for the actual dimensions of an image.  If the
      image is made to fit the window in this case, it looks
      "pixelated" (chunky).  Normally, you'll see a red warning
      message under the picture when this happens.<br />What to
      do?</p>

      <p class="option">
      <input type="checkbox" class="optionBox" id="noWarnOption" />
      Just turn off the red warning message that shows up when the window is
      too big for a picture.  This is the "warning" option, which you
      can also change with the 'W' key.</p>

      <p class="option">
      <input type="checkbox" class="optionBox" id="limitSizeOption" />
      Never let an image get too big for its britches.  This is the
      "britches" option, which you can also change with the 'B' key.</p>

    <h3>Keyboard Navigation</h3>

    <p>The First, Previous, Next, Last, Thumbs, and Help/Options menu
    items can all be activated by typing the first letter of the item
    name.  The Next and Previous functions can also be invoked by
    typing the left/right arrow keys or the spacebar/backspace
    keys.</p>

    <p>You can use the &lt;Esc&gt; key to get back to the pictures
    when either this Help/Options information or the thumbnails are
    showing.</p>

    <p>Use the 'C' key to toggle between a "clean" view with no
    navigation buttons showing, and the normal view.</p>

    <p>Use the 'A' or 'S' key to start/stop the auto-advance
    (slideshow) mode.  Use the up and down arrow keys to
    increase/decrease the rate at which images advance.</p>

    <p>You can make the matte around the picture thicker by typing
    upper-case <em>V</em>, and you can make it thinner by typing
    lower-case <em>v</em>.  If you make it thin enough so that the
    bevel disappears and continue beyond that, it then becomes a
    floating image instead of a sunken one, and addional lower-case
    <em>v</em>'s increase the size of the float.</p>

  </div>
</div>
<div id="navDiv">
  <ul id="navList">
    <li><button class="navItem" id="navFirst"   >First
        </button></li>
    <li><button class="navItem" id="navPrevious">Previous
        </button></li>
    <li><button class="navItem" id="navNext"    >Next
        </button></li>
    <li><button class="navItem" id="navLast"    >Last
        </button></li>
    <li><button class="navItem" id="navThumbs"  >Thumbs
        </button></li>
    <li><button class="navItem" id="navOptions" >Help/Options
        </button></li>
  </ul>
</div>
<div id="imageDiv">
  <img  id="imgTag"
        src="<?php echo $low_res_files[0] ?>"
        alt="<?php echo $low_res_files[0] ?>"
   />
  <p id = "sizeWarning">Displayed size is larger than image size.</p>
</div>
<div id="thumbsDiv">
    <?php
    for ($i=0; $i<$num_images; $i++)
    {
      $j = $i + 1;
      echo "
      <img   alt=\"$j/$num_images\"
             src=\"$thumb_files[0]\"
             height=\"160\" width=\"160\"
             onclick=\"gotoImage($i)\" />
      ";
    }
    ?>
</div>
<div id="footerDiv">
  <hr />
  <p id="status">Status</p>
  <p id="footer">
    <a href="http://validator.w3.org/check?uri=referer">
      <strong>XHTML</strong></a>&nbsp;
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
      <strong>CSS</strong></a>
  </p>
<!-- Creative Commons License -->
<a rel="license" href="http://creativecommons.org/licenses/by-sa/2.5/">
  <img  alt="Creative Commons License"
        src="http://creativecommons.org/images/public/somerights20.png" /></a><br />
  This work is licensed under a <a rel="license"
  href="http://creativecommons.org/licenses/by-sa/2.5/">Creative Commons
  Attribution-ShareAlike 2.5 License</a>.

<!-- /Creative Commons License -->


<!--

<rdf:RDF xmlns="http://web.resource.org/cc/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
<Work rdf:about="">
   <dc:title>Photo Gallery</dc:title>
   <dc:description>PHP, Javascript, and XHTML code for displaying images.</dc:description>
   <dc:creator><Agent>
      <dc:title>Christopher Vickery</dc:title>
   </Agent></dc:creator>
   <dc:type rdf:resource="http://purl.org/dc/dcmitype/Text" />
   <license rdf:resource="http://creativecommons.org/licenses/by-sa/2.5/" />
</Work>

<License rdf:about="http://creativecommons.org/licenses/by-sa/2.5/">
   <permits rdf:resource="http://web.resource.org/cc/Reproduction" />
   <permits rdf:resource="http://web.resource.org/cc/Distribution" />
   <requires rdf:resource="http://web.resource.org/cc/Notice" />
   <requires rdf:resource="http://web.resource.org/cc/Attribution" />
   <permits rdf:resource="http://web.resource.org/cc/DerivativeWorks" />
   <requires rdf:resource="http://web.resource.org/cc/ShareAlike" />
</License>

</rdf:RDF>

-->

</div>
</body></html>

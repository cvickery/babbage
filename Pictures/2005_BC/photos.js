
//  Globals
//  ------------------------------------------------------------------
  var currentImageNum     = 0;
  
  var navDiv              = null;
  var firstTag            = null;
  var previousTag         = null;
  var nextTag             = null;
  var lastTag             = null;
  var thumbsTag           = null;
  var optionsTag          = null;
  
  var imageDiv            = null;
  var imgTag              = null;
  var sizeWarningTag      = null;
  
  var optionsDiv          = null;
  var hiResOptTag         = null;
  var noWarnOptTag        = null;
  var limitSizeOptTag     = null;
  var noWarnOption        = false;
  var limitSizeOption     = false;
  var dismissOptTag       = null;
  var thumbsDiv           = null;
  var theImage            = null;
  var viewportWidth       = 0;
  var viewportHeight      = 0;

  var footerDiv           = null;

  var autoadvanceMode     = false;
  var cleanMode           = false;
  var autoadvanceInterval = 2000;
  var currentTimeout      = null;
  var matteBevelWidth     = 8;

//  updateStatus()
//  ------------------------------------------------------------------
/*    Update the status line to reflect the current options in effect.
 */
  function updateStatus()
  {
    var statusMsg = (1 + currentImageNum) + "/" + numImages +
        (cleanMode ? " Type 'C' to turn on buttons." : "") +
        (hiResOptTag.checked ? " High" : " Low") + "-res images." +
        (autoadvanceMode ? (" Autoadvance every " +
                            autoadvanceInterval/1000 + " sec.") : "");
    window.status = statusMsg;
    document.getElementById("status").firstChild.nodeValue = statusMsg;
  }


//  displayImage()
//  ------------------------------------------------------------------
/*
 *    Displays the current image in the current viewport.
 */
  function displayImage()
  {
    //  Update the navigation tags based on currentImageNum
    var isFirst     = (currentImageNum == 0);
    var hasPrevious = (currentImageNum > 0);
    var hasNext     = currentImageNum < (numImages - 1);
    var isLast      = (currentImageNum == (numImages - 1));
    firstTag.style.color    = isFirst     ? "gray"  : "black";
    previousTag.style.color = hasPrevious ? "black" : "gray";
    nextTag.style.color     = hasNext     ? "black" : "gray";
    lastTag.style.color     = isLast      ? "gray"  : "black";

    //  Blank the image and start loading the new one.
    imgTag.style.visibility = "hidden";
    if (hiResOptTag.checked &&
        (hiResURLs[currentImageNum] != "unavailable"))
    {
      theImage.src = hiResURLs[currentImageNum];
    }
    else
    {
      theImage.src  = lowResURLs[currentImageNum];
    }
    theImage.onload = finishDisplayingImage;
  }
//  finishDisplayingImage()
//  ------------------------------------------------------------------
/*    This is the onLoad event handler for images.  Resize the image
 *    to fit the current viewport, using the aspect ratios of the
 *    image and the viewport to determine whether to scale the width
 *    or the height.
 */
  function finishDisplayingImage()
  {
    imgTag.src    = theImage.src;
    imgTag.alt    = theImage.src;
    var imageAspectRatio = theImage.height/theImage.width;
    var viewportAspectRatio = viewportHeight/viewportWidth;
    var newHeight = 0, newWidth = 0;
    if (imageAspectRatio > viewportAspectRatio)
    {
      //  Scale to height
      newHeight = (0.80 * viewportHeight) + matteBevelWidth;
      newWidth  = (newHeight / imageAspectRatio) + matteBevelWidth;
    }
    else
    {
      //  Scale to width
      newWidth  = (0.85 * viewportWidth) + matteBevelWidth;
      newHeight = (newWidth * imageAspectRatio) + matteBevelWidth;
    }

    //  Check for upsizing and corresponding options
    if ( limitSizeOptTag.checked &&
         ((newWidth > theImage.width) ||
          (newHeight > theImage.height)) )
    {
      newWidth = theImage.width;
      newHeight = theImage.height;
    }
    if ( (newWidth > theImage.width) ||
         (newHeight > theImage.height) )
    {
      sizeWarningTag.style.visibility
                        = noWarnOptTag.checked ? "hidden" : "visible";
    }
    else
    {
      sizeWarningTag.style.visibility = "hidden";
    }
    imgTag.style.width      = Math.round(newWidth)  + "px";
    imgTag.style.height     = Math.round(newHeight) + "px";
    imgTag.style.visibility = "visible";
    updateStatus();
  }


//  geometryChanged()
//  ---------------------------------------------------------------
/*
 *    Sets the viewport height and width, if possible.  Then (re-)
 *    displays the current image.
 */
  function geometryChanged()
  {
    //  Determine current browser viewport size, for which
    //  there is no w3c standard.
    if ( window.innerWidth )
    {
      //  alert("moz");
      //  Works for Firefox, Opera, ...
      viewportWidth   = window.innerWidth;
      viewportHeight  = window.innerHeight;
    }
    else
    {
      if (  document.documentElement &&
          ( document.documentElement.clientWidth ||
            document.documentElement.clientHeight ) )
      {
        //  alert("ie6");
        //  IE 6+ in 'standards compliant mode'
        viewportWidth   = document.documentElement.clientWidth;
        viewportHeight  = document.documentElement.clientHeight;
      }
      else
      {
        if( document.body &&
          ( document.body.clientWidth ||
            document.body.clientHeight ) )
        {
          //  alert("other");
          //  Originally MS; supported by others as well.
          viewportWidth   = document.body.clientWidth;
          viewportHeight  = document.body.clientHeight;
        }
      }
    }
    viewportHeight = viewportHeight -
                       (navDiv.clientHeight + footerDiv.clientHeight);
    document.getElementById("optionsText").style.height
                            = Math.round(0.6 * viewportHeight) + "px";
    displayImage();
  }

//  Navigation Event Handling
//  ------------------------------------------------------------------
  function doFirst()
  {
    currentImageNum = 0;
    clearTimeout(currentTimeout);
    displayImage();
    if (autoadvanceMode)
    {
      currentTimeout = setTimeout( doNext, autoadvanceInterval );
    }
  }

  function doPrevious()
  {
    currentImageNum = Math.max(0, currentImageNum-1);
    clearTimeout(currentTimeout);
    displayImage();
    if (autoadvanceMode)
    {
      currentTimeout = setTimeout( doNext, autoadvanceInterval );
    }
  }

  function doNext()
  {
    currentImageNum = Math.min((numImages-1), (currentImageNum+1));
    clearTimeout(currentTimeout);
    displayImage();
    if (autoadvanceMode)
    {
      currentTimeout = setTimeout( doNext, autoadvanceInterval );
    }
  }

  function doLast()
  {
    currentImageNum = Math.max(currentImageNum, (numImages -1));
    displayImage();
  }

  function doThumbs()
  {
    navDiv.style.display      = "none";
    imageDiv.style.display    = "none";
    optionsDiv.style.display  = "none";
    thumbsDiv.style.display   = "block";
    footerDiv.style.display   = "none";
  }

  function doOptions()
  {
    navDiv.style.display      = "none";
    imageDiv.style.display    = "none";
    optionsDiv.style.display  = "block";
    thumbsDiv.style.display   = "none";
    footerDiv.style.display   = "none";
  }

//  Option Event Handling
//  ------------------------------------------------------------------
  function doHiResChanged()
  {
    displayImage();
    updateStatus();
  }

  function doLimitSize()
  {
    if (limitSizeOptTag.checked)
    {
      noWarnOptTag.checked = false;
    }
    displayImage();
  }
  function doNoWarn()
  {
    if (noWarnOptTag.checked)
    {
      sizeWarningTag.style.visibility = "hidden";
      limitSizeOptTag.checked = false;
    }
    else
    {
      sizeWarningTag.style.visibility = "visible";
    }
    displayImage();
  }

  function toggleAutoplay()
  {
    autoadvanceMode = ! autoadvanceMode;
    if (autoadvanceMode)
    {
      currentTimeout = setTimeout( doNext, autoadvanceInterval );
    }
    else
    {
      clearTimeout(currentTimeout);
    }
    updateStatus();
  }

  function toggleClean()
  {
    cleanMode = !cleanMode;
    navDiv.style.visibility = cleanMode ? "hidden" : "visible";
    footerDiv.style.visibility = cleanMode ? "hidden" : "visible";
    updateStatus();
  }
  //  Handle clicks on "Back to Pictures" button
    function dismissOptions()
    {
      navDiv.style.display        = "block";
      imageDiv.style.display      = "block";
      optionsDiv.style.display    = "none";
      thumbsDiv.style.display     = "none";
      footerDiv.style.display     = "block";
      navDiv.style.visibility     = cleanMode ? "hidden" : "visible";
      footerDiv.style.visibility  = cleanMode ? "hidden" : "visible";
      window.scrollTo(0,0);
      updateStatus();
    }

  //  gotoImage()
  //  -----------------------------------------------------------------
  /*    Handles clicks on thumbnails.
   */
    function gotoImage(num)
    {
      if ((num < 0) || (num > (numImages-1)))
        alert(num + " is a stupid image number");
      else
        currentImageNum = num;
      
      navDiv.style.display        = "block";
      imageDiv.style.display      = "block";
      optionsDiv.style.display    = "none";
      thumbsDiv.style.display     = "none";
      footerDiv.style.display     = "block";
      navDiv.style.visibility     = cleanMode ? "hidden" : "visible";
      footerDiv.style.visibility  = cleanMode ? "hidden" : "visible";
      window.scrollTo(0,0);
      displayImage();
    }

  //  initialize()
  //  -----------------------------------------------------------------
  /*
   *    This is the onLoad handler for the page.  Gets the first image
   *    up and then load the thumbnails.
   */
    function initialize()
    {
      //  If we get here, the noscript div is showing, but Javascript is
      //  working: hide the div.
      document.getElementById("noscriptDiv").style.display = "none";
      //  References to dynamic elements
      navDiv          = document.getElementById("navDiv");
      optionsDiv      = document.getElementById("optionsDiv");
      imageDiv        = document.getElementById("imageDiv");
      thumbsDiv       = document.getElementById("thumbsDiv");
      footerDiv       = document.getElementById("footerDiv");
      imgTag          = document.getElementById("imgTag");
      sizeWarningTag  = document.getElementById("sizeWarning");
      firstTag        = document.getElementById("navFirst");
      previousTag     = document.getElementById("navPrevious");
      nextTag         = document.getElementById("navNext");
      lastTag         = document.getElementById("navLast");
      thumbsTag       = document.getElementById("navThumbs");
      optionsTag      = document.getElementById("navOptions");
      hiResOptTag     = document.getElementById("hiResOption");
      noWarnOptTag    = document.getElementById("noWarnOption");
      limitSizeOptTag = document.getElementById("limitSizeOption");
      dismissOptTag   = document.getElementById("dismissOptions");

      theImage        = new Image();

      //  Set up Navigation event listeners
      firstTag        .onclick    = doFirst;
      previousTag     .onclick    = doPrevious;
      nextTag         .onclick    = doNext;
      lastTag         .onclick    = doLast;
      thumbsTag       .onclick    = doThumbs;
      optionsTag      .onclick    = doOptions;

      hiResOptTag     .onclick    = doHiResChanged;
      limitSizeOptTag .onclick    = doLimitSize;
      noWarnOptTag    .onclick    = doNoWarn;
      dismissOptTag   .onclick    = dismissOptions;


      //  Now show the nav, img, and footer divs, which are set to
      //  "none" by default.  If the user's browser is not running
      //  Javascript, these changes won't happen, and only the noscript
      //  div will remain on the screen.
      navDiv.style.display      = "block";
      imageDiv.style.display    = "block";
      optionsDiv.style.display  = "none";
      thumbsDiv.style.display   = "none";
      footerDiv.style.display   = "block";

      currentImageNum = 0;
      geometryChanged();
      displayImage();
      //  Now that the first image is up, start loading the thumbnails
      var thumbImgs = thumbsDiv.getElementsByTagName("img");
      if (thumbImgs.length != thumbURLs.length)
      {
        alert("Thumbnail Failure: " +
                          thumbImgs.length + " != " + thumbURLs.length);
      }
      for (var i = 0; i < thumbImgs.length; i++)
      {
        thumbImgs[i].src = thumbURLs[i];
      }
      document.onkeyup = keyReleased;
    }

  //  keyReleased()
  //  -----------------------------------------------------------------
  /*
   *    Manage keyboard navigation and control.
   */
    var sunkenBevel = "#808060 #e0e0d0 #d0d0c0 #707050";
    var raisedBevel = "#e0e0d0 #808060 #707050 #d0d0c0";
    function keyReleased(evt)
    {
      //  Convert keyCode to ASCII value.  Works for upper and lower
      //  case letters and for punctuation, like the space bar, where
      //  the shift key is ignored.
      evt = evt ? evt : window.event;
      var letter = evt.keyCode;
      if ((letter > 40) && !evt.shiftKey) letter = letter + 0x20;

      switch (letter)
      {
        //  A/a/S/s Start/stop autoplay
        case 65:  //  'A'
        case 83:  //  'S'
        case 97:  //  'a'
        case 115: //  's'
          toggleAutoplay();
          break;

        //  B/b Toggle "britches" option. (Suppress upsizing).
        case 66:
        case 98:
          limitSizeOptTag.checked = !limitSizeOptTag.checked;
          doLimitSize();
          break;

        //  C/c Toggle clean mode (no menu, no footer)
        case 67:  //  'C'
        case 99:  //  'c'
          toggleClean();
          break;

        //  F/f Display First image
        case 70:
        case 102:
          doFirst();
          break;

        //  L/l Go to Last image
        case 76:
        case 108:
          doLast();
          break;

        //  N/n/<space>/'\r'/<R-arrow> Go to Next image
        case 13:  //  '\r' <CR>
        case 32:  //  ' '  <SP>
        case 78:  //  'N'
        case 110: //  'n'
        case 39:  //  Right arrow
          doNext();
          break;

        //  P/p/<L-arrow> Display Previous image
        case 8:   //  <BS>
        case 37:  //  Left arrow (on my PC, anyway)
        case 80:  //  'P'
        case 112: //  'p'
          doPrevious();
          break;

        //  R/r Toggle resolution option
        case 82:  //  'R'
        case 114: //  'r'
          hiResOptTag.checked = !hiResOptTag.checked;
          doHiResChanged();
          break;

        //  T/t Display Thumbnails
        case 84:
        case 116:
          doThumbs();
          break;

        //  V/v Change matte beVel width
        case 86:  // 'V'
          matteBevelWidth += 1;
          imgTag.style.borderWidth = Math.abs(matteBevelWidth) + "px";
          imgTag.style.borderColor
                  = (matteBevelWidth < 0) ? raisedBevel : sunkenBevel;
          break;
        case 118: //  'v'
          matteBevelWidth -= 1;
          imgTag.style.borderWidth = Math.abs(matteBevelWidth) + "px";
          imgTag.style.borderColor
                  = (matteBevelWidth < 0) ? raisedBevel : sunkenBevel;
          break;

        //  W/w Toggle warning about upsized images
        case 87:  //  'W'
        case 119: //  'w'
          noWarnOptTag.checked = !noWarnOptTag.checked;
          doNoWarn();
          break;

        //  H/h/?/O/o Display _H_elp & _O_ptions
        case 72:  //  'H'
        case 104: //  'h'
        case 191: //  '?'
        case 79:  //  'O'
        case 111: //  'o'
          doOptions();
          break;

        //  Up/+  Increase slideshow rate
        case 38:  //  Up arrow
        case 61:  //  '+'
        case 139: //  '+' on keypad
          autoadvanceInterval
                          = Math.max(500, (autoadvanceInterval - 500));
          updateStatus();
          break;

        //  Dn/-  Decrease slideshow rate
        case 40:  //  Down arrow
        case 141: //  '-'
          autoadvanceInterval += 500;
          updateStatus();
          break;

        //  <Esc> Dismiss options
        case 27:  //  <Esc>
          dismissOptions();
          break;

        default:
// alert(letter);
          break;
      }
    }

  //  Set up window event handlers
  window.onload = initialize;
  window.onresize = geometryChanged;


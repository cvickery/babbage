//  Variables
//  -------------------------------------------------------------------
/*
 *  Browser Issue:  Opera and Firefox do not require you to declare
 *  variables before using them, but Internet Explorer does.  In this
 *  case, coding for Internet Explorer (which also works with other
 *  browsers) is the best practice.  The following lines declare and
 *  initialize all variables used in this program.  Doing so helps find
 *  mistakes before they become problems.  In IE, go to Tools->Internet
 *  Options->Advanced, and turn on the "Display a notification about
 *  every script error" option.  You man also need to deselect the two
 *  "Disable Script Debugging options just above that one.
 */

  var imgHolder1        = null;
  var img1NoneButton    = null;
  var img1InlineButton  = null;
  var img1BlockButton   = null;
  var img1HideButton    = null;
  var img1              = null;
  var img1NoneButton    = null;
  var img1InlineButton  = null;
  var img1BlockButton   = null;
  var img1HideButton    = null;
  var img2              = null;
  var img2NoneButton    = null;
  var img2InlineButton  = null;
  var img2BlockButton   = null;
  var img2HideButton    = null;

  var imgHolder2        = null;
  var img2NoneButton    = null;
  var img2InlineButton  = null;
  var img2BlockButton   = null;
  var img2HideButton    = null;
  var img3              = null;
  var img3NoneButton    = null;
  var img3InlineButton  = null;
  var img3BlockButton   = null;
  var img3HideButton    = null;
  var img4              = null;
  var img4NoneButton    = null;
  var img4InlineButton  = null;
  var img4BlockButton   = null;
  var img4HideButton    = null;

  var images            = null;
  var imgMargin         = null;
  var imgBorder         = null;
  var imgPadding        = null;

  var divs              = null;
  var divMargin         = null;
  var divBorder         = null;
  var divPadding        = null;


//  changeStyle()
//  -------------------------------------------------------------------
/*
 *    Invoked whenever the user clicks on any radio button or checkbox.
 *    Sets the display and visibility attributes for the two divs and
 *    the four images based on the current settings of all buttons and
 *    checkboxes.
 *
 *    Note: Unchecked Hide buttons for the two images in the first div
 *    are set to 'inherit' but the two images in the second div are set
 *    to 'visible'.
 */
  function changeStyle()
  {
    if (div1NoneButton.checked)   imgHolder1.style.display =    'none';
    if (div1InlineButton.checked) imgHolder1.style.display =    'inline';
    if (div1BlockButton.checked)  imgHolder1.style.display =    'block';
    if (div1HideButton.checked)   imgHolder1.style.visibility = 'hidden';
    else                          imgHolder1.style.visibility = 'visible';
    if (img1NoneButton.checked)   img1.style.display          = 'none';
    if (img1InlineButton.checked) img1.style.display          = 'inline';
    if (img1BlockButton.checked)  img1.style.display          = 'block';
    if (img1HideButton.checked)   img1.style.visibility       = 'hidden';
    else                          img1.style.visibility       = 'inherit';
    if (img2NoneButton.checked)   img2.style.display          = 'none';
    if (img2InlineButton.checked) img2.style.display          = 'inline';
    if (img2BlockButton.checked)  img2.style.display          = 'block';
    if (img2HideButton.checked)   img2.style.visibility       = 'hidden';
    else                          img2.style.visibility       = 'inherit';

    if (div2NoneButton.checked)   imgHolder2.style.display    = 'none';
    if (div2InlineButton.checked) imgHolder2.style.display    = 'inline';
    if (div2BlockButton.checked)  imgHolder2.style.display    = 'block';
    if (div2HideButton.checked)   imgHolder2.style.visibility = 'hidden';
    else                          imgHolder2.style.visibility = 'visible';
    if (img3NoneButton.checked)   img3.style.display          = 'none';
    if (img3InlineButton.checked) img3.style.display          = 'inline';
    if (img3BlockButton.checked)  img3.style.display          = 'block';
    if (img3HideButton.checked)   img3.style.visibility       = 'hidden';
    else                          img3.style.visibility       = 'visible';
    if (img4NoneButton.checked)   img4.style.display          = 'none';
    if (img4InlineButton.checked) img4.style.display          = 'inline';
    if (img4BlockButton.checked)  img4.style.display          = 'block';
    if (img4HideButton.checked)   img4.style.visibility       = 'hidden';
    else                          img4.style.visibility       = 'visible';

    for (var i = 0; i < images.length; i++)
    {
      images[i].style.margin = imgMargin.value;
    }
    for (var i = 0; i < images.length; i++)
    {
      images[i].style.border  =  imgBorder.value;
    }
    for (var i = 0; i < images.length; i++)
    {
      images[i].style.padding  =  imgPadding.value;
    }
    for (var i = 0; i < divs.length; i++)
    {
      divs[i].style.margin  =  divMargin.value;
    }
    for (var i = 0; i < divs.length; i++)
    {
      divs[i].style.border  =  divBorder.value;
    }
    for (var i = 0; i < divs.length; i++)
    {
      divs[i].style.padding = divPadding.value;
    }

  }

//  initialize()
//  -------------------------------------------------------------------
/*
 *    Connect the various radio buttons and checkboxes to the
 *    changeStyle() event handler.
 */
  function initialize()
  {
    imgHolder1        = document.getElementById( 'imgHolder1' );
    div1NoneButton    = document.getElementById( 'div1None'   );
    div1InlineButton  = document.getElementById( 'div1Inline' );
    div1BlockButton   = document.getElementById( 'div1Block'  );
    div1HideButton    = document.getElementById( 'div1Hide'   );

    div1NoneButton.onclick    = changeStyle;
    div1InlineButton.onclick  = changeStyle;
    div1BlockButton.onclick   = changeStyle;
    div1HideButton.onclick    = changeStyle;

    imgHolder2        = document.getElementById( 'imgHolder2' );
    div2NoneButton    = document.getElementById( 'div2None'   );
    div2InlineButton  = document.getElementById( 'div2Inline' );
    div2BlockButton   = document.getElementById( 'div2Block'  );
    div2HideButton    = document.getElementById( 'div2Hide'   );

    div2NoneButton.onclick    = changeStyle;
    div2InlineButton.onclick  = changeStyle;
    div2BlockButton.onclick   = changeStyle;
    div2HideButton.onclick    = changeStyle;

    img1 = document.getElementById( 'img1' );
    img1NoneButton    = document.getElementById( 'img1None'   );
    img1InlineButton  = document.getElementById( 'img1Inline' );
    img1BlockButton   = document.getElementById( 'img1Block'  );
    img1HideButton    = document.getElementById( 'img1Hide'   );

    img1NoneButton.onclick    = changeStyle;
    img1InlineButton.onclick  = changeStyle;
    img1BlockButton.onclick   = changeStyle;
    img1HideButton.onclick    = changeStyle;

    img2 = document.getElementById( 'img2' );
    img2NoneButton    = document.getElementById( 'img2None'   );
    img2InlineButton  = document.getElementById( 'img2Inline' );
    img2BlockButton   = document.getElementById( 'img2Block'  );
    img2HideButton    = document.getElementById( 'img2Hide'   );

    img2NoneButton.onclick    = changeStyle;
    img2InlineButton.onclick  = changeStyle;
    img2BlockButton.onclick   = changeStyle;
    img2HideButton.onclick    = changeStyle;

    img3 = document.getElementById( 'img3' );
    img3NoneButton    = document.getElementById( 'img3None'   );
    img3InlineButton  = document.getElementById( 'img3Inline' );
    img3BlockButton   = document.getElementById( 'img3Block'  );
    img3HideButton    = document.getElementById( 'img3Hide'   );

    img3NoneButton.onclick    = changeStyle;
    img3InlineButton.onclick  = changeStyle;
    img3BlockButton.onclick   = changeStyle;
    img3HideButton.onclick    = changeStyle;

    img4 = document.getElementById( 'img4' );
    img4NoneButton    = document.getElementById( 'img4None'   );
    img4InlineButton  = document.getElementById( 'img4Inline' );
    img4BlockButton   = document.getElementById( 'img4Block'  );
    img4HideButton    = document.getElementById( 'img4Hide'   );

    img4NoneButton.onclick    = changeStyle;
    img4InlineButton.onclick  = changeStyle;
    img4BlockButton.onclick   = changeStyle;
    img4HideButton.onclick    = changeStyle;
    
    imgMargin   = document.getElementById( 'imgMargin'  );
    imgBorder   = document.getElementById( 'imgBorder'  );
    imgPadding  = document.getElementById( 'imgPadding' );
    imgMargin.onchange  = changeStyle;
    imgBorder.onchange  = changeStyle;
    imgPadding.onchange = changeStyle;

    divMargin   = document.getElementById( 'divMargin'  );
    divBorder   = document.getElementById( 'divBorder'  );
    divPadding  = document.getElementById( 'divPadding' );
    divMargin.onchange  = changeStyle;
    divBorder.onchange  = changeStyle;
    divPadding.onchange = changeStyle;

    images  = document.getElementsByTagName('img');
    divs    = document.getElementById('content').getElementsByTagName('div');

  }


//  OnLoad Event Handler
//  -------------------------------------------------------------------
  window.onload = initialize;



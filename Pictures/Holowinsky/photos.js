//  photos.js
/*
 *  Javascript support routines for the photo gallery web page.
 *
 *  Copyright 2005 Christopher Vickery
 *
 *  This file, photos.js, is part of my photo viewer web page.  See
 *  the "Help/About" link at the bottom of the main page for more
 *  information.
 *
 *  My photo viewer web page is free software; you can redistribute it
 *  and/or modify it under the terms of the GNU General Public License
 *  as published by the Free Software Foundation; either version 2 of
 *  the License, or (at your option) any later version.
 *
 *  My photo viewer is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *  General Public License for more details.
 *
 *  You can obtain a copy of the GNU General Public License by writing
 *  to the Free Software Foundation, Inc., 59 Temple Place, Suite 330,
 *  Boston, MA  02111-1307  USA, or on the web at.
 *  http://www.gnu.org/licenses/.
 */

//  Globals
//  -----------------------------------------------------------------
  var initialized   = false;
  var currentImage  = 0;
  var imgHeight     = 600;
  var images        = new Array();
  var useSmaller    = true;

  //  Labels for resolution button
  var lowResLabel =
            "Higher Resolution (Slower Download)";
  var hiResLabel =
            "Lower Resolution (Faster Download)";

  //  setInner()
  //  --------------------------------------------------------------
  /*    Generate the correct innerHTML for an element, depending on
   *    which browser.
   */
    function setInner( idString, htmlString )
    {
      if ( document.all )
      {
        document.all[ idString ].innerHTML = htmlString;
      }
      else
      {
        document.getElementById( idString ).innerHTML = htmlString;
      }
    }

    function waitForCurrent()
    {
      //  TODO: Get this to work.
      return;
    }

  //  showImage()
  //  ----------------------------------------------------------------
  /*  Displays an image in the image table.  Waits until the image has
   *  been loaded if necessary.
   */
  function showImage( im )
  {
    var fileName = imageURLs[im].split("/")[2];
    window.scrollTo(0, 0);
    currentImage = im;

    if ( !images[im]  )
    {
      images[im] = new Image();
    }

    if ( useSmaller )
    {
      images[im].src = smallerURLs[im];
    }
    else
    {
      images[im].src = imageURLs[im];
    }
    setInner( "image", "<h3>Waiting for image ...<\/h3>" );
    waitForCurrent();

    setInner( "image", "<img class=\"main_image\""  +
                  "src=\""+images[im].src            +
                  "\" "                             +
                  "alt=\""+imageURLs[im]            +
                  "\" height=\""+imgHeight+"\" />" );
    setInner( "title", fileName );
  }

  //  toggleResolution()
  //  -----------------------------------------------------------------
  /*    Toggle between jpeg qualities
   */
    function toggleResolution()
    {
      useSmaller = !useSmaller;
      showImage( currentImage );
      setInner( "resolution", useSmaller ? lowResLabel : hiResLabel );
    }


  //  showNext()
  //  -----------------------------------------------------------------
  function showNext()
  {
    if ( currentImage < (imageURLs.length - 1) )
    {
      showImage( currentImage + 1 );
    }
  }
  
  //  showPrev()
  //  -----------------------------------------------------------------
  function showPrev()
  {
    if ( currentImage > 0 )
    {
      showImage( currentImage - 1 );
    }
    else
    {
      showImage( 0 );
    }
  }

  //  larger() and smaller()
  //  ----------------------------------------------------------------
  /*
   *    Make images larger or smaller to fit user's screen
   */
    function larger()
    {
      var newHeight = imgHeight * 1.1;
      imgHeight = (newHeight > 600) ? 600 : newHeight;
      showImage( currentImage );
    }
    function smaller()
    {
      var newHeight = imgHeight * 0.9;
      imgHeight = (newHeight < 200) ? 200 : newHeight;
      showImage( currentImage );
    }


  //  showFirst() and showLast()
  //  ----------------------------------------------------------------
  function showFirst()
  {
    if ( !initialized )
    {
      initialize();
    }
    if (imageURLs.length != 0)
    {
      showImage( 0 );
    }
  }

  function showLast()
  {
    if (imageURLs.length != 0)
    {
      showImage( imageURLs.length - 1 );
    }
  }


//  opacity.js

/*  Vary the opacity of the content div at a rate controlled by mouse movements.
 */
  function generate_opacity()
  {
    var contentDiv  = null;
    var increment   = 0.1;
    var interval    = 100;
    var increasing  = true;
    var opacity     = 1.0;
    var doit        = true;
    var useFilter   = false;
    
  //  clickHandler()
  //  -----------------------------------------------------------------------
  /*  Mechanism for stopping the effect
   */
    function clickHandler ()
    {
      doit = false;
    }
  
  //  changeOpacity()
  //  -----------------------------------------------------------------------
  /*  Ramp the opacity up or down as the case may be.
   */
    function changeOpacity()
    {
      if ( increasing )
      {
        opacity += increment;
        if ( opacity > 1 )
        {
          opacity = 1;
          increasing = false;
        }
      }
      if ( !increasing )
      {
        opacity -= increment;
        if ( opacity < 0 )
        {
          opacity = 0;
          increasing = true;
        }
      }
      if (doit)
      {
        if (useFilter)
        {
          //  MS says opacity ranges from 0 to 100 instead of 0 to 1.0
          contentDiv.filters.item("DXImageTransform.Microsoft.Alpha").opacity = opacity * 100;
        }
        else
        {
          contentDiv.style.opacity = opacity;
        }
        setTimeout(changeOpacity, interval);
      }
      else
      {
        contentDiv.style.opacity = 1.0;
      }
    }

    //  Return runnable object
    //  =====================================================================================
    return {
      //  init()
      //  -----------------------------------------------------------------------------------
      init: function ()
      {
        contentDiv = document.getElementById('content');
        Core.addEventListener(contentDiv, "dblclick", clickHandler);
        if (contentDiv.style.filter !== "undefined")
        {
          //  Use Microsoft's filter model for setting opacity, which requires the width to
          //  to be set in order to work.
          contentDiv.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=50)";
          contentDiv.style.width = "100%";
          useFilter = true;
        }
        else
        {
          contentDiv.style.opacity = opacity;
        }
        setTimeout(changeOpacity, interval);
      }
    };
  }

Core.start( generate_opacity() );

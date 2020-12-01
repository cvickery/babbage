//  hidecol.js

/*  Allow user to hide columns fo the configuration summary table.
 *
 *  C. Vickery
 *  February 2007
 */

/*  List of class names used in the columns that can be hidden.
 *  Add more names here when new columns are added to the table.
 */
var platforms = new Array( 'lib', 'sim', 'rc10', 'rc200e', 'rc300');

//  Text to highlight when any column heading is hovered.
var tooltip   = null;

//  window.onload()
//  -------------------------------------------------------------------
/*
 *    Initialization: Set event handlers for each column heading and
 *    the tooltip text in the Platform heading.
 */
  window.onload = function() {

    tooltip = document.getElementById('tooltip');
    for (var p = 0; p < platforms.length; p++)
    {
      var platformToHide = platforms[p];
      var ths = document.getElementsByTagName('th');
      for (var i=0; i<ths.length; i++)
      {
        var classValue = ths[i].getAttribute('class');
        if (classValue == undefined)
        {
          classValue = ths[i].getAttribute('className');
        }
        if ((classValue != undefined) &&
            (classValue == platformToHide) )
        {
          ths[i].onmouseover = function(e)
          {
            var event = (e == undefined) ? window.event : e;
            highlight(event);
          }
          ths[i].onmouseout = function(e)
          {
            var event = (e == undefined) ? window.event : e;
            unHighlight(event);
          }
          ths[i].onclick = function(e)
          {
            var event = (e == undefined) ? window.event : e;
            doHide(event);
          }
        }
      }
    }
  };

//  highlight()
//  -------------------------------------------------------------------
/*
 *  handler for column heading mouseover events.  Highlight it and the
 *  tooltip.
 */
  function highlight(e)
  {
    var whichNode = (e.target == undefined) ? e.srcElement : e.target;
    whichNode.style.backgroundColor = '#f99';
    tooltip.style.backgroundColor = '#f99';
  }

//  unHighlight()
//  -------------------------------------------------------------------
/*
 *    Handler for column heading mouseout events.  Remove highlighting
 *    from the heading and tooltip.
 */
  function unHighlight(e)
  {
    var whichNode = (e.target == undefined) ? e.srcElement : e.target;
    whichNode.style.backgroundColor = '#ddd';
    tooltip.style.backgroundColor = '#ddd';
  }

//  doHide()
//  -------------------------------------------------------------------
/*
 *    Handler for column heading click events.  Invisibilizates the
 *    heading and all tds with the same class name.
 */
  function doHide(e)
  {
    var whichNode = (e.target == undefined) ? e.srcElement : e.target;
    var platform = whichNode.getAttribute('class');
    if (platform == undefined)
    {
      platform = whichNode.getAttribute('className');
    }
    if (platform != undefined)
    {
      whichNode.style.display = 'none';
      var tds = document.getElementsByTagName('td');
      for (var i=0; i<tds.length; i++)
      {
        var tdClass = tds[i].getAttribute('class');
        if (tdClass == undefined)
        {
          tdClass = tds[i].getAttribute('className');
        }
        if ((tdClass != undefined) && (tdClass == platform))
        {
          tds[i].style.display = 'none';
        }
      }
    }
  }

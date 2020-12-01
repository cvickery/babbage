//  dynamics.js

//  Global Variables
//  ------------------------------------------------------------------
var blackOnWhite;
var theFoot;

//  changeStyle()
//  ------------------------------------------------------------------
  function changeStyle()
  {
    if (blackOnWhite.checked)
    {
      theFoot.style.backgroundColor = 'white';
      theFoot.style.color           = 'black';
    }
    else
    {
      theFoot.style.backgroundColor = 'black';
      theFoot.style.color           = 'white';
    }
  }

//  function init()
//  ------------------------------------------------------------------
  function init()
  {
    theFoot = document.getElementById('theFoot');
    blackOnWhite = document.getElementById('blackOnWhite');
    blackOnWhite.onchange = changeStyle;
  }

  //  Set up onload handler
  window.onload = init;


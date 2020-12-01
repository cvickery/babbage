//  state_select.js
//  =====================================================================================================
/*
 *    Provides a suggestion list for a text input field for selecting a 2-letter state abbreviation.
 */


//  generate_states()
//  =====================================================================================================
/*
 *    Returns an object for managing a list of suggested state names along with a closure containing the
 *    variables and functions used by the object. The object has an init() method to make it useable as
 *    a "runnable" object with the Core library from the Simply JavaScript book.
 *
 *    C. Vickery
 *    October, 2007
 */
  function generate_states()
  {
    var MAX_PROMPTS         = 8;    //  Max number of matches to show

    var stateInput          = null; //  The text box for selecting a state
    var statePrompt         = null; //  The dynamic suggestion overlay

    var thisKey             = 0;    //  Key just released
    var lastKey             = 0;    //  Previously release key
    var arrowPress          = false;  //  Was last key event keypress for an arrow key?

    var curMatches          = [];   //  Array of all states that match current type-in
    var curPositions        = [];   //  Parallel array of match positions for underlining
    var firstPrompt         = -1;   //  Index of first matched state to show, if any matches
    var lastPrompt          = -1;   //  Index of last matched state to show, if any matches
    var highlightIndex      = -1;   //  Index of selected state, if any, in curMatches
    var selectedStateIndex  = -1;   //  Index of selected state, if any, in allStates[]

    var allStates = [ "AL Alabama", "AK Alaska", "AS American Samoa", "AZ Arizona", "AR Arkansas",
      "CA California", "CO Colorado", "CT Connecticut", "DE Delaware", "DC District Of Columbia",
      "FM Federated States Of Micronesia", "FL Florida", "GA Georgia", "GU Guam", "HI Hawaii", "ID Idaho",
      "IL Illinois", "IN Indiana", "IA Iowa", "KS Kansas", "KY Kentucky", "LA Louisiana", "ME Maine",
      "MH Marshall Islands", "MD Maryland", "MA Massachusetts", "MI Michigan", "MN Minnesota", "MS Mississippi",
      "MO Missouri", "MT Montana", "NE Nebraska", "NV Nevada", "NH New Hampshire", "NJ New Jersey",
      "NM New Mexico", "NY New York", "NC North Carolina", "ND North Dakota", "MP Northern Mariana Islands",
      "OH Ohio", "OK Oklahoma", "OR Oregon", "PW Palau", "PA Pennsylvania", "PR Puerto Rico", "RI Rhode Island",
      "SC South Carolina", "SD South Dakota", "TN Tennessee", "TX Texas", "UT Utah", "VT Vermont",
      "VI Virgin Islands", "VA Virginia", "WA Washington", "WV West Virginia", "WI Wisconsin", "WY Wyoming",
      "AE Armed Forces Africa", "AA Armed Forces Americas (except Canada)", "AE Armed Forces Canada",
      "AE Armed Forces Europe", "AE Armed Forces Middle East", "AP Armed Forces Pacific" ];


  //  updateMatches()
  //  ----------------------------------------------------------------------------
  /*    Update the filtered list.
   */
    function updateMatches()
    {
      stateInput.style.backgroundColor = "#fff";
      var str = stateInput.value.toLowerCase();

      curMatches = [ ];
      curPositions = [ ];    // parallel array for underlining
      for (var i = 0; i < allStates.length; i++)
      {
        var pos = allStates[i].toLowerCase().indexOf(str);
        if ( pos >= 0 )
        {
          curMatches[curMatches.length] = i;
          curPositions[curPositions.length] = pos;
        }
      }
      if (curMatches.length > 0)
      {
        firstPrompt = 0;
        lastPrompt = (curMatches.length > MAX_PROMPTS) ? (MAX_PROMPTS - 1) : (curMatches.length - 1);
      }
      else
      {
        firstPrompt = lastPrompt = -1;
      }
      highlightIndex = -1;
    }

  //  generateHTML()
  //  ----------------------------------------------------------------------------
  /*  Generate paragraphs for the currently displayed currently matched states.
   *  Underline current match string, and highlight selected one if there is one.
   */
    function generateHTML()
    {
//    console.log("generateHTML: "+firstPrompt+", "+lastPrompt+" ("+highlightIndex+")");

      var returnVal = "";
      selectedStateIndex = -1;

      if (curMatches.length === 0)
      {
        return "<p>No Match</p>";
      }

      var curPromptIndex = 0;
      for (var i = firstPrompt; i <= lastPrompt; i++)
      {
        var str     = allStates[curMatches[i]];
        var pos     = curPositions[i];
        var len     = stateInput.value.length;
        var prefix  = str.substr(0,pos);
        var match   = str.substr(pos, len);
        var suffix  = str.substr(pos + len);

        if (len > 0)
        {
          match = "<span class='underline'>" + match + "</span>";
        }

        if (curPromptIndex++ === highlightIndex)
        {
          returnVal += "<p class='highlight'>" + prefix + match + suffix + "</p>";
          selectedStateIndex = curMatches[i];
        }
        else
        {
          returnVal += "<p>" + prefix + match + suffix + "</p>";
        }
      }

      //  No state highlighted, but only one matches: select it.
      if (curMatches.length === 1)
      {
        selectedStateIndex = curMatches[0];
      }
      return returnVal;
    }

  //  showPrompt()
  //  -------------------------------------------------------------------
  /*    Generate filtered list and display the prompt
   */
    function showPrompt()
    {
//    console.log("showPrompt:");
      statePrompt.innerHTML = generateHTML();
      statePrompt.style.display = "block";
    }

  //  hidePrompt()
  //  -------------------------------------------------------------------
  /*  On Enter or blur, update text box contents and hide the prompt.
   */
    function hidePrompt()
    {
//    console.log("hidePrompt: " + selectedStateIndex);
      if (selectedStateIndex >= 0)
      {
        stateInput.value = allStates[selectedStateIndex].substring(0, 2);
        stateInput.style.backgroundColor = "#cfc";
      }
      else
      {
        stateInput.value = "";
        stateInput.style.backgroundColor = "#fcc";
      }
      statePrompt.style.display = "none";
      highlightIndex = -1;
    }

  //  blurHandler()
  //  ----------------------------------------------------------------------------------
    function blurHandler(evt)
    {
//    console.log("blurHandler:");
      hidePrompt();
    }

  //  Keyboard Event Handlers
  //  ==================================================================================
  /*
   *    Goal: To respond to each keystroke and auto-repeat event exactly once.
   *
   *    Arrow keys are the problem: Opera and Gecko give one keypress and one keyup
   *    event for each down-up; IE gives one keyup for each down-up; Safari gives two
   *    keypress and keyup events for each down-up.
   *
   *    Safari uses keyCodes 63,232 and 63,233 for arrow keys; all others use 38 and 40.
   *
   *    Need to filter out dupes on Safari, need to ignore keyup on all but IE.
   */

  //  doDownArrow()
  //  ----------------------------------------------------------------------------------
  /*    Move down the match list.
   */
    function doDownArrow()
    {
//      console.log("doDownArrow: " + arrowPress);
     if (curMatches.length === 0)
      {
        updateMatches();
      }

      if (highlightIndex < (curMatches.length - 1))
      {
        highlightIndex++;
      }
      if (highlightIndex > (MAX_PROMPTS - 1))
      {
        highlightIndex--;
        firstPrompt++;
        lastPrompt++;
      }
      showPrompt();
      return;
    }

  //  doUpArrow()
  //  ----------------------------------------------------------------------------------
  /*    Move up the match list.
   */
    function doUpArrow()
    {
      //  Up Arrow: move up the match list
      if (curMatches.length === 0)
      {
        updateMatches();
      }

      if (--highlightIndex < 0)
      {
        highlightIndex = 0;
        if( firstPrompt > 0)
        {
          firstPrompt--;
          lastPrompt--;
        }
      }
      showPrompt();
      return;
    }

  //  keyupHandler()
  //  ----------------------------------------------------------------------------------
  /*    Handles keyup events: process Arrow, Enter, Esc, and Tab; update the list of
   *    matches for all others.
   */
    function keyupHandler(evt)
    {
      evt = evt ? evt :document.event;
//    console.log("keyupHandler: " + evt.keyCode + "; arrowPress: " + arrowPress + "; highlightIndex:" + highlightIndex);
//    alert("Keyup: " + evt.keyCode);
      lastKey = thisKey;
      thisKey = evt.keyCode;

      if ( !arrowPress && (thisKey === 40) )
      {
        //  Down arrow with no previous keypress (IE7)
        doDownArrow();
        return;
      }

      if ( !arrowPress && (thisKey === 38) )
      {
        //  Up arrow keyup with no previous keypress (IE7)
        doUpArrow();
        return;
      }

      if (arrowPress &&
          ((thisKey === 40) || (thisKey === 38) || ((thisKey === 63233) || (thisKey === 63232))))
      {
        //  Ignore keyup events for arrow keys if they were processed as keypress events.
        return;
      }
      if (thisKey === 13)
      {
        if (lastKey === 13)
        {
          // Ignore double-Enter
          return;
        }
        //  Enter: Kill prompt, but use current selection, if there is one.
        if ((curMatches.length > 1) && (highlightIndex < 0))
        {
          selectedStateIndex = -1;
        }
        hidePrompt();
        return;
      }
      if (thisKey === 27)
      {
        //  Escape: Kill prompt and disregard current selection, even if there is one.
        selectedStateIndex = -1;
        hidePrompt();
        return;
      }

      if (thisKey === 9)
      {
        //  Tab key: blurHandler will handle handling it
        return;
      }
      //  Not arrow, not return, not escape, not tab: updateMatches
      updateMatches();
      showPrompt();
    }

  //  keypressHandler()
  //  ----------------------------------------------------------------------------------
  /*    Process keypress events for arrow keys.
   */
    function keypressHandler(evt)
    {
      evt = evt ? evt :document.event;
//    console.log("keypressHandler: " + evt.keyCode);
//    alert("Keypress: " + evt.keyCode);
      arrowPress = true;
      var keycode = evt.keyCode;
      if ((keycode === 40) || (keycode === 63233))
      {
        doDownArrow();
        return;
      }

      if ((keycode === 38) || (keycode === 63232))
      {
        doUpArrow();
        return;
      }
      arrowPress = false;
      keyupHandler(evt);
    }

  //  setXY()
  //  ---------------------------------------------------------------
  /*  Position and size the prompt.
   */
    function setXY()
    {
      var x = stateInput.offsetLeft;
      var y = stateInput.offsetTop + stateInput.clientHeight;
      var obj = statePrompt;
      do
      {
        if (obj.scrollTop !== undefined)
        {
          y -= obj.scrollTop;
        }
        if (obj.scrollLeft !== undefined)
        {
          x -= obj.scrollLeft;
        }
        obj = obj.parentNode;
      } while (obj);
      statePrompt.style.left = x + "px";
      statePrompt.style.top = y + "px";
      statePrompt.style.width = stateInput.clientWidth + "px";
    }

    //  Return an object with access by closure to all of the above
    //  ==============================================================================
    return {

    //  init()
    //  ------------------------------------------------------------------------------
    /*  Implement the Core.runnable interface ... as it were.
     */
      init: function ()
      {
//      console.log("init:");
        stateInput = document.getElementById('state-input');
        statePrompt = document.getElementById('state-prompt');

        statePrompt.style.backgroundColor = "#eee";
        statePrompt.style.opacity = "0.8"; // do it here to avoid css hacks
        stateInput.value = "";
        firstPrompt = lastPrompt = -1;

        Core.addEventListener(stateInput, "focus", showPrompt);
        Core.addEventListener(stateInput, "keypress", keypressHandler);
        Core.addEventListener(stateInput, "keyup", keyupHandler);
        Core.addEventListener(stateInput, "blur", blurHandler);
        Core.addEventListener(document, "size", setXY);
        Core.addEventListener(document, "scroll", setXY);
        setXY();
      }

    };
  }

  //  Register an instance of the suggestion object with the Core library.
  Core.start( generate_states() );

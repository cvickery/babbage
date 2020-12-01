//  version_1.js
//  --------------------------------------------------------------
/*  Uses global variables and named functions.
 */
 
//  Global Variables
//  --------------------------------------------------------------
var theForm   = null;
var theText   = null;
var someText  = "Controversy equalizes fools and wise men " +
                "- and the fools know it.";

//  window.onload
//  --------------------------------------------------------------
window.onload = initialize;

//  initialize()
//  --------------------------------------------------------------
/*
 *  Initializes global variables and sets up to intercept form
 *  submission.
 */
  function initialize()
  {
    theForm = document.getElementById('theForm');
    theText = document.getElementById('theText');
    theForm.onsubmit = validateForm;
  }

//  validateForm()
//  --------------------------------------------------------------
/*
 *  Makes sure the text field has been filled in.  If it has not,
 *  prevent the form from submitting and fill in the field for the
 *  user.
 */
  function validateForm()
  {
    if (theText.value == "")
    {
      alert("You must enter some text.");
      theText.value = someText;
      return false;
    }
    else
    {
      return true;
    }

  }

//  version_2.js
//  -----------------------------------------------------------------
/*  Uses a mix of local and global variables, and named and anonymous
 *  functions.
 */

//  Global Variables
//  -----------------------------------------------------------------
var someText  = "Controversy equalizes fools and wise men " +
                "- and the fools know it."

//  window.onload
//  -----------------------------------------------------------------
/*
 *  Initializes form validation to be done by validateForm().
 */
  window.onload = function()
  {
    var theForm = document.getElementById('theForm');
    theForm.onsubmit = validateForm;
  }

//  validateForm()
//  -----------------------------------------------------------------
/*  Makes sure the text field has been filled in.  If it has not,
 *  prevent the form from submitting and fill in the field for the
 *  user.
 */
  function validateForm()
  {
    var theText = document.getElementById('theText');
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

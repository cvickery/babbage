//  version_3.js
//  --------------------------------------------------------------
/*  Uses no variables and no named functions.
 */

//  window.onload
//  --------------------------------------------------------------
/*
 *  Sets up and implements form validation: the text field must
 *  not be empty.
 */
  window.onload = function()
  {
    document.getElementById('theForm').onsubmit = function()
    {
      if (document.getElementById('theText').value == "")
      {
        alert("You must enter some text.");
        document.getElementById('theText').value = 
                    "Controversy equalizes fools and wise men " +
                    "- and the fools know it.";
        return false;
      }
      else
      {
        return true;
      }
    }
  }

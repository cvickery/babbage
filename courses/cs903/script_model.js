//  script_model.js
//  ----------------------------------------------------------------------
/*  Model code for using the Core library provided by the textbook without
 *  adding any global variables to the application.
 *
 *  C. Vickery
 */

//  Make sure the page that links to this script is configured properly.
if (typeof Core === "undefined")
{
  alert("Core library is missing!");
}

Core.start
(
  (
    //  Anonymous self-executing funtion that returns an object that
    //  contains an init() method.
    function()
    {
      //  An example of an event listener that can be set up from init().
      var submitListener = function(evt)
      {
        evt = evt ? evt : window.event;
        if (!confirm("I see that you tried to submit this form.\n"+
                "Would you like me to check it for you?"))
        {
          Core.preventDefault(evt);
        }
      };
      //  Return an object ...
      return {
        // ... that contains an init() methoc.
        init: function()
        {
          //  Initialize the application.
          document.getElementById('needJS').style.display = 'none'
          var theForm = document.getElementsByTagName('form')[0];
          if (theForm != 'undefined')
          {
            Core.addEventListener(theForm, 'submit', submitListener);
          }
        }
      }; // End of return statement
    } // End of self-executing function definition
  )() // Execute the self-executing function
); // End of Core.start(); statement.

// assignment_07.js
/* For testing code for Assignment 7 assignment page.
 */

  function keyupHandler()
  {
    console.log("Keyup event detected.");
    var theText = document.getElementsByTagName('textarea')[0];
    var theValue = theText.value;
    if (theValue.length > 3)
    {
      theText.style.backgroundColor = '#fff';
    }
    else
    {
      theText.style.backgroundColor = '#fcc';
    }
  }

  function submitHandler()
  {
    console.log("Submit event detected.");
    var allTextareas = document.getElementsByTagName('textarea');
    var theTextarea = allTextareas[0];
    var theText = theTextarea.value;
    if (theText === '')
    {
      theTextarea.onkeyup = keyupHandler;
      theTextarea.style.backgroundColor = "#fcc";
      return false;
    }
    else
    {
      theTextarea.style.backgroundColor = "#fff";
      return true;
    }

  }
  function init()
  {
    console.log("Load event detected");
    var allForms = document.getElementsByTagName('form');
    var theForm  = allForms[0];
    theForm.onsubmit = submitHandler;
    console.log(theForm);
  }

  window.onload = init;

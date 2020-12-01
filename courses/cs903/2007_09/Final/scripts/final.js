// CS-90.3 final.js

//  final()
//  --------------------------------------------------------------------
/*
 *  Generates the final project object for Core.start().
 */
  function final()
  {
    // The Closure
    //  ================================================================
    var theForm       = null;
    var submitButton  = null;
    var emailInput    = null;
    var nameInput     = null;
    var passwdInput   = null;
    var request       = null;

    //  showError()
    //  ----------------------------------------------------------------
    function showError(text)
    {
      console.log("showError: " + text);
      var needJS = document.getElementById('needJS');
      needJS.firstChild.nodeValue = text;
      needJS.style.visibility = 'visible';
    }
    //  createXMLHttpRequest()
    //  ----------------------------------------------------------------
    function createXMLHttpRequest()
    {
      var returnVal = null;
      try
      {
        returnVal = new XMLHttpRequest();
      }
      catch (error)
      {
        try
        {
          returnVal = new ActiveXObject('Microsoft.XMLHTTP');
        }
        catch (error)
        {
          return null;
        }
      }
      return returnVal;
    }

    //  readyStateChangeHandler()
    //  ----------------------------------------------------------------
    function readyStateChangeHandler()
    {
//    console.log('readyStateChangeHandler: ' + request.readyState + ":" + request.status);
      if (request.readyState === 4)
      {
        if (request.status == 200)
        {
//					console.log("4/200: " + request.responseText);return;
          var reply = JSON.parse(request.responseText);
					nameInput.value = reply.name;
//					for (var x in reply)
//					{
//						console.log(x +": " + reply[x]);
//					}
        }
        else
        {
          showError(request.statusText);
        }
      }
    }

    //  submitListener()
    //  ----------------------------------------------------------------
    function submitListener(event)
    {
      alert("Don't do that.");
      Core.preventDefault(event);
    }
    
    //  changeListener()
    //  ----------------------------------------------------------------
    function changeListener(event)
    {
      if (emailInput.value != "" && passwdInput.value != "")
      {
        var exchgObj = { email: emailInput.value, passwd: passwdInput.value };
        var exchgStr = JSON.stringify(exchgObj);
//        console.log("changeListener: " + exchgStr);
        request = createXMLHttpRequest();
        if (request === null) return;
        request.open('POST', 'request_processor.php', true);
        request.setRequestHeader('Content-Type', 
                                   'application/x-www-form-urlencoded');
        request.send("info=" + exchgStr);
        request.onreadystatechange = readyStateChangeHandler;
      }
    }

    //  The Object
    //  ================================================================
    return {
      //  init()
      //  --------------------------------------------------------------
      init: function() {
        document.getElementById('needJS').style.visibility = 'hidden';
        theForm = document.getElementsByTagName('form')[0];
        emailInput = document.getElementById('email');
        passwdInput = document.getElementById('passwd');
        nameInput = document.getElementById('personName');
        submitButton = document.getElementById('submit');
        submitButton.disabled = true;

        Core.addEventListener(theForm, 'submit', submitListener);
        Core.addEventListener(emailInput, 'change', changeListener);
        Core.addEventListener(passwdInput, 'change', changeListener);
  
      }
    };
  }

Core.start(final());

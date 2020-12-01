var theForm       = null;
var action_PHP    = null;
var action_SH     = null;
var action_81     = null;
var method_GET    = null;
var method_POST   = null;
var method_Multi  = null;

//  window.onload()
//  ------------------------------------------------------------
/*
 *    Set up to configure submission options when the form is
 *    submitted.
 */
  window.onload = function()
  {
    //  Javascript is running: display the submission controls.
    document.getElementById('controls').style.display = 'block';

    //  Get references to the form and the six option radio buttons.
    theForm       = document.getElementById('theForm');
    action_PHP    = document.getElementById('action_php');
    action_SH     = document.getElementById('action_sh');
    action_81     = document.getElementById('action_81');
    method_GET    = document.getElementById('method_get');
    method_POST   = document.getElementById('method_post');
    method_Multi  = document.getElementById('method_multipart');

    var action  = 'Form_Script.php';
    var method  = 'get';
    var enctype = 'application/x-www-form-urlencoded';

    var start   = 0;
    var end     = 0;
    var value   = '';
    
    //  (Re)set default values -- carry over last session settings
    if (document.cookie.length > 0)
    {
      if ((start = document.cookie.indexOf('action=')) != -1)
      {
        end = (document.cookie.indexOf(';', start) > 0) ?
        document.cookie.indexOf(';', start) : document.cookie.length;
        value = document.cookie.substring(start, end);
        if (value.indexOf('Form_Script.php') > 0)
        {
          action_PHP.checked = true;
        }
        else if (value.indexOf('Form_Script.sh') > 0)
        {
          action_SH.checked = true;
        }
        else if (value.indexOf('localhost:81') > 0)
        {
          action_81.checked = true;
        }
        else
        {
          alert('"' + value + '" is not a valid action!');
          return;
        }
        action = value;
      }

      if ((start = document.cookie.indexOf('method=')) != -1)
      {
        end = (document.cookie.indexOf(';', start) > 0) ?
        document.cookie.indexOf(';', start) : document.cookie.length;
        value = document.cookie.substring(start+7, end);
        if (value.indexOf('get') == 0)
        {
          method_GET.checked = true;
        }
        else if (value.indexOf('post') == 0)
        {
          method_POST.checked = true;
        }
        else 
        {
          alert('"' + value + '" is not a valid method!');
          return
        }
        method = value;
      }

      if ((start = document.cookie.indexOf('enctype=')) != -1)
      {
        end = (document.cookie.indexOf(';', start) > 0) ?
        document.cookie.indexOf(';', start) : document.cookie.length;
        value = document.cookie.substring(start+8, end);
        if (value == 'application/x-www-form-urlencoded')
        {
          ; // Could be either 'get' or 'post'
        }
        else if (value == 'multipart/form-data')
        {
          method_Multi.checked = true;
        }
        else
        {
          alert('"' + value + '" is not a valid enctype!');
          return;
        }
        enctype = value;
      }
    }
    theForm.action = action;
    theForm.method = method;
    theForm.enctype = enctype;

    //  Event handler for form submission
    theForm.onsubmit = function()
    {
      if (action_PHP.checked) theForm.action = 'Form_Script.php';
      if (action_SH.checked)  theForm.action = 'Form_Script.sh';
      if (action_81.checked)  theForm.action = 'http://localhost:81';

      theForm.enctype = 'application/x-www-form-urlencoded';
      if (method_GET.checked) theForm.method = 'get';
      if (method_POST.checked) theForm.method = 'post';
      if (method_Multi.checked)
      {
        theForm.method = 'post';
        theForm.enctype = 'multipart/form-data';
      }
      
      //  Block form submission if there is no secret message.
      if (document.getElementById('passwd_in').value == "")
      {
        alert("You must supply a secret message in order to submit the form.");
        return false;
      }
      document.cookie = "method="   + theForm.method;
      document.cookie = "action="   + theForm.action;
      document.cookie = "enctype="  + theForm.enctype;
      return true;
    }
    
    //  Event handler for the Restore Defaults button
    document.getElementById('restore_defaults').onclick = function()
    {
      action_PHP.checked = true;
      method_GET.checked = true;
      document.getElementById('passwd_in').value = "This is a secret " +
                                                                    "message.";
    }

  }

//  Global Variables for Expand/Collapse Sections logic
//  -----------------------------------------------------------
var rightArrow    = null; //  The right arrow image
var downArrow     = null; //  The down arrow image
var sections      = new Array();

//  sectionInfo: Constructor
//  -----------------------------------------------------------
/*    Initialializes a sectionInfo object to hold information
 *    about a section (the div following an h2 or an h3) so that
 *    it can be hidden/shown when the user clicks on a button we
 *    add to the h2 or h3 object.
 */
  function sectionInfo(whatButton, whatToHide)
  {
    this.btn            = whatButton;
    this.div            = whatToHide;
    this.img            = whatButton.firstChild;
    this.img.src        = downArrow.src;
    this.img.alt        = downArrow.alt;
    whatButton.onclick  = showHideSection;
  }


//  showHideSection()
//  -----------------------------------------------------------
/*    The right/down arrow buttons cause the section (div)
 *    following the heading with the button to collapse or open.
 */
  function showHideSection(e)
  {

    //  Find the button that triggered this action
    var event   = window.event ? window.event : e;
    var trigger = event.target ? event.target : event.srcElement;

    //  Find the sectionInfo for that button
    var sectionBody = null;
    var buttonImg   = null;
    for (var i=0; i<sections.length; i++)
    {
      if (sections[i].btn == trigger)
      {
        sectionBody = sections[i].div;
        buttonImg   = sections[i].img;
        break;
      }
  //    else
  //    {
  //      alert(trigger+" is not "+sections[i].btn);
  //      return;
  //    }
    }


    if (sectionBody.style.display != 'none')
    {
      sectionBody.style.display = 'none';
      buttonImg.src             = rightArrow.src;
      buttonImg.alt             = rightArrow.alt;
    }
    else
    {
      sectionBody.style.display = 'block';
      buttonImg.src             = downArrow.src;
      buttonImg.alt             = downArrow.alt;
    }
  }

//  showAnswer()
//  -------------------------------------------------------------------
/*
 *    Displays an answer paragraph, which is defined as the next element
 *    of the DOM that is not a text node.  Normally, it's the next
 *    paragraph following the one being moused over.
 */
function showAnswer(e)
{
  var evt = (e) ? e : ((window.event) ? window.event : null);
  if (evt == null) return;
  var ans = (evt.srcElement ? evt.srcElement : evt.target).nextSibling;
  //  Find next element node (type 1), skipping over text nodes (type 3).
  while ((ans != null) && (ans.nodeType != 1))
  {
    ans = ans.nextSibling;
  }
  if (ans != null && (ans.nodeName == 'p')) ans.style.visibility = 'visible';
}


//  hideAnswer()
//  -------------------------------------------------------------------
/*    Hides the paragraph following a question when the mouse leaves
 *    the question.
 */
function hideAnswer(e)
{
  var evt = (e) ? e : ((window.event) ? window.event : null);
  if (evt == null) return;
  var ans = (evt.srcElement ? evt.srcElement : evt.target).nextSibling;
  while ((ans != null) && (ans.nodeType != 1))
  {
    ans = ans.nextSibling;
  }
  if (ans != null && (ans.nodeName == 'p')) ans.style.visibility = 'hidden';
}

//  Global variable used by showAlert()
var alertArg = '';

//  showAlert()
//  -------------------------------------------------------------------
/*    Shows an interactive alert, makes sure it gets shown only once.
 *    Makes it a modal dialog that won't allow repeated displays of the
 *    same argument.
 */
 function showAlert(arg)
 {
    if (arg == alertArg) return;
    alertArg = arg;
    alert( arg );
    alertArg = '';
    return;
 }


//  verifyFormData()
//  -------------------------------------------------------------------
/*    Decides whether to let the sample form get submitted or not.
 */
function verifyFormData()
{
   var passwd = document.getElementById('pass');
   if ( passwd.value == 'secret' )
   {
      alert("Right, 'secret' is the password.");
      return true;
   }
   else
   {
      alert('Wrong, \'' + passwd.value + '\' is not \'secret\'.');
      return false;
   }
}


//  window.onload()
//  -------------------------------------------------------------------
/*    Initializes various dynamic effects for the tutorial.
 */
window.onload=function()
{
  rightArrow      = new Image();
  rightArrow.src  = 'images/rt.png';
  rightArrow.alt  = 'Expand';
  downArrow       = new Image();
  downArrow.src   = 'images/dn.png';
  downArrow.alt   = 'Collapse';

  //  Find all 'question' paragraphs and set them to show their
  //  answers when moused over.
  var allParagraphs = document.getElementsByTagName('p');
  for (var i = 0; i < allParagraphs.length; i++)
  {
    if (-1 != allParagraphs[i].className.indexOf('question'))
    {
      allParagraphs[i].onmouseover = showAnswer;
	      allParagraphs[i].onmouseout = hideAnswer;
    }
  }
  var navList = document.getElementById('navList');
  var allH2s = document.getElementsByTagName('h2');
  var numSections = 0;

  //  Empty the nav list, which had to have a li so it would pass
  //  tidy validation
  
  while (navList.firstChild) navList.removeChild(navList.firstChild);
  
  //  Add H2 elements to navigation bar, and add an expand/collapse
  //  button to each one.
  for (var i = 0; i < allH2s.length; i++)
  {
    var thisH2 = allH2s[i]
    var targetID = thisH2.id;
    if ( targetID == '' )
    {
      targetID = 'navTarget_' + i;
      thisH2.id = targetID;
    }
    var newNavLi = document.createElement('li');
    var newNavA = document.createElement('a');
    var newStr = document.createTextNode(allH2s[i].firstChild.nodeValue);
    newNavA.appendChild(newStr);
    newNavA.href='#'+targetID;
    newNavLi.appendChild(newNavA);
    navList.appendChild(newNavLi);

    //  Place expand/collapse buttons on this H2.
    var theButton = document.createElement('button');
    theButton.appendChild(document.createElement('img'));
    thisH2.insertBefore(theButton,thisH2.firstChild);
    var nxtSib = thisH2.nextSibling;
    var str = new String(nxtSib.tagName);
    if (str.toLowerCase() != 'div')
    {
      nxtSib = nxtSib.nextSibling;
    }
    sections[numSections++] = new sectionInfo(theButton, nxtSib);
  }

  //  Put collapse/expand buttons on all the H3 elements
  var theH3s  = document.getElementsByTagName('h3');
  for (var i=0; i<theH3s.length; i++)
  {
    var thisH3 = theH3s[i];
    theButton = document.createElement('button');
    theButton.appendChild(document.createElement('img'));
    thisH3.insertBefore(theButton,thisH3.firstChild);
    nxtSib = thisH3.nextSibling;
    str = new String(nxtSib.tagName);

    //  Hack: make sure the element to hide/show is a div.
    if (str.toLowerCase() != 'div')
    {
      nxtSib = nxtSib.nextSibling;
    }
    sections[numSections++] = new sectionInfo(theButton, nxtSib);
  }

  //  Set up to verify form data
  document.getElementById('theForm').onsubmit = verifyFormData;
}


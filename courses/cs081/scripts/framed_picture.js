var toggleOverflowButton = null;
var toggleFirstBackgroundButton = null;
var toggleSecondBackgroundButton = null;
var overflowDiv = null;
var pictureDiv = null;

window.onload = function()
{
  toggleOverflowButton = document.getElementById('toggle_overflow');
  toggleFirstBackgroundButton = document.getElementById('toggle_first_background');
  toggleSecondBackgroundButton = document.getElementById('toggle_second_background');
  overflowDiv = document.getElementById('overflow_div');
  pictureDiv = document.getElementById('picture');

  toggleOverflowButton.onclick = toggleOverflow;
  toggleFirstBackgroundButton.onclick = toggleFirstBackground;
  toggleSecondBackgroundButton.onclick = toggleSecondBackground;

  overflowDiv.style.overflow = 'visible';

}

function toggleOverflow(evt)
{
  if (toggleOverflowButton.firstChild.nodeValue == 'Hide Overflow')
  {
  
    toggleOverflowButton.firstChild.nodeValue = 'Show Overflow';
    overflowDiv.style.overflow = 'hidden';
  }
  else
  {
    toggleOverflowButton.firstChild.nodeValue = 'Hide Overflow';
    overflowDiv.style.overflow = 'visible';
  }
}

function toggleFirstBackground(evt)
{
  if (toggleFirstBackgroundButton.firstChild.nodeValue == 'Hide Background')
  {
    overflowDiv.style.backgroundImage = 'none';
    toggleFirstBackgroundButton.firstChild.nodeValue = 'Show Background';
  }
  else
  {
    overflowDiv.style.backgroundImage =
    'url(images/harbor_optimized_black.jpg)';
    toggleFirstBackgroundButton.firstChild.nodeValue = 'Hide Background';
  }
}

function toggleSecondBackground(evt)
{
  if (toggleSecondBackgroundButton.firstChild.nodeValue == 'Hide Picture')
  {
    pictureDiv.style.backgroundImage = 'none';
    pictureDiv.style.backgroundColor = 'white';
    toggleSecondBackgroundButton.firstChild.nodeValue = 'Show Picture';
  }
  else
  {
    pictureDiv.style.backgroundImage =
    'url(images/harbor_optimized_black.jpg)';
    //pictureDiv.style.backgroundColor = 'black';
    toggleSecondBackgroundButton.firstChild.nodeValue = 'Hide Picture';
  }
}

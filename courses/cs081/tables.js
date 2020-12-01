var table, tr, td, input;
window.onload = init;

function init()
{
  table = document.getElementsByTagName('table')[0];
  tr    = document.getElementsByTagName('tr');
  td    = document.getElementsByTagName('td');
  input = document.getElementsByTagName('input');
  for (var i=0; i<input.length; i++)
  {
    input[i].addEventListener('change', changed, true);
    input[i].value='';
  }
}

function changed(evt)
{
  if (document.getElementById('bs-solid').checked)
    table.style.borderStyle='solid';
  if (document.getElementById('bs-dashed').checked)
    table.style.borderStyle='dashed';
  if (document.getElementById('bs-dotted').checked)
    table.style.borderStyle='dotted';
  if (document.getElementById('bs-none').checked)
    table.style.borderStyle='none';

  if (document.getElementById('bc-collapse').checked)
    table.style.borderCollapse='collapse';
  if (document.getElementById('bc-separate').checked)
    table.style.borderCollapse='separate';
  if (document.getElementById('bc-inherit').checked)
    table.style.borderCollapse='inherit';
  var cspacing=document.getElementById('cellspacing').value;
  var bspacing=document.getElementById('borderspacing').value;
  var padding=document.getElementById('tablepadding').value;
  if (cspacing != '')
    table.cellSpacing=cspacing;
  if (bspacing != '')
    table.style.borderSpacing=bspacing;
  if (padding != '')
    table.style.padding=padding;
  var tdborder=document.getElementById('td-border').value;
  var tdpadding=document.getElementById('td-padding').value;
  var tdheight=document.getElementById('td-height').value;
  var halign='left';
  if (document.getElementById('td-center').checked)
    halign='center';
  if (document.getElementById('td-right').checked)
    halign='right';
  var valign='top';
  if (document.getElementById('td-middle').checked)
    valign='middle';
  if (document.getElementById('td-bottom').checked)
    valign='bottom';
    for (var i=0; i<td.length; i++)
    {
      if (tdborder != '')
        td[i].style.border=tdborder;
      if (tdpadding != '')
        td[i].style.padding=tdpadding;
      if (tdheight != '')
        td[i].style.height=tdheight;
      td[i].style.textAlign=halign;
      td[i].style.verticalAlign=valign;
    }
}


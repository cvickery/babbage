//  pt.js
$(function()
{
  var diagram = $('canvas')[0];
  var context = diagram.getContext('2d');
  context.beginPath();
  context.fillStyle = '#ccc';
  context.fillRect(0, 0, diagram.width, diagram.height);
	context.beginPath();
	context.fillStyle = 'rgba(255, 0, 0, 0.25)';
	context.moveTo(160, 75);
  context.arc(100, 75, 60.0, 0.0, 2*Math.PI, false);
	context.closePath();
	context.stroke();
	context.fill();
	context.beginPath();
	context.fillStyle = 'rgba(0, 255, 0, 0.25)';
  context.moveTo(260, 75);
	context.arc(200, 75, 60.0, 0.0, 2*Math.PI, false);
	context.closePath();
	context.stroke();
	context.fill();
});


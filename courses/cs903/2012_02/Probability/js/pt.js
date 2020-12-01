//  pt.js
$(function()
{
  //  Calculate intersection points of two circles.
	//  Based on public domain code by Tim Voght, which in turn is based on
	//  http://paulbourke.net/geometry/2circle/

  //  Note omitted tests:
  //    if d > (r0 + r1) the circles don't overlap
  //    if d < abs(r0 - r1) one circle is contained in the other
  var x0 = 100, y0 = 75, x1 = 200, y1 = 75, r0 = 60, r1 =60;
  var dx = x1 - x0, dy = y1 - y0;
  var d = Math.sqrt(dx * dx +  dy * dy);
  var a = ((r0 * r0) - (r1 * r1) + (d * d)) / (2 * d);
  var x2 = x0 + (dx * a / d);
  var y2 = y0 + (dy * a / d);
  var h = Math.sqrt((r0 * r0) - (a * a));
  var start0 = Math.acos(a / r0)
  var end0   = -start0;
  var start1 = Math.PI + start0;
  var end1   = Math.PI - start0;
  var rx = -dy * (h / d);
  var ry = +dx * (h / d);
  var xi = x2 + rx;
  var xi_prime = x2 - rx;
  var yi = y2 + ry;
  var yi_prime = y2 - ry;

  //  Construct the Venn diagram
  var diagram = $('canvas')[0];
  var context = diagram.getContext('2d');

  //  Gray rectangle
  context.beginPath();
  context.fillStyle = '#eee';
  context.fillRect(0, 0, diagram.width, diagram.height);

  //  Red circle on left
  context.beginPath();
  context.fillStyle = 'rgba(255, 0, 0, 0.25)';
  context.moveTo(160, 75);
  context.arc(100, 75, 60.0, 0.0, 2 * Math.PI, false);
  context.closePath();
  context.stroke();
  context.fill();

  //  Green circle on right
  context.beginPath();
  context.fillStyle = 'rgba(0, 255, 0, 0.25)';
  context.moveTo(260, 75);
  context.arc(200, 75, 60.0, 0.0, 2 * Math.PI, false);
  context.closePath();
  context.stroke();
  context.fill();

  //  Blue intersection region
  context.beginPath();
  context.fillStyle = 'rgba(0, 0, 155, 1)';
  context.strokeStyle = 'blue';
  context.moveTo(x0 + a, y0);
  context.arc(x0, y0, r0, start0, end0, true);
  context.moveTo(x1 - a, y1);
  context.arc(x1, y1, r1, start1, end1, true);
  context.closePath();
  context.stroke();
  context.fill();
});


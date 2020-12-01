Core.start
(
 (function()
	{
		var theH3 = null;
		var colors = ['rgb(48, 64, 255)', 'rgb(255, 64, 48)', 'rgb(0, 0, 0)', 'rgb(128, 128, 128)' ];
		var colorIndex = 0;
		function buttonListener(evt)
		{
			evt = evt ? evt : window.event;
			colorIndex = ++colorIndex % colors.length;
			theH3.style.backgroundColor = colors[colorIndex];
		}
 
		return {
			init: function()
			{
				theH3 = document.getElementById('gradient-target');
				Core.addEventListener(theH3, 'click', buttonListener);
			}
		};
	})()
);
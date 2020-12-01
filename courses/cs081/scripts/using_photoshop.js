// JavaScript Document
Core.start(
	(function()
	{
		var gradientParagraph = null;
		var bgcolorText = null;
		var redButton = null;
		var greenButton = null;
		var blueButton = null;
		var creamButton = null;
		function buttonListener(evt)
		{
			evt = evt ? evt : window.event;
			if (this === redButton)
			{	
				gradientParagraph.style.backgroundColor = '#9e1616';
				bgcolorText.nodeValue = '#9e1616';
			}
			else if (this === greenButton)
			{
				gradientParagraph.style.backgroundColor = '#169e19';
				bgcolorText.nodeValue = '#169e19';
			}
			else if (this === blueButton)
			{
				gradientParagraph.style.backgroundColor = '#2c38a9';
				bgcolorText.nodeValue = '#2c38a9';
			}
			else if (this === creamButton)
			{
				gradientParagraph.style.backgroundColor = '#ffc';
				bgcolorText.nodeValue = '#ffc';
			}
		}
		return {
			init: function()
			{
				var elements = Core.getElementsByClass('javascript-needed');
				for (var element in elements)
				{
					elements[element].style.display = 'inline';
				}
				elements = Core.getElementsByClass('javascript-not-available');
				for (var element in elements)
				{
					elements[element].style.display = 'none';
				}
				gradientParagraph = document.getElementById('gradient-paragraph');
				bgcolorText = document.getElementById('bgcolor-span').firstChild;
				redButton = document.getElementById('red-button');
				greenButton = document.getElementById('green-button');
				blueButton = document.getElementById('blue-button');
				creamButton = document.getElementById('cream-button');
				Core.addEventListener(redButton, 'click', buttonListener);
				Core.addEventListener(greenButton, 'click', buttonListener);
				Core.addEventListener(blueButton, 'click', buttonListener);
				Core.addEventListener(creamButton, 'click', buttonListener);
			}
		};
	})()
);
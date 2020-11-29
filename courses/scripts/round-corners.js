// round-corners.js
/*	Round the corners of assignment white boxes. Avoid validation errors because of -moz-border-radius
 *  or -webkit-border-radius.
 *
 *	ccv 2009-08-31
 */
if ( typeof Core === "undefined" )
{
	alert("Core library missing")
}
else
{
	Core.start
	(
	 	(function()
		{
			return {
				init: function()
				{
					//	Find all the divs that are the next sibling of an h2 ...
					var h2_list = document.getElementsByTagName('h2');
					for (var h2 = 0; h2 < h2_list.length; h2++)
					{
						// Skip over whitespace
						//	Warning: if you have real text between h2 and div, this might not be what you want
						var div_element = h2_list[h2].nextSibling;
						while (div_element && div_element.nodeType === 3) div_element = div_element.nextSibling;
						if (div_element && div_element.nodeName === "div")
						{
							div_element.style.MozBorderRadius = "5px";
							div_element.style.WebkitBorderRadius = "5px";
						}
					}
				}
			};
		})()
  );
}
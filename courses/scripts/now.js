if(typeof Core==="undefined")
{
	alert("now.js: core.js is missing");
}
else
{
	Core.start(
	function()
	{
		var months			=	["January","February","March","April","May","June","July","August","September","October","November","December"];
		var todayDate		= new Date();
		var todayMonth	=	todayDate.getMonth();
		var todayDay		= todayDate.getDate();
		var todayYear 	= todayDate.getFullYear();
		var targetRow 	= null;
		function scrollWindowTo()
		{
			if (targetRow === null) return;
			var offsetY=0;
			var element=targetRow;
			if (element.offsetParent)
			{
				offsetY=element.offsetTop;
				while (element=element.offsetParent)
				{
					offsetY += element.offsetTop;
				}
			}
			window.scrollTo(0,offsetY);
		}
		function getTextDate(theRow,semesterYear)
		{
			var cols=theRow.getElementsByTagName('td');
			if(cols.length > 0)
			{
				var textDate=cols[0].firstChild.nodeValue+", "+semesterYear;
				textDate=textDate.replace(/\s+|-/g," ");
				return textDate.replace(/^\s+|\s+$/g,"");
			}
			alert("now.js: Table has empty row(s)");return null;
		}
		return {
			init:function()
			{
				var semesterNode	= document.getElementById('semester');
				var semesterYear	= semesterNode.firstChild.nodeValue.match(/(\d{4})/)[1];
				var tables				= document.getElementsByTagName('table');
				if (tables.length > 0)
				{
					var theTable			= tables[0];
					var gotoNowButton	= document.getElementById('gotonow');
					if (gotoNowButton != null)
					{
						try
						{
							var rows 			= theTable.getElementsByTagName('tr');
							var lastRow		= rows[rows.length-1];
							var foundRow	=	0;
							var textDate	=	getTextDate(lastRow,semesterYear);
							var rowDate		=	new Date(textDate);
							var rowMonth	=	rowDate.getMonth();
							var rowDay		=	rowDate.getDate();
							for (var row = 1;row < rows.length; row++)
							{
								textDate = getTextDate(rows[row],semesterYear);
								rowDate = new Date(textDate);
								if (rowDate.valueOf() >= todayDate.valueOf())
								{
									foundRow = row;
									rowMonth = rowDate.getMonth();
									rowDay = rowDate.getDate();break;
								}
							}
							if (foundRow === 0)
							{
								targetRow = lastRow;
								gotoNowButton.firstChild.nodeValue = "-- Scroll to Latest --";
							}
							else
							{
								targetRow = rows[(foundRow > 0) ? foundRow-1 : 0];
								gotoNowButton.firstChild.nodeValue = "-- Scroll to Current (" + months[rowMonth] + " " + rowDay + ") --";
							}
							gotoNowButton.style.visibility = 'visible';
							Core.addEventListener(gotoNowButton, 'click', scrollWindowTo);
						}
						catch(error)
						{
							alert("now.js: " + error + "row date = \"" + rowDate + "\"");
							gotoNowButton.style.visibility = 'hidden';
							return;
						}
					}
					else
					{
						alert("now.js: This page does not have a gotoNow button.");
					}
				}
				else
				{
					alert("now.js: This page does not have a table.");
				}
			}
		}
	}());
}
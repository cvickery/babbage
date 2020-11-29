//  now.js
/*
 *  If there are any tables on the page and if the second column of the
 *  first table starts with a date in the form "Month day" and if there
 *  is a button with the id "gotonow" and if the user clicks the button,
 *  scroll the window to the last table row with a date less than
 *  today's date.  Assumes the first row is all th's and that the first
 *  column of each row is also a th.
 *
 *  2007-12-25: Handle case where today is after the last date.
 *              Use core.js to clean up global namespace.
 *
 *  ccv - 1/29/2007
 */

//  Require core.js
//  --------------------------------------------------------------------------
  if ( typeof Core === "undefined" )
  {
    alert("now.js: core.js is missing");
  }
  else
  {
    Core.start(
      //  Closure for the singleton object
      function()
      {
        var months = [ "January", "February", "March", "April", "May", "June",
             "July", "August", "September", "October", "November", "December"];
        
        var todayDate   = new Date();
        var todayMonth  = todayDate.getMonth();
        var todayDay    = todayDate.getDate(); // getDay() returns 0-6
        var todayYear   = todayDate.getFullYear();
        var targetRow   = null;

        //  scrollWindowTo()
        //  ------------------------------------------------------------------
        /*  Scroll window so targetRow is at top of screen.
         */
        function scrollWindowTo()
        {
          if (targetRow === null) return;
          var offsetY = 0;
          var element = targetRow;
          if (element.offsetParent)
          {
            offsetY = element.offsetTop;
            while (element = element.offsetParent)
            {
              offsetY += element.offsetTop;
            }
          }
          window.scrollTo(0, offsetY);
        }

        //  getTextDate()
        //  ----------------------------------------------------------------
        /*  Returns the text in column 0 of a row, prepared for use as an
         *  argument to Date().
         */
        function getTextDate(theRow, semesterYear)
        {
          var cols = theRow.getElementsByTagName('td');
          if (cols.length > 0)
          {
            var textDate = cols[0].firstChild.nodeValue +
            ", " + semesterYear;
            //  Replace internal spaces and dashes with single spaces.
            //  This fixes an anomaly in FireFox 2.0 when there are non-
            //  breaking spaces in the date string.
            textDate = textDate.replace(/\s+|-/g, " ");
            //  Trim leading and trailing spaces too.
            return textDate.replace(/^\s+|\s+$/g, "");
          }
          alert("now.js: Table has empty row(s)");
          return null;
        }

        return {

        //  init()
        //  -----------------------------------------------------------------
        /*  window.onload event listener.
         */
          init: function()
          {
            var semesterNode = document.getElementById('semester');
            var semesterYear = semesterNode.firstChild.nodeValue.match(/(\d{4})/)[1];
            var tables = document.getElementsByTagName('table');
            if (tables.length > 0)
            {
              var theTable = tables[0];
              var gotoNowButton = document.getElementById('gotonow');
              if (gotoNowButton != null)
              {
                /*  We have a table and a gotoNow button: set up gotoNow button
                 *  label, targetRow,  and button listener.
                 *  Special case: semester is already over.
                 */
                try // In case table contains invalid date strings
                {
                  var rows      = theTable.getElementsByTagName('tr');
                  var lastRow   = rows[rows.length - 1];
                  var foundRow  = 0;
                  var textDate  = getTextDate(lastRow, semesterYear);
                  var rowDate   = new Date(textDate);
                  var rowMonth  = rowDate.getMonth();
                  var rowDay    = rowDate.getDate();
                  /*  Search the table for the first date greater than or
                   *  equal to today.
                   */
                  for (var row = 1; row < rows.length; row++)
                  {
                    textDate = getTextDate(rows[row], semesterYear);
                    rowDate = new Date(textDate);
                    if ( rowDate.valueOf() >= todayDate.valueOf()  )
                    {
                      foundRow  = row;
                      rowMonth  = rowDate.getMonth();
                      rowDay    = rowDate.getDate();
                      break;
                    }
                  }

                  if (foundRow === 0)
                  {
                    // Not found: today is after the last date in the table
                    targetRow = lastRow;
                    gotoNowButton.firstChild.nodeValue = "-- Click Here to scroll to end --";
                  }
                  else
                  {
                    targetRow = rows[(foundRow > 0) ? foundRow - 1 : 0];
                    gotoNowButton.firstChild.nodeValue =
                      "-- Click Here to scroll to " + months[rowMonth] + " " + rowDay + " --";
                  }
                  gotoNowButton.style.visibility = 'visible';
                  Core.addEventListener(gotoNowButton, 'click', scrollWindowTo);
                }
                catch (error)
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


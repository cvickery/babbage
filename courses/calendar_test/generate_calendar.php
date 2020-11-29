<?php
//  Generate table rows for the calendar.

/*
 *  college_dates.ccv: College schedule, including first
 *  day of classes, holidays, and last day of exams.
 *  Determines range of dates for entire calendar.
 *
 *  course_dates.ccv: Template given below.
 *    Line 1: Course Number and title
 *    Line 2: Section (Registration Code), Classroom
 *    Lines 3-n: Schedule Lines:
 *			Day:Time:Room
 *    Lines n+1 - end: Detail lines (blank lines ignored)
 *      mm-dd HTML content, which may span multiple lines.
 */
  class CalendarEntry
  {
    public $date = null;
    public $description = null;
    function __construct($dateArg, $descArg)
    {
      $this->date = $dateArg;
      $this->description = "<strong>$descArg</strong>";
    }
  }
  $entries = array();
  $coll_dates = @fopen("college_dates.ccv", "r") or
    die("Calendar generation failed: ".
    "$php_errormsg\n");
  while (!feof($coll_dates))
  {
    $inbuf = fgets($coll_dates);
    if (trim($inbuf) != "")
    {
      $entries[] = new CalendarEntry(strtotime(substr($inbuf, 0, 10)),
          trim(substr($inbuf, 11)));
    }
  }
  $count=1;
  foreach ($entries as $entry)
  {
      echo "<tr>\n  <th scope=\"row\">&nbsp;</th>\n  <th scope=\"row\">"
						.date("D M d", $entry->date)."</th>\n  <td>".$entry->description."</td>\n</tr>";
    $count++;
  }
?>


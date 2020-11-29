<?php
//  Generate a course calendar.
/*
 *  YYYY_MM-college_calendar.xml: College schedule, including first
 *  day of classes, holidays, and last day of exams.
 *  Determines range of dates for entire calendar. YYYY_MM derived from directory
 *  name from which this script is invoked.
 *
 *  course_dates.xml: Course number and title, administrivia,
 *  events. Use square brackets for angle brackets if you want to embed
 *  html in the event descriptions.
 *
 *  Note: This generates a calendar for multiple sections only if each
 *  section meets on the same days of the week. If not, you have to
 *  have a separate calendar for each section.
 *
 *  2015-08-11: First encountered a term where a non-meeting day of the week follows
 *  a meeting-day schedule. In progress ...
 *
 *  2009-10-16: Exam dates were generating an extra Calendar entry due to code that
 *  was supposed to handle the situation when the final exam happens to be on the
 *  first day of finals. Fixed.
 *
 *  2009-08-17:
 *  Embedded the "check my grades" form in the administrivia section instead of using
 *  a separate web page. This way, the info for the semester comes from the course
 *  calendar, and the schedule page can show when grades were last updated directly.
 *  TODO: Cannot check grades if there are two different sections of the same course,
 *        and I don't know what happens to the course schedule in that case either
 *        (multiple sections never tested).
 *
 *  2009-06-19:
 *  Added last-updated paragraph for the calendar and most-recent forum post info.
 *
 *  2009-05-18: Added "expires" attribute for events. Once the expires date has
 *  passed (must be given as YYYY-MM-DD), the event will no longer be displayed
 *  in the calendar. Used so links to homework solutions won't hang around too
 *  long. (Security by chronology.)
 *
 *  2008-06-05: Fix problems where last day of classes is a class meeting day.
 *
 *  2008-05-18: Use [d file] for date file was last modified;
 *  [t file] for modification time. Implemented only for event descriptions
 *  in the course calendar.
 *
 */
  error_reporting(E_ALL);
  date_default_timezone_set('America/New_York');
  define("SECS_PER_DAY", 86400, true);
  $dayNames = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
  class CalendarEntry
  {
    public $startDate = null;   //  String
    public $endDate = null;     //  String
    public $description = null; //  String
    public $classNumber = null; //  int
    public $noClasses = false;  //  boolean (college-wide)
    public $isClass = false;    //  boolean (this course)
    public $schedule = null;    //  enum {Sun, Mon, ...}
    function __construct($startDate, $description, $endDate, $noClasses = false)
    {
      $this->startDate = $startDate;
      $this->description = "$description";
      $this->endDate = $endDate;
      $this->noClasses = $noClasses;
    }
  }

  //  Process the College Calendar
  //  ============================================================================================
  $thisSemester = basename(getcwd());
  $CalendarEntries  = array();
  $collegeEventElements = array();
  $blockoutDates = array();
  $collegeCalendarFile = @file_get_contents($thisSemester."-college_calendar.xml", "r") or
    die("<h1>Unable to read College calendar:" . $thisSemester . "-college_calendar.xml</h1>");
  $college_dom = new DOMDocument();
  $college_dom -> loadXML($collegeCalendarFile);
  $collegeEventElements = $college_dom->getElementsByTagName("event");
  foreach ($collegeEventElements as $collegeEventElement)
  {
    if ($collegeEventElement->hasAttribute("id")) $collegeEventElement->setIdAttribute("id", true);
    $start = trim($collegeEventElement->getElementsByTagName('start')->item(0)->nodeValue);
    $endList = $collegeEventElement->getElementsByTagName('end');
    $description = $collegeEventElement->getElementsByTagName('description')->item(0);
    $text = $description->nodeValue;
    $text = str_replace("rsquo", "&rsquo;", $text);
    $text = str_replace("[", "<", $text);
    $text = str_replace("]", ">", $text);
    $end = ($endList->length > 0) ? trim($endList->item(0)->nodeValue) : $start;
    $noClass = $description->getAttribute('no-classes');
    if ($noClass)
    {
      $firstDay = strtotime($start);
      $lastDay = strtotime($end);
      for ($day = $firstDay; $day <= $lastDay; $day += SECS_PER_DAY)
      {
        $blockoutDates[date("Y-m-d", $day)] = true;
      }
    }
    $CalendarEntries[$start] = new CalendarEntry($start, "<strong>".$text."</strong>",
      $end ? $end : $start, ($noClass == "" ? false : true));
    if ($collegeEventElement->hasAttribute('follow-schedule'))
    {
      $CalendarEntries[$start]->schedule =
          $collegeEventElement->getAttribute('follow-schedule');
    }
  }
  $element = $college_dom->getElementById('first-class');
  $firstDay = $element ? @strtotime($element->getElementsByTagName('start')->item(0)->firstChild->nodeValue) : null;
  $element = $college_dom->getElementById('last-class');
  $lastDayStart = $element ? @strtotime($element->getElementsByTagName('start')->item(0)->firstChild->nodeValue) : null;
  $lastDayEnd = $element ? @strtotime($element->getElementsByTagName('end')->item(0)->firstChild->nodeValue) : null;
  $lastDay = $lastDayEnd ? $lastDayEnd : $lastDayStart;
  $element = $college_dom->getElementById('final-exams');
  $finalsStart = $element ? @strtotime($element->getElementsByTagName('start')->item(0)->firstChild->nodeValue) : null;
  $finalsEnd = $element ? @strtotime($element->getElementsByTagName('end')->item(0)->firstChild->nodeValue) : null;

  //  Process the Calendar for this course
  //  =========================================================================================
  $course_calendar = @file_get_contents("course_calendar.xml", "r") or
  die("<h1 class='error'>Unable to read course calendar: $php_errormsg</h1>");
  $course_dom = new DOMDocument();
  $course_dom -> loadXML($course_calendar);
  $courseNode = $course_dom->getElementsByTagName('calendar')->item(0);
  $course = $courseNode->getAttribute('course');
  $name = $courseNode->getAttribute('name');
  $semester = $courseNode->getAttribute('semester');
?>
    <div id="header">
      <h1><?php echo "$course: $name"; ?></h1>
      <h2 id="semester"><?php echo "$semester"; ?></h2>
      <script>
        var title = document.getElementsByTagName('title')[0];
        title.text = <?php echo "\"$course: $name - $semester\""; ?>;
      </script>
    </div>
<?php
  $meetingDays = array();
  $sections = $course_dom->getElementsByTagName('section');

  // section-info fieldset
  //  -----------------------------------------------------------------------------------------
  echo "<fieldset id=\"section-info\"><h2>Section" .
       ((count($sections)==1) ? " Information" : "s")."</h2>\n";
  $section_names = array();
  foreach ($sections as $section)
  {
    $section_names[] = trim($section->firstChild->nodeValue);
    $registrationCode = null;
    $code = $section->getAttribute('registration-code');
    if ($code) $registrationCode = "($code)";
    echo "<p class=\"section-name\">Section " . $section_names[count($section_names) - 1] .
        " $registrationCode</p>\n";
    $meetings = $section->getElementsByTagName('meeting');
    foreach ($meetings as $meeting)
    {
      $meetingDay  = $meeting->getAttribute('day');
      $found = false;
      foreach ($dayNames as $dayName)
      {
        if ($dayName == $meetingDay)
        {
          $found = true;
          break;
        }
      }
      if ( ! $found)
      {
        echo "<p class='error'>Invalid class meeting day: \"$meetingDay\"</p>\n";
      }
      else
      {
        //  Record this meeting day
        $meetingDays[$meetingDay] = true;
        //  Add dates for which the college follows this day's schedule to the course
        //  meeting dates.
        foreach ($CalendarEntries as $calendarEntry)
        {
          if ($calendarEntry->schedule == $meetingDay)
          {
            $calendarEntry->isClass = true;
          }
        }
      }
      $time = $meeting->getAttribute('time');
      $room = $meeting->getAttribute('room');
      echo "<p class='meeting-details'>$meetingDay: $time $room</p>\n";
    }
  }
  echo "</fieldset>\n";
  //  Generate empty events for all class meeting dates between firstDay and lastDay.
  if ( !($firstDay && $lastDay) )
  {
    echo <<<EOD
      <h1 class='error'>
        Error: first and/or last class dates not specified in college_calendar.xml
    </h1></div></body></html>

EOD;
    exit();
  }
  for ($day = $firstDay; $day <= $lastDay + (SECS_PER_DAY -1); $day += SECS_PER_DAY)
  {
    $dateKey = date( "Y-m-d", $day);
    $dayOfWeek = date( "D", $day);
    //  Course meets if it is a meeting day that isn't a blockout date and if it isn't a date
    //  that the college follows a different schedule that isn't one of the class meeting dates.
    if (isset($meetingDays[$dayOfWeek]))
    {
      if ( ! isset($blockoutDates[$dateKey]))
      {
        if ( ! isset($CalendarEntries[$dateKey]))
        {
          $CalendarEntries[$dateKey] = new CalendarEntry($dateKey, "", $dateKey);
        }
        if (!$CalendarEntries[$dateKey]->schedule ||
            isset($meetingDays[$CalendarEntries[$dateKey]->schedule]))
        {
          $CalendarEntries[$dateKey]->isClass = true;
        }
      }
    }
  }
  //  Augment descriptions with info from the course_calendar.xml file.
  $eventElements = $course_dom->getElementsByTagName('event');
  foreach ($eventElements as $eventElement)
  {
    $dateKey = trim($eventElement->getAttribute('date'));
    $typeAttribute = trim($eventElement->getAttribute('type'));
    $expiresAttribute = trim($eventElement->getAttribute('expires'));
    //  An expires attribute can be used to make elements go away after a certain date, for
    //  example when I don't want homework solutions to be posted indefinitely.
    if ( $expiresAttribute !== "" && date('Y-m-d') > $expiresAttribute )
    {
      continue; //  Skip expired elements
    }
    if ( ! isset($CalendarEntries[$dateKey]) )
    {
      // If the type attribute is set (to anything), add this date to the calendar
      if ( $typeAttribute != "")
      {
        $CalendarEntries[$dateKey] = new CalendarEntry($dateKey, "", $dateKey);
      }
      else
      {
        echo <<<EOD
        <h1 class='error'>
          Error: $dateKey is not a course meeting date.
        </h1>
        <p>The event description is:</p>
        <pre><code>{$eventElement->nodeValue}</code></pre>
        </body></html>

EOD;
        exit();
      }
    }
    //  Process the description field
    //  =================================================================================
    $description = trim($eventElement->nodeValue);


    //  Process [d file] and [t file] annotations for modification date and time
    //  ---------------------------------------------------------------------------------
    if ($description !== '')
    {
      $pattern = '/\[([dt]+)\s+([\w\.\/]+)\]/';
      while (preg_match($pattern, $description, $matches))
      {
        switch ($matches[1])
        {
          case 't':
            $substitute = date('h:i a', filemtime($matches[2]));
            break;
          case 'd':
            $substitute = date('M j, Y', filemtime($matches[2]));
            break;
          case 'dt':
            $substitute = date('M j, Y \a\t h:i a', filemtime($matches[2]));
            break;
          default:
            $substitute = "Bad Switch at ".__FILE__." line ".__LINE__;
            break;
        }
        $description = preg_replace($pattern, $substitute, $description, 1);
      }
    }

    //  Substitute character entites
    //  ---------------------------------------------------------------------------------
    /*  mdash;  => &mdash;
     *  hellip; => &hellip;
     *  ndash;  => &ndash;
     *  amp;    => &amp;
     */
    $entities = array('mdash;', 'ndash;', 'hellip;', 'amp;');
    foreach ($entities as $entity)
    {
      $description = str_replace($entity, '&'.$entity, $description);
    }
    //  Convert all square brackets to angle brackets
    //  --------------------------------------------------------------------------------------
    $description = str_replace("[", "<", $description);
    $description = str_replace("]", ">", $description);

    //  Process exam attribute, if present
    if ($typeAttribute === 'exam')
    {
      $description = "<span class=\"exam\">".$description."</span>";
      //  Special case: need to add a separate event when final exam is first day of finals
      if (strtotime($CalendarEntries[$dateKey]->startDate) === $finalsStart)
      {
        $CalendarEntries[$dateKey."exam"] =
            new CalendarEntry($dateKey, $description, $dateKey);
        continue;
      }
    }
    //  Insert line break if there is already a description for this entry.
    if ($CalendarEntries[$dateKey]->description != '')
    {
      $CalendarEntries[$dateKey]->description .= '<br />';
    }
    //  Append this description to the event.
    $CalendarEntries[$dateKey]->description .= $description;
  }

  //  Administrivia ("Course-related Links")
  //  =======================================================================================
  $administrivia = $course_dom->getElementsByTagName('administrivia');
  if ($administrivia->length == 1)
  {
    echo "<fieldset id=\"administrivia\"><h2> Course-related Links </h2>\n";
    $items = $administrivia->item(0)->getElementsByTagName('item');
    foreach ($items as $item)
    {
      $text = $item->nodeValue;
      $text = str_replace("[", "<", $text);
      $text = str_replace("]", ">", $text);
      $text = str_replace("rsquo", "&rsquo;", $text);
      $text = str_replace("amp;", "&amp;", $text);

      $attribute_string = "";
      $tagName = 'p';
      $attributes = array('href', 'target', 'class', 'id', 'rel', 'type', 'action');
      foreach($attributes as $attribute)
      {
        if ($item->hasAttribute($attribute))
        {
          $attribute_string .= " {$attribute}='{$item->getAttribute($attribute)}'";
          if ($attribute === 'href') $tagName = 'a';
          // Check my grades form
          if ($attribute === 'action')
          {
            $tagName = 'form';
            $attribute_string .= " method='post'";
            preg_match('/\s*(Spring|Fall),?\s*(\d{4})/', $semester, $year_month);
            $month = $year_month[1] === 'Spring' ? '02' : '09';
            $year = $year_month[2];
            $section_name = $section_names[count($section_names) - 1];
            $file_name =
                "../../../../Grades/{$year}_{$month}.xlsx";
            $include_file_element = '';
            if ( $item->hasAttribute('include-file') )
            {
              $include_file_name = $item->getAttribute('include-file');
              $include_file_element = <<<EOD
    <input type='hidden' name='include-file' value = '$include_file_name' />
EOD;
            }
            $grades_updated = date('g:i a \o\n  F j, Y', filemtime($file_name));
echo "<!-- $file_name -->\n";

            $text = <<<EOT
  <div>
    <label for='student_id'>
      Enter any part of your student id to check your grades for the course:
    </label>
    <input type='text' id='student_id' name='student_id' size='5' />
    <input type='hidden' name='course' value='$course' />
    <input type='hidden' name='section' value='$section_name' />
    <input type='hidden' name='semester' value='{$year}_{$month}' />
    $include_file_element
    <input type='submit' value='Show My Grades' />
    <p class='page-status'>
      Grades were last updated at $grades_updated.
    </p>
  </div>
EOT;
          }
        }
      }
      echo "<$tagName$attribute_string>\n".$text."\n</$tagName>\n";

    }
        $timestamp = filemtime("course_calendar.xml");
        echo "<p class='page-status'>This schedule was last updated at " .
              date('g:i a \o\n F j, Y', $timestamp) . ".</p>\n";

    echo "</fieldset>\n";
  }
?>


    <div id="content">
      <div id="gotonowDiv">
        <button id="gotonow">-- click here to scroll to current date --</button>
      </div>
      <div id="class-schedule">
        <table>
          <tr>
            <th scope="col" class="top-left">Class Number</th>
            <th scope="col">Date</th>
            <th scope="col" class="top-right">Description</th>
          </tr>

<?php
  //  Generate the table rows
  sort($CalendarEntries);
  $classNum = 1;
  $numEntries = count($CalendarEntries);
  for ($entryNum = 0; $entryNum < $numEntries; $entryNum++)
  {
    $classNumString = ($CalendarEntries[$entryNum]->isClass) ? $classNum++ : " ";
    $isLastRow = $entryNum === ($numEntries - 1);
    $isBottomLeft = $isLastRow ? "bottom-left " : "";
    $isBottomRight = $isLastRow ? "bottom-right " : "";
      echo "<tr>\n"
          . "  <th scope=\"row\" class=\"{$isBottomLeft}class-num\">$classNumString</th>\n"
          . "  <td class=\"class-date\">"
          . date("D M d", strtotime($CalendarEntries[$entryNum]->startDate))
          . (
              ($CalendarEntries[$entryNum]->endDate !=
               $CalendarEntries[$entryNum]->startDate)
                ? " –<br/>"
                  . date("D M d", strtotime($CalendarEntries[$entryNum]->endDate))
                : ""
            )
            . "</td>\n  <td class=\"{$isBottomRight}description\">"
            . $CalendarEntries[$entryNum]->description
            . "</td>\n</tr>\n";
  }

?>
        </table>
      </div>
    </div>

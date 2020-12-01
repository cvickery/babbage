<?php
//  README 2014-03-26
/*  All spreadsheet values are now being converted from iso-latin-1 to utf-8.
 *  This doesn't make sense because (I thought) Excel stores values using utf-8,
 *  implying an error in the excel_reader2.php library. There seem to be patches
 *  "out there" to fix the problem in the library, but there is nothing official
 *  that I can see, so I embedded iconv() calls in the code to solve the problem.
 *  If the library gets fixed and if the fixed version replaces the version
 *  used here, the iconv() calls will have to be removed.
 *  This affects all php scripts that process spreadsheets using excel_reader2.
 */

include 'PHPExcel/IOFactory.php';

  date_default_timezone_set('America/New_York');

// format_check()
//  -----------------------------------------------------------------------------
/*  PHPExcel is producing rounding errors (74.4 shows up as 74.40000000000001,
 *  for example). This function is a hack to deal with such dreck. The package
 *  itself has no useful documentation suggesting that there is a way to control
 *  the problem.
 */
  function format_check($val)
  {
    if (is_numeric($val) && ($val != 100))
    {
      //  Hack: take two decimal places, then trim any trailing zeros, and then
      //  trailing dot, if there is one.
      return rtrim(rtrim(number_format($val, 2), '0'), '.');
    }
    return $val;
  }

  $mime_type = "text/html";
  $html_attributes="lang=\"en\"";
  if ( array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml") ||
         stristr($_SERVER["HTTP_ACCEPT"], "application/xml") )
       ||
       (array_key_exists("HTTP_USER_AGENT", $_SERVER) &&
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator"))
     )
  {
    $mime_type = "application/xhtml+xml";
    $html_attributes = "xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\"";
    header("Content-type: $mime_type");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  }
  else
  {
    header("Content-type: $mime_type; charset=utf-8");
  }
?>
<!DOCTYPE html>
<html <?php echo $html_attributes;?>>
  <head>
    <title>CSCI 100 Grades</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/assignments.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="print"
          href="../../css/assignments-print.css"
    />
    <style type="text/css">
      table {width:20em;}
      th {text-align:left;padding:0.2em 1em;}
    </style>
  </head>
  <body>
<?php
  $cwd          = pathinfo(getcwd());
  $term         = basename($cwd['basename']);
  $course       = basename($cwd['dirname']);
  $course_name  = str_replace('CS', 'CSCI ', strtoupper($course));
  echo "    <h1>Check My Grades for $course_name</h1>\n";
  //  Make sure student_id is valid: must be last 5 digits of CUNY id
  if (! isset($_POST['student_id']))
  {
    die("<h1 class='error'>Missing student ID</h1></body></html>\n");
  }
  $student_id = trim($_POST['student_id']);
  if (  (strlen($student_id) !== 5) ||
        (! ctype_digit($student_id)) )
  {
    die("<h1 class='error'>Invalid student ID</h1>"
    //    . $student_id . ' : ' . strlen($student_id) . ' : ' . ctype_digit($student_id)
        . "</body></html>\n");
  }

  //  Access the spreadsheet for this course for this semester.
  $dir = '../../../../Grades';
  $wbk_file = "$dir/$term.xls";

  $wbk = PHPExcel_IOFactory::load($wbk_file) or
      die("<h1 class='error'>Unable to open $term.xls</h1></body></html>\n");
  $update_time = date("F j, Y \\a\\t g:i a", filemtime($wbk_file));
    echo "    <p>Grades were last updated on $update_time</p>\n";
  try
  {
    $grades_sheet     = $wbk->getSheetByName($course)->toArray(null, true);
    $email_sheet      = $wbk->getSheetByName("{$course}_email")->toArray(null, true);
    $takeaways_sheet  = $wbk->getSheetByName("{$course}_takeaways")->toArray(null, true);
  }
  catch (Exception $e)
  {
    die("<h1 class='error'>Error reading spreadsheet: {$e->getMessage()}</h1></body></html>\n");
  }

    //  Get the headers for the grades sheet
    $headers = $grades_sheet[0];
    $num_cols = count($headers);
    //  Find the student
    $found = false;
    $grades_row = null;
    $email_addresses = array();
    foreach ($grades_sheet as $row)
    {
      if ($row[0] === $student_id)
      {
        $found = true;
        $grades_row = $row;
        // Student’s name
        $last_name  = $row[1];
        $first_name = $row[2];
        // email addresses
        foreach ($email_sheet as $email_row)
        {
          if ($email_row[0] === $student_id)
          {
            $email_addresses[] = $email_row[3];
          }
        }
      }
    }
    if (! $found)
    {
      die("<h1 class='error'>No data found for student ID $student_id</h1></body></html>\n");
    }
      $msg = <<<EOD
    <html>
    <head>
      <style>
        h1 {font-size:14pt;}
        table {
          border-collapse:collapse;
        }
        td,th {
          text-align: left;
          border: 1px solid black;
          padding:0.5em;
        }
        th {
          font-weight:bold;
          background-color: #ccc;
        }
        tr:first-child th {
          text-align: center;
        }
        .indent p {
          margin:0 1em;
        }
      </style>
    </head>
    <body>
      <h1>$course_name grades for $first_name $last_name as of $update_time</h1>
      <table>
        <tr><th>Item</th><th>Score</th></tr>

EOD;
      //  Skip Student ID, Last name, First name, Exam ID
      for ($col = 4; $col < $num_cols; $col++)
      {
        //  Display values except when column heading is blank
        if ($headers[$col] != '')
        {
          $grade = format_check($grades_row[$col]);
          $msg .= <<<EOD
          <tr>
            <th>{$headers[$col]}</th><td>$grade</td>
          </tr>

EOD;
        }
      }
      //  Process takeaways
      /*  Dates are in the first row
       *  Grades are in columns 5, 8, 11, ...
       */
      $missing    = Array();
      $not_ok     = Array();
      $ok         = Array();
      $good       = Array();

      $max_points = 0;
      $sum_points = 0;

      $dates = Array();
      $today = new DateTime();
      for ($col = 4; $col < count($takeaways_sheet[0]); $col += 3)
      {
        if ($takeaways_sheet[0][$col])
        {
          $col_date = new DateTime($takeaways_sheet[0][$col]);
          if ($today->diff($col_date)->invert)  // Is diff negative?
          {
            $dates[$col] = $col_date->format('M d');
          }
        }
      }
      //  Find the student in the takeaways sheet
      $takeaway_row = null;
      foreach ($takeaways_sheet as $row)
      {
        if ($row[0] === "$student_id")
        {
          $takeaway_row = $row;
          break;
        }
      }
      foreach($dates as $col => $date)
      {
        $max_points += 2;
        switch ($takeaway_row[$col])
        {
          case '--':      $missing[] = $date;
                          break;
          case 'not ok':  $not_ok[] = $date;
                          $sum_points += 1;
                          break;
          case 'ok':      $ok[] = $date;
                          $sum_points += 2;
                          break;
          case 'good':    $good[] = $date;
                          $sum_points += 3;
                          break;
          default: die("<h1 class='error'>Bad switch ({$takeaway_row[$col]}) at " .
                       basename(__FILE__) . " line " . __LINE__ . "</h1></body></html>");
        }
      }
      $msg       .= "</table>\n<h2>Takeaways</h2>\n<div class='indent'>\n";
      $arrays     = Array('missing' => $missing,
                          'not ok'  => $not_ok,
                          'ok'      => $ok,
                          'good'    => $good);
      foreach($arrays as $grade => $dates)
      {
        $n = count($dates);
        if ($n > 0)
        {
          $msg .= "<p><strong>$grade ($n):</strong> " . $dates[0];
          for ($i = 1; $i < count($dates); $i++)
          {
            $msg .= ", {$dates[$i]}";
          }
          $msg .= "</p>\n";
        }
      }
      $msg .= "<h3>Total takeaway points: $sum_points/$max_points</h3>\n</div>\n";
      $msg .= <<<EOD

      <h2>Final Grades</h2>
      <div>
        <p>
          From the syllabus:
        </p>
        <table>
          <tr><td>30%</td><td>Quizzes, Assignments, and Takeaways</td></tr>
          <tr><td>20%</td><td>Final Paper or Project</td></tr>
          <tr><td>25%</td><td>Midterm Exam</td></tr>
          <tr><td>25%</td><td>Final Exam</td></tr>
        </table>
        <h3>Details</h3>
        <p>
          For quizzes, assignments, and takeaways, an “ok” is worth 2 points; a “not ok” is 1 point,
           and a “good” is 3 points. An “ok” is full credit, so a “good” is extra credit that can
           offset a “not ok.”
        </p>
        <p>
          There were 9 quizzes and assignments, so full credit would be 18 points. I divided your
          number of points by 1.8 so that a score of 10 would be “perfect.” This score counted 25%
          of your course average. There were 24 takeaways for a total of 48 points. I divided that
          number by 4.8 so, again, a score of 10 is ”perfect.” Your takeaway score counted 5% of
          your course average.
        </p>
        <p>
          You should be able to check my arithmetic by multiplying your Quizzes and Assignments
          score by 2.5; by multiplying your Takeaways score by 0.5; by multiplying your final paper
          or project score by 2.0; and by multiplying your midterm and final exam scores by 0.25.
        </p>
        <p>
          Converting your course average to a letter grade is a mechanical process dictated by
          Queens College’s grading standards: 90 to 93 is an A-; 93-97 is an A; 97-100 is an A+;
          similarly for B’s, C’s, and D’s except that there is no grade of D-, so 60-67 is a D.
        </p>
        <p>
          For the class as a whole, 25% earned A’s; 65% earned B’s; 5% earned C’s; and 5% earned
          D’s.
        </p>
      </div>
      <h2>Final Exam Scores</h2>
      <div>
        <p>
          Each error counted 2.2 points. The smallest number of errors was 3, so I subtracted 2.2
          times your number of errors from 103 instead of from 100, so the top exam score was 96.4.
        </p>
        <p>
          The class average on the exam was 76.8. There were: one A, seven B's, six C's, and six D's.
        </p>
        <p>
          I’m not sure how soon I will have the papers and projects graded: I’m working on them.
        </p>
      </div>
      <h2>Midterm Scores</h2>
      <div>
        <p>
          Although there were 25 questions, some of them had multiple answers, so I used 26.5 as the
          “number of questions” for the exam. I calculated exam scores as 100 minus number of
          errors times 100/26.5)
        </p>
        <p>
          On the exams I marked each error with an X and circled the letter(s) of the correct
          answer(s). When you get your exam back, check that (a) you understand all your errors;
          (b) be sure the total number of errors I wrote at the top of the first page matches the
          number of X's in the exam; (c) be sure that number agrees with the Midterm Errors value
          given above. Finally, we won’t actually go over the exams in class, but you will be able
          to ask about anything that isn’t clear.
        </p>
        <p>
          The Midterm Rank value above tells you how you did compared to others in the class: if
          your rank is #1, you had the top score. Three people got 100 on the exam, so the
          second-highest score shows up as a rank of 4. That is, your rank is one plus the number of
          people who scored better than you on the exam.
        </p>
        <p>
          The class average was 88.1 out of 100. Nine people scored in the 90’s; eight in the 80’s;
          two in the 70’s; one in the 60’s. Nobody failed. Queens College grading standards say that
          scores in the 90’s are in the A- to A+ range; in the 80’s are in the B- to B+ range; in
          the 70’s are in the C- to C+ range; in the 60’s are in the D to D+ range. (There is no
          grade of D-)
        </p>
      </div>
    <h2>Notes</h2>
    <div>
      <p>
        The information above comes directly from my grading spreadsheet for the
        course. See the <a href='./syllabus.php'>course syllabus</a> for more information
        on your responsibility for verifying the accuracy of the grades in a timely
        fashion.
      </p>
      <p>
        Dr. Vickery
      </p>
    </div>
  </body>
</html>

EOD;
      $first_copy = true;
      foreach ($email_addresses as $email_address)
      {
        $headers  = "From: Christopher.Vickery@qc.cuny.edu\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        if ($first_copy)
        {
          $headers .= "Cc: Christopher.Vickery@qc.cuny.edu\r\n";
          $first_copy = false;
        }
        echo "    <p>Sending grades for $first_name $last_name to $email_address.</p>";
        if (! mail($email_address, "Your $course_name Grades", $msg, $headers))
        {
          echo "<p><strong>Sending email to $email_address failed!</strong></p>\n";
        }
      }
  ?>
  </body>
</html>

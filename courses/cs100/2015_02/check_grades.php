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
      table {width:90%;}
      th {text-align:left;padding:0.2em 1em;}
    </style>
  </head>
  <body>
<?php
  $cwd          = pathinfo(getcwd());
  $term         = basename($cwd['basename']);
  $course       = basename($cwd['dirname']);
  $is_local     = $_SERVER['SERVER_NAME'] === 'localhost';
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
        $first_name = $row[1];
        $last_name  = $row[2];
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
      $msg_prolog = <<<EOD
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
EOD;
      $msg_content = <<<EOD
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

      $msg_content .= <<<EOD
    </table>
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
      //  For testing on localhost
      if ($is_local)
      {
        echo $msg_content;
        exit();
      }

      //  Live version sends email
      $msg = $msg_prolog . $msg_content;
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

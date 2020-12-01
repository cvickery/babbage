<?php
  date_default_timezone_set('America/New_York');
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
    <title>CSCI 903 Grades</title>
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
  <h1>Check My Grades for CSCI 903</h1>
<?php
  //  Make sure student_id is valid
  if (! isset($_POST['student_id']) || strlen(trim($_POST['student_id'])) !== 4)
  {
    die("<h1 class='error'>Missing or invalid student ID</h1></body></html>\n");
  }
  $student_id = trim($_POST['student_id']);

  //  Access the spreadsheet for this course for this semester.
  require_once('excel_reader2.php');

  $cwd = pathinfo(getcwd());
  $term = basename($cwd['basename']);
  $course = basename($cwd['dirname']);
  $dir = '../../../../Grades';
  $wbk = new Spreadsheet_Excel_Reader("$dir/$term.xls") or
      die("<h1 class='error'>Unable to open $term.xls</h1></body></html>\n");
  $update_time = date("F j, Y \\a\\t g:i a", filemtime("$dir/$term.xls"));

  //  Get the sheet
  $found = false;
  for ($sheet_index = 0; $sheet_index < 5; $sheet_index++)
  {
    if ($wbk->boundsheets[$sheet_index]['name'] === $course)
    {
      $found = true;
      break;
    }
  }
  if ($found)
  {
    //  Get the headers
    $num_cols = $wbk->colcount($sheet_index);
    $headers = array();
    for ($col = 1; $col <= $num_cols; $col++)
    {
      $headers[$col] = $wbk->val(1, $col);
    }

    //  Find the student
    $num_rows = $wbk->rowcount($sheet_index);
    $found = false;
    for ($row = 2; $row <= $num_rows; $row++)
    {
      if ($wbk->val($row, 1) == $student_id)
      {
        $found = true;
        break;
      }
    }
    if ($found)
    {
      $last_name = $wbk->val($row, 2);
      $first_name = $wbk->val($row, 3);

      echo <<<EOD
    <h1>Grades for $first_name $last_name</h1>
    <h2>Grades were last updated on $update_time</h2>
    <table>
      <th>Item</th><th>Score</th>

EOD;
      for ($col = 5; $col <= $num_cols; $col++)
      {
        echo <<<EOD
        <tr>
          <th>{$headers[$col]}</th>
          <td>{$wbk->val($row, $col, $sheet_index)}</td>
        </tr>

EOD;
      }
      echo <<<EOD
      </table>
  <h2>Notes</h2>
  <div>
    <h3>Midterm Grades</h3>
    <ul>
      <li>The class average was 83.6</li>
      <li>There were 4 A’s; 4 B’s; 3 C’s; 1 D; and 1 F</li>
      <li>
        Thirteen students took the exam. “Midterm Rank” gives your rank on
        the exam, from 1 (highest) to 13 (lowest).
      </li>
      <li>
        “Midterm Errors” tells how many mistakes you made on the exam. Some questions
        had more opportunities for mistakes than others. Each mistake counted 1.5 points.
        Check your exam to be sure the total number of X’s next to the questions is the same
        as the number at the top of the first page, and that that number is the same as 
        “Midterm Errors” shown above.
        <p><em>Any discrepancies must be reported to Dr. Vickery by April 23.</em></p>
      </li>
    </ul>
    <p>
      Refer to the <a href='../syllabus.xhtml#assessment'>Course Syllabus</a> for
      information on how course grade  are computed and the policy for correcting any
      of the information given above.
    </p>
  </div>

EOD;
    }
    else die("<h1 class='error'>Student $student_id Not Found</h1></body></html>\n");
  }
  else die("<h1 class='error'>No sheet for $course in $term</h1></body></html>\n");
  ?>
  </body>
</html>

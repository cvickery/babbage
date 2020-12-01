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
  <h1>Check My Grades for CSCI 100</h1>
<?php
  //  Make sure student_id is valid
  if (! isset($_POST['student_id']) ||
      (strlen(trim($_POST['student_id'])) !== 4) &&
       strlen(trim($_POST['student_id'])) !== 5)
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
      $headers[$col] = iconv('ISO-8859-1', 'UTF-8', $wbk->val(1, $col));
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
      $last_name = iconv('ISO-8859-1', 'UTF-8', $wbk->val($row, 2));
      $first_name = iconv('ISO-8859-1', 'UTF-8', $wbk->val($row, 3));

      echo <<<EOD
    <h1>Grades for $first_name $last_name</h1>
    <h2>Grades were last updated on $update_time</h2>
    <table>
      <th>Item</th><th>Score</th>

EOD;
      //  Skip Student ID, Last name, First name, Exam ID
      for ($col = 5; $col <= $num_cols; $col++)
      {
        $val = iconv('ISO-8859-1', 'UTF-8', $wbk->val($row, $col, $sheet_index));
        echo <<<EOD
        <tr>
          <th>{$headers[$col]}</th><td>$val</td>
        </tr>

EOD;
      }
      echo <<<EOD

    </table>
    <h2>Note on letter grades</h2>
    <div>
      <p>
        First, note that scores are rounded for display purpose, but your course average is calculated
        using the exact values for all scores. Sometimes the result is a little different from what you
        get if you check the calculations with a calculator
      </p>
      <p>
        The standard grading scale is: A’s are for scores in the 90’s; B’s for scores in the 80’s; C’s in the
        70’s; D’s in the 60’s; and F for scores below 60. I divide each grade range into thirds to give the +
        and - suffixes to the letters. I round your course average before converting to a letter grade so, for
        example, a score of 89.5 is rounded to 90, to give a grade of A-. Finally, note that there is no D-
        grade: anything from 59.5 to 66.1667 is a D.
      </p>
    </div>
    <h2 id="coursegrading">Course Grades</h2>
    <div>
      According to the course syllabus, grades were to be calculated as follows:
      <ul>
        <li>10% Quizzes, Takeaways</li>
        <li>10% Participation in class discussions and activities</li>
        <li>15% Midterm Paper</li>
        <li>15% Midterm Exam</li>
        <li>20% Final Paper</li>
        <li>20% Final Exam</li>
        <li>10% Laboratory Assignments</li>
      </ul>
      <p>
        As announced in class, the Binary Counter laboratory assignment was folded into the final
        exam rather than graded separately. In addition, we had “brief quizzes,” “quizzes,” and “assignments,”
        which are not broken out separately in the syllabus. Here is how the weights listed above were
        adjusted to calculate final grades:
      </p>
      <ul>
        <li>15% Brief Quizzes, Takeaways</li>
        <li>15% Quizzes, and Written Assignments</li>
        <li>15% Midterm Paper</li>
        <li>15% Midterm Exam</li>
        <li>20% Final Paper</li>
        <li>20% Final Exam</li>
      </ul>
    </div>
    <h2>Notes</h2>
    <div>
      <p>
        This page will be updated to show you your grades for the course as the semester progresses.
        If you see any errors here, call them to Dr. Vickery’s attention immediately so they can be
        corrected.
      </p>
      <p>
        Every two weeks or so, brief quizzes / takeaways will be collapsed into a cumulative number
        of points for the term as described in <a href='quiz-takeaway_grading.php'>Quiz-Takeaway Grading</a>.
        Once brief quizzes and takeaways have been collapsed in this way, they cannot be changed.
      </p>
      <p>
        Note also that nothing posted here can be changed after May 8. Be sure to monitor this page regularly
        to make sure I haven’t made any mistakes in recording your grades.
      </p>
    </div>
    <h2 id="termpapergrading">Term paper grading</h2>
    <div>
      <p>Points will be assigned as follows:</p>

      <ul>
        <li>0 missing or very poor</li>
        <li>1 does not meet expectations (late or not ok)</li>
        <li>2 meets expectations (ok)</li>
        <li>3 exceeds expectations (good)</li>
      </ul>

      <p>Graded Items [weight]:</p>

      <ul>
        <li>Outline [2]</li>
        <li>Early Draft (optional) [1]</li>
        <li>Grammar and Syntax [1]</li>
        <li>Organization / Structure [1]</li>
        <li>Writing clarity and style [1]</li>
        <li>Choice of reference material [1]</li>
        <li>Listing of references; citations in text [1]</li>
        <li>Relevance of thesis to course [1]</li>
        <li>Logical coherence; development of topics [1]</li>
      </ul>

      <p>The weights of the required items add up to 9.</p>

      <p>Your grade will be calculated by multiplying your points for each item by its weight, and summing the products.
      e.g., “ok” on all nine required items would give a score of 18 points. A perfect score would be “good” on all
      the required items, for a score of 27.</p>

      <table>
        <colgroup>
          <col style="text-align:left;"/>
          <col style="text-align:left;"/>
        </colgroup>
        <thead>
          <tr>
            <th style="text-align:left;">Score</th>
            <th style="text-align:left;">Grade</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="text-align:left;">27</td>
            <td style="text-align:left;">100</td>
          </tr>
          <tr>
            <td style="text-align:left;">18</td>
            <td style="text-align:left;">85</td>
          </tr>
        </tbody>
      </table>
    </div>
EOD;
    }
    else die("<h1 class='error'>Student $student_id Not Found</h1></body></html>\n");
  }
  else die("<h1 class='error'>No sheet for $course in $term</h1></body></html>\n");
  ?>
  </body>
</html>

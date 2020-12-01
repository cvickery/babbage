<?php
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
      if ($wbk->val($row, 3) === $student_id)
      {
        $found = true;
        break;
      }
    }
    if ($found)
    {
      $last_name = $wbk->val($row, 1);
      $first_name = $wbk->val($row, 2);

      echo <<<EOD
    <h1>Grades for $first_name $last_name</h1>
    <h2>Grades were last updated on $update_time</h2>
    <table>
      <th>Item</th><th>Score</th>

EOD;
      for ($col = 7; $col <= $num_cols; $col++)
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
    <h3>Final Grade</h3>
    <div>
      <p>
        Letter grades are completely determined by your course average according to the <a
        href='http://www.qc.cuny.edu/registrar/Documents/grading_guidelines.pdf'>standard
        Queens College Grading Guidelines</a>.
      </p>
      <p>
        For this class, there were 5 A’s, 4 B’s, 3 C’s, 3 D’s, and 2 F’s.
      </p>
      <p>
        If you think I calculated your Course Average incorrectly, let me know, and I
        will correct any error I made. But everyone’s average is calculated the same way,
        so unless there is an error in the data, your Course Average cannot be changed.
        Likewise, conversion to letter grades is done strictly according to the Grading
        Guidelines cited above, and cannot be changed. Finally, it is contrary to College
        policy to let students do “extra credit” work to raise a grade. Whatever was
        assigned to everyone is all that can be used to calculate the course average.
      </p>
      <p>
        In summary, if there is a data error that would affect your grade, let me know and
        I’ll fix it. Otherwise, your grade is what is shown above.
      </p>
      <p>
        Now that the grades have been submitted, they will appear on your transcript, and
        it’s a bureaucratic procedure to change them. Tell me about any clerical errors I
        might have made, and I’ll initiate the process to get the record fixed.
      </p>
    </div>
    <h3>Course Average</h3>
    <div>
      <p>
        To get your Homework/Quiz score, add: 1 point for each “late” assignment,
        2 points for each “ok” assignment, 3 points for each “good” assignement, and
        the number of points for each assignment/quiz graded on a 10-point scale. So if
        you got “ok” on Assignments 1-4 and 10 on the quiz and the other six assignments,
        your number of points would be 78. Divide the number of points by 78 and multiply
        by 100 to get your Homework/Quiz score. If you got “good” on some of your
        assignments, this score could be over 100; “ok” is full credit.
      </p>
      <p>
        Homeworks and the quiz, together, count 25% of your course average. The proportion
        of “Takeaways” that you handed in counted an additional 5%, the midterm counted
        30%, and the final exam counted 40%. The “without midterm” number shows your
        course average if the midterm is omitted and the other three components of the
        average are scaled up to account for the missing 30%. The higher of the two
        numbers is your course average, which is rounded to the nearest integer.
      </p>
      <p>
        <strong>Note:</strong> Scores and averages are shown to just one decimal place;
        your course average is rounded to the nearest integer. But the actual calculations
        are all taken to approximately 8 places and rounded only for display.
      </p>
    </div>
    <h3>Final Exam</h3>
    <div>
      <p>
        There were 33 questions on the final exam, so each question was worth 100/33
        points. The “Final Exam Errors” column tells how many questions you got wrong,
        which has be multiplied by 100/33 and subtracted from 100 to get your exam grade.
        I added a 1 point “curve” to the final exam scores.
        The “Final Exam Rank” tells how you ranked out of the 17 people who took the exam.
        There were serveral ties. For example there were two people to tied for a rank of
        1.
      </p>
      <p>
        The class average was 74.8 and the median was 75.2. Five people scored above 90;
        3 between 80 and 90; 2 between 70 and 80; 3 between 60 and 70; and 4 below 60. (60
        is passing.)
      </p>
    </div>
    <h3>Get Assignments/Exam Back</h3>
    <div>
      <p>
        Stop by my office any time next semester if you would like to get your final exam
        and/or assignments back.
      </p>
    </div>
  </div>

EOD;
    }
    else die("<h1 class='error'>Student $student_id Not Found</h1></body></html>\n");
  }
  else die("<h1 class='error'>No sheet for $course in $term</h1></body></html>\n");
  ?>
  </body>
</html>

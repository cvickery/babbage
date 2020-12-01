<?php
  $this_dir       = opendir('.');
  $this_link      = '';
  $this_year      = '';
  $this_term      = '';
  while ($dir_entry = readdir($this_dir))
  {
    if (is_dir($dir_entry) && preg_match('/(\d{4})_(\d{2})/', $dir_entry, $year_term))
    {
      $this_year      = $year_term[1];
      $this_term      = ($year_term[2] === '02') ? 'Spring' : 'Fall';
      $this_link      = $dir_entry;
    }
  }
  $link_to_syllabus = '';
    $link_to_syllabus = <<<EOD
    <p class='current-semester-link'>
      <a href='.'>Syllabus for CSCI 100</a>
    </p>

EOD;

  $link_to_schedule = <<<EOD
  <p class='current-semester-link'>
    <a href='$this_link'>Schedule and Assignments for $this_term $this_year</a>
  </p>

EOD;


  header("Vary: Accept");
  if (array_key_exists("HTTP_ACCEPT", $_SERVER) &&
  stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml") ||
  stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator")
  )
  {
      header("Content-type: application/xhtml+xml");
      header("Last-Modified: "
      .gmdate('r', filemtime($_SERVER['SCRIPT_FILENAME'])));
      print ("<?xml version=\"1.0\" encoding=\"utf-8\"
  ?>
  \n");
  }
  else
  {
  header("Content-type: text/html; charset=utf-8");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>Information and Intelligence Syllabus</title>
    <link rel="shortcut icon" href="../cs903/favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all" href="../css/style-all.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style-screen.css" />
    <link rel="stylesheet" type="text/css" media="print" href="../css/style-print.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../css/syllabus.css" />
  </head>
  <body>
    <h1>CSCI 100: Information and Intelligence<br/>Notes for Fall 2012</h1>
    <?php
    echo <<<EOD
    $link_to_syllabus
    $link_to_schedule

EOD;
    ?>
    <h2>Notes</h2>
    <div>
      <p>
        During the Fall 2012 semester, the course is scheduled as CSCI 903 rather than as
        CSCI 100, but it really is CSCI 100, and as such may be used to satisfy the Queens
        College Natural Science General Education requirement.
        (903 was the course number when the course was offered on an experimental basis
        during the Spring 2012 semester.)
      </p>
  
      <p>
        Also, this semester the course is being offered as part of the Freshman Year
        Initiative (FYI) program’s “Digital Revolutions” learning community. Everyone taking
        this course with Dr. Vickery this semester is also registered for the section of
        English 110 being taught by Jason Nielsen.
      </p>
      <p>
        Prof. Nielsen and I are in regular contact as we explore ways to make the two
        courses complement each other. English 110 is a writing course that will draw on
        some of the material covered in CSCI 100, and CSCI 100 is a computer science course
        that will draw on some of the discussions and writing you do in English 110. But
        this is the first time these two courses have been linked in a Learning Community,
        so be warned: both courses might take some unexpected turns during the semester!
      </p>
    </div>
    <div id="footer">
      <a  href="../../">Vickery&nbsp;Home</a>&mdash;<a
          href="http://validator.w3.org/check?uri=referer">XHTML</a>&mdash;<a
          href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>&mdash;Last updated
      <?php echo date("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>
    </div>
  </body>
</html>


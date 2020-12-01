<?php
  $this_dir       = opendir('.');
  $this_link      = '';
  $this_year      = '';
  $this_term      = '';
  $this_notes     = '';
  while ($dir_entry = readdir($this_dir))
  {
    if (is_dir($dir_entry) && preg_match('/(\d{4})_(\d{2})/', $dir_entry, $year_term))
    {
      $this_year      = $year_term[1];
      $this_term      = ($year_term[2] === '02') ? 'Spring' : 'Fall';
      $this_link      = $dir_entry;
      $this_notes     = "$this_year-{$year_term[2]}_Notes.php";
    }
  }
  $link_to_notes = '';
  if (is_readable($this_notes))
  {
    $link_to_notes = <<<EOD
    <p class='current-semester-link'>
      <a href='$this_notes'>Notes for $this_term $this_year</a>
    </p>

EOD;
  }
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
<!DOCTYPE html PUBLIC
          "-//W3C//DTD XHTML 1.1//EN"
          "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
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
      <h1>CSCI 100: Information and Intelligence<br/>Syllabus</h1>
      <?php
        echo <<<EOT
        $link_to_notes
        $link_to_schedule
EOT;

       ?>
      <h2>Course Description</h2>
      <div>
        <p>
          Information measurement, encoding, and transmission as related to the design of
          artificial intelligence agents such as search engines, robots, and programs that
          mimic human intelligence. Models of human and artificial intelligence; relations
          among information, meaning, and data; diagnostic and causal reasonng in the presence
          of uncertainty. Readings from the literature of information theory and artificial
          intelligence; writing assignments, completion of a project to design and/or construct
          an information-driven intelligent agent.
        </p>
        <h2>Overview</h2>
        <p>
          The course explored two basic concepts in computer science: <em>Information Theory</em>
          and <em>Artificial Intelligence</em>. Information Theory provides the basis for
          everything we call our "digital world," while our digital world is not all theory and
          abstractions: it's manifested in real hardware running real code, and we will explore
          some basic hardware and coding concepts through a set of in-class projects as well.

          The course is sometimes offered as part of a Freshman Year Initiative "Learning Community."
          In which case, you and 19 other first-semester students will take this courses and a
          section of English 110 reserved just for us. At the end you will have satisfied two of
          your General Education requirements: English 110 satisfies the first College Writing
          requirement (English Composition 1), and this course satisfies the Scientific World
          (SW)requirement.
        </p>
        <h2>Course Structure</h2>
        <p>
          The course meets twice a week for 75 minutes. Each class will begin with a brief
          quiz based on the reading and/or video assignment for the class. You will receive
          full credit for the quiz provided your answer "looks reasonable." But you can receive
          extra credit for a quiz answer that demonstrates a good understanding of the issues
          at hand. Classes will consist of a misture of laboratory exercises, discussions, and
          presentation of group activities in whic you are xpected to participate actively. At
          the end of each class you will sbmit a very brief summary of your "takeaway" from the
          class. You will receive full credit for writing anything about the class; you can receive
          extra credit for producing an insightful question, comment, or critique based on the class.
          There will be Midterm and Final Exams, which will be based on the technical content
          covered in the course. In addition, there will be short (3–5 pages) Midterm and Final Papers
          due at the times of the respective exams. The papers will address topics in the course;
          writing the papers will help you prepare for the exams.
          There is also a laboratory component to the course. This work will be done in groups
          (2 people per group), and groups will present some of their projects to the class, either
          as videos or in person.
        </p>
        <h2>Course Grading</h2>
        <div>
        <ul>
          <li>
            10% Quizzes, Takeaways
          </li>
          <li>
            10% Participation in class discussions and activities
          </li>
          <li>
            15% Midterm Paper
          </li>
          <li>
            15% Midterm Exam
          </li>
          <li>
            20% Final Paper
          </li>
          <li>
            20% Final Exam
          </li>
          <li>
            10% Laboratory Assignments
          </li>
        </ul>
      </div>
        <h2>Class Schedule</h2>
        <p>
          There are two 75 minute class meetings per week. Attendance will not be taken
          (except at the beginning of the semester to verify your registration for the
          course), but students who often miss class will probably fail the course because
          exams and assignments depend heavily on material covered only in class.
        </p>
        <p>
          The course requires a regular time commitment from you, 3 hours of class
          meetings plus 6 hours of “preparation time” each week. This is the standard
          “Carnegie formula” for college courses: a full-time course load (12 credits)
          demands as much of your time as a full-time job (40 hours), so each 3 credit
          course requires 9 hours of work per week. The difference between college and
          work, of course, is that no one is keeping track of the time you spend on the
          job besides you. Instead, you have exams and homework assignments that are
          intended to reflect your level of effort in the course.
        </p>
        <p>
          In addition to reading, discussing, and writing about course topics, there is
          another course component: coding. Writing code is emerging as a valuable skill
          for artists, social and natural scientists, business people, and professionals
          of all types. This course does not aim to make you into a programmer, but will
          use one or more coding exercises as a way to reinforce the principles of
          information theory and artificial intelligence you will be wrestling with during
          the semester.
        </p>
        <h3>Assignments</h3>
         <p>
          The tentative schedule for the semester is in
          <a href='<?php echo $this_link;?>_Syllabus.pdf'>the PDF Syllabus</a>. However, the
          following class schedule is a tentative outline of what we will cover class by class
          and is subject to change. In general, reading assignments will average about 30 pages,
          never to exceed 55 pages. Viewing assignments can range anywhere from 3 to 30 minutes
          with an average viewing time of about 15 minutes. In addition to reading and viewing
          assignments, there will be coding assignments called modules. Due dates for hardware
          and coding modules will depend on progress made in class.Students may provide SMS or
          E-mail information to receive updates on class scheduling and assignments.
        </p>
       </div>

     <h2>Instructor</h2>
      <div>
        The instructor for the course is Dr. Christopher Vickery. See <a
        href="../../contact_info.xhtml">Dr. Vickery’s Contact Information and Office
        Hours</a> for that information.
      </div>

      <h2 id='texts'>Texts</h2>
      <div>
        <ul>
          <li>
            James Gleick, <em>The Information</em>. Pantheon, 2011. ISBN-13: 978-0375423727
          </li>
          <li>
            Brian Christian, <em>The Most Human Human</em>. Doubleday, 2011. ISBN-13:
            978-0385533065
          </li>
          <li>
            Brian Kernighan, <em>D is for Digital</em>, DisforDigital.net, 2011. ISBN-13:
            978-1463733896
          </li>
          <li>
            Hal Abelson, <em>Blown to Bits</em>, Addison-Wesley Professional, 2008. ISBN-13:
            978-0137135592
          </li>
        </ul>
        <h3>Notes:</h3>
           <em>Blown to Bits</em> is available for free online at http://www.bitsbook.com/excerpts/
      </div>
      <!--
      <h2>Topics</h2>
      <div>
        <p>
          Here is an idealized schedule of topics and assignments for the course. The actual
          assignments <a href="<?php echo $this_link; ?>">are posted on a separate page</a>.
        </p>
        <table>
          <tr>
            <th>Classes</th><th>Topics</th><th>Assignments</th>
          </tr>
          <tr>
            <th>1-2</th>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <th>14</th>
            <td colspan="2" class='no-assignment'>Midterm Exam</td>
          </tr>
          <tr>
            <th></th>
            <td colspan="2" class='no-assignment'>Final Exam</td>
          </tr>
        </table>
      </div>
      -->

    <div id="footer">
      <a  href="../../">Vickery&nbsp;Home</a>&mdash;<a
          href="http://validator.w3.org/check?uri=referer">XHTML</a>&mdash;<a
          href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>&mdash;Last updated
      <?php echo date("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>
    </div>
  </body>
</html>


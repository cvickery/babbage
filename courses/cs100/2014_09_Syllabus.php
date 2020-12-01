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
      <h1>CSCI 100: Information and Intelligence</h1>
      <?php
        echo <<<EOT
        $link_to_notes
        $link_to_schedule
EOT;

       ?>
      <h2>Syllabus</h2>
      <div>
        <h2>Catalog Description</h2>
        <p>
          Information measurement, encoding, and transmission as related to the design of
          artificial intelligence agents such as search engines, robots, and programs that
          mimic human intelligence. Models of human and artificial intelligence; relations
          among information, meaning, and data; diagnostic and causal reasoning in the presence
          of uncertainty. Readings from the literature of information theory and artificial
          intelligence; writing assignments, completion of a project to design and/or construct
          an information-driven intelligent agent.
        </p>
        <h2>Overview</h2>
        <p>
          This is a general education course that satisfies the Scientific World (SW) requirement
          under the CUNY General Education structure called Pathways. The course also satisfies
          the Natural Science (NS) requirement under the Perspectives
          curriculum that was in effect at Queens before CUNY introduced Pathways.
        </p>
        <p>
          The course is offered by the Computer Science Department, and may be used as an
          elective in the Computer Information Technology (CIT) minor. It does <em>not</em> count
          as part of the computer science BA or BS majors.
        </p>
        <p>
          There are three parts to the course: (1) <em>Code Writing</em>, (2) <em>Information
          Theory</em> and (3) <em>Artificial Intelligence</em>. Information Theory is the name for the
          principles that underlie everything we call our “digital world,” from computers, phones,
          and cameras to appliances, cars, and the Internet. Artificial Intelligence is the part
          of computer science that builds on Information Theory and the mathematics of Probability
          Theory to enable an important set of digital systems called “intelligent agents” make
          good choices about what they do in the real world.
        </p>
        <p>
          Intelligent agents are devices that perform <em>actions</em> to achieve <em>goals</em>
          based on <em>information</em> they receive from their environment. We are surrounded by
          intelligent
          agents, from Google processing our Internet search requests, to smartphones recognizing our
          verbal commands, to robots that explore other planets, to toasters that recognize when
          bread is brown enough. All intelligent agents rely on
          <em>code</em> to control them, and this course will introduce you to writing code to
          operate a type of device called a <em>microcontroller</em>. Microcontrollers are so
          ubiquitous that you might have heard of them in the current marketing blitz for “the
          Internet of Things.”
        </p>
        <h3>Freshman Year Initiative</h3>
        <p>
          This term the course is being offered as part of a Freshman Year Initiative “Learning
          Community.” That is, everyone in the course is also registerd for a section of English
          110 (being taught by James Richie) that is exploring the topic of “beauty.” In addition to
          giving you a pair of classes in common, we will try to tie the courses together through
          overlapping assignments. So far, all we know is that “code can be beautiful,” but we hope
          to develop more extensive relationships as the semester progresses.
        </p>
        <h3>TIDES Project</h3>
        <p>
          This course is also being run as part of a national project called TIDES (Teaching to Increase
          Diversity and Equity in STEM). STEM is an acronym that stands for Science, Technology,
          Engineering, and Mathematics: basically, the disciplines in the Division of Mathematics
          and Natural Sciences at QC. The goal of our particular project is to increase participation
          by women in computer science. True to national patterns of enrollment in computer science,
          only 25% of our class is female this semester. You will be asked to take part in thinking
          about ways that this proportion could be increased.
        </p>
        <h2>
          Required Background
        </h2>
        <p>
          The course has no other courses as prerequisites: you are not expected to have ever
          written any code, and you don’t need any mathematical preparation beyond standard
          arithmetic skills. What you do need is an openness to new ideas, a willingness to
          think about how our digital world works, and an interest in creating something new.
        </p>
        <h2>Course Objectives</h2>
        <ul>
          <li>
            Become fluent with numerical features of Information Theory
            <ul>
              <li>Binary numbers; exponents and logarithms</li>
              <li>Using binary numbers to encode various types of information
                <ul>
                  <li>Numbers</li>
                  <li>Text</li>
                  <li>Sound</li>
                  <li>Images</li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            Be able to articulate some of the goals and techniques of artificial intelligence
            <ul>
              <li>Algorithms</li>
              <li>Inputs and Outputs: Sensors and Actuators</li>
              <li>Probabilistic reasoning</li>
            </ul>
          </li>
          <li>Design and implementation of digital devices
            <ul>
              <li>Assembling microcontroller-based circuits</li>
              <li>Arduino code writing and testing</li>
            </ul>
          </li>
        </ul>
        <h2>Course Structure</h2>
        <pre>
          Class Section         Days &amp; Times            Room            Instructor
          46835 37-LEC Regular  MoWe 1:40PM - 3:30PM    Powdermker 102  James Richie
          46025 11-LEC Regular  TuTh 10:45AM - 12:00PM  Science B141    Christopher Vickery
        </pre>
        <p>
          This class meets Tuesdays and Thursdays from 10:45 to noon in Science Building
          Room B-141.
          (The English Composition course meets Mondays and Wednesdays from 1:40 to 3:30 pm in
          Powdermaker Hall Room 102.)
        </p>
        <p>
          Each class will begin with a brief
          quiz based on the reading and/or video assignment for the class. You will receive
          full credit for the quiz provided your answer "looks reasonable." But you can receive
          extra credit for a quiz answer that demonstrates a good understanding of the issues
          at hand. Classes will consist of a mixture of laboratory exercises, discussions, and
          presentation of group activities in which you are expected to participate actively. At
          the end of each class you will submit a very brief summary of your "takeaway" from the
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


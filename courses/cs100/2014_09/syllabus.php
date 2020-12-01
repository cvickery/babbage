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
    <title>Information and Intelligence Syllabus</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/style-all.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/style-screen.css" />
    <link rel="stylesheet" type="text/css" media="print" href="../../css/style-print.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../../css/syllabus.css" />
    <style>
      h1+h2 { text-align: center;}
      @media screen, handheld {.print-only { display:none; } }
      @media print {
        h2+div {box-shadow: none;}
      }
    </style>
  </head>
  <body>
      <h1>CSCI 100: Information and Intelligence</h1>
      <?php
        echo <<<EOT
        $link_to_notes
        $link_to_schedule
EOT;

       ?>
      <h2>Fall 2014 Syllabus and <a href='./index.php'>Course Schedule</a>
      </h2>
      <div>
        <h2>Course Catalog Description</h2>
        <p><strong>CSCI 100</strong>. Information and Intelligence. 3hr; 3cr. No Prerequisites</p>
        <p>
          Information measurement, encoding, and transmission as related to the design of
          artificial intelligence agents such as search engines, robots, and programs that
          mimic human intelligence. Models of human and artificial intelligence; relations
          among information, meaning, and data; diagnostic and causal reasoning in the presence
          of uncertainty. Readings from the literature of information theory and artificial
          intelligence; writing assignments, completion of a project to design and/or construct
          an information-driven intelligent agent.
        </p>
        <h2>General Education and Departmental Requirements</h2>
        <p>
          This is a general education course that may be used to satisfy the Scientific World (SW)
          requirement under the CUNY General Education structure called Pathways. The course could
          also be used to satisfy the Natural Science (NS) requirement under the Perspectives
          curriculum that was in effect at Queens before CUNY introduced Pathways in 2013.
        </p>
        <p>See the <a href='http://gened.qc.cuny.edu'>General Education website</a> <span
          class='print-only'> (http://gened.qc.cuny.edu) </span> for more information about the
          General Education requirements at the college.
        </p>
        <p>
          The course is offered by the Computer Science Department, and may be used as an
          elective in the Computer Information Technology (CIT) minor. It does <em>not</em> count
          as part of the computer science BA or BS majors.
        </p>
        <h2>
          Course Goals
        </h2>
        <p>
          Did you ever wonder how your phone, tablet, or laptop does what it does, and does it
          so well? Did you ever think that computer science requires some special sort of “insider"
          talent? This course aims to give you a good idea of the answer to the first question,
          and hopes to convince you that the answer to the second one is “<strong>no!</strong>”
        </p>
        <p>
          There are three parts to the course: (1) <em>Code Writing</em>, (2) <em>Information
          Theory</em> and (3) <em>Artificial Intelligence</em>. Information Theory is the name for the
          principles that underlie everything we call our “digital world,” from computers, phones,
          and cameras to appliances, cars, and the Internet. Artificial Intelligence is the part
          of computer science that builds on Information Theory and the mathematics of Probability
          Theory to enable an important set of digital systems called “intelligent agents” to make
          good choices about what they do in the real world.
        </p>
        <p>
          “Intelligent agent” is the name for devices that perform <em>actions</em> to achieve
          <em>goals</em>
          based on <em>information</em> they receive from their environment. We are surrounded by
          intelligent
          agents, from Google processing our Internet search requests, to smartphones recognizing our
          verbal commands, to robots that explore Mars, to toasters that recognize when
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
          110 (being taught by James Richie) that is exploring the topic of “beauty.” James and I
          are in touch with each other, but there are no concrete plans for sharing assignments or
          activities this semester. But you will have a good chance to get to know the other
          members of your community in the two classes.
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
        <p>
          Each objective will be addressed in overlapping segments of the class meetings. That is,
          we won’t spend <em>X</em> weeks on one topic, then <em>Y</em> weeks on the next one.
          Rather, we will be revisiting different parts of each topic throughout the course. The
          percentages show the approximate amount of class time that will be devoted to each topic.
        </p>
        <ul>
          <li>
            Become fluent with numerical features of Information Theory (35%)
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
            Be able to articulate some of the goals and techniques of artificial intelligence (30%)
            <ul>
              <li>Algorithms</li>
              <li>Inputs and Outputs: Sensors and Actuators</li>
              <li>Probabilistic reasoning</li>
            </ul>
          </li>
          <li>Design and implementation of digital devices (35%)
            <ul>
              <li>Arduino code writing and testing</li>
              <li>Assembling microcontroller-based circuits</li>
            </ul>
          </li>
        </ul>
        <h2>Course Structure</h2>
        <p>
          This class meets Tuesdays and Thursdays from 10:45 to noon in Science Building
          Room B-141.
          (The English Composition course meets Mondays and Wednesdays from 1:40 to 3:30 pm in
          Powdermaker Hall Room 102.)
        </p>
        <p>
          Class meetings will normally begin with a brief quiz based on the reading, lecture, and/or
          video assignments being covered at the time. Classes will aslo normally end with a brief
          “takeaway” writing exercise in which you summarize your experience in that class. These
          exercises will be graded on a 3-point scale: “not ok” (1 point); “ok” (2 points); “good”
          (3 points). Of course if you don’t do an exercise, you get no points for it. At the end
          of the term all your points will be summed, and the total will count 10% of your course
          grade. If you get “ok” on everything, you will get full credit for that part of your
          course grade. “Good” grades are rare, but they can offset missing or “not ok” grades;
          they can even give you extra credit for this part of your grade.
        </p>
        <p>
          There will be midterm and final exams to assess your knowledge of the material covered
          in the course. In addition, you and another member of the class will work as a team to
          design and build your own Arduino project for the term.
        </p>
        <p>
          There are no textbooks for the course. All material you need is available online.
        </p>
        <p>
          The <a href="./index.php">Course Schedule</a> web page is the key to all assignments.
          As the semester progresses it will be filled in with links to assignment web pages,
          reading material, and video-based exercises that you will submit online. I will send
          everyone email, tweet, and text whenever I update the course schedule page.
        </p>
        <p>
          Classes will consist of a mixture of lectures, laboratory exercises, and discussions
          in which you are expected to participate actively. You will work on the laboratory
          exercises in groups of two, but will not necessarily have the same partner for each
          exercise. You will also be able to do laboratory work outside of class times.
        </p>
        <h2>Course Grading</h2>
        <p>
          Each semester is a little different, so the following percentages are subject to
          minor revision. I will announce any such changes, and will update this list accordingly.
        </p>
        <ul>
          <li>
            30% Quizzes, Takeaways, Written, laboratory, and video assignments
          </li>
          <li>
            20% Final Arduino Project or Term Paper
          </li>
          <li>
            25% Midterm Exam
          </li>
          <li>
            25% Final Exam
          </li>
        </ul>
        <h2>Class Schedule</h2>
        <p>
          There are two 75 minute class meetings per week. Attendance will not be taken
          (except at the beginning of the semester to verify your registration for the
          course), but students who often miss class will probably fail the course because
          (a) exams and assignments depend heavily on material covered only in class and (b)
          you need to attend class to get credit for brief quizzes and takeaways.
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

       </div>

     <h2>Instructor</h2>
    <div>
      The instructor for the course is Dr. Christopher Vickery. See <a
      href="../../../contact_info.xhtml">Dr. Vickery’s Contact Information and Office
      Hours</a> for that information.
    </div>

    <h2 id='texts'>Texts</h2>
    <div>
      <p>
        These books are not required, but you may find them useful to consult. Any reading
        assignments from them will be made available either in the library or as handouts.
      </p>
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

    <h2>University and College Policies and Services</h2>
    <div>
      <h3>CUNY Policy on Academic Integrity</h3>
      <p>
        Academic dishonesty is prohibited in the City University of New York and is
        punishable by penalties, including failing grades, suspension, and expulsion.
        The <a href='http://policy.cuny.edu/manual_of_general_policy/article_i/policy_1.03/text/'>
        CUNY Policy on Academic Integrity</a>
        <span class='print-only'>
          (http://policy.cuny.edu/manual_of_general_policy/article_i/policy_1.03/text/)
        </span> defines and gives examples of academic dishonesty and describes the procedures
        to be followed when cases of academic dishonesty occur.
      </p>
      <h3>Use of Student Work</h3>
      <p>
        All programs in New York State undergo periodic reviews by accreditation agencies.
        For these purposes, samples of student work are occasionally made available to those
        professionals conducting the review. Anonymity is assured under these circumstances.
        If you do not wish to have your work made available for these purposes, please let
        the professor know before the start of the second class. Your cooperation is greatly
        appreciated.
      </p>
      <h3>Accommodations for Students with Disabilities</h3>
      <p>
        Students with disabilities needing academic accommodation should register with and
        provide documentation to the Office of Special Services, Frese Hall, room 111. The
        Office of Special Services will provide a letter for you to bring to your
        instructor indicating the need for accommodation and the nature of it. This should
        be done during the first week of class. For more information about services
        available to Queens College students, contact the Office of Special Services
        (718-997-5870) or visit <a href='http://sl.qc.cuny.edu/oss/'>their website
        </a><span class='print-only'> (http://sl.qc.cuny.edu/oss/)</span>.
      </p>
      <h3>Course Evaluations</h3>
      <p>
        During the final four weeks of the semester, you will be asked to complete an
        evaluation for this course by filling out an online questionnaire. Please remember
        to participate in these course evaluations. Your comments are highly valued, and
        these evaluations are an important service to fellow students and to the
        institution, since your responses will be pooled with those of other students and
        made available online, in the <a href='http://courses.qc.cuny.edu'>Queens College Course
        Information System</a>
        <span class='print-only'>(http://courses.qc.cuny.edu)</span>. Please also note that all
        responses are completely anonymous; no identifying information is retained once the
        evaluation has been submitted.
      </p>
      <h3>Technical Support</h3>
      <p>
        The <a href='http://www.qc.cuny.edu/computing/'>Queens College Helpdesk</a>
        (<span class='print-only'>http://www.qc.cuny.edu/computing/, </span>(718) 997-4444,
        <a href='mailto:helpdesk@qc.cuny.edu'>helpdesk@qc.cuny.edu</a>) is located in the
        I-Building, Room 151 and provides technical support for students who need help with
        Queens College email, CUNYportal, Blackboard, and CUNYfirst.
      </p>
    </div>
    <div id="footer">
      <a  href="../../../">Vickery Home Page</a>—<a
          href='./'>Course Schedule</a>—<a
          href="http://validator.w3.org/check?uri=referer">XHTML</a>—<a
          href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>—Last updated
      <?php echo date("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>
    </div>
  </body>
</html>


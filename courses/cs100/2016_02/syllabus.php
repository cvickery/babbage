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
    <title>Information and Intelligence Syllabus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
      <h2>Spring 2016 Syllabus
      </h2>
      <div>
        <h2>Course Catalog Description</h2>
        <p><strong>CSCI 100</strong>. Information and Intelligence. 3hr; 3cr. No Prerequisites</p>
        <p>
          Information measurement, encoding, and transmission as related to the design of artificial
          intelligence agents such as search engines, robots, and programs that mimic human
          intelligence. Models of human and artificial intelligence; relations among information,
          meaning, and data; diagnostic and causal reasoning in the presence of uncertainty.
          Readings from the literature of information theory and artificial intelligence; writing
          assignments, completion of a project to design and/or construct an information-driven
          intelligent agent.
        </p>

        <h2>General Education and Departmental Requirements</h2>
        <p>
          This is a general education course that may be used to satisfy the Scientific World (SW)
          requirement under the CUNY General Education structure called Pathways. The course could
          also be used to satisfy the Natural Science (NS) requirement under the Perspectives
          curriculum that was in effect at Queens before CUNY introduced Pathways in 2013.
        </p>
        <p>See the <a href='https://gened.qc.cuny.edu'>General Education website</a> <span
          class='print-only'> (http://gened.qc.cuny.edu) </span> for more information about the
          General Education requirements at the college.
        </p>
        <p>
          The course is offered by the Computer Science Department, and may be used as an
          elective in the Computer Information Technology (CIT) minor. It does <em>not</em> count
          as part of the computer science BA or BS majors.
        </p>

        <h2>Course Goals</h2>
        <p>
          Thinking. What is that? What is the difference between memorization and problem solving?
          What is information, and how do we use use it when we think?
        </p>
        <p>
          Queens College is a liberal arts college, which means in part that you should expect to
          learn “critical thinking” while you are here. At the same time, there is a big push for
          everyone to learn “computational thinking,” often in the form of learning to code, because
          these abilities are core to so many of our activities, both work-related and in our
          leisure time as well.
        </p>
        <p>
          Artificial Intelligence (AI) is the part of computer science that develops the ability of
          computers to think in human ways. That is, AI is the field that leverages computers
          ability to memorize vast amounts of information and perform calculations at amazing
          speeds to make them perform tasks that involve traits like critical thinking. Two
          key foundations of AI are <em>knowledge representation</em> and <em>goal searching.</em>
        </p>
        <p>
          One goal of this course is for you to learn how computers use binary numbers to encode
          information: the foundation of the knowledge representation problem in AI. The second goal
          is for you to learn how computers solve problems: the foundation of goal searching in AI.
        </p>
        <p>
          The technique for achieving these two goals is for you to learn to write code. You can
          think of code writing as teaching a computer how to use information to solve problems.
          What makes this approach so good is that the process of teaching computers will help you
          develop your own ability to think analytically and critically: the hallmarks of human
          intelligence; the hallmarks of a liberal arts education.
        </p>

        <h2>Required Background</h2>
        <p>
          The course has no other courses as prerequisites: you are not expected to have ever
          written any code, and you don’t need any mathematical preparation beyond high
          school algebra. What you do need is an openness to new ideas, a willingness to
          think about how our digital world works, and an interest in creating something new.
        </p>

        <h2>Assignments and Class Notes</h2>
        <p>
          Exam dates, reading assignments, laboratory assignment descriptions, and assignment due
          dates are all listed on the <a href='./index.php'>Course Schedule</a> web page, which
          gets updated throughout the semester.
        </p>
        <p>
          Assignment descriptions and class notes, which may get updated during and after class
          meetings, are published as Google Docs on
          <a href='https://drive.google.com/folderview?id=0B28CAPM6eyUPaDN2VEh3RllqVU0'>
          the course website on Google Drive</a>.
        </p>

        <h2>Course Structure</h2>
        <p>
          This class meets Tuesdays and Thursdays from 1:40 to 2:55 in Science Building
          Room B-141.
        </p>
        <p>
          Class meetings will normally begin with a brief quiz based on the reading, lecture, and/or
          video assignments being covered at the time. Classes will end with a brief “takeaway”
          exercise in which you summarize your experience in that class. These quizzes and takeaways
          will be graded on a 3-point scale: “not yet” (1 point); “ok” (2 points); “good” (3 points).
          Of course if you don’t do an exercise, you get no points for it. At the end of the term
          all your points will be summed, and the total will count 10% of your course grade. If you
          get “ok” on everything, you will get full credit for that part of your course grade.
          “Good” grades can offset missing or “not yet” grades.
        </p>
        <p>
          There is an “open lab” for this course in Science Building Room A-205. The class will meet
          in the lab a few times to help you get familiar with it, but its main use will be for you
          to work there on your coding assignments outside of regular class times. You and a partner
          from the course will be assigned a small locker in the lab where you can keep your lab
          materials, and you can use the lab any time the Computer Science Department office (across
          the hall in room A-202) is open. It’s all right to use the lab as a study room for your
          other classes, but not for meals.
        </p>
        <p>
          Homework will consist of writing and coding exercises, plus midterm and final exams.
          Writing assignments will require you to respond to written or video material related to
          the informational and computational concepts being developed in the course.
          In addition, you and your lab partner will give a presentation to the class describing
          your last Arduino project for the course.
        </p>

        <h2>Class Meetings and Time Commitment</h2>
        <p>
          There are two 75 minute class meetings per week. Attendance will not be taken
          (except at the beginning of the semester to verify your registration for the
          course), but students who often miss class will probably fail the course because
          (a) exams and assignments depend heavily on material covered only in class and (b)
          you need to attend class to get credit for brief quizzes and takeaways.
        </p>
        <p>
          The course requires a regular time commitment from you, 3 hours of class meetings plus 6
          hours of “preparation (study, homework) time” each week. This is the standard “Carnegie
          formula” for college courses: a full-time course load (12 credits) demands as much of your
          time as a full-time job, so if you take four 3-credit courses each one requires a 9-hour
          time commitment per week. (4 courses times 9 hours = 36 hours per week.) The difference
          between college and work, of course, is that no one is keeping track of the time you spend
          on the job other than you. Instead, you have to manage your time yourself, and you have
          exams and assignments that assess how you are performing in the course.
        </p>
        <p>
          There will be coding assignments in this course that will require a considerable amount
          of your time. At the beginning it will take a lot of time to get even a little bit of code
          to work. But the more you practice coding, the better you will get.
        </p>

        <h2>TIDES Project</h2>
        <p>
          This course is part of a national project called TIDES (Teaching to Increase Diversity and
          Equity in STEM). STEM is an acronym that stands for Science, Technology, Engineering, and
          Mathematics: basically, the disciplines in the Division of Mathematics and Natural
          Sciences at QC. The goal of our particular project is to increase participation by women
          in computer science. Nationally, women make up only 15-20% of all computer scientists. We
          will spend some of our class time discussing the question of why more women have not been
          choosing to study computer science.
        </p>

        <h2>Course Material</h2>

        <h2>Course Content</h2>
        <p>
          Each topic will be addressed in overlapping segments of the class meetings. That is,
          we won’t spend <em>X</em> weeks on one topic, then <em>Y</em> weeks on the next one.
          Rather, we will be revisiting different parts of each topic throughout the course. The
          percentages show the approximate amount of course time that will be devoted to each topic.
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
            Be able to articulate some of the goals and techniques of artificial intelligence (25%)
            <ul>
              <li>Algorithms</li>
              <li>Inputs and Outputs: Sensors and Actuators</li>
              <li>Probabilistic reasoning</li>
            </ul>
          </li>
          <li>Coding: the design and implementation of digital agents (40%)
            <ul>
              <li>Arduino code writing and testing</li>
              <li>Assembling microcontroller-based circuits</li>
            </ul>
          </li>
        </ul>

        <h2>Course Grading</h2>
        <p>
          Each semester is a little different, so the following percentages are subject to
          revision. I will announce any such changes, and will update this list accordingly.
        </p>
        <ul>
          <li>
            10% Quizzes, Takeaways
          </li>
          <li>
            20%  Written, laboratory, and video assignments
          </li>
          <li>
            20% Final Arduino Project
          </li>
          <li>
            25% Midterm Exam
          </li>
          <li>
            25% Final Exam
          </li>
        </ul>
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
        There is no textbook required for this course. Rather, all tutorial and reference material
        for the course is available online.
      </p>
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
        these evaluations are an important service both to fellow students and to the
        institution. Your responses will be pooled with those of other students and
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


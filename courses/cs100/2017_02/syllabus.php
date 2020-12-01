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
      <h2>Spring 2017 Syllabus
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
          requirement under the CUNY <em>Pathways</em> General Education structure. The course can
          also be used to satisfy the Natural Science (NS) requirement for students who matriculated
          under the <em>Perspectives</em>curriculum that was in effect at Queens before CUNY
          introduced <em>Pathways</em>.
        </p>
        <p>See the <a href='https://gened.qc.cuny.edu'>General Education website</a> <span
          class='print-only'> (http://gened.qc.cuny.edu) </span> for more information about the
          General Education requirements at the College.
        </p>
        <p>
          The course is offered by the Computer Science Department, and may be used as an
          elective in the Computer Information Technology (CIT) minor. It does <em>not</em> count
          as part of the computer science BA or BS majors.
        </p>

        <h2>Course Goals</h2>
        <p>
          Thinking, what is that? What is the difference between memorization and problem solving?
          What is information, and how do we use use information when we think? <em>Information and
          Intelligence</em> deals with these questions by introducing you to basic principles of
          digital computation.
        </p>
        <p>
          Queens College is a liberal arts college, which means in part that you should expect to
          develop your “critical thinking” abilities while you are here. At the same time, there is
          a push for everyone to learn “computational thinking” (usually in the form of learning
          to code) because that sort of thinking is core to so so much of what we do in both
          our social and our work lives.
        </p>
        <p>
          Artificial Intelligence (AI) is the part of computer science that develops the ability of
          computers to think in human ways. That is, AI is the field that leverages computers’
          ability to memorize vast amounts of information and perform calculations at amazing
          speeds to make them perform tasks that involve traits like critical thinking. Two
          key foundations of AI are <em>goal searching</em> and <em>knowledge representation.</em>
        </p>
        <ul>
          <li>
            One goal of this course is for you to learn how computers use algorithms to solve
            problems: the foundation of goal searching in AI.
          </li>
          <li>
            A second goal is for you to learn how computers use binary numbers to encode
            information: the foundation of the knowledge representation problem in AI.
          </li>
        </ul>
        <p>
          The specific technique we will use for achieving these two goals is for you to learn to
          write code that will make small electronic devices (microcontrollers) interact with the
          physical world. The electronic devices you will be using are called <em>Arduinos</em>, and
          the programming language you will be using is called <em>Arduino</em>.
        </p>
        <p>
          You can think of code writing as teaching a computer how to use information to solve
          problems. What makes this approach so good for achieving the goals of this course is that
          the process of teaching computers will help you develop your own ability to think
          analytically and critically, and that type of thinking is the hallmark of a liberal arts
          education.
        </p>

        <h3>If you are thinking of majoring in the humanities</h3>
        <p>
          I highly recommend the book <em>Exploratory Programming for the Arts and Humanities</em>
          by Nick Montfort. The Introduction to that book captures the essence of what I hope we can
          accomplish in this course. Here’s one sentence that sums it up: ”My aim in this book is to
          help new programmers see the creative potential of the computer and understand how
          computation can be used to explore and inquire.” Although we we be using a different
          programming environment from the ones used in the Montfort book, the goals of this course
          are very much aligned with the aim of that book.
        </p>

        <h3>If you are thinking of majoring in the social sciences</h3>
        <p>
          Making sense of information is what social science research is all about. There are many,
          many computational tools available for working with that information. This course aims to
          give you a good foundation in how computers represent information and work with it.
        </p>

        <h3>If you are thinking of majoring in the natural sciences</h3>
        <p>
          Like social scientists, natural scientists collect and analyze data in order to further
          knowledge. The foundation in representing and managing information from this course will
          serve you in your work in many of the same ways as for the social sciences.
        </p>

        <h3>If you are thinking of majoring in computer science</h3>
        <p>
          This course should provide you with an advantage when you start the computer science
          major, especially if you have have little or no programming experience, but it is not a
          substitute for a traditional Introduction to Computer Science course. Put another way,
          there are plenty of successful computer science students who never had a course like this
          one. What this course hopes to do is to provide you with a broader sense of the
          possibilities your computer science education can open up for you.
        </p>
        <p>
          If you have already started to major in computer science, you will have a different set
          of course requirements from students who are new to coding.
        </p>

        <h2>Required Background</h2>
        <p>
          The course has no other courses as prerequisites: you are not expected to have ever
          written any code, and you don’t need any mathematical preparation beyond high
          school algebra. What you do need is an openness to new ideas, a willingness to
          think about how our digital world works, and an interest in creating something new.
        </p>
        <p>
          The Arduino programming language used in this course is actually the same programming
          language (C++) as the language used in CSCI-111, the first course in the Computer
          Science majors. (Arduino has a different “runtime environment” from C++, but the languages
          are the same.) Because the Arduino programming environment is so different from the C++
          environment used in CSCI-111 (and 211), students who have completed courses in C++ are
          allowed to take this course despite the overlap.
        </p>
        <p>
          The course is designed for students with no background in computing, and exams will be
          the same for everyone. However, programming assignments for students who have studied
          C++ previously will be more demanding than the progrmming assignments for beginning
          students.
        </p>

        <h2>Assignments and Class Notes</h2>
        <p>
          This course does <em>not</em> use Blackboard. Instead, there is a website, <a
          href="http://babbage.cs.qc.cuny.edu">babbage.cs.qc.cuny.edu</a>, that I use for all my
          courses.
          Assignment due dates and exam dates are listed on the <a href='./index.php'>Course
          Schedule</a> web page. Exam dates are set at the beginning of the term, but the
          assignment schedule gets updated throughout the semester because the assignments vary
          depending on how the course evolves over the term.
        </p>
        <p>
          With the arrival of the cloud-based <em>Google Suite for Education</em> at QC, I have been
          moving more and more of my course material to that platform. For this course, the link
          you should bookmark is
          <a href='https://drive.google.com/drive/folders/0B28CAPM6eyUPakVPV0RCdzFyRXc'>
          the course website on Google Drive</a>.
        </p>

        <h2>Course Structure</h2>
        <p>
          This class meets Tuesdays and Thursdays from 12:15 to 1:30. The first class meeting, the
          midterm exam, and the final exam will be in Science Building Room B-141. Other classes
          will meet in a special classroom, Science Building A-205.
        </p>
        <aside>
          <h3>Quiz/Takeaway Scoring Example and Notes</h3>
          If there are 25 quizzes and you have 45 quiz points, your quiz score
          will be 45/50 = 0.9 (90%).
          <ul>
            <li>A “good” grade can offset a “not ok” grade or part of a missing grade.</li>
            <li>You can’t get more than full credit for either the takeaways or the quizzes.</li>
            <li>If you have to miss a class for some reason and you let me know what the reason is
              ahead time, I will excuse you from the quiz for that class. There is an unspecified
              limit to how many times you can be excused.</li>
          </ul>
        </aside>
        <p>
          Class meetings will normally begin with a brief quiz based on the reading, lecture, and/or
          video assignments being covered at the time. Classes will end with a brief “takeaway”
          exercise in which you summarize your experience in that class. These quizzes and takeaways
          will be graded on a 3-point scale:
        </p>
        <ul>
          <li>“not ok” (1 point)</li>
          <li>“ok” (2 points = full credit)</li>
          <li>“good” (3 points)</li>
          <li>“excellent” (4 points&#x2014;very rare)</li>
        </ul>
        <p>
          If you don’t take a quiz or submit a takeaway, you get 0 points for it. Ten per cent of
          your course grade will be based on your quiz and takeaway scores, which will be computed
          as follows: your quiz score will be your total number of quiz points divided by 2 times
          the number of quizzes; likewise for your takeaway score.
          At the end of the term you will have a quiz score and a takeaway score, which are your
          total quiz/takeaway points divided by 2 times the number of quizzes/takeaways.
        </p>
        <p>
          Science Building Room A-205 is the “open lab” for this course. With the exceptions noted
          above, we always meet there because it is a better instructional setup than the regular
          classroom.
        </p>
        <p>
          But you will be using the lab outside of class times to do your coding
          assignments. The lab will be available any time the Computer Science Department Office
          is open, including evening hours. You will be learning to work with electronic circuits
          called
          microcontrollers, both for assembling basic circuits and for writing code to manipulate
          those circuits. The tools and equipment you need to do your homework assignments are kept
          in small lockers in the room. You and a partner
          from the course will be given the combination to one of the lockers, where you can keep
          your lab materials to use outside of class time.
        </p>
        <p>
          The computers in the lab have the software you will need for the course already installed,
          but you can also install the same software on your own computer at no cost if you prefer
          to do your assignments outside the lab. However, (a) you will have to use the circuits in
          the lab to test your code before you submit it, and (b) you will have to leave the code
          for your assignments in your lab account in order to receive credit for them.
        </p>
        <p>
          It’s all right to use the lab as a study room for your other classes, but not for meals.
        </p>
        <p>
          Homework will consist of a mix of writing and coding exercises. You can do the written
          assignments anywhere, but the code has to be written and tested in the lab.
          In addition advanced students will give a presentation to the
          class describing their final project for the course.
        </p>

        <h2>Class Meetings and Time Commitment</h2>
        <p>
          There are two 75 minute class meetings per week. Attendance will not be taken
          (except at the beginning of the semester to verify your registration for the
          course), but students who often miss class will probably fail the course because
          (a) exams and assignments depend heavily on material covered only in class and (b)
          you need to attend class to get credit for the brief quizzes and takeaways.
        </p>
        <p>
          The course requires a regular time commitment from you, 3 hours of class meetings plus 6
          hours of “preparation (study, homework) time” each week. This is the standard “Carnegie
          formula” for college courses: a full-time course load (12 credits) demands as much of your
          time as a full-time job, so if you take four 3-credit courses, each one requires a 9-hour
          time commitment per week. (4 courses times 9 hours = 36 hours per week.) The difference
          between college and work, of course, is that no one is keeping track of the time you spend
          on the job other than you. Instead, you have to manage your time yourself, and you will
          have exams and assignments that assess how you are performing in the course.
        </p>
        <p>
          There will be coding assignments in this course that will require a considerable amount
          of your time. At the beginning it will take a lot of time to get even a little bit of code
          to work. But the more you practice coding, the better you will get.
        </p>

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
              <li>Arduino code: writing and testing</li>
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
            5% Takeaways
          </li>
          <li>
            10% Quizzes
          </li>
          <li>
            25% Written, laboratory, and video assignments
          </li>
          <li>
            10% Final Arduino Project (for advanced students)
          </li>
          <li>
            30% Midterm Exam (25% for advanced students)
          </li>
          <li>
            30% Final Exam (25% for advanced students)
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
        for the course is available at no cost online.
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
        (718-997-5870) or visit <a href='http://www.qc.cuny.edu/StudentLife/services/specialserv'>their website
        </a><span class='print-only'> (http://www.qc.cuny.edu/StudentLife/services/specialserv)</span>.
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


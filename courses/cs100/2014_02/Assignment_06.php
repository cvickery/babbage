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
    <title>CSCI 100 Assignment 6</title>
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
    dt { font-weight: bold;}
    h3 { font-size: 1em; }
    </style>
  </head>
  <body>
    <h1>CSCI 100 Assignment 6</h1>
    <h2>Spring Break Assignments</h2>
    <div>
      <p>
        We have only seven more classes following Spring Break, and you will have a “Final Paper” counting 20% of your
        course grade due at midnight on May 20 (the same day as the final exam, which will also count 20% of your
        course grade). So you will need to do work over Spring Break in order to handle the end-of-semester crush
        without getting overwhelmed.
      </p>
      <p>
        Here is a list of where we are in the course, where we are headed, and what you need to do when.
      </p>
      <dl>

        <dt><a href='http://ed.ted.com/on/yvQUmOsA'>The Story of Information</a></dt>
        <dd>
          This is the optional (extra-credit) TED-Ed lesson that Lizandra prepared. The deadline for completing
          this assignment is midnight April 11, the last day of classes before Spring Break. The original deadline
          was April 10, but it’s been extended 24 hours as an act of extreme munificence by Dr. Vickery!
        </dd>

        <dt><a href='./Assignment_03.php'>Arduino Binary Counter</a></dt>
        <dd>
          <p>
            There was no due date given for this assignment because people with different backgrounds have been
            completing it at different rates. It’s more important for you to complete the assignment than it is
            to meet a deadline.
          </p>
          <p>
            In addition, I have converted the optional parts of the assignment to requirements: you need to complete
            all parts of the assignment to receive full credit.
          </p>
          <p>
            Bottom line: I am making the due date for the Arduino assignment <strong>April 29</strong>. You can work on
            the project over Spring Break by checking out your project box from the Computer Science department office;
            they will open the lab for you, and will retrieve the project box from my office for you if necessary.
          </p>
          <p>
            If you would like me come in to help you with the project during Spring Break, send me an email to let me
            know when, and I’ll set it up if possible.
          </p>
        </dd>

        <dt><a href='http://ed.ted.com/on/u4ofmxP6'>TED-Ed Lesson on AI</a></dt>
        <dd>
          A new TED-Ed lesson based on a PBS video that Lizandra found. Your answers are due by <strong>
          April 24</strong>, the first day of classes after the break.
        </dd>

        <dt><a href='./ai_reading_assignment.pdf'>Reading Assignment on Artificial Intelligence</a></dt>
        <dd>
          <p>
            <strong>Due April 24, the first class day after Spring Break.</strong>
          </p>
          <p>
            Two professors at the University of British Columbia, David Poole and Alan Mackworth, have made their
            <a href='http://artint.info/html/ArtInt.html'>textbook on Artificial Intelligence</a> available for
            free online. Not only is the price “right,” but it’s written so you can read just the parts appropriate
            for this course without wading through the deep parts. Lizandra went through it and prepared an
            <a href='./ai_reading_assignment.pdf'>assignment page</a> that tells you what sections to read and
            includes a set of questions for you to answer.
          </p>
          <p>
            Written answers to all the questions are due by midnight of <strong>April 24</strong>. You should be
            prepared to answer questions from Chapter 1 in the brief quiz for class that day.
          </p>
        </dd>

        <dt>Final Paper/Project Topic</dt>
        <dd>
          <p>
            You have a choice of writing a conventional term paper or designing/implementing an Arduino project
            as your end of term assignment for the course.
          </p>
          <h3>Term Paper</h3>
          <div>
            You are free to choose any topic you like for a term paper, provided it relates to any <em>combination</em>
            of two or more of the topics covered in this course: information theory, coding, bayesian reasoning, and
            artificial intelligence. Here are a few examples, but these are just ideas to get you started in thinking
            about what you would like to pursue
            <ul>
              <li>How information theory relates to probability theory</li>
              <li>How robots use microcontrollers to behave as intelligent agents</li>
              <li>How information is encoded using various sensors and/or actuators</li>
              <li>The difference between deterministic and probabilistic AI search techniques</li>
            </ul>
            <p>
              The paper must draw on material from multiple sources, and those sources must be cited using one
              of the standard styles (APA, MLA, etc.) A terrific starting point for source material is the
              set of links in the “Dig Deeper” sections of the TED-Ed assignments for the course.
            </p>
            <p>
              The paper will be graded on accuracy, clarity, structure, and
              writing style. It should take 5-10 pages to cover the topic in sufficient depth.
            </p>
            <p>
              You must tell me your tentative paper topic by <strong>April 24</strong>, and provide a top-level
              outline by <strong>April 29</strong>. You can improve your grade for the assignment by submitting
              up to two draft versions of the paper, one by May 1 and one by May 8. Actually improving your grade
              depends on how well you incorporate suggestions made in response to the drafts in the second and
              final versions of your paper. Although the paper is not due until May 20, you will give a 5-minute
              summary of your paper to the class at the last class meeting on <strong>May 15</strong>.
            </p>
            <p>
              Each person must do his or her own individual paper.
              Plagiarism or “outsourcing” will result in automatic failure in the <em>course</em>.
            </p>
          </div>
          <h3>Arduino Project</h3>
          <div>
            The idea of this option is to let you explore the world of microcontrollers in a creative way. You may
            work in a team of either two or three people, and all members of the team will report anonymously how
            much each member of the team contributed to the project. So plan on spending “quality time” with your
            teammates outside of class if you are going to take this option.
            <p>
              The Binary Counter assignment used only simple switches for input and LEDs for output. But there
              a lot of interesting inputs (sensors) and actuators (outputs) available for use with Arduino
              microcontrollers. For example, we have the following items available now, and there is a budget of
              up to $40 per group available for items not already on-hand.
            </p>
            <h4>Sensors</h4>
            <ul>
              <li>Potentiometers: knobs and sliders</li>
              <li>Light sensors (photocells)</li>
              <li>Temperature sensors</li>
              <li>Proximity (distance) detectors</li>
              <li>Passive Infrared detectors (signal when a person/object enters a room)</li>
              <li>Metal detectors</li>
              <li>Capacitive (touch) sensors</li>
              <li>More buttons and switches</li>
            </ul>
            <h4>Actuators and other Outputs</h4>
            <ul>
              <li>Piezoelectric “speakers” (Can also possibly be used as “bump detectors”)</li>
              <li>Haptic motors (like the vibrate signal on a phone)</li>
              <li>Lasers, like the ones used in pointers.</li>
              <li>Motors: stepper and syncro. Make wheels turn, point a laser at a photocell, etc.</li>
              <li><a href='http://adafru.it/902'>LED matrices</a>, like the moving sign demo from April 10</li>
              <li><a href='http://adafru.it/1463'>NeoPixel Rings</a></li>
            </ul>
            <h4>Other Microcontroller Features</h4>
            <ul>
              <li>
                Clocks/interrupts (built into the microcontroller) for accurate timing and controlling
                things that happen in parallel.
              </li>
              <li>
                Serial I/O. Built into Arduino for debugging, but can be used for general communication
                between, for example, two Arduinos.
              </li>
              <li>
                Bluetooth I/O. Wireless link to a computer or phone. Send/receive commands and/or data.
              </li>
            </ul>
            <p>
              There are many possible ways to approach this project, and I will entertain ideas for anything
              realistic, including initial work on something that would be “too big” for this course. Ideally,
              you would pick the design and construction of some sort of intelligent agent, but it’s okay to
              do something that doesn’t necessarily employ AI.
              Kinetic art, wearable computing, remote control thermostats, robot vacuum cleaners,
              sock sorting machines, etc. are all fair game.
            </p>
            <p>
              There have to be three distinct phases of work if you choose this option: <em>planning</em>,
              <em>design</em>, and <em>implementation</em>. That list is in decreasing order of importance.
              That is, the goal is to build something interesting, but it’s more important to design something
              that can realistically be built than it is actually to complete the construction work. Besides,
              the construction phase may reveal issues that require re-visiting the design for one reason or
              another, which is normal and would not necessarily make the project a failure.
            </p>
            <h4>Schedule</h4>
            <ul>
              <li>
                <strong>April 24</strong>. Send me email with the names of the people on your team, and a one
                sentence (or so) description of what you would like to do. I will provide feedback/ideas by
                email, or we can meet to discuss your project idea in more detail.
              </li>
              <li>
                <strong>May 1</strong>. Submit a written plan for your project by email.
              </li>
              <li>
                <strong>May 15</strong> (last class). Give a 5-10 minute presentation to the class describing
                your project, one presentation per team. Demonstrate what you have built so far.
              </li>
              <li>
                <strong>May 20</strong>. (final exam day) Project due.
              </li>
            </ul>
            <p>
              Projects will be based on technical sophistication, creativity, and execution. It is all right
              to base your project on one that you have seen elsewhere and/or to use kits in your project,
              but it must require original work on your part, not just assembly of a pre-packaged project. For
              example, there is a <a href='http://arcbotics.com/products/sparki/'>Sparki robot</a> available,
              and your project could be to program it to do something “interesting” provided you don’t just copy
              sample project code for it from somewhere else. (There is only one Sparki available, so only one
              group will get to use that option.)
            </p>
          </div>
        </dd>

        <dt><strong>Other Material</strong></dt>
        <dd>
          Here’s a video you might find interesting:
          <a href='http://arstechnica.com/science/2014/04/brain-damage-can-make-people-immune-to-the-gamblers-fallacy/'>Brain
          damage can make people immune to the gambler’s fallacy</a> (Ars Technica).
        </dd>

      </dl>
    </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>

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
    <title>CSCI 100 Midterm Guide</title>
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
  </head>
  <body>
    <h1>CSCI 100 Midterm Exam and Paper Guide</h1>
    <p>
      There are two separate midterm activities, an exam and a paper.
    </p>
    <p>
      The midterm exam will be Thursday, March 13, and the midterm paper is due the following week, March 20.
      This <em>Guide</em> provides you with a list of things we have covered in class and assignments that you should be prepared to
      be tested on in the exam, and it describes what you need to do for the paper.
    </p>
    <h2 id='topics'>Midterm Exam topics</h2>
    <div>
      <ul>
        <li>Shannon’s definition of information as uncertainty reduction</li>
        <li>Using bits to measure information</li>
        <li>Calculate number of bits from number of alternatives</li>
        <li>Logarithms are exponents</li>
        <li>Positional number systems: decimal and binary</li>
        <li>Powers of two from 2<sup>0</sup> to 2<sup>10</sup></li>
        <li>Prefixes for large numbers: K (Kilo); M (Mega); G (Giga); T (Tera); P (Peta)</li>
        <li>Prefixes for fractions: m (milli); μ (micro); n (nano); p (pico)</li>
        <li>How to play Nim</li>
        <li>Logic operations: AND; OR; NOT; XOR</li>
        <li>Computer components: Inputs; Outputs; Memory; Central Processing Unit (CPU)</li>
        <li>Inside the CPU: Arithmetic, Control, Registers</li>
        <li>Digital and analog information</li>
        <li>Resisters and LEDs, Arduino inputs/outputs</li>
        <li>Pulse width modulation</li>
        <li>The 10% myth
          <ol>
            <li>What is the probability anyone believes it?</li>
            <li>What is the probability a science teacher believes it?</li>
            <li>What part of the brain is used for abstract reasoning?</li>
            <li>How much energy does the human brain use compared to a dog?</li>
            <li>How does sparse coding affect the relationship between energy use and amount of information?</li>
          </ol>
        </li>
        <li>Information: vegetables and junk food</li>
        <li>Filter Bubbles: Google and Facebook algorithms</li>
      </ul>
    </div>
    <h2 id='paper'>The Midterm Paper</h2>
    <div>
      <p>
        For the paper, you are to write a lesson in which you teach a student about one of the topics covered in the class to date.
        This is short paper: about 2 pages double-spaced, to be written in essay form. It must be well organized so that it presents the topic in a
        logical fashion, and it must be well-written using standard English. That is, grammar, spelling, sentence structure, and
        paragraph structure all count, in addition to technical accuracy.
      </p>
      <p>
        Note that there are many written and video tutorials available on all these topics. Feel free to use them to help you prepare
        your paper, but remember two important things about this assignment:
      </p>
      <ol>
        <li>
          This is a writing assignment. Videos, diagrams, or other media may be submitted, but they are not expected and
          do not substitute for the writing requirement.
        </li>
        <li>
          Write your own paper. For this assigment, you do not need to cite your sources of information because the same information
          is available from so many places already. But do your own writing. Copying or paraphrasing other people’s work is plagiarism,
          which is grounds for failure in the course. Your paper will be scanned by SafeAssign to detect plagiarism.
        </li>
      </ol>
      <p>
        You may pick any topic from the course that you wish, or you may simply pick from one of the following:
      </p>
      <ul>
        <li> How to play Nim. </li>
        <li> Positional number systems and how to convert binary numbers to decimal and <em>vice-versa</em></li>
        <li> How to digitize audio information </li>
        <li> How LEDs work </li>
        <li> How to solder </li>
        <li> How to set up an Arduino sketch </li>
      </ul>
    </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>

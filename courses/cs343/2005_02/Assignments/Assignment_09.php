<?php
  if (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml"))
  {
    header("Content-type: application/xhtml+xml");
    print("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n");
  }
  else
  {
    header("Content-type: text/html; charset=utf-8");
  }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head><title>Extra Credit Assignment</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="../index.php" />
<link rel="Prev" href="Assignment_08.php" />
<link rel="Next" href="Assignment_10.php" />
<link rel="stylesheet" type="text/css"  href="style-all.css" />
<link rel="stylesheet" type="text/css"  media="screen"
                                        href="style-screen.css" />
<link rel="stylesheet" type="text/css"  media="print"
                                        href="style-print.css" />
</head>
<body>
<h1>Extra Credit Assignment</h1>
<h1>("Assignment 9")</h1>
<h2>How Much Extra Credit</h2>
<div class="whitebox">

  <p>The <a
  href="http://babbage.cs.qc.edu/courses/cs343/2005_02/#administrivia">grading
  procedure for this course</a> says that the three exams will each
  count 30% of your course grade and the homeworks will count the
  remaining 10%.  (There was one Quiz, which will be calculated as
  part of your homework grade.)</p>

  <p>You have the option of writing a <a
  href="#requirements">paper</a> for extra credit in the course.  The
  amount of extra credit you will receive depends on a number of
  factors, but I guarantee that submitting a paper can only improve
  your course average (or leave it unchanged).  Here's how it works: 
  Your course average will be calculated in the usual way (as
  described in the previous paragraph), giving you a score between 0
  and 100 as your "unadjusted course average."  If you don't submit a
  paper, your unadjusted course average will be your final course
  average.  If you do submit a paper, it will be graded on a 100 point
  scale.  Your unadjusted course average will be multiplied by 0.95 to
  give your "reduced course average," and 15% of your paper grade will
  be added to that to give your "adjusted course average," limited to
  a maximum value of 100.  If your adjusted course average is less
  than your unadjusted course average, your unadjusted course average
  will be your final course average.  Otherwise, your final course
  average will be your adjusted course average.</p>

  <p>To give you a more concrete idea of how much the paper can be
  worth to you, the following table shows your final average given
  various combinations of unadjusted averages and paper grades.</p>

  <table>
    <thead>
      <tr>
        <th rowspan="2">Unadjusted<br />Average</th>
        <th rowspan="2">Reduced<br />Average</th>
        <th colspan="7">Paper Grade</th>
      </tr>
      <tr>
        <th>40</th><th>50</th><th>60</th>
        <th>70</th><th>80</th><th>90</th><th>100</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td class="center">90</td><td class="center">85.5</td>
      <td class="center">91.5</td><td class="center">93.0</td>
      <td class="center">94.5</td><td class="center">96.0</td>
      <td class="center">97.5</td><td class="center">99.0</td>
      <td class="center">100</td>
    </tr>
    <tr>
      <td class="center">80</td><td class="center">76.0</td>
      <td class="center">82.0</td><td class="center">83.5</td>
      <td class="center">85.0</td><td class="center">86.5</td>
      <td class="center">88.0</td><td class="center">89.5</td>
      <td class="center">91.0</td>
    </tr>
    <tr>
      <td class="center">70</td><td class="center">66.5</td>
      <td class="center">72.5</td><td class="center">74.0</td>
      <td class="center">75.5</td><td class="center">77.0</td>
      <td class="center">78.5</td><td class="center">80.0</td>
      <td class="center">81.5</td>
    </tr>
    <tr>
      <td class="center">65</td><td class="center">61.8</td>
      <td class="center">67.8</td><td class="center">69.3</td>
      <td class="center">70.8</td><td class="center">72.3</td>
      <td class="center">73.8</td><td class="center">75.3</td>
      <td class="center">76.8</td>
    </tr>
    <tr>
      <td class="center">60</td><td class="center">57.0</td>
      <td class="center">63.0</td><td class="center">64.5</td>
      <td class="center">66.0</td><td class="center">67.5</td>
      <td class="center">69.0</td><td class="center">70.5</td>
      <td class="center">71.0</td>
    </tr>
    <tr>
      <td class="center">50</td><td class="center">47.5</td>
      <td class="center">53.5</td><td class="center">55.0</td>
      <td class="center">56.5</td><td class="center">58.0</td>
      <td class="center">59.5</td><td class="center">61.0</td>
      <td class="center">62.5</td>
    </tr>
    </tbody>
  </table>

  <p>So it's definitely worth working on this, especially if your work
  has been in the 60's or low 70's and you hope to get a C in the
  course so you can use it for the CS major.  For example, if your
  course average is 65 and you get a 75 on the paper, you can still
  get a C in the course.</p>

<hr />
  <p>In case you aren't familiar with it, Queens College has a
  standard set of rules for translating course averages into course
  letter grades:</p>

  <table>
    <tr>
      <th>Average</th>
      <td class="center">&lt;60</td>
      <td class="center">60-66</td><td class="center">67-69</td>
      <td class="center">70-72</td>
      <td class="center">73-76</td><td class="center">77-79</td>
      <td class="center">80-82</td>
      <td class="center">83-86</td><td class="center">87-89</td>
      <td class="center">90-92</td>
      <td class="center">93-96</td><td class="center">97-100</td>
    </tr>
    <tr>
      <th>Grade</th>
      <td class="center">F</td>
      <td class="center">D</td><td class="center">D+</td>
      <td class="center">C-</td>
      <td class="center">C</td><td class="center">C+</td>
      <td class="center">B-</td>
      <td class="center">B</td><td class="center">B+</td>
      <td class="center">A-</td>
      <td class="center">A</td><td class="center">A+</td>
    </tr>
  </table>

  <p>I am free to calculate your course average any way I want to, so
  long as I use the same algorithm for everyone in the course.  But
  once your average is computed, I have no flexibilty in assigning
  letter grades.  So it's up to you to produce the numbers that let me
  give you the grade that you want! </p>

</div>

<h2><a id="requirements">The Assignment</a></h2>
<div class="whitebox">

  <h3>Topic, Length, and Submission</h3>

  <p>The exact topic for your paper is up to you, but it has to be on
  something related to the course: processor, memory, or I/O
  architecture.  I've mentioned the topic, "Dual-core CPUs" in class,
  but you do <em>not</em> have to pick that topic.  If you aren't sure
  whether your idea for a topic is okay, ask me.</p>

  <p>The paper is to be about 5 pages long.  Don't bother to hand in
  something that's less than three pages, and the upper limit is
  strictly set at 10 pages.  Use a word processor, single space, and
  use a font size of 10 to 12 points.</p>
  
    <p class="indent">You may submit either an OpenOffice (.sxw) file
    or a Microsoft Word (.doc) file.  Other file formats might be
    acceptable, but contact me in advance if you want to use a
    different format.  I'll need to be sure my word processors can
    open your format.</p>

  <p>Your paper is to be based on research you have done.  Most of
  your sources will probably be from the Internet, but books and
  articles are especially good.  But do not plagarize!  All of the
  writing is to be in your own words, with the sources of the ideas
  cited carefully.  Here's an example of what I mean:</p>

    <blockquote><p>Some sources say that fribble is good because it
    makes the CPU go faster [3], but others feel that the speed
    improvement is far outweighed by the increased demands fribbling
    makes on the battery, resulting in heavier and hotter systems
    [2][6].  However, the coolness associated with fribbled systems
    far outweighs the weight and heat factors.</p></blockquote>

  <p>In this example, the numbers in [square brackets] are references
  to the publications or web pages where you found the information.
  The last sentence is an example of where you have gone beyond what
  any or your sources said and are adding your own ideas.</p>

  <p>You may submit one rough draft of your paper for me to review
  before May 20.  I will comment on it and make suggestions that you
  can incorporate in the final version, which will be due by
  <strong>Midnight May 29.</strong>  There will be no extensions or
  incompletes.</p>

  <p>Send your paper to me as an email attachment by the due date.</p>

  <h3>Writing the Paper</h3>

    <p>Start by thinking about what you want to write about.  Look for
    sources of information.  In addition to Google, look at
    manufacturer's web sites such as <a
    href="http://developer.intel.com/">Intel</a>, <a
    href="http://www.amd.com/us-en/Processors/ProductInformation/0,,30_118,00.html">AMD</a>,
    and <a
    href="http://www-03.ibm.com/chips/products/powerpc/">IBM</a>.
    There are also several web sites that provide tutorial material
    and technology surveys that are very good, such as <a
    href="http://arstechnica.com/index.ars">Ars Technica</a>, <a
    href="http://www.aceshardware.com/">Ace's Hardware</a>, and <a
    href="http://www.tomshardware.com/index.html">Tom's Hardware</a>.
    Also, the Queens College Library has a subscription to <a
    href="http://qcpages.qc.cuny.edu/Library/online/qclist.html#S">Safari
    Books</a> that lets you read many technical books online for
    free.  You have to be on campus or use the QC Proxy Server to
    access the subscription; check the library web site for more
    information on using the proxy server.  Or call the OCT help desk
    at 718-997-4444.</p>

    <p>Next, decide what you want to say in your paper.  Are you going
    to explain how something works?  Or perhaps you are going to
    survey what the current state of the art is with respect to some
    technology.  A third possibility is that you are going to do a
    review of the history of some aspect of computer architecture, and
    a fourth possibility would be to provide an annotated bibliography
    related to some aspect of computer architecture.  Your paper
    should fall into one of those four categories.</p>

    <p><strong>Create an Outline</strong>  Outline your paper
    <em>before</em> you start writing anything.  There should be an
    introduction, a body, and a summary.  The introduction should tell
    what the paper is going to be about and should tell how the
    remainder of the paper is structured.  This part of the paper will
    normally not include any citations of your research sources.  The
    body will consist of a number of sections, each of which is
    coherent by itself; the sections should be in a logical sequence
    and should tell whatever "story" you decided you want to tell (see
    previous paragraph).  This is the part where you cite various
    sources of information that you are used.  The summary, like the
    introduction, is your own material and will not include any
    citations.  The introduction, each section, and the summary can
    all be as little as one paragraph each, and none of them should be
    as long as two pages.  (A paragraph has to have more than one
    sentence.)</p>

    <p><strong>Separate Content from Formatting</strong>  Write your
    entire paper using your word processor's "Normal" style.  Instead
    of formatting the headings by marking them up with bold, italics,
    etc., use your word processor's "Heading 1,", "Heading 2," etc.
    styles instead.  Then format the styles if you want to tweak the
    appearance of the document.</p>

    <p>Use your top-level heading style to put a title for your paper
    at the beginning.  This style should be boldface and centered,
    possibly a little larger than the rest of the text in the paper.
    Put your name directly under the title (also centered), also
    boldface, but using a smaller font than the title.  Start the
    Introduction, each section, and the Summary with the name of the
    section using a style that makes them boldface and left-justified.
    These headings may use a larger font than the rest of the paper,
    but should be a little smaller than the title font. At the end of
    Put a list of references that you cited in the body of your paper
    in a separate section following the Summary.  Use the word
    "References" as the name of this section.  The references are to
    be a numbered list (so you can cite them by putting the numbers in
    square brackets in the body of the paper); each reference should
    give the author's name, the title of the work, and enough
    information to let a user find the item.  For example:</p>
<hr />
    
   <p class="indent">
     [1] Patterson, D. and Hennessy, J. <em>Computer Organization and Design</em>.  Morgan Kaufmann, 2004.
     <br />[2] Jon Stokes.  <em>IDF Roundup</em>.  http://arstechnica.com/articles/paedia/cpu/IDF-2005.ars
   </p>
    
<hr />

    <p>Here's a summary of the structure of your paper:</p>

      <pre>
                                    Title
                                    Author
        Introduction
        Section 1 (use meaningful name)
        Section 2
        Section ...
        Summary
        References
      </pre>

  <h3>Grading Criteria</h3>

  <p>Your paper will be graded on technical content (40%), writing style
  and structure (40%), and document mechanics (20%).</p>

  <ul>
    <li><strong>Technical Content</strong><br />
      This part of your grade will be based on the quality of the
      material you came up with in your research. The depth and
      breadth of the information sources you cite will help determine
      this.
    </li>

    <li><strong>Writing Style and Structure</strong><br />
      This part of your grade will depend on how well organized your
      paper is (the better your outline, the better the organization
      will be), and on your writing style: grammar, spelling,
      punctuation, and expecially clarity.
    </li>
    <li><strong>Document Mechanics</strong><br />
      You will also be graded on how well you separated content from
      presentation.  If you use your word processor's styles
      correctly, this part should not be a problem.
    </li>
  </ul>

</div>
<hr />
<p class="footer">Validate this page:
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

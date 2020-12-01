<?php
  if (array_key_exists("HTTP_ACCEPT", $_SERVER) &&
      stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml"))
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
<head>
<title>Assignment 3</title>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" media="all"
				href="/courses/css/style-all.css" />
<link rel="stylesheet" type="text/css" media="screen"
				href="/courses/css/style-screen.css" />
<link rel="stylesheet" type="text/css" media="print"
				href="/courses/css/style-print.css" />
</head>
<body>
<div id="header">
  <h1>CS-081 Assignment 3</h1>
</div>
<div id="content">
  <h2>Introduction</h2>
  <div class="whitebox">

    <p>This is your second <em>unstyled</em> web page assignment. For
    this one, create a directory named "Assignment 3" under "My
    Documents." Put just one file in that directory, and name it
    <em>index.php</em>.  Use your template to start defining the
    contents of <em>index.php</em>.  Make the title of the web page
    "Assignment 3."  Set up three &lt;div&gt;s with ids of "header",
    "content", and "footer."  Inside the header div, put an H1 with
    "Assignment 3" for the text.  Under that, put an H2 with your name
    for the text.  Inside the content div put an h2 with "A Form" for
    the text.  Then put a form element after that.  See below for what
    must go inside the form.  In the footer div, put a link to the W3C
    validator.</p>
    
    <p>The form is to include the following items:</p>

    <ul>

      <li>A fieldset containing a group of three radio buttons. One
      button in each set is to be initially checked.  Use "Radio
      Buttons" for the legend of the fieldset.  Include &lt;label&gt;
      tags for each radio button.</li>

      <li>A fieldset containing a set of four or more checkboxes.  Use
      "Checkboxes for the legend of the fieldset.  Include &lt;label&gt;
      tags for each checkbox.</li>

      <li>A text field.  Include a &lt;label&gt; tag for the text
      field.</li>

      <li>A textarea.  Include a &lt;label&gt; tag for the textarea.</li>

      <li>A fieldset containing two select lists.  One list is to
      allow multiple selections, and the other is not.  Include at
      least three options for each selection.  Use "Selection Lists"
      for the legend of the fieldset.  Use &lt;label&gt; tags for the
      two lists.</li>

      <li>A submit button </li>
    </ul>

  </div>

  <h2>Optional</h2>

  <div class="whitebox">

    <p>It's okay to use whatever names and values you like for the
    various elements of the form.  If you want to, you can make a
    realistic form with meaningful names and options for some
    application you choose.  For example, you could use the radio
    buttons to let the user give his or her gender, allowing for a
    "choose not to say" option, the checkboxes to let the user select
    among a set of favorite foods, the text box for the user's name,
    the text field for comments, and the selection boxes for a list of
    cities the user has visited and which one he or she lives in
    now.</p>

    <p>Once you have the form working, you should set up the tab order
    and access keys for the various input items, but doing so is not a
    requirement for the assignment.</p>

    <p>For the multiple selection list, you can use a name that ends
    with a pair of square brackets ("[]").  If you do, the PHP script
    will list all the values that were selected.  If you don't, that
    script will list just one of the values selected.  The Bash script
    will work whether you use the square brackets trick or not.</p>

  </div>
    
  <h2>Testing</h2>
  <div class="whitebox">
    <p>I am providing two nearly-equivalent scripts that you can use to
    test your web page.  The urls are:</p>

    <ul>
      <li>http://babbage.cs.qc.edu/courses/cs081/2005_09/Assignments/Form_Script.php</li>
      <li>http://babbage.cs.qc.edu/courses/cs081/2005_09/Assignments/Form_Script.sh</li>
    </ul>

    <p>Be sure your code is well formatted: no tab characters no wide
    lines, and indented to show the tree structure of the
    document.</p>

    <p>Be sure your web page comes up with a green check from TIDY, that
    the Firefox Page Info tool shows application/xhtml+xml in standards
    compliant mode, and that the W3C validator reports that the page is
    Valid XHTML 1.1.</p>

    <p>Test your form using both the GET and PUT methods with both
    scripts.  Make sure all the form elements work correctly.</p>

    <p>Here's a screen shot to give you an idea of what your form page
    might look like:</p>

    <div class="whitebox">
      <img src="A3.png" alt="Assignment 3 Screen Shot" />
    </div>

    <p>And here's a screen shot showing some sample output from that
    script:</p>

    <div class="whitebox">
      <img src="A3-out.png" alt="Assignment 3 Output" />
    </div>
  </div>

  <h2>Submit The Assignment</h2>

  <div class="whitebox">
    <h3>Due Date: October 28</h3>

    <p>Send an email message to me with "CS-081 Assignment 3" as the
    Subject.  In the body of the message, put your name, the last four
    digits of your college ID, and the pathname where I can get a copy
    your assignment.  That should be "My Documents/Assignment 3" if
    you followed the instructions above.  To be "on time" you have to
    send your email by midnight of the due date.</p>
  </div>
</div>

<div id="footer">
  <hr />
  <p>
    <a href="/">Vickery Home</a>&nbsp;-
    <a href="/courses/cs081">CS-081 Home</a>&nbsp;-
    <a href="/courses/cs081/2005_09">CS-081 Fall 2005 Home</a>&nbsp;-
    <a href="http://validator.w3.org/check?uri=referer"> XHTML</a>&nbsp;
    <a href="http://jigsaw.w3.org/css-validator/check/referer"> CSS</a></p>
</div>
</body>
</html>

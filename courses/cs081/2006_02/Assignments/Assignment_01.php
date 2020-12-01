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

  <title>CS-081 Assignment 1</title>

  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="/courses/css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="/courses/css/style-screen.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="print"
        href="/courses/css/style-print.css"
  />        

</head>

<body>

  <div id="header">
    <h1>CS-081 Assignment 1</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">
      <p>For this assignment, you are to use your laboratory account to
      create a web page based on the file named
      &ldquo;course_template.php&rdquo; that I distributed in class.  You
      are to modify the template according to the requirements listed below,
      and you are to verify that it operates correctly using one of the web
      servers in the laboratory.  When your web page works, send me an email
      with &ldquo;CS-081 Assignment 1&rdquo; as the subject.  In the body of
      the message, all you have to put is your first and last name so I can
      figure out what your account name is.</p>
    </div>    

    <h2>Procedure</h2>
    
    <div class="whitebox">
      <p>Log into your account using any of the computers with a tree name
      in
      room A-205.  The first time you log into your account you will have to
      change the password: be sure to pick a good one, because the lab
      computers are directly connected to the Internet and subject to
      attacks
      from outsiders who would love to use your account to get you and
      Queens
      College into trouble.</p>

      <p>Under &ldquo;My Documents&rdquo; you will find a folder named
      &ldquo;My Web Pages&rdquo;.  This is where you will create all your
      web pages for this course.  Create a folder under &ldquo;My Web
      Pages&rdquo; named &ldquo;Assignment_01&rdquo;.  Be sure you spell and
      capitalize the folder name exactly like that so I will be able to
      retrieve it when you submit the assignment.</p>

      <p>Use either Vim or Dreamweaver to create a file in
      &ldquo;Assignment_01&rdquo; named &ldquo;index.php&rdquo;.  Again, the
      name of the file must be spelled and capitalized exactly as shown. 
      This time it&rsquo;s because that&rsquo;s the name the Apache server
      will look for when you deploy your assignment for testing.  I have
      written a <a href="using_vim.php">Tiny Vim Tutorial</a> to get you
      started with Vim.  And I am working on a <a
      href="../../using_dreamweaver.php">Dreamweaver Setup</a> page to help
      you with that option if you choose it.</p>

      <p>Type the contents of &ldquo;course_template.php&rdquo; into your
      &ldquo;index.php&rdquo; file.  <strong>Warning:</strong> <em>you have
      to type it exactly right for it to work, and the error messages you
      will get for doing something wrong in the first part of the file will
      not be helpful!</em></p>

      <p>Deploy your web page.  Copy (don&rsquo;t move)
      &ldquo;index.php&rdquo; from your &ldquo;Assignment_01&rdquo;
      directory to &ldquo;C:\htdocs&rdquo;.  If there is already a file with
      the same name there, just overwrite it.  Use Firefox to view your web
      page by using the URL, &ldquo;birch.cs.qc.edu&rdquo;.  Substitute the
      name of the computer you are actually working on for
      &ldquo;birch&rdquo; in that URL.  See if the page looks right.  If it
      does, then:</p>

      <ul>

        <li>Check to see that the TIDY indicator mentioned in class is green
        with a check mark.</li>

        <li>Look at the Page Info by clicking on Tools-&gt;PageInfo.  Be
        sure
        the <em>Type</em> is &ldquo;application/xhtml+xml&rdquo; and the
        <em>Render Mode:</em> is &ldquo;Standards compliance
        mode&rdquo;.</li>

        <li>Click on the XHTML link at the bottom of the page and be sure
        the
        W3C Validator comes up with a green bar saying, &ldquo;This Page is
        Valid XHTML 1.1!&rdquo;</li>

      </ul> <p>If any of the above items is not right, correct the original
      page in your &ldquo;Assignments_01&rdquo; directory, redeploy the
      file,
      and check everything again.  Repeat this until the page is
      perfect.</p>

      <h3>Modify the Template</h3>
      
      <p>Now modify your course template file.  First, make a copy of
      &ldquo;index.php &rdquo; in your &ldquo;My Web Pages&rdquo; folder so
      you can use it as a starting point for other projects this
      semester.</p>
      
      <p>Make the following changes to
      &ldquo;Assignment_01\index.php&rdquo;:</p>
      
      <ul>

        <li>Change the title of the page to your name.</li>
        
        <li>Change the <em>h1</em> element&rsquo;s content to match the
        page&rsquo;s title.</li>

        <li>Note that there is an error message displayed following the
        &ldquo;Last updated&rdquo; message at the bottom of the page.  Make
        the change needed so the correct date is displayed.
        (Congratulations, you are now a PHP programmer!)</li>

        <li>Write a paragraph of information about something under the
        <em>h2</em> element, and change the heading to indicate what the
        paragraph is about.</li>
        
        <li>Create a second <em>h2</em> element under the paragraph you just
        wrote, and use &ldquo;Lorem Ipsum&rdquo; as the name of the
        section.  Add two paragraphs under this heading with information
        generated by <a
        href="http://www.lipsum.com/">www.lipsum.com/</a>.</li>

      </ul>
      
      <p>Deploy, test, and edit your page until it is perfect again.</p>

      <p>Be sure you log off from your account when you are finished.  This
      is critical for two reasons: (1) If you don&rsquo;t log off, your work
      won&rsquo;t get saved to the server and I won&rsquo;t be able to
      retrieve your assignment for grading, and (2) Only one person can be
      logged on at a time; if you don&rsquo;t log off, no one else can use
      that computer.</p>

      <h3>Submit Your Assignment</h3>

      <p>As stated in the Introduction, submit the assignment by sending me
      an email message.  Even if you do the project with someone else, you
      both have to send me email, and you both must have correct code in
      your &ldquo;My Web Pages\index.php&rdquo; files.  And your own name
      has to be used for the title of the page and the <em>h1</em>
      header.</p>

      <p><strong>Due Date:</strong> Midnight, February 10.</p>

    </div>
  </div>

  <div id="footer">
  <hr />
    <p>
      <a href="..">CS-081 This Semester</a>&nbsp;-&nbsp;
      <a href="../..">CS-081 Course Home Page</a>&nbsp;-&nbsp;
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("Y-m-d", filemtime("Assignment_01.php"));
      ?>.</em>
    </p>
  </div>
</body>
</html>

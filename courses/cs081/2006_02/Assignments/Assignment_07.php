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

  <title>CS-081 Assignment 7</title>

  <link rel="shortcut icon" href="favicon.ico" />

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
<!--  Copy and paste:
        <p><span class="aq">Activity Question</span></p>
-->
<body>

  <div id="header">
    <h1>CS-081 Assignment 7</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">

      <p>This assignment assumes you are already familiar with Chapter 5 of
      the textbook, and is designed to familiarize you with what actually
      happens when a form is submitted.</p>

      <p>The assignment consists of a sequence of activities that use a
      number of files that I am providing:</p>

      <dl>
        <dt><a href="../../a_form.php">a_form.php</a></dt>
        <dd>This is a web page that contains a form that contains an
        assortment of form elements. The form is not at all typical,
        however, because it uses Javascript to let you choose the values of
        the <span class="functionName">submit</span> and <span
        class="functionName">method</span> attributes of the form
        interactively.  These features show up as a set of radio buttons and
        three different submit buttons at the bottom of the form.  You can
        view the document source to see how it&rsquo;s all done.</dd>

        <dt><a href="../../Form_Script.php">Form_Script.php</a></dt>

        <dd>Forms get submitted to programs that run on a web server.  These
        programs can be written in pretty much any programming language, and
        this one is written in PHP.  PHP is currently the most commonly used
        language for processing data submitted by forms.  Other languages
        that are commonly used are <span class="programName">Perl </span>(an
        older language) and <span class="programName">Ruby </span>(a newer
        language).  This program generates a web page that gives information
        about the form data that was submitted to it.  If you click the link
        above, no form data will be sent, and it will just come back as an
        empty web page.  (Try it.)  Like all PHP web pages, the actual PHP
        code gets removed from the file before it gets sent to the browser;
        if you would like to see the actual source code, you can look at <a
        href="../../html/Form_Script_php.html">Form_Script_php.html</a>.
        (Not required reading!)</dd>

        <dt><a href="../../Form_Script.sh">Form_Script.sh</a></dt>
        <dd>This file is very similar to <span
        class="fileName">Form_Script.php</span>, except it is written as a
        <span class="tech-term">shell script</span>.  A shell is a program
        that reads commands typed in by a user and executes them, either
        directly or by running another program.  This script is written in
        the <span class="programName">bash </span>shell scripting language.
        Bash is a more primitive language compared to PHP, so it gives a
        little more detailed view of the information submitted to it from
        the form.  Again, if you click on the link to it above, you
        won&rsquo;t get much information back.  And again, if you want to
        see what the script looks like, there is a web page at <a
        href="../../html/Form_Script_sh.html">Form_Script_sh.html</a></dd>

        <dt><a href="../../Echo_HTTP_Requests.jar">EchoHTTPRequests.jar</a></dt>

        <dd>This is a special web server we will use to see more precisely
        how the browser sends form data to a web server.  Taking the scripts
        above one step further, it returns a web page that shows the actual
        structure of the request messages it receives.  Unlike the two
        scripts above, this program handles multipart/form-data (used when
        uploading files) correctly.
        
        <br />This program requires a current version of Java in order to
        run, so if you download it to a computer outside the lab, you may
        need to update your Java software to use it. <em>Right</em>-click
        the link above to download the file.  If you left-click on it,
        you&rsquo;ll probably see a web page full of nonsense characters;
        it&rsquo;s a binary <span class="functionName">jar </span>file.  If
        you have <span class="programName">WinZip </span>(or the Java <span
        class="programName">Jar </span>utility), you can open the file and
        look at the Java source code if you are interested.</dd>

      </dl>

    </div>

    <h2>Assignment Activities</h2>
    <div class="whitebox">

      <p>You do not have to write any code for this assignment.  Just do the
      activities described below, and write down your answers to the embedded
      <em>Activity Questions</em>.</p>

      <h3>Interact With the Form</h3>
      <div class="whitebox">

        <p>Go to <a href="../../a_form.php">a_form.php</a> and make sure you
        know how to use all the sample form controls on the top part of the
        page.  You will probably want to open it in a separate tab so you
        can switch between it and this web page easily.  (Or just work from
        a printed copy of this one.)</p>

        <p><span class="aq">Activity Question</span>What is the essential
        difference between radio buttons and checkboxes?</p>

        <p><span class="aq">Activity Question</span>What are the two ways
        to make text start on a new line in the Text Area?</p>

        <p><span class="aq">Activity Question</span>What are the two ways to
        get to a specific item using the keyboard only?</p>

        <p>Fill in the form and submit it using both the &ldquo;GET&rdquo;
        and &ldquo;POST-no enctype&rdquo; to <span
        class="programName">Form_Script.php</span>.</p>

        <p><span class="aq">Activity Question</span>What is the difference
        between the URL used by the browser for the two different submit
        methods?</p>

        <p><span class="aq">Activity Question</span>What differences, if any
        do you see in the information returned using the two different
        submit methods.  (<em>Hint: </em>the answer to this question should
        be &ldquo;none&rdquo;.)</p>

        <p>With both checkboxes checked, and with multiple items selected
        from the multiple selection control, submit the form (using either
        &ldquo;GET&rdquo; or &ldquo;POST - noenctype&rdquo; to both <span
        class="functionName">Form_Script.php</span> and to <span
        class="functionName">Form_Script.sh</span>.</p>

        <p><span class="aq">Activity Question</span>How do the outputs from
        the two scripts differ from each other, and what does this say about
        what information the browser sends to the server?</p>

        <p>Observe that the <span class="functionName">name</span> of the
        multiple selection options all end with square brackets
        (&nbsp;[]&nbsp;); that is a trick that is used when submitting forms
        to PHP programs to get the items converted into a list for that
        programming language.</p>

      </div>

      <h3>Use the Echo HTTP Requests Server</h3>
      <div class="whitebox">

        <p>For this part of the assignment, you need to download and run
        special web server called <a
        href="../../Echo_HTTP_Requests.jar">Echo_HTTP_Requests.jar</a> that
        I wrote.  You should download and save the file anywhere you want;
        on your desktop is convenient.  When you double-click the icon, the
        program will start running, provided you have a current version of
        Java installed on your computer.  If you need to get Java, you can
        do so from <a href="http://java.sun.com/j2se/1.5.0/download.jsp">Sun
        Microsystems</a> for free; all you need is the current
        &ldquo;JRE,&rdquo; which was JRE 5.0 Update 6 at the time of this
        writing.  Their website has instructions for installing it.</p>

        <p>If you have a firewall installed on your computer, you will get a
        warning from it the first time you run the program.  You will have
        to allow the program to act as a server in order to continue.</p>

        <p>Normally, you cannot run two web servers at the same time on a
        single computer because they both would try to receive all the HTTP
        requests that arrive, and would conflict with each other.  So my
        server uses a different port number (81) to avoid conflicts with
        Apache, which listens for requests on port number 80.  If you are
        using a computer that doesn&rsquo;t already have a web server
        running on it, this is not an issue and my server could work using
        port 80.  But it always uses 81, whether 80 is already in use or
        not.</p>

        <p>Type the URL, <a
        href="http://localhost:81">http://localhost:81</a> into the address
        bar of your browser.  (You can click that link if you are viewing
        this web page from a computer where my server is running.) If you
        are in the lab, you could also use the actual name of the computer
        you are using in place of &ldquo;localhost.&rdquo;  If everything is
        working, you will get back a web page that shows you the actual
        request message that the browser sent to the server.  The
        server&rsquo;s window on the left side of the screen should show the
        same information, preceeded by a message indicating that it received
        a network connection from your browser.  If you get an error message
        or anything else other than the green page with the title,
        &ldquo;Your HTTP Request,&rdquo; you need to fix whatever is wrong
        before proceeding. The <a
        href="http://babbage.cs.qc.edu/Fora/Courses/index.php?c=2">course
        forum</a> would be a good place to go for help.</p>

        <p>If you are in the lab, you can try running the server on one
        computer and accessing it from a browser running on another
        computer.  (You can only use &ldquo;localhost&rdquo; as the computer
        name when the browser and the server are running on the same
        computer; in other cases you have to use the other computer&rsquo;s
        name in the URL.)</p>

        <p><span class="aq">Activity Question</span>Requests for normal web
        pages, like the request you just made, look very much like the
        request that is sent when you submit a form.  Look at the first line
        of the headers returned by the server and tell whether the request
        used the GET or the POST method.</p>

        <p><span class="aq">Activity Question</span>The first line of the
        request also gives the pathname of the file being requested.  Type
        <a
        href="http://localhost:81/some%20file/that%20doesn't/exist">http://localhost:81/some
        file/that doesn't/exist</a> into the address bar of your browser. 
        What does the first line of the request look like now?</p>

        <p><span class="aq">Activity Question</span>Why don&rsquo;t you get
        a &ldquo;file not found&rdquo; message?</p>
        
        <p><span class="aq">Activity Question</span> Describe in your own
        words the difference between the way the browser submits requests when
        using POST with no <span class="functionName">enctype</span>
        compared to POST using <span
        class="functionName">multipart/form-data</span>.</p>

        <p>If my server messes up in any way, you can always stop it and
        start it over again.  Please let me know <span
        style="text-decoration:line-through">if</span> when you find
        something that causes problems.</p>

        <p>We will use my server as a tool to help during the final project
        in the course.  For now, the goal is just to become familiar with
        its operation. I suggest that you try submitting the sample form to
        it using eithter the GET or the first POST button.  If you click the
        second POST button, you will probably have to exit and restart the
        server.</p>

      </div>

      <h3>Examine the Javascript Code</h3>
      <div class="whitebox">

        <p><span class="aq">Activity Question</span>Look at the source code
        for <a href="../../a_form.php">a_form.php</a> and find the
        Javascript that gets executed when the Submit buttons are clicked.
        Explain in your own words what this code does.</p>

      </div>

    </div>

    <h2>Submit the Assignment</h2>
    <div class="whitebox">
      <p>Write your answers to the Activity Questions in an email, and send
      it to me by <strong>May 2</strong>.</p>
    </div>

  </div>

  <div id="footer">
    <p class="links">
      <a
        href="/">Vickery Home</a>&nbsp;-&nbsp;<a
        href="../..">CS-081 Home</a>&nbsp;-&nbsp;<a
        href="..">CS-081 This term</a>&nbsp;-&nbsp;<a
        href="http://validator.w3.org/check?uri=referer">XHTML</a>&nbsp;-&nbsp;<a
        href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME']));
      ?></em>
    </p>
  </div>
</body>
</html>

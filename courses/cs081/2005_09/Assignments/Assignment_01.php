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
  <link rel="shortcut icon" href="../../favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
          href="../../../css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
          href="../../../css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
          href="../../../css/style-print.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div id="header">
  <h1>CS-081 Assignment 1</h1>
</div>
<div id="content">
  <h2>Description</h2>
  <div class="whitebox">
    <p>Your first assignment is to make sure your account in the TREE domain
      in the Computer Science Department is set up correctly and to be sure you
      are able to edit and deploy web pages based on a standard template.</p>
    <ul>

      <li>Log into any of the tree-named computers in A-205 with a
      username and password both consisting of the first letter of
      your first name and your lastname. This initial password must be
      all lowercase. You will be prompted to change your password to
      something secure. Do so.</li>

      <li>Be sure you can run the Firefox browser. If (when, actually)
      the browser locks up with a green circled arrow next to the
      location bar, double-click the green circle and let the browser
      update whatever extensions it asks for. Now try exiting the
      browser and starting over. If you see my homepage, you're all
      set. More likely, it will lock up again, and you'll have to exit
      the browser again and start it with the command "C:\Program
      Files\Mozilla\Firefox\firefox.exe -ProfileManager", which you
      may either type at a command prompt (Type Ctrl-X to get a window
      where you can type in this command prompt; type "exit" when you
      are finished with this window.) or you can modify the Firefox
      shortcut on your desktop: right-click on the icon, select
      Properties, and add -ProfileManager to the end of the command
      line in the Target text field, click Apply, start firefox, and
      remove the -ProfileManager string when you finish this step.<br
      />
       When you run firefox now, the profile manager will ask you
      what profile to use: click &ldquo;<span
      class="underline">C</span>reate Profile...&rdquo; and create a
      new profile. You can use the name Default User. Highlight the
      new profile name (i.e., be sure it is dark blue, not just gray),
      be sure &ldquo;Don't ask at startup&rdquo; is checked, and click
      &ldquo;Start Firefox&rdquo;. Assuming you see my home page as
      expected (if not, get help from me), you can make a couple of
      standard customizations now: Use the
      View&rarr;Toolbars&rarr;Customize menu sequence to bring up a
      customization panel. While it is showing, drag the Google search
      bar from the second row of the firefox toolbars to the top row
      (don't worry exactly where you drag it). You can also get rid of
      the Go button by dragging it off the second toolbar row. Dismiss
      the customization panel, and your version of firefox should be
      good to go. Exit firefox, make sure the shortcut to it doesn't
      say -ProfileManager any more, and be sure you can run it okay
      now. (Sorry about all that hassle.)</li>

      <li>Now install the Firefox HTML Validator extension. From
      Firefox, use File&rarr;Open File, and browse to
      C:\Downloads\Mozilla\Extensions, and click on the one named html
      validator. Click the install button on the dialog box that comes
      up, then exit Firefox and restart it. You can install other
      extensions if you want to, but this one is required for the
      course.  When you restart firefox, you will see a disk in the
      lower right corner of the browser window. It should be greeen
      with a checkmark in it as you view my home page. Right click on
      it, select Options, and change the accessability level from none
      to normal.</li>

      <li>Now you are ready to create your first web page for the
      course.  In this case, it is to be the template.php file I
      handed out; if you don't have a copy, get one from me. First
      create a directory inside your roaming profile for your web
      pages. I suggest a subdirectory of My Documents named
      <em>htdocs</em>, <em>www</em>, or <em>My Web Pages</em>. The
      name is not critical, but you need to create it. We'll call this
      your development site directory. Use Vim to type in
      <em>template.php</em> and save it in the directory you just
      created. There is a <a href="../../using_vim.xhtml">tiny
      Vim tutorial</a> you can use to help you get started with this
      editor.  <strong>Do not use Notepad to edit code for this
      course!</strong></li>

      <li>Now <strong>copy</strong> (not move) your file from your
      development site directory to C:\htdocs. Somebody else's
      template.php might already be there, but it's okay just to
      replace it with your own. Use firefox to open the url,
      http://localhost/template.php. Verify that (1) the page displays
      correctly, and (2) you get a green checkmark from the HTML
      validator. Whether you do get the green checkmark or not, click
      on the XHTML link at the bottom of the page and see what the w3c
      validator says about your page. Use vim to fix any errors or
      warnings. <strong>Note:</strong>  If the w3c validator says the
      page is good but the tidy validator still shows warnings, it is
      most likely an accessibiltiy problem with the page. In this
      case, you have no choice but to select &quot;copy errors to
      clipboard&quot; option you will get by right-clicking on the
      tidy validator's yellow warning triangle. Then start a new copy
      of vim, and paste the clipboard into a new document so you can
      see what the error message is. You can close this copy of vim
      without saving the file.</li>

      <li>When you log out of the workstation, your roaming profile
      will be saved on the lab's file server, <em>maple</em>, and you
      will be able to access it from any computer in the lab that you
      log into.</li>

    </ul>
  </div>
  <h2>Submitting the Assignment</h2>
  <div class="whitebox">

    <p>To submit this assignment, send an email message
    to <em>vickery _at_ babbage.cs.qc.edu</em> by midnight, September
    20.</p>
    <ol>

      <li>Be sure the Subject of you email message is &ldquo;CS-081
      Assignment 1&rdquo;</li>

      <li>Be sure to put your <em>name and 4-digit ID</em> in the body
      of your message.</li>

      <li>Tell me the name of the directory under My Documents where
      you put your web pages; I will check your template.php file
      using the copy of it on maple that I can read by using
      Administrator privileges.</li>

    </ol>
  </div>
</div>
<div id="footer">
  <hr />
  <p>
    <a href="../../../../">Vickery Home</a>&nbsp;
    <a href="../..">CS-081 Home</a>&nbsp;
    <a href="../">Fall 2005 Home</a>&nbsp;
    <a href="./">Fall 2005 Assignments</a>&nbsp;
    <a href="http://validator.w3.org/check?uri=referer"> XHTML</a>&nbsp;
    <a href="http://jigsaw.w3.org/css-validator/check/referer"> CSS</a></p>
</div>
</body>
</html>

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

  <title>CS-081 Assignment 5</title>

  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="/courses/css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="/courses/css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
        href="/courses/css/style-print.css" />
  <style type="text/css" media="all">
    .standalone_link {
      margin-left: 2em;
      font-weight: bold;
      }
  </style>
</head>

<body>

  <div id="header">
    <h1>CS-081 Assignment 5</h1>
  </div>

  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">

      <p>This assignment deals with the material in Chapter 11 of the
      textbook on the CSS &ldquo;Box Model.&rdquo;  It goes beyond Chapter
      11, however, in that you will also work with the special CSS
      attriburtes available for styling tables.  Finally, the assignment
      also introduces you to Javascript, the standard scripting language for
      adding dynamic features to web pages.</p>

      <p>The W3C specifications for Cascading Style Sheets can be
      intimidating, but they provide the ultimate authority for how CSS is
      supposed to work.  You have already studied CSS colors and backgrounds
      in Chapter 8 of the textbook, so with that material in hand, you
      should now look at the related W3C specifications:</p>

      <p class="standalone_link"><a
      href="http://www.w3.org/TR/CSS21/colors.html">W3C CSS 2.1 Chapter on
      Colors and Backgrounds</a></p>

      <p>Likewise, after reading Chater 11 of the textbook, you are ready to
      go through the formal presentation:</p>

      <p class="standalone_link"><a
      href="http://www.w3.org/TR/CSS21/box.html">W3C CSS 2.1 Chapter on
      Margins, Padding, and Borders</a></p>

      <p>The textbook does not cover CSS rules for styling tables, so in
      this case you will have to work from the material presented in this
      assignment page.  Naturally, you may also consult the W3C link below.
      However, unlike the previous two W3C chapters, this one is not
      required reading:</p>

      <p class="standalone_link"><a
      href="http://www.w3.org/TR/CSS21/tables.html">W3C CSS 2.1 Chapter on
      Tables</a></p>

    </div>

    <h2>Description</h2>
    <div class="whitebox">
      <h3>Overview</h3>

      <p>When you finish this assignment, you will have a web page that
      allows the user to manipulate the page's appearance interactively. 
      The technique for doing this will be to include a number of form
      controls on the page that will be processed by Javascript
      (client-side) code.  This approach is different from Assignment 3,
      where that you had the values of form controls interpteted by a
      server-side script that I wrote for you.  <strong>For this assignment,
      there is no &lt;form&gt; tag and no Submit button.</strong></p>

      <p>I am providing a <a href="Display">Sample Web Page</a> that you can
      try right now to see the sort of thing you are to do with your
      assignment.  This page lets you set the Display and Visibility
      properties of two div and four img elements and see their effects as
      you change their values.  Images 1 and 2 are inside Div 1, while
      images 3 and 4 are inside Div 2.  When you are ready, you can <a
      href="Display.zip">download a zip file</a> containing the entire web
      page, including the javascript code, stylesheets, and images.</p>

      <h3>Development Steps</h3>

      <p>The assignment consists of a sequence of steps.  Unlike other
      assignments where the final result was all that mattered, for this one
      it&rsquo;s important to do the steps in order.  For some steps there
      are some questions for you to answer.  Write the answers (with the
      step number) in the body of the email you send when you submit the
      assignment.</p>

      <ol class="level1outline">

        <li>Experiment with the <a href="Display">Display</a> page.  There
        are 36 combinations of settings for the radio buttons and
        checkboxes, plus six text boxes where you can type in string
        values.  Look for patterns in how the controls affect the lower part
        of the web page, and answer the following questions:

        <ol class="level2outline">

          <li>Look at the page using Internet Explorer and Firefox.  Without
          clicking on anything, what differences can you see between the
          two?  Disregard differences due to font style and text size and
          pay attention to how elements are laid out on the page, what the
          various lines look like and how they are positioned.  Look at the
          spacing between the elements.</li>

          <li>The two image inside the first div have their visibility
          attribute set to &rsquo;inherit&rsquo; when they are not hidden. 
          The other two have their visibility set to &rsquo;visible&rsquo;. 
          What is the difference between &rsquo;inherit&rsquo; and
          &rsquo;visibile&rsquo;?</li>

          <li>What is the difference between
          &ldquo;display=&rsquo;none&rsquo;&rdquo; and
          &ldquo;visibility=&rsquo;hidden&rsquo;&rdquo;?</li>

          <li>The divs have green backgrounds.  What happens to their sizes
          when you change their display attribute from &rsquo;block&rsquo; to
          &rsquo;inline&rsquo;?</li>

          <li>What happens to the size of the images when you change the
          size of the text?  (In Firefox, type Control-&rsquo;+&rsquo; or
          Control-&rsquo;-&rsquo; to increase or decrease the text size.  In
          Opera, use Shift-&rsquo;+&rsquo; and Shift-&rsquo;-&rsquo;.  In
          Internet Explorer, use the View menu to change the text size.)  If
          you haven&rsquo;t done so already, download <a
          href="./Display.zip">the zip file containing all the code for the
          page</a>, look in <span class="filename">style-screen.css</span>,
          and tell how this effect was accomplished.  This is a <strong>Cool
          Thing</strong>.  Is it always a <strong>Good Idea</strong>?</li>

          <li>You can type any valid css values inside the text boxes.  For
          example, you can enter &ldquo;1px solid blue&rdquo; (without the
          quotes) as the border value for the images, but if you make a
          syntax error, such as putting a space between the &ldquo;1&rdquo;
          and the &ldquo;px&rdquo; nothing will happen until you fix the
          it.  Try &ldquo;1em&rdquo; for the div margins.  How much space is
          between the horizontal rules and the divs?  How much space is
          between the divs?  Why isn't there twice as much space between the
          divs as there is above the top one and below the bottom one? Now
          change the value to &ldquo;1em auto&rdquo; and the divs will
          become centered on the page again.  What are the values for
          margin-top, margin-right, margin-bottom, and margin-left when you
          did this?  Now go Firefox&rsquo;s Tools menu and open up the DOM
          Inspector for the page; open up the node tree on the left side so
          you can find the div with the id <code>imgHolder1</code> and click
          on it (you should see a red border flash around the top div on the
          web page); on the right side you should see the id and the style
          values that have been set dynamically for the div.  At the top of
          the right side you should see &ldquo;Object - DOM Node&rdquo;, and
          to the left of that a down-pointing arrow that you can click on to
          open up a menu; the bottom item on the menu is &ldquo;Javascript
          Object&rdquo;; click on that and you will get a tree with
          &ldquo;target&rdquo; as it&rsquo;s root.  Open up that tree and
          find the &ldquo;style&rdquo; subtree (third node down from the
          top).  Open up the style tree and you should find the string you
          entered (1em auto) as the value for &ldquo;margin&rdquo;.  Now
          scroll down the style tree and find the entries for the separate
          values for the top, bottom, left, and right margins.  What are
          their <em>names</em> and what are their <em>values</em>?</li> 

        </ol>
        </li>
        
        <li>The next step is to examine the <span
        class="fileName">display.js</span> file in the <span
        class="fileName">scripts</span> directory for the web page.  The
        following is a walkthrough of the code which (I hope) will give you
        enough understanding of Javascript so you can start writing your own
        based on it:
        <ul>

          <li>There are two kinds of comments in javascript:
          /*&nbsp;...&nbsp;*/ and //&nbsp;...&nbsp;.  The first kind can
          span multiple lines, and everything between the /* and the
          matching */ is a comment.  The second type applies only to single
          lines: everything after the // is a comment.  Comments are helpful
          for people to read, but they are totally ignored by the Javascript
          interpreter.  The purpose of them is to act as guides for other
          programmers so they can find their way around in the code
          easily.</li>

          <li>Not all browsers require you to declare variables before using
          them, but Internet Explorer does, so the first section of the file
          declares all the variables that are used in the program.  As the
          comments say, this would actually be a good programming practice
          even if no browsers required it; it helps catch typing errors if
          the browser checks for it.  In this code, I assigned each variable
          an initial value of <code>null</code>, which is just a special
          value that means &ldquo;no value&rdquo;.  It seems not to make a
          difference in Javascript whether variables are initialized or not,
          doing so helps catch still some common errors when using other
          programming languages, so I put it in as a matter of habit here. 
          These variables are declared and initialized as soon as the
          browser gets the <span class="fileName">display.js</span> file. 
          That is, when the browser finds the &lt;script&gt; tag in the head
          of the <span class="fileName">index.php</span> file.  The browser
          hasn't build the DOM tree at this point (it hasn't even gotten to
          the &lt;body&gt; tag yet), so there's no way to refer to the
          actual nodes in the DOM tree in this part of the script.</li>

          <li>Next come two function definitions, one named <span
          class="functionName">changeStyle</span>, and one named <span
          class="functionName">initialize</span>.  When the browser finds
          these sections of code, it saves everything between the matching
          curly braces that start on the line after the word function so the
          functions can be used later.  We'll come back to what these
          function do later.</li>

          <li>At the very end of the file there is a line,
          &ldquo;<code>window.onload&nbsp;=&nbsp;initialize;&rdquo;</code>. 
          Because this line is not inside a function definition, it gets
          processed by the browser as soon as it comes to it.  It could have
          been placed at the beginning of the file, along with the variable
          declarations, but I put it at the end so the code would refer to
          the <code>initialze</code> function only after it was defined. 
          This is another case (like initializing all variables) of my doing
          something because it&rsquo;s important in other languages, not in
          Javascript.

          <br />This line itself, however, is very important because it
          introduces Javascript&rsquo;s &ldquo;event handling&rdquo;
          mechanism.  The statement says the &ldquo;onload&rdquo; event is
          to be handled by running the <span
          class="functionName">initialize</span> function. The browser
          itself will cause the onload event to happen when it has finished
          processing the web page&rsquo;s body.  That is, when it has
          finished building the DOM tree (and displayed the page on the
          screen).  Thus, this line of code tells the browser to run the
          <span class="functionName">initialize</span> function as soon as
          the DOM tree for the page is ready.</li>
          
          <li>This brings us back to the definition of the <span
          class="functionName">initialize</span> function.  The purpose of
          the function is to set things up so that the <span
          class="functionName">changeStyle</span> function will be run every
          time the user clicks on a button or changes the value in a text
          field.  The code is very repetetive because the same things have
          to be done for all 12 radio buttons and all 4 checkboxes, and
          pretty much the same thing for the 6 text boxes.  Here's the first
          part of the function:

<div class="codeBlock">
<pre><code>
    imgHolder1        = document.getElementById( 'imgHolder1' );
    div1NoneButton    = document.getElementById( 'div1None'   );
    div1InlineButton  = document.getElementById( 'div1Inline' );
    div1BlockButton   = document.getElementById( 'div1Block'  );
    div1HideButton    = document.getElementById( 'div1Hide'   );

    div1NoneButton.onclick    = changeStyle;
    div1InlineButton.onclick  = changeStyle;
    div1BlockButton.onclick   = changeStyle;
    div1HideButton.onclick    = changeStyle;
</code></pre>
</div>

          The first line calls a function named <span
          class="functionName">getElementById</span> that is built into the
          Javascript language.  In this case the string
          &rsquo;imgHolder1&rsquo;, the value of the id attribute of the DOM
          element we are interested in, is being <span
          class="underline">passed as a parameter</span> to the function,
          which <span class="underline">returns a value</span> that is
          <span class="underline">assigned to the</span> imgHolder1 variable.
          The underlined phrases in the previous sentence are the
          technically accurate way to talk about what happens.  The second
          line makes the point that the name of the variable on the left side of the
          equal sign doesn&rsquo;t have to be the same as the string passed
          to the function; that just happened to be the case in the first
          line.
          
          <br />In the first five lines, the &ldquo;document.&rdquo; part
          says the <span class="functionName">getElementById</span> function
          is to operate over the whole document.  That is, it starts at the
          root of the DOM and searches for the tag with the id attribute we
          are interested in.  The next four lines use the same sort of
          mechanism you saw for getting the <span
          class="functionName">initialize</span> function called when the
          onload event occurred.  In this case, the code tells the browser
          to call the <span class="functionName">changeStyle</span> function
          whenver the user clicks on any of the four radio/checkbox buttons
          in the top row of the table.

          <br />If you look near the bottom of the <span
          class="functionName">initialize</span> function definition, you
          wll see that the text boxes are handled the same way as the radio
          buttons and checkboxes, except that the name of the event that
          triggers the call to <span class="functionName">changeStyle</span>
          is &ldquo;onchange&rdquo; instead of &ldquo;onchange&rdquo;.
          </li>

          <li>The very end of the <span
          class="functionName">initialize</span> function takes more time to
          explain properly than I want to do here.  Briefly, it creates two
          lists (arrays); one contains refrences to all the <code>img</code>
          tags in the page, and the other contains references to just those
          <code>div</code>s that are children of (inside of) the
          &ldquo;content&rdquo; <code>div</code>.</li>

          <li>Finally, the <span class="functionName">changeStyle</span>
          function is where the dyamic effects actually take place. 
          Whenever the user clicks on a radio button or checkbox, or changes
          the contents of one of the text areas, this function gets called
          and changes the style settings for the various elements in the
          lower part of the page based on the settings in the tables in the
          top part of the page.

<div class="codeBlock">
<pre><code>
    if (div1NoneButton.checked)   imgHolder1.style.display =    'none';
    if (div1InlineButton.checked) imgHolder1.style.display =    'inline';
    if (div1BlockButton.checked)  imgHolder1.style.display =    'block';
    if (div1HideButton.checked)   imgHolder1.style.visibility = 'hidden';
    else                          imgHolder1.style.visibility = 'visible';
</code></pre>
</div>

          These four statements use two different forms of Javascript&rsquo;s
          <code>if&nbsp;...&nbsp;else</code> statement to test the current
          states of the three radio buttons and one checkbox associated with
          the &ldquo;imgHolder1&rdquo; <code>div</code> and to set the style
          values for the display and visibility attributes accordingly.  The
          first three statements test which of the three radio buttons is
          checked and sets the display attribute to the proper string value.
          We know that exactly one of the three radio buttons will be
          checked because they are part of a radio group (all have the same
          name attribute), so exactly one of the three <code>if</code>
          statements will have an effect; there is no need for the
          <code>else</code> parts of these three statements.  The fourth
          <code>if</code> statement, however, has to assign one of two
          different strings to the visibility attribute depending on whether
          the checkbox is checked (true) or not (false).  The last
          <code>if</code> and the <code>else</code> are, together, a single
          statement that includes two assignment statements (two equal
          signs) inside it.

          <br />At the bottom of <span
          class="functionName">changeStyle</span> there are six <span
          class="underline">for loops</span> that assign margin, border, and
          padding strings to the images and divs in the lower part of the
          page.  Without explaining the code, I'll just tell you that the
          first loop is equivalent to the following code:
<div class="codeBlock">
<pre><code>
      img1.style.margin = imgMargin.value;
      img2.style.margin = imgMargin.value;
      img3.style.margin = imgMargin.value;
      img4.style.margin = imgMargin.value;
</code></pre>
</div>
          I used the loops because I was too lazy to type out all the
          separate assignment statements.  But being lazy has the added
          benefit that if I decided to add more images or take some out, I
          wouldn't have to change the script, only the xhtml in <span
          class="fileName">index.php</span>.
          </li>
        </ul>
        </li>
        
        <li>That&rsquo;s a lot of material to digest, so we&rsquo;ll return to
        this web page for more in-depth work in the next assignment.  For
        this assignment, your last requirement is to modify <span
        class="fileName">index.php</span> and <span
        class="fileName">display.js</span> so the user can change the
        margins, borders, and padding of the paragraphs immediately above
        and below the images.</li>
      </ol>
    </div>
    <h2>Submission</h2>
    <div class="whitebox">
      <h3>Due Date</h3>
      <p>December 6</p>

      <h3>Final Testing</h3>

      <p>The code you are going to submit is the same code that I prepared
      for you in the zip file that you downloaded, but with your changes for
      Step 3 above incorporated.  Be sure you have tested your changes
      completely to be sure it works, but also don't forget to double-check
      that both the XHTML and CSS validate with no errors and no warnings. 
      And be sure the Firefox Javascript console (which will be covered in
      class) doesn't show any errors either.</p>

      <h3>How to Submit</h3>

      <p>Once you have tested and validated your code completely, send me an
      email message with &ldquo;CS-081 Assignment 5&rdquo; as the Subject,
      with your name, 4-digit student ID number, and the pathname to your
      assignment directory in the message body.  Be sure you capitalize the
      pathname accurately, and start with your My Projects directory.  Put
      your answers to the questions in the body of your email message after
      your name and ID.  Just type (or paste) your answers into the message
      body.  Do <strong>not</strong> send me a Word or PDF document.</p>

    </div>
  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="../../../">Vickery Home</a>&nbsp;-&nbsp;
      <a href="../../">CS-081 Home</a>&nbsp;-&nbsp;
      <a href="../">Fall 2005 Home</a>&nbsp;-&nbsp;
      <a href="./index.php">Fall 2005 Assignments</a>&nbsp;-&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("Y-m-d", filemtime("Assignment_05.php"));
      ?>.</em>
    </p>
  </div>
</body>
</html>

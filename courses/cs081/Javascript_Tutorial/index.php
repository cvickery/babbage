<?php
  if (  array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml") )
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
  <title>Javascript Tutorial</title>

  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="css/style-screen.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="print"
        href="css/style-print.css"
  />

  <script type="text/javascript" src="scripts/javascript_tutorial.js">
  </script>

</head>

<body>
  <div id="header">
    <h1>Javascript Tutorial</h1>
    <p class="author">Christopher Vickery</p>

    <p class="page_quote">A little knowledge is a dangerous thing.
    <br />Ignorance is bliss.</p>
  </div>

  <div id="navBar">
    <ul id="navList">
    </ul>
  </div>
  <div id="content">

    <!-- Introduction -->
    <h2>Introduction</h2>
    <div class="whitebox">

      <p><span class="functionName">Javascript, </span> also known as <span
      class="functionName">ECMAscript, </span> is a widely used programming
      language that is available in such diverse applications as web
      browsers and Adobe Photoshop.  There are tons of books and web
      resources devoted to helping programmers work with Javascript, so why
      this web page?</p>

      <p>The answer is: to avoid those tons of books and web resources and
      to get you started using Javascript so you can add dynamic features to
      web pages as quickly and easily as possible.  As programming languages
      go, Javascript is not very complicated, and this page should be enough
      both to give you a reading knowledge of the language and to give you a
      good understanding of the fundamentals of how the language works.
      When you finish, you should  understand what Javascript code does if
      you see it, you should be able to write simple code on your own, and
      you should be able to take someone else&rsquo;s Javascript code and
      adapt it to your own needs.  At that point you might want to start
      tackling those tons of detailed reference material on the language
      that are available elsewhere.</p>

      <p>When you see a term that <span class="tech-term">looks like
      this</span>, it is defined in the <a
      href="#glossary">Glossary</a>.</p>

    </div>

    <!-- Javascript Elements -->
    <h2>Javascript Elements</h2>
    <div class="whitebox">

      <!-- Variables, Values, and Expressions -->
      <h3>Variables, Values, and Expressions</h3>
      <div class="whitebox">

        <p>Javascript code consists of <span
        class="tech-term">statements</span> that are <span
        class="tech-term">executed</span> by the Javascript <span
        class="tech-term">interpreter</span> that is built into virtually
        all web browsers (Internet Explorer, Firefox, Opera, Safari, ...).
        An <span class="tech-term">assignment statement</span> gives a <span
        class="tech-term">value</span> to a <span
        class="tech-term">variable</span>.  For example, here is an
        assignment statement that gives the numerical value 3 to a variable
        named <span class="variableName">sampleVariableName </span>:</p>

        <p class="codeBlock"> sampleVariableName = 3;</p>

        <p>As you can see, an assignment statement consists of a variable
        name on the left-hand side of an equal sign, a value on the
        right-hand side of the equal sign, and a semicolon at the end of the
        statement.</p>

        <p>Statements are executed sequentially.  For example, <span
        class="variableName">sampleVariableName </span> ends up with the
        value 7 after this code gets executed:</p>

        <p class="codeBlock"> sampleVariableName = 3;
 sampleVariableName = sampleVariableName + 4;</p>

        <p>With this example, you can also see that putting a variable on
        the right-hand side of the equal sign gets the current value of the
        variable, which can be used either alone or as part of an <span
        class="tech-term">expression</span> to compute the value that is
        assigned to the variable on left-hand side of the statement.</p>

        <p>Arithmetic expressions consist of any combination of add (+),
        subtract (-), multiply (*), and divide (/) operations applied to
        numbers and variables.  Use parentheses to control the order of
        evaluation.  For example, the expression 1 + 2 * 3 will do the
        multiplication before the addition, but you can force the addition to
        be done first using parentheses: (1 + 2) * 3. That is, the value of
        1+2*3 is 7, but the value of (1+2)*3 is 9.</p>

        <p>There is a logical sequence controlling what you can do with a
        variable: before you use it in an expression you have to give it a
        value, and before you give it a value, you have to <span
        class="tech-term">declare</span> it.  You declare a variable using
        the <span class="keyword">var</span> <span
        class="tech-term">keyword</span>.  You can combine the declaration
        with the assignment of an initial value:</p>

        <p class="codeBlock"> var sampleVariableName = 0; </p>

        <p>As you might guess, you can&rsquo;t use a keyword as a variable
        name:</p>

        <p class="codeBlock"> var var = 0; // Won't work!</p>

        <p>Aside from not using keywords, there are a few rules for how you
        make up variable names: they are case sensitive, so that <span
        class="variableName">sampleVariableName </span> is different from
        <span class="variableName">SampleVariableName, </span> they can have
        digits in them (<span class="variableName">first20</span>, for
        example), but the digits can&rsquo;t be at the beginning.  Other
        than letters and digits the only other character you can use in a
        variable name is the underscore character ( _ ).  No spaces, no
        punctuation.  And it&rsquo;s not a rule of the Javascript language,
        but it will make everyone&rsquo;s life a lot easier (including your
        own) if you use meaningful names for your variables.</p>

        <p>The &ldquo;//&rdquo; in the previous example starts a <span
        class="tech-term">comment</span>.  Comments are messages you put in
        your code for people to read (to help them understand what&rsquo;s
        going on), but they are ignored by the Javascript interpreter.  If
        you want a comment to span multiple lines, put them inside /* ... */
        instead of starting with //.</p>

        <p>In addition to numbers, Javascript includes <span
        class="tech-term">string</span> values.  Strings are simply
        sequences of characters surrounded by quotation marks.  Unlike many
        other programming languages, it doesn&rsquo;t matter whether you use
        single or double quotes around a string as long as the beginning and
        ending quotes match each other:</p>

        <p class="codeBlock"> var aVariable = 120 + 3;
 aVariable = "123";
 aVariable = '123';
 aVariable = '1' + 2 + "3";
 aVariable = '';
 aVariable = "Don't touch that button!";</p>

        <p>The first statement declares <span class="variableName">aVariable
        </span> and assigns it a numerical value of 123.  The next three
        statements assign a string value to the variable consisting of the
        three characters '1', '2', and '3'. The first two strings illustrate
        that you can use either single or double quotation marks.  The third
        one shows several things: you can combine strings that were defined
        using either type of quotes, you can use + to connect strings
        together (&ldquo;concatenate&rdquo; them), and if you concatenate a
        numerical value (2, in this case) with a string value, the number is
        automatically converted to a string for you.  That is, the + in the
        first line adds two numerical values to give the number 123, but the
        two +'s in the fourth line concatenate three strings to give the
        string value &ldquo;123&rdquo;.  The fifth line shows that you can
        have a string with no characters in it.  The last line shows that
        you can put a single quote inside a string that is surrounded by
        double quotes. (The other way around works too.)</p>

      </div>

      <!-- Functions -->
      <h3>Functions</h3>
      <div class="whitebox">
        <p><span class="tech-term">Functions </span> are statements that get
        executed as a group.  You define a function using the <span
        class="variableName">function </span> keyword:</p>

        <p class="codeBlock"> function sampleFunction()
 {
   var a = 3;
   var b = 4;
   return a + b;
 }</p>

        <p>The first line consists of the <span
        class="variableName">function </span> keyword, the <span
        class="tech-term">name</span> of the function (<span
        class="functionName">sampleFunction </span>), and a pair of
        parentheses.  The group of statements that make up the function are
        enclosed in curly braces.  Functions may include a <span
        class="variableName">return </span> statement, and return statements
        may include a value that is returned by the function.  You can get
        the function to execute by <span class="tech-term">calling</span> it
        as part of an expression:</p>

        <p class="codeBlock"> aSampleVariableName = sampleFunction() + 2;</p>

        <p>In this example, the function returns the value 7, which gets
        added to 2, and the value 9 gets assigned to <span
        class="variableName">aSampleVariableName. </span></p>

        <p>Some functions don&rsquo;t return a value, or they return a value
        that is irrelevant to the logic of your code.  In those cases, the
        function call alone is a complete statement, without any assignment
        (equal sign) involved.  For example, there is a function built into
        Javascript named <span class="variableName">alert</span> that
        displays a message on the screen, but doesn&rsquo;t return a value.
        It could be called like this:</p>

        <p class="codeBlock"> alert( "This is a sample message" );</p>

        <p>This example illustrates the other key thing about functions: you
        can pass <span class="tech-term">parameters</span> to functions.  In
        this case, a string parameter is being passed to the <span
        class="functionName">alert()</span> function.  The statements inside
        the <span class="functionName">alert </span> will cause a message
        window to pop up with the parameter value displayed in it.</p>

        <p>Here is the definition of a function that receives two parameters
        and returns their sum:</p>

        <p class="codeBlock"> function sum( a, b )
 {
    return a + b;
 }</p>

        <p>Here are two calls to this function.  What value does each one
        assign to <span class="functionName">ans </span>? <br />Move your
        mouse over the code to see if you are right:</p>

        <p class="codeBlock question"> ans = sum(120, 3);</p>
        <p class="answer">This statement assigns the <em>number</em> 123 to
        <span class="variableName">ans. </span></p>

        <p class="codeBlock question"> ans = sum('12', '3');</p>
        <p class="answer">This statement assigns the <em>string</em> "123"
        to <span class="variableName">ans</span>.  Remember: + adds numbers,
        but it concatenates strings.</p>

        <p>(This distinction between numbers and strings may seem a bit
        obscure at this point, but it will be critical for getting many
        dynamic effects to work.)</p>

        <p>One of the reasons there is so much published material on
        Javascript is that there are many, many predefined functions built
        into Javascript, and documenting them all takes a lot of words.
        Fortunately, you don&rsquo;t really need to know a lot of them to
        get started, and a few of them will be covered below.</p>

      </div>

      <!-- Objects -->
      <h3 id="objects">Objects</h3>
      <div class="whitebox">

        <p>The last element of Javascript we consider is the <span
        class="tech-term">object. </span>  Normally you will be working with
        objects that the browser has already created, but here&rsquo;s an
        example of one way to create a simple object:</p>

        <p class="codeBlock">var obj = new Object();
 obj.a = 3;
 obj.b = 4;
 obj.fun = function()
 {
   return this.a+this.b;
 };
 alert(obj.fun());</p>

        <p>Here&rsquo;s what is going on: the first line creates a new
        object and gives a <span class="tech-term">reference</span> to the
        object to a variable named <span class="variableName">obj. </span>
        The keyword <span class="keyword">new </span> tells Javascript
        to allocate some memory for this object.  There are other things
        Javascript can create using <span class="keyword">new, </span>
        but for now we are looking only at the one named <span
        class="variableName">Object, </span> which must be capitalized and
        spelled exactly as shown.  The parentheses at the end are necessary,
        too.</p>

        <p>The next two lines create two new variables in the object
        referenced by <span class="variableName">obj. </span>  Note that a
        dot separates the reference to the object from the variable inside
        the object.  Other than that, variables inside objects are just like
        regular variables: they can appear on either the left or right side
        of assignment statements, and they can hold numbers, strings, or any
        of the other types of value that we haven&rsquo;t talked about
        yet.</p>

        <p>There are a couple of things to note about variables inside
        objects: the first is that you do not use <span
        class="keyword">var </span> when you want to create one, you
        just assign an initial value to it and it gets created
        automatically.  The second item is of interest primarily if you
        already know another programming language, and it&rsquo;s that in
        Javascript you don&rsquo;t have to declare what variables an object
        is going to contain ahead of time.  Just pick a name, assign a value
        to it, and it gets created.</p>

        <p>The fourth through seventh lines show how you can put a function
        inside an object.  Technically, the function is separate from the
        object and the object variable (<span class="variableName">fun
        </span> in this case) holds a reference to it, but that&rsquo;s not
        a key concept at this point.  What is important is to note that the
        function doesn&rsquo;t have a name. Remember, when defining a
        function, you usually put the keyword <span
        class="variableName">function</span>, followed by the name of the
        function, followed by the parentheses.  Finally, note that inside
        the function, the variables in the object can be referenced using
        the special object name, <span class="keyword">this</span>. (Yes,
        you could also refer to the variables as <span
        class="variableName">obj.a </span>and <span
        class="variableName">obj.b</span>, but that would take away one of
        the things you can do with object, so using <span
        class="variableName">this</span> is normally better.</p>

        <p onmouseover="showAlert(7)">Finally, the example shows the
        object&rsquo;s function being called from inside an <span
        class="functionName">alert()</span> function call.  What do you
        think happens when this code is run? <span
        class="notforprint">(Mouse over this paragraph to see.)</span></p>

        <p class="answer notforscreen">The <span
        class="functionName">alert </span> function will put a message box in
        the middle of the screen.  In this case, it will look like this:</p>

        <div class="answer center notforscreen"><img
        src="images/alert_showing_7.png" alt="alert box with 7 in it"
        /></div>

      </div>

      <!-- Arrays -->
      <h3>Arrays</h3>
      <div class="whitebox">

        <p><span class="tech-term">Arrays</span> are programmer talk for
        lists of things.  The &ldquo;things&rdquo; in an array can be
        numbers, strings, references to functions, references to objects, or
        even references to other arrays.  We&rsquo;re interested in them
        primarily because they can be used to hold lists of DOM objects. But
        first, here is a way to create an array of numbers:</p>

        <p class="codeBlock"> var anArray = new Array(5, 10, 15, 20);
 anArray[10] = 25;</p>

        <p>If this code reminds you of the way we created an object earlier,
        it&rsquo;s because arrays are actually a special form of object, one
        that uses <span class="tech-term">subscripts</span> instead of
        names to select items in the array.  The first line declares the
        variable named <span class="variableName">anArray</span>, creates a
        new array, and fills the first four elements of the array with four
        numbers. The second line shows another way to add elements to an
        array: follow the name of the array with square brackets, and put a
        number between them to tell which element you want to assign a value
        to.</p>

        <p class="question">Open up the Firebug extension, (press F12 if the
        Firebug panel is not already showing), and type in the two lines
        above.  Actually, you have to omit the <span
        class="keyword">var</span> keyword from the first line because
        Firebug will create the variable for you automatically.  What does
        Firebug display after you enter the first line?</p>

        <p class="answer codeBlock"> [5,10,15,20]</p>

        <p class="question">Firebug is showing you a list of all the values
        in the array, separated by commas.  After typing the second line,
        which assigns the value 25 to element number 10 of the array, type
        the name of the array and see what Firebug displays.</p>

        <p class="codeBlock answer">It will look sort of like this:
[5,10,15,20,undefined,undefined,undefined,undefined,undefined,undefined,25]</p>

        <p>  The first four elements are the numbers that were put in the
        array when it was created, and the last one is the value that was
        added using the assignment statement.  But what do all those
        &ldquo;undefineds&rdquo; mean?  When you initialized the array, you
        supplied four values, which automatically went into the first four
        positions of the array.  But when you added the value 25, you
        explicitly put it into position 10, skipping over six positions,
        which now show up as &ldquo;undefined,&rdquo; meaning they exist,
        but do not have values yet.</p>

        <p class="question">Before going further, count the number of values
        in the array.  How many are there?</p>

        <p class="answer">Eleven</p>

        <p>Array subscripts are numbered starting with zero.  So the first
        four elements of the array have subscript numbers 0, 1, 2, and 3.
        When you put a value into <span class="variableName">anArray[10],
        </span> you were putting it into the position numbered ten, but
        that&rsquo;s the eleventh position.  (The position <em>numbered
        zero</em> is the <em>first position</em>.)</p>

        <p>In addition to the elements of an array that you access using
        subscripts, every array object has a named element that tells how
        many elements are in the array. The name of this element is <span
        class="variableName">length.</span> Use Firebug to show you the
        value of <span class="variableName">anArray.length; </span>it should
        show you the number 11.</p>

        <p class="question">Experiment with arrays and subscripts: Put the
        string <span class="codeSnippet">'hello'</span> into element number
        8 and be sure you get the same value back when you refer to it.  (Be
        sure you put quotes around the string.)  How did this affect the
        length of the array?  What does Firebug show if you type the name of
        the array now?</p>

        <p class="answer">The length of the array didn&rsquo;t change.  That
        only happens when you add an element beyond the end of the array.
        So the array contents now show: the numbers 5, 10, 15, 20, four
        undefined values, the string &ldquo;hello&rdquo;, another undefined
        value, and the number 25.</p>

        <p>Experiment some more by adding more elements, both numbers and
        strings, and put some of them both inside and beyond the end of the
        array.  Verify that you can get back whatever you put into an array
        element, and that <span class="variableName">anArray.length </span>
        always shows you the correct value.   (For really large subscript
        numbers this might break down; feel free to experiment.)</p>

        <p class="question">One more point: just like regular variables,
        array elements can have their values changed by putting them on the
        left-hand side of an assignment statement.  For example, which
        happens if you type this command into Firebug: <span
        class="codeSnippet"> anArray[1] = 'ten' </span>?</p>

        <p class="answer">It changes the value of that array element from
        the number 10 to the string &ldquo;ten.&rdquo;</p>

      </div>

      <!-- Loops -->
      <h3>Loops</h3>
      <div class="whitebox">

        <p>Arrays are useful because you can write a single piece of
        Javascript code that does the same thing to each element of an array
        instead of writing a separate piece of code to handle each item.
        For example, if you have the numbers 5, 10, 15, and 20 in the
        variables <span class="variableName">a</span>, <span
        class="variableName">b</span>, <span class="variableName">c</span>,
        and <span class="variableName">d </span> and want to know their sum
        (and don&rsquo;t already know that it&rsquo;s 50!), you could write
        something like: <span class="codeSnippet">
        var&nbsp;sum&nbsp;=&nbsp;a&nbsp;+&nbsp;b&nbsp;+&nbsp;c&nbsp;+&nbsp;d;</span>.
        But if those four values were in the first four elements of an
        array, you could use the following code to do the same thing:</p>

        <p class="codeBlock"> var sum = 0;
 for (var i = 0; i &lt; anArray.length; i++)
 {
    sum = sum + anArray[i];
 }</p>

        <p>There are two main kinds of loops in Javascript: <span
        class="functionName">for </span> loops and <span
        class="functionName">while </span> loops.  As you might guess from
        looking at the code, this is a <span class="functionName">for
        </span> loop, which works very well with arrays.</p>

        <p>The second line of code controls the <span
        class="functionName">for </span>loop.  That line sets up the loop,
        and all the lines between the curly braces get executed repeatedly,
        once per loop <span class="tech-term">iteration</span>.  The
        variable named <span class="variableName">i </span> is the <span
        class="tech-term">loop control variable</span>.  Before the first
        iteration, <span class="variableName">i </span> gets assigned the
        value zero.  Before each iteration (including the first) <span
        class="variableName">i </span> is checked to see if it is less than
        the length of <span class="variableName">anArray </span> (<span
        class="codeSnippet">&nbsp;i&nbsp;&lt;&nbsp;anArray.length&nbsp;</span>),
        and if it is, the loop body is executed.  At the end of each
        iteration, <span class="variableName">i </span> is incremented by 1
        (<span class="codeSnippet">&nbsp;i++&nbsp;</span>), and the loop
        starts over.</p>

        <p class="question">In this example, the loop will be executed four
        times: the first time <span class="variableName">i </span> will have
        the value 0, and <span class="variableName">anArray[0]</span> will
        be added to <span class="variableName">sum. </span> The second time
        <span class="variableName">i </span> will have a value of 1, so
        <span class="variableName">anArray[1]</span> will be added to <span
        class="variableName">sum. </span>  What value will be in <span
        class="variableName">sum </span>at this point?</p>

        <p class="answer">The variable <span class="variableName">sum
        </span> will have the number 15 in it: the initial value assigned to
        it was 0, and at this point the numbers 5 and 10 will have been
        added to it.</p>

        <p>Note that you will get an error if you try to add undefined or
        string values in your loop.  There are ways to test whether a
        variable is a string, a number, or undefined, but we won&rsquo;t
        look at that here.</p>

      </div>

    </div>

    <!-- When Code Runs -->
    <h2>When Code Runs</h2>
    <div class="whitebox">

      <p>So far, we have been looking at isolated snippets of Javascript
      code.  The natural question at this point is, &ldquo;how does this
      code get run?&rdquo;  The simplistic answer is that the
      browser&rsquo;s Javascript unit processes all Javascript statements as
      soon as the browser encounters them.  But to understand that
      simplistic answer we need to cover the concepts of how and when
      Javascript code gets to the browser.</p>

      <!-- Script Tags -->
      <h3>Script Tags</h3>
      <div class="whitebox">

        <p>All Javascript code associated with a web page is either inside
        the web page itself or in a separate file.  In either case, you use
        <span class="codeSnippet">&lt;script&gt;</span> tags to separate the
        Javascript code from the rest of the web page.  Consider the
        following two &lt;script&gt; tags:</p>

        <p class="codeBlock"> &lt;script type="text/javascript"&gt;
 var aVar = 3;
 &lt;/script&gt;

 &lt;script type="text/javascript" src="scripts/myscript.js"
 &lt;/script&gt;</p>

        <p>Both pieces of code could be put any place in a web page; either
        inside the &lt;head&gt; or the &lt;body&gt; sections of the
        document.  The first example shows a Javascript statement inside the
        script element, and the second one shows how to refer to a separate
        file that contains Javascript code.  In general, it is better to put
        all your Javascript code in a separate file because it helps
        organize your web pages better.  But there is no difference between
        the two techniques as far as how the Javascript code gets
        processed.  This tutorial shows code inside &lt;script&gt; tags to
        make the examples more self-contained.</p>

        <p>Note that both &lt;script&gt; tags include a <span
        class="variableName">type</span> attribute with a value of
        &ldquo;text/javascript.&rdquo;  This is a required attribute (the
        page will not validate without it) that is used to tell the browser
        that the script statements are written in Javascript instead of some
        other scripting language.  Note also that the second example seems
        to be a case where a self-closing script tag would make sense:</p>

        <p class="codeBlock"> &lt;script type="text/javascript" src="scripts/myscript.js" /&gt; </p>

        <p>However, Internet Explorer (including IE7) ignores the script if
        you do not use a separate closing &lt;/script&gt; tag.</p>

        <p>Here is the sequence of what happens: the user clicks on a link
        or types a URL into the browser&rsquo;s address bar, and the browser
        sends a request for a web page to a web server.  The server sends a
        reply to the browser, which consists of the text of the web page
        requested by the user, possibly modified by one or more server-side
        scripts (PHP, for example).  If the text of the web page includes any
        &lt;img&gt; or &lt;script&gt; tags, the browser makes additional
        requests to the server to obtain the image and/or script files.  In
        the case of &lt;script&gt; tags without a <span
        class="variableName">src</span> attribute, the browser gets the
        Javascript code from within the web page itself instead getting a
        separate file from the server.  The browser may obtain any number of
        pieces of Javascript code from within &lt;script&gt; tags and/or
        external files, and it processes each piece of code as it encounters
        it.</p>

        <p>&ldquo;Processing a piece of code&rdquo; means two different
        things: Statements that appear outside of any function definition
        are executed immediately, but function definitions are saved so they
        can be executed later.</p>

        <p class="codeBlock"> &lt;script type="text/javascript"&gt;
  var a = 3;
  function fun ()
  {
    var b = a + 4;
    alert(c + b);
  }
  var c = 5;
 &lt;/script&gt;</p>

        <p>Don&rsquo;t attach too much significance to this block of code;
        it doesn&rsquo;t do anything realistic.  But it shows two variables
        being declared outside of any function definition ( <span
        class="variableName">a </span>and <span class="variableName">c
        </span>), and another variable ( <span class="variableName">b
        </span>) being defined inside the function named <span
        class="functionName">fun() </span>.  The first and last statements
        will be executed by the browser&rsquo;s Javascript processor as
        soon as it encounters them in the stream of information coming from
        the browser.  But the definition of <span class="functionName">fun()
        </span> will not be executed.  Rather, this definition will be saved
        in the Javascript processor&rsquo;s memory so that it can be
        executed at some later time.</p>

        <p>Note that there is a reference to the variable named <span
        class="variableName">c </span> inside the function, but that <span
        class="variableName">c </span> doesn&rsquo;t get defined until after
        the function definition.  You cannot cannot use a variable before it
        has been defined and has an initial value assigned to it.  But there
        is no problem in this example because <span
        class="functionName">fun() </span> is not actually executed
        (it&rsquo;s only defined) before the declaration and assignment of
        an initial value to <span class="variableName">c </span> takes
        place.  The question, then, is how to get a function to execute?  To
        answer that, we have to look at <span
        class="tech-term">events</span>.</p>

      </div>


      <!-- Events -->
      <h3>Events</h3>
      <div class="whitebox">

        <p>There are two ways to get a function to execute.  The first is to
        call it from another statement.  If that statement is inside a
        function definition, we are left with the question of how the
        calling function got called.  But if the call is outside of any
        function, the call takes place when the browser first comes to the
        statement that makes the call:</p>

        <p class="codeBlock"> &lt;script type="text/javascript"&gt;
  function funny(arg1, arg2)
  {
    return arg1 + (arg1 * arg2);
  }
  var c = funny(3, 2);
 &lt;/script&gt;</p>

        <p>The first four lines of the script define the function <span
        class="functionName">funny()</span>, and the fifth line immediately
        calls it, assigning an initial value of 9 to <span
        class="variableName">c </span>.</p>

        <p>The second way a function gets called is the more interesting
        one: the Javascript processor can be told to automatically call
        functions when events happen.  Almost all the events we are
        interested in happen when the user does something: clicks on a link,
        clicks on a submit button for a form, mouses over a paragraph,
        changes the value of a text field, etc.  But there is one event that
        is critically important and which has nothing to do with the user
        interacting with the web page.  It&rsquo;s called the <span
        class="tech-term">onload</span> event:</p>

        <p class="codeBlock"> &lt;script type="text/javascript"&gt;
  function init()
  {
    alert('init was called');
  }
  window.onload = init;
  alert('onload was set up');
 &lt;/script&gt;</p>

        <p>You might find it easier to understand what is going on if you
        actually put this code in a web page and see what happens when you
        view the page. (Remember, &lt;script&gt; tags can go pretty much
        anywhere, but inside the &lt;head&gt; of the page is the
        &ldquo;normal&rdquo; place.)</p>

        <p>The first thing to note is that the two <span
        class="functionName">alert()</span> function calls will be executed
        in the opposite order from the sequence in which they appear.  The
        second one appears outside any function definition, so it gets
        executed as soon as the browser get to it while reading in the web
        page.  The first one gets executed when the <span
        class="functionName">init() </span> function gets called, which is
        after the browser has gotten the entire web page from the server
        (including all images and script files), has completely built the
        DOM tree in memory, and has rendered the page in the browser
        window.</p>

        <p class="question">The key to all this is the <span
        class="codeSnippet">&nbsp;window.onload=init;&nbsp;</span>
        statement. When does this statement gets executed?</p>

        <p class="answer"> It is outside of any function definition, so it
        gets executed as soon as the browser encounters it.  That is, before
        the web page has been completely read in by the browser, before the
        DOM tree has been built, and before the web page has been drawn on
        the screen.</p>

        <p class="question">What is <span
        class="variableName">window.onload</span>?</p>

        <p class="answer">Because of the dot in the middle, we know that
        <span class="variableName">window </span> is an object (technically,
        it is a reference to an object), and <span
        class="variableName">onload </span> is the name of a variable inside
        the <span class="variableName">window</span> object.</p>

        <p>If this point doesn&rsquo;t make sense to you, you need to review
        the section on <a href="#objects">Objects</a> earlier in this
        tutorial.</p>

        <p>Look at the value being assigned to <span
        class="variableName">window.onload </span>.  If the right-hand side
        had said <span class="codeSnippet">init()</span>, the function
        <span class="functionName">init() </span> would have been called,
        and the value it returned would have been assigned to <span
        class="variableName">window.onload</span>.  Since <span
        class="functionName">init() </span> doesn&rsquo;t return a value
        (there is no <span class="variableName">return</span> statement in
        the function), this cannot be what is happening.  Rather, the
        function name alone, without the parentheses, is a <span
        class="tech-term">reference</span> to the function, and that
        reference is what is getting saved in the <span
        class="variableName">window.onload </span>variable.  The usual way
        to talk about this sort of thing is to say that after the
        assignment, &ldquo;<span class="variableName">window.onload </span>
        points to the <span class="functionName">init()</span>
        function.&rdquo;</p>

        <p>What happens is this: after the browser has built the DOM tree
        and rendered the page (<em>i.e.</em>, after the page has
        &ldquo;completely loaded&rdquo;) the browser looks in the <span
        class="variableName">window </span>object to see if the value of its
        <span class="variableName">onload</span> variable has been assigned
        a value.  If so, as is the case in this example, the browser calls
        the function pointed to by the variable.  Our <span
        class="functionName">init()</span> function gets called, and the
        second alert message pops up.</p>

        <p>The <span class="variableName">window.onload </span>variable is
        special because the browser automatically looks there to see if it
        has been initialized with the name of a function to be called.</p>

        <p class="question">What happens if the statement <span
        class="codeSnippet"> window.onload&nbsp;=&nbsp;init;</span> is
        changed to <span class="codeSnippet">
        window.xyz&nbsp;=&nbsp;init;</span>?</p>

        <p class="answer">Javascript will create a new variable named <span
        class="variableName">xyz </span>in the
        <span class="variableName">window </span>object and put the
        reference to <span class="functionName">init()</span> in that
        variable.  However, <span class="functionName">init()</span> will
        never get called because the browser looks in <span
        class="variableName">window.onload </span> rather than in <span
        class="variableName">window.xyz </span> to see if there is a
        function to call.</p>

        <p>You can also get the browser to call functions when the user
        causes events to happen.  The kinds of events we are talking about
        involve using the mouse or keyboard to interact with the web page.
        For example, moving your mouse over the previous question caused the
        answer to appear after it.  This was done by writing a Javascript
        function that knows how to cause a hidden paragraph to be displayed
        and connecting that function to the previous paragraph&rsquo;s <span
        class="variableName">onmouseover</span> variable.</p>

        <p>Here are the names of some user events that can be defined for a
        node in the DOM tree: <span class="variableName">onmouseover </span>
        (when the user moves the mouse over the element on the page), <span
        class="variableName">onmouseout </span> (when the user moves the
        mouse away from the element), <span class="variableName">onclick
        </span> (when the user points to an element on the page and clicks a
        mouse button - for Internet Explorer 6, the element has to be a
        &lt;button&gt;), <span class="variableName">onkeypress </span> (when
        the user presses a key on the keyboard), <span
        class="variableName">onkeyrelease</span> (when the user releases a
        key on the keyboard), <span class="variableName">onchange</span>
        (when the user changes the value of an element, such as the state of
        a checkbox or radio button or the text in a text box).  The list is
        longer than this, but you can see that just about anything the user
        might do with the mouse or keyboard can cause an event, and thus can
        cause a function to be called.</p>

        <p>You might infer from some of the events listed in the previous
        paragraph that the function that gets called when an event happens
        might want to know more about the event than simply that it
        occurred.  For example, if the user presses a key, which key was
        pressed?  If the user clicked a mouse button, which one was clicked?
        Or, in the case of this tutorial, if the user moves the mouse over a
        paragraph, which paragraph?  This sort of information is
        automatically passed to the function connected to the event in an
        object called an <span class="tech-term">event object.</span> 
        Unfortunately, different browsers make the event object available to
        the function in different ways. Most browsers simply pass a
        reference to the event object as a parameter when the function is
        called.  But Internet Explorer makes it available as a variable
        named <span class="variableName">window.event</span>.  If you look
        at the <a href="scripts/javascript_tutorial.js">Javascript source
        code for this tutorial</a>, one of the complexities you will see is
        the rather obscure code at the beginning of the event handling
        functions to figure out where the event object is.</p>

        <p id="experiment">Here is an experiment for you to try right now:
        this paragraph has an <span class="variableName">id </span>
        attribute with a value of <span
        class="variableName">'experiment'</span>.  Use Firebug to get a
        reference to it: <span class="codeSnippet">
        x&nbsp;=&nbsp;document.getElementById('experiment')</span>.  Then
        connect my <span class="functionName">hideAnswer() </span> function
        to its <span class="variableName">onmouseover </span> variable:
        <span class="codeSnippet">
        x.onmouseover&nbsp;=&nbsp;hideAnswer</span>.  Now move the mouse
        over the paragraph, and what happens?</p>

        <p>This paragraph should now disappear when you move the mouse over
        the previous one.</p>

        <p>If you want to be sophisticated, you can eliminate the variable <span
        class="variableName">x</span> and just type:</p>
        
        <p class="codeBlock"> document.getElementById.('experiment').onmouseover&nbsp;=&nbsp;hideAnswer</p>

        <p>The code for this tutorial also includes a function named
        <span class="functionName">showAnswer()</span>.  You should be able
        to connect <span class="functionName">showAnswer()</span> to the <span class="variableName">experiment </span>
        paragraph&rsquo;s <span class="variableName">onmouseout</span>
        variable name to get the paragraph above to reappear when you move
        your mouse into and out of the <span class="variableName">experiment
        </span> paragraph.</p>

      </div>

      <h3>Events and Forms</h3>
      <div class="whitebox">

        <p>In many cases, an easy way to connect a Javascript function to an
        event is to put some Javascript code in the xhtml tag you want to
        deal with.  This approach is not ideal because it intermixes
        Javascript functionality with the xhtml structuring, the same way
        that it is not wise to intermix xhtml and css.  Nevertheless, you
        are very likely to see this approach used to connect a function to
        the Submit button of a form:</p>

        <p class="codeBlock"> &lt;form method="get"
       action="http://babbage.cs.qc.edu/courses/cs081/Form_Script.sh"&gt;
   &lt;input type="password" id="pass" name="pass" /&gt;
   &lt;input type="submit" onclick="return verifyFormData()" /&gt;
 &lt;/form&gt;</p>

        <p>This example assumes you defined a function named <span
        class="functionName">verifyFormData()</span>, probably in an
        external file with the rest of your Javascript code for the page.
        When the user clicks on the Submit button, your function will be
        called.  The key concept here (aside from the fact that the function
        gets called) is that the value returned by the function determines
        whether the form actually gets submitted or not.  Note that the
        Javascript code connected to the <span class="variableName">onclick
        </span> event must include the keyword <span
        class="variableName">return </span> in order to pass the <span
        class="keyword">true </span> or <span class="keyword">false </span>
        value returned by the function back to the browser so it (the
        browser) can tell whether to actually submit the form to the server
        or not.  If the function returns <span class="keyword">true</span>,
        the browser will submit the form, but if the function returns false,
        the browser will not submit the form.  For example, here is a
        version of <span class="functionName">verifyFormData() </span> that
        checks a password typed by the user in a silly way:</p>

        <p class="codeBlock"> function verifyFormData()
 {
   var passwd = document.getElementById('pass');
   if ( passwd.value == 'secret' )
   {
      alert('Right, \'secret\' is the password.');
      return true;
   }
   else
   {
      alert('Wrong, \'' + passwd.value + '\' is not \'secret\'.');
      return false;
   }
 }</p>

      <p>You can try it here:</p>

      <form method='get'
            action="http://babbage.cs.qc.edu/courses/cs081/Form_Script.sh"
            id="theForm">
        <input type="password" id="pass" name="pass"/>
        <input type="submit" />
      </form>

      <p>There is a lot to learn from that little example.  The first thing
      to note is that the code inside the submit button is like a small
      function definition (but with no function name).  That is why you have
      to put in a <span class="variableName">return </span> statement to get
      the result of the <span class="functionName">verifyFormData() </span>
      function (<span class="keyword">true </span> or <span
      class="keyword">false</span>) returned to the browser to control
      whether the form actually gets submitted or not.</p>

      <p>The next thing to note is how the Javascript code gets a reference
      to the the password text box object by calling the <span
      class="variableName">document</span>.<span
      class="functionName">getElementById()</span> function.  That function
      returns a reference to an Object that represents one node in the DOM
      tree.  We will look at some of the functions that are available for
      working with the DOM tree below.  For now, you should be able to
      understand that the parameter being passed to this function is a
      string representing the <span class="variableName">id</span> attribute
      of the &lt;input&gt; tag we are interested in.  The trick, then, is to
      know that you can get a copy of what the user typed into the password
      box by referring to the element&rsquo;s variable named <span
      class="variableName">value</span>.  But that raises the next point
      ...</p>

      <p>After the call to <span
      class="functionName">getElementById()</span>, the <span
      class="functionName">verifyFormData()</span> function uses an <span
      class="variableName">if</span> statement to decide which value to
      return.  The general form of an <span class="variableName">if</span>
      statement is <span class="codeSnippet">if (<span
      class="functionName">condition </span>) { <span
      class="functionName">true part </span> } else { <span
      class="functionName">false part </span> }</span>. This tells
      Javascript to decide whether <span class="functionName">condition
      </span> is <span class="keyword">true</span> or <span
      class="keyword">false</span>.  If it is <span
      class="keyword">true</span>, the statement(s) between the curly braces
      marked <span class="functionName">true part </span> get executed.  But
      if <span class="functionName">condition</span> is <span
      class="keyword">false</span>, the statements between the curly braces
      marked <span class="functionName">false part </span> get executed
      instead.  The <span class="variableName">else</span>, the curly braces
      that follow it, and the entire <span class="functionName">false part
      </span> can be left out if they are not needed.  In this example, we
      used <span class="variableName">==</span> to test if two strings are
      equal to each other. (That&rsquo;s <em>two</em> equal signs right next
      to each other; using just one equal sign would make Javascript <span
      class="tech-term">assign</span> the value <span
      class="codeSnippet">'secret'</span> to <span
      class="variableName">passwd.value</span>, which is not what we want to
      do.) Other <span class="tech-term">relational operators</span> include
      <span class="variableName">!= </span>(not equal), <span
      class="variableName">&lt; </span>(less than, which used for comparing
      numbers), <span class="variableName">&gt; </span>(greater than), <span
      class="variableName">&lt;= </span>(less than or equal), and <span
      class="variableName">&gt;= </span>(greater than or equal).</p>

      <p>The example also shows how you can put an apostrophe inside a
      string.  Since an apostrophe would normally mark the end of the
      string, the special &ldquo;escape character&rdquo; (backslash, <span
      class="variableName">\</span>) is used to tell Javascript that the
      next character is to be treated as part of the string, not as the
      apostrophe that ends it.  As mentioned earlier, unlike many other
      languages, Javascript does not differentiate between single and double
      quotes so long as the type of quote used to start a string is the same
      as the type of quote used to end it.  As a result, if you start a
      string with one type of quote, you can include the other kind inside
      it without using any backslashes.  For example, the first <span
      class="functionName">alert()</span> call could have been written:</p>

      <p class="codeBlock"> alert("Right, 'secret' is the password.");</p>

      <p>Unfortunately, although it works, making that change doesn&rsquo;t
      make the message any less silly.</p>

      <p>This way of connecting a Javascript function to an event, such as
      clicking on a button, is perfectly all right, and very commonly used. 
      But just as we prefer to separate presentation (css) from content
      (xhtml), we also prefer separating dynamic effects (Javascript) from
      the xhtml of a web page.  Doing so makes the code (both the xhtml and
      the Javascript) easier to read and understand.  And it allows the
      possibility of easily reusing Javascript code in different web pages
      without having to copy it from one xhtml document to another.  So,
      here is a better way to implement the same functionality as shown
      above:</p>

      <p>First of all, we will use the same <span
      class="functionName">verifyFormData()</span> function that we used
      above, but instead of putting it inside a &lt;script&gt; tag,
      we&rsquo;ll move it to a separate Javascript file.  If you look at the
      xhtml and <a href="scripts/javascript_tutorial.js">Javascript code for
      this tutorial</a>, you will see that the function definition has been
      set up that way.</p>

      <p>Next, instead of connecting our function to the form&rsquo;s Submit
      button, we will connect it to the form&rsquo;s <span
      class="variableName">onsubmit</span> property instead.  This is just a
      somewhat more clear way of indicating what we want to do: we are
      saying to verify the form data whenever the user tries to submit the
      form rather than when the user clicks on the button that submits the
      form.  This approach will now work even if there are two different
      Submit buttons in the form.  (But if you are doing things like that,
      you don&rsquo;t need this tutorial!)  So we will remove the <span
      class="variableName">onclick</span> from the Submit button, and add an
      <span class="variableName">id</span> attribute to the &lt;form&gt;
      itself:</p>

      <p class="codeBlock"> &lt;form method="get"
       id="theForm"
       action="http://babbage.cs.qc.edu/courses/cs081/Form_Script.sh"&gt;
   &lt;input type="password" id="pass" name="pass" /&gt;
   &lt;input type="submit" /&gt;
 &lt;/form&gt;</p>

      <p>Inside the separate Javascript file:</p>
      
      <p class="codeBlock"> window.onload=init;
 function init()
 {
   document.getElementById('theForm').onsubmit = validateTheForm;
 }</p>

      <p>If you look at the external Javascript file for this web page (<a
      href="scripts/javascript_tutorial.js">javascript_tutorial.js</a>) you
      will see this statement at the very end of the file.</p>
      
      <p>One nice feature of this technique is that there is no need for an
      extra <span class="keyword">return</span> statement the way there was
      when the Javascript code was inserted into the xhtml.  The <span
      class="keyword">true</span> or <span class="keyword">false</span>
      value that is returned by <span
      class="functionName">validateFormData()</span> directly controls
      whether the form gets submitted to the server or not.</p>

      </div>

    </div>

    <!-- Working with DOM objects -->
    <h2 id="dom_objects">Working With DOM Objects</h2>
    <div class="whitebox">

      <p>You should be familiar with the idea the Document Object Model
      (DOM) is a way of representing web pages as a tree of nodes. The root
      of the tree represents the &lt;html&gt; element of the page, and the
      two children of that node represent the &lt;head&gt; and &lt;body&gt;
      elements.</p>

      <p>Javascript provides many built-in objects and functions that let
      you write code that can examine and modify the DOM tree while the page
      is displayed, and to connect function to events associated with
      elements in the page.  You have already used Firefox&rsquo;s <span
      class="programName">Firebug </span>extension to examine some elements
      of the DOM tree, but to do so you had to be told what objects and
      variables to use.  Another Firefox tool is the <span
      class="programName">DOM Inspector</span>, which you can invoke by
      typing Control-Shift-I on any web page. You can also get to it from
      the <span class="functionName">Tools</span> menu. The DOM Inspector
      will not only let you view and modify the DOM tree (although less
      conveniently than the way Firebug does that), but will also tell you
      what variables and functions are associated with the objects in the
      DOM tree.  Rather than search through gigantic books on Javascript,
      you can use the DOM Inspector to find out what your Javascript code
      has access to in the DOM tree.</p>

      <p>To get to this information, start up the DOM Inspector, which will
      open up a new window.  On the left is a tree view of the DOM tree
      itself, which you can expand and collapse and expand by clicking on
      the plus and minus boxes you will see there.  As you select nodes in
      the tree, information about those nodes gets displayed on the right
      side of the window.  The information on the right side comes from the
      xhtml code in the page itself, but there is a button next to the title
      on the right side that says &ldquo;Object - DOM Node.&rdquo;  If you
      click on that button, you will see an option called &ldquo;Javascript
      Object.&lt;  If you click on that option, the right side will become a
      view of all the properties of the DOM tree node that is selected on
      the left side as they can be seen by Javascript code.  The root node
      of this property tree is called &ldquo;Subject,&rdquo; which
      represents whatever node of the DOM tree is selected in the left
      panel.</p>

      <p class="question">Start up the DOM Inspector now (so you are
      inspecting this web page) and open up the full tree in the left-hand
      panel.  What is the <span class="variableName">id</span> of the third
      &lt;div&gt; in the &lt;body&gt; of the document?</p>

      <p class="answer">Looking at just the left-hand side of the DOM
      inspector, you should see that the third &lt;div&gt; has an <span
      class="variableName">id</span> value of &ldquo;content.&rdquo;</p>

      <p>At this point, the DOM Inspector gives much more information than
      you need or can use.  But before you get rid of it, look over the
      property tree on the right side for some node in the DOM tree and take
      note of the following variable names: <span
      class="variableName">parentNode</span>, <span
      class="variableName">childNodes</span>, <span
      class="variableName">firstChild</span>, <span
      class="variableName">lastChild</span>, <span
      class="variableName">previousSibling</span>, and <span
      class="variableName">nextSibling</span>.  These are all links to other
      nodes in the DOM tree (except <span
      class="variableName">childNodes</span>, which is a list of links). 
      They can be used to navigate from one node to its neighbors up, down,
      and sideways in the DOM tree.</p>

      <p>The other thing you should look at in the right-hand panel are the
      <span class="variableName">attributes</span> and <span
      class="variableName">style</span> properties for whatever node you are
      looking at.  If you open them up, you the <span
      class="variableName">attributes</span> will list all the css
      information, and more, for the node you are inspecting.  The <span
      class="variableName">style</span> part will show you how you can
      change the CSS rules from within Javascript code.</p>

      <p>There is more to add to this tutorial, but not for CS-081 for the
      Spring 2006 semester!</p>      

    </div>

    <!-- Glossary -->
    <h2 id="glossary">Glossary</h2>
    <div class="whitebox">
      <dl>
        <dt>array</dt>
          <dd>A list of values.  The elements in the list may be numbers,
          strings, or references to objects, among other things.</dd>
        <dt>assignment statement</dt>
          <dd>From left to right: a variable name, an equal sign (=), and an
          expression.  The value of the expression becomes the new value of
          the variable on the left-hand side of the equal sign.</dd>
        <dt>comment</dt>
          <dd>Some descriptive text that is ignored by the Javascript
          interpreter.</dd>
        <dt>declare</dt>
          <dd>To use the <span class="keyword">var</span> keyword to create
          a variable.</dd>
        <dt>event object</dt>
          <dd>An object that gets passed as a parameter to functions that
          respond to events.  Variables in the event object give additional
          information about the event, such as the mouse position when the
          event occurred, what key was pressed, etc.</dd>
        <dt>execute</dt>
          <dd>To actually perform whatever operations a statement says to
          do.</dd>
        <dt>expression</dt>
          <dd>A way to represent or calculate a value. Variable names
          represent their values at the time the expression is evaluated,
          numbers represent their own values, and operators like <span
          class="variableName">+</span>, <span
          class="variableName">-</span>, <span
          class="variableName">*</span>, and <span
          class="variableName">/</span> can be used to calculate values of
          arbitrarily complicated expressions.</dd>
        <dt>function</dt>
          <dd>A set of statements that are grouped together.</dd>
        <dt>function call</dt>
          <dd>A statement or part of a statement that causes a function to
          execute.</dd>
        <dt>function definition</dt>
          <dd>A series of statements, starting with the keyword <span
          class="variableName">function, </span> normally followed by the
          name of the function, then followed by a pair of parentheses, and
          a series of one of more statements inside curly braces. Defining a
          function does not execute it.</dd>
        <dt>interpreter</dt>
          <dd>The part of a web browser (or other application, such as
          Photoshop) that executes Javascript code.</dd>
        <dt>iterate</dt>
          <dd>To execute the statements in a loop body repeatedly.</dd>
        <dt>keyword</dt>
          <dd>A word in the Javascript language that is part of the language
          itself and cannot be used as a variable name.  Examples are <span
          class="keyword">var</span> and <span class="keyword">if</span>.</dd>
        <dt>loop control variable</dt>
          <dd>A variable that changed its value for each iteration of a do
          loop.</dd>
        <dt>object</dt>
          <dd>A section of memory that can contain variables and references
          to functions.</dd>
        <dt>parameter</dt>
          <dd>A value that is passed to a function when it is called.</dd>
        <dt>reference</dt>
          <dd>A variable that has been assigned something other than a
          simple value like a number or string.  Rather than put a copy of
          the entire function, object, or array that is being assigned to
          the variable, the interpreter puts a link to the actual function,
          object, or array.  The link is called either a reference value or a
          pointer.</dd>
        <dt>relational operator</dt>
          <dd>Operators like <span class="variableName">==</span>, <span
          class="variableName">&gt;</span>, <span
          class="variableName">&lt;=</span>, and <span
          class="variableName">!=</span>, which give results that are <span
          class="keyword">true</span> or
          <span class="keyword">false</span>.</dd>
        <dt>statement</dt>
          <dd>The smallest unit of execution in Javascript.  Statements
          always end with a semicolon.</dd>
        <dt>string</dt>
          <dd>Characters inside quotation marks.</dd>
        <dt>subscript</dt>
          <dd>A number used to select an element in an array.</dd>
        <dt>value</dt>
          <dd>A number, string, boolean (<span class="keyword">true</span>
          or <span class="keyword">false</span>) that can be assigned to a
          variable.</dd>
        <dt>variable</dt>
          <dd>The Javascript name for a location in the computer&rsquo;s
          memory.</dd>
      </dl>
    </div>

  </div>

  <div id="footer">
    <br class="notforscreen" />
    <p class="links">
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
      <br/>
      Last updated <?php echo date("Y-m-d",
      filemtime($_SERVER['SCRIPT_FILENAME'])); ?>
    </p>

    <p>Copyright &copy; 2006 by Christopher Vickery<br />
    This work is licensed under a <a rel="license"
    href="http://creativecommons.org/licenses/by-sa/2.5/">Creative Commons
    Attribution-ShareAlike 2.5 License</a>.</p>

<!--/Creative Commons License-->
<!--
<rdf:RDF xmlns="http://web.resource.org/cc/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">

  <Work rdf:about="">
    <license rdf:resource="http://creativecommons.org/licenses/by-sa/2.5/" />
    <dc:title>Javascript Tutorial</dc:title>

    <dc:description>Interactive web page and formatted print document that
      provides a tutorial introduction to the Javascript programming
      language.
    </dc:description>

    <dc:creator>
      <Agent>
        <dc:title>Christopher Vickery</dc:title>
      </Agent>
    </dc:creator>
    <dc:type rdf:resource="http://purl.org/dc/dcmitype/InteractiveResource" />
    <dc:source rdf:resource="http://babbage.cs.qc.edu/courses/cs081/Javascript_Tutorial" />
  </Work>

  <License
    rdf:about="http://creativecommons.org/licenses/by-sa/2.5/"><permits
    rdf:resource="http://web.resource.org/cc/Reproduction"/><permits
    rdf:resource="http://web.resource.org/cc/Distribution"/><requires
    rdf:resource="http://web.resource.org/cc/Notice"/><requires
    rdf:resource="http://web.resource.org/cc/Attribution"/><permits
    rdf:resource="http://web.resource.org/cc/DerivativeWorks"/><requires
    rdf:resource="http://web.resource.org/cc/ShareAlike"/>
  </License>
</rdf:RDF>
-->
  </div>
</body>
</html>
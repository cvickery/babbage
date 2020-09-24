<?php
  //  FAQ/index.php
  //  --------------------------------------------------------------------------
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
    <title>IEEE-754 Analyzers FAQ</title>
    <link rel="icon" href="../favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../css/faq.min.css" />
  </head>
  <body>
    <h1>IEEE-754 Analyzers FAQ</h1>
    <dl>
      <dt>What happened to the old IEEE-754 “calculators” and reference material?</dt>
      <dd>
        <p>
          <a href="../../IEEE-754.old">The previous version is still available.</a>
        </p>
        <p>
          But please note: the Reference Material there contains many broken links and is no longer
          being maintained. I suggest that you use your favorite search engine to locate background
          information on the IEEE-754 floating point standard instead.
        </p>
        <p>
          “Kevin’s Chart”
          <a href="http://babbage.cs.qc.cuny.edu/IEEE-754.old/References.xhtml#tables"> is still
          there</a>, but has not been updated to handle the 2008 version of the IEEE-754 standard.
        </p>
      </dd>
      <dt>
        What’s New?
      </dt>
      <dd>
        <p>
          Instead of three separate pages, everything is now on one page. Enter whatever value you
          want to analyze, and the code will figure out whether you entered a decimal or binary
          value that you want to convert to IEEE-754, or the hexadecimal representation of an
          IEEE-754 encoded number that you want to analyze.
        </p>
        <p>
          Decimal values can be entered as rational or mixed numbers. With this feature, you
          can produce decimal values with truly repeating fractions.
        </p>
        <p>
          You can have multiple analyzers open at once so that you can compare multiple analyses
          at the same time.
        </p>
        <p>
          All three binary formats specified in IEEE-754 2008 (binary32, binary64, and binary128)
          are supported.
        </p>
      </dd>
      <dt>And what’s new under the hood?</dt>
      <dd>
        <p>
          The new version is a total rewrite of the “calculators” page, so what’s changed under the
          hood is: “Everything!”
        </p>
        <p>
          The new calculators use the <a href='http://gmplib.org/'></a>GNU Multiprecision
          Arithmetic library to do the more time-consuming underlying calculations. The old
          calculators used JavaScript for all its calculations, with several painstakingly-developed
          constants to handle edge cases.
        </p>
        <p>
          Although the old calculators were very accurate, we think the new analyzers will be even
          more so. Indeed, we recently received a report of an error in the old calculators that the
          new code handles correctly.
        </p>
        <p>
          The analyzers also handle rounding modes much more clearly, and include support for the
          Binary128 (quad precision) data type introduced in the 2008 revision of the standard
          (IEEE-754-2008). Now that you can enter rational numbers, you can generate values that
          repeat indefinitely (try 1/7), and the rounding modes will affect the rightmost digit of
          the result.
        </p>
        <p>
          The new code also supports more flexibility in entering values for analysis. In
          particular, being able to enter rational numbers means you can now explore the
          representation of repeating fractions.
        </p>
      </dd>
      <dt>
        Who wrote the code?
      </dt>
      <dd>
        <p>
          The current code was written in 2011 by Michael Lubow, an undergraduate Computer Science
          major at Queens College of the City University of New York (CUNY), under the supervision
          of Dr. Christopher Vickery.
        </p>
        <p>
          Special thanks to Sasa Zeman (sasaz72 at mail.ru) for spotting several bugs for us to fix
          in the current code.
        </p>
        <p>
          The previous calculators were first written by another Queens College student, Quanfei
          Wen, also under Dr. Vickery’s supervision, in 1997. The code for those calculators was
          considerably reworked by Kevin Brewer, an engineer working for Delco Electronics at the
          time.
        </p>
      </dd>
      <dt>
        The old calculators were written in JavaScript, so it was straightforward to get a copy of
        the source code. Now there’s some sort of Ajax business going on that involves server-side
        code. Is that code available too?
      </dt>
      <dd>
        <p>
          Sure, there’s a <a href='../IEEE-754_Analyzer.zip'>a zip file</a> you can download with all
          the code for the web site in it, plus some code we wrote for testing. Note that if you
          want to replicate the analyzers you will need both this code and a copy of <a
          href='http://gmplib.org/'>the GNU  Multiprecision Arithmetic library</a> for your
          platform.
        </p>
      </dd>
      <dt>Great! What are the licensing terms for the source code?</dt>
      <dd>
        <p>
          The source code for this project is available under an <a href='../src/License'>MIT
          license</a>, which allows you to use the code pretty much any way you want, provided you
          maintain the license document with the code.
        </p>
        <p>
          This code makes use of the GNU Multiprecision Arithmetic Library, which is licensed
          separately under the terms of the <a href="https://www.gnu.org/copyleft/lesser.html">GNU
          LGPL</a>
        </p>
      </dd>
      <dt>What’s the stuff in square brackets?</dt>
      <dd>
        <p>
          Recurrences: strings of fraction digits that repeat indefinitely. They can show up in
          either decimal or binary fractions because the radices are independent of each other.
          (Decimal 0.1 has a recurrence when converted to binary, for example.) Also, you can get a
          decimal recurrence by entering a decimal value as a rational number (1/3, etc.).
        </p>
      </dd>
      <dt>What happened  to the angle brackets around the hidden bit in the old calculators?</dt>
      <dd>
        <p>
          We left them out, hoping they won’t be missed.
        </p>
        <p>
          Once a value has been converted to a normalized binary value, the 1 to the left of the
          binary point is the “hidden” bit that is not included in the IEEE-754 encoded bits. (For
          denormalized values, the “hidden 1” becomes a “hidden 0.”)
        </p>
      </dd>
      <dt>What about Infinity and NaN?</dt>
      <dd>
        <p>
          The analyzers recognize special input names for these (“NaN,” “qNaN,” “sNaN,” “Infinity,”
          “+Infinity,” and “-Infinity”), and will show the corresponding IEEE-754 values. Also,
          if you enter the hexadecimal representation of one of these values, the analyzers will
          recognize them, too.
        </p>
        <p>
          For NaN values, the sign bit and most of the significand bits can have arbitrary values;
          the analyzers represent those binary digits with the letter ‘x’, even if you enter a
          particular value for some of them in hex.
        </p>
      </dd>
      <dt>
        I don’t understand what the analyzers are doing.
      </dt>
      <dd>
        <p>
          You need to have a basic understanding of floating-point numbers in general, and the
          IEEE-754 floating-point standard specifically, to make sense of these analyzers. Any
          textbook on computer architecture can help you learn the basics.
        </p>
      </dd>
      <dt>Are there bugs or plans for future features?</dt>
      <dd>
        <p>
          We've fixed all the bugs we know about.
        </p>
        <p>
          Keyboard shortcuts are under development.
        </p>
        <p>
          We plan to make some changes to the UI, but nothing major is planned for the near future.
        </p>
        <p>
          We plan to add support for the Binary16 format.
        </p>
        <p>
          We have a request to show the difference between the value entered and the actual decimal 
          value represented by each IEEE-754 encoding, but it requires some work.
        </p>
      </dd>
      <dt>
        I have a suggestion for a change in the design of the web page.
      </dt>
      <dt>
        I have a suggestion for making the instructions clearer.
      </dt>
      <dt>
        I found an error.
      </dt>
      <dd>
        <p>
          For all of these:
          <a
            href='mailto:Christopher.Vickery@qc.cuny.edu?Subject=IEEE-754%20Analyzers'>Let
            me know!</a>
        </p>
      </dd>
    </dl>
    <div id='nav'><a href="../../IEEE-754.development">Back to the Analyzers</a></div>
  </body>
</html>


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

    <title>
      Errata for Patterson and Hennessy&rsquo;s Computer Organization and
      Design, Third Edition
    </title>

      <link rel="shortcut icon" href="/favicon.ico" />
      <link rel="stylesheet"
            type="text/css"
            media="all"
            href="../css/style-all.css"
      />
      <link rel="stylesheet"
            type="text/css"
            media="screen"
            href="../css/style-screen.css"
      />
      <link rel="stylesheet"
            type="text/css"
            media="print"
            href="../css/style-print.css"
      />

      <!-- Styles for this page only  -->
      <style type="text/css">
      .quoted_text {
        font-style:       italic;
        }
      .fixed {
        font-style:italic;
        color:yellow;
        background-color:#666;
        border:1px dotted red;
        padding:0 0.2em;
        }
      .notFixed {
        font-style:italic;
        color:#fcc;
        background-color:#999;
        border:1px solid green;
        padding:0 0.2em;
        }
      </style>
  </head>

  <body>

    <div id="header">

      <h1>Errata for Patterson and Hennessy&rsquo;s <br /><em> Computer
      Organization and Design, Third Edition</em> </h1>

    </div>

    <div id="content">

      <h2>Disclaimer</h2>
      <div class="whitebox">

        <p>These errata are unofficial: they are only the ones found by my students and me. (Send me the ones you find,
        and I&rsquo;ll add them to the list.) There is an official list posted on the <a
        href="http://www.mkp.com/companions/1558606041">book&rsquo;s web site</a>, which includes most, but not all, of
        the items given here, along with some others.  The errata posted there have been reviewed by the authors, but
        the ones posted here have not.</p>

        <hr />
        <p><em>Christopher Vickery</em></p>

      </div>

      <h2>New Printing</h2>
      <div class="whitebox">
        <p>
          A &ldquo;Revised Printing&rdquo; of the book was released in 2007. The words REVISED PRINTING
          appear in yellow letters inside a black bar at the top of the front cover. Many of the errata listed
          below were corrected in this printing. Some, however, were not. I&rsquo;ve added a
          <span class="fixed">fixed</span> tag to those items that are no longer in error in the revised printing edition
          of the book. If your copy of the book is not the Revised Printing, all of these errors apply to your copy.
        </p>
        <p>
          I&rsquo;ve marked errors that still exist in the Revised Printing with <span class="notFixed">not fixed</span>.
        </p>
      </div>

      <h2>Errata</h2>
      <div class="whitebox">

      <p><span class="fixed">fixed</span> <strong>Page 166, last two lines above &ldquo;Negative
      Shortcut:&rdquo;</strong> There should be a bar over the second X in the first two equations, and over the first X
      in the last one.</p>

      <p><span class="fixed">fixed</span> <strong>Page 168:</strong> Refers to material &ldquo;<span
      class="quoted_text">on the back end papers of this book</span>&rdquo; instead of &ldquo;<span
      class="quoted_text">on the green card in the front of this book.</span>&rdquo;</p>

      <p><span class="fixed">fixed</span> <strong>Page 168 Check Yourself:</strong> Choice 2 should be &ldquo;<span
      class="quoted_text">ASCII string in C</span>&rdquo; with &ldquo;string&rdquo; in normal text font. Explanation:
      There is no string type in C, and wide strings can use 2 bytes per character.  And choice 3 should use a capital S
      in the name of Java&rsquo;s &ldquo;String&rdquo; type.</p>

      <p><span class="fixed">fixed</span> <strong>Page 172 Figure 3.3:</strong> The &lt;= symbols in the first two
      columns should all be &lt; because you can&rsquo;t get overflow if one operand is zero.</p>

      <p><span class="fixed">fixed</span> <strong>Page 182 Fig 3.9 and its descripton on page 181, &ldquo;Faster
      multiplier.&rdquo;</strong>  You need 31 adders, not 32, and Product0 is the rightmost bit of Mplier0.Mcand.  What
      is labeled Product0 is actually Product1.  And the leftmost input to the 31st (bottom) adder is
      Multiplier31.Mcand, not Multiplier3.Mcand.</p>

      <p><span class="fixed">fixed (sort of)</span> <strong>Page 197 line 7:</strong> &ldquo;<span
      class="quoted_text">&hellip; as noted in section  .</span>&rdquo; is missing the section number, possibly because
      the reference is to the current section, Section 3.6. (The fixed version has the self-reference to Section
      3.6.)</p>

      <p><span class="fixed">fixed (sort of)</span> <strong>Page 197:</strong>  Current IBM mainframes support both hex
      and IEEE-754 floating-point formats. (The fixed version mentions IEEE 755 when it means IEEE 754.)</p>

      <p><span class="fixed">fixed</span> <strong>Page 209:</strong>  Period missing at the end of the last sentence of
      the second paragraph.</p>

      <p><span class="fixed">fixed (on page 218)</span> <strong>Page 217: Section 3.7, missing information:</strong> The
      IEEE-754 standard was developed by Intel and the Intel 8087 &ldquo;numeric co-processor,&rdquo; introduced in
      1980, was its first implementation in hardware.</p>

      <p><span class="fixed">fixed</span> <strong>Page 273, Exercise 4.10:</strong> The text of the question uses
      &ldquo;I1&rdquo; and &ldquo;I2&rdquo; to refer to the two different implementations.  But the table refers to them
      as &ldquo;M1&rdquo; and &ldquo;M2.&rdquo;</p>

      <p><span class="fixed">fixed</span> <strong>Page 278, Answer to Check Yourself 4.2, page 253:</strong> The answer
      should be &ldquo;b (9.9 sec)&rdquo; rather than &ldquo;6.&rdquo;</p>

      <p><strong>Page 290:</strong> &ldquo;<span class="quoted_text">&hellip; <i>sequential</i> because their outputs
      depend on both their inputs and the contents of the internal state.</span>&rdquo; This doesn't say anything about
      why they are called &ldquo;sequential,&rdquo; even though the statement about sequential circuits is correct.  Two
      fixes are (1) just to use the phrase about outputs depending on both inputs and state as the definition of
      sequential without saying why or (2) to explain that they are called sequential because the present state depends
      on the sequence of inputs instead of the current combination of input values &hellip; which would also explain why
      combinational circuits are called &ldquo;combinational.&rdquo;</p>

      <p><span class="notFixed">not fixed</span> <strong>Pages 300 through 314; Figures 5.11, 5.15, 5.17, 5.19, 5.20,
      5.21, and 5.24:</strong> All of these figures label the output of the top-right Adder &ldquo;ALU result.&rdquo; It
      should be &ldquo;Sum&rdquo; and/or &ldquo;Branch target,&rdquo; as in Figure 5.9 on page 297.</p>

      <p><span class="fixed">fixed</span> <strong>Page 302:</strong> The last line refers to the 3-bit ALU control
      instead of 4-bit.</p>

      <p><span class="fixed">partly fixed</span> <strong>Figure 5.24 on page 314:</strong> The output of the AND gate
      should go to the Mux to the left of the one shown.  The MemRead signal is chopped off on the right edge of the
      figure.  It should connect to the line going into the bottom of the Data memory.  The output of the adder in the
      upper right part of the diagram is the &ldquo;Branch Target Address,&rdquo; not the &ldquo;ALU result.&rdquo;
      Corrected figure is <a href="COAD3e_Figure_5.24.png">here</a>. The Revised Printing fixes everything except the
      Adder for the Branch Address/</p>

      <p><span class="notFixed">not fixed</span><strong>Page 318 Check Yourself:</strong>  &ldquo;<span
      class="quoted_text">Look at the control signal &hellip;</span>&rdquo; should be &ldquo;<span
      class="quoted_text">Look at the control signals &hellip;</span>&rdquo; or &ldquo;<span class="quoted_text">Look at
      the truth table &hellip;</span>&rdquo;</p>

      <p><span class="fixed">fixed</span> <strong>Figure 5.27 on page 322:</strong> (1) The line connecting the output
      of the PC to the top input of the Mux controlled by ALUSrcA is missing. (2) The line connecting the Memory Data
      Register to the Mux controlled by MemtoReg is missing.</p>

      <p><span class="notFixed">not fixed</span><strong>Page 326, line 11: </strong> &ldquo;<span
      class="quotedText">&hellip;PC source&hellip;</span> should be &ldquo;<span
      class="quotedText">PCSource</span>&rdquo; (Reported by Neil Raza).</p>

      <p><span class="notFixed">not fixed</span><strong>Page 328, line 10: </strong> &ldquo;<span
      class="quotedText">&hellip;<code>IR[25:0]]</code>&hellip;</span>&rdquo; should be &ldquo;<span
      class="quotedText">&hellip;<code>IR[25:0]</code>&hellip;</span>&rdquo; (Reported by Neil Roza.)</p>

      <p><span class="fixed">fixed</span> <strong>Figure 5.38 on page 339:</strong> In State 4, the Memory Read
      Completion Step, <span class="variableName">RegDst</span> should be 0 (the register number for writing is <span
      class="variableName">rt</span>, bits 20:16 of the instruction).  In that same state, <span
      class="variableName">MemtoReg</span> should be 1 (data from the MDR is to be written to the register file). In the
      Revised Printing, this is Figure 5.37 on page 338.</p>

      <p><span class="fixed">fixed</span> <strong>Page 351:</strong>  &ldquo;<span class="quoted_text">as we saw earlier
      in the Fallacies and Pitfalls (see page 350)</span>&rdquo; is a self-reference.</p>

      <p><span class="fixed">fixed</span> <strong>Page 355:</strong> Question 5.11 Incrementing the index register by 1
      in the second instruction is undoubtedly a bug: the value should be 4.</p>

      <p><span class="fixed">fixed</span> <strong>Page 355:</strong> Question 5.12 &ldquo;<span
      class="quoted_text">&hellip; described in Exercise 5.12 without &hellip;</span>&rdquo; should be  &ldquo;<span
      class="quoted_text">&hellip; described in Exercise 5.11 without &hellip;</span>.&rdquo;</p>

      <p><span class="fixed">fixed</span> <strong>Figures 6.19 and 6.20 on page 397</strong> The clock cycles are named
      CC 1 through CC 6 and then start over with CC 1.  Going from 1 to 5 and then repeating would make sense, but not
      starting over after 6.  And then in Fig. 6.28 on page 405 the cycles are named CC 1 through CC 9, which is
      inconsistent.</p>

      <p><span class="fixed">fixed</span> <strong>Page 409:</strong>  There should be a third input to the top Mux in
      Figure 6.30b.  It should come from ID/EX.  The same problem is repeated in <strong>Figs. 6.32 and
      6.33</strong>.</p>

      <p><span class="notFixed">not fixed</span> <strong>The text on the last line of page 538 and the first line of
      page 539</strong> refers to cache sizes of 4 to 512 KB in Fig. 7.30, but the sizes in the figure range from 1 to
      128 KB. (<em>But note that the revised printing has updated values for Figure 7.29.</em>)</p>

      <p><span class="fixed">fixed</span> <strong>Page 544 Figure 7.31:</strong>  The labels for 1, 2, 4, and 8-way
      associativity are missing.</p>

      <p><span class="fixed">fixed</span> <strong>Page 561:</strong>  The solution for the Check Yourself on page 538
      should be a-c-b-d rather than a-c-c-d.</p>

      <p><span class="notFixed">partly fixed</span> <strong>Page B-21 3 lines from the bottom:</strong> &ldquo;<span
      class="quoted_text">specifies a variable register file that &hellip;</span>&rdquo; should be &ldquo;<span
      class="quoted_text">specifies a variable, registerfile, that &hellip;</span>&rdquo; and &ldquo;registerfile&rdquo;
      should be in the monospaced font. (<em>The variable name is still not in the monospaced font.</em>)</p>

      <p><span class="fixed">fixed</span> <strong>Page B-22 second bullet item from the top of the page:</strong>
      &ldquo;<span class="quoted_text">z, representing unkown, &hellip;</span>&rdquo; should be &ldquo;<span
      class="quoted_text">x, representing unknown, &hellip;</span>&rdquo;</p>

      <p><span class="fixed">fixed</span> <strong>Page B-22, Test Yourself on the bottom of the page:</strong> Item 4 is
      &ldquo;<span class="quoted_text">{{4{1'b1}},{4{1'b1}}}</span>&rdquo; but should be &ldquo;<span
      class="quoted_text">{{4{1'b1}},{4{1'b0}}}</span>&rdquo;</p>

      <p><span class="notFixed">not fixed</span> <strong>Figure B.5.13 on page B-36:</strong>  The caption says
      &ldquo;<span class="quoted_text">three ALU control lines</span>&rdquo; but there are 4, and they are not labeled:
      the labels from left to right should be Ainvert, Bnegate, and Operation. (Operation is two bits.)</p>

      <p><span class="fixed">fixed</span> <strong>The top part of Fig. B.6.2 on page B-42:</strong> There is an extra
      wrench handle in the middle.  (This may be browser-specific.)</p>

      <p><span class="fixed">fixed</span> <strong>Figure B.9.3 page B-61:</strong> The caption has a Yen sign where
      there should be an x, as in &ldquo;<span class="quoted_text">4 x 2 SRAM</span>&rdquo;  (This may be
      browser-specific.)</p>

      <p><span class="fixed">fixed</span> <strong>Figure B.9.4 on the page following Figure B.9.3</strong> also has a
      Yen sign instead of a x in the caption (should be &ldquo;<span class="quoted_text">4M x 8 SRAM</span>&rdquo;).
      (This may be browser-specific.) And the page number at the bottom of the page, &ldquo;<span
      class="quoted_text">(page 62)</span>&rdquo; should be &ldquo;<span class="quoted_text">(page
      B-62)</span>&rdquo;.</p>

      </div>
    </div>

    <div id="footer">
      <a href="../../">Vickery Home</a>&nbsp;-&nbsp;<a
         href="./">CS-343 Home</a>&nbsp;&mdash;&nbsp;<a
         href="http://validator.w3.org/check?uri=referer">Validate&nbsp;XHTML</a>&nbsp;&mdash;&nbsp;<a
         href="http://jigsaw.w3.org/css-validator/check/referer">Validate&nbsp;CSS</a>&nbsp;&mdash;
         Last updated <?php echo gmdate("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.
    </div>
  </body>
</html>

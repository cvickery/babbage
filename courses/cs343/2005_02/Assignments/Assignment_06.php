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
<head><title>CS-343 Assignment 6</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="Assignment_01.php" />
<link rel="Prev" href="Assignment_05.php" />
<link rel="Next" href="Assignment_07.php" />
<link rel="stylesheet" type="text/css" href="style-all.css" />
<link rel="stylesheet" type="text/css" media="screen" href="style-screen.css" />
<link rel="stylesheet" type="text/css" media="print" href="style-print.css" />
</head>
<body>
<h1>CS-343 Assignment 6</h1>

<h2>Submission</h2>
<div class="whitebox">

  <p>Submit this assignment by email by midnight of March 21.  Be sure
  to use "CS-343 Assignment 6" as the subject, and include your name
  in the message body.  Send your program as an attached text file and
  answer the questions in the body of your email message.</p>

  <p>Don't forget that you can get help for this and other assignments
  at the  <a href="/Forums/cs343">Discussion Forum</a> for the
  course.</p>

</div>

<h2>The Assignment</h2>
<div class="whitebox">
  <ol>

    <li>Write a MIPS assembly language program that adds several
    numbers together using a loop.  See below for help.  Verify that
    it is correct by stepping through the program one instruction at a
    time.</li>

    <li>Here are two lines from the Text Segment of the sample
    program:

    <div class="whitebox" style="padding:0;">
    <pre style="margin:0;padding:0">
  [0x00400024] 0x3c011001 lui $1, 4097  [aNumber] ; 7: lw $t0, aNumber<br />
  [0x00400028] 0x8c28000c lw $8, 12($1) [aNumber]
    </pre></div>
    <ol style="list-style-type: lower-alpha">
    
      <li>What are the hexadecimal numbers in square brackets at the
      left end of each line?</li>
      
      <li>What is the next hexadecimal number (0x3c011001, etc) on
      each line?</li>

      <li>Explain the difference between the assembly language code
      to the left and to the right of the semicolon?</li>
      
      <li>Explain how these two lines of code implement the first
      <em>lw</em> instruction in <em>sample.s</em>.</li>

    </ol>
    </li>
    <li>Explain how the branch instruction in your program was
    translated to machine language.</li>
  </ol>

</div>

<h2>Help</h2>
<div class="whitebox">
  <h3>Installing (PC/X)SPIM</h3>
  <p>There are three versions of the SPIM simulator on the CD that
  comes with the book.  (And there are updated versions on the SPIM
  author's website if you are interested.)  The simplest version is
  called <em>spim</em>, but it works only from the command line, which
  makes it less useful than the two graphical versions.  The graphical
  version for Windows is called <em>pcspim</em> and the graphical
  version for Unix and Macintosh is called <em>xspim</em>.</p>
  
  <p>To install the PC/Windows version, use WinZip to unzip the
  pcspim.zip file that's in the Content/Software/Spim directory of the
  CD.  Then run setup.exe, and the program will be installed and ready
  to go.</p>
  
  <p>For Linux/Unix/Macintosh, you have to build and install the
  program yourself.  The file to use is spim.tar.gz from the same
  directory as pcspim.zip.  Unzip it (<em>tar xvzf spim.tar.gz</em>)
  and you will get a directory named something like Spim-7.0.  Change
  to that directory and edit Imakefile to tell where you want
  everything installed.  Then run <em>./Configure</em>, then
  <em>xmkmf</em>, then <em>make</em>, <em>make xspim</em>, and
  <em>make install.</em>  These instructions are spelled out more
  carefully in the README file.  Ask on the course forum if you need
  help getting set up.</p>
  
  <h3>Writing an Assembly Language Program</h3>
  
  <p>You have to use a text editor (not a word processor) to prepare
  your program.  Windows has Notepad, but if you are a CS student you
  undoubtedly have a programmer's text editor that you prefer by now,
  like <a href="http://www.vim.org">vim</a> or <a
  href="http://www.nedit.org">nedit</a> or maybe a commercial one. 
  Create a text file with a <em>.s</em> extension.  Here is a sample
  program you can use as a model:</p>

  <fieldset style="margin-left:2em;margin-right:2em;">
  <legend>sample.s</legend><pre>
  # Add two numbers and print their sum.
  # C. Vickery
  # March 18, 2005

                  .text
                  .globl  main
  main:           lw    $t0, aNumber
                  lw    $t1, anotherNumber
                  add   $t0, $t0, $t1
                  sw    $t0, answer
  
                  li    $v0, 4    # print string
                  la    $a0, msg
                  syscall
                  li    $v0, 1    # print int
                  lw    $a0, answer
                  syscall
                  li    $v0,  10  # exit
                  syscall

                  .data
  msg:            .asciiz "The sum is "
  aNumber:        .word 5
  anotherNumber:  .word -123
  answer:         .space 4
                  .end

  </pre></fieldset>

  <p>Comments are introduced by the '#' character.</p>
  <p>Labels (symbols that represent memory addresses) appear at the
  beginning of a line, and end with a ':'.  Like a C program, your
  code starts executing at <em>main</em>, so use that as the label of
  your first instruction.</p>

  <p>Memory is divided into three regions: <em>text</em>, where the
  instructions go, <em>data</em>, where the data goes, and
  <em>kernel</em> where the operating system resides.  The SPIM
  simulator comes with a small operating system kernel in a file
  called <em>exception.s</em>.  If the simulator is installed
  correctly, <em>exception.s</em> is loaded into kernel memory
  automatically whenever you run it.  The text area starts at address
  0x400000 and the data area starts at 0x10000000.</p>

  <p>The instructions that start with dots, (<em>.text</em>,
  <em>.globl</em>, <em>.data</em>, <em>.asciiz</em>, <em>.word</em>,
  <em>.space</em>, and <em>.end</em>) are "assembler directives."</p>
  
  <ul>

    <li>Use <em>.text</em> and <em>.data</em> to begin the text and
    data memory segments of your program.  There is no <em>.org</em>
    directive despite what I said in class, and it's not needed
    because of the standard beginning locations for the text and data
    segments.  (You can put addresses on <em>.text</em> and
    <em>.data</em>, but there is no reason to bother.)</li>

    <li>The <em>main</em> label has to be declared global by using the
    <em>.globl</em> directive.  When you run the simulator, you will
    see that the kernel executes a few instructions and then calls
    your program with a "jal main" instruction; your <em>main</em> has
    to be global for this kernel instruction to get initialized
    properly.</li>
    
    <li>There is a <em>syscall</em> instruction that can be used to
    invoke some simple kernel functions provided by
    <em>exception.s</em>.  The sample program prints a string of ascii
    characters ("The sum is ") and an integer, and then "exits."  If
    you just run the program, a console window will show up, the
    message will be displayed, and the simulator will stop
    executing.</li>

    <li>You should set up your array of numbers to be summed using
    <em>.word</em> directives; only the first one needs a label.  Use
    at least half a dozen numbers, and be sure to include both
    positive and negative values in the set of values.</li>
    
    <li>The MIPS architecture normally does "delayed branches" and
    "delayed loads."  These features are related to the pipelined
    design of the processor, which we will look at when we get to
    chapter 6.  But for now, they will make your program act
    "strangely" and should be disabled.  They are disabled by default
    in xspim, but with pcspim you might have to turn them off using
    the Simulator-&gt;Settings menu item.</li>

    <li>Note that the assembler is "intelligent" and lets you do lw/sw
    using any memory address.  When necessary, it automatically
    generates the necessary <em>lui</em> and <em>ori</em> instructions
    that we went over in class.  Also, you can use <em>li</em> as a
    "load immediate" instruction: the assembler generates
    <em>addi</em> and/or <em>lui</em> instructions for you as
    necessary.  And you can use <em>la</em> a a "load address"
    instruction.  If the sample program said, <em>la $t0,
    aNumber</em>, the assembler would have generated the
    <em>lui</em>/<em>ori</em> instructions needed to load the address
    represented by aNumber into register $t0.</li>

    <li>Finally, note that the syntax I used for register numbers in
    class was wrong: it's not "$r5" to refer to register 5 for
    example, it's just "$5."  And all the registers have symbolic
    names according to their conventional uses in MIPS assembly
    language programs.  For example <em>$at</em> is another name for
    $1, the "assembler temporary" register mentioned in class.  The
    sample program uses registers <em>$t0</em> and <em>$t1</em>, which
    are "temps," corresponding to real registers $8 and $9.  (There
    are six more temps after that if you want to use them.)  The
    <em>syscall</em> instructions use <em>$v0</em> ($2) to tell the
    kernel which function to perform (print a string, print an
    integer, or exit in the sample program), and use $a0 ($4) to pass
    an argument, such as the address of a string or the value of an
    integer to print.  So if you use <em>syscall</em> instructions,
    you have to be sure not to use $2 and/or $4 to hold anything
    important.</li>

  </ul>

  <p></p>

</div>

<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

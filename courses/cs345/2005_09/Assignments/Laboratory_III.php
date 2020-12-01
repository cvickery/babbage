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
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
  <title>Laboratory III</title>
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
          href="/courses/css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
          href="/courses/css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
          href="/courses/css/style-print.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
  <div id="header">
    <h1>Laboratory III</h1>
  </div>
  <div id="content">
    <h2>Introduction</h2>
    <div class="whitebox">
      <p>This laboratory begins the process of developing a video display
        system using the RC200E touchscreen as the output device and the two
        RAM chips on the RC200E as a framebuffer. For this lab, you will
        learn to read information from the keyboard, to read and write RAM,
        and to write text messages on the screen. </p>
    </div>
    <h2>Laboratory Description</h2>
    <div class="whitebox">
      <h3>Background</h3>
      <p>When you finish this project, you will have configured the RC200E
        to read text from the keyboard, store the text in one of the
        &ldquo;ZBT SRAM&rdquo; chips external to the FPGA, read the text
        back from the memory, and display it on the video screen. The memory
        can be read and written using standard PAL macros; it uses a
        one-stage pipeline for reading and writing, so it's called a
        &ldquo;PL1RAM&rdquo; in the PAL documentation. Reading from the
        keyboard andwriting text to the screen are also done using PAL
        macros, but these two sets of functions are documented in a separate
        manual (in the same directory as the PAL Reference Manual), called
        the PAL Cores Manual. Writing text to the screen is done using the
        PAL console core, which simulates a text window on a computer.</p>
      <p>Because your projects for this lab will be using the video display,
        you will have to use the RC200E clock signal that is syncronized
        with the drawing speed of the touchscreen: 25.175MHz. For
        simulation, you will probably want to use a slower clock speed, such
        as 5MHz. This slower clock speed will make the Pal Virtual Console
        display only part of the screen image during simulation, but it
        should be enough to verify that your code works before you run it on
        the hardware.</p>
      <p><strong>Notes:</strong> The projects for this lab will take a
        relatively long time to compile and build. Don't be alarmed! Also,
        in lab on October 7, I mentioned to some of you that the times might
        be shortened if we turned off the hyperthreading feature of the
        CPUs. I did the experiment later in the day, and found that it made
        no difference. Project 2 took 4 minutes and 5 seconds to build for
        debug with hyperthreading enabled compared to 4 minutes and 4
        seconds without it. The EDIF builds took 1:23 without and 1:21 with.
        A particularly frustrating scenario is when you accidentally start
        to compile a simulation and want to terminate it. If you click on
        the &quot;stop build&quot; icon, you get a message to wait -- and
        you have to wait just as long as if you hadn't tried to stop the
        compilation. In this case, you can start the Task Manager (Right
        click on the Task Bar), go to the Processes tab, find the
        cc1plus.exe process, and terminate it. You'll get a flurry of
        messages in the DK console, but no harm will be done.</p>

      <h3>Project 1: Read From Keyboard and Write to Seven Segment Display</h3>
      <p>Create a new workspace, Laboratory III, under your My Projects
        directory, and create a new project named something like
        &rdquo;Keyboard to Seven Segment Display,&rdquo; and add a Handel-C
        source file with a meaningful name. In addition to the normal header
        files and libraries, you will need to #include the
        <code>pal_keyboard.hch</code> header file and the
        <code>pal_keyboard.hcl</code> library.</p>
      <p>Be sure to define the proper values for
        <code>PAL_TARGET_CLOCK_RATE</code> for Debug and EDIF as described
        above. (Aside: You can use the Build -&gt; Configurations menu to
        delete the configurations you don't need: Generic, Verilog, VHDL,
        SystemC, and Release. This can make managing the project a little
        easier.) </p>
      <p>Use the Pal Cores manual to find out how to read ASCII characters
        from the keyboard. There is sample code in the manual that you can
        use as a model. You don't need to use a macro proc for your
        &quot;UserCode,&quot; but you do need to follow the rest of the
        model quite precisely to get the timing right. Code your Handel-C
        program so that it reads characters and displays their hexadecimal
        code on the seven segment displays. First test the code using the
        simulator, which you will find very entertaining. The Pal console
        will show two panels for the keyboard: the left one is for input
        from the keyboard, and the right one is for output to the keyboard.
        (What gets output to a keyboard?) The input to the keyboard has to
        be given as scan codes, which are the numbers that get sent from the
        keyboard to identify every key press and release. The top part of
        the left panel lets you browse to a file that will be used for
        simulated input (a plain text file such as your .hcc file will
        work), but the bottom part is where you get to enter scan codes one
        at a time to make sure the hex display is correct. Try these codes
        to get you started: 28 (scan code for pressing the A key), 240, 28
        (the two-byte sequence of scan codes for releasing the A key). You
        should see the hexadecimal representation of the ASCII code for 'a'
        in the seven segment display: 0x61. Now try entering the scan code
        for pressing the left shift key, 18, followed by the scan code for
        pressing the A key again. Now you should see the ASCII code for 'A':
        0x41. You will find you can probably cheat a little and simulate
        pressing a key twice without releasing in. (What does 28, 18, 28,
        240, 18, 28 produce?) There is a copy of <a href="ms_scancode.pdf"
        tabindex="1" accesskey="S">Microsoft's scan code information</a> you
        can look at to find out more than you are probably interested in
        knowing about this topic. (What is the scan code for the character
        B? What character has a scan code of 29?)</p>

      <p>After you have simulated this project successfully, generate a bit
        file and test the code on an RC200E. Be sure to plug a keyboard into
        the PS2 connector next to the expansion header!</p>

      <h3>Project 2. Read from Keyboard and Write to Console</h3>
      <p>Create a second project in your Laboratory III workspace with a
        name like &ldquo;Keyboard to Console&rdquo;. Set it up as you did
        the first project, but add <code>pal_console.hch</code> to your
        includes and <code>pal_console.hcl</code> to your list of library
        files. You may cut and paste your code from the first project into
        your source file for this one to get started.</p>

      <p>Use the Pal Cores manual to see how to use the Pal Console macros.
        Augment your previous code so that you display each ASCII character
        on the screen as it is typed (<span
        class="functionName">PalConsolePutChar()</span>). The simulation
        will work differently now. In addition to the Keyboard Port tab in
        the virtual console, there will be a VGA tab that will show the
        video output, and which will also include a place on the top right
        where you can enter keyboard characters directly. (You can still do
        the scan code thing on the other tab if you prefer.) Note that the
        video display will be only a narrow slice of what would actually
        appear on the touchscreen. If you use a simulated clock speed of
        5MHz you will see the leftmost 5/25th of the screen. Increase the
        clock rate to 10MHz, and you will see over a third of the screen,
        but the simulation will go slower.</p>

      <p>Generate the bit file and verify that the code works the same way
        on the actual hardware.</p>

      <h3>Project 3. Keyboard to RAM and Back</h3>
      <p>For this project, start by looking at the PAL macros for one-stage
      pipelined RAM (PL1RAM) in section 4.3.9 of the regular Pal Manual (not
      the Pal Cores manual). There is no sample code to work from, but by
      now you should see how the PAL works: Do a <span
      class="functionName">PalPL1RAMRequire()</span> to be sure the platform
      will support your project. (There are two RAM chips on the RC200E;
      we'll use just one for this project.) A call to <span
      class="functionName">PalPL1RAMRun()</span> has to be initiated in
      parallel with everything else (this call never returns). A single call
      to <span class="functionName">PalPL1RAMEnable()</span> has to precede
      all other calls. Then you can do reads and writes using the macros
      <span class="functionName">PalPL1RAMSetReadAddress()</span>, <span
      class="functionName">PalPL1RAMRead()</span>, <span
      class="functionName">PalPL1RAMSetWriteAddress()</span>, and <span
      class="functionName">PalPL1RAMWrite()</span>.</p>

      <p>The PL1RAM macros include operations for determining the number of
        bits in a memory address and the number of bits in an addressable
        unit of memory. Normally, we might ignore these since we know the
        properties of the RAM chips on our target platform: both consist of
        chips with 1024K 36-bit words. The simulator, however, simulates
        2048K 32-bit words. So any variables that are going to hold
        addresses have to use <span class="functionName">
        PalPL1RAMGetMaxAddressWidth()</span> to set their widths, and any
        variables that are going to hold data have to use <span
        class="functionName"> PalPL1RAMGetMaxDataWidthCT()</span> to set
        their widths.</p>

      <p><strong>Note:</strong> To write information into RAM, you must use
        <span class="functionName">PalPL1RAMSetWriteAddress()</span> and
        <span class="functionName">PalPL1RAMWrite()</span> on successive
        clock pulses. For example, the following code writes the data value
        <code>0x1234567</code> into memory location 5 and
        <code>0x89ABCDEF</code> into memory location 3 on two successive
        clock pulses:</p>

      <fieldset class="codeBlock">
      <legend>Sample Code</legend>
  seq
  {
    PalPL1RAMSetWriteAddress(PalPL1RAMCT(0), 5);
    par
    {
      PalPL1RAMWrite(PalPL1RAMCT(0), 0x1234567;
      PalPL1RAMSetWriteAddress(PalPL1RAMCT(0), 3);
    }
    PalPL1RAMWrite(PalPL1RAMCT(0), 0x89ABCDEF);
  }
      </fieldset>

      <p>For this project, you are to store the characters that you read
        from the keyboard into successive RAM locations in addition to
        writing them to the Console and displaying their hex values on the
        seven segment displays. Any time the user presses one button, the
        console clears and the current contents of RAM are displayed.
        Pressing the other button clears the console display and clears the
        RAM.</p>

      <p><strong>Notes:</strong> <em>i.</em> Use two variables to hold the
        current and ending addresses in memory. Clearing the RAM consists
        simply of setting these two addresses to zero. <em>ii.</em> Trying
        to access RAM twice in the same clock cyle is an undefined
        operation, so use a semaphore to make reads and writes mutually
        exclusive operations.</p>

      <p>There are three versions of this project for you to try in
        sequence.  It's satisfactory to complete just the first version, but
        the other two are instructive if you have time to work on them:</p>

		  <ol>
        <li>Store one character in each word of RAM.  This will limit your
          project to storage of a maximum of 1 million characters in an
          RC200E RAM chip or 2 million characters using the simulator.</li>
        <li>Instead of just displaying the characters on the screen when
          reading back from memory, display memory as a hex dump like what
          you see in the simulator. If you haven't noticed it yet, the
          simulator's memory dump includes the representation of the
          characters to the right of the hex representation of the bytes.
          Your dump has to work within the output limit of 80 characters per
          line. Something like the following could be used to show the
          contents of 16 bytes of memory on a line, where 'aaaaaa' is the
          hexadecimal representation of the address of the first byte on the
          line, 'xx' is the hexadecimal representation of one byte of
          memory, and 'c' is the character represented by a byte of memory
          (or a dot if the byte doesn't contain an ASCII character code):

          <fieldset class="codeBlock">
          <legend>Sample Output Line </legend>
aaaaaa  xx xx xx xx xx xx xx xx xx xx xx xx xx xx xx xx  cccccccccccccccc
          </fieldset>
          <strong>For you to decide:</strong> how to manage scrolling the
          output when there is too much to fit on the screen.
        </li>
        <li>Store four characters in each word of RAM.  Worse yet, try
          storing 4.5 characters in each word of RAM on the RC200E and 4.0
          characters per word using the simulator. </li>
		  </ol>

    </div>

    <h2>Submit the Assignment</h2>
    <div class="whitebox">
      <h3>Due Date: October 18</h3>
      <p>Starting with the third project, you are to document your Handel-C
        programs according to the <a href="../../Coding_Guidelines.php"
        tabindex="2" title="Coding Guidelines" accesskey="C">Coding
        Guidelines</a> for this course.</p>
      <p>Use a word processor to prepare a report that summarizes your lab
        procedures and results. I prefer receiving PDF files, but MS Word
        documents and other formats are fine too. (All computers in the lab
        have Microsoft Office installed so you can use Word. Some have
        Macromedia Studio 8 installed, which adds a &quot;Save as PDF&quot;
        option to Word.)</p>
      <p>When everything is ready, put a copy of your report in your
        Laboratory III directory and send me an email telling me the project
        is ready for grading. </p>
    </div>
  </div>
  <div id="footer">
    <hr />
    <p>
      <a href="/">Vickery Home</a>&nbsp;
      <a href="http://validator.w3.org/check?uri=referer"> XHTML</a>&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer"> CSS</a>
    </p>
    <p><i>Last updated <?php
      echo gmdate("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME']));
        ?>.</i>
    </p>
  </div>
  </body>
</html>

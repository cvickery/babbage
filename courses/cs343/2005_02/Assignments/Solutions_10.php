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
<head><title>Assignment 10 Solutions</title>
<link rel="Index" href="index.php" />
<link rel="Start" href="../index.php" />
<link rel="Prev" href="Assignment_09.php" />
<link rel="Next" href="Assignment_11.php" />
<link rel="stylesheet" type="text/css"  href="style-all.css" />
<link rel="stylesheet" type="text/css"  media="screen"
                                        href="style-screen.css" />
<link rel="stylesheet" type="text/css"  media="print"
                                        href="style-print.css" />
</head>
<body>
<h1>Assignment 10 Solutions</h1>
<div class="whitebox">

  <p>The due date for this assignment is May 4.  But you can get full
  credit if you submit it by the cutoff date of May 9.</p>

  <ol>

    <li>Make up meaningful field names for all the pipeline registers
    in Fig. 6.27, tell each one's width, and how wide each register
    is.

<pre>
  IF/ID           ID/EX           EX/MEM          MEM/WB
  32  PC+4         1  RegWrite     1  RegWrite     1  RegWrite
  32  IR           1  MemtoReg     1  MemtoReg     1  MemtoReg
                   1  Branch       1  Branch      32  ReadData
                   1  MemRead      1  MemRead     32  ALUresult
                   1  MemWrite     1  MemWrite     5  RegisterRd
                   1  ALUSrc      32  BranchTarget
                   2  ALUOp        1  Zero
                  32  PC+4        32  ALUresult
                  32  Reg[rs]     32  Reg[rt]
                  32  Reg[rt]      5  RegisterRd
                  32  SE(Imm)
                   5  rt
                   5  td
  64  Total      146  Total      107  Total       71  Total

</pre>
    </li>
    <li>Write a pseudo-code description of the logic inside the
    "Forwarding Unit" block in Figure 6.30.  You can use
    if..then...else, and logical operators &amp;&amp;, ||, !, ==, !=
    along with pipeline register fields using the naming convention
    developed in class on May 2.
<pre>
  /*  <strong>Do register forwarding if necessary.</strong>  <em>If the two previous
   *  instructions specify the same destination register and it
   *  matches either of the current instruction's source registers,
   *  get the register value from the next stage of the pipeline. 
   *  That is, the instruction immediately preceding this one.  If
   *  just one matches, use its results. If neither matches, use
   *  the contents of the register file.</em>
   *
   *  <strong>Note:</strong> <em>Values for ForwardA and ForwardB are taken from Figure
   *  6.31, not the values used in class.</em>
   */
    <strong>par</strong> /*  <em>Determine values for ForwardA and ForwardB in parallel</em> */
    {
      <strong>if</strong> (EX.MEM.RegWrite &amp;&amp; (EX/MEM.RegisterRd == ID/EX.Rs))
      {
        ForwardA = 0b10;
      }
      <strong>else</strong>
      {
        <strong>if</strong> (MEM/WB.RegWrite &amp;&amp; (MEM/WB.RegisterRd == ID/EX.Rs))
        {
          ForwardA = 0b01;
        }
        <strong>else</strong>
        {
          ForwardA = 0b00;
        }
      }
      <strong>if</strong> (EX/MEM.RegWrite &amp;&amp; (EX/MEM.RegisterRd == ID/EX.Rt))
      {
        ForwardB = 0b 10;
      }
      <strong>else</strong>
      {
        <strong>if</strong> (MEM/WB.RegWrite &amp;&amp; (MEM/WB.RegisterRd == ID/EX.Rt))
        {
          ForwardB = 0b10;
        }
        <strong>else</strong>
        {
          ForwardB = 0b00;
        }
      }
    }
  }
</pre>
    </li>

  </ol>

</div>
<hr />
<p class="footer">Validate this page:
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

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
<head><title>Assignment 8 Solutions</title>
<style type="text/css">
  html, body { background: #ffffcc; }
  h1   { text-align: center;  }
  p { margin-left: 1em; margin-right: 2em; }
  p.footer { text-align: center; font-size: smaller; }
  div.whitebox {background:white;border:solid 1px blue; margin:1em;
  padding:1em;}
</style>
<style type="text/css" media="screen">
  body { font-family: sans-serif }
</style>
</head>
<body>
<h1>Assignment 8 Solutions</h1>
<div class="whitebox">
  <p><strong>5.1</strong>
    <br />Combinational logic only: a, b, c, h, i
    <br />Sequential logic only: f, g, j
    <br />Mixed sequential and combinational: d, e, k
  </p>

  <p><strong>Comments:</strong>  A barrel shifter is a circuit that
  can shift or rotate its inputs any number of bit positions.  The
  textbook we used prior to this one presented the design of a barrel
  shifter that used only combinational logic; basically lots of
  multiplexers.
  </p>
  <p>A comparator is a circuit that compares two numbers.  If all you
  need to know is whether they are different or not, you don't need to
  subtract one from the other.  Instead, you can do a bit-wise
  exclusive or of the two numbers and test for all zeros.  Or you can
  subtract and test for all zeros in the usual way.
  </p>
  <p>A "shift and add" multiplier uses combinational logic
  for the addition, but uses registers to hold the intermediate values
  as it uses <em>n</em> clock cycles to multiply two <em>n</em>-bit
  numbers.
  </p>
  <p>And the use of mixed sequential and combinational circuits
  to implement a finite state machine is exactly what we did earlier
  in the semester.</p>

  <p><strong>5.2</strong>

    <br /><strong>a.</strong> RegWrite = 0: All R-format instructions,
    in addition to <em>lw</em>, will not work because these
    instructions will not be able to write their results to the
    register file.

    <br /><strong>b.</strong> ALUop1 = 0: All R-format instructions
    except <em>sub</em> will not work correctly because the ALU will
    perform subtract instead of the required ALU operation.

    <br /><strong>c.</strong> ALUop0 = 0: <em>beq</em> instruction
    will not work because the ALU will perform addition instead of
    subtraction (see Figure 5.12), so the branch outcome may be wrong.

    <br /><strong>d.</strong> Branch (or PCSrc) = 0: <em>beq</em> will
    not execute correctly. The branch instruction will always be not
    taken even when it should be taken.

    <br /><strong>e.</strong> MemRead = 0: <em>lw</em> will not
    execute correctly because it will not be able to read data from
    memory.

    <br /><strong>f.</strong> MemWrite = 0: <em>sw</em> will not work
    correctly because it will not be able to write to the data memory.
    </p>

  <p><strong>5.3</strong>

    <br /><strong>a.</strong> RegWrite = 1: <em>sw</em> and
    <em>beq</em> should not write results to the register file. They
    will overwrite a random register with either the store
    instruction's effective address, the branch target address, or
    random data from the memory data read port.

    <br /><strong>b.</strong> ALUop0 = 1: <em>lw</em> and <em>sw</em>
    will not work correctly because they will perform subtraction
    instead of the addition necessary for address calculation.

    <br /><strong>c.</strong> ALUop1 = 1: <em>lw</em> and <em>sw</em>
    will not work correctly. They will perform a random operation
    depending on the least significant bits of the address field
    instead of the addition operation necessary for effective address
    calculation.

    <br /><strong>d.</strong> Branch = 1: Instructions other than
    branches (<em>beq</em>) will not work correctly if the ALU Zero
    signal is raised. An R-format instruction that produces zero
    output will branch to a random address determined by its least
    significant 16 bits.

    <br /><strong>e.</strong> MemRead = 1: All instructions will work
    correctly. (Data memory is always read, but memory data is never
    written to the register file except in the case of lw .)  However,
    if the physical memory is smaller than 2<sup>32</sup> bytes
    <em>and</em> if the "effective address" sent to the data memory is
    not within the range of addresses actually present, <em>and</em>
    if the memory generates a trap when it gets the invalid address,
    instructions that do a calculation that results in a value that is
    not a valid effective address will fail.

    <br /><strong>f.</strong> MemWrite = 1: Only <em>sw</em> will work
    correctly. The rest of instructions will store their <em>rt</em>
    or <em>rd</em> register in the data memory, which they should not
    do.  And the issues about bogus effective addresses noted above
    apply here too.

  </p>

  <p><strong>5.10</strong>  There are at least two reasonable
  approaches.  One would be to add at third set of inputs to the mux
  that selects between memory and ALU as the sources to the Write Data
  input of the register file.  This third input would be the immediate
  field of the instruction, shifted left 16 places and filled with
  zeros on the right.  Like the other shift operations we have been
  doing, this is just a matter of connecting wires properly and
  involves no additional logic to do the shifting.  But now this mux
  will need two control wires instead of just one.  The second wire
  could be made equal to 1 when the opcode is <em>lui</em> and 0 for
  all other instructions.  (Once you provide two control bits to the
  mux, there is the possibility of 4 different input sources.  By
  connecting the <em>lui</em> operand to both inputs 2 and 3, it
  doesn't matter what the value of MemtoReg would be for <em>lui</em>
  instructions.)  Thus, for this instruction, RegDst = 0; Branch = 0;
  MemRead = 0; MemtoReg = 1x; ALUOp = xx; MemWrite = 0; ALUSrc = x,
  and RegWrite = 1.</p>

  <p>The second approach would be not to change the mux going to the
  Write Data input of the register file, and to augment the ALU to
  perform a shift-left-16-and-fill-with-zero operation.  In the full
  MIPS architecture this wouldn't be too hard to do because the ALU
  would already have shift operations built in to support the
  <em>shamt</em> field of R-type instructions.  But for the design we
  have been working with, the first approach would be simpler to
  implement.</p>

  <p><strong>5.12</strong>  This instruction requires two writes to
  the register file. The only way to implement it is to modify the
  register file to have two write ports instead of one.  And there
  would have to be a separate adder for incrementing the register,
  like the one for incrementing the PC, added to the datapath because
  the main ALU is needed for computing the effective address.</p>

</div>
<hr />
<p class="footer">Validate this page: 
  <a href="http://validator.w3.org/check?uri=referer">
    <strong>XHTML</strong></a>&nbsp;
  <a href="http://jigsaw.w3.org/css-validator/check/referer">
    <strong>CSS</strong></a>
</p>
</body></html>

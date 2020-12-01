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
<head><title>CS-343 Assignment 11 Solutions</title>
<link rel= "Index" href="index.php" />
<link rel= "Start" href="../index.php" />
<link rel= "Prev"  href="Assignment_10.php" />
<link rel= "Next"  href="Assignment_12.php" />
<link rel= "Stylesheet" type="text/css"
                        href="style-all.css"    />
<link rel= "Stylesheet" type="text/css"
      media="screen"  href="style-screen.css" />
<link rel= "Stylesheet" type="text/css"
      media="print"   href="style-print.css"  />
</head>
<body>
<h1>CS-343 Assignment 11 Solutions</h1>

<div class="whitebox">
  <ol style="list-style-type: decimal;">
    <li>Define the following terms as they relate to cache memory
    systems:
      <ol style="list-style-type: lower-alpha;">
        <li>Memory Hierarchy</li>
        <li>DRAM</li>
        <li>SRAM</li>
        <li>Hit Ratio</li>
        <li>Miss Ratio</li>
        <li>Average Access Time</li>
        <li>Spatial Locality</li>
        <li>Temporal Locality</li>
        <li>Direct Mapped</li>
        <li>Write Through</li>
        <li>Write Back</li>
        <li>Valid Bit</li>
        <li>Optional (later in the chapter):
          <ol style="list-style-type: lower-roman;">
            <li>Associative</li>
            <li>Set Associative</li>
            <li>Dirty Bit</li>
            <li>Least Recently Used Algorithm</li>
          </ol></li>
      </ol>
    <div class="whitebox">

      <p class="ans"><em>Hierarchy:</em> Design of a memory system
      using different technologies at different levels.  The closer a
      level is to the CPU, the greater its cost per bit, the lower its
      access time, and the smaller its capacity.</p>

      <p class="ans"><em>DRAM</em> (Dynamic Random Access Memory): A
      high capacity and inexpensive memory technology suitable for
      implementing the main memory level of the memory hierarchy. 
      Bits are implemented as capacitors that may be either charged or
      discharged.</p>

      <p class="ans"><em>SRAM</em> (Static Random Access Memory): A
      fast but expensive memory technology suitable for implemening
      the cache levels of the memory hierarchy.  Bits are implemented
      as flip-flops.</p>

      <p class="ans"><em>Hit Ratio:</em>  The proportion of memory
      accesses that are satisfied by accessing cache without going to
      main memory.</p>

      <p class="ans"><em>Miss Ratio:</em>  1.00 - hit ratio.</p>

      <p class="ans"><em>Average Access Time:</em>  Weighted average
      of the hit ratio times the hit access time plus the miss ratio
      times the miss access time.</p>

      <p class="ans"><em>Spatial Locality:</em>  The tendency of
      programs to refer to a relatively small set of address ranges at
      a time rather than scattering accesses randomly across the
      entire address space.</p>

      <p class="ans"><em>Temporal Locality:</em>  The tendency of
      programs to access memory locations repeatedly within a given
      time frame.</p>

      <p class="ans"><em>Direct Mapped:</em>  A cache design in which
      each block of main memory is assigned to a single line of cache,
      determined by the bits in the index field of the block's memory
      address.</p>

      <p class="ans"><em>Write Through:</em>  A cache implementation
      in which write accesses are written to main memory as soon as
      they occur.</p>

      <p class="ans"><em>Write Back:</em>  A cache implementation in
      which write accesses are saved in cache and not written to
      memory until it is necessary to do so.</p>

      <p class="ans"><em>Valid Bit:</em>  A bit associated with each
      cache line that tells whether the line actually contains a block
      of main memory or not.</p>

      <p class="ans"><em>Associative:</em>  (Fully associative)  A
      cache design in which blocks of main memory may be loaded into
      any line of cache.  There is no index field in the memory
      address to select the cache line.</p>

      <p class="ans"><em>Set Associative:</em>  A cache design in
      which each block of main memory can be loaded into any one of a
      set of lines in cache.  Typical set sizes are 2 or 4.  When the
      set size is 1 the design is direct mapped, and when the set size
      is equal to the number of cache lines, the design is fully
      associative.</p>

      <p class="ans"><em>Dirty Bit:</em>  (Introduced in the virtual
      memory section of chapter 7, but may be found in some cache
      systems as well.) A bit associated with each cache line that
      tells whether it has been written to or not.  Used for write
      back designs to tell whether a line to be overwritten (the
      "victim") has to be written back to main memory or not.</p>

      <p class="ans"><em>Least Recently Used Algorithm:</em>  In a set
      associative design, the LRU algorithm may be used to select
      which line in the set is to be the victim when the set is full
      and a block being read targets that set.  Can be implemented
      associating a log<sub>2</sub>(set size)-bit register with each
      line, which is set to zero when the line is loaded.  Each time a
      line is accessed, it's register is set to zero and all other
      registers in the set with smaller values are incremented by
      one.  The least recently used line is the one with the largest
      value at any time.</p>

    </div>
    </li>
    <li>Explain the answer to the Check Yourself questions on page
    472 for all three choices.  (If by any chance you don't know that
    the answers to the Check Yourself questions are at the end of each
    chapter, well ... they are.)

      <div class="whitebox">
        <p class="ans">1.  True, it's one of the reasons hit ratios are
        so much
        greater than would be predicted by  the relative size of the
        cache compared to the size of main memory.</p>

        <p class="ans">2.  False.  The memory system returns the same
        value for a
        read request whether the value is obtained from cache or has to
        be fetched from main memory.  In fact, for correct operation of
        the computer, the value has to be the same as it would be if
        there were no cache present at all.</p>

        <p class="ans">3.  False.  Although the highest level costs the
        most per
        bit, the capacity of the highest level can be relatively small
        and yield good performance because of good hit ratios.</p>
      </div>
    </li>
    <li>Fill values for the next row of Figure 7.12.
      <div class="whitebox">

        <p class="ans">The last five rows of the table are spaced two
        years apart, so we'll use 2006 as the year for the next row.
        The chip size has doubled every two years since 1996, so we
        can expect it to double again to 2048 Mbit (256 megabytes). 
        Cost per MB has been decreasing non-linearly, but  the
        log<sub><em>e</em></sub> of the values seem to be decreasing
        somewhat linearly: 6.9, 6.0, 4.6, 3.2, 2.3.  Projecting that
        trend yields about 1.0 for the log, or about 2.8 cents per
        MB.  Linear projection of the total access time gives a value
        of 40 nsec, and it looks like the column access time will go
        to about 1 nsec.  Stay tuned for the actual results next
        year!</p>


      </div>
    </li>
    <li>Answer the following exercises from the end of chapter 7:
      7.2, 7.3, 7.4, 7.5, 7.9, 7.11, and 7.12.
      <div class="whitebox">
        <p class="ans">
          Not published.  Check your email.
        </p>
      </div>
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

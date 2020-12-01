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
<head><title>CS-343 Chapter 7 Study Guide</title>
<link rel= "Index" href="../index.php" />
<link rel= "Start" href="../../index.php" />
<link rel= "Stylesheet" type="text/css"
                        href="../style-all.css"    />
<link rel= "Stylesheet" type="text/css"
      media="screen"  href="../style-screen.css" />
<link rel= "Stylesheet" type="text/css"
      media="print"   href="../style-print.css"  />
</head>
<body>
<h1>CS-343 Chapter 7 Study Guide</h1>

<div class="whitebox">
  <h2>Disclaimer</h2>

    <p>Studying this web page will <em>not</em> prepare you for the
    final exam.  It simply lists some terms you should be familiar
    with and provides you with solutions to some homework exercises
    that can't be put on public web sites.</p>
    
    <p><strong>In addition to</strong> this material, you need to
    review all reading assignments, homework assignments/solutions,
    and class notes pertaining to chapters 6 and 7.</p>

</div>

<h2>Define Terms</h2>
<div class="whitebox">
  <p>Here are some terms you should be able to define:</p>
  <ul>
    <li><b>Memory Hierarchy</b> The division of the memory of a computer
    in to layers, with the smallest, fastest, and most expensive memory
    at the top, inside the CPU.  Data located in one level is a subset
    of the data contained in the next lower layer.</li>
    <li><b>Address Space</b>  A range of memory locations.  The address
    space of a program is the range of memory locations occupied by the
    program.</li>
    <li><b>Spatial Locality</b>  One of the factors that makes memory
    hierarchies efficient, spatial locality refers to the tendency of
    programs to access limited subsets of their address space at a
    time.</li>
    <li><b>Temporal Locality</b>  The tendency of a program to re-access
    a location or set of locations multiple times during a short time
    period.</li>
    <li><b>Cache</b>  The part of the memory hierarchy between main
    memory and the CPU.  There may be several cache layers, with L1
    being closest to the CPU, normally on the same integrated circuit. 
    L2 is typically on the same chip as the CPU in current processors,
    and L3 is typically off-chip.</li>
    <li><b>Virtual Memory</b>  The part of a memory hierachy that
    relates main memory to disk.</li>
    <li><b>Physical Memory</b>  The main memory that is actually present
    in a computer system.</li>
    <li><b>Interleaved Memory</b>  A way of organizing main memory so
    that multiple sections of memory can be accessed simultaneously.  An
    <i>n</i>-way interleaved memory allows <i>n</i> accesses
    to be initiated at the same time.</li>
    <li><b>Cache Hit</b>  A cache hit occurs when a CPU's memory access
    can be satisfied using data currently available in the cache.</li>
    <li><b>Hit Ratio</b>  The ratio of the number of cache hits to total
    number of memory accesses.</li>
    <li><b>Cache Miss</b>  A cache miss occurs when a CPU's memory
    access cannot be satisfied using data currently available in the
    cache.</li>
    <li><b>Miss Penalty</b>  The additional time it takes to satisfy a
    memory access because of a cache miss.</li>
    <li><b>Direct Mapped</b>  A cache design in which each block of main
    memory maps onto a single block of cache.  Same as set associative
    (see below) with a set size of 1.</li>
    <li><b>Set Associative</b>  A cache design in which a block of main
    memory may be found in any of a set of cache blocks.  Typical set
    sizes are 2 or 4.</li>
    <li><b>Fully Associative</b>  A cache design in which a block of
    main memory may be found in any block of cache.  The same as set
    associative with a set size equal to the total number of cache
    blocks.</li>
    <li><b>Write Back</b>  A cache management technique in which write
    operations are made to the cache, but main memory is not updated
    until the cache block contents have to be replaced with another
    block of main memory.</li>
    <li><b>Write Through</b>  A cache management technique in which
    write operations are immediately passed through to main memory,
    insuring that main memory and the cache are <i>coherent</i> (contain
    the same information).</li>
    <li><b>Cache Block</b>  The memory in a cache that can hold one
    block of main memory.  Cache block sizes for different processors
    may have values ranging from 8 to 64 bytes or words.</li>
    <li><b>Cache Line</b>  A cache block and its associated housekeeping
    data (tags, valid, and dirty bits).</li>
    <li><b>Tag Field</b>  The part of a memory address that identifies
    which block contains the address.</li>
    <li><b>Block Index Field</b>  The part of a memory address that
    tells which block or blocks of cache might contain the memory block.
    For a fully associative cache, this field is not used because a
    memory block can occupy any cache block.</li>
    <li><b>Offset Field</b>  The bits on the right end of a memory
    address that tell which byte or word within a memory block is being
    accessed.</li>
    <li><b>Page</b>  The unit of information transferred between the
    disk and main memory in a virtual memory system.  Always a multiple
    of the disk's sector size, typica page sizes range from 512 to 4096
    bytes.</li>
    <li><b>Split Cache</b>  A cache design that uses separate caches for
    instructions and data.  Also called the <i>Harvard
    Architecture</i>.</li>
    <li><b>Unified Cache</b>  A cache that holds both instructions and
    data.</li>
    <li><b>Page Table</b>  A data struture maintained by the operating
    system kernel and referenced by the CPU to translate virtual page
    addresses to physical page addresses.</li>
    <li><b>Translation Lookaside Buffer</b>  A cache of the a subset of
    the page table kept inside the CPU and managed by the processor;
    without it each memory access by a program would require two
    accesses, one to the page table and the second one to complete the
    program's memory request.</li>
    <li><b>Valid Bit</b>  In both cache and virtual memory systems, a
    bit associated with each cache block or page table entry that tells
    whether the block or page contains actual data from the next lower
    level in the hierarchy.</li>
    <li><b>Replacement Algorithm</b>  The rule used by the cache
    hardware or by the kernel's virtual memory management software to
    determine which block or page is to be invalidated because a miss
    or fault requires loading information from the next layer down in
    the hierarchy and all candidate target positions are already
    occupied.</li>
    <li><b>LRU and referece bits</b>  Least Recently Used is an
    algorithm that chooses which block or page to replace by associating
    one or more reference bits with each one.  Every time the block or
    page is accessed, the processor turns on the reference bit, and the
    victim is chosen from those blocks or pages with their reference
    bits off.  If there are multiple bits, they act as a counter that is
    set to zero on each reference, and incremented by a clock; blocks or
    pages with the largest values in their counters are the least
    recently used ones.</li>
    <li><b>Dirty Bit</b>  A bit associated with each block or page that
    tells whether it has been modified since being loaded from the next
    lower level of the hierarchy.  Used to determine whether the block
    or page has to be written back when it is replaced.</li>
    <li><b>Compulsory or cold-start miss</b>  A cache miss or page fault
    caused when a program starts running and blocks or pages haven't
    been loaded yet, misses that occur during the process of initially
    filling up the cache or physical memory.  These misses or faults
    never involve writing anything back to the next lower leve in the
    hierarchy.</li>
    <li><b>Capacity miss</b>  Misses or faults that occur because the
    cache or physical memory is full and a new block or page has to be
    brought in, replacing a block or page that is currently loaded.</li>
    <li><b>Conflict or collision miss</b>  In a less than fully
    associative cache, a miss caused by all the blocks in the target set
    being occupied, even though other blocks in the cache might (or
    might not) be free.</li>
  </ul>
</div>

<h2>Unpublished Solutions for Assignment 11</h2>
<div class="whitebox">
    
    <p>The authors provide a blanket answer for 7.2 through 7.4:</p>
    <div class="whitebox">
      <p>The key features of solutions to these problems:</p>
      <ul>
         <li>Low temporal locality for data means accessing variables
         only
         once.</li>
         <li>High temporal locality for data means accessing variables
         over
         and over again.</li>
         <li>Low spatial locality for data means no marching through
         arrays; data is scattered.</li>
         <li>High spatial locality for data implies marching through
         arrays.</li>
     </ul>
    </div>

    <p><b>7.5</b>  Use write-back for data-intensive applications. 
    There will probably be multiple writes to each block before it needs
    to be replaced, and delaying the memory update until they have all
    completed can reduce the bandwidth demands on the memory bus.  But
    for the best reliability, use write-through so the data in memory is
    always valid, and can be re-read in case of a cache failure.</p>

    <p><b>7.9</b>  2:&nbsp;miss, 3:&nbsp;miss, 11:&nbsp;miss,
    16:&nbsp;miss, 21:&nbsp;miss, 13: miss, 64:&nbsp;miss,
    48:&nbsp;miss, 19:&nbsp;miss, 11:&nbsp;hit, 3:&nbsp;miss,
    22:&nbsp;miss, 4: miss, 27:&nbsp;miss, 6:&nbsp;miss, 11:&nbsp;miss. 
    Final contents are in <b>boldface</b>:</p>

    <table class="datatable">
      <tr><th>Cache Set</th><th>Addresses</th>
      </tr>
      <tr><td>0000</td><td class="addr">16, 64, <b>48</b></td>
      </tr>
      <tr><td>0001</td><td class="addr"></td>
      </tr>
      <tr><td>0010</td><td class="addr"><b>2</b></td>
      </tr>
      <tr><td>0011</td><td class="addr">3, 19, <b>3</b></td>
      </tr>
      <tr><td>0100</td><td class="addr"><b>4</b></td>
      </tr>
      <tr><td>0101</td><td class="addr"><b>21</b></td>
      </tr>
      <tr><td>0110</td><td class="addr">22, <b>6</b></td>
      </tr>
      <tr><td>0111</td><td class="addr"></td>
      </tr>
      <tr><td>1000</td><td class="addr"></td>
      </tr>
      <tr><td>1001</td><td class="addr"></td>
      </tr>
      <tr><td>1010</td><td class="addr"></td>
      </tr>
      <tr><td>1011</td><td class="addr">11, 11(hit), 27, <b>11</b></td>
      </tr>
      <tr><td>1100</td><td class="addr"></td>
      </tr>
      <tr><td>1101</td><td class="addr"><b>13</b></td>
      </tr>
      <tr><td>1110</td><td class="addr"></td>
      </tr>
      <tr><td>1111</td><td class="addr"></td>
      </tr>
    </table>

    <p><b>7.10</b>  2:&nbsp;miss, 3:&nbsp;hit, 11:&nbsp;miss,
    16:&nbsp;miss, 21:&nbsp;miss, 13:&nbsp;miss, 64:&nbsp;miss,
    48:&nbsp;miss, 19:&nbsp;miss, 11:&nbsp;hit, 3:&nbsp;miss,
    22:&nbsp;hit, 4:&nbsp;miss, 27:&nbsp;miss, 6:&nbsp;hit,
    11:&nbsp;miss</p>

    <table class="datatable">
      <tr>
        <th>Cache Set</th><th>Addresses</th>
      </tr>
      <tr>
        <td>00</td><td class="addr">1, 3(h), 16, 64, 48, 19, 3</td>
      </tr>
      <tr>
        <td>01</td><td class="addr">21, 22(h), 4, 6(h)</td>
      </tr>
      <tr>
        <td>10</td><td class="addr">11, 11(h), 27, 11</td>
      </tr>
      <tr>
        <td>11</td><td class="addr">13</td>
      </tr>
    </table>

    <p><b>7.12</b>  Sixteen words per block is 2<sup>4</sup> *
    2<sup>5</sup> = 2<sup>9</sup> = 512 bits per block.  Each tag field
    is 32 - (8+6) = 18 bits, and there is one valid bit, so there are
    512 + 18 + 1 = 531 bits per block.  There are 256 blocks, for a
    total of 135,936 bits of storage in the cache.</p>

    <p><b>7.14</b> (Not assigned) The miss penalty is the time to
      transfer one block from main memory to the cache. Assume that it
      takes 1 clock cycle to send the address to the main memory.</p>
      <ul>
        <li>Configuration (a) requires 16 main memory accesses to
        retrieve a cache block, and words of the block are transferred 1
        at a time. Miss penalty = 1 + 16 &times; 10 + 16 &times; 1 = 177 clock
        cycles.</li>
        <li>Configuration (b) requires 4 main memory accesses to
        retrieve a cache block, and words of the block are transferred 4
        at a time. Miss penalty = 1 + 4 &times; 10 + 4 &times; 1 = 45 clock
        cycles.</li>
        <li>Configuration (c) requires 4 main memory accesses to
        retrieve a cache block, and words of the block are transferred 1
        at a time. Miss penalty = 1 + 4 &times; 10 + 16 &times; 1 = 57 clock
        cycles.</li>
      </ul>
</div>

<hr />
  <p class="footer">Validate:
    <a href="http://validator.w3.org/check?uri=referer">XHTML</a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
  </p>
</body></html>

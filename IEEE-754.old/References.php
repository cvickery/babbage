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

<head>

  <title>IEEE-754 References</title>

  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="/css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="/css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
        href="/css/style-print.css" />        


<style type="text/css">
  table
  {
    background: white; color: black;
    border: solid thin blue;
    border-collapse: collapse;
    margin: auto;
    font-size: 0.7em;
  }
  caption { font-size: 1.25em; text-align: left; padding-bottom: 0.5em; }
  td,th { border: solid thin blue; padding: 0.5em; }
  .single {background: #ffcccc; color: black;}
  .double {background: #ccffcc; color: black;}
  .quad   {background: #ccccff; color: black;}
  .kevin-text {
    background: #ccffcc;
    border:none;
    margin: 1.5em;
    padding: 0.5em;
    color: black;
    }
</style>

</head>

<body>
<h1>IEEE-754 References</h1>

<div class="whitebox">

  <p>This page provides some reference material for the IEEE-754
  floating-point standard.  It is a companion page to the three
  calculator pages:</p>
  
  <ul>
    <li><a href="./Decimal.html">Convert decimal numbers to IEEE-754
    representation.</a>  Enter a decimal value and see how it would be
    encoded as a single-precision or double-precision IEEE-754 floating
    point number.</li>

    <li><a href="./32bit.html">Analyze a single-precision IEEE-754
    value.</a>  Enter a 64-bit value in hexadecimal, and see the
    corresponding decimal value and the breakdown of all the fields.</li>

    <li><a href="./64bit.html">Analyze a double-precision IEEE-754
    value.</a>  Enter a 64-bit value in hexadecimal, and see the
    corresponding decimal value and the breakdown of all the fields.</li>
  </ul>
</div>

<h2>What's Here</h2>

<div class="whitebox">

  <ul>
    <li><a href="#history">History of the Calculators</a></li>
    <li><a href="#references">Some References</a></li>
    <li><a href="#report">Kevin's Report</a></li>
    <li><a href="#tables">Kevin's Tables</a></li>
  </ul>
</div>

<h2 id="history">History of the Calculators</h2>

<div class="whitebox">

  <p>These calculators came into being in the fall semester of 1997 when
  I assigned my Computer Organization course an optional project to
  write a program that would print the values of the fields of IEEE-754
  floating point numbers.  One student, Quanfei Wen, decided to do the
  program as an interactive web page, using Javascript to do the
  calculations.</p>

  <p>I put Quanfei's pages up on my web site as a resource for other
  students taking my Computer Organization course, where it was found by
  Keven Brewer, who was working for Delco Electronics at the time. 
  Kevin noticed some special cases that Quanfei's calculators didn't
  handle, and volunteered to work up the precise versions of the code
  that the calculators now use.  Kevin also did a web search for
  information on the IEEE-754 standard, which is included in the <a
  href="#report">Kevin's Report</a> section below.  Kevin also prepared
  some <a href="#tables">web tables</a> listing the parameters of the
  standard.</p>
  
  <p>The calculators have turned out to be a popular resource on the web
  for academics and industry alike.  I know of translations into <a
  href="http://www.zator.com/Cpp/E2_2_4a.htm ">Spanish</a> and <a
  href="http://www.telecom.fh-htwchur.ch/~zogg/">German</a>, and they
  get over 10,000 hits a month on my web server.</p>

  <p>In December 2004 I started reworking these pages to improve their
  appearance and conformance to web standards.  The javascript code
  behind them has been moved to separate files, but interested users can
  download the code from the <a href="js">js/ directory</a>.  The
  original pages, with embedded javascript code, remain available at my
  old Computer Organization <a
  href="http://babbage.cs.qc.edu/courses/cs341/IEEE-754.html">course web
  site</a>.</p>

</div>

<h2 id="references">Some References</h2>

<div class="whitebox">

  <p>"In 1976 Intel began to design a floating-point co-processor for
  its i8086/8 and i432 microprocessors. Dr. John Palmer persuaded Intel
  that it needed an arithmetic standard to prevent different boxes with
  "Intel" on the outside from computing disparate results inside. At
  Stanford ten years earlier, Palmer had heard a visiting professor,
  William Kahan, analyze commercially significant arithmetics and assess
  how much their anomalies inflated the costs of reliable and portable
  numerical software. Kahan had also enhanced the numerical prowess of a
  successful line of Hewlett-Packard calculators. Palmer, now the
  manager of Intel's floating-point effort, recruited Kahan as a
  consultant to help design the arithmetic for the i432 ( which died
  later ) and for the i8086/8's upcoming i8087 coprocessor." From <a
  href="http://www.cs.berkeley.edu/~wkahan/ieee754status/754story.html">An
  Interview with the Old Man of Floating-Point</a>, a short, facinating
  read on the development of the IEEE-754 Floating-Point standard.</p>


  <p><i>The IEEE-754 Standard for Binary Floating-Point Arithmetic</i>
  was published in 1985.  You can order a copy of the standard from <a
  href= "http://standards.ieee.org/catalog/ordering.html">the
  IEEE</a>.  The web site for the IEEE-754 is a good place to go for
  links to information about IEEE-754 and floating-point in general.</p>

  <p>A popular paper on the mathematical properties of floating-point
  numbers, including the IEEE-754 standard is <a
  href="http://www.validlab.com/goldberg/paper.pdf">What Every
  Computer Scientist Should Know About Floating-Point Arithmetic</a>,
  which is also available from <a
  href="http://docs.sun.com/app/docs/doc/800-7895">docs.sun.com</a></p>

  <p>The Q4, 1999 issue of the Intel Technology Journal had an article,
  <i><a
  href="http://developer.intel.com/technology/itj/q41999/articles/art_6.htm">IA-64
  Floating-Point operations and the IEEE standard for binary
  floating-point arithmetic,</a></i> by M. Cornea-Hasegan and B. Norin,
  which provides a summary of the IEEE-754 standard and includes a table
  of ten different floating-point formats used by Intel's 64-bit
  microprocessors (the IA-64 architecture).  Most of the article
  discusses featues of the IA-64 floating-point instruction set.</p>


  <p>A significant floating-point standard, which pre-dates the IEEE-754
  standard, is the &quot;hexadecimal encoding&quot; used on IBM
  mainframes.  This  format uses sixteen instead of two as the base to
  which the exponent is raised. The IBM S/390 G5 processor was the first
  one to integrate IBM's traditional hexadecimal encoding and IEEE-754
  in the same floating-point unit. It is described in the paper, <a
  href="http://www.research.ibm.com/journal/rd/435/schwarz.html"> <i>The
  S/390 G5 floating point unit</i></a> by E. M. Schwarz and C. A.
  Krygowski, which appeared in the IBM Journal of Research and
  Development, vol. 43, No. 5/6, September/November 1999, pp
  707-721.</p>

</div>


<hr />
<div class="kevin-text">

<div class="whitebox">
  <h2 id="report">Kevin's Report</h2>
  <p>The rest of the material on this page came from Kevin J. Brewer,
  who worked for Delco Electronics at the time he wrote it.  In addition
  to the material below, Kevin greatly refined the JavaScript code for
  the IEEE-754 Calculator page originally written by a Queens College
  student, Quanfei Wen.</p>  

  <p>At the end of this page are <a href="#kevin_chart">Kevin's
  Charts</a>, which summarize the IEEE-754 single and double precision
  formats.</p>

</div>

<div class="whitebox">

  <p>If you find a broken link in the material below, please let me
  know, especially if you know where the page has moved.  (Send mail
  to <i>vickery at babbage.cs.qc.edu</i> with "IEEE-754" in the
  Subject line.)  Where there are links that I know are broken in
  what follows, I put the broken link in [square brackets] and
  preserved Kevin's surrounding text.</p>

  <p>Kevin suggested, "Scroll up and down from the locations cited below
  in order to learn other information about the IEEE-754 standard."</p>

</div>

  <p>The source which showed me that there were actually positive and
  negative NaNs and introduced me to a new special number,
  Indeterminate, was [&nbsp;<a href=
  "http://www.research.microsoft.com/~hollasch/cgindex/coding/ieeefloat.html">this
  page</a>&nbsp;].  To find the table showing these NaNs and
  Indeterminate, use the Edit | Find... command on the string "the
  corresponding values".  Scroll up a little in order to take a look at
  the "Special Operations" table.  And right above that table is the
  list of special numbers and their meanings.</p>

  <p>The source which introduced me to the concepts of "signaling" and
  "quiet" NaNs was
  [&nbsp;http://www.cas.american.edu/~studdard/classes/fall1995/4028201/notes/17oct95/I.html&nbsp;].
  To find the section on "signaling" and "quiet" NaNs, use the Edit |
  Find... command on the string "NaNs can be signaling or quiet".</p>

  <p>The source which allowed me to distinguish between "signaling" and
  "quiet" NaNs was [&nbsp;<a href=
  "http://andrew2.andrew.cmu.edu/rfc/rfc1832.html">this page</a>&nbsp;].
  To find the section on NaNs and the encodings of other special
  numbers, use the Edit | Find... command on the string "The definition
  of NaNs".</p>

  <p>[&nbsp;<a href=
  "http://www.psc.edu/general/software/packages/ieee/ieee.html">This
  source</a>&nbsp;] shows the mathematical equations which define the
  various IEEE-754 values and ranges.</p>

  <p>The source which introduced me to IEEE-754's four rounding modes
  and the guard, round, and "sticky" bits was [&nbsp;<a href=
  "http://www.cs.umass.edu/~weems/CmpSci535/535lecture6.html">this
  page</a>&nbsp;].  To find the section on rounding, use the Edit |
  Find...  command on the string "four different rounding modes".</p>

  <p>Some sources on the Web claim that IEEE-754 specifies four
  floating-point formats in two groups, basic and extended, with a
  "single-precision" and a "double-precision" format in each of the two
  groups.  To find this information, use the Edit | Find...  command on
  the string "IEEE 754 specifies four" on
  [&nbsp;http://www.cas.american.edu/~studdard/classes/fall1995/4028201/notes/17oct95/I.html&nbsp;]
  and the Edit | Find... command on the string "The other two formats"
  on [&nbsp;<a href=
  "http://www.cs.umass.edu/~weems/CmpSci535/535lecture6.html">this
  page</a>&nbsp;].</p>

  <p>Upon reading the IEEE-754 standard, one learns from "Table 1,
  Summary of Format Parameters" on page 9 that the extended formats are
  very loosely defined with unspecified exponential biases and only
  lower bounds for precisions and exponents, while the basic formats are
  specified exactly in terms of field widths and semantics.  The
  extended formats are so loosely defined that particular
  implementations of these formats may be so different that numerical
  approximation routines using them could be non-portable.</p>

  <p>Other sources on the Web claim that IEEE-754 specifies only three
  floating-point formats, "single-precision", "double-precision", and
  "quadruple-precision".  <!-- change
  http://www.iac.tut.fi/usr/local/doc/Fortran-90/Version-2.0/f9a200_spd.txt
  to http://www.digital.com/info/SP3754/index.html --> [&nbsp;<a href=
  "http://www.iac.tut.fi/usr/local/doc/Fortran-90/Version-2.0/f9a200_spd.txt">One
  source</a>&nbsp;] shows the three IEEE-754 formats and their max and
  min values in DEC's Fortran-90 documentation.  To find the section
  on the three IEEE-754 formats, use the Edit | Find... command on the
  string "32-bit IEEE".  [&nbsp;<a href=
  "http://andrew2.andrew.cmu.edu/rfc/rfc1832.html">Another
  source</a>&nbsp;] shows the encodings of the special numbers and the
  number of bits in each field for each of the three IEEE-754 formats.
  To find the sections on the three IEEE-754 formats, use the Edit |
  Find... command on the string "For single-precision floating point
  numbers" and start scrolling down.</p>

  <p>When comparing the format parameters of "extended double-precision"
  in IEEE-754's Table 1 and those of the so-called
  "quadruple-precision", one finds that the "quadruple-precision" format
  is simply a specific instance of the "extended double-precision"
  format.  Similarly, one will note that "double-precision" is a
  specific instance of "extended single-precision".</p>

  <p>The 80-bit "extended-precision" format is used "internally" by the
  Intel 80x87 floating-point math "co-processor" in order to be able to
  shift operands back and forth without any loss of precision in the
  IEEE-754 64-bit (and 32-bit) format.  To find this information, use
  the Edit | Find... command on the string "it also implements an
  "extended-precision" format" on
  [&nbsp;http://www.cas.american.edu/~studdard/classes/fall1995/4028201/notes/17oct95/I.html&nbsp;].</p>

  <p>A source which describes the exponential bias of Intel's 80-bit
  "extended-precision" format and its usage of the additional bits it
  contains relative to the "double-precision" format is [&nbsp;<a
  href="http://webster.cs.ucr.edu/AoA/DOS/ch14/CH14-1.html#HEADING1-52">webster.cs.ucr.edu</a>&nbsp;].
  (Link updated 2005-05-03.) To find this data, use the Edit | Find...
  command on the string "In order to help ensure accuracy".</p>

  <p>[&nbsp;http://webster.cs.ucr.edu/Page_asm/ArtofAssembly/CH14/CH14-3.html&nbsp;]
  states that Intel's "extended-precision" format supports
  non-normalized numbers (values very close to zero whose most
  significant mantissa bit is not zero).  To find this support
  information, use the Edit | Find... command on the string "Normalized
  values provide".</p>

  <p>When one compares these stated and implied format parameters of
  Intel's "extended-precision" with those of "extended double-precision"
  in Table&nbsp;1, one finds that the "extended-precision" format is a
  specific instance of the "extended double-precision" format, similarly
  to the "quadruple-precision" format.</p>

<table>
<caption>
  Table 1: Expanded Summary of Format Parameters
</caption>
<colgroup class="param"   span="2" />
<colgroup class="single"  span="2" />
<colgroup class="double"  span="2" />
<colgroup class="quad"    span="2" />
<thead>
<tr><th rowspan="2">No.</th>
    <th rowspan="2">Parameter</th>
    <th colspan="6" style="background: white; color: black;">Format</th>
</tr>
<tr><th valign="bottom">
        <br /><span class="underline">Single</span></th>
    <th valign="bottom">Single<br />Extended</th>
    <th valign="bottom"><br /><span class="underline">Double</span></th>
    <th valign="bottom">Double<br />Extended</th>
    <th valign="bottom"><br /><span class="underline">Quadruple</span><sup>&nbsp;+</sup></th>
    <th valign="bottom"><br />Extended<sup>&nbsp;#</sup></th>
</tr>
</thead>
<tfoot>
  <tr>
  <td colspan="8">
    &copy; Copyright 1985 by The Institute of Electrical and
    Electronics Engineers, Inc</td>
  </tr>

  <tr><td colspan="8">
    <sup>+&nbsp;</sup>Although the "quadruple-precision" name and the
    particular parameters of its format are not specified in the
    IEEE-754 standard, it is a legally derived IEEE-754 format because
    its parameters are specific subset elements within the bounds of
    those specified for the "extended double-precision" format.</td>
  </tr>

  <tr><td colspan="8">
    <sup>#&nbsp;</sup>Like the "quadruple-precision" format, Intel's
    "extended-precision" format is a legal IEEE-754 format derived
    from the "extended double-precision" format.</td>
  </tr>

</tfoot>
<tbody>

<tr><td align="center" valign="top"><i>(1)</i></td>
    <td align="left"><i>p</i>&nbsp;&nbsp;&nbsp;(precision,<br />
       &nbsp;&nbsp;apparent&nbsp;mantissa&nbsp;width&nbsp;in&nbsp;bits)
    </td>
    <td align="right" valign="top" >24</td>
    <td align="right" valign="top" >
      &#8805;&nbsp;32</td>
    <td align="right" valign="top" >53</td>
    <td align="right" valign="top" >&#8805;&nbsp;64</td>
    <td align="right" valign="top" >113</td>
    <td align="right" valign="top" >64</td>
</tr>

<tr><td align="center" valign="top"><i>(2)</i></td>
    <td align="left">Decimal&nbsp;digits&nbsp;of&nbsp;precision<br />
                   &nbsp;&nbsp;<i>p</i>&nbsp;/&nbsp;log<sub>2</sub>(10)</td>
    <td align="right" valign="top">7.22</td>
    <td align="right" valign="top" >&#8805;&nbsp;9.63</td>
    <td align="right" valign="top" >15.95</td>
    <td align="right" valign="top" >&#8805;&nbsp;19.26</td>
    <td align="right" valign="top" >34.01</td>
    <td align="right" valign="top" >19.26</td>
</tr>

<tr><td align="center"><i>(3)</i></td>
    <td align="left">Mantissa's&nbsp;MS-Bit</td>
    <td align="right">hidden&nbsp;bit</td>
    <td align="right" >unspecified</td>
    <td align="right" >hidden&nbsp;bit</td>
    <td align="right" >unspecified</td>
    <td align="right" >hidden&nbsp;bit</td>
    <td align="right" >explicit&nbsp;bit</td>
</tr>

<tr><td align="center"><i>(4)</i></td>
    <td align="left">Actual&nbsp;mantissa&nbsp;width&nbsp;in&nbsp;bits</td>
    <td align="right">23</td>
    <td align="right" >
      &#8805;&nbsp;31</td>
    <td align="right" >52</td>
    <td align="right" >
      &#8805;&nbsp;63</td>
    <td align="right" >112</td>
    <td align="right" >64</td>
</tr>

<tr><td align="center"><i>(5)</i></td>
    <td align="left"><i>E</i><sub>max</sub></td>
    <td align="right">+127</td>
    <td align="right" >&#8805;&nbsp;+1023</td>
    <td align="right" >+1023</td>
    <td align="right" >&#8805;&nbsp;+16383</td>
    <td align="right" >+16383</td>
    <td align="right" >+16383</td>
</tr>

<tr><td align="center"><i>(6)</i></td>
    <td align="left"><i>E</i><sub>min</sub></td>
    <td align="right">-126</td>
    <td align="right" >
      &#8804;&nbsp;-1022</td>
    <td align="right" >-1022</td>
    <td align="right" >
      &#8804;&nbsp;-16382</td>
    <td align="right" >-16382</td>
    <td align="right" >-16382</td>
</tr>

<tr><td align="center"><i>(7)</i></td>
    <td align="left">Exponent&nbsp;<i>bias</i></td>
    <td align="right">+127</td>
    <td align="right" >unspecified</td>
    <td align="right" >+1023</td>
    <td align="right" >unspecified</td>
    <td align="right" >+16383</td>
    <td align="right" >+16383</td>
</tr>

<tr><td align="center"><i>(8)</i></td>
    <td align="left">Exponent&nbsp;width&nbsp;in&nbsp;bits</td>
    <td align="right">8</td>
    <td align="right" >&#8805;&nbsp;11</td>
    <td align="right" >11</td>
    <td align="right" >&#8805;&nbsp;15</td>
    <td align="right" >15</td>
    <td align="right" >15</td>
</tr>

<tr><td align="center"><i>(9)</i></td>
    <td align="left">Sign&nbsp;width&nbsp;in&nbsp;bits</td>
    <td align="right">1</td>
    <td align="right" >1</td>
    <td align="right" >1</td>
    <td align="right" >1</td>
    <td align="right" >1</td>
    <td align="right" >1</td>
</tr>

<tr><td align="center" valign="top"><i>(10)</i></td>
    <td align="left">Format&nbsp;width&nbsp;in&nbsp;bits<br />
                   &nbsp;&nbsp;<i>(9)</i>&nbsp;+&nbsp;<i>(8)</i>&nbsp;+&nbsp;<i>(4)</i></td>
    <td align="right" valign="top">32</td>
    <td align="right" valign="top" >&#8805;&nbsp;43</td>
    <td align="right" valign="top" >64</td>
    <td align="right" valign="top" >&#8805;&nbsp;79</td>
    <td align="right" valign="top" >128</td>
    <td align="right" valign="top" >80</td>
</tr>

<tr><td align="center" valign="top"><i>(11)</i></td>
    <td align="left">Range&nbsp;Magnitude&nbsp;Maximum<br />
                   &nbsp;&nbsp;2<sup><i>E</i><sub>max</sub>&nbsp;+&nbsp;1</sup></td>
    <td align="right" valign="top">3.4028E+38</td>
    <td align="right" valign="top" >&#8805;&nbsp;1.7976E+308</td>
    <td align="right" valign="top" >1.7976E+308</td>
    <td align="right" valign="top" >&#8805;&nbsp;1.1897E+4932</td>
    <td align="right" valign="top" >1.1897E+4932</td>
    <td align="right" valign="top" >1.1897E+4932</td>
</tr>

<tr><td align="center" valign="top"><i>(12)</i></td>
    <td align="left">Range&nbsp;Magnitude&nbsp;Minimum<br />
                   &nbsp;&nbsp;2<sup><i>E</i><sub>min</sub></sup></td>
    <td align="right" valign="top">1.1754E-38</td>
    <td align="right" valign="top" >&#8804;&nbsp;2.2250E-308</td>
    <td align="right" valign="top" >2.2250E-308</td>
    <td align="right" valign="top" >&#8804;&nbsp;3.3621E-4932</td>
    <td align="right" valign="top" >3.3621E-4932</td>
    <td align="right" valign="top" >3.3621E-4932</td>
</tr>

<tr><td align="center" valign="top"><i>(13)</i></td>
    <td align="left">Range&nbsp;Magnitude&nbsp;Minimum<br />
                   &nbsp;&nbsp;(Denormalized)<br />
                   &nbsp;&nbsp;2<sup><i>E</i><sub>min</sub>&nbsp;-&nbsp;<i>(4)</i></sup></td>
    <td align="right" valign="top">1.4012E-45</td>
    <td align="right" valign="top" >&#8804;&nbsp;1.0361E-317</td>
    <td align="right" valign="top" >4.9406E-324</td>
    <td align="right" valign="top" >&#8804;&nbsp;3.6451E-4951</td>
    <td align="right" valign="top" >6.4751E-4966</td>
    <td align="right" valign="top" >1.8225E-4951</td>
</tr>

<tr><td align="center"><i>(14)</i></td>
    <td align="left">FORTRAN&nbsp;Language&nbsp;Type</td>
    <td align="left">REAL*4</td>
    <td align="left" >&nbsp;</td>
    <td align="left" >REAL*8</td>
    <td align="left" >&nbsp;</td>
    <td align="left" >REAL*16</td>
    <td align="left" >REAL*10</td>
</tr>

<tr><td align="center"><i>(15)</i></td>
    <td align="left">C&nbsp;Language&nbsp;Type</td>
    <td align="left">float</td>
    <td align="left" >&nbsp;</td>
    <td align="left" >double</td>
    <td align="left" >&nbsp;</td>
    <td align="left" >long&nbsp;double</td>
    <td align="left" >long&nbsp;double</td>
</tr>
</tbody>
</table>


  <p>Other sources on IEEE-754 include:</p>

  <ul>

    <li>[&nbsp;http://spectra.eng.hawaii.edu/Courses/EE361.S95/Lectures/Lec38/lec38.3.html&nbsp;]</li>

    <li>[&nbsp;http://www.ece.uiuc.edu/~ece291/lecture/l11.html&nbsp;]</li>

    <li>[&nbsp;<a href=
    "http://civeng.carleton.ca/Courses/UnderGrad/1997-98/94.266/slides/numbers/">Carleton
    University</a>&nbsp;]</li>

    <li>[&nbsp;<a href=
    "http://www.math.grin.edu/~stone/courses/fundamentals/IEEE-reals.html">Grinnell
    College</a>&nbsp;]</li>

    <li>[&nbsp;<a href=
    "http://cch.loria.fr/documentation/IEEE754/index.html#wkahan">Papers
    on Floating-Point by William Kahan -- &quot;The Father of
    IEEE-754&quot;</a> &nbsp;]</li>

  </ul>

<hr />

<h2 id="tables">Kevin's Summary Charts</h2>

<h3>Storage Layout and Ranges of Floating-Point Numbers</h3>

  <p>IEEE-754 floating-point numbers require three component fields:
  the sign, the exponent, and the mantissa.  The exponential base is 2
  and is never stored in any way with the value in either the registers
  or memory (it is implied).  In order to allow the exponent and
  mantissa, when taken together, to vary monotonically, the signed
  exponent is represented in excess-127 unsigned form for single
  precision and excess-1023 for double precision.  This excess-127 (or
  excess-1023) representation is indicated by the variable "<i>e</i>"
  below.</p>

  <p>Since IEEE-754 floating-point numbers are stored in a <i>signed
  magnitude</i> form, the ranges and binary patterns of the positive and
  negative numbers are symmetric about the midpoint of the entire range
  of values (between the positive and negative zeros).  As a result,
  essentially any statement made in regard to the positive numbers is
  also true of the negative numbers and vice versa.</p>

  <p>The range of positive floating-point numbers is split into
  <i>normalized</i> numbers (<i>normal</i> numbers) which preserve the
  full precision of the mantissa, including the hidden bit, (24 bits for
  single precision and 53 bits for double precision) and
  <i>denormalized</i> numbers (<i>subnormal</i> numbers, so-called
  unnormalized numbers) which have from 1 to 23 significant bits for
  single precision and 1 to 52 bits for double precision.</p>

  <p>The number line tables below, which show the layout for single
  (32-bit) and double (64-bit) precision floating-point numbers and
  their special values, were inspired by the table on [&nbsp;<a href=
  "http://www.research.microsoft.com/~hollasch/cgindex/coding/ieeefloat.html">this
  page</a>&nbsp;].  To find the table on which these two are based, use
  the Edit | Find... command on the string "the corresponding values". 
  In their column headers, these tables indicate the number of bits in
  each field along with their bit ranges in square brackets.</p>

  <p>The values shown in the <b>Decimal Range</b> column of the tables
  are the end points of their respective ranges with the IEEE-754
  round-to-nearest value mode applied.  JavaScript uses IEEE-754 double
  precision floating-point with round-to-nearest value mode to perform
  all of its arithmetic operations including its input string to numeric
  conversion routine.  Therefore, by default, double (64-bit) precision
  conversions are automatically rounded to values matching these
  tables.  In order for single (32-bit) precision conversions to be
  rounded to values matching these tables, the user <i>must</i> click
  the <b>Rounded</b> button on those pages where it is present.</p>


<h3>32-bit Single Precision</h3>
<table>
<tr><th>Range&nbsp;Name</th>
    <th>Sign&nbsp;(<i>s</i>)<br />1&nbsp;[31]</th>
    <th>Exponent&nbsp;(<i>e</i>)<br />8&nbsp;[30-23]</th>
    <th>Mantissa&nbsp;(<i>m</i>)<br />23&nbsp;[22-0]</th>
    <th>Hexadecimal&nbsp;Range</th>
    <th>Range</th>
    <th>Decimal&nbsp;Range<sup>&nbsp;&sect;</sup></th>
</tr>

<tr><td align="center">Quiet<br />-NaN</td>
    <td align="center">1</td>
    <td align="center">11..11</td>
    <td align="center">11..11<br />:<br />10..01</td>
    <td align="center"><tt><b>FFFFFFFF</b></tt><br />
                     :<br /><tt><b>FFC00001</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

<tr><td align="center">Indeterminate</td>
    <td align="center">1</td>
    <td align="center">11..11</td>
    <td align="center">10..00</td>
    <td align="center"><tt><b>FFC00000</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

<tr><td align="center">Signaling<br />-NaN</td>
    <td align="center">1</td>
    <td align="center">11..11</td>
    <td align="center">01..11<br />:<br />00..01</td>
    <td align="center"><tt><b>FFBFFFFF</b></tt><br />
                     :<br /><tt><b>FF800001</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

<tr><td align="center">-Infinity<br />(Negative&nbsp;Overflow)</td>
    <td align="center">1</td>
    <td align="center">11..11</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>FF800000</b></tt></td>
    <td align="center">&lt;&nbsp;-(2-2<sup>-23</sup>)&nbsp;&times;&nbsp;2<sup>127</sup></td>
    <td align="center">&#8804;&nbsp;-3.4028235677973365E+38</td>
</tr>

<tr><td align="center"><b>Negative&nbsp;Normalized<br />
                     -1.<i>m</i> &times; 2<sup>(<i>e</i>-127)</sup></b></td>
    <td align="center">1</td>
    <td align="center">11..10<br />:<br />00..01</td>
    <td align="center">11..11<br />:<br />00..00</td>
    <td align="center"><tt><b>FF7FFFFF</b></tt><br />
                     :<br /><tt><b>80800000</b></tt></td>
    <td align="center">-(2-2<sup>-23</sup>)&nbsp;&times;&nbsp;2<sup>127</sup><br />
                     :<br />-2<sup>-126</sup></td>
    <td align="center">-3.4028234663852886E+38<br />
                     :<br />-1.1754943508222875E-38</td>
</tr>

<tr><td align="center"><b>Negative&nbsp;Denormalized<br />
                     -0.<i>m</i> &times; 2<sup>(-126)</sup></b></td>
    <td align="center">1</td>
    <td align="center">00..00</td>
    <td align="center">11..11<br />:<br />00..01</td>
    <td align="center"><tt><b>807FFFFF</b></tt><br />
                     :<br /><tt><b>80000001</b></tt></td>
    <td align="center">-(1-2<sup>-23</sup>)&nbsp;&times;&nbsp;2<sup>-126</sup><br />
                     :<br />-2<sup>-149</sup><br />
                     (-(1+2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>-150</sup>)<sup>&nbsp;*</sup></td>
    <td align="center">-1.1754942106924411E-38<br />:<br />-1.4012984643248170E-45<br />
                     (-7.0064923216240862E-46)<sup>&nbsp;*</sup></td>
</tr>

<tr><td align="center">Negative&nbsp;Underflow</td>
    <td align="center">1</td>
    <td align="center">00..00</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>80000000</b></tt></td>
    <td align="center">-2<sup>-150</sup><br />:<br />&lt;&nbsp;-0</td>
    <td align="center">-7.0064923216240861E-46<br />:<br />&lt;&nbsp;-0</td>
</tr>

<tr><td align="center"><b>-0</b></td>
    <td align="center">1</td>
    <td align="center">00..00</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>80000000</b></tt></td>
    <td align="center">-0</td>
    <td align="center">-0</td>
</tr>

<tr><td align="center"><b>+0</b></td>
    <td align="center">0</td>
    <td align="center">00..00</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>00000000</b></tt></td>
    <td align="center">0</td>
    <td align="center">0</td>
</tr>

<tr><td align="center">Positive&nbsp;Underflow</td>
    <td align="center">0</td>
    <td align="center">00..00</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>00000000</b></tt></td>
    <td align="center">&gt;&nbsp;0<br />:<br />2<sup>-150</sup></td>
    <td align="center">&gt;&nbsp;0<br />:<br />7.0064923216240861E-46</td>
</tr>

<tr><td align="center"><b>Positive&nbsp;Denormalized<br />
                     0.<i>m</i> &times; 2<sup>(-126)</sup></b></td>
    <td align="center">0</td>
    <td align="center">00..00</td>
    <td align="center">00..01<br />:<br />11..11</td>
    <td align="center"><tt><b>00000001</b></tt><br />
                     :<br /><tt><b>007FFFFF</b></tt></td>
    <td align="center">((1+2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>-150</sup>)<sup>&nbsp;*</sup><br />
                     2<sup>-149</sup><br />
                     :<br />(1-2<sup>-23</sup>)&nbsp;&times;&nbsp;2<sup>-126</sup></td>
    <td align="center">(7.0064923216240862E-46)<sup>&nbsp;*</sup><br />
                     1.4012984643248170E-45<br />:<br />1.1754942106924411E-38</td>
</tr>

<tr><td align="center"><b>Positive&nbsp;Normalized<br />
                     1.<i>m</i> &times; 2<sup>(<i>e</i>-127)</sup></b></td>
    <td align="center">0</td>
    <td align="center">00..01<br />:<br />11..10</td>
    <td align="center">00..00<br />:<br />11..11</td>
    <td align="center"><tt><b>00800000</b></tt><br />
                     :<br /><tt><b>7F7FFFFF</b></tt></td>
    <td align="center">2<sup>-126</sup><br />:<br />
                     (2-2<sup>-23</sup>)&nbsp;&times;&nbsp;2<sup>127</sup></td>
    <td align="center">1.1754943508222875E-38<br />:<br />3.4028234663852886E+38</td>
</tr>

<tr><td align="center">+Infinity<br />(Positive&nbsp;Overflow)</td>
    <td align="center">0</td>
    <td align="center">11..11</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>7F800000</b></tt></td>
    <td align="center">&gt;&nbsp;(2-2<sup>-23</sup>)&nbsp;&times;&nbsp;2<sup>127</sup></td>
    <td align="center">&#8805;&nbsp;3.4028235677973365E+38</td>
</tr>

<tr><td align="center">Signaling<br />+NaN</td>
    <td align="center">0</td>
    <td align="center">11..11</td>
    <td align="center">00..01<br />:<br />01..11</td>
    <td align="center"><tt><b>7F800001</b></tt><br />
                     :<br /><tt><b>7FBFFFFF</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

<tr><td align="center">Quiet<br />+NaN</td>
    <td align="center">0</td>
    <td align="center">11..11</td>
    <td align="center">10..00<br />:<br />11..11</td>
    <td align="center"><tt><b>7FC00000</b></tt><br />
                     :<br /><tt><b>7FFFFFFF</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

</table>

<h3>64-bit Double Precision</h3>
<table>
<tr><th>Range&nbsp;Name</th>
    <th>Sign&nbsp;(<i>s</i>)<br />1&nbsp;[63]</th>
    <th>Exponent&nbsp;(<i>e</i>)<br />11&nbsp;[62-52]</th>
    <th>Mantissa&nbsp;(<i>m</i>)<br />52&nbsp;[51-0]</th>
    <th>Hexadecimal&nbsp;Range</th>
    <th>Range</th>
    <th>Decimal&nbsp;Range<sup>&nbsp;&sect;</sup></th>
</tr>

<tr><td align="center">Quiet<br />-NaN</td>
    <td align="center">1</td>
    <td align="center">11..11</td>
    <td align="center">11..11<br />:<br />10..01</td>
    <td align="center"><tt><b>FFFFFFFFFFFFFFFF</b></tt><br />
                     :<br /><tt><b>FFF8000000000001</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

<tr><td align="center">Indeterminate</td>
    <td align="center">1</td>
    <td align="center">11..11</td>
    <td align="center">10..00</td>
    <td align="center"><tt><b>FFF8000000000000</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

<tr><td align="center">Signaling<br />-NaN</td>
    <td align="center">1</td>
    <td align="center">11..11</td>
    <td align="center">01..11<br />:<br />00..01</td>
    <td align="center"><tt><b>FFF7FFFFFFFFFFFF</b></tt><br />
                     :<br /><tt><b>FFF0000000000001</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

<tr><td align="center">-Infinity<br />(Negative&nbsp;Overflow)</td>
    <td align="center">1</td>
    <td align="center">11..11</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>FFF0000000000000</b></tt></td>
    <td align="center">&lt;&nbsp;-(2-2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>1023</sup></td>
    <td align="center">&#8804;&nbsp;-1.7976931348623158E+308</td>
</tr>

<tr><td align="center"><b>Negative&nbsp;Normalized<br />
                     -1.<i>m</i> &times; 2<sup>(<i>e</i>-1023)</sup></b></td>
    <td align="center">1</td>
    <td align="center">11..10<br />:<br />00..01</td>
    <td align="center">11..11<br />:<br />00..00</td>
    <td align="center"><tt><b>FFEFFFFFFFFFFFFF</b></tt><br />
                     :<br /><tt><b>8010000000000000</b></tt></td>
    <td align="center">-(2-2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>1023</sup><br />
                     :<br />-2<sup>-1022</sup></td>
    <td align="center">-1.7976931348623157E+308<br />
                     :<br />-2.2250738585072014E-308</td>
</tr>

<tr><td align="center"><b>Negative&nbsp;Denormalized<br />
                     -0.<i>m</i> &times; 2<sup>(-1022)</sup></b></td>
    <td align="center">1</td>
    <td align="center">00..00</td>
    <td align="center">11..11<br />:<br />00..01</td>
    <td align="center"><tt><b>800FFFFFFFFFFFFF</b></tt><br />
                     :<br /><tt><b>8000000000000001</b></tt></td>
    <td align="center">-(1-2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>-1022</sup><br />
                     :<br />-2<sup>-1074</sup><br />
                     (-(1+2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>-1075</sup>)<sup>&nbsp;*</sup></td>
    <td align="center">-2.2250738585072010E-308<br />
                     :<br />-4.9406564584124654E-324<br />
                     (-2.4703282292062328E-324)<sup>&nbsp;*</sup></td>
</tr>

<tr><td align="center">Negative&nbsp;Underflow</td>
    <td align="center">1</td>
    <td align="center">00..00</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>8000000000000000</b></tt></td>
    <td align="center">-2<sup>-1075</sup><br />:<br />&lt;&nbsp;-0</td>
    <td align="center">-2.4703282292062327E-324<br />:<br />&lt;&nbsp;-0</td>
</tr>

<tr><td align="center"><b>-0</b></td>
    <td align="center">1</td>
    <td align="center">00..00</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>8000000000000000</b></tt></td>
    <td align="center">-0</td>
    <td align="center">-0</td>
</tr>

<tr><td align="center"><b>+0</b></td>
    <td align="center">0</td>
    <td align="center">00..00</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>0000000000000000</b></tt></td>
    <td align="center">0</td>
    <td align="center">0</td>
</tr>

<tr><td align="center">Positive&nbsp;Underflow</td>
    <td align="center">0</td>
    <td align="center">00..00</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>0000000000000000</b></tt></td>
    <td align="center">&gt;&nbsp;0<br />:<br />2<sup>-1075</sup></td>
    <td align="center">&gt;&nbsp;0<br />:<br />2.4703282292062327E-324</td>
</tr>

<tr><td align="center"><b>Positive&nbsp;Denormalized<br />
                     0.<i>m</i> &times; 2<sup>(-1022)</sup></b></td>
    <td align="center">0</td>
    <td align="center">00..00</td>
    <td align="center">00..01<br />:<br />11..11</td>
    <td align="center"><tt><b>0000000000000001</b></tt><br />
                     :<br /><tt><b>000FFFFFFFFFFFFF</b></tt></td>
    <td align="center">((1+2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>-1075</sup>)<sup>&nbsp;*</sup><br />
                     2<sup>-1074</sup><br />
                     :<br />(1-2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>-1022</sup></td>
    <td align="center">(2.4703282292062328E-324)<sup>&nbsp;*</sup><br />
                     4.9406564584124654E-324<br />:<br />2.2250738585072010E-308</td>
</tr>

<tr><td align="center"><b>Positive&nbsp;Normalized<br />
                     1.<i>m</i> &times; 2<sup>(<i>e</i>-1023)</sup></b></td>
    <td align="center">0</td>
    <td align="center">00..01<br />:<br />11..10</td>
    <td align="center">00..00<br />:<br />11..11</td>
    <td align="center"><tt><b>0010000000000000</b></tt><br />
                     :<br /><tt><b>7FEFFFFFFFFFFFFF</b></tt></td>
    <td align="center">2<sup>-1022</sup><br />:<br />
                     (2-2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>1023</sup></td>
    <td align="center">2.2250738585072014E-308<br />:<br />1.7976931348623157E+308</td>
</tr>

<tr><td align="center">+Infinity<br />(Positive&nbsp;Overflow)</td>
    <td align="center">0</td>
    <td align="center">11..11</td>
    <td align="center">00..00</td>
    <td align="center"><tt><b>7FF0000000000000</b></tt></td>
    <td align="center">&gt;&nbsp;(2-2<sup>-52</sup>)&nbsp;&times;&nbsp;2<sup>1023</sup></td>
    <td align="center">&#8805;&nbsp;1.7976931348623158E+308</td>
</tr>

<tr><td align="center">Signaling<br />+NaN</td>
    <td align="center">0</td>
    <td align="center">11..11</td>
    <td align="center">00..01<br />:<br />01..11</td>
    <td align="center"><tt><b>7FF0000000000001</b></tt><br />
                     :<br /><tt><b>7FF7FFFFFFFFFFFF</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

<tr><td align="center">Quiet<br />+NaN</td>
    <td align="center">0</td>
    <td align="center">11..11</td>
    <td align="center">10..00<br />:<br />11..11</td>
    <td align="center"><tt><b>7FF8000000000000</b></tt><br />
                     :<br /><tt><b>7FFFFFFFFFFFFFFF</b></tt></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
</tr>

</table>


  <p><sup>&sect;&nbsp;</sup>Your least significant digits may
  differ.</p>

  <p><sup>*&nbsp;</sup>The minimum magnitude values of denormalized
  ranges are represented by a single significant bit (a bit whose value
  is 1) at the right hand end of its format's mantissa.  For single
  (32-bit) and double (64-bit) precision, these minimum range values are
  1.4012984643248170E-45 and 4.9406564584124654E-324 respectively.  The
  values 7.0064923216240862E-46 and 2.4703282292062328E-324 are each a
  little more than half of these minima. They are represented by one
  significant bit to the right of their format's storable mantissa and
  another 1-bit spaced the double precision's mantissa width to the
  right of the first bit.  Then, as a result of the IEEE-754
  round-to-nearest value mode's operation, these values are rounded to
  the denormalized range minimum values.</p>
</div>
<hr />

  <div id="footer">
    <p>
      <a href= "./Decimal.html">Convert Decimal Floating-Point Numbers
      to IEEE-754 Hexadecimal Representations.</a>
      <br />
      <a href= "./32bit.html">Convert IEEE-754 32-bit Hexadecimal
        Representations to Decimal Floating-Point Numbers.</a>
      <br />
      <a href= "64bit.html">Convert IEEE-754 64-bit Hexadecimal
        Representations to Decimal Floating-Point Numbers.</a>
      <br />
      <a href= "http://babbage.cs.qc.edu/">Vickery Home Page.</a>
    </p>
    <hr />
    <p>
      <a href="http://validator.w3.org/check?uri=referer">
        XHTML</a>&nbsp;-&nbsp; 
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
        CSS</a>
    </p>
    <p><em>Last updated
      <?php echo date("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME']));
      ?>.</em>
    </p>
  </div>
</body></html>

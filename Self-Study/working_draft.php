<?php
  if (  array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml") )
  {
    header("Content-type: application/xhtml+xml; charset=utf-8");
    print("<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n");
  }
  else
  {
    header("Content-type: text/html; charset=UTF-8");
  }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

  <title>Computer Science Department Self Study</title>
  <link   rel="shortcut icon" href="./favicon.ico" />
  <link   rel="stylesheet" type="text/css" media="all"
          href="css/style-all.css" />
  <link   rel="stylesheet" type="text/css" media="screen"
          href="css/style-screen.css" />
  <link   rel="stylesheet" type="text/css" media="print"
          href="css/style-print.css" />
  <script type="text/javascript" src="scripts/ss.js"></script>

  <!-- Bottom-right page footer (PDF revision date).
  This has to be here instead of in a style sheet so that PHP
  will see it and be able to format the date. -->
  <style  type="text/css" media="print">
    @page {
      @bottom-right {
        content: "<?php
          echo date('Y-m-d',
                filemtime($_SERVER['SCRIPT_FILENAME'])); ?>";
        font-style: oblique;
        font-size:  0.8em;
      }
    }
  </style>

</head>
<body>

<div id="header">
  <h1>2006 Computer Science Department Self Study</h1>
  <div id="front-page">
    <p>Computer Science Department
    <br />Personnel and Budget Committee</p>
    <p>Jennifer Whitehead, Chair
    <br />Yung Kong
    <br />Christopher Vickery
    <br />Jerry Waxman
    <br />Zhigang Xiang</p>
    <p>April, 2006</p>
    
  </div>
  <ul id="nav">
    <li><a  accesskey="I"
            tabindex="1"
            href="#introduction"><span
                  class="underlined">I</span>ntroduction</a></li>
    <li><a  accesskey="R"
            tabindex="2"
            href="#resources"><span
                  class="underlined">R</span>esources</a></li>
    <li><a  accesskey="F"
            tabindex="3"
            href="#faculty"><span
                  class="underlined">F</span>aculty</a></li>
    <li><a  accesskey="A"
            tabindex="4"
            href="#adjuncts"><span
                  class="underlined">A</span>djunct&nbsp;Faculty</a></li>
    <li><a  accesskey="C"
            tabindex="5"
            href="#curriculum"><span
                  class="underlined">C</span>urriculum</a></li>
    <li><a  accesskey="S"
            tabindex="6"
            href="#students"><span
                  class="underlined">S</span>tudents</a></li>
    <li><a  accesskey="P"
            tabindex="7"
            href="#analysis">Analysis&nbsp;and&nbsp;<span
                  class="underlined">P</span>lans</a></li>
    <li><a  accesskey="A"
            tabindex="8"
            href="#appendices"><span
                  class="underlined">A</span>ppendices</a></li>
  </ul>
  <div id="toc">
    <h2>Table of Contents</h2>
    <table  summary="Table of Contents for the document.">
      <tr>
        <td class="sec-name">Introduction</td>
        <td class="page-num"><a href="#introduction" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Resources</td>
        <td class="page-num"><a href="#resources" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Faculty</td>
        <td class="page-num"><a href="#faculty" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Adjunct Faculty</td>
        <td class="page-num"><a href="#adjuncts" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Curriculum</td>
        <td class="page-num"><a href="#curriculum" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Students</td>
        <td class="page-num"><a href="#students" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Self-Analysis and Plans</td>
        <td class="page-num"><a href="#analysis" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Web Links</td>
        <td class="page-num"><a href="#web_links" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">References</td>
        <td class="page-num"><a href="#references" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Appendix A: Course Descriptions</td>
        <td class="page-num"><a href="#appendix_a" class="toc-ref"><span
            class="xx">00</span></a></td>
      </tr>
      <tr>
        <td class="sec-name">Appendix B: Curricula Vitae</td>
        <td class="page-num">55</td>
      </tr>
      <tr>
        <td class="sec-name">Appendix C: <a
        href="http://babbage.cs.qc.edu/Self-Study/Survey_Summary.pdf">Student-Alumni
        Survey</a></td>
        <td class="page-num">175</td>
      </tr>
    </table>
  </div>
</div>
<div id="content">

  <div id="notes">
    <h2>Notes</h2>
    <div>
     <ol>

        <li><span class="TODO">Shading like this</span> identifies
        information that is either incomplete or which needs to be
        verified.  (The words &ldquo;shading like this&rdquo; should appear
        inside a shaded box in the previous sentence.)</li>

        <li>Cross references to table and figure numbers within the online
        version of this document are indicated by &ldquo;00&rdquo;
        placeholders because no currently-available web browsers (that we
        know of) support this feature of <a
        href="http://www.w3.org/TR/2003/WD-css3-content-20030514/">CSS3</a>.
        However, the <a
        href="http://babbage.cs.qc.edu/Self-Study/working_draft.pdf">PDF
        version</a> of this document was generated by a tool (<a
        href="http://yeslogic.com">Prince XML</a>) that does understand
        CSS3, and which provides proper cross-references.</li>

        <li>The online version of this document has yellow triangles (<img
        class="arrows_in_notes" src="images/dn.png" alt="down arrow" /> <img
        class="arrows_in_notes" src="images/rt.png" alt="right arrow" />)
        next to the section headings, which can be clicked on to collapse
        and expand sections of the document.  <noscript><p><strong>You do
        not have your browser&rsquo;s <em>Javascript</em> feature enabled,
        so you cannot see the yellow triangles.</strong></p></noscript></li>

      </ol>

    </div>
    
  </div>

  <div id="introduction">
    <h2><span class="section-number">Section 1 </span>Introduction</h2>

    <div class="whitebox" id="introduction-body">

      <p>This self-study is being undertaken during a period of active ferment
      that places our discipline in the center of the global shift to the
      information age and all that this shift implies for institutions of
      higher education. As liberal arts institutions such as Queens College
      adapt their curricula to the still-emerging nature of digital
      information technology in the lives and careers of our students,
      computer science plays a core, arguably unique, role in the evolution of
      these curricular shifts.</p>

      <p>We begin by placing our department&rsquo;s context within the gamut
      of fields that currently fall under the &ldquo;computer&rdquo; rubric.
      Our presentation here is based on the structures presented in a report
      called <cite>Computing Curricula 2005</cite> [<a href="#acm2005">ACM
      2005</a>], which was produced jointly by three professional
      organizations: the Association for Computing Machinery (ACM), the
      Association for Information Systems (AIS), and the Computer Society of
      the Institute of Electrical and Electronics Engineers (IEEE-CS).</p>

      <p>When our department was founded in 1971, and for another two
      decades or so after that, &ldquo;computing&rdquo; was taught in one of
      three distinct flavors: electrical engineering dealt with hardware,
      computer science dealt with software, and information systems dealt
      with automated business practices. But these fields have matured and
      expanded to the point that there are now five identifiable categories
      of undergraduate computer-related degree programs:</p>

        <ol>
          <li>Computer Engineering</li>
          <li>Computer Science</li>
          <li>Information Systems</li>
          <li>Information Technology</li>
          <li>Software Engineering</li>
        </ol>

      <p>Each of these five categories has its own particular focus, although
      they overlap to various extents in the particular topics they deal with.
      Broadly speaking, Computer Engineering emphasizes hardware design and
      implementation, Software Engineering emphasizes software design and
      implementation, Information Systems deals with the information
      processing and communication needs of businesses and other
      organizations, and Information Technology deals with the implementation
      and maintenance of organizations&rsquo; networking and computing
      infrastructure. We&rsquo;ll discuss Computer Science in a moment.</p>

      <div class="block_indent">

        <p>To make the above distinctions more concrete, consider Queens
        College as an organization conducting its &ldquo;business&rdquo; of
        providing education to our students. The Office of Converging
        Technologies (OCT) relies on the Information Technology skills of its
        employees. They provide and maintain the networking, communication,
        and computing backbone for the campus at large. Next, the College has
        a number of offices that rely heavily on the Information Systems
        skills of their employees: the Registrar&rsquo;s office and the
        Bursar&rsquo;s office to name just two. The College also deploys
        software in a wide variety of contexts, from professors&rsquo;
        individual course web pages to online registration to library
        services. All this software, whether developed informally by
        individuals or purchased from commercial software producers, depends
        on the skill sets that fall under the rubric of Software Engineering
        for the appropriateness of their designs and the robustness of their
        implementations. Finally, the computers and other hardware devices
        used in the College were designed by computer engineers.</p>

      </div>

      <p>As we mentioned above, the topics dealt with by the various
      disciplines overlap significantly. Computer engineers need to understand
      software in order to develop the hardware platforms that will support
      software systems; information technologists need to understand
      networking hardware as well as the software that controls it;
      information systems designers need to understand networking, computing
      devices, and software system capabilities to be effective.</p>

      <p>Programs of study in the various disciplines are typically offered by
      different types of higher education institutions. The distinctions are
      not hard and fast, but at least two of the cases are rather easy to
      identify: computer engineering is found in institutions with other
      engineering programs, and information systems programs are offered by
      institutions with business-oriented programs. For example, within the
      City University, City College and Baruch College fall into these two
      categories respectively. The other two disciplines discussed so far have
      less clear cut &ldquo;home bases.&rdquo;  Information technology can be
      thought of as an outgrowth of applied programs that have heretofore
      drawn on the skill sets provided by two year programs such as the
      Electrical Technology program at Queensboro Community College. As the
      field has matured, four year programs in this field are emerging to
      address the expanding skill set demands of the area.</p>

      <p>Software engineering covers perhaps the broadest range of computing
      topics of any of the five discipline areas identified by the Overview
      Report. Because it deals with software, this discipline must make
      contact with hardware in one direction. Furthermore, because software
      engineering deals with issues regarding the management of large software
      projects, it also extends to the areas of &ldquo;business
      practices&rdquo; in the other direction.</p>

      <p>So, where does this leave the computer science discipline, and why is
      computer science the most appropriate one of these five disciplines for
      a liberal arts college such as Queens College?</p>

      <p>The four disciplines discussed so far all focus closely on practical
      aspects of computing: the design of computing equipment, the design of
      software systems, the design of computer-based business systems, and the
      deployment of computer and communication infrastructures. What
      distinguishes a computer science curriculum from these others is the
      attention it gives to the theoretical underpinnings of computational
      processes. That is, the emphasis is more on the principles of computing
      than on its practice. Principles and practice are not mutually
      exclusive, and one of the goals of our department is in fact to graduate
      students who are well-qualified to work in technical positions. But by
      emphasizing principles in our course work, we aim to do far more than
      just train students for their first job. Our goal is to provide students
      with a solid basis for dealing with and adapting to the particular forms
      computing-related technology takes over the graduate&rsquo;s career
      span. We don&rsquo;t know the exact form these technological advances
      will take over the years and decades ahead, but we do know that the
      principles of information encoding, algorithmic analysis, and
      computational structures (both hardware and software) that we teach will
      continue to provide the basis for emerging digital technologies for the
      foreseeable future.</p>

      <p>The traditional goal of a liberal arts college has been to expose
      students to the key elements of the humanities, social sciences, and
      natural sciences in order to develop their skills as critical thinkers.
      By developing these skills, the liberal arts graduate can not only
      participate productively in the work force, but also handle leadership
      positions in their areas of interest as well. With the transition to an
      economic base that depends at least as much on services and information
      management as it does on production and delivery of hard goods and
      services, the traditional liberal arts education must expand to include
      technological literacy and competence as a core element. We submit that
      as the College continues the process of reviewing its core curriculum
      structure, it might well also consider revising its ten-year old <a
      href="http://qcpages.qc.cuny.edu/provost/Queens%20College%20Mission.htm">mission
      statement</a> to say &ldquo; ...to prepare students to become leading
      citizens of an increasingly global <ins>and technology-driven</ins>
      society ... .&rdquo;</p>

      <p>With their emphasis on the <em>principles of digital technology,</em>
      computer science departments nationwide are squarely at the center of
      the expanding definition of a liberal arts education. The role of the
      Computer Science Department is central to the core mission of Queens
      College.</p>

      <div id="mission-page">
        <h3>Mission Statement</h3>
        <div>

          <p>With the foregoing in mind, our department&rsquo;s mission can
          be stated as follows:</p>

          <div id="mission-statement">

            <p>The mission of the Computer Science Department is, primarily,
            to provide instruction and to conduct research in the core areas
            of computer science: software design, theoretical foundations,
            and hardware systems.  Regarding instruction, our courses for
            computer science majors are designed (a) to provide knowledge
            and skills that will enable our graduates to immediately enter
            the workforce as productive employees in the technology sector
            of the economy, and (b) to provide an understanding of the basic
            principles of computer science that will serve as a strong
            foundation for expanding and evolving their knowledge and skills
            as their careers progress.</p>

            <p>Another aspect of our mission is to teach computing-related
            courses that serve as important components of the liberal arts
            curriculum of the College.  In this regard, we are actively
            involved in cooperative programs with other departments, and
            provide service courses and minors for students who need
            instruction in various areas of applied computing, such as
            information technology and information systems.</p>

            <p>The Department also offers a master&rsquo;s degree program
            which serves computing professionals and others with bachelor's
            degrees who wish to extend their knowledge of computer science.
            Additionally, the Department is involved in preparing the next
            generation of computer science researchers by participating in
            the CUNY Ph.D. Program in Computer Science, which is housed at
            the Graduate Center.</p>

          </div>

        </div>
      </div>
    </div>
  </div>

  <div id="resources">
    <h2><span class="section-number">Section 2 </span>Resources</h2>

    <div class="whitebox">
      <h3>Current State: Department</h3>
      <div>

        <h4>Human</h4>

        <p>In addition to the <a href="#faculty">faculty</a>, the
          department has a staff of five full-time employees:</p>

        <ul>
          <li>One Higher Education Associate. Network administrator and lead
            member of the technical support team.</li>
          <li>One Higher Education Assistant.</li>
          <li>One College Assistant</li>
          <li>Two CUNY Office Assistant L-2</li>
        </ul>

        <h4>Physical</h4>

        <p><span class="run-in-heading">Site Summary: </span>The
        department is centered in the &ldquo;A&rdquo; wing of the
        Science Building. The department office is on the second
        floor, along with the chair&rsquo;s office, six faculty
        offices, an office for the HEA/HEa, an office for shared use
        by adjuncts, an office used by PhD graduate students,
        three student labs, a conference room, a networking closet, a
        storage room, and three mixed/shared-use faculty labs. Eight
        faculty offices are located on the first floor, and four more
        are located on the third floor.</p>

        <p>The department is also the primary user of a computer-equipped
        classroom in SB B-131, and is currently completing the installation
        of an additional student networking lab in A-103.</p>

        <p><span class="run-in-heading">Laboratories: </span>The
        department maintains specialized instructional labs for
        Hardware Design, Computer Graphics, Operating Systems, and
        Networking. The equipment in the Hardware Design Lab was
        purchased using funds from an NSF grant in 2003, and consists
        of eighteen high-end PCs with specialized software for logic
        circuit design, and a similar number of FPGA (Field
        Programmable Gate Array) prototyping systems. The other labs
        have been equipped primarily using funds from the
        University&rsquo;s Technology Fee charged to all students each
        semester.</p>

        <p>The department is in the process of converting a classroom into
        an instructional lab for web design using Tech Fee funds, and
        maintains mixed instructional/research labs in the areas of
        bioinformatics, genetic algorithms, information retrieval, mobile
        communications, and wireless technologies.</p>

        <p><span class="run-in-heading">Computer and Networking
        Infrastructure: </span>The network is the lifeblood of the
        department, and we are fortunate to have the technical staff
        capable of designing, installing, maintaining, and managing
        this vital resource.</p>

        <p>The network connects switches, printers, and over 200 computers
        in the department office, faculty offices, and student and research
        laboratories. Computers and software cover a wide variety of
        systems, from PCs running Windows or OS-X to workstations running
        Solaris or Linux. The network has been designed to isolate
        student-accessible computers from faculty and staff machines, while
        providing all systems with access to the Internet through a
        firewalled link to the campus network. The network supports a mix of
        Gigabit, 100 Megabit, and some legacy 10 Megabit connections.</p>

        <p>The department maintains a variety of network services for
        instructional, research, and professional purposes.  These include
        networked file systems and printers, as well as servers for standard
        Internet protocols such as HTTP, SSH, and SMTP.</p>

        <h4>Fiscal</h4>

        <p>The department receives funding from the following sources:</p>

        <ul>
          <li>Tax-Levy Funds
            <dl>

              <dt>OTPS/TS (Other Than Personnel Services / Temporary
              Services)</dt>

              <dd>Our OTPS budget for 2006-06 was $20,688, which
              includes $10,000 for an office assistant, $2,400 in PSC
              travel funds, temporary service money for tutors, and
              the remainder for equipment, supplies, and
              Xeroxing. In addition, two new hires (Reddy and Zheng)
              received start-up funds of $85,000 and $70,000
              respectively.</dd>

              <dt>Released Time Account</dt>

              <dd>The department has an account with a current balance of
              approximately $48,000 to cover certain summer salaries and
              teaching shortfalls due to released time taken by regular
              faculty.  This account is funded from both internal grants
              such as PSC-CUNY awards and from external grants.</dd>

              <dt>Maintenance</dt>

              <dd>The Sun workstations in the department cost $12,614
              to maintain annually.  This cost is covered by funds
              provided by the dean of the division.</dd>

              <dt>Graduate Assistants</dt>

              <dd>The College provides the department with funds to
              hire one Graduate Assistant A to teach eight credits a
              semester and the CUNY Graduate Center provides one
              Graduate Assistant C to teach six credits a semester.
              The number of and funding source for Grad A and Grad C
              lines can vary from year to year.  In Fall 2006 the
              department will also receive two Graduate Teaching
              Fellows from the CUNY Graduate Center who will be
              teaching 6 hours per semester.  These graduate students
              have full responsibility for the courses they teach.
              There is no funding for traditional teaching assistants
              (TAs) in the department.</dd>

            </dl>
          </li>

          <li>Non-Tax-Levy Funds
            <dl>

              <dt>Grant Overhead</dt>

              <dd>The department has about $3,400 a year available from
              overhead recoveries associated with the department&rsquo;s
              grants and contracts.</dd>

              <dt>Tech Fee</dt>

              <dd>The University collects a Technology Fee in the
              amount of $75 per full-time student per semester.
              Although the College&rsquo;s share of the fees collected
              is large, none of it is explicitly allocated to the
              department. Rather, the department, like all other
              academic departments and administrative units, applies
              for funding of &ldquo;projects&rdquo; each year.</dd>

              <dt>Queens College Foundation</dt>

              <dd>The department is able to draw about $3,000 a year
              from this account, which is funded primarily by alumni
              donations.</dd>

              <dt>Computer Associates Adjunct Assistant Professor</dt>

              <dd>The department offers one course a semester that is
              taught by an Adjunct Assistant Professor who is employed
              by Computer Associates, Inc. His teaching salary is paid
              directly to him by CA. The nominal value of this service
              is approximately $6,000 per year.</dd>

            </dl>
          </li>
        </ul>
      </div>

      <h3>Current State: College and CUNY</h3>

      <div>
        <h4>Library</h4>

        <p>Despite its close physical proximity to the <a
        href="http://qcpages.qc.cuny.edu/Library">Benjamin Rosenthal
        Library</a> (BRL), the main library at the College, the department
        relies very little on the bricks and mortar facilities provided by
        that facility. Rather, the department relies primarily on access to
        on-line information resources for its research and instructional
        information access. The campus library provides the department with
        valuable access to online technical books through a subscription to
        the <a href="http://safaribooksonline.com">Safari Bookshelf</a>. The
        College and University provide access to the online versions of many
        journals and monographs, including the Association for Computing
        Machinery&rsquo;s &ldquo;Digital Library.&rdquo; However, neither
        the College nor the University provides access to the IEEE&rsquo;s
        Electronic Library <a
        href="http://www.ieee.org/products/onlinepubs/prod/iel_overview.html">(IEL)</a>,
        nor even the IEEE&rsquo;s Computer Science Electronic Library <a
        href="http://www.ieee.org/products/onlinepubs/prod/cslspe_overview.html">(CSLSP-e)</a>.
        The IEL is a resource that would be extremely valuable to our
        faculty.</p>

        <h4>Laboratories and Computers</h4>

        <p>The Computer Science Department is, of course, totally
        dependent on computing resources in virtually every aspect of
        its instructional and operational existence. While the
        department manages its own computers for faculty and
        specialized laboratories, it relies on the College for general
        computing resources for student use; our students make heavy
        demands on campus &ldquo;computer labs&rdquo; such as those in
        the Library, in the I Building, and on the first floor of the
        Science Building. (There are no college computer labs outside
        the department that are specifically designated for use by our
        students.)</p>

        <p>With the price of a good desktop computer from brand-name
        manufacturers now less than $300 (probably less than the price of a
        semester&rsquo;s textbooks for a full-time student), we now assume
        students have access to their own computing equipment off campus. But
        not all students have laptops that they can or want to bring to the
        campus, so the college-supplied computers on campus remain
        important.</p>

        <p>The Computer Science laboratories have benefited tremendously
        from Technology Fee money, which provides funds for upgrading
        department labs every three years. Software and licenses are also
        available for teaching purposes. In addition, funds have been
        allocated for a new lab and &ldquo;smart classroom&rdquo; focusing
        on web development and computer security. Renovation of classroom SB
        A103, which will house this lab, is scheduled to begin in Summer
        2006.</p>

        <p>Research laboratory space in the department is at a premium.
        There are three main laboratory spaces (Rooms 207 A, B, and C)
        intended for research, but in fact they are used both as
        laboratories and to house shared resources like network printers and
        servers.</p>

        <h4>Networking Infrastructure</h4>

        <p>The College provides wired and wireless networking for the campus
        through the Office of Converging Technologies (OCT). As mentioned
        previously, the department maintains its own internal network
        infrastructure, but relies on the campus network for its access to
        the Internet at large. The College recently upgraded the
        Department&rsquo;s link to the campus backbone as well as some of
        its internal switches to Gigabit Ethernet, making a great
        improvement in our local area network speed.  In addition, the
        College has just completed wiring a dedicated T1 line for the
        department, allowing us to access this resource for teaching and
        research purposes where the College firewall might prevent research
        in certain risky areas, such as computer security and data
        integrity.</p>

        <p>Wireless access on campus is quite good, but many of the
        classrooms used for our classes lack both wired and wireless
        access. This is a particularly painful situation for our
        courses in networking and web design, but should be remedied
        soon as Technology Fee funds will be used to upgrade all
        classrooms on campus to &ldquo;smart classrooms&rdquo; and the
        College adds wireless access points to the Science
        Building.</p>

        <p>In 2004, the College ranked 13th nationally in
        Intel&rsquo;s first annual "Most Unwired College Campuses"
        survey. However the College&rsquo;s rank dropped to 45 in the
        current survey. As <a
        href="http://www.intel.com/personal/wireless/unwiredcampuses.htm">Intel
        notes</a>:</p>

        <p class="block_indent"> While last year many campuses had minimal
        wireless network deployment, this year&rsquo;s survey reveals that
        students are more likely to be enjoying the benefits of campus life,
        unwired. On average, 98 percent of the top 50 campuses are covered
        by a wireless network, up from 64 percent in 2004, with 74 percent
        having 100 percent wireless network coverage on campus, up from just
        14 percent last year.</p>

        <p>Intel, of course, is promulgating its products with these
        surveys, and there is no evidence we know of that correlates a
        college&rsquo;s wireless ranking with its academic standing. But our
        own networking infrastructure must integrate closely with the
        College&rsquo;s in order to provide Internet access to and from the
        department. OCT and the department must inter-operate smoothly for
        the department&rsquo;s network to operate effectively. </p>

        <p>The College and University provide email accounts for faculty and
        students. These accounts are in the process of transitioning to a
        centralized LDAP system based on IBM&rsquo;s Lotus technology.</p>

      </div>

      <h3>Effects of Current Resources</h3>

      <div>

        <p>Our discussion at this point does not include issues
        related to faculty staffing levels and workloads. But the
        resource constraints mentioned above do affect both our
        teaching and research productivity negatively. Until
        classrooms are upgraded with appropriate technologies
        (networking, media projectors, and the other accouterments of
        smart classrooms), until faculty are supported in their
        teaching by traditional TAs,  and until the library provides
        us with online access to missing resources like IEL, the
        department remains at a competitive disadvantage in terms of
        both productivity and our ability to attract high-caliber
        students.</p>

        <p>While we stress the fundamental principles underlying
        technology in our courses, we constantly update existing
        courses and revise our curriculum to make sure the
        technologies we use as our examples are current. Current
        funding levels and the uncertainty of Technology Fee funding
        make it difficult for us to keep our course offerings in sync
        with our curricular changes.</p>

        <p>Fortunately the cost of new technology tends to improve
        over time, although some of this may be an artifact of the
        recent era of low interest rate economics. As a result, we
        have been generally successful in funding and maintaining our
        instructional and research laboratory equipment. However, we
        are totally dependent on our own small technical staff for our
        very survival. We have learned that OCT is spread too thin to
        provide timely and effective support for our
        department&rsquo;s networking, computer, and software
        needs.</p>

        <p>A significant gap in current library facilities, which
        negatively impacts our research productivity, is the lack of
        electronic access to key publications of the IEEE.</p>

        <p>Current amounts of laboratory and office space are
        constraining the department.  New hires are being forced to
        use offices that have no windows.  Instructional labs serve
        double duty as part-time research labs, and we are unable to
        accommodate legitimate requests for secure research space by
        new hires because there is not enough such space available to
        the department.</p>

      </div>

      <h3>Needed Changes in Resources</h3>

      <div>

        <p>The department desperately needs access to classrooms with
        projectors and Internet connectivity. The College has made efforts
        to provide all faculty members with laptops or tablet PCs for lesson
        preparation and classroom presentations, but these computers need to
        be updated regularly.  While the need for an improved educational
        technology infrastructure holds throughout the College, it is
        particularly critical for our department, which teaches
        <em>about</em> technology as well as <em>using</em> technology. 
        Faculty working with obsolete equipment (often purchased with
        personal funding) is not satisfactory.</p>

        <p>The Technology Fee is not handled well from our
        department&rsquo;s perspective.  We understand that much of the
        difficulty arises from constraints that are outside the
        College&rsquo;s control, and we are aware that there are efforts
        underway to address some of them. But we mention here that: (1) The
        annual-proposal model for tech fee projects makes it difficult for
        us to plan intelligently.  We don&rsquo;t know whether we will be
        funded for a project next year, and we certainly are unable to
        construct plans that carry us forward for the longer term.  (2) The
        current guidelines prohibit funding for projects that teach about
        technology as opposed to projects that expand the use of technology
        for large populations of the student body.  Not only does this
        policy lead to lowest-common-denominator projects that provide
        generic resources that don&rsquo;t address the needs of <em>any</em>
        particular discipline, it has a particularly negative effect on our
        department where, truly, &rdquo;the medium (the technology) is the
        message!&rdquo;</p>

        <p>We need a budget for maintaining our research infrastructure. We
        have recently hired a number of talented young researchers, and it is
        unrealistic to expect them to be able to get outside funding for
        shared resources that the College should be providing. Network
        upgrades, servers, and even big-ticket research equipment for such
        things as image and video capture need to be acquired on an ongoing
        basis.</p>

      </div>
    </div>
  </div>

  <div id="faculty">
    <h2><span class="section-number">Section 3 </span>Full-Time Faculty</h2>

    <div class="whitebox">

      <h3><span class="section-number">Section 3.1 </span>Number</h3>

      <div>

        <p>The department currently has 21 full-time faculty members,
        including two new hires who started in the Fall 2005 semester.
        Sixteen of these 21 faculty members also hold positions as members
        of the CUNY Ph.D. Program in Computer Science. We are currently
        searching for a new assistant professor, and there is also one
        deferred replacement line.</p>

        <p>Ranks, tenure, and ages are distributed as shown in <a
        href="#faculty-ranks" class="tab-ref">Table&nbsp;<span
        class="xx">00</span></a>.</p>

        <table class="datatable" id="faculty-ranks"
					     summary="Half the CS faculty are full professors.  There
					     are twice as many assistant professors as associate
					     professors.">
          <caption>
            Distribution by rank of full-time faculty in the Computer
            Science Department.
          </caption>
          <thead>
            <tr>
              <th scope="col">Rank</th>
              <th scope="col">Number</th>
              <th scope="col" colspan="2">Tenured</th>
              <th scope="col">Avg Age</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="row">Totals</th>
              <td>21</td>
              <td>17</td>
              <td>81%</td>
              <td>49</td>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <th scope="row">Full Professor</th>
              <td>11</td>
              <td>11</td>
              <td>100%</td>
              <td>54</td>
            </tr>
            <tr>
              <th scope="row">Associate Professor</th>
              <td>3</td>
              <td>3</td>
              <td>100%</td>
              <td>47</td>
            </tr>
            <tr>
              <th scope="row">Assistant Professor</th>
              <td>5</td>
              <td>1</td>
              <td>20%</td>
              <td>38</td>
            </tr>
            <tr>
              <th scope="row">Lecturer</th>
              <td>2</td>
              <td>2</td>
              <td>100%</td>
              <td>44</td>
            </tr>
          </tbody>
        </table>

      </div>

      <h3><span class="section-number">Section 3.2 </span>Specializations
      </h3>
      <div>

        <p>The subdisciplines of computer science have traditionally been
        classified into the areas of theory, software, hardware, and
        methodology.  An important emerging area is bioinformatics, the
        application of computational principles to various aspects of
        biological research including genome, protein, and taxonomic
        analyses.  <a href="#fac-discip-tab" class="tab-ref">Table&nbsp;<span
        class="xx">00 </span></a> lists the self-reported areas of interest,
        both for teaching and for research, for all the faculty in the
        department. <a href="#fac-discip-fig"
        class="fig-ref">Figure&nbsp;<span class="xx">00</span></a> summarizes
        the data. Perhaps not unexpectedly, the department&rsquo;s main areas
        of interest and expertise lie in the traditional computer science
        areas of software and theory.</p>

        <table class="texttable" id="fac-discip-tab"
               summary="Both teaching and research expertise are strongest
               in the software and theoretical aspects of computer
               science.">

          <caption>
            Individual Faculty Members&rsquo; Research and Teaching Areas of
            Expertise. The letters B, H, M, S, T, and O indicate the areas
            of Bioinformatics, Hardware, Software, Methodology, Theory, and
            Other.
          </caption>
          <col width="15%" />
          <col width="30%" />
          <col width="30%" />
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Research</th>
              <th scope="col">Teaching</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Boklan</th>
              <td>T&nbsp;(Cryptography)</td>
              <td>T&nbsp;(Cryptography), O&nbsp;(History of Science)</td>
            </tr>
            <tr>
              <th scope="row">Brown</th>
              <td>M&nbsp;(Queuing Theory) </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <th scope="row">Chen</th>
              <td>S&nbsp;(Web Programming), M&nbsp;(Data Mining) </td>
              <td>S&nbsp;(Web Information Processing)</td>
            </tr>
            <tr>
              <th scope="row">Fluture</th>
              <td>B&nbsp;(Pattern Recognition in 3D MRI)</td>
              <td>S&nbsp;(Operating Systems, Distributed Systems),
              T&nbsp;(Discrete Structures)</td>
            </tr>
            <tr>
              <th scope="row">Ghozati</th>
              <td>H (Networks, Parallel Processing)</td>
              <td>H (Computer Architecture, Networking)</td>
            </tr>
            <tr>
              <th scope="row">Goldberg</th>
              <td>B&nbsp;(Biomedical Imaging), S&nbsp;T&nbsp;(Algorithms)
              </td>
              <td>M&nbsp;(Computer Vision), T&nbsp;(Genetic Algorithms,
                Discrete Structures)</td>
            </tr>
            <tr>
              <th scope="row">Gross</th>
              <td>M&nbsp;(Computer Vision), T&nbsp;(Compression, Digital
              Geometry)</td>
              <td>S&nbsp;T&nbsp;(Algorithms), T&nbsp;(Computability),
              O&nbsp;(Research Practicum)</td>
            </tr>
            <tr>
              <th scope="row">Kong</th>
              <td>T&nbsp;(Digital Topology)</td>
              <td>S&nbsp;(Programming Languages, Compilers),
              T&nbsp;(Discrete Structures)</td>
            </tr>
            <tr>
              <th scope="row">Kwok</th>
              <td>M&nbsp;(Information Retrieval, Statistical Language
              Processing)</td>
              <td>M&nbsp;(Information Retrieval, Statistical Language
              Processing)</td>
            </tr>
            <tr>
              <th scope="row">Lord</th>
              <td>&nbsp;</td>
              <td>S&nbsp;(Web and Database Programming,&nbsp;Assembly
              Language, Data Structures)</td>
            </tr>
            <tr>
              <th scope="row">Obreni&#263;</th>
              <td>T&nbsp;(Algorithms, Graph Embeddings)</td>
              <td>T&nbsp;(Discrete Structures, Theory of Computation),
              S&nbsp;(Databases)</td>
            </tr>
            <tr>
              <th scope="row">Phillips</th>
              <td>S&nbsp;T&nbsp;(Software Engineering, Algorithms)</td>
              <td>M&nbsp;(Image Processing, Document Understanding)</td>
            </tr>
            <tr>
              <th scope="row">Reddy</th>
              <td>B&nbsp;(Protein Analysis)</td>
              <td>B&nbsp;(Research Practicum)</td>
            </tr>
            <tr>
              <th scope="row">Ryba</th>
              <td>T&nbsp;(Computational Group Theory)</td>
              <td>S&nbsp;(Programming), T&nbsp;(Discrete Structures,
                Computability), O&nbsp;(Math courses in Math Dept., Ed
                Dept.)</td>
            </tr>
            <tr>
              <th scope="row">Sy</th>
              <td>M&nbsp;(Bayesian Probability, Inference),
              H&nbsp;S&nbsp;(Wireless)</td>
              <td>M&nbsp;(Data Mining), H&nbsp;S&nbsp;(VoIP)</td>
            </tr>
            <tr>
              <th scope="row">Vickery</th>
              <td>S&nbsp;(Web Design Standards), H&nbsp;(Logic Design
              Technologies)</td>
              <td>S&nbsp;(Systems Programming, Web Programming, Software
              Design), H&nbsp;(Hardware, Architecture and Logic
              Design)</td>
            </tr>
            <tr>
              <th scope="row">Waxman</th>
              <td>T&nbsp;(Graph Algorithms), O&nbsp;(Computer Science
              Education)</td>
              <td>S&nbsp;(Programming, Data Structures),
              S&nbsp;T&nbsp;(Algorithms)</td>
            </tr>
            <tr>
              <th scope="row">Whitehead</th>
              <td>T&nbsp;(Continuous Computational Complexity)</td>
              <td>S&nbsp;(Operating Systems, Distributed Systems),
                T&nbsp;(Theory of Computation)</td>
            </tr>
            <tr>
              <th scope="row">Xiang</th>
              <td>M&nbsp;(Graphics, Image Processing)</td>
              <td>S&nbsp;(Data Structures, Assembly Language),
              H&nbsp;(Computer Organization), M&nbsp;(Graphics) </td>
            </tr>
            <tr>
              <th scope="row">Yukawa</th>
              <td>S&nbsp;(Object Oriented Databases)</td>
              <td>S&nbsp;(Object Oriented Databases, Programming
              Languages)</td>
            </tr>
            <tr>
              <th scope="row">Zheng</th>
              <td>H&nbsp;(Wireless and Mobile Computing, Reconfigurable Systems),
                M&nbsp;(Video compression)</td>
              <td>H&nbsp;(Hardware Organization)</td>
            </tr>
          </tbody>
        </table>

        <div class="figure" id="fac-discip-fig">

          <p><img id="faculty_interests"
                  src="images/Faculty_Interests.png"
                  alt="Faculty Interests" />
          </p>

          <p class="figure_caption">Total number of faculty listing
            teaching and research interests in the areas of Hardware,
            Software, Theory, Bioinformatics, Methodology, and Other areas
            of the Computer Science discipline spectrum.</p>

        </div>

      </div>

      <h3><span class="section-number">Section 3.3 </span>Scholarship and
      Creative Activity</h3>

      <div>

        <p>The department can boast of researchers who are top-ranked
        world-wide in the areas of group theory, digital topology,
        cryptanalysis, and text retrieval.  Other faculty are actively
        productive in the areas of wireless security, vision systems, and
        algorithm design.  We have several recent new hires who are
        demonstrating strong presence in several areas of research,
        including bioinformatics, web technology, software engineering,
        embedded systems, and computer architecture. <a
        href="#schol-act-tab" class="tab-ref">Table <span
        class="xx">00</span></a> gives the number of publications in various
        categories for each full-time faculty member in the department,
        along with their internal (PSC-CUNY) and external grant activity for
        the past five years.</p>
        
        <p>Our faculty have published in dozens of different journals (over
        sixty), including publications of the ACM (<cite>Journal of the ACM,
        Computing Reviews</cite>, and <cite>Transactions on Graphics</cite>)
        and the IEEE (<cite>Transactions on Computer Vision, Transactions on
        Pattern Analysis, Transactions on Parallel and Distributed Systems,
        Transactions on Software Engineering, Transactions on Systems, Man,
        and Cybernetics, Computer</cite>, and <cite>Graphics and
        Applications</cite>).  Other journals include, among others:
        <cite>Cryptologia, SIAM Journal of Discrete Mathematics, SIAM
        Journal on Computing, Mathematical Modeling and Scientific
        Computing</cite>. Also, the Journals of: <cite>Algebra, Algorithms,
        Complexity, Computer and Information Technology, Computer Research
        and Development, Computer Vision and Image Understanding, Group
        Theory, Interconnection Networks, Logic Programming, Symbolic
        Programming</cite>,and <cite>the American Society for Information
        science</cite>, among others.</p>

        <p>Conferences at which our faculty have presented papers in the
        last several years include: <cite>ACM SIGIR Conference on Research
        and Development, ACM Symposium on Parallel Computation, American
        Mathematical Society Conference, Expert Systems In Government
        Symposium, IEEE International Conference on Systems, Man &amp;
        Cybernetics, IEEE-CS Workshop on Computer Vision, IEEE Symposium on
        Parallel Computation, INFORMS, International Conference on
        Combinatorics, Graph Theory and Computing, International Conference
        on Data Analysis, International Conference on Document Analysis and
        Recognition, NADA, NADE, SIAM, SPIE, Workshop on Computer
        Architecture Education</cite>, and <cite>Workshop on Reconfigurable
        Computing Education</cite>.</p>

        <p>The vibrancy and productivity of the department also manifests
        itself in the activities of our faculty that fall outside the usual
        measures of research productivity.  While the fundamental principles
        of computing don&rsquo;t change any more rapidly than the core areas
        of other disciplines, computing&rsquo;s manifestations in the real
        world outside of academia are evolving at an extremely rapid pace.
        For our department, this means that courses, even our core courses,
        go &ldquo;stale&rdquo; distressingly soon after their introduction
        and need constant revision on a minor or major scale in order to
        track the current state of the art.  Much of the department&rsquo;s
        strength lies in the time and energy our faculty put into keeping
        their courses up to date on an ongoing basis.</p>

        <table summary="Publication and grant activity of full-time faculty"
                class="datatable"
                id="schol-act-tab">

          <caption>Number of publications, PSC-CUNY grants, and external
          grants for current full-time faculty for the past five years.
          Missing data are for new hires. </caption>

          <col width="15%" />
         <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">In Preparation</th>
              <th scope="col">Books</th>
              <th scope="col">Book Chapters</th>
              <th scope="col">Journal Articles</th>
              <th scope="col">Conference Proceedings</th>
              <th scope="col">Other</th>
              <th scope="col">PSC-CUNY Awards</th>
              <th scope="col">No. External Grants</th>
              <th scope="col">External Grant Amounts</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="row">Sum</th>
              <td>15</td>
              <td>4</td>
              <td>6</td>
              <td>36</td>
              <td>57</td>
              <td>19</td>
              <td>13</td>
              <td>7</td>
              <td>$1,364,000</td>
            </tr>
          </tfoot>
           <tbody>
            <tr>
              <th scope="row">Boklan</th>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>4</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>1</td>
              <td>$50,000</td>
            </tr>
            <tr>
              <th scope="row">Brown</th>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Chen</th>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>8</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Fluture</th>
              <td>1</td>
              <td>0</td>
              <td>0</td>
              <td>2</td>
              <td>2</td>
              <td>1</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Ghozati</th>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Goldberg</th>
              <td>5</td>
              <td>1</td>
              <td>1</td>
              <td>10</td>
              <td>6</td>
              <td>4</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Gross</th>
              <td>0</td>
              <td>1</td>
              <td>0</td>
              <td>0</td>
              <td>1</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Kong</th>
              <td>0</td>
              <td>0</td>
              <td>1</td>
              <td>4</td>
              <td>5</td>
              <td>3</td>
              <td>0</td>
              <td>1</td>
              <td>$100,000</td>
            </tr>
            <tr>
              <th scope="row">Kwok</th>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>14</td>
              <td>1</td>
              <td>1</td>
              <td>4</td>
              <td>$1,200,000</td>
            </tr>
            <tr>
              <th scope="row">Lord</th>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Obreni&#263;</th>
              <td>0</td>
              <td>1</td>
              <td>0</td>
              <td>2</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Phillips</th>
              <td>0</td>
              <td>0</td>
              <td>1</td>
              <td>3</td>
              <td>8</td>
              <td>0</td>
              <td>3</td>
              <td>1</td>
              <td>$64,000</td>
            </tr>
            <tr>
              <th scope="row">Reddy</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <th scope="row">Ryba</th>
              <td>4</td>
              <td>1</td>
              <td>0</td>
              <td>5</td>
              <td>0</td>
              <td>0</td>
              <td>1</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Sy</th>
              <td>0</td>
              <td>0</td>
              <td>3</td>
              <td>3</td>
              <td>5</td>
              <td>3</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Vickery</th>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Waxman</th>
              <td>2</td>
              <td>0</td>
              <td>0</td>
              <td>2</td>
              <td>3</td>
              <td>2</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Whitehead</th>
              <td>2</td>
              <td>0</td>
              <td>0</td>
              <td>1</td>
              <td>0</td>
              <td>0</td>
              <td>4</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Xiang</th>
              <td>1</td>
              <td>1</td>
              <td>1</td>
              <td>0</td>
              <td>3</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Yukawa</th>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>0</td>
              <td>$0</td>
            </tr>
            <tr>
              <th scope="row">Zheng</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>

      </div>

      <h3><span class="section-number">Section 3.4 </span>Teaching
      Outside Department</h3>

      <div>

        <h4>College</h4>

        <p>The School of Education at the College offers a program
        called <em>Time 2000</em> for Secondary Education Mathematics
        students.  A.  Ryba of our department teaches two courses in
        the Time 2000 program.  One is a mathematics course, and the
        other is a specialized version of our introductory course
        geared to preparing high school teachers who will teach
        Advanced Placement courses in computer science.</p>

        <h4>Graduate School</h4>

        <p>One member of our department, Prof. T. Brown, is the executive
        officer of the Ph.D. Program in Computer Science at the CUNY Graduate
        Center.  Prof. Brown is also the director of the CUNY Institute for
        Software Design and Development at the Graduate Center; he teaches one
        course a year at the Graduate Center, but has no teaching
        responsibilities within the department at this time.</p>

        <p>Various members of the faculty teach courses at the
        Graduate Center, but not on a regular basis.  Recent offerings
        by our faculty have included courses on cryptanalysis during
        the spring terms of 2005 and 2006 by K. Boklan, a course on
        Web Information Retrieval by J.  Chen, and a course in
        Statistical Data Mining by B. Sy.</p>

        <p>In addition, six of our faculty have mentored or are
        mentoring a total of nine Ph.D. students through the graduate
        center over the past five years.  Current faculty and the
        number of students mentored are:</p>

        <table class="datatable">
          <tr><th>Kong:</th><td>1</td></tr>
          <tr><th>Chen:</th><td>2</td></tr>
          <tr><th>Goldberg:</th><td>2</td></tr>
          <tr><th>Xiang:</th><td>1</td></tr>
        </table>

      </div>

      <h3><span class="section-number">Section 3.5 </span>Analysis</h3>

      <div>

        <h4>Breadth of Preparation</h4>

        <p>As indicated previously, faculty interests cover the spectrum of
        hardware, software, theory, bioinformatics, and a variety of applied
        areas that we call &ldquo;methodology.&rdquo;  Individuals&rsquo;
        interests typically shift over time as technologies change.  While
        some researchers do maintain continuing interest in their research
        areas over many years, a large portion of our faculty are constantly
        re-educating themselves in order to keep abreast of the times.  For
        many, the specifics of one&rsquo;s preparation, except for the
        fundamental principles of science and technology learned, are soon
        nearly irrelevant because of this constant need to keep up to
        date.</p>

        <p><a href="#fac-deg-tab" class="tab-ref">Table <span
        class="xx">00</span></a> lists the institutions from which faculty
        earned their doctorate degrees, the discipline in which the degree
        was awarded, and the year.  The department can boast that fifteen
        distinct and distinguished universities around the world have
        educated our faculty.</p>

        <table  class="texttable" id="fac-deg-tab"
                summary="Twenty faculty members received their doctorate
                degrees from fifteen different universities.">
        <caption>Institutions from which full-time faculty received their
        doctoral degrees, plus the disciplines and years in which they were
        awarded. </caption>
        <col width="15%" />

        <tr>
          <th scope="col">Name</th>
          <th scope="col">Institution</th>
          <th scope="col">Discipline</th>
          <th scope="col">Year</th>
        </tr>
        <tr>
            <th scope="row">Boklan</th>
            <td>University of Michigan</td>
            <td>Mathematics</td>
            <td>1992</td>
        </tr>

        <tr>
            <th scope="row">Brown</th>
            <td>New York University</td>
            <td>Operations Research</td>
            <td>1971</td>
        </tr>

        <tr>
            <th scope="row">Chen</th>
            <td>Technical University of Munich</td>
            <td>Engineering</td>
            <td>1999</td>
        </tr>

        <tr>
            <th scope="row">Fluture</th>
            <td>City University of New York</td>
            <td>Computer Science</td>
            <td>2004</td>
        </tr>

        <tr>
            <th scope="row">Ghozati</th>
            <td>Columbia University</td>
            <td>Electrical Engineering</td>
            <td>1976</td>
        </tr>

        <tr>
            <th scope="row">Goldberg</th>
            <td>New York University (CIMS)</td>
            <td>Computer Science</td>
            <td>1989</td>
        </tr>

        <tr>
            <th scope="row">Gross</th>
            <td>Columbia University</td>
            <td>Computer Science</td>
            <td>1992</td>
        </tr>

        <tr>
            <th scope="row">Kong</th>
            <td>Oxford University</td>
            <td>Computer Science</td>
            <td>1986</td>
        </tr>

        <tr>
            <th scope="row">Kwok</th>
            <td>University of Manchester</td>
            <td>Physics</td>
            <td>1965</td>
        </tr>

        <tr>
            <th scope="row">Lord</th>
            <td>City University of New York</td>
            <td>Computer Science</td>
            <td>1995</td>
        </tr>

        <tr>
            <th scope="row">Obreni&#263;</th>
            <td>University of Massachusetts at Amherst</td>
            <td>Computer Science</td>
            <td>1993</td>
        </tr>

        <tr>
            <th scope="row">Phillips</th>
            <td>University of Maryland</td>
            <td>Computer Science</td>
            <td>1984</td>
        </tr>

        <tr>
            <th scope="row">Reddy</th>
            <td>University of Hyderabad</td>
            <td>Life Sciences</td>
            <td>1988</td>
        </tr>

        <tr>
            <th scope="row">Ryba</th>
            <td>University of Cambridge</td>
            <td>Mathematics</td>
            <td>1985</td>
        </tr>

        <tr>
            <th scope="row">Vickery</th>
            <td>City University of New York</td>
            <td>Experimental Psychology</td>
            <td>1971</td>
        </tr>

        <tr>
            <th scope="row">Waxman</th>
            <td>New York University</td>
            <td>Computer Science</td>
            <td>1973</td>
        </tr>

        <tr>
            <th scope="row">Whitehead</th>
            <td>University of Warwick</td>
            <td>Mathematics</td>
            <td>1975</td>
        </tr>

        <tr>
            <th scope="row">Xiang</th>
            <td>University of Buffalo</td>
            <td>Computer Science</td>
            <td>1988</td>
        </tr>

        <tr>
            <th scope="row">Yukawa</th>
            <td>Waterloo University</td>
            <td>Computer Science</td>
            <td>1987</td>
        </tr>

        <tr>
            <th scope="row">Zheng</th>
            <td>University of Nevada</td>
            <td>Computer Engineering</td>
            <td>2005</td>
              </tr>

        </table>

        <h4>Affirmative Action Goals</h4>

        <p>The faculty ethnic distribution is 55% white and 45% Asian.  There
        are no Blacks, Hispanics, or Native Americans represented on the
        faculty.</p>

        <p>Only 20% of our full-time faculty members are female, but this low
        proportion is in fact considerably higher than the national average
        for computer science programs.  According to current data from the <a
        href="http://www.cra.org/info/taulbee/women.html">Computing Research
        Association</a>, women accounted for 18% of newly hired, tenure-track
        lines, 16% of assistant professors, 12% of associate professors, and
        just 10% of full professors for the 2004-05 academic year.</p>

        <p>While the department has no obvious biases in the makeup of its
        faculty, especially given the ethnic and gender mix of our students,
        we actively look for opportunities to increase our diversity while
        working within the equal opportunity guidelines of the College.</p>

        <h4>Age Distribution</h4>

        <p>As <a href="#faculty-ranks" class="tab-ref">Table&nbsp;<span
        class="xx">00</span></a> shows, the average faculty age for the
        department is 49, with the expected increase in average age with
        increasing tenure-track ranks.  There seems to be no issue of concern
        with regard to age.</p>

        <p>The percentage of our faculty with tenure (80%) is higher than
        the College at large (75% according to <a
        href="http://www.qc.cuny.edu/about">the College&rsquo;s web
        site</a>) and is very  high compared to the national average for
        public research and doctoral institutions (about 45% in 1998-99
        according to the <a
        href="http://www2.nea.org/he/heupdate/vol7no3.pdf">NEA Research
        Center</a>.  The department is &ldquo;top heavy&rdquo; partly
        because we we unable to hire any new faculty members during the
        period from 1994 to 1998.</p>

        <h4><a id="service" />College Service</h4>

        <p>The department is particularly well-represented on the various
        committees of the Academic Senate.  Dr. K. Lord is chair of the
        Undergraduate Curriculum Committee and serves as Assistant to the
        Provost for Instructional Technology; in this latter position, Dr.
        Lord also serves as an ex-officio member of the Technology and Library
        Committee.  Prof. C. Vickery is chair of the Nominating Committee and
        is a member of the Technology and Library Committee.  Prof. Z. Xiang
        is a member of the Graduate Scholastic Standards Committee.</p>

      </div>

      <h3>Recent Recruitment</h3>
      <div>

        <p>We have hired four new faculty in the past three years.  Each of
        them brings an exciting dimension to the department in his own way. 
        J. Chen has a strong background in web technologies (with experience
        at Microsoft and elsewhere) as well as embedded systems design.  K.
        Boklan, with experience at the NSA, is an international authority on
        cryptanalysis.  Our newest hires, B. Reddy and J. Zheng, are
        extremely strong in the areas of bioinformatics and embedded systems
        design.</p>
        
        <p>Altogether there have been eight new-hires since 1994.  However,
        five faculty positions in our department have been vacated during
        the same period, and one member of our faculty, Prof. Brown, is now
        based at the Graduate Center (he is the Executive Officer of the
        Ph.D. Program in Computer Science).  So the effective size of our
        faculty is still much the same today as it was 12 years ago.</p>

        <h4>Search Process</h4>

        <p>Once the department has been authorized to search for a new hire,
        the department&rsquo;s Personnel and Budget Committee follows the standard
        college procedures required by the College&rsquo;s Affirmative Action
        Officer.  We advertise the position and the areas of expertise in
        which we are interested in appropriate online venues (such as the ACM
        web site), we receive resumes and letters of recommendations, we draw
        up a matrix of candidates and their qualifications, and place
        candidates into an unranked top tier, a rank-ordered list of other
        qualified candidates, and an unranked set of unqualified candidates.
        Once the Affirmative Action Officer has certified that our candidates
        have been categorized objectively, we invite all candidates from the
        top tier in for interviews and presentations of their research.  After
        these interviews we decide which of the top-tier candidates we would
        like to hire and make offers to them one at a time until we either get
        an acceptance or receive rejections from all top-tier candidates in
        whom we are interested.  If we exhaust our top-tier pool, we invite
        candidates in from the second-tier one at a time until we either make
        a successful offer or declare the search a failure.</p>

        <h4>Selection Criteria</h4>

        <p>The notion of &ldquo;selection criteria&rdquo; for our searches is
        deeply colored by the salary scale we are able to offer prospective
        candidates.  The Computer Research Association publishes an annual
        survey of faculty salaries in Computer Science, called the
        &ldquo;Taulbee Survey&rdquo; in honor of the man who first conducted
        the survey in the 1970&rsquo;s and 80&rsquo;s.</p>

        <p>The Taulbee Survey differentiates among institutions by the
        &ldquo;academic ranking&rdquo; of their computer science departments.
        The main research institutions like Stanford and MIT are in the first
        rank (top 12 institutions).  Columbia and NYU are in the second rank
        (next 12), SUNY Stony Brook is in the third rank, and the CUNY
        Graduate Center is included in the set of unranked (below 36)
        respondents to the survey.  As one might expect, salaries at higher
        ranked institutions are greater than salaries at lesser-ranked
        institutions.  That is, CUNY salaries are not competitive with
        highly-ranked schools within the New York Metropolitan region such as
        NYU and Columbia, and they are not even comparable to other public
        institutions in the area such as Stony Brook and Rutgers, which are in
        the third tier.</p>

        <p>So, how do CUNY salaries compare to salaries at other schools that
        are ranked below 36 or are unranked?  Well, the <em>maximum</em> CUNY
        Assistant Professor&rsquo;s salary is $65,388.  And the average
        <em>minimum</em> computer science assistant professor&rsquo;s salary
        among institutions that are ranked below 36 or are unranked, according
        to the most recent Taulbee Survey [<a href="#zweben2005">Zweben
        2005</a>], is $72,691.  That&rsquo;s an 11% salary disadvantage to
        start with.  When this salary disadvantage is coupled with the high
        cost of living in New York City and the relatively heavy teaching load
        required of CUNY faculty, we consider ourselves very fortunate to have
        attracted the dedicated and highly-qualified group of faculty we do
        have.  But the fact remains that those people with the best research
        potential, even those who want to be in the New York area, will
        typically look elsewhere before coming to CUNY.</p>

        <p>The department has been able to recruit highly-qualified faculty
        despite our poor competitive position.  In part this is because
        recent declines in CS enrollments nationally have made jobs scarce
        at a time when we have been fortunate enough to be hiring.  However,
        this situation is only temporary, and we anticipate greater and
        greater difficulties in attracting good people into our program as
        the economy&rsquo;s tech sector rebounds.</p>

      </div>

      <h3>Evaluation</h3>

      <div>

        <h4>Scholarly and Creative Activity</h4>

        <p>One way to improve levels of scholarly activity is to reduce
        teaching loads so that people have time to do research.  To this
        end, it is encouraging that we have been able to offer our most
        recent hires startup packages that give them the chance to establish
        levels of outside funding that might allow them to &ldquo;buy
        out&rdquo; some of their teaching responsibilities.  The flaw in
        this scheme, however, is that the department does not have a body of
        senior faculty with research programs in place that could provide
        the necessary support system for helping these junior faculty get
        established before their startup benefits give way to the teaching
        load grind imposed on the rest of the members of the department,
        college, and university.</p>

        <p>One way this situation can be turned around is for the department
        to hire senior people with established research programs.  Given
        proper funding incentives, the department should be able to recruit
        good people who are keenly interested in relocating to the New York
        metropolitan region.  We regularly receive applications from such
        people when we advertise our searches, but we have not been authorized
        to hire such much-needed talent in the past.  Without infusion at the
        top, the department will remain primarily a teaching body rather than
        a strong center of scholarship.</p>

        <h4>Teaching</h4>

        <p>Teaching is our strength but, as indicated above, it drains our
        scholarly resources. <a href="#teaching_load"
        class="tab-ref">Table&nbsp;<span class="xx">00 </span></a> shows the
        teaching loads for each department in the Division of Mathematics
        and Natural Sciences.  As the columns labeled &ldquo;Load&rdquo;
        indicate, our department has the highest teaching load in the
        division at the undergraduate level.</p>

        <table  class="datatable"
                id="teaching_load"
                summary="The Computer Science Department has the highest
                teaching load in the division.">

          <caption>Teaching loads in the Queens College Division of
          Mathematics and Natural Sciences.  Data are taken from the 2004-05
          edition of the Queens College Fact Book [<a href="#qc2005">QC
          2005</a>], &ldquo;Teaching Load Analysis - Derived Data,&rdquo;
          pages 198-208.</caption>

          <thead>
            <tr>
              <th scope="col" rowspan="2">Department</th>
              <th scope="col" colspan="5">Undergraduate</th>
              <th scope="col" colspan="5">Master&rsquo;s</th>
              <th scope="col" colspan="2">Doctoral</th>
            </tr>

            <tr>
              <th scope="col">Number of<br/>FTE Faculty</th>
              <th scope="col">Load<br/>(hrs/wk)</th>
              <th scope="col">FT Hrs</th>
              <th scope="col">PT Hrs</th>
              <th scope="col">% PT</th>
              <th scope="col">Number of<br/>FTE Faculty</th>
              <th scope="col">Load<br/>(hrs/wk)</th>
              <th scope="col">FT Hrs</th>
              <th scope="col">PT Hrs</th>
              <th scope="col">% PT</th>
              <th scope="col">Number of<br/>FTE Faculty</th>
              <th scope="col">Load<br/>(hrs/wk)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Biology</th>
              <td>19.4</td>
              <td>10.8</td>
              <td>108.0</td>
              <td>127.3</td>
              <td>54.1</td>
              <td>4.1</td>
              <td>8.2</td>
              <td>26.9</td>
              <td>11.0</td>
              <td>29.0</td>
              <td>1.7</td>
              <td>6.0</td>
            </tr>

            <tr>
              <th scope="row">Chemistry</th>
              <td>18.5</td>
              <td>8.6</td>
              <td>42.8</td>
              <td>183.1</td>
              <td>81.1</td>
              <td>1.7</td>
              <td>10.5</td>
              <td>18.2</td>
              <td>0.0</td>
              <td>0.0</td>
              <td>1.4</td>
              <td>9.0</td>
            </tr>

            <tr>
              <th scope="row">Computer Science</th>
              <td><strong>20.8</strong></td>
              <td><strong>11.4</strong></td>
              <td><strong>126.0</strong></td>
              <td><strong>131.5</strong></td>
              <td><strong>51.1</strong></td>
              <td><strong>8.7</strong></td>
              <td><strong>8.6</strong></td>
              <td><strong>67.2</strong></td>
              <td><strong>12.0</strong></td>
              <td><strong>15.2</strong></td>
              <td><strong>1.7</strong></td>
              <td><strong>5.6</strong></td>
            </tr>

            <tr>
              <th scope="row">EES</th>
              <td>9.7</td>
              <td>9.4</td>
              <td>62.3</td>
              <td>38.0</td>
              <td>37.9</td>
              <td>4.9</td>
              <td>5.1</td>
              <td>22.9</td>
              <td>6.0</td>
              <td>20.8</td>
              <td>0.6</td>
              <td>8.6</td>
            </tr>

            <tr>
              <th scope="row">Mathematics</th>
              <td>37.1</td>
              <td>9.0</td>
              <td>208.4</td>
              <td>185.5</td>
              <td>47.1</td>
              <td>4.9</td>
              <td>7.6</td>
              <td>37.0</td>
              <td>0.0</td>
              <td>0.0</td>
              <td>2.1</td>
              <td>1.7</td>
            </tr>

            <tr>
              <th scope="row">FNES</th>
              <td>26.2</td>
              <td>8.5</td>
              <td>74.0</td>
              <td>230.6</td>
              <td>75.7</td>
              <td>6.3</td>
              <td>9.3</td>
              <td>45.6</td>
              <td>19.0</td>
              <td>29.4</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <th scope="row">Physics</th>
              <td>15.4</td>
              <td>7.5</td>
              <td>57.6</td>
              <td>97.0</td>
              <td>62.7</td>
              <td>0.9</td>
              <td>9.4</td>
              <td>3.0</td>
              <td>8.0</td>
              <td>72.7</td>
              <td>0.4</td>
              <td>5.9</td>
            </tr>

            <tr>
              <th scope="row">Psychology</th>
              <td>23.6</td><td>10.4</td>
              <td>144.9</td>
              <td>129.0</td>
              <td>47.1</td>
              <td>6.3</td>
              <td>10.6</td>
              <td>61.3</td>
              <td>3.0</td>
              <td>4.7</td>
              <td>6.5</td>
              <td>9.5</td>
            </tr>

            <tr>
              <th scope="row">Division Average</th>
              <td><strong>21.3</strong></td>
              <td><strong>9.5</strong></td>
              <td><strong>103.0</strong></td>
              <td><strong>140.3</strong></td>
              <td><strong>57.7</strong></td>
              <td><strong>4.7</strong></td>
              <td><strong>8.7</strong></td>
              <td><strong>35.3</strong></td>
              <td><strong>7.4</strong></td>
              <td><strong>17.3</strong></td>
              <td><strong>2.1</strong></td>
              <td><strong>6.6</strong></td>
            </tr>

            <tr>
              <th scope="row">College Sum/Avg</th>
              <td>556.7</td>
              <td>9.1</td>
              <td>2896.9</td>
              <td>3089.4</td>
              <td>51.6</td>
              <td>191.5</td>
              <td>8.0</td>
              <td>1110.9</td>
              <td>654.7</td>
              <td>37.1</td>
              <td>49.6</td>
              <td>7.0</td>
            </tr>
          </tbody>
        </table>

        <p>Over half of the teaching in our department is performed by
        adjuncts.  As <a href="#teaching_load"
        class="tab-ref">Table&nbsp;<span class="xx">00 </span></a> shows,
        our department is about average compared with the rest of our
        division in this regard.  However, were we to attempt to obtain
        accreditation for our program, <em>this fact would disqualify
        us</em>.  The Computing Accreditation Commission (<a
        href="http://www.abet.org">ABET</a>) specifically requires: [<a
        href="#abet2005">ABET 2005</a>, page 2]</p>

        <blockquote>
          <p>III-2. Full-time faculty members must oversee all course work.
          <br />III-3. Full-time faculty members must cover most of the
          total classroom instruction.</p>
        </blockquote>

        <p>With graduate student adjuncts carrying full responsibility for
        many of the courses, it is very difficult to assure high levels of
        expertise in the classroom. And with full-time faculty stretched thin
        covering their own heavy course loads, there is little
        &ldquo;bandwidth&rdquo; available for monitoring and mentoring
        adjuncts to be sure they deliver the best quality instruction
        possible. Furthermore, this use of teaching assistantships as a way of
        funding the equivalent of adjunct teaching staff means there are no
        teaching assistants in the traditional sense to help full-time faculty
        meet the demands of their own courses.</p>

        <h4>Service</h4>

        <p>As pointed out in the <a href="#service">analysis of departmental
        service</a>, our department is a particularly strong contributor to
        various college committees and administrative functions.</p>

      </div>

      <h3>Faculty Development</h3>

      <div>

        <p>Faculty development is a critical issue for the Computer Science
        Department.  We reiterate here the point that the fundamental
        principles of computing change no more rapidly than the fundamental
        principles of other disciplines, but the manifestations of these
        principles change much more quickly.  If we were to present
        fundamental principles to our students in the context of
        yesterday&rsquo;s technology we would appear to be teaching
        irrelevancies instead of the unchanging truths that they are.  To
        track today&rsquo;s technologies requires constant monitoring of
        current trends and constant development of new technological skills
        on the part of faculty.</p>

        <p>Just as our teaching cannot be allowed to stagnate, so too with
        our research efforts.  In this regard we are not so different from
        other disciplines in the sciences.  Arguably, computer science is
        subject to shorter term shifts in what the &ldquo;hot&rdquo;
        research topics are than other disciplines.  Regardless, keeping up
        with current trends in one&rsquo;s research area requires a
        tremendous amount of effort.  What seems to be special to computer
        science compared to other disciplines, however, is that faculty
        typically change the entire focus of their research more often than
        other scientists.  We don&rsquo;t have hard data to support this
        assertion, but within our department we have seen numerous examples
        of faculty members who were hired when they worked in one area and
        who had switched to another one even before they were awarded
        tenure.</p>

        <p>Aside from self-study, the major vehicle for faculty development
        is participation in events ranging from traditional workshops and
        conferences to more prosaic trade shows and vendor presentations. 
        Aside from the time commitment required, there is a need for travel
        funds to support these efforts.  One of our needs is to increase the
        availability of these funds to allow our faculty to take greater
        advantage of the opportunities available for attending a range of
        such events on an ongoing basis.</p>

        <h4>Staff Development</h4>

        <p>As an aside to the issue of faculty development, we would like to
        point out that our department also needs to address the issue of staff
        development as well.  Maintaining the research and teaching
        infrastructure of a computer science department requires staff who are
        able to go beyond conventional IT skills to make sure that our
        networks, software, and computing platforms are all maintained,
        planned, and coordinated to meet the demands of faculty members who
        are intimately involved with various aspects of computing technology
        that extend far beyond the normal realm of a typical
        organization&rsquo;s information infrastructure.</p>

        <p>We have been fortunate in being able to hire two individuals who
        provide excellent support for the unique nature of our infrastructure.
        But like any IT professionals, they need access to regular training
        to keep their skills in tune with current technologies.
        Furthermore, such training is perceived as in important job benefit that
        is necessary for keeping high-quality staff on board.  Released time and
        funding for these individuals to attend workshops, training sessions,
        and vendor presentations are critical for the vitality of the department
        and must be fully funded.</p>

        <h4>Research and Funding</h4> <p>We are fortunate to have several
        world-class researchers in our department.  Our most productive
        member in terms of outside funding is K. L. Kwok, whose work on
        natural language information retrieval has obtained over a million
        dollars in DARPA funding over the past five years.  Several junior
        faculty members are currently bringing their research programs up to
        speed and actively engaged in efforts to attract outside funding. 
        And a number of our faculty regularly take advantage of the
        resources available through the Professional Staff Congress - City
        University of New York (PSC-CUNY) Research Award Program.</p>

        <p>The University Committee on Research Awards, a faculty committee,
        distributes the PSC-CUNY Research Award Program awards, and the
        Research Foundation of CUNY administers them.  Preference is given
        to junior faculty in the allocation of funds, which generally amount
        to a few thousand dollars a year per awardee.</p>

      </div>
    </div>
  </div>

  <div id="adjuncts">
    <h2><span class="section-number">Section 4 </span>Adjunct Faculty</h2>

    <div class="whitebox">

      <h3>Recruitment</h3>
      <div>

        <p>We draw our adjunct faculty from two pools: CUNY graduate
        students, and professionals drawn from local industry.  There is
        very little in the way of recruitment in the case of graduate
        students: they generally come to us as part of the process of being
        students.  In some cases, adjuncts who began as graduate students
        have stayed on as adjuncts even after completing their graduate
        studies.</p>

        <p>So far, we have not actively recruited adjuncts from industry. 
        We have one adjunct line that is paid for by Computer Associates
        that covers a CA employee who teaches for us.  Otherwise, there are
        only two adjuncts who come to us from industry and one whose primary
        affiliation is another college. They have been teaching for us for a
        number of years.</p>

      </div>

      <h3>Selection</h3>
      <div>

        <p>The selection process for adjuncts occurs infrequently enough that it
        is not formalized.  If we need someone to cover a course and can&rsquo;t find
        a graduate student who is qualified and capable of managing it, the
        chair engages in an informal process of evaluating unsolicited resumes,
        recommendations from colleagues, and similar approaches to try to locate
        a suitable individual who matches our needs.</p>

      </div>

      <h3>Supervision and Development</h3>
      <div>

        <p>We generally treat our adjuncts as responsible and self-sufficient
        individuals.  We maintain syllabi of all courses that we offer and and
        make sure that new adjuncts receive copies of the appropriate material
        and discuss the nature of the course with one of the full-time faculty
        members who is most familiar with the course.  By making a full-time
        faculty member the adjunct&rsquo;s point of contact for curricular matters
        we insure that the adjunct will not be left to flounder.</p>

      </div>

      <h3>Evaluation</h3>
      <div>

        <p>Adjuncts are included in the course evaluation process based on a
        questionnaire distributed by the College.  The Personnel and Budget
        committee reviews the results of these questionnaires, as well as
        unsolicited feedback we regularly receive from students, in determining
        whether to reappoint adjunct faculty to their positions. Over the years
        we have established a &ldquo;working set&rdquo; of adjuncts who are a
        valuable resource for the department.</p>

      </div>
    </div>
  </div>

  <div id="curriculum">

    <h2><span class="section-number">Section 5 </span>Curriculum and
    Enrollments</h2>

    <div class="whitebox">

      <h3><span class="section-number">Section 5.1 </span>Enrollments</h3>

      <div>

        <p>Following the &ldquo;Dot.com Bust&rdquo; of 2000-01, computer
        science enrollments declined nationwide, and at Queens as well.
        Nationally, &ldquo;the number of newly declared CS majors has
        declined for the past four years and is now 39 percent lower than in
        the Fall of 2000. Enrollments have declined 7 percent in each of the
        past two years.&rdquo; [<a href="#vegso2005">Vegso 2005</a>] At
        Queens, from 1995 to the peak of the dot-com boom in 2000, the
        department&rsquo;s number of annual FTE students increased 78%,
        while from 2001 to 2005 the number decreased 50%. More recently, the
        total number of students in all sections of our undergraduate
        courses decreased 17 per cent for the Spring 2006 semester compared
        to a year earlier.  At the same time there was an enrollment drop of
        4 per cent in the enrollments in our Master&rsquo;s courses for
        those two semesters.</p>

        <p>Although we think of ourselves as a normal department within the
        College&rsquo;s liberal arts curriculum, we must admit that students
        tend to view us as &ldquo;the place to go if you want a job in
        technology,&rdquo; and our enrollments are subject to the vagaries
        of the economy and perceived availability of jobs in technology.</p>

        <div class="figure" id="qc-num-maj-fig">
          <img  id="number_majors"
                src="images/Majors.png"
                alt="Graph showing number of majors." />
          <p class="figure_caption">Number of Queens College Computer Science
          Majors: 1994-2004.  Data are for students registered for the BS and
          BA degrees, the combined BA-MA degree, and the MA degree.</p>
        </div>

        <div class="figure" id="national-num-maj-fig">
          <img  id="natl_number_majors"
                src="images/national_majors_1971-2004.jpg"
                alt="National data for number of computer science majors since
                1971" />
          <p class="figure_caption">National data for number of Computer
          Science majors since 1971, taken from [<a href="#vegso2005">Vegso
          2005</a>].</p>
        </div>

        <p>The department offers two undergraduate majors, one leading to
        the BA degree and another leading to the BS.  These are described
        more fully in the <a href="#majors">Programs for Majors</a> section
        below. We also offer a combined BA-MA degree option, as well as a
        separate MA degree.  <a href="#qc-num-maj-fig"
        class="fig-ref">Figure&nbsp;<span class="xx">00</span></a> shows the
        enrollment trends for all of these degrees over the past decade.
        What appears to be most interesting about this data is the
        difference between the trends for BA and BS degree enrollments.  BA
        enrollments have been declining at a smooth rate of about 5% a year
        over the period shown, while the number of BS majors closely
        parallels the national trend shown in the right-hand part of <a
        href="#national-num-maj-fig" class="fig-ref">Figure&nbsp;<span
        class="xx">00</span></a>.  However, the explanation for the
        difference between the BA and BS trends is simply that the BS option
        is a recent addition to our curriculum, having been offered for the
        first time in 1993, just one year before the data presented in <a
        href="#qc-num-maj-fig" class="fig-ref">Figure&nbsp;<span
        class="xx">00</span></a> begin. Students generally prefer the BS
        option, and the left side of the figure reflects the ramping up of
        the new degree option at the expense of the BA.</p>

        <p><a href="#degrees_awarded_figure"
        class="fig-ref">Figure&nbsp;<span class="xx">00</span></a> shows the
        number of bachelor&rsquo;s and master&rsquo;s degrees in Computer
        Science awarded over the past ten years.  These data lag the current
        number of majors and instead reflect the state of the &ldquo;degree
        pipeline&rdquo; rather than current enrollments.  As such, the trends
        for the bachelor&rsquo;s degrees are still continuing upward, whereas
        the master&rsquo;s degree function has already peaked, reflecting the
        shorter pipeline for the 1-2 year master&rsquo;s pipeline compared to
        the 4+ year pipeline for the bachelor&rsquo;s degrees.  Most
        importantly, however, the data suggest that our students are
        completing their degree requirements in a timely fashion.</p>

        <div class="figure" id="degrees_awarded_figure">
          <img  src="images/Degrees_Awarded.png"
                alt="Graph showing number of degrees awarded." />
          <p class="figure_caption">Number of CS degrees awarded: 1994-2004.
          Data are for the sum of BA and BS degrees, and the MA degree.</p>
        </div>

        <h4 class="break-before">Minors</h4>

        <p>We present the data for the number of Computer Science minors in
        <a href="#num-min-fig"
        class="fig-ref">Figure&nbsp;<span class="xx">00</span></a>.  There is
        no clear trend over the time span shown.  Given the small number of
        students who are registered for the program, we feel that there is
        little significance to the variations that are seen there.</p>

        <div class="figure" id="num-min-fig">
          <img src="images/Minors.png"
               alt="Graph showing number of minors." />
          <p class="figure_caption">Number of CS Minors: 1996-2004.  Data for
          our new CIT minor are not yet available.</p>
        </div>

        <p>In addition to the CS minor, which is a proper subset of the BA
        major, the department has a new &ldquo;Computer Information
        Technology&rdquo; (CIT) minor that was fully implemented for the first
        time during the 2005 academic year.  Although there is no data
        available for this program yet, we think it holds considerable promise
        for attracting more students into the department.  The CIT is
        described more fully in the <a href="#minors">Programs for
        Non-Majors</a> section below.</p>

        <h4 class="break-before">FTEs</h4>

        <p><a href="#FTEs-fig" class="fig-ref">Figure&nbsp;<span
        class="xx">00</span></a> presents the number of Full-Time Equivalent
        (FTE) students served by the department since 1984.  Comparing that
        figure with national data for the comparable time interval in <a
        href="#national-num-maj-fig" class="fig-ref">Figure&nbsp;<span
        class="xx">00</span></a> shows that our department&rsquo;s number of
        FTE&rsquo;s has closely paralleled the national trend for number of
        CS majors as well as our own number of majors.</p>

        <div class="figure" id="FTEs-fig">
          <img  src="images/FTEs.png"
                alt="Graph showing number of FTEs." />

          <p class="figure_caption">Number of CS FTE&rsquo;s: 1984-2004. 
          Note the parallel to the total number of students majoring in
          Computer Science in the United States for the same time period,
          shown in Figure <a href="#national-num-maj-fig"
          class="fig-ref"><span class="xx">00</span></a>.</p>

        </div>

        <p>The latest figures available put the number of FTE students in
        the department (Bachelor&rsquo;s and Master&rsquo;s combined) at
        357.  This ranks us fourth in our division, with Psychology,
        Mathematics, and FNES ahead of us and four other departments behind
        us.</p>

      </div>

      <h3 class="break-before"><span class="section-number">Section 5.2
      </span>Curriculum: Contributions of Department to College
      Programs</h3>

      <div>

        <h4>General Education</h4>

        <p><span class="run-in-heading">Division: </span>Currently we
        are contributing one course to the Division of Mathematics and
        Natural Sciences, a History of Science course being taught by
        K. Boklan.</p>

        <p><span class="run-in-heading">College: </span>A. Ryba of our
        department currently teaches a section of our introductory
        course especially structured for the mathematics students in
        the School of Education&rsquo;s Time 2000 program.</p>

        <p>Computer Science 12 is our main service course for the college.
        Each semester hundreds of students take this course to learn
        fundamental concepts in various aspects of computing, including
        instruction in basic computing skills from word processing to basic
        web design.  A critical feature of the design of this course is that
        we present all material in the context of accurate models of
        computation.  Rather than just rote rules about how to perform
        tasks, we stress how to reason about getting tasks done using
        available computing resources.</p>

        <h4>LASAR</h4>

        <p>All courses in the Computer Science majors satisfy the
        &ldquo;Scientific Methodology and Quantitative Reasoning&rdquo; LASAR
        requirement for the BA and BS degrees.  With the ongoing revision of the
        General Education requirements currently being undertaking at the
        College, we hope to integrate our department&rsquo;s offerings with a
        more up to date view of the role of technology as one of the core
        elements of a liberal education today.</p>

        <h4>Evening Division</h4>

        <p>It has been a long-standing policy of the department to accommodate
        the needs of the many students who have work commitments that make it
        impossible for them to attend classes during the day.  We offer evening
        sections of all courses needed to complete both of our undergraduate
        majors.  Although evening sections are more often taught by adjuncts
        than day sections, many evening sections are taught by full-time
        faculty.</p>

        <h4>Weekend College</h4>

        <p>For the past three semesters, between 55 and 60 students have
        taken the Weekend College version of CS-12, our service course for
        non-majors.  The course has been taught by an adjunct each time it
        has been offered.</p>

        <h4>Summer Session</h4>

        <p>The department offers most of the core courses within our majors
        during the summer, and typically includes several electives as well.
        The teaching is about evenly divided between adjuncts and full-time
        faculty.</p>

        <p><span class="run-in-heading">Interdisciplinary Offerings:
        </span> As science and technology have become core elements of
        the fabric of society, it has become essential to integrate an
        understanding of them in the education of tomorrow&rsquo;s
        leaders.  Although there is an important role to be played by
        the pure computer science major, it is also critical now more
        than ever to integrate the department&rsquo;s perspective on
        all things technical with the broader educational process at
        large.</p>

        <p>In this context, we are excited at developments that are
        unfolding in cooperation with the Biology Department.  Several of
        our faculty, including M. Song (who recently left the department)
        and R. Goldberg have been engaged in joint research with Biology
        faculty and one of our most recent hires, B. Reddy, is actively
        involved in developing research-oriented courses that focus on
        issues in Bioinformatics.  We feel that courses like these, as well
        as the ones we tailor to the needs of other programs on campus, such
        as the Time 2000 course mentioned earlier, are important avenues for
        integrating computing principles into the liberal arts curriculum at
        the College.</p>


        <p><span class="run-in-heading">MA/PhD: </span>The department
        offers its own Master of Arts degree in Computer Science,
        described in the <a href="#masters">Master&rsquo;s Degree
        Section</a>.  We do not offer any courses as part of any other
        Master&rsquo;s program at the College.</p>

        <p>Over three-quarters of our faculty are members of the Graduate
        Faculty of the CUNY Ph.D. Program in Computer Science, headquartered
        at the Graduate Center. However we do not offer any 800-level
        courses at Queens at this time.</p>

        <h4>Graduate School</h4>

        <p><span class="run-in-heading">Academic, Administrative, and
        Financial Roles: </span>Queens CS faculty teach some
        courses at the Graduate Center, as mentioned elsewhere in this
        document.  In addition, also mentioned elsewhere in this
        document, the Executive Officer of the Ph.D. Program in
        Computer Science at the Graduate Center is T. Brown of our
        department.  Dr. Brown also serves as the director of the CUNY
        Institute for Software Design and Development, a position he
        holds independently of his position as EO of the Ph.D.
        program.</p>

      </div>

      <h3><span class="section-number">Section 5.3 </span><a id="majors"
      />Curriculum: Programs for Majors</h3>

      <div>

        <h4>Outline</h4>

        <p>We provide our diverse student body with a two-layered curriculum
        for the CS major (BA or BS), which consists of a primary core and a
        flexible extension.  The primary core focuses on the fundamentals of
        hardware (computer organization, assembly programming, computer
        architecture), software (OOP, data structures, databases, principles
        of programming languages, software engineering, OS), and theory
        (discrete structures, design and analysis of algorithms, theory of
        computation). These topics ensure a solid and long-lasting
        foundation in the scientific principles of computing both for
        graduate study in CS and for a career as a computing
        professional.</p>

        <p>This primary core is augmented with elective courses that extend
        into numerous areas of application as well as frontiers of active
        research and development, including bioinformatics, cryptography, data
        mining, internet and web technologies.</p>

        <p>Additional enhancements come from the math (calculus, probability
        and statistics) and lab-based science requirements.  Students are also
        encouraged to supplement their classroom training with internships in
        a variety of organizations, ranging from software companies (e.g., CA
        Inc.) to financial institutions to city/state agencies.</p>

        <p>With the permission of the department, students may work on a
        research project and receive elective credits.  Outstanding students
        can take Honors Readings, Honors Problems, or Honors Thesis as an
        elective.</p>

        <p>The two degree options, BA and BS, differ in that the BS also
        requires linear algebra, has a more demanding lab sequence, and calls
        for five CS electives instead of three.</p>

        <h4>Typical Student Paths Through Major</h4>
        <div>

          <p>We offer two undergraduate majors in computer science, one
          leading to the Bachelor of Arts degree and the other to the Bachelor
          of Science.  <a href="#ba-structure-fig"
          class="fig-ref">Figure&nbsp;<span class="xx">00</span></a> shows the
          prerequisite structure for the BA degree program, and <a
          href="#bs-structure-fig" class="fig-ref">Figure&nbsp;<span
          class="xx">00</span></a> shows the prerequisite structure for the BS
          degree.</p>

          <div class="figure" id="ba-structure-fig">

            <img  src="images/2005-BA.png"
                  alt="Prerequisite Structure for BA" />
            <p class="figure_caption">Prerequisite Structure for the BA
              degree.  The diagram includes all required courses.</p>
          </div>

          <div class="figure" id="bs-structure-fig">
            <img  src="images/2005-BS.png"
                  alt="Prerequisite Structure for BS" />
            <p class="figure_caption">Prerequisite Structure for the BS
              degree.  The diagram includes all required courses.</p>
          </div>

          <p>Students in both majors generally start with CS111 and a required
          math course, followed by 200-level, 300-level core, and 300-level
          elective courses.  They also take the lab-based science courses and
          the College-required liberal arts courses along the way.</p>

          <p>Transfer students from community colleges typically have CS111,
          one or two math courses, and two or three of the required 200-level
          courses. They simply start with what they don&rsquo;t have at the
          200-level and proceed from there.</p>

        </div>

        <h4>Analysis of Major</h4>
        <div>

          <p><span class="run-in-heading">LASAR: </span>Our students
          receive rigorous training in computer science and
          information technology along with a well-rounded liberal
          arts education.  Every CS course satisfies the Scientific
          Methodology and Quantitative Reasoning area requirement of
          LASAR.</p>

          <p><span class="run-in-heading">General Degree Requirements:
          </span>Students who take internships to gain real-world
          experience receive general elective credits towards their
          degree.</p>

          <p><span class="run-in-heading">Advanced and Integrated
          Study: </span>CS students may elect to double major, with
          the most likely choices being math+CS and accounting+CS.
          Courses required by both majors can then be applied towards
          both sets of requirements.</p>

          <p><span class="run-in-heading">Diversity of Talents/Ways of
          Learning: </span>Each semester we strive to offer a rich set
          of electives that cater to the diverse interests/talents of
          our students and reflect the dynamic and multi-faceted
          nature of the discipline.  For example, in Spring 2006 we
          have: Bioinformatics, Cryptography II, Data Communications,
          Data Mining and Warehousing, Distributed Systems,
          Information Organization and Retrieval, Internet and Web
          Technologies, Internet Security, Mobile Computing, Next
          Generation Network Services, Numerical Methods, Object
          Oriented Databases, and Voice Over IP/WLAN.</p>

          <p><span class="run-in-heading">Quality of Advisement:
          </span>We have several designated undergraduate advisers
          with office hours both during the day and in the evening.
          We also have an assistant chair for undergraduate studies
          who is the primary contact person for such matters as
          transfer credit evaluation and graduation approval.  The
          assistant chair is a member of the departmental curriculum
          committee, which is headed by the department&rsquo;s deputy
          chair.  This enables any special needs to be addressed
          consistently and expeditiously by people who are
          responsible for curriculum issues.  The students may also
          drop by the department office to seek help from the office
          staff (general information, registration, etc.), and to meet
          the department chair whenever necessary.</p>

          <p>In order to somewhat alleviate the problem of having no
          teaching assistants to coach students who encounter technical
          difficulties in their study, we solicit students in good academic
          standing to serve as tutors.  They are paid ~$10/hr by the
          department.</p>

          <p><span class="run-in-heading">Student/Faculty Contact
          Outside Class: </span>All full-time faculty are available to
          meet students during published office hours and/or by
          appointment.  In addition, students can send inquiries by
          email at any time, and talk to professors before/after
          classes.</p>

          <p>The department participates in all College-sponsored advising
          activities including open house, transfer credit evaluation, and
          sophomore day.</p>

          <p><span class="run-in-heading">Relationship between Major
          and Specialized or Pre-Professional Programs:
          </span>Students with a GPA of at least 3.5 over 15 or more
          credits in courses required for the major may apply for the
          accelerated BA/MA program, which permits them to use up to
          four of the required graduate core courses towards both the
          BA and the MA degrees in CS. Students in the BA/MA program
          pay the undergraduate tuition for the graduate courses until
          they complete a total of 120 credits.  As a result, rather
          than taking 150 credits for both degrees (120 for the BA and
          30 for the MA) students may earn both degrees with a minimum
          of 138 credits.</p>

        </div>

        <h4>Courses Appended</h4>

        <p>There are three sources of information about the courses offered
        by the department:</p>

        <ol>

          <li>The official course listings are in the College Bulletin, which
          is available online at <a
          href="http://www.qc.cuny.edu/college_bulletins/106971.pdf">
          www.qc.edu/college_bulletins</a>, and reproduced in <a
          href="#appendix_a">Appendix A</a> of this document.</li>

          <li>The department keeps a list of courses, degree requirements,
          special topics course descriptions, and other information on its
          website at <a href="http://www.cs.qc.edu">www.cs.qc.edu</a></li>

          <li>Most faculty maintain their own web sites for the courses they
          teach.  <a
          href="http://www.cs.qc.edu/courseweb/courselinks.html">Links to these
          individual pages</a> are kept on the department&rsquo;s web site.</li>

        </ol>

        <h4>Comparison with Other Institutions</h4>

        <p><a href="#other_institutions" class="tab-ref">Table&nbsp;<span
        class="xx">00</span></a> compares the BS degree requirements of our
        department with three comparable public institutions and one private
        institution in the New York metropolitan region.</p>

        <p><span class="run-in-heading">Inside CUNY: </span>Brooklyn
        College and City College are very similar to QC in terms of
        institutional organization, general student body, and overall
        academic reputation.</p>

        <p>Our BS program is more demanding and rigorous than that of Brooklyn
        College.  This is evidenced by our requiring OOP in two widely-used
        languages, algorithm analysis plus theory of computation, more CS
        electives, and the lab science sequence.</p>

        <p>On the other hand, our program is very similar to that of City
        College, with a bit more flexibility given to our students as
        demonstrated by a smaller set of required software courses and a
        larger set of electives.</p>

        <p><span class="run-in-heading">Outside CUNY: </span>Polytechnic
        University is a regional private institution in Brooklyn.  Comparing
        the requirements in software, hardware, theory, CS electives, and
        lab sciences it is evident that our BS program is stronger than
        theirs.  From their catalog course descriptions, it appears that
        they generally award 4 credits for courses with equivalent content
        to 3-credit courses at Queens, suggesting that their total number of
        required credits may not be directly comparable with ours.</p>

        <p>The CS program at SUNY/Stony Brook enjoys a fine national
        reputation.  Their BS has a stronger math component than ours. They
        also afford their students more freedom in choosing core courses; in
        comparison our core requirements are more rigidly structured.
        However, our approach ensures that students coming into a
        higher-level course are all similarly prepared academically.</p>

        <table class="datatable" id="other_institutions"
						     summary="The number of credits and course requirements for
						     the BS degree in computer science at Queens, Brooklyn,
						     City, Polytechnic University, and SUNY Stony Brook.">

          <caption> Comparison of course requirements for the CS major at
          Queens, Brooklyn, City, Polytechnic University, and SUNY/Stony
          Brook. All programs for the BS degree degree. </caption>

          <thead>
            <tr>
              <th></th>
              <th scope="col">Queens</th>
              <th scope="col">Brooklyn</th>
              <th scope="col">City</th>
              <th scope="col">Polytechnic</th>
              <th scope="col">Stony Brook</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="col">Total Credits <br />
                CS + Math + Science</th>
              <td class="center">81</td>
              <td class="center">52-55</td>
              <td class="center">84</td>
              <td class="center">84</td>
              <td class="center">80</td>
            </tr>
            <tr>
              <th scope="col">Calculus I &amp; II</th>
              <td class="center">yes</td>
              <td class="center">yes</td>
              <td class="center">yes</td>
              <td class="center">yes</td>
              <td class="center">yes</td>
            </tr>
            <tr>
              <th scope="col">Calculus III or higher</th>
              <td class="center">no</td>
              <td class="center">no</td>
              <td class="center">yes</td>
              <td class="center">yes</td>
              <td class="left">Finite Mathematical Structures</td>
            </tr>
            <tr>
              <th scope="col">Linear Algebra</th>
              <td class="center">yes</td>
              <td class="center">yes</td>
              <td class="center">yes</td>
              <td class="center">yes</td>
              <td class="center">yes</td>
            </tr>
            <tr>
              <th scope="col">Probability &amp; Statistics</th>
              <td class="center">yes</td>
              <td class="center">yes</td>
              <td class="center">no</td>
              <td class="center">no</td>
              <td class="center">yes</td>
            </tr>
            <tr>
              <th scope="col">Required software courses</th>
              <td class="left">OOP in C++<br />
                OOP in Java <br />
                Data&nbsp;Structures <br />
                Prog.&nbsp;Languages <br />
                Software&nbsp;Engineering <br />
                Operating&nbsp;Systems <br />
                Database </td>
              <td class="left">Programming in C <br />
                Data&nbsp;Structures <br />
                Prog.&nbsp;Languages <br />
                Operating&nbsp;Systems <br />
                Project </td>
              <td class="left">Intro to Computing <br />
                Data&nbsp;Structures <br />
                Prog.&nbsp;Languages <br />
                Software&nbsp;Engineering <br />
                Operating&nbsp;Systems <br />
                Simulation <br />
                Software Lab <br />
                Design Project </td>
              <td class="left">OOP <br />
                Data&nbsp;Structures <br />
                Prog.&nbsp;Languages <br />
                Software&nbsp;Engineering <br />
                Operating&nbsp;Systems <br />
                Project </td>
              <td class="left">OOP <br />
                Data&nbsp;Structures <br />
                Software&nbsp;Engineering <br />
                Three&nbsp;from:
                <ul>
                  <li>Prog. Languages or Compiler</li>
                  <li>Operating Systems</li>
                  <li>Database</li>
                  <li>Graphics or User Interface</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th scope="col">Required hardware courses</th>
              <td class="left">Comp.&nbsp;Organization <br />
                Computer&nbsp;Architecture </td>
              <td class="left">Assembly&nbsp;Language <br />
                Comp.&nbsp;Organization </td>
              <td class="left">Comp. &amp; Assembly <br />
                Comp. Organization <br />
                Comp. Systems Lab </td>
              <td class="left">Arch.&nbsp;&amp;&nbsp;Organization </td>
              <td class="left">Comp. Organization <br />
                One from:
                <ul>
                  <li>Networks</li>
                  <li>Architecture</li>
                  <li>Communications</li>
                </ul>
              </td>
            </tr>
            <tr>
              <th scope="col">Required theory courses</th>
              <td class="left">Discrete Math <br />
                Design/Analysis&nbsp;Algo. <br />
                Theory of Comp. </td>
              <td class="left">Discrete Math <br />
                Algorithms or Theory </td>
              <td class="left">Discrete Math <br />
                Algorithms <br />
                Numerical Issues <br />
                Theory of Comp. </td>
              <td class="left">Discrete Math <br />
                Design/Analysis&nbsp;Algo. </td>
              <td class="left">Discrete Math <br />
                Algorithms or Theory </td>
            </tr>
            <tr>
              <th scope="col">CS Electives
              <br />(credits)</th>
              <td class="center">15
              </td>
              <td class="center">6
              </td>
              <td class="center">12
              </td>
              <td class="center">12
              </td>
              <td class="center">9
              </td>
            </tr>
            <tr>
              <th scope="col">Lab Sciences
              <br />(credits)</th>
              <td class="center">12
              </td>
              <td class="center">&nbsp;
              </td>
              <td class="center">12
              </td>
              <td class="center">8
              </td>
              <td class="center">12
              </td>
            </tr>
          </tbody>
        </table>

        <h4>Projections for Increases or Decreases in Enrollment</h4>
        <div>

        <p>Consistent with the national trend, we had a 40% drop in
        enrollment following the burst of the internet bubble in 2001. 
        However improvement has been evident in the past year, and it seems
        clear that we have passed the low point and are on the mend. 
        Although we do not expect a repeat of the recent history, with
        hundreds of students rushing into our major in the coming years, we
        are confident that our enrollment will continue to move upwards
        since our discipline is at the heart as well as the forefront of the
        information revolution that is still in its infancy.</p>

        </div>

        <h4>Plans for New or Revised Programs</h4>
        <div>

        <p>Our curriculum committee, with the involvement of the entire
        faculty, constantly monitors the latest developments in the field
        and devises improvements to our programs.  A major revision
        (&ldquo;Curriculum 2005&rdquo;) was introduced recently and is now
        in full implementation.  We plan to review this curriculum and make
        necessary changes as we observe its effectiveness in the next year
        or two.</p>

        </div>
      </div>

      <h3><span class="section-number">Section 5.4 </span><a id="minors"
      />Curriculum: Programs for Non-Majors</h3>

      <div>

        <p>We serve non-majors through three primary avenues.  The first is
        our course CS12, Understanding Personal Computers, which we offer to
        the entire college community.  Each semester hundreds of students
        take CS12 to satisfy the Scientific Methodology and Quantitative
        Reasoning area requirement of LASAR.  The course can also be used to
        satisfy the computer requirement of such majors as accounting.  A
        variation of the course, with business applications, is offered to
        students in the economics department as CS18.</p>

        <p>Our second path for non-majors is our newly implemented minor in
        Computer Information Technology (CIT).  This offering is designed to
        give majors in other fields practical experience with currently
        important information technologies and a sound understanding of the
        principles behind those technologies.  As <a href="#cit-minor-fig"
        class="fig-ref">Figure <span class="xx">00</span></a> shows, the CIT
        Minor consists of CS12 and five CS courses (outside the major) that
        are more or less skill-oriented, plus CS111 and one of the math
        courses required by the major.</p>

        <div class="figure" id="cit-minor-fig">
          <img src="images/2005-CIT_Minor.png" alt="Prerequisite Structure
            for CS Computer Information Technology Minor" />
          <p class="figure_caption">Prerequisite Structure for the CS
            Computer Information Technology Minor.</p>
        </div>

        <p>Finally, for those who want more rigorous CS training without
        majoring in CS, we have a CS minor consisting of nine courses. 
        These courses constitute a subset of the CS and math courses
        required by the BA major, starting with CS111.  Thus a student
        minoring in CS can easily switch his/her major to CS or add a second
        major in CS.  <a href="#cs-minor-fig" class="fig-ref">Figure <span
        class="xx">00</span></a> shows the prerequisite structure of the CS
        Minor.</p>

        <div class="figure" id="cs-minor-fig">
          <img src="images/2005-CS_Minor.png" alt="Prerequisite Structure
            for CS Minor" />
          <p class="figure_caption">Prerequisite Structure for the CS
            Minor.</p>
        </div>

      </div>

      <h3><span class="section-number">Section not in Provost&rsquo;s
      outline </span>Master&rsquo;s Degree Program</h3>

      <div>

        <p>Our Master&rsquo;s program consists of four <em>core</em>
        courses, a choice of three <em>semicore</em> courses, two
        <em>elective</em> courses, and a <em>capstone</em> course.  The
        structure is given in more detail in <a href="#ma-fig"
        class="fig-ref">Figure <span class="xx">00</span></a>.  Students
        with an undergraduate degree in some discipline other than computer
        science may enter the program, but only after they have completed
        six undergraduate courses that are essential components of our BA
        program.  (These courses are shown in gray boxes at the top of
        figure <a href="#ma-fig" class="fig-ref">Figure <span
        class="xx">00</span></a>.)  This allows us to accommodate students
        who want to make a career change or who are from foreign countries
        where programs in computer science comparable to those in this
        country were not readily available to them.</p>

        <p>Several of our faculty, both established members of the
        department and our new hires, offer graduate-level special topics
        courses on subjects of current interest, such as bioinformatics,
        security, and wireless communication.  We look forward to further
        strengthening this important part of our program in the future.</p>

        <div class="figure" id="ma-fig">
          <img src="images/2005-MA.png" alt="Prerequisite Structure for the MA in Computer Science" />
          <p class="figure_caption">Prerequisite Structure for the MA in
          Computer Science.</p>
        </div>
      </div>

      <h3 id="asseffcrr"><span class="section-number">Section 5.5
      </span>Assessment of Effectiveness of Curriculum</h3>

      <div>

        <h4>Methods and Instruments Used</h4>

        <p>From the time of the department&rsquo;s inception, our curriculum
        has been based on national norms, starting with the curriculum known
        as &ldquo;ACM &lsquo;68&rdquo; and continuing through to today&rsquo;s
        curriculum, which corresponds well to the current recommendations of
        the ACM and IEEE.  However, we have always tailored our courses to
        meet what we perceive to be the particular needs of Queens College
        students and to reflect the particular strengths of our teaching
        faculty.  To the extent that our curriculum implements national norms,
        we are confident that it accurately addresses the needs of computer
        science students in general.</p>

        <p>We regularly review student course evaluations administered by the
        College&rsquo;s Teaching Excellence and Evaluation Committee to look
        for problems that may be occurring in our course offerings.</p>

        <p><span class="run-in-heading">Student/Alumni Survey: </span>In
        June of 2005 we conducted an online survey of our undergraduate
        students, graduate students, and alumni to gather more detailed
        information about the perceived effectiveness of our undergraduate
        and master&rsquo;s programs.  The complete survey, with a numerical
        summary of the short answer questions, is given in <a
        href="#appendix_c">Appendix C</a> of this document.  It is also
        available as a separate document (PDF): <a
        href="Survey_Summary.pdf">Survey Summary</a>.</p>

        <h4>Measured Effectiveness in Achieving Desired Objectives</h4>

        <p>The survey was divided into separate parts targeted to current
        undergraduate students, current graduate students, undergraduate
        alumni, and graduate alumni.  We had a total of 290 respondents to
        the survey, although 35 of these were discarded because they did not
        fall into one of our four target categories.  Some individuals
        responded more than once because they fit into more than one
        category.  In particular, many of the current graduate students were
        also undergraduate alumni.</p>

        <p>The answer to Question 1 of the survey indicates that we received
        replies from 158 undergraduates, 41 graduate students, 39
        undergraduate alumni, and 17 graduate alumni.  While this is a
        gratifyingly large number of responses, especially from our current
        undergraduates, we should point out that there are certain sampling
        biases at work that affect the interpretation of the results.  The
        first bias is that the survey was widely publicized among our
        current undergraduate and graduate students, but we did not have a
        way to contact alumni other than to put a note about the survey on
        the Department&rsquo;s home page where it might have been seen by
        alumni who happened to be visiting our web site.  Thus, our alumni
        data probably draws most heavily on those graduates of our programs
        who are currently enrolled in the MA program and does not represent
        our alumni body at large.  Furthermore, we discovered after the
        survey was closed that we made a mistake in constructing it.  Based
        on the answer to the first question, participants were directed to
        one of four sets of questions based on their relationship to the
        department, or to a &ldquo;thanks but no thanks&rdquo; page if they
        were not current or previous students.  Since we received no answers
        to the questions targeting graduate alumni, we infer that the 17 of
        them who answered the first question were misdirected to the
        &ldquo;thanks but no thanks&rdquo; page.</p>

        <p>The first item of interest is the fact that 40% of the
        undergraduates who responded to the survey are transfer students
        from other colleges.  Of these, over half transferred from a
        community college within CUNY.  Our two biggest feeder colleges are
        Queensboro Community College and Laguardia College.  We have
        anecdotal evidence that the preparation of these students varies
        greatly depending on which school they transferred from, and we
        recognize the need to provide meaningful articulation with the
        programs offered by the various CUNY community colleges.</p>

        <p>Nine of the undergraduate respondents transferred from outside
        the US.  Five transferred from other senior colleges within CUNY.
        Thirteen transferred from other four-year colleges in the New York
        metropolitan region (SUNY/Stony Brook, Columbia, NYU, St.
        John&rsquo;s, Adelphi, etc.)</p>

        <p>Over half of the master&rsquo;s students who responded completed
        their bachelor&rsquo;s degree at Queens.  Another 15% came from
        elsewhere in CUNY.</p>

        <p>The full set of questions and summary data for short-answer
        questions are given in Appendix C.  We summarize the data as
        follows:</p>

        <ul>

          <li>About one-third of our undergraduate students work full-time
          in addition to pursuing their studies.  Another third work
          half-time, and the remainder do not work at all.</li>

          <li>Most undergraduates think it is reasonable to spend 2-6 hours
          a week outside of class on preparation for a 3-4 credit course,
          and that is also how much time they report actually spending. 
          This result is consistent with the report of [<a
          href="#young2002">Young 2002</a>], indicating that college
          students no longer consider two hours of preparation for each
          classroom contact hour to be the norm.</li>

          <li>We asked the undergraduates to rate the program on sixteen
          attributes using a 5-point scale, with 5 being the best.  The
          three highest ratings (over 3.6) were for the library and
          computing resources provided by the College, and for the relevance
          of the courses offered by the department.</li>

          <li>The lowest ratings (below 3.3) were for: preparation for work
          after graduation (3.01), reasonableness of time demands (3.16),
          proportion of courses taught by adjuncts (3.21), quality of
          advisement(3.26), responsiveness of the department to student
          needs (3.28), and availability of instructors outside of class
          (3.29).  Since a score of 3.0 is equivalent to
          &ldquo;Neutral,&rdquo; we feel that the results reflect very well
          on the department.  Even our greatest perceived weakness
          (preparation for work after graduation) received a negative rating
          from only 26% of the respondents.</li>

          <li>We asked about the time demands of individual courses, but in
          only two cases did more than 10% of the respondents reply that the
          time demands for a course were &ldquo;Too heavy!&rdquo;.</li>

          <li>More than 80% of our graduate students had undergraduate
          majors that were in computer science or a related discipline.</li>

          <li>The graduate students&rsquo; ratings were generally lower than
          the undergraduates&rsquo;.  Our highest approval ratings were for
          fair grading, good preparation for further graduate study,
          course relevance, computing and library resources, and faculty
          expertise, but these ratings ranged only from 3.3 up to 3.5.
          Weaknesses (average ratings below 3.0) were choice of courses,
          preparation for work after graduation, availability of
          internships, and responsiveness to student needs.</li>

          <li>With only 36 graduates of our undergraduate program responding
          to the survey, the data become tenuous.  Of these respondents,
          over 60% reported that they had pursued no formal education beyond
          the bachelor&rsquo;s degree.  Over a quarter of the graduates who
          had done graduate work had partially completed a master&rsquo;s
          degree in a computer related field; we infer that these are our
          own master&rsquo;s students.</li>

          <li>We asked the students to describe their employment history
          since graduation, and received the following responses:

            <ul>

              <li>50% had been regularly employed in jobs related to
              computing.</li>

              <li>22% had been regularly employed in jobs not related to
              computing.</li>

              <li>19% reported having multiple jobs, some of which were
              computing related, and some of which were not.</li>

              <li>8% had not been employed since graduation.</li>

            </ul></li>

          <li>Over half of the graduates of our undergraduate program
          reported that their time spent at Queens College was
          &ldquo;rewarding and enjoyable.&rdquo;  Most felt that the
          computer science major provided good preparation for work,
          but over a third disagreed with this assessment of the
          program.</li>

        </ul>

        <p>We also asked respondents to give written answers to some
        questions.  We asked our current undergraduates to tell us the two
        most important things they thought the Computer Science Department
        should do in order to improve (survey question 12).  We received 78
        answers to this question.  By far the most common comments (24 of
        them) dealt with a perceived need for improved pedagogy, including
        the need for tutors, teaching assistants, and gripes/kudos for
        individual faculty members.  We also received 15 responses dealing
        with the content level of the courses; these were about equally
        divided among those who thought the courses should be easier (5
        responses) or harder (3), with the remainder asking for particular
        subject matter to be included or omitted.  There were also several
        replies that expressed a desire for better scheduling of courses so
        that there would be fewer scheduling conflicts.</p>

        <p>We also asked the alumni of our undergraduate programs what they
        felt the Department and the College should do to improve.  Because
        of the way the survey was publicized, most respondents were also
        current students, so we also include responses by current MA
        students, who were also asked what the Department should do to
        improve.  Far and away, the largest cluster of comments dealt with
        the perceived desire for more job-oriented, real-world skills, and
        more internships.  Other comments generally reflected the same
        perceived shortcomings found in the short answer questions,
        mentioned above.</p>

        <h4>Use of Assessment to Improve Programs</h4>

        <p>The survey findings were quite consistent with the informal
        perceptions we have had about ourselves as a department from the
        time of our inception:  We feel that we provide high-quality
        instruction in the core principles of computer science, but that
        many of our current students and recent graduates would prefer
        vocational training in information technology.  It is our firm belief
        that the main benefit of our curriculum is that it provides students
        with the basis for life-long learning, and that to devote a
        significant amount of the curriculum to current &ldquo;hot
        topics&rdquo; leaves students ill-prepared for the long haul.  (Even
        reviewing the particular topics students wanted us to teach about
        six months ago reveals an interest in &ldquo;older&rdquo;
        technologies, such as J2EE and Python, but no mention of current
        technologies such as Ajax and Ruby.)</p>

        <p>For a long time, we tried to convince students that their
        interest in a BS degree was misguided and that the BA is the
        preferred degree from a liberal arts college such as Queens. 
        Finally (over a decade ago), without substantially altering the
        degree requirements, we introduced the BS option.  Students have
        flocked to it, and the department has been able to maintain its own
        perceived integrity of the curriculum at the same time.  We take
        this case to be proof that the difference between students&rsquo;
        perceived needs and the department&rsquo;s sense of mission do not
        have to be irreconcilable.</p>

        <p>Currently, there is a large demand for courses that more properly
        fall under the information technology part of the computing
        umbrella, rather than computer science.  We feel that we cannot
        incorporate this area into our major without losing focus on core
        principles of computer science.  But we have been able to meet
        student interests by introducing our minor in Computer Information
        Technology (CIT).  This minor is too new to evaluate at this time,
        but indications are that it will be a very popular option both for
        students majoring in other disciplines as well as some of our own
        majors.  We expect enrollments in this minor to be even more
        volatile than those in our majors because of the vagaries of the
        perceived job market.</p>

        <p>We are enthusiastic about the CIT minor for two reasons worth
        mentioning here: (1) The simple fact of its existence helps us
        explain to students (and colleagues) the difference between computer
        science and information technology.  There has been a public
        relations problem leading to misconceptions about the department and
        its mission in the past, and the CIT minor helps us to articulate
        the nature of the department more clearly to others.  (2)  The CIT
        minor also provides a nice opportunity for our faculty to
        demonstrate their involvement with real-world problems.  Research in
        computer science is often driven by issues arising from the
        practical applications of computing theory and principles to current
        technology. The CIT minor is a means for us to integrate some of our
        teaching with the issues that are driving computer science research
        today.</p>

      </div>
    </div>
  </div>

  <div id="students">
    <h2><span class="section-number">Section 6 </span>Students</h2>
    <div class="whitebox">

      <h3><span class="section-number">Section 6.1 </span>Undergraduate</h3>

      <div>

        <h4>Diversity of Demographics</h4>

        <p>As reported above, about 40% of our undergraduate students are
        transfers from other colleges and of these, half are from community
        colleges within CUNY. The rest of the transfers come from other
        senior colleges within CUNY, other metropolitan area schools and, a
        not insignificant number transfer from colleges abroad. The other
        60% come to us mostly after graduating from local high schools in
        the New York metropolitan area.</p>
        
        <p>The ethnic and economic backgrounds of our majors generally
        reflect the diversity of the college as a whole. There are
        differences, however.  Where the undergraduate gender ratio at the
        College is over 60% female, we estimate that the ratio is reversed
        in the Department, and that over 60% of our students are male.  The
        undergraduate ethnic distribution for the College is 50% White,
        non-Hispanic, 22% Asian or Pacific Islander, 17% Hispanic, and 10%
        Black.  We believe that reversing the College&rsquo;s percentages
        for the White and Asian categories would more closely approximate
        the Department&rsquo;s distribution.</p>

        <h4>Career Choices and Perceptions of Program</h4>

        <p>An important criterion in assessing the success of our program is
        the extent to which our graduates are able to secure appropriate
        professional employment. Five years ago the majority of them were
        able to find IT related positions quite easily. In fact, many
        students had multiple job offers to choose from. However the dot-com
        bust and the increasing trend toward outsourcing lower-level
        projects, has had a significant effect on the job prospects of
        graduating computer science students nationally. Employers are still
        hiring, but with fewer positions available and a large pool of
        candidates, it&rsquo;s pretty much a buyer&rsquo;s market. Given
        these circumstances, the fact that half of our graduates have found
        computer related jobs (see <a href="#asseffcrr">Assessment of
        Effectiveness of Curriculum</a>) should be considered a significant
        accomplishment. The trend toward hiring high-quality talent means
        that half of our students were judged as such by the market.</p>

        <p>It should be noted that the set of possible job categories for
        graduates of our program is quite large, and personality factors as
        well as skill plays an important role in the path eventually
        pursued. Assuming that a student is temperamentally suited for a
        particular type of job, different jobs require different skill
        levels, knowledge, and overall intellectual ability, and students
        seem to be quite good and determining where they stand with respect
        to these factors. We find that our most academically successful
        students tend to seek jobs as programmers in software companies
        (working in-house or as consultants) and, with increasing frequency,
        in the financial services sector. Second tier students are usually
        more interested in database and systems administration positions or
        in work as &ldquo;business analysts&rdquo;, network specialists or
        in technical sales support. Those who can&rsquo;t find employment in
        the above two areas will gravitate toward &ldquo;help desk&rdquo;
        jobs, work in PC support or in lower-level networking and systems
        administration positions. While the above is clearly a
        generalization, it is in the main correct.  Where do our students
        get the knowledge needed to pursue these positions and how did our
        curriculum contribute to this success?</p>

        <p>Overall the undergraduates rated the relevance of our courses
        quite highly. The undergraduate computer science curriculum is
        designed primarily to give our students the tools to become first
        rate programmers and systems analysts. It emphasizes fundamental
        principles as well as provides for the teaching of a number of
        particular technologies. Our graduates find that much of what they
        need to know when they start their careers has been covered in one
        or more of their courses. If their job requires that they master
        something that they did not explicitly cover in their coursework,
        many report that the principles that they learned allow them to
        acquire new skills with confidence.</p>

        <p>While the above speaks to the students&rsquo; performance once
        they get a job, an especially important factor in the
        students&rsquo; ability to land that all important first position is
        whether or not they are able to get an internship while still in the
        program. This is the case for both undergraduate and graduate
        students. Potential employers consider a successful internship as an
        indication that the student is serious, industrious and able to
        function in the business world. In light of this, the department has
        stepped up efforts both in cooperation with the job placement office
        and through our own contacts to increase the number and quality of
        internship opportunities available to our students.</p>

        <p>Not all our students go directly into industry, however.  In
        recent years we have also seen a number of our students go on to
        pursue graduate studies at some of the top-ranked Computer Science
        programs in the country, including Princeton, Carnegie Mellon, UC
        Berkeley, Columbia, and NYU.  In addition, we regularly send
        students to the highly-regarded regional programs at the CUNY
        Graduate Center and SUNY Stony Brook.</p>

      </div>

      <h3><span class="section-number">Section 6.2 </span>Graduate</h3>
      <div>

        <p>Our graduate enrollment has dropped by about two-thirds since
        9/11. This decline is attributable to the difficulty many foreign
        students have in obtaining visas to study in the US as well as the
        general drop in computer science enrollments nationwide. Though the
        number has declined, we believe that the quality has actually
        improved. This is very likely attributable a change in the
        backgrounds of our current students. We previously admitted many
        students who wanted to change majors for the graduate degree and
        whose preparation in computer science was weak or non-existent.
        Those students were required to take a complement of core
        undergraduate courses in the Department in order to prepare them for
        graduate-level work.  But now more than 80% of of our graduate
        students have had undergraduate majors that were in computer science
        or a related discipline, and many have been our own undergraduates
        at Queens College.</p>

        <p>Despite the drop, our graduate enrollment has been growing for
        the past three semesters for which we have data (Fall 2003, Spring
        2004, Fall 2004). The graduate students give various reasons for
        enrolling in the program. Many believe that additional training at
        the master&rsquo;s level will help them get a good job in this tough
        employment climate. In fact, students with a master&rsquo;s degree
        tend to find it easier to get a job, and when they do they got a
        slightly higher starting salary and more interesting work. Others
        enroll in our program because they find our wide selection of
        courses very appealing and useful. Indeed, over the last three years
        we have added courses in such important emerging areas as
        cryptography, Internet and web technologies, Bioinformatics, Mobile
        Computing, Next Generation Network Services, Voice over IP / WLAN,
        and Internet Security. Aside from their intrinsic interest,
        knowledge of these topics is sought after in industry today. Such a
        wide variety of cutting edge courses is quite rare and these
        offerings have been an important factor in helping our graduate
        program grow.</p>

        <p>We have also made a change in our admissions procedure in the
        past few years that we think contributes to our improved
        enrollments.  Where we previously processed graduate applications
        just once a term, we now handle them on a &ldquo;rolling
        admissions&rdquo; basis.  This means that qualified students are
        admitted as soon as we have their application in hand, reducing the
        problems students have arranging visas, work, and travel plans.  The
        result has been positive: in 2001, just 28% of the students we
        admitted actually matriculated into the program.  In 2005, the
        proportion was up to 63%.  Despite the drop in absolute number of
        students, we remain the largest master&rsquo;s program in the
        division and are cautiously optimistic that our graduate enrollments
        will continue growing at a reasonable rate.</p>

      </div>
    </div>
  </div>

  <div id="analysis">

    <h2><span class="section-number">Section 7 </span>Self-Analysis and
    Plans</h2>

    <div class="whitebox">

      <h3><span class="section-number">Section 7.1 </span>Strengths</h3>

      <div>

        <p>The first and most important resource of any academic department,
        the core of its strength, is its faculty. The Department of Computer
        Science is proud of the professional standing and the distinguished
        research record of its members. Members of the department have been
        active mainly in the following research areas: information
        retrieval, cryptography and computer security, visual information
        processing, fundamental mathematical theory of computation, computer
        architecture, web development and finally a new area for the
        department, bioinformatics. In computer science research, many
        specialized areas tend to gain and lose centrality as the subject
        evolves. The faculty of our department have very successfully
        adapted to this situation, continually moving on to new and
        developing areas of research.</p>

        <p>This Department has always emphasized undergraduate instruction,
        regarding this as one of the core missions of the College. This role
        is especially important in computer science, because of the special
        character of undergraduate education in a rapidly evolving field. In
        most of the sciences a post-graduate degree is a necessary minimum
        prerequisite to begin a professional career. This is not true in
        computer science. Many of our graduates begin a professional career
        with a BA or BS, and are able to continue their professional
        education while working in technological industries. Because
        computing technology develops so rapidly, essentially all computing
        professionals are obliged, if they wish to remain in the field, to
        pursue a lifelong process of continuing education. The undergraduate
        program our Department offers is designed to give them a solid
        foundation for this process. Members of our faculty have also
        devoted great efforts to curriculum development and mentoring
        undergraduates.</p>

        <p>The Department has also developed a program in computer literacy
        that it offers to all members of the college community. Our
        introductory course, CS 12, has enrolled hundreds of undergraduates
        every year. We are proud of the record of success this course has
        achieved. It has become a core course in the education of many
        undergraduates, from diverse subject areas.</p>

        <p>This semester the Department has completed the introduction of a
        new minor in Computer Information Technology. This June we will be
        celebrating the graduation of the first students concentrating in
        this area. This program emphasizes applications of computing
        including web programming, database, and multimedia design.</p>

        <p>The master&rsquo;s program is a central program of the
        Department. In the recent past most of the students in this program
        had a bachelor&rsquo;s degree from other areas, and were retraining
        in computer science. The Department developed an extensive sequence
        of courses designed to rapidly bring these students up to the level
        required for a traditional master&rsquo;s program in computer
        science.  In the last three years, the department has greatly
        enhanced its graduate course offerings, and in consequence been able
        to attract many more master&rsquo;s students with an undergraduate
        CS degree. This has strengthened the master&rsquo;s program
        considerably.</p>

        <p>The Department also benefits from its excellent and dedicated
        technical staff. Peter Chen, our network manager, and Koya Matsuo,
        our system administrator, have developed and maintained our
        computing and network resources, despite having to work within the
        constraints of a very a narrow budget.  The Department is also
        grateful to the Queens College administration, which has provided
        extensive computing facilities for the use of its
        undergraduates.</p>

        </div>

      <h3><span class="section-number">Section 7.2 </span>Weaknesses</h3>

      <div>

        <p>The Department is acutely aware of certain areas of weakness, and
        is dedicated to solving the problems they represent. Many of these
        weaknesses arise ultimately from the unavoidable constraints imposed
        by the College budget.</p>

        <p>It has proved impossible for the department to hire faculty in
        certain very competitive areas. In the more competitive areas of
        computer science, such as computational genomics and computer
        security, starting salaries are at least 50% above the level the
        College is able to offer, and typically come with start up monies
        far beyond the level we can approach. Recently, the Department was
        able to hire in the area of bioinformatics by working with the
        Biology Department and hiring a very highly qualified person from
        the more biological side of bioinformatics. A major goal of the
        department is more hires in this vital and growing area, in order to
        develop a functioning research group.</p>

        <p>Similarly in computer security and cryptography, the salary scale
        of the College has restricted the types of candidates the department
        can recruit. Here too, the Department was able to hire very
        successfully, recruiting an exceptionally talented individual with a
        less applied background, who had trained in analytic number theory
        and had previously worked at the National Security Agency.</p>

        <p>This general strategy has been a foundation of the
        department&rsquo;s hiring policy. Since the more theoretical areas
        of computer science generally command lower salaries, the department
        has tried to hire outstanding individuals whose research areas are
        on the more theoretical side, but who are also capable of teaching
        the very applied courses which the department&rsquo;s undergraduate
        curriculum requires.</p>

        <p>However, in emerging research areas, it is vital to be able to
        hire at least one senior faculty member who can function as a
        research group leader and mentor to junior faculty. Such an
        individual can take the lead in organizing external grant
        applications and collaboration with research groups at other
        institutions. They can also organize and direct curriculum in
        development in new areas. Unfortunately, the department has been
        unable to hire such vital individuals. Such hires could radically
        transform and improve our department.</p>

        <p>The department also acknowledges that so far it has not been able
        to develop the relationships it envisions for itself with
        neighboring institutions, such as Rockefeller University and Cold
        Spring Harbor Laboratory. The Department is pleased by its
        developing relationship with Computer Associates, but acknowledges
        that it needs to greatly enhance its relationship both with this
        company and with other regional technology companies. Of course,
        developing these relationships will require some investment of
        resources, both in funds and in released time for the faculty who
        undertake these duties.</p>

        <p>The Department is grateful to the College for the released time
        which has been granted to new hires. However, the Department has
        been unable to offer its other faculty adequate released time for
        research. This gap is especially damaging in computer science, where
        faculty must continually update and revise courses in order to keep
        up with rapidly evolving technology. In a field such as mathematics,
        many undergraduate courses present material which has been
        fundamentally unchanged for over a century. In computer science,
        especially in software, a course which is not extensively revised
        every three years is badly out of date. It is unthinkable that we
        would run a software course the way it was run in 1990.</p>

      </div>

      <h3><span class="section-number">Section 7.3 </span>Proposed
      Changes</h3>

      <div>

        <h4>Department Organization</h4>

        <p>The Department envisages two major changes in its structure and
        organization which it would like to implement.</p>

        <p>Firstly, the department needs to hire at least two senior faculty
        who can function as research group leaders in each of bioinformatics
        and computer security. Such individuals can organize grant
        applications and mentor both junior faculty and advanced students.
        They can organize curriculum development and lead in setting up
        collaboration with neighboring institutions. They also relieve
        junior faculty of the research isolation which can so severely
        inhibit their productivity.</p>

        <p>Secondly the department intends to expand and solidify its new
        technology minor. This program is an important resource for the
        College, and offers a career path for many students in other
        departments who are not now served by the department&rsquo;s courses
        for its majors. In addition it will help to even out fluctuations in
        the department&rsquo;s student enrollments, which tend to reflect
        the job market in the computer industry.</p>

        <h4>Programs and Curriculum</h4>

        <p>We would divide our curriculum into macro and micro levels.  At
        the macro level, our curriculum is quite stable in that the core
        principles on which computer science is based have not altered
        greatly since the earliest days of programmable digital systems in
        the mid-twentieth century.  As with any science, the core of the
        discipline generally changes slowly, and we do not often need to
        make drastic changes to the set of courses we offer in order to
        track these changes.</p>

        <p>On the other hand, the micro level of the curriculum is has
        always been under active revision from the day the department was
        founded over thirty years ago.  At the micro level we deal with
        issues like like what programming language to use for projects, what
        computing environment to work with, and what are the current best
        practices in software design.  These changes typically don&rsquo;t
        show up in the College Bulletin, but they do consume a considerable
        portion of our curriculum development activities.</p>

        <p>Where we do see macro-curricular developments taking place over
        the next five to seven years is in the area of cross-disciplinary
        interactions with other departments on campus.  We are already
        working with the Biology and Economics departments to provide
        courses that will give their students the technological
        understanding they need, and we anticipate that this sort of
        activity will play an increasingly important part in our role on
        campus.</p>

        <p>Our curriculum provides an essential part of a liberal arts
        education in the 21st century, and one of our goals is to project an
        accurate image of that role, one that avoids hype and job-market
        frenzy in favor of recognition of the core role a working knowledge
        of computing plays in an educated person&rsquo;s life.</p>

        <h4>Resources</h4>

        <p>The Department has outgrown its office and research space
        allotments and must deal with these issues for both short-term and
        long-term time frames.</p>

        <p>We are currently providing new faculty with windowless offices
        and research space that must be shared with instructional labs or
        departmental servers.  Rather than deal with these problems in an
        <em>ad hoc</em> case by case basis, we would like to plan now for
        the addition of six additional faculty offices that are of the same
        quality as most of our present offices with respect to space, light,
        and access to departmental networking facilities.  The most natural
        location for additional office space would be on the third floor of
        the &ldquo;A&rdquo; wing of the Science Building.</p>

        <p>Two main research foci, bioinformatics and information security,
        need research spaces that address their needs in terms of
        workstations and meeting facilities.  Our work in Web services needs
        its own research space in addition to the educational lab being
        established in A-103 from Technology Fee funds, and we have no
        facility for our work on embedded systems and small-area networks. 
        The most natural location for these laboratories would be on the
        first floor of the &ldquo;A&rdquo; wing of the Science Building.
        Additional research space is critical to our ability to obtain
        outside funding for our research efforts.  However, funding agencies
        have not normally supported the establishment of an
        institution&rsquo;s research infrastructure, so it is imperative for
        the College to obtain the needed funding for converting classrooms
        to research laboratories from alternate channels.</p>

      </div>

      <h3><span class="section-number">Section 7.4 </span>Future of
      Department for Next Five to Seven Years</h3>

      <div>

        <h4>Hiring</h4>

        <p>The central element of the Department&rsquo;s mid-range planning
        is its hiring strategy. Over this time period, the Department
        approximates it will have two retirements, with corresponding
        replacement faculty lines. Additionally, we expect to obtain some
        new lines in the near future.</p>

        <p>The Department&rsquo;s faculty pursue fundamental research in
        many areas of computer science.  But, in addition to this core
        research, members of our faculty have been engaged in collaborative
        research with faculty from many other departments. We expect a great
        increase in opportunities for such collaborative research in the
        years ahead, as computational methods invade new fields. Biology is
        witnessing the rise of sub-disciplines, such as computational
        genomics, which apply sophisticated methods of mathematical and
        computational analysis to vast bodies of data that are now
        available. Computational revolutions are also taking place in other
        sciences, because of the enormous growth in recent years in the
        processing power and memory size of computers that are readily
        available to researchers. The Department welcomes its role as a
        collaborator with other departments in the College.</p>

        <p>We have concluded that the Department will make the most
        effective use of its resources if it attracts and hires researchers
        in cluster groups, especially where it can take advantage of
        interdisciplinary collaboration with allied departments.  To this
        end, the Department has identified the following two areas where it
        would like to concentrate its resources. These areas have been
        chosen not only because they are of much current interest in our
        discipline, but also because of their intrinsic scientific
        importance, and the potential contribution they would make to the
        College as a whole.</p>

        <p><span class="run-in-heading">Bioinformatics: </span>
        This field combines methods of biology and computer science,
        especially in areas where new sequencing technology has produced an
        enormous volume of genetic data that provides unprecedented
        opportunities. For example, it is now possible to determine a huge
        portion of the genomic variation in thousands of patients in a
        disease study. But the torrent of available data also presents great
        computational challenges. The Department would like to collaborate
        with the Biology and the Chemistry and Biochemistry Departments to
        build a significant research group in this area. We believe it is
        crucial to hire at least one senior scientist--someone who will be a
        group leader, organize and lead grant applications, attract and
        mentor younger co- workers, and effectively foster interaction with
        others in the bioinformatics community (which we believe is
        important, as a sense of isolation can greatly inhibit the
        productivity of young scientists). In addition, we envisage hiring
        junior faculty in this area.</p>

        <p><span class="run-in-heading">Information Security: </span>This is
        another area of great scientific interest that has very important
        applications. The Department already has two members in this area,
        one in cryptography and one who works in information assurance. Our
        development plan is to hire one senior scientist in this area and
        additional junior faculty members.</p>

        <p>Hiring in both of these core areas would bring many advantages to
        the wider College community. Both fields are inter-disciplinary, and
        would energize collaboration with allied departments. Both fields
        offer students many opportunities for employment after graduation
        and for graduate study, and both are very rich in research
        opportunities for undergraduates.</p>


        <p>In addition to hiring in these two core development areas, the
        Department hopes to hire other faculty members. The specializations
        we are most interested in now are architecture, programming
        languages, and human-computer interaction. However, past experience
        has taught us that over a seven-year period new areas of importance
        are likely to emerge.</p>

        <h4>Curriculum Development</h4>

        <p>The Computer Science curriculum is in a constant state of
        redevelopment and evolution, partly because the lifespan of a
        technology era is rarely as long as ten years. Nevertheless, the
        basic content and structure of the major, which is largely dictated
        by norms developed by professional societies in the field and other
        academic institutions, may not change too much over the next five to
        seven years. One significant change we plan to implement over this
        period is to offer more undergraduate courses in the above-
        mentioned areas of bioinformatics and information security.  We hope
        to develop a strong sequence of graduate courses in each area as
        well.</p>

        <p>A master&rsquo;s program in bioinformatics is currently in the
        planning stages with the Biology Department. We have both new hires
        and established faculty who are actively involved in various aspects
        of this exciting discipline, and we have established good rapport
        with several members of the Biology faculty who have complementary
        interests. We feel that a master&rsquo;s program in this field will
        draw well-qualified students in the region.</p>

        <p>The Department also hopes to develop a collaborative
        undergraduate program with the Economics Department in computational
        finance, linked to the BBA program.</p>

        <p>In addition, the Department plans to strengthen and expand both
        its Computer Information Technology (CIT) minor and its
        service-course offerings for non-majors. The recently-introduced
        technology minor provides instruction in the design and deployment
        of internet-based applications. While courses in this minor could be
        taught from an Information Technology perspective and stress the use
        of commercial tools, our courses stress design principles and
        realistic models based on algorithmic problem-solving. We believe
        that this minor will be seen by students as relevant and immediately
        stimulating, and will also motivate some of them to dig deeper and
        become computer science majors.</p>

        <p>In an era where technological skills and a sound understanding of
        technological issues and trends are increasingly expected of college
        graduates, we feel our curriculum must address the needs of the
        Queens College student population--not just the needs of Computer
        Science majors.  This is one reason why it is important for us to
        expand our CIT minor and other course-offerings for non- majors.</p>

        <p>A second reason is that this is a good way for us to increase and
        stabilize our enrollment. Historically (if one can speak
        historically of the youngest discipline in our division!), Computer
        Science has been a &ldquo;big major,&rdquo; with around sixty
        credits of required courses, and a &ldquo;big department,&rdquo;
        with the fourth largest number of majors at the College in 2003.
        But, as &ldquo;the technology department&rdquo; at the College,
        Computer Science attracts many students who pursue their
        undergraduate education with a quite limited, career-oriented
        objective: to prepare themselves for their first job. While this
        relates to only one part of the Department&rsquo;s mission, it has
        led to a large fluctuation in our enrollment over the past few years
        as the regional technology-job market has fluctuated.  From 2001 to
        2004 our FTEs dropped by close to 40% -- reflecting the
        &ldquo;dot-com bubble burst&rdquo; of 2001-02 and subsequent
        concerns about off-shoring of programming jobs -- though more recent
        enrollment figures indicate that we are now past the low point and
        the number of students majoring or minoring in our subject is moving
        up again.  We expect the planned expansion of our technology minor
        and service-course offerings for non-majors to significantly
        increase our student numbers, both directly and by attracting more
        well-qualified students to pursue our major, and so provide a more
        stable basis for the Department&rsquo;s future growth.</p>


        <h4>Projecting Our Identity</h4>

        <p>The Department needs to make its strengths and role on campus
        better understood by two audiences: prospective students, and our
        peers in other departments.</p>

        <p>It is important for us to make clear to prospective students how
        and why programs in computer science, and our majors/minors in
        particular, are so important in today&rsquo;s liberal arts
        education.  Students need to understand the five computing
        sub-disciplines identified by the IEEE/CS report cited in the
        Introduction, and how our department relates to those disciplines.</p>

        <p>We believe that our peers in other departments are generally very
        much aware of the central role that technology plays in
        today&rsquo;s society and how it affects their own disciplines. 
        Still, we feel it is important to make it clear that, in addition to
        using technology effectively, the College needs to integrate an
        understanding of technology into the core of its curriculum, and
        that the Computer Science Department is the entity that is uniquely
        qualified to serve as the focal point of this integration
        process.</p>

      </div>

      <h3><span class="section-number">Section 7.5 </span>Recruitment and
      Retention of Faculty and Staff</h3>
      <div>

        <h4>Faculty</h4>

        <p>The Department has been fortunate to attract young and talented
        faculty members for tenure-track Assistant Professorships. Since
        Fall 2003 the following faculty members have joined the Department:
        Jinlin Chen (web design), Kent Boklan (cryptography), Jun Zheng
        (computer architecture) and Boojala Reddy (bioinformatics). We have
        been able to compete in the computer science job market, despite
        lower starting salaries, by offering start-up packages that boost
        our offers: equipment budgets up to $80,000, travel money for the
        first two years, and summer money for one or two months after the
        first academic year of employment. In addition, the College offers
        new faculty 12 hours release time over the first three years. We
        believe that we must continue to offer salaries at the top of the
        CUNY Assistant Professor scale to attract the best candidates,
        especially in highly competitive areas such as bioinformatics and
        information security.</p>

        <p>Two faculty members have left the Department over the last three
        years: Carol Friedman (biomedical informatics) joined the Columbia
        Biomedical Informatics Department in Summer 2004 as a tenured full
        professor. Mingzhou Song (bioinformatics) joined the Bioinformatics
        program at New Mexico State University in Fall 2005 as an Assistant
        Professor.</p>

        <p>The College was extremely supportive in our attempts to retain
        Carol Friedman, offering attractive salary and release time
        incentives. Although Columbia ultimately made it too difficult for
        Carol to return to us, we see that the College has demonstrated its
        willingness and ability to help us attract and retain excellent
        faculty insofar as it is possible.</p>

        <p>Although most of our faculty have remained in the Department and
        obtained tenure, it is clear that faculty in some sought-after areas
        such as bioinformatics will have other opportunities: larger
        salaries, lower teaching loads, and more resources.</p>


        <h4>Technical Staff</h4>

        <p>As mentioned elsewhere, the Department must of necessity rely on
        its own technical staff to manage and maintain our networking and
        computing infrastructure. The College&rsquo;s Office of Converging
        Technologies is not positioned to provide the level of technical
        expertise and responsiveness we need to deal with either our day to
        day or our long-term requirements.</p>

        <p>We currently have two full-time technical staff (Peter Chen and
        Koya Matsuo), and one part-time college assistant (Xiuyi Huang).
        Chen manages the Department&rsquo;s network infrastructure, Unix
        workstations, and handles administrative duties such as budget
        preparation and purchasing as well.  While we are extremely
        fortunate to have such a talented and hardworking individual
        providing these services, the Department is so dependent on his
        services that we feel vulnerable because so much of our operations
        are so dependent on this single individual.</p>

        <p>Matsuo can provide backup for Chen in some day-to-day network
        management tasks, but his real talent is in managing the
        department&rsquo;s numerous Linux and Windows systems.  Huang
        provides support for application software and web development for
        the department.  She also provides some support for hardware
        management.  Although she is a skilled and dedicated resource for
        the Department, we are constrained by the fact that she is not a
        full-time employee.</p>

        <p>An area where we feel we have been deficient is in providing
        professional development resources for our technical staff.  They
        need to be funded for ongoing training so that they can continue to
        provide the department with the flexible state of the art
        infrastructure that we have come to depend on.  Because there is no
        realistic alternative to being self-sufficient with regard to
        planning, installing, and maintaining our technical infrastructure,
        it is important that we develop as much cross-training among the
        members of our staff as possible in order to minimize our exposure
        to overdependence on single individuals.</p>

      </div>

      <h3><span class="section-number">Section 7.6 </span>Questions for and
      Advice Sought from External Reviewers</h3>

      <div>

        <ul>

          <li>We feel that the main problem facing the department is its
          high teaching load.  Do you agree?</li>

          <li>Given that tenure and promotions are based on research
          productivity, how can faculty balance their teaching duties and
          their research needs?</li>

          <li>Is there a precedent we can cite to convince the
          administration to take into account the fact that teaching in
          computer science often requires more preparation than teaching in
          most other disciplines, owing to the continual and rapid evolution
          of our field?</li>

          <li>We believe that the Department needs to establish research
          leadership in cluster areas in order to improve external funding. 
          Do you agree?</li>

          <li>Do you think the areas we have chosen for growth,
          bioinformatics and information security, are appropriate given the
          current state of the discipline and our current faculty&rsquo;s
          credentials in these areas?</li>

          <li>What actions should the department take to attract leaders in
          these areas?</li>

          <li>What other steps should be taken to increase our research
          productivity and external funding?</li>
          
          <li>Are there changes we should make to improve our
          curriculum?</li>
          
          <li>How can we take advantage of the fact that we are located in
          New York City and the unique resources it provides?</li>

          <li>Do you see other weaknesses we are overlooking, but should
          attend to?</li>

          <li>Do you see ways in which we could better exploit our
          strengths?</li>

        </ul>

      </div> <!-- End Section 7.6 -->
    </div> <!-- End Section 7 -->
  </div> <!-- End Analysis -->

  <div id="backmatter">
    <h2 id="web_links">Web Links</h2>
    <div class="whitebox">

      <dl>

        <dt>Association for Computing Machinery (ACM)</dt>
        <dd><a href="http://www.acm.org">www.acm.org</a></dd>

        <dt>Computer Research Association (CRA)</dt>
        <dd><a href="http://www.cra.org">www.cra.org</a></dd>

        <dt>Institute for Electronics and Electrical Engineers</dt>
        <dd><a href="http://www.ieee.org">www.ieee.org</a></dd>

        <dt>Intel Corporation</dt>
        <dd><a href="http://www.intel.com">www.intel.com</a></dd>

        <dt>National Education Association (NEA)</dt>
        <dd><a href="http://www.nea.org">www.nea.org</a></dd>

        <dt>Queens College</dt>
        <dd><a href="http://qcpages.qc.cuny.edu">qcpages.qc.cuny.edu</a></dd>

        <dt>Safari Bookshelf</dt>
        <dd><a href="http://safaribooksonline.com">safaribooksonline.com</a></dd>

      </dl>

    </div>

    <h2 id="references">References</h2>
    <div class="whitebox">

      <table summary="Table of information sources cited."
             id="references_table">

  <!-- Citation Template
        <tr>
          <td>[<a id="">tag-name</a>]</td>
          <td>Author
          </td>
          <td>Title. <cite>Reference. <a href="">Online link</a></cite>
          </td>
        </tr>

  -->
        <tr>
          <td>[<a id="abet2005">ABET 2005</a>]</td>
          <td>ABET Corporation
          </td>
          <td>Criteria For Accrediting Computing Programs Effective for
          Evaluations During the 2006-2007 Accreditation Cycle.
          <cite>Baltimore: ABET Corporation, October 2005.
          <a href="http://www.abet.org/Linked%20Documents-UPDATE/Criteria%20and%20PP/C001%2006-07%20CAC%20Criteria%202-9-06_copy(1).pdf">
          Online link</a></cite>
          </td>
        </tr>

        <tr>
          <td>[<a id="acm2005">ACM 2005</a>]</td>
          <td>Joint Task Force for Computing Curricula 2005, R. Shackelford
          (Chair)
          </td>
          <td>Computing Curricula 2005: The Overview Report. <cite><a
            href="http://www.acm.org/education/curric_vols/CC2005-March06Final.pdf">
            Online Link</a>.</cite>
          </td>
        </tr>

        <tr>
          <td>[<a id="qc2005">QC 2005</a>]</td>
          <td>Office of Institutional Research
          </td>
          <td>Queens College Fact Book 2004-2005. <cite>Queens College Office of
          Institutional Research, 2005.</cite>
          </td>
        </tr>

        <tr>
          <td>[<a id="vegso2005">Vegso&nbsp;2005</a>]</td>
          <td>
            Vegso,&nbsp;J.
          </td>
          <td>
            Interest in CS as a Major Drops Among Incoming Freshmen.
            <cite>Computing Research News, 17(3), May 2005. <a
            href="http://www.cra.org/CRN/articles/may05/vegso.html">Online
            Link</a>.</cite>
          </td>
        </tr>

        <tr>
          <td>[<a id="young2002">Young&nbsp;2002</a>]</td>
          <td>Young&nbsp;J.&nbsp;R.
          </td>
          <td>Homework? What Homework? <cite>Chronicle of Higher Education,
          December 6, 2002. <a
          href="http://www.cse.buffalo.edu/~rapaport/che.homework.html">Online
          link</a></cite>
          </td>
        </tr>

        <tr>
          <td>[<a id="zweben2005">Zweben&nbsp;2005</a>]</td>
          <td>
            Zweben,&nbsp;S.
          </td>
          <td>
            2003-2004 Taulbee Survey: Record Ph.D. Production on the Horizon;
            Undergraduate Enrollments Continue in Decline. <cite>Computing
            Research News, 17(3), May 2005. <a
            href="http://www.cra.org/CRN/articles/may05/taulbee.html">Online
            Link</a>.</cite>
          </td>
        </tr>

      </table>
    </div>

    <h2 id="appendices">Appendices</h2>
    <div class="whitebox">
      <ul>
        <li>Appendix A: <a href="#appendix_a">Course Descriptions</a></li>
        <li>Appendix B: <a href="#appendix_b">Faculty Vitae</a></li>
        <li>Appendix C: <a href="#appendix_c">Student/Alumni Survey</a></li>
      </ul>
    </div>
    <h2 class="appendix" id="appendix_a">Appendix A: Course Descriptions</h2>
    <div class="whitebox">

      <p><span class="run-in-heading">12. Understanding and Using
      Personal Computers. 2 lec., 2 lab. hr.; 3 cr. Prereq.: Two and
      one-half years of high school mathematics, including intermediate
      algebra, or Mathematics 6 or 8. </span>Hands-on introduction to
      computers, computation, and the basics of computer hardware and
      software. Students will have experience during the instructed
      microcomputer lab with a number of software environments including
      an operating system, a word processor, a spreadsheet and a
      database package. The course will focus on problem solving and
      programming with the context of these packages. In addition,
      students will acquire the skills needed to learn other software
      packages on their own. Not open for credit to students who have
      taken Computer Science 18.  (SQ)</p>

      <p><span class="run-in-heading">18. Computers with Business
      Applications. 2 lec., 2 lab. hr.; 3 cr.  Prereq.: Admission to the
      Business and Liberal Arts minor or the Business Administration
      major. </span>Fundamentals of using the operating system and
      application software.  Business-oriented uses of software
      applications including: word processing, spreadsheets,
      presentations, and database management.  Emphasis on realistic
      situations and problem-solving strategies used in business. An
      important part of the course is a research project/presentation of
      topics involving current issues arising from the use of computer
      technology in a business environment. Some sections will be
      limited to those admitted to the major in business administration,
      and others will be limited to those admitted to the minor in
      Business and Liberal Arts (BALA). (SQ)</p>

      <p><span class="run-in-heading">80. Problem Solving with
      Computers. 2 lec., 2 lab hr.; 3 cr.  Prereq.: Computer Science
      12. </span>An introduction to computer science through problem
      solving, focusing on the methodology of problem solving rather
      than specific hardware or software tools. Students will learn how
      to select and use specific software tools advantageously. Lab
      exercises will exemplify the problem solving methodology. (SQ)</p>

      <p><span class="run-in-heading">81. HTML and WWW Programming. 3
      hr.; 3 cr. Prereq.: Computer Science 80. </span>Introduction to
      computer networks from a user&rsquo;s perspective and the World
      Wide Web. The course will provide hands-on experience with
      electronic mail, file transfer, Telnet, and Web browsers,
      including the creation of Web pages using HTML, Javascript, and
      CGI scripts; image preparation and editing; scanning and OCR.</p>

      <p><span class="run-in-heading">82. Multimedia Fundamentals and
      Applications. 3 hr.; 3 cr. Prereq.: Computer Science 80. </span>A
      comprehensive introduction to the fundamental concepts,
      techniques, and tools that underlie the use of multimedia in
      scientific and business applications. Major topics include the
      principles of image, sound, and video synthesis; software and
      industry standards; and typical applications.</p>

      <p><span class="run-in-heading">84. Models of Computation. 3 hr.;
      3 cr. Prereq.: Math 122. </span>This course is intended to develop
      the ability to solve problems using differing models of
      computation. It will develop reasoning ability by creating a
      computing environment with very few rules which will then be used
      to develop algorithms within the scope of the model of
      computation. These environments will be models of actual computing
      environments. The nature of what an algorithm is will be
      developed. </p>

      <p><span class="run-in-heading">85. Database Application
      Programming. 3 hr.; 3 cr. Prereq.: Computer Science 80. </span>A
      continuation of Computer Science 80. Students will learn to
      program databases using SQL. Microsoft Access integrated with
      Visual Basic. In addition, object-oriented database programming
      such as Oracle and Jasmine will be covered.</p>

      <p><span class="run-in-heading">86. Science, Computing Tools, and
      Instrumentation. 4 hr.; 3 cr.  Prereq.: Math 122. </span>Science
      and society; principles for scientific exploration; scientific
      visualization and mathematical analysis: concepts and techniques;
      computing tools for visualization and computational analysis;
      Internet tools for science exploration; concept of integrated
      computing environment for scientific study and collaboration;
      PC-instrumentation. Applications to social science, biochemistry,
      psychology, physical, chemical, and earth science. (SQ)</p>

      <p><span class="run-in-heading">90.1, 90.2, 90.3. Topics in
      Computing. 1 hr.; 1 cr., 2 hr.; 2 cr., 3 hr.; 3 cr. </span>Topics
      in computer programming and applications at a level appropriate
      for students who are not majoring in computer science.  Topics and
      prerequisites will be announced at registration time. The course
      may be repeated for credit providing the topic is different, and
      may not be applied toward the major in computer science.</p>

      <p><span class="run-in-heading">111. Introduction to Algorithmic
      Problem Solving. 2 lec., 2 lab. hr.; 3 cr.  Prereq. or coreq.:
      Math 120 or 151 or equivalent. </span>Introduction to the
      principles and practice of programming.  Topics include primitive
      data types; concepts of object, class, and method; control
      structures; arrays; procedures and functions; parameter passing;
      scope and lifetime of variables; input and output;
      documentation.</p>

      <p><span class="run-in-heading">112. Introduction to Algorithmic
      Problem Solving in Java. 2 lec., 2 lab. hr.; 3 cr. Prereq. or
      coreq.: Math 120 or 151 or equivalent, and open only to students
      in the TIME-2000 program (consult the Department of Secondary
      Education for details). </span>Introduction to the principles and
      practice of programming.  Topics include primitive data types;
      concepts of object, class, and method; control structures; arrays;
      procedures and functions; parameter passing; scope and lifetime of
      variables; input and output; documentation.</p>

      <p><span class="run-in-heading">211. Object-Oriented Programming
      in C++. 2 lec., 2 lab. hr.; 3 cr.  Prereq.: Computer Science
      111. </span>Object-oriented algorithmic problem solving in C++,
      with attention to general as well as language-specific issues
      including pointer and pointer arithmetic; linked lists; memory
      management; recursion; operator overloading; inheritance and
      polymorphism; stream and file I/O; exception handling; templates
      and STL; applications of simple data structures; testing and
      debugging techniques.</p>

      <p><span class="run-in-heading">212. Object-Oriented Programming
      in Java. 2 lec., 2 lab. hr.; 3 cr.  Prereq.: Computer Science
      111. </span>Object-oriented algorithmic problem solving in Java,
      with attention to general as well as language-specific issues
      including applications, event- driven programming; elements of
      graphical user interfaces (GUIs); linked lists; recursion;
      inheritance and polymorphism; file I/O; exception handling;
      packages; applications of simple data structures; applets; concept
      of multi-threading; testing and debugging.</p>

      <p><span class="run-in-heading">220. Discrete Structures. 3 lec.
      hr.; 3 cr. Prereq.: Mathematics 120 and 151 or 141; Computer
      Science 111. </span>Algorithms, recursion, recurrences, asymptotes,
      relations, graphs and trees, applications. (SQ)</p>

      <p><span class="run-in-heading">240. Computer Organization and
      Assembly Language. 3 lec., 1 lab.  hr.; 3 cr. Prereq.: Computer
      Science 111. </span>Principles of computer design and
      implementation. Instruction set architecture and register transfer
      level execution; storage formats; binary data encoding; bus
      structures; assembly language programming.  (SQ)</p>

      <p><span class="run-in-heading">280. Self-Study Programming. 3
      hr.; 1 cr. Prereq.: Computer Science 313. </span>Self-study and
      mastery of a programming language or package through reading and
      practice. Students should consult the department at the beginning
      of the semester for reading materials and assignments. May be
      repeated for a maximum of five credits provided the topic is
      different.</p>

      <p><span class="run-in-heading">310. WWW Programming. 1 hr.; 1 cr.
      Prereq.: Permission of the instructor. </span>Students will learn
      to do server-side programming for Web pages through hands-on
      assignments. Topics include the Common Gateway Interface (CGI),
      UNIX scripts in PERL, Javascript, image manipulation, and text
      scanning. May not be used as an elective for the computer science
      major.</p>

      <p><span class="run-in-heading">313. Data Structures. 3 hr.; 3 cr.
      Prereq.: Computer Science 211, 212, and 220. </span>Fundamental
      data structures and their implementations: stacks, queues, trees
      (binary and AVL), heaps, graphs, hash tables.  Searching and
      sorting algorithms.  Runtime analysis.  Examples of
      problem-solving using divide-and-conquer, backtracking, and
      greedy-algorithm. (SQ)</p>

      <p><span class="run-in-heading">316. Principles of Programming
      Languages. 3 lec. hr.; 3 cr. Prereq.: Computer Science 220, 240,
      313, and 320. </span>Principles and implementation of programming
      languages. Topics include: the procedural, object-oriented,
      functional, and logic programming paradigms; syntax (BNF,
      expression grammars, operator precedence and associativity);
      variables (scope, storage bindings, and lifetime); data types;
      control structures; function call and return (activation records
      and parameter passing); formal semantics. Programming
      assignments.</p>

      <p><span class="run-in-heading">317. Compilers. 3 hr.; 3 cr.
      Prereq.: Computer Science 316. </span>Formal definitions of
      programming languages: introduction to compiler construction
      including lexical, syntactic, and semantic analysis, code
      generation, and optimization. Students will implement portions of
      a compiler for some structured language. (SQ)</p>

      <p><span class="run-in-heading">320. Theory of Computation. 3 hr.;
      3 cr. Prereq.: Computer Science 111 and 220. </span>Finite state
      machines, regular languages, regular expressions, grammars,
      context-free languages, pushdown automata, Turing machines,
      recursive sets, recursively enumerable sets, reductions, Halting
      problem, diagonalization.</p>

      <p><span class="run-in-heading">323. Design and Analysis of
      Algorithms. 3 hr.; 3 cr. Prereq.: Computer Science 220 and
      313. </span>Advanced data structures: B-trees, graphs, hash-tables.
      Problem-solving strategies including divide-and-conquer,
      backtracking, dynamic programming, and greedy algorithms. Advanced
      graph algorithms.  Time complexity analysis. NP-complete problems.
      Applications to sorting, searching, strings, graphs. Programming
      projects. (SQ)</p>

      <p><span class="run-in-heading">331. Database Systems. 3 hr.; 3
      cr. Prereq.: Computer Science 220, 313. </span>ER modeling;
      functional dependencies and relational design; file organization
      and indexing; relational algebra and calculi as query languages;
      SQL; transactions, concurrency and recovery; query processing.
      Programming projects.</p>

      <p><span class="run-in-heading">332. Object-Oriented Databases. 3
      hr.; 3 cr. Prereq.: Computer Science 331. </span>Review of basic
      database components and architecture; comparisons of OO databases
      with relational databases; modeling languages and methods, data
      definition languages; schema design methodology; the role of
      inheritance, object identity, and object sharing in OODBs; file
      structures and indexes for OODBs; transaction processing;
      concurrency control and recovery; development of database
      applications using a commercial OODB system.</p>

      <p><span class="run-in-heading">334. Data Mining and Warehousing.
      3 hr.; 3 cr.  Prereq.: Math 241 and Computer Science
      313. </span>Data mining and data warehousing: data warehouse
      basics; concept of patterns and visualization; information theory;
      information and statistics linkage; temporal-spatial data; change
      point detection; statistical association patterns; pattern
      inference and model discovery; Bayesian networks; pattern ordering
      inference; selected case study.</p>

      <p><span class="run-in-heading">335. Information Organization and
      Retrieval. 3 hr.; 3 cr. Prereq.: Computer Science
      331. </span>Concepts of information retrieval: keywords and Boolean
      retrieval; text processing, automatic indexing, term weighting,
      similarity measures; retrieval models: vector model, probabilistic
      model; extended Boolean systems: fuzzy set, p-norm models;
      linguistic model; extensions and AI techniques: learning and
      relevance feedback; term dependence; document and term clustering;
      network approaches; linguistic analysis and knowledge
      representation. Implementation: inverted files; efficiency issues
      for large-scale systems; integrating database and information
      retrieval.</p>

      <p><span class="run-in-heading">340. Operating Systems Principles.
      3 hr.; 3 cr. Prereq.: Computer Science 220, 240, and
      313. </span>Principles of the design and implementation of
      operating systems.  Concurrency, multithreading, synchronization,
      CPU scheduling, interrupt handling, deadlocks, memory management,
      secondary storage management, file systems. Programming projects
      to illustrate portions of an operating system. (SQ)</p>

      <p><span class="run-in-heading">342. Operating-System Programming.
      3 hr.; 3 cr. </span>A study of the internal structures of a
      particular operating system such as Unix, or another chosen by the
      department. (The operating system to be studied is announced at
      registration time.) Projects are assigned which involve system
      calls, use of the I/O and file systems, memory management, and
      process communication and scheduling. Projects may also involve
      developing new or replacement modules for the operating system
      Such as the command interpreter or a device driver. A student may
      receive credit for this course only once. (SQ)</p>

      <p><span class="run-in-heading">343. Computer Architecture. 3 hr.;
      3 cr. Prereq.: Computer Science 240. </span>Instruction set
      architectures, including RISC, CISC, stack, and VLIW
      architectures. The memory hierarchy, including cache design and
      performance issues, shared memory organizations, and bus
      structures.  Models of parallel computing, including
      multiprocessors, multicomputers, multivector, SIMD, PRAM, and MIMD
      architectures. Pipelining models, including clocking and timing,
      instruction pipeline design, arithmetic pipeline design, and
      superscalar pipelining. (SQ)</p>

      <p><span class="run-in-heading">344. Distributed Systems. 3 lec.,
      1 lab. hr.; 3 cr. Prereq.: Computer Science 340. </span>Issues in
      the implementation of computer systems using multiple processors
      linked through a communication network. Communication in
      distributed systems including layered protocols and the
      client-server model; synchronization of distributed processes and
      process threads.</p>

      <p><span class="run-in-heading">345. Logic Design Lab. 2 lec., 3
      lab. hr.; 3 cr. Prereq.: Computer Science 340. </span>Design
      principles and laboratory implementation of logical devices from
      flip-flops to peripheral interfaces.</p>

      <p><span class="run-in-heading">348. Data Communications. 3 hr.; 3
      cr. Prereq.: Computer Science 343. </span>Computer communications
      and networks; carriers, media, interfaces (RS 232, RS 422, CCITT);
      circuit types, data codes, synchronous and asynchronous
      transmission; protocols (OSI, TCP/IP); modems, multiplexors, and
      other network hardware; error correction and encryption; voice and
      data switching: local area networks, ISDN, packet switching;
      issues in the architecture, design, and management of networks.
      (SQ)</p>

      <p><span class="run-in-heading">352. Cryptography. 3 hr.; 3 cr.
      Prereq.: Computer Science 313. </span>An introduction to
      cryptographic practices, concepts and protocols.  Topics include
      the mathematical foundations for cryptography, public key methods
      (e.g., RSA and El Gamal), block ciphers (e.g., DES and Rijndael),
      key agreement architectures (Diffie-Hellman), linear feedback
      shift registers and stream ciphers (e.g., A5 for GSM encryption),
      signatures and hash functions, (pseudo) random number generators
      and how to break the ENIGMA machine.</p>

      <p><span class="run-in-heading">355. Internet and Web
      Technologies. 3 hr.; 3 cr.  Prereq.: Computer Science
      313. </span>Internet protocol stack, analysis of representative
      protocols; Internet applications: client-server architecture,
      popular Internet application protocols, Internet application
      design, client side programming, server side programming, Web
      application and website design; programming projects.</p>

      <p><span class="run-in-heading">361. Numerical Methods. 3 hr.; 3
      cr. Prereq.: Computer Science 211 and Math 201. </span>Numerical
      methods and efficient computation, approximation, and
      interpolation. Computer solution of systems of algebraic and
      ordinary differential equations.</p>

      <p><span class="run-in-heading">363. Artificial Intelligence. 3
      hr.; 3 cr. Prereq.: Computer Science 316. </span>Principles of
      artificial intelligence. Topics include logic and deduction;
      resolution theorem proving; space search and game playing;
      language parsing; image understanding; machine learning and expert
      systems. Programming projects in LISP, PROLOG, or related
      languages.  (SQ)</p>

      <p><span class="run-in-heading">368. Computer Graphics. 3 hr.; 3
      cr. Prereq.: Computer Science 220 and 313. </span>Introduction to
      the hardware and software components of graphics systems,
      representations of 2D and 3D primitives, geometric and viewing
      transformations, techniques for interaction, color models and
      shading methods, algorithms for clipping, hidden surface removal,
      and scan-conversion.  Programming projects using a graphics API to
      demonstrate the process of computerized image synthesis. (SQ)</p>

      <p><span class="run-in-heading">370. Software Engineering. 4 lec.,
      1 lab. hr.; 3 cr. Prereq.: Computer Science 220 and
      313. </span>Principles of software engineering including the
      software life cycle, reliability, maintenance, requirements and
      specifications, design, implementation and testing. Oral and
      written presentations of the software design. Implementation of a
      large programming project using currently-available software
      engineering tools.</p>

      <p><span class="run-in-heading">381. Special Topics in Computer
      Science. 381.1-381.4, 1-4 hr.; 1-4 cr. Prereq.: Permission of
      department. </span>No more than 3 credits of CS 390-397 may be used
      as an elective for the Computer Science major or minor.</p>

      <p><span class="run-in-heading">390. Honors Readings in Computer
      Science. 3 hr.; 3 cr. Prereq.: Junior or senior standing and
      permission of instructor. </span>Students will study and report on
      survey and research papers dealing with various current topics in
      computer science selected by the instructor. Topics for each
      offering of the course will be announced at registration time.</p>

      <p><span class="run-in-heading">391. Honors Problems in Computer
      Science. 391.1-391.3, 1-3 hr.; 1-3 cr. Prereq.: Permission of
      department. </span>Open to students majoring in computer science
      who, in the opinion of the department, are capable of carrying out
      the work of the course. Each student works on a research problem
      under the supervision of a member of the staff.</p>

      <p><span class="run-in-heading">393. Honors Thesis. 3 hr.; 3 cr.
      Prereq.: Junior or senior standing and approval of the
      Department&rsquo;s Honors and Awards Committee. </span>The student
      will engage in significant research under the supervision of a
      faculty mentor and a thesis committee consisting of the mentor and
      two additional faculty members. The thesis proposal and committee
      must be approved by the Departmental Honors and Awards Committee.
      Upon completion of the research paper, an oral presentation of the
      results, open to the public, will be given. With the approval of
      the mentor, thesis committee, and the Department&rsquo;s Honors
      and Awards Committee, the course may be repeated once for credit
      when the level of the student&rsquo;s work warrants a full year of
      effort.</p>

      <p><span class="run-in-heading">395. Research Projects.
      395.1-395.3, 1-3 hr.; 1-3 cr. Prereq.: Permission of
      department. </span>Open to majors and non-majors who, in the
      opinion of the department, are capable of carrying out an
      independent project of mutual interest under the supervision of a
      member of the staff.</p>

      <p><span class="run-in-heading">398. Internship. 398.1, 45 hr.; 1
      cr.; 398.2, 90 hr., 2 cr.; 398.3, 135 hr.; 3 cr. Prereq.:
      Completion of 15 credits in computer science and departmental
      approval. </span>Computer science students are given an opportunity
      to work and learn for credit. Students should consult the
      College&rsquo;s Office of Career Development and Internships for
      listings of available internships and procedures for applying. A
      proposal must be approved by the department before registration.
      The student&rsquo;s grade will be based on both the
      employer&rsquo;s and faculty sponsor&rsquo;s evaluations of the
      student&rsquo;s performance, based on midterm and final reports. A
      limit of 6 credits of internships may be taken. Computer Science
      398 may not be applied to the computer science major or minor.</p>

    </div> <!-- End Appendix A -->

    <h2 class="appendix" id="appendix_b">Appendix B: Curricula Vitae</h2>
    <div class="whitebox" id="vitae-div">

      <p>The following are all links to PDF files:</p>

      <ul>
        <li><a href="Vitae/Boklan.pdf">K. Boklan</a></li>
        <li><a href="Vitae/Brown.pdf">T. Brown</a></li>
        <li><a href="Vitae/Chen.pdf">J. Chen</a></li>
        <li><a href="Vitae/Fluture.pdf">S. Fluture</a></li>
        <li><a href="Vitae/Goldberg.pdf">R. Goldberg</a></li>
        <li><a href="Vitae/Gross.pdf">A. Gross</a></li>
        <li><a href="Vitae/Kong.pdf">Y. Kong</a></li>
        <li><a href="Vitae/Kwok.pdf">K. Kwok</a></li>
        <li><a href="Vitae/Lord.pdf">K. Lord</a></li>
        <li><a href="Vitae/Obrenic.pdf">B. Obreni&#263;</a></li>
        <li><a href="Vitae/Phillips.pdf">I. Phillips</a></li>
        <li><a href="Vitae/Reddy.pdf">B. Reddy</a></li>
        <li><a href="Vitae/Ryba.pdf">A. Ryba</a></li>
        <li><a href="Vitae/Sy.pdf">B. Sy</a></li>
        <li><a href="Vitae/Vickery.pdf">C. Vickery</a></li>
        <li><a href="Vitae/Waxman.pdf">J. Waxman</a></li>
        <li><a href="Vitae/Whitehead.pdf">J. Whitehead</a></li>
        <li><a href="Vitae/Xiang.pdf">Z. Xiang</a></li>
        <li><a href="Vitae/Yukawa.pdf">K. Yukawa</a></li>
        <li><a href="Vitae/Zheng">J. Zheng</a></li>
      </ul>

    </div> <!-- End Appendix B -->


    <h2 class="appendix" id="appendix_c">Appendix C: Student-Alumni
    Survey</h2>
    <div class="whitebox" id="survey-div">

    <p><strong>NOTE: </strong>The survey may also be viewed as a <a
    href="Survey_Summary.pdf">separate PDF document</a>.</p>

    <noscript><p>The PDF viewer below has a fixed size because your
    browser&rsquo;s Javascript feature is turned off.  If you want the viewer
    to adjust to the size of your browser window, enable
    Javascript.</p></noscript>

    <!-- TODO - Object Doesn't show up in Opera and/or Prince -->
    <object type="application/pdf"
            data="Survey_Summary.pdf"
            width="800"
            height="600"
            id="survey_pdf">

        <!-- Stupid Opera Hack: - Hovering over links near the end of the
           -   content div cause the div to jump up, making it impossible to
           - click on the link.  The lovely blank lines in the next
           - paragraph provide a robust and esthetically pleasing solution.
          -->
        <p>The <a href="Survey_Summary.pdf">separate PDF document</a> is the
        only option available for this browser.
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        <br/>&nbsp;
        </p>

      </object>

    </div> <!-- End Appendix C -->
  </div> <!-- End Backmatter -->  
</div> <!-- End Content -->

<div id="footer">
  <p id="validate"> <a
    href="http://validator.w3.org/check?uri=referer">XHTML</a>&nbsp;-
    <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    (Validator does not handle CSS3)
    <br /> <em>Last updated <?php echo date("Y-m-d",
    filemtime($_SERVER['SCRIPT_FILENAME'])); ?></em> </p>
</div>

</body>
</html>

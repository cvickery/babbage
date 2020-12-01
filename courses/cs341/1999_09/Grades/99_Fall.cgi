#!/usr/local/bin/perl

use CGI qw(:standard);

print header, start_html("Course Grades");


if(param()) {                               # Has the form been filled out?
  # Yes, open the hash table
  dbmopen (%the_hash, "99_Fall", 0666) || die "can't open 99_Fall: $!";

  @headers = split "\t", $the_hash{headers};  # an array for the first line
  $ID = param("ID1")."-".param("ID2")."-".param("ID3"); # Search Key
  @results = split "\t", $the_hash{$ID};      # pull the data from the hash
  $field = 0;
  $length = @headers;
  while ($field < $length) {   # store the data in a hash
    $grades{ $headers[ $field ] } = $results[$field];
    $field = $field + 1;
    }

  # The text of the page

  if ( $#results != $#headers ) {
    print "<H2>ID $ID Not Found</H2>";
    print "Please contact Dr. Vickery if this is an error.<P><HR>";
    }
  else {
    print <<ENDOFMESSAGE;

    <H2>CS-341 Grades for $grades{"Proper Name"}</H2><HR>
    <TABLE align=center border=1>
      <TR><TH align=center>Homwrk 1
          <TH align=center>Homwrk 2
          <TH align=center>Homwrk 3
          <TH align=center>Homwrk 4
          <TH align=center>Homwrk 5
          <TH align=center>Homwrk 6
          <TH align=center>Homwrk 7
          <TH align=center>Homwrk Pts
          <TH align=center>Exam 1
          <TH align=center>Exam 2
          <TH align=center>Exam 3
          <TH align=center>Course Average
          <TH align=center>Course Grade
      <TR>
          <TD align=center>$grades{"HW_1"}
          <TD align=center>$grades{"HW_2"}
          <TD align=center>$grades{"HW_3"}
          <TD align=center>$grades{"HW_4"}
          <TD align=center>$grades{"HW_5"}
          <TD align=center>$grades{"HW_6"}
          <TD align=center>$grades{"HW_7"}
          <TD align=center>$grades{"HW Avg"}
          <TD align=center>$grades{"Exam_1"}
          <TD align=center>$grades{"Exam_2"}
          <TD align=center>$grades{"Exam_3"}
          <TD align=center>$grades{"Average"}
          <TD align=center>$grades{"Grade"}
    </TABLE><P>

The class average on the last exam was 73 (median 75).  There
were 5 A's, 4 B's, 11 C's, 4 D's, and 3 F's in the course.<P>

Your course average was computed as follows:  Exams 1 and 2 counted
30% each, and the final exam counted 40%.  If your lowest
exam score was 5 points or more below the average of the
other two, its weight was reduced by 10% and the weights of
the other two were increased by 5% each.  If you handed in
all seven of the homeworks I added two points to your
average, and if you handed in six of the seven homeworks I
added one point to your average.<P>

The translation of your course average into a letter grade is a
mechanical process specified in the college bulletin.  So don't ask me
to change your grade if your average is close to a higher letter grade;
everyone gets a letter grade strictly determined by the numerical value
of their course average.  On the other hand, if you see that I recorded
one of your grades incorrectly, let me know and I'll correct your grade
for you.<P>

ENDOFMESSAGE

$_ = $grades{"Grade"};

if ( /A(.)*/ ) {
  print "Congratulations on a great job!<P>";
  }
else {
  if (/[BC](.)*/ ) {
    print "Congratulations on completing the course successfully.<P>";
    }
  else {
    print  "I am sorry you were unable to complete the course ",
            "successfully.<P>";
      }
    }
  print "<HR>";
  }
}

else {

  # No parameter to script, get user's ID


  print "<H2>Enter Your ID Number</H2>";
  print start_form(), "<center>";
  print "<input name=\"ID1\", type=text, size=3, maxlength=3>-",
        "<input name=\"ID2\", type=text, size=2, maxlength=2>-",
        "<input name=\"ID3\", type=text, size=4, maxlength=4>";
  print p(submit("Show me my grade!"));
  print "</center>", end_form(), hr();
}

print end_html; # Close the page up
dbmclose(%the_hash); # Close the hash table


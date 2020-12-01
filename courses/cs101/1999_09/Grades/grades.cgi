#!/app/gnu/bin/perl

use CGI qw(:standard);

print header, start_html("Course Grades");


if(param()) {                               # Has the form been filled out?
  # Yes, open the hash table
  dbmopen (%the_hash, "grades", 0666) || die "can't open grades: $!";

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

    <H2>CS-101 Grades for $grades{Name}</H2><HR>
    <TABLE align=center border=1>
      <TR><TH align=center>Quiz 1
          <TH align=center>Quiz 2
          <TH align=center>Quiz 3
          <TH align=center>Quiz 4
          <TH align=center>Exam 1
          <TH align=center>Exam 2
          <TH align=center>Exam 3
          <TH align=center>Course Average
        <TH>Course Grade
      <TR>
          <TD align=center>$grades{"Quiz 1"}
          <TD align=center>$grades{"Quiz 2"}
          <TD align=center>$grades{"Quiz 3"}
          <TD align=center>$grades{"Quiz 4"}
          <TD align=center>$grades{"Exam 1"}
          <TD align=center>$grades{"Exam 2"}
          <TD align=center>$grades{"Exam 3"}
          <TD align=center>$grades{"Course Avg"}
          <TD align=center>$grades{"Grade"}
      
    </TABLE><P>
The class average on the last exam was 76.7 (median 77.4).  There
were 10 A's, 12 B's, 6 C's, 6 D's, and 9 F's in the course.  There were
also 10 students who registered for the course but dropped it during the
term and another 6 students who registered for the course but did not
take all the exams.<P>

Your course average was computed as follows:  Your quiz average
(multiplied by 10) and each of the three exams counted 25% of your
course average each.  However, if any one of these was 10 points lower
than the average of the other three, that item's weight was reduced to
15% and an additional 3.3% was added to the weights of the other three.
Finally, people who missed the first or second exam and talked to me
about it were allowed to take a makeup exam the day after the final; but the
weight of their makeup exams was reduced by 10%.<P>

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


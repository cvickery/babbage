#!/app/gnu/bin/perl

use CGI qw(:standard);

print header, start_html("Course Grades");

if(param()) {                               # Has the form been filled out?
  # Yes, open the hash table
  dbmopen (%the_hash, "00_Spring", 0666) || die "can't open 00_Spring: $!";

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
    These are the grades I have recorded for you so far this
    semester.  The "Course Average" and "Grade" columns show
    what you would get if you didn't submit anything else
    for the rest of the term.  They aren't the average of
    the work you have submitted so far!<P>

    <TABLE align=center border=1>
      <TR>
          <TH align=center>Exercise 1
          <TH align=center>Quiz 1
          <TH align=center>Quiz 2
          <TH align=center>Quiz 3
          <TH align=center>Quiz 4
          <TH align=center>Exam 1
          <TH align=center>Exam 2
          <TH align=center>Exam 3
          <TH align=center>Course Average
          <TH>Course Grade
      <TR>
          <TD align=center>$grades{"Exercise 1"}
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
#    print  "I am sorry you were unable to complete the course ",
#            "successfully.<P>";
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


#! /usr/local/bin/php
<?php

//  populate_submissions.php
//  ===============================================================================================
/*  This code reads a UTF-8 encoded tab-separated values (TSV) file, generates, and executes 
 *  PostgreSQL INSERT queries to add each row of the TSV file into the submissions table of the
 *  gened database.
 *
 *  Notes:
 *
 *  All CSV files that I have examined had invalid character codes for non-ASCII characters.  They
 *  are not UTF anything, not ISO-8859-1, not anything that I can decipher. Example: the non-ASCII
 *  character eacute (é) is 0x00E9 in UTF-16, 0xC3A9 in UTF-8, or 0xE9 in ISO-8859-1.
 *  
 *  But the CSV files generated by Excel and/or Numbers use 0x8e for this character. Bummer.
 *  
 *  But examining an XLS spreadsheet in Excel or Numbers shows the proper characters before saving
 *  the file in CSV format, so the problem is not bad data in the spreadsheet. What happens during
 *  the xls-to-csv conversion remains a mystery to me.
 *
 *  Excel can export a spreadsheet in TXT format, which uses tabs instead of commas to separate
 *  the values. In this case, non-ASCII characters are generated correctly, but PHP cannot read
 *  the file correctly. (There might be a way to use the setlocale() function to get it to work,
 *  but I was unable to do so.)
 *
 *  A dump of TXT files exported by Excel revealed that the file is in UTF-16LE format (on this
 *  Intel-based computer; mabye UTF-16BE on another type of processor). I used the command line,
 *    iconv -f UTF-16LE file.txt > file.tsv
 *  to generate the TSV file that is read by the program. I used the second argument to
 *  fgetcsv() to make the separators be tabs instead of commas.
 *
 *  After little more than a week of full-time effort, it seems to work.
 *
 *  ccv September 9, 2010.
 */
//  sanitize()
//  -----------------------------------------------------------------------------------------------
/*  Replace straight quotes with curly quotes. If there is a space to the left of it, it's a left
 *  quote. Otherwise, it's a right quote.
 */
function sanitize($str)
{
  $returnValue = preg_replace("/ \"/", " “", $str);
  $returnValue = preg_replace("/\"/", "”", $returnValue);
  $returnValue = preg_replace("/ '/", " ‘", $returnValue);
  $returnValue = preg_replace("/'/", "’", $returnValue);
  return $returnValue;
}

//  main()
//  -----------------------------------------------------------------------------------------------
/*  Connect to database and input file. Use lines from the input file to generate rows in the
 *  submissions table in the database.
 *
 *  The input file must be in CSV format, with proper UTF-8 character encoding. The standard PHP
 *  function, fgetcsv() garbles non-ASCII characters so, like everyone else, I've written my own
 *  CSV parser to do the conversion of input lines into arrays of strings.
 */
// Belt...
echo "The submissions table has been populated.\nDo not run this program again.\n";exit;

ini_set("auto_detect_line_endings", "1");

$fp = fopen("2010-08-31_submissionInfo.tsv", "r");
$headings = fgets($fp);

$db = pg_connect("dbname=gened user=vickery") or die("No db access");
$discipline_query = "SELECT discipline_name AS \"Discipline\","
                  .       " department_name AS \"Department\","
                  .       " division_abbreviation AS \"Division\","
                  .       " dean_title AS \"Dean\""
                  . "  FROM disciplines, departments, deans"
                  . " WHERE departments.id = department_id AND deans.id = dean_id"
                  . "   AND abbreviation = ";
$month_num = Array(
      'Jan' => 1, 'Feb' => 2, 'Mar' => 3, 'Apr' => 4, 'May' => 5, 'Jun' => 6,
      'Jul' => 7, 'Aug' => 8, 'Sep' => 9, 'Oct' => 10, 'Nov' => 11, 'Dec' => 12);

pg_query($db, 'BEGIN');

$submission_count = 0;
while (! feof($fp))
{
  $line = fgetcsv($fp,0, "\t");
  $submission_count++;
  if ($line[1] !== '')
  {
    $submission_number              = $line[0];
    $passcode                       = $line[1];
    $title                          = $line[2];
    $authors                        = $line[3];
    $submission_status              = $line[4];
    $course_description             = sanitize($line[5]);
    $submission_date                = new DateTime($line[6]);
    $extended_requirements          = $line[7];
    $course_credits                 = $line[8];
    $course_prerequisites           = $line[9];
    $is_existing_course             = ($line[10] === 'Existing') ? 't' : 'f';
    $existing_course_number         = $line[11];
    $course_periodicity             = $line[12];
    $other_course_periodicity       = $line[13];
    $anticipated_sections           = $line[14];
    $anticipated_seats_per_section  = $line[15];
    $area_of_knowledge              = $line[16];
    $context_of_experience          = $line[17];
    $contact_1_first_name           = $line[18];
    $contact_1_last_name            = $line[19];
    $contact_1_email                = $line[20];
    $contact_1_affiliation          = $line[21];
    $contact_2_first_name           = $line[22];
    $contact_2_last_name            = $line[23];
    $contact_2_email                = $line[24];
    $contact_2_affiliation          = $line[25];
    $contact_3_first_name           = $line[26];
    $contact_3_last_name            = $line[27];
    $contact_3_email                = $line[28];
    $contact_3_affiliation          = $line[29];
    $contact_4_first_name           = $line[30];
    $contact_4_last_name            = $line[31];
    $contact_4_email                = $line[32];
    $contact_4_affiliation          = $line[33];
    $contact_title                  = $line[34];
    $contact_first_name             = $line[35];
    $contact_last_name              = $line[36];
    $contact_affiliation            = $line[37];
    $contact_affiliation_dept       = $line[38];
    $contact_phone                  = $line[39];
    $contact_fax                    = $line[40];
    $contact_email                  = $line[41];
    $street_address                 = $line[42];
    $town                           = $line[43];
    $state_province                 = $line[44];
    $zipcode                        = $line[45];
    $country                        = $line[46];
    //  parse title string into disc  ipline_abbreviation, course_number, course_title, and writing_intensive fields
    //  XXXX 123: title string
    //  XXXX 123W: title string
    //  XXXX 123/123W: title string
    $course_title_split = explode(":", $line[2]);
    $discipline_number_split = explode(" ", $course_title_split[0]);
    $discipline_abbreviation = strtoupper(trim($discipline_number_split[0]));
    if (strstr($discipline_number_split[1], "/"))
    {
      $course_numbers = explode("/", $discipline_number_split[1]);
      if ($course_numbers[1] === ($course_numbers[0] . 'W'))
      {
        $course_number = $course_numbers[0];
        $writing_intensive = 'sometimes';
      }
      else die("bad course number in {$line[2]}");
    }
    else if ($discipline_number_split[1][strlen($discipline_number_split[1]) - 1] === 'W')
    {
      $course_number = substr($discipline_number_split[1], 0, strlen($discipline_number_split[1]) - 1);
      $writing_intensive = 'always';
    }
    else
    {
      $course_number = $discipline_number_split[1];
      $writing_intensive = 'never';
    }
    $course_title = $course_title_split[1];
    $geac_approval_date = 'NULL';
    if ( preg_match("/^(\d{1,2})-([a-zA-Z]{3})-(\d{2})$/", trim($submission_status), $matches))
    {
      $day = (strlen($matches[1] === 1) ? '0' : '') . $matches[1];
      $geac_approval_date = new DateTime('20' . $matches[3] . '-' . $month_num[$matches[2]] . '-' . $day);
      $geac_approval_date = $geac_approval_date->format('Y-m-d');
      $geac_approval_date = "'$geac_approval_date'::date";
    }
    $query = "INSERT INTO submissions VALUES ( "
      . "default, "
      . "'$passcode', "
      . "(SELECT id FROM disciplines WHERE discipline_abbreviation = '$discipline_abbreviation'), "
      . "'$course_number', "
      . "'$writing_intensive', "
      . "'$authors', "
      . "$geac_approval_date, "
      . "'$submission_status' , "
      . "'$course_description'::text, "
      . "'$course_credits', "
      . "NULL, "
      . "'$course_prerequisites', "
      . "'$is_existing_course', "
      . "'$course_periodicity'::text, "
      . "'$other_course_periodicity'::text, "
      . "'$anticipated_sections'::text, "
      . "'$anticipated_seats_per_section'::text, "
      . "'$course_title'::text )";
//echo "$submission_count: $query\n\n";
  }
  else
  {
    $query = "INSERT INTO submissions VALUES ( "
      . "default, "   // Trying to make ids match SoftConf's
      . "'None', "    //  Passcode
      . "939, "       //  id of discipline "NONE"
      . "0, "         //  course number 
      . "'never', "   //  writing intensive
      . "'Nobody', "  //  authors
      . "NULL, "      //  geac approval date
      . "'Ignore', "  //  status
      . "'None', "    //  course description
      . "0, "         //  course credits
      . "NULL, "      //  contact hours
      . "'None', "    //  course prerequisites
      . "'false', "   //  is existing course
      . "'None', "    //  course periodicity
      . "'None', "    //  other periodicity
      . "'None', "    //  anticipated sections per offering
      . "'None', "    //  anticipated seats per section
      . "'Not a Course' )"; //  course title
  }
  pg_query($db, $query);
}
//  Suspenders
pg_query($db, 'ROLLBACK');

?>


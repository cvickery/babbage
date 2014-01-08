#! /usr/local/bin/php
<?php

//  populate_pairs.php
//  ===============================================================================================
/*  This code reads a UTF-8 encoded tab-separated values (TSV) file, generates, and executes 
 *  PostgreSQL INSERT queries to add info from each row of the TSV file into the pair tables
 *  associated with the submissions table of the gened database.
 *
 *  Note: See populate_submissions.php for comments on preparing the TSV file read by this program.
 *
 *  The pair files to be populated are:
 *    submission_areas      The area of knowledge for each submission
 *    submission_contexts   The context of experience for each submission, if any
 *    submission_other      The other requirements for the submission, if any
 *    submission_people     All the people listed in the submission
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
  if (count($line) > 1 && $line[1] !== '')
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
    //  parse title string into discipline_abbreviation, course_number, course_title, and writing_intensive fields
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
    //  Area of Knowledge
    if (0 === preg_match("/^\s*(.*\w)\s*\(/", $area_of_knowledge, $matches)) continue;
    $area_of_knowledge = $matches[1];
    $query = "INSERT INTO submissions_areas VALUES ( $submission_number, "
      . "(SELECT id from areas_of_knowledge WHERE area_name = '$area_of_knowledge') )";
    pg_query($db, $query);
    //  Context of Experience
    if (  ($context_of_experience !== 'Not Applicable') &&
          (0 !== preg_match("/^\s*(.*\w)\s*\(/", $context_of_experience, $matches)) )
    {
      $context_of_experience = $matches[1];
      $query = "INSERT INTO submissions_contexts VALUES ( $submission_number, "
        . "(SELECT id from contexts_of_experience WHERE context_name = '$context_of_experience') )";
      pg_query($db, $query);
    }
    //  Other Requirements
    if ( preg_match("/\((.+)\)/", $extended_requirements, $matches) )
    {
      $query = "INSERT INTO submissions_others VALUES ( $submission_number, "
        . "(SELECT id from other_requirements WHERE requirement_abbreviation = '{$matches[1]}') )";
      pg_query($db, $query);
    }
    //  People
    /*  Examination of the data indicate that the list of contacts always matches the list of
     *  authors. The first contact is taken as the "first author," or primary contact.
     */
      if ($contact_1_last_name !== 'None')
      {
        $query = "INSERT INTO submissions_people VALUES ( $submission_number, "
          . " (SELECT id from people where last_name = '$contact_1_last_name'), 't' )";
        pg_query($db, $query);
      }
      if ($contact_2_last_name !== 'None')
      {
        $query = "INSERT INTO submissions_people VALUES ( $submission_number, "
          . " (SELECT id from people where last_name = '$contact_2_last_name'), 'f' )";
        pg_query($db, $query);
      }
      if ($contact_3_last_name !== 'None')
      {
        $query = "INSERT INTO submissions_people VALUES ( $submission_number, "
          . " (SELECT id from people where last_name = '$contact_3_last_name'), 'f' )";
        pg_query($db, $query);
      }
      if ($contact_4_last_name !== 'None')
      {
        $query = "INSERT INTO submissions_people VALUES ( $submission_number, "
          . " (SELECT id from people where last_name = '$contact_4_last_name'), 't' )";
        pg_query($db, $query);
      }
  }
}

pg_query($db, 'COMMIT');

?>


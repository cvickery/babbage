#! /usr/local/bin/php
<?php
//  Pick the people out of the submissions spreadsheet and generate a CSV file to edit and
//  use to populate the people table.
ini_set("auto_detect_line_endings", "1");

class Person
{
  public $honorific, $last_name, $_first_name, $affiliation, $email;
  function __construct($honorific, $last_name, $first_name, $affiliation, $email)
  {
    $this->honorific = $honorific;
    $this->last_name = $last_name;
    $this->first_name = $first_name;
    $this->affiliation = $affiliation;
    $this->email = $email;
  }
  function __toString()
  {
    return  '"' . $this->email . '","'.($this->honorific ? $this->honorific : '') . '","' 
      . $this->last_name . '","' . $this->first_name 
      . '","' . ($this->affiliation ? $this->affiliation : '') . '"';
  }
}

function process($contact)
{
  global $contacts;
  //  Add or update a person in the $contacts array
  $key = strtolower($contact->email);
  if (array_key_exists($key, $contacts))
  {
    // Append/update honorific affiliation
    if (strlen($contact->honorific) > 0) $contacts[$key]->honorific = $contact->honorific;
    if (strlen($contact->affiliation) > 0)
    {
      $contacts[$key]->affiliation = $contact->affiliation;
    }
  }
  else
  {
    $contacts[$key] = $contact;
  }
}

$contacts = Array();
$fp = fopen("2010-08-31_submissionInfo.csv", "r");
$db = pg_connect("dbname=gened user=vickery") or die("No db access");
$headings = fgetcsv($fp);

while (! feof($fp))
{
  $line = fgetcsv($fp);
  $submission_id      = $line[0];
  $passcode           = $line[1];
  $honorific              = $line[2];
  $authors            = $line[3];
  $acceptance_status  = $line[4];
  $course_description = $line[5];
  $submittions_date   = $line[6];
  $extended_requirements  = $line[7];
  $course_credits         = $line[8];
  $course_prerequisites   = $line[9];
  $is_existing_course     = $line[10] === 'Existing';
  $existing_course_number = $line[11];
  $course_periodicity     = $line[12];
  $other_course_periodicity = $line[13];
  $number_of_sections       = $line[14];
  $number_of_seats          = $line[15];
  $area_of_knowledge        = $line[16];
  $context_of_experience    = $line[17];
  $contact_1_first_name     = trim($line[18]);
  $contact_1_last_name      = trim($line[19]);
  $contact_1_email          = trim($line[20]);
  $contact_1_affiliation    = trim($line[21]);
  $contact_2_first_name     = trim($line[22]);
  $contact_2_last_name      = trim($line[23]);
  $contact_2_email          = trim($line[24]);
  $contact_2_affiliation    = trim($line[25]);
  $contact_3_first_name     = trim($line[26]);
  $contact_3_last_name      = trim($line[27]);
  $contact_3_email          = trim($line[28]);
  $contact_3_affiliation    = trim($line[29]);
  $contact_4_first_name     = trim($line[30]);
  $contact_4_last_name      = trim($line[31]);
  $contact_4_email          = trim($line[32]);
  $contact_4_affiliation    = trim($line[33]);
  $contact_honorific            = trim($line[34]);
  $contact_first_name       = trim($line[35]);
  $contact_last_name        = trim($line[36]);
  $contact_affiliation      = $line[37];  //  Always None
  $contact_affiliation_dept = $line[38];  //  Always None
  $contact_phone            = $line[39];  //  Always None
  $contact_fax              = $line[40];  //  Always None
  $contact_email            = trim($line[41]);
  $street_address           = $line[42];  //  Always None
  $town                     = $line[43];  //  Always None
  $state_province           = $line[44];  //  Always None
  $zipcode                  = $line[45];  //  Always None
  $country                  = $line[46];  //  Always None

  //  Create a {honorific,last_name,first_name,affiliation,email} tuple for each contact in the row, and write it to
  //  stdout for post-processing
  process(new Person(null, $contact_1_last_name, $contact_1_first_name, $contact_1_affiliation, $contact_1_email));
  if ($contact_2_last_name !== 'None')
  process(new Person(null, $contact_2_last_name, $contact_2_first_name, $contact_2_affiliation, $contact_2_email));
  if ($contact_3_last_name !== 'None')
  process(new Person(null, $contact_3_last_name, $contact_3_first_name, $contact_3_affiliation, $contact_3_email));
  if ($contact_4_last_name !== 'None')
  process(new Person(null, $contact_4_last_name, $contact_4_first_name, $contact_4_affiliation, $contact_4_email));
  
  process(new Person(($contact_honorific !== 'None' ? $contact_honorific : ''), 
      $contact_last_name, $contact_first_name, null, $contact_email));
}
ksort($contacts);
foreach ($contacts as $contact) echo "$contact\n";
?>


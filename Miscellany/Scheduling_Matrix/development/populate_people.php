#! /usr/local/bin/php
<?php
//  After generating people.csv from generate_people.php, this script then uses that data to
//  populate the people table of the gened database.
ini_set("auto_detect_line_endings", "1");

$fp = fopen("people.csv", "r");
$db = pg_connect("dbname=gened user=vickery") or die("No db access");

while (! feof($fp))
{
  $line = fgetcsv($fp);
  $email            = $line[0];
  $honorific        = $line[1];
  $last_name        = $line[2];
  $first_name       = $line[3];
  $affiliation      = $line[4];
  $alternate_email  = isset($line[5]) ? $line[5] : '';

  $query  = "INSERT INTO people VALUES "
          . "( default, '$last_name', '$first_name', '$honorific', '$affiliation', '$alternate_email' )";
  pg_query($db, $query);
}
?>


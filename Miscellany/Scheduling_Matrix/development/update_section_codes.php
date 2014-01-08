#! /usr/local/bin/php
<?php

$db = pg_connect("dbname=gened user=vickery");
$fp = fopen("scheduling_matrix.out", "r") or die("darn");
while (! feof($fp) )
{
  $line = fgets($fp);
  $section_code = trim(substr($line, 0, 6));
  $contact_hours = trim(substr($line, 8, 1));
  if ( (strlen($section_code) > 1) && ($contact_hours != '?') )
  {
    $query = "UPDATE section_codes SET contact_hours = '$contact_hours' where section_code = '$section_code'";
    pg_query($db, $query);
  }
}

?>

<?php
/**
 *  Checks for magic_quotes_gpc = On and strips them from incoming
 *  requests if necessary. From PHP Anthology 2.
 *  2007-11-18: Modified by ccv to recurse arrays using code from
 *  stripslashes documentation.
 */
function stripslashes_deep($value)
{
  $value = is_array($value) ?
              array_map('stripslashes_deep', $value) :
              stripslashes($value);
  return $value;
}

//  echo "<h2>Enter strip_quotes.php</h2>\n";
if (get_magic_quotes_gpc())
{
//  echo "<h3>Magic Quotes is On</h3>\n";
  $_GET    = array_map('stripslashes_deep', $_GET);
  $_POST   = array_map('stripslashes_deep', $_POST);
  $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
}
else
{
//  echo "<h3>Magic Quotes is Off</h3>\n";
}
//  echo "<h2>Exit strip_quotes.php</h2>\n";
//  print_r($_GET);
?>

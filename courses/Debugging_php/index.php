<?php
  $mime_type = "text/html";
  $html_attributes="lang=\"en\"";
  if ( array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml") ||
         stristr($_SERVER["HTTP_ACCEPT"], "application/xml") )
       ||
       (array_key_exists("HTTP_USER_AGENT", $_SERVER) &&
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator"))
     )
  {
    $mime_type = "application/xhtml+xml";
    $html_attributes = "xmlns='http://www.w3.org/1999/xhtml' xml:lang='en'";
    header("Content-type: $mime_type");
    echo "<?xml version='1.0' encoding='UTF-8'?>\n";
  }
  else
  {
    header("Content-type: $mime_type; charset=utf-8");
  }
?>
<!DOCTYPE html>
<html <?php echo $html_attributes;?>>
  <head>
    <title>Debugging PHP</title>
    <link rel='stylesheet' type='text/css' href='./css/debugging_php.css' />
  </head>
  <body>
    <h1>Debugging PHP</h1>
  </body>
</html>
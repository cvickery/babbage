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
    $html_attributes = "xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\"";
    header("Content-type: $mime_type");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  }
  else
  {
    header("Content-type: $mime_type; charset=utf-8");
  }
?>
<!DOCTYPE html>
<html <?php echo $html_attributes;?>>
  <head>

    <title>CSCI 100 Course Schedule</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/style-all.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="screen"
          href="../../css/style-screen.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="print"
          href="../../css/style-print.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/calendar.css"
    />
  </head>

  <body>
<?php
include "../../Calendar/generate_calendar.php";
?>

    <div id="footer">
      <a href="http://validator.w3.org/check?uri=referer">XHTML</a>—<a
         href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">CSS</a>
    </div>
    <script type="text/javascript" src="../../scripts/core.js"></script>
    <script type="text/javascript" src="../../scripts/now.js"></script>
  </body>
</html>

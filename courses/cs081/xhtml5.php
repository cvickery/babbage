<?php
  header("Last-Modified: "
                    .date('r',filemtime($_SERVER['SCRIPT_FILENAME'])));
  $mime_type = "text/html";
  $accept_header = isset($_SERVER['HTTP_ACCEPT']) ? 
    "“<code>{$_SERVER['HTTP_ACCEPT']}</code>”" : " not present";
  if ( array_key_exists("HTTP_ACCEPT", $_SERVER) &&
        (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml") ||
         stristr($_SERVER["HTTP_ACCEPT"], "application/xml") )
       ||
       (array_key_exists("HTTP_USER_AGENT", $_SERVER) &&
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator"))
     )
  {
    $mime_type = "application/xhtml+xml";
    header("Content-type: application/xhtml+xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
      . "<!DOCTYPE html>\n"
      . "<html xmlns='http://www.w3.org/1999/xhtml'>\n";
  }
  else
  {
    header("Content-type: text/html; charset=utf-8");
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\""
        . "\"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n"
        . "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n";
  }
?>
	<head>
  	<title>XHTML5 Setup</title>
    <link rel="stylesheet" href="../css/style-all.css" />
    <link rel="stylesheet" href="../css/style-screen.CSS" />
  </head>
  <body>
  	<h1>XHTML5 Setup</h1>
    <div id="content">
    	<p>
      	Your browser’s Accept header was <?php echo $accept_header; ?>
      </p>
      <p>
      	This page’s MIME type is “<code><?php echo $mime_type; ?></code>”
      </p>
		  <div class="code-block">
&lt;?php
  if ( array_key_exists("HTTP_ACCEPT", $_SERVER) &amp;&amp;
        (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml") ||
         stristr($_SERVER["HTTP_ACCEPT"], "application/xml") )
       ||
       (array_key_exists("HTTP_USER_AGENT", $_SERVER) &amp;&amp;
        stristr($_SERVER["HTTP_USER_AGENT"], "W3C_Validator"))
     )
  {
    header("Content-type: application/xhtml+xml");
    echo "&lt;?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"
      . "&lt;!DOCTYPE html>\n"
      . "&lt;html xmlns='http://www.w3.org/1999/xhtml'>\n";
  }
  else
  {
    header("Content-type: text/html; charset=utf-8");
    echo "&lt;!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\""
        . "\"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">\n"
        . "&lt;html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n";
  }
?>
		  </div>
    </div>
    <footer>
    	Validate this page: 
        <a href="http://validator.w3.org/check?uri=referer">
          W3C HTML Validator
        </a>
        — - – &#x2014;
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
          W3C CSS Validator
        </a>
    </footer>
  </body>
</html>
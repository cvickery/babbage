<?php
  if (array_key_exists("HTTP_ACCEPT", $_SERVER) &&
      stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml"))
  {
    header("Content-type: application/xhtml+xml");
    print("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n");
  }
  else
  {
    header("Content-type: text/html; charset=utf-8");
  }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>

    <title>Form Processing Script: PHP Version</title>
    <style type="text/css">
      html,body {
      background-color:#99FF66;
      }
      table {
        margin:auto;width:50%;
        background-color:white;
        border-collapse:collapse;
        -moz-border-radius:20px;
        -webkit-border-radius:20px;
        }
      td, th {
        padding:0.5em;
        }
      th {
        border-bottom:2px solid black;
        }
      td {
      	border-top: 1px solid black;
        }
      td+td, th+th {
      	border-left:1px solid black;
        }
      caption {
      	font: bold 1em/1.2 Verdana, Arial, Helvetica, sans-serif;
        margin-bottom:1em;
        }
      #footer {
      	position:fixed;
        bottom:0;
        text-align:center;
        font: lighter 0.7em/1.2 Verdana, Arial, Helvetica, sans-serif;
        text-align:center;
        width:100%;
        }
    </style>

  </head>

  <body>

    <div id="header">
      <h1>Form Processing Script: PHP Version</h1>
    </div>

    <div id="content">
  <?php
    $num_get = count($_GET);
    $num_post = count($_POST);
	    if ($num_get + $num_post == 0)
    {
      echo "<h2>No parameters were passed to this script.</h2>\n";
    }
    else
    {
      echo "<h2>The Request Method was  ".(($num_get > 0) ? "GET" : "POST")."</h2>\n";
      echo "<h3>There were ".($num_get + $num_post)." parameters:</h3>\n";
      echo "<table summary=\"Parameter Names and Values Passed to This Script\">\n";
      echo "<caption>Parameter Names and Values Passed to this Script</caption>\n";
      echo "<tr><th>Name</th><th>Value(s)</th></tr>\n";
      $params = ($num_get > 0) ? $_GET : $_POST;
      while ($param = each($params))
      {
        if (is_array($param['value']))
        {
          $val = $param['value'];
          $n = count($val);
          $name = str_replace('&', '&amp;', $param['key']);
          echo "<tr><td>$name</td><td>\n";
          while ($value = each($val))
          {
            $index = str_replace('&', '&amp;', $value[0]);
            $thisValue = str_replace('&', '&amp;', $value[1]);            
            echo "[$index]: $thisValue<br/>\n";
          }
          echo "</td></tr>\n";
        }
        else
        {
          $p = str_replace('&', '&amp;', nl2br($param['value']));
          echo "<tr><td>$param[key]</td><td>$p</td></tr>\n";
        }
      }
      echo "</table>\n";
    }
		$num_files = count($_FILES);
		if ($num_files > 0)
		{
			$copula = ($num_files == 1) ? "was" : "were";
			$suffix = ($num_files == 1) ? "" : "s";
			echo "<h3>There {$copula} {$num_files} file{$suffix} uploaded to this script:</h3>\n";
      echo "<table summary=\"Files Uploaded To This Script\">\n";
      echo "<caption>Files Uploaded To This Script</caption>\n";
      echo "<tr><th>Name</th><th>Size</th><th>Type</th></tr>\n";
			foreach ($_FILES as $file)
			{
				echo "<tr><td>{$file['name']}</td><td>{$file['size']}</td><td>{$file['type']}</td></tr>\n";
			}
			echo "</table>\n";
	}
		else
		{
			echo "<h3>There were no files uploaded to this script.</h3>\n";
		}
  ?>
    </div>

    <div id="footer">
        <a href="http://validator.w3.org/check?uri=referer">XHTML</a>&nbsp;-&nbsp;<a
           href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    </div>
  </body>
</html>

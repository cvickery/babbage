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

    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" media="all"
          href="../css/style-all.css" />
    <link rel="stylesheet" type="text/css" media="screen"
          href="../css/style-screen.css" />
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
      echo "<h3>There were ".($num_get + $num_post)." parameters</h3>\n";
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
  ?>
    </div>

    <div id="footer">
      <hr />
      <p>
        <a href="../../">Vickery Home</a>&nbsp;-&nbsp;
        <a href="./">CS-081 Home</a>&nbsp;-&nbsp;
        <a href="http://validator.w3.org/check?uri=referer">XHTML</a>&nbsp;-&nbsp;
        <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
      </p>
    </div>
  </body>
</html>

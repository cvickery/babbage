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

    <title>Dynamic Style</title>

    <link rel="stylesheet" type="text/css" media="all"
          href="styles.css" />

    <script type="text/javascript" src="dynamics.js"></script>
  </head>

  <body>

    <div id="header">
      <h1>Dynamic Styles</h1>
    </div>

    <div id="content">
      <h2>A Table With a Footing</h2>
      <table summary="Demonstrate use and styling of tfoot.">
      <tfoot id="theFoot">
       <tr>
        <td>Footing cell 1-1</td>
        <td>Footing cell 1-2</td>
        <td>Footing cell 1-3</td>
       </tr>
       <tr>
        <td>Footing cell 2-1</td>
        <td>Footing cell 2-2</td>
        <td>Footing cell 2-3</td>
       </tr>
      </tfoot>
      <tbody>
        <tr>
          <td>Body cell 1-1</td>
          <td>Body cell 1-2</td>
          <td>Body cell 1-3</td>
        </tr>
         <tr>
          <td>Body cell 2-1</td>
          <td>Body cell 2-2</td>
          <td>Body cell 2-3</td>
        </tr>
         <tr>
          <td>Body cell 3-1</td>
          <td>Body cell 3-2</td>
          <td>Body cell 3-3</td>
        </tr>
         <tr>
          <td>Body cell 4-1</td>
          <td>Body cell 4-2</td>
          <td>Body cell 4-3</td>
        </tr>
      </tbody>
      </table>
      <input type="checkbox" id="blackOnWhite" />
    </div>

    <div id="footer">
    <hr />
      <p class="links">
        <a href="/">Vickery Home</a>&nbsp;-&nbsp;
        <a href="http://validator.w3.org/check?uri=referer">
        XHTML</a>&nbsp;-&nbsp;
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
        CSS</a>
      </p>
      <p><em>Last updated
        <?php echo date("Y-m-d", filemtime("index.php"));
        ?>.</em>
      </p>
    </div>
  </body>
</html>

<?php
  if (stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml"))
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

  <title>Table Attributes</title>

  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="/courses/css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="/courses/css/style-screen.css"
  />

  <script type="text/javascript" src="tables.js"/>
  <style type="text/css" media="screen">
    table {
      border-style:none;
      border-collapse:inherit;
      }
    fieldset {
      width:  80%;
      }  
  </style>

</head>

<body>

  <div id="header">
    <h1>Table Attributes</h1>
  </div>

  <div id="content">
    <h2>A Table</h2>
    <table id="the-table">
      <tr>
        <td>Row 1, Col 1</td>
        <td>Row 1, Col 2</td>
        <td>Row 1, Col 3</td>
        <td>Row 1, Col 4</td>
      </tr>
      <tr>
        <td>Row 2, Col 1</td>
        <td>Row 2, Col 2</td>
        <td>Row 2, Col 3</td>
        <td>Row 2, Col 4</td>
      </tr>
      <tr>
        <td>Row 3, Col 1</td>
        <td>Row 3, Col 2</td>
        <td>Row 3, Col 3</td>
        <td>Row 3, Col 4</td>
      </tr>
    </table>
    <h2>Controls</h2>
    <div class="whitebox">
    <h3>table</h3>
      <fieldset>
      <legend>border-style</legend>
        <input type="radio" id="bs-solid" name="border-style"/>
        <label for="bs-solid" >solid</label>
        <input type="radio" id="bs-dotted" name="border-style"/>
        <label for="bs-dotted" >dotted</label>
        <input type="radio" id="bs-dashed" name="border-style"/>
        <label for="bs-dashed" >dashed</label>
        <input  type="radio" id="bs-none" name="border-style"
                checked="checked"/>
        <label for="bs-none" >none</label>
      </fieldset>
      <fieldset>
      <legend>border-collapse</legend>
        <input type="radio" id="bc-collapse" name="border-collapse"
                value="collapse"/>
        <label for="bc-collapse">collapse</label>
        <input type="radio" id="bc-separate" name="border-collapse"
                value="separate"/>
        <label for="bc-separate">separate</label>
        <input type="radio" id="bc-inherit" name="border-collapse"
                value="inherit" checked="checked"/>
        <label for="bc-inherit">inherit</label>
      </fieldset>
      <fieldset>
      <legend>cellspacing and padding</legend>
        <label for="cellspacing">cellspacing:</label>
        <input type="text" id="cellspacing" size="10"/>
        <label for="borderspacing">border-spacing:</label>
        <input type="text" id="borderspacing" size="10"/>
        <label for="tablepadding">padding:</label>
        <input type="text" id="tablepadding" size="10"/>
      </fieldset>
    <h3>td</h3>
      <fieldset>
      <legend>border, padding, and height</legend>
        <label for="td-border">border:</label>
        <input type="text" id="td-border" size="16"/>
        <label for="td-padding">padding:</label>
        <input type="text" id="td-padding" size="10"/>
        <label for="td-height">height:</label>
        <input type="text" id="td-height" size="10"/>
      </fieldset>
      <fieldset>
      <legend>alignment</legend>
        <input type="radio" name="td-align" id="td-left"/>
        <label for="td-left">left</label>
        <input type="radio" name="td-align" id="td-center"/>
        <label for="td-center">center</label>
        <input type="radio" name="td-align" id="td-right"/>
        <label for="td-right">right</label>
        <br />
        <input type="radio" name="td-valign" id="td-top"/>
        <label for="td-top">top</label>
        <input type="radio" name="td-valign" id="td-middle"/>
        <label for="td-middle">middle</label>
        <input type="radio" name="td-valign" id="td-bottom"/>
        <label for="td-bottom">bottom</label>
        
      </fieldset>
    </div>
  </div>

  <div id="footer">
  <hr />
    <p class="links">
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo date("Y-m-d", filemtime($_SERVER['SCRIPT_FILENAME']));
      ?></em>
    </p>
  </div>
</body>
</html>

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

  <title>Dynamic Display and Visibility</title>

  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="stylesheet" type="text/css" media="all"
        href="css/style-all.css" />
  <link rel="stylesheet" type="text/css" media="screen"
        href="css/style-screen.css" />
  <link rel="stylesheet" type="text/css" media="print"
        href="css/style-print.css" />        
  <script type="text/javascript" src="scripts/display.js">
  </script>
</head>

<body>

  <div id="header">
    <h1>Display and Visibility Properties</h1>
  </div>

  <div id="content">
    <h2 id="testitem">Experiment with Display and Visibilty</h2>

    <fieldset><legend>Display and Visibility Properties</legend>

      <table  summary="Controls for managing display and visibility \
properties of a div and some images inside it.">
        <col span="3" id="displayCols" />
        <col span="1" id="visibilityCol" />
        <thead>
          <tr>
            <th colspan="3">Display</th>
            <th>Visibility</th>
          </tr>
        </thead>
        <tbody>
        <!-- Div 1-->
        <tr>
          <td><label for="div1None">None:</label>
          <input  type="radio"
                  id="div1None"
                  name="div1Display"
                  value="none" /></td>
          <td><label for="div1Block">Block:</label>
          <input  type="radio"
                  id="div1Block"
                  name="div1Display"
                  value="block"
                  checked="checked" /></td>
          <td><label for="div1Inline">Inline:</label>
          <input  type="radio"
                  id="div1Inline"
                  name="div1Display"
                  value="inline" /></td>
          <td><label for="div1Hide">Hide:</label>
          <input  type="checkbox"
                  id="div1Hide"
                  name="div1Visibility" 
                  value="visible" /></td>
          <th>Div 1</th>
        </tr>

        <!-- Div 2-->
        <tr>
          <td><label for="div2None">None:</label>
          <input  type="radio"
                  id="div2None"
                  name="div2Display"
                  value="none" /></td>
          <td><label for="div2Block">Block:</label>
          <input  type="radio"
                  id="div2Block"
                  name="div2Display"
                  value="block"
                  checked="checked" /></td>
          <td><label for="div2Inline">Inline:</label>
          <input  type="radio"
                  id="div2Inline"
                  name="div2Display"
                  value="inline" /></td>
          <td><label for="div2Hide">Hide:</label>
          <input  type="checkbox"
                  id="div2Hide"
                  name="div2Visibility" 
                  value="visible" /></td>
          <th>Div 2</th>
        </tr>

        <!-- Image 1 -->
        <tr>
          <td><label for="img1None">None:</label>
          <input  type="radio"
                  id="img1None"
                  name="display1Type"
                  value="none" /></td>
          <td><label for="img1Block">Block:</label>
          <input  type="radio"
                  id="img1Block"
                  name="display1Type"
                  value="block" /></td>
          <td><label for="img1Inline">Inline:</label>
          <input  type="radio"
                  id="img1Inline"
                  name="display1Type"
                  value="inline"
                  checked="checked" /></td>
          <td><label for="img1Hide">Hide:</label>
          <input  type="checkbox" 
                  id="img1Hide"
                  name="hideMode"
                  value="" /></td>
          <th>Image 1</th>
        </tr>

        <!-- Image 2 -->
        <tr>
          <td><label for="img2None">None:</label>
          <input  type="radio"
                  id="img2None"
                  name="display2Type"
                  value="none" /></td>
          <td><label for="img2Block">Block:</label>
          <input  type="radio"
                  id="img2Block"
                  name="display2Type"
                  value="block" /></td>
          <td><label for="img2Inline">Inline:</label>
          <input  type="radio"
                  id="img2Inline"
                  name="display2Type"
                  value="inline"
                  checked="checked" /></td>
          <td><label for="img2Hide">Hide:</label>
          <input  type="checkbox"
                  id="img2Hide"
                  name="hideMode"
                  value="" /></td>
          <th>Image 2</th>
        </tr>

        <!-- Image 3 -->
        <tr>
          <td><label for="img3None">None:</label>
          <input  type="radio"
                  id="img3None"
                  name="display3Type"
                  value="none" /></td>
          <td><label for="img3Block">Block:</label>
          <input  type="radio"
                  id="img3Block"
                  name="display3Type"
                  value="block" /></td>
          <td><label for="img3Inline">Inline:</label>
          <input  type="radio"
                  id="img3Inline"
                  name="display3Type"
                  value="inline"
                  checked="checked" /></td>
          <td><label for="img3Hide">Hide:</label>
          <input  type="checkbox"
                  id="img3Hide"
                  name="hideMode"
                  value="" /></td>
          <th>Image 3</th>
        </tr>

        <!-- Image 4 -->
        <tr>
          <td><label for="img4None">None:</label>
          <input  type="radio"
                  id="img4None"
                  name="display4Type"
                  value="none" /></td>
          <td><label for="img4Block">Block:</label>
          <input  type="radio"
                  id="img4Block"
                  name="display4Type"
                  value="block" /></td>
          <td><label for="img4Inline">Inline:</label>
          <input  type="radio"
                  id="img4Inline"
                  name="display4Type"
                  value="inline"
                  checked="checked" /></td>
          <td><label for="img4Hide">Hide:</label>
          <input  type="checkbox"
                  id="img4Hide"
                  name="hideMode"
                  value="" /></td>
          <th>Image 4</th>
        </tr>
      </tbody>
      </table>

      <table  summary="Border Controls">
        <tr>
          <th>Margin</th>
          <th>Border</th>
          <th>Padding</th>
          <th>Element</th>
        </tr>
        <tr>
          <td><input type="text" id="divMargin" /></td>
          <td><input type="text" id="divBorder" /></td>
          <td><input type="text" id="divPadding" /></td>
          <th>div</th>
        </tr>
        <tr>
          <td><input type="text" id="imgMargin" /></td>
          <td><input type="text" id="imgBorder" /></td>
          <td><input type="text" id="imgPadding" /></td>
          <th>img</th>
        </tr>

      </table>

    </fieldset>

    <hr />

    <div id="imgHolder1">
      <p>This is a paragraph at the beginning of Div 1</p>
      <img id="img1" src="images/peaches.jpg" alt="Peaches" />
      <img id="img2" src="images/hoist.jpg" alt="Hoist" />
    </div>

    <div id="imgHolder2">
      <img id="img3" src="images/sunset.jpg" alt="Sunset" />
      <img id="img4" src="images/wing.jpg" alt="Wing" />
      <p>This is a paragraph at the end of Div 2</p>
    </div>

  </div>

  <div id="footer">
  <hr />
    <p>
      <a href="/">Vickery Home</a>&nbsp;-&nbsp;
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>&nbsp;-&nbsp;
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      CSS</a>
    </p>
    <p><em>Last updated
      <?php echo gmdate("Y-m-d", filemtime("index.php"));
      ?>.</em>
    </p>
  </div>
</body>
</html>

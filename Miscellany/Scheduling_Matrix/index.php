<?php
  header("Vary: Accept");
  header("Content-type: text/html; charset=utf-8");
  echo "<!DOCTYPE html>\n";
 ?>
<html>
  <head>
    <title>QC Scheduling Matrix</title>
    <script type="text/javascript" src="scripts/matrix.js"></script>
    <link rel="stylesheet" type="text/css" href="css/matrix.css"/>
  </head>
  <body>
    <ul id="days">
  	  <li>Sunday</li><li>Monday</li><li>Tuesday</li><li>Wednesday</li>
      <li>Thursday</li><li>Friday</li><li>Saturday</li>
    </ul>
    <div id="canvas-holder">
      <ul id="times">
    	  <li>8</li><li>9</li><li>10</li><li>11</li><li>noon</li><li>1</li><li>2</li>
        <li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li>
      </ul>
      <div id="canvas-div">
        <canvas></canvas>
        <div id="when">Mon 08:00</div>
        <div id="which-sections">
          <h2 id="meeting-time">Mon 8:05 am</h2>
          <ul>
            <li>No Sections</li>
          </ul>        
        </div>
      </div>
    </div>
    <table id="all-sections"></table>
  </body>
</html>
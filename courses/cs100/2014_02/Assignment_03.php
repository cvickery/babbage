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
    <title>CSCI 100 Assignment 3</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet"
          type="text/css"
          media="all"
          href="../../css/assignments.css"
    />
    <link rel="stylesheet"
          type="text/css"
          media="print"
          href="../../css/assignments-print.css"
    />
    <style type='text/css'>
      tr:nth-child(odd) td:nth-child(2),
      tr:nth-child(odd) td:nth-child(3),
      tr:nth-child(odd) td:nth-child(4),
      tr:nth-child(odd) td:nth-child(5),
      tr:nth-child(odd) td:nth-child(6) {background-color:lightgreen;}
      tr:nth-child(odd) td:nth-child(7),
      tr:nth-child(odd) td:nth-child(8),
      tr:nth-child(odd) td:nth-child(9),
      tr:nth-child(odd) td:nth-child(10),
      tr:nth-child(odd) td:nth-child(11) {background-color:pink;}
      tr:nth-child(even) td:nth-child(2),
      tr:nth-child(even) td:nth-child(3),
      tr:nth-child(even) td:nth-child(4),
      tr:nth-child(even) td:nth-child(5),
      tr:nth-child(even) td:nth-child(6) {background-color:pink;}
      tr:nth-child(even) td:nth-child(7),
      tr:nth-child(even) td:nth-child(8),
      tr:nth-child(even) td:nth-child(9),
      tr:nth-child(even) td:nth-child(10),
      tr:nth-child(even) td:nth-child(11) {background-color:lightgreen;}
    </style>
  </head>
  <body>
    <h1>CSCI 100 Assignment 3</h1>
    <h2>Arduino Binary Counters</h2>
    <div>
      <p>
        This assignment consists of two <em>required parts</em> and one <em>optional parts</em>. You can get full credit
        for the assignment by doing the required parts, and extra credit (not much, but some) for doing the optional
        part.
      </p>
      <p>
        Since you are working in somewhat amorphous groups in the lab, use the following procedure to receive credit
        for the assignment: designate one person in the group to act as the coordinator; that person is to send me an
        email with the names of all the people in the group in the body of the message, and with the code for the
        assignment as an email attachment. Include each member of the group in the CC list for the message so everyone
        will be able to verify that they were properly included in the submission. I will then run the code to make sure
        it works, and assign grades.
      </p>
      <p>
        You will receive <strong>no credit</strong> for code you have not tested and verified that it works correctly.
        <strong>But</strong> you can get partial credit if you submit code that does not work provided you tell me in your
        email specifically what went wrong when you tested the code.
      </p>

      <h3>Required Part I</h3>
      <div>
        <p>
          Create an Arduino sketch that runs on a Teaguedino board that causes the five on-board LEDs to flash as follows:
          LED E (pin 13) is to flash at a rate of once per second. That is, it is to alternate being on for 1000 msec
          and off for 1000 msec. LED D (pin 14) is to flash at a rate of once every two seconds; LED C (pin 15) every four
          seconds; LED B (pin 16) every eight seconds; LED A (pin 17) every 16 seconds. There is more than one way to
          accomplish this in Arduino, but the procedure you are to follow for this assignment is to have five int values
          respresenting the states of the five LEDs, and to change these five values so they operate as a binary counter,
          as shown in the following table:
        </p>
        <table>
          <tr>
            <th rowspan="2">Row</th><th colspan='5'>Present State</th><th colspan='5'>Next State</th>
          </tr>
          <tr>
            <th>A</th><th>B</th><th>C</th><th>D</th><th>E</th>
            <th>A</th><th>B</th><th>C</th><th>D</th><th>E</th>
          </tr>
          <tr><td>0</td>
            <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
            <td>0</td><td>0</td><td>0</td><td>0</td><td>1</td>
          </tr>
          <tr><td>1</td>
            <td>0</td><td>0</td><td>0</td><td>0</td><td>1</td>
            <td>0</td><td>0</td><td>0</td><td>1</td><td>0</td>
          </tr>
          <tr><td>2</td>
            <td>0</td><td>0</td><td>0</td><td>1</td><td>0</td>
            <td>0</td><td>0</td><td>0</td><td>1</td><td>1</td>
          </tr>
          <tr><td>3</td>
            <td>0</td><td>0</td><td>0</td><td>1</td><td>1</td>
            <td>0</td><td>0</td><td>1</td><td>0</td><td>0</td>
          </tr>
          <tr>
            <td colspan='10' style='text-align:center;background-color:white;'>
              &#x2014; 25 more rows &#x2014;
            </td>
          </tr>
          <tr><td>29</td>
            <td>1</td><td>1</td><td>1</td><td>0</td><td>1</td>
            <td>1</td><td>1</td><td>1</td><td>1</td><td>0</td>
          </tr>
          <tr><td>30</td>
            <td>1</td><td>1</td><td>1</td><td>1</td><td>0</td>
            <td>1</td><td>1</td><td>1</td><td>1</td><td>1</td>
          </tr>
          <tr><td>31</td>
            <td>1</td><td>1</td><td>1</td><td>1</td><td>1</td>
            <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
          </tr>
        </table>
        <p>
          That is, the five LEDs (A-E) show the Present State in the table, moving down one row each second, and
          then returning to the top row after 32 seconds.
        </p>
      </div>
      <h3>Required Part II</h3>
      <div>
      <p>
        Create a second sketch that does the same thing as the first one, except it goes from row to row each time
        you press a pushbutton connected to Input 1 (pin 45). Be sure the LEDs change state when you press the button,
        not when you release it. And be sure it only changes state once no matter how long you keep the button pressed.
      </p>
      </div>
      <h3>Optional Parts</h3>
      <div>
        <ul>
          <li>
            Add a switch, connected to Input 2 (pin 44) that selects whether to use the pushbutton to change state, or
            the time delays instead. That is, combine the two required parts into a single sketch.
          </li>
          <li>
            Add a switch, connected to Input 3 (pin 43) that selects whether to go through the rows of the table from
            top to bottom or from bottom to top. The former is called an “up counter” and the latter is called a “down
            counter.”
          </li>
        </ul>
        <p>
          You may do either one of the optional parts, or both, or neither. Each is equivalent in terms of amount of extra
          credit; doing both counts double.
        </p>
      </div>
    </div>
    <footer>
      <a href='../'>Syllabus</a> &#x2014; <a href='./'>Schedule</a>
    </footer>
  </body>
</html>

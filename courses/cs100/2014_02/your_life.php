<?php
//  life expectancies for US males and females at birth and 5 year
//  intervals to age 100.
//  From http://www.worldlifeexpectancy.com/your-life-expectancy-by-age
$male = array(
  76.1, 76.6, 76.8, 76.9, 77.1, 77.5, 77.8, 78.1, 78.5, 78.9,
  79.5, 80.4, 81.4, 82.7, 84.2, 86.1, 88.3, 91.1, 94.3, 97.9, 102.0);

$female = array(
  80.9, 81.5, 81.5, 81.6, 81.7, 81.3, 82.0, 82.1, 82.3, 82.7,
  83.1, 83.7, 84.4, 85.3, 86.5, 87.9, 89.8, 92.0, 94.8, 98.2, 102.2);

  $info         = '';
  $birthday     = null;
  $birthday_str = '';
  $gender       = 'Select One';

  if (isset($_GET['birthday']) && $_GET['birthday'] !== '' && isset($_GET['gender']))
  {
    try
    {
      $birthday     = new DateTime($_GET['birthday']);
      $birthday_str = $birthday->format('F j, Y');
      $age          = date_diff(new DateTime('today'), $birthday);

      if (($age->invert === 0) and ($age->days > 0))
      {
        throw new Exception('Future dates don’t work.');
      }
    }
    catch (Exception $e)
    {
      $info = "<h2 class='error'>'{$_GET['birthday']}' is not a valid birthday.
      {$e->getMessage()}
      </h2>\n";
      $age = null;
    }
    $male_selected    = '';
    $female_selected  = '';
    if ($_GET['gender'] == 'male' || $_GET['gender'] == 'female')
    {
      $gender = $_GET['gender'];
      if ($gender === 'male')   $male_selected    = "selected='selected'";
      if ($gender === 'female') $female_selected  = "selected='selected'";
    }
    else
    {
      $info .= "<h2 class='error'>'{$_GET['gender']}' is not a valid gender</h2>\n";
    }
  }
  if ($age && ($gender !== 'Select One'))
  {
    $display = $gender;
    $display[0] = strtoupper($gender[0]);
    $info = "<p>$display: {$age->y} years, {$age->m} months, {$age->d} days ({$age->days} total days)</p>\n";

    //  To calculate death day, interpolate between two nearest ages in the proper table. Assume 365.25
    //  days per year.
    $current_years = $age->days / 365.25;
    $below_index = min(20, (int)($current_years / 5));
    $above_index = min(20, $below_index + 1);
    if ($gender === 'male')
    {
      $below_expectancy = $male[$below_index];
      $above_expectancy = $male[$above_index];
    }
    else
    {
      $below_expectancy = $female[$below_index];
      $above_expectancy = $female[$above_index];
    }
    $delta_expectancy = $above_expectancy - $below_expectancy;

    $below_years = $below_index * 5;
    $above_years = $above_index * 5;
    $delta_years = $above_years - $below_years;

    $expectancy = $below_expectancy +
        ((($current_years - $below_years) / ($above_years - $below_years)) * $delta_expectancy);
    $remaining_years = $expectancy - $current_years;
    $remaining_days  = $remaining_years * 365.25;

    $current_years    = number_format($current_years, 2);
    $expectancy       = number_format($expectancy, 2);
    $remaining_days   = number_format($remaining_days, 2);
    $remaining_years  = number_format($remaining_years, 2);

    $info .= <<<EOD
    <table>
      <!-- <tr><th>below age</th><td>$below_years</td></tr> -->
      <!-- <tr><th>above age</th><td>$above_years</td></tr> -->
      <!-- <tr><th>delta age</th><td>$delta_years</td></tr> -->
      <tr><th>Current age:</th><td>$current_years</td></tr>
      <!-- <tr><th>below expectancy</th><td>$below_expectancy</td></tr> -->
      <!-- <tr><th>above expectancy</th><td>$above_expectancy</td></tr> -->
      <!-- <tr><th>delta expectancy</th><td>$delta_expectancy</td></tr> -->
      <tr><th>Expected age:</th><td>$expectancy</td></tr>
      <tr><th>Remaining days:</th><td>$remaining_days</td></tr>
      <tr><th>Remaining years:</th><td>$remaining_years</td></tr>
    </table>
EOD;
    if ($remaining_years < 0)
    {
      $people   = 'men';
      $max_age  = $male[20];
      if ($gender === 'female')
      {
        $people   = 'women';
        $max_age  = $female[20];
      }
      $info = "<h2 class='error'>Unable to handle $people older than $max_age</h2>\n";
    }
  }

//  -----------------------------------------------------------------------------------------------
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
    <title>Your Life!</title>
    <link rel="shortcut icon" href="../favicon.ico" />
    <style type="text/css">
      html, body {
        margin:1em auto;
        padding:1em;
        background-color:lightgray;
        font-family:sans-serif;
      }
      body {
        width: 960px;
      }
      h1 {text-align: center;}
      h2 {
        margin: 1em;
        border:none;
        box-shadow: none;
        background-color: transparent;
      }
      .error {
        color:#c33;
      }
      form {
        margin:   1em auto;
        padding:  1em;
        width:    40%;
      }
      label {
        display:  inline-block;
        width:    100px;
      }
      input, select {
        display:  inline-block;
        width:    200px;
      }
      button {
        display:  block;
        margin:   1em auto;
      }
      table {
        border-collapse: collapse;
        border: 1px solid black;
      }
      th, td {
        border: 1px solid black;
        padding: 0.1em 0.5em;
        text-align: right;
      }
    </style>
  </head>
  <body>
  <?php
    echo <<<EOD
    <h1>Your Life!</h1>
    <form action='./your_life.php' method='get'>
    <fieldset>
      <div>
        <label for='birthday'>Your birthday:</label>
        <input type='text' id='birthday' name='birthday' value='$birthday_str'/>
      </div>
      <div>
        <label for='gender>'>Your gender:</label>
        <select id='gender' name='gender'>
          <option value='Select One'>$gender</option>
          <option value='male' $male_selected>Male</option>
          <option value='female' $female_selected>Female</option>
        </select>
      </div>
      <div>
        <button type='select'>Tell Me</button>
      </div>
    </fieldset>
    </form>
    $info
EOD;
  ?>
  </body>
</html>

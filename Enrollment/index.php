<?php
//  Enrollment/index.php
//  -------------------------------------------------------------------------------------
/*    Display enrollment data time series for a section, course, discipline, division,
 *    or requirement.
 *    Provide user with controls for selecting term and items listed above.
 */
//  Setup and initialization
//  --------------------------------------------------------------------------------------
date_default_timezone_set('America/New_York');
require_once('credentials.inc');

$curric_db                      = curric_connect() or die('Unable to access curriculum db');
$cf_catalog_update_date         = 'Unknown';
$approved_courses_update_date   = 'Unknown';
$course_enrollments_update_date = 'Unknown';
$query = 'select * from update_log';
$result = pg_query($curric_db, $query) or die('update_log query failed');
while ($row = pg_fetch_assoc($result))
{
  $this_date = new DateTime($row['updated_date']);
  $date_str = $this_date->format('F j, Y');
  switch ($row['table_name'])
  {
    case 'cf_catalog':
      $cf_catalog_update_date = $date_str;
      break;
    case 'approved_courses':
      $approved_courses_update_date = $date_str;
      break;
    case 'enrollments':
      $course_enrollments_update_date = $date_str;
      break;
    default:
      ; //  ignore other tables that might be there
  }
}

$disipline_names = array();
$result = pg_query($curric_db, 'select * from discp_dept_div') or
            die ('Unable to query discp_dept_div');
while ($row = pg_fetch_assoc($result))
{
  $discipline_names[$row['discipline']] = $row['discipline_full_name'];
}

//  Class Data
//  -------------------------------------------------------------------------------------
class Data
{
  public $sections, $seats, $enrollment;
  function __construct($seats, $enrollment)
  {
    $this->sections   = 1;
    $this->seats      = $seats;
    $this->enrollment = $enrollment;
  }
}

//  Global arrays for identifying designations
//  -------------------------------------------------------------------------------------
  //  Designation Sets
  $designation_sets = array
    (
      //  Note recursive definitions here
      'EC'    =>  array('EC-1', 'EC-2'),
      'RCC'   =>  array('EC', 'MQR', 'LPS'),
      'FCC'   =>  array('CE', 'IS', 'SW', 'USED', 'WCGI'),
      'COPT'  =>  array('COPT1', 'COPT2', 'COPT3', 'COPT4'),
      'COPT1' =>  array('LIT'),
      'COPT2' =>  array('LANG'),
      'COPT3' =>  array('LPS', 'SW', 'SCI'),
      'COPT4' =>  array('FCC', 'COPT1', 'COPT2', 'COPT3', 'SYN'),
      'PATH'  =>  array('RCC', 'FCC', 'COPT'),
      'AOK'   =>  array('AP', 'CV', 'NS', 'NS+L', 'RL', 'SS'),
      'CTXT'  =>  array('US', 'ET', 'WC'),
      'PLAS'  =>  array('AOK', 'CTXT', 'PI'),
    );
  //  Designation Atoms
  $designation_atoms = array
    (
      'EC-1', 'EC-2', 'MQR', 'LPS', 'CE', 'IS', 'SW', 'USED', 'WCGI',
      'LIT', 'LANG', 'SCI', 'SYN',
      'AP', 'CV', 'NS', 'NS+L', 'RL', 'SS', 'US',
      'ET', 'WC', 'PI'
    );
    $designation_titles = array
    (
      'PATH'  =>  'CUNY Pathways, including QC College Option',
      'RCC'   =>  'CUNY Required Core',
      'FCC'   =>  'CUNY Flexible Core',
      'COPT'  =>  'QC College Option',
      'EC'    =>  'CUNY Required Core: English Composition',
      'MNS'   =>  'Pathways courses offered by MNS Division',
      'COPT1' =>  'QC College Option: Literature',
      'COPT2' =>  'QC College Option: Language',
      'COPT3' =>  'QC College Option: Science',
      'COPT4' =>  'QC College Option: Group 4',
      'PLAS'  =>  'QC Perspectives',
      'AOK'   =>  'QC Perspectives (PLAS) Area of Knowledge',
      'CTXT'  =>  'QC Perspectives (PLAS) Context of Experience',
      'EC-1'  =>  'QC First English Composition',
      'EC-2'  =>  'QC Second English Composition',
      'MQR'   =>  'CUNY Pathways: Mathematics and Quantitative Reasoning',
      'LPS'   =>  'CUNY Pathways: Life and Physical Sciences',
      'CE'    =>  'CUNY Pathways: Creative Expression',
      'IS'    =>  'CUNY Pathways: Individual and Society',
      'SW'    =>  'CUNY Pathways: Scientific World',
      'USED'  =>  'CUNY Pathways: United States Experience in its Diversity',
      'WCGI'  =>  'CUNY Pathways: World Cultures and Global Issues',
      'LIT'   =>  'QC College Option: Literature',
      'LANG'  =>  'QC College Option: Language',
      'SCI'   =>  'QC College Option: Science',
      'SYN'   =>  'QC College Option: Synthesis',
      'AP'    =>  'QC Perspectives: Appreciating and Participating in the Arts',
      'CV'    =>  'QC Perspectives: Culture and Values',
      'NS'    =>  'QC Perspectives: Natural Science',
      'NS+L'  =>  'QC Perspectives: Natural Science with Laboratory',
      'RL'    =>  'QC Perspectives: Reading Literature',
      'SS'    =>  'QC Perspectives: Social Science',
      'US'    =>  'QC Perspectives: United States',
      'ET'    =>  'QC Perspectives: European Traditions',
      'WC'    =>  'QC Perspectives: World Cultures',
      'PI'    =>  'QC Perspectives: Pre-industrial'
    );

//  sanitize()
//  ---------------------------------------------------------------------------
/*  Prepare a user-supplied string for inserting/updating a db table.
 *    Force all line endings to Unix-style.
 *    Replace straight quotes, apos, and quot with smart quotes
 *    Convert '<' and '&' to html entities without destroying existing entities
 *    Convert '--' to mdash
 */
  function sanitize($str)
  {
    $returnVal = trim($str);
    //  Convert \r\n to \n, then \r to \n
    $returnVal = str_replace("\r\n", "\n", $returnVal);
    $returnVal = str_replace("\r", "\n", $returnVal);
    //  Convert exisiting html entities to characters
    $returnVal = str_replace('&amp;', '&', $returnVal);
    $returnVal = str_replace('--', '—', $returnVal);
    $returnVal = preg_replace('/(^|\s)"/', '$1“', $returnVal);
    $returnVal = str_replace('"', '”', $returnVal);
    $returnVal = preg_replace("/(^\s)'/", "$1‘", $returnVal);
    $returnVal = str_replace("'", "’", $returnVal);
    $returnVal = htmlspecialchars($returnVal, ENT_NOQUOTES, 'UTF-8');
    return $returnVal;
  }

//  append_designations()
//  -------------------------------------------------------------------------------------
/*  Append all designations implied by a designation name to the global array,
 *  $designations
 */
  function append_designations($desig)
  {
    global $designation_atoms, $designation_sets, $designations;
    if (in_array($desig, $designation_atoms))
    {
      if (! in_array($desig, $designations))
      {
        $designations[] = $desig;
      }
      return;
    }
    else
    {
      if (isset($designation_sets[$desig]))
      {
        $this_set = $designation_sets[$desig];
        foreach($this_set as $element)
        {
          append_designations($element);
        }
        return;
      }
      else die("<h1>append_designations: $desig is not a valid designation</h1>");
    }
  }

//  or_list()
//  ----------------------------------------------------------------------
/*  Returns a comma-separated list of array elements, with the last item
 *  preceded by "or."
 */
 function or_list($elements)
 {
   $n = count($elements);
   switch ($n)
   {
     case 0:
         return "";
         break;
     case 1:
         return $elements[0];
         break;
     case 2:
         return $elements[0] . " or " . $elements[1];
         break;
     default:
         $str = $elements[0];
         for ($i = 1; $i < $n - 1; $i++)
         {
           $str .= ", " . $elements[$i];
         }
         return $str . ", or " . $elements[$n -1];
   }
 }



  //  Generate the web page
  //  -----------------------------------------------------------------------------------
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
    <title>Enrollment History</title>
    <link rel='stylesheet' href='./css/enrollment.css' type='text/css'/>
  </head>
  <body>
<?php
  $spreadsheet_date = date('F j, Y', filemtime('enrollment.xlsx'));
  echo <<<EOD
    <h1>Enrollment History</h1>
    <p>
      <em>
        Approval data last updated $approved_courses_update_date.
        <br/>
        CUNYfirst catalog data last updated $cf_catalog_update_date.
        <br/>
        Enrollment data last gathered $course_enrollments_update_date.
        <br/>
        Enrollment spreadsheet constructed $spreadsheet_date.
      </em>
    </p>
    <p>
      <a href='./spreadsheet.php'>Download Spreadsheet</a>
    </p>
EOD;
?>
    <!--
      Need to select what to show: What term(s), what divisions, what requirements,
      what disciplines, what courses, what sections. Or what rooms or what times.
      Then you have to select level of detail. For example when by-course, do you
      want each section plotted separately? When by department, do you want each course
      plotted separately? etc.

      Start with all data for Spring 2014, and get one graph to work.
      -->
      <?php
        $query = <<<EOD
select  *
from    view_enrollments
where   term_code = 2014020
and     status = 'A'
and     course_id not in (select course_id from view_multiple_components)
or      component = 'LEC'
EOD;
        $result = pg_query($curric_db, $query);
        $data = array();
        while ($row = pg_fetch_assoc($result))
        {
          $date = $row['date'];
          if (! isset($data[$date]))
          {
            $data[$date] = new Data($row['seats'], $row['enrollment']);
          }
          else
          {
            $data[$date]->sections++;
            $data[$date]->seats += $row['seats'];
            $data[$date]->enrollment += $row['enrollment'];
          }
        }
        ksort($data);
        echo <<<EOD
        <table>
          <tr>
            <th>Date</th>
            <th>Sections</th>
            <th>Seats</th>
            <th>Enrollment</th>
          </tr>
EOD;
        foreach ($data as $date =>$values)
        {
          echo <<<EOD
          <tr>
            <td>$date</td>
            <td>{$values->sections}</td>
            <td>{$values->seats}</td>
            <td>{$values->enrollment}</td>
          </tr>
EOD;
        }
      ?>
      </table>
  </body>
</html>


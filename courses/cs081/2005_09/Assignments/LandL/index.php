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

    <title>Links and Lists</title>

  <?php
  require_once 'landl.php';
    $dir = opendir( "css" );
    $sheets = array();
    $comments = array();
    while ( $file = readdir($dir) )
    {
      if (preg_match('/\.css$/', $file))
      {
        echo "<link rel='stylesheet' type='text/css' media='all' ";
        echo "href='css/".$file."' />\n";
        $sheets[] = $file;
        $comments[] = extractComments($file);
      }
    }
    ?>

    <script type="text/javascript" src="scripts/landl.js">
    </script>
  </head>

  <body>

    <div id="header">
    <a id="top" />
      <h1>Lists and Links</h1>
      <p>Click on one of the buttons below to activate the corresponding
      stylesheet for this page.  <strong>Note:</strong> the buttons and
      descriptions below are in a table, so any stylesheet rules that affect
      tables will affect them.</p>
      <table summary=
        "Buttons to select stylesheets, and the stylesheet descriptions">
      <?php
        for ($i=0; $i<count($sheets); $i++)
        {
          echo "<tr><td>";
          echo "<button tabindex = \""."$i";
          echo "\" onclick=\"ssswitch(".($i).")\">";
          echo $sheets[$i]."</button></td><td>".$comments[$i]."</td></tr>";
        }
      ?>
      </table>
    </div>

    <div id="content">
      <h2>List of Links</h2>
      <div id="navigation">
        <ul>
          <li id="good"><a href="#good">Good Link</a></li>
          <li id="better"><a href="#better">Better Link</a></li>
          <li id="best"><a href="#best">Best Link</a></li>
        </ul>
      </div>

      <h2>Some Information</h2>

      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
      Pellentesque pretium justo sagittis erat. Aliquam rutrum eros non
      nisl. In suscipit ornare ante. Cras quis nunc et risus ullamcorper
      ullamcorper. Etiam scelerisque erat sit amet lacus. Fusce
      ullamcorper erat a neque. Sed consequat scelerisque nibh. Ut
      luctus libero. Aenean ut libero. Morbi sit amet enim. Nulla
      imperdiet volutpat augue.</p>

      <p>Donec non ante sed ligula sollicitudin dictum. Suspendisse
      gravida orci. Cras condimentum sem nec est. Donec non ligula sed
      leo lacinia malesuada. Vestibulum nunc enim, nonummy viverra,
      tempus in, malesuada lacinia, mauris. Class aptent taciti sociosqu
      ad litora torquent per conubia nostra, per inceptos hymenaeos.
      Etiam pretium metus sed erat. Praesent varius, justo non rutrum
      tempus, massa urna cursus est, nec suscipit libero nisl ut mauris.
      Aenean suscipit fringilla velit. Nunc semper, lacus eget nonummy
      rhoncus, felis ante aliquam elit, quis volutpat neque mauris
      laoreet turpis. Etiam consequat massa at libero. Etiam id neque
      sit amet nulla tempus ullamcorper. Aliquam suscipit, ligula in
      eleifend cursus, mi mi tincidunt tortor, id accumsan dui metus ac
      neque. Nunc nulla. Pellentesque in sapien dictum ligula placerat
      sollicitudin. Cras in augue vitae ligula nonummy facilisis.</p>

      <p>Vestibulum ac velit vel est pellentesque pellentesque.
      Phasellus augue. Ut tellus massa, vestibulum eu, consequat eu,
      euismod id, erat. Donec nec mi. Mauris varius molestie eros. In
      erat augue, aliquam vitae, hendrerit at, euismod sit amet, tellus.
      Ut ultrices, ligula in laoreet egestas, justo tellus tincidunt
      ligula, vel rhoncus felis odio placerat nibh. Fusce quis eros in
      eros interdum tristique. Nullam cursus tellus quis felis. Integer
      purus. Donec nunc dolor, scelerisque id, lacinia vitae, mattis
      vitae, metus. Pellentesque velit. Nulla justo pede, imperdiet non,
      semper sit amet, tempus sit amet, sapien. Donec tempor mattis
      tortor. In mattis. Ut mattis ornare felis.</p>

      <p>Vestibulum posuere congue purus. Fusce leo dui, ullamcorper
      vel, gravida in, tempor non, lorem. Vestibulum ante ipsum primis
      in faucibus orci luctus et ultrices posuere cubilia Curae; Cum
      sociis natoque penatibus et magnis dis parturient montes, nascetur
      ridiculus mus. Integer commodo augue nec mauris. Pellentesque
      euismod. Donec feugiat. Nam ante. Etiam sodales convallis nisi.
      Nullam massa felis, congue in, auctor vitae, egestas eget, turpis.
      Donec suscipit augue in lorem. Mauris quis quam vitae urna
      consequat hendrerit. Nulla facilisi. Curabitur eu nisi euismod leo
      suscipit dapibus. Ut egestas. Praesent pede sem, varius vel,
      dictum nec, adipiscing nec, eros.</p>

      <h3><a id="best"></a><a href="#top">Best Link</a></h3>

      <p>Integer aliquet ligula id libero. Suspendisse sed risus ut elit
      tincidunt auctor. Phasellus scelerisque augue quis nisi. Sed ante
      magna, ornare elementum, tempus id, tempus eu, quam. In hac
      habitasse platea dictumst. Nam ac velit. Phasellus facilisis
      condimentum arcu. Pellentesque habitant morbi tristique senectus
      et netus et malesuada fames ac turpis egestas. Mauris vitae urna
      vel dui viverra feugiat. Nam bibendum. Vivamus pharetra, tortor ac
      pulvinar mattis, nisi quam ultricies sapien, at aliquet odio dolor
      eget dolor. Sed suscipit ullamcorper justo. Suspendisse elit nisl,
      sagittis ut, venenatis eu, consequat vel, purus. Ut urna arcu,
      rutrum non, gravida vitae, commodo in, sem. Duis ullamcorper.
      Aliquam sed eros.</p>

    </div>

    <div id="footer">
    <hr />
      <p>
        <a href="/">Vickery Home</a>&nbsp;-&nbsp;
        <a href="http://validator.w3.org/check?uri=referer">XHTML</a>&nbsp;-&nbsp;
        <a href="http://jigsaw.w3.org/css-validator/check/referer">&nbsp;-&nbsp;
        CSS</a>
      </p>
      <p><em>Last updated
        <?php echo gmdate("Y-m-d", filemtime("index.php"));
        ?>.</em>
      </p>
    </div>
  </body>
</html>

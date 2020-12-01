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

  <title>Positioning</title>

  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="css/style-screen.css"
  />

  <script type="text/ecmascript" src="scripts/positioning.js">
  </script>

</head>

<body>

  <div id="header">
    <h1>Positioning</h1>
  </div>

  <div id="content">

    <div id="image">
      <img src="images/peaches.jpg" alt="peach pulchritude" />
    </div>

    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque
    mollis nisl at sem. Morbi tempor nonummy nulla. Aenean lacus nisi,
    sagittis id, sagittis in, accumsan non, lorem. Donec ac diam. Vivamus
    tempor posuere pede. Nam nunc ipsum, scelerisque ut, rutrum aliquam,
    tristique vitae, odio. Donec in lectus eu elit nonummy laoreet.
    Curabitur quis sem. Vestibulum porttitor mauris sollicitudin velit.
    Nullam cursus. Praesent erat eros, tempus a, dignissim non, tincidunt
    at, sem. Morbi nibh tortor, imperdiet ut, tincidunt id, mollis at, nibh.
    Mauris a enim ac pede commodo tincidunt. Mauris malesuada arcu et augue.
    Maecenas venenatis sagittis eros. Vestibulum aliquet euismod ipsum. Ut
    consectetuer, nulla vitae mollis sollicitudin, est leo pretium lectus,
    ut semper turpis leo sit amet augue. Vestibulum ante ipsum primis in
    faucibus orci luctus et ultrices posuere cubilia Curae;</p>

    <p>Phasellus aliquam suscipit dui. Curabitur commodo mi eu erat.
    Suspendisse tempus, risus in fermentum suscipit, ipsum nunc feugiat
    odio, eget varius turpis enim sed mi. Sed laoreet mattis dolor. Donec
    volutpat nisl eu nisl. Pellentesque tortor mi, tempor vitae, consequat
    in, accumsan at, libero. Nullam mauris enim, fermentum quis, condimentum
    non, convallis vitae, mi. Vestibulum ante ipsum primis in faucibus orci
    luctus et ultrices posuere cubilia Curae; Praesent rhoncus. Sed in orci
    non augue nonummy dictum. Suspendisse magna magna, faucibus quis,
    suscipit elementum, iaculis non, sapien. Nunc et tortor quis neque
    ornare porttitor. Mauris consectetuer, pede eget mattis rutrum, quam
    erat commodo nibh, a blandit lacus erat a lectus. Morbi tellus odio,
    iaculis a, pellentesque eget, rhoncus eget, turpis. Etiam euismod
    iaculis felis. Proin accumsan. Pellentesque erat. Proin ultrices
    condimentum augue. Aliquam erat volutpat.</p>

    <p>Pellentesque vitae risus sollicitudin ipsum dictum mollis. Vivamus
    urna leo, sodales ut, ullamcorper tempus, venenatis ut, leo. Sed porta
    laoreet sapien. Nullam vitae nibh ut libero adipiscing fermentum.
    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
    cubilia Curae; Nulla facilisi. Nunc rhoncus imperdiet elit. Mauris
    dapibus. Nullam mi ante, mattis ac, viverra sit amet, ornare id, nunc.
    Morbi tincidunt ultricies nulla. Maecenas pulvinar, massa vitae lacinia
    eleifend, tellus ipsum tristique turpis, non euismod leo dui et
    sapien.</p>

    <p>Sed fringilla semper felis. Donec neque. Praesent pretium sagittis
    libero. Proin malesuada massa vitae nulla. In porta rutrum massa. Ut
    auctor viverra urna. Nulla facilisi. Sed mi lorem, pellentesque non,
    tristique sit amet, placerat ac, ante. Suspendisse nec nunc. Proin vel
    sem.</p>

    <p>Pellentesque sapien elit, ullamcorper nec, euismod sed, euismod
    laoreet, quam. Proin dictum urna. Etiam sed dolor. Integer quis ligula
    ac dolor nonummy imperdiet. Proin mi ipsum, pulvinar non, luctus non,
    vehicula quis, justo. Suspendisse potenti. Sed tortor. Nam lacinia erat.
    Vivamus ultricies interdum nisi. Curabitur non ligula ac pede
    pellentesque tempus. Nunc augue. Pellentesque orci risus, rutrum eget,
    adipiscing nec, adipiscing eget, nibh. Nam tristique faucibus lorem. Cum
    sociis natoque penatibus et magnis dis parturient montes, nascetur
    ridiculus mus. Curabitur sodales dolor eu erat. Nulla at leo.</p>

    <p>Cras ultrices lorem sed nunc. Vivamus tempus sem quis magna. Nam
    tempor. Ut et elit. Curabitur ornare sodales justo. Etiam bibendum erat
    nec purus. Phasellus aliquet vehicula justo. Morbi arcu justo, suscipit
    imperdiet, dictum sit amet, luctus sed, orci. Pellentesque lacinia. Nunc
    vulputate. Sed tempor enim eu diam. Lorem ipsum dolor sit amet,
    consectetuer adipiscing elit. Suspendisse quam mauris, pellentesque eu,
    aliquam ut, fringilla id, odio. Quisque at eros. Suspendisse aliquet.
    Pellentesque placerat. Ut feugiat, tortor vel dignissim porta, nunc
    lorem rutrum tortor, vitae consequat libero sapien eu magna. Morbi
    auctor. Pellentesque sed est sed pede venenatis euismod.</p>


    <p>Etiam eu eros. Donec volutpat molestie justo. Integer non nibh nec
    odio scelerisque vehicula. Sed rutrum nunc quis est. Curabitur fringilla
    lacus consectetuer pede. Aenean urna tellus, mollis non, porttitor quis,
    vestibulum sed, urna. Nunc non enim. Maecenas aliquet. Curabitur
    pharetra erat ac est. Nullam vestibulum risus vel purus lacinia blandit.
    Ut dui. Cras ut velit id neque volutpat tempus. Suspendisse ultrices.
    Sed risus orci, aliquet nec, tristique sed, ultricies et, lacus. Nam
    auctor condimentum quam. Proin nec quam ac metus tincidunt pretium.
    Donec eleifend, nisi vitae scelerisque luctus, nibh lorem aliquam metus,
    eget iaculis enim felis at tortor. Suspendisse eu orci.</p>

    <p>Sed luctus, quam vitae consectetuer adipiscing, lacus felis
    consectetuer elit, in vestibulum lacus odio id justo. In pharetra libero
    sit amet erat. Vestibulum dolor erat, cursus quis, mollis quis, lobortis
    quis, leo. Suspendisse potenti. Morbi pellentesque neque quis ligula.
    Duis molestie vestibulum lorem. Integer vehicula ornare neque. Phasellus
    suscipit fermentum lectus. Aliquam sit amet quam eu purus aliquam
    varius. Nullam tincidunt venenatis felis. Nulla tincidunt. Etiam mattis
    erat aliquet purus pulvinar placerat. Cum sociis natoque penatibus et
    magnis dis parturient montes, nascetur ridiculus mus.</p>

    <p>Aliquam blandit bibendum ligula. Proin lacus nisi, lacinia sit amet,
    viverra sed, pretium ac, eros. Quisque adipiscing. Aliquam erat
    volutpat. Sed quis leo. Fusce magna. Vestibulum enim magna, gravida
    volutpat, dictum sed, sagittis id, nibh. Cum sociis natoque penatibus et
    magnis dis parturient montes, nascetur ridiculus mus. Aenean est. Ut nec
    enim eget dui dignissim aliquam. Quisque tincidunt egestas pede. Proin
    eget orci. Aenean tempor, leo a rutrum eleifend, orci nulla ornare erat,
    ut interdum nisl erat sed metus. Donec eget lacus vitae nisl gravida
    facilisis.</p>

    <p>Vestibulum sed mauris vitae nibh hendrerit scelerisque. Duis at
    ligula. Cum sociis natoque penatibus et magnis dis parturient montes,
    nascetur ridiculus mus. Nam dolor. Vestibulum sed purus. Integer vitae
    arcu ac lorem mollis faucibus. Praesent facilisis. Fusce auctor justo
    pretium magna. Mauris in sapien vitae metus ullamcorper egestas. Etiam
    fringilla nibh ut quam. Etiam ac risus ac felis dapibus tincidunt.
    Integer vitae velit in lacus aliquet accumsan. Nam commodo turpis ac
    nisi. Vestibulum adipiscing semper libero. Fusce at pede. Pellentesque
    eget magna. Ut sem. Proin vitae elit. Nam condimentum tortor quis
    lectus. Donec eget odio.</p>

  </div>

  <div id="controller">
      <fieldset>
      <legend>Display</legend>
        <input  type="radio"  name="display" id="disp_none"/>
        <label  for="disp_none">None</label>
        <br/>
        <input  type="radio"  name="display" id="disp_inline"/>
        <label  for="disp_inline">Inline</label>
        <br/>
        <input  type="radio"  name="display" id="disp_block"/>
        <label  for="disp_block">Block</label>
      </fieldset>

      <fieldset>
      <legend>Position</legend>
      </fieldset>

      <fieldset>
      <legend>Offsets</legend>
        <input  type="radio" name="off_tb" id="off_top"/>
        <label  for="off_top">Top = 0</label>
        <br/>
        <input  type="radio" name="off_tb" id="off_bot"/>
        <label  for="off_bot">Bottom = 0</label>
        <br/>
        <input  type="radio" name="off_tb" id="off_tb_none"/>
        <label  for="off_tb_none">Top/Bottom Unspecified</label>
        <br/>
        <input  type="radio" name="off_lr" id="off_left"/>
        <label  for="off_left">Left = 0</label>
        <br/>
        <input  type="radio" name="off_lr" id="off_right"/>
        <label  for="off_right">Right = 0</label>
        <br/>
        <input  type="radio" name="off_lr" id="off_lr_none"/>
        <label  for="off_lr_none">Left/Right Unspecified</label>
      </fieldset>

      <fieldset>
      <legend>Float</legend>
        <input  type="radio" name="float" id="float_left"/>
        <label  for="top">Float Left</label>
        <br/>
        <input  type="radio" name="float" id="float_right"/>
        <label  for="top">Float Right</label>
        <br/>
        <input  type="radio" name="float" id="float_none"/>
        <label  for="top">Float None</label>
      </fieldset>

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

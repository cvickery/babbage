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
    <title>My First Assignment</title>
    <link rel='stylesheet' href='assignment_01.css' />
  </head>
  <body>
    <h1>My First Assignment</h1>
    <h2>by The Professor</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius malesuada
      volutpat. Mauris interdum pharetra molestie. Nulla sem urna, sagittis vulputate
      adipiscing eu, hendrerit a lorem. Praesent nisl tortor, eleifend vel placerat quis,
      tempus sed velit. Aenean eget massa eget metus placerat tincidunt a at nisi. Proin
      elit augue, posuere sed imperdiet eget, ultrices a mauris. Ut at quam non est
      pretium sollicitudin. Nullam consectetur eleifend lectus sit amet porttitor. Sed
      lorem quam, venenatis porta dictum eget, dapibus elementum enim. Nullam ac diam
      nunc. Integer in mi est, in sodales est. Suspendisse sed mauris vitae tellus
      pulvinar tempus et faucibus dui. Fusce semper leo mi, eu sodales ligula. Aliquam
      vulputate diam sed sem ultrices eget aliquam risus porttitor.
    </p>

    <p>
      Fusce hendrerit iaculis tortor, at interdum augue scelerisque vel. In ornare
      faucibus urna non sodales. Nunc pharetra dolor eget dui ullamcorper at lobortis
      lorem accumsan. Nullam tempus purus id arcu interdum sed dignissim arcu consectetur.
      Phasellus quis nibh quis nisl pharetra bibendum. Integer egestas fringilla
      venenatis. Nullam interdum ullamcorper velit consequat mollis. Aliquam quam ante,
      aliquet aliquet gravida sit amet, posuere quis libero. Nam vel ligula tincidunt nisl
      molestie sollicitudin. Donec et est in massa egestas rhoncus sit amet id nunc. Nulla
      quis dui id augue venenatis fermentum eu sit amet nibh. Pellentesque mollis aliquet
      tellus, rutrum ornare diam ultricies id. Sed malesuada iaculis consequat. Maecenas
      iaculis lacinia metus, ac lobortis eros consequat ac. Proin pulvinar accumsan felis
      eu elementum.
    </p>

    <p>
      Fusce id nulla at dui dictum ultrices in quis turpis. Curabitur quis libero est,
      convallis blandit nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Morbi augue eros, blandit eget placerat et, suscipit id turpis. Morbi in nibh odio.
      Ut consectetur placerat sodales. Proin consectetur, enim in iaculis vehicula, dui
      quam ullamcorper nulla, id ullamcorper nulla nisl ac velit.
    </p>

    <p>
      Suspendisse at dui sed quam luctus tempus ut ut dui. Nullam fringilla sodales
      vestibulum. Suspendisse eget nunc sit amet purus hendrerit feugiat. Praesent sodales
      venenatis ultrices. Sed et ultricies leo. Aliquam sapien ipsum, cursus nec congue
      in, tempor a risus. Suspendisse leo velit, vehicula vitae laoreet non, venenatis ac
      metus. Pellentesque fermentum, metus pharetra dignissim gravida, est arcu accumsan
      augue, eu cursus augue mauris non sapien. Cras interdum interdum dictum. Donec at
      ipsum nisi, ac pharetra sapien. Nullam lobortis erat consequat nisi iaculis
      condimentum eu ac purus.
    </p>

    <p>
      Cras quis urna at diam mattis tincidunt at ac sapien. Duis pulvinar cursus nibh, in
      ornare sem consequat ut. In velit velit, semper nec vestibulum vel, tempus ut
      mauris. Donec tempor laoreet odio, nec mattis purus ultricies quis. Praesent a
      adipiscing mauris. Fusce sodales felis et justo dapibus in ornare felis viverra. Nam
      convallis ornare rhoncus. Proin id aliquam lectus. Donec luctus, elit ut viverra
      porttitor, turpis turpis malesuada purus, hendrerit blandit nulla diam sit amet
      nibh. Suspendisse tortor lectus, fermentum vitae venenatis tristique, rutrum tempus
      leo. Suspendisse vitae elit nisi, at placerat urna. Aenean hendrerit elementum
      euismod. Nullam sed purus sed neque feugiat gravida.
    </p>

    <p>
      Donec sollicitudin leo nec nisl tincidunt ultrices. Curabitur at orci velit, non
      facilisis metus. Vestibulum nunc urna, tincidunt quis rutrum id, laoreet eget
      turpis. Aenean imperdiet molestie lacus, at porttitor magna pharetra vitae. Nulla ut
      sem ac metus molestie pulvinar consequat ac nisi. Donec nibh mi, fermentum sit amet
      venenatis et, interdum eget turpis. Nam malesuada rhoncus nunc et consequat. In ante
      ligula, euismod sit amet facilisis consectetur, posuere ut turpis. Aenean eget magna
      arcu. Sed sem risus, sollicitudin sed fringilla nec, faucibus ut ipsum. Aenean a
      dolor vel urna vestibulum luctus a eget ligula. Praesent euismod eros et quam
      vehicula porta. Aliquam faucibus consectetur nulla, eu fringilla arcu commodo in.
      Vestibulum pellentesque, metus quis condimentum accumsan, erat quam cursus ipsum,
      pellentesque vestibulum metus mi ac nulla. Pellentesque nec turpis libero, sed
      faucibus sapien. Donec at euismod lorem.
    </p>

    <p>
      Nullam nunc libero, sagittis a eleifend non, convallis vitae dolor. Vivamus porta
      fringilla leo ut ornare. Nulla non erat ipsum. Praesent eleifend nulla sit amet urna
      dignissim vestibulum. Mauris sit amet velit magna. Cras dolor erat, porttitor vitae
      vehicula a, tincidunt nec nunc. Duis eget quam tincidunt urna ultricies cursus. Sed
      faucibus urna sed augue placerat rutrum eu et lectus. Maecenas sed urna tellus.
    </p>

    <p>
      Sed pharetra risus eget quam lobortis et vehicula lorem mollis. Duis id erat ut
      massa commodo varius vel vel metus. Praesent lobortis eleifend lectus, ut lobortis
      odio gravida sed. Vestibulum quis diam dui. Mauris vitae lacus libero. Maecenas
      metus enim, feugiat vitae interdum vel, ultrices posuere velit. Aenean pharetra
      dignissim leo a rhoncus.
    </p>

    <p>
      Curabitur sit amet eleifend nulla. Cum sociis natoque penatibus et magnis dis
      parturient montes, nascetur ridiculus mus. In bibendum, augue gravida ultrices
      viverra, arcu justo ultricies tellus, sit amet euismod dui nisl dapibus augue. In
      fermentum velit sit amet lorem bibendum sed tempus turpis eleifend. Suspendisse
      aliquam libero venenatis lacus semper vulputate. Vestibulum non enim massa. Nunc
      semper leo vel eros ornare interdum pharetra sapien viverra. Proin tellus dui,
      hendrerit vel elementum a, sollicitudin vel odio. Vestibulum ante ipsum primis in
      faucibus orci luctus et ultrices posuere cubilia Curae; Morbi mattis sollicitudin
      leo, in bibendum libero mattis a. Fusce eu risus erat. Nulla et felis vitae elit
      mattis hendrerit. Ut varius consectetur neque, ac egestas nulla euismod vitae.
    </p>

    <p>
      Integer ut tortor sit amet purus eleifend ultricies eu ut turpis. Curabitur mi dui,
      dapibus eget hendrerit nec, hendrerit eget elit. Nam nec metus sem. Sed a erat sed
      dolor pellentesque venenatis. Morbi sit amet est sit amet turpis mattis rhoncus at
      ac mauris. Maecenas vestibulum elementum rutrum. In nisi elit, sodales a facilisis
      ac, euismod at dolor.
    </p>

    <p>
      Curabitur orci mi, aliquet vel tempor et, vestibulum nec elit. Duis dapibus viverra
      lorem, sit amet ullamcorper sapien porttitor nec. Fusce blandit nunc ac turpis
      varius vitae consectetur sem mattis. Curabitur iaculis quam non massa venenatis sit
      amet fringilla enim eleifend. Ut non neque ante. Fusce posuere mollis quam, ac
      aliquet nisl laoreet ac. Proin vestibulum pretium fermentum. Proin eleifend mattis
      nisi at consequat. Quisque varius, metus eu volutpat semper, nisi turpis convallis
      sem, sed accumsan enim magna sed nisl. Integer erat libero, porta nec iaculis id,
      interdum eu enim. Vivamus ornare blandit fringilla. Cras egestas mauris tempor velit
      pulvinar dignissim. Duis purus magna, condimentum sit amet aliquam sit amet,
      convallis non sapien.
    </p>

    <p>
      Sed eros nisl, porta vel mollis ut, tincidunt sit amet est. Fusce a metus et felis
      lacinia vulputate ac vitae mauris. Sed dictum, ipsum ac commodo dapibus, felis
      lectus ultrices diam, rhoncus accumsan libero leo a velit. Phasellus imperdiet,
      metus ac volutpat ornare, tellus risus porta lacus, ac lobortis felis purus sed
      massa. Nullam id nulla augue. Nunc nisi mi, sagittis quis varius eget, tempus quis
      purus. Quisque nec sapien nisl, at rutrum sapien. Sed adipiscing orci at lacus
      feugiat id ornare lectus tristique. Proin elementum dictum nisi, vel sagittis nulla
      malesuada eget. Donec ornare libero eu mauris tempor in ultrices mauris facilisis.
      Morbi aliquam lacus non purus rutrum condimentum. Donec ac tortor sit amet libero
      sollicitudin rhoncus at et sem.
    </p>

    <p>
      Praesent varius consectetur nisl eu commodo. Donec et turpis neque, a gravida augue.
      Ut ultrices eros a nisi facilisis scelerisque. Mauris molestie mauris eget lectus
      lacinia in ultrices dui bibendum. In pretium dapibus purus at blandit. Sed lobortis
      nulla facilisis eros dapibus a placerat velit dapibus. Morbi at nibh ac ante
      ullamcorper imperdiet ac sit amet est. Vivamus leo justo, varius id bibendum non,
      commodo sit amet sapien. Pellentesque id nibh non leo molestie imperdiet. Nunc ut
      molestie massa. Proin lectus leo, fringilla eu laoreet id, mattis in felis. Cras id
      erat mauris, non cursus libero. Phasellus tempus turpis id elit bibendum quis
      vulputate velit auctor. Integer eget tortor et ipsum varius congue at sed lacus.
      Mauris sed ligula eget dolor placerat dapibus. Duis vel lectus vel mauris eleifend
      pretium.
    </p>

    <p>
      Mauris ullamcorper enim lacinia risus bibendum adipiscing. Pellentesque porttitor,
      tortor eget suscipit pulvinar, nisi sem semper nisi, aliquam semper libero neque non
      neque. Cras vulputate lorem ac odio laoreet iaculis vel nec turpis. Quisque pulvinar
      sapien ac metus rhoncus ac mattis metus feugiat. Vestibulum sagittis sollicitudin
      tempus. Aliquam volutpat elementum ligula, quis rhoncus est malesuada sed. Fusce ut
      libero lorem. In eget lectus in massa mattis egestas non id nisi. Donec luctus
      varius metus, in placerat orci adipiscing at. In vel magna sit amet lacus aliquam
      tempus. Nulla in tincidunt ligula.
    </p>

    <p>
      Sed non lectus neque. Morbi tellus purus, cursus vel pharetra eu, fringilla nec
      nibh. Nullam rutrum hendrerit facilisis. Aliquam vulputate, diam et varius dapibus,
      tellus erat venenatis sem, viverra varius odio urna non risus. Vestibulum vehicula
      aliquam diam sit amet viverra. Praesent vel sapien ligula, sit amet ullamcorper
      massa. Donec ipsum ante, lacinia sit amet auctor nec, ullamcorper eget elit.
    </p>
    <footer>  — &#x2014; -
      <a href="http://validator.w3.org/check?uri=referer">XHTML</a> —
      <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3">CSS</a>
    </footer>
  </body>
</html>

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

  <title>Tables by Vickery</title>

  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="css/style-all.css"
  />

</head>

<body>

  <div id="header">
    <h1>Tables by Vickery</h1>
  </div>

  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam
  iaculis est non lorem. Morbi molestie pede a magna. Nulla non est gravida
  ipsum tristique viverra. Vestibulum sagittis posuere sapien. Nulla dapibus
  lacus eu nisl. Quisque mollis augue molestie est condimentum adipiscing.
  Ut sem purus, lobortis sed, condimentum in, venenatis gravida, mauris.
  Mauris a turpis eu eros ornare congue. Pellentesque interdum, lectus non
  vestibulum elementum, lacus libero molestie lectus, eget ultricies nunc
  pede sed tortor. Nam hendrerit porta pede. In a leo at risus volutpat
  ultricies.</p>

  <div id="content">
    <h2>These Are a Few Of My Favorite Things</h2>

    <table summary="This is a list of media that I like.">
    <caption>Vickery&rsquo;s Favorite Media</caption>
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Medium</th>
        <th scope="col">Rating</th>
        <th scope="col">Comments</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th scope="row" colspan="3">Average Rating</th>
        <td>9.1</td>
        <td></td>
      </tr>
    </tfoot>
    <tbody>
      <tr class="odd">
        <td>Spring into HTML and CSS</td>
        <td>Molly Holzschlag</td>
        <td>Book</td>
        <td>10</td>
        <td>Facinating account of how real web pages can be constructed for
        fun and profit.</td>
      </tr>
      <tr>
        <td>Computer Organization and Design, Third Edition</td>
        <td>D. Patterson and J. Hennessy</td>
        <td>Book</td>
        <td>10</td>
        <td>Facinating account of how real computers can be constructed for
        fun and profit.</td>
      </tr>
      <tr class="odd">
        <td>Vi Improved - Vim</td>
        <td>Steve Oualline</td>
        <td>Book</td>
        <td>10</td>
        <td>Facinating account of how real text files can be constructed for
        fun and profit.</td>
      </tr>
      <tr>
        <td>Mastering Digital Printing</td>
        <td>Harald Johnson</td>
        <td>Book</td>
        <td>10</td>
        <td>Facinating account of how real pictures can be printed for fun
        and profit.</td>
      </tr>
    </tbody>    
    </table>

    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra,
    per inceptos hymenaeos. Nullam accumsan iaculis sapien. Proin posuere
    augue ut felis. Morbi ac sem in quam hendrerit dictum. Phasellus
    viverra. Nulla vestibulum iaculis lorem. Praesent viverra. Aliquam
    sapien risus, varius id, molestie blandit, iaculis eu, nunc. Vestibulum
    ac velit non mauris sollicitudin feugiat. Quisque dignissim rutrum
    augue. Cras sem augue, tincidunt eu, accumsan eu, sollicitudin id,
    augue. Maecenas imperdiet. Suspendisse vel leo. Aliquam et nisl. Integer
    nec purus. Etiam tristique. Ut posuere dui. Nunc aliquet facilisis odio.
    Ut nulla nisl, semper ut, ornare id, dignissim quis, nibh. Sed eget nisl
    ac est vestibulum aliquet.</p>

    <p>In quam purus, consequat a, malesuada ut, accumsan vel, ante. In eget
    nunc. Fusce nulla orci, commodo eu, convallis quis, faucibus nec,
    mauris. Nunc at dui vitae elit scelerisque porttitor. Sed vel justo. Nam
    viverra purus eu risus. Mauris sit amet sapien vel odio viverra
    vehicula. Pellentesque aliquam ipsum at dui. Aliquam erat volutpat.
    Fusce sollicitudin, dui quis pharetra mollis, dolor massa vehicula urna,
    sed aliquet libero lacus nec tortor. Maecenas interdum sem nec felis
    convallis lobortis. Maecenas lobortis ipsum eget risus.</p>

    <p>Curabitur pretium. Integer tortor. Suspendisse elementum eleifend
    lorem. Nunc accumsan risus ac diam. Proin dignissim. Donec mollis, massa
    ac tempor pulvinar, elit dui molestie tellus, ac fermentum lorem ante at
    lacus. Pellentesque pede sem, porta ac, convallis eget, venenatis at,
    enim. Ut in justo quis dui condimentum accumsan. Phasellus mauris dui,
    pellentesque scelerisque, dignissim nec, tincidunt nec, arcu. Donec
    libero nisl, mattis a, luctus vitae, aliquet a, velit. Nam eros arcu,
    tempor ac, iaculis a, iaculis feugiat, dolor. Cum sociis natoque
    penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam
    in nunc sit amet neque molestie imperdiet. Quisque pulvinar mauris eu
    odio. Curabitur elit massa, ullamcorper sit amet, tincidunt eu,
    consectetuer vulputate, lacus. Aliquam non lacus. Sed ut dui. Vestibulum
    ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
    Curae; Vestibulum quis ipsum non magna vehicula laoreet. Cum sociis
    natoque penatibus et magnis dis parturient montes, nascetur ridiculus
    mus.</p>

    <p>Sed placerat nonummy orci. Curabitur odio nibh, luctus accumsan,
    commodo ut, rutrum nec, leo. Pellentesque laoreet accumsan neque. Nulla
    velit justo, suscipit sit amet, feugiat ac, cursus nec, erat. Donec
    facilisis. Morbi felis. Donec eu ipsum vel sapien luctus convallis.
    Phasellus sed dui. Nullam nulla turpis, sodales ac, nonummy sit amet,
    eleifend eget, leo. Aliquam odio nisi, auctor at, fringilla non,
    accumsan nec, ligula. Mauris bibendum, ipsum eu suscipit tempor, augue
    elit cursus enim, vitae ullamcorper diam risus a arcu. Aliquam mauris
    felis, laoreet at, malesuada vel, tristique vel, massa.</p>

    <p>Phasellus malesuada feugiat sem. Curabitur id sem. Vestibulum ante
    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
    Integer venenatis accumsan lorem. Quisque at diam. Duis magna ipsum,
    egestas eget, dignissim eu, laoreet id, lectus. Quisque tristique semper
    risus. Pellentesque habitant morbi tristique senectus et netus et
    malesuada fames ac turpis egestas. Sed aliquet, massa eget sodales
    ultrices, odio purus venenatis felis, ac ultricies mi dolor a sem. Donec
    quis dui. Nullam libero. Aliquam commodo convallis purus. Morbi sed
    ipsum. Donec velit. Nullam eu nisi et dolor nonummy vehicula. Vivamus
    nonummy sodales turpis.</p>

    <p>Donec in tellus eget nisi convallis gravida. Morbi tortor. Sed
    blandit commodo sapien. Donec vulputate, dui ultrices molestie
    facilisis, orci erat dictum arcu, vel condimentum diam nisl non est. Sed
    et ipsum nec ipsum malesuada eleifend. Fusce erat. Pellentesque semper
    blandit dui. In rhoncus ornare dui. Praesent congue neque vitae felis.
    Quisque luctus.</p>

    <p>Suspendisse porttitor orci ut leo. Vivamus ac odio sit amet eros
    dapibus tempor. Nunc ac arcu non pede semper sollicitudin. Etiam
    fermentum turpis ut orci. Maecenas sed elit. Curabitur interdum libero
    nonummy metus. Praesent posuere nunc non orci. Sed dignissim volutpat
    pede. Curabitur pede. In hendrerit. In rhoncus eleifend quam. Donec
    congue, nisl in adipiscing lobortis, risus metus laoreet nunc, non
    aliquam sapien turpis eget massa. Fusce interdum arcu quis enim.
    Maecenas augue.</p>

    <p>Aliquam eget purus. Proin semper purus at ipsum. Pellentesque id
    lectus ac nulla tristique auctor. Integer vestibulum elementum sem.
    Proin ligula. Etiam vel lectus. Mauris egestas. Etiam ac lorem. Nullam a
    nulla. Duis faucibus metus. Etiam convallis elit vel ante. Etiam
    ultricies tortor vel dolor. Aliquam erat volutpat. In vel tellus id erat
    scelerisque porttitor. Mauris facilisis, dolor bibendum rutrum nonummy,
    leo dolor porttitor sapien, eu tincidunt nunc risus quis arcu.
    Vestibulum tempor, felis sit amet viverra tempus, nibh metus ornare
    lectus, et ultricies augue felis ac tellus.</p>

    <p>Cras elementum posuere lacus. Phasellus in justo sit amet leo
    condimentum convallis. Sed dui nunc, fermentum at, nonummy in, feugiat
    eu, ligula. Nunc vel erat in risus ultricies congue. Vivamus turpis.
    Donec eget neque nec massa imperdiet elementum. Nam sed libero. Sed
    ipsum nibh, molestie porta, varius laoreet, dapibus ut, libero. Proin
    mattis. Aliquam lobortis interdum metus. Donec ornare dignissim
    pede.</p>

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

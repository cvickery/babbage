<html>
  <head>
    <title>Be My Valentine!</title>
    <style type='text/css'>
      html, body {
        background-color: #f15;
        color: lightyellow;
        font-size:24px;
        font-weight:bold;
        font-family:Copperplate, Helvetica, fantasy;
        margin: 0; padding: 0;
      }
      body {
        width: 640;
        margin: 1em;
        padding: 1em;
        border: 1px solid lightyellow;
        border-radius: 12px;
        text-align:center;
      }
      #press-me {
        transition-property: opacity;
        transition-duration: 5s;
        opacity: 0;
        position:relative;
        top:-220px;
      }
    </style>
    <script type='text/javascript'>
      window.onload = function()
      {
        window.setTimeout(function(){document.getElementById('press-me').style.opacity = '0.6';}, 3000);
      };
    </script>
  </head>
  <body>
    <p>... to tell you how much ...</p>
    <p><a href='ily.html'><img src='images/hearts.png' alt='press-me'/></a><span id='press-me'>Press Me</span></p>
  </body>
</html>

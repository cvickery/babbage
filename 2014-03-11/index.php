<?xml version='1.0' encoding='utf-8'?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>Happy Birthday Carl!</title>
    <link rel='stylesheet' type='text/css' href='./css/carl.css'/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>

      var alter_it_1 = function()
      {
        $('div').removeClass('transformer2').addClass('transformer1');
        tid = setTimeout(alter_it_2, 5000);
      }

      var alter_it_2 = function()
      {
        $('div').removeClass('transformer1').addClass('transformer2');
        tid = setTimeout(alter_it_1, 10000);
      }

      $()
      {
        var tid = setTimeout(alter_it_1, 2000);
      }
    </script>
  </head>
  <body>
    <h1>Happy Birthday</h1>
    <div></div>
  </body>
</html>

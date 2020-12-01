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

  <title>A Form</title>

  <link rel="shortcut icon" href="favicon.ico" />

  <link rel="stylesheet"
        type="text/css"
        media="all"
        href="/courses/css/style-all.css"
  />
  <link rel="stylesheet"
        type="text/css"
        media="screen"
        href="/courses/css/style-screen.css"
  />

  <style type="text/css">
    #controls { display: none; }
    #restore_defaults {
      border: none;
      background-color:white; color:blue;
      float:right;
      margin-right:50%;
      }
  </style>
  <script type="text/javascript" src="scripts/a_form.js">
  </script>

</head>

<body>

  <div id="header">
    <h1>A Form</h1>
  </div>

  <div id="content">
    <h2>A Form With Some Controls</h2>
    <div class="whitebox">
      <form method="get" id="theForm"
            action="Form_Script.sh"
            enctype="multipart/form-data">
        <fieldset>
          <legend>Examples of Input Controls</legend>

          <p>
            <input  type="checkbox"
                    value="A"
                    name="checkbox_a"
                    tabindex="11"
                    id="checkbox_a" />
            <label  for="checkbox_a"  accesskey="1"   >Checkbox 1</label>

            <input  type="checkbox"
                    value="B"
                    checked="checked"
                    name="checkbox_b"
                    tabindex="10"
                    id="checkbox_b" />
            <label  for="checkbox_b"  accesskey="2">Checkbox 2</label>
            <br/>

            <input  type="radio"
                    name="radiogroup"
                    id="radio_c"
                    tabindex="9"
                    value="C" />
            <label for="radio_c"  accesskey="3">Radio 3</label>

            <input  type="radio"
                    name="radiogroup"
                    id="radio_d"
                    value="D"
                    tabindex="8"
                    checked="checked" />
            <label for="radio_d"  accesskey="4">Radio 4</label>

            <input  type="radio"
                    name="radiogroup"
                    tabindex="7"
                    id="radio_e"
                    value="E"/>
            <label for="radio_e"  accesskey="5">Radio 5</label>
          </p>

          <p>
            <label for="text_line" accesskey="6">Text Line 6</label>
            <br />
            <input  type="text"
                    name="text_line"
                    tabindex="6"
                    id="text_line" />
          </p>

          <p>
            <label for="text_area" accesskey="7">Text Area 7</label>
            <br />
            <textarea name="text_area"
                      id="text_area"
                      tabindex="5"
                      rows="10"
                      cols="20"></textarea>
          </p>

          <p>
            <label for="single_select" accesskey="8">8: Select One</label>
            <select name="single_select"
                    id="single_select"
                    tabindex="4">
              <option>Biology</option>
              <option>Chemistry and Biochemistry</option>
              <option selected="selected">Computer Science</option>
              <option>EES</option>
              <option>FNES</option>
              <option>Mathematics</option>
              <option>Physics</option>
              <option>Psychology</option>
            </select>
          </p>

          <p>
            <label for="multiple_select" accesskey="9">9: Select
            Several</label>
            <select name="multiple_select[]"
                    id="multiple_select"
                    tabindex="3"
                    multiple="multiple"
                    size="5">
              <optgroup label='Favorite Meal'>
                <option>Breakfast</option>
                <option>Lunch</option>
                <option>Dinner</option>
                <option>Midnight Snack</option>
              </optgroup>
              <optgroup label='Favorite Food'>
                <option>Chocolate Cake</option>
                <option>Chocolate Ice Cream</option>
                <option>Chocolate Ice Cream</option>
                <option>Chocolate Ice Cream</option>
              </optgroup>
              </select>
          </p>

          <p>
            <label for="a_file" accesskey="0">10: Select a File</label>
            <input  type="file"
                    name="a_file"
                    tabindex="2"
                    id="a_file" />
          </p>

          <p>
            <label for="passwd_in">Enter a secret message:	</label>
            <input  type="password"
                    id="passwd_in"
                    tabindex="1"
                    name="secret_msg" />
          </p>

          <p><input type="submit" value="Click to Submit" /></p>

        </fieldset>
      </form>

      <fieldset id="controls">
        <legend>Options for submitting the form</legend>

        <button id="restore_defaults" title="Restore Defaults">
          <img src="images/restore_defaults_button.png" alt="Restore Defaults"/>
        </button>

        <p>
          <input  type="radio"
                  name="action"
                  id="action_php"
                  checked="checked" />
          <label for="action_php">Submit to Form_Script.php</label>

          <input  type="radio"
                  name="action"
                  id="action_sh" />
          <label for="action_sh">Submit to Form_Script.sh</label>

          <input  type="radio"
                  name="action"
                  id="action_81" />
          <label for="action_81">Submit to localhost:81</label>
        </p>

        <p>
          <input  type="radio"
                  name="method"
                  id="method_get"
                  checked="checked" />
          <label for="method_get">Submit using GET</label>

          <input  type="radio"
                  name="method"
                  id="method_post" />
          <label for="method_post">Submit using POST</label>
          <input  type="radio"
                  name="method"
                  id="method_multipart" />
          <label for="method_multipart">Submit using multiplart/form-data
          </label>
        </p>
      </fieldset>
    </div>
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

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

  <title>Assignment 3</title>

</head>

<body>

  <div id="header">
    <h1>Assignment 3</h1>
    <h2>Christopher Vickery</h2>
  </div>

  <div id="content">
    <h2>A Form</h2>
    <form method="get"
          action="/courses/cs081/2005_09/Assignments/Form_Script.sh">
      <fieldset>
      <legend>Checkboxes</legend>

        <label for="check1box-1" accesskey="C">
          Checkbox 1
        </label>
        <input  type="checkbox"
                tabindex="2"
                id="checkbox-1"
                name="checkbox-1"
                value="first checkbox"/>

        <label for="check1box-2">
          Checkbox 2
        </label>
        <input  type="checkbox"
                tabindex="3"
                id="checkbox-2"
                name="checkbox-2"
                value="second checkbox"/>

        <label for="check1box-3">
          Checkbox 3
        </label>
        <input  type="checkbox"
                tabindex="4"
                id="checkbox-3"
                name="checkbox-3"
                value="third checkbox"
                checked="checked"/>

        <label for="checkbox-4">
          Checkbox 4
        </label>
        <input  type="checkbox"
                tabindex="5"
                id="checkbox-4"
                name="checkbox-4"
                value="fourth checkbox"/>

      </fieldset>

      <fieldset>
      <legend>Radio Buttons</legend>

        <label for="radio-1" accesskey="R">First Radio Button
        </label>
        <input  type="radio"
                id="radio-1"
                name="radio set"
                tabindex="5"
                value="first radio button"/>

        <label for="radio-2">Second Radio Button
        </label>
        <input  type="radio"
                id="radio-2"
                name="radio set"
                tabindex="6"
                value="second radio button"
                checked="checked"/>

        <label for="radio-3">Third Radio Button
        </label>
        <input  type="radio"
                id="radio-3"
                name="radio set"
                tabindex="5"
                value="third radio button"/>

      </fieldset>

      <input type="text" tabindex="6" name="text" /><br />

      <textarea tabindex="7" name="text area" />

      <fieldset>
      <legend>Selection Lists</legend>

        <label for="single-group" tabindex="7" accesskey="S">
          Single Selection:
        </label>
        <select name="single selection" id="single-group">
          <option value="first single">First Single</option>
          <option value="second single" selected="selected">Second Single
          </option>
          <option value="third single">Third Single</option>
        </select>
        <br/>
        <label for="multiple-group" tabindex="8" accesskey="M">
          Multiple Selection:
        </label>
        <select name="multiple selection"
                id="multiple-group"
                multiple="multiple">
          <option value="first multiple">First Multiple</option>
          <option value="second multiple" selected="selected">Second Multiple
          </option>
          <option value="third multiple">Third Multiple</option>
        </select>

      </fieldset>
      <input type="submit" tabindex="1" accesskey="Q" title="Go!"/>
    </form>
  </div>

  <div id="footer">
    <p class="links">
      <a href="http://validator.w3.org/check?uri=referer">
      XHTML</a>
    </p>
  </div>
</body>
</html>

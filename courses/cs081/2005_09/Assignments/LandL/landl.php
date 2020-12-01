<?php

//  extractComments()
//  -------------------------------------------------------------------
/*    Creates a text file (.txt) containing all the comments in a .css
 *    file.  Checks modification time of .txt file to see if it really
 *    needs to be built.  Returns the contents of the text file as a
 *    string.
 *
 *      C. Vickery
 *      December 11, 2005
 */
  function extractComments($cssFileName)
  {
    //  The string that will be returned.
    $str = "";
    
    /*  Create the text file name by substituting .txt for .css in the
     *  name of the file name received as a parameter.   If the .css
     *  file was modified more recently than the .txt file or if the
     *  .txt file doesn't exist, create it.  Otherwise, just return its
     *  contents.
     */
    $txtFileName = ereg_replace("css$", "txt", $cssFileName);
    if (!file_exists("css/$txtFileName") ||
        (filemtime("css/$txtFileName") < filemtime("css/$cssFileName")) )
    {
      if (false === ($cssFile = fopen("css/$cssFileName", "r")))
      {
        die("Unable to read $cssFileName!");
      }
      if (false === ($txtFile = fopen("css/$txtFileName", "wb")))
      { 
        die("Unable to open $txtFileName for writing!");
      }
      $prevChar = '';
      $currState = 0;
      
      //  Extract comment text from the .css file.
      //  Implemented as a FSM with four states, 0-3.
      while (($currChar = fgetc($cssFile)) !== false)
      {
        switch( $currState )
        {
          case 0: // Looking for starting /
            if ($currChar == '/')
            {
              $currState = 1;
            }
            break;
            
          case 1: // Looking for starting *
            if ($currChar == '*')
            {
              $currState = 2;
            }
            else
            {
              $currState = 0;
            }
            break;
            
          case 2: // Looking for ending *
            if ($currChar == '*')
            {
              $currState = 3;
            }
            else
            {
              $str .= $currChar;
            }
            break;
            
          case 3: //  Looking for ending /
            if ($currChar == '/')
            {
              $currState = 0;
            }
            else
            {
              //  Hack: swallow internal asterisks.
              $currState = 2;
            }
            break;
        }
        $prevChar = $currChar;
      }
      
      //  Update the .txt file and return the string.
      if (false === fwrite($txtFile, $str))
      {
        die("Unable to write to $txtFileName");
      }
      fclose($txtFile);
      fclose($cssFile);
      return $str;
    }
    //  Return the contents of the text file.
    return file_get_contents("css/$txtFileName");
  }
?>

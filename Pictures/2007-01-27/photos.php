<?php

/*
 *  This PHP script generates Javascript arrays of file names for
 *  thumbnails, low-resolution, and high-resolution images.
 */
  //  Globals
  //  -----------------------------------------------------------------
  $num_images       = 0;
  $missing_images   = 0;
  $missing_thumbs   = 0;
  $file_names       = array();
  $hi_res_files     = array();
  $lo_res_files     = array();
  $thumb_files      = array();
  $text_info        = array();

  //  start_handler()
  //  -------------------------------------------------------------------
  /*
   *    When processing an XML file list, this function extracts the
   *    filename from the ITEM start tag.  The ID attribute supplies
   *    the actual file name.  If the xml file was generated by
   *    Adobe Bridge, the file name will will have a numeric date
   *    and sequence number appended to the file name, which this
   *    routine strips off and discards.
   */
  function start_handler($parser, $name, $attrs)
  {
    GLOBAL $file_names;
    if ($name =="ITEM")
    {
      $filename = $attrs["KEY"] or die("Item has no Key");
      $filename = preg_replace("/[0-9]*$/", "", $filename);
      //  Accept only file names ending in .jpg or .jpeg
      if (preg_match("/\.jpe?g$/i", $filename))
      {
        $file_names[] = $filename;
      }
    }
  }
//  end_handler()
//  -------------------------------------------------------------------
/*
 *    This is the end tag handler for XML files.  It does nothing.  In
 *    fact, the xml files generated by Adobe Bridge don't contain end
 *    tags; the start tags are self-closing.
 */
  function end_handler($parser, $name)
  {
  }
//  data_handler()
//  -------------------------------------------------------------------
/*
 *    This is the character data handler for XML files.  Adobe Bridge
 *    doesn't generate any character data, but (untested) code is
 *    included here to allow the ITEM tags to include a title string
 *    or other textual information inside ITEM tags.
 *    TODO: Associate text info strings with appropriate files only.
 */
  function data_handler($parser, $data)
  {
    GLOBAL $text_info;
    $text_info = $data;
  }


//  generateImageArrays()
//  -------------------------------------------------------------------
/*
 *    Generate three Javascript arrays for thumbnails, low-res, and
 *    hi-res files, and a Javascript variable, numImages.  Also
 *    generate values for global PHP variables missing_thumbs,
 *    missing_images, and num_images.
 *
 *    @param  isJavascript  If false, omit generating the javascript
 *    arrays; everything will be handled by php.
 */
  function generateImageArrays($isJavascript)
  {
    GLOBAL $file_names, $num_images, $missing_thumbs, $missing_images;

    //  Determine what type of file list, if any, is available for
    //  setting the sequence of displayed images.  If the list is
    //  an xml file, it must be in the format of a .BridgeSort file
    //  generated by Adobe Bridge, and may be named either
    //  .BridgeSort or image_list.xml.
    $isImageListXML = is_readable("image_list.xml");
    $isBridgeSort   = is_readable(".BridgeSort");
    $isImageList    = is_readable("image_list");
    $isImageListTXT = is_readable("image_list.txt");
    $xmlFile = $isImageListXML ? "image_list.xml" :
                                ($isBridgeSort ? ".BridgeSort" : null);
    if ($xmlFile != null)
    {
      //  Set up XML parser and process the xml file
      $parser = xml_parser_create();
      xml_set_element_handler($parser, "start_handler", "end_handler");
      xml_set_character_data_handler($parser, "data_handler");
      $fp = fopen($xmlFile, "r")
        or die ("Cannot open ".$xmlFile);
      while ($inBuf = fread($fp, 4096))
      {
        xml_parse($parser, $inBuf, feof($fp))
          or die (sprintf('XML Error: %s at line %d',
            xml_error_string(xml_get_error_code($parser)),
            xml_get_current_line_number($parser)));
      }
      xml_parser_free($parser);
    }
    else if ($isImageList or $isImageList.txt)
    {
      //  Process the simple text file list
      $txtFile = 'isImageList' ? 'image_list' : 'isImageList.txt';
      $base_file_names = file($txtFile);
      foreach ( $base_file_names as $basename )
      {
        //  Ignore lines that aren't image file names
        $basename = trim( $basename );
        $suffix_pos = strrpos( $basename, "." );
        if ( $suffix_pos )
        {
          $basename = substr($basename, 0, $suffix_pos);
        }
        if ( (strlen($basename) == 0) || 
              preg_match( "/#.*/", $basename) )
        {
          continue;
        }
        $file_names[] = $basename.".jpg";
      }
    }
    else
    {
      //  Last resort: use the names of the files in the Thumbs
      //  directory.
      if (is_readable("Thumbs"))
      {
        $dir = opendir( "Thumbs" );
        while ( $file = readdir($dir) )
        {
          /*  Filter thumbnail file names:
           *    To accept only jpeg images (.jpg .jpeg .JPG .JPEG),
           *    use the following if statement:
           *  if (preg_match("/\.jpe?g$/i", $file))
           *    To accept only png images, use the following one:
           *  if (preg_match("/\.png$/i", $file))
           */
          if (preg_match("/\.jpe?g$/i", $file))
          {
            $file_names[] = $file;
          }
        }
        closedir($dir);
      }
    }

    //  Populate lo_res_files[] and thumb_files[]
    //  only if both files in the set are readable.
    //  High resolution files are optional.

    GLOBAL $thumb_files, $lo_res_files, $hi_res_files;
    foreach ($file_names as $fn)
    {
      $thumb_file   = "Thumbs/".$fn;
      $lo_res_file = "Lo_Res/".$fn;
      $hi_res_file  = "Hi_Res/".$fn;
      if (is_readable($thumb_file) )
      {
        if (is_readable($lo_res_file))
        {
          $thumb_files[]    = $thumb_file;
          $lo_res_files[]  = $lo_res_file;
          $num_images++;
          $hi_res_files[]
             = is_readable($hi_res_file) ? $hi_res_file : "unavailable";
        }
        else
        {
          echo "Missing image: $lo_res_file\n";
          $missing_images++;
        }
      }
      else
      {
        echo "Missing thumbnail: $thumb_file\n";
        $missing_thumbs++;
      }
    }

    //  Make sure there are images -- otherwise the rest is pointless.
    if ( $num_images == 0 )
    {
      $lo_res_files[0] = "This Is Not A Picture!";  // For img tag src/alt
    }
    else
    {
      if ($isJavascript)
      {
        echo "<script type=\"text/javascript\">

        var numImages = $num_images;

        //  Lists of thumbs and images
        //  -----------------------------------------------------------
        /*  The display order for pictures will be established in one
         *  of three ways:
         *
         *    1.  If there is a file named \"image_list.xml\" present,
         *    the image names will be taken from there.  This file is
         *    assumed to be structured the same as the .BridgeSort
         *    file produced by Adobe CS2's \"Bridge\" program.
         *    Alternatively, if the file \"Lo_Res/.BridgeSort\"
         *    exists, it will be used instead.  2.  If alternative 1
         *    fails and a file named \"image_list\" or
         *    \"image_list.txt\" is present, it will be used.  It
         *    should be a text file containing a list of image file
         *    names, one per line.  Comment lines (which start with a
         *    '#') and blank lines are ignored.  File names may
         *    include an extension or not; \".jpg\" will be used if
         *    there is no extension.  3.  If no image_list is present,
         *    the list of image file names will consist of all file
         *    names that appear in both the Thumbs and Lo_Res
         *    directories in order determined by the operating system
         *    for listing them.
         *
         *    A check is made that both the low-resolution and
         *    thumbnail versions exist for all files.  High-resolution
         *    copies are optional.
         */

        //  Array of low-res image URLS (generated by php)
        //  ---------------------------------------------------------------
         var lowResURLs     = new Array(\n    ";
        //  Populate the JavaScript array of low-res image file names
        for ( $i = 0; $i < $num_images; $i++ )
        {
          print "\"$lo_res_files[$i]\"";
          if ( $i != ($num_images - 1) ) print ",";
          print ( (($i % 4) == 3) ? "\n    " : " " );
        }
        echo ");

        //  Array of hi-res image URLs (generated by php)
        //  ---------------------------------------------------------------
          var hiResURLs     = new Array(\n    ";
        //  Populate the JavaScript array of hi-res image file names
        for ( $i = 0; $i < $num_images; $i++ )
        {
          print "\"$hi_res_files[$i]\"";
          if ( $i != ($num_images - 1) ) print ",";
          print ( (($i % 4) == 3) ? "\n    " : " " );
        }
        echo ");

        //  Javascript array of thumbnail URLs (generated by php)
        //  ---------------------------------------------------------------
          var thumbURLs     = new Array(\n      ";
        //  Populate the JavaScript array of thumbnail image file names
        for ( $i = 0; $i < $num_images; $i++ )
        {
          print "\"$thumb_files[$i]\"";
          if ( $i != ($num_images - 1) ) print ",";
          print ( (($i % 4) == 3) ? "\n    " : " " );
        }
        echo ");\n";
        //  Close the script tag
        echo "</script>\n";
      }
    }
  }
?>

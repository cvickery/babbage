<?php
  $this_dir       = opendir('.');
  $this_link      = '';
  $this_year      = '';
  $this_term      = '';
  $this_notes     = '';
  while ($dir_entry = readdir($this_dir))
  {
    if (is_dir($dir_entry) && preg_match('/(\d{4})_(\d{2})/', $dir_entry, $year_term))
    {
      $this_year      = $year_term[1];
      $this_term      = ($year_term[2] === '02') ? 'Spring' : 'Fall';
      $this_link      = $dir_entry;
    }
  }
  header("Location: $this_link/syllabus.php");
  exit();
  ?>
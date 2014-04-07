<?php

$zip_file = 'enrollments.zip';
if (file_exists($zip_file))
{
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Length: " . filesize($zip_file) . ";");
  header("Content-Disposition: attachment; filename=$zip_file");
  header("Content-Type: application/zip");
  header("Content-Transfer-Encoding: UTF-8");
  readfile($zip_file);
  exit;
}
else
{
  die('Zip file not available');
}

?>

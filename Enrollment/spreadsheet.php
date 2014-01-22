<?php

$spreadsheet = 'enrollment.xlsx';
if (file_exists($spreadsheet))
{
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Length: " . filesize($spreadsheet) . ";");
  header("Content-Disposition: attachment; filename=$spreadsheet");
  header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; ");
  header("Content-Transfer-Encoding: UTF-8");
  readfile($spreadsheet);
  exit;
}
else
{
  die('Spreadsheet not available');
}

?>

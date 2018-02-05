<?php
require_once("Services/Twilio.php");

$valid_senders = array();
if ($file = file('./valid_senders', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES))
{
  foreach($file as $line)
  {
    if (substr($line, 0, 2) === '+1')
    {
      $valid_senders[substr($line, 0, 12)] = trim(substr($line, 13));
    }
  }
}
else
{
  error_log('sms: unable to open ./valid_senders');
}

if (isset($_POST['From']) && isset($_POST['Body']))
{
  $from = $_POST['From'];
  if (array_key_exists($from, $valid_senders))
  {
    $from .= ' (' . $valid_senders[$from] . ')';
  }
  $alert_msg  = "SMS from $from";
  $body_msg   = $_POST['Body'];
  $msg = $alert_msg . ' ' . $body_msg;
  if (strlen($msg > 140))
  {
    $msg = substr($msg, 0, 136) . ' ...';
  }
  $client = new Services_Twilio('ACc5146b2225441a0866c093e1eed457f0',
                                'aba808e8fbfa0d09e3c77ae3eda0024b');
  $sms = $client->account->sms_messages->create('+13472897949', '+17182883809', $msg);
  if (! mail('cvickery@qc.cuny.edu', 'SMS Received', "$alert_msg\n$body_msg",
      "From: SMS on Babbage <Christopher.Vickery@qc.cuny.edu>"))
  {
    error_log("Failed to send email about $alert_msg");
  }
}
else
{
  echo "<h1>This is not a web page</h1>";
}
?>

<?php
require_once("Services/Twilio.php");

if (isset($_POST['From']) && isset($_POST['Body']))
{
  $from       = $_POST['From'];
  $body_msg   = $_POST['Body'];
  $alert_msg  = "SMS from $from";
  $client = new Services_Twilio('ACc5146b2225441a0866c093e1eed457f0',
                                'aba808e8fbfa0d09e3c77ae3eda0024b');
  $sms = $client->account->sms_messages->create('+13472897949', '+17182883809', $alert_msg);
  $sms = $client->account->sms_messages->create('+13472897949', '+17182883809', $body_msg);
}
if (! mail('cvickery@gmail.com', 'SMS Received', "$alert_msg\n$body_msg",
    "From: SMS on Babbage <Christopher.Vickery@qc.cuny.edu>"))
{
  error_log("Failed to send email about $alert_msg");
}
?>

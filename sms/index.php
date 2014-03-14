<?php
require_once("Services/Twilio.php");

foeach $_POST as $key => $value
  error_log("$key => $value");

$client = new Services_Twilio('ACc5146b2225441a0866c093e1eed457f0',
                              'aba808e8fbfa0d09e3c77ae3eda0024b');
$sms = $client->account->sms_messages->create(
        '+13472897949', '+17182883809',
        'You goddit now');

?>

<?php

// PARAMETRI DA MODIFICARE
$WEBHOOK_URL = 'https://www.dropbox.com/scl/fi/qho52yebbrbvs2cpq3wbb/register.php?rlkey=6eq0qnp7pyt6vjsvbbimuqzm6&dl=0';
//$WEBHOOK_URL = 'https://imperatore.herokuapp.com/index.scala';
$BOT_TOKEN = '275479088:AAHM51o9M-UoYRDDFK5qGJvEVhwsP1YWSxA';

// NON APPORTARE MODIFICHE NEL CODICE SEGUENTE
$API_URL = 'https://api.telegram.org/bot' . $BOT_TOKEN .'/';
$method = 'setWebhook';
$parameters = array('url' => $WEBHOOK_URL);
$url = $API_URL . $method. '?' . http_build_query($parameters);
$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($handle, CURLOPT_TIMEOUT, 60);
$result = curl_exec($handle);
print_r($result);

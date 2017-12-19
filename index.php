<?php

include "config.php";
include "functions.php";
include "sends.php";
include "payload.php";

//comecar : variável de iniciar o bot
//avaliar : clicou em avaliar no menu
//pular : clicou em pular configurações

// verificar a senha
if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
$messageText = $input['entry'][0]['messaging'][0]['message']['text'];
$payload = $input['entry'][0]['messaging'][0]['postback']['payload'];

if(!empty($messageText))
{
  sendTextMessage($messageText, $senderId, $accessToken);
}

if(!empty($clicou))
{
  eventos($payload, $senderId, $accessToken);
}

?>

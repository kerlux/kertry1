<?php
// insert here your Bot API token
define("BOT_TOKEN", "292400786:AAEChnhpLUtYhOuFn2b4FOPkWbMpqiUqFpA");
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
$message = isset($update['message']) ? $update['message'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";

$text = trim($text);
$text = strtolower($text);
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ciao $firstname, benvenuto!";
  $parameters = array('chat_id' => $chatId, "text" => $response);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}
elseif($text cointains "pizz")
{
  $botUrl = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendPhoto";
  $postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("pizze.png")), 'caption' => $text);
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
  curl_setopt($ch, CURLOPT_URL, $botUrl); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
  // read curl response
  $output = curl_exec($ch);
}






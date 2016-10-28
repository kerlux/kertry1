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
$text = strtolower($text);

if(strpos($text, 'pizz') !== false)
{
  $botUrl = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendPhoto";
  $postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("1.jpg")), 'caption' => '1');
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
  curl_setopt($ch, CURLOPT_URL, $botUrl); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
  // read curl response
  $output = curl_exec($ch);

  $postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("2.jpg")), 'caption' => '2');
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
  curl_setopt($ch, CURLOPT_URL, $botUrl); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
  // read curl response
  $output = curl_exec($ch);

  $postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("3.jpg")), 'caption' => '3');
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
  curl_setopt($ch, CURLOPT_URL, $botUrl); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
  // read curl response
  $output = curl_exec($ch);
	
}
else{

  $response = "Comando non valido!";
  $parameters = array('chat_id' => $chatId, "text" => $response);
  $parameters["method"] = "sendMessage";
  echo json_encode($parameters);
}

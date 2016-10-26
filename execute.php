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

if($text contains "pizza")
{
$text = "ecco a te";
}
else
{
$text = "mmm";
}

  $botUrl = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendPhoto";
  $postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("pizze.png")), 'caption' => $text);
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
  curl_setopt($ch, CURLOPT_URL, $botUrl); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
  // read curl response
  $output = curl_exec($ch);







<?php

require_once("config.php");
$json = file_get_contents('php://input');
$tg = Telegram::getInstance($json);

$chatId = $tg->getChatId();
$text = $tg->getMessageText();

$cr = Core::getInstance();
$textHelper = $text;

switch ($text) {
    case "/start":
    case "Start":
        $cr->setStartMenu($chatId, $textHelper);
        break;

    default:
        $cr->setDefaultMessage($chatId, $textHelper);
        break;
}

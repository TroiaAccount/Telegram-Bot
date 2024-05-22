<?php

class Bot
{

    protected $token;
    private $url = "https://api.telegram.org/bot";
    protected $chat_id;

    public function __construct($token)
    {
        $this->token = $token;
    }

    private function sendQuery(array $data, $query = "sendMessage")
    {
        $ch = curl_init("$this->url$this->token/$query");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        return json_decode($response);
    }

    public function getChatId() {
        return $this->chat_id;
    }

    public function loadData($json_string)
    {
        $data = json_decode($json_string);
        if(isset($data->message)) {
            $this->chat_id = $data->message->chat->id;
        }
        if(isset($data->callback_query)) {
            $this->chat_id = $data->callback_query->message->chat->id;
        }
        return $data;
    }

    public function setWebhook($url)
    {
        return json_decode(file_get_contents("$this->url$this->token/setWebhook?url=$url"));
    }

    public function sendMessage($text, $chat_id = null, $button = null)
    {
        if ($chat_id == null) {
            $chat_id = $this->chat_id;
        }
        $data = ['text' => $text, 'chat_id' => $chat_id];

        if ($button != null) {
            $data['reply_markup'] = $this->getInlineKeyboard($button);
        }

        return $this->sendQuery($data);
    }

    public function getInlineKeyboard($buttons) {
        if (!is_array($buttons) || !is_array($buttons[0])) {
            $buttons = [$buttons];
        }
        $keyboard = ['inline_keyboard' => [$buttons]];
        return json_encode($keyboard);
    }


    public function sendPhoto($photo, $caption = null, $chat_id = null, $button = null)
    {
        if ($chat_id == null) {
            $chat_id = $this->chat_id;
        }

        $data = ['photo' => $photo, 'chat_id' => $chat_id, 'caption' => $caption];

        if ($button != null) {
            $data['reply_markup'] = $this->getInlineKeyboard($button);
        }

        return $this->sendQuery($data, 'sendPhoto');
    }

    public function sendVideo($video, $caption = null, $chat_id = null, $button = null) {
        if ($chat_id == null) {
            $chat_id = $this->chat_id;
        }
        $data = ['video' => $video, 'chat_id' => $chat_id, 'caption' => $caption];
        if ($button != null) {
            $data['reply_markup'] = $this->getInlineKeyboard($button);
        }
        return $this->sendQuery($data, 'sendVideo');
    }

}
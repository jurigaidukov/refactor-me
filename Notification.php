<?php

class Notification
{
    public $adminEmail;

    public function init($adminEmail) {
        assert(strlen($adminEmail) > 5);
        $this->adminEmail = $adminEmail;
    }

    public function sendMessageTo($app, $title, $message) {
        if (!empty($title) && !empty($message)) {
            if ($app == 'discord') {
                $dis = new DiscordApi;
                $discordChannel = 'https://discordapp.com/api/webhooks/xxx';
                $disc_message = '#'.$title.'# ' . strip_tags($message);
                $dis->sendMessage($discordChannel, $disc_message);
            } else {
                mail($this->adminEmail, $title, $message);
            }
        }
    }
}


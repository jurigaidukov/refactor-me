<?php
namespace JG\RefactorMe;
class Notification
{
    public $adminEmail;

    function init($adminEmail) {
        assert(strlen($adminEmail) > 5);
        $this->adminEmail = $adminEmail;
    }

    public function send_message_to($app, $title, $message) {
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

class DiscordApi
{
    public function sendMessage($discordChannel, $discordMessage) {
        // to be implemented later
    }
}

$not = new Notification;
$not->init('developers@example.com');
$not->send_message_to('email', 'my title', 'my message');

$not = new Notification;
$not->send_message_to('discord', 'my title', 'my message');

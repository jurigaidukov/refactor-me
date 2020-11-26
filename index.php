<?php
/**
 * Created by PhpStorm.
 * User: Home-pc
 * Date: 26.11.2020
 * Time: 19:19
 */

$not = new Notification;
$not->init('developers@example.com');
$not->sendMessageTo('email', 'my title', 'my message');

$not->sendMessageTo('discord', 'my title', 'my message');

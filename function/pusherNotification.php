<?php

require '../vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

// Replace with your Firebase project's credentials
$factory = (new Factory)->withServiceAccount('path/to/your/serviceAccountKey.json');

$messaging = $factory->createMessaging();

$notification = Notification::create('Title', 'Message')
    ->setClickAction('ACTION');

$message = CloudMessage::new()
    ->withNotification($notification)
    ->withData(['key' => 'value']) // Custom data payload
    ->withTarget('your_target_device_token');

$messaging->send($message);

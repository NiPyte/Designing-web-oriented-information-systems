<?php
include_once 'NotificationAdapters.php';

interface INotificationManager {
    public function sendNotification($type = '', $data);
}

class NotificationManager implements INotificationManager {

    public function sendNotification($type = '', $data) {
        switch($type){
            case "twitter":
                $notification = new TwitterAdapter();
                break;
            case "sms":
                $notification = new SmsAdapter();
                break;
            default:
                echo "Error: Unknown type\n";
                return false;
        }

        $notification->setData($data);
        $notification->sendNotification();
    }
}

echo "Task 8 Result\n";

$manager = new NotificationManager();

// Twitter Test
$tweetData = array("message" => "This is a tweet");
$manager->sendNotification("twitter", $tweetData);

echo "\n";

// SMS Test
$smsData = array("message" => "Hello user", "recipient" => "+380501112233");
$manager->sendNotification("sms", $smsData);

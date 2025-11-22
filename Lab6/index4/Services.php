<?php
class TwitterService
{
    public function setMessage($text) {
        echo "Twitter Service: Setting text -> '$text'\n";
    }

    public function sendTweet() {
        echo "Twitter Service: Tweet Sent!\n";
    }
}

// Added for Task 8
class SmsService
{
    private $recipient;
    private $msg;

    public function setRecipient($number) {
        $this->recipient = $number;
    }

    public function setMessage($text) {
        $this->msg = $text;
    }

    public function sendText() {
        echo "SMS Service: Sending '$this->msg' to {$this->recipient}\n";
    }
}
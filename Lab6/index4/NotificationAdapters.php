<?php
include_once 'Services.php';

interface NotificationInterface {
    public function setData($data);
    public function sendNotification();
}

class TwitterAdapter implements NotificationInterface
{
    protected $_data;

    public function setData($data){
        $this->_data = $data;
    }

    public function sendNotification() {
        $twitterClient = new TwitterService();
        // Adding time (Task 8 requirement)
        $msg = $this->_data['message'] . " [At: " . date('H:i') . "]";

        $twitterClient->setMessage($msg);
        $twitterClient->sendTweet();
    }
}

class SmsAdapter implements NotificationInterface
{
    protected $_data;

    public function setData($data){
        $this->_data = $data;
    }

    public function sendNotification() {
        $smsClient = new SmsService();
        $smsClient->setRecipient($this->_data['recipient']);

        // Adding time (Task 8 requirement)
        $msg = $this->_data['message'] . " [At: " . date('H:i') . "]";

        $smsClient->setMessage($msg);
        $smsClient->sendText();
    }
}
?>
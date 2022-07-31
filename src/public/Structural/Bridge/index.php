<?php
declare(strict_types=1);

interface message
{
    public function send($body);
}

class telegram implements message {
    public function send($body) {
        echo $body;
    }
}

interface deviceInterface
{
    public function setSender(message $sender);

    public function send($body);
}

abstract class device implements deviceInterface
{
    protected $sender;
    public function setSender(message $sender)
    {
        $this->sender = $sender;
    }
}

class phone extends device {

    public function send($body)
    {
        $this->sender->send($body . 'send by phone');
    }
}

class tablet extends device {

    public function send($body)
    {
        $this->sender->send($body . 'send by tablet');
    }
}


$phone = new phone();
$phone->setSender(new telegram());
$phone->send('hello ');


echo  "\n";
echo  "\n";
echo  "\n";
echo  "\n";


$tablet = new tablet();
$tablet->setSender(new telegram());
$tablet->send('hello ');
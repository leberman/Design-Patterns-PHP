<?php
declare(strict_types=1);

interface notification {
    public function compile($username);
}

class Sms implements notification {

    public function compile($username)
    {
        return $username;
    }
}

class Email implements notification {

    public function compile($username)
    {
        return $username;
    }
}

abstract class Notify {
    abstract public function createNotify();

    public function send($username)
    {
        $notif = $this->createNotify();
        //return just for demo
        return $notif->compile($username);
    }
}

class SmsNotify extends Notify {

    public function createNotify(): Sms
    {
        return new Sms();
    }
}

class EmailNotify extends Notify {

    public function createNotify(): Email
    {
        return new Email();
    }
}

$notify = new SmsNotify();
var_dump($notify->send('leberman'));


$notify2 = new EmailNotify();
var_dump($notify2->send('Hossein'));


<?php
declare(strict_types=1);

class DB {
    private string $dbname = 'blog';
    private string $dbhost = 'localhost';
    private string $dbuser = 'root';
    private string $dbpass = '123456';
    private $conn;
    private static $instace;

    private function __construct()
    {
        $this->conn = new PDO("mysql:host=127.0.0.1;dbname=blog",$this->dbuser,$this->dbpass);
    }

    public static function getInstance(): DB
    {
        if (is_null(self::$instace)) {
            self::$instace = new DB();
        }
        return self::$instace;
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }
}


$connect = DB::getInstance();
var_dump($connect->getConnection());

$connect1 = DB::getInstance();
var_dump($connect1->getConnection());

$connect2 = DB::getInstance();
var_dump($connect2->getConnection());

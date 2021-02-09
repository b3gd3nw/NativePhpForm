<?php

namespace app\core;

//use PDO;

class DBController
{
    private static $pdo;
    private $connection;
    private $conf;

    public function __construct()
    {
        $conf = __DIR__.'/../config/database_config.php';

        $this->pdo = new PDO(
            $conf['connection'].";dbname=".$conf['name'],
            $conf['username'],
            $conf['password'],
            $conf['options']);

        return $this->pdo;
    }

    public static function connect()
    {
        if (self::$pdo === null) {
            self::$pdo = new self();
        }

        return self::$pdo;
    }

}

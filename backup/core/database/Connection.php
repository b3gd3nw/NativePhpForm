<?php

class Connection {

    //connect to database
//    private const DB_CHARSET = 'utf8';
//    private const DB_HOST = 'localhost';
//    private const DB_USER = 'k0tk4';
//    private const DB_PASSWORD = '/Bb20011975';
//    private const DB_NAME = 'test_db';
//    private const DB_TABLE = 'Users';

//    public $error = "";
//    private $pdo = null;
//   private $stmt = null;


    public static function make($config)
    {
        try {
//            return new PDO(
//                "mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME.";charset=".self::DB_CHARSET,self::DB_USER,self::DB_PASSWORD, [
//                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//                ]
//
//
//            );
            return new PDO(

                $config['connection'].";dbname=".$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (Exception $ex) { die($ex->getMessage()); }
    }
}


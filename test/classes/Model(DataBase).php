<?php



class DataBase{
    //connect to database
    private const DB_CHARSET = 'utf8';
    private const DB_HOST = 'localhost';
    private const DB_USER = 'k0tk4';
    private const DB_PASSWORD = '/Bb20011975';
    private const DB_NAME = 'test_db';
    private const DB_TABLE = 'Users';

    public $error = "";
    private $pdo = null;
    private $stmt = null;

    private $connection;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
              "mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME.";charset=".self::DB_CHARSET,self::DB_USER,self::DB_PASSWORD, [
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (Exception $ex) { die($ex->getMessage()); }
//        $this->connectToDB();
    }

    //close connecton
    public function __destruct()
    {
        if ($this->stmt!==null) { $this->stmt = null; }
        if ($this->pdo!==null) { $this->pdo = null; }
    }

    public function addToDB()
    {
        $result = false;
        try {
//            $fname = $_POST['first_name'];
//            $lname = $_POST['last_name'];
            $this->stmt = $this->pdo->exec("INSERT INTO Users (first_name, last_name) VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[birthdate]','$_POST[report_subject]','$_POST[country]','$_POST[phone_number]','$_POST[emile]')");
            return $fname;
        } catch ( Exception $ex ) {
            $this->error = $ex->getMessage();
            return false;
        }

    }
//    private function connectToDB()
//    {
//        $this->connection =  new  mysqli(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME, self::DB_TABLE);
//    }
}

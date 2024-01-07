<?php
use PDO;
use PDOException;

class Database{
    private $conn;
    private static $instance = null;

    private function __construct(){
        $this->connect();
    }

    public function connect(){
        $dsn = "mysql:host=localhost;dbname=wiki™";
        try {
            $this->conn = new PDO($dsn, "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Failed to connect : " . $e->getMessage();
        }
    }

    public static function getInstance(){
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

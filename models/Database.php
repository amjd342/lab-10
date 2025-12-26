<?php
// Student ID: 2135XXXX
// Name: Rayan [Your Last Name]

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "cpit405_project";
    private $conn;
    
    public function __construct() {
        $this->connect();
    }
    
    private function connect() {
        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        $this->conn->set_charset("utf8mb4");
    }
    
    public function getConnection() {
        return $this->conn;
    }
    
    public function close() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
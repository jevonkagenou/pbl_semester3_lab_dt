<?php

class Database {
    private $host = "localhost";
    private $port = "5433";
    private $db_name = "db_lab_dt_remake";
    private $username = "postgres";
    private $password = "PWDpwd";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}

$database = new Database();
$db = $database->getConnection();
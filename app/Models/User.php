<?php

require_once 'config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getByUsername($username) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM public.users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
<?php
namespace App\Models;

use PDO;

class Member {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new \Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM member ORDER BY idmember DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStats() {
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN statusmember = 'active' THEN 1 ELSE 0 END) as active,
                    SUM(CASE WHEN statusmember = 'inactive' THEN 1 ELSE 0 END) as inactive
                FROM member";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByNip($nip) {
        $stmt = $this->db->prepare("SELECT * FROM member WHERE nip = :nip");
        $stmt->execute([':nip' => $nip]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM member WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO member (nip, namamember, gelar, email, bidangriset, fotoprofil, statusmember) 
                VALUES (:nip, :namamember, :gelar, :email, :bidangriset, :fotoprofil, :statusmember)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nip' => $data['nip'],
            ':namamember' => $data['namamember'],
            ':gelar' => $data['gelar'],
            ':email' => $data['email'],
            ':bidangriset' => $data['bidangriset'],
            ':fotoprofil' => $data['fotoprofil'],
            ':statusmember' => $data['statusmember']
        ]);
    }

    public function update($data) {
        $query = "UPDATE member SET 
                    nip = :nip, 
                    namamember = :namamember, 
                    gelar = :gelar, 
                    email = :email, 
                    bidangriset = :bidangriset, 
                    fotoprofil = :fotoprofil, 
                    statusmember = :statusmember 
                WHERE idmember = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nip' => $data['nip'],
            ':namamember' => $data['namamember'],
            ':gelar' => $data['gelar'],
            ':email' => $data['email'],
            ':bidangriset' => $data['bidangriset'],
            ':fotoprofil' => $data['fotoprofil'],
            ':statusmember' => $data['statusmember'],
            ':id' => $data['id']
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM member WHERE idmember = :id");
        return $stmt->execute([':id' => $id]);
    }
}
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
        $stmt = $this->db->prepare("SELECT * FROM member ORDER BY created_at DESC");
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

    public function getByName($nama) {
        $stmt = $this->db->prepare("SELECT * FROM member WHERE namamember = :nama");
        $stmt->execute([':nama' => $nama]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByNip($nip) {
        $stmt = $this->db->prepare("SELECT * FROM member WHERE nip = :nip");
        $stmt->execute([':nip' => $nip]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM member WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getKepalaLab() {
        $stmt = $this->db->prepare("SELECT * FROM member WHERE jabatan = 'Kepala Lab' LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO member (nip, namamember, gelar, email, bidangriset, jabatan, link_sinta, fotoprofil, statusmember, created_at) 
                  VALUES (:nip, :nama, :gelar, :email, :bidang, :jabatan, :sinta, :foto, :status, NOW())";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nip' => $data['nip'],
            ':nama' => $data['namamember'],
            ':gelar' => $data['gelar'],
            ':email' => $data['email'],
            ':bidang' => $data['bidangriset'],
            ':jabatan' => $data['jabatan'],    
            ':sinta' => $data['link_sinta'],    
            ':foto' => $data['fotoprofil'],
            ':status' => $data['statusmember']
        ]);
    }

    public function update($data) {
        $query = "UPDATE member SET 
                    nip = :nip,
                    namamember = :nama,
                    gelar = :gelar,
                    email = :email,
                    bidangriset = :bidang,
                    jabatan = :jabatan,          
                    link_sinta = :sinta,       
                    fotoprofil = :foto,
                    statusmember = :status,
                    updated_at = NOW()
                  WHERE idmember = :id";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':nip' => $data['nip'],
            ':nama' => $data['namamember'],
            ':gelar' => $data['gelar'],
            ':email' => $data['email'],
            ':bidang' => $data['bidangriset'],
            ':jabatan' => $data['jabatan'],    
            ':sinta' => $data['link_sinta'],     
            ':foto' => $data['fotoprofil'],
            ':status' => $data['statusmember'],
            ':id' => $data['id']
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM member WHERE idmember = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function countAll() {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM member WHERE statusmember = 'active'");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
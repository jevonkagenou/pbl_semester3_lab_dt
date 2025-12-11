<?php
namespace App\Models;

use PDO;
use PDOException;

class Komentar {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new \Database();
        $this->db = $database->getConnection();
    }

    public function getByBeritaId($idBerita) {
        $query = "SELECT * FROM komentar WHERE idberita = :idberita ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':idberita' => $idBerita]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countByBeritaId($idBerita) {
        $query = "SELECT COUNT(*) FROM komentar WHERE idberita = :idberita";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':idberita' => $idBerita]);
        return $stmt->fetchColumn();
    }

    public function create($data) {
        try {
            $query = "INSERT INTO komentar (idberita, namakomentator, email, komentar, created_at) 
                      VALUES (:idberita, :nama, :email, :komentar, NOW())";
            
            $stmt = $this->db->prepare($query);
            return $stmt->execute([
                ':idberita' => $data['idberita'],
                ':nama'     => $data['nama'],
                ':email'    => $data['email'],
                ':komentar' => $data['komentar']
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
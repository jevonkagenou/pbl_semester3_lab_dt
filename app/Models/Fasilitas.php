<?php
namespace App\Models;

use PDO;

class Fasilitas {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new \Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM fasilitas ORDER BY idfasilitas DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStats() {
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(jumlah) as total_jumlah
                FROM fasilitas";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM fasilitas WHERE idfasilitas = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByName($namafasilitas) {
        $stmt = $this->db->prepare("SELECT * FROM fasilitas WHERE namafasilitas = :namafasilitas");
        $stmt->execute([':namafasilitas' => $namafasilitas]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO fasilitas (namafasilitas, jumlah, deskripsi, foto) 
                VALUES (:namafasilitas, :jumlah, :deskripsi, :foto)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':namafasilitas' => $data['namafasilitas'],
            ':jumlah' => $data['jumlah'],
            ':deskripsi' => $data['deskripsi'],
            ':foto' => $data['foto']
        ]);
    }

    public function update($data) {
        $query = "UPDATE fasilitas SET 
                    namafasilitas = :namafasilitas, 
                    jumlah = :jumlah, 
                    deskripsi = :deskripsi, 
                    foto = :foto 
                WHERE idfasilitas = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':namafasilitas' => $data['namafasilitas'],
            ':jumlah' => $data['jumlah'],
            ':deskripsi' => $data['deskripsi'],
            ':foto' => $data['foto'],
            ':id' => $data['id']
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM fasilitas WHERE idfasilitas = :id");
        return $stmt->execute([':id' => $id]);
    }
}
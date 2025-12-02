<?php
namespace App\Models;

use PDO;

class Kategori {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new \Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM kategori ORDER BY idkategori DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByName($name) {
        $stmt = $this->db->prepare("SELECT * FROM kategori WHERE namakategori = :namakategori");
        $stmt->execute([':namakategori' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO kategori (namakategori) VALUES (:namakategori)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':namakategori' => $data['namakategori']]);
    }

    public function update($data) {
        $query = "UPDATE kategori SET namakategori = :namakategori WHERE idkategori = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':namakategori' => $data['namakategori'],
            ':id'           => $data['id']
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM kategori WHERE idkategori = :id");
        return $stmt->execute([':id' => $id]);
    }
}
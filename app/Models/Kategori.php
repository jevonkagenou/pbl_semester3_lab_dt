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

    private function getTable($type) {
        return ($type === 'publikasi') ? 'kategori_publikasi' : 'kategori_berita';
    }

    public function getAll($type) {
        $table = $this->getTable($type);
        $stmt = $this->db->prepare("SELECT * FROM $table ORDER BY idkategori DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByName($type, $name) {
        $table = $this->getTable($type);
        $stmt = $this->db->prepare("SELECT * FROM $table WHERE namakategori = :namakategori");
        $stmt->execute([':namakategori' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($type, $data) {
        $table = $this->getTable($type);
        $query = "INSERT INTO $table (namakategori) VALUES (:namakategori)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':namakategori' => $data['namakategori']]);
    }

    public function update($type, $data) {
        $table = $this->getTable($type);
        $query = "UPDATE $table SET namakategori = :namakategori WHERE idkategori = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':namakategori' => $data['namakategori'],
            ':id'           => $data['id']
        ]);
    }

    public function delete($type, $id) {
        $table = $this->getTable($type);
        $stmt = $this->db->prepare("DELETE FROM $table WHERE idkategori = :id");
        return $stmt->execute([':id' => $id]);
    }
}
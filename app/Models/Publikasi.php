<?php
namespace App\Models;

use PDO;

class Publikasi {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new \Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT p.*, 
                         m.namamember, 
                         k.namakategori 
                  FROM publikasi p
                  LEFT JOIN member m ON p.penulis = m.idmember
                  LEFT JOIN kategori k ON p.kategori = k.idkategori
                  ORDER BY p.idpublikasi DESC";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStats() {
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status_publikasi = 'terima' THEN 1 ELSE 0 END) as terima,
                    SUM(CASE WHEN status_publikasi = 'tolak' THEN 1 ELSE 0 END) as tolak,
                    SUM(CASE WHEN status_publikasi = 'pending' THEN 1 ELSE 0 END) as pending
                  FROM publikasi";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM publikasi WHERE idpublikasi = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByJudul($judul) {
        $stmt = $this->db->prepare("SELECT * FROM publikasi WHERE judulpublikasi = :judul");
        $stmt->execute([':judul' => $judul]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO publikasi (judulpublikasi, tahunterbit, penulis, kategori, ringkasan, linkfile, status_publikasi) 
                  VALUES (:judul, :tahun, :penulis, :kategori, :ringkasan, :link, 'pending')";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':judul' => $data['judulpublikasi'],
            ':tahun' => $data['tahunterbit'],
            ':penulis' => $data['penulis'],
            ':kategori' => $data['kategori'],
            ':ringkasan' => $data['ringkasan'],
            ':link' => $data['linkfile']
        ]);
    }

    public function update($data) {
        $query = "UPDATE publikasi SET 
                    judulpublikasi = :judul, 
                    tahunterbit = :tahun, 
                    penulis = :penulis, 
                    kategori = :kategori, 
                    ringkasan = :ringkasan, 
                    linkfile = :link,
                    status_publikasi = 'pending',
                    pesan_admin = NULL 
                  WHERE idpublikasi = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':judul' => $data['judulpublikasi'],
            ':tahun' => $data['tahunterbit'],
            ':penulis' => $data['penulis'],
            ':kategori' => $data['kategori'],
            ':ringkasan' => $data['ringkasan'],
            ':link' => $data['linkfile'],
            ':id' => $data['id']
        ]);
    }

    public function changeStatus($id, $status, $pesan = null) {
        if (!in_array($status, ['pending', 'terima', 'tolak'])) {
            return false;
        }

        $query = "UPDATE publikasi SET status_publikasi = :status, pesan_admin = :pesan WHERE idpublikasi = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':status' => $status, 
            ':pesan' => $pesan, 
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM publikasi WHERE idpublikasi = :id");
        return $stmt->execute([':id' => $id]);
    }
}
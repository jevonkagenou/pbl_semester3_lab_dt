<?php
namespace App\Models;

use PDO;

class Berita {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new \Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT b.*, 
                         m.namamember as jurnalis_nama,
                         m.fotoprofil as jurnalis_foto
                  FROM berita b
                  LEFT JOIN member m ON b.jurnalis = m.idmember
                  ORDER BY b.created_at DESC";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT b.*, 
                         m.namamember as jurnalis_nama,
                         m.fotoprofil as jurnalis_foto
                  FROM berita b
                  LEFT JOIN member m ON b.jurnalis = m.idmember
                  WHERE b.idberita = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByJudul($judul) {
        $stmt = $this->db->prepare("SELECT * FROM berita WHERE judulberita = :judul");
        $stmt->execute([':judul' => $judul]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getStats() {
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status_berita = 'terima' THEN 1 ELSE 0 END) as terima,
                    SUM(CASE WHEN status_berita = 'tolak' THEN 1 ELSE 0 END) as tolak,
                    SUM(CASE WHEN status_berita = 'pending' THEN 1 ELSE 0 END) as pending
                  FROM berita";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByJurnalis($jurnalisId) {
        $query = "SELECT b.*, 
                         m.namamember as jurnalis_nama
                  FROM berita b
                  LEFT JOIN member m ON b.jurnalis = m.idmember
                  WHERE b.jurnalis = :jurnalis
                  ORDER BY b.created_at DESC";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([':jurnalis' => $jurnalisId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO berita (judulberita, isi, jurnalis, fotodokumentasi, status_berita, upload_at) 
                  VALUES (:judul, :isi, :jurnalis, :foto, 'pending', NOW())";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':judul' => $data['judulberita'],
            ':isi' => $data['isi'],
            ':jurnalis' => $data['jurnalis'],
            ':foto' => $data['fotodokumentasi']
        ]);
    }

    public function update($data) {
        $query = "UPDATE berita SET 
                    judulberita = :judul,
                    isi = :isi,
                    jurnalis = :jurnalis,
                    fotodokumentasi = :foto,
                    status_berita = 'pending',
                    pesan_admin = NULL,
                    updated_at = NOW()
                  WHERE idberita = :id";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':judul' => $data['judulberita'],
            ':isi' => $data['isi'],
            ':jurnalis' => $data['jurnalis'],
            ':foto' => $data['fotodokumentasi'],
            ':id' => $data['id']
        ]);
    }

    public function changeStatus($id, $status, $pesan = null) {
        if (!in_array($status, ['pending', 'terima', 'tolak'])) {
            return false;
        }

        $query = "UPDATE berita SET 
                    status_berita = :status, 
                    pesan_admin = :pesan,
                    updated_at = NOW()
                  WHERE idberita = :id";
        
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':status' => $status,
            ':pesan' => $pesan,
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM berita WHERE idberita = :id");
        return $stmt->execute([':id' => $id]);
    }
}
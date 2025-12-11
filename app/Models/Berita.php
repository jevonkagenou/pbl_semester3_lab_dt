<?php
namespace App\Models;

use PDO;
use PDOException;

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
                        u.username as creator_name,
                        STRING_AGG(k.namakategori, ', ') as namakategori,
                        STRING_AGG(pb.idkategori::text, ',') as kategori_ids 
                FROM berita b
                LEFT JOIN member m ON b.jurnalis = m.idmember
                LEFT JOIN users u ON b.created_by = u.id
                LEFT JOIN pivot_berita pb ON b.idberita = pb.idberita
                LEFT JOIN kategori_berita k ON pb.idkategori = k.idkategori
                GROUP BY b.idberita, m.namamember, u.username
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

    public function create($data) {
        try {
            $this->db->beginTransaction();

            $query = "INSERT INTO berita (judulberita, isi, jurnalis, fotodokumentasi, status_berita, created_by, upload_at) 
                    VALUES (:judul, :isi, :jurnalis, :foto, 'pending', :created_by, NOW()) 
                    RETURNING idberita";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':judul' => $data['judulberita'],
                ':isi' => $data['isi'],
                ':jurnalis' => $data['jurnalis'],
                ':foto' => $data['fotodokumentasi'],
                ':created_by' => $data['created_by'] 
            ]);

            $idBerita = $stmt->fetchColumn(); 

            if (!empty($data['kategori']) && is_array($data['kategori'])) {
                $queryPivot = "INSERT INTO pivot_berita (idberita, idkategori) VALUES (:idberita, :idkategori)";
                $stmtPivot = $this->db->prepare($queryPivot);

                foreach ($data['kategori'] as $idKategori) {
                    $stmtPivot->execute([
                        ':idberita' => $idBerita,
                        ':idkategori' => $idKategori
                    ]);
                }
            }

            $this->db->commit(); 
            return true;

        } catch (\Exception $e) {
            $this->db->rollBack(); 
            error_log($e->getMessage()); 
            return false;
        }
    }

    public function update($data) {
        try {
            $this->db->beginTransaction();

            $query = "UPDATE berita SET 
                        judulberita = :judul, isi = :isi, jurnalis = :jurnalis, 
                        fotodokumentasi = :foto, status_berita = 'pending', updated_at = NOW()
                    WHERE idberita = :id";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':judul' => $data['judulberita'],
                ':isi' => $data['isi'],
                ':jurnalis' => $data['jurnalis'],
                ':foto' => $data['fotodokumentasi'],
                ':id' => $data['id']
            ]);

            $stmtDel = $this->db->prepare("DELETE FROM pivot_berita WHERE idberita = :id");
            $stmtDel->execute([':id' => $data['id']]);

            if (!empty($data['kategori']) && is_array($data['kategori'])) {
                $queryPivot = "INSERT INTO pivot_berita (idberita, idkategori) VALUES (:idberita, :idkategori)";
                $stmtPivot = $this->db->prepare($queryPivot);
                foreach ($data['kategori'] as $idKategori) {
                    $stmtPivot->execute([':idberita' => $data['id'], ':idkategori' => $idKategori]);
                }
            }

            $this->db->commit();
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function changeStatus($id, $status, $pesan = null) {
        if (!in_array($status, ['pending', 'terima', 'tolak'])) { return false; }

        $query = "UPDATE berita SET status_berita = :status, pesan_admin = :pesan, updated_at = NOW() WHERE idberita = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':status' => $status, ':pesan' => $pesan, ':id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM berita WHERE idberita = :id");
        return $stmt->execute([':id' => $id]);
    }
}
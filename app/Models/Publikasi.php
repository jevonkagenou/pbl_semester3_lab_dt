<?php
namespace App\Models;

use PDO;
use Exception;

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
                        STRING_AGG(k.namakategori, ', ') as namakategori,
                        STRING_AGG(pp.idkategori::text, ',') as kategori_ids 
                FROM publikasi p
                LEFT JOIN member m ON p.penulis = m.idmember
                LEFT JOIN pivot_publikasi pp ON p.idpublikasi = pp.idpublikasi
                LEFT JOIN kategori_publikasi k ON pp.idkategori = k.idkategori
                GROUP BY p.idpublikasi, m.namamember
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
        $query = "SELECT p.*, 
                         STRING_AGG(pp.idkategori::text, ',') as kategori_ids
                  FROM publikasi p
                  LEFT JOIN pivot_publikasi pp ON p.idpublikasi = pp.idpublikasi
                  WHERE p.idpublikasi = :id
                  GROUP BY p.idpublikasi";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByJudul($judul) {
        $stmt = $this->db->prepare("SELECT * FROM publikasi WHERE judulpublikasi = :judul");
        $stmt->execute([':judul' => $judul]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        try {
            $this->db->beginTransaction();

            $query = "INSERT INTO publikasi (judulpublikasi, tahunterbit, penulis, ringkasan, linkfile, status_publikasi, created_at) 
                      VALUES (:judul, :tahun, :penulis, :ringkasan, :link, 'pending', NOW())
                      RETURNING idpublikasi";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':judul' => $data['judulpublikasi'],
                ':tahun' => $data['tahunterbit'],
                ':penulis' => $data['penulis'],
                ':ringkasan' => $data['ringkasan'],
                ':link' => $data['linkfile']
            ]);

            $idPublikasi = $stmt->fetchColumn(); 

            if (!empty($data['kategori']) && is_array($data['kategori'])) {
                $queryPivot = "INSERT INTO pivot_publikasi (idpublikasi, idkategori) VALUES (:idpublikasi, :idkategori)";
                $stmtPivot = $this->db->prepare($queryPivot);

                foreach ($data['kategori'] as $idKategori) {
                    $stmtPivot->execute([
                        ':idpublikasi' => $idPublikasi,
                        ':idkategori' => $idKategori
                    ]);
                }
            }

            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }

    public function update($data) {
        try {
            $this->db->beginTransaction();

            $query = "UPDATE publikasi SET 
                        judulpublikasi = :judul, 
                        tahunterbit = :tahun, 
                        penulis = :penulis, 
                        ringkasan = :ringkasan, 
                        linkfile = :link,
                        status_publikasi = 'pending',
                        pesan_admin = NULL,
                        updated_at = NOW()
                    WHERE idpublikasi = :id";
            
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':judul' => $data['judulpublikasi'],
                ':tahun' => $data['tahunterbit'],
                ':penulis' => $data['penulis'],
                ':ringkasan' => $data['ringkasan'],
                ':link' => $data['linkfile'],
                ':id' => $data['id']
            ]);

            $stmtDel = $this->db->prepare("DELETE FROM pivot_publikasi WHERE idpublikasi = :id");
            $stmtDel->execute([':id' => $data['id']]);

            if (!empty($data['kategori']) && is_array($data['kategori'])) {
                $queryPivot = "INSERT INTO pivot_publikasi (idpublikasi, idkategori) VALUES (:idpublikasi, :idkategori)";
                $stmtPivot = $this->db->prepare($queryPivot);

                foreach ($data['kategori'] as $idKategori) {
                    $stmtPivot->execute([
                        ':idpublikasi' => $data['id'],
                        ':idkategori' => $idKategori
                    ]);
                }
            }

            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function changeStatus($id, $status, $pesan = null) {
        if (!in_array($status, ['pending', 'terima', 'tolak'])) {
            return false;
        }

        $query = "UPDATE publikasi SET status_publikasi = :status, pesan_admin = :pesan, updated_at = NOW() WHERE idpublikasi = :id";
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
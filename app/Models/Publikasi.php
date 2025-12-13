<?php
namespace App\Models;

use PDO;
use PDOException;

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
                         u.username as creator_name,
                         STRING_AGG(kp.namakategori, ', ') as namakategori,
                         STRING_AGG(kp.idkategori::text, ',') as kategori_ids
                  FROM publikasi p
                  LEFT JOIN member m ON p.penulis = m.idmember
                  LEFT JOIN users u ON p.created_by = u.id
                  LEFT JOIN pivot_publikasi pp ON p.idpublikasi = pp.idpublikasi
                  LEFT JOIN kategori_publikasi kp ON pp.idkategori = kp.idkategori
                  GROUP BY p.idpublikasi, m.namamember, u.username
                  ORDER BY p.created_at DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCreator($userId) {
        $query = "SELECT p.*, 
                         m.namamember, 
                         u.username as creator_name,
                         STRING_AGG(kp.namakategori, ', ') as namakategori,
                         STRING_AGG(kp.idkategori::text, ',') as kategori_ids
                  FROM publikasi p
                  LEFT JOIN member m ON p.penulis = m.idmember
                  LEFT JOIN users u ON p.created_by = u.id
                  LEFT JOIN pivot_publikasi pp ON p.idpublikasi = pp.idpublikasi
                  LEFT JOIN kategori_publikasi kp ON pp.idkategori = kp.idkategori
                  WHERE p.created_by = :id
                  GROUP BY p.idpublikasi, m.namamember, u.username
                  ORDER BY p.created_at DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $userId]);
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

    public function getStatsByCreator($userId) {
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status_publikasi = 'terima' THEN 1 ELSE 0 END) as terima,
                    SUM(CASE WHEN status_publikasi = 'tolak' THEN 1 ELSE 0 END) as tolak,
                    SUM(CASE WHEN status_publikasi = 'pending' THEN 1 ELSE 0 END) as pending
                  FROM publikasi
                  WHERE created_by = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getApprovedThisMonth() {
        $query = "SELECT COUNT(*) FROM publikasi 
                  WHERE status_publikasi = 'terima' 
                  AND TO_CHAR(updated_at, 'YYYY-MM') = TO_CHAR(CURRENT_DATE, 'YYYY-MM')";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getByJudul($judul) {
        $stmt = $this->db->prepare("SELECT * FROM publikasi WHERE judulpublikasi = :judul");
        $stmt->execute([':judul' => $judul]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        try {
            $this->db->beginTransaction();

            $query = "INSERT INTO publikasi (judulpublikasi, tahunterbit, penulis, ringkasan, linkfile, status_publikasi, created_by, created_at) 
                      VALUES (:judul, :tahun, :penulis, :ringkasan, :link, 'pending', :created_by, NOW())
                      RETURNING idpublikasi"; 

            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':judul' => $data['judulpublikasi'],
                ':tahun' => $data['tahunterbit'],
                ':penulis' => $data['penulis'],
                ':ringkasan' => $data['ringkasan'],
                ':link' => $data['linkfile'],
                ':created_by' => $data['created_by'] 
            ]);
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $newId = $result['idpublikasi'];

            if (!empty($data['kategori']) && is_array($data['kategori'])) {
                $pivotQuery = "INSERT INTO pivot_publikasi (idpublikasi, idkategori) VALUES (:pid, :kid)";
                $pivotStmt = $this->db->prepare($pivotQuery);
                
                foreach ($data['kategori'] as $kategoriId) {
                    $pivotStmt->execute([
                        ':pid' => $newId,
                        ':kid' => $kategoriId
                    ]);
                }
            }

            $this->db->commit();
            return true;

        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function update($data) {
        try {
            $this->db->beginTransaction();

            $query = "UPDATE publikasi 
                      SET judulpublikasi = :judul, 
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

            $deletePivot = $this->db->prepare("DELETE FROM pivot_publikasi WHERE idpublikasi = :id");
            $deletePivot->execute([':id' => $data['id']]);

            if (!empty($data['kategori']) && is_array($data['kategori'])) {
                $pivotQuery = "INSERT INTO pivot_publikasi (idpublikasi, idkategori) VALUES (:pid, :kid)";
                $pivotStmt = $this->db->prepare($pivotQuery);
                
                foreach ($data['kategori'] as $kategoriId) {
                    $pivotStmt->execute([
                        ':pid' => $data['id'],
                        ':kid' => $kategoriId
                    ]);
                }
            }

            $this->db->commit();
            return true;

        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function changeStatus($id, $status, $pesan = null) {
        $query = "UPDATE publikasi SET status_publikasi = :status, pesan_admin = :pesan, updated_at = NOW() WHERE idpublikasi = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':status' => $status,
            ':pesan' => $pesan,
            ':id' => $id
        ]);
    }

    public function getTotalApproved() {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM publikasi WHERE status_publikasi = 'terima'");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getMonthlyStats($year) {
        $query = "SELECT 
                    EXTRACT(MONTH FROM updated_at) as month, 
                    COUNT(*) as total 
                FROM publikasi 
                WHERE status_publikasi = 'terima' 
                AND EXTRACT(YEAR FROM updated_at) = :year
                GROUP BY month";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([':year' => $year]);
        return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    }

    public function delete($id) {
        try {
            $this->db->beginTransaction();
            $stmt1 = $this->db->prepare("DELETE FROM pivot_publikasi WHERE idpublikasi = :id");
            $stmt1->execute([':id' => $id]);

            $stmt2 = $this->db->prepare("DELETE FROM publikasi WHERE idpublikasi = :id");
            $stmt2->execute([':id' => $id]);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function getMonthlyStatsByCreator($userId, $year) {
        $query = "SELECT 
                    EXTRACT(MONTH FROM updated_at) as month, 
                    COUNT(*) as total 
                FROM publikasi 
                WHERE status_publikasi = 'terima' 
                AND created_by = :id
                AND EXTRACT(YEAR FROM updated_at) = :year
                GROUP BY month";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $userId, ':year' => $year]);
        return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    }
}
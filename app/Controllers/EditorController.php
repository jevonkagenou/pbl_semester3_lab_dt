<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../../core/AuthMiddleware.php';
require_once __DIR__ . '/../Models/Publikasi.php';
require_once __DIR__ . '/../Models/Kategori.php';
require_once __DIR__ . '/../Models/Member.php';

use App\Models\Publikasi;
use App\Models\Kategori;
use App\Models\Member;

class EditorController {
    private $publikasiModel;
    private $kategoriModel;
    private $memberModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $this->publikasiModel = new Publikasi();
        $this->kategoriModel = new Kategori();
        $this->memberModel = new Member();
    }

    public function index() {
        $this->publikasi();
    }

    public function publikasi() {
        $dataPublikasi = $this->publikasiModel->getAll();
        $kategori = $this->kategoriModel->getAll();
        $members = $this->memberModel->getAll();
        $stats = $this->publikasiModel->getStats();

        \View::render('editor-page/publikasi', [
            'publikasi' => $dataPublikasi,
            'kategori' => $kategori,
            'members' => $members,
            'stats' => $stats
        ]);
    }

    private function validateInput($data) {
        $errors = [];

        if (empty(trim($data['judulpublikasi']))) {
            $errors[] = "Judul publikasi tidak boleh kosong.";
        } elseif (strlen(trim($data['judulpublikasi'])) < 5) {
            $errors[] = "Judul publikasi terlalu pendek (min. 5 karakter).";
        }

        $currentYear = date('Y');
        if (empty($data['tahunterbit'])) {
            $errors[] = "Tahun terbit wajib diisi.";
        } elseif (!is_numeric($data['tahunterbit'])) {
            $errors[] = "Tahun terbit harus berupa angka.";
        } elseif ($data['tahunterbit'] < 1900 || $data['tahunterbit'] > ($currentYear + 1)) {
            $errors[] = "Tahun terbit tidak valid (harus antara 1900 - " . ($currentYear + 1) . ").";
        }

        if (empty($data['penulis']) || !is_numeric($data['penulis'])) {
            $errors[] = "Penulis tidak valid atau belum dipilih.";
        }

        if (empty($data['kategori']) || !is_numeric($data['kategori'])) {
            $errors[] = "Kategori tidak valid atau belum dipilih.";
        }

        if (empty(trim($data['ringkasan']))) {
            $errors[] = "Ringkasan wajib diisi.";
        }

        if (empty(trim($data['linkfile']))) {
            $errors[] = "Link file eksternal wajib diisi.";
        } elseif (!filter_var($data['linkfile'], FILTER_VALIDATE_URL)) {
            $errors[] = "Format Link tidak valid (harus diawali http:// atau https://).";
        }

        return $errors;
    }

    public function storePublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $rawData = [
                'judulpublikasi' => trim($_POST['judulpublikasi'] ?? ''),
                'tahunterbit'    => trim($_POST['tahunterbit'] ?? ''),
                'penulis'        => $_POST['penulis'] ?? '',
                'kategori'       => $_POST['kategori'] ?? '',
                'ringkasan'      => trim($_POST['ringkasan'] ?? ''),
                'linkfile'       => trim($_POST['linkfile'] ?? '')
            ];

            $errors = $this->validateInput($rawData);

            if (!empty($errors)) {
                $_SESSION['flash_message'] = implode('<br>', $errors);
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/editor/publikasi');
                exit;
            }

            if ($this->publikasiModel->create($rawData)) {
                $_SESSION['flash_message'] = "Publikasi berhasil diajukan!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Terjadi kesalahan sistem saat menyimpan data.";
                $_SESSION['flash_type'] = "error";
            }
            
            header('Location: /pbl_semester3_lab_dt/editor/publikasi');
            exit;
        }
    }

    public function updatePublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $rawData = [
                'id'             => $_POST['id'] ?? null,
                'judulpublikasi' => trim($_POST['judulpublikasi'] ?? ''),
                'tahunterbit'    => trim($_POST['tahunterbit'] ?? ''),
                'penulis'        => $_POST['penulis'] ?? '',
                'kategori'       => $_POST['kategori'] ?? '',
                'ringkasan'      => trim($_POST['ringkasan'] ?? ''),
                'linkfile'       => trim($_POST['linkfile'] ?? '')
            ];

            if (empty($rawData['id']) || !is_numeric($rawData['id'])) {
                $_SESSION['flash_message'] = "ID Publikasi tidak ditemukan.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/editor/publikasi');
                exit;
            }

            $errors = $this->validateInput($rawData);

            if (!empty($errors)) {
                $_SESSION['flash_message'] = implode('<br>', $errors);
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/editor/publikasi');
                exit;
            }

            if ($this->publikasiModel->update($rawData)) {
                $_SESSION['flash_message'] = "Publikasi berhasil diperbarui!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal memperbarui data. Silakan coba lagi.";
                $_SESSION['flash_type'] = "error";
            }

            header('Location: /pbl_semester3_lab_dt/editor/publikasi');
            exit;
        }
    }

    public function deletePublikasi() {
        $id = $_GET['id'] ?? null;
        
        // Validasi ID sebelum hapus
        if (!$id || !is_numeric($id)) {
            $_SESSION['flash_message'] = "Publikasi tidak ditemukan.";
            $_SESSION['flash_type'] = "error";
        } else {
            if($this->publikasiModel->delete($id)) {
                $_SESSION['flash_message'] = "Publikasi berhasil dihapus!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal menghapus publikasi.";
                $_SESSION['flash_type'] = "error";
            }
        }
        
        header('Location: /pbl_semester3_lab_dt/editor/publikasi');
        exit;
    }
}
<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../../core/AuthMiddleware.php';
require_once __DIR__ . '/../Models/Publikasi.php';
require_once __DIR__ . '/../Models/Kategori.php';
require_once __DIR__ . '/../Models/Member.php';
require_once __DIR__ . '/../Models/Berita.php';

use App\Models\Publikasi;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Berita;

class EditorController {
    private $publikasiModel;
    private $kategoriModel;
    private $memberModel;
    private $beritaModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $this->publikasiModel = new Publikasi();
        $this->kategoriModel = new Kategori();
        $this->memberModel = new Member();
        $this->beritaModel = new Berita();
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

    public function berita() {
        $berita = $this->beritaModel->getAll();
        $members = $this->memberModel->getAll();
        $stats = $this->beritaModel->getStats();

        \View::render('editor-page/berita', [
            'berita' => $berita,
            'members' => $members,
            'stats' => $stats
        ]);
    }

    private function validateBeritaInput($data) {
        $errors = [];

        if (empty(trim($data['judulberita']))) {
            $errors[] = "Judul berita tidak boleh kosong.";
        } elseif (strlen(trim($data['judulberita'])) < 5) {
            $errors[] = "Judul berita terlalu pendek (min. 5 karakter).";
        }

        if (empty(trim($data['isi']))) {
            $errors[] = "Isi berita wajib diisi.";
        } elseif (strlen(trim($data['isi'])) < 20) {
            $errors[] = "Isi berita terlalu pendek (min. 20 karakter).";
        }

        // Ganti 'penulis' menjadi 'jurnalis'
        if (empty($data['jurnalis']) || !is_numeric($data['jurnalis'])) {
            $errors[] = "Jurnalis tidak valid atau belum dipilih.";
        }

        return $errors;
    }

    private function uploadFotoBerita($file) {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return 'default_news.jpg';
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        $fileType = mime_content_type($file['tmp_name']);
        
        if (!in_array($fileType, $allowedTypes)) {
            throw new Exception("Format foto harus JPG, PNG, atau GIF.");
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            throw new Exception("Ukuran foto maksimal 2MB.");
        }

        $uploadDir = __DIR__ . '/../../public/uploads/berita/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid('berita_') . '.' . $ext;
        $targetPath = $uploadDir . $newName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $newName;
        }

        throw new Exception("Gagal mengupload foto.");
    }

    public function storeBerita() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $rawData = [
                    'judulberita' => trim($_POST['judulberita'] ?? ''),
                    'isi' => trim($_POST['isi'] ?? ''),
                    'jurnalis' => $_POST['jurnalis'] ?? '' // Ganti 'penulis' menjadi 'jurnalis'
                ];

                $errors = $this->validateBeritaInput($rawData);
                
                if (!empty($errors)) {
                    throw new Exception(implode('<br>', $errors));
                }

                $fotoName = 'default_news.jpg';
                if (isset($_FILES['fotodokumentasi']) && $_FILES['fotodokumentasi']['error'] === UPLOAD_ERR_OK) {
                    $fotoName = $this->uploadFotoBerita($_FILES['fotodokumentasi']);
                }

                $rawData['fotodokumentasi'] = $fotoName;

                if ($this->beritaModel->create($rawData)) {
                    $_SESSION['flash_message'] = "Berita berhasil diajukan! Menunggu persetujuan admin.";
                    $_SESSION['flash_type'] = "success";
                } else {
                    throw new Exception("Terjadi kesalahan sistem saat menyimpan data.");
                }
                
            } catch (Exception $e) {
                $_SESSION['flash_message'] = $e->getMessage();
                $_SESSION['flash_type'] = "error";
            }
            
            header('Location: /pbl_semester3_lab_dt/editor/berita');
            exit;
        }
    }

    public function updateBerita() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $rawData = [
                    'id' => $_POST['id'] ?? null,
                    'judulberita' => trim($_POST['judulberita'] ?? ''),
                    'isi' => trim($_POST['isi'] ?? ''),
                    'jurnalis' => $_POST['jurnalis'] ?? '' // Ganti 'penulis' menjadi 'jurnalis'
                ];

                if (empty($rawData['id']) || !is_numeric($rawData['id'])) {
                    throw new Exception("ID Berita tidak ditemukan.");
                }

                $errors = $this->validateBeritaInput($rawData);
                
                if (!empty($errors)) {
                    throw new Exception(implode('<br>', $errors));
                }

                $existingBerita = $this->beritaModel->getById($rawData['id']);
                $fotoName = $existingBerita['fotodokumentasi'] ?? 'default_news.jpg';
                
                if (isset($_FILES['fotodokumentasi']) && $_FILES['fotodokumentasi']['error'] === UPLOAD_ERR_OK) {
                    $fotoName = $this->uploadFotoBerita($_FILES['fotodokumentasi']);
                }

                $rawData['fotodokumentasi'] = $fotoName;

                if ($this->beritaModel->update($rawData)) {
                    $_SESSION['flash_message'] = "Berita berhasil diperbarui! Status kembali pending.";
                    $_SESSION['flash_type'] = "success";
                } else {
                    throw new Exception("Gagal memperbarui data. Silakan coba lagi.");
                }
                
            } catch (Exception $e) {
                $_SESSION['flash_message'] = $e->getMessage();
                $_SESSION['flash_type'] = "error";
            }

            header('Location: /pbl_semester3_lab_dt/editor/berita');
            exit;
        }
    }

    public function deleteBerita() {
        $id = $_GET['id'] ?? null;
        
        if (!$id || !is_numeric($id)) {
            $_SESSION['flash_message'] = "Berita tidak ditemukan.";
            $_SESSION['flash_type'] = "error";
        } else {
            if($this->beritaModel->delete($id)) {
                $_SESSION['flash_message'] = "Berita berhasil dihapus!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal menghapus berita.";
                $_SESSION['flash_type'] = "error";
            }
        }
        
        header('Location: /pbl_semester3_lab_dt/editor/berita');
        exit;
    }
}
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

    private function setFlashAndRedirect($message, $type, $location) {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
        header("Location: $location");
        exit;
    }

    private function handleFileUpload($fileInputName, $targetDir, $defaultImage = null) {
        if (!isset($_FILES[$fileInputName]) || $_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
            return $defaultImage;
        }

        $file = $_FILES[$fileInputName];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        $maxSize = 2 * 1024 * 1024;

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedTypes)) {
            return ['error' => 'Format file harus JPG, PNG, atau GIF.'];
        }

        if (!getimagesize($file['tmp_name'])) {
             return ['error' => 'File bukan gambar valid.'];
        }

        if ($file['size'] > $maxSize) {
            return ['error' => 'Ukuran file maksimal 2MB.'];
        }

        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
        
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid('img_') . '.' . $ext;

        if (move_uploaded_file($file['tmp_name'], $targetDir . $newName)) {
            return $newName;
        }

        return ['error' => 'Gagal mengupload file ke server.'];
    }

    public function publikasi() {
        $dataPublikasi = $this->publikasiModel->getAll();
        $kategori = $this->kategoriModel->getAll('publikasi'); 
        $members = $this->memberModel->getAll();
        $stats = $this->publikasiModel->getStats();

        \View::render('editor-page/publikasi', [
            'publikasi' => $dataPublikasi,
            'kategori' => $kategori,
            'members' => $members,
            'stats' => $stats
        ]);
    }

    public function storePublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = trim(htmlspecialchars($_POST['judulpublikasi'] ?? ''));
            $tahun = trim($_POST['tahunterbit'] ?? '');
            $penulis = $_POST['penulis'] ?? '';
            $ringkasan = trim(htmlspecialchars($_POST['ringkasan'] ?? ''));
            $linkfile = trim($_POST['linkfile'] ?? '');
            
            $kategori = $_POST['kategori'] ?? []; 

            if (empty($judul) || empty($tahun) || empty($penulis) || empty($kategori) || empty($ringkasan) || empty($linkfile)) {
                $this->setFlashAndRedirect("Semua field wajib diisi, termasuk kategori.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            if (!is_array($kategori)) {
                $this->setFlashAndRedirect("Format kategori tidak valid.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            if (strlen($judul) < 5 || strlen($judul) > 200) {
                $this->setFlashAndRedirect("Judul minimal 5 dan maksimal 200 karakter.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            $currentYear = date('Y');
            if (!ctype_digit($tahun) || $tahun < 1900 || $tahun > ($currentYear + 1)) {
                $this->setFlashAndRedirect("Tahun terbit tidak valid (1900 - " . ($currentYear + 1) . ").", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            if (!filter_var($linkfile, FILTER_VALIDATE_URL)) {
                $this->setFlashAndRedirect("Link file harus berupa URL valid (http/https).", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            if ($this->publikasiModel->getByJudul($judul)) {
                $this->setFlashAndRedirect("Judul publikasi '$judul' sudah ada.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            $data = [
                'judulpublikasi' => $judul,
                'tahunterbit'    => $tahun,
                'penulis'        => $penulis,
                'kategori'       => $kategori, 
                'ringkasan'      => $ringkasan,
                'linkfile'       => $linkfile
            ];

            if ($this->publikasiModel->create($data)) {
                $this->setFlashAndRedirect("Publikasi berhasil diajukan!", "success", "/pbl_semester3_lab_dt/editor/publikasi");
            } else {
                $this->setFlashAndRedirect("Gagal menyimpan publikasi.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }
        }
    }

    public function updatePublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $judul = trim(htmlspecialchars($_POST['judulpublikasi'] ?? ''));
            $tahun = trim($_POST['tahunterbit'] ?? '');
            $penulis = $_POST['penulis'] ?? '';
            $ringkasan = trim(htmlspecialchars($_POST['ringkasan'] ?? ''));
            $linkfile = trim($_POST['linkfile'] ?? '');
            
            $kategori = $_POST['kategori'] ?? [];

            if (empty($id) || !is_numeric($id)) {
                $this->setFlashAndRedirect("ID Publikasi tidak valid.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            if (empty($judul) || empty($tahun) || empty($penulis) || empty($kategori) || empty($ringkasan) || empty($linkfile)) {
                $this->setFlashAndRedirect("Semua field wajib diisi.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            $currentYear = date('Y');
            if (!ctype_digit($tahun) || $tahun < 1900 || $tahun > ($currentYear + 1)) {
                $this->setFlashAndRedirect("Tahun terbit tidak valid.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            if (!filter_var($linkfile, FILTER_VALIDATE_URL)) {
                $this->setFlashAndRedirect("Format Link tidak valid.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            $existing = $this->publikasiModel->getByJudul($judul);
            if ($existing && $existing['idpublikasi'] != $id) {
                $this->setFlashAndRedirect("Judul publikasi '$judul' sudah digunakan data lain.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }

            $data = [
                'id'             => $id,
                'judulpublikasi' => $judul,
                'tahunterbit'    => $tahun,
                'penulis'        => $penulis,
                'kategori'       => $kategori,
                'ringkasan'      => $ringkasan,
                'linkfile'       => $linkfile
            ];

            if ($this->publikasiModel->update($data)) {
                $this->setFlashAndRedirect("Publikasi diperbarui!", "success", "/pbl_semester3_lab_dt/editor/publikasi");
            } else {
                $this->setFlashAndRedirect("Gagal update publikasi.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
            }
        }
    }

    public function deletePublikasi() {
        $id = $_GET['id'] ?? null;
        
        if (empty($id) || !is_numeric($id)) {
            $this->setFlashAndRedirect("ID tidak valid.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
        }

        if ($this->publikasiModel->delete($id)) {
            $this->setFlashAndRedirect("Publikasi dihapus!", "success", "/pbl_semester3_lab_dt/editor/publikasi");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus publikasi.", "error", "/pbl_semester3_lab_dt/editor/publikasi");
        }
    }

    public function berita() {
        $berita = $this->beritaModel->getAll();
        $members = $this->memberModel->getAll();
        $stats = $this->beritaModel->getStats();
        $kategori = $this->kategoriModel->getAll('berita');

        \View::render('editor-page/berita', [
            'berita' => $berita,
            'members' => $members,
            'stats' => $stats,
            'kategori' => $kategori
        ]);
    }

   public function storeBerita() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = trim(htmlspecialchars($_POST['judulberita'] ?? ''));
            $isi = trim(htmlspecialchars($_POST['isi'] ?? ''));
            $jurnalis = $_POST['jurnalis'] ?? '';
            $kategori = $_POST['kategori'] ?? []; 

            if (empty($judul) || empty($isi) || empty($jurnalis) || empty($kategori)) {
                $this->setFlashAndRedirect("Judul, Isi, Kategori, dan Jurnalis wajib diisi.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            if (!is_array($kategori)) {
                 $this->setFlashAndRedirect("Format kategori tidak valid.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            if (strlen($judul) < 5 || strlen($judul) > 200) {
                $this->setFlashAndRedirect("Judul minimal 5 karakter.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            if (strlen($isi) < 20) {
                $this->setFlashAndRedirect("Isi berita terlalu pendek.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            if ($this->beritaModel->getByJudul($judul)) {
                $this->setFlashAndRedirect("Judul berita '$judul' sudah ada.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            $uploadDir = __DIR__ . '/../../public/uploads/berita/';
            $foto = $this->handleFileUpload('fotodokumentasi', $uploadDir, 'default_news.jpg');

            if (is_array($foto) && isset($foto['error'])) {
                $this->setFlashAndRedirect($foto['error'], "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            $data = [
                'judulberita' => $judul,
                'isi' => $isi,
                'jurnalis' => $jurnalis,
                'kategori' => $kategori,
                'fotodokumentasi' => $foto
            ];

            if ($this->beritaModel->create($data)) {
                $this->setFlashAndRedirect("Berita berhasil diajukan!", "success", "/pbl_semester3_lab_dt/editor/berita");
            } else {
                if ($foto != 'default_news.jpg') unlink($uploadDir . $foto);
                $this->setFlashAndRedirect("Gagal menyimpan berita.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }
        }
    }

    public function updateBerita() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $judul = trim(htmlspecialchars($_POST['judulberita'] ?? ''));
            $isi = trim(htmlspecialchars($_POST['isi'] ?? ''));
            $jurnalis = $_POST['jurnalis'] ?? '';
            
            $kategori = $_POST['kategori'] ?? [];

            if (empty($id) || !is_numeric($id)) {
                $this->setFlashAndRedirect("ID Berita tidak valid.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            if (empty($judul) || empty($isi) || empty($jurnalis) || empty($kategori)) {
                $this->setFlashAndRedirect("Data wajib diisi (termasuk Kategori).", "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            $existing = $this->beritaModel->getByJudul($judul);
            if ($existing && $existing['idberita'] != $id) {
                $this->setFlashAndRedirect("Judul berita '$judul' sudah digunakan.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            $uploadDir = __DIR__ . '/../../public/uploads/berita/';
            
            $oldData = $this->beritaModel->getById($id);
            $oldFotoDb = $oldData['fotodokumentasi'] ?? 'default_news.jpg';
            
            $foto = $this->handleFileUpload('fotodokumentasi', $uploadDir, $oldFotoDb);

            if (is_array($foto) && isset($foto['error'])) {
                $this->setFlashAndRedirect($foto['error'], "error", "/pbl_semester3_lab_dt/editor/berita");
            }

            $data = [
                'id' => $id,
                'judulberita' => $judul,
                'isi' => $isi,
                'jurnalis' => $jurnalis,
                'kategori' => $kategori,
                'fotodokumentasi' => $foto
            ];

            if ($this->beritaModel->update($data)) {
                $this->setFlashAndRedirect("Berita diperbarui! Status pending.", "success", "/pbl_semester3_lab_dt/editor/berita");
            } else {
                $this->setFlashAndRedirect("Gagal update berita.", "error", "/pbl_semester3_lab_dt/editor/berita");
            }
        }
    }

    public function deleteBerita() {
        $id = $_GET['id'] ?? null;
        
        if (empty($id) || !is_numeric($id)) {
            $this->setFlashAndRedirect("ID tidak valid.", "error", "/pbl_semester3_lab_dt/editor/berita");
        }

        if ($this->beritaModel->delete($id)) {
            $this->setFlashAndRedirect("Berita dihapus!", "success", "/pbl_semester3_lab_dt/editor/berita");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus berita.", "error", "/pbl_semester3_lab_dt/editor/berita");
        }
    }
}
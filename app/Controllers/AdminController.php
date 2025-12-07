<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../../core/AuthMiddleware.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Kategori.php';
require_once __DIR__ . '/../Models/Member.php';
require_once __DIR__ . '/../Models/Publikasi.php';
require_once __DIR__ . '/../Models/Fasilitas.php';
require_once __DIR__ . '/../Models/Berita.php';

use App\Models\User;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Publikasi;
use App\Models\Fasilitas;
use App\Models\Berita;

class AdminController {
    private $userModel;
    private $kategoriModel;
    private $memberModel;
    private $publikasiModel;
    private $fasilitasModel;
    private $beritaModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        
        if (class_exists('AuthMiddleware')) {
            \AuthMiddleware::checkRole('admin');
        }

        $this->userModel = new User();
        $this->kategoriModel = new Kategori();
        $this->memberModel = new Member();
        $this->publikasiModel = new Publikasi();
        $this->fasilitasModel = new Fasilitas();
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
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $maxSize = 2 * 1024 * 1024;

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedTypes)) {
            return ['error' => 'Format file harus JPG atau PNG.'];
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

    public function storeEditor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim(htmlspecialchars($_POST['username'] ?? ''));
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $this->setFlashAndRedirect("Username dan Password wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if ($this->userModel->getByUsername($username)) {
                $this->setFlashAndRedirect("Username " . $username . " sudah digunakan.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (strlen($username) < 4 || strlen($username) > 50 || !preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                $this->setFlashAndRedirect("Username minimal 4, maksimal 50 karakter, hanya huruf, angka, underscore.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (strlen($password) < 6 || strlen($password) > 255) {
                $this->setFlashAndRedirect("Password minimal 6 karakter.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            $data = ['username' => $username, 'password' => $password];
            if ($this->userModel->createEditor($data)) {
                $this->setFlashAndRedirect("Editor berhasil ditambahkan!", "success", "/pbl_semester3_lab_dt/admin/editor");
            } else {
                $this->setFlashAndRedirect("Gagal menambah editor.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }
        }
    }

    public function updateEditor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $username = trim(htmlspecialchars($_POST['username'] ?? ''));
            $password = $_POST['password'] ?? '';
            $status = $_POST['status'] ?? '';

            if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/editor");

            if (empty($username) || strlen($username) > 50) {
                $this->setFlashAndRedirect("Username tidak valid.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            $existing = $this->userModel->getByUsername($username);
            if ($existing && reset($existing) != $id) {
                $this->setFlashAndRedirect("Username " . $username . " sudah digunakan.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (!empty($password) && (strlen($password) < 6 || strlen($password) > 255)) {
                $this->setFlashAndRedirect("Password baru minimal 6 karakter.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (!in_array($status, ['aktif', 'dinonaktifkan'])) {
                $this->setFlashAndRedirect("Status tidak valid.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            $data = ['id' => $id, 'username' => $username, 'password' => $password, 'status' => $status];
            if ($this->userModel->updateEditor($data)) {
                $this->setFlashAndRedirect("Data editor diperbarui!", "success", "/pbl_semester3_lab_dt/admin/editor");
            } else {
                $this->setFlashAndRedirect("Gagal update.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }
        }
    }

    public function deleteEditor() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) {
            $this->setFlashAndRedirect("ID Editor tidak valid.", "error", "/pbl_semester3_lab_dt/admin/editor");
        }

        if ($this->userModel->deleteEditor($id)) {
            $this->setFlashAndRedirect("Editor dihapus!", "success", "/pbl_semester3_lab_dt/admin/editor");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus editor.", "error", "/pbl_semester3_lab_dt/admin/editor");
        }
    }

    public function storeKategori() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = trim(htmlspecialchars($_POST['namakategori'] ?? ''));
            $type = $_POST['type'] ?? 'berita'; 

            if (!in_array($type, ['berita', 'publikasi'])) {
                $this->setFlashAndRedirect("Tipe kategori tidak valid.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }

            if (empty($nama)) $this->setFlashAndRedirect("Nama kategori wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            
            if ($this->kategoriModel->getByName($type, $nama)) {
                $this->setFlashAndRedirect("Kategori " . $nama . " sudah ada di " . ucfirst($type), "error", "/pbl_semester3_lab_dt/admin/kategori");
            }

            if ($this->kategoriModel->create($type, ['namakategori' => $nama])) {
                $this->setFlashAndRedirect("Kategori $type berhasil ditambahkan!", "success", "/pbl_semester3_lab_dt/admin/kategori");
            } else {
                $this->setFlashAndRedirect("Gagal tambah kategori.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }
        }
    }

    public function updateKategori() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $nama = trim(htmlspecialchars($_POST['namakategori'] ?? ''));
            $type = $_POST['type'] ?? 'berita';

            if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            
            $existing = $this->kategoriModel->getByName($type, $nama);
            if ($existing && $existing['idkategori'] != $id) {
                $this->setFlashAndRedirect("Kategori " . $nama . " sudah ada.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }

            if ($this->kategoriModel->update($type, ['id' => $id, 'namakategori' => $nama])) {
                $this->setFlashAndRedirect("Kategori diperbarui!", "success", "/pbl_semester3_lab_dt/admin/kategori");
            } else {
                $this->setFlashAndRedirect("Gagal update kategori.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }
        }
    }

    public function deleteKategori() {
        $id = $_GET['id'] ?? null;
        $type = $_GET['type'] ?? 'berita';

        if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/kategori");

        if ($this->kategoriModel->delete($type, $id)) {
            $this->setFlashAndRedirect("Kategori dihapus!", "success", "/pbl_semester3_lab_dt/admin/kategori");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus.", "error", "/pbl_semester3_lab_dt/admin/kategori");
        }
    }

    public function storeMember() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nip = trim(htmlspecialchars($_POST['nip'] ?? ''));
            $nama = trim(htmlspecialchars($_POST['namamember'] ?? ''));
            $gelar = trim(htmlspecialchars($_POST['gelar'] ?? ''));
            $email = trim(htmlspecialchars($_POST['email'] ?? ''));
            $bidang = trim(htmlspecialchars($_POST['bidangriset'] ?? ''));
            $jabatan = trim(htmlspecialchars($_POST['jabatan'] ?? ''));
            $link_sinta = trim(htmlspecialchars($_POST['link_sinta'] ?? ''));

            if (empty($nip) || empty($nama) || empty($email)) {
                $this->setFlashAndRedirect("NIP, Nama, dan Email wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/member");
            }
            if (!is_numeric($nip) || strlen($nip) > 20) {
                $this->setFlashAndRedirect("NIP harus angka & max 20 digit.", "error", "/pbl_semester3_lab_dt/admin/member");
            }
    
            if ($this->memberModel->getByName($nama)) {
                $this->setFlashAndRedirect("Member " . $nama . " sudah ada.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if ($this->memberModel->getByNip($nip)) {
                $this->setFlashAndRedirect("NIP " . $nip . " sudah terdaftar.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if ($this->memberModel->getByEmail($email)) {
                $this->setFlashAndRedirect("Email " . $email . " sudah terdaftar.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if (strlen($nama) > 100) $this->setFlashAndRedirect("Nama terlalu panjang (Max 100).", "error", "/pbl_semester3_lab_dt/admin/member");
            if (strlen($gelar) > 50) $this->setFlashAndRedirect("Gelar terlalu panjang (Max 50).", "error", "/pbl_semester3_lab_dt/admin/member");
            if (strlen($bidang) > 255) $this->setFlashAndRedirect("Bidang Riset terlalu panjang.", "error", "/pbl_semester3_lab_dt/admin/member");
            if (strlen($jabatan) > 100) $this->setFlashAndRedirect("Jabatan terlalu panjang.", "error", "/pbl_semester3_lab_dt/admin/member");

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->setFlashAndRedirect("Format email tidak valid.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            $uploadDir = __DIR__ . '/../../public/uploads/members/';
            $fotoprofil = $this->handleFileUpload('fotoprofil', $uploadDir, 'default.jpg');

            if (is_array($fotoprofil) && isset($fotoprofil['error'])) {
                $this->setFlashAndRedirect($fotoprofil['error'], "error", "/pbl_semester3_lab_dt/admin/member");
            }

            $data = [
                'nip' => $nip, 
                'namamember' => $nama, 
                'gelar' => $gelar,
                'email' => $email, 
                'bidangriset' => $bidang,
                'jabatan' => $jabatan,
                'link_sinta' => $link_sinta,
                'fotoprofil' => $fotoprofil, 
                'statusmember' => 'active'
            ];

            if ($this->memberModel->create($data)) {
                $this->setFlashAndRedirect("Member berhasil ditambahkan!", "success", "/pbl_semester3_lab_dt/admin/member");
            } else {
                if ($fotoprofil != 'default.jpg' && file_exists($uploadDir . $fotoprofil)) unlink($uploadDir . $fotoprofil);
                $this->setFlashAndRedirect("Gagal menambah member.", "error", "/pbl_semester3_lab_dt/admin/member");
            }
        }
    }

    public function updateMember() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $nip = trim(htmlspecialchars($_POST['nip'] ?? ''));
            $nama = trim(htmlspecialchars($_POST['namamember'] ?? ''));
            $gelar = trim(htmlspecialchars($_POST['gelar'] ?? ''));
            $email = trim(htmlspecialchars($_POST['email'] ?? ''));
            $bidang = trim(htmlspecialchars($_POST['bidangriset'] ?? ''));
            $status = $_POST['statusmember'] ?? '';
            $jabatan = trim(htmlspecialchars($_POST['jabatan'] ?? ''));
            $link_sinta = trim(htmlspecialchars($_POST['link_sinta'] ?? ''));

            if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/member");
            
            if (empty($nip) || empty($nama) || empty($email)) $this->setFlashAndRedirect("Data wajib tidak boleh kosong.", "error", "/pbl_semester3_lab_dt/admin/member");
            if (!is_numeric($nip) || strlen($nip) > 20) $this->setFlashAndRedirect("NIP tidak valid.", "error", "/pbl_semester3_lab_dt/admin/member");
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $this->setFlashAndRedirect("Email tidak valid.", "error", "/pbl_semester3_lab_dt/admin/member");

            $existingName = $this->memberModel->getByName($nama);
            if ($existingName && reset($existingName)['idmember'] != $id) {
                $this->setFlashAndRedirect("Member " . $nama . " sudah ada.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            $existingNip = $this->memberModel->getByNip($nip);
            if ($existingNip && reset($existingNip)['idmember'] != $id) {
                $this->setFlashAndRedirect("NIP " . $nip . " sudah digunakan member lain.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            $existingEmail = $this->memberModel->getByEmail($email);
            if ($existingEmail && reset($existingEmail)['idmember'] != $id) {
                $this->setFlashAndRedirect("Email " . $email . " sudah digunakan member lain.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            $oldFoto = $_POST['old_fotoprofil'] ?? 'default.jpg';
            $uploadDir = __DIR__ . '/../../public/uploads/members/';
            $fotoprofil = $this->handleFileUpload('fotoprofil', $uploadDir, $oldFoto);

            if (is_array($fotoprofil) && isset($fotoprofil['error'])) {
                $this->setFlashAndRedirect($fotoprofil['error'], "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if ($fotoprofil !== $oldFoto && $oldFoto !== 'default.jpg') {
                if (file_exists($uploadDir . $oldFoto)) unlink($uploadDir . $oldFoto);
            }

            $data = [
                'id' => $id, 
                'nip' => $nip, 
                'namamember' => $nama,
                'gelar' => $gelar, 
                'email' => $email, 
                'bidangriset' => $bidang,
                'jabatan' => $jabatan,
                'link_sinta' => $link_sinta,
                'fotoprofil' => $fotoprofil, 
                'statusmember' => $status
            ];

            if ($this->memberModel->update($data)) {
                $this->setFlashAndRedirect("Member diperbarui!", "success", "/pbl_semester3_lab_dt/admin/member");
            } else {
                $this->setFlashAndRedirect("Gagal update member.", "error", "/pbl_semester3_lab_dt/admin/member");
            }
        }
    }

    public function deleteMember() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/member");
        
        if ($this->memberModel->delete($id)) {
            $this->setFlashAndRedirect("Member dihapus!", "success", "/pbl_semester3_lab_dt/admin/member");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus member.", "error", "/pbl_semester3_lab_dt/admin/member");
        }
    }

    public function approvePublikasi() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/publikasi");

        if ($this->publikasiModel->changeStatus($id, 'terima', null)) {
            $this->setFlashAndRedirect("Publikasi disetujui!", "success", "/pbl_semester3_lab_dt/admin/publikasi");
        } else {
            $this->setFlashAndRedirect("Gagal approve.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
        }
    }

    public function rejectPublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $alasan = trim(htmlspecialchars($_POST['alasan_penolakan'] ?? ''));

            if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
            if (empty($alasan)) $this->setFlashAndRedirect("Alasan penolakan wajib diisi!", "error", "/pbl_semester3_lab_dt/admin/publikasi");
            if (strlen($alasan) > 255) $this->setFlashAndRedirect("Alasan terlalu panjang (max 255 char).", "error", "/pbl_semester3_lab_dt/admin/publikasi");

            if ($this->publikasiModel->changeStatus($id, 'tolak', $alasan)) {
                $this->setFlashAndRedirect("Publikasi ditolak.", "warning", "/pbl_semester3_lab_dt/admin/publikasi");
            } else {
                $this->setFlashAndRedirect("Gagal menolak.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
            }
        }
    }

    public function deletePublikasi() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/publikasi");

        if ($this->publikasiModel->delete($id)) {
            $this->setFlashAndRedirect("Publikasi dihapus!", "success", "/pbl_semester3_lab_dt/admin/publikasi");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
        }
    }

    public function storeFasilitas() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $namafasilitas = trim(htmlspecialchars($_POST['namafasilitas'] ?? ''));
            $jumlah = trim($_POST['jumlah'] ?? '');
            $deskripsi = trim(htmlspecialchars($_POST['deskripsi'] ?? ''));

            if (empty($namafasilitas) || empty($jumlah) || empty($deskripsi)) {
                $this->setFlashAndRedirect("Semua kolom wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if ($this->fasilitasModel->getByName($namafasilitas)) {
                $this->setFlashAndRedirect("Fasilitas " . $namafasilitas . " sudah terdaftar.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if (!ctype_digit($jumlah) || $jumlah <= 0) {
                $this->setFlashAndRedirect("Jumlah harus berupa angka bulat positif.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }
            if (strlen($namafasilitas) < 10) $this->setFlashAndRedirect("Nama fasilitas terlalu pendek.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            
            if (strlen($namafasilitas) > 100) $this->setFlashAndRedirect("Nama fasilitas terlalu panjang.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            
            if (strlen($deskripsi) < 50) $this->setFlashAndRedirect("Deskripsi terlalu pendek (min 50 char).", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            
            if (strlen($deskripsi) > 500) $this->setFlashAndRedirect("Deskripsi terlalu panjang (max 500 char).", "error", "/pbl_semester3_lab_dt/admin/fasilitas");

            $uploadDir = __DIR__ . '/../../public/uploads/fasilitas/';
            $foto = $this->handleFileUpload('foto', $uploadDir, 'default_fasilitas.jpg');

            if (is_array($foto) && isset($foto['error'])) {
                $this->setFlashAndRedirect($foto['error'], "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            $data = [
                'namafasilitas' => $namafasilitas,
                'jumlah' => $jumlah,
                'deskripsi' => $deskripsi,
                'foto' => $foto
            ];

            if ($this->fasilitasModel->create($data)) {
                $this->setFlashAndRedirect("Fasilitas berhasil ditambahkan!", "success", "/pbl_semester3_lab_dt/admin/fasilitas");
            } else {
                if ($foto != 'default_fasilitas.jpg') unlink($uploadDir . $foto);
                $this->setFlashAndRedirect("Gagal menyimpan fasilitas.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }
        }
    }

    public function updateFasilitas() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $namafasilitas = trim(htmlspecialchars($_POST['namafasilitas'] ?? ''));
            $jumlah = trim($_POST['jumlah'] ?? '');
            $deskripsi = trim(htmlspecialchars($_POST['deskripsi'] ?? ''));

            if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");

            if (empty($namafasilitas) || empty($jumlah) || empty($deskripsi)) {
                $this->setFlashAndRedirect("Data wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if(strlen($namafasilitas) < 10) {
                $this->setFlashAndRedirect("Nama fasilitas terlalu pendek.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if(strlen($namafasilitas) > 100) {
                $this->setFlashAndRedirect("Nama fasilitas terlalu panjang.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if (strlen($deskripsi) < 50) {
                $this->setFlashAndRedirect("Deskripsi terlalu pendek (min 50 char).", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if (strlen($deskripsi) > 500) {
                $this->setFlashAndRedirect("Deskripsi terlalu panjang (max 500 char).", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if (!ctype_digit($jumlah) || $jumlah < 0) {
                $this->setFlashAndRedirect("Jumlah harus angka bulat positif.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            $existing = $this->fasilitasModel->getByName($namafasilitas);
            if ($existing && reset($existing) != $id) {
                $this->setFlashAndRedirect("Fasilitas " . $namafasilitas . " sudah terdaftar.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            $uploadDir = __DIR__ . '/../../public/uploads/fasilitas/';
            $oldFoto = $_POST['old_foto'] ?? 'default_fasilitas.jpg';
            $foto = $this->handleFileUpload('foto', $uploadDir, $oldFoto);

            if (is_array($foto) && isset($foto['error'])) {
                $this->setFlashAndRedirect($foto['error'], "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if ($foto !== $oldFoto && $oldFoto !== 'default_fasilitas.jpg') {
                if (file_exists($uploadDir . $oldFoto)) unlink($uploadDir . $oldFoto);
            }

            $data = [
                'id' => $id, 'namafasilitas' => $namafasilitas,
                'jumlah' => $jumlah, 'deskripsi' => $deskripsi,
                'foto' => $foto
            ];

            if ($this->fasilitasModel->update($data)) {
                $this->setFlashAndRedirect("Fasilitas diperbarui!", "success", "/pbl_semester3_lab_dt/admin/fasilitas");
            } else {
                $this->setFlashAndRedirect("Gagal update fasilitas.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }
        }
    }

    public function deleteFasilitas() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");

        if ($this->fasilitasModel->delete($id)) {
            $this->setFlashAndRedirect("Fasilitas dihapus!", "success", "/pbl_semester3_lab_dt/admin/fasilitas");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
        }
    }

    public function approveBerita() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/berita");

        if ($this->beritaModel->changeStatus($id, 'terima', null)) {
            $this->setFlashAndRedirect("Berita disetujui!", "success", "/pbl_semester3_lab_dt/admin/berita");
        } else {
            $this->setFlashAndRedirect("Gagal approve berita.", "error", "/pbl_semester3_lab_dt/admin/berita");
        }
    }

    public function rejectBerita() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $alasan = trim(htmlspecialchars($_POST['alasan_penolakan'] ?? ''));

            if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/berita");
            if (empty($alasan)) $this->setFlashAndRedirect("Alasan wajib diisi!", "error", "/pbl_semester3_lab_dt/admin/berita");

            if ($this->beritaModel->changeStatus($id, 'tolak', $alasan)) {
                $this->setFlashAndRedirect("Berita ditolak.", "warning", "/pbl_semester3_lab_dt/admin/berita");
            } else {
                $this->setFlashAndRedirect("Gagal menolak berita.", "error", "/pbl_semester3_lab_dt/admin/berita");
            }
        }
    }

    public function deleteBerita() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) $this->setFlashAndRedirect("ID Invalid.", "error", "/pbl_semester3_lab_dt/admin/berita");

        if ($this->beritaModel->delete($id)) {
            $this->setFlashAndRedirect("Berita dihapus!", "success", "/pbl_semester3_lab_dt/admin/berita");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus berita.", "error", "/pbl_semester3_lab_dt/admin/berita");
        }
    }
}
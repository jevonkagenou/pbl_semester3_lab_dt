<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../../core/AuthMiddleware.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Kategori.php';
require_once __DIR__ . '/../Models/Member.php';
require_once __DIR__ . '/../Models/Publikasi.php';
require_once __DIR__ . '/../Models/Fasilitas.php';

use App\Models\User;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Publikasi;
use App\Models\Fasilitas;

class AdminController {
    private $userModel;
    private $kategoriModel;
    private $memberModel;
    private $publikasiModel;
    private $fasilitasModel;

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
    }

    private function setFlashAndRedirect($message, $type, $location) {
        $_SESSION['flash_message'] = $message;
        $_SESSION['flash_type'] = $type;
        header("Location: $location");
        exit;
    }

    public function storeEditor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                $this->setFlashAndRedirect("Username dan Password wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (strlen($username) < 4 || !preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                $this->setFlashAndRedirect("Username minimal 4 karakter dan hanya boleh huruf, angka, atau underscore.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (strlen($password) < 6) {
                $this->setFlashAndRedirect("Password minimal 6 karakter.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            $data = ['username' => $username, 'password' => $password];
            if ($this->userModel->createEditor($data)) {
                $this->setFlashAndRedirect("Editor berhasil ditambahkan!", "success", "/pbl_semester3_lab_dt/admin/editor");
            } else {
                $this->setFlashAndRedirect("Gagal menambah editor. Username mungkin sudah digunakan.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }
        }
    }

    public function updateEditor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            $status = $_POST['status'] ?? '';

            if (empty($id) || !is_numeric($id)) {
                $this->setFlashAndRedirect("ID Editor tidak valid.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (empty($username)) {
                $this->setFlashAndRedirect("Username tidak boleh kosong.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (!empty($password) && strlen($password) < 6) {
                $this->setFlashAndRedirect("Password baru minimal 6 karakter.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            if (!in_array($status, ['active', 'inactive'])) {
                $this->setFlashAndRedirect("Status tidak valid.", "error", "/pbl_semester3_lab_dt/admin/editor");
            }

            $data = ['id' => $id, 'username' => $username, 'password' => $password, 'status' => $status];
            if ($this->userModel->updateEditor($data)) {
                $this->setFlashAndRedirect("Data editor diperbarui!", "success", "/pbl_semester3_lab_dt/admin/editor");
            } else {
                $this->setFlashAndRedirect("Gagal memperbarui editor.", "error", "/pbl_semester3_lab_dt/admin/editor");
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
            $nama = trim($_POST['namakategori'] ?? '');

            if (empty($nama)) {
                $this->setFlashAndRedirect("Nama kategori tidak boleh kosong.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }

            if (strlen($nama) < 3) {
                $this->setFlashAndRedirect("Nama kategori terlalu pendek.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }

            $data = ['namakategori' => $nama];
            if ($this->kategoriModel->create($data)) {
                $this->setFlashAndRedirect("Kategori berhasil ditambahkan!", "success", "/pbl_semester3_lab_dt/admin/kategori");
            } else {
                $this->setFlashAndRedirect("Gagal menambah kategori.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }
        }
    }

    public function updateKategori() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $nama = trim($_POST['namakategori'] ?? '');

            if (empty($id) || !is_numeric($id)) {
                $this->setFlashAndRedirect("ID Kategori tidak valid.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }

            if (empty($nama)) {
                $this->setFlashAndRedirect("Nama kategori tidak boleh kosong.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }

            $data = ['id' => $id, 'namakategori' => $nama];
            if ($this->kategoriModel->update($data)) {
                $this->setFlashAndRedirect("Kategori diperbarui!", "success", "/pbl_semester3_lab_dt/admin/kategori");
            } else {
                $this->setFlashAndRedirect("Gagal memperbarui kategori.", "error", "/pbl_semester3_lab_dt/admin/kategori");
            }
        }
    }

    public function deleteKategori() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) {
            $this->setFlashAndRedirect("ID Kategori tidak valid.", "error", "/pbl_semester3_lab_dt/admin/kategori");
        }

        if ($this->kategoriModel->delete($id)) {
            $this->setFlashAndRedirect("Kategori dihapus!", "success", "/pbl_semester3_lab_dt/admin/kategori");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus kategori.", "error", "/pbl_semester3_lab_dt/admin/kategori");
        }
    }

    public function storeMember() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nip = trim($_POST['nip'] ?? '');
            $nama = trim($_POST['namamember'] ?? '');
            $gelar = trim($_POST['gelar'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $bidang = trim($_POST['bidangriset'] ?? '');

            if (empty($nip) || empty($nama) || empty($email)) {
                $this->setFlashAndRedirect("NIP, Nama, dan Email wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if (!is_numeric($nip) || strlen($nip) < 5) {
                $this->setFlashAndRedirect("NIP harus berupa angka dan valid.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->setFlashAndRedirect("Format email tidak valid.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            $fotoprofil = 'default.jpg';
            if (isset($_FILES['fotoprofil']) && $_FILES['fotoprofil']['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES['fotoprofil']['tmp_name'];
                $fileType = mime_content_type($fileTmp);
                $fileSize = $_FILES['fotoprofil']['size'];
                
                if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/jpg'])) {
                    $this->setFlashAndRedirect("Format foto harus JPG atau PNG.", "error", "/pbl_semester3_lab_dt/admin/member");
                }
                
                if ($fileSize > 2 * 1024 * 1024) {
                    $this->setFlashAndRedirect("Ukuran foto maksimal 2MB.", "error", "/pbl_semester3_lab_dt/admin/member");
                }

                $uploadDir = __DIR__ . '/../../public/uploads/members/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                $ext = pathinfo($_FILES['fotoprofil']['name'], PATHINFO_EXTENSION);
                $newName = uniqid('member_') . '.' . $ext;
                
                if (move_uploaded_file($fileTmp, $uploadDir . $newName)) {
                    $fotoprofil = $newName;
                }
            }

            $data = [
                'nip' => $nip, 'namamember' => $nama, 'gelar' => $gelar,
                'email' => $email, 'bidangriset' => $bidang,
                'fotoprofil' => $fotoprofil, 'statusmember' => 'active'
            ];

            if ($this->memberModel->create($data)) {
                $this->setFlashAndRedirect("Member berhasil ditambahkan!", "success", "/pbl_semester3_lab_dt/admin/member");
            } else {
                $this->setFlashAndRedirect("Gagal menambah member. NIP/Email mungkin sudah terdaftar.", "error", "/pbl_semester3_lab_dt/admin/member");
            }
        }
    }

    public function updateMember() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $nip = trim($_POST['nip'] ?? '');
            $nama = trim($_POST['namamember'] ?? '');
            $gelar = trim($_POST['gelar'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $bidang = trim($_POST['bidangriset'] ?? '');
            $status = $_POST['statusmember'] ?? '';

            if (empty($id) || !is_numeric($id)) {
                $this->setFlashAndRedirect("ID Member tidak valid.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if (empty($nip) || empty($nama) || empty($email)) {
                $this->setFlashAndRedirect("NIP, Nama, dan Email wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if (!is_numeric($nip)) {
                $this->setFlashAndRedirect("NIP harus berupa angka.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->setFlashAndRedirect("Format email tidak valid.", "error", "/pbl_semester3_lab_dt/admin/member");
            }

            $fotoprofil = $_POST['old_fotoprofil'] ?? 'default.jpg';
            if (isset($_FILES['fotoprofil']) && $_FILES['fotoprofil']['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES['fotoprofil']['tmp_name'];
                $fileType = mime_content_type($fileTmp);
                $fileSize = $_FILES['fotoprofil']['size'];
                
                if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/jpg'])) {
                    $this->setFlashAndRedirect("Format foto harus JPG atau PNG.", "error", "/pbl_semester3_lab_dt/admin/member");
                }
                
                if ($fileSize > 2 * 1024 * 1024) {
                    $this->setFlashAndRedirect("Ukuran foto maksimal 2MB.", "error", "/pbl_semester3_lab_dt/admin/member");
                }

                $uploadDir = __DIR__ . '/../../public/uploads/members/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                $ext = pathinfo($_FILES['fotoprofil']['name'], PATHINFO_EXTENSION);
                $newName = uniqid('member_') . '.' . $ext;
                
                if (move_uploaded_file($fileTmp, $uploadDir . $newName)) {
                    $fotoprofil = $newName;
                }
            }

            $data = [
                'id' => $id, 'nip' => $nip, 'namamember' => $nama,
                'gelar' => $gelar, 'email' => $email, 'bidangriset' => $bidang,
                'fotoprofil' => $fotoprofil, 'statusmember' => $status
            ];

            if ($this->memberModel->update($data)) {
                $this->setFlashAndRedirect("Data member diperbarui!", "success", "/pbl_semester3_lab_dt/admin/member");
            } else {
                $this->setFlashAndRedirect("Gagal memperbarui member.", "error", "/pbl_semester3_lab_dt/admin/member");
            }
        }
    }

    public function deleteMember() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) {
            $this->setFlashAndRedirect("ID Member tidak valid.", "error", "/pbl_semester3_lab_dt/admin/member");
        }

        if ($this->memberModel->delete($id)) {
            $this->setFlashAndRedirect("Member dihapus!", "success", "/pbl_semester3_lab_dt/admin/member");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus member.", "error", "/pbl_semester3_lab_dt/admin/member");
        }
    }

    public function approvePublikasi() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) {
            $this->setFlashAndRedirect("ID Publikasi tidak valid.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
        }

        if ($this->publikasiModel->changeStatus($id, 'terima', null)) {
            $this->setFlashAndRedirect("Publikasi berhasil disetujui!", "success", "/pbl_semester3_lab_dt/admin/publikasi");
        } else {
            $this->setFlashAndRedirect("Gagal menyetujui publikasi.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
        }
    }

    public function rejectPublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $alasan = trim($_POST['alasan_penolakan'] ?? '');

            if (empty($id) || !is_numeric($id)) {
                $this->setFlashAndRedirect("ID Publikasi tidak valid.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
            }

            if (empty($alasan)) {
                $this->setFlashAndRedirect("Alasan penolakan wajib diisi!", "error", "/pbl_semester3_lab_dt/admin/publikasi");
            }

            if ($this->publikasiModel->changeStatus($id, 'tolak', $alasan)) {
                $this->setFlashAndRedirect("Publikasi ditolak.", "warning", "/pbl_semester3_lab_dt/admin/publikasi");
            } else {
                $this->setFlashAndRedirect("Gagal menolak publikasi.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
            }
        }
    }

    public function deletePublikasi() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) {
            $this->setFlashAndRedirect("ID Publikasi tidak valid.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
        }

        if ($this->publikasiModel->delete($id)) {
            $this->setFlashAndRedirect("Publikasi dihapus!", "success", "/pbl_semester3_lab_dt/admin/publikasi");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus publikasi.", "error", "/pbl_semester3_lab_dt/admin/publikasi");
        }
    }

    public function storeFasilitas() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $namafasilitas = trim($_POST['namafasilitas'] ?? '');
            $jumlah = trim($_POST['jumlah'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');

            if (empty($namafasilitas) || empty($jumlah) || empty($deskripsi)) {
                $this->setFlashAndRedirect("Semua kolom wajib diisi.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if (!is_numeric($jumlah) || $jumlah < 0) {
                $this->setFlashAndRedirect("Jumlah harus berupa angka positif.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if ($this->fasilitasModel->getByName($namafasilitas)) {
                $this->setFlashAndRedirect("Fasilitas '$namafasilitas' sudah terdaftar.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            $foto = 'default_fasilitas.jpg';
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES['foto']['tmp_name'];
                $fileType = mime_content_type($fileTmp);
                $fileSize = $_FILES['foto']['size'];
                
                if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/jpg'])) {
                    $this->setFlashAndRedirect("Format foto harus JPG atau PNG.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
                }
                
                if ($fileSize > 2 * 1024 * 1024) {
                    $this->setFlashAndRedirect("Ukuran foto maksimal 2MB.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
                }

                $uploadDir = __DIR__ . '/../../public/uploads/fasilitas/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $newName = uniqid('fasilitas_') . '.' . $ext;
                
                if (move_uploaded_file($fileTmp, $uploadDir . $newName)) {
                    $foto = $newName;
                }
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
                $this->setFlashAndRedirect("Terjadi kesalahan server saat menyimpan fasilitas.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }
        }
    }

    public function updateFasilitas() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $namafasilitas = trim($_POST['namafasilitas'] ?? '');
            $jumlah = trim($_POST['jumlah'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');

            if (empty($id) || !is_numeric($id)) {
                $this->setFlashAndRedirect("ID Fasilitas tidak valid.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if (empty($namafasilitas) || empty($jumlah) || empty($deskripsi)) {
                $this->setFlashAndRedirect("Data wajib tidak boleh kosong.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            if (!is_numeric($jumlah) || $jumlah < 0) {
                $this->setFlashAndRedirect("Jumlah harus berupa angka positif.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            $existing = $this->fasilitasModel->getByName($namafasilitas);
            if ($existing && $existing['idfasilitas'] != $id) {
                $this->setFlashAndRedirect("Nama fasilitas '$namafasilitas' sudah digunakan.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }

            $foto = $_POST['old_foto'] ?? 'default_fasilitas.jpg';
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES['foto']['tmp_name'];
                $fileType = mime_content_type($fileTmp);
                $fileSize = $_FILES['foto']['size'];
                
                if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/jpg'])) {
                    $this->setFlashAndRedirect("Format foto harus JPG atau PNG.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
                }
                
                if ($fileSize > 2 * 1024 * 1024) {
                    $this->setFlashAndRedirect("Ukuran foto maksimal 2MB.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
                }

                $uploadDir = __DIR__ . '/../../public/uploads/fasilitas/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $newName = uniqid('fasilitas_') . '.' . $ext;
                
                if (move_uploaded_file($fileTmp, $uploadDir . $newName)) {
                    $foto = $newName;
                }
            }

            $data = [
                'id' => $id,
                'namafasilitas' => $namafasilitas,
                'jumlah' => $jumlah,
                'deskripsi' => $deskripsi,
                'foto' => $foto
            ];

            if ($this->fasilitasModel->update($data)) {
                $this->setFlashAndRedirect("Data fasilitas diperbarui!", "success", "/pbl_semester3_lab_dt/admin/fasilitas");
            } else {
                $this->setFlashAndRedirect("Gagal memperbarui data fasilitas.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
            }
        }
    }

    public function deleteFasilitas() {
        $id = $_GET['id'] ?? null;
        if (empty($id) || !is_numeric($id)) {
            $this->setFlashAndRedirect("ID Fasilitas tidak valid.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
        }

        if ($this->fasilitasModel->delete($id)) {
            $this->setFlashAndRedirect("Fasilitas dihapus!", "success", "/pbl_semester3_lab_dt/admin/fasilitas");
        } else {
            $this->setFlashAndRedirect("Gagal menghapus fasilitas.", "error", "/pbl_semester3_lab_dt/admin/fasilitas");
        }
    }
}
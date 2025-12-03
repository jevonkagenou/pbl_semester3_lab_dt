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

    public function storeEditor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['username' => $_POST['username'], 'password' => $_POST['password']];
            if ($this->userModel->createEditor($data)) {
                $_SESSION['flash_message'] = "Editor berhasil ditambahkan!"; $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal menambah editor."; $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/editor'); exit;
        }
    }
    public function updateEditor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $data = ['id' => $_POST['id'], 'username' => $_POST['username'], 'password' => $_POST['password'], 'status' => $_POST['status']];
            if ($this->userModel->updateEditor($data)) {
                $_SESSION['flash_message'] = "Data editor diperbarui!"; $_SESSION['flash_type'] = "success";
            }
            header('Location: /pbl_semester3_lab_dt/admin/editor'); exit;
        }
    }
    public function deleteEditor() {
        $id = $_GET['id'] ?? null;
        if($id && $this->userModel->deleteEditor($id)) {
            $_SESSION['flash_message'] = "Editor dihapus!"; $_SESSION['flash_type'] = "success";
        }
        header('Location: /pbl_semester3_lab_dt/admin/editor'); exit;
    }

    // 2. KATEGORI
    public function storeKategori() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['namakategori' => $_POST['namakategori']];
            if ($this->kategoriModel->create($data)) {
                $_SESSION['flash_message'] = "Kategori berhasil ditambahkan!"; $_SESSION['flash_type'] = "success";
            }
            header('Location: /pbl_semester3_lab_dt/admin/kategori'); exit;
        }
    }
    public function updateKategori() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = ['id' => $_POST['id'], 'namakategori' => $_POST['namakategori']];
            if ($this->kategoriModel->update($data)) {
                $_SESSION['flash_message'] = "Kategori diperbarui!"; $_SESSION['flash_type'] = "success";
            }
            header('Location: /pbl_semester3_lab_dt/admin/kategori'); exit;
        }
    }
    public function deleteKategori() {
        $id = $_GET['id'] ?? null;
        if($id && $this->kategoriModel->delete($id)) {
            $_SESSION['flash_message'] = "Kategori dihapus!"; $_SESSION['flash_type'] = "success";
        }
        header('Location: /pbl_semester3_lab_dt/admin/kategori'); exit;
    }

    // 3. MEMBER
    public function storeMember() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fotoprofil = 'default.jpg';
            if (isset($_FILES['fotoprofil']) && $_FILES['fotoprofil']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/members/';
                if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                $ext = pathinfo($_FILES['fotoprofil']['name'], PATHINFO_EXTENSION);
                $newName = uniqid('member_') . '.' . $ext;
                if (move_uploaded_file($_FILES['fotoprofil']['tmp_name'], $uploadDir . $newName)) $fotoprofil = $newName;
            }
            $data = [
                'nip' => $_POST['nip'], 'namamember' => $_POST['namamember'], 'gelar' => $_POST['gelar'],
                'email' => $_POST['email'], 'bidangriset' => $_POST['bidangriset'],
                'fotoprofil' => $fotoprofil, 'statusmember' => 'active'
            ];
            if ($this->memberModel->create($data)) {
                $_SESSION['flash_message'] = "Member berhasil ditambahkan!"; $_SESSION['flash_type'] = "success";
            }
            header('Location: /pbl_semester3_lab_dt/admin/member'); exit;
        }
    }
    public function updateMember() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fotoprofil = $_POST['old_fotoprofil'];
            if (isset($_FILES['fotoprofil']) && $_FILES['fotoprofil']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/members/';
                $ext = pathinfo($_FILES['fotoprofil']['name'], PATHINFO_EXTENSION);
                $newName = uniqid('member_') . '.' . $ext;
                if (move_uploaded_file($_FILES['fotoprofil']['tmp_name'], $uploadDir . $newName)) $fotoprofil = $newName;
            }
            $data = [
                'id' => $_POST['id'], 'nip' => $_POST['nip'], 'namamember' => $_POST['namamember'],
                'gelar' => $_POST['gelar'], 'email' => $_POST['email'], 'bidangriset' => $_POST['bidangriset'],
                'fotoprofil' => $fotoprofil, 'statusmember' => $_POST['statusmember']
            ];
            if ($this->memberModel->update($data)) {
                $_SESSION['flash_message'] = "Data member diperbarui!"; $_SESSION['flash_type'] = "success";
            }
            header('Location: /pbl_semester3_lab_dt/admin/member'); exit;
        }
    }
    public function deleteMember() {
        $id = $_GET['id'] ?? null;
        if($id && $this->memberModel->delete($id)) {
            $_SESSION['flash_message'] = "Member dihapus!"; $_SESSION['flash_type'] = "success";
        }
        header('Location: /pbl_semester3_lab_dt/admin/member'); exit;
    }

    public function approvePublikasi() {
        $id = $_GET['id'] ?? null;
        
        if ($id) {
            if ($this->publikasiModel->changeStatus($id, 'terima', null)) {
                $_SESSION['flash_message'] = "Publikasi berhasil disetujui!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal menyetujui publikasi.";
                $_SESSION['flash_type'] = "error";
            }
        }
        header('Location: /pbl_semester3_lab_dt/admin/publikasi');
        exit;
    }

    public function rejectPublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $alasan = trim($_POST['alasan_penolakan'] ?? '');

            if ($id && !empty($alasan)) {
                if ($this->publikasiModel->changeStatus($id, 'tolak', $alasan)) {
                    $_SESSION['flash_message'] = "Publikasi ditolak.";
                    $_SESSION['flash_type'] = "warning";
                } else {
                    $_SESSION['flash_message'] = "Gagal menolak publikasi.";
                    $_SESSION['flash_type'] = "error";
                }
            } else {
                $_SESSION['flash_message'] = "Alasan penolakan wajib diisi!";
                $_SESSION['flash_type'] = "error";
            }
            
            header('Location: /pbl_semester3_lab_dt/admin/publikasi');
            exit;
        }
    }
    
    public function deletePublikasi() {
        $id = $_GET['id'] ?? null;
        if($id && $this->publikasiModel->delete($id)) {
            $_SESSION['flash_message'] = "Publikasi dihapus!"; $_SESSION['flash_type'] = "success";
        }
        header('Location: /pbl_semester3_lab_dt/admin/publikasi'); exit;
    }

    public function storeFasilitas() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $namafasilitas = trim($_POST['namafasilitas'] ?? '');
            $jumlah = trim($_POST['jumlah'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');

            if (empty($namafasilitas) || empty($jumlah) || empty($deskripsi)) {
                $_SESSION['flash_message'] = "Gagal! Semua kolom wajib diisi.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                exit;
            }

            if (!is_numeric($jumlah)) {
                $_SESSION['flash_message'] = "Gagal! Jumlah harus berupa angka.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                exit;
            }

            if ($this->fasilitasModel->getByName($namafasilitas)) {
                $_SESSION['flash_message'] = "Gagal! Fasilitas '$namafasilitas' sudah terdaftar.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                exit;
            }

            $foto = 'default_fasilitas.jpg';
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES['foto']['tmp_name'];
                $fileType = mime_content_type($fileTmp);
                $fileSize = $_FILES['foto']['size'];
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['flash_message'] = "Gagal! Format foto harus JPG/PNG.";
                    $_SESSION['flash_type'] = "error";
                    header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                    exit;
                }

                if ($fileSize > 2 * 1024 * 1024) {
                    $_SESSION['flash_message'] = "Gagal! Ukuran foto maksimal 2MB.";
                    $_SESSION['flash_type'] = "error";
                    header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                    exit;
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
                $_SESSION['flash_message'] = "Fasilitas berhasil ditambahkan!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Terjadi kesalahan server.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
            exit;
        }
    }

    public function updateFasilitas() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $namafasilitas = trim($_POST['namafasilitas'] ?? '');
            $jumlah = trim($_POST['jumlah'] ?? '');
            $deskripsi = trim($_POST['deskripsi'] ?? '');

            if (empty($id) || empty($namafasilitas) || empty($jumlah) || empty($deskripsi)) {
                $_SESSION['flash_message'] = "Gagal! Data wajib tidak boleh kosong.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                exit;
            }

            if (!is_numeric($jumlah)) {
                $_SESSION['flash_message'] = "Gagal! Jumlah harus angka.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                exit;
            }

            $existing = $this->fasilitasModel->getByName($namafasilitas);
            if ($existing && $existing['idfasilitas'] != $id) {
                $_SESSION['flash_message'] = "Gagal! Nama fasilitas sudah digunakan.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                exit;
            }

            $foto = $_POST['old_foto'] ?? '';
            
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES['foto']['tmp_name'];
                $fileType = mime_content_type($fileTmp);
                $fileSize = $_FILES['foto']['size'];
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['flash_message'] = "Gagal! Format foto salah.";
                    $_SESSION['flash_type'] = "error";
                    header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                    exit;
                }

                if ($fileSize > 2 * 1024 * 1024) {
                    $_SESSION['flash_message'] = "Gagal! Foto max 2MB.";
                    $_SESSION['flash_type'] = "error";
                    header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
                    exit;
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
                $_SESSION['flash_message'] = "Data fasilitas diperbarui!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal update data.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
            exit;
        }
    }

    public function deleteFasilitas() {
        $id = $_GET['id'] ?? null;
        if($id && $this->fasilitasModel->delete($id)) {
            $_SESSION['flash_message'] = "Fasilitas dihapus!";
            $_SESSION['flash_type'] = "success";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus fasilitas.";
            $_SESSION['flash_type'] = "error";
        }
        header('Location: /pbl_semester3_lab_dt/admin/fasilitas');
        exit;
    }
}
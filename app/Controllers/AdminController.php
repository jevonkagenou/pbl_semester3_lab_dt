<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../../core/AuthMiddleware.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Kategori.php';
require_once __DIR__ . '/../Models/Member.php';
require_once __DIR__ . '/../Models/Publikasi.php';

use App\Models\User;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Publikasi;

class AdminController {
    private $userModel;
    private $kategoriModel;
    private $memberModel;
    private $publikasiModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        
        if (class_exists('AuthMiddleware')) {
            \AuthMiddleware::checkRole('admin');
        }

        $this->userModel = new User();
        $this->kategoriModel = new Kategori();
        $this->memberModel = new Member();
        $this->publikasiModel = new Publikasi();
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
}
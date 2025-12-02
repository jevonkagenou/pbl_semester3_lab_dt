<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../../core/AuthMiddleware.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Kategori.php';
require_once __DIR__ . '/../Models/Member.php';

use App\Models\User;
use App\Models\Kategori;
use App\Models\Member;

class AdminController {
    private $userModel;
    private $kategoriModel;
    private $memberModel;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        \AuthMiddleware::checkRole('admin'); 
        $this->userModel = new User();
        $this->kategoriModel = new Kategori();
        $this->memberModel = new Member();
    }

    public function index() {
        $editors = $this->userModel->getEditors();
        $stats = $this->userModel->getEditorStats();
        $chartProfileVisit = [
            'series' => [
                [
                    'name' => 'Member Baru',
                    'data' => [10, 41, 35, 51, 49, 62, 69, 91, 148, 60, 50, 20]
                ],
                [
                    'name' => 'Pengunjung',
                    'data' => [20, 50, 40, 60, 59, 70, 75, 100, 160, 70, 60, 30]
                ]
            ],
            'categories' => ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        ];

        $totalEditor = count($editors);
        $totalMember = count($this->memberModel->getAll()); 
        $totalAdmin = 1;

        $chartVisitorsProfile = [
            'series' => [$totalAdmin, $totalEditor, $totalMember],
            'labels' => ['Admin', 'Editor', 'Member']
        ];

        \View::render('admin-page/dashboard', [
            'editors' => $editors,
            'stats' => $stats,
            'chartProfileVisit' => $chartProfileVisit,
            'chartVisitorsProfile' => $chartVisitorsProfile
        ]); 
    }

    public function storeEditor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($username) || empty($password)) {
                $_SESSION['flash_message'] = "Gagal! Username dan Password wajib diisi.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

            if (strlen($username) < 4 || strlen($username) > 50) {
                $_SESSION['flash_message'] = "Gagal! Username harus 4-50 karakter.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

            if (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                $_SESSION['flash_message'] = "Gagal! Username hanya boleh huruf, angka, dan underscore.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

            if (strlen($password) < 6) {
                $_SESSION['flash_message'] = "Gagal! Password minimal 6 karakter.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

            if ($this->userModel->getByUsername($username)) {
                $_SESSION['flash_message'] = "Gagal! Username sudah digunakan.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

            $data = ['username' => $username, 'password' => $password];
            
            if ($this->userModel->createEditor($data)) {
                $_SESSION['flash_message'] = "Editor berhasil ditambahkan!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Terjadi kesalahan sistem.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/editor');
            exit;
        }
    }

    public function updateEditor() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $username = trim($_POST['username'] ?? '');
            $status = $_POST['status'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($id) || empty($username)) {
                $_SESSION['flash_message'] = "Gagal! Data tidak valid.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

            if (strlen($username) < 4 || strlen($username) > 50) {
                $_SESSION['flash_message'] = "Gagal! Username harus 4-50 karakter.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

            if (!empty($password) && strlen($password) < 6) {
                $_SESSION['flash_message'] = "Gagal! Password baru minimal 6 karakter.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

            $existing = $this->userModel->getByUsername($username);
            if ($existing && $existing['id'] != $id) {
                $_SESSION['flash_message'] = "Gagal! Username sudah dipakai user lain.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/editor');
                exit;
            }

             $data = ['id' => $id, 'username' => $username, 'password' => $password, 'status' => $status];

            if ($this->userModel->updateEditor($data)) {
                $_SESSION['flash_message'] = "Data editor diperbarui!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal update data.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/editor');
            exit;
        }
    }

    public function deleteEditor() {
        $id = $_GET['id'] ?? null;
        if($id && $this->userModel->deleteEditor($id)) {
            $_SESSION['flash_message'] = "Editor dihapus!";
            $_SESSION['flash_type'] = "success";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus editor.";
            $_SESSION['flash_type'] = "error";
        }
        header('Location: /pbl_semester3_lab_dt/admin/editor');
        exit;
    }

    public function storeKategori() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $namakategori = trim($_POST['namakategori'] ?? '');

            if (empty($namakategori)) {
                $_SESSION['flash_message'] = "Gagal! Nama Kategori wajib diisi.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/kategori');
                exit;
            }

            if ($this->kategoriModel->getByName($namakategori)) {
                $_SESSION['flash_message'] = "Gagal! Kategori tersebut sudah ada.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/kategori');
                exit;
            }

            if ($this->kategoriModel->create(['namakategori' => $namakategori])) {
                $_SESSION['flash_message'] = "Kategori ditambahkan!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal menambah kategori.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/kategori');
            exit;
        }
    }

    public function updateKategori() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $namakategori = trim($_POST['namakategori'] ?? '');

            if (empty($id) || empty($namakategori)) {
                $_SESSION['flash_message'] = "Gagal! Data tidak lengkap.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/kategori');
                exit;
            }

            $existing = $this->kategoriModel->getByName($namakategori);
            if ($existing && $existing['idkategori'] != $id) {
                $_SESSION['flash_message'] = "Gagal! Nama kategori sudah ada.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/kategori');
                exit;
            }

            if ($this->kategoriModel->update(['id' => $id, 'namakategori' => $namakategori])) {
                $_SESSION['flash_message'] = "Kategori diperbarui!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal update kategori.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/kategori');
            exit;
        }
    }

    public function deleteKategori() {
        $id = $_GET['id'] ?? null;
        if($id && $this->kategoriModel->delete($id)) {
            $_SESSION['flash_message'] = "Kategori dihapus!";
            $_SESSION['flash_type'] = "success";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus kategori.";
            $_SESSION['flash_type'] = "error";
        }
        header('Location: /pbl_semester3_lab_dt/admin/kategori');
        exit;
    }

    public function storeMember() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nip = trim($_POST['nip'] ?? '');
            $namamember = trim($_POST['namamember'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $gelar = trim($_POST['gelar'] ?? '');
            $bidangriset = trim($_POST['bidangriset'] ?? '');

            if (empty($nip) || empty($namamember) || empty($email) || empty($gelar)) {
                $_SESSION['flash_message'] = "Gagal! Semua kolom wajib diisi.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            if (!is_numeric($nip)) {
                $_SESSION['flash_message'] = "Gagal! NIP harus berupa angka.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['flash_message'] = "Gagal! Format email tidak valid.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            if ($this->memberModel->getByNip($nip)) {
                $_SESSION['flash_message'] = "Gagal! NIP $nip sudah terdaftar.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            if ($this->memberModel->getByEmail($email)) {
                $_SESSION['flash_message'] = "Gagal! Email $email sudah terdaftar.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            $fotoprofil = 'default.jpg';
            if (isset($_FILES['fotoprofil']) && $_FILES['fotoprofil']['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES['fotoprofil']['tmp_name'];
                $fileType = mime_content_type($fileTmp);
                $fileSize = $_FILES['fotoprofil']['size'];
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['flash_message'] = "Gagal! Format foto harus JPG/PNG.";
                    $_SESSION['flash_type'] = "error";
                    header('Location: /pbl_semester3_lab_dt/admin/member');
                    exit;
                }

                if ($fileSize > 2 * 1024 * 1024) {
                    $_SESSION['flash_message'] = "Gagal! Ukuran foto maksimal 2MB.";
                    $_SESSION['flash_type'] = "error";
                    header('Location: /pbl_semester3_lab_dt/admin/member');
                    exit;
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
                'nip' => $nip,
                'namamember' => $namamember,
                'gelar' => $gelar,
                'email' => $email,
                'bidangriset' => $bidangriset,
                'fotoprofil' => $fotoprofil,
                'statusmember' => 'active'
            ];
            
            if ($this->memberModel->create($data)) {
                $_SESSION['flash_message'] = "Member berhasil ditambahkan!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Terjadi kesalahan server.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/member');
            exit;
        }
    }

    public function updateMember() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            $nip = trim($_POST['nip'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $namamember = trim($_POST['namamember'] ?? '');
            $gelar = trim($_POST['gelar'] ?? '');
            $bidangriset = trim($_POST['bidangriset'] ?? '');
            $status = $_POST['statusmember'] ?? 'active';

            if (empty($id) || empty($nip) || empty($email) || empty($namamember)) {
                $_SESSION['flash_message'] = "Gagal! Data wajib tidak boleh kosong.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            if (!is_numeric($nip)) {
                $_SESSION['flash_message'] = "Gagal! NIP harus angka.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['flash_message'] = "Gagal! Email tidak valid.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            $existingNip = $this->memberModel->getByNip($nip);
            if ($existingNip && $existingNip['idmember'] != $id) {
                $_SESSION['flash_message'] = "Gagal! NIP sudah digunakan member lain.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            $existingEmail = $this->memberModel->getByEmail($email);
            if ($existingEmail && $existingEmail['idmember'] != $id) {
                $_SESSION['flash_message'] = "Gagal! Email sudah digunakan member lain.";
                $_SESSION['flash_type'] = "error";
                header('Location: /pbl_semester3_lab_dt/admin/member');
                exit;
            }

            $fotoprofil = $_POST['old_fotoprofil'] ?? '';
            
            if (isset($_FILES['fotoprofil']) && $_FILES['fotoprofil']['error'] === UPLOAD_ERR_OK) {
                $fileTmp = $_FILES['fotoprofil']['tmp_name'];
                $fileType = mime_content_type($fileTmp);
                $fileSize = $_FILES['fotoprofil']['size'];
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['flash_message'] = "Gagal! Format foto salah.";
                    $_SESSION['flash_type'] = "error";
                    header('Location: /pbl_semester3_lab_dt/admin/member');
                    exit;
                }

                if ($fileSize > 2 * 1024 * 1024) {
                    $_SESSION['flash_message'] = "Gagal! Foto max 2MB.";
                    $_SESSION['flash_type'] = "error";
                    header('Location: /pbl_semester3_lab_dt/admin/member');
                    exit;
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
                'id' => $id,
                'nip' => $nip,
                'namamember' => $namamember,
                'gelar' => $gelar,
                'email' => $email,
                'bidangriset' => $bidangriset,
                'fotoprofil' => $fotoprofil,
                'statusmember' => $status
            ];
            
            if ($this->memberModel->update($data)) {
                $_SESSION['flash_message'] = "Data member diperbarui!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal update data.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/admin/member');
            exit;
        }
    }

    public function deleteMember() {
        $id = $_GET['id'] ?? null;
        if($id && $this->memberModel->delete($id)) {
            $_SESSION['flash_message'] = "Member dihapus!";
            $_SESSION['flash_type'] = "success";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus member.";
            $_SESSION['flash_type'] = "error";
        }
        header('Location: /pbl_semester3_lab_dt/admin/member');
        exit;
    }
}
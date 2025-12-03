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

    public function storePublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'judulpublikasi' => $_POST['judulpublikasi'],
                'tahunterbit'    => $_POST['tahunterbit'],
                'penulis'        => $_POST['penulis'],
                'kategori'       => $_POST['kategori'],
                'ringkasan'      => $_POST['ringkasan'],
                'linkfile'       => $_POST['linkfile']
            ];

            if ($this->publikasiModel->create($data)) {
                $_SESSION['flash_message'] = "Publikasi diajukan!";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Gagal mengajukan.";
                $_SESSION['flash_type'] = "error";
            }
            header('Location: /pbl_semester3_lab_dt/editor/publikasi');
            exit;
        }
    }

    public function updatePublikasi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id'             => $_POST['id'],
                'judulpublikasi' => $_POST['judulpublikasi'],
                'tahunterbit'    => $_POST['tahunterbit'],
                'penulis'        => $_POST['penulis'],
                'kategori'       => $_POST['kategori'],
                'ringkasan'      => $_POST['ringkasan'],
                'linkfile'       => $_POST['linkfile']
            ];

            if ($this->publikasiModel->update($data)) {
                $_SESSION['flash_message'] = "Publikasi diperbarui!";
                $_SESSION['flash_type'] = "success";
            }
            header('Location: /pbl_semester3_lab_dt/editor/publikasi');
            exit;
        }
    }

    public function deletePublikasi() {
        $id = $_GET['id'] ?? null;
        if($id && $this->publikasiModel->delete($id)) {
            $_SESSION['flash_message'] = "Publikasi dihapus!";
            $_SESSION['flash_type'] = "success";
        }
        header('Location: /pbl_semester3_lab_dt/editor/publikasi');
        exit;
    }
}
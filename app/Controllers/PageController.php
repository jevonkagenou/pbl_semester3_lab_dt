<?php
require_once __DIR__ . '/../../core/View.php';
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

class PageController {

    public function index() { \View::render('landing-page/index'); }
    public function sejarah() { \View::render('landing-page/sejarah'); }
    public function blog() { \View::render('landing-page/blog'); }
    public function login() { \View::render('landing-page/login'); }
    public function tataTertib() { \View::render('landing-page/tata-tertib'); }
    public function strukturOrganisasi() { \View::render('landing-page/struktur-organisasi'); }
    public function VisidanMisi() { \View::render('landing-page/visi-dan-misi'); }
    public function saranaPrasarana() { \View::render('landing-page/sarana-prasarana'); }
    public function programDiplomaIVTI() { \View::render('landing-page/teknik-informatika'); }
    public function programDiplomaIVSIB() { \View::render('landing-page/sistem-informasi-bisnis'); }
    public function aturanAkademik() { \View::render('landing-page/aturan-akademik'); }
    public function kalender() { \View::render('landing-page/kalender'); }
    public function penelitian() { \View::render('landing-page/penelitian'); }


    public function adminDashboard() {
        $userModel = new User();
        $memberModel = new Member();
        
        $editors = $userModel->getEditors();
        $stats = $userModel->getEditorStats();
        
        $chartProfileVisit = [
            'series' => [
                ['name' => 'Member Baru', 'data' => [10, 41, 35, 51, 49, 62, 69, 91, 148, 60, 50, 20]],
                ['name' => 'Pengunjung', 'data' => [20, 50, 40, 60, 59, 70, 75, 100, 160, 70, 60, 30]]
            ],
            'categories' => ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        ];

        $totalEditor = count($editors);
        $totalMember = count($memberModel->getAll());
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

    public function adminEditor() {
        $userModel = new User();
        $editors = $userModel->getEditors();
        $stats = $userModel->getEditorStats();
        \View::render('admin-page/editor', ['editors' => $editors, 'stats' => $stats]);
    }

    public function adminKategori() {
        $kategoriModel = new Kategori();
        $kategori = $kategoriModel->getAll();
        \View::render('admin-page/kategori', ['kategori' => $kategori]);
    }

    public function adminMember() {
        $memberModel = new Member();
        $members = $memberModel->getAll();
        $stats = $memberModel->getStats();
        \View::render('admin-page/member', ['members' => $members, 'stats' => $stats]);
    }

    public function adminPublikasi() {
        $publikasiModel = new Publikasi();
        $memberModel = new Member();
        $kategoriModel = new Kategori();

        $publikasi = $publikasiModel->getAll();
        $stats = $publikasiModel->getStats();
        $members = $memberModel->getAll();
        $kategori = $kategoriModel->getAll();

        \View::render('admin-page/publikasi', [
            'publikasi' => $publikasi,
            'stats'     => $stats,
            'members'   => $members,
            'kategori'  => $kategori
        ]);
    }

    public function adminFasilitas() {
        $fasilitasModel = new Fasilitas();
        $fasilitas = $fasilitasModel->getAll();
        $stats = $fasilitasModel->getStats();
        \View::render('admin-page/fasilitas', ['fasilitas' => $fasilitas, 'stats' => $stats]);
    }

    public function editorDashboard() {
        \View::render('editor-page/dashboard');
    }

    public function editorPublikasi() {
        $publikasiModel = new Publikasi();
        $memberModel = new Member();
        $kategoriModel = new Kategori();

        $dataPublikasi = $publikasiModel->getAll();
        $kategori = $kategoriModel->getAll();
        $members = $memberModel->getAll();
        $stats = $publikasiModel->getStats();

        \View::render('editor-page/publikasi', [
            'publikasi' => $dataPublikasi,
            'kategori' => $kategori,
            'members' => $members,
            'stats' => $stats
        ]);
    }
}
<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/Kategori.php';
require_once __DIR__ . '/../Models/Member.php';

use App\Models\User;
use App\Models\Kategori;
use App\Models\Member;

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

    // --- HALAMAN ADMIN ---

    public function editors() {
        $userModel = new User();
        $editors = $userModel->getEditors();
        $stats = $userModel->getEditorStats();
        \View::render('admin-page/editor', ['editors' => $editors, 'stats' => $stats]);
    }

    public function kategori() {
        $kategoriModel = new Kategori();
        $kategori = $kategoriModel->getAll();
        \View::render('admin-page/kategori', ['kategori' => $kategori]);
    }

    public function member() {
        $memberModel = new Member();
        $members = $memberModel->getAll();
        $stats = $memberModel->getStats();
        \View::render('admin-page/member', ['members' => $members, 'stats' => $stats]);
    }
}
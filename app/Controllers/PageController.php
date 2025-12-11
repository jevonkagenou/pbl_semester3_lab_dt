<?php
require_once __DIR__ . '/../../core/View.php';
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

class PageController {

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index() {
        $memberModel = new \App\Models\Member();
        $members = $memberModel->getAll();
        $publikasiModel = new \App\Models\Publikasi();
        $allPublikasi = $publikasiModel->getAll();
        $acceptedPublikasi = array_filter($allPublikasi, function($item) {
            return $item['status_publikasi'] === 'terima';
        });
        $recentPublikasi = array_slice($acceptedPublikasi, 0, 3);

        $data = [
            'members' => $members,
            'publikasi' => $recentPublikasi
        ];

        \View::render('landing-page/index', $data);
    }

    public function sejarah() { \View::render('landing-page/sejarah'); }

    public function berita() {
        $beritaModel = new Berita();
        $rawData = $beritaModel->getAll();
        $berita = array_filter($rawData, function($item) {
            return $item['status_berita'] === 'terima';
        });
        usort($berita, function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
        $carouselData = array_slice($berita, 0, 3);
        $kategoriList = [];
        $yearsList = [];

        foreach ($berita as $item) {
            if (!empty($item['namakategori'])) {
                $cats = explode(', ', $item['namakategori']);
                foreach ($cats as $cat) {
                    $kategoriList[] = trim($cat);
                }
            }
            if (!empty($item['created_at'])) {
                $yearsList[] = date('Y', strtotime($item['created_at']));
            }
        }
        $data = [
            'berita' => array_values($berita),
            'carousel' => $carouselData,
            'kategori' => array_unique($kategoriList),
            'years' => array_unique($yearsList)
        ];
        \View::render('landing-page/berita', $data);
    }

    public function detailBerita() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: ' . BASE_URL . '/berita');
            exit;
        }
        $beritaModel = new Berita();
        $berita = $beritaModel->getById($id);
        
        if (!$berita || $berita['status_berita'] !== 'terima') {
            header('Location: ' . BASE_URL . '/berita');
            exit;
        }

        $fotoPath = __DIR__ . '/../../public/uploads/berita/' . $berita['fotodokumentasi'];
        if (empty($berita['fotodokumentasi']) || !file_exists($fotoPath)) {
            $berita['fotodokumentasi'] = 'default-image.jpg'; 
        }

        \View::render('landing-page/detail-berita', ['berita' => $berita]);
    }

    public function login() { \View::render('landing-page/login'); }
    public function tataTertib() { \View::render('landing-page/tata-tertib'); }
    
    public function strukturOrganisasi() {
        $memberModel = new \App\Models\Member();
        $members = $memberModel->getAll();
        $data = ['members' => $members];
        \View::render('landing-page/struktur-organisasi', $data);
    }

    public function VisidanMisi() { \View::render('landing-page/visi-dan-misi'); }
    
    public function saranaPrasarana() {
        $fasilitasModel = new Fasilitas();
        $dataFasilitas = $fasilitasModel->getAll();
        $data = ['fasilitas' => $dataFasilitas];
        \View::render('landing-page/sarana-prasarana', $data);
    }

    public function programDiplomaIVTI() { \View::render('landing-page/teknik-informatika'); }
    public function programDiplomaIVSIB() { \View::render('landing-page/sistem-informasi-bisnis'); }
    public function aturanAkademik() { \View::render('landing-page/aturan-akademik'); }
    public function kalender() { \View::render('landing-page/kalender'); }

    public function penelitian() {
        $publikasiModel = new Publikasi();
        $kategoriModel = new Kategori();
        $allPublikasi = $publikasiModel->getAll();
        $allKategori = $kategoriModel->getAll('publikasi');
        $acceptedPublikasi = array_filter($allPublikasi, function($item) {
            return $item['status_publikasi'] === 'terima';
        });
        $years = array_unique(array_column($acceptedPublikasi, 'tahunterbit'));
        rsort($years);
        $data = [
            'publikasi' => array_values($acceptedPublikasi),
            'kategori' => $allKategori,
            'years' => $years
        ];
        \View::render('landing-page/penelitian', $data);
    }

    public function adminDashboard() {
        $userModel = new User();
        $memberModel = new Member();
        $beritaModel = new Berita();
        $publikasiModel = new Publikasi();
        
        $totalMember = $memberModel->countAll();
        $totalBerita = $beritaModel->getTotalApproved();
        $totalPublikasi = $publikasiModel->getTotalApproved();
        $editors = $userModel->getEditors();
        $totalEditor = count($editors);
        $totalAdmin = 1; 

        $currentYear = date('Y');
        $beritaMonthly = $beritaModel->getMonthlyStats($currentYear);
        $publikasiMonthly = $publikasiModel->getMonthlyStats($currentYear);

        $dataBeritaChart = array_fill(0, 12, 0);
        $dataPublikasiChart = array_fill(0, 12, 0);

        foreach ($beritaMonthly as $month => $count) {
            $index = (int)$month - 1;
            if ($index >= 0 && $index < 12) $dataBeritaChart[$index] = (int)$count;
        }
        foreach ($publikasiMonthly as $month => $count) {
            $index = (int)$month - 1;
            if ($index >= 0 && $index < 12) $dataPublikasiChart[$index] = (int)$count;
        }

        $chartTrend = [
            'series' => [
                ['name' => 'Berita Disetujui', 'data' => $dataBeritaChart],
                ['name' => 'Publikasi Disetujui', 'data' => $dataPublikasiChart]
            ],
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
        ];

        $chartVisitorsProfile = [
            'series' => [$totalAdmin, $totalEditor, $totalMember],
            'labels' => ['Admin', 'Editor', 'Member']
        ];

        \View::render('admin-page/dashboard', [
            'totalMember' => $totalMember,
            'totalEditor' => $totalEditor,
            'totalBerita' => $totalBerita,
            'totalPublikasi' => $totalPublikasi,
            'beritaMonth' => array_sum($dataBeritaChart),
            'publikasiMonth' => array_sum($dataPublikasiChart),
            'chartTrend' => $chartTrend,
            'chartVisitorsProfile' => $chartVisitorsProfile,
            'editors' => $editors
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
        $kategoriBerita = $kategoriModel->getAll('berita');
        $kategoriPublikasi = $kategoriModel->getAll('publikasi');
        \View::render('admin-page/kategori', [
            'kategoriBerita' => $kategoriBerita,
            'kategoriPublikasi' => $kategoriPublikasi
        ]);
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
        $kategori = $kategoriModel->getAll('publikasi'); 

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

    public function adminBerita() {
        $beritaModel = new Berita();
        $memberModel = new Member();
        $kategoriModel = new Kategori(); 

        $berita = $beritaModel->getAll();
        $stats = $beritaModel->getStats();
        $members = $memberModel->getAll();
        $kategori = $kategoriModel->getAll('berita');

        \View::render('admin-page/berita', [
            'berita' => $berita,
            'stats' => $stats,
            'members' => $members,
            'kategori' => $kategori 
        ]);
    }

    public function editorDashboard() {
        \View::render('editor-page/dashboard');
    }

    public function editorPublikasi() {
        $publikasiModel = new Publikasi();
        $memberModel = new Member();
        $kategoriModel = new Kategori();

        $currentUserId = $_SESSION['user_id'] ?? null;
        
        if ($currentUserId) {
            $dataPublikasi = $publikasiModel->getByCreator($currentUserId);
            $stats = $publikasiModel->getStatsByCreator($currentUserId);
        } else {
            $dataPublikasi = [];
            $stats = ['total' => 0, 'terima' => 0, 'tolak' => 0, 'pending' => 0];
        }

        $kategori = $kategoriModel->getAll('publikasi');
        $members = $memberModel->getAll();

        \View::render('editor-page/publikasi', [
            'publikasi' => $dataPublikasi,
            'kategori' => $kategori,
            'members' => $members,
            'stats' => $stats
        ]);
    }

    public function editorBerita() {
        $beritaModel = new Berita();
        $memberModel = new Member();
        $kategoriModel = new Kategori();

        $currentUserId = $_SESSION['user_id'] ?? null;

        if ($currentUserId) {
            $berita = $beritaModel->getByCreator($currentUserId);
            $stats = $beritaModel->getStatsByCreator($currentUserId);
        } else {
            $berita = [];
            $stats = ['total' => 0, 'terima' => 0, 'tolak' => 0, 'pending' => 0];
        }

        $members = $memberModel->getAll();
        $kategori = $kategoriModel->getAll('berita');

        \View::render('editor-page/berita', [
            'berita' => $berita,
            'members' => $members,
            'stats' => $stats,
            'kategori' => $kategori
        ]);
    }
}
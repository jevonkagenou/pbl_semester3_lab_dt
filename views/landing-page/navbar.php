<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$href = BASE_URL . '/login';
$text = 'Login';

if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    
    $text = 'Dashboard';
    
    $role = $_SESSION['user_role'] ?? '';
    
    if ($role === 'admin') {
        $href = BASE_URL . '/admin';
    } elseif ($role === 'editor') {
        $href = BASE_URL . '/editor';
    }
}
?>

<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="<?= BASE_URL ?>/" class="logo d-flex align-items-center me-auto">
      <img src="<?= BASE_URL ?>//public/assets/img/logoLab/lab-dt.png" alt="LAB TDA">
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="<?= BASE_URL ?>/" class="active">Beranda</a></li>

        <li class="dropdown"><a href="#"><span>Tentang Kami</span> <i
              class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?= BASE_URL ?>/sejarah">Sejarah</a></li>
            <li><a href="<?= BASE_URL ?>/visi-dan-misi">Visi dan Misi</a></li>
            <li><a href="<?= BASE_URL ?>/struktur-organisasi">Struktur Organisasi</a></li>
            <li><a href="<?= BASE_URL ?>/sarana-prasarana">Sarana dan Prasarana</a></li>
          </ul>
        </li>

        <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li class="dropdown">
              <a href="#">
                <span>Program Diploma IV</span>
                <i class="bi bi-chevron-right toggle-dropdown"></i>
              </a>
              <ul class="submenu-right">
                <li><a href="<?= BASE_URL ?>/program-diploma-iv/ti">DIV-Teknik Informatika</a></li>
                <li><a href="<?= BASE_URL ?>/program-diploma-iv/sib">DIV-Sistem Informasi Bisnis</a></li>
              </ul>
            </li>
            <li><a href="<?= BASE_URL ?>/aturan-akademik">Aturan Akademik</a></li>
            <li><a href="<?= BASE_URL ?>/kalender">Kalender</a></li>
          </ul>
        </li>

        <li class="dropdown"><a href="<?= BASE_URL ?>/tata-tertib"><span>Tata Tertib</span></a>
        </li>

        <!-- <li><a href="<?= BASE_URL ?>/penelitian">Penelitian</a></li> -->
        <li><a href="https://sinta.kemdiktisaintek.go.id/authors/profile/6681213">Sinta</a></li>

        <li><a href="<?= BASE_URL ?>/berita">Berita</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <a class="btn-getstarted flex-md-shrink-0" href="<?= $href ?>">
      <?= $text ?>
    </a>

  </div>
</header>

<style>
  .navmenu {
    padding: 0;
  }

  .navmenu ul {
    margin: 0;
    padding: 0;
    display: flex;
    list-style: none;
    align-items: center;
  }

  .navmenu li {
    position: relative;
  }

  .navmenu a {
    text-decoration: none;
    white-space: nowrap;
  }

  .navmenu>ul>li>a {
    color: #27505B;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .navmenu>ul>li>a:hover,
  .navmenu>ul>li>a.active {
    color: #052f39;
  }

  .navmenu .dropdown ul {
    display: block;
    position: absolute;
    top: 100%;
    left: 0;
    margin: 0;
    padding: 10px;
    background: #ffffff;
    border-radius: 8px;
    min-width: 220px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    z-index: 99;
    border: 1px solid rgba(0, 0, 0, 0.05);
    visibility: hidden;
    opacity: 0;
    transition: 0.3s;
  }

  .navmenu .dropdown:hover>ul {
    visibility: visible;
    opacity: 1;
    display: block;
  }

  .navmenu .dropdown ul li {
    min-width: 200px;
    position: relative !important;
  }

  .navmenu .dropdown ul li a {
    padding: 10px 15px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 14px;
    color: #27505B;
    background: transparent;
    border-radius: 5px;
    transition: 0.3s;
    font-weight: 500;
    text-transform: none;
  }

  .navmenu .dropdown ul li a:hover,
  .navmenu .dropdown ul li a.active,
  .navmenu .dropdown ul li:hover>a {
    background-color: #27505B;
    color: #ffffff;
  }

  .navmenu .dropdown ul ul {
    position: absolute !important;
    top: 0 !important;
    left: 100% !important;
    right: auto !important;
    margin-left: 15px !important;
    margin-top: -10px !important;
    background: #ffffff !important;
    padding: 10px;
    border-radius: 8px;
    min-width: 240px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.05);
    transform: none !important;
    z-index: 9999 !important;
    visibility: hidden;
    opacity: 0;
  }

  .navmenu .dropdown ul li:hover>ul {
    visibility: visible;
    opacity: 1;
    display: block;
  }

  .navmenu .dropdown ul ul::before {
    content: "";
    position: absolute;
    top: 0;
    left: -20px;
    width: 20px;
    height: 100%;
    background: transparent;
  }

  .toggle-dropdown {
    font-size: 12px;
    margin-left: 5px;
  }

  @media (max-width: 1199px) {
    .mobile-nav-toggle {
      display: block;
    }

    .navmenu ul {
      display: none;
    }
  }
</style>
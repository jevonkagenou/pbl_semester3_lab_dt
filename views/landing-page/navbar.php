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
        $href = BASE_URL . 'admin';
    } elseif ($role === 'editor') {
        $href = BASE_URL . 'editor';
    }
}
?>

<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
       <img src="<?= BASE_URL ?>/public/assets/img/logoLab/lab-dt.png" alt="LAB TDA">
    </a>
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="<?= BASE_URL ?>/" class="active">Beranda<br></a></li>
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
            <li><a href="<?= BASE_URL ?>/program-diploma-iv">Program Diploma IV </a></li>
            <li><a href="<?= BASE_URL ?>/aturan-akademik">Aturan Akademik</a></li>
            <li><a href="<?= BASE_URL ?>/kalender">Kalender</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="<"><span>Kemahasiswaan</span> <i
              class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="<?= BASE_URL ?>/tata-tertib">Tata Tertib</a></li>
          </ul>
        </li>
        <a href="<?= BASE_URL ?>/penelitian"><span>Penelitian</span> </i></a>

        </li>
        <li><a href="<?= BASE_URL ?>/blog">Blog</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    <a class="btn-getstarted flex-md-shrink-0" href="<?= $href ?>">
      <?= $text ?>
    </a>

  </div>
</header>

<style>
  /* WRAPPER NAVMENU */
  .navmenu ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  /* BASE DROPDOWN */
  .navmenu .dropdown {
    position: relative;
  }

  .navmenu .dropdown>ul {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #fcfcfcff;
    padding: 10px 0;
    border-radius: 12px;
    min-width: 220px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
  }

  .navmenu .dropdown:hover>ul {
    display: block;
  }

  /* ITEM MENU LEVEL 1 */
  .navmenu>ul>li>a {
    padding: 12px 18px;
    display: block;
    font-weight: 500;
    color: #27505B;
    ;
  }

  /* SUBMENU LEVEL 1 (like screenshot: dark rounded) */
  .navmenu .dropdown ul li a {
    padding: 10px 18px;
    display: block;
    color: #27505B;
    ;
    font-size: 14px;
    transition: 0.2s ease;
    border-radius: 8px;
  }

  .navmenu .dropdown ul li a:hover {
    background: #052f39;
  }

  /* SUBMENU LEVEL 2 (yang muncul di kanan) */
  .navmenu .dropdown ul li:hover>ul {
    display: block;
  }

  .navmenu .dropdown ul ul {
    position: absolute;
    top: 0;
    left: 220px;
    background: #ffffff;
    padding: 10px 0;
    border-radius: 12px;
    min-width: 240px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
  }

  .navmenu .dropdown ul ul li a {
    color: #0f4c5c;
    background: transparent;
  }

  .navmenu .dropdown ul ul li a:hover {
    background: rgba(0, 0, 0, 0.06);
  }

  /* ICON ARROW */
  .toggle-dropdown {
    margin-left: 6px;
    font-size: 14px;
  }

  /* RESPONSIVE */
  @media (max-width: 991px) {

    .navmenu .dropdown>ul,
    .navmenu .dropdown ul ul {
      position: static;
      box-shadow: none;
      background: #f5f5f5;
      margin-left: 10px;
      border-radius: 10px;
    }

    .navmenu .dropdown ul li a {
      color: #333 !important;
    }

    .navmenu .dropdown ul ul {
      margin-left: 20px;
    }

    .navmenu .dropdown ul li a:hover {
      background: rgba(0, 0, 0, 0.08);
    }
  }
</style>
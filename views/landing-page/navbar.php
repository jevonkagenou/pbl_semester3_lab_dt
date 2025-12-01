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
      <img src="<?= BASE_URL ?>public/assets/img/lab-dt.png" alt="">
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
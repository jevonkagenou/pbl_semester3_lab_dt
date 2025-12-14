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
              <ul>
                <li><a href="<?= BASE_URL ?>/program-diploma-iv/ti">DIV-Teknik Informatika</a></li>
                <li><a href="<?= BASE_URL ?>/program-diploma-iv/sib">DIV-Sistem Informasi Bisnis</a></li>
              </ul>
            </li>
            <li><a href="<?= BASE_URL ?>/aturan-akademik">Aturan Akademik</a></li>
            <li><a href="<?= BASE_URL ?>/kalender">Kalender</a></li>
          </ul>
        </li>

        <li class="dropdown"><a href="<?= BASE_URL ?>/tata-tertib"><span>Tata Tertib</span></a></li>
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
    display: block !important;
    position: absolute !important;
    top: 100% !important;
    left: 0 !important;
    margin: 0 0 0pt !important;
    padding: 10px !important;
    background: #ffffff !important;
    border-radius: 8px !important;
    min-width: 220px !important;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1) !important;
    z-index: 99 !important;
    border: 1px solid rgba(0, 0, 0, 0.05) !important;
    visibility: hidden !important;
    opacity: 0 !important;
    transition: 0.3s !important;
  }

  .navmenu .dropdown:hover>ul {
    visibility: visible !important;
    opacity: 1 !important;
  }

  .navmenu .dropdown ul li {
    min-width: 200px !important;
    position: relative !important;
  }

  .navmenu .dropdown ul li a {
    padding: 10px 15px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    font-size: 14px !important;
    color: #27505B !important;
    background: transparent !important;
    border-radius: 5px !important;
    transition: 0.3s !important;
    font-weight: 500 !important;
    text-transform: none !important;
  }

  .navmenu .dropdown ul li a:hover,
  .navmenu .dropdown ul li a.active,
  .navmenu .dropdown ul li:hover>a {
    background-color: #27505B !important;
    color: #ffffff !important;
  }

  .navmenu .dropdown ul ul {
    position: absolute !important;
    top: 0 !important;
    left: 100% !important;
    margin-left: 15px !important;
    margin-top: 0 !important;

    visibility: hidden !important;
    opacity: 0 !important;
    z-index: 9999 !important;
    background: #ffffff !important;
    padding: 10px !important;
    border-radius: 8px !important;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1) !important;
    border: 1px solid rgba(0, 0, 0, 0.05) !important;
    transition: 0.3s !important;
  }

  .navmenu .dropdown ul ul::before {
    content: "" !important;
    position: absolute !important;
    top: 0 !important;
    left: -20px !important;
    width: 25px !important;
    height: 100% !important;
    background: transparent !important;
  }

  .navmenu .dropdown ul li:hover>ul {
    visibility: visible !important;
    opacity: 1 !important;
    left: 100% !important;
    top: 0 !important;
  }

  .navmenu .dropdown ul li:hover>ul {
    visibility: visible !important;
    opacity: 1 !important;
    left: 100% !important;
    top: 0 !important;
  }

  .toggle-dropdown {
    font-size: 12px;
    margin-left: 5px;
  }

  .mobile-nav-toggle {
    display: none;
    cursor: pointer;
    font-size: 28px;
    color: #27505B;
    margin-left: 20px;
    transition: 0.3s;
  }

  @media (max-width: 1199px) {
    .mobile-nav-toggle {
      display: block;
      position: relative;
      z-index: 1001;
    }

    .navmenu {
      position: relative;
    }

    .navmenu>ul {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.9);
      width: 90%;
      max-width: 400px;
      max-height: 85vh;
      background: #ffffff;
      padding: 20px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
      border-radius: 12px;
      z-index: 1000;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      overflow-y: auto;
      visibility: hidden;
      opacity: 0;
      transition: all 0.3s ease-in-out;
    }

    .navmenu>ul.show {
      visibility: visible;
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }

    .navmenu>ul>li {
      width: 100%;
      margin-bottom: 5px;
    }

    .navmenu>ul>li>a {
      padding: 12px 15px;
      border-radius: 8px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      width: 100%;
      font-size: 16px;
    }

    .navmenu>ul>li>a:hover {
      background-color: rgba(39, 80, 91, 0.05);
    }

    .navmenu .dropdown ul {
      position: static !important;
      display: none !important;
      visibility: visible !important;
      opacity: 1 !important;
      box-shadow: none !important;
      border: none !important;
      padding: 10px !important;
      width: 100% !important;
      margin-top: 5px !important;
      background: rgba(39, 80, 91, 0.05) !important;
      border-radius: 8px !important;
      transform: none !important;
    }

    .navmenu .dropdown ul.show {
      display: block !important;
    }

    .navmenu .dropdown ul li a {
      padding: 10px 15px;
      font-size: 14px;
    }

    .navmenu .dropdown ul ul {
      position: static !important;
      margin: 0 !important;
      padding-left: 20px !important;
      width: 100% !important;
      background: rgba(39, 80, 91, 0.03) !important;
      transform: none !important;
      display: none !important;
    }

    .navmenu .dropdown ul ul.show {
      display: block !important;
    }

    .navmenu .dropdown>a .bi-chevron-down {
      transition: transform 0.3s;
    }

    .navmenu .dropdown>a.active .bi-chevron-down {
      transform: rotate(180deg);
    }

    .navmenu .dropdown ul li .bi-chevron-right {
      transition: transform 0.3s;
    }

    .navmenu .dropdown ul li.active .bi-chevron-right {
      transform: rotate(90deg);
    }
  }

  @media (min-width: 1200px) {
    .navmenu>ul {
      display: flex !important;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const mobileToggle = document.querySelector('.mobile-nav-toggle');
    const navMenu = document.querySelector('.navmenu > ul');

    if (mobileToggle && navMenu) {
      mobileToggle.addEventListener('click', function (e) {
        e.stopPropagation();
        navMenu.classList.toggle('show');
        this.classList.toggle('bi-list');
        this.classList.toggle('bi-x');
      });

      document.addEventListener('click', function (event) {
        if (!event.target.closest('.navmenu') && !event.target.closest('.mobile-nav-toggle')) {
          navMenu.classList.remove('show');
          mobileToggle.classList.add('bi-list');
          mobileToggle.classList.remove('bi-x');

          document.querySelectorAll('.navmenu .dropdown ul').forEach(menu => {
            menu.classList.remove('show');
          });
          document.querySelectorAll('.navmenu .dropdown > a, .navmenu .dropdown ul li > a').forEach(link => {
            link.classList.remove('active');
          });
        }
      });
    }

    const dropdowns = document.querySelectorAll('.navmenu .dropdown > a');
    dropdowns.forEach(dropdown => {
      dropdown.addEventListener('click', function (e) {
        if (window.innerWidth < 1200) {
          e.preventDefault();
          e.stopPropagation();

          const parent = this.parentElement;
          const submenu = parent.querySelector('ul');

          if (submenu) {
            const isActive = this.classList.contains('active');

            document.querySelectorAll('.navmenu .dropdown ul').forEach(menu => {
              menu.classList.remove('show');
            });
            document.querySelectorAll('.navmenu .dropdown > a, .navmenu .dropdown ul li > a').forEach(
              link => {
                link.classList.remove('active');
              });

            if (!isActive) {
              submenu.classList.add('show');
              this.classList.add('active');
            }
          }
        }
      });
    });

    const nestedDropdowns = document.querySelectorAll('.navmenu .dropdown ul li > a');
    nestedDropdowns.forEach(dropdown => {
      dropdown.addEventListener('click', function (e) {
        if (window.innerWidth < 1200 && this.nextElementSibling && this.nextElementSibling.tagName ===
          'UL') {
          e.preventDefault();
          e.stopPropagation();

          const submenu = this.nextElementSibling;
          const isActive = this.classList.contains('active');

          if (submenu) {
            this.classList.toggle('active');
            submenu.classList.toggle('show');
          }
        }
      });
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth >= 1200) {
        navMenu.classList.remove('show');
        if (mobileToggle) {
          mobileToggle.classList.add('bi-list');
          mobileToggle.classList.remove('bi-x');
        }
        document.querySelectorAll('.navmenu .dropdown ul').forEach(menu => {
          menu.classList.remove('show');
        });
        document.querySelectorAll('.navmenu .dropdown > a, .navmenu .dropdown ul li > a').forEach(link => {
          link.classList.remove('active');
        });
      }
    });
  });
</script>
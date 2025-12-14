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
    padding: 15px 20px;
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
  }

  .navmenu .dropdown ul li {
    min-width: 200px;
    position: relative;
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
    position: absolute;
    top: 0;
    left: 100%;
    margin-left: 15px;
    margin-top: -10px;
    background: #ffffff;
    padding: 10px;
    border-radius: 8px;
    min-width: 240px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(0, 0, 0, 0.05);
    z-index: 9999;
    visibility: hidden;
    opacity: 0;
  }

  .navmenu .dropdown ul li:hover>ul {
    visibility: visible;
    opacity: 1;
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

    .navmenu > ul {
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

    .navmenu > ul.show {
      visibility: visible;
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }

    .navmenu > ul > li {
      width: 100%;
      margin-bottom: 5px;
    }

    .navmenu > ul > li > a {
      padding: 12px 15px;
      border-radius: 8px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      width: 100%;
      font-size: 16px;
    }
    
    .navmenu > ul > li > a:hover {
        background-color: rgba(39, 80, 91, 0.05);
    }

    .navmenu .dropdown ul {
      position: static;
      display: none;
      visibility: visible;
      opacity: 1;
      box-shadow: none;
      border: none;
      padding: 10px;
      width: 100%;
      margin-top: 5px;
      background: rgba(39, 80, 91, 0.05);
      border-radius: 8px;
    }

    .navmenu .dropdown ul.show {
      display: block;
    }

    .navmenu .dropdown ul li a {
      padding: 10px 15px;
      font-size: 14px;
    }

    .navmenu .dropdown ul ul {
      position: static;
      margin: 0;
      padding-left: 20px;
      width: 100%;
      background: rgba(39, 80, 91, 0.03);
    }

    .navmenu .dropdown > a .bi-chevron-down {
      transition: transform 0.3s;
    }

    .navmenu .dropdown > a.active .bi-chevron-down {
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
    .navmenu > ul {
      display: flex !important;
    }
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const mobileToggle = document.querySelector('.mobile-nav-toggle');
    const navMenu = document.querySelector('.navmenu > ul');
    
    if (mobileToggle && navMenu) {
      mobileToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        navMenu.classList.toggle('show');
        this.classList.toggle('bi-list');
        this.classList.toggle('bi-x');
      });
      
      document.addEventListener('click', function(event) {
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
      dropdown.addEventListener('click', function(e) {
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
            document.querySelectorAll('.navmenu .dropdown > a, .navmenu .dropdown ul li > a').forEach(link => {
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
      dropdown.addEventListener('click', function(e) {
        if (window.innerWidth < 1200 && this.nextElementSibling && this.nextElementSibling.tagName === 'UL') {
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
    
    window.addEventListener('resize', function() {
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
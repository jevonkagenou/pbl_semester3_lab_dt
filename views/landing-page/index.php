<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Profile Lab Data Technology</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
  <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>/public/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="<?= BASE_URL ?>/public/assets/css/main.css" rel="stylesheet">

  <style>
    :root {
      --color-primary: #27505B;
      --color-accent: #4dc4e0;
      --color-text: #444444;
      --color-bg-light: #f9fbfd;
    }

    .section-padding {
      padding: 80px 0;
    }

    #hero .row {
      transform: translateY(-30px);
    }

    .section-title h2 {
      color: var(--color-primary);
      font-size: 42px;
      font-weight: 700;
      margin-bottom: 25px;
      position: relative;
      padding-bottom: 15px;
    }

    .section-title-underline {
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 60px;
      background: var(--color-primary);
    }

    .section-desc {
      font-size: 16px;
      line-height: 1.8;
      color: var(--color-text);
      margin-bottom: 20px;
    }

    .about-img {
      border-radius: 24px;
      box-shadow: 0 15px 40px rgba(39, 80, 91, 0.15);
    }

    .research-card,
    .facility-box {
      background: #ffffff;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.4s ease;
    }

    .research-card:hover,
    .facility-box:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(39, 80, 91, 0.12) !important;
    }

    .research-title {
      font-size: 15px;
      font-weight: 700;
      color: var(--color-primary);
      margin-bottom: 0;
    }

    .publication-card {
      background: #ffffff;
      border: 1px solid rgba(0, 0, 0, 0.05);
      border-radius: 16px;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    .publication-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.4s ease;
      z-index: 2;
    }

    .publication-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(39, 80, 91, 0.15);
      border-color: rgba(77, 196, 224, 0.3);
    }

    .publication-card:hover::before {
      transform: scaleX(1);
    }

    .custom-badge {
      font-size: 0.75rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      padding: 6px 14px;
      border-radius: 30px;
    }

    .badge-inter {
      background: rgba(25, 135, 84, 0.1);
      color: #198754;
      border: 1px solid rgba(25, 135, 84, 0.2);
    }

    .badge-nas {
      background: rgba(13, 110, 253, 0.1);
      color: #0d6efd;
      border: 1px solid rgba(13, 110, 253, 0.2);
    }

    .badge-pros {
      background: rgba(255, 193, 7, 0.1);
      color: #ffc107;
      border: 1px solid rgba(255, 193, 7, 0.2);
    }

    .badge-def {
      background: rgba(13, 202, 240, 0.1);
      color: #0dcaf0;
      border: 1px solid rgba(13, 202, 240, 0.2);
    }

    .pub-title a {
      color: var(--color-primary);
      text-decoration: none;
      background-image: linear-gradient(to right, var(--color-accent), var(--color-accent));
      background-size: 0% 2px;
      background-repeat: no-repeat;
      background-position: left bottom;
      transition: background-size 0.3s ease;
    }

    .publication-card:hover .pub-title a {
      color: #000;
      background-size: 100% 2px;
    }

    .btn-read-more {
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--color-primary);
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .btn-read-more i {
      transition: transform 0.3s ease;
    }

    .publication-card:hover .btn-read-more {
      color: var(--color-accent);
    }

    .publication-card:hover .btn-read-more i {
      transform: translateX(5px);
    }

    .team-section {
      background-color: var(--color-primary);
      padding-bottom: 80px;
      position: relative;
      overflow: hidden;
    }

    .wave-separator {
      position: absolute;
      top: -1px;
      left: 0;
      width: 100%;
      overflow: hidden;
      line-height: 0;
    }

    .wave-svg {
      position: relative;
      display: block;
      width: calc(100% + 1.3px);
      height: 60px;
    }

    .glow-decoration {
      position: absolute;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(77, 196, 224, 0.15) 0%, rgba(39, 80, 91, 0) 70%);
      pointer-events: none;
      z-index: 1;
    }

    .glow-1 {
      top: 20%;
      left: -10%;
    }

    .glow-2 {
      bottom: 10%;
      right: -10%;
    }

    .team-container {
      position: relative;
      z-index: 2;
      margin-top: 60px;
    }

    .team-header-line {
      width: 60px;
      height: 3px;
      background: var(--color-accent);
      margin: 15px auto;
    }

    .team-card-futuristic {
      position: relative;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      overflow: hidden;
      transition: all 0.4s ease;
      height: 100%;
    }

    .team-card-futuristic:hover {
      transform: translateY(-10px);
      background: rgba(255, 255, 255, 0.1);
      border-color: var(--color-accent);
      box-shadow: 0 15px 40px rgba(77, 196, 224, 0.2);
    }

    .team-img-box {
      position: relative;
      width: 100%;
      padding-top: 110%;
      overflow: hidden;
    }

    .team-img-box img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .team-card-futuristic:hover .team-img-box img {
      transform: scale(1.1);
    }

    .team-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(39, 80, 91, 0.9) 0%, transparent 100%);
      opacity: 0;
      transition: opacity 0.4s ease;
      display: flex;
      align-items: flex-end;
      justify-content: center;
      padding-bottom: 30px;
    }

    .team-card-futuristic:hover .team-overlay {
      opacity: 1;
    }

    .team-social-links {
      display: flex;
      gap: 15px;
      transform: translateY(20px);
      transition: transform 0.4s ease;
    }

    .team-card-futuristic:hover .team-social-links {
      transform: translateY(0);
    }

    .team-social-btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: all 0.3s;
      text-decoration: none;
    }

    .team-social-btn:hover {
      background: var(--color-accent);
      color: #fff;
      border-color: var(--color-accent);
      transform: scale(1.1);
    }

    .team-info {
      padding: 20px;
      background: #fff;
      text-align: center;
      position: relative;
      z-index: 2;
    }

    .team-name {
      color: var(--color-primary);
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 5px;
    }

    .team-role {
      color: var(--color-accent);
      font-size: 0.85rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin: 0;
    }

    .team-slider .swiper-pagination-bullet {
      background: rgba(255, 255, 255, 0.5);
      opacity: 1;
      width: 10px;
      height: 10px;
      transition: all 0.3s;
    }

    .team-slider .swiper-pagination-bullet-active {
      background: var(--color-accent);
      width: 30px;
      border-radius: 5px;
    }

    .sop-card {
      background: linear-gradient(135deg, var(--color-primary) 0%, #162c33 100%);
      box-shadow: 0 20px 40px rgba(39, 80, 91, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .sop-card::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
      background-size: 20px 20px;
      opacity: 0.3;
      z-index: 1;
    }

    .sop-bg-decoration {
      position: absolute;
      right: -20px;
      top: -40px;
      font-size: 15rem;
      color: rgba(255, 255, 255, 0.03);
      transform: rotate(15deg);
      z-index: 0;
      pointer-events: none;
    }

    .sop-icon-circle {
      width: 40px;
      height: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      color: var(--color-accent);
    }

    .btn-sop-outline {
      background: transparent;
      border: 2px solid rgba(255, 255, 255, 0.3);
      color: white;
      padding: 12px 25px;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s;
    }

    .btn-sop-outline:hover {
      background: white;
      color: var(--color-primary);
      border-color: white;
    }

    .btn-sop-solid {
      background: white;
      color: var(--color-primary);
      padding: 12px 25px;
      border-radius: 50px;
      font-weight: 700;
      border: 2px solid white;
      transition: all 0.3s;
    }

    .btn-sop-solid:hover {
      background: var(--color-accent);
      border-color: var(--color-accent);
      color: white;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 991px) {
      .section-title h2 {
        font-size: 32px;
      }
      
      .hero h1 {
        font-size: 32px;
      }

      .hero p {
        font-size: 16px;
      }
      
      .sop-card {
        text-align: center;
      }
      
      .sop-card .info-box {
        justify-content: center;
        margin-bottom: 20px;
      }
      
      .sop-card .d-flex.align-items-center {
        justify-content: center;
        flex-direction: column;
        text-align: center;
      }

      .sop-card .sop-icon-circle {
        margin-right: 0 !important;
        margin-bottom: 10px;
      }

      .btn-sop-outline, .btn-sop-solid {
        width: 100%;
        margin-bottom: 10px;
        display: block;
      }
      
      .sop-bg-decoration {
        font-size: 10rem;
      }
    }

    @media (max-width: 768px) {
      .section-padding {
        padding: 60px 0;
      }

      .about-img {
        margin-top: 30px;
      }

      .d-flex.justify-content-between.align-items-end {
        flex-direction: column;
        align-items: flex-start !important;
      }
    }
  </style>
</head>

<body class="index-page">

  <?php include 'navbar.php'; ?>

  <main class="main">

    <section id="hero" class="hero section">
      <div class="container">
        <div class="row gy-4 align-items-center">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Teknologi Data Politeknik Negeri Malang</h1>
            <p data-aos="fade-up" data-aos-delay="100">Mendorong inovasi, riset, dan pembelajaran berbasis data untuk
              memperkuat kolaborasi, mengembangkan teknologi cerdas, serta menciptakan solusi nyata bagi masyarakat dan
              industri.</p>
            <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
              <a href="<?= BASE_URL ?>/penelitian" class="btn-get-started">Lihat Riset Kami <i
                  class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 order-lg-4 hero-img d-flex justify-content-end" data-aos="zoom-out">
            <img src="<?= BASE_URL ?>/public/assets/img/logo-lab-dt.png" class="img-fluid animated ms-auto"
              alt="Logo Lab Data">
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="about section section-padding">
      <div class="container" data-aos="fade-up">
        <div class="row gx-5 align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div class="section-title">
              <h2>
                Profil
              </h2>
            </div>
            <p class="section-desc">
              Unit penunjang akademik di Jurusan Teknologi Informasi yang berfokus pada kegiatan pembelajaran,
              penelitian, serta pengembangan keilmuan di bidang teknologi berbasis data. Laboratorium ini menyediakan
              fasilitas praktikum dan riset yang mendukung penguasaan pengetahuan serta keterampilan mahasiswa dalam
              pengolahan data, analisis big data, kecerdasan buatan, dan machine learning.
            </p>
            <p class="section-desc">
              Selain itu, Laboratorium Teknologi Data juga berperan sebagai pusat penelitian dan pengembangan bagi dosen
              maupun mahasiswa.
            </p>
          </div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <img src="<?= BASE_URL ?>/public/assets/img/gedung-ti-polinema.png" class="img-fluid about-img"
              alt="Gedung TI Polinema">
          </div>
        </div>
      </div>
    </section>

    <section id="riset" class="values section" style="background: var(--color-bg-light);">
      <div class="container section-title" data-aos="fade-up">
        <h2 style="color: var(--color-primary);">Fokus Riset</h2>
        <p>Bidang keilmuan yang kami kembangkan</p>
      </div>
      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card research-card text-center p-4 h-100 border-0">
              <img src="<?= BASE_URL ?>/public/assets/img/RisetElements/AnalisisData.png"
                class="img-fluid mb-3 mx-auto p-3" alt="Analisis Data" style="max-height: 100px;">
              <h5 class="research-title">Analisis Data</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="150">
            <div class="card research-card text-center p-4 h-100 border-0">
              <img src="<?= BASE_URL ?>/public/assets/img/RisetElements/BigData.png" class="img-fluid mb-3 mx-auto p-3"
                alt="Big Data" style="max-height: 100px;">
              <h5 class="research-title">Big Data</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card research-card text-center p-4 h-100 border-0">
              <img src="<?= BASE_URL ?>/public/assets/img/RisetElements/MachineLearning.png"
                class="img-fluid mb-3 mx-auto p-3" alt="Machine Learning" style="max-height: 100px;">
              <h5 class="research-title">Machine Learning</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="250">
            <div class="card research-card text-center p-4 h-100 border-0">
              <img src="<?= BASE_URL ?>/public/assets/img/RisetElements/VisualisasiData.png"
                class="img-fluid mb-3 mx-auto p-3" alt="Visualisasi Data" style="max-height: 100px;">
              <h5 class="research-title">Visualisasi Data</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card research-card text-center p-4 h-100 border-0">
              <img src="<?= BASE_URL ?>/public/assets/img/RisetElements/DataMining.png"
                class="img-fluid mb-3 mx-auto p-3" alt="Data Mining" style="max-height: 100px;">
              <h5 class="research-title">Data Mining</h5>
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-6" data-aos="fade-up" data-aos-delay="350">
            <div class="card research-card text-center p-4 h-100 border-0">
              <img src="<?= BASE_URL ?>/public/assets/img/RisetElements/DatabaseSql.png"
                class="img-fluid mb-3 mx-auto p-3" alt="Database" style="max-height: 100px;">
              <h5 class="research-title">Database & SQL</h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="publikasi" class="section section-padding">
      <div class="container" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-end mb-5">
          <div>
            <h2 style="color: var(--color-primary); font-weight: 700; margin-bottom: 10px;">Sorotan Publikasi</h2>
            <p class="text-muted mb-0">Karya ilmiah terbaru dari civitas akademika kami.</p>
          </div>
          <a href="<?= BASE_URL ?>/penelitian" class="btn btn-outline-primary rounded-pill px-4 d-none d-md-block">Lihat
            Semua <i class="bi bi-arrow-right ms-1"></i></a>
        </div>

        <div class="row gy-4">
          <?php if (!empty($publikasi)) : ?>
          <?php foreach ($publikasi as $row) : ?>
          <?php
                        $kategoriRaw = explode(',', $row['namakategori'] ?? '');
                        $kategoriUtama = trim($kategoriRaw[0]);
                        $badgeClass = 'badge-def'; 
                        if (stripos($kategoriUtama, 'Internasional') !== false) {
                            $badgeClass = 'badge-inter';
                        } elseif (stripos($kategoriUtama, 'Nasional') !== false) {
                            $badgeClass = 'badge-nas';
                        } elseif (stripos($kategoriUtama, 'Prosiding') !== false) {
                            $badgeClass = 'badge-pros';
                        }
                    ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 publication-card">
              <div class="card-body p-4 d-flex flex-column">
                <div class="d-flex justify-content-between align-items-start mb-3">
                  <span class="custom-badge <?= $badgeClass ?>">
                    <?= !empty($kategoriUtama) ? $kategoriUtama : 'Jurnal Ilmiah' ?>
                  </span>
                  <small class="text-muted fw-bold" style="font-size: 0.8rem;">
                    <i class="bi bi-clock me-1"></i> <?= $row['tahunterbit'] ?>
                  </small>
                </div>
                <h5 class="fw-bold mb-3 lh-base pub-title"
                  style="height: 3.6rem; display: -webkit-box; line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                  <a href="<?= $row['linkfile'] ?>" target="_blank" class="stretched-link">
                    <?= $row['judulpublikasi'] ?>
                  </a>
                </h5>
                <p class="text-muted mb-4 small"
                  style="height: 4.5rem; display: -webkit-box; line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">
                  <?= !empty($row['ringkasan']) ? $row['ringkasan'] : 'Karya tulis ilmiah oleh ' . $row['namamember'] . ' dibidang Teknologi Data.' ?>
                </p>
                <div class="mt-auto pt-3 border-top border-light d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center text-muted small">
                    <i class="bi bi-person-circle me-2 text-primary"></i>
                    <span class="text-truncate" style="max-width: 150px;">
                      <?= $row['namamember'] ?>
                    </span>
                  </div>
                  <span class="btn-read-more">
                    Baca <i class="bi bi-arrow-right"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php else : ?>
          <div class="col-12 text-center py-5">
            <div class="alert alert-light border-0 shadow-sm rounded-4" role="alert">
              <i class="bi bi-inbox-fill text-muted fs-1 mb-3 d-block"></i>
              <h5 class="text-muted">Belum ada publikasi sorotan.</h5>
            </div>
          </div>
          <?php endif; ?>
        </div>

        <div class="text-center mt-4 d-md-none">
          <a href="<?= BASE_URL ?>/penelitian" class="btn btn-outline-primary rounded-pill px-4">Lihat Semua Publikasi
            <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
      </div>
    </section>

    <section id="team" class="team section team-section">
      <div class="wave-separator">
        <svg class="wave-svg" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
          preserveAspectRatio="none">
          <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            style="fill: #ffffff;"></path>
        </svg>
      </div>

      <div class="glow-decoration glow-1"></div>
      <div class="glow-decoration glow-2"></div>

      <div class="container team-container" data-aos="fade-up">
        <div class="text-center mb-5">
          <h2 class="fw-bold text-white display-6">Tim Kami</h2>
          <div class="team-header-line"></div>
          <p class="text-white-50 fs-5">Para ahli dan peneliti di balik inovasi teknologi data.</p>
        </div>

        <div class="swiper team-slider px-2">
          <div class="swiper-wrapper py-4 mb-4">
            <?php if (!empty($members)) : ?>
            <?php foreach ($members as $row) : ?>
            <?php
                            if (strtolower($row['statusmember']) == 'non-aktif' || strtolower($row['statusmember']) == 'inactive') continue;
                        ?>
            <div class="swiper-slide">
              <div class="team-card-futuristic">
                <div class="team-img-box">
                  <?php
                                        $fotoName = $row['fotoprofil'];
                                        $uploadDir = __DIR__ . '/../../public/uploads/members/'; 
                                        $urlFolder = BASE_URL . '/public/uploads/members/';
                                        $defaultFoto = BASE_URL . '/public/assets/img/team/kepala-lab.png';
                                        if (!empty($fotoName) && file_exists($uploadDir . $fotoName)) {
                                            $finalFoto = $urlFolder . $fotoName;
                                        } else {
                                            $finalFoto = $defaultFoto;
                                        }
                                    ?>
                  <img src="<?= $finalFoto ?>" alt="<?= $row['namamember'] ?>"
                    onerror="this.onerror=null;this.src='<?= $defaultFoto ?>';">
                  <div class="team-overlay">
                    <div class="team-social-links">
                      <?php if (!empty($row['link_sinta'])) : ?>
                      <a href="<?= $row['link_sinta'] ?>" target="_blank" class="team-social-btn" title="Profil Sinta">
                        <i class="bi bi-journal-text"></i>
                      </a>
                      <?php endif; ?>
                      <?php if (!empty($row['email'])) : ?>
                      <a href="mailto:<?= $row['email'] ?>" class="team-social-btn" title="Kirim Email">
                        <i class="bi bi-envelope-fill"></i>
                      </a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="team-info">
                  <h4 class="team-name"><?= $row['namamember'] ?></h4>
                  <?php if(!empty($row['gelar'])): ?>
                  <small class="text-muted d-block mb-1" style="font-size: 0.85rem;">
                    <?= $row['gelar'] ?>
                  </small>
                  <?php endif; ?>
                  <p class="team-role"><?= $row['jabatan'] ?></p>
                  <?php if(!empty($row['bidangriset'])): ?>
                  <span class="badge bg-light text-secondary mt-2 fw-normal">
                    <?= $row['bidangriset'] ?>
                  </span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <div class="col-12 text-center text-white">
              <p>Data tim belum tersedia.</p>
            </div>
            <?php endif; ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <section id="fasilitas" class="section section-padding">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-5">
          <h2 style="color: var(--color-primary); font-weight: 700;">Fasilitas dan Perlengkapan</h2>
          <p>Menunjang kegiatan akademik dan riset berkualitas</p>
        </div>
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="facility-box p-4 rounded-4 h-100 text-center bg-white shadow-sm border">
              <div
                class="icon-box mb-3 mx-auto bg-primary-subtle text-primary d-flex align-items-center justify-content-center rounded-circle"
                style="width: 80px; height: 80px;">
                <i class="bi bi-house-door fs-2"></i>
              </div>
              <h4 class="fw-bold mb-3 text-dark">Ruang Praktikum & Penelitian</h4>
              <p class="text-muted mb-0">Ruang laboratorium yang nyaman dan kondusif untuk kegiatan praktikum,
                eksperimen, dan diskusi penelitian intensif.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="facility-box p-4 rounded-4 h-100 text-center bg-white shadow-sm border">
              <div
                class="icon-box mb-3 mx-auto bg-success-subtle text-success d-flex align-items-center justify-content-center rounded-circle"
                style="width: 80px; height: 80px;">
                <i class="bi bi-laptop fs-2"></i>
              </div>
              <h4 class="fw-bold mb-3 text-dark">Perangkat Lunak Terkini</h4>
              <p class="text-muted mb-0">Akses ke berbagai lisensi software industri dan tools open-source terbaru untuk
                analisis big data dan pengembangan AI.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="facility-box p-4 rounded-4 h-100 text-center bg-white shadow-sm border">
              <div
                class="icon-box mb-3 mx-auto bg-info-subtle text-info d-flex align-items-center justify-content-center rounded-circle"
                style="width: 80px; height: 80px;">
                <i class="bi bi-pc-display fs-2"></i>
              </div>
              <h4 class="fw-bold mb-3 text-dark">High-Spec Workstations</h4>
              <p class="text-muted mb-0">Dukungan unit komputer dengan spesifikasi tinggi (GPU/TPU) untuk komputasi
                berat, deep learning, dan rendering data.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="sop" class="section" style="padding: 40px 0;">
      <div class="container" data-aos="fade-up">
        <div class="sop-card position-relative overflow-hidden rounded-4 p-4 p-lg-5 text-white">
          <div class="sop-bg-decoration">
            <i class="bi bi-clock-history"></i>
          </div>
          <div class="row align-items-center position-relative" style="z-index: 2;">
            <div class="col-lg-7 mb-4 mb-lg-0">
              <h3 class="fw-bold mb-3 text-white">SOP dan Jam Layanan</h3>
              <p class="opacity-75 mb-4" style="font-size: 16px; max-width: 600px;">
                Kami berkomitmen memberikan pelayanan prima. Silakan unduh panduan prosedur atau ajukan layanan riset
                sesuai jam operasional di bawah ini.
              </p>
              <div class="d-flex flex-column flex-sm-row gap-3 gap-sm-5 info-box">
                <div class="d-flex align-items-center">
                  <div class="sop-icon-circle me-3">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div>
                    <small class="text-uppercase opacity-75 fw-bold"
                      style="font-size: 11px; letter-spacing: 1px;">Lokasi</small>
                    <div class="fw-semibold">Gedung Teknik Sipil Lt. 8</div>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <div class="sop-icon-circle me-3">
                    <i class="bi bi-clock-fill"></i>
                  </div>
                  <div>
                    <small class="text-uppercase opacity-75 fw-bold" style="font-size: 11px; letter-spacing: 1px;">Jam
                      Operasional</small>
                    <div class="fw-semibold">Senin – Jumat | 08.00 – 16.00</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 text-lg-end">
              <div class="d-flex flex-column flex-sm-row justify-content-lg-end gap-3">
                <a href="#" class="btn btn-sop-outline">
                  <i class="bi bi-download me-2"></i>Unduh SOP
                </a>
                <a href="#" class="btn btn-sop-solid">
                  Ajukan Layanan<i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <?php include 'footer.php'; ?>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <script src="<?= BASE_URL ?>/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/aos/aos.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <script src="<?= BASE_URL ?>/public/assets/js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      new Swiper('.team-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 2
          },
          992: {
            slidesPerView: 3
          },
          1200: {
            slidesPerView: 4
          }
        }
      });
    });
  </script>

</body>

</html>
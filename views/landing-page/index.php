<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - FlexStart Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
  <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>/public/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="<?= BASE_URL ?>/public/assets/css/main.css" rel="stylesheet">

  <style>
    #hero .row {
      transform: translateY(-30px);
    }
  </style>
  <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

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

    <section id="about" class="about section" style="padding: 80px 0;">
      <div class="container" data-aos="fade-up">
        <div class="row gx-5 align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <h2
              style="color:#27505B; font-size:42px; font-weight:700; margin-bottom:25px; position: relative; padding-bottom: 15px;">
              Profil
              <span
                style="position: absolute; left: 0; bottom: 0; height: 3px; width: 60px; background: #27505B;"></span>
            </h2>
            <p style="font-size:16px; line-height:1.8; color:#444; margin-bottom: 20px;">
              Unit penunjang akademik di Jurusan Teknologi Informasi yang berfokus pada kegiatan pembelajaran,
              penelitian, serta pengembangan keilmuan di bidang teknologi berbasis data. Laboratorium ini menyediakan
              fasilitas praktikum dan riset yang mendukung penguasaan pengetahuan serta keterampilan mahasiswa dalam
              pengolahan data, analisis big data, kecerdasan buatan, dan machine learning.
            </p>
            <p style="font-size:16px; line-height:1.8; color:#444;">
              Selain itu, Laboratorium Teknologi Data juga berperan sebagai pusat penelitian dan pengembangan bagi dosen
              maupun mahasiswa.
            </p>
          </div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <img src="<?= BASE_URL ?>/public/assets/img/gedung-ti-polinema.png" class="img-fluid"
              alt="Gedung TI Polinema" style="border-radius: 24px; box-shadow: 0 15px 40px rgba(39, 80, 91, 0.15);">
          </div>
        </div>
      </div>
    </section>

    <section id="riset" class="values section" style="background: #f9fbfd;">
      <div class="container section-title" data-aos="fade-up">
        <h2 style="color:#27505B;">Fokus Riset</h2>
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

    <section id="publikasi" class="section" style="padding: 80px 0;">
      <div class="container" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-end mb-5">
          <div>
            <h2 style="color: #27505B; font-weight: 700; margin-bottom: 10px;">Sorotan Publikasi</h2>
            <p class="text-muted mb-0">Karya ilmiah terbaru dari civitas akademika kami.</p>
          </div>
          <a href="<?= BASE_URL ?>penelitian" class="btn btn-outline-primary rounded-pill px-4 d-none d-md-block">Lihat
            Semua <i class="bi bi-arrow-right ms-1"></i></a>
        </div>

        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 border-0 publication-card">
              <div class="card-body p-4 d-flex flex-column">
                <div class="mb-3">
                  <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill px-3 py-2">Jurnal
                    Nasional</span>
                </div>
                <h5 class="card-title text-dark fw-bold mb-3 lh-base">Sistem Prediksi Penjualan Frozen Food dengan
                  Metode Monte Carlo</h5>
                <p class="card-text text-muted mb-4 small">Studi Kasus: Supermama Frozen Food</p>
                <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                  <span class="text-muted small"><i class="bi bi-calendar-event me-2"></i>2022</span>
                  <a href="#" class="text-primary text-decoration-none fw-semibold stretched-link">Baca <i
                      class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100 border-0 publication-card">
              <div class="card-body p-4 d-flex flex-column">
                <div class="mb-3">
                  <span class="badge bg-success-subtle text-success-emphasis rounded-pill px-3 py-2">Jurnal
                    Internasional</span>
                </div>
                <h5 class="card-title text-dark fw-bold mb-3 lh-base">Analisis Sentimen Pengguna Aplikasi E-Commerce di
                  Indonesia</h5>
                <p class="card-text text-muted mb-4 small">Studi Kasus: Ulasan Google Play Store</p>
                <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                  <span class="text-muted small"><i class="bi bi-calendar-event me-2"></i>2023</span>
                  <a href="#" class="text-primary text-decoration-none fw-semibold stretched-link">Baca <i
                      class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card h-100 border-0 publication-card">
              <div class="card-body p-4 d-flex flex-column">
                <div class="mb-3">
                  <span class="badge bg-info-subtle text-info-emphasis rounded-pill px-3 py-2">Prosiding</span>
                </div>
                <h5 class="card-title text-dark fw-bold mb-3 lh-base">Implementasi Algoritma K-Means untuk Clustering
                  Data Mahasiswa</h5>
                <p class="card-text text-muted mb-4 small">Studi Kasus: Data Akademik Polinema</p>
                <div class="mt-auto d-flex justify-content-between align-items-center pt-3 border-top">
                  <span class="text-muted small"><i class="bi bi-calendar-event me-2"></i>2023</span>
                  <a href="#" class="text-primary text-decoration-none fw-semibold stretched-link">Baca <i
                      class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center mt-4 d-md-none">
          <a href="<?= BASE_URL ?>penelitian" class="btn btn-outline-primary rounded-pill px-4">Lihat Semua Publikasi <i
              class="bi bi-arrow-right ms-1"></i></a>
        </div>
      </div>
    </section>


    <section id="team" class="team section"
      style="background-color: #27505B; padding-bottom: 80px; position: relative; overflow: hidden;">

      <div style="position: absolute; top: -1px; left: 0; width: 100%; overflow: hidden; line-height: 0;">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
          style="position: relative; display: block; width: calc(100% + 1.3px); height: 60px;">
          <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            style="fill: #ffffff;"></path>
        </svg>
      </div>

      <div class="glow-decoration" style="top: 20%; left: -10%;"></div>
      <div class="glow-decoration" style="bottom: 10%; right: -10%;"></div>

      <div class="container" data-aos="fade-up" style="position: relative; z-index: 2; margin-top: 60px;">

        <div class="text-center mb-5">
          <h2 class="fw-bold text-white display-6">Tim Kami</h2>
          <div style="width: 60px; height: 3px; background: #4dc4e0; margin: 15px auto;"></div>
          <p class="text-white-50 fs-5">Para ahli dan peneliti di balik inovasi teknologi data.</p>
        </div>

        <div class="swiper team-slider px-2">
          <div class="swiper-wrapper py-4 mb-4">

            <div class="swiper-slide">
              <div class="team-card-modern">
                <div class="img-wrapper">
                  <img src="<?= BASE_URL ?>/public/assets/img/team/kepala-lab.png" alt="Yoppy Yunhasnawa">
                  <div class="social-overlay">
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-envelope-fill"></i></a>
                    <a href="#"><i class="bi bi-google"></i></a>
                  </div>
                </div>
                <div class="info-content">
                  <h4 class="name">Yoppy Yunhasnawa</h4>
                  <p class="role">Kepala Lab</p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team-card-modern">
                <div class="img-wrapper">
                  <img src="<?= BASE_URL ?>/public/assets/img/team/peneliti-1.png" alt="M. Hasyim Ratsanjani">
                  <div class="social-overlay">
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-envelope-fill"></i></a>
                    <a href="#"><i class="bi bi-google"></i></a>
                  </div>
                </div>
                <div class="info-content">
                  <h4 class="name">M. Hasyim Ratsanjani</h4>
                  <p class="role">Peneliti</p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team-card-modern">
                <div class="img-wrapper">
                  <img src="<?= BASE_URL ?>/public/assets/img/team/peneliti-2.png" alt="Gunawan Budi Prasetyo">
                  <div class="social-overlay">
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-envelope-fill"></i></a>
                    <a href="#"><i class="bi bi-google"></i></a>
                  </div>
                </div>
                <div class="info-content">
                  <h4 class="name">Gunawan Budi P.</h4>
                  <p class="role">Peneliti</p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team-card-modern">
                <div class="img-wrapper">
                  <img src="<?= BASE_URL ?>/public/assets/img/team/peneliti-3.png" alt="Dika Rizky Yuniarto">
                  <div class="social-overlay">
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-envelope-fill"></i></a>
                    <a href="#"><i class="bi bi-google"></i></a>
                  </div>
                </div>
                <div class="info-content">
                  <h4 class="name">Dika Rizky Yuniarto</h4>
                  <p class="role">Peneliti</p>
                </div>
              </div>
            </div>

            <div class="swiper-slide">
              <div class="team-card-modern">
                <div class="img-wrapper d-flex align-items-center justify-content-center bg-light">
                  <i class="bi bi-person-fill" style="font-size: 5rem; color: #ccc;"></i>
                  <div class="social-overlay">
                    <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </div>
                </div>
                <div class="info-content">
                  <h4 class="name">Anggota Lain</h4>
                  <p class="role">Teknisi</p>
                </div>
              </div>
            </div>

          </div>

          <div class="swiper-pagination mt-4"></div>
        </div>

      </div>
    </section>

    <style>
      .glow-decoration {
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(77, 196, 224, 0.15) 0%, rgba(39, 80, 91, 0) 70%);
        pointer-events: none;
        z-index: 1;
      }

      .team-card-modern {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        height: 100%;
        position: relative;
      }

      .team-card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
      }

      .team-card-modern .img-wrapper {
        width: 100%;
        height: 320px;
        /* Tinggi Fix Gambar */
        position: relative;
        overflow: hidden;
      }

      .team-card-modern .img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform 0.5s ease;
      }

      .team-card-modern:hover .img-wrapper img {
        transform: scale(1.1);
      }

      .social-overlay {
        position: absolute;
        bottom: -60px;
        left: 0;
        width: 100%;
        height: 60px;
        background: rgba(39, 80, 91, 0.9);
        backdrop-filter: blur(5px);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        transition: bottom 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      }

      .team-card-modern:hover .social-overlay {
        bottom: 0;
      }

      .social-overlay a {
        color: white;
        font-size: 1.2rem;
        transition: color 0.3s;
      }

      .social-overlay a:hover {
        color: #4dc4e0;
      }

      .info-content {
        padding: 25px 20px;
        text-align: center;
        background: white;
        position: relative;
        z-index: 2;
      }

      .info-content .name {
        color: #27505B;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 5px;
      }

      .info-content .role {
        color: #4dc4e0;
        font-size: 0.9rem;
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
      }

      .team-slider .swiper-pagination-bullet-active {
        background: #4dc4e0;
        width: 30px;
        border-radius: 5px;
      }
    </style>

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

    <section id="fasilitas" class="section" style="padding: 80px 0;">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center mb-5">
          <h2 style="color:#27505B; font-weight: 700;">Fasilitas dan Perlengkapan</h2>
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

          <div class="bg-decoration">
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
                  <div class="icon-circle me-3">
                    <i class="bi bi-geo-alt-fill"></i>
                  </div>
                  <div>
                    <small class="text-uppercase opacity-75 fw-bold"
                      style="font-size: 11px; letter-spacing: 1px;">Lokasi</small>
                    <div class="fw-semibold">Gedung Teknik Sipil Lt. 8</div>
                  </div>
                </div>

                <div class="d-flex align-items-center">
                  <div class="icon-circle me-3">
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

    <style>
      .sop-card {
        background: linear-gradient(135deg, #27505B 0%, #162c33 100%);
        box-shadow: 0 20px 40px rgba(39, 80, 91, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.1);
      }

      .sop-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 20px 20px;
        opacity: 0.3;
        z-index: 1;
      }

      .bg-decoration {
        position: absolute;
        right: -20px;
        top: -40px;
        font-size: 15rem;
        color: rgba(255, 255, 255, 0.03);
        transform: rotate(15deg);
        z-index: 0;
        pointer-events: none;
      }

      .icon-circle {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #4dc4e0;
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
        color: #27505B;
        border-color: white;
      }

      .btn-sop-solid {
        background: white;
        color: #27505B;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 700;
        border: 2px solid white;
        transition: all 0.3s;
      }

      .btn-sop-solid:hover {
        background: #4dc4e0;
        border-color: #4dc4e0;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      }
    </style>

  </main>

  <style>
    .research-card,
    .publication-card,
    .facility-box {
      background: #ffffff;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.4s ease;
    }

    .research-card:hover,
    .publication-card:hover,
    .facility-box:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 30px rgba(39, 80, 91, 0.12) !important;
    }

    .research-title {
      font-size: 15px;
      font-weight: 700;
      color: #27505B;
      margin-bottom: 0;
    }

    .member-card {
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .member-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25) !important;
    }

    .member-img-container {
      height: 320px;
      width: 100%;
      overflow: hidden;
      position: relative;
    }

    .member-img-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center top;
      transition: transform 0.6s ease;
    }

    .member-card:hover .member-img-container img {
      transform: scale(1.08);
    }

    .team-slider .swiper-pagination-bullet {
      background: rgba(255, 255, 255, 0.5);
      opacity: 1;
      width: 10px;
      height: 10px;
      transition: all 0.3s;
    }

    .team-slider .swiper-pagination-bullet-active {
      background: #ffffff;
      width: 25px;
      border-radius: 5px;
    }

    .team-slider .swiper-button-next,
    .team-slider .swiper-button-prev {
      color: #ffffff;
      background: rgba(255, 255, 255, 0.1);
      width: 45px;
      height: 45px;
      border-radius: 50%;
      backdrop-filter: blur(5px);
    }

    .team-slider .swiper-button-next:hover,
    .team-slider .swiper-button-prev:hover {
      background: rgba(255, 255, 255, 0.3);
      /* Terang saat di-hover */
    }

    .team-slider .swiper-button-next::after,
    .team-slider .swiper-button-prev::after {
      font-size: 20px;
      font-weight: bold;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      new Swiper('.team-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        grabCursor: true,
        centeredSlides: false,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          992: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1200: {
            slidesPerView: 4,
            spaceBetween: 30,
          }
        }
      });
    });
  </script>

  <?php include 'footer.php'; ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= BASE_URL ?>/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/aos/aos.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="<?= BASE_URL ?>/public/assets/js/main.js"></script>

</body>

</html>
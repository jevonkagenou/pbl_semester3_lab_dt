<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog - FlexStart Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?= BASE_URL ?>public/assets/img/favicon.png" rel="icon">
  <link href="<?= BASE_URL ?>public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASE_URL ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASE_URL ?>public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= BASE_URL ?>public/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="blog-page">

  <?php include 'navbar.php'; ?>

  <main class="main">

    <style>
      .card-hover {
        transition: all 0.3s ease-in-out;
        cursor: pointer;
      }

      .card-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
      }

      .card-hover img {
        transition: transform 0.5s ease;
      }

      .card-hover:hover img {
        transform: scale(1.05);
      }

      .stretched-link::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1;
        content: "";
      }

      .card-hover a {
        position: relative;
        z-index: 2;
      }
    </style>

    <section class="section py-5" style="background-color: #edf2f4; min-height: 100vh;">
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-12">
            <div id="heroCarousel" class="carousel slide border-0 rounded-4 overflow-hidden shadow-sm"
              data-bs-ride="carousel">

              <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              </div>

              <div class="carousel-inner" style="height: 450px;">
                <div class="carousel-item active h-100">
                  <img src="<?= BASE_URL ?>public/assets/img/lomba1.png" class="d-block w-100 h-100"
                    alt="Berita Utama 1" style="object-fit: cover; object-position: center 20%;">

                  <div class="position-absolute bottom-0 start-0 w-100 p-4 p-lg-5"
                    style="background: linear-gradient(to top, rgba(39, 80, 91, 0.95), transparent); z-index: 2;">
                    <div class="col-lg-10">
                      <h2 class="fw-bold mb-3" style="font-size: 2rem; line-height: 1.3;">
                        <a href="detail-blog.php" style="color: #fff; text-decoration: none;">
                          Prestasi Gemilang! Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara di Entrepreneurs Festival
                          2025
                        </a>
                      </h2>
                      <div class="d-flex align-items-center small text-white-50">
                        <span class="text-uppercase fw-bold me-3" style="color: #fff;">BY Tim Redaksi</span>
                        <span style="color: #fff;"><i class="bi bi-clock me-1" style="color: #fff;"></i> Senin, 24
                          November 2025</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="carousel-item h-100">
                  <img src="<?= BASE_URL ?>public/assets/img/gedung-ti-polinema.png" class="d-block w-100 h-100"
                    alt="Berita Utama 2" style="object-fit: cover; object-position: center center;">
                  <div class="position-absolute bottom-0 start-0 w-100 p-4 p-lg-5"
                    style="background: linear-gradient(to top, rgba(39, 80, 91, 0.95), transparent); z-index: 2;">
                    <div class="col-lg-10">
                      <h2 class="fw-bold mb-3" style="font-size: 2rem; line-height: 1.3;">
                        <a href="detail-blog.php" style="color: #fff; text-decoration: none;">
                          Tim JosJisBolo Polinema menjuarai lomba UI/UX Tingkat Nasional Dalam ajang Tecno Competition
                          Se-Indonesia
                        </a>
                      </h2>
                      <div class="d-flex align-items-center small text-white-50">
                        <span class="text-uppercase fw-bold me-3" style="color: #fff;">BY Tim Redaksi</span>
                        <span style="color: #fff;"><i class="bi bi-clock me-1" style="color: #fff;"></i> Senin, 24
                          November 2025</span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>

            </div>
          </div>
        </div>

        <div class="row g-4 mb-5">

          <div class="col-md-6 col-lg-4">
            <div class="card card-hover h-100 border-0 rounded-4 shadow-sm bg-white overflow-hidden">
              <div class="ratio ratio-16x9 overflow-hidden"> <img
                  src="<?= BASE_URL ?>public/assets/img/lomba1.png" class="card-img-top object-fit-cover"
                  alt="Berita 1">
              </div>
              <div class="card-body p-4 d-flex flex-column">
                <h5 class="card-title fw-bold mb-3" style="font-size: 1rem; line-height: 1.5;">
                  <a href="detail-blog.php" style="color: #333; text-decoration: none;" class="stretched-link">
                    Prestasi Gemilang! Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara di Entrepreneurs Festival 2025
                    Politeknik Negeri Malang.
                  </a>
                </h5>
                <div class="mt-auto d-flex align-items-center small text-muted">
                  <span class="fw-bold me-3" style="color: #555;">BY Tim Redaksi</span>
                  <span><i class="bi bi-clock me-1"></i> Senin, 24 Nov 2025</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card card-hover h-100 border-0 rounded-4 shadow-sm bg-white overflow-hidden">
              <div class="ratio ratio-16x9 overflow-hidden">
                <img src="<?= BASE_URL ?>public/assets/img/lomba1.png" class="card-img-top object-fit-cover"
                  alt="Berita 2">
              </div>
              <div class="card-body p-4 d-flex flex-column">
                <h5 class="card-title fw-bold mb-3" style="font-size: 1rem; line-height: 1.5;">
                  <a href="detail-blog.php" style="color: #333; text-decoration: none;" class="stretched-link">
                    Jurusan Teknologi Informasi Politeknik Negeri Malang melaksanakan kegiatan dengan tema "AI Ready
                    ASEAN
                    untuk Siswa"
                  </a>
                </h5>
                <div class="mt-auto d-flex align-items-center small text-muted">
                  <span class="fw-bold me-3" style="color: #555;">BY Tim Redaksi</span>
                  <span><i class="bi bi-clock me-1"></i> Senin, 24 Nov 2025</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card card-hover h-100 border-0 rounded-4 shadow-sm bg-white overflow-hidden">
              <div class="ratio ratio-16x9 overflow-hidden">
                <img src="<?= BASE_URL ?>public/assets/img/lomba1.png" class="card-img-top object-fit-cover"
                  alt="Berita 3">
              </div>
              <div class="card-body p-4 d-flex flex-column">
                <h5 class="card-title fw-bold mb-3" style="font-size: 1rem; line-height: 1.5;">
                  <a href="detail-blog.php" style="color: #333; text-decoration: none;" class="stretched-link">
                    Prestasi Gemilang! Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara di Entrepreneurs Festival 2025
                    Politeknik Negeri Malang.
                  </a>
                </h5>
                <div class="mt-auto d-flex align-items-center small text-muted">
                  <span class="fw-bold me-3" style="color: #555;">BY Tim Redaksi</span>
                  <span><i class="bi bi-clock me-1"></i> Senin, 24 Nov 2025</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card card-hover h-100 border-0 rounded-4 shadow-sm bg-white overflow-hidden">
              <div class="ratio ratio-16x9 overflow-hidden">
                <img src="<?= BASE_URL ?>public/assets/img/lomba1.png" class="card-img-top object-fit-cover"
                  alt="Berita 4">
              </div>
              <div class="card-body p-4 d-flex flex-column">
                <h5 class="card-title fw-bold mb-3" style="font-size: 1rem; line-height: 1.5;">
                  <a href="detail-blog.php" style="color: #333; text-decoration: none;" class="stretched-link">
                    Jurusan Teknologi Informasi Politeknik Negeri Malang melaksanakan kegiatan dengan tema "AI Ready
                    ASEAN
                    untuk Siswa"
                  </a>
                </h5>
                <div class="mt-auto d-flex align-items-center small text-muted">
                  <span class="fw-bold me-3" style="color: #555;">BY Tim Redaksi</span>
                  <span><i class="bi bi-clock me-1"></i> Senin, 24 Nov 2025</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card card-hover h-100 border-0 rounded-4 shadow-sm bg-white overflow-hidden">
              <div class="ratio ratio-16x9 overflow-hidden">
                <img src="<?= BASE_URL ?>public/assets/img/lomba1.png" class="card-img-top object-fit-cover"
                  alt="Berita 5">
              </div>
              <div class="card-body p-4 d-flex flex-column">
                <h5 class="card-title fw-bold mb-3" style="font-size: 1rem; line-height: 1.5;">
                  <a href="detail-blog.php" style="color: #333; text-decoration: none;" class="stretched-link">
                    Prestasi Gemilang! Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara di Entrepreneurs Festival 2025
                    Politeknik Negeri Malang.
                  </a>
                </h5>
                <div class="mt-auto d-flex align-items-center small text-muted">
                  <span class="fw-bold me-3" style="color: #555;">BY Tim Redaksi</span>
                  <span><i class="bi bi-clock me-1"></i> Senin, 24 Nov 2025</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card card-hover h-100 border-0 rounded-4 shadow-sm bg-white overflow-hidden">
              <div class="ratio ratio-16x9 overflow-hidden">
                <img src="<?= BASE_URL ?>public/assets/img/lomba1.png" class="card-img-top object-fit-cover"
                  alt="Berita 6">
              </div>
              <div class="card-body p-4 d-flex flex-column">
                <h5 class="card-title fw-bold mb-3" style="font-size: 1rem; line-height: 1.5;">
                  <a href="detail-blog.php" style="color: #333; text-decoration: none;" class="stretched-link">
                    Prestasi Gemilang! Mahasiswa Prodi D4 Sistem Informasi Bisnis Juara di Entrepreneurs Festival 2025
                    Politeknik Negeri Malang.
                  </a>
                </h5>
                <div class="mt-auto d-flex align-items-center small text-muted">
                  <span class="fw-bold me-3" style="color: #555;">BY Tim Redaksi</span>
                  <span><i class="bi bi-clock me-1"></i> Senin, 24 Nov 2025</span>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-12 text-center">
            <a href="#" class="btn btn-primary px-5 py-3 rounded-pill fw-bold shadow-sm"
              style="background-color: #27505B; border-color: #27505B; font-size: 1rem; transition: all 0.3s ease;"
              onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
              Lihat Selengkapnya...
            </a>
          </div>
        </div>

      </div>
    </section>

  </main>

  <?php include 'footer.php'; ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= BASE_URL ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/aos/aos.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= BASE_URL ?>public/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="<?= BASE_URL ?>public/assets/js/main.js"></script>

</body>

</html>
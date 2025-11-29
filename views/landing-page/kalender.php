<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Starter Page - FlexStart Bootstrap Template</title>
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

    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="starter-page-page">

    <?php include 'navbar.php'; ?>

    <main class="main">

        <section class="section py-5" style="background-color: #edf2f4; min-height: 100vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <h1 class="fw-bold mb-4" style="color: #2c4964;">Kalender Akademik Jurusan Teknologi Informasi
                        </h1>

                        <p class="mb-5 text-secondary" style="line-height: 1.6;">
                            Kalender Akademik merupakan kalender yang berisikan jadwal kegiatan akademik selama periode
                            satu tahun akademik, yang terdiri dari Semester Ganjil dan Semester Genap pada setiap tahun
                            akademik.
                        </p>

                        <div class="bg-white p-2 rounded shadow-sm mb-4">
                            <img src="<?= BASE_URL ?>/public/assets/img/kalender.png" alt="Kalender Akademik 2025/2026"
                                class="img-fluid w-100">
                        </div>

                        <div class="mt-4 text-secondary">
                            <p style="font-size: 0.95rem;">
                                Untuk Download Kalender Akademik Tahun Akademik 2025 / 2026
                                <a href="<?= BASE_URL ?>/public/assets/files/kalender_akademik.pdf"
                                    class="text-decoration-underline fw-bold" style="color: #2c4964;" download>
                                    DISINI <i class="bi bi-download ms-1"></i>
                                </a>
                            </p>
                        </div>

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
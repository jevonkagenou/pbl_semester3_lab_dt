<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Service Details - FlexStart Bootstrap Template</title>
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

    <style>
        /* Base Style untuk Card (Sesuai Gambar Biru) */
        .member-card {
            background-color: #ffffffff;
            /* Warna biru gelap sesuai gambar */
            border-radius: 10px;
            /* Sudut membulat */
            transition: all 0.3s ease-in-out;
            /* Animasi halus */
            border: none;
            position: relative;
            overflow: hidden;
        }

        /* Styling Gambar Foto */
        .member-card img {
            border-radius: 6px;
            width: 100%;
            object-fit: cover;
            /* Menjaga aspek rasio agar foto terlihat rapi */
        }

        /* Styling Nama (Putih) */
        .member-card h5 {
            color: #2C4964 !important;
            font-size: 1rem;
            margin-top: 15px;
            font-weight: 600;
        }

        /* Styling Jabatan (Abu-abu terang/Kuning tipis) */
        .member-card p {
            color: #fca311 !important;
            /* Warna aksen oranye/emas untuk jabatan agar kontras */
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* --- EFEK HOVER --- */
        .member-card:hover {
            transform: translateY(-10px);
            /* Kartu naik ke atas 10px */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            /* Bayangan lebih dalam */
            background-color: #ffffffff;
            /* Warna biru sedikit lebih terang saat disentuh */
            cursor: pointer;
        }
    </style>
</head>

<body class="service-details-page">

    <?php include 'navbar.php'; ?>

    <main class="main">

        <section id="struktur-organisasi" class="section py-5" style="background-color: #ecf0f1;">
            <div class="container">

                <div class="section-title text-start mb-5">
                    <h2 class="fw-bold" style="color: #2c4964; font-size: 2rem;">Struktur Organisasi</h2>
                </div>

                <div class="row justify-content-center mb-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <img src="<?= BASE_URL ?>/public/assets/img/kepala-lab.jpg" alt="Yoppy Yunhasnawa"
                                class="img-fluid mb-4">
                            <h5 class="fw-bold mb-1">Yoppy Yunhasnawa, S.ST., M.Sc.</h5>
                            <p class="mb-0">Kepala Lab</p>
                        </div>
                    </div>
                </div>

                <div class="row gy-4 mb-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <img src="<?= BASE_URL ?>/public/assets/img/team/peneliti-1.png" alt="M. Hasyim Ratsanjani"
                                class="img-fluid mb-4">
                            <h5 class="fw-bold mb-1">M. Hasyim Ratsanjani, S.Kom., M.Kom</h5>
                            <p class="mb-0">Peneliti</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <img src="<?= BASE_URL ?>/public/assets/img/team/peneliti-2.png" alt="Luqman Affandi"
                                class="img-fluid mb-4">
                            <h5 class="fw-bold mb-1">Luqman Affandi, S.Kom., MMSI</h5>
                            <p class="mb-0">Peneliti</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <img src="<?= BASE_URL ?>/public/assets/img/team/peneliti-3.png" alt="Gunawan Budiprasetyo"
                                class="img-fluid mb-4">
                            <h5 class="fw-bold mb-1">Gunawan Budiprasetyo, ST., MMT., Ph.D.</h5>
                            <p class="mb-0">Peneliti</p>
                        </div>
                    </div>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <img src="<?= BASE_URL ?>/public/assets/img/team/peneliti-4.png" alt="Vit Zuraida"
                                class="img-fluid mb-4">
                            <h5 class="fw-bold mb-1">Vit Zuraida,S.Kom., M.Kom.</h5>
                            <p class="mb-0">Peneliti</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <img src="<?= BASE_URL ?>/public/assets/img/team/peneliti-5.png" alt="Habibie Ed Dien"
                                class="img-fluid mb-4">
                            <h5 class="fw-bold mb-1">Habibie Ed Dien, S.Kom., M.T.</h5>
                            <p class="mb-0">Peneliti</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <img src="<?= BASE_URL ?>/public/assets/img/peneliti-6.png" alt="Dika Rizky Yunianto"
                                class="img-fluid mb-4">
                            <h5 class="fw-bold mb-1">Dika Rizky Yunianto, S.Kom, M.Kom</h5>
                            <p class="mb-0">Peneliti</p>
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
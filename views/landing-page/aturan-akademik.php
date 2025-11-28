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
</head>

<body class="service-details-page">

    <?php include 'navbar.php'; ?>

    <main class="main">

        <style>
            /* --- PALET WARNA ---
           Primary Dark: #27505B (Warna permintaan Anda)
           Accent Bright: #2a9d8f (Aksen cerah untuk state aktif)
           Active BG Pale: #f2f9f8 (Latar belakang pucat saat aktif)
           Neutral BG: #f4f7f6 (Latar belakang section umum)
           Icon Wrapper BG: #eef5f4 (Latar belakang ikon tidak aktif)
        -------------------- */

            .academic-accordion .accordion-item {
                border: none;
                border-radius: 12px;
                margin-bottom: 16px;
                background: #ffffff;
                box-shadow: 0 4px 20px rgba(39, 80, 91, 0.08);
                transition: all 0.3s ease;
                overflow: hidden;
            }

            .academic-accordion .accordion-item:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(39, 80, 91, 0.2);
            }

            .academic-accordion .accordion-button {
                border-radius: 12px;
                background: #fff;
                color: #27505B;
                font-weight: 700;
                padding: 20px 25px;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                border: none;
            }

            .academic-accordion .accordion-button:focus {
                box-shadow: none;
            }

            .academic-accordion .accordion-button:not(.collapsed) {
                background-color: #f2f9f8;
                color: #2a9d8f;
                box-shadow: inset 5px 0 0 #2a9d8f;
            }

            .academic-accordion .accordion-button::after {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%2327505B'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
                transition: transform 0.3s ease-in-out;
            }

            .academic-accordion .accordion-button:not(.collapsed)::after {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%232a9d8f'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
                transform: rotate(-180deg);
            }

            .academic-accordion .accordion-body {
                padding: 20px 25px 30px 25px;
                color: #555;
                line-height: 1.8;
                background-color: #fcfcfc;
                border-top: 1px solid #ecf0f1;
            }

            .icon-wrapper {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 35px;
                height: 35px;
                background-color: #eef5f4;
                border-radius: 50%;
                margin-right: 15px;
                color: #27505B;
                transition: all 0.3s ease;
            }

            .accordion-button:not(.collapsed) .icon-wrapper {
                background-color: #2a9d8f;
                color: #fff;
            }
        </style>

        <section class="section py-5" style="background-color: #f4f7f6; min-height: 100vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="mb-5 text-center" data-aos="fade-up">
                            <h1 class="fw-bold" style="color: #27505B; font-size: 2.5rem; letter-spacing: -1px;">Aturan
                                Akademik</h1>
                            <p class="text-muted">Pedoman dan tata tertib kegiatan akademik di lingkungan program studi.
                            </p>
                        </div>

                        <div class="accordion academic-accordion" id="accordionAturanAkademik">

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span class="icon-wrapper"><i class="bi bi-book"></i></span>
                                        PROSES PEMBELAJARAN
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="150">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="icon-wrapper"><i class="bi bi-calendar-week"></i></span>
                                        JADWAL PERKULIAHAN
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum. Curabitur pretium tincidunt lacus. Nulla
                                        gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros
                                        bibendum elit, nec luctus magna felis sollicitudin mauris.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <span class="icon-wrapper"><i class="bi bi-person-x"></i></span>
                                        KETIDAKHADIRAN
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        Integer in volutpat libero. Animi, id est laborum et dolorum fuga. Et harum
                                        quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta
                                        nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat
                                        facere possimus.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <span class="icon-wrapper"><i class="bi bi-graph-up"></i></span>
                                        EVALUASI HASIL BELAJAR
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                        dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
                                        exercitationem ullam corporis suscipit laboriosam.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        <span class="icon-wrapper"><i class="bi bi-pencil-square"></i></span>
                                        SISTEM PENILAIAN
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                                        excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui
                                        officia deserunt mollitia animi.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="350">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <span class="icon-wrapper"><i class="bi bi-award"></i></span>
                                        YUDISIUM
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus
                                        saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.
                                        Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis
                                        voluptatibus maiores alias consequatur aut perferendis doloribus asperiores
                                        repellat.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven" aria-expanded="false"
                                        aria-controls="collapseSeven">
                                        <span class="icon-wrapper"><i class="bi bi-check2-circle"></i></span>
                                        EVALUASI AKHIR STUDI
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    aria-labelledby="headingSeven" data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="450">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseEight">
                                        <span class="icon-wrapper"><i class="bi bi-info-circle"></i></span>
                                        STATUS AKADEMIK
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    aria-labelledby="headingEight" data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                        culpa qui officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                                <h2 class="accordion-header" id="headingNine">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseNine" aria-expanded="false"
                                        aria-controls="collapseNine">
                                        <span class="icon-wrapper"><i class="bi bi-mortarboard"></i></span>
                                        PREDIKAT KELULUSAN
                                    </button>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                        veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include 'footer.php'; ?>

    <!-- Scroll Top -->
    <a href=" #" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= BASE_URL ?>/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/aos/aos.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/glightbox/js/glightbox.min.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/purecounter/purecounter_vanilla.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/isotope-layout/isotope.pkgd.min.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.js">
    </script>

    <!-- Main JS File -->
    <script src="<?= BASE_URL ?>/public/assets/js/main.js"></script>

</body>

</html>
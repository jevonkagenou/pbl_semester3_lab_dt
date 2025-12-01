<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Laboratorium Teknologi Data</title>
    <meta name="description" content="Pusat riset dan publikasi di bidang pengolahan data dan kecerdasan buatan.">
    <meta name="keywords" content="Data Science, AI, Big Data, Polinema, Research">

    <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
    <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="<?= BASE_URL ?>/public/assets/css/main.css" rel="stylesheet">

    <style>
        .hero {
            width: 100%;
            min-height: auto !important;
            padding-top: 40px !important;
            padding-bottom: 60px !important;
            background-size: cover;
            background-position: center;
        }

        .hero .hero-img img {
            width: 85%;
            height: auto;
        }

        @media (max-width: 991px) {
            .hero {
                padding-top: 120px !important;
                text-align: center;
            }

            .hero .hero-img {
                margin-top: 40px;
            }

            .hero .hero-img img {
                width: 60%;
            }
        }

        .publication-section {
            padding: 40px 0 80px 0;
        }

        .section-header-custom {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
        }

        .filter-btn {
            background: transparent;
            color: var(--heading-color);
            border: 1px solid #ddd;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 50px;
            transition: 0.3s;
            margin-left: 10px;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: var(--accent-color);
            color: #fff;
            border-color: var(--accent-color);
        }

        .pub-card {
            background: var(--surface-color);
            border-radius: 10px;
            padding: 30px;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid #eee;
        }

        .pub-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--accent-color);
        }

        .pub-year-badge {
            background: color-mix(in srgb, var(--accent-color), transparent 90%);
            color: var(--accent-color);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            display: inline-block;
        }

        .pub-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--heading-color);
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn-card-outline {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            background: transparent;
            border-radius: 5px;
            color: var(--default-color);
            font-weight: 600;
            transition: 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .pub-card:hover .btn-card-outline {
            background: var(--accent-color);
            color: #fff;
            border-color: var(--accent-color);
        }
    </style>
</head>

<body class="starter-page-page">

    <?php include 'navbar.php'; ?>

    <main id="main">

        <section id="hero" class="hero section">
            <div class="container">
                <div class="row gy-4 align-items-center">

                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">Laboratorium Teknologi Data</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Pusat riset unggulan yang berfokus pada inovasi
                            pengolahan data, kecerdasan buatan (AI), dan pengembangan solusi berbasis Big Data di
                            lingkungan Jurusan Teknologi Informasi Polinema.</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="#publications" class="btn-get-started">Jelajahi Riset Kami <i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-6 order-1 order-lg-2 hero-img d-flex justify-content-end" data-aos="zoom-out">
                        <img src="<?= BASE_URL ?>public/assets/img/penelitian.png" class="img-fluid animated"
                            alt="Penelitian Lab Data">
                    </div>
                </div>
            </div>
        </section>

        <section id="publications" class="publication-section">
            <div class="container" data-aos="fade-up">

                <div class="container section-title" data-aos="fade-up">
                    <h2>Publikasi</h2>
                    <p>Sorotan Publikasi Ilmiah</p>
                </div>

                <div class="section-header-custom">
                    <div class="filter-group">
                        <button class="filter-btn active">Most Cited</button>
                        <button class="filter-btn">Latest Release</button>
                        <button class="filter-btn">By Year <i class="bi bi-chevron-down ms-1"></i></button>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pub-card">
                            <div>
                                <span class="pub-year-badge">2010</span>
                                <h3 class="pub-title">Variations in chlorophyll-a concentration and the impact on
                                    Sardinella lemuru catches in Bali Strait, Indonesia</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pub-card">
                            <div>
                                <span class="pub-year-badge">2022</span>
                                <h3 class="pub-title">Implementation IoT in system monitoring hydroponic plant water
                                    circulation and control based on real-time data</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="pub-card">
                            <div>
                                <span class="pub-year-badge">2018</span>
                                <h3 class="pub-title">Sistem Monitoring Budidaya Ikan Lele Berbasis Internet Of Things
                                    Menggunakan Raspberry Pi dan Analisis Data</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="pub-card">
                            <div>
                                <span class="pub-year-badge">2018</span>
                                <h3 class="pub-title">Internet of Things integration in smart grid: Challenges and
                                    opportunities for future energy systems</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="pub-card">
                            <div>
                                <span class="pub-year-badge">2022</span>
                                <h3 class="pub-title">State space control using LQR method for a cart-inverted pendulum
                                    linearised model optimization</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="pub-card">
                            <div>
                                <span class="pub-year-badge">2017</span>
                                <h3 class="pub-title">Change in species composition and its implication on climate
                                    variation in Bali Strait: Case study 2006-2017</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="#" class="btn-get-started" style="display:inline-block; padding: 12px 30px;">Lihat Arsip
                        Lengkap</a>
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

</body>

</html>
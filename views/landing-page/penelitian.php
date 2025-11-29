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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="<?= BASE_URL ?>/public/assets/css/main.css" rel="stylesheet">

    <style>
        /* --- CSS Variables untuk Konsistensi Tema --- */
        :root {
            --color-primary-dark: #27505B;
            --color-primary-light: #529BAF;
            /* Membuat gradien dari warna brand untuk kesan futuristik */
            --gradient-primary: linear-gradient(135deg, var(--color-primary-dark), var(--color-primary-light));
            --color-bg-body: #f8faff;
            /* Latar belakang sedikit lebih terang dan bersih */
            --color-text-body: #555555;
            --color-text-heading: #2c3e50;
            /* Shadow untuk keadaan normal dan hover */
            --box-shadow-normal: 0 10px 30px -15px rgba(39, 80, 91, 0.1);
            --box-shadow-hover: 0 20px 40px -10px rgba(82, 155, 175, 0.3);
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--color-text-body);
            background-color: var(--color-bg-body);
            overflow-x: hidden;
        }

        h1,
        h2,
        h3 {
            color: var(--color-text-heading);
            letter-spacing: -0.5px;
        }

        /* --- HERO SECTION MODERN --- */
        .hero-section {
            /* Menggunakan background dengan sedikit gradien halus */
            background: linear-gradient(to bottom, #edf2f4 0%, #f8faff 100%);
            padding: 120px 0 80px;
            /* Padding atas lebih besar untuk ruang navbar */
            display: flex;
            align-items: center;
            min-height: 80vh;
            /* Memastikan hero cukup tinggi di layar besar */
        }

        .hero-title {
            color: var(--color-primary-dark);
            font-weight: 800;
            font-size: 3rem;
            margin-bottom: 25px;
            line-height: 1.2;
        }

        .hero-desc {
            font-size: 1.05rem;
            line-height: 1.7;
            margin-bottom: 40px;
            color: var(--color-text-body);
            text-align: justify;
            max-width: 600px;
            /* Membatasi lebar teks agar lebih mudah dibaca */
        }

        /* Tombol Utama dengan Gradien */
        .btn-gradient-primary {
            background: var(--gradient-primary);
            color: white;
            padding: 12px 35px;
            border-radius: 50px;
            /* Bentuk pil agar lebih modern */
            font-weight: 600;
            font-size: 0.95rem;
            border: none;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(82, 155, 175, 0.3);
        }

        .btn-gradient-primary:hover {
            transform: translateY(-3px);
            /* Efek angkat saat hover */
            box-shadow: 0 8px 25px rgba(82, 155, 175, 0.5);
            color: white;
        }

        /* PERBAIKAN UKURAN GAMBAR HERO */
        .hero-img-container {
            position: relative;
            z-index: 1;
        }

        /* Efek elemen dekoratif di belakang gambar (opsional, menambah kesan futuristik) */
        .hero-img-container::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80%;
            height: 80%;
            background: var(--color-primary-light);
            filter: blur(80px);
            opacity: 0.2;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .hero-img {
            /* Membatasi lebar maksimal gambar agar tidak "kebesaran" */
            max-width: 480px;
            width: 100%;
            height: auto;
            /* Memberikan efek bayangan berwarna (glow) agar terlihat hidup */
            filter: drop-shadow(0px 20px 40px rgba(82, 155, 175, 0.25));
            animation: floatImage 6s ease-in-out infinite;
            /* Animasi mengambang */
        }

        @keyframes floatImage {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }


        /* --- PUBLICATION SECTION FUTURISTIC --- */
        .publication-section {
            padding: 100px 0;
            background-color: transparent;
            position: relative;
        }

        .section-header-custom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
            flex-wrap: wrap;
            gap: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding-bottom: 20px;
        }

        .section-title {
            color: var(--color-primary-dark);
            font-weight: 800;
            font-size: 2rem;
            margin: 0;
            position: relative;
        }

        /* Garis bawah kecil pada judul */
        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 3px;
            background: var(--gradient-primary);
            border-radius: 3px;
        }

        /* Filter Buttons Modern */
        .filter-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-btn {
            background-color: transparent;
            color: var(--color-primary-dark);
            border: 2px solid rgba(82, 155, 175, 0.3);
            font-size: 0.85rem;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: var(--gradient-primary);
            color: white;
            border-color: transparent;
            box-shadow: 0 4px 15px rgba(82, 155, 175, 0.2);
        }

        /* --- KARTU PUBLIKASI PROFESIONAL & INTERAKTIF --- */
        .pub-card {
            background-color: #ffffff;
            border-radius: 20px;
            /* Sudut lebih membulat */
            padding: 30px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Transisi halus untuk semua properti */
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: var(--box-shadow-normal);
            border: 1px solid transparent;
            /* Placeholder untuk border hover */
            position: relative;
            overflow: hidden;
            min-height: 250px;
        }

        /* Efek Hover Futuristik */
        .pub-card:hover {
            transform: translateY(-10px) scale(1.02);
            /* Kartu terangkat dan sedikit membesar */
            box-shadow: var(--box-shadow-hover);
            /* Bayangan glow lebih besar */
            border-color: rgba(82, 155, 175, 0.3);
            /* Border halus berwarna muncul */
        }

        .pub-content {
            margin-bottom: 20px;
        }

        /* Badge Tahun Modern */
        .pub-year-badge {
            display: inline-block;
            background: rgba(82, 155, 175, 0.1);
            /* Latar belakang transparan berwarna */
            color: var(--color-primary-dark);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 20px;
            margin-bottom: 15px;
        }

        .pub-title {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--color-text-heading);
            line-height: 1.5;
            /* Membatasi judul maksimal 3 baris dengan ellipsis */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Tombol "Baca" di dalam kartu */
        .btn-card-outline {
            width: 100%;
            background: transparent;
            border: 2px solid #e0e0e0;
            color: #777;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 12px;
            padding: 10px 0;
            transition: all 0.3s ease;
            margin-top: auto;
            /* Mendorong tombol ke bawah */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Efek hover pada tombol kartu */
        .pub-card:hover .btn-card-outline {
            border-color: transparent;
            background: var(--gradient-primary);
            color: white;
            box-shadow: 0 4px 15px rgba(82, 155, 175, 0.3);
        }

        .btn-card-outline i {
            margin-left: 8px;
            font-size: 0.8rem;
            transition: margin-left 0.3s ease;
        }

        .pub-card:hover .btn-card-outline i {
            margin-left: 12px;
            /* Panah bergerak sedikit saat hover */
        }


        /* Tombol Load More */
        .btn-load-more-outline {
            background-color: transparent;
            color: var(--color-primary-dark);
            border: 2px solid var(--color-primary-dark);
            padding: 12px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.95rem;
            margin-top: 50px;
            transition: all 0.3s ease;
        }

        .btn-load-more-outline:hover {
            background: var(--gradient-primary);
            border-color: transparent;
            color: white;
            box-shadow: 0 8px 25px rgba(82, 155, 175, 0.4);
            transform: translateY(-3px);
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 991px) {
            .hero-section {
                padding: 100px 0 60px;
                text-align: center;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-desc {
                margin: 0 auto 40px;
                /* Center text */
            }

            .hero-img-container {
                margin-top: 50px;
            }

            .hero-img {
                max-width: 350px;
                /* Gambar lebih kecil di mobile */
            }
        }
    </style>
</head>

<body class="starter-page-page">

    <?php include 'navbar.php'; ?>

    <main id="main">

        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="100">
                        <h1 class="hero-title">Laboratorium<br>Teknologi Data</h1>
                        <p class="hero-desc">
                            Pusat riset unggulan yang berfokus pada inovasi pengolahan data, kecerdasan buatan (AI), dan
                            pengembangan solusi berbasis Big Data di lingkungan Jurusan Teknologi Informasi Polinema.
                            Kami mendorong kolaborasi ilmiah untuk menciptakan dampak nyata.
                        </p>
                        <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                            <a href="#publications" class="btn-gradient-primary">
                                Jelajahi Riset Kami <i class="bi bi-arrow-down-circle ms-2"></i>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                        <div class="hero-img-container">
                            <img src="<?= BASE_URL ?>/public/assets/img/penelitian.png" class="img-fluid hero-img"
                                alt="Ilustrasi Futuristik Penelitian Data">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="publications" class="publication-section">
            <div class="container" data-aos="fade-up">
                <div class="section-header-custom">
                    <h2 class="section-title">Sorotan Publikasi Ilmiah</h2>
                    <div class="filter-group">
                        <button class="filter-btn active">Most Cited</button>
                        <button class="filter-btn">Latest Release</button>
                        <button class="filter-btn">By Year <i class="bi bi-chevron-down ms-1"
                                style="font-size: 0.7rem;"></i></button>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pub-card">
                            <div class="pub-content">
                                <span class="pub-year-badge">2010</span>
                                <h3 class="pub-title">Variations in chlorophyll-a concentration and the impact on
                                    Sardinella lemuru catches in Bali Strait, Indonesia</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="pub-card">
                            <div class="pub-content">
                                <span class="pub-year-badge">2022</span>
                                <h3 class="pub-title">Implementation IoT in system monitoring hydroponic plant water
                                    circulation and control based on real-time data</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pub-card">
                            <div class="pub-content">
                                <span class="pub-year-badge">2018</span>
                                <h3 class="pub-title">Sistem Monitoring Budidaya Ikan Lele Berbasis Internet Of Things
                                    Menggunakan Raspberry Pi dan Analisis Data</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                        <div class="pub-card">
                            <div class="pub-content">
                                <span class="pub-year-badge">2018</span>
                                <h3 class="pub-title">Internet of Things integration in smart grid: Challenges and
                                    opportunities for future energy systems</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="pub-card">
                            <div class="pub-content">
                                <span class="pub-year-badge">2022</span>
                                <h3 class="pub-title">State space control using LQR method for a cart-inverted pendulum
                                    linearised model optimization</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="350">
                        <div class="pub-card">
                            <div class="pub-content">
                                <span class="pub-year-badge">2017</span>
                                <h3 class="pub-title">Change in species composition and its implication on climate
                                    variation in Bali Strait: Case study 2006-2017</h3>
                            </div>
                            <button class="btn-card-outline">Baca Selengkapnya <i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn-load-more-outline">Lihat Arsip Lengkap</button>
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
        window.addEventListener('load', () => {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            })
        });
    </script>

</body>

</html>
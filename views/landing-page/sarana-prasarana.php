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
        /* --- Base Style untuk Card Fasilitas --- */
        .facility-card {
            background-color: #ecf0f1;
            /* Warna dasar abu-abu terang */
            border-radius: 15px;
            padding: 20px;
            height: 100%;
            transition: all 0.3s ease-in-out;
            /* Animasi transisi halus */
            border: 1px solid transparent;
            overflow: hidden;
        }

        /* Styling Gambar */
        .facility-card .post-img {
            overflow: hidden;
            /* Penting agar zoom gambar tidak keluar batas */
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .facility-card .post-img img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
            /* Animasi zoom gambar */
        }

        /* Styling Judul */
        .facility-card .title a {
            color: #2c4964;
            text-decoration: none;
            font-weight: 700;
            pointer-events: none;
            /* Sesuai kode asli Anda */
            display: block;
        }

        /* Styling Konten Teks */
        .facility-card .content p {
            text-align: justify;
            font-size: 14px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* --- EFEK HOVER --- */
        .facility-card:hover {
            background-color: #ffffff;
            /* Berubah jadi putih bersih saat di-hover */
            transform: translateY(-10px);
            /* Kartu naik ke atas */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            /* Bayangan muncul */
            border-color: #e2e6ea;
            /* Sedikit border halus */
        }

        /* Efek Zoom pada Gambar saat Hover */
        .facility-card:hover .post-img img {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="service-details-page">

    <?php include 'navbar.php'; ?>

    <main class="main">

        <section class="section py-5">
            <div class="container">
                <div class="row align-items-center justify-content-between">

                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-3" style="color: #2c4964; font-size: 2.5rem;">Sarana dan Prasarana</h2>

                        <p class="text-muted" style="line-height: 1.8; text-align: justify;">
                            Fasilitas di gedung Jurusan Teknologi Informasi mencakup beragam sarana penting yang
                            mendukung aktivitas akademik mahasiswa dan dosen. Tersedia ruang kuliah yang nyaman dengan
                            perangkat presentasi, laboratorium sesuai bidang keilmuan, serta aula serbaguna untuk
                            seminar dan pelatihan. Selain itu, terdapat mushola, kantin, dan area parkir yang luas demi
                            kenyamanan civitas akademika. Seluruh fasilitas ini berada di lantai 5 hingga 8 gedung
                            perkuliahan dan mendukung proses pembelajaran, praktikum, serta kegiatan jurusan secara
                            optimal.
                        </p>
                    </div>

                    <div class="col-lg-7">
                        <img src="<?= BASE_URL ?>/public/assets/img/gedung-ti-polinema.png"
                            alt="Gedung Jurusan Teknologi Informasi" class="img-fluid rounded-4 shadow-sm w-100"
                            data-aos="fade-left">
                    </div>

                </div>
            </div>
        </section>

        <section id="fasilitas" class="blog section py-5">
            <div class="container">

                <div class="row gy-4 posts-list">

                    <div class="col-xl-4 col-md-6">
                        <article class="facility-card">
                            <div class="post-img text-center">
                                <img src="<?= BASE_URL ?>/public/assets/img/ruang-lab1.png" alt="Komputer Standar"
                                    class="img-fluid">
                            </div>
                            <h2 class="title mb-3">
                                <a href="#">Komputer Standar</a>
                            </h2>
                            <div class="content">
                                <p>
                                    Laboratorium memiliki empat unit komputer standar sebagai perangkat utama untuk
                                    kegiatan praktikum dan riset awal. Perangkat ini tetap mendukung aktivitas
                                    pengolahan data sederhana.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <article class="facility-card">
                            <div class="post-img text-center">
                                <img src="<?= BASE_URL ?>/public/assets/img/ruang-lab1.png" alt="Meja Kerja"
                                    class="img-fluid">
                            </div>
                            <h2 class="title mb-3">
                                <a href="#">Meja Kerja</a>
                            </h2>
                            <div class="content">
                                <p>
                                    Meja kerja disediakan sebagai area penempatan perangkat dan ruang aktivitas
                                    mahasiswa maupun dosen. Fasilitas ini membantu menciptakan lingkungan belajar yang
                                    tertata dan nyaman.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <article class="facility-card">
                            <div class="post-img text-center">
                                <img src="<?= BASE_URL ?>/public/assets/img/ruang-lab1.png" alt="Kursi Praktikum"
                                    class="img-fluid">
                            </div>
                            <h2 class="title mb-3">
                                <a href="#">Kursi Praktikum</a>
                            </h2>
                            <div class="content">
                                <p>
                                    Kursi praktikum tersedia untuk mendukung kenyamanan pengguna selama proses
                                    pembelajaran dan penelitian. Penataannya disesuaikan agar kegiatan di laboratorium
                                    berlangsung efektif.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <article class="facility-card">
                            <div class="post-img text-center">
                                <img src="<?= BASE_URL ?>/public/assets/img/ruang-lab1.png" alt="Perlengkapan Dasar"
                                    class="img-fluid">
                            </div>
                            <h2 class="title mb-3">
                                <a href="#">Perlengkapan Dasar</a>
                            </h2>
                            <div class="content">
                                <p>
                                    Laboratorium dilengkapi perlengkapan dasar setara ruang kelas, seperti kabel, stop
                                    kontak, dan perangkat kecil pendukung. Fasilitas ini membantu kegiatan praktikum
                                    berjalan tanpa hambatan teknis ringan.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <article class="facility-card">
                            <div class="post-img text-center">
                                <img src="<?= BASE_URL ?>/public/assets/img/ruang-lab1.png" alt="Ruang Laboratorium"
                                    class="img-fluid">
                            </div>
                            <h2 class="title mb-3">
                                <a href="#">Ruang Laboratorium</a>
                            </h2>
                            <div class="content">
                                <p>
                                    Sebuah ruangan khusus telah disiapkan untuk Laboratorium Teknologi Data sejak
                                    semester Genap 2024/2025. Ruangan ini menjadi pusat aktivitas riset, diskusi, dan
                                    pengembangan kompetensi bidang data.
                                </p>
                            </div>
                        </article>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <article class="facility-card">
                            <div class="post-img text-center">
                                <img src="<?= BASE_URL ?>/public/assets/img/ruang-lab1.png" alt="Server Dasar"
                                    class="img-fluid">
                            </div>
                            <h2 class="title mb-3">
                                <a href="#">Server Dasar</a>
                            </h2>
                            <div class="content">
                                <p>
                                    Laboratorium mulai menyediakan server entry-level sebagai tahap awal pemenuhan
                                    kebutuhan komputasi. Infrastruktur ini mendukung eksperimen sederhana terkait big
                                    data dan pembelajaran cloud.
                                </p>
                            </div>
                        </article>
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
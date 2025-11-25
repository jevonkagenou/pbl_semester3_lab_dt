<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Starter Page - FlexStart Bootstrap Template</title>
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

<body class="starter-page-page">

    <?php include 'navbar.php'; ?>

    <main class="main">

        <section class="section py-5" style="background-color: #edf2f4; color: #333;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="mb-5">
                            <h1 class="fw-bold mb-4" style="color: #2c4964;">SOP Praktikum</h1>
                        </div>

                        <div class="mb-5">
                            <h2 class="fw-bold mb-3" style="color: #2c4964;">Ketentuan Umum</h2>
                            <ol class="ps-3" style="line-height: 1.8; text-align: justify;">
                                <li class="mb-2">Praktikum hanya boleh dilaksanakan pada jadwal resmi yang telah
                                    ditetapkan oleh Jurusan Teknologi Informasi.</li>
                                <li class="mb-2">Seluruh peserta wajib hadir tepat waktu dan mengikuti instruksi asisten
                                    atau dosen pengampu.</li>
                                <li class="mb-2">Peserta wajib menggunakan identitas lengkap berupa kartu tanda
                                    mahasiswa selama berada di laboratorium.</li>
                                <li>Setiap peserta wajib menjaga ketertiban, kebersihan, dan keamanan fasilitas
                                    laboratorium.</li>
                            </ol>
                        </div>

                        <div class="mb-5">
                            <h2 class="fw-bold mb-3" style="color: #2c4964;">Tata Tertib Masuk Laboratorium</h2>
                            <ol class="ps-3" style="line-height: 1.8; text-align: justify;">
                                <li class="mb-2">Mahasiswa wajib melakukan presensi sebelum praktikum dimulai.</li>
                                <li class="mb-2">Tas, jaket, dan barang non-esensial wajib ditaruh di tempat yang telah
                                    disediakan.</li>
                                <li class="mb-2">Dilarang membawa makanan, minuman, atau benda yang dapat merusak
                                    perangkat laboratorium.</li>
                                <li>Setiap peserta wajib memastikan perangkat komputer dan akun login digunakan sesuai
                                    ketentuan.</li>
                            </ol>
                        </div>

                        <div class="mb-5">
                            <h2 class="fw-bold mb-3" style="color: #2c4964;">Aturan Selama Praktikum</h2>
                            <ol class="ps-3" style="line-height: 1.8; text-align: justify;">
                                <li class="mb-2">Mahasiswa hanya boleh menggunakan komputer, server, atau perangkat lab
                                    sesuai arahan asisten/dosen.</li>
                                <li class="mb-2">Dilarang mengubah konfigurasi perangkat keras maupun perangkat lunak
                                    tanpa izin.</li>
                                <li class="mb-2">Mahasiswa wajib mengerjakan modul praktikum secara mandiri, kecuali
                                    instruktur mengizinkan diskusi.</li>
                                <li class="mb-2">Seluruh kegiatan praktikum harus mengikuti prosedur teknis yang
                                    ditetapkan pada modul.</li>
                                <li>Mahasiswa wajib menjaga ketenangan agar praktikum berjalan kondusif.</li>
                            </ol>
                        </div>

                        <div class="mb-5">
                            <h2 class="fw-bold mb-3" style="color: #2c4964;">Keamanan Data dan Perangkat</h2>
                            <ol class="ps-3" style="line-height: 1.8; text-align: justify;">
                                <li class="mb-2">Dilarang keras menginstal aplikasi tanpa izin tertulis.</li>
                                <li class="mb-2">File praktikum wajib disimpan pada direktori yang telah disediakan dan
                                    dilarang meninggalkan data pribadi di komputer lab.</li>
                                <li class="mb-2">Mahasiswa bertanggung jawab penuh atas setiap aktivitas penggunaan akun
                                    yang diberikan.</li>
                                <li>Segera laporkan jika terjadi error, kerusakan perangkat, atau insiden keamanan data.
                                </li>
                            </ol>
                        </div>

                        <div class="mb-5">
                            <h2 class="fw-bold mb-3" style="color: #2c4964;">Penutupan dan Keluar Laboratorium</h2>
                            <ol class="ps-3" style="line-height: 1.8; text-align: justify;">
                                <li class="mb-2">Mahasiswa wajib melakukan pengecekan ulang perangkat yang digunakan.
                                </li>
                                <li class="mb-2">Semua aplikasi harus ditutup dan komputer dikembalikan ke kondisi awal.
                                </li>
                                <li class="mb-2">Setiap peserta wajib melakukan presensi keluar sebelum meninggalkan
                                    laboratorium.</li>
                                <li>Kebersihan area kerja menjadi tanggung jawab masing-masing peserta.</li>
                            </ol>
                        </div>

                        <div class="mb-5">
                            <h2 class="fw-bold mb-3" style="color: #2c4964;">Sanksi Pelanggaran</h2>
                            <ol class="ps-3" style="line-height: 1.8; text-align: justify;">
                                <li class="mb-2">Peringatan lisan dari asisten atau dosen.</li>
                                <li class="mb-2">Pengurangan nilai praktikum.</li>
                                <li class="mb-2">Pembatalan keikutsertaan praktikum pada sesi tersebut.</li>
                                <li>Tindakan lanjutan sesuai peraturan Jurusan Teknologi Informasi apabila terjadi
                                    pelanggaran berat.</li>
                            </ol>
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
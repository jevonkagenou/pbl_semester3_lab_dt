<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $berita['judulberita'] ?> - Politeknik Negeri Malang</title>
    <meta name="description" content="<?= substr(strip_tags($berita['isi']), 0, 150) ?>...">
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
</head>

<body class="blog-page">

    <?php include 'navbar.php'; ?>

    <main class="main">

        <section class="section py-5" style="background-color: #fff; color: #333; font-family: 'Inter', sans-serif;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <h1 class="fw-bold mb-3" style="color: #2c4964; font-size: 2.2rem; line-height: 1.3;">
                            <?= $berita['judulberita'] ?>
                        </h1>

                        <div class="d-flex align-items-center text-muted mb-4" style="font-size: 0.9rem;">
                            <span class="fw-bold me-3 text-uppercase" style="color: #555;">BY
                                <?= $berita['jurnalis_nama'] ?></span>
                            <span><i class="bi bi-clock me-1"></i>
                                <?= date('l, d F Y', strtotime($berita['created_at'])) ?></span>
                        </div>

                        <div class="mb-5">
                            <img src="<?= BASE_URL ?>/public/uploads/berita/<?= $berita['fotodokumentasi'] ?>"
                                onerror="this.onerror=null; this.src='<?= BASE_URL ?>/public/assets/img/lomba1.png';"
                                class="img-fluid rounded-4 w-100 shadow-sm" alt="<?= $berita['judulberita'] ?>"
                                style="max-height: 500px; object-fit: cover;">
                        </div>

                        <div class="article-content" style="line-height: 1.8; text-align: justify; color: #333;">
                            <?= nl2br($berita['isi']) ?>
                        </div>

                        <div class="mt-5">
                            <a href="<?= BASE_URL ?>/berita" class="btn btn-outline-primary rounded-pill px-4">
                                <i class="bi bi-arrow-left me-2"></i> Kembali ke Berita
                            </a>
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

</body>

</html>
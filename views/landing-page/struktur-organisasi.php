<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Struktur Organisasi - Jurusan Teknologi Informasi</title>
    <meta name="description" content="">
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

    <style>
        .member-card {
            background-color: #ffffffff;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            border: none;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .member-card .img-wrapper {
            width: 100%;
            height: 350px;
            overflow: hidden;
            border-radius: 6px;
            margin-bottom: 1.5rem;
        }

        .member-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
            transition: transform 0.5s ease;
        }

        .member-card:hover img {
            transform: scale(1.05);
        }

        .member-card h5 {
            color: #2C4964 !important;
            font-size: 1rem;
            margin-top: 15px;
            font-weight: 600;
        }

        .member-card p {
            color: #fca311 !important;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .member-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            background-color: #ffffffff;
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

                <?php
                $kepalaLab = null;
                $anggotaLain = [];

                if (!empty($members)) {
                    foreach ($members as $row) {
                        $status = strtolower($row['statusmember'] ?? '');
                        if ($status == 'non-aktif' || $status == 'inactive') continue;

                        $jabatan = strtolower($row['jabatan'] ?? '');
                        
                        if (strpos($jabatan, 'kepala') !== false || strpos($jabatan, 'ketua') !== false) {
                            $kepalaLab = $row;
                        } else {
                            $anggotaLain[] = $row;
                        }
                    }
                }
                ?>

                <?php if ($kepalaLab) : ?>
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <div class="img-wrapper">
                                <?php
                                    $fotoName = $kepalaLab['fotoprofil'];
                                    $uploadDir = __DIR__ . '/../../public/uploads/members/'; 
                                    $urlFolder = BASE_URL . '/public/uploads/members/';
                                    $defaultFoto = BASE_URL . '/public/assets/img/team/kepala-lab.png';

                                    if (!empty($fotoName) && file_exists($uploadDir . $fotoName)) {
                                        $finalFoto = $urlFolder . $fotoName;
                                    } else {
                                        $finalFoto = $defaultFoto;
                                    }
                                ?>
                                <img src="<?= $finalFoto ?>" alt="<?= $kepalaLab['namamember'] ?>"
                                    onerror="this.onerror=null;this.src='<?= $defaultFoto ?>';">
                            </div>
                            <h5 class="fw-bold mb-1"><?= $kepalaLab['namamember'] ?></h5>
                            <?php if(!empty($kepalaLab['gelar'])): ?>
                            <small class="text-muted d-block mb-1"><?= $kepalaLab['gelar'] ?></small>
                            <?php endif; ?>
                            <p class="mb-0"><?= $kepalaLab['jabatan'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="row gy-4 mb-4 justify-content-center">
                    <?php foreach ($anggotaLain as $row) : ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="member-card p-4 text-center h-100">
                            <div class="img-wrapper">
                                <?php
                                    $fotoName = $row['fotoprofil'];
                                    $uploadDir = __DIR__ . '/../../public/uploads/members/'; 
                                    $urlFolder = BASE_URL . '/public/uploads/members/';
                                    $defaultFoto = BASE_URL . '/public/assets/img/team/kepala-lab.png';

                                    if (!empty($fotoName) && file_exists($uploadDir . $fotoName)) {
                                        $finalFoto = $urlFolder . $fotoName;
                                    } else {
                                        $finalFoto = $defaultFoto;
                                    }
                                ?>
                                <img src="<?= $finalFoto ?>" alt="<?= $row['namamember'] ?>"
                                    onerror="this.onerror=null;this.src='<?= $defaultFoto ?>';">
                            </div>
                            <h5 class="fw-bold mb-1"><?= $row['namamember'] ?></h5>
                            <?php if(!empty($row['gelar'])): ?>
                            <small class="text-muted d-block mb-1"><?= $row['gelar'] ?></small>
                            <?php endif; ?>
                            <p class="mb-0"><?= $row['jabatan'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
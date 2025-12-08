<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sarana dan Prasarana - Jurusan Teknologi Informasi</title>
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
        .facility-card {
            background-color: #fff;
            border-radius: 12px;
            padding: 20px;
            height: 100%;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
            display: flex;
            flex-direction: column;
        }

        .facility-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-color: #27505B;
        }

        .facility-card .post-img {
            border-radius: 8px;
            margin-bottom: 15px;
            overflow: hidden;
            aspect-ratio: 16/9;
        }

        .facility-card .post-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .facility-card:hover .post-img img {
            transform: scale(1.05);
        }

        .facility-card .title a {
            color: #27505B;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.2rem;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .facility-card .content {
            flex-grow: 1;
        }

        .facility-card .content p {
            font-size: 14px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 0;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            word-break: break-word;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 40px;
        }

        .pagination-btn {
            padding: 8px 16px;
            border: 1px solid #ddd;
            background: #fff;
            color: #27505B;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .pagination-btn:hover,
        .pagination-btn.active {
            background: #27505B;
            color: #fff;
            border-color: #27505B;
        }

        .pagination-btn:disabled {
            background: #f5f5f5;
            color: #ccc;
            cursor: not-allowed;
            border-color: #eee;
        }
    </style>
</head>

<body class="service-details-page">

    <?php include 'navbar.php'; ?>

    <main class="main">

        <section class="section py-5 bg-light">
            <div class="container">
                <div class="row align-items-center justify-content-between">

                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-3 display-6" style="color: #27505B;">Sarana dan Prasarana</h2>

                        <p class="text-muted" style="line-height: 1.8; text-align: justify;">
                            Fasilitas di gedung Jurusan Teknologi Informasi mencakup beragam sarana penting yang
                            mendukung aktivitas akademik mahasiswa dan dosen. Tersedia ruang kuliah yang nyaman dengan
                            perangkat presentasi, laboratorium sesuai bidang keilmuan, serta aula serbaguna. Seluruh
                            fasilitas ini berada di lantai 5 hingga 8 gedung perkuliahan.
                        </p>
                    </div>

                    <div class="col-lg-6">
                        <img src="<?= BASE_URL ?>/public/assets/img/gedung-ti-polinema.png"
                            alt="Gedung Jurusan Teknologi Informasi" class="img-fluid rounded-4 shadow w-100"
                            data-aos="fade-left">
                    </div>

                </div>
            </div>
        </section>

        <section id="fasilitas" class="blog section py-5">
            <div class="container">

                <div class="row gy-4 posts-list" id="facility-container">

                    <?php if (!empty($fasilitas)) : ?>
                    <?php foreach ($fasilitas as $row) : ?>

                    <div class="col-xl-4 col-md-6 facility-item">
                        <article class="facility-card h-100">
                            <div class="post-img text-center">
                                <?php
                                            $urlFolder = BASE_URL . '/public/uploads/fasilitas/';
                                            
                                            if (!empty($row['foto'])) {
                                                $finalFoto = $urlFolder . $row['foto'];
                                            } else {
                                                $finalFoto = BASE_URL . '/public/assets/img/ruang-lab1.png';
                                            }
                                        ?>
                                <img src="<?= $finalFoto ?>" alt="<?= $row['namafasilitas'] ?>"
                                    onerror="this.onerror=null;this.src='<?= BASE_URL ?>/public/assets/img/ruang-lab1.png';">
                            </div>

                            <h2 class="title mb-2">
                                <a href="javascript:void(0)"><?= $row['namafasilitas'] ?></a>
                            </h2>

                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-success rounded-pill px-3">
                                    <i class="bi bi-box-seam me-1"></i> <?= $row['jumlah'] ?> Unit
                                </span>
                            </div>

                            <div class="content">
                                <p title="<?= htmlspecialchars($row['deskripsi']) ?>">
                                    <?= $row['deskripsi'] ?>
                                </p>
                            </div>
                        </article>
                    </div>

                    <?php endforeach; ?>
                    <?php else : ?>

                    <div class="col-12 text-center py-5">
                        <div class="alert alert-secondary d-inline-block px-5" role="alert">
                            <i class="bi bi-info-circle me-2"></i> Belum ada data fasilitas yang tersedia.
                        </div>
                    </div>

                    <?php endif; ?>

                </div>

                <div class="pagination-container" id="pagination-controls"></div>

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
        document.addEventListener('DOMContentLoaded', function () {
            const itemsPerPage = 6;
            const items = document.querySelectorAll('.facility-item');
            const totalItems = items.length;
            const totalPages = Math.ceil(totalItems / itemsPerPage);
            const paginationContainer = document.getElementById('pagination-controls');
            let currentPage = 1;

            if (totalItems <= itemsPerPage) return;

            function showPage(page) {
                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;

                items.forEach((item, index) => {
                    if (index >= start && index < end) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                updateButtons(page);
            }

            function updateButtons(page) {
                paginationContainer.innerHTML = '';

                const prevBtn = document.createElement('button');
                prevBtn.innerText = 'Prev';
                prevBtn.classList.add('pagination-btn');
                prevBtn.disabled = page === 1;
                prevBtn.onclick = () => {
                    currentPage--;
                    showPage(currentPage);
                    window.scrollTo({
                        top: document.getElementById('fasilitas').offsetTop - 100,
                        behavior: 'smooth'
                    });
                };
                paginationContainer.appendChild(prevBtn);

                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.innerText = i;
                    btn.classList.add('pagination-btn');
                    if (i === page) btn.classList.add('active');
                    btn.onclick = () => {
                        currentPage = i;
                        showPage(currentPage);
                        window.scrollTo({
                            top: document.getElementById('fasilitas').offsetTop - 100,
                            behavior: 'smooth'
                        });
                    };
                    paginationContainer.appendChild(btn);
                }

                const nextBtn = document.createElement('button');
                nextBtn.innerText = 'Next';
                nextBtn.classList.add('pagination-btn');
                nextBtn.disabled = page === totalPages;
                nextBtn.onclick = () => {
                    currentPage++;
                    showPage(currentPage);
                    window.scrollTo({
                        top: document.getElementById('fasilitas').offsetTop - 100,
                        behavior: 'smooth'
                    });
                };
                paginationContainer.appendChild(nextBtn);
            }

            showPage(1);
        });
    </script>

</body>

</html>
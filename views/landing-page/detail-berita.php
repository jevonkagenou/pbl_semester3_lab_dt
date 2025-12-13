<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $berita['judulberita'] ?> - Politeknik Negeri Malang</title>
    <meta name="description" content="<?= substr(strip_tags($berita['isi']), 0, 150) ?>...">

    <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
    <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="<?= BASE_URL ?>/public/assets/css/main.css" rel="stylesheet">

    <style>
        :root {
            --color-primary: #27505B;
            --color-primary-dark: #1d3c45;
            --color-accent: #4dc4e0;
            --color-surface: #ffffff;
            --color-bg: #f0f4f8;
            --shadow-soft: 0 10px 40px -10px rgba(39, 80, 91, 0.15);
            --shadow-hover: 0 20px 60px -15px rgba(39, 80, 91, 0.25);
            --glass-bg: rgba(255, 255, 255, 0.85);
            --glass-border: 1px solid rgba(255, 255, 255, 0.6);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--color-bg);
            color: #334155;
            overflow-x: hidden;
        }

        .scroll-progress-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: transparent;
            z-index: 9999;
        }

        .scroll-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
            width: 0%;
            transition: width 0.1s ease-out;
        }

        .hero-section {
            position: relative;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
            min-height: 500px;
            display: flex;
            align-items: center;
            padding-top: 80px;
            padding-bottom: 150px;
            overflow: hidden;
        }

        .hero-bg-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(circle at 10% 20%, rgba(77, 196, 224, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(77, 196, 224, 0.1) 0%, transparent 20%);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .article-title {
            font-size: 2.75rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            letter-spacing: -0.02em;
            background: linear-gradient(to right, #ffffff, #e0f7fa);
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .article-meta {
            display: inline-flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .meta-item i {
            color: var(--color-accent);
        }

        .main-content-wrapper {
            margin-top: -120px;
            position: relative;
            z-index: 10;
            padding-bottom: 80px;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: var(--glass-border);
            border-radius: 30px;
            padding: 50px;
            box-shadow: var(--shadow-soft);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .featured-image-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            aspect-ratio: 16/9;
        }

        .featured-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        .featured-image-container:hover .featured-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .featured-image-container:hover .image-overlay {
            opacity: 1;
        }

        .zoom-icon {
            font-size: 3rem;
            color: white;
            transform: scale(0.8);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .featured-image-container:hover .zoom-icon {
            transform: scale(1);
        }

        .category-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
            justify-content: center;
        }

        .modern-tag {
            padding: 8px 18px;
            background: linear-gradient(135deg, #fff, #f8f9fa);
            color: var(--color-primary);
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .modern-tag:hover {
            background: var(--color-primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(39, 80, 91, 0.2);
        }

        .article-body {
            font-size: 1.15rem;
            line-height: 1.9;
            color: #475569;
            margin-bottom: 50px;
            text-align: justify;
        }

        .article-body p {
            margin-bottom: 1.8rem;
        }

        .share-section {
            background: #f8fafc;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            margin-top: 50px;
            border: 1px dashed #cbd5e1;
        }

        .share-title {
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            margin-bottom: 20px;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-decoration: none;
        }

        .social-btn:hover {
            transform: translateY(-5px) scale(1.1);
            color: white;
        }

        .btn-wa {
            background: linear-gradient(135deg, #25D366, #128C7E);
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }

        .btn-fb {
            background: linear-gradient(135deg, #1877F2, #0C5DC7);
            box-shadow: 0 4px 15px rgba(24, 119, 242, 0.3);
        }

        .btn-tw {
            background: linear-gradient(135deg, #000000, #333333);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-in {
            background: linear-gradient(135deg, #0A66C2, #004182);
            box-shadow: 0 4px 15px rgba(10, 102, 194, 0.3);
        }

        .navigation-area {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .btn-glow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 35px;
            background: white;
            color: var(--color-primary);
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-decoration: none;
            border: 2px solid transparent;
        }

        .btn-glow:hover {
            background: var(--color-primary);
            color: white;
            box-shadow: 0 10px 25px rgba(39, 80, 91, 0.25);
            transform: translateY(-2px);
        }

        @media (max-width: 991px) {
            .article-title {
                font-size: 2rem;
            }

            .glass-card {
                padding: 30px;
            }

            .main-content-wrapper {
                margin-top: -80px;
            }
        }
    </style>
</head>

<body>

    <div class="scroll-progress-container">
        <div class="scroll-progress-bar" id="progressBar"></div>
    </div>

    <?php include 'navbar.php'; ?>
    <?php 
        $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $shareTitle = urlencode($berita['judulberita']);
        $shareUrl = urlencode($currentUrl);
    ?>

    <main class="main">
        <section class="hero-section">
            <div class="hero-bg-pattern"></div>
            <div class="container hero-content" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="article-meta mb-4">
                            <span class="meta-item">
                                <i class="bi bi-pen-fill"></i> <?= $berita['jurnalis_nama'] ?>
                            </span>
                            <span class="meta-item">|</span>
                            <span class="meta-item">
                                <i class="bi bi-calendar-event-fill"></i>
                                <?= date('d M Y', strtotime($berita['created_at'])) ?>
                            </span>
                            <span class="meta-item">|</span>
                            <span class="meta-item">
                                <i class="bi bi-clock-fill"></i> <?= date('H:i', strtotime($berita['created_at'])) ?>
                                WIB
                            </span>
                        </div>
                        <h1 class="article-title"><?= $berita['judulberita'] ?></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="main-content-wrapper">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="glass-card" data-aos="fade-up" data-aos-delay="100">

                            <div class="category-tags">
                                <?php
                                $listKategori = explode(',', $berita['namakategori'] ?? '');
                                foreach ($listKategori as $kat) :
                                    $kat = trim($kat);
                                    if (empty($kat)) continue;
                                ?>
                                <a href="<?= BASE_URL ?>/berita" class="modern-tag">
                                    <i class="bi bi-hash"></i> <?= $kat ?>
                                </a>
                                <?php endforeach; ?>
                            </div>

                            <div class="featured-image-container">
                                <a href="<?= BASE_URL ?>/public/uploads/berita/<?= $berita['fotodokumentasi'] ?>"
                                    class="glightbox" data-gallery="article-gallery">
                                    <img src="<?= BASE_URL ?>/public/uploads/berita/<?= $berita['fotodokumentasi'] ?>"
                                        onerror="this.onerror=null; this.src='<?= BASE_URL ?>/public/assets/img/lomba1.png';"
                                        class="featured-image" alt="<?= $berita['judulberita'] ?>">
                                    <div class="image-overlay">
                                        <i class="bi bi-zoom-in zoom-icon"></i>
                                    </div>
                                </a>
                            </div>

                            <article class="article-body">
                                <?= nl2br($berita['isi']) ?>
                            </article>

                            <hr class="my-5" style="border-top: 1px dashed #cbd5e1;">

                            <div id="comments-area" class="comments-section">
                                <h3 class="fw-bold mb-4" style="color: var(--color-primary);">
                                    <?= $jumlahKomentar ?? 0 ?> Komentar
                                </h3>

                                <?php if (isset($_SESSION['flash_message'])): ?>
                                    <div class="alert alert-<?= $_SESSION['flash_type'] == 'success' ? 'success' : 'danger' ?> alert-dismissible fade show rounded-4 border-0 shadow-sm mb-4" role="alert">
                                        <?= $_SESSION['flash_message']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php 
                                        unset($_SESSION['flash_message']);
                                        unset($_SESSION['flash_type']);
                                    ?>
                                <?php endif; ?>

                                <?php if (!empty($komentar)): ?>
                                    <div class="comment-list mb-5">
                                        <?php foreach($komentar as $k): ?>
                                        <div class="d-flex gap-3 mb-4 p-4 rounded-4 bg-white shadow-sm border border-light">
                                            <div class="flex-shrink-0">
                                                <div class="d-flex align-items-center justify-content-center text-white fw-bold fs-5" 
                                                    style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, var(--color-primary), var(--color-accent));">
                                                    <?= strtoupper(substr($k['namakomentator'], 0, 1)) ?>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h6 class="fw-bold mb-0 text-dark"><?= htmlspecialchars($k['namakomentator']) ?></h6>
                                                    <small class="text-muted" style="font-size: 0.8rem;">
                                                        <?= date('d M Y, H:i', strtotime($k['created_at'])) ?>
                                                    </small>
                                                </div>
                                                <p class="text-muted mb-0" style="line-height: 1.6;">
                                                    <?= nl2br(htmlspecialchars($k['komentar'])) ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <div id="comment-form" class="p-4 p-md-5 rounded-4" style="background-color: #f8fafc; border: 1px dashed #cbd5e1;">
                                    <h4 class="fw-bold mb-2">Tinggalkan Balasan</h4>
                                    <p class="text-muted small mb-4">Alamat email Anda tidak akan dipublikasikan. Ruas yang wajib ditandai *</p>

                                    <form action="<?= BASE_URL ?>/komentar/store" method="POST">
                                        <input type="hidden" name="idberita" value="<?= $berita['idberita'] ?>">
                                        
                                        <div class="mb-4">
                                            <label for="komentar" class="form-label fw-bold text-muted small">Komentar *</label>
                                            <textarea class="form-control form-control-lg border-0 shadow-sm" id="komentar" name="komentar" rows="5" placeholder="Tulis pendapat Anda di sini..." style="resize: none;" required></textarea>
                                        </div>

                                        <div class="row g-4 mb-4">
                                            <div class="col-md-6">
                                                <label for="nama" class="form-label fw-bold text-muted small">Nama *</label>
                                                <input type="text" class="form-control form-control-lg border-0 shadow-sm" id="nama" name="nama" placeholder="Nama Lengkap" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label fw-bold text-muted small">Email *</label>
                                                <input type="email" class="form-control form-control-lg border-0 shadow-sm" id="email" name="email" placeholder="alamat@email.com" required>
                                            </div>
                                        </div>

                                        <div class="mb-4 form-check">
                                            <input type="checkbox" class="form-check-input" id="save-info">
                                            <label class="form-check-label text-muted" for="save-info" style="font-size: 0.9rem;">
                                                Simpan nama dan email saya pada peramban ini untuk komentar berikutnya.
                                            </label>
                                        </div>

                                        <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill fw-bold border-0 shadow" 
                                                style="background-color: var(--color-primary); transition: all 0.3s ease;">
                                            Kirim Komentar
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="share-section mb-5">
                                <div class="share-title">Bagikan Berita Ini</div>
                                <div class="social-buttons">
                                    <a href="https://api.whatsapp.com/send?text=<?= $shareTitle . '%0A' . $shareUrl ?>"
                                        target="_blank" class="social-btn btn-wa" title="Share on WhatsApp">
                                        <i class="bi bi-whatsapp"></i>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $shareUrl ?>"
                                        target="_blank" class="social-btn btn-fb" title="Share on Facebook">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=<?= $shareTitle ?>&url=<?= $shareUrl ?>"
                                        target="_blank" class="social-btn btn-tw" title="Share on X">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $shareUrl ?>&title=<?= $shareTitle ?>"
                                        target="_blank" class="social-btn btn-in" title="Share on LinkedIn">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="navigation-area mt-5 pt-3">
                                <a href="<?= BASE_URL ?>/berita" class="btn-glow">
                                    <i class="bi bi-arrow-left"></i> Kembali ke Berita
                                </a>
                            </div>

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
    <script src="<?= BASE_URL ?>/public/assets/vendor/aos/aos.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const lightbox = GLightbox({
                selector: '.glightbox',
                touchNavigation: true,
                loop: true
            });

            window.addEventListener('scroll', () => {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement
                    .clientHeight;
                const scrolled = (winScroll / height) * 100;
                document.getElementById("progressBar").style.width = scrolled + "%";
            });

            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        });
    </script>

</body>

</html>
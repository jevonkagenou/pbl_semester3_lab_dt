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
        :root {
            --accent-color: #27505B;
            --color-primary: #27505B;
            --color-accent: #4dc4e0;
        }

        html {
            scroll-behavior: smooth;
        }

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

        .filter-wrapper {
            background: #fff;
            padding: 20px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(39, 80, 91, 0.08);
            margin-bottom: 3rem;
            border: 1px solid rgba(39, 80, 91, 0.1);
        }

        .custom-input-group {
            position: relative;
            width: 100%;
        }

        .custom-input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #27505B;
            font-size: 1.1rem;
            z-index: 10;
            opacity: 0.7;
            pointer-events: none;
            transition: 0.3s;
        }

        .modern-control {
            width: 100%;
            padding: 12px 20px 12px 50px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #27505B;
            background-color: #F8FAFB;
            border: 2px solid transparent;
            border-radius: 50px;
            transition: all 0.3s ease;
            height: 50px;
        }

        .modern-control:focus {
            background-color: #fff;
            border-color: #27505B;
            box-shadow: 0 0 0 4px rgba(39, 80, 91, 0.1);
            outline: none;
        }

        .modern-control:focus+.custom-input-icon {
            opacity: 1;
            transform: translateY(-50%) scale(1.1);
        }

        .modern-control::placeholder {
            color: #8fa3a8;
            font-weight: 400;
        }

        .select2-container {
            position: relative;
            width: 100%;
        }

        .select2-display {
            width: 100%;
            padding: 12px 40px 12px 50px;
            font-size: 0.95rem;
            font-weight: 600;
            color: #27505B;
            background-color: #F8FAFB;
            border: 2px solid transparent;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 50px;
        }

        .select2-display:focus,
        .select2-container.open .select2-display {
            background-color: #fff;
            border-color: #27505B;
            box-shadow: 0 0 0 4px rgba(39, 80, 91, 0.1);
            outline: none;
        }

        .select2-arrow {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #27505B;
            pointer-events: none;
            font-size: 0.8rem;
            transition: transform 0.3s;
        }

        .select2-container.open .select2-arrow {
            transform: translateY(-50%) rotate(180deg);
        }

        .select2-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            right: 0;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(39, 80, 91, 0.1);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.2s cubic-bezier(0.165, 0.84, 0.44, 1);
            max-height: 300px;
            overflow-y: auto;
            padding: 8px;
        }

        .select2-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .select2-option {
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 0.9rem;
            color: #555;
            transition: 0.2s;
            display: block;
            margin-bottom: 2px;
        }

        .select2-option:hover {
            background-color: #F8FAFB;
            color: #27505B;
        }

        .select2-option.selected {
            background-color: #E8F1F3;
            color: #27505B;
            font-weight: 700;
        }

        .select2-dropdown::-webkit-scrollbar {
            width: 6px;
        }

        .select2-dropdown::-webkit-scrollbar-track {
            background: transparent;
        }

        .select2-dropdown::-webkit-scrollbar-thumb {
            background-color: #cbd5e0;
            border-radius: 20px;
        }

        .select2-no-results {
            padding: 15px;
            text-align: center;
            color: #999;
            font-size: 0.9rem;
            font-style: italic;
            display: none;
        }

        .publication-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 16px;
            padding: 25px;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            z-index: 1;
            display: flex;
            flex-direction: column;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .publication-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--color-primary), var(--color-accent));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
            z-index: 2;
        }

        .publication-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(39, 80, 91, 0.15);
            border-color: rgba(77, 196, 224, 0.3);
        }

        .publication-card:hover::before {
            transform: scaleX(1);
        }

        .pub-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .pub-title a {
            color: var(--color-primary);
            text-decoration: none;
            background-image: linear-gradient(to right, var(--color-accent), var(--color-accent));
            background-size: 0% 2px;
            background-repeat: no-repeat;
            background-position: left bottom;
            transition: background-size 0.3s ease, color 0.3s ease;
        }

        .publication-card:hover .pub-title a {
            color: #000;
            background-size: 100% 2px;
        }

        .pub-desc {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 15px;
            line-height: 1.6;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            flex-grow: 1;
        }

        .pub-meta {
            font-size: 0.85rem;
            color: #888;
            border-top: 1px solid #f0f0f0;
            padding-top: 15px;
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .read-link {
            color: var(--color-primary);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }

        .read-link:hover {
            color: var(--color-accent);
            gap: 8px;
        }

        .publication-card:hover .read-link {
            color: var(--color-accent);
        }

        .publication-card:hover .read-link i {
            transform: translateX(5px);
            transition: transform 0.3s ease;
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

        .category-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background-color: #E8F1F3;
            color: var(--color-primary);
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 15px;
            width: fit-content;
            max-width: 100%;
        }

        .category-pill i {
            font-size: 1rem;
        }

        .category-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
                        <img src="<?= BASE_URL ?>/public/assets/img/penelitian.png" class="img-fluid animated"
                            alt="Penelitian Lab Data">
                    </div>
                </div>
            </div>
        </section>

        <section id="publications" class="blog section">
            <div class="container">

                <div class="filter-container">
                    <div class="filter-wrapper" data-aos="fade-up" data-aos-delay="100">
                        <div class="row g-3 align-items-center">

                            <div class="col-lg-6 col-md-12">
                                <div class="custom-input-group">
                                    <i class="bi bi-search custom-input-icon"></i>
                                    <input type="text" id="searchInput" class="modern-control"
                                        placeholder="Cari judul penelitian...">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="select2-container" id="categoryContainer">
                                    <input type="hidden" id="categoryFilter" value="all">

                                    <i class="bi bi-grid custom-input-icon" style="z-index: 2;"></i>
                                    <input type="text" class="select2-display" id="categoryDisplay"
                                        value="Semua Kategori" autocomplete="off" readonly>
                                    <i class="bi bi-chevron-down select2-arrow"></i>

                                    <div class="select2-dropdown" id="categoryList">
                                        <div class="select2-option selected" data-value="all">Semua Kategori</div>
                                        <?php if (!empty($kategori)) : ?>
                                        <?php foreach ($kategori as $cat) : ?>
                                        <div class="select2-option"
                                            data-value="<?= strtolower($cat['namakategori']) ?>">
                                            <?= $cat['namakategori'] ?>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="select2-no-results" id="noResultsCat">Tidak ditemukan</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="select2-container" id="yearContainer">
                                    <input type="hidden" id="yearFilter" value="all">

                                    <i class="bi bi-calendar-event custom-input-icon" style="z-index: 2;"></i>
                                    <input type="text" class="select2-display" id="yearDisplay" value="Semua Tahun"
                                        autocomplete="off" readonly>
                                    <i class="bi bi-chevron-down select2-arrow"></i>

                                    <div class="select2-dropdown" id="yearList">
                                        <div class="select2-option selected" data-value="all">Semua Tahun</div>
                                        <?php if (!empty($years)) : ?>
                                        <?php foreach ($years as $year) : ?>
                                        <div class="select2-option" data-value="<?= $year ?>">
                                            <?= $year ?>
                                        </div>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="select2-no-results" id="noResultsYear">Tidak ditemukan</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row gy-4" id="publication-container">

                    <?php if (!empty($publikasi)) : ?>
                    <?php foreach ($publikasi as $row) : ?>

                    <div class="col-lg-4 col-md-6 publication-item"
                        data-title="<?= strtolower($row['judulpublikasi']) ?>"
                        data-category="<?= strtolower($row['namakategori']) ?>" data-year="<?= $row['tahunterbit'] ?>">

                        <article class="publication-card">
                            <div>
                                <div class="category-pill">
                                    <i class="bi bi-tags-fill"></i>
                                    <span class="category-text">
                                        <?php
                                        $listKategori = explode(',', $row['namakategori'] ?? '');
                                        $listKategori = array_map('trim', $listKategori);
                                        echo implode(', ', array_filter($listKategori));
                                    ?>
                                    </span>
                                </div>

                                <h2 class="pub-title">
                                    <a href="<?= $row['linkfile'] ?>" target="_blank">
                                        <?= $row['judulpublikasi'] ?>
                                    </a>
                                </h2>
                                <p class="pub-desc">
                                    <?= !empty($row['ringkasan']) ? $row['ringkasan'] : 'Tidak ada ringkasan tersedia.' ?>
                                </p>
                            </div>

                            <div class="pub-meta">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2 text-primary"></i>
                                    <small class="text-truncate" style="max-width: 120px;">
                                        <?= $row['namamember'] ?>
                                    </small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar3 me-2"></i>
                                    <small><?= $row['tahunterbit'] ?></small>
                                </div>
                            </div>

                            <div class="mt-3 text-end">
                                <a href="<?= $row['linkfile'] ?>" target="_blank" class="read-link">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>

                    <?php endforeach; ?>
                    <?php else : ?>
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-light" role="alert">
                            Belum ada data penelitian yang tersedia.
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
            const allItems = Array.from(document.querySelectorAll('.publication-item'));
            const paginationContainer = document.getElementById('pagination-controls');
            const searchInput = document.getElementById('searchInput');

            const categoryHidden = document.getElementById('categoryFilter');
            const yearHidden = document.getElementById('yearFilter');

            let currentPage = 1;
            let filteredItems = [...allItems];

            function setupDropdown(containerId, displayId, hiddenId, listId, noResultId) {
                const container = document.getElementById(containerId);
                const display = document.getElementById(displayId);
                const hiddenInput = document.getElementById(hiddenId);
                const list = document.getElementById(listId);
                const options = Array.from(list.querySelectorAll('.select2-option'));
                const noResults = document.getElementById(noResultId);

                function toggleDropdown(show) {
                    if (show) {
                        container.classList.add('open');
                        list.classList.add('show');
                        display.removeAttribute('readonly');
                        display.focus();
                        display.value = '';
                        display.placeholder = 'Cari...';
                    } else {
                        container.classList.remove('open');
                        list.classList.remove('show');
                        display.setAttribute('readonly', true);
                        const selectedOption = options.find(o => o.classList.contains('selected'));
                        if (selectedOption) {
                            display.value = selectedOption.innerText;
                        } else {
                            display.value = options[0].innerText;
                        }
                        display.placeholder = '';
                    }
                }

                display.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const isOpen = container.classList.contains('open');

                    document.querySelectorAll('.select2-container').forEach(el => {
                        if (el !== container && el.classList.contains('open')) {
                            el.classList.remove('open');
                            const drop = el.querySelector('.select2-dropdown');
                            if (drop) drop.classList.remove('show');
                            const disp = el.querySelector('.select2-display');
                            if (disp) {
                                disp.setAttribute('readonly', true);
                                const opts = Array.from(el.querySelectorAll('.select2-option'));
                                const sel = opts.find(o => o.classList.contains('selected'));
                                if (sel) disp.value = sel.innerText;
                                else disp.value = opts[0].innerText;
                            }
                        }
                    });

                    toggleDropdown(!isOpen);
                });

                display.addEventListener('input', function () {
                    const keyword = this.value.toLowerCase();
                    let hasResults = false;

                    options.forEach(option => {
                        const text = option.innerText.toLowerCase();
                        if (text.includes(keyword)) {
                            option.style.display = 'block';
                            hasResults = true;
                        } else {
                            option.style.display = 'none';
                        }
                    });

                    noResults.style.display = hasResults ? 'none' : 'block';
                });

                options.forEach(option => {
                    option.addEventListener('click', function () {
                        const value = this.getAttribute('data-value');
                        const text = this.innerText;

                        hiddenInput.value = value;
                        display.value = text;

                        options.forEach(o => o.classList.remove('selected'));
                        this.classList.add('selected');

                        options.forEach(o => o.style.display = 'block');
                        noResults.style.display = 'none';

                        toggleDropdown(false);
                        filterItems();
                    });
                });

                document.addEventListener('click', function (e) {
                    if (!container.contains(e.target)) {
                        if (container.classList.contains('open')) {
                            toggleDropdown(false);
                        }
                    }
                });
            }

            setupDropdown('categoryContainer', 'categoryDisplay', 'categoryFilter', 'categoryList',
                'noResultsCat');
            setupDropdown('yearContainer', 'yearDisplay', 'yearFilter', 'yearList', 'noResultsYear');

            function filterItems() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedCategory = categoryHidden.value.toLowerCase();
                const selectedYear = yearHidden.value;

                filteredItems = allItems.filter(item => {
                    const title = item.getAttribute('data-title');
                    const category = item.getAttribute('data-category');
                    const year = item.getAttribute('data-year');

                    const matchSearch = title.includes(searchTerm);
                    const matchCategory = selectedCategory === 'all' || category.includes(
                        selectedCategory);
                    const matchYear = selectedYear === 'all' || year === selectedYear;

                    return matchSearch && matchCategory && matchYear;
                });

                currentPage = 1;
                renderPage(1);
            }

            function renderPage(page) {
                const totalItems = filteredItems.length;
                const totalPages = Math.ceil(totalItems / itemsPerPage);

                allItems.forEach(item => item.style.display = 'none');

                if (totalItems === 0) {
                    paginationContainer.innerHTML =
                        '<div class="col-12 text-center py-5"><p class="text-muted">Tidak ada data yang ditemukan.</p></div>';
                    return;
                }

                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                const pageItems = filteredItems.slice(start, end);

                pageItems.forEach(item => item.style.display = 'block');
                updatePaginationButtons(page, totalPages);
            }

            function updatePaginationButtons(page, totalPages) {
                paginationContainer.innerHTML = '';
                if (totalPages <= 1) return;

                const prevBtn = document.createElement('button');
                prevBtn.innerText = 'Prev';
                prevBtn.classList.add('pagination-btn');
                prevBtn.disabled = page === 1;
                prevBtn.onclick = () => {
                    currentPage--;
                    renderPage(currentPage);
                    window.scrollTo({
                        top: document.getElementById('publications').offsetTop - 100,
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
                        renderPage(currentPage);
                        window.scrollTo({
                            top: document.getElementById('publications').offsetTop - 100,
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
                    renderPage(currentPage);
                    window.scrollTo({
                        top: document.getElementById('publications').offsetTop - 100,
                        behavior: 'smooth'
                    });
                };
                paginationContainer.appendChild(nextBtn);
            }

            searchInput.addEventListener('input', filterItems);

            renderPage(1);
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Berita - Politeknik Negeri Malang</title>

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
    .news-card {
      background: #ffffff;
      border: 1px solid rgba(0, 0, 0, 0.05);
      border-radius: 16px;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
      overflow: hidden;
      z-index: 1;
      height: 100%;
    }

    .news-card::before {
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

    .news-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(39, 80, 91, 0.15);
      border-color: rgba(77, 196, 224, 0.3);
    }

    .news-card:hover::before {
      transform: scaleX(1);
    }

    .news-card img {
      transition: transform 0.5s ease;
    }

    .news-card:hover img {
      transform: scale(1.05);
    }

    .news-title a {
      color: var(--color-primary);
      text-decoration: none;
      background-image: linear-gradient(to right, var(--color-accent), var(--color-accent));
      background-size: 0% 2px;
      background-repeat: no-repeat;
      background-position: left bottom;
      transition: background-size 0.3s ease, color 0.3s ease;
    }

    .news-card:hover .news-title a {
      color: #000;
      background-size: 100% 2px;
    }

    .stretched-link::after {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 1;
      content: "";
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
      color: var(--color-primary);
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
      color: var(--color-primary);
      background-color: #F8FAFB;
      border: 2px solid transparent;
      border-radius: 50px;
      transition: all 0.3s ease;
      height: 50px;
    }

    .modern-control:focus {
      background-color: #fff;
      border-color: var(--color-primary);
      box-shadow: 0 0 0 4px rgba(39, 80, 91, 0.1);
      outline: none;
    }

    .modern-control:focus+.custom-input-icon {
      opacity: 1;
      transform: translateY(-50%) scale(1.1);
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
      color: var(--color-primary);
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
      border-color: var(--color-primary);
      box-shadow: 0 0 0 4px rgba(39, 80, 91, 0.1);
      outline: none;
    }

    .select2-arrow {
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--color-primary);
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
      color: var(--color-primary);
    }

    .select2-option.selected {
      background-color: #E8F1F3;
      color: var(--color-primary);
      font-weight: 700;
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
      color: var(--color-primary);
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

<body class="blog-page">
  <?php include 'navbar.php'; ?>

  <main class="main">
    <section class="section py-5" style="background-color: #edf2f4; min-height: 100vh;">
      <div class="container">

        <?php if (!empty($carousel)) : ?>
        <div class="row justify-content-center mb-5">
          <div class="col-12">
            <div id="heroCarousel" class="carousel slide border-0 rounded-4 overflow-hidden shadow-sm"
              data-bs-ride="carousel">
              <div class="carousel-indicators">
                <?php foreach ($carousel as $key => $item) : ?>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?= $key ?>"
                  class="<?= $key === 0 ? 'active' : '' ?>" aria-current="<?= $key === 0 ? 'true' : 'false' ?>"
                  aria-label="Slide <?= $key + 1 ?>"></button>
                <?php endforeach; ?>
              </div>
              <div class="carousel-inner" style="height: 450px;">
                <?php foreach ($carousel as $key => $item) : ?>
                <div class="carousel-item <?= $key === 0 ? 'active' : '' ?> h-100">
                  <img src="<?= BASE_URL ?>/public/uploads/berita/<?= $item['fotodokumentasi'] ?>"
                    onerror="this.onerror=null; this.src='<?= BASE_URL ?>/public/assets/img/lomba1.png';"
                    class="d-block w-100 h-100" alt="<?= $item['judulberita'] ?>"
                    style="object-fit: cover; object-position: center 20%;">

                  <div class="position-absolute bottom-0 start-0 w-100 p-4 p-lg-5"
                    style="background: linear-gradient(to top, rgba(39, 80, 91, 0.95), transparent); z-index: 2;">
                    <div class="col-lg-10">
                      <h2 class="fw-bold mb-3" style="font-size: 2rem; line-height: 1.3;">
                        <a href="<?= BASE_URL ?>/detail-berita?id=<?= $item['idberita'] ?>"
                          style="color: #fff; text-decoration: none;"><?= $item['judulberita'] ?></a>
                      </h2>
                      <div class="d-flex align-items-center small text-white-50">
                        <span class="text-uppercase fw-bold me-3" style="color: #fff;">BY
                          <?= $item['jurnalis_nama'] ?></span>
                        <span style="color: #fff;"><i class="bi bi-clock me-1" style="color: #fff;"></i>
                          <?= date('l, d F Y', strtotime($item['created_at'])) ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <div class="filter-wrapper">
          <div class="row g-3 align-items-center">
            <div class="col-lg-6 col-md-12">
              <div class="custom-input-group">
                <i class="bi bi-search custom-input-icon"></i>
                <input type="text" id="searchInput" class="modern-control" placeholder="Cari judul berita...">
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="select2-container" id="categoryContainer">
                <input type="hidden" id="categoryFilter" value="all">
                <i class="bi bi-grid custom-input-icon" style="z-index: 2;"></i>
                <input type="text" class="select2-display" id="categoryDisplay" value="Semua Kategori"
                  autocomplete="off" readonly>
                <i class="bi bi-chevron-down select2-arrow"></i>
                <div class="select2-dropdown" id="categoryList">
                  <div class="select2-option selected" data-value="all">Semua Kategori</div>
                  <?php if (!empty($kategori)) : ?>
                  <?php foreach ($kategori as $cat) : ?>
                  <div class="select2-option" data-value="<?= strtolower($cat) ?>"><?= $cat ?></div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  <div class="select2-no-results" id="noResultsCat"
                    style="display:none; padding:15px; text-align:center; color:#999;">Tidak ditemukan</div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="select2-container" id="yearContainer">
                <input type="hidden" id="yearFilter" value="all">
                <i class="bi bi-calendar-event custom-input-icon" style="z-index: 2;"></i>
                <input type="text" class="select2-display" id="yearDisplay" value="Semua Tahun" autocomplete="off"
                  readonly>
                <i class="bi bi-chevron-down select2-arrow"></i>
                <div class="select2-dropdown" id="yearList">
                  <div class="select2-option selected" data-value="all">Semua Tahun</div>
                  <?php if (!empty($years)) : ?>
                  <?php foreach ($years as $year) : ?>
                  <div class="select2-option" data-value="<?= $year ?>"><?= $year ?></div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  <div class="select2-no-results" id="noResultsYear"
                    style="display:none; padding:15px; text-align:center; color:#999;">Tidak ditemukan</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row g-4 mb-5" id="news-container">
          <?php if (!empty($berita)) : ?>
          <?php foreach ($berita as $row) : ?>
          <div class="col-md-6 col-lg-4 news-item" data-title="<?= strtolower($row['judulberita']) ?>"
            data-category="<?= strtolower($row['namakategori'] ?? '') ?>"
            data-year="<?= date('Y', strtotime($row['created_at'])) ?>">
            <div class="card news-card h-100 border-0 shadow-sm bg-white overflow-hidden">
              <div class="ratio ratio-16x9 overflow-hidden">
                <img src="<?= BASE_URL ?>/public/uploads/berita/<?= $row['fotodokumentasi'] ?>"
                  onerror="this.onerror=null; this.src='<?= BASE_URL ?>/public/assets/img/lomba1.png';"
                  class="card-img-top object-fit-cover" alt="<?= $row['judulberita'] ?>">
              </div>
              <div class="card-body p-4 d-flex flex-column">
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
                <h5 class="news-title fw-bold mb-3" style="font-size: 1rem; line-height: 1.5;">
                  <a href="<?= BASE_URL ?>/detail-berita?id=<?= $row['idberita'] ?>"
                    class="stretched-link"><?= $row['judulberita'] ?></a>
                </h5>
                <div class="mt-auto d-flex align-items-center small text-muted">
                  <span class="fw-bold me-3" style="color: #555;">BY <?= $row['jurnalis_nama'] ?></span>
                  <span><i class="bi bi-clock me-1"></i> <?= date('d M Y', strtotime($row['created_at'])) ?></span>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php else : ?>
          <div class="col-12 text-center py-5">
            <div class="alert alert-light" role="alert">Belum ada berita yang tersedia.</div>
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
      const allItems = Array.from(document.querySelectorAll('.news-item'));
      const paginationContainer = document.getElementById('pagination-controls');
      const searchInput = document.getElementById('searchInput');
      const categoryHidden = document.getElementById('categoryFilter');
      const yearHidden = document.getElementById('yearFilter');
      const newsContainer = document.getElementById('news-container');

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
            display.value = selectedOption ? selectedOption.innerText.trim() : options[0].innerText.trim();
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
                disp.value = sel ? sel.innerText.trim() : opts[0].innerText.trim();
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
            const text = this.innerText.trim();
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

      setupDropdown('categoryContainer', 'categoryDisplay', 'categoryFilter', 'categoryList', 'noResultsCat');
      setupDropdown('yearContainer', 'yearDisplay', 'yearFilter', 'yearList', 'noResultsYear');

      function filterItems() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedCategory = categoryHidden.value.toLowerCase();
        const selectedYear = yearHidden.value;

        filteredItems = allItems.filter(item => {
          const title = item.getAttribute('data-title') || '';
          const category = item.getAttribute('data-category') || '';
          const year = item.getAttribute('data-year') || '';

          const matchSearch = title.includes(searchTerm);
          const matchCategory = selectedCategory === 'all' || category.includes(selectedCategory);
          const matchYear = selectedYear === 'all' || year === selectedYear;

          return matchSearch && matchCategory && matchYear;
        });

        currentPage = 1;
        renderPage(1);
      }

      function renderPage(page) {
        const totalItems = filteredItems.length;
        const itemsPerPage = 6;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        allItems.forEach(item => item.style.display = 'none');

        const noDataMsg = newsContainer.querySelector('.text-center.py-5');
        if (noDataMsg) noDataMsg.remove();

        if (totalItems === 0) {
          newsContainer.insertAdjacentHTML('beforeend',
            '<div class="col-12 text-center py-5"><p class="text-muted">Tidak ada data yang ditemukan.</p></div>');
          paginationContainer.innerHTML = '';
          return;
        }

        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const pageItems = filteredItems.slice(start, end);

        pageItems.forEach(item => {
          item.style.display = 'block';
        });

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
            top: document.querySelector('.filter-wrapper').offsetTop - 100,
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
              top: document.querySelector('.filter-wrapper').offsetTop - 100,
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
            top: document.querySelector('.filter-wrapper').offsetTop - 100,
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
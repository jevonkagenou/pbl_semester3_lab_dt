<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Publikasi - Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/toastify/toastify.css">

    <style>
        body {
            background-color: #f2f7ff;
        }

        .card-modern {
            background: #fff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
            transition: 0.3s;
        }

        .card-modern:hover {
            transform: translateY(-5px);
        }

        .hero-stats-card {
            background: linear-gradient(120deg, #435ebe, #727cf5);
            border-radius: 20px;
            color: white;
            box-shadow: 0 10px 30px rgba(67, 94, 190, 0.2);
            position: relative;
            overflow: hidden;
        }

        .hero-stats-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .hero-stats-card::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .table-modern {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 12px;
            padding: 0 15px;
        }

        .table-modern thead th {
            border: none;
            color: #a0aec0;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            padding: 15px 20px;
            letter-spacing: 0.5px;
        }

        .table-modern tbody tr {
            background: white;
            transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
            border-radius: 15px;
        }

        .table-modern tbody tr:hover {
            transform: translateY(-3px) scale(1.005);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
            z-index: 10;
            position: relative;
        }

        .table-modern tbody td {
            border: none;
            padding: 20px;
            vertical-align: middle;
            color: #4a5568;
            font-weight: 600;
            border-top: 1px solid #f8f9fa;
            border-bottom: 1px solid #f8f9fa;
        }

        .table-modern tbody tr td:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            border-left: 1px solid #f8f9fa;
        }

        .table-modern tbody tr td:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            border-right: 1px solid #f8f9fa;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-pending {
            background: #fff7ed;
            color: #ea580c;
            border: 1px solid rgba(234, 88, 12, 0.2);
        }

        .status-terima {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid rgba(22, 163, 74, 0.2);
        }

        .status-tolak {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid rgba(220, 38, 38, 0.2);
        }

        .btn-action-simple {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: 0.2s all;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 0;
        }

        .btn-action-simple i {
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 0;
            font-size: 1.2rem;
        }

        .btn-action-simple:hover {
            transform: scale(1.1);
        }

        .btn-accept {
            background: #10b981;
            color: white;
        }

        .btn-accept:hover {
            background: #059669;
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .btn-reject {
            background: #ef4444;
            color: white;
        }

        .btn-reject:hover {
            background: #dc2626;
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
        }

        .btn-link-modern {
            background: #e0f2fe;
            color: #0ea5e9;
            border-radius: 10px;
            width: 35px;
            height: 35px;
        }

        .btn-link-modern:hover {
            background: #0ea5e9;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(14, 165, 233, 0.3);
        }

        .card-header-modern {
            background: #ffffff;
            padding: 25px 30px;
            border-bottom: 1px solid #f0f0f0;
        }

        .card-header-modern h4 {
            font-weight: 800;
            color: #1e3a8a;
            margin: 0;
            font-size: 1.2rem;
        }

        .icon-wrapper {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .icon-wrapper i {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            line-height: 1 !important;
            font-size: 24px;
            margin: 0 !important;
        }

        .icon-wrapper i::before {
            vertical-align: 0 !important;
            margin: 0 !important;
        }

        .modal-premium .modal-content {
            border: none;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            background: #f8fafc;
        }

        .modal-header-premium {
            background: linear-gradient(135deg, #435ebe 0%, #727cf5 100%);
            padding: 30px;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .modal-header-premium::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .modal-header-premium::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
        }

        .modal-title-premium {
            color: white;
            font-weight: 800;
            font-size: 1.5rem;
            position: relative;
            z-index: 1;
            line-height: 1.3;
        }

        .modal-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .modal-body-premium {
            padding: 30px;
        }

        .info-card {
            background: white;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            height: 100%;
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
            justify-content: center;
            transition: transform 0.2s;
        }

        .info-card:hover {
            transform: translateY(-3px);
            border-color: #e2e8f0;
        }

        .info-icon-wrapper {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 12px;
        }

        .bg-soft-primary {
            background: #eff6ff;
            color: #3b82f6;
        }

        .bg-soft-success {
            background: #f0fdf4;
            color: #22c55e;
        }

        .bg-soft-purple {
            background: #f5f3ff;
            color: #8b5cf6;
        }

        .info-label-premium {
            font-size: 0.75rem;
            text-transform: uppercase;
            color: #94a3b8;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .info-value-premium {
            font-size: 1rem;
            font-weight: 700;
            color: #1e293b;
            margin-top: 2px;
        }

        .abstract-box {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            margin-top: 24px;
        }

        .abstract-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .abstract-content {
            color: #475569;
            line-height: 1.7;
            font-size: 0.95rem;
            text-align: justify;
        }

        .btn-doc-link {
            background: #3b82f6;
            color: white;
            border-radius: 12px;
            padding: 12px 20px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            transition: all 0.2s;
            width: 100%;
            justify-content: center;
        }

        .btn-doc-link:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.4);
        }

        .btn-close-custom {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
            cursor: pointer;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-close-custom:hover {
            background-color: rgba(255, 255, 255, 0.4);
            transform: rotate(90deg) scale(1.1);
        }

        .btn-close-custom i {
            font-size: 1.25rem;
            line-height: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div id="app">
        <?php include 'sidebar.php'; ?>
        <div id="main">
            <header class="mb-3"><a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
            </header>

            <div class="page-heading mb-4">
                <h3 style="font-weight: 800; color: #1e3a8a;">Approval Publikasi</h3>
                <p class="text-muted">Tinjau dan setujui pengajuan publikasi dari Editor.</p>
            </div>

            <div class="page-content">
                <section class="row mb-4">
                    <div class="col-12">
                        <div class="card hero-stats-card p-4">
                            <div class="d-flex justify-content-between align-items-center position-relative"
                                style="z-index: 2;">
                                <div>
                                    <h5 class="text-white-50 mb-1">Perlu Persetujuan</h5>
                                    <h1 class="font-extrabold mb-0 text-white" style="font-size: 3rem;">
                                        <?= isset($stats['pending']) ? $stats['pending'] : 0 ?>
                                    </h1>
                                    <p class="mb-0 text-white-50 mt-2 small">
                                        <i class="bi bi-info-circle me-1"></i> Publikasi menunggu review Anda
                                    </p>
                                </div>
                                <div style="font-size: 3.5rem; opacity: 0.8;"><i
                                        class="bi bi-check2-circle text-white"></i></div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="card card-modern">
                        <div class="card-header-modern">
                            <h4>Daftar Pengajuan Masuk</h4>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-modern" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Penulis & Kategori</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Status</th>
                                        <th class="text-center">Approval</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($publikasi) && !empty($publikasi)) : $no = 1; foreach($publikasi as $row) : ?>
                                    <tr>
                                        <td class="text-muted fw-bold ps-4"><?= $no++ ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="icon-wrapper d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                                                    style="width: 50px; height: 50px; background-color: #eef4ff; border-radius: 12px;">
                                                    <i class="bi bi-file-earmark-text-fill text-primary"
                                                        style="font-size: 24px;"></i>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold text-dark mb-1"
                                                        style="max-width: 300px; line-height: 1.2; font-size: 1rem;">
                                                        <?= htmlspecialchars($row['judulpublikasi'] ?? '') ?>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 mt-1">
                                                        <button type="button"
                                                            class="btn btn-sm btn-light-info text-info border-0 py-0 px-2 small btn-detail"
                                                            style="font-size: 0.75rem; font-weight: 700;"
                                                            data-judul="<?= htmlspecialchars($row['judulpublikasi'] ?? '') ?>"
                                                            data-tahun="<?= htmlspecialchars($row['tahunterbit'] ?? '') ?>"
                                                            data-penulis="<?= htmlspecialchars($row['namamember'] ?? '') ?>"
                                                            data-kategori="<?= htmlspecialchars($row['namakategori'] ?? '-') ?>"
                                                            data-ringkasan="<?= htmlspecialchars($row['ringkasan'] ?? 'Tidak ada ringkasan.') ?>"
                                                            data-link="<?= htmlspecialchars($row['linkfile'] ?? '#') ?>"
                                                            data-creator="<?= htmlspecialchars($row['creator_name'] ?? 'System') ?>">
                                                            <i class="bi bi-eye-fill me-1"></i>Lihat Detail
                                                        </button>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <div class="text-muted small fw-bold">
                                                    <i class="bi bi-person-circle me-1"></i>
                                                    <?= htmlspecialchars($row['namamember'] ?? '-') ?>
                                                </div>
                                                <div class="text-muted small">
                                                    <i class="bi bi-tags-fill me-1 text-primary"></i>
                                                    <?= htmlspecialchars($row['namakategori'] ?? '-') ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="avatar avatar-sm bg-warning text-white d-flex justify-content-center align-items-center rounded-circle"
                                                    style="width:30px; height:30px;">
                                                    <?= strtoupper(substr($row['creator_name'] ?? '?', 0, 1)) ?>
                                                </div>
                                                <span
                                                    class="text-muted small fw-bold"><?= htmlspecialchars($row['creator_name'] ?? 'System') ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <?php 
                                                $status = $row['status_publikasi'] ?? 'pending';
                                                $badgeClass = ($status == 'terima') ? 'status-terima' : (($status == 'tolak') ? 'status-tolak' : 'status-pending');
                                            ?>
                                            <span class="status-badge <?= $badgeClass ?>"><?= ucfirst($status) ?></span>
                                        </td>
                                        <td class="text-center">
                                            <?php if($status == 'pending'): ?>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn-action-simple btn-accept btn-confirm-approve"
                                                    data-url="<?= BASE_URL ?>/admin/publikasi/approve?id=<?= $row['idpublikasi'] ?>&status=terima"
                                                    title="Terima">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                                <button class="btn-action-simple btn-reject btn-modal-reject"
                                                    data-id="<?= $row['idpublikasi'] ?>"
                                                    data-judul="<?= htmlspecialchars($row['judulpublikasi'] ?? '') ?>"
                                                    title="Tolak">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </div>
                                            <?php else: ?>
                                            <span class="text-muted small fst-italic fw-bold"><i
                                                    class="bi bi-lock-fill me-1"></i> Selesai</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <?php include 'footer.php'; ?>
        </div>

        <div class="modal fade modal-premium" id="modalDetail" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header-premium">
                        <div class="d-flex justify-content-between align-items-start">
                            <div style="width: 90%;">
                                <div class="badge bg-white text-primary mb-2 px-3 py-1 rounded-pill fw-bold shadow-sm"
                                    style="font-size: 0.75rem;">
                                    <i class="bi bi-tag-fill me-1"></i> <span id="detail_kategori">Kategori</span>
                                </div>
                                <h4 class="modal-title-premium" id="detail_judul">Judul Publikasi Disini</h4>
                                <p class="modal-subtitle mb-0 mt-2">
                                    <i class="bi bi-person-badge me-1"></i> Diajukan oleh: <span id="detail_creator"
                                        class="fw-bold text-white"></span>
                                </p>
                            </div>
                            <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body-premium">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="info-card">
                                    <div class="info-icon-wrapper bg-soft-primary"><i class="bi bi-person-fill"></i>
                                    </div>
                                    <span class="info-label-premium">Penulis Utama</span>
                                    <div class="info-value-premium text-truncate" id="detail_penulis">-</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card">
                                    <div class="info-icon-wrapper bg-soft-purple"><i
                                            class="bi bi-calendar-event-fill"></i></div>
                                    <span class="info-label-premium">Tahun Terbit</span>
                                    <div class="info-value-premium" id="detail_tahun">-</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info-card justify-content-center align-items-center p-0"
                                    style="background: transparent; border: none; box-shadow: none;">
                                    <a href="#" id="detail_link" target="_blank" class="btn-doc-link">
                                        <i class="bi bi-file-earmark-pdf-fill"></i> Buka Dokumen
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="abstract-box">
                            <div class="abstract-title"><i class="bi bi-text-left text-primary fs-5"></i>
                                <span>Ringkasan Eksekutif / Abstrak</span></div>
                            <div class="abstract-content" id="detail_ringkasan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalTolak" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0" style="border-radius: 20px;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-danger">Tolak Publikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/publikasi/reject" method="POST">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="id" id="reject_id">
                            <p class="text-muted small mb-3">Anda akan menolak publikasi: <br><strong id="reject_judul"
                                    class="text-dark fs-6"></strong></p>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Alasan Penolakan <span
                                        class="text-danger">*</span></label>
                                <textarea name="alasan_penolakan" class="form-control" style="border-radius: 10px;"
                                    rows="4" required placeholder="Jelaskan alasan penolakan..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light fw-bold" style="border-radius: 10px;"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger fw-bold px-4" style="border-radius: 10px;">Tolak
                                Publikasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= BASE_URL ?>/public/assets-admin/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1, {
            searchable: true,
            fixedHeight: false,
            perPage: 5
        });

        $(document).on('click', '.btn-confirm-approve', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            Swal.fire({
                title: 'Terima Publikasi?',
                text: "Publikasi akan tampil di sistem.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#b6becb',
                confirmButtonText: 'Ya, Terima',
                cancelButtonText: 'Batal',
                background: '#fff',
                borderRadius: '20px'
            }).then((result) => {
                if (result.isConfirmed) window.location.href = url;
            });
        });

        $(document).on('click', '.btn-modal-reject', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            let judul = $(this).data('judul');
            $('#reject_id').val(id);
            $('#reject_judul').text(judul);
            $('#modalTolak').modal('show');
        });

        $(document).on('click', '.btn-detail', function () {
            let judul = $(this).data('judul');
            let tahun = $(this).data('tahun');
            let penulis = $(this).data('penulis');
            let kategori = $(this).data('kategori');
            let ringkasan = $(this).data('ringkasan');
            let link = $(this).data('link');
            let creator = $(this).data('creator');

            $('#detail_judul').text(judul);
            $('#detail_tahun').text(tahun);
            $('#detail_penulis').text(penulis);
            $('#detail_kategori').text(kategori);
            $('#detail_ringkasan').text(ringkasan);
            $('#detail_link').attr('href', link);
            $('#detail_creator').text(creator);

            $('#modalDetail').modal('show');
        });

        <?php if(isset($_SESSION['flash_message'])): ?>
        Swal.fire({ icon: '<?= $_SESSION['flash_type'] ?>', title: 'Info', text: '<?= $_SESSION['flash_message'] ?>', timer: 3000, toast: true, position: 'top-end', showConfirmButton: false });
        <?php unset($_SESSION['flash_message']); unset($_SESSION['flash_type']); ?>
        <?php endif; ?>
    </script>
</body>

</html>
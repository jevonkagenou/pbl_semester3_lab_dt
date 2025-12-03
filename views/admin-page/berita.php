<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Berita - Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/style.css">
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
            background: linear-gradient(135deg, #435ebe, #727cf5);
            border-radius: 20px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(147, 51, 234, 0.3);
            transition: transform 0.3s ease;
        }

        .hero-stats-card::before,
        .hero-stats-card::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
        }

        .hero-stats-card::before {
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
        }

        .hero-stats-card::after {
            bottom: -30px;
            left: -30px;
            width: 150px;
            height: 150px;
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

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            color: white;
        }

        .btn-view-modern {
            background: #e0f2fe;
            color: #0ea5e9;
            border-radius: 10px;
            width: 35px;
            height: 35px;
        }

        .btn-view-modern:hover {
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
            color: #435ebe;
            margin: 0;
            font-size: 1.2rem;
        }

        .icon-wrapper {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
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

        .modal-header-premium::before,
        .modal-header-premium::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            pointer-events: none;
        }

        .modal-header-premium::before {
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
        }

        .modal-header-premium::after {
            bottom: -30px;
            left: -30px;
            width: 150px;
            height: 150px;
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

        .content-box {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            margin-top: 24px;
        }

        .content-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .content-text {
            color: #475569;
            line-height: 1.7;
            font-size: 0.95rem;
            text-align: justify;
            white-space: pre-wrap;
        }

        .image-preview {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 15px;
            border: 2px dashed #e2e8f0;
        }

        .btn-close-custom {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-close-custom:hover {
            background-color: rgba(255, 255, 255, 0.4);
            transform: rotate(90deg);
        }

        .btn-close-custom i {
            font-size: 1.2rem;
            line-height: 1;
            display: block;
        }

        .image-preview-small {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #f1f5f9;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .image-preview-small:hover {
            transform: scale(1.1);
        }

        .content-preview {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #64748b;
            font-size: 0.9rem;
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
                <h3 style="font-weight: 800; color: #435ebe;">Approval Berita</h3>
                <p class="text-muted">Tinjau dan setujui pengajuan berita dari Editor.</p>
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
                                        <i class="bi bi-info-circle me-1"></i> Berita menunggu review Anda
                                    </p>
                                </div>
                                <div style="font-size: 3.5rem; opacity: 0.8;">
                                    <i class="bi bi-newspaper text-white"></i>
                                </div>
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
                                        <th>Judul & Konten</th>
                                        <th>Jurnalis & Tanggal</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th class="text-center">Approval</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($berita) && !empty($berita)) : $no = 1; foreach($berita as $row) : ?>
                                    <tr>
                                        <td class="text-muted fw-bold ps-4"><?= $no++ ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="icon-wrapper d-flex align-items-center justify-content-center me-3 flex-shrink-0"
                                                    style="width: 50px; height: 50px; background-color: #f5f3ff; border-radius: 12px;">
                                                    <i class="bi bi-newspaper text-purple d-flex align-items-center justify-content-center"
                                                        style="font-size: 24px; line-height: 1; width: 100%; height: 100%; margin: 0; padding: 0;"></i>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold text-dark mb-1"
                                                        style="max-width: 300px; line-height: 1.2; font-size: 1rem;">
                                                        <?= htmlspecialchars($row['judulberita'] ?? '') ?>
                                                    </div>
                                                    <div class="content-preview">
                                                        <?= htmlspecialchars(substr($row['isi'] ?? '', 0, 100)) ?>...
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-sm btn-light-info text-info border-0 py-0 px-2 small btn-detail mt-1"
                                                        style="font-size: 0.75rem; font-weight: 700; align-self: flex-start;"
                                                        data-judul="<?= htmlspecialchars($row['judulberita'] ?? '') ?>"
                                                        data-jurnalis="<?= htmlspecialchars($row['jurnalis_nama'] ?? '-') ?>"
                                                        data-tanggal="<?= date('d M Y H:i', strtotime($row['upload_at'] ?? 'now')) ?>"
                                                        data-isi="<?= htmlspecialchars($row['isi'] ?? 'Tidak ada konten.') ?>"
                                                        data-foto="<?= BASE_URL ?>/public/uploads/berita/<?= htmlspecialchars($row['fotodokumentasi'] ?? 'default_news.jpg') ?>">
                                                        <i class="bi bi-eye-fill me-1"></i> Detail Lengkap
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <div class="text-muted small fw-bold">
                                                    <i class="bi bi-person-fill me-1"></i>
                                                    <?= htmlspecialchars($row['jurnalis_nama'] ?? '-') ?>
                                                </div>
                                                <div class="text-muted small mt-2">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    <?= date('d M Y', strtotime($row['upload_at'] ?? 'now')) ?>
                                                </div>
                                                <div class="text-muted small mt-1">
                                                    <i class="bi bi-clock me-1"></i>
                                                    <?= date('H:i', strtotime($row['upload_at'] ?? 'now')) ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $fotoName = $row['fotodokumentasi'] ?? '';
                                            $uploadDir = __DIR__ . '/../../public/uploads/berita/'; 
                                            $fotoUrl = BASE_URL . '/public/uploads/berita/' . $fotoName;
                                            $defaultFoto = BASE_URL . '/public/assets-admin/images/faces/1.jpg';
                                            
                                            if (!empty($fotoName) && file_exists($uploadDir . $fotoName)) {
                                                $finalFoto = $fotoUrl;
                                            } else {
                                                $finalFoto = $defaultFoto;
                                            }
                                            ?>
                                            <img src="<?= $finalFoto ?>" 
                                                alt="Foto Berita" 
                                                class="image-preview-small">
                                        </td>
                                        <td>
                                            <?php 
                                                $status = $row['status_berita'] ?? 'pending';
                                                $badgeClass = 'status-pending';
                                                if($status == 'terima') $badgeClass = 'status-terima';
                                                if($status == 'tolak') $badgeClass = 'status-tolak';
                                                $statusText = ucfirst($status); 
                                            ?>
                                            <span class="status-badge <?= $badgeClass ?>"><?= $statusText ?></span>
                                        </td>
                                        <td class="text-center">
                                            <?php if($status == 'pending'): ?>
                                            <div class="d-flex justify-content-center gap-2">
                                                <button class="btn-action-simple btn-accept btn-confirm-approve"
                                                    data-url="<?= BASE_URL ?>/admin/berita/approve?id=<?= $row['idberita'] ?>"
                                                    title="Terima">
                                                    <i class="bi bi-check-lg fs-5"></i>
                                                </button>
                                                <button class="btn-action-simple btn-reject btn-modal-reject"
                                                    data-id="<?= $row['idberita'] ?>"
                                                    data-judul="<?= htmlspecialchars($row['judulberita'] ?? '') ?>"
                                                    title="Tolak">
                                                    <i class="bi bi-x-lg fs-5"></i>
                                                </button>
                                            </div>
                                            <?php else: ?>
                                            <span class="text-muted small fst-italic fw-bold">
                                                <i class="bi bi-lock-fill me-1"></i> Selesai
                                            </span>
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

        <!-- Modal Detail -->
        <div class="modal fade modal-premium" id="modalDetail" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header-premium">
                        <div class="d-flex justify-content-between align-items-start w-100">
                            <div style="width: 90%;">
                                <h4 class="modal-title-premium" id="detail_judul">Judul Berita</h4>
                                <p class="modal-subtitle mb-0 mt-2">
                                    <i class="bi bi-info-circle me-1"></i> Detail lengkap pengajuan berita
                                </p>
                            </div>
                            <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body-premium">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="info-icon-wrapper bg-soft-primary">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <span class="info-label-premium">Jurnalis</span>
                                    <div class="info-value-premium text-truncate" id="detail_jurnalis">-</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="info-icon-wrapper bg-soft-purple">
                                        <i class="bi bi-calendar-event-fill"></i>
                                    </div>
                                    <span class="info-label-premium">Tanggal Upload</span>
                                    <div class="info-value-premium" id="detail_tanggal">-</div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box mt-4">
                            <div class="content-title">
                                <i class="bi bi-text-left text-primary fs-5"></i>
                                <span>Konten Berita</span>
                            </div>
                            <div class="content-text" id="detail_isi">
                            </div>
                        </div>
                        <div class="content-box mt-4">
                            <div class="content-title">
                                <i class="bi bi-image text-primary fs-5"></i>
                                <span>Foto Dokumentasi</span>
                            </div>
                            <img src="" alt="Foto Berita" id="detail_foto" class="image-preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Preview Image -->
        <div class="modal fade" id="modalPreviewImage" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Preview Foto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="" alt="Preview" id="preview_image" class="img-fluid rounded" style="max-height: 500px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tolak -->
        <div class="modal fade" id="modalTolak" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0" style="border-radius: 20px;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold text-danger">Tolak Berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/berita/reject" method="POST">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="id" id="reject_id">
                            <p class="text-muted small mb-3">Anda akan menolak berita: <br><strong id="reject_judul"
                                    class="text-dark fs-6"></strong></p>
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-muted text-uppercase">Alasan Penolakan <span
                                        class="text-danger">*</span></label>
                                <textarea name="alasan_penolakan" class="form-control" style="border-radius: 10px;"
                                    rows="4" required
                                    placeholder="Contoh: Konten tidak sesuai, foto tidak relevan, atau informasi tidak lengkap..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light fw-bold" style="border-radius: 10px;"
                                data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger fw-bold px-4" style="border-radius: 10px;">Tolak
                                Berita</button>
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
                title: 'Terima Berita?',
                text: "Berita akan tampil di sistem.",
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

        $(document).on('click', '.btn-confirm-delete', function (e) {
            e.preventDefault();
            let url = this.href;
            Swal.fire({
                title: 'Hapus Berita?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#b6becb',
                confirmButtonText: 'Ya, Hapus',
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
            let jurnalis = $(this).data('jurnalis');
            let tanggal = $(this).data('tanggal');
            let isi = $(this).data('isi');
            let foto = $(this).data('foto');

            $('#detail_judul').text(judul);
            $('#detail_jurnalis').text(jurnalis);
            $('#detail_tanggal').text(tanggal);
            $('#detail_isi').text(isi);
            $('#detail_foto').attr('src', foto);

            $('#modalDetail').modal('show');
        });

        $(document).on('click', '.btn-preview-image', function () {
            let foto = $(this).data('foto');
            $('#preview_image').attr('src', foto);
            $('#modalPreviewImage').modal('show');
        });

        <?php if(isset($_SESSION['flash_message'])): ?>
        Swal.fire({ 
            icon: '<?= $_SESSION['flash_type'] ?>', 
            title: 'Info', 
            text: '<?= $_SESSION['flash_message'] ?>', 
            timer: 3000, 
            toast: true, 
            position: 'top-end', 
            showConfirmButton: false 
        });
        <?php unset($_SESSION['flash_message']); unset($_SESSION['flash_type']); ?>
        <?php endif; ?>
    </script>
</body>
</html>
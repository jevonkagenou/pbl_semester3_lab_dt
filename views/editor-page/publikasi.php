<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Publikasi - Editor</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/toastify/toastify.css">
    <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
    <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        body { background-color: #f2f7ff; }
        .card-modern { background: #ffffff; border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03); transition: all 0.3s ease-in-out; overflow: hidden; }
        .card-modern:hover { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08); }
        .hero-stats-card { background: linear-gradient(120deg, #435ebe, #727cf5); border-radius: 20px; color: white; box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3); position: relative; overflow: hidden; transition: transform 0.3s ease; }
        .hero-stats-card::before { content: ''; position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; }
        .hero-stats-card::after { content: ''; position: absolute; bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; }
        .stats-icon-large { font-size: 3.5rem; opacity: 0.8; }
        .table-modern { width: 100%; border-collapse: separate; border-spacing: 0 12px; padding: 0 15px; }
        .table-modern thead th { border: none; color: #a0aec0; font-weight: 700; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.5px; padding: 15px 20px; }
        .table-modern tbody tr { background: white; transition: all 0.2s ease-in-out; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02); border-radius: 15px; }
        .table-modern tbody tr:hover { transform: translateY(-3px) scale(1.005); box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05); z-index: 10; position: relative; }
        .table-modern tbody td { border: none; padding: 20px; vertical-align: middle; color: #4a5568; font-weight: 600; border-top: 1px solid #f8f9fa; border-bottom: 1px solid #f8f9fa; }
        .table-modern tbody tr td:first-child { border-top-left-radius: 15px; border-bottom-left-radius: 15px; border-left: 1px solid #f8f9fa; }
        .table-modern tbody tr td:last-child { border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-right: 1px solid #f8f9fa; }
        .btn-futuristic { background: linear-gradient(135deg, #435ebe 0%, #25396f 100%); border: none; border-radius: 12px; padding: 10px 24px; color: white; font-weight: 700; box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3); transition: all 0.3s ease; }
        .btn-futuristic:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(59, 130, 246, 0.4); color: white; }
        .action-btn { width: 38px; height: 38px; border-radius: 10px; display: inline-flex; align-items: center; justify-content: center; transition: all 0.2s ease; border: none; margin: 0 4px; cursor: pointer; }
        .btn-edit-modern { background-color: #fff8e6; color: #ffb822; }
        .btn-edit-modern:hover { background-color: #ffb822; color: white; transform: rotate(15deg); }
        .btn-delete-modern { background-color: #ffe6e6; color: #ff5b5c; }
        .btn-delete-modern:hover { background-color: #ff5b5c; color: white; transform: scale(1.1); }
        .btn-link-modern { background-color: #e0f2fe; color: #0ea5e9; }
        .btn-link-modern:hover { background-color: #0ea5e9; color: white; transform: translateY(-2px); box-shadow: 0 4px 10px rgba(14, 165, 233, 0.3); }
        .status-badge { padding: 6px 12px; border-radius: 30px; font-size: 0.7rem; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; text-transform: uppercase; }
        .status-pending { background-color: #fff7ed; color: #ea580c; border: 1px solid rgba(234, 88, 12, 0.2); }
        .status-terima { background-color: #f0fdf4; color: #16a34a; border: 1px solid rgba(22, 163, 74, 0.2); }
        .status-tolak { background-color: #fef2f2; color: #dc2626; border: 1px solid rgba(220, 38, 38, 0.2); }
        .card-header-modern { background: #ffffff; padding: 25px 30px; border-bottom: 1px solid #f0f0f0; display: flex; justify-content: space-between; align-items: center; }
        .card-header-modern h4 { font-weight: 800; color: #1e3a8a; margin: 0; font-size: 1.2rem; }
        .icon-wrapper { display: flex !important; align-items: center !important; justify-content: center !important; }
        .icon-wrapper i { display: flex !important; align-items: center !important; justify-content: center !important; line-height: 1 !important; font-size: 24px; margin: 0 !important; }
        .icon-wrapper i::before { vertical-align: 0 !important; margin: 0 !important; }
        .btn-trigger-glass { background: rgba(254, 226, 226, 0.5); border: 1px solid #fecaca; color: #ef4444; padding: 6px 14px; border-radius: 30px; font-size: 0.75rem; font-weight: 700; cursor: pointer; transition: all 0.3s ease; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 4px 10px rgba(239, 68, 68, 0.1); }
        .btn-trigger-glass:hover { background: #ef4444; color: white; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3); border-color: #ef4444; }
        .icon-pulse-small { animation: pulse-red-small 2s infinite; }
        @keyframes pulse-red-small { 0% { transform: scale(1); opacity: 1; } 50% { transform: scale(1.2); opacity: 0.8; } 100% { transform: scale(1); opacity: 1; } }
        .popover-glass-danger { background: linear-gradient(145deg, #fff5f5 0%, #ffffff 100%) !important; border: 1px solid #fee2e2 !important; border-left: 4px solid #ef4444 !important; box-shadow: 0 15px 35px -5px rgba(239, 68, 68, 0.25) !important; border-radius: 12px !important; font-family: 'Nunito', sans-serif; max-width: 300px; }
        .popover-glass-danger .popover-arrow::after { border-top-color: #ef4444 !important; }
        .popover-glass-danger .popover-arrow::before { border-top-color: #ef4444 !important; }
        .popover-glass-danger .popover-header { background: transparent !important; border-bottom: 1px dashed #fecaca !important; color: #ef4444 !important; font-weight: 800 !important; font-size: 0.75rem !important; text-transform: uppercase !important; letter-spacing: 0.5px; padding: 12px 16px 8px 16px !important; }
        .popover-glass-danger .popover-body { color: #7f1d1d !important; font-size: 0.85rem !important; font-weight: 600 !important; line-height: 1.5 !important; padding: 10px 16px 16px 16px !important; }
    </style>
</head>

<body>
    <div id="app">
        <?php include 'sidebar.php'; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading mb-4">
                <h3 style="font-weight: 800; color: #1e3a8a;">Kelola Publikasi</h3>
                <p class="text-subtitle text-muted">Ajukan dan kelola data publikasi ilmiah.</p>
            </div>

            <div class="page-content">
                <section class="row mb-4">
                    <div class="col-12">
                        <div class="card hero-stats-card p-4">
                            <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
                                <div>
                                    <h5 class="text-white-50 mb-1">Total Publikasi Anda</h5>
                                    <h1 class="font-extrabold mb-0 text-white" style="font-size: 3rem;">
                                        <?= isset($stats['total']) ? $stats['total'] : 0 ?>
                                    </h1>
                                    <div class="mt-2 text-white-50 small">
                                        <span class="me-3"><i class="bi bi-check-circle-fill me-1"></i> Diterima: <?= isset($stats['terima']) ? $stats['terima'] : 0 ?></span>
                                        <span class="me-3"><i class="bi bi-x-circle-fill me-1"></i> Ditolak: <?= isset($stats['tolak']) ? $stats['tolak'] : 0 ?></span>
                                        <span><i class="bi bi-hourglass-split me-1"></i> Pending: <?= isset($stats['pending']) ? $stats['pending'] : 0 ?></span>
                                    </div>
                                </div>
                                <div class="stats-icon-large text-white">
                                    <i class="bi bi-journal-medical"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="card card-modern">
                        <div class="card-header-modern">
                            <h4>Daftar Pengajuan</h4>
                            <button type="button" class="btn-futuristic" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="bi bi-plus-lg me-2"></i> Ajukan Baru
                            </button>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-modern" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul & Tahun</th>
                                        <th>Kategori & Penulis</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($publikasi) && !empty($publikasi)) : 
                                        $no = 1;
                                        foreach($publikasi as $row) : 
                                    ?>
                                    <tr>
                                        <td class="text-muted fw-bold ps-4"><?= $no++ ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="icon-wrapper d-flex align-items-center justify-content-center me-3 flex-shrink-0" style="width: 50px; height: 50px; background-color: #eef4ff; border-radius: 12px;">
                                                    <i class="bi bi-file-earmark-text-fill text-primary d-flex align-items-center justify-content-center" style="font-size: 24px; line-height: 1; width: 100%; height: 100%; margin: 0; padding: 0;"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-bold text-dark mb-1" style="font-size: 1rem; max-width: 300px; line-height: 1.2;">
                                                        <?= htmlspecialchars($row['judulpublikasi'] ?? '-') ?>
                                                    </div>
                                                    <span class="badge bg-light text-secondary border mt-1">
                                                        Tahun: <?= htmlspecialchars($row['tahunterbit'] ?? '-') ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <div class="text-muted small fw-bold">
                                                    <i class="bi bi-tag-fill me-1 text-primary"></i>
                                                    <?= htmlspecialchars($row['namakategori'] ?? '-') ?>
                                                </div>
                                                <div class="text-muted small">
                                                    <i class="bi bi-person-circle me-1"></i>
                                                    <?= htmlspecialchars($row['namamember'] ?? '-') ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column align-items-start gap-2">
                                                <?php
                                                    $status = $row['status_publikasi'] ?? 'pending';
                                                    $badgeClass = 'status-pending';
                                                    if($status == 'terima') $badgeClass = 'status-terima';
                                                    if($status == 'tolak') $badgeClass = 'status-tolak';
                                                ?>
                                                <span class="status-badge <?= $badgeClass ?>">
                                                    <?= ucfirst($status) ?>
                                                </span>

                                                <?php if($status == 'tolak' && !empty($row['pesan_admin'])): ?>
                                                <button type="button" class="btn-trigger-glass" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" title="<i class='bi bi-shield-exclamation me-1'></i> Info Penolakan" data-bs-content="<?= htmlspecialchars($row['pesan_admin']) ?>">
                                                    <i class="bi bi-info-circle-fill icon-pulse-small"></i> Lihat Alasan
                                                </button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <a href="<?= htmlspecialchars($row['linkfile'] ?? '#') ?>" target="_blank" class="action-btn btn-link-modern" title="Buka Link">
                                                    <i class="bi bi-box-arrow-up-right"></i>
                                                </a>
                                                <button class="action-btn btn-edit-modern btn-edit" data-id="<?= $row['idpublikasi'] ?>" data-judul="<?= htmlspecialchars($row['judulpublikasi'] ?? '') ?>" data-tahun="<?= htmlspecialchars($row['tahunterbit'] ?? '') ?>" data-penulis="<?= $row['penulis'] ?? '' ?>" data-kategori-ids="<?= $row['kategori_ids'] ?? '' ?>" data-ringkasan="<?= htmlspecialchars($row['ringkasan'] ?? '') ?>" data-link="<?= htmlspecialchars($row['linkfile'] ?? '') ?>" data-bs-toggle="modal" data-bs-target="#modalEdit" title="Edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>
                                                <a href="#" class="action-btn btn-delete-modern btn-delete" data-url="<?= BASE_URL ?>/editor/publikasi/delete?id=<?= $row['idpublikasi'] ?>" title="Hapus">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </div>
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

        <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border-radius: 20px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Ajukan Publikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/editor/publikasi/store" method="POST">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="created_by" value="<?= $_SESSION['user_id'] ?? '' ?>">
                            
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Judul Publikasi</label>
                                    <input type="text" name="judulpublikasi" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required placeholder="Contoh: Analisis Big Data...">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Penulis</label>
                                    <select name="penulis" class="form-select form-select-lg fs-6" style="border-radius: 10px;">
                                        <?php if(isset($members)): foreach($members as $m): ?>
                                        <option value="<?= $m['idmember'] ?>"><?= htmlspecialchars($m['namamember']) ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Kategori</label>
                                        <select name="kategori[]" id="kategoriSelect" class="form-select" multiple="multiple" required>
                                            <?php foreach($kategori as $k): ?>
                                                <option value="<?= $k['idkategori'] ?>"><?= $k['namakategori'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-muted">Ketik untuk mencari kategori.</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Tahun Terbit</label>
                                    <input type="number" name="tahunterbit" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required placeholder="2024">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Link Eksternal</label>
                                    <input type="url" name="linkfile" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required placeholder="https://jurnal...">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Ringkasan</label>
                                    <textarea name="ringkasan" class="form-control form-control-lg fs-6" style="border-radius: 10px;" rows="3" placeholder="Deskripsi singkat publikasi..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light text-muted fw-bold" style="border-radius: 10px;" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="border-radius: 10px; background: #3b82f6; border:none;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border-radius: 20px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Publikasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/editor/publikasi/update" method="POST">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="id" id="edit_id">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Judul Publikasi</label>
                                    <input type="text" name="judulpublikasi" id="edit_judul" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Penulis</label>
                                    <select name="penulis" id="edit_penulis" class="form-select form-select-lg fs-6" style="border-radius: 10px;">
                                        <?php if(isset($members)): foreach($members as $m): ?>
                                        <option value="<?= $m['idmember'] ?>"><?= htmlspecialchars($m['namamember']) ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Kategori</label>
                                    <select name="kategori[]" id="kategoriSelectEdit" class="form-select" multiple="multiple" required>
                                        <?php foreach($kategori as $k): ?>
                                            <option value="<?= $k['idkategori'] ?>"><?= $k['namakategori'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Tahun Terbit</label>
                                    <input type="number" name="tahunterbit" id="edit_tahun" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Link Eksternal</label>
                                    <input type="url" name="linkfile" id="edit_link" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold text-muted small text-uppercase">Ringkasan</label>
                                    <textarea name="ringkasan" id="edit_ringkasan" class="form-control form-control-lg fs-6" style="border-radius: 10px;" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light text-muted fw-bold" style="border-radius: 10px;" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="border-radius: 10px; background: #3b82f6; border:none;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/js/bootstrap.bundle.min.js"></script>

    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1, { searchable: true, fixedHeight: false, perPage: 5 });

        $(document).on('click', '.btn-edit', function () {
            $('#edit_id').val($(this).data('id'));
            $('#edit_judul').val($(this).data('judul'));
            $('#edit_tahun').val($(this).data('tahun'));
            $('#edit_penulis').val($(this).data('penulis'));
            $('#edit_kategori').val($(this).data('kategori'));
            $('#edit_ringkasan').val($(this).data('ringkasan'));
            $('#edit_link').val($(this).data('link'));
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            Swal.fire({
                title: 'Hapus?', text: "Data tidak bisa dikembalikan!", icon: 'warning',
                showCancelButton: true, confirmButtonColor: '#ff5b5c', cancelButtonColor: '#b6becb',
                confirmButtonText: 'Ya, Hapus', cancelButtonText: 'Batal', background: '#fff', borderRadius: '20px'
            }).then((result) => { if (result.isConfirmed) { window.location.href = url; } });
        });

        <?php if(isset($_SESSION['flash_message'])): ?>
        Swal.fire({
            icon: <?= json_encode($_SESSION['flash_type']) ?>, title: 'Info', text: <?= json_encode($_SESSION['flash_message']) ?>, timer: 3000, showConfirmButton: false, toast: true, position: 'top-end'
        });
        <?php unset($_SESSION['flash_message']); unset($_SESSION['flash_type']); ?>
        <?php endif; ?>
    </script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) { return new bootstrap.Popover(popoverTriggerEl, { html: true, customClass: 'popover-glass-danger' }) })
    </script>
    <script>
        $(document).ready(function() {
            $('#kategoriSelect').select2({ theme: "bootstrap-5", width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style', placeholder: $( this ).data( 'placeholder' ), closeOnSelect: false, dropdownParent: $('#modalTambah') });
        });
    </script>
    <script>
        $(document).on('click', '.btn-edit', function () {
            let id = $(this).data('id');
            let kategoriIds = $(this).data('kategori-ids');
            let selectEdit = $('#kategoriSelectEdit');
            selectEdit.select2({ theme: "bootstrap-5", dropdownParent: $('#modalEdit') });
            if(kategoriIds) {
                let arrayKategori = String(kategoriIds).split(','); 
                selectEdit.val(arrayKategori).trigger('change');
            } else {
                selectEdit.val(null).trigger('change');
            }
        });
    </script>
</body>
</html>
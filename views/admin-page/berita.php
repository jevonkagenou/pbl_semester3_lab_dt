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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body { background-color: #f2f7ff; }
        .card-modern {
            background: #fff; border: none; border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03); transition: 0.3s;
        }
        .card-modern:hover { transform: translateY(-5px); }
        
        .hero-stats-card {
            background: linear-gradient(135deg, #435ebe, #727cf5);
            border-radius: 20px; color: white; position: relative; overflow: hidden;
            box-shadow: 0 10px 30px rgba(67, 94, 190, 0.3);
        }
        .hero-stats-card::before {
            content: ''; position: absolute; top: -50px; right: -50px;
            width: 200px; height: 200px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;
        }
        .hero-stats-card::after {
            content: ''; position: absolute; bottom: -30px; left: -30px;
            width: 150px; height: 150px; background: rgba(255, 255, 255, 0.1); border-radius: 50%;
        }

        .table-modern { width: 100%; border-collapse: separate; border-spacing: 0 12px; padding: 0 15px; }
        .table-modern thead th {
            border: none; color: #a0aec0; font-weight: 700; text-transform: uppercase;
            font-size: 0.8rem; padding: 15px 20px; letter-spacing: 0.5px;
        }
        .table-modern tbody tr {
            background: white; transition: all 0.2s ease-in-out;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02); border-radius: 15px;
        }
        .table-modern tbody tr:hover {
            transform: translateY(-3px) scale(1.005);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05); z-index: 10; position: relative;
        }
        .table-modern tbody td {
            border: none; padding: 20px; vertical-align: middle;
            color: #4a5568; font-weight: 600;
            border-top: 1px solid #f8f9fa; border-bottom: 1px solid #f8f9fa;
        }
        .table-modern tbody tr td:first-child { border-top-left-radius: 15px; border-bottom-left-radius: 15px; border-left: 1px solid #f8f9fa; }
        .table-modern tbody tr td:last-child { border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-right: 1px solid #f8f9fa; }

        .status-badge {
            padding: 6px 12px; border-radius: 30px; font-size: 0.7rem; font-weight: 700;
            text-transform: uppercase; display: inline-flex; align-items: center; gap: 6px;
        }
        .status-pending { background: #fff7ed; color: #ea580c; border: 1px solid rgba(234, 88, 12, 0.2); }
        .status-terima { background: #f0fdf4; color: #16a34a; border: 1px solid rgba(22, 163, 74, 0.2); }
        .status-tolak { background: #fef2f2; color: #dc2626; border: 1px solid rgba(220, 38, 38, 0.2); }

        .btn-action-simple {
            width: 40px; height: 40px; border-radius: 50%; display: inline-flex;
            align-items: center; justify-content: center; border: none; transition: 0.2s all;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-action-simple:hover { transform: scale(1.1); }
        .btn-accept { background: #10b981; color: white; }
        .btn-accept:hover { background: #059669; color: white; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4); }
        .btn-reject { background: #ef4444; color: white; }
        .btn-reject:hover { background: #dc2626; color: white; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4); }

        .modal-premium .modal-content { border: none; border-radius: 24px; overflow: hidden; background: #f8fafc; }
        .modal-header-premium {
            background: linear-gradient(135deg, #435ebe 0%, #727cf5 100%);
            padding: 30px; border: none; position: relative;
        }
        .modal-title-premium { color: white; font-weight: 800; font-size: 1.5rem; position: relative; z-index: 1; }
        .modal-body-premium { padding: 30px; }
        
        .image-preview-small {
            width: 60px; height: 60px; object-fit: cover; border-radius: 10px;
            border: 2px solid #f1f5f9; cursor: pointer; transition: transform 0.2s;
        }
        .image-preview-small:hover { transform: scale(1.1); }

        .btn-close-custom {
            background-color: rgba(255,255,255,0.2); border-radius: 50%; padding: 10px;
            border: none; color: white; transition: 0.3s;
        }
        .btn-close-custom:hover { background-color: rgba(255,255,255,0.4); transform: rotate(90deg); }

        .text-purple { color: #6f42c1; }
    </style>
</head>

<body>
    <div id="app">
        <?php include 'sidebar.php'; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a>
            </header>

            <div class="page-heading mb-4">
                <h3 style="font-weight: 800; color: #435ebe;">Approval Berita</h3>
                <p class="text-muted">Tinjau dan setujui pengajuan berita dari Editor.</p>
            </div>

            <div class="page-content">
                <section class="row mb-4">
                    <div class="col-12">
                        <div class="card hero-stats-card p-4">
                            <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
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
                        <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom pt-4 pb-3 px-4" style="border-radius: 20px 20px 0 0;">
                            <h4 style="color: #435ebe; font-weight: 800; font-size: 1.2rem; margin:0;">Daftar Pengajuan Masuk</h4>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-modern" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul & Konten</th>
                                        <th>Kategori & Jurnalis</th> 
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($berita) && !empty($berita)) : $no = 1; foreach($berita as $row) : ?>
                                    <tr>
                                        <td class="text-muted fw-bold ps-4"><?= $no++ ?></td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold text-dark mb-1" style="max-width: 300px; line-height: 1.2;">
                                                    <?= htmlspecialchars($row['judulberita'] ?? '-') ?>
                                                </div>
                                                <div class="text-muted small text-truncate" style="max-width: 250px;">
                                                    <?= htmlspecialchars(substr($row['isi'] ?? '', 0, 80)) ?>...
                                                </div>
                                                <button type="button"
                                                    class="btn btn-sm text-primary p-0 text-start mt-1 fw-bold btn-detail"
                                                    style="font-size: 0.75rem;"
                                                    data-judul="<?= htmlspecialchars($row['judulberita'] ?? '') ?>"
                                                    data-jurnalis="<?= htmlspecialchars($row['jurnalis_nama'] ?? '-') ?>"
                                                    data-kategori="<?= htmlspecialchars($row['namakategori'] ?? '-') ?>"
                                                    data-tanggal="<?= date('d M Y H:i', strtotime($row['upload_at'] ?? 'now')) ?>"
                                                    data-isi="<?= htmlspecialchars($row['isi'] ?? 'Tidak ada konten.') ?>"
                                                    data-foto="<?= BASE_URL ?>/public/uploads/berita/<?= htmlspecialchars($row['fotodokumentasi'] ?? 'default_news.jpg') ?>">
                                                    <i class="bi bi-eye-fill me-1"></i> Lihat Detail
                                                </button>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column gap-1">
                                                <div class="text-muted small fw-bold">
                                                    <i class="bi bi-tag-fill me-1 text-primary"></i>
                                                    <?= htmlspecialchars($row['namakategori'] ?? 'Tanpa Kategori') ?>
                                                </div>
                                                <div class="text-muted small">
                                                    <i class="bi bi-person-fill me-1 text-purple"></i>
                                                    <?= htmlspecialchars($row['jurnalis_nama'] ?? '-') ?>
                                                </div>
                                                <div class="text-muted small">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    <?= date('d M Y', strtotime($row['upload_at'] ?? 'now')) ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $fotoName = $row['fotodokumentasi'] ?? '';
                                            $fotoUrl = BASE_URL . '/public/uploads/berita/' . $fotoName;
                                            $defaultFoto = BASE_URL . '/public/assets-admin/images/faces/1.jpg';
                                            $finalFoto = (!empty($fotoName) && file_exists(__DIR__ . '/../../public/uploads/berita/' . $fotoName)) ? $fotoUrl : $defaultFoto;
                                            ?>
                                            <img src="<?= $finalFoto ?>" alt="Foto" class="image-preview-small btn-preview-image" data-foto="<?= $finalFoto ?>">
                                        </td>
                                        <td>
                                            <?php 
                                                $status = $row['status_berita'] ?? 'pending';
                                                $badgeClass = ($status == 'terima') ? 'status-terima' : (($status == 'tolak') ? 'status-tolak' : 'status-pending');
                                            ?>
                                            <span class="status-badge <?= $badgeClass ?>"><?= ucfirst($status) ?></span>
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
                                                <span class="text-muted small fst-italic fw-bold"><i class="bi bi-lock-fill me-1"></i> Selesai</span>
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
                        <div class="d-flex justify-content-between align-items-start w-100">
                            <div style="width: 90%;">
                                <span class="badge bg-white text-primary mb-2 px-3 py-1 rounded-pill fw-bold shadow-sm" style="font-size: 0.75rem;">
                                    <i class="bi bi-tag-fill me-1"></i> <span id="detail_kategori">Kategori</span>
                                </span>
                                <h4 class="modal-title-premium" id="detail_judul">Judul Berita</h4>
                            </div>
                            <button type="button" class="btn-close-custom" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div class="modal-body-premium">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border">
                                    <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem;">Jurnalis</small>
                                    <div class="fw-bold text-dark" id="detail_jurnalis">-</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3 border">
                                    <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem;">Tanggal Upload</small>
                                    <div class="fw-bold text-dark" id="detail_tanggal">-</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-text-left me-2"></i>Konten Berita</h6>
                            <div class="p-3 bg-white border rounded-3 text-secondary" id="detail_isi" style="white-space: pre-wrap; text-align: justify; line-height: 1.6;"></div>
                        </div>

                        <div>
                            <h6 class="fw-bold text-primary mb-2"><i class="bi bi-image me-2"></i>Dokumentasi</h6>
                            <img src="" id="detail_foto" class="img-fluid rounded-3 border w-100" style="max-height: 400px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalTolak" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0" style="border-radius: 20px;">
                    <div class="modal-header border-0 pb-0 pt-4 px-4">
                        <h5 class="modal-title fw-bold text-danger">Tolak Berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/berita/reject" method="POST">
                        <div class="modal-body px-4 pt-2 pb-4">
                            <input type="hidden" name="id" id="reject_id">
                            <p class="text-muted small mb-3">Berita ini akan ditandai sebagai <strong>Ditolak</strong> dan editor akan melihat alasan penolakan ini.</p>
                            <div class="p-3 bg-light rounded-3 mb-3 border">
                                <strong id="reject_judul" class="text-dark d-block text-truncate">Judul Berita</strong>
                            </div>
                            <div class="mb-1">
                                <label class="form-label fw-bold small text-muted">ALASAN PENOLAKAN <span class="text-danger">*</span></label>
                                <textarea name="alasan_penolakan" class="form-control" style="border-radius: 10px;" rows="3" required placeholder="Contoh: Konten mengandung unsur SARA, Foto buram..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 px-4">
                            <button type="button" class="btn btn-light fw-bold" style="border-radius: 10px;" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger fw-bold px-4" style="border-radius: 10px;">Konfirmasi Tolak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="modalPreviewImage" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-transparent border-0 shadow-none">
                    <div class="modal-body text-center p-0">
                        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
                        <img src="" id="preview_image_zoom" class="img-fluid rounded shadow-lg" style="max-height: 85vh;">
                    </div>
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
            searchable: true, fixedHeight: false, perPage: 5
        });

        $(document).on('click', '.btn-confirm-approve', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            Swal.fire({
                title: 'Setujui Berita?', text: "Berita ini akan dipublikasikan ke publik.",
                icon: 'question', showCancelButton: true,
                confirmButtonColor: '#10b981', cancelButtonColor: '#cbd5e1',
                confirmButtonText: 'Ya, Setujui', cancelButtonText: 'Batal',
                background: '#fff', borderRadius: '15px'
            }).then((result) => { if (result.isConfirmed) window.location.href = url; });
        });

        $(document).on('click', '.btn-modal-reject', function () {
            let id = $(this).data('id');
            let judul = $(this).data('judul');
            $('#reject_id').val(id);
            $('#reject_judul').text(judul);
            $('#modalTolak').modal('show');
        });

        $(document).on('click', '.btn-detail', function () {
            let judul = $(this).data('judul');
            let jurnalis = $(this).data('jurnalis');
            let kategori = $(this).data('kategori');
            let tanggal = $(this).data('tanggal');
            let isi = $(this).data('isi');
            let foto = $(this).data('foto');

            $('#detail_judul').text(judul);
            $('#detail_jurnalis').text(jurnalis);
            $('#detail_kategori').text(kategori);
            $('#detail_tanggal').text(tanggal);
            $('#detail_isi').text(isi);
            $('#detail_foto').attr('src', foto);

            $('#modalDetail').modal('show');
        });

        $(document).on('click', '.btn-preview-image', function () {
            let foto = $(this).data('foto');
            $('#preview_image_zoom').attr('src', foto);
            $('#modalPreviewImage').modal('show');
        });

        <?php if(isset($_SESSION['flash_message'])): ?>
        Swal.fire({ 
            icon: <?= json_encode($_SESSION['flash_type']) ?>, 
            title: 'Info', text: <?= json_encode($_SESSION['flash_message']) ?>, 
            timer: 3000, toast: true, position: 'top-end', showConfirmButton: false 
        });
        <?php unset($_SESSION['flash_message']); unset($_SESSION['flash_type']); ?>
        <?php endif; ?>
    </script>
</body>
</html>
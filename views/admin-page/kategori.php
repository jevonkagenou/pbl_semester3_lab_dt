<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kategori - Mazer Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/style.css">
    <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
    <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        body { background-color: #f2f7ff; }

        .card-modern {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: #fff;
            margin-right: 15px;
        }
        .stats-icon.purple {
            background: linear-gradient(135deg, #9694ff 0%, #7572ff 100%);
            box-shadow: 0 5px 15px rgba(117, 114, 255, 0.3);
        }
        .stats-icon.red {
            background: linear-gradient(135deg, #ff8f96 0%, #ff5b5c 100%);
            box-shadow: 0 5px 15px rgba(255, 91, 92, 0.3);
        }

        .font-extrabold { font-weight: 800; color: #25396f; }
        .text-muted-card { color: #8898aa; font-weight: 600; font-size: 0.9rem; }

        .btn-futuristic {
            background: linear-gradient(135deg, #435ebe 0%, #25396f 100%);
            border: none; border-radius: 12px; padding: 10px 20px; color: white;
            font-weight: 700; box-shadow: 0 5px 15px rgba(67, 94, 190, 0.3); transition: all 0.3s ease;
        }
        .btn-futuristic:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(67, 94, 190, 0.4); color: white; }

        .action-btn {
            width: 35px; height: 35px; border-radius: 10px; display: inline-flex;
            align-items: center; justify-content: center; transition: all 0.3s; border: none; margin-right: 5px;
        }
        .btn-edit-modern { background-color: #fff8e6; color: #ffb822; }
        .btn-edit-modern:hover { background-color: #ffb822; color: white; transform: rotate(15deg); }
        .btn-delete-modern { background-color: #ffe6e6; color: #ff5b5c; }
        .btn-delete-modern:hover { background-color: #ff5b5c; color: white; transform: scale(1.1); }

        /* --- TABLE --- */
        .table-modern { width: 100%; border-collapse: separate; border-spacing: 0 10px; padding: 0 20px; }
        .table-modern thead th {
            border: none; color: #a0aec0; font-weight: 700; text-transform: uppercase;
            font-size: 0.75rem; padding: 15px 20px;
        }
        .table-modern tbody tr { background: white; transition: all 0.3s ease; box-shadow: 0 2px 5px rgba(0,0,0,0.02); }
        .table-modern tbody tr:hover { transform: scale(1.01); box-shadow: 0 10px 30px rgba(0,0,0,0.08); z-index: 10; position: relative; }
        .table-modern tbody td {
            border: none; padding: 20px; vertical-align: middle; color: #4a5568; font-weight: 600;
            border-top: 1px solid #f8f9fa; border-bottom: 1px solid #f8f9fa;
        }
        .table-modern tbody tr td:first-child { border-top-left-radius: 15px; border-bottom-left-radius: 15px; border-left: 1px solid #f8f9fa; }
        .table-modern tbody tr td:last-child { border-top-right-radius: 15px; border-bottom-right-radius: 15px; border-right: 1px solid #f8f9fa; }

        /* --- TABS --- */
        .nav-tabs { border-bottom: none; margin-bottom: -1px; z-index: 2; position: relative; padding-left: 10px; }
        .nav-tabs .nav-link { 
            border: none; font-weight: 700; color: #a0aec0; padding: 15px 30px; 
            border-radius: 15px 15px 0 0; transition: all 0.3s; 
        }
        .nav-tabs .nav-link:hover { color: #435ebe; background: rgba(67, 94, 190, 0.05); }
        .nav-tabs .nav-link.active { 
            color: #435ebe; background-color: #fff; 
            box-shadow: 0 -5px 20px rgba(0,0,0,0.03); 
        }
        .tab-content { 
            background: #fff; padding: 30px; border-radius: 20px; 
            border-top-left-radius: 0; 
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03); 
            border: none; 
        }
    </style>
</head>

<body>
    <div id="app">
        <?php include 'sidebar.php'; ?>
        <div id="main">
            <header class="mb-3"><a href="#" class="burger-btn d-block d-xl-none"><i class="bi bi-justify fs-3"></i></a></header>

            <div class="page-heading mb-4">
                <h3 style="font-weight: 800; color: #25396f;">Manajemen Kategori</h3>
                <p class="text-subtitle text-muted">Kelola kategori konten dengan tampilan modern.</p>
            </div>

            <div class="page-content">
                <section class="row mb-4">
                    <div class="col-12 col-md-6">
                        <div class="card card-modern">
                            <div class="card-body px-4 py-4">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="stats-icon purple">
                                            <i class="bi bi-newspaper"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-muted-card mb-1">Kategori Berita</h6>
                                        <h3 class="font-extrabold mb-0"><?= isset($kategoriBerita) ? count($kategoriBerita) : 0 ?></h3>
                                        <span class="text-muted small">Total Terdaftar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card card-modern">
                            <div class="card-body px-4 py-4">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="stats-icon red">
                                            <i class="bi bi-journal-bookmark-fill"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6 class="text-muted-card mb-1">Kategori Publikasi</h6>
                                        <h3 class="font-extrabold mb-0"><?= isset($kategoriPublikasi) ? count($kategoriPublikasi) : 0 ?></h3>
                                        <span class="text-muted small">Total Terdaftar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="berita-tab" data-bs-toggle="tab" data-bs-target="#berita" type="button" role="tab">
                                <i class="bi bi-newspaper me-2"></i> Kategori Berita
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="publikasi-tab" data-bs-toggle="tab" data-bs-target="#publikasi" type="button" role="tab">
                                <i class="bi bi-journal-bookmark-fill me-2"></i> Kategori Publikasi
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active" id="berita" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
                                <h4 style="font-weight: 800; color: #25396f; margin: 0;">Daftar Kategori Berita</h4>
                                <button type="button" class="btn-futuristic btn-add-kategori" data-type="berita" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                    <i class="bi bi-plus-lg me-2"></i> Tambah Berita
                                </button>
                            </div>
                            
                            <table class="table table-modern" id="tableBerita">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($kategoriBerita)) : $no=1; foreach($kategoriBerita as $row): ?>
                                    <tr>
                                        <td class="text-muted fw-bold ps-4"><?= $no++ ?></td>
                                        <td>
                                            <span class="fw-bold text-dark" style="font-size: 1.05rem;">
                                                <?= htmlspecialchars($row['namakategori']) ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button class="action-btn btn-edit-modern btn-edit" 
                                                data-id="<?= $row['idkategori'] ?>" 
                                                data-nama="<?= $row['namakategori'] ?>" 
                                                data-type="berita"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <a href="#" class="action-btn btn-delete-modern btn-delete" 
                                                data-url="<?= BASE_URL ?>/admin/kategori/delete?id=<?= $row['idkategori'] ?>&type=berita">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="publikasi" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
                                <h4 style="font-weight: 800; color: #25396f; margin: 0;">Daftar Kategori Publikasi</h4>
                                <button type="button" class="btn-futuristic btn-add-kategori" data-type="publikasi" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                    <i class="bi bi-plus-lg me-2"></i> Tambah Publikasi
                                </button>
                            </div>

                            <table class="table table-modern" id="tablePublikasi">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($kategoriPublikasi)) : $no=1; foreach($kategoriPublikasi as $row): ?>
                                    <tr>
                                        <td class="text-muted fw-bold ps-4"><?= $no++ ?></td>
                                        <td>
                                            <span class="fw-bold text-dark" style="font-size: 1.05rem;">
                                                <?= htmlspecialchars($row['namakategori']) ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button class="action-btn btn-edit-modern btn-edit" 
                                                data-id="<?= $row['idkategori'] ?>" 
                                                data-nama="<?= $row['namakategori'] ?>" 
                                                data-type="publikasi"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <a href="#" class="action-btn btn-delete-modern btn-delete" 
                                                data-url="<?= BASE_URL ?>/admin/kategori/delete?id=<?= $row['idkategori'] ?>&type=publikasi">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
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

        <div class="modal fade" id="modalTambah" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 20px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Tambah Kategori <span id="labelTipeTambah"></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/kategori/store" method="POST">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="type" id="tambahType">
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">Nama Kategori</label>
                                <input type="text" name="namakategori" class="form-control form-control-lg fs-6" required placeholder="Contoh: Teknologi, Jurnal, dll">
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="background: #435ebe; border:none;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEdit" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 20px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/kategori/update" method="POST">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="id" id="edit_id">
                            <input type="hidden" name="type" id="edit_type">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">Nama Kategori</label>
                                <input type="text" name="namakategori" id="edit_nama" class="form-control form-control-lg fs-6" required>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="background: #435ebe; border:none;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/js/bootstrap.bundle.min.js"></script>

    <script>
        let tableOptions = { searchable: true, fixedHeight: false, perPage: 5 };
        let tableBerita = new simpleDatatables.DataTable(document.querySelector('#tableBerita'), tableOptions);
        let tablePublikasi = new simpleDatatables.DataTable(document.querySelector('#tablePublikasi'), tableOptions);

        $(document).on('click', '.btn-add-kategori', function() {
            let type = $(this).data('type'); 
            $('#tambahType').val(type);
            $('#labelTipeTambah').text(type.charAt(0).toUpperCase() + type.slice(1)); 
        });

        $(document).on('click', '.btn-edit', function () {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let type = $(this).data('type');
            
            $('#edit_id').val(id);
            $('#edit_nama').val(nama);
            $('#edit_type').val(type); 
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            Swal.fire({
                title: 'Hapus Kategori?', text: "Data tidak bisa dikembalikan!", icon: 'warning',
                showCancelButton: true, confirmButtonColor: '#ff5b5c', cancelButtonColor: '#b6becb',
                confirmButtonText: 'Ya, Hapus', background: '#fff', borderRadius: '20px'
            }).then((result) => { if (result.isConfirmed) { window.location.href = url; } });
        });

        <?php if(isset($_SESSION['flash_message'])): ?>
        Swal.fire({
            icon: '<?= $_SESSION['flash_type'] ?>', title: 'Info', text: '<?= $_SESSION['flash_message'] ?>',
            timer: 3000, showConfirmButton: false, toast: true, position: 'top-end'
        });
        <?php unset($_SESSION['flash_message']); unset($_SESSION['flash_type']); ?>
        <?php endif; ?>
    </script>
</body>
</html>
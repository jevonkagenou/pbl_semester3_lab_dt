<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Fasilitas - Mazer Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/style.css">

    <style>
        body { background-color: #f2f7ff; }
        .card-modern {
            background: #ffffff; border: none; border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03); overflow: hidden;
            transition: transform 0.3s ease;
        }
        .card-modern:hover { transform: translateY(-5px); }
        .card-header-modern {
            background: #ffffff; padding: 25px 30px; border-bottom: 1px solid #f0f0f0;
            display: flex; justify-content: space-between; align-items: center;
        }
        .card-header-modern h4 { font-weight: 800; color: #25396f; margin: 0; }
        .btn-futuristic {
            background: linear-gradient(135deg, #435ebe 0%, #25396f 100%);
            border: none; border-radius: 12px; padding: 10px 20px; color: white;
            font-weight: 700; box-shadow: 0 5px 15px rgba(67, 94, 190, 0.3); transition: all 0.3s ease;
        }
        .btn-futuristic:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(67, 94, 190, 0.4); color: white; }
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
        .action-btn {
            width: 35px; height: 35px; border-radius: 10px; display: inline-flex;
            align-items: center; justify-content: center; transition: all 0.3s; border: none; margin-right: 5px;
        }
        .btn-edit-modern { background-color: #fff8e6; color: #ffb822; }
        .btn-edit-modern:hover { background-color: #ffb822; color: white; transform: rotate(15deg); }
        .btn-delete-modern { background-color: #ffe6e6; color: #ff5b5c; }
        .btn-delete-modern:hover { background-color: #ff5b5c; color: white; transform: scale(1.1); }
        
        .hero-stats-card {
            background: linear-gradient(120deg, #435ebe, #727cf5);
            border-radius: 20px; color: white;
            box-shadow: 0 10px 30px rgba(40, 167, 69, 0.2);
            position: relative; overflow: hidden;
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
            content: ''; position: absolute; top: -50px; right: -50px;
            width: 200px; height: 200px; background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        .hero-stats-card::after {
            content: ''; position: absolute; bottom: -30px; left: -30px;
            width: 150px; height: 150px; background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        .stats-icon-large { font-size: 3.5rem; opacity: 0.8; }
        
        .fasilitas-img-wrapper {
            width: 80px;
            height: 60px;
            border-radius: 12px;
            overflow: hidden;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .fasilitas-img-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .jumlah-badge {
            background: linear-gradient(135deg, #435ebe 0%, #25396f 100%);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.8rem;
            box-shadow: 0 3px 10px rgba(67, 94, 190, 0.2);
        }
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
                <h3 style="font-weight: 800; color: #25396f;">Manajemen Fasilitas</h3>
                <p class="text-subtitle text-muted">Kelola data fasilitas dan sarana prasarana.</p>
            </div>

            <div class="page-content">
                <section class="row mb-4">
                    <div class="col-12">
                        <div class="card hero-stats-card p-4">
                            <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
                                <div>
                                    <h5 class="text-white-50 mb-1">Total Fasilitas</h5>
                                    <h1 class="font-extrabold mb-0 text-white" style="font-size: 3rem;">
                                        <?= isset($stats['total']) ? $stats['total'] : 0 ?>
                                    </h1>
                                    <div class="mt-2 text-white-50 small">
                                        <span><i class="bi bi-box-seam-fill text-white me-1"></i> Total Unit: <?= isset($stats['total_jumlah']) ? $stats['total_jumlah'] : 0 ?></span>
                                    </div>
                                </div>
                                <div class="stats-icon-large text-white">
                                    <i class="bi bi-display-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="card card-modern">
                        <div class="card-header-modern">
                            <h4>Daftar Fasilitas</h4>
                            <button type="button" class="btn-futuristic" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="bi bi-plus-lg me-2"></i> Tambah Fasilitas
                            </button>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-modern" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto & Nama</th>
                                        <th>Jumlah (Unit)</th>
                                        <th>Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($fasilitas) && !empty($fasilitas)) : 
                                        $no = 1;
                                        foreach($fasilitas as $row) : 
                                            
                                            $fotoName = $row['foto'];
                                            $uploadDir = __DIR__ . '/../../public/uploads/fasilitas/'; 
                                            $fotoUrl = BASE_URL . '/public/uploads/fasilitas/' . $fotoName;
                                            $defaultFoto = BASE_URL . '/public/assets-admin/images/faces/1.jpg';

                                            if (!empty($fotoName) && file_exists($uploadDir . $fotoName)) {
                                                $finalFoto = $fotoUrl;
                                            } else {
                                                $finalFoto = $defaultFoto;
                                            }
                                    ?>
                                    <tr>
                                        <td class="text-muted fw-bold ps-4"><?= $no++ ?></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="fasilitas-img-wrapper">
                                                    <img src="<?= $finalFoto ?>" alt="Foto Fasilitas" class="fasilitas-img-cover">
                                                </div>
                                                <span class="fw-bold text-dark"><?= htmlspecialchars($row['namafasilitas']) ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="jumlah-badge">
                                                <?= htmlspecialchars($row['jumlah']) ?> 
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-muted small" style="max-width: 300px;">
                                                <?= htmlspecialchars($row['deskripsi']) ?>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button class="action-btn btn-edit-modern btn-edit" 
                                                data-id="<?= $row['idfasilitas'] ?>"
                                                data-nama="<?= $row['namafasilitas'] ?>"
                                                data-jumlah="<?= $row['jumlah'] ?>"
                                                data-deskripsi="<?= $row['deskripsi'] ?>"
                                                data-foto="<?= $row['foto'] ?>"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <a href="#" class="action-btn btn-delete-modern btn-delete"
                                                data-url="<?= BASE_URL ?>/admin/fasilitas/delete?id=<?= $row['idfasilitas'] ?>">
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

        <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border-radius: 20px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Tambah Fasilitas Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/fasilitas/store" method="POST" enctype="multipart/form-data">
                        <div class="modal-body pt-4">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Nama Fasilitas</label>
                                    <input type="text" name="namafasilitas" class="form-control form-control-lg fs-6" placeholder="Contoh: Komputer i7, Proyektor, Meja Komputer" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control form-control-lg fs-6" placeholder="Contoh: 25" required min="1">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Foto Fasilitas</label>
                                    <input type="file" name="foto" class="form-control form-control-lg fs-6" accept="image/*">
                                    <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control form-control-lg fs-6" rows="3" placeholder="Deskripsi detail fasilitas..." required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="background: #435ebe; border:none;">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" style="border-radius: 20px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Fasilitas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/fasilitas/update" method="POST" enctype="multipart/form-data">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="id" id="edit_id">
                            <input type="hidden" name="old_foto" id="edit_old_foto">
                            
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Nama Fasilitas</label>
                                    <input type="text" name="namafasilitas" id="edit_nama" class="form-control form-control-lg fs-6" placeholder="Contoh: Komputer i7, Proyektor, Meja Komputer" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Jumlah</label>
                                    <input type="number" name="jumlah" id="edit_jumlah" class="form-control form-control-lg fs-6" placeholder="Contoh: 25" required min="1">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Update Foto</label>
                                    <input type="file" name="foto" class="form-control form-control-lg fs-6" accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Deskripsi</label>
                                    <textarea name="deskripsi" id="edit_deskripsi" class="form-control form-control-lg fs-6" rows="3" placeholder="Deskripsi detail fasilitas..." required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="background: #435ebe; border:none;">Update Data</button>
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
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1, { searchable: true, fixedHeight: false, perPage: 5 });

        $(document).on('click', '.btn-edit', function () {
            $('#edit_id').val($(this).data('id'));
            $('#edit_nama').val($(this).data('nama'));
            $('#edit_jumlah').val($(this).data('jumlah'));
            $('#edit_deskripsi').val($(this).data('deskripsi'));
            $('#edit_old_foto').val($(this).data('foto'));
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            Swal.fire({
                title: 'Hapus Fasilitas?', text: "Data tidak bisa dikembalikan!", icon: 'warning',
                showCancelButton: true, confirmButtonColor: '#ff5b5c', cancelButtonColor: '#b6becb',
                confirmButtonText: 'Ya, Hapus', cancelButtonText: 'Batal', background: '#fff', borderRadius: '20px'
            }).then((result) => { if (result.isConfirmed) window.location.href = url; });
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Member - Mazer Admin</title>

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
        .status-badge {
            padding: 6px 12px; border-radius: 30px; font-size: 0.7rem; font-weight: 700;
            display: inline-flex; align-items: center; gap: 6px;
        }
        .status-active { background-color: rgba(57, 218, 138, 0.1); color: #2ebf7e; border: 1px solid rgba(57, 218, 138, 0.2); }
        .status-active::before { content: ''; width: 6px; height: 6px; background-color: #2ebf7e; border-radius: 50%; box-shadow: 0 0 8px #2ebf7e; }
        .status-inactive { background-color: rgba(255, 121, 118, 0.1); color: #ff5b5c; border: 1px solid rgba(255, 121, 118, 0.2); }
        .status-inactive::before { content: ''; width: 6px; height: 6px; background-color: #ff5b5c; border-radius: 50%; }
        
        .hero-stats-card {
            background: linear-gradient(120deg, #435ebe, #727cf5);
            border-radius: 20px; color: white;
            box-shadow: 0 10px 30px rgba(67, 94, 190, 0.2);
            position: relative; overflow: hidden;
        }
        .stats-icon-large { font-size: 3.5rem; opacity: 0.8; }
        
        .avatar-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .avatar-img-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
                <h3 style="font-weight: 800; color: #25396f;">Manajemen Member</h3>
                <p class="text-subtitle text-muted">Kelola data dosen dan anggota dengan tampilan modern.</p>
            </div>

            <div class="page-content">
                <section class="row mb-4">
                    <div class="col-12">
                        <div class="card hero-stats-card p-4">
                            <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
                                <div>
                                    <h5 class="text-white-50 mb-1">Total Member</h5>
                                    <h1 class="font-extrabold mb-0 text-white" style="font-size: 3rem;">
                                        <?= isset($stats['total']) ? $stats['total'] : 0 ?>
                                    </h1>
                                    <div class="mt-2 text-white-50 small">
                                        <span class="me-3"><i class="bi bi-check-circle-fill text-white me-1"></i> Aktif: <?= isset($stats['active']) ? $stats['active'] : 0 ?></span>
                                        <span><i class="bi bi-x-circle-fill text-white me-1"></i> Non-Aktif: <?= isset($stats['inactive']) ? $stats['inactive'] : 0 ?></span>
                                    </div>
                                </div>
                                <div class="stats-icon-large text-white">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <div class="card card-modern">
                        <div class="card-header-modern">
                            <h4>Daftar Member</h4>
                            <button type="button" class="btn-futuristic" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="bi bi-plus-lg me-2"></i> Tambah Member
                            </button>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-modern" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto & NIP</th>
                                        <th>Nama & Gelar</th>
                                        <th>Kontak & Riset</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($members) && !empty($members)) : 
                                        $no = 1;
                                        foreach($members as $row) : 
                                            
                                            $fotoName = $row['fotoprofil'];
                                            $uploadDir = __DIR__ . '/../../public/uploads/members/'; 
                                            $fotoUrl = BASE_URL . '/public/uploads/members/' . $fotoName;
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
                                                <div class="avatar-wrapper">
                                                    <img src="<?= $finalFoto ?>" alt="Foto" class="avatar-img-cover">
                                                </div>
                                                <span class="fw-bold text-dark font-monospace"><?= htmlspecialchars($row['nip']) ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <div class="fw-bold text-primary" style="font-size: 1.05rem;"><?= htmlspecialchars($row['namamember']) ?></div>
                                                <span class="badge bg-light-secondary text-secondary mt-1"><?= htmlspecialchars($row['gelar']) ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center h-100 gap-2">
                                                <div class="d-flex align-items-center text-muted small">
                                                    <i class="bi bi-envelope-fill me-2 text-primary" style="font-size: 1.1em;"></i> 
                                                    <span><?= htmlspecialchars($row['email']) ?></span>
                                                </div>
                                                <div class="d-flex align-items-center text-muted small">
                                                    <i class="bi bi-book-half me-2 text-warning" style="font-size: 1.1em;"></i> 
                                                    <span><?= htmlspecialchars($row['bidangriset']) ?></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if($row['statusmember'] == 'active'): ?>
                                                <span class="status-badge status-active">Aktif</span>
                                            <?php else: ?>
                                                <span class="status-badge status-inactive">Non-Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="action-btn btn-edit-modern btn-edit" 
                                                data-id="<?= $row['idmember'] ?>"
                                                data-nip="<?= $row['nip'] ?>"
                                                data-nama="<?= $row['namamember'] ?>"
                                                data-gelar="<?= $row['gelar'] ?>"
                                                data-email="<?= $row['email'] ?>"
                                                data-bidang="<?= $row['bidangriset'] ?>"
                                                data-foto="<?= $row['fotoprofil'] ?>"
                                                data-status="<?= $row['statusmember'] ?>"
                                                data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>
                                            <a href="#" class="action-btn btn-delete-modern btn-delete"
                                                data-url="<?= BASE_URL ?>/admin/member/delete?id=<?= $row['idmember'] ?>">
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
                        <h5 class="modal-title fw-bold">Tambah Member Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/member/store" method="POST" enctype="multipart/form-data">
                        <div class="modal-body pt-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">NIP</label>
                                    <input type="text" name="nip" class="form-control form-control-lg fs-6" placeholder="Contoh: 198901012019031001" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Gelar</label>
                                    <input type="text" name="gelar" class="form-control form-control-lg fs-6" placeholder="Contoh: S.T., M.T." required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Nama Lengkap</label>
                                    <input type="text" name="namamember" class="form-control form-control-lg fs-6" placeholder="Contoh: Budi Santoso" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg fs-6" placeholder="Contoh: budi@polinema.ac.id" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Bidang Riset</label>
                                    <input type="text" name="bidangriset" class="form-control form-control-lg fs-6" placeholder="Contoh: Artificial Intelligence" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Foto Profil</label>
                                    <input type="file" name="fotoprofil" class="form-control form-control-lg fs-6" accept="image/*">
                                    <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Jika kosong akan menggunakan foto default.</small>
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
                        <h5 class="modal-title fw-bold">Edit Member</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/member/update" method="POST" enctype="multipart/form-data">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="id" id="edit_id">
                            <input type="hidden" name="old_fotoprofil" id="edit_old_foto">
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">NIP</label>
                                    <input type="text" name="nip" id="edit_nip" class="form-control form-control-lg fs-6" placeholder="Contoh: 198901012019031001" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Gelar</label>
                                    <input type="text" name="gelar" id="edit_gelar" class="form-control form-control-lg fs-6" placeholder="Contoh: S.T., M.T." required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Nama Lengkap</label>
                                    <input type="text" name="namamember" id="edit_nama" class="form-control form-control-lg fs-6" placeholder="Contoh: Budi Santoso" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Email</label>
                                    <input type="email" name="email" id="edit_email" class="form-control form-control-lg fs-6" placeholder="Contoh: budi@polinema.ac.id" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Bidang Riset</label>
                                    <input type="text" name="bidangriset" id="edit_bidang" class="form-control form-control-lg fs-6" placeholder="Contoh: Artificial Intelligence" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Update Foto</label>
                                    <input type="file" name="fotoprofil" class="form-control form-control-lg fs-6" accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-uppercase text-muted">Status</label>
                                    <select name="statusmember" id="edit_status" class="form-select form-select-lg fs-6">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
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
            $('#edit_nip').val($(this).data('nip'));
            $('#edit_nama').val($(this).data('nama'));
            $('#edit_gelar').val($(this).data('gelar'));
            $('#edit_email').val($(this).data('email'));
            $('#edit_bidang').val($(this).data('bidang'));
            $('#edit_old_foto').val($(this).data('foto'));
            $('#edit_status').val($(this).data('status'));
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            Swal.fire({
                title: 'Hapus Member?', text: "Data tidak bisa dikembalikan!", icon: 'warning',
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
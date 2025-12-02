<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Editor - Mazer Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/simple-datatables/style.css">

    <style>
        body {
            background-color: #f2f7ff;
        }

        .card-modern {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card-modern:hover {
            transform: translateY(-5px);
        }

        .card-header-modern {
            background: #ffffff;
            padding: 25px 30px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header-modern h4 {
            font-weight: 800;
            color: #25396f;
            letter-spacing: -0.5px;
            margin: 0;
        }

        .btn-futuristic {
            background: linear-gradient(135deg, #435ebe 0%, #25396f 100%);
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            color: white;
            font-weight: 700;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(67, 94, 190, 0.3);
            transition: all 0.3s ease;
        }

        .btn-futuristic:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(67, 94, 190, 0.4);
            color: white;
        }

        .table-modern {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px; 
            padding: 0 20px;
        }

        .table-modern thead th {
            border: none;
            color: #a0aec0;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1.2px;
            padding: 15px 20px;
        }

        .table-modern tbody tr {
            background: white;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }

        .table-modern tbody tr:hover {
            transform: scale(1.01);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
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
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-active {
            background-color: rgba(57, 218, 138, 0.1);
            color: #2ebf7e;
            border: 1px solid rgba(57, 218, 138, 0.2);
        }

        .status-active::before {
            content: '';
            width: 6px;
            height: 6px;
            background-color: #2ebf7e;
            border-radius: 50%;
            box-shadow: 0 0 8px #2ebf7e;
        }

        .status-inactive {
            background-color: rgba(255, 121, 118, 0.1);
            color: #ff5b5c;
            border: 1px solid rgba(255, 121, 118, 0.2);
        }

        .status-inactive::before {
            content: '';
            width: 6px;
            height: 6px;
            background-color: #ff5b5c;
            border-radius: 50%;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            border: none;
            margin-right: 5px;
        }

        .btn-edit-modern {
            background-color: #fff8e6;
            color: #ffb822;
        }

        .btn-edit-modern:hover {
            background-color: #ffb822;
            color: white;
            transform: rotate(15deg);
        }

        .btn-delete-modern {
            background-color: #ffe6e6;
            color: #ff5b5c;
        }

        .btn-delete-modern:hover {
            background-color: #ff5b5c;
            color: white;
            transform: scale(1.1);
        }
        
        .dataTable-input {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 10px 15px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        
        .dataTable-input:focus {
            border-color: #435ebe;
            box-shadow: 0 0 0 3px rgba(67, 94, 190, 0.1);
        }

        .dataTable-selector {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 8px 30px 8px 15px;
        }

        .username-text {
            color: #25396f;
            font-weight: 700;
        }
        
        .role-badge {
            background: #e2e8f0;
            color: #64748b;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 0.7rem;
            font-weight: 800;
            text-transform: uppercase;
        }
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
                <h3 style="font-weight: 800; color: #25396f;">Dashboard Admin</h3>
                <p class="text-subtitle text-muted">Statistik & Manajemen Editor</p>
            </div>

            <div class="page-content">
                <!-- STATISTIK (SUDAH DINAMIS) -->
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <!-- Card 1: Total Editors -->
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Icon Orang Banyak -->
                                                <div class="stats-icon purple">
                                                    <i class="bi bi-people-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Editor</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?= isset($stats['total']) ? $stats['total'] : 0 ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 2: Active Editors -->
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Icon Orang Centang (Hijau) -->
                                                <div class="stats-icon green">
                                                    <i class="bi bi-person-check-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Editor Aktif</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?= isset($stats['active']) ? $stats['active'] : 0 ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card 3: Inactive Editors -->
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Icon Orang Silang/Merah (Merah) -->
                                                <div class="stats-icon red">
                                                    <i class="bi bi-person-x-fill"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Non-Aktif</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?= isset($stats['inactive']) ? $stats['inactive'] : 0 ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Profile Card (Admin) -->
                    <div class="col-12 col-lg-3">
                        <div class="card card-modern">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="<?= BASE_URL ?>/public/assets-admin/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold text-dark mb-1">
                                            <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pengguna' ?>
                                        </h5>
                                        <span class="badge bg-light-primary text-primary">
                                            <i class="bi bi-person-badge-fill me-1"></i>
                                            <?= isset($_SESSION['user_role']) ? strtoupper($_SESSION['user_role']) : 'GUEST' ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FUTURISTIC TABLE SECTION -->
                <section class="section mt-4">
                    <div class="card card-modern">
                        <div class="card-header-modern">
                            <h4>Manajemen Editor</h4>
                            <button type="button" class="btn-futuristic" data-bs-toggle="modal"
                                data-bs-target="#modalTambah">
                                <i class="bi bi-plus-lg me-2"></i> Tambah Editor
                            </button>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-modern" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(isset($editors) && !empty($editors)) : 
                                        $no = 1;
                                        foreach($editors as $row) : 
                                    ?>
                                    <tr>
                                        <td class="text-muted fw-bold ps-4"><?= $no++ ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md me-3 bg-light-primary">
                                                    <span class="avatar-content text-primary font-bold">
                                                        <?= strtoupper(substr($row['username'], 0, 1)) ?>
                                                    </span>
                                                </div>
                                                <span class="username-text"><?= htmlspecialchars($row['username']) ?></span>
                                            </div>
                                        </td>
                                        <td><span class="role-badge"><?= $row['role'] ?></span></td>
                                        <td>
                                            <?php if($row['status'] == 'aktif'): ?>
                                            <span class="status-badge status-active">Aktif</span>
                                            <?php else: ?>
                                            <span class="status-badge status-inactive">Non-Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="action-btn btn-edit-modern btn-edit" 
                                                data-id="<?= $row['id'] ?>"
                                                data-username="<?= $row['username'] ?>"
                                                data-status="<?= $row['status'] ?>" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEdit"
                                                title="Edit User">
                                                <i class="bi bi-pencil-fill"></i>
                                            </button>

                                            <a href="#" class="action-btn btn-delete-modern btn-delete"
                                                data-url="<?= BASE_URL ?>/admin/editor/delete?id=<?= $row['id'] ?>"
                                                title="Hapus User">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; 
                                    endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <?php include 'footer.php'; ?>
        </div>

        <!-- MODAL TAMBAH -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 20px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Tambah Editor Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/editor/store" method="POST">
                        <div class="modal-body pt-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted small text-uppercase">Username</label>
                                <input type="text" name="username" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted small text-uppercase">Password</label>
                                <input type="password" name="password" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light text-muted fw-bold" style="border-radius: 10px;" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="border-radius: 10px; background: #435ebe; border:none;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL EDIT -->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 20px; border: none;">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold">Edit Data Editor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= BASE_URL ?>/admin/editor/update" method="POST">
                        <div class="modal-body pt-4">
                            <input type="hidden" name="id" id="edit_id">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted small text-uppercase">Username</label>
                                <input type="text" name="username" id="edit_username" class="form-control form-control-lg fs-6" style="border-radius: 10px;" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted small text-uppercase">Status</label>
                                <select name="status" id="edit_status" class="form-select form-select-lg fs-6" style="border-radius: 10px;">
                                    <option value="aktif">Aktif</option>
                                    <option value="dinonaktifkan">Dinonaktifkan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-muted small text-uppercase">Password Baru <small class="text-muted text-lowercase fw-normal">(Opsional)</small></label>
                                <input type="password" name="password" class="form-control form-control-lg fs-6" style="border-radius: 10px;" placeholder="Kosongkan jika tidak diganti">
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0 pb-4 pe-4">
                            <button type="button" class="btn btn-light text-muted fw-bold" style="border-radius: 10px;" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="border-radius: 10px; background: #435ebe; border:none;">Update</button>
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
        let dataTable = new simpleDatatables.DataTable(table1, {
            searchable: true,
            fixedHeight: false,
            perPage: 5
        });

        $(document).on('click', '.btn-edit', function () {
            let id = $(this).data('id');
            let username = $(this).data('username');
            let status = $(this).data('status');

            $('#edit_id').val(id);
            $('#edit_username').val(username);
            $('#edit_status').val(status);
        });

        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            let url = $(this).data('url');

            Swal.fire({
                title: 'Hapus User?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff5b5c',
                cancelButtonColor: '#b6becb',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                background: '#fff',
                borderRadius: '20px'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });

        <?php if(isset($_SESSION['flash_message'])): ?>
        Swal.fire({
            icon: '<?= $_SESSION['flash_type'] ?>',
            title: 'Info',
            text: '<?= $_SESSION['flash_message'] ?>',
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
        <?php unset($_SESSION['flash_message']); unset($_SESSION['flash_type']); ?>
        <?php endif; ?>
    </script>
</body>
</html>
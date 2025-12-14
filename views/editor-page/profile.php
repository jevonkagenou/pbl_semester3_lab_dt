<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - Admin</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
    <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <style>
        body { background-color: #f0f4f8; }
        
        .card-modern {
            background: #ffffff;
            border: none;
            border-radius: 24px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.04);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            height: 100%;
        }
        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        }

        .profile-header {
            background: linear-gradient(135deg, #435ebe 0%, #25396f 100%);
            padding: 50px 20px 80px;
            text-align: center;
            color: white;
            position: relative;
            border-radius: 0 0 50% 50% / 20px;
        }
        
        .avatar-container {
            position: relative;
            width: 130px;
            height: 130px;
            margin: 0 auto 15px;
        }
        .avatar-wrapper {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(15px);
            border-radius: 50%;
            padding: 6px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .avatar-content {
            width: 100%;
            height: 100%;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #435ebe;
            overflow: hidden;
        }
        .avatar-content i {
            font-size: 4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            line-height: 0;
        }

        .status-badge {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 35px;
            height: 35px;
            background: #198754;
            border: 4px solid #fff;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .status-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
            margin-top: -40px; 
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }
        
        .status-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        .status-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(67, 94, 190, 0.15);
            border-color: #435ebe;
        }
        .status-icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 15px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #435ebe;
            box-shadow: inset 0 2px 5px rgba(255,255,255,0.8), 0 5px 10px rgba(0,0,0,0.05);
            flex-shrink: 0;
        }
        .status-icon-wrapper i {
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 0;
            width: 100%;
            height: 100%;
        }
        .status-card.success .status-icon-wrapper { color: #198754; }
        .status-card.warning .status-icon-wrapper { color: #ffc107; }

        .form-label-modern {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #8898aa;
            font-weight: 700;
            margin-bottom: 10px;
            display: block;
        }
        
        .input-group-modern {
            border: 2px solid #eaedf2;
            border-radius: 14px;
            background-color: #fbfcfd;
            transition: all 0.3s;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .input-group-modern:focus-within {
            border-color: #435ebe;
            background-color: #fff;
            box-shadow: 0 0 0 5px rgba(67, 94, 190, 0.1);
        }
        .input-group-text {
            border: none;
            background: transparent;
            color: #a0aec0;
            padding-left: 18px;
            padding-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .input-group-text i {
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 0;
        }
        .form-control-modern {
            border: none;
            padding: 14px 18px 14px 5px; 
            font-size: 1rem;
            background: transparent;
            font-weight: 500;
            color: #495057;
            width: 100%;
            display: flex;
            align-items: center;
        }
        .form-control-modern.no-icon {
            padding: 14px 18px;
        }
        .form-control-modern:focus {
            box-shadow: none;
        }
        
        .alert-modern {
            background-color: #ebf3ff;
            border: none;
            border-radius: 16px;
            color: #25396f;
            display: flex;
            align-items: center;
            padding: 1rem;
        }
        .alert-modern i {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            line-height: 0;
        }

        .btn-save {
            background: linear-gradient(90deg, #435ebe 0%, #25396f 100%);
            border: none;
            border-radius: 14px;
            padding: 16px;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.5px;
            box-shadow: 0 10px 25px rgba(67, 94, 190, 0.3);
            transition: all 0.3s ease;
            width: 100%;
        }
        .btn-save:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(67, 94, 190, 0.4);
            color: white;
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

            <div class="page-heading mb-4 px-3">
                <h3 style="font-weight: 800; color: #25396f; margin-bottom: 5px;">Pengaturan Akun</h3>
                <p class="text-muted" style="font-size: 1.05rem;">Kelola informasi profil dan keamanan akun Anda.</p>
            </div>

            <div class="page-content px-3">
                <div class="row">
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card card-modern" style="background: #f8f9fa;">
                            <div class="profile-header">
                                <div class="avatar-container">
                                    <div class="avatar-wrapper">
                                        <div class="avatar-content">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                    </div>
                                    <div class="status-badge" title="Status Aktif"></div>
                                </div>
                                <h4 class="text-white mb-1 fw-bold"><?= htmlspecialchars($user['username']) ?></h4>
                                <span class="badge bg-white text-primary rounded-pill px-3 py-2 mt-2 fw-bold" style="letter-spacing: 1px;">
                                    <?= strtoupper(htmlspecialchars($user['role'])) ?>
                                </span>
                            </div>
                            
                            <div class="status-grid">
                                <div class="status-card success">
                                    <div class="status-icon-wrapper">
                                        <i class="bi bi-shield-check"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block text-uppercase" style="font-size: 0.65rem; font-weight: 700; letter-spacing: 1px;">Keamanan</small>
                                        <span class="fw-bold text-dark fs-6">Aktif & Aman</span>
                                    </div>
                                </div>

                                <div class="status-card warning">
                                    <div class="status-icon-wrapper">
                                        <i class="bi bi-clock-fill"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block text-uppercase" style="font-size: 0.65rem; font-weight: 700; letter-spacing: 1px;">Aktivitas</small>
                                        <span class="fw-bold text-dark fs-6">Online</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-8 mb-4">
                        <div class="card card-modern">
                            <div class="card-header bg-transparent border-0 pt-5 px-5 pb-0">
                                <h5 class="fw-bold text-primary mb-0 d-flex align-items-center">
                                    <span class="bg-light-primary p-2 rounded-3 me-3"><i class="bi bi-pencil-square"></i></span>
                                    Edit Profil
                                </h5>
                            </div>
                            <div class="card-body px-5 py-4">
                                <form action="<?= BASE_URL ?>/editor/profile/update" method="POST">
                                    
                                    <div class="mb-5">
                                        <label class="form-label-modern">Username</label>
                                        <div class="input-group-modern">
                                            <input type="text" name="username" class="form-control form-control-modern no-icon" value="<?= htmlspecialchars($user['username']) ?>" required>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="fw-bold text-primary mb-0 me-3">Keamanan</h5>
                                        <div class="flex-grow-1 border-bottom"></div>
                                    </div>
                                    
                                    <div class="alert alert-modern mb-4">
                                        <div class="d-flex align-items-center w-100">
                                            <i class="bi bi-info-circle-fill text-primary fs-4 me-3 flex-shrink-0"></i>
                                            <div class="small fw-bold" style="line-height: 1.5;">
                                                Kosongkan kolom <span class="text-primary">Password Baru</span> jika Anda tidak ingin mengubah password saat ini.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label-modern">Password Baru</label>
                                            <div class="input-group input-group-modern">
                                                <span class="input-group-text">
                                                    <i class="bi bi-lock"></i>
                                                </span>
                                                <input type="password" name="new_password" class="form-control form-control-modern" placeholder="••••••••">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label-modern">Ulangi Password Baru</label>
                                            <div class="input-group input-group-modern">
                                                <span class="input-group-text">
                                                    <i class="bi bi-shield-lock"></i>
                                                </span>
                                                <input type="password" name="confirm_password" class="form-control form-control-modern" placeholder="••••••••">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label-modern text-danger">Konfirmasi Password Lama (Wajib)</label>
                                        <div class="input-group input-group-modern" style="border: 2px solid #ffcccc; background-color: #fff5f5;">
                                            <span class="input-group-text">
                                                <i class="bi bi-key-fill text-danger"></i>
                                            </span>
                                            <input type="password" name="current_password" class="form-control form-control-modern text-danger" required placeholder="Masukkan password saat ini..." style="color: #dc3545;">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn-save">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'footer.php'; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/js/main.js"></script>
    
    <script>
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
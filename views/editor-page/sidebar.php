<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
function isActive($uri, $path) {
    return strpos($uri, $path) !== false ? 'active' : '';
}
$is_dashboard = ($uri === '/pbl_semester3_lab_dt/editor' || $uri === '/pbl_semester3_lab_dt/editor/');
?>

<style>
    .logo {
        text-align: center !important;
        padding: 20px 0 !important;
    }

    .img-logo {
        width: 100% !important;
        max-width: 180px !important;
        height: auto !important;
        display: block !important;
        margin: 0 auto !important;
    }
</style>


<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= BASE_URL ?>/">
                        <img src="<?= BASE_URL ?>/public/assets-admin/images/logo/logo.png" alt="Logo" class="img-logo">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?= $is_dashboard ? 'active' : '' ?>">
                    <a href="<?= BASE_URL ?>/editor" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?= isActive($uri, '/editor/publikasi') ?>">
                    <a href="<?= BASE_URL ?>/editor/publikasi" class='sidebar-link'>
                        <i class="bi bi-journal-text"></i>
                        <span>Kelola Publikasi</span>
                    </a>
                </li>

                <li class="sidebar-item <?= isActive($uri, '/editor/berita') ?>">
                    <a href="<?= BASE_URL ?>/editor/berita" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i>
                        <span>Kelola Berita</span>
                    </a>
                </li>

                <li class="sidebar-title">Akun</li>

                <li class="sidebar-item <?= isActive($uri, '/editor/profile') ?>">
                    <a href="<?= BASE_URL ?>/editor/profile" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>Profil Saya</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?= BASE_URL ?>/logout" id="btn-logout" class="sidebar-link">
                        <i class="bi bi-power text-danger"></i>
                        <span class="text-danger">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const logoutBtn = document.getElementById('btn-logout');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            Swal.fire({
                title: 'Konfirmasi Logout',
                text: "Apakah Anda yakin ingin mengakhiri sesi ini?",
                icon: 'warning',
                width: 450,
                padding: '1.5em',
                color: '#333',
                background: '#fff',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#b6becb',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            });
        });
    }
</script>
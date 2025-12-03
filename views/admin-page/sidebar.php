<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
function isActive($uri, $path) {
    return strpos($uri, $path) !== false ? 'active' : '';
}
$is_dashboard = ($uri === '/pbl_semester3_lab_dt/admin' || $uri === '/pbl_semester3_lab_dt/admin/');
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= BASE_URL ?>/admin">
                        <img src="<?= BASE_URL ?>/public/assets-admin/images/logo/logo.png" alt="Logo" srcset="">
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-title">Utama</li>
                <li class="sidebar-item <?= $is_dashboard ? 'active' : '' ?>">
                    <a href="<?= BASE_URL ?>/admin" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?= isActive($uri, '/admin/kategori') ?>">
                    <a href="<?= BASE_URL ?>/admin/kategori" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i>
                        <span>Data Kategori</span>
                    </a>
                </li>

                <li class="sidebar-item <?= isActive($uri, '/admin/fasilitas') ?>">
                    <a href="<?= BASE_URL ?>/admin/fasilitas" class='sidebar-link'>
                        <i class="bi bi-display-fill"></i> <span>Fasilitas Lab</span>
                    </a>
                </li>

                <li class="sidebar-item <?= isActive($uri, '/admin/editor') ?>">
                    <a href="<?= BASE_URL ?>/admin/editor" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Akun Editor</span>
                    </a>
                </li>

                <li class="sidebar-item <?= isActive($uri, '/admin/member') ?>">
                    <a href="<?= BASE_URL ?>/admin/member" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Akun Member</span>
                    </a>
                </li>

                <li class="sidebar-item <?= isActive($uri, '/admin/berita') ?>">
                    <a href="<?= BASE_URL ?>/admin/berita" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i>
                        <span>Validasi Berita</span>
                    </a>
                </li>

                <li class="sidebar-item <?= isActive($uri, '/admin/publikasi') ?>">
                    <a href="<?= BASE_URL ?>/admin/publikasi" class='sidebar-link'>
                        <i class="bi bi-journal-check"></i>
                        <span>Validasi Publikasi</span>
                    </a>
                </li>

                <li class="sidebar-title">Keluar</li>
                <li class="sidebar-item">
                    <a href="<?= BASE_URL ?>/logout" id="btn-logout" class="sidebar-link">
                        <i class="bi bi-power text-danger"></i>
                        <span class="text-danger fw-bold">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>

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
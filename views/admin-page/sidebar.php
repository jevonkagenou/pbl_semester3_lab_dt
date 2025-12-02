<?php
$uri = $_SERVER['REQUEST_URI'];
$is_editor = strpos($uri, '/admin/editor') !== false;
$is_kategori = strpos($uri, '/admin/kategori') !== false;
$is_member = strpos($uri, '/admin/member') !== false;
$is_dashboard = (strpos($uri, '/admin') !== false) && !$is_editor && !$is_kategori && !$is_member;
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
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?= $is_dashboard ? 'active' : '' ?>">
                    <a href="<?= BASE_URL ?>/admin" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $is_editor ? 'active' : '' ?>">
                    <a href="<?= BASE_URL ?>/admin/editor" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Manajemen Editor</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $is_kategori ? 'active' : '' ?>">
                    <a href="<?= BASE_URL ?>/admin/kategori" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i>
                        <span>Kategori</span>
                    </a>
                </li>

                <li class="sidebar-item <?= $is_member ? 'active' : '' ?>">
                    <a href="<?= BASE_URL ?>/admin/member" class='sidebar-link'>
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Member</span>
                    </a>
                </li>

                <li class="sidebar-title">Akun</li>

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
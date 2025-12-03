<?php

function authMiddleware($allowedRoles = []) {
    if (session_status() == PHP_SESSION_NONE) session_start();

    if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
        header('Location: /pbl_semester3_lab_dt/login');
        exit;
    }

    if (!empty($allowedRoles)) {
        if (!in_array($_SESSION['user_role'], $allowedRoles)) {
            http_response_code(403);
            require_once __DIR__ . '/../views/errors/403.php'; 
            exit;
        }
    }
}

$router->add('GET', '/', 'PageController@index');
$router->add('GET', '/sejarah', 'PageController@sejarah');
$router->add('GET', '/blog', 'PageController@blog');
$router->add('GET', '/login', 'PageController@login');
$router->add('GET', '/tata-tertib', 'PageController@tataTertib');
$router->add('GET', '/struktur-organisasi', 'PageController@strukturOrganisasi');
$router->add('GET', '/visi-dan-misi', 'PageController@VisidanMisi');
$router->add('GET', '/sarana-prasarana', 'PageController@saranaPrasarana');
$router->add('GET', '/program-diploma-iv/ti', 'PageController@programDiplomaIVTI');
$router->add('GET', '/program-diploma-iv/sib', 'PageController@programDiplomaIVSIB');
$router->add('GET', '/aturan-akademik', 'PageController@aturanAkademik');
$router->add('GET', '/kalender', 'PageController@kalender');
$router->add('GET', '/penelitian', 'PageController@penelitian');

$router->add('POST', '/login-process', 'AuthController@loginProcess');
$router->add('GET', '/logout', 'AuthController@logout');


$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (strpos($requestUri, '/admin') !== false) {
    authMiddleware(['admin']);
    
    $router->add('GET', '/admin', 'PageController@adminDashboard');
    $router->add('GET', '/admin/editor', 'PageController@adminEditor');
    $router->add('GET', '/admin/kategori', 'PageController@adminKategori');
    $router->add('GET', '/admin/member', 'PageController@adminMember');
    $router->add('GET', '/admin/publikasi', 'PageController@adminPublikasi');
    $router->add('GET', '/admin/fasilitas', 'PageController@adminFasilitas');

    $router->add('POST', '/admin/editor/store', 'AdminController@storeEditor');
    $router->add('POST', '/admin/editor/update', 'AdminController@updateEditor');
    $router->add('GET', '/admin/editor/delete', 'AdminController@deleteEditor');

    $router->add('POST', '/admin/kategori/store', 'AdminController@storeKategori');
    $router->add('POST', '/admin/kategori/update', 'AdminController@updateKategori');
    $router->add('GET', '/admin/kategori/delete', 'AdminController@deleteKategori');

    $router->add('POST', '/admin/member/store', 'AdminController@storeMember');
    $router->add('POST', '/admin/member/update', 'AdminController@updateMember');
    $router->add('GET', '/admin/member/delete', 'AdminController@deleteMember');

    $router->add('GET', '/admin/publikasi/approve', 'AdminController@approvePublikasi');
    $router->add('GET', '/admin/publikasi/delete', 'AdminController@deletePublikasi');

    $router->add('GET', '/admin/publikasi/approve', 'AdminController@approvePublikasi');
    $router->add('POST', '/admin/publikasi/reject', 'AdminController@rejectPublikasi');
    $router->add('GET', '/admin/publikasi/delete', 'AdminController@deletePublikasi');

    $router->add('POST', '/admin/fasilitas/store', 'AdminController@storeFasilitas');
    $router->add('POST', '/admin/fasilitas/update', 'AdminController@updateFasilitas');
    $router->add('GET', '/admin/fasilitas/delete', 'AdminController@deleteFasilitas');
}

elseif (strpos($requestUri, '/editor') !== false) {
    authMiddleware(['editor']);

    $router->add('GET', '/editor', 'PageController@editorDashboard');

    $router->add('GET', '/editor/publikasi', 'PageController@editorPublikasi');

    $router->add('POST', '/editor/publikasi/store', 'EditorController@storePublikasi');
    $router->add('POST', '/editor/publikasi/update', 'EditorController@updatePublikasi');
    $router->add('GET', '/editor/publikasi/delete', 'EditorController@deletePublikasi');
}
<?php

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
$router->add('GET', '/admin', 'AdminController@index');
$router->add('GET', '/editor', 'EditorController@index');

$router->add('GET', '/admin/editor', 'PageController@editors');
$router->add('POST', '/admin/editor/store', 'AdminController@storeEditor');
$router->add('POST', '/admin/editor/update', 'AdminController@updateEditor');
$router->add('GET', '/admin/editor/delete', 'AdminController@deleteEditor');

$router->add('GET', '/admin/kategori', 'PageController@kategori');
$router->add('POST', '/admin/kategori/store', 'AdminController@storeKategori');
$router->add('POST', '/admin/kategori/update', 'AdminController@updateKategori');
$router->add('GET', '/admin/kategori/delete', 'AdminController@deleteKategori');

$router->add('GET', '/admin/member', 'PageController@member');
$router->add('POST', '/admin/member/store', 'AdminController@storeMember');
$router->add('POST', '/admin/member/update', 'AdminController@updateMember');
$router->add('GET', '/admin/member/delete', 'AdminController@deleteMember');
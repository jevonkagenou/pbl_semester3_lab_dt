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
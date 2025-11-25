<?php

$router->add('GET', '/', 'PageController@index');
$router->add('GET', '/sejarah', 'PageController@sejarah');
$router->add('GET', '/blog', 'PageController@blog');
$router->add('GET', '/login', 'PageController@login');
$router->add('GET', '/tata-tertib', 'PageController@tataTertib');
$router->add('GET', '/struktur-organisasi', 'PageController@strukturOrganisasi');
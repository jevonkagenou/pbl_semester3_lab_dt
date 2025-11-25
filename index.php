<?php

require_once 'core/Router.php';

$router = new Router();

require_once 'routes/web.php';
require_once 'config/app.php';
require_once 'config/database.php';
require_once 'core/Router.php';
$router->dispatch();
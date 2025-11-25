<?php

require_once 'core/View.php';

class ErrorController {

    public function notFound() {
        http_response_code(404);
        require_once 'views/errors/404.php';
    }

    public function forbidden() {
        http_response_code(403);
        require_once 'views/errors/403.php';
    }

    public function internalServer($exception = null) {
        http_response_code(500);
        require_once 'views/errors/500.php';
    }
}
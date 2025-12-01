<?php
require_once 'core/View.php';
require_once 'core/AuthMiddleware.php';

class EditorController {

    public function index() {
        AuthMiddleware::checkRole('editor');
        View::render('editor-page/dashboard');
    }
}
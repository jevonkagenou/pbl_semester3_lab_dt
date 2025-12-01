<?php
require_once 'core/View.php';
require_once 'core/AuthMiddleware.php';

class AdminController {
    public function index() {
        AuthMiddleware::checkRole('admin'); 
        View::render('admin-page/dashboard'); 
    }
}
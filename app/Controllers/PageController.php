<?php
// app/Controllers/PageController.php

require_once 'core/View.php';

class PageController {
    
    public function index() {
        View::render('index');
    }

    public function sejarah() {
        View::render('sejarah');
    }

    public function blog() {
        View::render('blog');
    }

    public function login() {
        View::render('login');
    }

    public function tataTertib() {
        View::render('tata-tertib');
    }
    
    public function strukturOrganisasi() {
        View::render('struktur-organisasi');
    }
}
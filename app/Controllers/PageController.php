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

    public function VisidanMisi() {
        View::render('visi-dan-misi');
    }
    public function SaranaPrasarana() {
        View::render('sarana-prasarana');
    }
    public function programDiplomaiv() {
        View::render('teknik-informatika');
    }
    public function aturanAkademik() {
        View::render('aturan-akademik');
    }
    public function kalender() {
        View::render('kalender');
    }
    public function penelitian() {
        View::render('penelitian');
    }
    
}
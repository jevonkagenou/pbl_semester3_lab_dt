<?php

require_once 'core/View.php';

class PageController {
    
    public function index() {
        View::render('landing-page/index');
    }

    public function sejarah() {
        View::render('landing-page/sejarah');
    }

    public function blog() {
        View::render('landing-page/blog');
    }

    public function login() {
        View::render('landing-page/login');
    }

    public function tataTertib() {
        View::render('landing-page/tata-tertib');
    }
    
    public function strukturOrganisasi() {
        View::render('landing-page/struktur-organisasi');
    }

    public function VisidanMisi() {
        View::render('landing-page/visi-dan-misi');
    }
    public function SaranaPrasarana() {
        View::render('landing-page/sarana-prasarana');
    }
    public function programDiplomaIVTI() {
        View::render('landing-page/teknik-informatika');
    }
    public function programDiplomaIVSIB() {
        View::render('landing-page/sistem-informasi-bisnis');
    }
    public function aturanAkademik() {
        View::render('landing-page/aturan-akademik');
    }
    public function kalender() {
        View::render('landing-page/kalender');
    }
    public function penelitian() {
        View::render('landing-page/penelitian');
    }
    
}
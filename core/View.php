<?php

class View {
    public static function render($viewPath, $data = []) {
        extract($data);
        
        require_once 'views/landing-page/' . $viewPath . '.php';
    }
}
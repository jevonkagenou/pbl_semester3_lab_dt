<?php

require_once 'core/View.php';

class AuthMiddleware {

    public static function checkRole($allowedRole) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $basePath = '/pbl_semester3_lab_dt';

        if (!isset($_SESSION['user_logged_in'])) {
            header("Location: $basePath/login");
            exit;
        }

        $currentUserRole = $_SESSION['user_role'] ?? '';

        if ($currentUserRole !== $allowedRole) {
            http_response_code(403);
            View::render('errors/403');
            exit(); 
        }
    }
}
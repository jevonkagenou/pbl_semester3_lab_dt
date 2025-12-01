<?php

require_once 'app/Models/User.php'; 

class AuthController {

    public function loginProcess() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? ''; 

        $username = trim($username);
        $password = trim($password);

        $userModel = new User();
        $user = $userModel->getByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_role'] = $user['role'];

            $basePath = '/pbl_semester3_lab_dt'; 

            if ($user['role'] === 'admin') {
                header("Location: $basePath/admin");
                exit;
            } elseif ($user['role'] === 'editor') {
                header("Location: $basePath/editor");
                exit;
            } else {
                header("Location: $basePath/");
                exit;
            }

        } else {
            $basePath = '/pbl_semester3_lab_dt';
            header("Location: $basePath/login?error=invalid");
            exit;
        }
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        
        header('Location: /pbl_semester3_lab_dt/');
        exit;
    }
}
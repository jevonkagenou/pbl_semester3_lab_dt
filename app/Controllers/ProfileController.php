<?php
require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../Models/User.php'; 

use App\Models\User;

class ProfileController {

    public function indexAdmin() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $userModel = new User();
        $user = $userModel->getById($_SESSION['user_id']);
        
        require_once __DIR__ . '/../../views/admin-page/profile.php';
    }

    public function indexEditor() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $userModel = new User();
        $user = $userModel->getById($_SESSION['user_id']);
        
        require_once __DIR__ . '/../../views/editor-page/profile.php';
    }

    public function update() {
        if (session_status() == PHP_SESSION_NONE) session_start();
        
        $id = $_SESSION['user_id'];
        $username = trim($_POST['username']);
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        $userModel = new User();

        if (!$userModel->verifyPassword($id, $currentPassword)) {
            $_SESSION['flash_message'] = "Password lama salah!";
            $_SESSION['flash_type'] = "error";
            $this->redirectBack();
            return;
        }

        if (!empty($newPassword)) {
            if ($newPassword !== $confirmPassword) {
                $_SESSION['flash_message'] = "Konfirmasi password baru tidak cocok!";
                $_SESSION['flash_type'] = "error";
                $this->redirectBack();
                return;
            }
            $userModel->updateProfile($id, $username, $newPassword);
        } else {
            $userModel->updateProfile($id, $username);
        }

        $_SESSION['username'] = $username;

        $_SESSION['flash_message'] = "Profil berhasil diperbarui!";
        $_SESSION['flash_type'] = "success";
        $this->redirectBack();
    }

    private function redirectBack() {
        if ($_SESSION['user_role'] === 'admin') {
            header('Location: /pbl_semester3_lab_dt/admin/profile');
        } else {
            header('Location: /pbl_semester3_lab_dt/editor/profile');
        }
        exit;
    }
}
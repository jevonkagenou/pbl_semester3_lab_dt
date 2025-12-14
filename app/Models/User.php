<?php
namespace App\Models;

use PDO;

class User {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $database = new \Database();
        $this->db = $database->getConnection();
    }

    public function getEditorStats() {
        $query = "SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'aktif' THEN 1 ELSE 0 END) as active,
                    SUM(CASE WHEN status = 'dinonaktifkan' THEN 1 ELSE 0 END) as inactive
                  FROM users 
                  WHERE role = 'editor'";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getEditors() {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE role = 'editor' ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createEditor($data) {
        $query = "INSERT INTO users (username, password, role, status) VALUES (:username, :password, :role, :status)";
        $stmt = $this->db->prepare($query);
        
        $params = [
            ':username' => $data['username'],
            ':password' => password_hash($data['password'], PASSWORD_BCRYPT),
            ':role'     => 'editor',
            ':status'   => 'aktif'
        ];

        return $stmt->execute($params);
    }

    public function updateEditor($data) {
        if (!empty($data['password'])) {
            $query = "UPDATE users SET username = :username, password = :password, status = :status WHERE id = :id";
            $params = [
                ':username' => $data['username'],
                ':password' => password_hash($data['password'], PASSWORD_BCRYPT),
                ':status'   => $data['status'],
                ':id'       => $data['id']
            ];
        } else {
            $query = "UPDATE users SET username = :username, status = :status WHERE id = :id";
            $params = [
                ':username' => $data['username'],
                ':status'   => $data['status'],
                ':id'       => $data['id']
            ];
        }

        $stmt = $this->db->prepare($query);
        return $stmt->execute($params);
    }

    public function deleteEditor($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function getByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword($id, $inputPassword) {
        $user = $this->getById($id);
        if ($user && password_verify($inputPassword, $user['password'])) {
            return true;
        }
        return false;
    }

    public function updateProfile($id, $username, $newPassword = null) {
        if ($newPassword) {
            $query = "UPDATE users SET username = :username, password = :password WHERE id = :id";
            $params = [
                ':username' => $username,
                ':password' => password_hash($newPassword, PASSWORD_BCRYPT),
                ':id' => $id
            ];
        } else {
            $query = "UPDATE users SET username = :username WHERE id = :id";
            $params = [
                ':username' => $username,
                ':id' => $id
            ];
        }
        $stmt = $this->db->prepare($query);
        return $stmt->execute($params);
    }
}
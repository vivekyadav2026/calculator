<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findUserByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        return $row;
    }

    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updatePassword($id, $new_password_hash) {
        $this->db->query('UPDATE users SET password_hash = :password WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':password', $new_password_hash);
        
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

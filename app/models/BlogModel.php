<?php
class BlogModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query('SELECT * FROM blogs ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function getPostBySlug($slug) {
        $this->db->query('SELECT * FROM blogs WHERE slug = :slug');
        $this->db->bind(':slug', $slug);
        return $this->db->single();
    }
}

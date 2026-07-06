<?php
class SeoModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllSeoSettings() {
        $this->db->query('SELECT * FROM seo_settings ORDER BY page_title ASC');
        return $this->db->resultSet();
    }

    public function getSeoByPageKey($page_key) {
        $this->db->query('SELECT * FROM seo_settings WHERE page_key = :page_key');
        $this->db->bind(':page_key', $page_key);
        return $this->db->single();
    }

    public function updateSeoSettings($data) {
        $this->db->query('UPDATE seo_settings SET 
            meta_title = :meta_title, 
            meta_description = :meta_description, 
            meta_keywords = :meta_keywords, 
            og_title = :og_title, 
            og_description = :og_description 
            WHERE page_key = :page_key');
            
        $this->db->bind(':meta_title', $data['meta_title']);
        $this->db->bind(':meta_description', $data['meta_description']);
        $this->db->bind(':meta_keywords', $data['meta_keywords']);
        $this->db->bind(':og_title', $data['og_title']);
        $this->db->bind(':og_description', $data['og_description']);
        $this->db->bind(':page_key', $data['page_key']);

        return $this->db->execute();
    }
}

<?php
class CalculatorModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCalculators() {
        $this->db->query('SELECT * FROM calculators ORDER BY name ASC');
        return $this->db->resultSet();
    }

    public function getCalculatorById($id) {
        $this->db->query('SELECT * FROM calculators WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateCalculator($data) {
        $this->db->query('UPDATE calculators SET 
            name = :name, 
            description = :description, 
            status = :status 
            WHERE id = :id');
            
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    }
}

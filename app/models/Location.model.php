<?php

// CREATE TABLE Location (
//     id int PRIMARY KEY AUTO_INCREMENT,
//     name varchar(32) NOT NULL
//   );

class Location extends BaseModel {
    private $db; //pdo database object

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get a location by ID
     * @param id The id of the location
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM Location WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all locations
     */
    public function getAll() {
        $this->db->query("SELECT * FROM Location");
        return $this->db->resultSet();
    }

    /**
     * Create a new location
     * @param data The data of the location
     */
    public function createLocation($data) {
        $this->db->query("INSERT INTO Location (name) VALUES (:name)");
        $this->db->bind(':name', $data['name']);
        return $this->db->execute();
    }

    /**
     * Update a location
     * @param data The data of the location
     */
    public function updateLocation($data) {
        $this->db->query("UPDATE Location SET name = :name WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        return $this->db->execute();
    }

    /**
     * Delete a location
     * @param id The id of the location
     */
    public function deleteLocation($id) {
        $this->db->query("DELETE FROM Location WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
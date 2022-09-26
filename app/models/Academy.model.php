<?php

// CREATE TABLE Academy (
//     id int PRIMARY KEY AUTO_INCREMENT,
//     name varchar(32) NOT NULL,
//     locationId int NOT NULL
//   );

class Academy extends BaseModel {
    private $db; //pdo database object

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get an academy by ID
     * @param id The id of the academy
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM Academy WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all academies
     */
    public function getAll() {
        $this->db->query("SELECT * FROM Academy");
        return $this->db->resultSet();
    }

    /**
     * Create a new academy
     * @param data The data of the academy
     */
    public function createAcademy($data) {
        $this->db->query("INSERT INTO Academy (name, locationId) VALUES (:name, :locationId)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':locationId', $data['locationId']);
        return $this->db->execute();
    }

    /**
     * Update an academy
     * @param data The data of the academy
     */
    public function updateAcademy($data) {
        $this->db->query("UPDATE Academy SET name = :name, locationId = :locationId WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':locationId', $data['locationId']);
        return $this->db->execute();
    }

    /**
     * Delete an academy
     * @param id The id of the academy
     */
    public function deleteAcademy($id) {
        $this->db->query("DELETE FROM Academy WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    /**
     * Get all academies by location
     * @param locationId The id of the location
     */
    public function getByLocation($locationId) {
        $this->db->query("SELECT * FROM Academy WHERE locationId = :locationId");
        $this->db->bind(':locationId', $locationId);
        return $this->db->resultSet();
    }

}
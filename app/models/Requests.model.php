<?php

// CREATE TABLE Requests (
//     id int PRIMARY KEY AUTO_INCREMENT,
//     warehouseId int NOT NULL,
//     returnDate date NOT NULL
//   );

class Requests extends BaseModel {
    private $db; //pdo database object

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get a request by ID
     * @param id The id of the request
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM Requests WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all requests
     */
    public function getAll() {
        $this->db->query("SELECT * FROM Requests");
        return $this->db->resultSet();
    }

    /**
     * Create a new request
     * @param data The data of the request
     */
    public function createRequest($data) {
        $this->db->query("INSERT INTO Requests (warehouseId, returnDate) VALUES (:warehouseId, :returnDate)");
        $this->db->bind(':warehouseId', $data['warehouseId']);
        $this->db->bind(':returnDate', $data['returnDate']);
        return $this->db->execute();
    }

    /**
     * Update a request
     * @param data The data of the request
     */
    public function updateRequest($data) {
        $this->db->query("UPDATE Requests SET warehouseId = :warehouseId, returnDate = :returnDate WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':warehouseId', $data['warehouseId']);
        $this->db->bind(':returnDate', $data['returnDate']);
        return $this->db->execute();
    }

    /**
     * Delete a request
     * @param id The id of the request
     */
    public function deleteRequest($id) {
        $this->db->query("DELETE FROM Requests WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
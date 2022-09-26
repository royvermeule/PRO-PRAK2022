<?php

// CREATE TABLE WarehouseAcademy (
//     warehouseId int NOT NULL, 
//     academyId int NOT NULL
//   );

class WarehouseAcademy extends BaseModel {
    private $db; //pdo database object

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get a warehouseAcademy by ID
     * @param id The id of the warehouseAcademy
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM WarehouseAcademy WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all warehouseAcademies
     */
    public function getAll() {
        $this->db->query("SELECT * FROM WarehouseAcademy");
        return $this->db->resultSet();
    }

    /**
     * Create a new warehouseAcademy
     * @param data The data of the warehouseAcademy
     */
    public function createWarehouseAcademy($data) {
        $this->db->query("INSERT INTO WarehouseAcademy (warehouseId, academyId) VALUES (:warehouseId, :academyId)");
    }

    /**
     * Update a warehouseAcademy
     * @param data The data of the warehouseAcademy
     */
    public function updateWarehouseAcademy($data) {
        $this->db->query("UPDATE WarehouseAcademy SET warehouseId = :warehouseId, academyId = :academyId WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':warehouseId', $data['warehouseId']);
        $this->db->bind(':academyId', $data['academyId']);
        return $this->db->execute();
    }

    /**
     * Delete a warehouseAcademy
     * @param id The id of the warehouseAcademy
     */
    public function deleteWarehouseAcademy($id) {
        $this->db->query("DELETE FROM WarehouseAcademy WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // get all academies by warehouseId

    /**
     * Get all Academies by warehouseId
     * @param warehouseId The id of the academy
     */
    public function getAcademiesByWarehouseId($warehouseId) {
        $this->db->query("SELECT * FROM WarehouseAcademy WHERE warehouseId = :warehouseId");
        $this->db->bind(':warehouseId', $warehouseId);
        return $this->db->resultSet();
    }

    /**
     * Get all warehouses by AcademyId
     * @param academyId The id of the academy
     */
    public function getWarehousesByAcademyId($academyId) {
        $this->db->query("SELECT * FROM WarehouseAcademy WHERE academyId = :academyId");
        $this->db->bind(':academyId', $academyId);
        return $this->db->resultSet();
    }
}

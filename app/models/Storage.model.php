<?php

// CREATE TABLE Storage (
//     id int PRIMARY KEY AUTO_INCREMENT,
//     warehouseId int NOT NULL,
//     articleId int NOT NULL,
//     amount int NOT NULL
//   );
  
Class Storage extends BaseModel {
    private $db; //pdo database object

    public function __construct(Database $DB = new Database()) {
        $this->db = $DB;
    }

    /**
     * Get a storage by ID
     * @param id The id of the storage
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM Storage WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all storages
     */
    public function getAll() {
        $this->db->query("SELECT * FROM Storage");
        return $this->db->resultSet();
    }

    /**
     * Create a new storage
     * @param data The data of the storage
     */
    public function createStorage($data) {
        $this->db->query("INSERT INTO Storage (warehouseId, articleId, amount) VALUES (:warehouseId, :articleId, :amount)");
        $this->db->bind(':warehouseId', $data['warehouseId']);
        $this->db->bind(':articleId', $data['articleId']);
        $this->db->bind(':amount', $data['amount']);
        return $this->db->execute();
    }

    /**
     * Update a storage
     * @param data The data of the storage
     */
    public function updateStorage($data) {
        $this->db->query("UPDATE Storage SET warehouseId = :warehouseId, articleId = :articleId, amount = :amount WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':warehouseId', $data['warehouseId']);
        $this->db->bind(':articleId', $data['articleId']);
        $this->db->bind(':amount', $data['amount']);
        return $this->db->execute();
    }

    /**
     * Delete a storage
     * @param id The id of the storage
     */
    public function deleteStorage($id) {
        $this->db->query("DELETE FROM Storage WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
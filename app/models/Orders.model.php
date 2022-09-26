<?php

// CREATE TABLE Orders (
//     id int PRIMARY KEY AUTO_INCREMENT,
//     userId int NOT NULL,
//     warehouseId int NOT NULL,
//     accepted boolean NOT NULL DEFAULT false
//   );

class Orders extends BaseModel {
    private $db; //pdo database object

    public function __construct(Database $DB = new Database()) {
        $this->db = $DB;
    }

    /**
     * Get an order by ID
     * @param id The id of the order
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM Orders WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all orders
     */
    public function getAll() {
        $this->db->query("SELECT * FROM Orders");
        return $this->db->resultSet();
    }

    /**
     * Create a new order
     * @param data The data of the order
     */
    public function createOrder($data) {
        $this->db->query("INSERT INTO Orders (userId, warehouseId) VALUES (:userId, :warehouseId)");
        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':warehouseId', $data['warehouseId']);
        return $this->db->execute();
    }

    /**
     * Update an order
     * @param data The data of the order
     */
    public function updateOrder($data) {
        $this->db->query("UPDATE Orders SET userId = :userId, warehouseId = :warehouseId, accepted = :accepted WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':warehouseId', $data['warehouseId']);
        $this->db->bind(':accepted', $data['accepted']);
        return $this->db->execute();
    }

    /**
     * Delete an order
     * @param id The id of the order
     */
    public function deleteOrder($id) {
        $this->db->query("DELETE FROM Orders WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    /**
     * Get all orders by user
     * @param userId The id of the user
     */
    public function getAllByUser($userId) {
        $this->db->query("SELECT * FROM Orders WHERE userId = :userId");
        $this->db->bind(':userId', $userId);
        return $this->db->resultSet();
    }
}
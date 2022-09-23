<?php
// CREATE TABLE Warehouse (
//     id int PRIMARY KEY AUTO_INCREMENT,
//     name varchar(32) NOT NULL,
//     userId int NOT NULL
//   );
  
class Warehouse extends BaseModel {
    private $db; //pdo database object

    public function __construct(Database $DB = new Database()) {
        $this->db = $DB;
    }

    /**
     * Get a warehouse by ID
     * @param id The id of the warehouse
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM Warehouse WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all warehouses
     */
    public function getAll() {
        $this->db->query("SELECT * FROM Warehouse");
        return $this->db->resultSet();
    }

    /**
     * Create a new warehouse
     * @param data The data of the warehouse
     */
    public function createWarehouse($data) {
        $this->db->query("INSERT INTO Warehouse (name, userId) VALUES (:name, :userId)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':userId', $data['userId']);
        return $this->db->execute();
    }

    /**
     * Update a warehouse
     * @param data The data of the warehouse
     */
    public function updateWarehouse($data) {
        $this->db->query("UPDATE Warehouse SET name = :name, userId = :userId WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':userId', $data['userId']);
        return $this->db->execute();
    }

    /**
     * Delete a warehouse
     * @param id The id of the warehouse
     */
    public function deleteWarehouse($id) {
        $this->db->query("DELETE FROM Warehouse WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    /**
     * Get all warehouses by user ID
     * @param userId The id of the user
     */
    public function getAllByUserId($userId) {
        $this->db->query("SELECT * FROM Warehouse WHERE userId = :userId");
        $this->db->bind(':userId', $userId);
        return $this->db->resultSet();
    }

}
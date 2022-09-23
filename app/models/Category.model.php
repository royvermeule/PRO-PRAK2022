<?php
// CREATE TABLE Category (
//     id int PRIMARY KEY AUTO_INCREMENT,
//     name varchar(32) NOT NULL,
//     parentId int
//   );
class Category extends BaseModel {
    private $db; //pdo database object

    public function __construct(Database $DB = new Database()) {
        $this->db = $DB;
    }

    /**
     * Get a category by ID
     * @param id The id of the category
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM Category WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all categories
     */
    public function getAll() {
        $this->db->query("SELECT * FROM Category");
        return $this->db->resultSet();
    }

    /**
     * Create a new category
     * @param data The data of the category
     */
    public function createCategory($data) {
        $this->db->query("INSERT INTO Category (name, parentId) VALUES (:name, :parentId)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':parentId', $data['parentId']);
        return $this->db->execute();
    }

    /**
     * Update a category
     * @param data The data of the category
     */
    public function updateCategory($data) {
        $this->db->query("UPDATE Category SET name = :name, parentId = :parentId WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':parentId', $data['parentId']);
        return $this->db->execute();
    }

    /**
     * Delete a category
     * @param id The id of the category
     */
    public function deleteCategory($id) {
        $this->db->query("DELETE FROM Category WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
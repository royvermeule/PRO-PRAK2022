<?php
class Article extends BaseModel {
    private $db; //pdo database object

    public function __construct(Database $DB = new Database()) {
        $this->db = $DB;
    }

    /**
     * Get an article by ID
     * @param id The id of the article
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM Article WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all articles
     */
    public function getAll() {
        $this->db->query("SELECT * FROM Article");
        return $this->db->resultSet();
    }

    /**
     * Create a new article
     * @param data The data of the article
     */
    public function createArticle($data) {
        $this->db->query("INSERT INTO Article (name, description, price, categoryId) VALUES (:name, :description, :price, :categoryId)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':categoryId', $data['categoryId']);
        return $this->db->execute();
    }

    /**
     * Update an article
     * @param data The data of the article
     */
    public function updateArticle($data) {
        $this->db->query("UPDATE Article SET name = :name, description = :description, price = :price, categoryId = :categoryId WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':categoryId', $data['categoryId']);
        return $this->db->execute();
    }

    /**
     * Delete an article
     * @param id The id of the article
     */
    public function deleteArticle($id) {
        $this->db->query("DELETE FROM Article WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

}
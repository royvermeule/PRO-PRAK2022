<?php

// CREATE TABLE OrderArticle (
//     orderId int NOT NULL,
//     articleId int NOT NULL,
//     amount int NOT NULL DEFAULT 1
//   );

class OrderArticle extends BaseModel {
    private $db; //pdo database object

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get an orderArticle by ID
     * @param id The id of the orderArticle
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM OrderArticle WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all orderArticles
     */
    public function getAll() {
        $this->db->query("SELECT * FROM OrderArticle");
        return $this->db->resultSet();
    }

    /**
     * Create a new orderArticle
     * @param data The data of the orderArticle
     */
    public function createOrderArticle($data) {
        $this->db->query("INSERT INTO OrderArticle (orderId, articleId, amount) VALUES (:orderId, :articleId, :amount)");
        $this->db->bind(':orderId', $data['orderId']);
        $this->db->bind(':articleId', $data['articleId']);
        $this->db->bind(':amount', $data['amount']);
        return $this->db->execute();
    }

    /**
     * Update an orderArticle
     * @param data The data of the orderArticle
     */
    public function updateOrderArticle($data) {
        $this->db->query("UPDATE OrderArticle SET orderId = :orderId, articleId = :articleId, amount = :amount WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':orderId', $data['orderId']);
        $this->db->bind(':articleId', $data['articleId']);
        $this->db->bind(':amount', $data['amount']);
        return $this->db->execute();
    }

    /**
     * Delete an orderArticle
     * @param id The id of the orderArticle
     */
    public function deleteOrderArticle($id) {
        $this->db->query("DELETE FROM OrderArticle WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    /**
     * Get all orderArticles by order ID
     * @param id The id of the orderArticle
     */
    public function getAllByOrderId($id) {
        $this->db->query("SELECT * FROM OrderArticle WHERE orderId = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    /**
     * Get all orderArticles by article ID
     * @param id The id of the orderArticle
     */
    public function getAllByArticleId($id) {
        $this->db->query("SELECT * FROM OrderArticle WHERE articleId = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }
    
}
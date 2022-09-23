<?php

// CREATE TABLE RequestArticle (
//     id int PRIMARY KEY AUTO_INCREMENT,
//     requestId int NOT NULL,
//     articleId int NOT NULL,
//     amount int NOT NULL DEFAULT 1
//   );
  
class RequestArticle extends BaseModel {
    private $db; //pdo database object

    public function __construct(Database $DB = new Database()) {
        $this->db = $DB;
    }

    /**
     * Get a requestArticle by ID
     * @param id The id of the requestArticle
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM RequestArticle WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get all requestArticles
     */
    public function getAll() {
        $this->db->query("SELECT * FROM RequestArticle");
        return $this->db->resultSet();
    }

    /**
     * Create a new requestArticle
     * @param data The data of the requestArticle
     */
    public function createRequestArticle($data) {
        $this->db->query("INSERT INTO RequestArticle (requestId, articleId, amount) VALUES (:requestId, :articleId, :amount)");
        $this->db->bind(':requestId', $data['requestId']);
        $this->db->bind(':articleId', $data['articleId']);
        $this->db->bind(':amount', $data['amount']);
        return $this->db->execute();
    }

    /**
     * Update a requestArticle
     * @param data The data of the requestArticle
     */
    public function updateRequestArticle($data) {
        $this->db->query("UPDATE RequestArticle SET requestId = :requestId, articleId = :articleId, amount = :amount WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':requestId', $data['requestId']);
        $this->db->bind(':articleId', $data['articleId']);
        $this->db->bind(':amount', $data['amount']);
        return $this->db->execute();
    }

    /**
     * Delete a requestArticle
     * @param id The id of the requestArticle
     */
    public function deleteRequestArticle($id) {
        $this->db->query("DELETE FROM RequestArticle WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    /**
     * Get all requestArticles by request ID
     * @param requestId The id of the request
     */
    public function getAllByRequestId($requestId) {
        $this->db->query("SELECT * FROM RequestArticle WHERE requestId = :requestId");
        $this->db->bind(':requestId', $requestId);
        return $this->db->resultSet();
    }

    /**
     * Get all requestArticles by article ID
     * @param articleId The id of the article
     */
    public function getAllByArticleId($articleId) {
        $this->db->query("SELECT * FROM RequestArticle WHERE articleId = :articleId");
        $this->db->bind(':articleId', $articleId);
        return $this->db->resultSet();
    }
}
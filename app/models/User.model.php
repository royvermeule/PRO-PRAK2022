<?php

class User extends BaseModel {
    private $db; //pdo database object

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get a user by ID
     * @param id The id of the user
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM User WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    /**
     * Get a user by email
     * @param email The email of the user
     */
    public function getByEmail($email) {
        $this->db->query("SELECT * FROM User WHERE email = :email");
        $this->db->bind(':email', $email, PDO::PARAM_STR);
        return $this->db->single();
    }

    /**
     * Get all User
     */
    public function getAll() {
        $this->db->query("SELECT * FROM User");
        return $this->db->resultSet();
    }

    /**
     * Create a new user
     * @param data The data of the user
     */
    public function createUser($data) {
        $this->db->query("INSERT INTO User (email, password, userrole) VALUES (:email, :password, :userrole)");
        $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $this->db->bind(':password', $data['password'], PDO::PARAM_STR);
        $this->db->bind(':userrole', $data['userrole'], PDO::PARAM_STR);
        return $this->db->execute();
    }

    /**
     * Update a user
     * @param data The data of the user
     */
    public function updateUser($data) {
        $this->db->query("UPDATE User SET email = :email, password = :password, userrole = :userrole WHERE id = :id");
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
        $this->db->bind(':email', $data['email'], PDO::PARAM_STR);
        $this->db->bind(':password', $data['password'], PDO::PARAM_STR);
        $this->db->bind(':userrole', $data['userrole'], PDO::PARAM_STR);
        return $this->db->execute();
    }

    /**
     * Delete a user
     * @param id The id of the user
     */
    public function deleteUser($id) {
        $this->db->query("DELETE FROM User WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->execute();
    }
}
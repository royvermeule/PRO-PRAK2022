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
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    /**
     * Get a user by email
     * @param email The email of the user
     */
    public function getByEmail($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    /**
     * Get all users
     */
    public function getAll() {
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }

    /**
     * Create a new user
     * @param data The data of the user
     */
    public function createUser($data) {
        $this->db->query("INSERT INTO users (email, password, userrole) VALUES (:email, :password, :userrole)");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':userrole', $data['userrole']);
        return $this->db->execute();
    }

    /**
     * Update a user
     * @param data The data of the user
     */
    public function updateUser($data) {
        $this->db->query("UPDATE users SET email = :email, password = :password, userrole = :userrole WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':userrole', $data['userrole']);
        return $this->db->execute();
    }

    /**
     * Delete a user
     * @param id The id of the user
     */
    public function deleteUser($id) {
        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
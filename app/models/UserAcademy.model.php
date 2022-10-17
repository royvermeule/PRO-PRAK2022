<?php



class UserAcademy extends BaseModel {
    private $db; //pdo database object

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Get a UserAcademy by ID
     * @param id The id of the UserAcademy
     */
    public function getById($id) {
        $this->db->query("SELECT * FROM UserAcademy WHERE id = :id");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    /**
     * Get all UserAcademy
     */
    public function getAll() {
        $this->db->query("SELECT * FROM UserAcademy");
        return $this->db->resultSet();
    }

    /**
     * Create a new UserAcademy
     * @param data The data of the UserAcademy
     */
    public function createUserAcademy($data) {
        $this->db->query("INSERT INTO UserAcademy (warehouseId, academyId) VALUES (:warehouseId, :academyId)");
    }

    /**
     * Update a UserAcademy
     * @param data The data of the UserAcademy
     */
    public function updateUserAcademy($data) {
        $this->db->query("UPDATE UserAcademy SET userId = :userId, academyId = :academyId WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':academyId', $data['academyId']);
        return $this->db->execute();
    }

    /**
     * Delete a UserAcademy
     * @param id The id of the UserAcademy
     */
    public function deleteUserAcademy($id) {
        $this->db->query("DELETE FROM UserAcademy WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // get all academies by userId

    /**
     * Get all Academies by userId
     * @param userId The id of the academy
     */
    public function getAcademiesByUserId($academyId) {
        $this->db->query("SELECT * FROM UserAcademy WHERE academyId = :academyId");
        $this->db->bind(':academyId', $academyId);
        return $this->db->resultSet();
    }

    /**
     * Get all warehouses by AcademyId
     * @param academyId The id of the academy
     */
    public function getUserByAcademyId($academyId) {
        $this->db->query("SELECT * FROM UserAcademy WHERE academyId = :academyId");
        $this->db->bind(':academyId', $academyId);
        return $this->db->resultSet();
    }
}

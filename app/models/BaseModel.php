<?php

Class BaseModel {
    private $db;

    public function __construct(Database $DB = new Database()) {
        $this->db = $DB;
    }

}
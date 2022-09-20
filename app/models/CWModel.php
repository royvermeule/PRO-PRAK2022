<?php
    class CWModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
    }
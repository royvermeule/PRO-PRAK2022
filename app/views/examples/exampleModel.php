<?php
    class exampleModel 
    {
        private Database $db;

        public function __construct($db = new Database)
        {
            $this->db = $db;
        }
    }
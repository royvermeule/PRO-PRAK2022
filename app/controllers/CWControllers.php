<?php
    class CWControllers extends Controller
    {
        
        public function __construct()
        {
            //refers to the model.
            $this->cwModel = $this->model('CWModel');
        }

        public function index()
        {
            $data = [
                'title' => 'Warehouses'
            ];
            $this->view('ChooseW/index', $data);
        }
    }
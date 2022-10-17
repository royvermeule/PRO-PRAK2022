<?php

class Warehouse extends Controller{
    public function index() {
        session_start();
        $id = $_GET['id'];
        $user = $_SESSION['user'];

        $warehouse = new Warehouse();
        $dataWarehouse = $warehouse->getById($id);
        
        

        $storage = new Storage();
        $dataStorage = $storage->getByWarehouseId($id);
        $data = [
        'title' => "Warehouse"
        ];
        $this->view('warehouse/index', $data);
    }
}
?>
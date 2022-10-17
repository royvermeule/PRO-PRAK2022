<?php
    class CWControllers extends Controller
    {
        
        private $db;
        
        public function __construct()
        {
            $this->db = new Database();
            // $this->id = $_GET['id'];
            // $id = $_GET['id'];
            
            //refers to the model.
            $this->cwModel = $this->model('CWModel');
            //var_dump($this->getAll());
        }

        public function getAll()
        {
            $this->db->query("SELECT * FROM warehouse");
            return $this->db->resultSet();
        }

        public function warehouseAuth($currentWarehouseId) 
        {   

            // sessie opvragen en data zetten als je inlogt
            // print_r($_SESSION['user']) ;
            $userid = $_SESSION["user"]->id;
            $academyID = $this->db->query("SELECT `academyId` FROM useracademy WHERE `userId` = :id");
            $this->db->bind(':id', $userid); // 1 veranderen naar je sessie user id
            $academyID = $this->db->resultSet();

            $sqlToev = "";
            foreach($academyID as $k => $v){
                $sqlToev .= empty($sqlToev) ? "academyId = '".$v->academyId."'" : " or academyId = '".$v->academyId."'";
            }

            $warehouseId = $this->db->query("SELECT `warehouseId` FROM `warehouseacademy` WHERE $sqlToev");
            $warehouseId = $this->db->resultSet();
            
            $mapping = array();

            foreach($warehouseId as $k => $v) {
                array_push($mapping, $v->warehouseId);
            }

            if(in_array($currentWarehouseId, $mapping)){
                $this->view('warehouse/' . $currentWarehouseId);
            }else {
                return true;
                header("Location: /CWControllers/");
            }
        }

        public function generateOverview($id) {

            if($this->warehouseAuth($id)) {
                echo '<div class="alert">Deze pagina bestaat niet of geen rechten!</div>';
                header( "refresh:4;url=http://www.pro-magazijn.com/CWControllers" );
            }

        }
        public function index()
        {            
            $data = [
                'title' => 'Warehouses',
                'warehouses' => $this->getAll()
            ];
            $this->view('warehouse/index', $data);
        }
    }
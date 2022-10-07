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
        private function alert(){
            $this->alert("Dit bestaat niet");
            $this->view('warehouse/index', );
            exit;
        }
        public function getAll()
        {
            $this->db->query("SELECT * FROM warehouse");
            return $this->db->resultSet();
        }
        public function overview($id) {
            
            if($id == 1 ){
                $this->view('warehouse/1');
                        }
            elseif($id == 2){
                $this->view('warehouse/2');
            }
            elseif($id == 3){
                $this->view('warehouse/3');
            }
            else{
                //ob_start();
                echo '<div class="alert">Deze pagina bestaat niet!</div>';
                // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                header( "refresh:4;url=http://www.pro-magazijn.com/CWControllers" );
                // die;
                // ob_flush();
                
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
<?php
class Dashboards extends Controller
{
    public function __construct()
    {
        $this->acaModel = $this->model('Academy');
    }

    public function index()
    {
        $data = [
            'title' => 'Kies jouw dashboard'
        ];
        $this->view('dashboards/index', $data);
    }

    public function student()
    {
        $data = [
            'title' => 'Jouw Dashboard'
        ];
        $this->view('dashboards/student', $data);
    }
}

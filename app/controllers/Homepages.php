<?php
class HomePages extends Controller
{

  public function index()
  {
    $data = [
      'title' => "Homepage"
    ];
    $this->view('register/index', $data);
  }
}

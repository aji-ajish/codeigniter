<?php 

class AutoComplete extends  CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('autoComplete_model');
    }
    public function index()
    {
       $this->load->view('autocomplete');
    }
    public function country()
    {
       $query=$this->input->get('query');
       $country=$this->autoComplete_model->getCounry($query);
       echo json_encode($country);
    
    }
}
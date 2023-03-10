<?php 

class Authors extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('authors_model');
        $this->load->library('pagination');
        $this->load->database();
    }
    
    public function index()
    {
      $config['base_url']=base_url('Authors');
      $config['total_rows']=$this->authors_model->getcount();
      $config['per_page']=8;
      $config['uri_segment']=2;
      
      $this->load->library('pagination');
      $this->pagination->initialize($config); 
      if($this->uri->segment(2)!=null){
        $page=$this->uri->segment(2);
      }else{
        $page=0;
      }
      $data['links']=$this->pagination->create_links();
      $data['author']=$this->authors_model->getauthors($config['per_page'],$page);
      $this->load->view('authors',$data);
    }
}
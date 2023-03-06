<?php

class Country extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('country_model');
        $this->load->helper('url');
    }
    public function index()
    {
        $countries = $this->country_model->getcountry();
        $this->load->view('country', array('countries' => $countries));
    }
    public function getstate()
    {
        $country_id = $this->input->get('conutry_id');
        $state = $this->country_model->getstates($country_id);
        $html = "<option value=''>--select state--</option>";
        foreach ($state as $states) {
            $html .= '<option value= "' . $states->state_id . '">' . $states->state_name . '</option>';
        }
        echo $html;
    }
    public function getcity()
    {
        $state_id = $this->input->get('state_id');
        $city = $this->country_model->getcities($state_id);
        $html = "<option value=''>--select city--</option>";
        foreach ($city as $cities) {
            $html .= '<option value= "' . $cities->city_id . '">' . $cities->city_name . '</option>';
        }
        echo $html;
    }
}

<?php 

class AutoComplete_model extends CI_Model   {

    public function getCounry($name)
    {
       return $this->db->like('country_name',$name)->get('country')->result_array();
    }
}
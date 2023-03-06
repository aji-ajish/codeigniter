<?php

class country_model extends CI_Model{
    public function getcountry()
    {
       return $this->db->get('country')->result();
    }
    public function getstates($country_id)
    {
        return $this->db->where('country_id',$country_id)->get('state')->result();
    }
    public function getcities($state_id)
    {
        return $this->db->where('state_id',$state_id)->get('city')->result();
    }
}
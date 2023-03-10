<?php 

class Authors_model extends CI_Model{

    public function getcount()
    {
       return $this->db->count_all_results('authors');
    }
    public function getauthors($limite,$start)
    {
        $this->db->limit($limite,$start);
        $query=$this->db->get('authors');
        return $query->result();
    }
}
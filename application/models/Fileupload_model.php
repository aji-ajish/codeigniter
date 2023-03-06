<?php

class Fileupload_model extends CI_Model
{
    public function sfupload($sfile)
    {
        $this->db->insert('fileupload', $sfile);
        return true;
    }
    public function displayRecords()
    {
        $query =  $this->db->get('fileupload');
        return $query->result();
    }
}

<?php

class Importexcel_model extends CI_Model
{
    public function getImportData()
    {
        return $this->db->get('excelimport')->result();
    }
    public function importdata($import_data)
    {
        $this->db->insert_batch('excelimport', $import_data);
    }
}

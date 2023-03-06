<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class Importexcel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('importexcel_model');
        $this->load->database();
        $this->load->helper('url');
    }
    public function importExcel()
    {
        $getImportData = $this->importexcel_model->getImportData();
        $this->load->view('importexcel', array('getImportData' => $getImportData));
    }
    public function importData()
    {
        if ($this->input->post('submit')) {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size']  = '5120';
            $config['remove_spaces'] = true;
            $this->load->library('upload', $config);
            $error = null;
            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
            } else {
                $data = $this->upload->data();
            }

            if (empty($error)) {
                $import_file = $data['file_name'];
            } else {
                $import_file = null;
            }
            $import_file_path = $config['upload_path'] . $import_file;
            $reader = new Xlsx();
            $spreadsheet = $reader->load($import_file_path);
            $sheet_data = $spreadsheet->getActiveSheet()->toArray();

            $row_count = count($sheet_data);
            // var_dump($row_count);
            // die();
            $import_data = [];
            if ($row_count > 1) {
                for ($i = 1; $i <= $row_count - 1; $i++) {
                    $import_data[] = ['name' => $sheet_data[$i][0], 'email' => $sheet_data[$i][1], 'phone' => $sheet_data[$i][2]];
                    // var_dump($import_data);
                    // die();
                }
                $this->importexcel_model->importdata($import_data);
                redirect('../Importexcel/importExcel');
            } else {
                echo 'No excel data';
            }
        }
    }
    public function exportData()
    {
        $getImportData = $this->importexcel_model->getImportData();
        if (count($getImportData) > 0) {
            $spreadsheet = new Spreadsheet;
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Name');
            $sheet->setCellValue('B1', 'Email');
            $sheet->setCellValue('C1', 'Phone');
            $sheet->getStyle('A1:C1')->getFont()->setBold(true);
            $row = 2;
            foreach ($getImportData as $getExportData) {
                $sheet->setCellValue('A' . $row, $getExportData->name);
                $sheet->setCellValue('B' . $row, $getExportData->email);
                $sheet->setCellValue('C' . $row, $getExportData->phone);
                $row++;
            }
            $writer = new Xls($spreadsheet);
            $filename = 'userdata';
            header('Content-type:application/vnd.ms.excel');
            header('Content-Disposition:attachment;filename=' . $filename . '.xls');
            header('Cache-Control:max-age=0');
            $writer->save('php://output');
        } else {
            echo 'No data to export';
        }
    }
}

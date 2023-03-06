<?php

class Fileupload extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url', 'form'));
        $this->load->database();
        $this->load->model('fileupload_model');
        $this->load->library('session');
    }
    public function fileUpload()
    {
        $result['filedata'] = $this->fileupload_model->displayRecords();
        $this->load->view('fileupload', $result);
    }
    public function singleFileUpload()
    {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '5120';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data();
            // var_dump($data);
            // die();
            if ($data) {
                $sfile['file_name'] = $data['file_name'];
                $sfile['image_type'] = $data['image_type'];
                $sfile['file_size'] = $data['file_size'];
                $sfile['full_path'] = $data['full_path'];
                $response = $this->fileupload_model->sfupload($sfile);
                if ($response == true) {
                    $this->session->set_flashdata('msg', 'file Upload success.');
                    redirect('../Fileupload/fileUpload');
                } else {
                    $this->session->set_flashdata('msg', 'file Upload Failed.');
                }
            }
            $sferror = null;
        } else {
            $sferror = $this->upload->display_errors();
            $data = null;
        }
        $this->load->view('fileupload', array('data' => $data, 'sferror' => $sferror));
    }
    public function multiFileUpload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '5120';

        $this->load->library('upload', $config);
        $files_cout =  count($_FILES['files']['name']);
        $sfile = [];
        for ($i = 0; $i < $files_cout; $i++) {
            $_FILES['files']['name'] = $_FILES['files']['name'][$i];
            $_FILES['files']['type'] = $_FILES['files']['type'][$i];
            $_FILES['files']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['files']['error'] = $_FILES['files']['error'][$i];
            $_FILES['files']['size'] = $_FILES['files']['size'][$i];

            if ($this->upload->do_upload('files')) {
                $data[] = $this->upload->data();


                $sfile['file_name'] = $_FILES['files']['name'];
                $sfile['image_type'] = $_FILES['files']['type'];
                $sfile['file_size'] = $_FILES['files']['size'];
                $sfile['full_path'] = $_FILES['files']['tmp_name'];
                $response = $this->fileupload_model->sfupload($sfile);
                var_dump($sfile['file_name']);
                // var_dump($sfile['full_path']);
                // die();
                // if ($response == true) {
                //     $this->session->set_flashdata('msg', 'file Upload success.');
                //     // redirect('../Fileupload/fileUpload');
                // } else {
                //     $this->session->set_flashdata('msg', 'file Upload Failed.');
                // }

                // $sferror = null;
            }
            // else {
            //     $sferror = $this->upload->display_errors();
            //     $data = [];
            // }
        }


        die();
        $this->load->view('fileupload');
    }
}

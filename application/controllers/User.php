<?php
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
        $this->load->model('user_model');
        $this->load->helper('url');
    }
    public function saveData()
    {
        $this->load->view('insert');
        if ($this->input->post('save')) {
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');

            $categories = $this->input->post('categories');
            $user_id = $this->user_model->saveRecord($data);

             foreach ($categories as $key => $categry) {
               $this->user_model->addUserCategories($user_id,$categry);
             } 
             redirect('../User/displayData');
            // get last inset id
            // $last_id = $this->user_model->getLastId();
            // if ($response == true) {
            //     echo "Insert Success! You registration id is : $last_id";
            // } else {
            //     echo "Insert Failed!";
            // }
        }
    }
    public function displayData()
    {
        $result['data'] = $this->user_model->displayRecords();
        $this->load->view('displayrecords', $result);
    }
    // public function updateData()
    // {
    //     $id = $this->input->get('id');
    //     $result['data'] = $this->user_model->displayRecordsById($id);
    //     $this->load->view('updateUser', $result);
    //     if ($this->input->post('update')) {
    //         // $first_name = $this->input->post('first_name');
    //         // $last_name = $this->input->post('last_name');
    //         // $email = $this->input->post('email');
    //         // $response = $this->user_model->updateRecordes($first_name, $last_name, $email, $id);
    //         $data['first_name'] = $this->input->post('first_name');
    //         $data['last_name'] = $this->input->post('last_name');
    //         $data['email'] = $this->input->post('email');
    //         $response = $this->user_model->updateRecordes($data);
    //         if ($response == true) {
    //             redirect('../user/displayData');
    //         } else {
    //             echo "Insert Failed!";
    //         }
    //     }
    // }

    public function updateData($id)
    {
        // $id = $this->input->get('id');
        $user = $this->user_model->displayRecordsById($id);
        $categories = $this->user_model->getusercategories($id);
       $categry_list= array_map(function($categry){
            return $categry['user_categories'];
        },$categories);
        $this->load->view('updateUser',array('user'=>$user,'categry_list'=>$categry_list));
        if ($this->input->post('update')) { 
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');
            $response = $this->user_model->updateRecordes($data);
            if ($response == true) {
                redirect('../user/displayData');
            } else {
                echo "Insert Failed!";
            }
        }
    }
    public function deleteData()
    {
        $id = $this->input->get('id');
        $response = $result['data'] = $this->user_model->deleteRecordsById($id);
        if ($response == true) {
            redirect('../user/displayData');
        } else {
            echo "Delete Failed!";
        }
    }
}

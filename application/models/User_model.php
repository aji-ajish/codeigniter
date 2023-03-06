<?php


class User_model extends CI_Model
{
    public function saveRecord($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
    public function addUserCategories($user_id,$categry)
    {
       $this->db->insert('user_categories', array('user_id'=>$user_id,'user_categories'=>$categry));
       
    }
    // public function getLastId()
    // {
    //     return $this->db->insert_id();
    // }
    public function displayRecords()
    {
        // $query =  $this->db->get('user');
        // return $query->result();
      $query=  $this->db->query('SELECT  u.first_name, u.last_name, u.email,u.id, GROUP_CONCAT(uc.user_categories) as categories
    FROM  user u
    JOIN  user_categories uc ON u.id = uc.user_id
    GROUP BY  u.id ');
      
        return $query->result();

    }
    public function displayRecordsById($id)
    {
        return $this->db->where('id',$id)->get('user')->row();
    }
    public function getusercategories($id)
    {
        return $this->db->where('user_id',$id)->get('user_categories')->result_array();
      # code...
    }

    // public function updateRecordes($first_name, $last_name, $email, $id)
    // {
    //     $this->db->query("UPDATE user SET first_name='$first_name' ,last_name='$last_name', email='$email' WHERE id=$id");
    //     return true;
    //     // $this->db->update('Table', $object);

    // }
    public function updateRecordes($data)
    {

        $this->db->update('user', $data);
        return true;
    }
    public function deleteRecordsById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        return true;
    }
}

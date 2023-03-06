<?php
class Usersignup_model extends CI_Model
{
    public function store($data)
    {

        $this->db->insert('signup', $data);
        return true;
    }
    public function getuser($email)
    {
        return $this->db->where('email', $email)->get('signup')->row();
    }
    public function changePassword($id, $new_password)
    {
        $this->db->query("UPDATE signup SET password='$new_password' WHERE id=$id");
    }
    public function oldPasswordCheck($id, $old_password)
    {

        $query = $this->db->where('id', $id)->where('password', $old_password)->get('signup');
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }
    public function resetPassword($email)
    {
        return $this->db->where('email', $email)->get('signup')->row();
    }
    public function googlelogin($data)
    {
        $this->db->insert('signup', $data);
    }
}

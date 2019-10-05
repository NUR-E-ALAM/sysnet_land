<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function input_user($data)
    {
        if ($this->db->insert('users_tbl', $data)) {
            return true;
        } else {
            return false;
        }
    }
    // public function update_user($id, $data2)
    // {
    //     $this->db->where('user_id', $id);
    //   return  $this->db->update('users', $data2);
    // }
    // public function getuser_id($id)
    // {
    //       $this->db->where('user_id', $id);
    //       return $this->db->get('users',$id);
    //  }

    // public function user_upaded($id, $data)
    // {
    //     $this->db->where('user_id', $id);
    //     if ($this->db->update('users', $data)) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function does_user_exist($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users_tbl');
        return $query;
    }



    public function get_single_user($id) {
        $this->db->where('id', $id);
        return $this->db->get('users_tbl');
      //  return $this->db->select('*')->from('users')->join('profile', 'profile.user_id = users.user_id')->where('user_id', $id)->get();
      
      
      }


}
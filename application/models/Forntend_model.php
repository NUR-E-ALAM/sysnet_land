<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Forntend_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    //   add menu function 
    public function add_user($data)
    {
        if ($this->db->insert('forntend_user_tbl', $data)) {
            return true;
        } else {
            return false;
        }
    }

    // show menu function 

    public function get_forntend_user()
    {
        //select * from users
        // $this->db->order_by('id','desc');
        return $this->db->get('forntend_user_tbl');
    }
    // show single Message 
    public function get_message_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('forntend_user_tbl', $id);
        return $query->row();
    }
}
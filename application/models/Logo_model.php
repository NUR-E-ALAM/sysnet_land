<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Logo_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    //   add menu function 
    public function add_logo($data)
    {
        if ($this->db->insert('logo_tbl', $data)) {
            return true;
        } else {
            return false;
        }
    }

    // show menu function 

    public function get_logo()
    {
        //select * from users
        // $this->db->order_by('id','desc');
        return $this->db->get('logo_tbl');
    }
    // show single menu 
    public function get_logo_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('logo_tbl', $id);
        return $query->row();
    }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class About_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    /** add about function  */
    public function add_about($data)
    {
        if ($this->db->insert('about_tbl', $data)) {
            return true;
        } else {
            return false;
        }
    }

    /** show abouts function  */

    public function get_abouts()
    {
        //select * from users
        // $this->db->order_by('id','desc');
        return $this->db->get('about_tbl');
    }
    /** show single About  */
    public function get_about_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('about_tbl', $id);
        return $query->row();
    }
}
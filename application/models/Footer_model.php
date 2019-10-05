<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Footer_model extends CI_Model {


function __construct() {
    parent::__construct();
}

//   add menu function 
public function add_company($data)
{
    if ($this->db->insert('company_tbl', $data)) {
        return true;
    } else {
        return false;
    }
   
}

// show menu function 

public function get_companies()
{
    //select * from users
    // $this->db->order_by('id','desc');
    return $this->db->get('company_tbl');
}
// show single menu 
public function get_company_id($id)
    {
          $this->db->where('id', $id);
          $query = $this->db->get('company_tbl',$id);
           return $query->row();
     }

 

   

}
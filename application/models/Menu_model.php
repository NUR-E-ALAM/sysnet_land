<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_model extends CI_Model {


function __construct() {
    parent::__construct();
}

//   add menu function 
public function add_menu($data)
{
    if ($this->db->insert('menu_tbl', $data)) {
        return true;
    } else {
        return false;
    }
   
}

// show menu function 

public function get_menus()
{
    //select * from users
    // $this->db->order_by('id','desc');
    return $this->db->get('menu_tbl');
}
// show single menu 
public function get_menu_id($id)
    {
          $this->db->where('id', $id);
          $query = $this->db->get('menu_tbl',$id);
           return $query->row();
     }

 

   

}
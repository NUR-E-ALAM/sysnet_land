<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Room_model extends CI_Model
{


    function __construct()
    {
        parent::__construct();
    }

    //   add room function 
    public function add_room($data)
    {

        if ($this->db->insert('rooms_tbl', $data)) {
            if ($this->db->affected_rows()) {
                // Storing id into varialbe
                return  $this->db->insert_id();
            }
        } else {
            return false;
        }
    }
    public function add_room_images($data1)
    {

        if ($this->db->insert('room_images_tbl', $data1)) {
            return true;
        } else {
            return false;
        }
    }

    /** edit images  */

    public function get_images_id($id)
    {
        /** same function up */

        // $this->db->where('room_id', $id);
        // $query = $this->db->get('room_images_tbl', $id);
        // return $query->result();


        $query = $this->db->query("SELECT * FROM room_images_tbl WHERE room_id=$id")->result();
        return $query;
    }

    // show menu function 

    public function get_rooms()
    {
        //select * from users
        // $this->db->order_by('id','desc');
        return $this->db->get('rooms_tbl');
    }
    /** show single Room  */
    public function get_room_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('rooms_tbl', $id);
        return $query->row();
    }
}

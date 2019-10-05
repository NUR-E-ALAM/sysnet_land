<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //check loggedin user 
        $logged_in = $this->session->logged_in;
        if (!$logged_in) {
            redirect("Signup/logout");
        }
        //load necessary files
        $this->load->library(["form_validation"]);
        $this->load->database();
        $this->load->model('Menu_model');
    }

    public function index()
    {

        $this->load->view('admin/menu_form');
    }

    // add menu items

    function insert_menu()
    {
        $this->form_validation->set_error_delimiters('<div class="error bg-warning">', '</div>');

        // Set validation rules
        $this->form_validation->set_rules('menu_name', 'Menu Name', 'required|min_length[1]|max_length[125]');

        // Begin validation
        if ($this->form_validation->run() == false) {
            // First load, or problem with form
            $this->load->view('admin/menu_form');
        } else {

            //$this->session->userdata('user_id')
            //upload image
            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'status' => $this->input->post('happy'),

            );
            if ($this->Menu_model->add_menu($data)) {
                redirect("Menu/show_menus");
            } else {
                //redirect('product');
                echo "database Error";
            }
        }
    }


    // show all menus

    function show_menus()
    {
        $data['title'] = "Show Menus";
        $data['query'] = $this->db->get('menu_tbl');
        $this->load->view("admin/menu_tbl", $data);
    }

    public function edit_menu($id)
    {
        $this->form_validation->set_error_delimiters('', '<br />');
        // // Set validation rules
        $this->form_validation->set_rules('menu_name', 'menu_name', 'required|min_length[1]|max_length[125]');


        $data['menu'] = $this->Menu_model->get_menu_id($id);

        //  update menu information

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'status' => $this->input->post('happy'),

            );

            $this->db->where('id', $id);
            $result = $this->db->update('menu_tbl', $data);
            if ($result) {
                redirect("Menu/show_menus");
            }
        }


        //  var_dump($data);
        $this->load->view("admin/edit_menu_form", $data);
    }

    // delete menu function 

    public function delete_menu($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("menu_tbl")) {
            redirect("Menu/show_menus");
        }
    }
}

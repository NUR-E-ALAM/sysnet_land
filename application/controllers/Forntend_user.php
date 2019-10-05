<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forntend_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //load necessary files
        $this->load->library(["form_validation"]);
        $this->load->database();
        $this->load->model('Forntend_model');
    }

    public function index()
    {

        $this->load->view('index');
    }

    // add menu items

    function insert_user()
    {
        $data['query'] = $this->db->get('logo_tbl');
        $data['query_about'] = $this->db->get('about_tbl');
        $data['query_company'] = $this->db->get('company_tbl');


        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

        // Set validation rules
        $this->form_validation->set_rules('user_name', 'User Name', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('user_subject', 'User Subject', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('user_message', 'User Message', 'required|min_length[10]|max_length[1024]');

        // Begin validation
        if ($this->form_validation->run() == true) {
            // First load, or problem with form

            $data = array(
                'user_name' => $this->input->post('user_name'),
                'user_email' => $this->input->post('user_email'),
                'user_subject' => $this->input->post('user_subject'),
                'user_message' => $this->input->post('user_message'),


            );
            if ($this->Forntend_model->add_user($data)) {
                redirect("Welcome");
            } else {
                //redirect('product');
                echo "database Error";
            }
        }
        $this->load->view('index', $data);
    }


    // show all menus

    function show_users()
    {
        $data['title'] = "Show Forntend Users";
        $data['query'] = $this->db->get('forntend_user_tbl');
        $this->load->view("admin/forntend_user_tbl", $data);
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

    function show_single_message($id)
    {
        $data['title'] = "Show About";
        $data['message'] =  $this->Forntend_model->get_message_id($id);
        $this->load->view("admin/single_message_tbl", $data);
    }

    // delete menu function 

    public function delete_user($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("forntend_user_tbl")) {
            redirect("Forntend_user/show_users");
        }
    }
}
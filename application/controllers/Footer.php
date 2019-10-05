<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Footer extends CI_Controller
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
        $this->load->library(["form_validation", "session"]);
        $this->load->database();
        $this->load->model('Footer_model');
    }

    public function index()
    {

        $this->load->view('admin/company_form');
    }

    // add menu items

    function insert_company()
    {
        // $this->form_validation->set_error_delimiters('', '<br />');
        $this->form_validation->set_error_delimiters('<div class="error bg-warning">', '</div>');

        // Set validation rules
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('company_email', 'Company Email', 'required|min_length[5]|max_length[125]|valid_email|is_unique[company_tbl.company_email]');
        $this->form_validation->set_rules('company_phone', 'Company Phone', 'required|min_length[1]|max_length[125]|is_unique[company_tbl.company_phone]');

        // Begin validation
        if ($this->form_validation->run() == false) {
            // First load, or problem with form
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view("admin/company_form");
        } else {

            //$this->session->userdata('user_id')
            //upload image
            $data = array(
                'company_name' => $this->input->post('company_name'),
                'company_address' => $this->input->post('company_address'),
                'company_email' => $this->input->post('company_email'),
                'company_phone' => $this->input->post('company_phone'),
                'status' => $this->input->post('happy'),

            );
            if ($this->Footer_model->add_company($data)) {
                redirect("Footer/show_companies");
            } else {
                //redirect('product');
                echo "database Error";
            }
        }
    }


    // show all menus

    function show_companies()
    {
        $data['title'] = "Show Company";
        $data['query'] = $this->db->get('company_tbl');
        $this->load->view("admin/company_tbl", $data);
    }

    public function edit_company($id)
    {

        $data['company'] = $company = $this->Footer_model->get_company_id($id);

        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        // Set validation rules
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('company_email', 'Company Email', 'required|min_length[1]|max_length[125]|valid_email|callback_username_check[' . $company->id . ']');
        // $this->form_validation->set_rules('company_phone','Company Phone', 'required|min_length[1]|max_length[125]|is_unique[company_tbl.company_phone]');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'company_name' => $this->input->post('company_name'),
                'company_address' => $this->input->post('company_address'),
                'company_email' => $this->input->post('company_email'),
                'company_phone' => $this->input->post('company_phone'),
                'status' => $this->input->post('happy'),

            );

            $this->db->where('id', $id);
            $result = $this->db->update('company_tbl', $data);
            if ($result) {
                redirect("Footer/show_companies");
            }
        }


        //  var_dump($data);
        $this->load->view("admin/edit_company_form", $data);
    }

    // edit company funciton end


    public function username_check($c_email, $id)
    {

        $res = $this->db->query("SELECT id FROM company_tbl WHERE company_email='$c_email' AND id != $id LIMIT 1")->row();
        if (!empty($res)) {
            $this->form_validation->set_message('username_check', 'Company Email is already in use');
            return FALSE;
        }

        return TRUE;
    }

    // delete menu function 

    public function delete_company($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("company_tbl")) {
            redirect("Footer/show_companies");
        }
    }
}
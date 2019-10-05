<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //load necessary files

        $this->load->library('form_validation');
        $this->load->model(['About_model', 'Footer_model', 'Menu_model', 'Forntend_model', 'Room_model', 'Signup_model']);
        $this->load->library('pagination');

        $this->load->database();
        //$this->output->enable_profiler(TRUE);

    }
    public function index()
    {
        $data['title'] = "Show Logo";
        $data['query'] = $this->db->get('logo_tbl');
        $data['query_about'] = $this->db->get('about_tbl');
        $data['query_room'] = $this->db->get('rooms_tbl');
        // $data['query_room'] = $this->db->query("SELECT * FROM room_images_tbl INNER JOIN  rooms_tbl ON room_images_tbl.room_id = rooms_tbl.id");
        $data['query_company'] = $this->db->get('company_tbl');
        $this->load->view('index', $data);
    }
    public function room($id)
    {
        $data['title'] = "Show Single Room";
        $data['query'] = $this->db->get('logo_tbl');
        $data['room'] =  $this->Room_model->get_room_id($id);
        $data['query_company'] = $this->db->get('company_tbl');
        $this->load->view('single', $data);
    }
    function insert_user()
    {
        // $data['query'] = $this->db->get('logo_tbl');
        // $data['query_about'] = $this->db->get('about_tbl');
        // $data['query_company'] = $this->db->get('company_tbl');

        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

        // Set validation rules
        $this->form_validation->set_rules('user_name', 'User Name', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('user_email', 'User Email', 'required|valid_email|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('user_subject', 'User Subject', 'required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('user_message', 'User Message', 'required|min_length[5]|max_length[255]');

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

    /** User Registration */
    public function registration()
    {
        $data['query'] = $this->db->get('logo_tbl');
        $data['query_company'] = $this->db->get('company_tbl');
        $this->form_validation->set_error_delimiters('<div class="error bg-warning">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[13]|max_length[50]|valid_email|is_unique[users_tbl.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|min_length[5]|max_length[12]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('user_registration', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $password,
            );

            if ($this->Signup_model->input_user($data)) {
                redirect('Welcome/login');
            } else {
                redirect('registration');
            }
        }
    }

    /** User registration end */
    /**User Login */
    public function login()
    {

        $data['query'] = $this->db->get('logo_tbl');
        $data['query_company'] = $this->db->get('company_tbl');
        if ($this->session->userdata('logged_in') == TRUE) {
            redirect('Welcome/loggedin');
        } else {

            // Set validation rules for view filters
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password ', 'required|min_length[5]|max_length[30]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Login";
                $this->load->view('user_login', $data);
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $query = $this->Signup_model->does_user_exist($email);
                if ($query->num_rows() == 1) {
                    // One matching row found
                    foreach ($query->result() as $row) {

                        // Generate hash from a their password

                        // Compare the generated hash with that in the
                        // database
                        if (!password_verify($password, $row->password)) {
                            // Didn't match so send back to login
                            $data['login_fail'] = true;
                            $this->load->view('user_login', $data);
                        } else {
                            $data = array(
                                'id' => $row->id,
                                'name' => $row->name,
                                'email' => $row->email,
                                'logged_in' => TRUE
                            );
                            // Save data to session
                            $this->session->set_userdata($data);

                            $this->load->view('admin/index');
                        }
                    }
                } else {
                    $data['login_fail'] = true;
                    $this->load->view('user_login', $data);
                }
            }
        }
    }

    // if user loggedin

    function loggedin()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            redirect('Welcome/registration');
        } else {
            redirect('user_login');
        }
    }
}
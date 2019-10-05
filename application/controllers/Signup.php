<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{


    function __construct()
    {
        parent::__construct();


        $this->load->database();
        $this->load->model('Signup_model');
        $this->load->library(["form_validation"]);
    }


    public function index()
    {

        $this->load->view("admin/index");
    }
    public function registration()
    {
        $this->form_validation->set_error_delimiters('<div class="error bg-warning">', '</div>');
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[13]|max_length[50]|valid_email|is_unique[users_tbl.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('password2', 'Confirmation Password', 'required|min_length[5]|max_length[12]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('registration');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $password,
            );

            if ($this->Signup_model->input_user($data)) {
                redirect('Signup/login');
            } else {
                redirect('registration');
            }
        }
    }


    // login user

    public function login()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            redirect('Signup/loggedin');
        } else {

            // Set validation rules for view filters
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password ', 'required|min_length[5]|max_length[30]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = "Login";
                $this->load->view('login', $data);
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
                            $this->load->view('login', $data);
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
                    $this->load->view('login', $data);
                }
            }
        }
    }

    // if user loggedin

    function loggedin()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            redirect('signup');
        } else {
            redirect('login');
        }
    }

    //for start logout
    function logout()
    {
        // $this->session->sess_destroy();
        session_destroy();
        redirect("Signup/login");
    }
}

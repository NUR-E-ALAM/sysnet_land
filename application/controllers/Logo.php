<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //check loggedin user 
        $logged_in = $this->session->logged_in;
        //print_r($this->session->all_userdata()); exit;
        if (!$logged_in) {
            redirect("Signup/logout");
        }

        //load necessary files
$this->load->library(["form_validation","session","upload"]);
        $this->load->model('Logo_model');
    }

    public function index()
    {

        $this->load->view('admin/logo_form');
    }

    // add menu items

    function insert_logo()
    {
        // if($_FILES) {print_r($_FILES); EXIT;}
        // $this->form_validation->set_error_delimiters('', '<br />');
        $this->form_validation->set_error_delimiters('<div class="error bg-warning">', '</div>');

        // Set validation rules
        $this->form_validation->set_rules('logo_name', 'Logo Name', 'required|min_length[1]|max_length[125]');
        // Begin validation
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = FCPATH . "/admin_assets/images/upload_logo/";
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $new_name =  $_FILES["image_name"]['name'];
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_name')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                exit;
                $this->load->view('admin/logo_form', $error);
            } else {
                $data['images'] =  $new_name;
            }
            $data = array(
                'logo_name' => $this->input->post('logo_name'),
                'images' => $new_name
            );
            if ($this->Logo_model->add_logo($data)) {
                redirect("Logo/show_logo");
            } else {
                //redirect('product');
                echo "database Error";
            }
        }
        $this->load->view('admin/logo_form');
    }


    // show all menus

    function show_logo()
    {
        $data['title'] = "Show Logo";
        $data['query'] = $this->db->get('logo_tbl');
        $this->load->view("admin/logo_tbl", $data);
    }

    public function edit_logo($id)
    {

        $this->form_validation->set_error_delimiters('', '<br />');
        // // Set validation rules
        $this->form_validation->set_rules('logo_name', 'about_name', 'required|min_length[1]|max_length[125]');

        $data['logo'] = $logo =  $this->Logo_model->get_logo_id($id);

        $prevImage =   FCPATH . "/admin_assets/images/upload_logo/" . $logo->images;


        //  update menu information

        if ($this->form_validation->run() == TRUE) {
            $rata = array(
                'logo_name' => $this->input->post('logo_name'),
            );
            $config['upload_path'] = FCPATH . "/admin_assets/images/upload_logo/";
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';

            $new_name = $_FILES["image_name"]['name'];
            $config['file_name'] = $new_name;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_name')) {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
                $data['error'] = $error;
            } else {
                $rata['images'] =  $new_name;
                // Remove old file from the server  
                if (!empty($prevImage)) {
                    @unlink($prevImage);
                }
            }




            $this->db->where('id', $id);
            $result = $this->db->update('logo_tbl', $rata);
            if ($result) {
                redirect("Logo/show_logo");
            }
        }

        //  var_dump($data);
        $this->load->view("admin/edit_logo_form", $data);
    }

    // delete menu function 

    public function delete_logo($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("logo_tbl")) {
            redirect("Logo/show_logo");
        }
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
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
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library(["form_validation", "session", "upload"]);
        $this->load->database();
        $this->load->model('About_model');
    }

    public function index()
    {

        $this->load->view('admin/about_form');
    }

    // add menu items

    function insert_about()
    {
        // if($_FILES) {print_r($_FILES); EXIT;}
        // $this->form_validation->set_error_delimiters('', '<br />');
        $this->form_validation->set_error_delimiters('<div class="error bg-warning">', '</div>');

        // Set validation rules
        $this->form_validation->set_rules('about_name', 'About Name', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('about_description', 'About Description', 'required|min_length[1]|trim');


        // Begin validation
        if ($this->form_validation->run() == TRUE) {
            // $new_image_name = time().'-'. $_FILES["txt_file"]['image_name'];
            // echo FCPATH."/admin_assets/images/upload_about";  exit;
            $config['upload_path'] = FCPATH . "/admin_assets/images/upload_about/";
            // $config['upload_path'] = FCPATH."admin_assets\images\upload_about"; 
            //echo $config['upload_path']; exit;
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            // $image = $config['file_name'] = time()."_".$_FILES["txt_file"]['image_name'].'';
            $new_name = time() . "_" . $_FILES["image_name"]['name'];
            $config['file_name'] = $new_name;
            // $config['max_size']  = '0';
            //$config['max_width']  = '0';
            // $config['max_height']  = '0';
            //$config['min_width'] = '0';
            // $config['min_height'] = '0';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_name')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                exit;
                $this->load->view('admin/about_form', $error);
            } else {
                $data['images'] =  $new_name;
            }
            $data = array(
                'about_name' => $this->input->post('about_name'),
                'about_description' => $this->input->post('about_description'),
                'images' => $new_name,
                'status' => $this->input->post('happy'),

            );
            if ($this->About_model->add_about($data)) {
                redirect("About/show_abouts");
            } else {
                //redirect('product');
                echo "database Error";
            }
        }
        $this->load->view('admin/about_form');
    }


    // show all menus

    function show_abouts()
    {
        $data['title'] = "Show About";
        $data['query'] = $this->db->get('about_tbl');
        $this->load->view("admin/about_tbl", $data);
    }

    public function edit_about($id)
    {

        $this->form_validation->set_error_delimiters('', '<br />');
        // // Set validation rules
        $this->form_validation->set_rules('about_name', 'about_name', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('about_description', 'about_name', 'required|min_length[5]');


        $data['about'] = $about =  $this->About_model->get_about_id($id);

        $prevImage =   FCPATH . "/admin_assets/images/upload_about/" . $about->images;


        //  update menu information

        if ($this->form_validation->run() == TRUE) {
            $rata = array(
                'about_name' => $this->input->post('about_name'),
                'about_description' => $this->input->post('about_description'),
                'status' => $this->input->post('happy')
            );

            $config['upload_path'] = FCPATH . "/admin_assets/images/upload_about/";
            // $config['upload_path'] = FCPATH."admin_assets\images\upload_about"; 
            //echo $config['upload_path']; exit;
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            // $image = $config['file_name'] = time()."_".$_FILES["txt_file"]['image_name'].'';
            //  print_r($_FILES); exit;
            $new_name = time() . "_" . $_FILES["image_name"]['name'];
            $config['file_name'] = $new_name;
            // $config['max_size']  = '0';
            //$config['max_width']  = '0';
            // $config['max_height']  = '0';
            //$config['min_width'] = '0';
            // $config['min_height'] = '0';
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
            $result = $this->db->update('about_tbl', $rata);
            if ($result) {
                redirect("About/show_abouts");
            }
        }

        //  var_dump($data);
        $this->load->view("admin/edit_about_form", $data);
    }

    // delete menu function 

    public function delete_about($id)
    {
        $data['about'] = $about =  $this->About_model->get_about_id($id);

        $prevImage =   FCPATH . "/admin_assets/images/upload_about/" . $about->images;
        $this->db->where("id", $id);
        if (!empty($prevImage)) {
            @unlink($prevImage);
        }
        if ($this->db->delete("about_tbl")) {
            redirect("About/show_abouts");
        }
    }
    function show_single($id)
    {
        $data['title'] = "Show About";
        $data['about'] =  $this->About_model->get_about_id($id);
        $this->load->view("admin/about_single_tbl", $data);
    }
}

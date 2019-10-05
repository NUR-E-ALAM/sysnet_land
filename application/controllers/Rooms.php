<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rooms extends CI_Controller
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
        $this->load->library(["form_validation", "session", "upload"]);
        $this->load->database();
        $this->load->model(['Room_model']);
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
    }



    public function index()
    {

        $this->load->view('admin/room_form');
    }

    // add menu items

    function insert_room()
    {
        // if ($_FILES) {
        //     print_r($_FILES);
        //     exit;
        // }
        // $this->form_validation->set_error_delimiters('', '<br />');
        $this->form_validation->set_error_delimiters('<div class="error bg-warning">', '</div>');

        // Set validation rules
        $this->form_validation->set_rules('house_name', 'House Name', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('house_description', 'House Description', 'required|min_length[1]|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[1]|trim');
        $this->ckeditor->basePath = base_url() . 'admin_assets/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array('Source', '-', 'Bold', 'Italic', 'Underline', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', '-', 'NumberedList', 'BulletedList')
        );
        $this->ckeditor->config['language'] = 'it';
        $this->ckeditor->config['width'] = '730px';
        $this->ckeditor->config['height'] = '600px';

        //Add Ckfinder to Ckeditor
        $this->ckfinder->SetupCKEditor($this->ckeditor, base_url() . 'admin_assets/ckfinder/');

        // Begin validation
        if ($this->form_validation->run() == TRUE) {

            $data = array(
                'user_id' => $this->session->userdata('id'),
                'house_name' => $this->input->post('house_name'),
                'description' => strip_tags($this->input->post('house_description')),
                'address' => $this->input->post('address'),
                'bed_room' => $this->input->post('bed_room'),
                'drawing_room' => $this->input->post('drawing_room'),
                'dining_room' => $this->input->post('dining_room'),
                'kitchen' => $this->input->post('kitchen_room'),
                'attach_bath' => $this->input->post('attach_bath'),
                'common_bath' => $this->input->post('common_bath'),
                'balcony' => $this->input->post('balcony'),
                'floor_type' => $this->input->post('floor_type'),
                'floor_level' => $this->input->post('floor_level'),
                'lift' => $this->input->post('lift'),
                'generator' => $this->input->post('generator'),
                'parking' => $this->input->post('parking'),
                'status' => $this->input->post('happy')
            );
            $ins_id = $this->Room_model->add_room($data);
            if ($ins_id) {
                redirect("Rooms/add_images/" . $ins_id);
            } else {

                echo "database Error";
            }
        }
        $this->load->view('admin/room_form');
    }

    // show all Rooms

    function show_rooms()
    {
        $data['title'] = "Show Rooms";


        $data['query'] = $this->db->query("SELECT *, (SELECT users_tbl.name FROM users_tbl WHERE rooms_tbl.user_id = users_tbl.id) AS username FROM rooms_tbl")->result();


        $data['query1'] = $this->db->get('room_images_tbl');
        $this->load->view("admin/rooms_tbl", $data);
    }

    /** Edit Room function start */

    public function edit_room($id)
    {

        $this->form_validation->set_error_delimiters('<div class="error bg-warning">', '</div>');

        // Set validation rules
        $this->form_validation->set_rules('house_name', 'House Name', 'required|min_length[1]|max_length[125]');
        $this->form_validation->set_rules('house_description', 'House Description', 'required|min_length[1]|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|min_length[1]|trim');


        $data['room'] = $room =  $this->Room_model->get_room_id($id);

        //  update menu information

        if ($this->form_validation->run() == TRUE) {
            $rata = array(
                'user_id' => $this->session->userdata('id'),
                'house_name' => $this->input->post('house_name'),
                'description' => strip_tags($this->input->post('house_description')),
                'address' => $this->input->post('address'),
                'bed_room' => $this->input->post('bed_room'),
                'drawing_room' => $this->input->post('drawing_room'),
                'dining_room' => $this->input->post('dining_room'),
                'kitchen' => $this->input->post('kitchen_room'),
                'attach_bath' => $this->input->post('attach_bath'),
                'common_bath' => $this->input->post('common_bath'),
                'balcony' => $this->input->post('balcony'),
                'floor_type' => $this->input->post('floor_type'),
                'floor_level' => $this->input->post('floor_level'),
                'lift' => $this->input->post('lift'),
                'generator' => $this->input->post('generator'),
                'parking' => $this->input->post('parking'),
                'status' => $this->input->post('happy')
            );

            $this->db->where('id', $id);
            $result = $this->db->update('rooms_tbl', $rata);
            if ($result) {
                redirect("Rooms/edit_images/" . $id);
            }
        }

        //  var_dump($data);
        $this->load->view("admin/edit_room_form", $data);
    }
    /** Edit Room function end */

    /** Show single Room Start */
    function show_single($id)
    {
        $data['title'] = "Show Room";
        $data['room'] =  $this->Room_model->get_room_id($id);
        $this->load->view("admin/single_room_tbl", $data);
    }
    /** Show single Room End */

    function add_images($rid)
    {
        if (!isset($rid)) {
            exit;
        }
        $mata['rid'] = $rid;
        // $data['uploaded_files'] = directory_map(FCPATH . "/backend_assets/images/room_images/");
        $data1['title'] = "Images Uploaded";
        if ($this->input->post('submit') && count($_FILES['multipleFiles']['name']) > 0) {
            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";

            /** 
             * 
             * count the number files has been uploaded 
             *
             */
            $number_of_files = count($_FILES['multipleFiles']['name']);

            /**
             * store global files to local variable
             */
            $files = $_FILES;

            /**
             * Make sure the folder is there
             */
            if (!is_dir(FCPATH . "/backend_assets/images/room_images/")) {
                mkdir(FCPATH . "/backend_assets/images/room_images/", 0777, true);
            }

            /**
             * upload files one by one
             */
            for ($i = 0; $i < $number_of_files; $i++) {
                $_FILES['multipleFiles']['name'] = $files['multipleFiles']['name'][$i];
                $_FILES['multipleFiles']['type'] = $files['multipleFiles']['type'][$i];
                $_FILES['multipleFiles']['tmp_name'] = $files['multipleFiles']['tmp_name'][$i];
                $_FILES['multipleFiles']['error'] = $files['multipleFiles']['error'][$i];
                $_FILES['multipleFiles']['size'] = $files['multipleFiles']['size'][$i];
                $config['upload_path'] = FCPATH . "/backend_assets/images/room_images/";
                $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                $config['overwrite'] = TRUE;
                $config['remove_spaces'] = TRUE;

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('multipleFiles')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data1 = array('upload_data' => $this->upload->data());
                }

                $data1 = array(
                    'room_id' => $rid,
                    'images' => $_FILES['multipleFiles']['name']
                );
                $images = $this->Room_model->add_room_images($data1);
            }

            if ($images) {
                redirect('Rooms/show_rooms');
                // redirect('Rooms/add_images/' . $rid);
            }
        }
        $this->load->view('admin/multi_images', $mata);
    }

    /** Images Edit Function  */
    function edit_images($rid)
    {
        if (!isset($rid)) {
            exit;
        }
        $data['id'] = $rid;
        //$data['img'] = $img =  $this->Room_model->get_images_id($id);
        $data['img'] = $img =  $this->db->query("SELECT image_id, images FROM  room_images_tbl WHERE room_id='$rid'")->result();

        // echo "<pre>";
        // print_r($img);
        // echo "</pre>";
        // exit;


        $this->load->view("admin/edit_multi_images", $data);
    }


    /**  delete room function start */

    public function delete_room($id)
    {
        $this->db->where("id", $id);
        if ($this->db->delete("rooms_tbl")) {
            redirect("Rooms/show_rooms");
        }
    }

    /**  delete room function End */

    /** delete image start */
    public function delete_img()
    {
        $img_id = $this->input->post('img_id');
        $img_name = $this->input->post('img_name');
        if ($_POST && strlen($img_id)) {
            $this->db->where("image_id", $img_id);
            $this->db->delete("room_images_tbl");
            unlink(FCPATH . "/backend_assets/images/room_images/" . $img_name);
            echo 'ok';
            exit;
        }
    }
    /** delete image end */
}

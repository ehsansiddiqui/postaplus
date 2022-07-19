<?php
class Location extends CI_Controller {

    function Location() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('location_m', 'Obj_location_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        // date_default_timezone_set('Asia/Kuwait');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_location_M->get_location();
        $this->layout->view('location_v', $data);
    }

    public function add_location() {
        
        if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
            $data = array('location_name' => $this->input->post('location_name'));
            $this->Obj_location_M->add_location($data);
            $location_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
//                if (!is_dir('location/' . $location_id)) {
//                    mkdir('location/' . $location_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/new/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('vehicle_id', $location_id);
                    $this->db->update('vehicle_location', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('location/add_location');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('location');
        } else {
            $this->layout->view('add_location_v');
        }
    }

    function edit_location($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_location_M->get_locations($id);
        $this->layout->view('add_location_v',$data);
    }

    function edit_locations($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
          $data = array('location_name' => $this->input->post('location_name'));
            
            $this->Obj_location_M->update_location($data,$id);
            $location_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('location/' . $location_id)) {
//                    mkdir('location/' . $location_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/new/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('vehicle_id', $location_id);
                    $this->db->update('vehicle_location', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('location/add_location');
                }
            }
            $this->session->set_flashdata('message', 'Updatedd Successfully');
            redirect('location');
        } else {
            redirect('location');
        }
    }

    function delete_location($id) {
        $this->db->delete('location', array('location_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('location');
    }   
}?>
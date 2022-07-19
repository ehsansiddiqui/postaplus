<?php
class User extends CI_Controller {

    function User() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('user_m', 'Obj_user_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_user_M->get_user();
        $this->layout->view('user_v', $data);
    }

    public function add_user() {

        if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
            $data = array('short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'));
            $this->Obj_user_M->add_user($data);
            $user_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
//                if (!is_dir('user/' . $user_id)) {
//                    mkdir('user/' . $user_id, 0777, true);
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
                    $this->db->where('vehicle_id', $user_id);
                    $this->db->update('vehicle_user', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('user/add_user');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('user');
        } else {
            $this->layout->view('add_user_v');
        }
    }

    function edit_user($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_user_M->get_users($id);
        $this->layout->view('add_user_v',$data);
    }

    function edit_users($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
          $data = array('short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'));
            
            $this->Obj_user_M->update_user($data,$id);
            $user_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('user/' . $user_id)) {
//                    mkdir('user/' . $user_id, 0777, true);
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
                    $this->db->where('vehicle_id', $user_id);
                    $this->db->update('vehicle_user', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('user/add_user');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('user');
        } else {
            redirect('user');
        }
    }

    function delete_user($id) {
        $this->db->delete('vehicle_user', array('vehicle_id' => $id));
        $this->session->set_flashdata('message', 'Delete Successfully');
        redirect('user');
    }   
}?>
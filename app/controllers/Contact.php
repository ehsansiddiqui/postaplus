<?php
class Contact extends CI_Controller {

    function Contact() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('contact_m', 'Obj_contact_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_contact_M->get_contact();
        $this->layout->view('contact_v', $data);
    }

    public function add_contact() {
        
         $data['state'] = $this->Obj_contact_M->get_state();
        

        if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
            $data = array('state_id' => $this->input->post('state_id'),
                'contact_name' => $this->input->post('contact_name'),
                'cm_date' => $date);
            $this->Obj_contact_M->add_contact($data);
            $contact_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
//                if (!is_dir('contact/' . $contact_id)) {
//                    mkdir('contact/' . $contact_id, 0777, true);
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
                    $this->db->where('vehicle_id', $contact_id);
                    $this->db->update('vehicle_contact', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('contact/add_contact');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('contact');
        } else {
            $this->layout->view('add_contact_v',$data);
        }
    }

    function edit_contact($id = NULL){
        $data['state'] = $this->Obj_contact_M->get_state();
        $data["id"] = $id;
        $data['result'] = $this->Obj_contact_M->get_contacts($id);
        $this->layout->view('add_contact_v',$data);
    }

    function edit_contacts($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
            $data = array('state_id' => $this->input->post('state_id'),
                'contact_name' => $this->input->post('contact_name'),
                'cm_date' => $date);
            
            $this->Obj_contact_M->update_contact($data,$id);
            $contact_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('contact/' . $contact_id)) {
//                    mkdir('contact/' . $contact_id, 0777, true);
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
                    $this->db->where('vehicle_id', $contact_id);
                    $this->db->update('vehicle_contact', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('contact/add_contact');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('contact');
        } else {
            redirect('contact');
        }
    }

    function delete_contact($id) {
        $this->db->delete('contact', array('contact_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('contact');
    }   
}?>
<?php
class Service_booking extends CI_Controller {

    function Service_booking() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('service_booking_m', 'Obj_service_booking_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_service_booking_M->get_service_booking();
        $this->layout->view('service_booking_v', $data);
    }

    public function add_service_booking() {
        
     
        

        if ($this->input->post('submit')) {
            
            $date = date('Y-m-d h:i:s', time());
            $data = array('title' => $this->input->post('title'),
                'description' => $this->input->post('description'), 
                'date' => date('Y-m-d',  strtotime($this->input->post('dates'))));
            
            $this->Obj_service_booking_M->add_service_booking($data);
            $service_booking_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
//                if (!is_dir('service_booking/' . $service_booking_id)) {
//                    mkdir('service_booking/' . $service_booking_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/service_booking',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('image' => $file_name,'detail_image'=>$file_name);
                    $this->db->where('service_booking_id', $service_booking_id);
                    $this->db->update('service_booking', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('service_booking/add_service_booking');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('service_booking');
        } else {
            $this->layout->view('add_service_booking_v');
        }
    }

    function edit_service_booking($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_service_booking_M->get_service_bookings($id);
        $this->layout->view('add_service_booking_v',$data);
    }

    function edit_service_bookings($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
         $data = array('title' => $this->input->post('title'),
                'description' => $this->input->post('description'), 
                'date' => date('Y-m-d',  strtotime($this->input->post('dates'))));
         
//            print_r($data);die;
         
            $this->Obj_service_booking_M->update_service_booking($data,$id);
            
            $service_booking_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('service_booking/' . $service_booking_id)) {
//                    mkdir('service_booking/' . $service_booking_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/service_booking',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('image' => $file_name,'detail_image'=>$file_name);
                    $this->db->where('service_booking_id', $service_booking_id);
                    $this->db->update('service_booking', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('service_booking/add_service_booking');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('service_booking');
        } else {
            redirect('service_booking');
        }
    }

    function delete_service_booking($id) {
        $this->db->delete('service_booking', array('service_booking_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('service_booking');
    }   
}?>
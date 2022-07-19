<?php
class Events extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('events_m', 'Obj_events_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        
        $data['result'] = $this->Obj_events_M->get_events();
        $this->layout->view('events_v', $data);
    }

    public function add_events() {
        
     
        

        if ($this->input->post('submit')) {
            
            $date = date('Y-m-d h:i:s', time());
            $data = array('title' => $this->input->post('title'),
                'description' => $this->input->post('description'), 
                'date' => date('Y-m-d',  strtotime($this->input->post('dates'))));
            
            $this->Obj_events_M->add_events($data);
            $events_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
//                if (!is_dir('events/' . $events_id)) {
//                    mkdir('events/' . $events_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/events',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('image' => $file_name,'detail_image'=>$file_name);
                    $this->db->where('events_id', $events_id);
                    $this->db->update('events', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('events/add_events');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('events');
        } else {
            $this->layout->view('add_events_v');
        }
    }

    function edit_events($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_events_M->get_eventss($id);
        $this->layout->view('add_events_v',$data);
    }

    function edit_eventss($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
         $data = array('title' => $this->input->post('title'),
                'description' => $this->input->post('description'), 
                'date' => date('Y-m-d',  strtotime($this->input->post('dates'))));
         
//            print_r($data);die;
         
            $this->Obj_events_M->update_events($data,$id);
            
            $events_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('events/' . $events_id)) {
//                    mkdir('events/' . $events_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/events',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('image' => $file_name,'detail_image'=>$file_name);
                    $this->db->where('events_id', $events_id);
                    $this->db->update('events', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('events/add_events');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('events');
        } else {
            redirect('events');
        }
    }

    function delete_events($id) {
        $this->db->delete('event', array('event_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('events');
    }   
}?>
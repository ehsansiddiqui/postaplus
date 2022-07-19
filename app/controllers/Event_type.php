<?php

class Event_type extends CI_Controller {
    
    
    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('event_type_m','Obj_Event_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date =  date('Y-m-d');

    }

    public function index(){
        $data['result'] = $this->Obj_Event_Type_M->get_all_event_type();
        $this->layout->view('event_type_v', $data);
    }

    public function add(){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');

            $result = $this->Obj_Event_Type_M->check_event_type($this->input->post('event_type'));

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('event_type');
                
            } else {
                
                $data = array('event_type_name' => $this->input->post('event_type'),
                    'created_date' => $date,'modified_date'=>$date);
                $this->Obj_Event_Type_M->add_event_type($data);
                $this->session->set_flashdata('message', 'Insert Sueccessfully');
                redirect('event_type');
            }
        }
        
        $this->layout->view('add_event_type_v');
    }

    public function edit($id = ''){
        $data['result'] = $this->Obj_Event_Type_M->get_event_types($id);
        $data['id'] = $id;
        $this->layout->view('add_event_type_v', $data);
    }

    public function edit_1($id = '') {

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $result = $this->Obj_Event_Type_M->check_event_type($this->input->post('event_type'));
            if (!empty($result)){
                $this->session->set_flashdata('message', 'Already Exist');
            } else {
             $data = array('event_type_name' => $this->input->post('event_type'),
                    'created_date' => $date,'modified_date'=>$date);
             
                $this->Obj_Event_Type_M->update_event_type($data, $id);
                
                $this->session->set_flashdata('message', 'Update Sueccessfully');
            }
        }
        redirect('event_type');
    }

    public function delete($id){
        $this->db->delete('event_type', array('event_type_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('event_type');
    }

}?>
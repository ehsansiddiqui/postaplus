<?php

class Racing_type extends CI_Controller {
    
    
    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('racing_type_m','Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        // date_default_timezone_set('Asia/Kuwait');
        date_default_timezone_set('Asia/Kuwait');
        $this->date =  date('Y-m-d');

    }

    public function index(){
        $data['result'] = $this->Obj_Track_Type_M->get_all_racing_type();
        $this->layout->view('racing_type_v', $data);
    }

    public function add(){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_racing_type($this->input->post('racing_type'));

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('racing_type');
                
            } else {
                
                $data = array('racing_type_name' => $this->input->post('racing_type'),
                    'created_date' => $date,'modified_date'=>$date);
                $this->Obj_Track_Type_M->add_racing_type($data);
                $this->session->set_flashdata('message', 'Insert Sueccessfully');
                redirect('racing_type');
            }
        }
        
        $this->layout->view('add_racing_type_v');
    }

    function edit($id = ''){
        $data['result'] = $this->Obj_Track_Type_M->get_racing_types($id);
        $data['id'] = $id;
        $this->layout->view('add_racing_type_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_racing_type($this->input->post('racing_type'));
            if (!empty($result)){
                $this->session->set_flashdata('message', 'Already Exist');
            } else {
             $data = array('racing_type_name' => $this->input->post('racing_type'),
                    'created_date' => $date,'modified_date'=>$date);
             
                $this->Obj_Track_Type_M->update_racing_type($data, $id);
                
                $this->session->set_flashdata('message', 'Update Sueccessfully');
            }
        }
        redirect('racing_type');
    }

    function delete($id){
        $this->db->delete('racing_type', array('racing_type_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('racing_type');
    }

}?>
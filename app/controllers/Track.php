<?php

class Track extends CI_Controller {
    
    
    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('track_m','Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date =  date('Y-m-d');

    }

    function index(){
        $data['result'] = $this->Obj_Track_Type_M->get_all_track();
        $this->layout->view('track_v', $data);
    }

    function add(){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_track($this->input->post('track'));

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('track');
                
            } else {
                
                $data = array('track_name' => $this->input->post('track'),
                    'created_date' => $date,'modified_date'=>$date);
                $this->Obj_Track_Type_M->add_track($data);
                $this->session->set_flashdata('message', 'Insert Sueccessfully');
                redirect('track');
            }
        }
        
        $this->layout->view('add_track_v');
    }

    function edit($id = ''){
        $data['result'] = $this->Obj_Track_Type_M->get_tracks($id);
        $data['id'] = $id;
        $this->layout->view('add_track_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_track($this->input->post('track'));
            if (!empty($result)){
                $this->session->set_flashdata('message', 'Already Exist');
            } else {
             $data = array('track_name' => $this->input->post('track'),
                    'created_date' => $date,'modified_date'=>$date);
             
                $this->Obj_Track_Type_M->update_track($data, $id);
                
                $this->session->set_flashdata('message', 'Update Sueccessfully');
            }
        }
        redirect('track');
    }

    function delete($id){
        $this->db->delete('track_details', array('track_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('track');
    }

}?>
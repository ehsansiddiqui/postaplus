<?php

class User_details extends CI_Controller {
    
    
    function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('user_details_m','Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date =  date('Y-m-d');

    }

    function index(){  
        
        $data['result'] = $this->Obj_Track_Type_M->get_all_user_details();
        $this->layout->view('user_details_v', $data);
    }

    function add(){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_user_details($this->input->post('user_details'));

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('user_details');
                
            } else {
                
                $data = array('user_details_name' => $this->input->post('user_details'),
                    'created_date' => $date,'modified_date'=>$date);
                $this->Obj_Track_Type_M->add_user_details($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('user_details');
            }
        }
        
        $this->layout->view('add_user_details_v');
    }

    function edit($id = ''){
        $data['result'] = $this->Obj_Track_Type_M->get_user_detailss($id);
        $data['id'] = $id;
        $this->layout->view('add_user_details_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_user_details($this->input->post('user_details'));
            if (!empty($result)){
                $this->session->set_flashdata('message', 'Already Exist');
            } else {
             $data = array('user_details_name' => $this->input->post('user_details'),
                    'created_date' => $date,'modified_date'=>$date);
             
                $this->Obj_Track_Type_M->update_user_details($data, $id);
                
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('user_details');
    }

    function delete($id){
        $this->db->delete('user_details', array('user_details_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('user_details');
    }
    
    function details($user_id){
        
        $data['result'] = $this->Obj_Track_Type_M->get_details($user_id);
        $this->layout->view('details_v', $data);
        
        
    }
}?>
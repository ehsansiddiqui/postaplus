<?php

class Activity_type extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('activity_type_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        // date_default_timezone_set('Asia/Kuwait');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        
        
        
        
         if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
            
        }
        
         
    }

    function index() {

        $data['result'] = $this->Obj_Track_Type_M->get_all_activity_type();
        $this->layout->view('activity_type_v', $data);
    }

    function add() {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_activity_type($this->input->post('activity_type'));

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('activity_type');
            } else {

                $data = array('activity_name' => $this->input->post('activity_type'), 'activity_description' => $this->input->post('activity_description'),
                    'created_date' => $date, 'modified_date' => $date);
                $this->Obj_Track_Type_M->add_activity_type($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('activity_type');
            }
        }

        $this->layout->view('add_activity_type_v');
    }

    function edit($id = ''){

        $data['result'] = $this->Obj_Track_Type_M->get_activity_types($id);
        $data['id'] = $id;
        $this->layout->view('add_activity_type_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_activity_type($this->input->post('activity_type'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else { 
                $data = array('activity_name' => $this->input->post('activity_type'), 'activity_description' => $this->input->post('activity_description'),
                    'created_date' => $date, 'modified_date' => $date);
                $this->Obj_Track_Type_M->update_activity_type($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('activity_type');
    }

    function delete($activity_id){
             
        $class_ids=$this->Obj_Track_Type_M->select_class($activity_id);
        
            foreach($class_ids as $row){
                   $this->db->delete('class_info', array('class_id' => $row->studio_classes_class_id));
                   $this->db->delete('class_booking', array('class_id' => $row->studio_classes_class_id));
               }
        $this->db->delete('studio_classes', array('activity_id' => $activity_id));
        $this->db->delete('studio_activity', array('activity_id' => $activity_id));      
        $this->db->delete('activity_type', array('activity_id' => $activity_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('activity_type');
    }
    
    
    

    public function studio_class_activity() {
        
       

        $data = array();
        $data['result'] = $this->Obj_Track_Type_M->get_activity_type($this->session->userdata('studio_id'));
        $this->layout->view('activity_type_class', $data);
    }

    function add_class_activity() {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_activity_type_add($this->input->post('activity_type'));

            if (!empty($result)) {
                $result1 = $this->Obj_Track_Type_M->check_activity_class_type_add($this->input->post('activity_type'));
                if (!empty($result1)) {

                    $this->session->set_flashdata('message1', 'Already Exist');
                } else {

                    $data = array('activity_id' => $result[0]->activity_id, 'studio_id' => $this->session->userdata('studio_id'));
                    $this->Obj_Track_Type_M->add_activity_type_class_new($data);
                    $this->session->set_flashdata('message', 'Inserted Successfully');
                    redirect('activity_type/studio_class_activity');
                }
            } else {

                $data = array('activity_name' => $this->input->post('activity_type'), 'activity_description' => $this->input->post('activity_description'), 'created_date' => $date, 'modified_date' => $date);
                $this->Obj_Track_Type_M->add_activity_type_class($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('activity_type/studio_class_activity');
            }
        }
        $data['activity'] = $this->Obj_Track_Type_M->get_all_activity();

        $this->layout->view('add_activity_type_class',$data);
    }

    function edit_class_activity($studio_activity_acitivity_id = '',$activity_id = '') {
        
                $data['activity'] = $this->Obj_Track_Type_M->get_all_activity();

       
        $data['result'] = $this->Obj_Track_Type_M->get_activity_type_studio($studio_activity_acitivity_id);
        $data['studio_activity_acitivity_id'] = $studio_activity_acitivity_id;
                $data['activity_id'] = $activity_id;

        $this->layout->view('add_activity_type_class', $data);
    }

    function edit_1_class_activity($studio_activity_acitivity_id = '',$activity_id = '') {
        
        if ($this->input->post('submit')) {

            $date = date('Y-m-d');



       $result = $this->Obj_Track_Type_M->check_activity_type_class($this->input->post('activity_type'), $studio_activity_acitivity_id);

            if (!empty($result)) {
                
                $result1 = $this->Obj_Track_Type_M->check_activity_class_type_add($this->input->post('activity_type'));
                if (!empty($result1)) {

                    $this->session->set_flashdata('message1', 'Already Exist');
                    
                    
                } else {





                    $activity_name = $this->Obj_Track_Type_M->escapeString($this->input->post('activity_type'));
                    $activity_description = $this->Obj_Track_Type_M->escapeString(htmlentities($this->input->post('activity_description')));
                    
                    $this->Obj_Track_Type_M->update_activity_type_class($activity_name, $activity_description, $studio_activity_acitivity_id);
                    
                    
                    
                    $this->session->set_flashdata('message', 'Updated Successfully');
                }
                
                
            } else {
                
                
                
                $data = array('activity_name' => $this->input->post('activity_type'), 'activity_description' => $this->input->post('activity_description'), 'created_date' => $date, 'modified_date' => $date);
                $insert_id = $this->Obj_Track_Type_M->add_activity_type_new($data);

                $this->Obj_Track_Type_M->update_activity_type_class_new($insert_id, $studio_activity_acitivity_id);
                $this->session->set_flashdata('message', 'Updated Successfully');
                
                
            }
            
            redirect('activity_type/studio_class_activity');
        }
    }

    function delete_class_activity($studio_activity_acitivity_id,$activity_id){
        
        $studio_id = $this->session->userdata('studio_id');
        
        $class_ids=$this->Obj_Track_Type_M->select_class_id($studio_id, $activity_id);
        foreach($class_ids as $row){
            
                    $this->db->delete('class_info', array('class_id' => $row->studio_classes_class_id));
                   $this->db->delete('class_booking', array('class_id' => $row->studio_classes_class_id,'studio_id' => $studio_id));
               }
            
        $this->db->delete('studio_classes', array('activity_id' => $activity_id,'studio_id' => $studio_id));
        $this->db->delete('studio_activity', array('studio_activity_acitivity_id' => $studio_activity_acitivity_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('activity_type/studio_class_activity');
    }

}

?>
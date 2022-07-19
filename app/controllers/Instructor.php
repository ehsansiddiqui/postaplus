<?php

class Instructor extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('instructor_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
  
         if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
         }
    }

    function index() {
        $data['result'] = $this->Obj_Track_Type_M->get_all_instructors();
        $this->layout->view('studio_class_instructor', $data);
    }
     public function instructor() {

        $data = array();
        $data['result'] = $this->Obj_Track_Type_M->get_instructors();
        $this->layout->view('instructor', $data);
    }

    public function studio_instructor() {

        $data = array();
        $data['result'] = $this->Obj_Track_Type_M->get_studio_instructor($this->session->userdata('studio_id'));
        $this->layout->view('studio_class_instructor', $data);
    }

    public function studio_class_location() {

        $data = array();
        $data['result'] = $this->Obj_Track_Type_M->get_studio_class_location($this->session->userdata('studio_id'));
        $this->layout->view('studio_class_location', $data);
    }

    public function edit_studio_class_instructor($studio_instructor_id = '',$instructor_id = '') {
        
        
        $data['result'] = $this->Obj_Track_Type_M->get_instructor_studio($studio_instructor_id);
        $data['studio_instructor_id'] = $studio_instructor_id;
        $data['instructor_id'] = $instructor_id;
        $this->layout->view('add_studio_class_instructor', $data);
    }
    public function edit_instructor($instructor_id = '') {
        
        
        $data['result'] = $this->Obj_Track_Type_M->get_instructor($instructor_id);
        $data['instructor_id'] = $instructor_id;
        $this->layout->view('add_instructor', $data);
    }
    
    public function update_studio_class_instructor($studio_instructor_id = '',$instructor_id = '') {

        if ($this->input->post('submit')) {

          

                    $instructor_name = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_name'));
                    
                    $instructor_email = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_email'));
                    $instructor_phone = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_phone'));
                    
                    $instructor_experinece = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_experinece'));
                    $instructor_description = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_description'));
                    $instructor_price_per_hour = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_price_per_hour'));
//                    $activity_name = $this->Obj_Track_Type_M->escapeString($this->input->post('activity_name'));
//                    $activity_name = $this->Obj_Track_Type_M->escapeString($this->input->post('activity_name'));


                $this->Obj_Track_Type_M->update_studio_class_instructor($instructor_name,$instructor_email,$instructor_phone,$instructor_experinece,$instructor_description,$instructor_price_per_hour,$studio_instructor_id);
                
                
                if (!empty($_FILES['userfile']['name'])){

               
                $this->load->helper(array('image_helper'));
                
                
                $config = array(
                    'upload_path' => './instructor/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('instructor_image' => $file_name);
                    
                    $this->db->where('instructor_id', $instructor_id);
                    $this->db->update('instructor', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());  
                    $this->session->set_flashdata('message1', $error['error']);
                    redirect('instructor/studio_instructor');
                }
            }
                
                
                
                
                
                $this->session->set_flashdata('message', 'Updated Successfully');
                        redirect('instructor/studio_instructor');

                    $this->layout->view('add_studio_class_instructor', $data);

        }

    }
    

    public function insert_studio_class_instructor() {

        if ($this->input->post('submit')) {
            
             $result = $this->Obj_Track_Type_M->check_instructor($this->input->post('instructor_email'),$this->input->post('instructor_phone'));

            if (!empty($result)) {
                
          $result1 = $this->Obj_Track_Type_M->check_instructor_studio($this->input->post('instructor_email'),$this->input->post('instructor_phone'));
          //print_r($result1);die;      
                if (!empty($result1)) {

                    $this->session->set_flashdata('message1', 'Already Exist');
                } else {

                    $data = array('instructor_id' => $result[0]->instructor_id, 'studio_id' => $this->session->userdata('studio_id'));
                    $this->Obj_Track_Type_M->add_studio_class_new($data);
                    $this->session->set_flashdata('message', 'Inserted Successfully');
                    redirect('instructor/studio_instructor');

                }
            } else  {





            $data = array('instructor_name' => $this->input->post('instructor_name'),
                'instructor_email' => $this->input->post('instructor_email'),
                    'instructor_phone' => $this->input->post('instructor_phone'),
                'instructor_experinece' => $this->input->post('instructor_experinece'),
                'instructor_description' => $this->input->post('instructor_description'),
                'instructor_price_per_hour' => $this->input->post('instructor_price_per_hour'));



           $instructor_id = $this->Obj_Track_Type_M->insert_studio_class_instructor($data);
            
            
                    
            if (!empty($_FILES['userfile']['name'])) {

               
                $this->load->helper(array('image_helper'));
                
                
                $config = array(
                    'upload_path' => './instructor/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('instructor_image' => $file_name);
                    $this->db->where('instructor_id', $instructor_id);
                    $this->db->update('instructor', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());  
                    $this->session->set_flashdata('message1', $error['error']);
                  redirect('instructor/studio_instructor');
                }
            }
            
            
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('instructor/studio_instructor');

        }
        }
                            $this->layout->view('add_studio_class_instructor');
    
    }

    function delete_studio_class_instructor($studio_instructor_id,$instructor_id) {
//      $this->db->delete('instructor', array('instructor_id' => $instructor_id));
        $this->db->delete('studio_instructor', array('studio_instructor_id' => $studio_instructor_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('instructor/instructor');
    }
     public function insert_instructor() {

        if ($this->input->post('submit')) {
            
             $result = $this->Obj_Track_Type_M->check_instructor($this->input->post('instructor_email'),$this->input->post('instructor_phone'));

            if (!empty($result)) {
               
               

                    $this->session->set_flashdata('message1', 'Already Exist');
                redirect('instructor/instructor');
            } else  {





            $data = array('instructor_name' => $this->input->post('instructor_name'),
                'instructor_email' => $this->input->post('instructor_email'),
                    'instructor_phone' => $this->input->post('instructor_phone'),
                'instructor_experinece' => $this->input->post('instructor_experinece'),
                'instructor_description' => $this->input->post('instructor_description'),
                'instructor_price_per_hour' => $this->input->post('instructor_price_per_hour'));



           $instructor_id = $this->Obj_Track_Type_M->insert_instructor($data);
            
            
                    
            if (!empty($_FILES['userfile']['name'])) {

               
                $this->load->helper(array('image_helper'));
                
                
                $config = array(
                    'upload_path' => './instructor/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('instructor_image' => $file_name);
                    $this->db->where('instructor_id', $instructor_id);
                    $this->db->update('instructor', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());  
                    $this->session->set_flashdata('message1', $error['error']);
                  redirect('instructor/instructor');
                }
            }
            
            
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('instructor/instructor');

        }
        }
                  $this->layout->view('add_instructor');
    
    }
    
     public function update_instructor($instructor_id = '') {

        if ($this->input->post('submit')) {

          

                    $instructor_name = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_name'));               
                    $instructor_email = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_email'));
                    $instructor_phone = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_phone'));                   
                    $instructor_experinece = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_experinece'));
                    $instructor_description = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_description'));
                    $instructor_price_per_hour = $this->Obj_Track_Type_M->escapeString($this->input->post('instructor_price_per_hour'));
//                  $activity_name = $this->Obj_Track_Type_M->escapeString($this->input->post('activity_name'));
//                  $activity_name = $this->Obj_Track_Type_M->escapeString($this->input->post('activity_name'));


                $this->Obj_Track_Type_M->update_instructor($instructor_name,$instructor_email,$instructor_phone,$instructor_experinece,$instructor_description,$instructor_price_per_hour,$instructor_id);
                
                
                if (!empty($_FILES['userfile']['name'])){

               
                $this->load->helper(array('image_helper'));
                
                
                $config = array(
                    'upload_path' => './instructor/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('instructor_image' => $file_name);
                    
                    $this->db->where('instructor_id', $instructor_id);
                    $this->db->update('instructor', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());  
                    $this->session->set_flashdata('message1', $error['error']);
                    redirect('instructor/studio_instructor');
                }
            }
                
                
                
                
                
                $this->session->set_flashdata('message', 'Updated Successfully');
                        redirect('instructor/instructor');

                    $this->layout->view('add_instructor', $data);

        }

    }
    


    function delete_instructor($instructor_id){
        
       $this->db->delete('instructor', array('instructor_id' => $instructor_id));
       $this->db->delete('studio_instructor', array('instructor_id' => $instructor_id));
       $this->db->delete('instructor_activity', array('instructor_id' => $instructor_id));
       $this->db->delete('instructor_booking', array('instructor_id' => $instructor_id));
       $this->db->delete('instructor_location', array('instructor_id' => $instructor_id));
       
       $result = $this->Obj_Track_Type_M->selectclass($instructor_id);
       
       if($result){
          
           
           foreach ($result as $r){
               
                $this->db->delete('class_info', array('class_id' =>$r->class_id));
                $this->db->delete('studio_classes', array('studio_classes_class_id' =>$r->class_id));
           }
           
       }
       
       
       $this->session->set_flashdata('message', 'Deleted Successfully');
       redirect('instructor/instructor');
    }
   
    
     public function disable_image(){
       $instructor_id = $this->Obj_Track_Type_M->escapeString($this->input->get('instructor_id'));
       $this->data['insert'] = $this->Obj_Track_Type_M->disable_image($instructor_id);
        redirect('instructor/studio_instructor');
      
    }
    
    public function disable_image1(){
        
       $instructor_id = $this->Obj_Track_Type_M->escapeString($this->input->get('instructor_id'));
       $this->data['insert'] = $this->Obj_Track_Type_M->disable_image($instructor_id);
       redirect('instructor/instructor');
      
    }
    
}

?>
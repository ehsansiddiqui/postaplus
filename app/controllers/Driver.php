<?php

class Driver extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('driver_m', 'Obj_Driver_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->load->helper('string');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }
    
    private function uploads($userfile){

                   $this->load->helper(array('image_helper'));    
                    $config = array(
                        'upload_path' => './driver/',
                        'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx|txt",
                        'overwrite' => TRUE,'encrypt_name' =>TRUE);
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload($userfile)){      
                        $upload_data = $this->upload->data();
                        return $upload_data ;
                    } else { 
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message1','invalid image');
                        redirect('driver');
                  }      
        }
            
    function index() {
        $data = array();
        $data['result'] = $this->Obj_Driver_M->get_all_driver();
        $this->layout->view('driver_v', $data);
    }
    
    
    function paper() {
        $data = array();
        $data['result'] = array();
        $this->layout->view('driver_v', $data);
    }
    
    
    function category() {
        $data = array();
        $data['result'] = array();
        $this->layout->view('driver_category_v', $data);
    }
    
    function add_papper_category(){
        
        $data = array();
        $data['result'] = $this->Obj_Driver_M->get_all_driver();
        $this->layout->view('add_driver_category_v', $data);
    }
            

    function add() {

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            $authkey = random_string('alnum', 15);
        $result = $this->Obj_Driver_M->check_driver_a($this->Obj_Driver_M->escapeString($this->input->post('phone_number')));
            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('driver');
            }else{

               $data = array('store_id'=>$this->input->post('store_id'),'phone_number' =>$this->Obj_Driver_M->escapeString($this->input->post('phone_number')),'password' =>$this->Obj_Driver_M->escapeString($this->input->post('password')),'first_name' =>$this->Obj_Driver_M->escapeString($this->input->post('first_name')),'last_name' =>$this->Obj_Driver_M->escapeString($this->input->post('last_name')),'email_id' =>$this->Obj_Driver_M->escapeString($this->input->post('email_id')),'address'=>$this->Obj_Driver_M->escapeString($this->input->post('address')),'access_token'=>$authkey,'created_date' => $date, 'modified_date' => $date);
               
               $driver_id = $this->Obj_Driver_M->add_driver($data);
                
                
                if (!empty($_FILES['userfile']['name'])){
                        $userfile = 'userfile';
                        $upload_data = $this->uploads($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('driver_image' => $file_name);
                        $this->db->where('driver_id', $driver_id);
                        $this->db->update('driver_details', $data1);
                }
                
                if (!empty($_FILES['userfile1']['name'])){    
                    $userfile = 'userfile1';
                    $upload_data = $this->uploads($userfile);
                    $file_name =   $upload_data['file_name'];
                    $data1 = array('driver_licence' => $file_name);
                    $this->db->where('driver_id', $driver_id);
                    $this->db->update('driver_details', $data1);  
                 }
                 
                  if (!empty($_FILES['userfile2']['name'])){    
                    $userfile = 'userfile2';
                    $upload_data = $this->uploads($userfile);
                    $file_name =   $upload_data['file_name'];
                    $data1 = array('driver_resume' => $file_name);
                    $this->db->where('driver_id', $driver_id);
                    $this->db->update('driver_details', $data1);  
                 } 
                 
                 
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('driver');
            }
        }
        
        $data = array();
        $data['store'] = $this->Obj_Driver_M->get_all_store();
        $this->layout->view('add_driver_v',$data);
    }

    function edit($id = '') {

        $data = array();
        $data['store'] = $this->Obj_Driver_M->get_all_store();
        $data['result'] = $this->Obj_Driver_M->get_drivers($id);
        $data['id'] = $id;
        $this->layout->view('add_driver_v', $data);
    }

    function edit_1($id = ''){

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
  $result = $this->Obj_Driver_M->check_driver_e($this->Obj_Driver_M->escapeString($this->input->post('phone_number')), $id);

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                
            } else {
   
                $data = array('store_id'=>$this->input->post('store_id'),'phone_number' =>$this->Obj_Driver_M->escapeString($this->input->post('phone_number')),'password' =>$this->Obj_Driver_M->escapeString($this->input->post('password')),'first_name' =>$this->Obj_Driver_M->escapeString($this->input->post('first_name')),'last_name' =>$this->Obj_Driver_M->escapeString($this->input->post('last_name')),'email_id' =>$this->Obj_Driver_M->escapeString($this->input->post('email_id')),'address'=>$this->Obj_Driver_M->escapeString($this->input->post('address')), 'modified_date' => $date);        
                $this->Obj_Driver_M->update_driver($data, $id);
                
                if (!empty($_FILES['userfile']['name'])){
                        $userfile = 'userfile';
                        $upload_data = $this->uploads($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('driver_image' => $file_name);
                        $this->db->where('driver_id', $id);
                        $this->db->update('driver_details', $data1);
                }
                
                if (!empty($_FILES['userfile1']['name'])){    
                    $userfile = 'userfile1';
                    $upload_data = $this->uploads($userfile);
                    $file_name =   $upload_data['file_name'];
                    $data1 = array('driver_licence' => $file_name);
                    $this->db->where('driver_id',$id);
                    $this->db->update('driver_details', $data1);  
                 } 
                
               if (!empty($_FILES['userfile2']['name'])){    
                    $userfile = 'userfile2';
                    $upload_data = $this->uploads($userfile);
                    $file_name =   $upload_data['file_name'];
                    $data1 = array('driver_resume' => $file_name);
                    $this->db->where('driver_id',$id);
                    $this->db->update('driver_details', $data1);  
                 } 
                
                
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('driver');
    }

    function delete($driver_id){

        $data = $this->Obj_Driver_M->get_drivers($driver_id);
//        if(!empty($data->driver_image)){
//        @unlink(base_url().'driver/'.$data->driver_image);
//        }
        $this->db->delete('driver_details', array('driver_id' => $driver_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('driver');
        
    }
    
    
    
   function disable_image($driver_id){
        $data = array('driver_image' =>NULL);
        $this->db->where('driver_id', $driver_id);
        $this->db->update('driver_details', $data);
        redirect('driver');
    }
    
    function disable_licence($driver_id){
        $data = array('driver_licence' =>NULL);
        $this->db->where('driver_id', $driver_id);
        $this->db->update('driver_details', $data);
        redirect('driver');
    }
    
    function disable_resume($driver_id){
        $data = array('driver_resume' =>NULL);
        $this->db->where('driver_id', $driver_id);
        $this->db->update('driver_details', $data);
        redirect('driver');
        
    } 
    
}?>
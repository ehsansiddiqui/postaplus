<?php

class Studio_user extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('studio_user_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
            
         if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
            
        }
        
         
    }

    function index(){

        $data['result'] = $this->Obj_Track_Type_M->get_all_studio_user();
        $this->layout->view('studio_user_v', $data);
    }

    function add(){

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_user($this->input->post('studio_username'));

            if (!empty($result)) {
                
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('studio_user');
                
            } else{

              $data = array('admin_groups_id'=>2,'username' => $this->input->post('studio_username'),'password' => $this->input->post('studio_password'),
                    'created_date' => $date);
              
               // print_r($data);die;
              $user_id =  $this->Obj_Track_Type_M->add_studio_user($data);
              
              $studio_id = $this->input->post('studio_id');
              
              foreach ($studio_id as $st){    
                  $data1 = array('studio_id'=>$st,'user_id'=>$user_id);
                  $this->Obj_Track_Type_M->add_studio_users($data1);
              }
              
               $this->session->set_flashdata('message','Inserted Successfully');          
               redirect('studio_user');
            }
        }
        
        $data = array();
        $data['studio'] = $this->Obj_Track_Type_M->get_studio();
        $this->layout->view('add_studio_user',$data);
    }

    function edit($id = ''){
        
        $data['studio_user'] = $this->Obj_Track_Type_M->studio_users($id);
        $data['studio'] = $this->Obj_Track_Type_M->get_studio();
        $data['res'] = $this->Obj_Track_Type_M->get_studio_users($id);
        $data['id'] = $id;
        $this->layout->view('add_studio_user', $data);
        
    }

    function edit_1($id = ''){

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_studio_user($this->input->post('studio_username'),$id);
            
            if (!empty($result)) {
                
                $this->session->set_flashdata('message1', 'Already Exist');
                
            } else{
                           
            $data = array('admin_groups_id'=>2,'username' => $this->input->post('studio_username'),'password' =>$this->input->post('studio_password'),
                    'created_date' => $date);
            $this->Obj_Track_Type_M->update_studio_user($data, $id);
            
            $this->db->delete('studio_user',array('user_id'=>$id));
            
            $studio_id = $this->input->post('studio_id');
              
              foreach ($studio_id as $st){    
                  $data1 = array('studio_id'=>$st,'user_id'=>$id);
                  $this->Obj_Track_Type_M->add_studio_users($data1);
              } 
            $this->session->set_flashdata('message', 'Updated Successfully');
                                                 
            }
            
        }
        
        redirect('studio_user');
    }

    function delete($id){ 
        
        $this->db->delete('login', array('id' => $id));
        $this->db->delete('studio_user', array('user_id' => $activity_id));      
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('studio_user');
    }
     
}?>
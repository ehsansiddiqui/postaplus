<?php

class Vehicle extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('vehicle_m', 'Obj_Vehicle_M', TRUE);
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
                        'upload_path' => './vehicle/',
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,'encrypt_name' =>TRUE);
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload($userfile)){      
                        $upload_data = $this->upload->data();
                        return $upload_data ;
                    } else { 
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message1','invalid image');
                        redirect('vehicle');
                  }      
        }
            
    function index() {

        $data['result'] = $this->Obj_Vehicle_M->get_all_vehicle();
        $this->layout->view('vehicle_v', $data);
    }
    
    
    function category(){
        $data['result'] = $this->Obj_Vehicle_M->get_all_vehicle();
        $this->layout->view('gift_category_v', $data);
    }

    
    
    function add_giftitem(){
        $data['result'] = $this->Obj_Vehicle_M->get_all_vehicle();
        $this->layout->view('add_giftitem_v', $data);
    }
    
    
    
   function gift_item(){
        $data['result'] = $this->Obj_Vehicle_M->get_all_vehicle();
        $this->layout->view('vehicle_v', $data);
    }

    function add() {

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            $authkey = random_string('alnum', 15);
    $result = $this->Obj_Vehicle_M->check_vehicle_a($this->Obj_Vehicle_M->escapeString($this->input->post('driver_id')));
            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('vehicle');
            }else{

                $Insurance_renewal_date = $this->Obj_Vehicle_M->escapeString($this->input->post('Insurance_renewal_date')); 
                $tax_date = $this->Obj_Vehicle_M->escapeString($this->input->post('tax_date'));
                
                $Insurance_renewal_dates = date('Y-m-d',  strtotime($Insurance_renewal_date));
                $tax_dates = date('Y-m-d',  strtotime($tax_date));
                
                
               $data = array('driver_id'=>$this->input->post('driver_id'),'vehicle_name' =>$this->Obj_Vehicle_M->escapeString($this->input->post('vehicle_name')),'vehicle_type' =>$this->Obj_Vehicle_M->escapeString($this->input->post('vehicle_type')),'vehicle_number' =>$this->Obj_Vehicle_M->escapeString($this->input->post('vehicle_number')),'Insurance_renewal_date' =>$Insurance_renewal_dates,'tax_date' =>$tax_dates,'created_date'=>$date,'modified_date'=>$date);
               
               $vehicle_id = $this->Obj_Vehicle_M->add_vehicle($data);
                
                
                if (!empty($_FILES['userfile']['name'])){
                        $userfile = 'userfile';
                        $upload_data = $this->uploads($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('vehicle_image' => $file_name);
                        $this->db->where('vehicle_id', $vehicle_id);
                        $this->db->update('vehicle', $data1);
                }
                
                if (!empty($_FILES['userfile1']['name'])){    
                    $userfile = 'userfile1';
                    $upload_data = $this->uploads($userfile);
                    $file_name =   $upload_data['file_name'];
                    $data1 = array('rc_book' => $file_name);
                    $this->db->where('vehicle_id', $vehicle_id);
                    $this->db->update('vehicle', $data1);  
                 }
                 
                  if (!empty($_FILES['userfile2']['name'])){    
                    $userfile = 'userfile2';
                    $upload_data = $this->uploads($userfile);
                    $file_name =   $upload_data['file_name'];
                    $data1 = array('insurance' => $file_name);
                    $this->db->where('vehicle_id', $vehicle_id);
                    $this->db->update('vehicle', $data1);  
                 } 
                 
                 
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('vehicle');
            }
        }
        
        $data = array();
        $data['driver'] = $this->Obj_Vehicle_M->get_all_driver();
        $this->layout->view('add_vehicle_v',$data);
    }

    function edit($id = '') {

        $data = array();
        $data['driver'] = $this->Obj_Vehicle_M->get_all_driver();
        $data['result'] = $this->Obj_Vehicle_M->get_vehicles($id);
        $data['id'] = $id;
        $this->layout->view('add_vehicle_v', $data);
    }

    function edit_1($id = ''){

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
  $result = $this->Obj_Vehicle_M->check_vehicle_e($this->Obj_Vehicle_M->escapeString($this->input->post('driver_id')), $id);

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                
            } else {
   
                
                $Insurance_renewal_date = $this->Obj_Vehicle_M->escapeString($this->input->post('Insurance_renewal_date')); 
                $tax_date = $this->Obj_Vehicle_M->escapeString($this->input->post('tax_date'));
                $Insurance_renewal_dates = date('Y-m-d',  strtotime($Insurance_renewal_date));
                $tax_dates = date('Y-m-d',  strtotime($tax_date));
                
                
                $data = array('driver_id'=>$this->input->post('driver_id'),'vehicle_name' =>$this->Obj_Vehicle_M->escapeString($this->input->post('vehicle_name')),'vehicle_type' =>$this->Obj_Vehicle_M->escapeString($this->input->post('vehicle_type')),'vehicle_number' =>$this->Obj_Vehicle_M->escapeString($this->input->post('vehicle_number')),'Insurance_renewal_date' =>$Insurance_renewal_dates,'tax_date' =>$tax_dates,'modified_date'=>$date);
                
               
                
                
                $this->Obj_Vehicle_M->update_vehicle($data, $id);
                
                if (!empty($_FILES['userfile']['name'])){
                        $userfile = 'userfile';
                        $upload_data = $this->uploads($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('vehicle_image' => $file_name);
                        $this->db->where('vehicle_id', $id);
                        $this->db->update('vehicle', $data1);
                }
                
                if (!empty($_FILES['userfile1']['name'])){    
                    $userfile = 'userfile1';
                    $upload_data = $this->uploads($userfile);
                    $file_name =   $upload_data['file_name'];
                    $data1 = array('rc_book' => $file_name);
                    $this->db->where('vehicle_id',$id);
                    $this->db->update('vehicle', $data1);  
                 } 
                
               if (!empty($_FILES['userfile2']['name'])){    
                    $userfile = 'userfile2';
                    $upload_data = $this->uploads($userfile);
                    $file_name =   $upload_data['file_name'];
                    $data1 = array('insurance' => $file_name);
                    $this->db->where('vehicle_id',$id);
                    $this->db->update('vehicle', $data1);  
                 } 
                
                
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('vehicle');
    }

    function delete($vehicle_id){

        $data = $this->Obj_Vehicle_M->get_vehicles($vehicle_id);
//        if(!empty($data->vehicle_image)){
//        @unlink(base_url().'vehicle/'.$data->vehicle_image);
//        }
        $this->db->delete('vehicle', array('vehicle_id' => $vehicle_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('vehicle');
        
    }
    
    
    
   function disable_image($vehicle_id){
        $data = array('vehicle_image' =>NULL);
        $this->db->where('vehicle_id', $vehicle_id);
        $this->db->update('vehicle', $data);
        redirect('vehicle');
    }
    
    function disable_licence($vehicle_id){
        $data = array('rc_book' =>NULL);
        $this->db->where('vehicle_id', $vehicle_id);
        $this->db->update('vehicle', $data);
        redirect('vehicle');
    }
    
    function disable_resume($vehicle_id){
        $data = array('insurance' =>NULL);
        $this->db->where('vehicle_id', $vehicle_id);
        $this->db->update('vehicle', $data);
        redirect('vehicle');
        
    } 
    
}?>
<?php

class Attributes extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('attributes_m', 'Obj_Attributes_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        // date_default_timezone_set('Asia/Kuwait');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }
    
    
    function attributes_group(){
        
        $data = array();
        $data['result'] = $this->Obj_Attributes_M->get_all_attributes_group();
        $this->layout->view('attributes_group_v', $data);
        
    }
    
    
    
  function add_attributes_group(){
      
        if ($this->input->post('submit')){
                   
        $date = date('Y-m-d H:i:s');     
        $result = $this->Obj_Attributes_M->check_attributes_group_a($this->Obj_Attributes_M->escapeString($this->input->post('attributes_group_name')));
        
            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                
            }else{
                
    $attributes_group_name = $this->input->post('attributes_group_name');
    $attributes_group_name_ar = $this->input->post('attributes_group_name_ar');

            
    $data = array('attr_group_name'=>$attributes_group_name,'ar_attr_group_name'=>$attributes_group_name_ar,'createde_date'=>$date);    
    $attributes_group_id = $this->Obj_Attributes_M->add_attributes_group($data);         
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('attributes/attributes_group');
            
            }
        }
        $data = array();
        $this->layout->view('add_attributes_group_v',$data);
    }
    
   
   
    function edit_attributes_group($attributes_group_id){    
        $data['result'] = $this->Obj_Attributes_M->get_attributes_group($attributes_group_id);
        $data['id'] = $attributes_group_id;
        $this->layout->view('add_attributes_group_v', $data);
    }

    function edit_1_attributes_group($id){

      if($this->input->post('submit')){

    $date = date('Y-m-d');
    $result = $this->Obj_Attributes_M->check_attributes_group_e($this->input->post('attributes_group_name'), $id);

            if (!empty($result)){
                $this->session->set_flashdata('message1', 'Already Exist');
            } else{
                
           $attributes_group_name = $this->input->post('attributes_group_name');
           $attributes_group_name_ar = $this->input->post('attributes_group_name_ar');
      $data = array('attr_group_name'=>$attributes_group_name,'ar_attr_group_name'=>$attributes_group_name_ar); 
           $this->Obj_Attributes_M->update_attributes_group($data, $id);
           
           
           $this->session->set_flashdata('message', 'Updated Successfully');

            }
        }
       redirect('attributes/attributes_group');
    }

    function delete_attributes_group($attributes_group_id){
        
    $this->db->delete('attributes_group', array('attributes_group_id'=>$attributes_group_id));
    $this->session->set_flashdata('message', 'Deleted Successfully');
    redirect('attributes/attributes_group');
    
    }
    
    
    function view_attributes($attributes_group_id){  
        $data = array();  
        $data['result'] = $this->Obj_Attributes_M->get_attributes_by_group($attributes_group_id);
        $this->layout->view('attributes_by_group_v', $data);
    }
    
    
     function attributes(){  
        $data = array();  
        $data['result'] = $this->Obj_Attributes_M->get_all_attributes();
        $this->layout->view('attributes_v', $data);
    }
    
    
    function add_attributes(){
        
        
       if($this->input->post('submit')){
                   
        $date = date('Y-m-d H:i:s');  
        $attributes_group_id = $this->Obj_Attributes_M->escapeString($this->input->post('attributes_group_id'));
        $attributes_name =     $this->input->post('attributes_name');
        $attributes_name_ar =     $this->input->post('attributes_name_ar');    
        $data = array('attributes_group_id'=>$attributes_group_id,'atr_name'=>$attributes_name,'ar_atr_name'=>$attributes_name_ar,'createde_date'=>$date,'modified_date'=>$date);    
        $attributes_id = $this->Obj_Attributes_M->add_attributes($data);
    
       $this->session->set_flashdata('message', 'Inserted Successfully');
         redirect('attributes/attributes');

        }
           
        $data = array();  
        $data['result'] = $this->Obj_Attributes_M->get_attr();
        $this->layout->view('add_attributes_v', $data);
    }
    
    
    
    
    function attributes_edit($attributes_id){
        
        $data['res'] = $this->Obj_Attributes_M->get_attributes_edit($attributes_id);
        $data['result'] = $this->Obj_Attributes_M->get_attr();
        $data['id'] = $attributes_id;
        $this->layout->view('add_attributes_v', $data);
        
        
    }
            
    
    function edit_1_attributes($id){
        
        
    if($this->input->post('submit')){
                   
        $date = date('Y-m-d H:i:s');  
        $attributes_group_id = $this->Obj_Attributes_M->escapeString($this->input->post('attributes_group_id'));
        $attributes_name =     $this->input->post('attributes_name');
        $attributes_name_ar =     $this->input->post('attributes_name_ar');      
        $data = array('attributes_group_id'=>$attributes_group_id,'atr_name'=>$attributes_name,'ar_atr_name'=>$attributes_name_ar,'createde_date'=>$date,'modified_date'=>$date);    
       $this->Obj_Attributes_M->update_attributes($data,$id);                 
       $this->session->set_flashdata('message', 'Updated Successfully');
        redirect('attributes/attributes');

        } 
        
        $data = array();  
        $data['result'] = $this->Obj_Attributes_M->get_attr();
        $this->layout->view('add_attributes_v', $data);
    }
    
    
    
    function attributes_delete($attributes_id){
        
    $this->db->delete('attributes', array('attributes_id'=>$attributes_id));
    $this->session->set_flashdata('message', 'Deleted Successfully');
    redirect('attributes/attributes');
    
    }
    
    
}?>
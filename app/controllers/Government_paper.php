<?php

class Government_paper extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('government_paper_m', 'Obj_Government_paper_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->load->helper('string');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }
    
    
    function government_paper_category(){ 
        $data = array();
        $data['result'] = $this->Obj_Government_paper_M->get_all_government_paper_category();
        $this->layout->view('government_paper_category_v', $data);
    }
    

  

    function add_government_paper_category(){

        if ($this->input->post('submit')){ 
            $date = date('Y-m-d');
            $government_paper_category_name =   $this->input->post('government_paper_category_name');
            $government_paper_category_name_ar =   $this->input->post('government_paper_category_name_ar');
            
            $data = array('government_paper_cate_name'=>$government_paper_category_name,'ar_government_paper_cate_name'=>$government_paper_category_name_ar,'created_date'=>$date,'modified_date'=>$date);   
            $government_paper_category_id = $this->Obj_Government_paper_M->add_government_paper_category($data);
            
            
//            $data1 = array('government_paper_category_id'=>$government_paper_category_id,'language_id'=>1,'government_paper_category_name'=>$government_paper_category_name); 
//            $this->Obj_Government_paper_M->add_government_paper_category_desc($data1); 
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('government_paper/government_paper_category');
        }
        $data = array();
        $this->layout->view('add_government_paper_category_v',$data);
    }

    function edit_government_paper_category($government_paper_category_id){
        
        $data = array();
        $data['result'] = $this->Obj_Government_paper_M->get_government_paper_category($government_paper_category_id);
        //$data['government_paper_category_id'] = $government_paper_category_id;
        $data['id'] =       $government_paper_category_id;
        $this->layout->view('add_government_paper_category_v', $data);
        
    }

    function edit_1_government_paper_category($government_paper_category_id){

        if ($this->input->post('submit')){

           $date = date('Y-m-d'); 
           $government_paper_category_name =   $this->input->post('government_paper_category_name');
           $government_paper_category_name_ar =   $this->input->post('government_paper_category_name_ar');
           $data = array('government_paper_cate_name'=>$government_paper_category_name,'ar_government_paper_cate_name'=>$government_paper_category_name_ar,'created_date'=>$date,'modified_date'=>$date); 
           $this->Obj_Government_paper_M->update_government_paper_category($data,$government_paper_category_id); 
            
//            $data1 = array('government_paper_category_id'=>$government_paper_category_id,'language_id'=>1,'government_paper_category_name'=>$government_paper_category_name);
//            
//   
//            
//            $this->Obj_Government_paper_M->update_government_paper_category_desc($data1,$government_paper_category_description_id);
            
            $this->session->set_flashdata('message', 'Updated Successfully');
          
  
          }
          redirect('government_paper/government_paper_category');
    }

    function delete($government_paper_id){

        //$data = $this->Obj_Government_paper_M->get_government_papers($government_paper_id);
//        if(!empty($data->government_paper_image)){
//        @unlink(base_url().'government_paper/'.$data->government_paper_image);
//        }
        $this->db->delete('government_paper', array('government_paper_id' => $government_paper_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('government_paper');
        
    }
    
    
    
    
    function delete_government_paper_category($government_paper_id){   
        $this->db->delete('government_paper_category', array('government_paper_category_id' => $government_paper_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('government_paper/government_paper_category');
        
    }
    
 
    function government_paper(){
        $data = array();
        $data['result'] = $this->Obj_Government_paper_M->get_all_government_paper();
        $this->layout->view('government_paper_v', $data);
    }
    
    
    function add_government_paper(){
        
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $government_paper_category_id =     $this->input->post('government_paper_category_id');
            $government_paper_title =   $this->input->post('government_paper_title');
            $government_paper_title_ar =   $this->input->post('government_paper_title_ar');
            $price =   $this->input->post('price');
            
        $data = array('government_paper_category_id'=>$government_paper_category_id,'price'=>$price,'government_paper_title'=>$government_paper_title,'ar_government_paper_title'=>$government_paper_title_ar); 
        
        $government_paper_id = $this->Obj_Government_paper_M->add_government_paper($data); 
            
//  $data1 = array('government_paper_id'=>$government_paper_id,'language_id'=>1,'government_paper_title'=>$government_paper_title,'government_paper_description'=>$government_paper_description); 
//            $this->Obj_Government_paper_M->add_government_paper_desc($data1); 
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('government_paper/government_paper');
        }   
        
  
       $data = array();
       $data['government_paper_category'] = $this->Obj_Government_paper_M->get_prnt_category();
       $this->layout->view('add_government_paper_v',$data); 
    }
            
    
    function edit_government_paper($government_paper_id){
        
        $data = array();
        $data['government_paper_category'] = $this->Obj_Government_paper_M->get_prnt_category();
        $data['res'] = $this->Obj_Government_paper_M->get_government_paper($government_paper_id);
        //$data['government_paper_id'] = $government_paper_id;
        $data['id'] =       $government_paper_id;
        $this->layout->view('add_government_paper_v', $data);
        
    }
    
    
    
    function edit_1_government_paper($government_paper_id){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $government_paper_category_id =     $this->input->post('government_paper_category_id');
            $government_paper_title =   $this->input->post('government_paper_title');
            $government_paper_title_ar =   $this->input->post('government_paper_title_ar');
            $price =   $this->input->post('price');
            
        $data = array('government_paper_category_id'=>$government_paper_category_id,'price'=>$price,'government_paper_title'=>$government_paper_title,'ar_government_paper_title'=>$government_paper_title_ar); 
        
        $this->Obj_Government_paper_M->update_government_paper($data,$government_paper_id);
        
//        $data1 = array('government_paper_id'=>$government_paper_id,'language_id'=>1,'government_paper_title'=>$government_paper_title,'government_paper_description'=>$government_paper_description);  
//        $this->Obj_Government_paper_M->update_government_paper_desc($data1,$government_paper_description_id);
        
        $this->session->set_flashdata('message', 'Updated Successfully');
        }
          redirect('government_paper/government_paper');
    }

    
    
    function delete_government_paper($government_paper_id){   
        $this->db->delete('government_paper', array('government_paper_id' => $government_paper_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('government_paper/government_paper');
        
    }
    
}?>
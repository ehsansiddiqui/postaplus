<?php

class Photoprinting extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('photoprinting_m', 'Obj_Photoprinting_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->load->helper('string');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }
    
    
    function photoprinting_category(){ 
        $data = array();
        $data['result'] = $this->Obj_Photoprinting_M->get_all_photoprinting_category();
        $this->layout->view('photoprinting_category_v', $data);
    }
    

  

    function add_photoprinting_category(){

        if ($this->input->post('submit')){ 
            $date = date('Y-m-d');
            $photoprinting_category_name =   $this->input->post('photoprinting_category_name');
            $photoprinting_category_name_ar =   $this->input->post('photoprinting_category_name_ar');
            
            $data = array('photoprinting_cate_name'=>$photoprinting_category_name,'ar_photoprinting_cate_name'=>$photoprinting_category_name_ar,'created_date'=>$date,'modified_date'=>$date);   
            $photoprinting_category_id = $this->Obj_Photoprinting_M->add_photoprinting_category($data);
            
            
//            $data1 = array('photoprinting_category_id'=>$photoprinting_category_id,'language_id'=>1,'photoprinting_category_name'=>$photoprinting_category_name); 
//            $this->Obj_Photoprinting_M->add_photoprinting_category_desc($data1);
            
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('photoprinting/photoprinting_category');
        }
        $data = array();
        $this->layout->view('add_photoprinting_category_v',$data);
    }

    function edit_photoprinting_category($photoprinting_category_id){
        
        $data = array();
        $data['result'] = $this->Obj_Photoprinting_M->get_photoprinting_category($photoprinting_category_id);
       // $data['photoprinting_category_id'] = $photoprinting_category_id;
        $data['id'] =       $photoprinting_category_id;
        $this->layout->view('add_photoprinting_category_v', $data);
        
    }

    function edit_1_photoprinting_category($photoprinting_category_id){

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            
            $photoprinting_category_name =   $this->input->post('photoprinting_category_name');
            
            $photoprinting_category_name_ar =   $this->input->post('photoprinting_category_name_ar');
            
            $data = array('photoprinting_cate_name'=>$photoprinting_category_name,'ar_photoprinting_cate_name'=>$photoprinting_category_name_ar,'modified_date'=>$date);
            
             $this->Obj_Photoprinting_M->update_photoprinting_category($data,$photoprinting_category_id); 
            
//            $data1 = array('photoprinting_category_id'=>$photoprinting_category_id,'language_id'=>1,'photoprinting_category_name'=>$photoprinting_category_name);
//
//            $this->Obj_Photoprinting_M->update_photoprinting_category_desc($data1,$photoprinting_category_description_id);
            
            $this->session->set_flashdata('message', 'Updated Successfully');
          
  
          }
          redirect('photoprinting/photoprinting_category');
    }

    function delete($photoprinting_id){

        $data = $this->Obj_Photoprinting_M->get_photoprintings($photoprinting_id);
//        if(!empty($data->photoprinting_image)){
//        @unlink(base_url().'photoprinting/'.$data->photoprinting_image);
//        }
        $this->db->delete('photoprinting', array('photoprinting_id' => $photoprinting_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('photoprinting');
        
    }
    
    
    
    
    function delete_photoprinting_category($photoprinting_id){   
        $this->db->delete('photoprinting_category', array('photoprinting_category_id' => $photoprinting_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('photoprinting/photoprinting_category');
        
    }
    
 
    function photoprinting(){
        $data = array();
        $data['result'] = $this->Obj_Photoprinting_M->get_all_photoprinting();
        $this->layout->view('photoprinting_v', $data);
    }
    
    
    function add_photoprinting(){
        
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $photoprinting_title =   $this->input->post('photoprinting_title');
            $photoprinting_title_ar =   $this->input->post('photoprinting_title_ar');
            $attributes_id =   $this->input->post('attributes_id');
            $price =   $this->input->post('price');
            
            
        $data = array('attributes_id'=>$attributes_id,'price'=>$price,'photoprinting_title'=>$photoprinting_title,'ar_photoprinting_title'=>$photoprinting_title_ar);         
        $photoprinting_id = $this->Obj_Photoprinting_M->add_photoprinting($data); 
            
//            $data1 = array('photoprinting_id'=>$photoprinting_id,'language_id'=>1,'photoprinting_title'=>$photoprinting_title,'photoprinting_description'=>$photoprinting_description); 
//            $this->Obj_Photoprinting_M->add_photoprinting_desc($data1);
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('photoprinting/photoprinting');
        }   
        
        
        
        
       $data = array();
//       $data['photoprinting_category'] = $this->Obj_Photoprinting_M->get_prnt_category();
       $data['attributes'] = $this->Obj_Photoprinting_M->get_attributes();
       $this->layout->view('add_photoprinting_v',$data); 
    }
            
    
    function edit_photoprinting($photoprinting_id){
        
        $data = array();
//        $data['photoprinting_category'] = $this->Obj_Photoprinting_M->get_prnt_category();
        $data['attributes'] = $this->Obj_Photoprinting_M->get_attributes();
        $data['res'] = $this->Obj_Photoprinting_M->get_photoprinting($photoprinting_id);
        //$data['photoprinting_id'] = $photoprinting_id;
        $data['id'] =       $photoprinting_id;
        $this->layout->view('add_photoprinting_v', $data);
        
    }
    
    
    
    function edit_1_photoprinting($photoprinting_id){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
//            $photoprinting_category_id =     $this->input->post('photoprinting_category_id');
            $photoprinting_title =   $this->input->post('photoprinting_title');
            $photoprinting_title_ar =   $this->input->post('photoprinting_title_ar');
            $attributes_id =   $this->input->post('attributes_id');
            $price =   $this->input->post('price');
        $data = array('attributes_id'=>$attributes_id,'price'=>$price,'photoprinting_title'=>$photoprinting_title,'ar_photoprinting_title'=>$photoprinting_title_ar);  
        
        $this->Obj_Photoprinting_M->update_photoprinting($data,$photoprinting_id);  
       
//        $data1 = array('photoprinting_id'=>$photoprinting_id,'language_id'=>1,'photoprinting_title'=>$photoprinting_title,'photoprinting_description'=>$photoprinting_description);  
//        $this->Obj_Photoprinting_M->update_photoprinting_desc($data1,$photoprinting_description_id);
        
        $this->session->set_flashdata('message', 'Updated Successfully');
          
        
        }
          redirect('photoprinting/photoprinting');
    }

    
    
    function delete_photoprinting($photoprinting_id){   
        $this->db->delete('photoprinting', array('photoprinting_id' => $photoprinting_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('photoprinting/photoprinting');
        
    }
    
}?>
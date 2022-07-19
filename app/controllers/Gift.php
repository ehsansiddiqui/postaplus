<?php

class Gift extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('gift_m', 'Obj_Gift_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->load->helper('string');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }
    
    
    function gift_category(){ 
        $data = array();
        $data['result'] = $this->Obj_Gift_M->get_all_gift_category();
        $this->layout->view('gift_category_v', $data);
    }
    

  

    function add_gift_category(){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $gift_category_name =   $this->input->post('gift_category_name');
            $gift_category_name_ar =   $this->input->post('gift_category_name_ar');
            
            $data = array('gift_cate_name'=>$gift_category_name,'ar_gift_cate_name'=>$gift_category_name_ar,'created_date'=>$date,'modified_date'=>$date);   
            $gift_category_id = $this->Obj_Gift_M->add_gift_category($data);
            
            
               if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
                $config = array(
                    'upload_path' => './gift/',
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,'encrypt_name' =>TRUE);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){ 
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('gift_cate_image' => $file_name);
                    $this->db->where('gift_category_id', $gift_category_id);
                    $this->db->update('gift_category', $data1);  
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('gift/add_gift_category');
                }
            } 
            
            
//            $data1 = array('gift_category_id'=>$gift_category_id,'language_id'=>1,'gift_category_name'=>$gift_category_name); 
//            $this->Obj_Gift_M->add_gift_category_desc($data1);
            
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('gift/gift_category');
        }
        $data = array();
        $this->layout->view('add_gift_category_v',$data);
    }

    function edit_gift_category($gift_category_id){
        
        $data = array();
        $data['result'] = $this->Obj_Gift_M->get_gift_category($gift_category_id);
       // $data['gift_category_id'] = $gift_category_id;
        $data['id'] =       $gift_category_id;
        $this->layout->view('add_gift_category_v', $data);
        
    }

    function edit_1_gift_category($gift_category_id){

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            
            $gift_category_name =   $this->input->post('gift_category_name');
            
            $gift_category_name_ar =   $this->input->post('gift_category_name_ar');
            
            $data = array('gift_cate_name'=>$gift_category_name,'ar_gift_cate_name'=>$gift_category_name_ar,'modified_date'=>$date);
            
             $this->Obj_Gift_M->update_gift_category($data,$gift_category_id);
             
             
             
            if (!empty($_FILES['userfile']['name'])){
                
                $this->load->helper(array('image_helper'));
                $config = array(
                    'upload_path' => './gift/',
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,'encrypt_name' =>TRUE);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){ 
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('gift_cate_image' => $file_name);
                    $this->db->where('gift_category_id', $gift_category_id);
                    $this->db->update('gift_category', $data1);  
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('gift/add_gift_category');
                }
            } 
             
            
//            $data1 = array('gift_category_id'=>$gift_category_id,'language_id'=>1,'gift_category_name'=>$gift_category_name);
//
//            $this->Obj_Gift_M->update_gift_category_desc($data1,$gift_category_description_id);
            
            $this->session->set_flashdata('message', 'Updated Successfully');
          
  
          }
          redirect('gift/gift_category');
    }

    function delete($gift_id){

        $data = $this->Obj_Gift_M->get_gifts($gift_id);
//        if(!empty($data->gift_image)){
//        @unlink(base_url().'gift/'.$data->gift_image);
//        }
        $this->db->delete('gift', array('gift_id' => $gift_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('gift');
        
    }
    
    
    
    
    function delete_gift_category($gift_id){   
        $this->db->delete('gift_category', array('gift_category_id' => $gift_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('gift/gift_category');
        
    }
    
 
    function gift(){
        $data = array();
        $data['result'] = $this->Obj_Gift_M->get_all_gift();
        $this->layout->view('gift_v', $data);
    }
    
    
    function add_gift(){
        
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $gift_category_id =     $this->input->post('gift_category_id');
            $gift_title =   $this->input->post('gift_title');
            $gift_title_ar =   $this->input->post('gift_title_ar');
            $attributes_id =   $this->input->post('attributes_id');
            $price =   $this->input->post('price');
            
            
        $data = array('gift_category_id'=>$gift_category_id,'attributes_id'=>$attributes_id,'price'=>$price,'gift_title'=>$gift_title,'ar_gift_title'=>$gift_title_ar);         
        $gift_id = $this->Obj_Gift_M->add_gift($data); 
            
//            $data1 = array('gift_id'=>$gift_id,'language_id'=>1,'gift_title'=>$gift_title,'gift_description'=>$gift_description); 
//            $this->Obj_Gift_M->add_gift_desc($data1);
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('gift/gift');
        }   
        
        
        
        
       $data = array();
       $data['gift_category'] = $this->Obj_Gift_M->get_prnt_category();
       $data['attributes'] = $this->Obj_Gift_M->get_attributes();
       $this->layout->view('add_gift_v',$data); 
    }
            
    
    function edit_gift($gift_id){
        
        $data = array();
        $data['gift_category'] = $this->Obj_Gift_M->get_prnt_category();
        $data['attributes'] = $this->Obj_Gift_M->get_attributes();
        $data['res'] = $this->Obj_Gift_M->get_gift($gift_id);
        //$data['gift_id'] = $gift_id;
        $data['id'] =       $gift_id;
        $this->layout->view('add_gift_v', $data);
        
    }
    
    
    
    function edit_1_gift($gift_id){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $gift_category_id =     $this->input->post('gift_category_id');
            $gift_title =   $this->input->post('gift_title');
            $gift_title_ar =   $this->input->post('gift_title_ar');
            $attributes_id =   $this->input->post('attributes_id');
            $price =   $this->input->post('price');
        $data = array('gift_category_id'=>$gift_category_id,'attributes_id'=>$attributes_id,'price'=>$price,'gift_title'=>$gift_title,'ar_gift_title'=>$gift_title_ar);  
        
        $this->Obj_Gift_M->update_gift($data,$gift_id);  
       
//        $data1 = array('gift_id'=>$gift_id,'language_id'=>1,'gift_title'=>$gift_title,'gift_description'=>$gift_description);  
//        $this->Obj_Gift_M->update_gift_desc($data1,$gift_description_id);
        
        $this->session->set_flashdata('message', 'Updated Successfully');
          
        
        }
          redirect('gift/gift');
    }

    
    
    function delete_gift($gift_id){   
        $this->db->delete('gift', array('gift_id' => $gift_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('gift/gift');
        
    }
    
}?>
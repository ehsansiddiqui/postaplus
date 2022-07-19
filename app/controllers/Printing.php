<?php

class Printing extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('printing_m', 'Obj_Printing_M', TRUE);
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
                        'upload_path' => './printing/',
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,'encrypt_name' =>TRUE);
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload($userfile)){      
                        $upload_data = $this->upload->data();
                        return $upload_data ;
                    } else { 
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message1','invalid image');
                        redirect('printing');
                  }      
        }
        
        
            
    function printing_type(){ 
        $data = array();
        $data['result'] = $this->Obj_Printing_M->get_all_printing_type();
        $this->layout->view('printing_type_v', $data);
    }
    
    


    function add_printing_type(){

        if ($this->input->post('submit')){ 
            $date = date('Y-m-d');
            $print_type_name =   $this->input->post('print_type_name');
            $print_type_name_ar =   $this->input->post('print_type_name_ar');
            $data = array('pri_type_name'=>$print_type_name,'ar_pri_type_name'=>$print_type_name_ar,'created_date'=>$date,'modified_date'=>$date); 
            $print_type_id = $this->Obj_Printing_M->add_printing_type($data); 
             
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('printing/printing_type');
        }
        $data = array();
        $this->layout->view('add_printing_type_v',$data);
    }

    function edit_print_type($print_type_id){
        
        $data = array();
        $data['result'] = $this->Obj_Printing_M->get_printing_type($print_type_id);
        $data['id'] =       $print_type_id;
        $this->layout->view('add_printing_type_v', $data);
        
    }

    function edit_1_printing_type($print_type_id){
        

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            
            $print_type_name =   $this->input->post('print_type_name');
            $print_type_name_ar =   $this->input->post('print_type_name_ar'); 
            $data = array('pri_type_name'=>$print_type_name,'ar_pri_type_name'=>$print_type_name_ar,'created_date'=>$date,'modified_date'=>$date);
            $this->Obj_Printing_M->update_printing_type($data,$print_type_id); 
            $this->session->set_flashdata('message', 'Updated Successfully');
          }
          redirect('printing/printing_type');
    }

    function delete($printing_id){

        $this->db->delete('printing', array('printing_id' => $printing_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('printing');
        
    }
    
    
    
    
    function delete_print_type($printing_id){   
        $this->db->delete('print_type', array('print_type_id' => $printing_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('printing/printing_type');
        
    }
    
 
    function printing(){
        $data = array();
        $data['result'] = $this->Obj_Printing_M->get_all_printing();
        $this->layout->view('printing_v', $data);
    }
    
    
    function add_printing(){
        
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $print_type_id =     $this->input->post('print_type_id');
            $printing_title =   $this->input->post('printing_title');
            $ar_printing_title =   $this->input->post('ar_printing_title');
            $attributes_id =   $this->input->post('attributes_id');
            $price =   $this->input->post('price');
            
            
        $data = array('print_type_id'=>$print_type_id,'attributes_id'=>$attributes_id,'price'=>$price,'printing_title'=>$printing_title,'ar_printing_title'=>$ar_printing_title);  
        
        $printing_id = $this->Obj_Printing_M->add_printing($data); 
            
//            $data1 = array('printing_id'=>$printing_id,'language_id'=>1,'printing_title'=>$printing_title,'printing_description'=>$printing_description); 
//            $this->Obj_Printing_M->add_printing_desc($data1);
        
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('printing/printing');
        }   
        
        
        
        
       $data = array();
       $data['print_type'] = $this->Obj_Printing_M->get_prnt_type();
       $data['attributes'] = $this->Obj_Printing_M->get_attributes();
       $this->layout->view('add_printing_v',$data); 
    }
            
    
    function edit_printing($printing_id){
        
        $data = array();
        $data['print_type'] = $this->Obj_Printing_M->get_prnt_type();
        $data['attributes'] = $this->Obj_Printing_M->get_attributes();
        $data['res'] = $this->Obj_Printing_M->get_printing($printing_id);
        $data['id'] =       $printing_id;
        $this->layout->view('add_printing_v', $data);
        
    }
    
    
    
    function edit_1_printing($printing_id){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $print_type_id =     $this->input->post('print_type_id');
            $printing_title =   $this->input->post('printing_title');
            $ar_printing_title =   $this->input->post('ar_printing_title');
            $attributes_id =   $this->input->post('attributes_id');
            $price =   $this->input->post('price');
            
        $data = array('print_type_id'=>$print_type_id,'attributes_id'=>$attributes_id,'price'=>$price,'printing_title'=>$printing_title,'ar_printing_title'=>$ar_printing_title);         
        $this->Obj_Printing_M->update_printing($data,$printing_id);
        
//        $data1 = array('printing_id'=>$printing_id,'language_id'=>1,'printing_title'=>$printing_title,'printing_description'=>$printing_description);  
//        $this->Obj_Printing_M->update_printing_desc($data1,$printing_description_id);
        
        $this->session->set_flashdata('message', 'Updated Successfully');
          
        
        }
          redirect('printing/printing');
    }

    
    
    function delete_printing($printing_id){   
        $this->db->delete('printing', array('printing_id' => $printing_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('printing/printing');
        
    }

    
}?>
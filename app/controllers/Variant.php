<?php
class Variant extends CI_Controller {

    function Variant() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('variant_m', 'Obj_variant_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
//        $data['result'] = $this->Obj_variant_M->get_variant();
//        $this->layout->view('variant_v', $data);
        $data['result'] = $this->Obj_variant_M->vehicle_variant();
        $this->layout->view('vehicle_variant_v',$data);
    }

    public function add_variant() {

        if ($this->input->post('submit')) {
            
            $date = date('Y-m-d h:i:s', time());
            
            $data = array('variant_name' => $this->input->post('variant_name'));
            
            $this->Obj_variant_M->add_variant($data);
            $variant_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
//                if (!is_dir('variant/' . $variant_id)) {
//                    mkdir('variant/' . $variant_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/new/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('vehicle_id', $variant_id);
                    $this->db->update('vehicle_variant', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('variant/add_variant');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('variant');
        } else {
            $this->layout->view('add_variant_v');
        }
    }

    function edit_variant($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_variant_M->get_variants($id);
        $this->layout->view('add_variant_v',$data);
    }

    function edit_variants($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
           $data = array('variant_name' => $this->input->post('variant_name'));
            
            $this->Obj_variant_M->update_variant($data,$id);
            $variant_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('variant/' . $variant_id)) {
//                    mkdir('variant/' . $variant_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/new/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('vehicle_id', $variant_id);
                    $this->db->update('vehicle_variant', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('variant/add_variant');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('variant');
        } else {
            redirect('variant');
        }
    }

    function delete_variant($id) {
        $this->db->delete('vehicle_variant', array('vehicle_variant_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('variant');
    }
    
    
    function vehicle_variant(){
        $data['result'] = $this->Obj_variant_M->vehicle_variant();
        $this->layout->view('vehicle_variant_v', $data);
    }
   
   
   function add_variant_vehicle(){
       $data['category'] = $this->Obj_variant_M->get_category();
       $data['brand'] = $this->Obj_variant_M->get_brand();
       $data['variant'] = $this->Obj_variant_M->get_variant();
       $data['vehicle'] = $this->Obj_variant_M->get_vehicle();
       $this->layout->view('add_vehicle_variant_v', $data);
   }
   
   function add_variant_vehicles(){
       
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time()); 
            
             $result = $this->Obj_variant_M->check_variant($this->input->post('variant_name'));
             
             if(!empty($result)){
                 
                 
           $res =     $this->Obj_variant_M->check_vehicle($result->vehicle_variant_id,$this->input->post('vehicle_id'));
           
             if(!empty($res)){ 
            $this->session->set_flashdata('message1', 'Already exists');
  
             }else {
                 
   $data = array('vehicle_id' => $this->input->post('vehicle_id'),'variant_id' =>$result->vehicle_variant_id,'cm_date'=>$date);
            $this->Obj_variant_M->add_variant_vehicles($data); 
            
             $this->session->set_flashdata('message', 'Inserted Successfully');
                 
             }  
             }else{
             
            
            $data = array('variant_name' => $this->input->post('variant_name'));         
            $this->Obj_variant_M->add_variant($data);       
            $variant_id = $this->db->insert_id();  
        $data = array('vehicle_id' => $this->input->post('vehicle_id'),'variant_id' =>$variant_id,'cm_date'=>$date);
            $this->Obj_variant_M->add_variant_vehicles($data);    
            $this->session->set_flashdata('message', 'Inserted Successfully');
          
            
             }
          redirect('variant/vehicle_variant');
        }
        
   }
   
   function edit_variant_vehicles($id,$variant_id){
       $data['id'] = $id;
       $data['variant_id'] = $variant_id;
       $data['result'] = $this->Obj_variant_M->get_variant_vehicle($id);;
       $data['variant'] = $this->Obj_variant_M->get_variant();
       $data['vehicle'] = $this->Obj_variant_M->get_vehicle();
       $this->layout->view('add_vehicle_variant_v',$data);
       
   }
   
   
    function edit_variant_vehicless($id,$variant_id){
        
        if ($this->input->post('submit')){
            $date = date('Y-m-d h:i:s', time());
            $data1 = array('variant_name' => $this->input->post('variant_name'),'cm_date'=>$date);
            $this->Obj_variant_M->update_variant($data1,$variant_id);  
            $data = array('vehicle_id' => $this->input->post('vehicle_id'),'cm_date'=>$date);  
            $this->Obj_variant_M->update_variant_vehicles($data,$id);
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('variant/vehicle_variant');
        }   
   }
   
   
   
    function delete_vehicle_variant($id) {
        $this->db->delete('vehicle_to_variant', array('vehicle_to_variant_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('variant/vehicle_variant');
    }
    
    
    
    function dropdown_fetch(){  
       $brand_id = $_REQUEST['ids'];
       $data['models'] = $this->Obj_variant_M->get_models($brand_id);
       $this->load->view('dropdown_fetch_v',$data);   
    }
     
    public function get_brand(){
         $data['brand'] = $this->Obj_variant_M->get_brands($_POST['ids']);
         $this->load->view('get_brand_variant',$data);
    }
}?>
<?php

class Store extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('store_m', 'Obj_Store_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }
    
    
    function index(){
        $data = array();
        $data['result'] = $this->Obj_Store_M->get_all_store();
        $this->layout->view('store_v', $data);
    }

    function attributes_group(){
        $data = array();
        $data['result'] = $this->Obj_Store_M->get_all_store();
        $this->layout->view('store_v', $data);
    }
    
    
     function attributes(){  
        $data = array();  
        //$data['result'] = $this->Obj_Store_M->get_all_store();
        $this->layout->view('attributes_v', $data);
    }
    
    
    function add_attributes(){  
        $data = array();  
        //$data['result'] = $this->Obj_Store_M->get_all_store();
        $this->layout->view('add_attributes_v', $data);
    }

    function add() {

        if ($this->input->post('submit')){
                   
        $date = date('Y-m-d');     
        $result = $this->Obj_Store_M->check_store_a($this->Obj_Store_M->escapeString($this->input->post('store_name')));
        
            if (!empty($result)){
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('store');
            }else{
                
            $store_phone_number =  $this->input->post('phone_number');
            $phone_number = implode(",",$store_phone_number);
            
 $data = array('store_name' =>$this->Obj_Store_M->escapeString($this->input->post('store_name')),'store_latitude' =>$this->Obj_Store_M->escapeString($this->input->post('store_latitude')),'store_longitude' =>$this->Obj_Store_M->escapeString($this->input->post('store_longitude')),'store_contact_person'=>$this->Obj_Store_M->escapeString($this->input->post('store_contact_person')),'store_phone_number'=>$phone_number,'store_email'=>$this->Obj_Store_M->escapeString($this->input->post('store_email')),'store_billing_price'=>$this->Obj_Store_M->escapeString($this->input->post('store_billing_price')),'store_price'=>$this->Obj_Store_M->escapeString($this->input->post('store_price')),'store_address' =>$this->Obj_Store_M->escapeString($this->input->post('store_address')));
            $store_id = $this->Obj_Store_M->add_store($data); 
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('store/attributes_group');
            
            }
        }
        
        $data = array();
        $data['price_package'] = $this->Obj_Store_M->get_price_package();
        $this->layout->view('add_store_v',$data);
    }

    function edit($id = '') {

        $data['result'] = $this->Obj_Store_M->get_stores($id);
        $data['id'] = $id;
        $this->layout->view('add_store_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Store_M->check_store_e($this->input->post('store_name'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {
                

            $store_phone_number =  $this->input->post('phone_number');
            $phone_number = implode(",",$store_phone_number);
            
 $data = array('store_name' =>$this->Obj_Store_M->escapeString($this->input->post('store_name')),'store_latitude' =>$this->Obj_Store_M->escapeString($this->input->post('store_latitude')),'store_longitude' =>$this->Obj_Store_M->escapeString($this->input->post('store_longitude')),'store_contact_person'=>$this->Obj_Store_M->escapeString($this->input->post('store_contact_person')),'store_phone_number'=>$phone_number,'store_email'=>$this->Obj_Store_M->escapeString($this->input->post('store_email')),'store_billing_price'=>$this->Obj_Store_M->escapeString($this->input->post('store_billing_price')),'store_price'=>$this->Obj_Store_M->escapeString($this->input->post('store_price')),'store_address' =>$this->Obj_Store_M->escapeString($this->input->post('store_address')));
 
                $this->Obj_Store_M->update_store($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('store');
    }

    function delete($store_id){
        $this->db->delete('store', array('store_id' => $store_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('store');
    }

}

?>
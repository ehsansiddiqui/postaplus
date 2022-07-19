<?php

class Vendor extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('vendor_m', 'Obj_Vendor_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    function index(){
        $data['result'] = $this->Obj_Vendor_M->get_all_vendor();
        $this->layout->view('vendor_v', $data);
    }

    function add() {

        if ($this->input->post('submit')){
                   
        $date = date('Y-m-d');     
        $result = $this->Obj_Vendor_M->check_vendor_a($this->Obj_Vendor_M->escapeString($this->input->post('vendor_name')));
        
            if (!empty($result)){
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('vendor');
            }else{
                
            $vendor_phone_number =  $this->input->post('phone_number');
            $phone_number = implode(",",$vendor_phone_number);
            
 $data = array('vendor_name' =>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_name')),'vendor_latitude' =>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_latitude')),'vendor_longitude' =>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_longitude')),'vendor_contact_person'=>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_contact_person')),'vendor_phone_number'=>$phone_number,'vendor_email'=>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_email')),'vendor_billing_price'=>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_billing_price')),'vendor_price'=>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_price')),'vendor_address' =>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_address')));
            $vendor_id = $this->Obj_Vendor_M->add_vendor($data); 
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('vendor');
            
            }
        }
        
        $data = array();
        $data['price_package'] = $this->Obj_Vendor_M->get_price_package();
        $this->layout->view('add_vendor_v',$data);
    }

    function edit($id = '') {

        $data['result'] = $this->Obj_Vendor_M->get_vendors($id);
        $data['id'] = $id;
        $this->layout->view('add_vendor_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Vendor_M->check_vendor_e($this->input->post('vendor_name'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {
                

            $vendor_phone_number =  $this->input->post('phone_number');
            $phone_number = implode(",",$vendor_phone_number);
            
 $data = array('vendor_name' =>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_name')),'vendor_latitude' =>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_latitude')),'vendor_longitude' =>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_longitude')),'vendor_contact_person'=>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_contact_person')),'vendor_phone_number'=>$phone_number,'vendor_email'=>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_email')),'vendor_billing_price'=>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_billing_price')),'vendor_price'=>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_price')),'vendor_address' =>$this->Obj_Vendor_M->escapeString($this->input->post('vendor_address')));
 
                $this->Obj_Vendor_M->update_vendor($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('vendor');
    }

    function delete($vendor_id){
        $this->db->delete('vendor', array('vendor_id' => $vendor_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('vendor');
    }

}

?>
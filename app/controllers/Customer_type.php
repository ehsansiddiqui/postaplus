<?php

class Customer_type extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('customer_type_m', 'Obj_Customer_type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    private function uploads($userfile){

                   $this->load->helper(array('image_helper'));    
                    $config = array(
                        'upload_path' => './customer_type/',
                        'allowed_types' => "gif|jpg|png|jpeg|pdf",
                        'overwrite' => TRUE,'encrypt_name' =>TRUE);
                    $this->load->library('upload', $config);
                    
                    if ($this->upload->do_upload($userfile)){      
                        $upload_data = $this->upload->data();
                        return $upload_data ;
                    } else { 
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('message1','invalid image');
                        redirect('driver');
                  }      
        }
    
    
    function index() {

        $data['result'] = $this->Obj_Customer_type_M->get_all_customer_type();
        $this->layout->view('customer_type_v', $data);
    }

    function add() {

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
        $result = $this->Obj_Customer_type_M->check_customer_type_a($this->Obj_Customer_type_M->escapeString($this->input->post('customer_types')));
            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('customer_type');
            }else{

               $data = array('customer_types'=>$this->Obj_Customer_type_M->escapeString($this->input->post('customer_types')),'price_package_id' =>$this->Obj_Customer_type_M->escapeString($this->input->post('price_package_id')));
                $customer_type_id = $this->Obj_Customer_type_M->add_customer_type($data);
                
            
                
                $this->session->set_flashdata('message', 'Inserted Successfully');
               redirect('customer_type');
            }
        }
        $data = array();
        $data['result'] = $this->Obj_Customer_type_M->get_price_package();
        $this->layout->view('add_customer_type_v',$data);
    }

    function edit($id = '') {

        $data['res'] = $this->Obj_Customer_type_M->get_customer_types($id);
        $data['id'] = $id;
        $data['result'] = $this->Obj_Customer_type_M->get_price_package();
        $this->layout->view('add_customer_type_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Customer_type_M->check_customer_type_e($this->input->post('customer_types'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {
                
                
               $data = array('customer_types'=>$this->Obj_Customer_type_M->escapeString($this->input->post('customer_types')),'price_package_id' =>$this->Obj_Customer_type_M->escapeString($this->input->post('price_package_id')));
               
               $customer_type_id = $this->Obj_Customer_type_M->update_customer_type($data,$id);
                
            
                
            }
        }
        redirect('customer_type');
    }

    function delete($customer_type_id){
        $this->db->delete('customer_type', array('customer_type_id' => $customer_type_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('customer_type');
    }
    
    

}?>
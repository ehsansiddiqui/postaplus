<?php

class Customer extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('customer_m', 'Obj_Customer_M', TRUE);
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
                        'upload_path' => './customer/',
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
    
    
    function index(){
        
        $data['result'] = array();
        $data['result'] = $this->Obj_Customer_M->get_customer();
        $this->layout->view('customer_v', $data);
    }

    function add() {

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
        $result = $this->Obj_Customer_M->check_customer_a($this->Obj_Customer_M->escapeString($this->input->post('phone_number')));
            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('customer');
            }else{

               $data = array('customer_type_id'=>$this->Obj_Customer_M->escapeString($this->input->post('customer_type_id')),'phone_number' =>$this->Obj_Customer_M->escapeString($this->input->post('phone_number')),'password' =>$this->Obj_Customer_M->escapeString($this->input->post('password')),'first_name' =>$this->Obj_Customer_M->escapeString($this->input->post('first_name')),'last_name' =>$this->Obj_Customer_M->escapeString($this->input->post('last_name')),'email_id' =>$this->Obj_Customer_M->escapeString($this->input->post('email_id')),'address'=>$this->Obj_Customer_M->escapeString($this->input->post('address')),'created_date' => $date, 'modified_date' => $date);
                $customer_id = $this->Obj_Customer_M->add_customer($data);
                
                 if (!empty($_FILES['userfile']['name'])){
                        $userfile = 'userfile';
                        $upload_data = $this->uploads($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('customer_image' => $file_name);
                        $this->db->where('customer_id', $customer_id);
                        $this->db->update('customer_details', $data1);
                }
                
                $this->session->set_flashdata('message', 'Inserted Successfully');
               redirect('customer');
            }
        }
        $data = array();
        $data['result'] = $this->Obj_Customer_M->get_customer_type();
        $this->layout->view('add_customer_v',$data);
    }

    function edit($id = '') {

        $data['res'] = $this->Obj_Customer_M->get_customers($id);
        $data['id'] = $id;
        $data['result'] = $this->Obj_Customer_M->get_customer_type();
        $this->layout->view('add_customer_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Customer_M->check_customer_e($this->input->post('phone_number'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {
                
                
               $data = array('customer_type_id'=>$this->Obj_Customer_M->escapeString($this->input->post('customer_type_id')),'phone_number' =>$this->Obj_Customer_M->escapeString($this->input->post('phone_number')),'password' =>$this->Obj_Customer_M->escapeString($this->input->post('password')),'first_name' =>$this->Obj_Customer_M->escapeString($this->input->post('first_name')),'last_name' =>$this->Obj_Customer_M->escapeString($this->input->post('last_name')),'email_id' =>$this->Obj_Customer_M->escapeString($this->input->post('email_id')),'address'=>$this->Obj_Customer_M->escapeString($this->input->post('address')),'modified_date' => $date);
               
                $customer_id = $this->Obj_Customer_M->update_customer($data,$id);
                
                 if (!empty($_FILES['userfile']['name'])){
                        $userfile = 'userfile';
                        $upload_data = $this->uploads($userfile);
                        $file_name = $upload_data['file_name'];
                        $data1 = array('customer_image' => $file_name);
                        $this->db->where('customer_id', $customer_id);
                        $this->db->update('customer_details', $data1);
                }
                
            }
        }
        redirect('customer');
    }

    function delete($customer_id){
        $this->db->delete('customer_details', array('customer_id' => $customer_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('customer');
    }
    
    
    function disable_image($customer_id){
        $data = array('customer_image' =>NULL);
        $this->db->where('customer_id', $customer_id);
        $this->db->update('customer_details', $data);
        redirect('customer');
    }

}?>
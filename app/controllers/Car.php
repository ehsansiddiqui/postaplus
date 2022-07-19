<?php

class Car extends CI_Controller {
    
    
    function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('car_m','Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date =  date('Y-m-d');

    }

    function index(){
        $data['result'] = $this->Obj_Track_Type_M->get_all_car();
        $this->layout->view('car_v', $data);
    }

    function add(){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_car($this->input->post('car'));

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('car');
                
            } else {
                
                $data = array('car_name' => $this->input->post('car'),
                    'created_date' => $date,'modified_date'=>$date);
                $this->Obj_Track_Type_M->add_car($data);
                $this->session->set_flashdata('message', 'Insert Sueccessfully');
                redirect('car');
            }
        }
        
        $this->layout->view('add_car_v');
    }

    function edit($id = ''){
        $data['result'] = $this->Obj_Track_Type_M->get_cars($id);
        $data['id'] = $id;
        $this->layout->view('add_car_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_car($this->input->post('car'));
            if (!empty($result)){
                $this->session->set_flashdata('message', 'Already Exist');
            } else {
             $data = array('car_name' => $this->input->post('car'),
                    'created_date' => $date,'modified_date'=>$date);
             
                $this->Obj_Track_Type_M->update_car($data, $id);
                
                $this->session->set_flashdata('message', 'Update Sueccessfully');
            }
        }
        redirect('car');
    }

    function delete($id){
        $this->db->delete('car_details', array('car_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('car');
    }
    
    function view_more($id){
      $data['result'] = $this->Obj_Track_Type_M->get_more_car($id);
      $this->layout->view('car_more_v', $data);
    }

}?>
<?php

class Packages extends CI_Controller {
    
    
    function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('packages_m','Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date =  date('Y-m-d');

    }

    function index(){
        $data['result'] = $this->Obj_Track_Type_M->get_all_packages();
        $this->layout->view('packages_v', $data);
    }

    function add(){

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_packages($this->input->post('packages_name'));

            if (!empty($result)){
                
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('packages');
                
            } else {
         
                
                 $data = array('studio_id' => $this->input->post('studio_id'),
                 'packages_name' => $this->input->post('packages_name'),
                 'number_of_classes' => $this->input->post('number_of_classes'),
                 'validatity_in_days' => $this->input->post('validatity_in_days'),
                 'price' => $this->input->post('price'),
                 'activity_id' => $this->input->post('activity_id'),
                 'created_date' => $date,'modified_date'=>$date);
                
                $this->Obj_Track_Type_M->add_packages($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('packages');
            }
        }
        $data['result'] = $this->Obj_Track_Type_M->get_all_studio();
        $this->layout->view('add_packages_v',$data);
    }

    function edit($id = ''){
        $data['res'] = $this->Obj_Track_Type_M->get_packagess($id);
        $data['id'] = $id;
        $data['result'] = $this->Obj_Track_Type_M->get_all_studio();
        $this->layout->view('add_packages_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');
            
//            $result = $this->Obj_Track_Type_M->check_packages($this->input->post('packages'));
//            
//            if (!empty($result)){
//                
//                $this->session->set_flashdata('message', 'Already Exist');
//                
//            } else {
                
             $data = array('studio_id' => $this->input->post('studio_id'),
                 'packages_name' => $this->input->post('packages_name'),
                 'number_of_classes' => $this->input->post('number_of_classes'),
                 'validatity_in_days' => $this->input->post('validatity_in_days'),
                 'price' => $this->input->post('price'),
                 'activity_id' => $this->input->post('activity_id'),
                 'created_date' => $date,'modified_date'=>$date);
                $this->Obj_Track_Type_M->update_packages($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
                
            //}
        }
        redirect('packages');
    }

    function delete($id){
        $this->db->delete('studio_packages', array('studio_packages_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('packages');
    }
    


}?>
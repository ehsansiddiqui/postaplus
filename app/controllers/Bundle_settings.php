<?php

class Bundle_settings extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('bundle_settings_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');

         if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
            
        }
        
         
    }

    function index(){
        $data['result'] = $this->Obj_Track_Type_M->get_all_bundle_settings();
        $this->layout->view('bundle_settings_v', $data);
    }

    function add(){

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_bundle($this->input->post('number_of_class'));

            if (!empty($result)){
                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('bundle_settings');
            } else {

                $data = array('number_of_class' => $this->input->post('number_of_class'), 'min_number_studio' => $this->input->post('min_number_studio'),
                    'number_of_validity' =>$this->input->post('number_of_class'));
                $this->Obj_Track_Type_M->add_bundle_settings($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('bundle_settings');
            }
        }

        $this->layout->view('add_bundle_settings_v');
    }

    function edit($id = ''){

        $data['res'] = $this->Obj_Track_Type_M->get_bundle_settingss($id);
        $data['id'] = $id;
        $this->layout->view('add_bundle_settings_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_bundle_settings($this->input->post('number_of_class'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else { 
              $data = array('number_of_class' => $this->input->post('number_of_class'), 'min_number_studio' => $this->input->post('min_number_studio'),
                    'number_of_validity' =>$this->input->post('number_of_validity'));
                $this->Obj_Track_Type_M->update_bundle_settings($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('bundle_settings');
    }

    function delete($activity_id){
        $this->db->delete('bundle_config', array('bundle_config_id' => $activity_id));;
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('bundle_settings');
    }
   

}?>
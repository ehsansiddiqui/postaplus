<?php

class Class_master extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('class_master_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');

        if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
        }
    }

    function index() {

        $data['result'] = $this->Obj_Track_Type_M->get_all_class_master();
        $this->layout->view('class_master_v', $data);
    }

    function add() {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_class_master_a($this->input->post('class_name'));

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('class_master');
            } else {

        $data = array('class_name' =>$this->input->post('class_name'), 'discription' => $this->input->post('discription'), 'other_details' => $this->input->post('other_details'),
                    'created_date' => $date);
                $user_id = $this->Obj_Track_Type_M->add_class_master($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('class_master');
            }
        }

        $data = array();
        $this->layout->view('add_class_master', $data);
    }

    function edit($id = '') {
        $data['result'] = $this->Obj_Track_Type_M->get_class_masters($id);
        $data['id'] = $id;
        $this->layout->view('add_class_master', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_class_master_e($this->input->post('class_name'), $id);

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already Exist');
            } else {

        $data = array('class_name' =>$this->input->post('class_name'), 'discription' => $this->input->post('discription'), 'other_details' => $this->input->post('other_details'),
                    'created_date' => $date);
                $this->Obj_Track_Type_M->update_class_master($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }

        redirect('class_master');
    }

    function delete($id){
        $this->db->delete('class_master', array('class_master_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('class_master');
    }

}
?>
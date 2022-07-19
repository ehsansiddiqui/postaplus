<?php

class User_role extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('user_role_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
    }

    function index() {

        $data['result'] = $this->Obj_Track_Type_M->get_all_user_role();
        $this->layout->view('user_role_v', $data);
    }

    function add() {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_user_role($this->input->post('user_role'));

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('user_role');
            } else {

                $data = array('user_role_name' => $this->input->post('user_role'),
                    'created_date' => $date, 'modified_date' => $date);
                $this->Obj_Track_Type_M->add_user_role($data);
                $this->session->set_flashdata('message', 'Insert Sueccessfully');
                redirect('user_role');
            }
        }

        $this->layout->view('add_user_role_v');
    }

    function edit($id = '') {
        $data['result'] = $this->Obj_Track_Type_M->get_user_roles($id);
        $data['id'] = $id;
        $this->layout->view('add_user_role_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');
            $result = $this->Obj_Track_Type_M->check_user_role($this->input->post('user_role'));
            if (!empty($result)) {
                $this->session->set_flashdata('message', 'Already Exist');
            } else {
                $data = array('user_role_name' => $this->input->post('user_role'),
                    'created_date' => $date, 'modified_date' => $date);

                $this->Obj_Track_Type_M->update_user_role($data, $id);

                $this->session->set_flashdata('message', 'Update Sueccessfully');
            }
        }
        redirect('user_role');
    }

    function delete($id) {
        $this->db->delete('user_role', array('user_role_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('user_role');
    }

}

?>
<?php

class Price_package extends CI_Controller{

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('price_package_m', 'Obj_Price_Package_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');

        if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
        }
    }

    function index() {

        $data['result'] = array();
        $this->layout->view('price_package_v', $data);
    }

    function add() {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');
            $result = $this->Obj_Price_Package_M->check_price_package_a($this->input->post('price_package_name'));

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('price_package');
            } else {

        $data = array('price_package_name' =>$this->input->post('price_package_name'));
                $user_id = $this->Obj_Price_Package_M->add_price_package($data);
                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('price_package');
            }
        }

        $data = array();
        $this->layout->view('add_price_package', $data);
    }

    function edit($id = '') {
        $data['result'] = $this->Obj_Price_Package_M->get_price_packages($id);
        $data['id'] = $id;
        $this->layout->view('add_price_package', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');
            $result = $this->Obj_Price_Package_M->check_price_package_e($this->input->post('price_package_name'), $id);

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already Exist');
            } else {

        $data = array('price_package_name' =>$this->input->post('price_package_name'));
                $this->Obj_Price_Package_M->update_price_package($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }

        redirect('price_package');
    }

    function delete($id){
        $this->db->delete('price_package', array('price_package_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('price_package');
    }

}
?>
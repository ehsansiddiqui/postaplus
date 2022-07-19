<?php

class Home extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('user_m', 'Obj_User_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');

         if (!$this->session->userdata('id')) {
            redirect('login/index');
        }
    }

    public function index() {  
        $data = array();
        $data['total_income'] =    array();
        $data['received_amount'] = array();
        $data['total_customers'] = array();
        $this->layout->view('dashboard',$data);
    }

    public function dashboard() {
        $this->layout->view('dashboard');
    }
    

}?>
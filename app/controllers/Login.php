<?php

class Login extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('user_m', 'Obj_User_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function varify() {

        if ($this->input->post("submit")){
            
            $data = array();

            $this->form_validation->set_rules('user', 'Username', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['msg'] = '';
            }

            $user = $this->input->post("user");
            $pass = $this->input->post("pass");
            $result = $this->Obj_User_M->varify($user,$pass);
           

            if ($result == '') {         
                $arr['msg'] = "Incorrect Username Or Password";
                $this->load->view('login_view', $arr);
                
            } else {
                   
                $this->session->set_userdata('id', $result->id);
                if ($this->session->userdata('id')){
                    $this->session->set_userdata('uname', $result->username);
                    $this->session->set_userdata('branch_id', $result->branch_id);
                    $this->session->set_userdata('branch_image', $result->branch_image);
                    $this->session->set_userdata('admin_groups_id', $result->admin_groups_id); 
                    
                   // print_r($this->session->set_userdata('branch_id'));die;
                    
                    redirect('home');
                }       
            }
        } else {

            redirect('login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('admin_groups_id');       
        redirect('login');;
    }

}?>
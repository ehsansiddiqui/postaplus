<?php

class Myorder extends CI_Controller{

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('home_m', 'Obj_Home_M', TRUE);
        $this->load->library('session');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        
        if (!$this->session->userdata('user_id')){
            redirect('index');
        }
    }
    

    function index(){
        
        $data = array();
        $language_id = 1;
        $user_id = $this->session->userdata('user_id');
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['other'] =   $this->Obj_Home_M->get_other($language_id);
        $data['myorder'] = $this->Obj_Home_M->get_myorder($language_id,$user_id);
        $this->load->view('header',$data);
        $this->load->view('myorder');
        $this->load->view('footer');
    }
    
    
    function details($services_id){
        $data = array();
        $data['result'] = $this->Obj_Home_M->get_services_details($services_id);
        $this->load->view('header_inner');
        $this->load->view('services_details',$data);
        $this->load->view('footer');
    }

    
}
?>
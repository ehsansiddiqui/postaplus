<?php

class Other extends CI_Controller {
    

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('home_m', 'Obj_Home_M', TRUE);
        $this->load->library('session');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
   
    }

   function index(){
       
        $others_id = '';
        $others_id = $this->input->get('id');
        $data = array();
        $language_id = 1;
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['other'] = $this->Obj_Home_M->get_other($language_id);
        $data['others'] = $this->Obj_Home_M->get_other_one($language_id,$others_id);
       // print_r($data['gift_category']);die; 
        //$data['home'] = $this->Obj_Home_M->get_home();
        //$data['product'] = $this->Obj_Home_M->get_product();
        //$data['services'] = $this->Obj_Home_M->get_services_home();
        //$data['testimonial'] = $this->Obj_Home_M->get_testimonial();
        //$data['contact'] = $this->Obj_Home_M->get_contact();
        $this->load->view('header',$data);
        $this->load->view('others');
        $this->load->view('footer');
    }
}
?>
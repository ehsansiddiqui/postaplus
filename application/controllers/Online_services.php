<?php
class Online_services extends CI_Controller {

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
        
        $data = array();
        $language_id = $this->session->userdata('language_id')?$this->session->userdata('language_id'):1;
        //$data['services'] = $this->Obj_Home_M->get_services();
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['other'] = $this->Obj_Home_M->get_other($language_id);
        
        
        if($language_id ==2){
        $this->load->view('ar/header_ar',$data);
        $this->load->view('ar/services_ar');
        $this->load->view('ar/footer_ar');
        }else{
        $this->load->view('header',$data);
        $this->load->view('online_service');
        $this->load->view('footer');
        }
        
        
        
        
    }

    
}
?>
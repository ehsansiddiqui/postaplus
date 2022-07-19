<?php
class Index extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('home_m', 'Obj_Home_M', TRUE);
        $this->load->model('Banner_ww', 'Obj_Banner_ww', TRUE);
        $this->load->library('session');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');

    }


   function index(){

        $data = array();
        $language_id = $this->session->userdata('language_id')?$this->session->userdata('language_id'):1;
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['other'] = $this->Obj_Home_M->get_other($language_id);
        $data['banner_web'] =  $this->Obj_Banner_ww->get_all_banner();
       // print_r($data['gift_category']);die;
        //$data['home'] = $this->Obj_Home_M->get_home();
        //$data['product'] = $this->Obj_Home_M->get_product();
        //$data['services'] = $this->Obj_Home_M->get_services_home();
        //$data['testimonial'] = $this->Obj_Home_M->get_testimonial();
        //$data['contact'] = $this->Obj_Home_M->get_contact();
        if($language_id ==2){
        $this->load->view('ar/header_ar',$data);
        $this->load->view('ar/index_ar');
        $this->load->view('ar/footer_ar');
        }else{
        $this->load->view('header',$data);
        $this->load->view('index');
        $this->load->view('footer');
        }
    }
}
?>
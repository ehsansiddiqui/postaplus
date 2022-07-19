<?php
class Technology extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('home_m', 'Obj_Home_M', TRUE);
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
      
    }
    

    function index(){
        $data = array();
        $data['result'] = $this->Obj_Home_M->get_technology();
        $this->load->view('header_inner');
        $this->load->view('technology', $data);
        $this->load->view('footer');
    }
    
    
    function e_waste_collection_center(){
        
        
        $data = array();
        //$data['result'] = $this->Obj_Home_M->get_technology();
        $this->load->view('header');
        $this->load->view('list_of_ ewaste_ collection_ center', $data);
        $this->load->view('footer');
        
    }
}
?>
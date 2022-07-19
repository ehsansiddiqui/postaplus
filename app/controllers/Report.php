<?php

class Report extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('report_m', 'Obj_Report_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    function customer_settlement(){     
        $data = array();
        $data['report'] = "SALES REPORT";
        $data['result'] = $this->Obj_Report_M->get_sales_report();
        $this->layout->view('customer_settlement_v', $data); 
    }
    
    function driver_settlement(){
        $data = array();
        $data['report'] = "DRIVER SETTILEMENT REPORT";
        $data['result'] = $this->Obj_Report_M->get_driver_settlement();
        $this->layout->view('driver_settlement_v', $data);
    }
    
    
    function store_settlement(){
        $data = array();
        $data['report'] = "STORE SETTILEMENT REPORT";
        $data['result'] = $this->Obj_Report_M->get_store_settlement();
        $this->layout->view('store_settlement_v', $data);
    }
    
    function vendor_settlement(){
        $data = array();
        $data['report'] = "VENDOR SETTILEMENT REPORT";
        $data['result'] = $this->Obj_Report_M->get_vendor_settlement();
        $this->layout->view('vendor_settlement_v', $data);
    }
   
}?>
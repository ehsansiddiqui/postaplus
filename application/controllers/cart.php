<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('home_m', 'Obj_Home_M', TRUE);
        $this->load->model('rest_m', 'Obj_Rest_M', TRUE);
        $this->load->library('session');
        $this->load->library('cart');
        $this->load->database();
//        $this->load->library('cart');
        $this->load->library('form_validation');
        date_default_timezone_set('asia/kolkata');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('user_id')) {
            redirect('index');
        }

    }

    function index(){
        $data = array();
        $language_id = 1;
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['print_type'] =   $this->Obj_Home_M->get_print_type();
        $data['branch'] = $this->Obj_Home_M->get_branch();
        $data['other'] =  $this->Obj_Home_M->get_other($language_id);
        $data['cart'] = $this->cart->contents();
        $this->load->view('header',$data);
        $this->load->view('cart/index');
        $this->load->view('footer');

    }



}
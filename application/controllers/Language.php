<?php
class Language extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    } 
    public
            function en(){   
         $this->session->set_userdata('language_id',1);
          redirect('index');
    
    }
    public
            function ar(){ 
       $this->session->set_userdata('language_id',2);
          redirect('index');
    }
}
?>
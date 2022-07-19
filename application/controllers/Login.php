<?php
class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('home_m', 'Obj_Home_M', TRUE);
        $this->load->model('rest_m', 'Obj_Rest_M', TRUE);
        $this->load->library('session');
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        

      
    }
    
   
    public function index(){
        
        $data = array();
        $language_id = 1;
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['other'] = $this->Obj_Home_M->get_other($language_id);
        @$page = $this->input->get('page');
        if(isset($page)){
           $data['page'] = $page; 
        }
        $this->load->view('header',$data);
        $this->load->view('login_v');
        $this->load->view('footer');
    }
  
    public function verify(){
   
       if(isset($_POST)){
           
           
	$phone_number =     $this->input->post('phone_number');
        $password =         $this->input->post('password');
        $created_date = date('Y-m-d H:i:s', time()); 
        $result = $this->Obj_Rest_M->check_user($phone_number,$password);
        
        if(!empty($result)){
            
        $this->session->set_userdata('user_id',$result->user_id);
        $this->session->set_userdata('full_name',$result->full_name);
         $this->session->set_userdata('email_id',$result->email_id);
        $this->session->set_userdata('image',$result->image);
        $data['status'] = 'sucess';
        
        }else{
        $data['status'] = 'error';
        $data['msg'] = 'Incorrect Username Or Password'; 
        }
        echo json_encode($data); 
        } 

    }
    
    
    public function verify_chekout(){
   
       if(isset($_POST)){
           
           
	$phone_number =     $this->input->post('phone_number');
        $password =         $this->input->post('password');
        $created_date = date('Y-m-d H:i:s', time()); 
        $result = $this->Obj_Rest_M->check_user($phone_number,$password);
        
        if(!empty($result)){
            
        $this->session->set_userdata('user_id',$result->user_id);
        $this->session->set_userdata('full_name',$result->full_name);
         $this->session->set_userdata('email_id',$result->email_id);
        $this->session->set_userdata('image',$result->image);

        
        $data['page'] = $this->input->post('page');
        $data['status'] = 'sucess';
        
        }else{
        $data['status'] = 'error';
        $data['msg'] = 'Incorrect Username Or Password'; 
        }
        echo json_encode($data); 
        } 

    }
    
    public function logout(){      
     $this->session->unset_userdata('user_id');
     $this->session->unset_userdata('full_name');
     $this->session->unset_userdata('email_id');
     $this->session->unset_userdata('image');
     
     $this->session->sess_destroy();
     redirect('login');     
    } 
    
}?>
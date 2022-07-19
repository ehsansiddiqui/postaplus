<?php
class Registration extends CI_Controller {

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
       
    public function add(){
        
                
     if(isset($_POST)){
  
	$phone_number =     $this->input->post('phone_number');
        $password =         $this->input->post('password');
        $email_id =         $this->input->post('email_id');
        $full_name =         $this->input->post('full_name'); 
        $created_date = date('Y-m-d H:i:s', time()); 
        
        $result = $this->Obj_Rest_M->users_check($phone_number);
        
     if(!empty($result)){

        $data['status'] = 'error';
        $data['msg'] = 'Phone number is already registered'; 
        
        }else{
            
     $datas = array('phone_number'=>$phone_number,'password'=>$password,'email_id'=>$email_id,'full_name'=>$full_name,'created_date'=>$created_date,'modified_date'=>$created_date,'type'=>1);
     $this->Obj_Rest_M->add_user($datas);          
     $data['status'] = 'sucess';
     $data['msg'] = 'sucess'; 
        
        }
        echo json_encode($data); 
       }
       
       
        
    }

}?>
<?php

class Profile extends CI_Controller{

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
    
    
    
    private
	function uploads($userfile)
		{
        
		$this->load->helper(array(
			'image_helper'
		));
		$config = array(
			'upload_path' => './user/',
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'encrypt_name' => TRUE
		);
		$this->load->library('upload', $config);
		if ($this->upload->do_upload($userfile))
			{
			$upload_data = $this->upload->data();
			return $upload_data;
			}
		  else {
			
                        $error = array(
				'error' => $this->upload->display_errors()
			); 
			$this->session->set_flashdata('message1', 'invalid image');
			redirect('summery');
                        
		      }
	        }

    

    function index(){
        
        
        $user_id = $this->session->userdata('user_id');
         
        if($this->input->post('submit')){
            
          $full_name  = $this->input->post('full_name');
          $email  = $this->input->post('email');
          $address  = $this->input->post('address');
          
          $data = array('full_name'=>$full_name,'email_id'=>$email,'address'=>$address);
          $user_id = $this->Obj_Home_M->update_profile($user_id,$data);
          
          $file_name = NULL;
          
			if (!empty($_FILES['userfile']['name']))
				{
				$userfile = 'userfile';
				$upload_data = $this->uploads($userfile);
				$file_name = $upload_data['file_name'];
				$data1 = array(
					'image' => $file_name
				);
				$this->db->where('user_id',$user_id);
				$this->db->update('user',$data1);
				}
            
        
        $this->session->set_flashdata('message', 'Your changes are successfully updated.');
	redirect('profile'); 
        
         }
        
        
        
        $data = array();
        $language_id = 1; 
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['other'] = $this->Obj_Home_M->get_other($language_id);
        $data['myprofile'] = $this->Obj_Home_M->get_myprofile($language_id,$user_id);
        $this->load->view('header',$data);
        $this->load->view('profile');
        $this->load->view('footer');
    }
    
    
    function details($services_id){
        $data = array();
        $data['result'] = $this->Obj_Home_M->get_services_details($services_id);
        $this->load->view('header_inner');
        $this->load->view('services_details',$data);
        $this->load->view('footer');
    }
    
    
    function change_password(){
        
        
          $user_id = $this->session->userdata('user_id');
          
         if ($this->input->post('submit')){

            $data = array();
            $this->form_validation->set_rules('password', 'New Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]'); 
            
            if ($this->form_validation->run() == FALSE){
                
                
                
            }else{
   
            $new_password = $this->input->post('password'); 
            $data = array('password'=>$new_password);
            $this->Obj_Home_M->change_password($data,$user_id);
            $this->session->set_flashdata('message', 'Your changes are successfully updated.');
	    redirect('profile');    
                
            }
 
         }
         
        $data = array();
        $language_id = 1; 
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['other'] = $this->Obj_Home_M->get_other($language_id);
        $data['myprofile'] = $this->Obj_Home_M->get_myprofile($language_id,$user_id);
        $this->load->view('header',$data);
        $this->load->view('profile');
        $this->load->view('footer');
         
         
        
    }
    
}
?>
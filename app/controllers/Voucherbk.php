<?php

class Voucher extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('voucher_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        
        
        
        
         if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
            
        }
        
         
    }

    function index() {

        $data['result'] = $this->Obj_Track_Type_M->get_all_voucher();
        $this->layout->view('voucher', $data);
    }
    
    function add() {

        if ($this->input->post('submit')) {

            print_r('ok');die;
            
            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_voucher($this->input->post('voucher_code'));

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('voucher');
            } else {
                
                $expiry =  date('Y-m-d',strtotime($this->input->post('expiry_date')));
                $created =  date('Y-m-d',strtotime($this->input->post('expiry_date')));
                
                $user_id =   $this->input->post('user_id');
                
                print_r($user_id);die;
                
                if(!empty($user_id)){
                   $email_id= $this->Obj_Track_Type_M->get_email_user($user_id);
                    
                    $user_flag='1';
                    
                    
                }else{
                    
               $email_id= $this->Obj_Track_Type_M->get_email_user_all();

                    
                    $user_flag='0';
                }
                

                $data = array('voucher_code' => $this->input->post('voucher_code'), 'voucher_desc' => $this->input->post('voucher_desc'),'created_date' => $date, 'modified_date' => $date,'voucher_type' => $this->input->post('voucher_type'),'voucher_reduction' => $this->input->post('voucher_reduction'),'minimum_amount' => $this->input->post('minimum_amount'),'created_date' => $created,'expiry_date' => $expiry,'user_flag' => $user_flag);
                
                $voucher_id=$this->Obj_Track_Type_M->add_voucher($data);
                $voucher_code=$this->input->post('voucher_code');
                
                 foreach ($email_id as $email){
                     
                   if($email->email_id != NULL){
                       
                       $em = $email->email_id;
                   } else {
                          $em = $email->fb_email;
                   }  
                     
                
               $subject_email = "Hybper Voucher Code";
               $message_email = "<html><title></title><body>";
               $message_email = "<table>";
               $message_email .= "<tr><td>New Voucher Code is generated. Your Voucher Code is $voucher_code</td></tr></table>";
               $message_email .= "</body></html>";
               $headers = 'MIME-Version: 1.0' . "\n";
               $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
               $headers .= 'From: Hybper<noreply@hypber.com>' . "\n";
               
               
               
               @mail($em, $subject_email, $message_email, $headers);

                 }
                
                
                       
                if(!empty($user_id)){
                    
               foreach ($user_id as $user){            
                 $data1 = array('user_id'=>$user,'voucher_id'=>$voucher_id); 
                 
                
                 $this->db->insert('voucher_user',$data1);  
               } 
               
               
            }

                           
                $this->session->set_flashdata('message', 'Insert Successfully');
                redirect('voucher');
            }
        }
        $data['user'] = $this->Obj_Track_Type_M->get_all_user();
       

        $data['studio'] = $this->Obj_Track_Type_M->get_all_studio();

        $this->layout->view('add_voucher',$data);
    }

    function edit($id = '') {
        
        $data['voucher_user'] = $this->Obj_Track_Type_M->get_voucher_of_user($id);
        $data['user'] = $this->Obj_Track_Type_M->get_all_user();

        $data['result'] = $this->Obj_Track_Type_M->get_voucher($id);
        $data['id'] = $id;
        $this->layout->view('add_voucher', $data);
    }
    

    
    

    function edit_1($id = '') {

       if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Track_Type_M->check_voucher_user($this->input->post('voucher_code'),$id);

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already Exist');
                redirect('voucher');
            }  else { 
                $expiry =  date('Y-m-d',strtotime($this->input->post('expiry_date')));
                $created =  date('Y-m-d',strtotime($this->input->post('expiry_date')));
                
                if($this->input->post('user')=='bod'){
                     $user_id =   $this->input->post('user_id');
                }
                else{
                     $user_id = "";
                }
                
                
                if(!empty($user_id)){
                   $email_id= $this->Obj_Track_Type_M->get_email_user($user_id);
                    
                    $user_flag='1';
                    
                    
                }else{
                    
                $email_id= $this->Obj_Track_Type_M->get_email_user_all();

                    
                    $user_flag='0';
                }

                $data = array('voucher_code' => $this->input->post('voucher_code'), 'voucher_desc' => $this->input->post('voucher_desc'),'created_date' => $date, 'modified_date' => $date,'voucher_type' => $this->input->post('voucher_type'),'voucher_reduction' => $this->input->post('voucher_reduction'),'minimum_amount' => $this->input->post('minimum_amount'),'created_date' => $created,'expiry_date' => $expiry,'user_flag' => $user_flag);
                
             

              
                $this->Obj_Track_Type_M->update_voucher($data,$id);

                 $voucher_code=$this->input->post('voucher_code');
                
                 foreach ($email_id as $email){
                     
                   if($email->email_id != NULL){
                       
                       $em = $email->email_id;
                   } else {
                          $em = $email->fb_email;
                   }  
                     
                
               $subject_email = "Hybper Voucher Code";
               $message_email = "<html><title></title><body>";
               $message_email = "<table>";
               $message_email .= "<tr><td>New Voucher Code is generated. Your Voucher Code is $voucher_code</td></tr></table>";
               $message_email .= "</body></html>";
               $headers = 'MIME-Version: 1.0' . "\n";
               $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
               $headers .= 'From: Hybper<noreply@hypber.com>' . "\n";
               
               
               
               @mail($em, $subject_email, $message_email, $headers);

                 }
                
               
                
                 
                $this->db->delete('voucher_user', array('voucher_id' => $id));      
                if(!empty($user_id)){
                    
               foreach ($user_id as $user){            
                  $data1 = array('user_id'=>$user,'voucher_id'=>$id);
                  $this->db->insert('voucher_user',$data1);  
               } 
              
               
              }
            

                           
                $this->session->set_flashdata('message', 'Update Successfully');
                redirect('voucher');
            }
        }
        $data['user'] = $this->Obj_Track_Type_M->get_all_user();
       

        $data['studio'] = $this->Obj_Track_Type_M->get_all_studio();

        $this->layout->view('voucher',$data);
    }

    
    


    function delete($id) {

         
                $this->db->delete('voucher', array('voucher_id' => $id));

                $this->db->delete('voucher_user', array('voucher_id' => $id));

                
        redirect('voucher');
    }

 

}

?>
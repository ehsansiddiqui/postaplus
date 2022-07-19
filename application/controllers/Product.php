<?php
class Product extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('home_m', 'Obj_Home_M', TRUE);
        $this->load->library('session');
        $this->load->library('form_validation');
          $this->load->library('email');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
      
    }
    

    function index(){
        
        $data = array();
        $response = array();
        $data['category'] = $this->Obj_Home_M->get_category();
        $data['product']  =  $this->Obj_Home_M->get_all_product();
        $data['res'] = $response;
        $this->load->view('header_inner');
        $this->load->view('product', $data);
        $this->load->view('footer');
    }
    
    
    function details($product_id){
        $data = array();
        $data['result'] = $this->Obj_Home_M->get_product_details($product_id);
        $this->load->view('header_inner');
        $this->load->view('product_details', $data);
        $this->load->view('footer');
    }
    
    
    
    function request_quote(){
        
//            $email=$this->input->post('email');
//            $settings = $this->Obj_Home_M->get_all($condition);

        
        
            $to = 'tshijin100@gmail.com';
            
            $product_id=$this->input->post('product_id');
            
            $subject = 'PRINTECHS';	
	    $message = '<table width="400" border="0" cellpadding="3">
              

               <tr>
                <td>Product Name</td>
                <td>' . $this->input->post('product_name') . '</td>
              </tr>
              
               <tr>
                <td>First Name</td>
                <td>' . $this->input->post('name') . '</td>
              </tr>
              
              <tr>
                <td>E-mail</td>
                <td>' . $this->input->post('email') . '</td>
              </tr>
		
         
              <tr>
                <td>Contact Number</td>
                <td>' . $this->input->post('phone') . '</td>
              </tr>
			   
	       <tr>
                <td>Destination</td>
                <td>' . $this->input->post('address') . '</td>
              </tr>
              
     
            </table>';
	
//       echo $message;die;




         
	$headers  = 'MIME-Version: 1.0' . "\r\n";
  	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
//	$headers .= 'From: '.$this->input->post('name').'<noreply@printechs.com>' . "\r\n";
        $headers .= 'From: '.$this->input->post('name')."\r\n";

    // SEND MAIL
    //mail($to,$subject,$message,$headers);
  $this->session->set_flashdata('m','Thank you for your interest in "'.$this->input->post('product_name').'"  . We will get back to you soon.. '); 
//@mail('manuspbvr@gmail.com',$subject,$message,$headers);
  @mail($to,$subject,$message,$headers);
   redirect('product/details/'.$product_id);
        
    }
    
}
?>
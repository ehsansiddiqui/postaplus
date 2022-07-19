<?php
class Order extends CI_Controller

	{
	public

	function __construct()
		{
		parent::__construct();
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('layout');
		$this->load->library('session');
		$this->load->model('order_m', 'Obj_Order_M', TRUE);
		$this->load->database();
		$this->load->library('email');
		$this->load->library('form_validation');
		date_default_timezone_set('Asia/Kuwait');
		$this->date = date('Y-m-d');
		if (!$this->session->userdata('id'))
			{
			redirect('login');
			}
		}

	function index()
		{
            
            if ($this->session->userdata('admin_groups_id')==1){ 
		$data = array();
		$data['result'] = $this->Obj_Order_M->get_all_order();
		$data['status'] = array();
		$data['order_number'] = array();
		$data['customer'] = array();
		$data['store'] = array();
		$this->layout->view('order_v', $data);
              }else{ 
                 redirect('home');
              }
                
                
		}

	function details($order_id)
		{
                 
                if($this->session->userdata('admin_groups_id')==1){
                     
		 $data = array();
		 $data['result'] = $this->Obj_Order_M->get_order_details($order_id); 
                 if($data['result']->order_type == 'gift'){    
                  $data['category'] =  $this->Obj_Order_M->get_order_type_gift_cate($data['result']->category_id);
                 }elseif($data['result']->order_type == 'printing'){
                 $data['category'] =  $this->Obj_Order_M->get_order_type_print_cate($data['result']->category_id);   
                 }elseif ($data['result']->order_type == 'government paper'){
                  $data['category'] =  $this->Obj_Order_M->get_order_type_gov_cate($data['result']->category_id);
                 }elseif ($data['result']->order_type == 'photo printing') {
                  $data['category'] =  $this->Obj_Order_M->get_order_type_photo_printing($data['result']->item_id);  
                 }elseif ($data['result']->order_type == 'summary'){
                  $data['category'] =  $this->Obj_Order_M->get_order_type_summary($data['result']->category_id);  
                 }else {
                    $data['category'] = array();
                 }
                 
               // print_r( $data['category']);die;
		//$data['order_details'] = $this->Obj_Order_M->get_cart_details($order_id);
		//$data['bag'] = $this->Obj_Order_M->get_order_bag($order_id);
                 
		$data['status'] = $this->Obj_Order_M->get_status();
                $data['branch'] = $this->Obj_Order_M->get_branch();
		$data['order_id'] = $order_id;
		$this->layout->view('order_detail_v', $data);
                
                 }else{
                 
                 redirect('home');
                     
                 }
		
                
                }

	function delete($order_id)
		{
		$this->db->delete('order_details', array(
			'order_id' => $order_id
		));
		$this->session->set_flashdata('message', 'Deleted Successfully');
		redirect('order');
		}


                
                
            function change_status($order_id){
                    if ($this->input->post('submit'))
			{ 
                        $order_status_id = $this->input->post('order_status_id');
                        $email_order_ =  $this->input->post('email_order_');
                        $data = array('status'=>$order_status_id);
                        $this->db->where('order_id',$order_id);
                        $this->db->update('order_details',$data);
                         if($order_status_id == '503'){
                              $email_id = $this->session->userdata('email_id');
                            //   $order_id = $this->input->post('order_id'); 
                              $admin_email = $email_id;
                                $full_name = $this->session->userdata('full_name');
                                $subject = 'Order Information from '.date('M d').', '.date('Y').'';	
                            	$message = '<table width="400" border="0" cellpadding="3">
                                       <tr>
                                       <td>YOur Order id '.$order_id.' is ready.</td>
                                      </tr>
                                    </table>';
                        	     $headers = 'MIME-Version: 1.0' . "\n";
                                 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
                                 $headers .= 'From:postastc.com' . "\n";
                                 @mail($email_order_,$subject,$message,$headers);    
                                 echo '<script>alert("test");</script>';
                         }
                        }
                       
                       redirect('order/details/'.$order_id);
              }
                
                
                function assign_branch(){
                     $branch_id = $this->input->post('branch_id');
                     $order_id = $this->input->post('order_id'); 
                     if($this->db->delete('order_branch',array('order_id'=>$order_id))){  
                         $data = array('order_id'=>$order_id,'branch_id'=>$branch_id);     
                         if($this->db->insert('order_branch',$data)){
                             
                       $data = $this->Obj_Order_M->get_branch_details($branch_id);
                             
                            $headers = 'MIME-Version: 1.0' . "\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
                            $headers .= 'From:postastc@postastc.com' . "\n";
                            $subject1 = 'Assign to new order from postastc';
                $message1 = '<table width="400" border="0" cellpadding="1">
                <tr>
                <td>OREDER NUMBER'.' '.$order_id.'</td>
                </tr>
                <tr>
                <td>Should you require to reach us urgently please call +965-24738383.</td>
                </tr>
                </table>';
               @mail($data->branch_email,$subject1,$message1,$headers);
  
                             
                        }
                    } 
                }
                
                
          function branch_order()
		{
              
            if ($this->session->userdata('admin_groups_id')==2){ 
		$data = array();
                $branch_id = $this->session->userdata('branch_id'); 
		$data['result'] = $this->Obj_Order_M->get_order_branch($branch_id);      
		$data['status'] = array();
		$data['order_number'] = array();
		$data['customer'] = array();
		$data['store'] = array();
		$this->layout->view('branch_order_v', $data);
              }else{ 
                 redirect('home');
              }
            }
            
            
            
            function baranc_order_details($order_id)
		{
                 
                if($this->session->userdata('admin_groups_id')==2){
                     
		 $data = array();
		 $data['result'] = $this->Obj_Order_M->get_branch_order_details($order_id); 
                 if($data['result']->order_type == 'gift'){    
                  $data['category'] =  $this->Obj_Order_M->get_order_type_gift_cate($data['result']->category_id);
                 }elseif($data['result']->order_type == 'printing'){
                 $data['category'] =  $this->Obj_Order_M->get_order_type_print_cate($data['result']->category_id);   
                 }elseif ($data['result']->order_type == 'government paper'){
                  $data['category'] =  $this->Obj_Order_M->get_order_type_gov_cate($data['result']->category_id);
                 }elseif ($data['result']->order_type == 'photo printing') {
                  $data['category'] =  $this->Obj_Order_M->get_order_type_photo_printing($data['result']->item_id);  
                 }elseif ($data['result']->order_type == 'summary'){
                  $data['category'] =  $this->Obj_Order_M->get_order_type_summary($data['result']->category_id);  
                 }else {
                    $data['category'] = array();
                 }
                 
		$data['status'] = $this->Obj_Order_M->get_status();
                $data['branch'] = $this->Obj_Order_M->get_branch();
		$data['order_id'] = $order_id;
		$this->layout->view('branch_order_detail_v', $data);
                
                 }else{
                 
                 redirect('home');
                     
                 }
		
                
                }
                
	} ?>
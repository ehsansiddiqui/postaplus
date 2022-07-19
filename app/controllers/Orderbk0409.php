<?php

class Order extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('order_m', 'Obj_Order_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    function index(){
        $data = array();
        $data['result'] = $this->Obj_Order_M->get_all_order();
        $data['status'] = $this->Obj_Order_M->get_all_status();
        $data['order_number'] = $this->Obj_Order_M->get_all_order_number();
        $data['customer'] = $this->Obj_Order_M->get_all_customer();
        $data['store'] = $this->Obj_Order_M->get_all_store();
        $this->layout->view('order_v', $data);
    }

    function details($order_id) {
        $data = array();
        $data['result'] = $this->Obj_Order_M->get_order_details($order_id);
        $data['order_details'] = $this->Obj_Order_M->get_cart_details($order_id);
        $data['bag'] = $this->Obj_Order_M->get_order_bag($order_id);
        $data['status'] = $this->Obj_Order_M->get_status();
        $data['order_id'] = $order_id;
        $this->layout->view('order_detail_v', $data);
    }

    function add($order_id = '') {

        if ($this->input->post('submit')) {

            $result = $this->Obj_Order_M->check_order_a($this->Obj_Order_M->escapeString($this->input->post('product_type_id')), $order_id);

            if (!empty($result)) {

                $this->session->set_flashdata('message1', 'Already exist this item');
              
            } else {

                $product_type_id = $this->input->post('product_type_id');
                $product_type = $this->Obj_Order_M->get_product_type($product_type_id);
                $qty = $this->input->post('qty');
                $total = $qty * $product_type->product_price;

                if (!empty($this->input->post('addons_id'))) {
                    $addons_id = $this->input->post('addons_id');
                    foreach ($addons_id as $add) {
                        $add_on_price = $this->Obj_Order_M->get_add_on_price($add);
                        $add_ons[] = $add_on_price->addons_price;
                    }
                    $sum_add_on = array_sum($add_ons);
                    $addons = implode('+', $addons_id);
                    $total = $qty * $product_type->product_price + $sum_add_on;
                } else {
                    $addons = NULL;
                }

                $data = array('order_id' => $order_id, 'type_id' => $product_type->types_id, 'product_id' => $product_type->product_id, 'quantity' => $qty, 'total' => $total, 'product_type_id' => $product_type->product_type_id, 'addons_id' => $addons);
                 $this->Obj_Order_M->add_order($data, $order_id, $total);
                $this->session->set_flashdata('message', 'Inserted Successfully');
               
                
                
                
            }
            
             redirect('order/details/'.$order_id); 
            
        }

        $data = array();
        $data['category'] =   $this->Obj_Order_M->get_types();
        $data['addons']   =   $this->Obj_Order_M->get_add_on();
        $data['order_id'] =   $order_id;
        $this->layout->view('add_order_v', $data);
     
    }

    function edit($id = '') {

        $data['result'] = $this->Obj_Order_M->get_orders($id);
        $data['id'] = $id;
        $this->layout->view('add_order_v', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');

            $result = $this->Obj_Order_M->check_order($this->input->post('order'), $id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {
                $data = array('activity_name' => $this->input->post('order'), 'activity_description' => $this->input->post('activity_description'),
                    'created_date' => $date, 'modified_date' => $date);
                $this->Obj_Order_M->update_order($data, $id);
                $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('order');
    }

    function delete($order_id) {
        $this->db->delete('order_details', array('order_id' => $order_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('order');
    }

    function get_products() {

        if (isset($_POST['types_ids'])) {

            $types_ids = $this->input->post('types_ids');
            $order_id = @$this->input->post('order_ids');
            $data['order_id'] = $order_id;
            $data['gender_type'] = $this->Obj_Order_M->get_gender_types($types_ids);
            $data['order_id'] = $order_id;
            $data['types_id'] = $types_ids;
//          $data['product']  =  $this->Obj_Order_M->get_products($types_ids);
            $this->load->view('add_order_cart_v', $data);
        }
    }

    function get_products1() {

        @$gender_ids = $this->input->post('gender_ids');
        @$types_ids = $this->input->post('types_ids');
        @$order_id = $this->input->post('order_ids');
        $data['product'] = $this->Obj_Order_M->get_products($gender_ids, $types_ids);
        $this->load->view('add_order_cart_v1', $data);
    }
    
    function edit_order($order_id){
        
     $data = array();
     $data['result'] = $this->Obj_Order_M->get_order_details($order_id);
     $data['status'] = $this->Obj_Order_M->get_status();
     $data['bag'] = $this->Obj_Order_M->get_order_bag($order_id); 
     $data['order_details'] = $this->Obj_Order_M->get_cart_details($order_id);
     
     //print_r($data['order_details']);die;
     
     $data['driver'] = $this->Obj_Order_M->get_all_driver();
     
        $data['customer'] = $this->Obj_Order_M->get_customer();
        $data['product_types'] = $this->Obj_Order_M->get_product_types();
        $data['pickup'] = $this->Obj_Order_M->get_pickup();
        $data['addons'] = $this->Obj_Order_M->get_add_on();
        $data['store'] = $this->Obj_Order_M->get_all_store();
        $data['category'] =   $this->Obj_Order_M->get_types();
        
//      print_r($data['category']);die;
 
     
     $data['order_id'] = $order_id;
     $this->layout->view('edit_order_v',$data);
     
    }
    
    function order_edit_1($order_id){
  
        $date = date('Y-m-d');
        $data = array('order_status' => $this->input->post('order_status_id'),
        'notes' => $this->input->post('notes'),
        'modified_date' => $date);
       $this->Obj_Order_M->update_order($data,$order_id);
       if(!empty($this->input->post('delivery_bag_no'))){      
          $result = $this->Obj_Order_M->get_order_bag($order_id);
          if(!empty($result)){
              $data1 = array('delivery_bag_no'=>$this->input->post('delivery_bag_no'));
              
              $this->Obj_Order_M->update_order_bag($data1,$order_id);
          }  else {
              
              $data1 = array('order_id'=>$order_id,'delivery_bag_no'=>$this->input->post('delivery_bag_no'));
               $this->Obj_Order_M->add_order_bag($data1);
          } 
       }
       
    $this->session->set_flashdata('message', 'Updated Successfully');
      redirect('order/details/'.$order_id);
    }
    
    function new_order(){
         
      if (isset($_POST['submit'])){

          
          print_r(json_encode($_POST));die;
          
        $json = json_decode(json_encode($_POST), true);
        
        print_r($json);die;
        
        $pickup_date =     $json['pickup_date'];
        $scheduled_date =  $json['scheduled_date'];
        $delivery_bag_no = $json['delivery_bag_no'];
        $pickup_bag_no =   $json['pickup_bag_no'];
        $driver_id =       $json['driver_id'];
        $notes     =       $json['notes'];
        $order_status_id = $json['order_status_id'];
        
        $order_data = array('driver_id'=>$driver_id,'pickup_date'=>$pickup_date,'scheduled_date'=>$scheduled_date,'notes'=>$notes,'order_status'=>$order_status_id);
        
        $this->db->where('order_id',$order_id);
        $this->db->update('orders',$order_data);
        
        if(!empty($delivery_bag_no)){
            
           $res_bag = $this->db->get_where('order_bag',array('order_id'=>$order_id))->row();
           $delivery_bag = array('order_id'=>$order_id,'delivery_bag_no'=>$delivery_bag_no);
           if(!empty($res_bag)){
            $this->db->where('order_id',$order_id);
            $this->db->update('order_bag',$delivery_bag);
           }else{
              $this->db->insert('order_bag',$delivery_bag);
           }
            
            
         }    
        if(!empty($pickup_bag_no)){  
           $res_bag1 = $this->db->get_where('order_bag',array('order_id'=>$order_id))->row();
           $pickup_bag = array('order_id'=>$order_id,'pickup_bag_no'=>$pickup_bag_no);;
           if(!empty($res_bag1)){
            $this->db->where('order_id',$order_id);
            $this->db->update('order_bag',$pickup_bag);
           }else{
             $this->db->insert('order_bag',$delivery_bag);
           } 
        }
        
        $item_name = array();
        $item_quantity = array();      
        $item_addon = array();
        $total = array();
        
        $item_name = $json['item_name'];
        $item_quantity = $json['item_quantity'];
        if(@$json['addons']){
        $item_addon = $json['addons'];
        }
        $total = $json['total'];
        
        

        if(!empty($item_name)){
            
            
         $this->db->delete('order_details',array('order_id'=>$order_id));   

        foreach ($item_name as $id => $key){
            if(!empty($key)){
           $data_key = $this->Obj_Order_M->get_product_ids($key);
           @$exploide = explode(",", $item_addon[$id]);   
           @$implode = implode("+",$exploide);
            
                 $result[] = array(
        'order_id'=>$order_id,
        'type_id'=>$data_key->types_id,
        'product_id'=>$data_key->product_id,             
        'product_type_id'=>$key,    
        'quantity'  => $item_quantity[$id],
        'total' => $total[$id],
        'addons_id'=>$implode               
                     );
                 
            }
                 
        }
        
       // print_r($result);die;
        
        $sum = 0;
        foreach ($result as $row){  
           $sum+= $row['total'];
           $data = array('order_id'=>$row['order_id'],'type_id'=>$row['type_id'],'product_id'=>$row['product_id'],'quantity'=>$row['quantity'],'total'=>$row['total'],'product_type_id'=>$row['product_type_id'],'addons_id'=>$row['addons_id']);
           $this->db->insert('order_details',$data);
        }
        
        $gerad_total = array('total_amount'=>$sum);
        $this->db->where('order_id',$order_id);
        $this->db->update('orders',$gerad_total);
        
        }
                
                
                
            
        }
        
        $data = array();  
        $data['status'] = $this->Obj_Order_M->get_status();
        $data['driver'] = $this->Obj_Order_M->get_all_driver();
        $data['customer'] = $this->Obj_Order_M->get_customer();
        $data['product_types'] = $this->Obj_Order_M->get_product_types();
        $data['pickup'] = $this->Obj_Order_M->get_pickup();
        $data['addons'] = $this->Obj_Order_M->get_add_on();
        $data['store'] = $this->Obj_Order_M->get_all_store();
        $data['category'] =   $this->Obj_Order_M->get_types();
        $max_id =   $this->Obj_Order_M->get_max();
        $order_ids = sprintf("%02d", $max_id->maxid);
        $order_number = 'K' . $order_ids;
        $data['order_number'] = $order_number;
        $this->layout->view('add_new_order_v',$data);
        
    }
    
    
    
    function search(){
        
                $search = array();  
                $order_status_id = $this->input->post('order_status_id');
                $order_id = $this->input->post('order_id');
                $customer_id = $this->input->post('customer_id');
                $order_from = $this->input->post('order_from'); 
                $order_to = $this->input->post('order_to');
                $store_id = $this->input->post('store_id');
                $pickup_bag = $this->input->post('pickup_bag');
                $delivery_bag = $this->input->post('delivery_bag');

                $sql = "";
                
                if ($order_status_id != NULL){
                    $sql .=  " AND O.order_status = ".$order_status_id;
                }
                if ($order_id != NULL){
                    $sql .= " AND O.order_id = ".$order_id;
                }
                if ($customer_id != NULL){
                    $sql .= " AND O.customer_id = ".$customer_id;
                }
                if ($order_from != NULL){
                    $order_froms = date('Y-m-d',strtotime($order_from));
                    $sql .= " AND O.created_date >= '$order_froms'";
                }                
                if ($order_to != NULL){
                    $order_to = date('Y-m-d',strtotime($order_to));
                    $sql .= " AND O.created_date <= '$order_to'";
                }
                
               $data['order_status_id'] = @$order_status_id;
               $data['order_id'] = @$order_id;
               $data['order_froms'] = @$order_froms;
               $data['order_to'] = @$order_to; 
               $data['result'] = $this->Obj_Order_M->search($sql);       
               $data['status'] = $this->Obj_Order_M->get_all_status();
               $data['order_number'] = $this->Obj_Order_M->get_all_order_number();
               $data['customer'] = $this->Obj_Order_M->get_all_customer();
               $data['store'] = $this->Obj_Order_M->get_all_store();
               $this->layout->view('order_v', $data);
    }
    
    
    
    function get_customer(){

           if (isset($_REQUEST['customer_ids'])){
            $customer_ids = $this->input->post('customer_ids');
            $data = $this->Obj_Order_M->get_customer_one($customer_ids);
            $this->session->set_userdata('price_package_id', $data->price_package_id);
            //$this->load->view('get_customer_v', $data);
            echo json_encode($data);
            
        }
    }
    
    
     function get_price(){
           if (isset($_REQUEST['product_type_ids'])){
           $product_type_ids = $this->input->post('product_type_ids');
           $data = $this->Obj_Order_M->get_price($product_type_ids);
           echo json_encode($data);
            
        }
    }
    
    
     function get_add_price(){
           if (isset($_REQUEST['addons_ids'])){
           $addons_ids = $this->input->post('addons_ids');
           $data = $this->Obj_Order_M->get_add_price($addons_ids);
           echo json_encode($data);   
        }
    }
    
    
    function update_order($order_id){
        
      if(isset($_POST['submit'])){
          
        $json = json_decode(json_encode($_POST), true);
        $pickup_date =     $json['pickup_date'];
        $scheduled_date =  $json['scheduled_date'];
        $delivery_bag_no = $json['delivery_bag_no'];
        $pickup_bag_no =   $json['pickup_bag_no'];
        $driver_id =       $json['driver_id'];
        $notes     =       $json['notes'];
        $order_status_id = $json['order_status_id'];
        
        $order_data = array('driver_id'=>$driver_id,'pickup_date'=>$pickup_date,'scheduled_date'=>$scheduled_date,'notes'=>$notes,'order_status'=>$order_status_id);
        
        $this->db->where('order_id',$order_id);
        $this->db->update('orders',$order_data);
        
        if(!empty($delivery_bag_no)){
            
           $res_bag = $this->db->get_where('order_bag',array('order_id'=>$order_id))->row();
           $delivery_bag = array('order_id'=>$order_id,'delivery_bag_no'=>$delivery_bag_no);
           if(!empty($res_bag)){
            $this->db->where('order_id',$order_id);
            $this->db->update('order_bag',$delivery_bag);
           }else{
              $this->db->insert('order_bag',$delivery_bag);
           }
            
            
         }    
        if(!empty($pickup_bag_no)){  
           $res_bag1 = $this->db->get_where('order_bag',array('order_id'=>$order_id))->row();
           $pickup_bag = array('order_id'=>$order_id,'pickup_bag_no'=>$pickup_bag_no);;
           if(!empty($res_bag1)){
            $this->db->where('order_id',$order_id);
            $this->db->update('order_bag',$pickup_bag);
           }else{
             $this->db->insert('order_bag',$delivery_bag);
           } 
        }
        
        $item_name = array();
        $item_quantity = array();      
        $item_addon = array();
        $total = array();
        
        $item_name = $json['item_name'];
        $item_quantity = $json['item_quantity'];
        if(@$json['addons']){
        $item_addon = $json['addons'];
        }
        $total = $json['total'];
        
        

        if(!empty($item_name)){
            
            
         $this->db->delete('order_details',array('order_id'=>$order_id));   

        foreach ($item_name as $id => $key){
            if(!empty($key)){
           $data_key = $this->Obj_Order_M->get_product_ids($key);
           @$exploide = explode(",", $item_addon[$id]);   
           @$implode = implode("+",$exploide);
            
                 $result[] = array(
        'order_id'=>$order_id,
        'type_id'=>$data_key->types_id,
        'product_id'=>$data_key->product_id,             
        'product_type_id'=>$key,    
        'quantity'  => $item_quantity[$id],
        'total' => $total[$id],
        'addons_id'=>$implode               
                     );
                 
            }
                 
        }
        
       // print_r($result);die;
        
        $sum = 0;
        foreach ($result as $row){  
           $sum+= $row['total'];
           $data = array('order_id'=>$row['order_id'],'type_id'=>$row['type_id'],'product_id'=>$row['product_id'],'quantity'=>$row['quantity'],'total'=>$row['total'],'product_type_id'=>$row['product_type_id'],'addons_id'=>$row['addons_id']);
           $this->db->insert('order_details',$data);
        }
        
        $gerad_total = array('total_amount'=>$sum);
        $this->db->where('order_id',$order_id);
        $this->db->update('orders',$gerad_total);
        
        }
        
     
    }
    
     redirect('order/details/'.$order_id);
    }
}?>
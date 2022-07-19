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

    function index() {
        $data = array();
        $data['result'] = $this->Obj_Order_M->get_all_order();
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
        $data['category'] = $this->Obj_Order_M->get_types();
        $data['addons'] = $this->Obj_Order_M->get_add_on();
        $data['order_id'] = $order_id;
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
            $order_id = $this->input->post('order_ids');
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
        
     $data['result'] = $this->Obj_Order_M->get_order_details($order_id);
     $data['status'] = $this->Obj_Order_M->get_status();
     $data['bag'] = $this->Obj_Order_M->get_order_bag($order_id);
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
         
        if ($this->input->post('submit')){

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
        redirect('order'); 
            
        }
        
        $data = array();
        $data['category'] = $this->Obj_Order_M->get_types();
        $data['addons'] = $this->Obj_Order_M->get_add_on();
        $this->layout->view('add_new_order_v',$data);
        
    }
}?>
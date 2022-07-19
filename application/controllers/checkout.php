<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{

    function  __construct(){
        parent::__construct();

        // Load form library & helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('home_m', 'Obj_Home_M', TRUE);
        $this->load->model('rest_m', 'Obj_Rest_M', TRUE);
        // Load cart library
        $this->load->library('cart');

        // Load product model
//        $this->load->model('product');
        date_default_timezone_set('Asia/Kuwait');
        $this->controller = 'checkout';
    }

    function index(){
        // Redirect if the cart is empty
        if($this->cart->total_items() <= 0){
            redirect('printing/');
        }

        $custData = $data = array();

        // If order request is submitted
//        $submit = $this->input->post('placeOrder');

//        if(isset($submit)){

            // Form field validation rules
//            $this->form_validation->set_rules('name', 'Name', 'required');
//            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
//            $this->form_validation->set_rules('phone', 'Phone', 'required');
//            $this->form_validation->set_rules('address', 'Address', 'required');


            // Prepare customer data
//            $custData = array(
//                'name'     => strip_tags($this->input->post('name')),
//                'email'     => strip_tags($this->input->post('email')),
//                'phone'     => strip_tags($this->input->post('phone')),
//                'address'=> strip_tags($this->input->post('address'))
//            );
//        echo '' ;
//        $cartData = $this->cart->contents();
//        die();
        $custID = $this->session->userdata('user_id');

        $order = $this->placeOrder($custID);
            // Validate submitted form data
//            if($this->form_validation->run() == true){
                // Insert customer data

//                $insert = $this->product->insertCustomer($custData);

                // Check customer data insert status
//                if($insert){
//                    // Insert order
//
//
//                    // If the order submission is successful
//                    if($order){
//                        $this->session->set_userdata('success_msg', 'Order placed successfully.');
//                        redirect($this->controller.'/orderSuccess/'.$order);
//                    }else{
//                        $data['error_msg'] = 'Order submission failed, please try again.';
//                    }
//                }else{
//                    $data['error_msg'] = 'Some problems occured, please try again.';
//                }
//            }
//        }

        // Customer data
        $data['custData'] = $custData;

        // Retrieve cart data from the session
        $data['cartItems'] = $this->cart->contents();

        // Pass products data to the view
        $this->load->view($this->controller.'/index', $data);
    }

    function placeOrder($custID){
        // Insert order data

        $ordData = array(
            'customer_id' => $custID,
            'grand_total' => $this->cart->total()
        );
//        print_r($ordData);

        $insertOrder = true;

        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();

            // Cart items
            $ordItemData = array();
            $i=0;
            $order_number =  date('mdY his ', time());
            foreach($cartItems as $item){
//                $ordItemData['order_number']     = $order_number;
                $ordItemData[$i]['order_number']     = $order_number;
//                $ordItemData[$i]['order_id']     = $insertOrder;
//                $ordItemData[$i]['id']     = $item['id'];
//                $ordItemData[$i]['name']     = $item['name'];
                $ordItemData[$i]['price']     = $item['price'];
                $ordItemData[$i]['user_id']     = $item['user_id'];
                $ordItemData[$i]['item_id']     = $item['item_id'];
                $ordItemData[$i]['printing_file']     = $item['image'];
                $ordItemData[$i]['category_id']     = $item['category_id'];
                $ordItemData[$i]['attributes_id']     = $item['attributes_id'];
                $ordItemData[$i]['branch_id']     = $item['branch_id'];
                $ordItemData[$i]['pickup_addr']     = $item['pickup_addr'];
                $ordItemData[$i]['delivery_addr']     = $item['delivery_addr'];
                $ordItemData[$i]['order_date']     = $item['order_date'];
                $ordItemData[$i]['created_date']     = $item['created_date'];
                $ordItemData[$i]['order_type']     = $item['order_type'];
                $ordItemData[$i]['payment_status']     = $item['payment_status'];
                $ordItemData[$i]['qty']     = $item['qty'];
//                $ordItemData[$i]['total_price']     = $item['total_price'];
                $ordItemData[$i]['total_price']     = $item["subtotal"];
                $i++;
            }
               print_r($ordItemData);
//

            if(!empty($ordItemData)){
                // Insert order items

                $insertOrderItems = $this->Obj_Home_M->insertOrderItems($ordItemData);

                if($insertOrderItems){
                    // Remove items from the cart
                    $this->cart->destroy();

                    // Return order ID
//                    return $insertOrder;
//                     If the order submission is successful
                    $this->session->set_userdata('success_msg', 'Order placed successfully.');
                    redirect($this->controller.'/orderSuccess/'.$order);


                }else{
                    $data['error_msg'] = 'Order submission failed, please try again.';
                } // Pass products data to the view
                $this->load->view('/index', $data);
            }
        }
        return false;
    }

    function orderSuccess($ordID){
        // Fetch order data from the database
        $data['order'] = $this->product->getOrder($ordID);

        // Load order details view
        $this->load->view($this->controller.'/order-success', $data);
    }

    function selectPayment(){
        $data = array();
        $language_id = 1;
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['print_type'] =   $this->Obj_Home_M->get_print_type();
        $data['branch'] = $this->Obj_Home_M->get_branch();
        $data['other'] =  $this->Obj_Home_M->get_other($language_id);
        $data['cart'] = $this->cart->contents();
        $this->load->view('header',$data);
        $this->load->view('cart/paymentmethod');
        $this->load->view('footer');
    }

    function viewpayment(){
        if(isset($_POST)){
        $custID = $this->session->userdata('user_id');
        $ordData = array(
            'customer_id' => $custID,
            'grand_total' => $this->cart->total()
        );
        $insertOrder = true;
        if($insertOrder) {
            $cartItems = $this->cart->contents();
            $ordItemData = array();
            $i = 0;
            $order_number = date('mdY his ', time());
            foreach ($cartItems as $item) {
                $ordItemData[$i]['order_number'] = $order_number;
                $ordItemData[$i]['price'] = $item['price'];
                $ordItemData[$i]['user_id'] = $item['user_id'];
                $ordItemData[$i]['item_id'] = $item['item_id'];
                $ordItemData[$i]['printing_file'] = $item['image'];
                $ordItemData[$i]['category_id'] = $item['category_id'];
                $ordItemData[$i]['attributes_id'] = $item['attributes_id'];
                $ordItemData[$i]['branch_id'] = $item['branch_id'];
                $ordItemData[$i]['pickup_addr'] = $item['pickup_addr'];
                $ordItemData[$i]['delivery_addr'] = $item['delivery_addr'];
                $ordItemData[$i]['order_date'] = $item['order_date'];
                $ordItemData[$i]['created_date'] = $item['created_date'];
                $ordItemData[$i]['order_type'] = $item['order_type'];
                $ordItemData[$i]['payment_status'] = $item['payment_status'];
                $ordItemData[$i]['qty'] = $item['qty'];
                $ordItemData[$i]['total_price'] = $item["subtotal"];
                $i++;
            }
        }

        $delivery_charges = $this->db->get_where('settings',array('settings_id'=>1))->row('setting_value');
//              echo  $total_discount = $this->db->get_where('settings',array('settings_id'=>2))->row('setting_value');
//            print_r($ordItemData);

        $ordItemData[0]['total_price'] + $delivery_charges;
          //  die();
        $payment_option = '';
        if(isset($_POST['payment_option'])){
            $payment_option = $this->input->post('payment_option');
        }else if(isset($_POST['payment_option'])){
            $payment_option = $this->input->post('payment_option');
        }

        if($payment_option == 'knet'){
                    $data = array();
                    $language_id = 1;
                    $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
                    $data['print_type'] =   $this->Obj_Home_M->get_print_type();
                    $data['branch'] = $this->Obj_Home_M->get_branch();
                    $data['other'] =  $this->Obj_Home_M->get_other($language_id);
                    $this->load->view('header',$data);
                    $this->load->view('knet_priview',$res);
                    $this->load->view('footer');

                }else{
                    $this->load->view('mastercard_priview',$res);
                }
        }else{


            redirect('login');

//        $data['status'] = 'error';
//        $data['msg'] = '';
//        echo json_encode($data);

        }

        }

}
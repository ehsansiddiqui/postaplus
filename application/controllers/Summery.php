<?php
class Summery extends CI_Controller {

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

        if (!$this->session->userdata('user_id')) {
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
        else
        {
            $error = array(
                'error' => $this->upload->display_errors()
            );

            //print_r($error);die;
            $this->session->set_flashdata('message1', 'invalid image');
            redirect('summery');
        }
    }


    public function index(){
        $data = array();
        $language_id = 1;
        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
        $data['category'] = $this->Obj_Home_M->get_class();
        $data['branch'] = $this->Obj_Home_M->get_branch();
        $data['other'] = $this->Obj_Home_M->get_other($language_id);
        $data['brand'] = $this->Obj_Rest_M->get_brands($language_id);
        $this->load->view('header',$data);
        $this->load->view('summery_v');
        $this->load->view('footer');
    }



    public function get_summery(){
        $language_id = 1;
        $class_id = $_GET['class_id'];
        //$brand_id = $_GET['brand_id'];
        $result = $this->Obj_Rest_M->get_summary($language_id,$class_id);
        echo json_encode(array('status'=>200,'res'=>$result));

    }



    public function get_brand(){

        $language_id = 1;
        $class_id = $_GET['class_id'];
        $result = $this->Obj_Rest_M->get_brand($language_id,$class_id);
        echo json_encode(array('status'=>200,'res'=>$result));

    }





    public function order(){


        if(!empty($this->session->userdata('user_id'))){

            if(isset($_POST)){


                if(isset($_POST['branch_id'])){
                    $branch_id = $this->input->post('branch_id');
                }else{
                    $branch_id = 0;
                }

                $user_id      =     $this->session->userdata('user_id');
                $class_id     =     $this->input->post('class_id');
                $brand_id     =     $this->input->post('brand_id');
                $summery_id   =     $this->input->post('summary_id');
                $result = $this->Obj_Home_M->get_brands_price($brand_id);
                $qty =             $this->input->post('qty');
                $pickup_addr = NULL;
                $delivery_addr =     $this->input->post('delivery_addr');
                $price = $result->brand_price;
                $total_price = $price*$qty;
                $order_date = date('Y-m-d');
                $created_date = date('Y-m-d H:i:s', time());


                $data = array(
                    'user_id' => $user_id,
                    'item_id'=>$summery_id,
                    'category_id' => $class_id,
                    'attributes_id' => NULL,
                    'qty' =>$qty,
                    'branch_id'=>$branch_id,
                    'pickup_addr' =>$pickup_addr,
                    'delivery_addr' =>$delivery_addr,
                    'price'=>$price,
                    'total_price'=>$total_price,
                    'order_date'=>$order_date,
                    'created_date'=>$created_date,
                    'order_type'=>'summary',
                    'payment_status'=>'pending'
                );

                //print_r($data);

                $order_id = $this->Obj_Rest_M->summary_order($data);

//                $file_name = NULL;
//                if (!empty($_FILES['userfile']['name']))
//                {
//                    $userfile = 'userfile';
//                    $upload_data = $this->uploads($userfile);
//                    $file_name = $upload_data['file_name'];
//                    $data1 = array(
//                        'printing_file' => $file_name
//                    );
////				$this->db->where('order_id', $order_id);
////				$this->db->update('order_details', $data1);
//                }
                $data1 = array(
                        'printing_file' => null
                    );
                $this->addToCart($data, $data1);



//        $data['status'] = 'sucess';
//        echo json_encode($data);
//
//        $payment_option =  $this->input->post('payment_option');
//        $res = array();
//        $res['order_id'] = $order_id;
//        $res['order_data'] = $this->Obj_Home_M->get_order_details($order_id);
//        if($payment_option == 'knet'){
//
//        $data = array();
//        $language_id = 1;
//        $data['gift_category'] = $this->Obj_Home_M->get_gift_category();
//        $data['print_type'] =   $this->Obj_Home_M->get_print_type();
//        $data['branch'] = $this->Obj_Home_M->get_branch();
//        $data['other'] =  $this->Obj_Home_M->get_other($language_id);
//        $this->load->view('header',$data);
//        $this->load->view('knet_priview',$res);
//        $this->load->view('footer');
//
//
//
//
//        }else{
//         $this->load->view('mastercard_priview',$res);
//        }


            }

        }else{


            redirect('login');

//        $data['status'] = 'error';
//        $data['msg'] = '';
//        echo json_encode($data);

        }



    }

    // cart setting
    public function addToCart($data, $data1){
//        print_r($data);
//        print_r($data1);
//        die();
//        $print_type_id ;
//        $printing_id ;
//        $qty ;
//        $type ;
//        $result = $this->Obj_Home_M->get_print($data['item_id']);
        $brand_id     =     $this->input->post('brand_id');
        $summery_id   =     $this->input->post('summary_id');
        $class_id     =     $this->input->post('class_id');

        $result = $this->Obj_Home_M->get_summery($data['item_id']);

        $pickup_addr = NULL;
//        print_r($result);
        $id = $result->summary_id;
        $price = $result->summary_price;
        if($price == 0 || $price == null){
            $price = 0;
        }else{
            $price;
        }
//        echo $price; die();
        $name = $result->summary_tittle;
//        $data1['printing_file']; die();
//        $coords = trim($name, '()');
        $coords =  str_replace(')', '', str_replace('(','',$name));
        $order_date = date('Y-m-d');
        $total_price = $data['price']*$data['qty'];
        $created_date = date('Y-m-d H:i:s', time());
//        echo $data['qty'];
        if(isset($_POST['branch_id'])){
            $branch_id = $this->input->post('branch_id');
        }else{
            $branch_id = 0;
        }
        $data2 = array(

            'id'    => $id . '-' . '03' . '-' . 'S',
            'name'    =>  $coords,
            'qty'    => $data['qty'],
            'price'    => $price,
            'image'   => null,
            'user_id' => $data['user_id'],
            'item_id'=> $data['item_id'],
            'category_id' => $class_id,
            'attributes_id' => null,
            'branch_id'=> $branch_id,
            'pickup_addr' => $pickup_addr,
            'delivery_addr' => $data['delivery_addr'],
            'total_price'=> $data['total_price'],
            'order_date'=>$order_date,
            'created_date'=>$created_date,
            'order_type'=>'summary',
            'payment_status'=>'pending'

        );
//       print_r($data2);
        unset($this->_cart_contents[$data2]);
        $this->cart->insert($data2);
        $cart = $this->cart->contents();
        if(!empty($cart)) {
            $cart = $this->cart->contents();
        }

        $this->cart_added($cart);
    }


    public function cart_added($cart){
        $data = array();
//        echo '<br/>';
//        print_r($cart);
//        die();
        $data['cart'] = $cart;
        redirect('cart/');
    }

    function updateItemQty(){
        $update = 0;
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        echo $update?'ok':'err';
    }

    function removeItem($rowid){
        $remove = $this->cart->remove($rowid);
        redirect('cart/');
    }

    // cart setting end


}
?>
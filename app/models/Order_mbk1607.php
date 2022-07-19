<?php

class order_m extends CI_Model {

    var $order = 'orders';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_order() {
//        $query = $this->db->order_by('order_id', 'desc')->get($this->order);
//        return $query->result();
           $sql = "SELECT O.*, os.order_status_id,os.order_status,C.first_name,DA.customer_address,PM.pickup_name FROM orders O ,  order_status os , customer_details C , customer_delivery_address DA , pickup_method PM WHERE O.order_status = os.order_status_id AND O.customer_id = C.customer_id AND O.delivery_address_id = DA.cus_addr_id AND O.pickup_id = PM.pickup_id ORDER BY O.order_id DESC";
        $query = $this->db->query($sql); 
        return $query->result();
        
    }
    
    function get_order_details($order_id){
        
        $sql = "SELECT O.*, os.order_status_id,os.order_status,C.first_name,DA.customer_address,PM.pickup_name,D.first_name as drivername FROM orders O INNER JOIN order_status os ON ( O.order_status = os.order_status_id ) INNER JOIN customer_details C ON ( O.customer_id = C.customer_id )  INNER JOIN customer_delivery_address DA ON ( O.delivery_address_id = DA.cus_addr_id )  INNER JOIN pickup_method PM ON( O.pickup_id = PM.pickup_id )  LEFT JOIN driver_details D ON ( O.driver_id = D.driver_id ) WHERE O.order_id = $order_id";
        $query = $this->db->query($sql); 
        return $query->row();
    }
    
    
    function get_cart_details($order_id){
        
    $sql = "SELECT OD.*,T.types_name,P.product_name,G.gender,PT.price_package_id,PP.price_package_name FROM order_details OD , product_types PT , types T , products P , gender_type G , price_package PP WHERE  OD.product_type_id = PT.product_type_id AND PT.product_id = P.product_id AND PT.types_id = T.types_id AND PT.gender_id = G.gender_id AND PT.price_package_id = PP.price_package_id AND OD.order_id = $order_id";
       $query = $this->db->query($sql);
       return $query->result(); 
        
    }
            
    function get_types(){ 
        $result = $this->db->get_where('types', array('status' =>1));
        return $result->result();
    }
    
    function get_product(){ 
        $result = $this->db->get_where('products', array('status' =>1));
        return $result->result(); 
    }
    
    
    function get_gender_type(){  
        $result = $this->db->get_where('gender_type', array('status' =>1));
        return $result->result(); 
    }

    function add_order($data,$order_id,$total) {
        if($this->db->insert('order_details', $data)){
            
            $sql = "UPDATE orders SET total_amount = total_amount+$total WHERE order_id = $order_id";
            $this->db->query($sql);
        }
    }

    function get_orders($order_id) {
        $result = $this->db->get_where($this->order, array('order_id' => $order_id));
        return $result->row();
    }
 
    
    
    
    function get_products($gender_id,$types_id){ 
    
    $sql = "SELECT PT.product_type_id,P.product_name FROM product_types PT , products P WHERE PT.product_id = P.product_id AND PT.gender_id = $gender_id AND PT.types_id = $types_id";   
     $query = $this->db->query($sql);
     return $query->result();
         
    }
    
    
    function get_gender_types($types_id){
        
          $sql = "SELECT PT.gender_id,G.gender FROM product_types PT ,  gender_type G  WHERE PT.gender_id = G.gender_id AND PT.types_id = $types_id GROUP BY PT.gender_id";    
     $query = $this->db->query($sql);
     return $query->result();
        
        
    }
            
    

    function update_order($data, $id) {
        $this->db->where('order_id', $id);
        $this->db->update($this->order, $data);
    }
    
    
    function check_order_a($product_type_id,$order_id){
        $result = $this->db->get_where('order_details', array('product_type_id'=>$product_type_id,'order_id'=>$order_id));
        return $result->row();
    }

    function check_order_e($order_id,$id){
        $result = $this->db->get_where($this->order, array('phone_number' => $order_id, 'order_id !=' => $id));
        return $result->row();
    }
    
    function get_add_on(){
        $result = $this->db->get_where('addons', array('status' =>1));
        return $result->result();
    }
    
    function get_product_type($product_type_id){
        $result = $this->db->get_where('product_types', array('product_type_id'=>$product_type_id));
        return $result->row();
    }
    
    function get_add_on_price($addons_id){
        $result = $this->db->get_where('addons', array('addons_id' =>$addons_id));
        return $result->row();
    }
    
    function get_status(){
        $result = $this->db->get_where('order_status', array('status'=>1));
        return $result->result();
    }
    
     function get_order_bag($order_id){
        $result = $this->db->get_where('order_bag', array('order_id'=>$order_id));
        return $result->row();
    }
    
    
    function update_order_bag($data,$id){
        $this->db->where('order_id',$id);
        $this->db->update('order_bag',$data);
    }
    
    function add_order_bag($data){
        $this->db->insert('order_bag',$data);
    }
}?>
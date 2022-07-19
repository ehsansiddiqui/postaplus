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
//           $sql = "SELECT O.*, os.order_status_id,os.order_status,C.first_name,DA.customer_address,PM.pickup_name FROM orders O ,  order_status os , customer_details C , customer_delivery_address DA , pickup_method PM WHERE O.order_status = os.order_status_id AND O.customer_id = C.customer_id AND O.delivery_address_id = DA.cus_addr_id AND O.pickup_id = PM.pickup_id ORDER BY O.order_id DESC";
           
        
           $sql = "SELECT O.*, os.order_status_id,os.order_status,C.first_name,DA.customer_address,PM.pickup_name,D.first_name as drivername,S.store_name FROM orders O INNER JOIN order_status os ON ( O.order_status = os.order_status_id ) INNER JOIN customer_details C ON ( O.customer_id = C.customer_id )  INNER JOIN customer_delivery_address DA ON ( O.delivery_address_id = DA.cus_addr_id )  INNER JOIN pickup_method PM ON( O.pickup_id = PM.pickup_id )  LEFT JOIN driver_details D ON ( O.driver_id = D.driver_id ) LEFT JOIN store S ON ( O.store_id = S.store_id ) ORDER BY O.order_id DESC";
           
        $query = $this->db->query($sql); 
        return $query->result();
        
    }
    
    function get_order_details($order_id){
        
        $sql = "SELECT O.*, os.order_status_id,os.order_status,C.first_name,C.customer_type_id,DA.customer_address,PM.pickup_name,D.first_name as drivername,S.store_name FROM orders O INNER JOIN order_status os ON ( O.order_status = os.order_status_id ) INNER JOIN customer_details C ON ( O.customer_id = C.customer_id )  INNER JOIN customer_delivery_address DA ON ( O.delivery_address_id = DA.cus_addr_id )  INNER JOIN pickup_method PM ON( O.pickup_id = PM.pickup_id )  LEFT JOIN driver_details D ON ( O.driver_id = D.driver_id ) LEFT JOIN store S ON ( O.store_id = S.store_id ) WHERE O.order_id = $order_id";
        $query = $this->db->query($sql); 
        return $query->row();
    }
    
    
    function get_cart_details($order_id){
        
    $sql = "SELECT OD.*,T.types_name,P.product_name,G.gender,PT.price_package_id,PT.product_price,PP.price_package_name FROM order_details OD , product_types PT , types T , products P , gender_type G , price_package PP WHERE  OD.product_type_id = PT.product_type_id AND PT.product_id = P.product_id AND PT.types_id = T.types_id AND PT.gender_id = G.gender_id AND PT.price_package_id = PP.price_package_id AND OD.order_id = $order_id";
       $query = $this->db->query($sql);
       return $query->result(); 
        
    }
    
    
    
    function get_all_driver(){
        $result = $this->db->get_where('driver_details', array('status' =>1));
        return $result->result();
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
    
    function get_product_types(){   
        $sql = "SELECT PT.product_type_id,PT.product_price,P.product_name,G.gender,T.types_name FROM product_types PT , products P , gender_type G , types T WHERE PT.product_id = P.product_id AND PT.gender_id = G.gender_id AND PT.types_id = T.types_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_customer(){
        $result = $this->db->get_where('customer_details', array('status'=>1));
        return $result->result();
    }
    
    
     function get_pickup(){
        $result = $this->db->get_where('pickup_method', array('status'=>1));
        return $result->result();
    }
    
    function get_all_status(){
        
         $result = $this->db->get_where('order_status', array('status'=>1));
        return $result->result();
        
    }
    
    function get_all_order_number(){
        
        $this->db->select('order_id,order_no');
        $result = $this->db->get('orders');
        return $result->result();
    }
    
    function get_all_customer(){
        
        $this->db->select('customer_id,first_name,phone_number');
        $result = $this->db->get_where('customer_details', array('status'=>1));
        return $result->result();
    }
    
    function get_all_store(){
        $this->db->select('store_id,store_name');
        $result = $this->db->get('store');
        return $result->result(); 
    }
    
    function search($sql){
        
        
        $sql_query = "SELECT O.*, os.order_status_id,os.order_status,C.first_name,DA.customer_address,PM.pickup_name,D.first_name as drivername FROM orders O INNER JOIN order_status os ON ( O.order_status = os.order_status_id ) INNER JOIN customer_details C ON ( O.customer_id = C.customer_id )  INNER JOIN customer_delivery_address DA ON ( O.delivery_address_id = DA.cus_addr_id )  INNER JOIN pickup_method PM ON( O.pickup_id = PM.pickup_id )  LEFT JOIN driver_details D ON ( O.driver_id = D.driver_id ) WHERE 1=1 $sql";
        $query = $this->db->query($sql_query); 
        return $query->result();
        
    }
    
    function get_customer_one($customer_ids){
        
       $this->db->select('CD.*,CDA.customer_address,CT.price_package_id,CT.customer_types');
       $this->db->join('customer_delivery_address CDA','CDA.customer_id = CD.customer_id','left');
       $this->db->join('customer_type CT','CT.customer_type_id = CD.customer_type_id','left');
       $this->db->where('CDA.address_type',1);
       $this->db->where('CD.customer_id',$customer_ids);
       $this->db->where('CD.status',1);
       $result = $this->db->get('customer_details CD');
       return $result->row();  
    }
    
    
    function add_delivery_address($address){
        
        $data = array('customer_address'=>$address);
        $this->db->insert('customer_delivery_address',$data);
        return $this->db->insert_id();
        
    }
    
    function add_new_order($data_order){
        $this->db->insert('orders',$data_order);
        return $this->db->insert_id();
    }
    
    
    function UpdateOrderNumber($order_id, $order_number){
        $data = array('order_no' => $order_number);
        $this->db->where('order_id', $order_id);
        $this->db->update('orders', $data);
        return TRUE;
    }
    
    
    function get_price($product_type_id){
        $this->db->select('product_price');
        $result = $this->db->get_where('product_types', array('product_type_id'=>$product_type_id));
        return $result->row();   
    }
    
    function get_add_price($addons_ids){
        $this->db->select('addons_price');
        $result = $this->db->get_where('addons', array('addons_id'=>$addons_ids));
        return $result->row();  
    }
    
     function get_product_ids($product_type_id){
        $result = $this->db->get_where('product_types', array('product_type_id'=>$product_type_id));
        return $result->row();  
    }
    
    
    function get_max(){
        $sql = "SELECT MAX(`order_id`)+1 AS `maxid` FROM `orders`";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
}?>
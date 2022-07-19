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
    
    function get_all_order(){
                
   /* $sql = "SELECT
    g.gift_order_id AS order_id,
    g.gift_category_id AS category_id,
    g.attributes_id,
    g.printing_file,
    g.qty,
    g.pickup_addr,
    g.delivery_addr,
    g.price,
    g.total_price,
    g.order_date,
    g.status,
   'gift_order' as order_type,
    U.full_name,
    U.phone_number
FROM
    gift_order g
    
LEFT JOIN user U ON (U.user_id = g.user_id)
    
UNION ALL
SELECT
    p.printing_order_id AS order_id,
    p.print_type_id AS category_id,
    p.attributes_id,
    p.printing_file,
    p.qty,
    p.pickup_addr,
    p.delivery_addr,
    p.price,
    p.total_price,
    p.order_date,
    p.status,
   'printing_order' as order_type,
    U.full_name,
    U.phone_number
FROM
    printing_order p
    
LEFT JOIN user U ON (U.user_id = p.user_id)

    
UNION ALL
SELECT
    gp.government_paper_order_id AS order_id,
    gp.government_paper_category_id AS category_id,
    '' as attributes_id,
    gp.printing_file,
    gp.qty,
    gp.pickup_addr,
    gp.delivery_addr,
    gp.price,
    gp.total_price,
    gp.order_date,
    gp.status,
   'government_paper_order' as order_type,
    U.full_name,
    U.phone_number
   
FROM
    government_paper_order gp
    
LEFT JOIN user U ON (U.user_id = gp.user_id)

UNION ALL
SELECT
    pp.photo_printing_order_id AS order_id,
    '' AS category_id,
    pp.attributes_id,
    '' as printing_file,
    '' as qty,
    pp.pickup_addr,
    pp.delivery_addr,
    '' as price,
    pp.total_price,
    pp.order_date,
    pp.status,
    U.full_name,
    U.phone_number,
   'photo_printing_order' as order_type
FROM
    photo_printing_order pp
    
LEFT JOIN user U ON (U.user_id = pp.user_id)
"; */

        
    $sql = "SELECT
    o.order_id,
    o.category_id,
    o.attributes_id,
    o.printing_file,
    o.qty,
    o.pickup_addr,
    o.delivery_addr,
    o.price,
    o.total_price,
    o.order_date,
    o.status,
    o.order_type,
    o.payment_status,
    o.branch_id,
    u.full_name,
    u.phone_number,
    u.email_id,
    b.branch_name,
    os.order_status
    
FROM
    order_details o
    
LEFT JOIN user u ON (u.user_id = o.user_id) LEFT JOIN branch b ON (b.branch_id = o.branch_id) LEFT JOIN order_status os ON (os.order_status_id = o.status) ORDER BY o.order_id DESC";
  $query = $this->db->query($sql);            
  return $query->result(); 
   
        
   }
    
    function get_order_details($order_id){
        
//        $sql = "SELECT O.*, os.order_status_id,os.order_status,C.first_name,C.customer_type_id,DA.customer_address,PM.pickup_name,D.first_name as drivername,S.store_name,CT.customer_types FROM orders O INNER JOIN order_status os ON ( O.order_status = os.order_status_id ) INNER JOIN customer_details C ON ( O.customer_id = C.customer_id )  INNER JOIN customer_delivery_address DA ON ( O.delivery_address_id = DA.cus_addr_id )  INNER JOIN pickup_method PM ON( O.pickup_id = PM.pickup_id )  LEFT JOIN driver_details D ON ( O.driver_id = D.driver_id ) INNER JOIN customer_type CT ON (C.customer_type_id = CT.customer_type_id ) LEFT JOIN store S ON ( O.store_id = S.store_id ) WHERE O.order_id = $order_id";
     
   /* if($order_type == 'gift_order'){  
        $sql = "SELECT
    g.gift_order_id AS order_id,
    g.gift_category_id AS category_id,
    g.attributes_id,
    g.printing_file,
    g.qty,
    g.pickup_addr,
    g.delivery_addr,
    g.price,
    g.total_price,
    g.order_date,
    g.status as order_status,
   'gift_order' as order_type,
    U.full_name,
    U.phone_number
FROM
    gift_order g
    
LEFT JOIN user U ON (U.user_id = g.user_id) WHERE g.gift_order_id = $order_id";  
        $query = $this->db->query($sql); 
        return $query->row();
    }
    if($order_type == 'printing_order'){  
        $sql = "SELECT
    p.printing_order_id AS order_id,
    p.print_type_id AS category_id,
    p.attributes_id,
    p.printing_file,
    p.qty,
    p.pickup_addr,
    p.delivery_addr,
    p.price,
    p.total_price,
    p.order_date,
    p.status as order_status ,
   'printing_order' as order_type,
    U.full_name,
    U.phone_number
FROM
    printing_order p
    
LEFT JOIN user U ON (U.user_id = p.user_id) WHERE p.printing_order_id = $order_id";  
        $query = $this->db->query($sql); 
        return $query->row();
    
        
    }
    
    if($order_type == 'government_paper_order'){  
        
        $sql = "SELECT
    gp.government_paper_order_id AS order_id,
    gp.government_paper_category_id AS category_id,
    '' as attributes_id,
    gp.printing_file,
    gp.qty,
    gp.pickup_addr,
    gp.delivery_addr,
    gp.price,
    gp.total_price,
    gp.order_date,
    gp.status as order_status,
   'government_paper_order' as order_type,
    U.full_name,
    U.phone_number
   
FROM
    government_paper_order gp
    
LEFT JOIN user U ON (U.user_id = gp.user_id) WHERE  gp.government_paper_order_id = $order_id";  
        $query = $this->db->query($sql); 
        return $query->row();
    }
    if($order_type == 'photo_printing_order'){  
        $sql = "SELECT
    pp.photo_printing_order_id AS order_id,
    '' AS category_id,
    pp.attributes_id,
    '' as printing_file,
    '' as qty,
    pp.pickup_addr,
    pp.delivery_addr,
    '' as price,
    pp.total_price,
    pp.order_date,
    pp.status as order_status,
    U.full_name,
    U.phone_number,
   'photo_printing_order' as order_type
FROM
    photo_printing_order pp
    
LEFT JOIN user U ON (U.user_id = pp.user_id) WHERE pp.photo_printing_order_id = $order_id";  */
        
        
    $sql = "SELECT
    o.order_id,
    o.category_id,
    o.attributes_id,
    o.printing_file,
    o.qty,
    o.pickup_addr,
    o.delivery_addr,
    o.price,
    o.total_price,
    o.order_date,
    o.status,
    o.payment_status,
    o.order_type,
    u.full_name,
    u.phone_number,
    u.email_id,
    b.branch_name,
    os.order_status,
    ob.branch_id
    
FROM
    order_details o
    
LEFT JOIN user u ON (u.user_id = o.user_id) LEFT JOIN branch b ON (b.branch_id = o.branch_id) LEFT JOIN order_status os ON (os.order_status_id = o.status) LEFT JOIN order_branch ob ON (ob.order_id = o.order_id)  WHERE o.order_id = $order_id";
        
        $query = $this->db->query($sql); 
        return $query->row();

    
    
    } 
    
    function get_order_type_gift_cate($gift_category_id){
        $query = $this->db->get_where('gift_category',array('gift_category_id'=>$gift_category_id))->row();
        return $query->gift_cate_name;
    }
    
    
    function get_order_type_print_cate($gift_category_id){
        $query = $this->db->get_where('print_type',array('print_type_id'=>$gift_category_id))->row();
        return $query->pri_type_name;
    }
    
    
    function get_order_type_gov_cate($gift_category_id){
        $query = $this->db->get_where('government_paper_category',array('government_paper_category_id'=>$gift_category_id))->row();
        return $query->government_paper_cate_name;
    }
    
    
      function get_order_type_photo_printing($item_id){
        $query = $this->db->get_where('photoprinting',array('photoprinting_id'=>$item_id))->row();
        return $query->photoprinting_title;
        
    }
    
   function get_order_type_summary($gift_category_id){
        $query = $this->db->get_where('class',array('class_id'=>$gift_category_id))->row();
        return $query->class_name;
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
        $sql = "SELECT PT.product_type_id,PT.product_price,P.product_name,G.gender,T.types_name,PP.price_package_name FROM product_types PT , products P , gender_type G , types T , price_package PP WHERE PT.product_id = P.product_id AND PT.gender_id = G.gender_id AND PT.types_id = T.types_id AND PT.price_package_id = PP.price_package_id";
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
        
       $this->db->select('CD.*,CT.price_package_id,CT.customer_types');
       $this->db->join('customer_type CT','CT.customer_type_id = CD.customer_type_id','left');
       $this->db->where('CD.customer_id',$customer_ids);
       $this->db->where('CD.status',1);
       $result = $this->db->get('customer_details CD');
       return $result->result();  
    }
    
    
    function get_delivery_addr($customer_ids){
        $result = $this->db->get_where('customer_delivery_address', array('customer_id'=>$customer_ids));
        return $result->result();  
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
    
    
    
    function get_activity($order_id){

        
 $this->db->select('OA.order_activity_id,OA.activity_title,OA.activity_message,OA.activity_type,OA.date,D.first_name,D.driver_image');
		$this->db->join('driver_details D', 'D.driver_id= OA.driver_id', 'left');
		$this->db->order_by('OA.order_activity_id', 'DESC');
                
		$query = $this->db->get_where('order_activity OA', array(
			'OA.order_id' => $order_id
		));
        
               return $query->result(); 
    }
    
    
    
     function get_template(){
        $result = $this->db->get_where('template', array('status'=>1));
        return $result->result();  
    }
    
    function get_template_one($template_ids){   
        $result = $this->db->get_where('template', array('status'=>1,'template_id'=>$template_ids));
        return $result->row();
    }
    
    function add_activity($data_activity){
        
        $this->db->insert('order_activity',$data_activity);
        
        return TRUE;
    }
    
    
    function get_status_one($order_status_id){
        $result = $this->db->get_where('order_status', array('order_status_id'=>$order_status_id))->row();
        return $result->order_status; 
    }
    
    
    
       function get_price_packages($price_package_ids){   
        $sql = "SELECT PT.product_type_id,PT.product_price,P.product_name,G.gender,T.types_name FROM product_types PT , products P , gender_type G , types T  WHERE PT.product_id = P.product_id AND PT.gender_id = G.gender_id AND PT.types_id = T.types_id AND PT.price_package_id = $price_package_ids";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
    function get_branch(){  
         $query = $this->db->get_where('branch', array('status'=>1));
         return $query->result(); 
    }
    
    function get_branch_details($branch_id){  
         $query = $this->db->get_where('branch', array('branch_id'=>$branch_id));
         return $query->row(); 
    }
    
    
    public
            function get_order_branch($branch_id){
                     
    $sql = "SELECT
    o.order_id,
    o.category_id,
    o.attributes_id,
    o.printing_file,
    o.qty,
    o.pickup_addr,
    o.delivery_addr,
    o.price,
    o.total_price,
    o.order_date,
    o.status,
    o.order_type,
    o.payment_status,
    o.branch_id,
    u.full_name,
    u.phone_number,
    u.email_id,
    b.branch_name,
    os.order_status
    
FROM
    order_details o
    
LEFT JOIN user u ON (u.user_id = o.user_id) LEFT JOIN branch b ON (b.branch_id = o.branch_id) LEFT JOIN order_status os ON (os.order_status_id = o.status) INNER JOIN order_branch ob ON (ob.order_id=o.order_id) WHERE ob.branch_id=$branch_id ORDER BY o.order_id DESC";
  $query = $this->db->query($sql);            
  return $query->result(); 
  
   }
   
   
    function get_branch_order_details($order_id){
           
    $sql = "SELECT
    o.order_id,
    o.category_id,
    o.attributes_id,
    o.printing_file,
    o.qty,
    o.pickup_addr,
    o.delivery_addr,
    o.price,
    o.total_price,
    o.order_date,
    o.status,
    o.payment_status,
    o.order_type,
    u.full_name,
    u.phone_number,
    u.email_id,
    b.branch_name,
    os.order_status,
    ob.branch_id
    
FROM
    order_details o
    
LEFT JOIN user u ON (u.user_id = o.user_id) LEFT JOIN branch b ON (b.branch_id = o.branch_id) LEFT JOIN order_status os ON (os.order_status_id = o.status) INNER JOIN order_branch ob ON (ob.order_id = o.order_id)  WHERE o.order_id = $order_id"; 
        $query = $this->db->query($sql); 
        return $query->row();

       
    } 
   
   
   
}?>
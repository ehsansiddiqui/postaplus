<?php

class report_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }

    
    function get_sales_report(){
        
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
    u.full_name,
    u.phone_number,
    u.email_id,
    b.branch_name,
    os.order_status
    
FROM
    order_details o
    
LEFT JOIN user u ON (u.user_id = o.user_id) LEFT JOIN branch b ON (b.branch_id = o.branch_id) LEFT JOIN order_status os ON (os.order_status_id = o.status)";
  $query = $this->db->query($sql);            
  return $query->result();
        
    }
            
    
    function get_customer_settlement(){
        $sql = "SELECT CD.first_name,CD.phone_number,CD.email_id,CT.customer_types,SUM(O.total_amount) as total_amount FROM orders O LEFT JOIN customer_details CD ON (O.customer_id = CD.customer_id) LEFT JOIN customer_type CT ON (CD.customer_type_id = CT.customer_type_id) GROUP BY O.customer_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_driver_settlement(){
     $sql = "SELECT D.first_name,D.phone_number,D.email_id,S.store_name,SUM(O.total_amount) as total_amount FROM orders O INNER JOIN driver_details D ON (O.driver_id = D.driver_id) INNER JOIN store S ON (D.store_id = S.store_id) GROUP BY O.driver_id";
        $query = $this->db->query($sql);
        return $query->result(); 
    }

    function get_store_settlement() {
      
          $sql = "SELECT S.store_name,S.store_contact_person,S.store_phone_number,SUM(O.total_amount) as total_amount FROM orders O  INNER JOIN store S ON (O.store_id = S.store_id) GROUP BY O.store_id";
        $query = $this->db->query($sql);
        return $query->result(); 
           
    }

    function get_vendor_settlement(){
            $sql = "SELECT V.vendor_name,V.vendor_contact_person,V.vendor_phone_number,SUM(O.total_amount) as total_amount FROM orders O  INNER JOIN vendor V ON (V.vendor_id = O.vendor_id) GROUP BY O.vendor_id";
        $query = $this->db->query($sql);
        return $query->result(); 
        
    }

}?>
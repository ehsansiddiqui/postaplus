<?php

class price_m extends CI_Model {

    var $price = 'product_types';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_price(){
        
    $sql = "SELECT PT.product_type_id,PT.price_package_id,PT.product_id,PT.gender_id,PT.types_id,PT.product_price,P.product_name,G.gender,T.types_name,PP.price_package_name FROM product_types PT , products P , gender_type G , types T , price_package PP WHERE PT.product_id = P.product_id AND PT.gender_id = G.gender_id AND PT.types_id = T.types_id AND PT.price_package_id = PP.price_package_id ORDER BY PT.product_type_id DESC";  
      $query = $this->db->query($sql);  
     return $query->result();
     
    }
    
    
    
    function search($sql){
        
          $sql_query = "SELECT PT.product_type_id,PT.price_package_id,PT.product_id,PT.gender_id,PT.types_id,PT.product_price,P.product_name,G.gender,T.types_name,PP.price_package_name FROM product_types PT , products P , gender_type G , types T , price_package PP WHERE PT.product_id = P.product_id AND PT.gender_id = G.gender_id AND PT.types_id = T.types_id AND PT.price_package_id = PP.price_package_id $sql ORDER BY PT.product_type_id DESC"; 
            
       $query = $this->db->query($sql_query);  
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
       
            
    function get_price_package(){
           $result = $this->db->get_where('price_package', array('price_package_status' =>1));
        return $result->result();
    }

    function add_price($data) {
        $this->db->insert($this->price, $data);
        return $this->db->insert_id();
    }

    function get_prices($product_type_id) {
        $result = $this->db->get_where($this->price, array('product_type_id' => $product_type_id));
        return $result->row();
    }
 

    function update_price($data, $id) {
        $this->db->where('product_type_id', $id);
        $this->db->update($this->price, $data);
    }
    
    
   function check_price_a($price_package_id,$types_id,$product_id,$gender_id){   
       $result = $this->db->get_where($this->price, array('price_package_id'=>$price_package_id,'types_id'=>$types_id,'product_id'=>$product_id,'gender_id'=>$gender_id));
        return $result->row();
    }

  function check_price_e($price_package_id,$types_id,$product_id,$gender_id,$id){
        $result = $this->db->get_where($this->price, array('price_package_id'=>$price_package_id,'types_id'=>$types_id,'product_id'=>$product_id,'gender_id'=>$gender_id,'product_type_id !=' => $id));
        return $result->row();
    }
}
?>
<?php

class product_m extends CI_Model {

    var $product = 'products';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_product(){
        $query = $this->db->order_by('product_id', 'desc')->get_where($this->product, array('status' => 1));
        return $query->result();
    }

    function add_product($data){
        $this->db->insert($this->product, $data);
        return $this->db->insert_id();
    }

    function get_products($product_id) {
        $result = $this->db->get_where($this->product, array('product_id' => $product_id));
        return $result->row();
    }
 

    function update_product($data, $id) {
        $this->db->where('product_id', $id);
        $this->db->update($this->product, $data);
    }
    
    
    function check_product_a($phone_number){
        $result = $this->db->get_where($this->product, array('product_name'=>$phone_number));
        return $result->row();
    }

    function check_product_e($product_id,$id){
        $result = $this->db->get_where($this->product, array('product_name' => $product_id, 'product_id !=' => $id));
        return $result->row();
    }
    
}
?>
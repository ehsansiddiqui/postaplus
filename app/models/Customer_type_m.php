<?php

class customer_type_m extends CI_Model{

    var $customer_type = 'customer_type';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_customer_type() {
        
        $this->db->select('CT.*,PP.price_package_name');
		$this->db->join('price_package PP', 'PP.price_package_id = CT.price_package_id', 'left');
		$this->db->order_by('CT.customer_type_id', 'DESC');
		$query = $this->db->get_where('customer_type CT', array(
			'CT.status' => 1
		));
        //$query = $this->db->order_by('customer_type_id', 'desc')->get_where($this->customer_type, array('status' => 1));
        return $query->result();
    }

    function add_customer_type($data) {
        $this->db->insert($this->customer_type, $data);
        return $this->db->insert_id();
    }

    function get_customer_types($customer_type_id) {
        $result = $this->db->get_where($this->customer_type, array('customer_type_id' => $customer_type_id));
        return $result->row();
    }
    
    
    function get_price_package(){
        $result = $this->db->get_where('price_package', array('price_package_status' =>1));
        return $result->result();
    }
            

    function update_customer_type($data, $id) {
        $this->db->where('customer_type_id', $id);
        $this->db->update($this->customer_type, $data);
        return $id;
    }
    
    
    function check_customer_type_a($customer_types){
        $result = $this->db->get_where($this->customer_type, array('customer_types'=>$customer_types));
        return $result->row();
    }

    function check_customer_type_e($customer_types,$id){
        $result = $this->db->get_where($this->customer_type, array('customer_types' => $customer_types, 'customer_type_id !=' => $id));
        return $result->row();
    }
    
}
?>
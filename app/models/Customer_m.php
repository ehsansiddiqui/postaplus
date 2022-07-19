<?php

class customer_m extends CI_Model {

    var $customer = 'customer_details';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_customer(){
        
//        $this->db->select('C.*,CT.customer_types');
//		$this->db->join('customer_type CT', 'CT.customer_type_id= C.customer_type_id', 'left');
//		$this->db->order_by('C.customer_id', 'DESC');
//		$query = $this->db->get_where('customer_details C', array(
//			'C.status' => 1
//		));
    $query = $this->db->order_by('user_id', 'desc')->get_where('user', array('status' => 1));
    return $query->result();
    
    }

    function add_customer($data){
        $this->db->insert($this->customer, $data);
        return $this->db->insert_id();
    }

    function get_customers($customer_id) {
        $result = $this->db->get_where($this->customer, array('customer_id' => $customer_id));
        return $result->row();
    }
    
    
    function get_customer_type(){
        $result = $this->db->get_where('customer_type', array('status' =>1));
        return $result->result();
    }
            

    function update_customer($data, $id) {
        $this->db->where('customer_id', $id);
        $this->db->update($this->customer, $data);
        return $id;
    }
    
    
    function check_customer_a($phone_number){
        $result = $this->db->get_where($this->customer, array('phone_number'=>$phone_number));
        return $result->row();
    }

    function check_customer_e($customer_id,$id){
        $result = $this->db->get_where($this->customer, array('phone_number' => $customer_id, 'customer_id !=' => $id));
        return $result->row();
    }
    
}
?>
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
        $query = $this->db->order_by('order_id', 'desc')->get($this->order);
        return $query->result();
    }
    
    function get_order_details($order_id){
        
        $sql = "SELECT O.*, os.order_status_id,os.order_status FROM orders O ,  order_status os WHERE O.order_status = os.order_status_id AND O.order_id = $order_id";
        return $query->row();
    }

    function add_order($data) {
        $this->db->insert($this->order, $data);
        return $this->db->insert_id();
    }

    function get_orders($order_id) {
        $result = $this->db->get_where($this->order, array('order_id' => $order_id));
        return $result->row();
    }
 

    function update_order($data, $id) {
        $this->db->where('order_id', $id);
        $this->db->update($this->order, $data);
    }
    
    
    function check_order_a($phone_number){
        $result = $this->db->get_where($this->order, array('phone_number'=>$phone_number));
        return $result->row();
    }

    function check_order_e($order_id,$id){
        $result = $this->db->get_where($this->order, array('phone_number' => $order_id, 'order_id !=' => $id));
        return $result->row();
    }
    
}
?>
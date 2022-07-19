<?php

class store_m extends CI_Model {

    var $store = 'store';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_store() {
        $query = $this->db->order_by('store_id', 'desc')->get_where($this->store, array('status' => 1));
        return $query->result();
    }

    function add_store($data) {
        $this->db->insert($this->store, $data);
        return $this->db->insert_id();
    }

    function get_stores($store_id) {
        $result = $this->db->get_where($this->store, array('store_id' => $store_id));
        return $result->row();
    }
 

    function update_store($data, $id) {
        $this->db->where('store_id', $id);
        $this->db->update($this->store, $data);
    }
    
    
    function check_store_a($store_name){
        $result = $this->db->get_where($this->store, array('store_name'=>$store_name));
        return $result->row();
    }

    function check_store_e($store_name,$id){
        $result = $this->db->get_where($this->store, array('store_name' =>$store_name, 'store_id !=' => $id));
        return $result->row();
    }
      
    function get_price_package(){  
        $result = $this->db->get_where('price_package', array('price_package_status'=>1));
        return $result->result();
    }
    
}
?>
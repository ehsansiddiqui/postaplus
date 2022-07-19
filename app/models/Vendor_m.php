<?php

class vendor_m extends CI_Model {

    var $vendor = 'vendor';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_vendor() {
        $query = $this->db->order_by('vendor_id', 'desc')->get_where($this->vendor, array('status' => 1));
        return $query->result();
    }

    function add_vendor($data) {
        $this->db->insert($this->vendor, $data);
        return $this->db->insert_id();
    }

    function get_vendors($vendor_id) {
        $result = $this->db->get_where($this->vendor, array('vendor_id' => $vendor_id));
        return $result->row();
    }
 

    function update_vendor($data, $id) {
        $this->db->where('vendor_id', $id);
        $this->db->update($this->vendor, $data);
    }
    
    
    function check_vendor_a($vendor_name){
        $result = $this->db->get_where($this->vendor, array('vendor_name'=>$vendor_name));
        return $result->row();
    }

    function check_vendor_e($vendor_name,$id){
        $result = $this->db->get_where($this->vendor, array('vendor_name' =>$vendor_name, 'vendor_id !=' => $id));
        return $result->row();
    }
      
    function get_price_package(){  
        $result = $this->db->get_where('price_package', array('price_package_status'=>1));
        return $result->result();
    }
    
}
?>
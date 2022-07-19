<?php

class driver_m extends CI_Model {

    var $driver = 'driver_details';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_driver(){
        
        $this->db->select("D.*,S.store_name");
        $this->db->join('store S', 'S.store_id= D.store_id', 'left');
        $this->db->order_by("D.driver_id", 'DESC');
        $query = $this->db->get("$this->driver D");
        return $query->result();
    }

    function add_driver($data) {
        $this->db->insert($this->driver, $data);
        return $this->db->insert_id();
    }

    function get_drivers($driver_id) {
        $result = $this->db->get_where($this->driver, array('driver_id' => $driver_id));
        return $result->row();
    }
 

    function update_driver($data, $id) {
        $this->db->where('driver_id', $id);
        $this->db->update($this->driver, $data);
    }
    
    
    function check_driver_a($phone_number){
        $result = $this->db->get_where($this->driver, array('phone_number'=>$phone_number));
        return $result->row();
    }

    function check_driver_e($driver_id,$id){
        $result = $this->db->get_where($this->driver, array('phone_number' => $driver_id, 'driver_id !=' => $id));
        return $result->row();
    }
    
    function get_all_store(){
        $result = $this->db->get('store');
        return $result->result();
    }
}
?>

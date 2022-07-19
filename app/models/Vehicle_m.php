<?php

class vehicle_m extends CI_Model {

    var $vehicle = 'vehicle';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_vehicle(){     
        $this->db->select("V.*,D.first_name,D.phone_number");
        $this->db->join('driver_details D', 'D.driver_id= V.driver_id', 'left');
        $this->db->order_by("V.vehicle_id", 'DESC');
        $query = $this->db->get("$this->vehicle V");
        return $query->result();
    }

    function add_vehicle($data) {
        $this->db->insert($this->vehicle, $data);
        return $this->db->insert_id();
    }

    function get_vehicles($vehicle_id) {
        $result = $this->db->get_where($this->vehicle, array('vehicle_id' => $vehicle_id));
        return $result->row();
    }
 

    function update_vehicle($data, $id) {
        $this->db->where('vehicle_id', $id);
        $this->db->update($this->vehicle, $data);
    }
    
    
    function check_vehicle_a($driver_id){
        $result = $this->db->get_where($this->vehicle, array('driver_id'=>$driver_id));
        return $result->row();
    }

    function check_vehicle_e($driver_id,$id){
        $result = $this->db->get_where($this->vehicle, array('driver_id' =>$driver_id, 'vehicle_id !=' => $id));
        return $result->row();
    }
    
    function get_all_driver(){
        $result = $this->db->get('driver_details');
        return $result->result();
    }
}
?>

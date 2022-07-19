<?php

class service_booking_m extends CI_Model {

    var $service_booking = 'service_booking';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_service_booking(){
        
    $sql = "SELECT SB.*,VM.*,VB.*,VC.*,L.* FROM service_booking SB ,  vehicle_models VM , vehcle_brand VB , vehicle_category VC , location L WHERE SB.model_id = VM.vehicle_id AND VM.category_id = VC.category_id AND VM.brand_id = VB.brand_id AND SB.location_id = L.location_id ";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_service_booking($data) {
        $this->db->insert($this->service_booking, $data);
        return $this->db->insert_id();
    }

    function get_service_bookings($service_booking_id) {
        $result = $this->db->get_where($this->service_booking, array('service_booking_id' => $service_booking_id));
        return $result->row();
    }

    function update_service_booking($data, $id) {
        $this->db->where('service_booking_id', $id);
        $this->db->update($this->service_booking, $data);
    }

    function get_state() {
        $query = $this->db->order_by('state_id', 'desc')->get('state')->result();
        return $query;
    }

}?>
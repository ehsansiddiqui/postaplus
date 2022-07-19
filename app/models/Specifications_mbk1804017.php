<?php

class specifications_m extends CI_Model {

    var $specifications = 'vehicle_specifications';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_specifications() {
        $sql = "SELECT VS.*,VV.*,VM.*,SM.* FROM vehicle_specifications VS,vehicle_variant VV,vehicle_models VM , specification_master SM WHERE VS.`variant_id` = VV.`vehicle_variant_id` AND VS.`vehicle_id` = VM.`vehicle_id` AND VS.`specification_id` = SM.`specification_id` ORDER BY VS.vehicle_specification_id DESC";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_specifications($data) {
        $this->db->insert($this->specifications, $data);
        return $this->db->insert_id();
    }

    function get_specificationss($specifications_id) {
        $result = $this->db->get_where($this->specifications, array('vehicle_specification_id' => $specifications_id));
        return $result->row();
    }

    function update_specifications($data, $id) {
        $this->db->where('vehicle_specification_id', $id);
        $this->db->update($this->specifications, $data);
    }

    function get_all_variant() {
        $result = $this->db->get('vehicle_variant');
        return $result->result();
    }

    function get_all_specification_master() {
        $result = $this->db->get('specification_master');
        return $result->result();
    }

    function get_all_vehicle() {
        $result = $this->db->get('vehicle_models');
        return $result->result();
    }

}

?>
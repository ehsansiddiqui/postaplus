<?php

class location_m extends CI_Model {

    var $location = 'location';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_location() {
        $query = $this->db->get($this->location)->result();
        return $query;
    }

    function add_location($data) {
        $this->db->insert($this->location, $data);
        return $this->db->insert_id();
    }

    function get_locations($location_id) {
        $result = $this->db->get_where($this->location, array('location_id' => $location_id));
        return $result->row();
    }

    function update_location($data, $id) {
        $this->db->where('location_id', $id);
        $this->db->update($this->location, $data);
    }

    function get_state() {
        $query = $this->db->order_by('state_id', 'desc')->get('state')->result();
        return $query;
    }

}?>
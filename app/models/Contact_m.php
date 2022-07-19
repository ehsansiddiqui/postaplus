<?php

class contact_m extends CI_Model {

    var $contact = 'contact_us';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_contact() {
        $query = $this->db->get($this->contact)->result();
        return $query;
    }

    function add_contact($data) {
        $this->db->insert($this->contact, $data);
        return $this->db->insert_id();
    }

    function get_contacts($contact_id) {
        $result = $this->db->get_where($this->contact, array('contact_id' => $contact_id));
        return $result->row();
    }

    function update_contact($data, $id) {
        $this->db->where('contact_id', $id);
        $this->db->update($this->contact, $data);
    }

    function get_state() {
        $query = $this->db->order_by('state_id', 'desc')->get('state')->result();
        return $query;
    }

}?>
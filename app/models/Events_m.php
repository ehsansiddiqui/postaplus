<?php

class events_m extends CI_Model {

    var $events = 'event';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_events() {
        
        $sql = "SELECT E.*,ET.*,U.* FROM event E , event_type ET , user_details U  WHERE E.event_type_id_fk = ET.event_type_id  AND E.user_id_fk = U.user_id_fk";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_events($data) {
        $this->db->insert($this->events, $data);
        return $this->db->insert_id();
    }

    function get_eventss($events_id) {
        $result = $this->db->get_where($this->events, array('events_id' => $events_id));
        return $result->row();
    }

    function update_events($data, $id) {
        $this->db->where('events_id', $id);
        $this->db->update($this->events, $data);
    }

    function get_state() {
        $query = $this->db->order_by('state_id', 'desc')->get('state')->result();
        return $query;
    }

}?>
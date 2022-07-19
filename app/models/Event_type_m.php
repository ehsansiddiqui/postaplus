<?php

class event_type_m extends CI_Model {

    var $event_type = 'event_type';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_all_event_type(){
        $query = $this->db->order_by('event_type_id', 'desc')->get_where($this->event_type,array('status'=>1));
        return $query->result();
    }

    function add_event_type($data){
        $this->db->insert($this->event_type, $data);
        return $this->db->insert_id();
    }

    function get_event_types($event_type_id) {
        $result = $this->db->get_where($this->event_type, array('event_type_id' => $event_type_id));
        return $result->row();
    }

    function update_event_type($data, $id) {
        $this->db->where('event_type_id', $id);
        $this->db->update($this->event_type, $data);
    }
    
    function check_event_type($event_type_id){
       $result = $this->db->get_where($this->event_type, array('event_type_name' => $event_type_id));
        return $result->row();
    }
}?>
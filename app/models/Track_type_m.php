<?php

class track_type_m extends CI_Model {

    var $track_type = 'track_type';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_all_track_type(){
        $query = $this->db->order_by('track_type_id', 'desc')->get_where($this->track_type,array('status'=>1));
        return $query->result();
    }

    function add_track_type($data){
        $this->db->insert($this->track_type, $data);
        return $this->db->insert_id();
    }

    function get_track_types($track_type_id) {
        $result = $this->db->get_where($this->track_type, array('track_type_id' => $track_type_id));
        return $result->row();
    }

    function update_track_type($data, $id) {
        $this->db->where('track_type_id', $id);
        $this->db->update($this->track_type, $data);
    }
    
    function check_track_type($track_type_id){
       $result = $this->db->get_where($this->track_type, array('track_type_name' => $track_type_id));
        return $result->row();
    }
}?>
<?php

class track_m extends CI_Model {

    var $track = 'track_details';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_all_track(){
        $query = $this->db->order_by('track_id', 'desc')->get_where($this->track,array('status'=>1));
        return $query->result();
    }

    public function add_track($data){
        $this->db->insert($this->track, $data);
        return $this->db->insert_id();
    }

    public function get_tracks($track_id) {
        $result = $this->db->get_where($this->track, array('track_id' => $track_id));
        return $result->row();
    }

    public function update_track($data, $id) {
        $this->db->where('track_id', $id);
        $this->db->update($this->track, $data);
    }
    
    public function check_track($track_id){
       $result = $this->db->get_where($this->track, array('track_name' => $track_id));
        return $result->row();
    }
    
    
    
    
}?>
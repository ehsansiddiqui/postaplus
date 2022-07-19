<?php

class racing_type_m extends CI_Model {

    var $racing_type = 'racing_type';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_all_racing_type(){
        $query = $this->db->order_by('racing_type_id', 'desc')->get_where($this->racing_type,array('status'=>1));
        return $query->result();
    }

    function add_racing_type($data){
        $this->db->insert($this->racing_type, $data);
        return $this->db->insert_id();
    }

    function get_racing_types($racing_type_id) {
        $result = $this->db->get_where($this->racing_type, array('racing_type_id' => $racing_type_id));
        return $result->row();
    }

    function update_racing_type($data, $id) {
        $this->db->where('racing_type_id', $id);
        $this->db->update($this->racing_type, $data);
    }
    
    function check_racing_type($racing_type_id){
       $result = $this->db->get_where($this->racing_type, array('racing_type_name' => $racing_type_id));
        return $result->row();
    }
}?>
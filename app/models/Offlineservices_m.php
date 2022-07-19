<?php

class offlineservices_m extends CI_Model {

    var $offlineservices = 'others';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_offlineservices(){          
        $this->db->order_by('others_id','desc');
        $query = $this->db->get_where($this->offlineservices,array('others_status'=>1));
        return $query->result();
    }

    function add_offlineservices($data) {
        $this->db->insert($this->offlineservices, $data);
        return $this->db->insert_id();
    }

    function get_offlineservicess($offlineservices_id) {
        $result = $this->db->get_where($this->offlineservices, array('others_id' => $offlineservices_id));
        return $result->row();
    }

    function update_offlineservices($data, $id) {
        $this->db->where('others_id', $id);
        $this->db->update($this->offlineservices, $data);
    }
}?>
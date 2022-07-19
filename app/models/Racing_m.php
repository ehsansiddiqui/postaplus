<?php

class racing_m extends CI_Model {

    var $racing = 'racing_details';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_all_racing(){
        
//        $query = $this->db->order_by('racing_id', 'desc')->get_where($this->racing,array('status'=>1));
//        return $query->result();
      
              
        $this->db->select('ud.first_name,r.*', false);
        $this->db->from('user_details as ud');
        $this->db->join('racing_details r', 'r.user_id_fk =ud.user_id_fk');
        $this->db->order_by('r.racing_id', 'desc');
        $result = $this->db->get();
        return $result->result();
        
    }

    public function add_racing($data){
        $this->db->insert($this->racing, $data);
        return $this->db->insert_id();
    }

    public function get_racings($racing_id) {
        $result = $this->db->get_where($this->racing, array('racing_id' => $racing_id));
        return $result->row();
    }

    public function update_racing($data, $id) {
        $this->db->where('racing_id', $id);
        $this->db->update($this->racing, $data);
    }
    
    public function check_racing($racing_id){
       $result = $this->db->get_where($this->racing, array('racing_name' => $racing_id));
        return $result->row();
    }
    
    
    
    
}?>
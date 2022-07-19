<?php

class state_m extends CI_Model {

   var $state = 'state';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_state(){
        $query = $this->db->order_by('state_id','desc')->get($this->state)->result();
        return $query;
    }

    function add_state($data) {
        $this->db->insert($this->state, $data);
        return $this->db->insert_id();
    }

    function get_states($state_id) {
        $result = $this->db->get_where($this->state,array('state_id'=>$state_id));
        return $result->row();
    }
    
    function update_state($data,$id){
         $this->db->where('state_id', $id);
        $this->db->update($this->state, $data);
    }
    
    function check_state($state_name){  
        $result = $this->db->get_where($this->state,array('state_name'=>$state_name));
        return $result->row();
    }
    
    function check_state_edit($state_name,$id){
         $sql = "SELECT state_id,state_name FROM state WHERE state_id != $id AND state_name = '$state_name'";
               $result = $this->db->query($sql);
        return $result->row();
    }

}

?>
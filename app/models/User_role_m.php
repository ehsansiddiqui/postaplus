<?php

class user_role_m extends CI_Model {

    var $user_role = 'user_role';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_all_user_role(){
        $query = $this->db->order_by('user_role_id', 'desc')->get_where($this->user_role,array('status'=>1));
        return $query->result();
    }

    function add_user_role($data){
        $this->db->insert($this->user_role, $data);
        return $this->db->insert_id();
    }

    function get_user_roles($user_role_id) {
        $result = $this->db->get_where($this->user_role, array('user_role_id' => $user_role_id));
        return $result->row();
    }

    function update_user_role($data, $id) {
        $this->db->where('user_role_id', $id);
        $this->db->update($this->user_role, $data);
    }
    
    function check_user_role($user_role_id){
       $result = $this->db->get_where($this->user_role, array('user_role' => $user_role_id));
        return $result->row();
    }
}?>
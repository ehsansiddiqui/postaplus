<?php

class user_details_m extends CI_Model {

    var $user_details = 'user_details';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_all_user_details(){
        $query = $this->db->order_by('user_id', 'desc')->get_where($this->user_details,array('status'=>1));
        return $query->result();   
    }

    function add_user_details($data){
        $this->db->insert($this->user_details, $data);
        return $this->db->insert_id();
    }

    function get_user_detailss($user_details_id) {
        $result = $this->db->get_where($this->user_details, array('user_details_id' => $user_details_id));
        return $result->row();
    }

    function update_user_details($data, $id) {
        $this->db->where('user_details_id', $id);
        $this->db->update($this->user_details, $data);
    }
    
    function check_user_details($user_details_id){
       $result = $this->db->get_where($this->user_details, array('user_details_name' => $user_details_id));
        return $result->row();
    }
    
    
    function get_details($user_id){
        
        $this->db->select('u.user_id,u.user_name,u.role_id_fk,ud.first_name,ud.last_name,ud.phone_number,ud.country,ud.state,ud.city,ud.age,ud.gender,ud.address,ud.user_image,ur.user_role,ud.zip_code,u.device_id', false);
        $this->db->from('user_details as ud');
        $this->db->join('user as u', 'u.user_id = ud.user_id_fk');
        $this->db->join('user_role ur', 'ur.user_role_id=u.role_id_fk');
        $this->db->where('u.user_id', $user_id);
        $result = $this->db->get();
        return $result->row();
        
    }
}?>
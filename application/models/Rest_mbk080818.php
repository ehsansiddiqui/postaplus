<?php

class rest_m extends CI_Model {

    var $user = 'user';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    

    public function check_user($username,$password){
        $sql = "SELECT * FROM user U  WHERE  U.phone_number = '$username' AND U.password = '$password' AND U.status = 1";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function user_updated($user_id) {
        $created_date = date('Y-m-d H:i:s', time());
        $data = array('last_login_date' => $created_date);
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data);
    }

    public function add_user($data) {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }



    public function users_check($phone_number) {
        $query = $this->db->get_where('user', array('phone_number' => $phone_number));
        return $query->row();
    }

    public function get_users(){
        
        $this->db->select('user_id,phone_number,first_name,last_name,profile_image,email_id,country,gender,designation,address,hef_member_status');
        $query = $this->db->get_where('user', array('status' => 1));
        return $query->result();
    }
    
    
    
    public function get_advertisement(){
        
        $this->db->select('advertisement_id,advertisement_name,advertisement_url,advertisement_image');
        $query = $this->db->get_where('advertisement', array('status' => 1));
        return $query->result();
    }
    
    
    
      public function edit_user($data,$user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data);
        return $user_id;
    }
    
    
    
    public function add_posts($data){
        $this->db->insert('user_posts', $data);
        return $this->db->insert_id();
    }
    
    
    public function get_user_post(){    
        $sql = "SELECT UP.*,U.first_name,U.last_name FROM user_posts UP , user U WHERE UP.user_id = U.user_id";
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
}?>
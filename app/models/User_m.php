<?php

class user_m extends CI_Model {

    var $user = 'login';


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function varify($user,$pass){   
        
        $this->db->select('l.*,b.branch_name,b.branch_image');
        $this->db->join('branch b','l.branch_id=b.branch_id','left');
        $this->db->join('accountant a','l.accountant_id=a.accountant_id','left');
        $query = $this->db->get_where('login l', array('l.username'=>$user,'l.password'=>$pass));
        return $query->row();
    }


    function get_total_income(){
        
        $sql = "SELECT SUM(`total_amount`) as total_amounts FROM `orders`";
        $query = $this->db->query($sql);
        return $query->row();
        
        
    }

    function get_total_received_income(){
        
        $sql = "SELECT SUM(`total_amount`) as received_amount FROM `orders` WHERE `payment_status` = 1";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    function get_total_customer(){
        
        $sql = "SELECT COUNT(`customer_id`) as cnt FROM `customer_details` WHERE `status` = 1";
        $query = $this->db->query($sql);
        return $query->row();
        
    }
    
    
}?>
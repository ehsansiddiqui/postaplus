<?php

class voucher_m extends CI_Model {

    var $voucher = 'voucher';
   

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    function get_all_voucher() {

        $query = $this->db->order_by('voucher_id','desc')->get_where($this->voucher);
        return $query->result();
    }
    
     function get_all_user(){        
      $result = $this->db->get_where('user_details', array('status' =>1));
      return $result->result();       
    }
     function get_all_studio(){        
      $result = $this->db->get_where('studio', array('status' =>1));
      return $result->result();       
    }


    function add_voucher($data) {
        $this->db->insert($this->voucher, $data);

        return $this->db->insert_id();
    }

    function get_voucher($voucher_id) {
        $result = $this->db->get_where($this->voucher, array('voucher_id' => $voucher_id));
        return $result->row();
    }
    function get_voucher_user($voucher_id){     
      $result = $this->db->get_where('voucher_user', array('voucher_id' =>$voucher_id));
      return $result->result();  
    }
    
 function get_voucher_of_user($voucher_id){     
     $sql = "SELECT vu.*,ud.* FROM voucher_user vu ,user_details ud WHERE vu.user_id = ud.user_id AND vu.voucher_id=$voucher_id ORDER BY vu.voucher_user_id  DESC";

        $result = $this->db->query($sql);
      return $result->result();  
    }
    function get_email_user($user_id){ 
        
        $user = implode(",",$user_id);
       
        
     $sql = "SELECT user_id,email_id,fb_email FROM user_details WHERE user_id IN ($user) AND status=1 ORDER BY user_id  DESC";

        $result = $this->db->query($sql);
      return $result->result();  
    }
    
    function get_email_user_all(){     
     $sql = "SELECT user_id,email_id,fb_email FROM user_details WHERE status =1 ORDER BY user_id  DESC";
        $result = $this->db->query($sql);
      return $result->result();  
    }
    
    

    function update_voucher($data, $id) {
        $this->db->where('voucher_id', $id);
        $this->db->update($this->voucher, $data);
    }

    function check_voucher_user($voucher_code, $id) {

        $result = $this->db->get_where($this->voucher, array('voucher_code' => $voucher_code, 'voucher_id !=' => $id));
        return $result->row();
    }

   

    function check_voucher($voucher_code) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql_check = "SELECT voucher_id FROM voucher WHERE voucher_code='$voucher_code'";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }

   

   
}

?>
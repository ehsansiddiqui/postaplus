<?php

class accountant_m extends CI_Model {

    var $accountant = 'accountant';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_accountant(){          
        $this->db->order_by('accountant_id','desc');
        $query = $this->db->get_where($this->accountant,array('status'=>1));
        return $query->result();
    }

    function add_accountant($data) {
        $this->db->insert($this->accountant, $data);
        return $this->db->insert_id();
    }
    
     function add_login_details($data){
        $this->db->insert('login', $data);
        return $this->db->insert_id();
    }

    function get_accountants($accountant_id) {
        $this->db->select('b.*,l.username,password,admin_groups_id');
        $this->db->join('login l','l.accountant_id=b.accountant_id','left');
        $result = $this->db->get_where('accountant b', array('b.accountant_id' => $accountant_id));
        return $result->row();
    }

    function update_accountant($data, $id) {
        $this->db->where('accountant_id', $id);
        $this->db->update($this->accountant, $data);
    }
    
    function update_login_details($data,$id){
        $this->db->where('accountant_id',$id);
        $this->db->update('login', $data);
        return TRUE;
    }    
}?>
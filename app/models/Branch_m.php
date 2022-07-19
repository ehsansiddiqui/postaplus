<?php

class branch_m extends CI_Model {

    var $branch = 'branch';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_branch(){          
        $this->db->order_by('branch_id','desc');
        $query = $this->db->get_where($this->branch,array('status'=>1));
        return $query->result();
    }

    function add_branch($data) {
        $this->db->insert($this->branch, $data);
        return $this->db->insert_id();
    }
    
     function add_login_details($data){
        $this->db->insert('login', $data);
        return $this->db->insert_id();
    }

    function get_branchs($branch_id) {
        $this->db->select('b.*,l.username,password,admin_groups_id');
        $this->db->join('login l','l.branch_id=b.branch_id','left');
        $result = $this->db->get_where('branch b', array('b.branch_id' => $branch_id));
        return $result->row();
    }

    function update_branch($data, $id) {
        $this->db->where('branch_id', $id);
        $this->db->update($this->branch, $data);
    }
    
    function update_login_details($data,$id){
        $this->db->where('branch_id',$id);
        $this->db->update('login', $data);
        return TRUE;
    }    
}?>
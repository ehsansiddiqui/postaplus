<?php

class class_master_m extends CI_Model {

    var $class_master = 'class_master';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }


    function get_all_class_master(){
        $query = $this->db->order_by('class_master_id','desc')->get_where('class_master', array('status' => 1));
        return $query->result();
    }

    function add_class_master($data){
        $this->db->insert('class_master', $data);
        return $this->db->insert_id();
    }
    
    function get_class_masters($id) {
        $result = $this->db->get_where('class_master', array('class_master_id' => $id));
        return $result->row();
    }

    function update_class_master($data, $id) {
        $this->db->where('class_master_id', $id);
        $this->db->update('class_master', $data);
    }

    function check_class_master_a($class_name) {
        $result = $this->db->get_where('class_master', array('class_name' => $class_name));
        return $result->row();
    }

    function check_class_master_e($class_name, $id) {
        $result = $this->db->get_where('class_master', array('class_name' => $class_name, 'class_master_id !=' => $id));
        return $result->row();
    }


}?>
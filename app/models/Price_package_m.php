<?php

class price_package_m extends CI_Model {

    var $price_package = 'price_package';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }


    function get_all_price_package(){
        $query = $this->db->order_by('price_package_id','desc')->get_where('price_package', array('price_package_status' => 1));
        return $query->result();
    }

    function add_price_package($data){
        $this->db->insert('price_package', $data);
        return $this->db->insert_id();
    }
    
    function get_price_packages($id) {
        $result = $this->db->get_where('price_package', array('price_package_id' => $id));
        return $result->row();
    }

    function update_price_package($data, $id) {
        $this->db->where('price_package_id', $id);
        $this->db->update('price_package', $data);
    }

    function check_price_package_a($price_package_name) {
        $result = $this->db->get_where('price_package', array('price_package_name' => $price_package_name));
        return $result->row();
    }

    function check_price_package_e($price_package_name, $id) {
        $result = $this->db->get_where('price_package', array('price_package_name' => $price_package_name, 'price_package_id !=' => $id));
        return $result->row();
    }


}?>
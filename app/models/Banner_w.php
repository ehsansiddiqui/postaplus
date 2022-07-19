<?php

class Banner_w extends CI_Model {

    var $banner = 'shop_banner_web';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }

    function get_all_banner() {

        $this->db->select('SC.*');
        $query = $this->db->order_by('shop_banner_id', 'desc')->get_where('shop_banner SC', array('SC.status' => 1));
        return $query->result();
    }

    function add_banner($data) {
        $this->db->insert($this->banner, $data);
        return $this->db->insert_id();
    }

    function get_banners($shop_banner_id) {
        $result = $this->db->get_where($this->banner, array('shop_banner_id' => $shop_banner_id));
        return $result->row();
    }


    function update_banner($data, $id) {
        $this->db->where('shop_banner_id', $id);
        $this->db->update($this->banner, $data);
    }


    function check_banner_a($shop_id,$shop_banner_name){
        $result = $this->db->get_where($this->banner, array('shop_id'=>$shop_id,'shop_banner_name'=>$shop_banner_name));
        return $result->row();
    }

    function check_banner_e($shop_id,$shop_banner_name,$id){
        $result = $this->db->get_where($this->banner, array('shop_id'=>$shop_id,'shop_banner_name' => $shop_banner_name, 'shop_banner_id !=' => $id));
        return $result->row();
    }


    function get_all_shop(){
        $result = $this->db->get_where('shop', array('status'=>1));
        return $result->result();
    }

}
?>
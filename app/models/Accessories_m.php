<?php

class accessories_m extends CI_Model {

   var $accessories = 'accessories';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_accessories(){
        $sql = "SELECT A.*,AT.* FROM  accessories A, accessories_types AT WHERE A.`accessories_types_id` = AT.`accessories_type_id` ORDER BY A.`accessories_id` DESC";
       $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_accessories($data) {
        $this->db->insert($this->accessories, $data);
        return $this->db->insert_id();
    }

    function get_accessoriess($accessories_id) {
        $result = $this->db->get_where($this->accessories,array('accessories_id'=>$accessories_id));
        return $result->row();
    }
    
    function update_accessories($data,$id){
         $this->db->where('accessories_id', $id);
        $this->db->update($this->accessories, $data);
    }
    
    
    function get_accessories_type(){
        $result = $this->db->get_where('accessories_types');
        return $result->result();
    }
}?>
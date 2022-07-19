<?php

class parts_m extends CI_Model {

   var $parts = 'parts';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_parts(){
        $sql = "SELECT P.*,PT.*,C.* FROM parts P, parts_types PT , vehicle_category C WHERE P.`parts_types_id` = PT.`parts_type_id` AND PT.category_id = C.category_id ORDER BY P.`parts_id` DESC";
       $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_parts($data) {
        $this->db->insert($this->parts, $data);
        return $this->db->insert_id();
    }

    function get_partss($parts_id) {
        $result = $this->db->get_where($this->parts,array('parts_id'=>$parts_id));
        return $result->row();
    }
    
    function update_parts($data,$id){
         $this->db->where('parts_id', $id);
        $this->db->update($this->parts, $data);
    }
    
    
    function get_parts_type() {
        $result = $this->db->get_where(' parts_types');
        return $result->result();
    }
    

}?>
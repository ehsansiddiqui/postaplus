<?php

class class_m extends CI_Model {

    var $class = 'class';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    function get_class(){
        
        $this->db->order_by('class_id','desc');
        $query = $this->db->get_where($this->class,array('class_status'=>1));
        return $query->result();
    }

    function add_class($data){
        
        $this->db->insert($this->class, $data);
        return $this->db->insert_id();
    }

    function get_classs($class_id){
        $result = $this->db->get_where($this->class, array('class_id' => $class_id));
        return $result->row();
    }

    function update_class($data, $id){
        $this->db->where('class_id', $id);
        $this->db->update($this->class, $data);
    }
}?>
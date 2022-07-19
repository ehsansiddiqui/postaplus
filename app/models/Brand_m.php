<?php

class brand_m extends CI_Model {

    var $brand = 'brand';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_brand(){  
        
        $this->db->select('brand.*');
        //$this->db->join('class','brand.class_id=class.class_id');               
        $this->db->order_by('brand.brand_id','desc');
        $query = $this->db->get_where('brand',array('brand.status'=>1));
        return $query->result();
    }
    
    
    function get_class(){
        
      $query = $this->db->get_where('class',array('class_status'=>1));
      return $query->result();  
    }
            

    function add_brand($data) {
        $this->db->insert($this->brand, $data);
        return $this->db->insert_id();
    }
    
     function add_login_details($data){
        $this->db->insert('login', $data);
        return $this->db->insert_id();
    }

    function get_brands($brand_id) {
        $this->db->select('b.*');
        $result = $this->db->get_where('brand b', array('b.brand_id' => $brand_id));
        return $result->row();
    }

    function update_brand($data, $id) {
        $this->db->where('brand_id', $id);
        $this->db->update($this->brand, $data);
    }
    
    function update_login_details($data,$id){
        $this->db->where('brand_id',$id);
        $this->db->update('login', $data);
        return TRUE;
    }    
}?>
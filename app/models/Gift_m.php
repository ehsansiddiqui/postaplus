<?php

class gift_m extends CI_Model {

    var $gift = 'gift';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_gift_category(){ 
        
        $query = $this->db->order_by('g.gift_category_id', 'desc')->get_where('gift_category g', array('g.gift_category_status' => 1));
        return $query->result();
        
    }

    function get_all_gift(){ 
        
     $sql = "SELECT g.gift_id,g.gift_category_id,g.attributes_id,g.price,g.ar_gift_title,g.gift_title,ad.atr_name as attributes_name,gcd.gift_cate_name as gift_category_name FROM gift g , attributes ad , gift_category gcd WHERE g.attributes_id = ad.attributes_id AND g.gift_category_id = gcd.gift_category_id";
        $query = $this->db->query($sql);            
        return $query->result();  
        
    }
    

    function add_gift_category($data) {
        $this->db->insert('gift_category', $data);
        return $this->db->insert_id();
    }
    
    function add_gift_category_desc($data) {
        $this->db->insert('gift_category_description', $data);
        return $this->db->insert_id();
    }
    



    function get_prnt_category(){
        $result = $this->db->get_where('gift_category',array('gift_category_status'=>1));
        return $result->result();
    }
    
    
    function get_gift_category($id){
        $result = $this->db->get_where('gift_category',array('gift_category_id'=>$id));
        return $result->row();
    }
    
    function get_attributes(){
        $result = $this->db->get_where('attributes',array('status'=>1));
        return $result->result();
    }
 

    function update_gift_category($data, $id) {
        $this->db->where('gift_category_id', $id);
        $this->db->update('gift_category', $data);
    }
    
    
     function update_gift_category_desc($data, $id){
        $this->db->where('gift_category_description_id', $id);
        $this->db->update('gift_category_description', $data);
    }
    
    

    function add_gift($data) {
        $this->db->insert('gift', $data);
        return $this->db->insert_id();
    }
    
     function add_gift_desc($data) {
        $this->db->insert('gift_description', $data);
        return $this->db->insert_id();
    }
    
    
    function get_gift($id){
        $this->db->select('p.*');
        $this->db->where('p.gift_id',$id);
        $result = $this->db->get('gift p');
        return $result->row();
    }
    
    
    
    function update_gift($data, $id) {
        $this->db->where('gift_id', $id);
        $this->db->update('gift', $data);
    }
    
    
     function update_gift_desc($data, $id){
        $this->db->where('gift_description_id', $id);
        $this->db->update('gift_description', $data);
    }
}
?>

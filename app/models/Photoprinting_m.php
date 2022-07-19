<?php

class photoprinting_m extends CI_Model {

    var $photoprinting = 'photoprinting';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_photoprinting_category(){ 
        
        $query = $this->db->order_by('g.photoprinting_category_id', 'desc')->get_where('photoprinting_category g', array('g.photoprinting_category_status' => 1));
        return $query->result();
        
    }

    function get_all_photoprinting(){ 
        
     $sql = "SELECT g.photoprinting_id,g.attributes_id,g.price,g.ar_photoprinting_title,g.photoprinting_title,ad.atr_name as attributes_name FROM photoprinting g , attributes ad  WHERE g.attributes_id = ad.attributes_id";
        $query = $this->db->query($sql);            
        return $query->result();  
        
    }
    

    function add_photoprinting_category($data) {
        $this->db->insert('photoprinting_category', $data);
        return $this->db->insert_id();
    }
    
    function add_photoprinting_category_desc($data) {
        $this->db->insert('photoprinting_category_description', $data);
        return $this->db->insert_id();
    }
    



    function get_prnt_category(){
        $result = $this->db->get_where('photoprinting_category',array('photoprinting_category_status'=>1));
        return $result->result();
    }
    
    
    function get_photoprinting_category($id){
        $result = $this->db->get_where('photoprinting_category',array('photoprinting_category_id'=>$id));
        return $result->row();
    }
    
    function get_attributes(){
        $result = $this->db->get_where('attributes',array('status'=>1));
        return $result->result();
    }
 

    function update_photoprinting_category($data, $id) {
        $this->db->where('photoprinting_category_id', $id);
        $this->db->update('photoprinting_category', $data);
    }
    
    
     function update_photoprinting_category_desc($data, $id){
        $this->db->where('photoprinting_category_description_id', $id);
        $this->db->update('photoprinting_category_description', $data);
    }
    
    

    function add_photoprinting($data) {
        $this->db->insert('photoprinting', $data);
        return $this->db->insert_id();
    }
    
     function add_photoprinting_desc($data) {
        $this->db->insert('photoprinting_description', $data);
        return $this->db->insert_id();
    }
    
    
    function get_photoprinting($id){
        $this->db->select('p.*');
        $this->db->where('p.photoprinting_id',$id);
        $result = $this->db->get('photoprinting p');
        return $result->row();
    }
    
    
    
    function update_photoprinting($data, $id) {
        $this->db->where('photoprinting_id', $id);
        $this->db->update('photoprinting', $data);
    }
    
    
     function update_photoprinting_desc($data, $id){
        $this->db->where('photoprinting_description_id', $id);
        $this->db->update('photoprinting_description', $data);
    }
}
?>

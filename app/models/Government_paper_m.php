<?php

class government_paper_m extends CI_Model {

    var $government_paper = 'government_paper';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_government_paper_category(){ 
        
        $query = $this->db->order_by('g.government_paper_category_id', 'desc')->get_where('government_paper_category g', array('g.government_paper_category_status' => 1));
        return $query->result();
        
    }

    function get_all_government_paper(){ 
        
     $sql = "SELECT g.government_paper_id,g.government_paper_category_id,g.price,g.ar_government_paper_title,g.government_paper_title,gcd.government_paper_cate_name as government_paper_category_name FROM government_paper g , government_paper_category gcd WHERE g.government_paper_category_id = gcd.government_paper_category_id";
        $query = $this->db->query($sql);            
        return $query->result();  
    }
    

    function add_government_paper_category($data) {
        $this->db->insert('government_paper_category', $data);
        return $this->db->insert_id();
    }
    
    function add_government_paper_category_desc($data) {
        $this->db->insert('government_paper_category_description', $data);
        return $this->db->insert_id();
    }
    



    function get_prnt_category(){
        $result = $this->db->get_where('government_paper_category',array('government_paper_category_status'=>1));
        return $result->result();
    }
    
    
    function get_government_paper_category($id){
        $result = $this->db->get_where('government_paper_category',array('government_paper_category_id'=>$id));
        return $result->row();
    }
    
    function get_attributes(){
        $result = $this->db->get_where('attributes',array('status'=>1));
        return $result->result();
    }
 

    function update_government_paper_category($data, $id) {
        $this->db->where('government_paper_category_id', $id);
        $this->db->update('government_paper_category', $data);
    }
    
    
     function update_government_paper_category_desc($data, $id){
        $this->db->where('government_paper_category_description_id', $id);
        $this->db->update('government_paper_category_description', $data);
    }
    
    

    function add_government_paper($data) {
        $this->db->insert('government_paper', $data);
        return $this->db->insert_id();
    }
    
     function add_government_paper_desc($data) {
        $this->db->insert('government_paper_description', $data);
        return $this->db->insert_id();
    }
    
    
    function get_government_paper($id){
        $this->db->select('p.*');
        $this->db->where('p.government_paper_id',$id);
        $result = $this->db->get('government_paper p');
        return $result->row();
    }
    
    
    
    function update_government_paper($data, $id) {
        $this->db->where('government_paper_id', $id);
        $this->db->update('government_paper', $data);
    }
    
    
     function update_government_paper_desc($data, $id){
        $this->db->where('government_paper_description_id', $id);
        $this->db->update('government_paper_description', $data);
    }
}
?>

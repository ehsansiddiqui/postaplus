<?php

class printing_m extends CI_Model {

    var $Printing = 'Printing';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_printing_type(){ 
        
        $query = $this->db->order_by('pt.print_type_id', 'desc')->get_where('print_type pt', array('pt.print_type_status' => 1));
        return $query->result();
        
    }
    
    
    
    function get_all_printing(){ 
        
        $sql = "SELECT p.printing_id,p.print_type_id,p.attributes_id,p.price,p.printing_title,p.ar_printing_title,ad.atr_name as attributes_name,ptd.pri_type_name as print_type_name FROM printing p , attributes ad , print_type ptd WHERE   p.attributes_id = ad.attributes_id AND p.print_type_id = ptd.print_type_id";
        
        
        $query = $this->db->query($sql);            
        return $query->result();  
    }
    
    
    
    function add_printing_type($data) {
        $this->db->insert('print_type', $data);
        return $this->db->insert_id();
    }
    
    function add_printing_type_desc($data) {
        $this->db->insert('print_type_description', $data);
        return $this->db->insert_id();
    }
    



    function get_prnt_type(){
        $result = $this->db->get_where('print_type',array('print_type_status'=>1));
        return $result->result();
    }
    
    
    function get_printing_type($id){
        $result = $this->db->get_where('print_type',array('print_type_id'=>$id));
        return $result->row();
    }
    
    function get_attributes(){
        $result = $this->db->get_where('attributes',array('status'=>1));
        return $result->result();
    }
 

    function update_printing_type($data, $id) {
        $this->db->where('print_type_id', $id);
        $this->db->update('print_type', $data);
    }
    
    
     function update_printing_type_desc($data, $id){
        $this->db->where('print_type_description_id', $id);
        $this->db->update('print_type_description', $data);
    }
    
    

    function add_printing($data) {
        $this->db->insert('printing', $data);
        return $this->db->insert_id();
    }
    
     function add_printing_desc($data) {
        $this->db->insert('printing_description', $data);
        return $this->db->insert_id();
    }
    
    
    function get_printing($id){
        $this->db->select('p.*');
        $this->db->where('p.printing_id',$id);
        $result = $this->db->get('printing p');
        return $result->row();
    }
    
    
    
    function update_printing($data, $id) {
        $this->db->where('printing_id', $id);
        $this->db->update('printing', $data);
    }
    
    
     function update_printing_desc($data, $id){
        $this->db->where('printing_description_id', $id);
        $this->db->update('printing_description', $data);
    }
    
    
}
?>

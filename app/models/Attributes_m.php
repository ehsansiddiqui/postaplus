<?php

class attributes_m extends CI_Model {

    var $attributes_group = 'attributes_group';
    var $attributes = 'attributes';


    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_attributes_group(){
        
        $query = $this->db->order_by('ag.attributes_group_id', 'desc')->get_where('attributes_group ag', array('ag.attributes_group_status' => 1));
        return $query->result();
    }
    
    
    function get_all_attributes(){                
        $this->db->select('a.*,ag.attr_group_name as attributes_group_name');
        $this->db->join('attributes_group ag','a.attributes_group_id=ag.attributes_group_id');
        $query = $this->db->order_by('a.attributes_id', 'desc')->get_where('attributes a',array('a.status'=>1));
        return $query->result();
    }
     
    
    function add_attributes_group($data) {
        $this->db->insert($this->attributes_group, $data);
        return $this->db->insert_id();
    }
    
    
    function add_attributes_group_des($data1) {
        $this->db->insert('attributes_group_description', $data1);
        return $this->db->insert_id();
    }
    
    
    
    function check_attributes_group_a($attributes_group_name){
        $result = $this->db->get_where('attributes_group', array('attr_group_name'=>$attributes_group_name));
        return $result->row();
    }
    
    function check_attributes_group_e($attributes_group_name,$id){
        $result = $this->db->get_where('attributes_group', array('attr_group_name'=>$attributes_group_name,'attributes_group_id !=' => $id));
        return $result->row();
    }
    

    function add_attributes($data){
        $this->db->insert($this->attributes, $data);
        return $this->db->insert_id();
    }
    
    
    function add_attributes_des($data){
      $this->db->insert('attributes_description',$data);
      return $this->db->insert_id();  
    } 
    
    
    function get_attributes_group($attributes_group_id){
        $result = $this->db->get_where('attributes_group', array('attributes_group_id' => $attributes_group_id));
        return $result->row();
    }
 

    function update_attributes_group($data, $id) {
        $this->db->where('attributes_group_id',$id);
        $this->db->update('attributes_group', $data);
    }
    
    
    function check_attributes_a($attributes_name){
        $result = $this->db->get_where($this->attributes, array('attributes_name'=>$attributes_name));
        return $result->row();
    }

    function check_attributes_e($attributes_name,$id){
        $result = $this->db->get_where($this->attributes, array('attributes_name' =>$attributes_name, 'attributes_id !=' => $id));
        return $result->row();
    }
      

    
    function get_attributes_by_group($attributes_group_id){
        
        $this->db->select('a.attributes_id,ad.*,agd.attributes_group_name'); 
        $this->db->join('attributes_description ad','ad.attributes_id=a.attributes_id');
        $this->db->join('attributes_group_description agd','agd.attributes_group_id=a.attributes_group_id');  
        $this->db->join('language l','l.language_id=ad.language_id');
        $query = $this->db->get_where('attributes a',array('a.attributes_group_id'=>$attributes_group_id));
        return $query->result();
    }
       
    function get_attr(){    
        $result = $this->db->get_where('attributes_group',array('attributes_group_status'=>1));
        return $result->result();
    }
    
    
    function get_attributes_edit($attributes_id){
        $result = $this->db->get_where('attributes a',array('a.attributes_id'=>$attributes_id));
        return $result->row();
    }
    
    
    function update_attributes($data,$attributes_id){
        $this->db->where('attributes_id',$attributes_id);
        $this->db->update('attributes',$data);
    }
    
    
    function update_attributes_des($data1,$id){
        $this->db->where('attributes_description_id',$id);
        $this->db->update('attributes_description',$data1);
    }
}
?>
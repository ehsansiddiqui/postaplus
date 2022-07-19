<?php

class variant_m extends CI_Model {

   var $variant = 'vehicle_variant';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_variant(){
        $query = $this->db->order_by('vehicle_variant_id','desc')->get($this->variant)->result();
        return $query;
    }

    function add_variant($data) {
        $this->db->insert($this->variant, $data);
        return $this->db->insert_id();
    }

    function get_variants($variant_id) {
        $result = $this->db->get_where($this->variant,array('vehicle_variant_id'=>$variant_id));
        return $result->row();
    }
    
    function update_variant($data,$id){
         $this->db->where('vehicle_variant_id', $id);
        $this->db->update($this->variant, $data);
    }
    
    
    function vehicle_variant() {
        
        $sql = "SELECT VTV.*,VM.*,VV.*,VB.* FROM vehicle_to_variant VTV , vehicle_models VM , vehicle_variant VV , vehcle_brand VB WHERE VTV.vehicle_id = VM.vehicle_id AND  VTV.variant_id =  VV.vehicle_variant_id AND VM.brand_id = VB.brand_id ORDER BY VTV.vehicle_to_variant_id DESC";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    
    function get_vehicle(){
        $query = $this->db->order_by('vehicle_id','desc')->get('vehicle_models')->result();
        return $query;
    }
    
    
    function add_variant_vehicles($data){
        $this->db->insert('vehicle_to_variant',$data);
    }
    
    function get_variant_vehicle($vehicle_to_variant_id){
        
//        $result = $this->db->get_where('vehicle_to_variant',array('vehicle_to_variant_id'=>$vehicle_to_variant_id));
//        return $result->row();
        
            $sql = "SELECT VTV.*,VM.*,VV.* FROM vehicle_to_variant VTV , vehicle_models VM , vehicle_variant VV WHERE VTV.vehicle_id = VM.vehicle_id AND  VTV.variant_id =  VV.vehicle_variant_id AND VTV.vehicle_to_variant_id = $vehicle_to_variant_id";
       
        $result = $this->db->query($sql);
        return $result->row();
        
    }
    
    function update_variant_vehicles($data,$id){
        $this->db->where('vehicle_to_variant_id', $id);
        $this->db->update('vehicle_to_variant', $data);
    }
    
    
    
    function get_category(){
        $result = $this->db->get_where('vehicle_category');
        return $result->result();
    }
    
    
     function get_brand(){
        $result = $this->db->get_where('vehcle_brand');
        return $result->result();
    }
    
    
    function get_models($brand_id){
        $result = $this->db->get_where('vehicle_models',array('brand_id'=>$brand_id));
        return $result->result();
    }
    
    function get_brands($category_id){   
        $result = $this->db->get_where('vehcle_brand',array('category_id'=>$category_id));
        return $result->result(); 
    }
    
    function check_variant($variant){
        $result = $this->db->get_where('vehicle_variant',array('variant_name'=>$variant));
        return $result->row();  
    }
    
     function check_vehicle($variant_id,$vehicle_id){
        $result = $this->db->get_where('vehicle_to_variant',array('variant_id'=>$variant_id,'vehicle_id'=>$vehicle_id));
        return $result->row();  
    }
    
}?>
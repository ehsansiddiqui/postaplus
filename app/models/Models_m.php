<?php

class models_m extends CI_Model {

   var $models = 'vehicle_models';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_models(){
        $sql = "SELECT VM.*,VC.*,VB.* FROM vehicle_models VM,vehicle_category VC,vehcle_brand VB WHERE VM.category_id = VC.category_id AND VM.brand_id = VB.brand_id ORDER BY VM.vehicle_id DESC";
       $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_models($data) {
        $this->db->insert($this->models, $data);
        return $this->db->insert_id();
    }

    function get_modelss($models_id) {
        $result = $this->db->get_where($this->models,array('vehicle_id'=>$models_id));
        return $result->row();
    }
    
    function update_models($data,$id){
         $this->db->where('vehicle_id', $id);
        $this->db->update($this->models, $data);
    }
    
    
    function get_vehicle_body_type() {
        $result = $this->db->get_where('vehicle_body_type');
        return $result->result();
    }
    
    function get_vehicle_fuel_type(){
        $result = $this->db->get_where('vehicle_fuel_type');
        return $result->result();  
    } 
    
    
        function get_variant($vehicle_id) {
        
        $sql = "SELECT VTV.*,VM.*,VV.*,VB.* FROM vehicle_to_variant VTV , vehicle_models VM , vehicle_variant VV , vehcle_brand VB  WHERE VTV.variant_id = VV.vehicle_variant_id and VM.vehicle_id = $vehicle_id and  VTV.vehicle_id = VM.vehicle_id AND VM.brand_id = VB.brand_id";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    function get_brand($category_id){   
        $result = $this->db->get_where('vehcle_brand',array('category_id'=>$category_id));
        return $result->result(); 
    }
    
    function check_models($short_title,$id){
        
        if(!empty($id)){
            $sql = "SELECT vehicle_id,short_title FROM vehicle_models WHERE vehicle_id != $id AND short_title = '$short_title'";
               $result = $this->db->query($sql);
        return $result->row();
        }else{
        $result = $this->db->get_where('vehicle_models',array('short_title'=>$short_title));
        return $result->row();
        }
    }
}?>
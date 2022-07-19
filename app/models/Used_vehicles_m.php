<?php

class used_vehicles_m extends CI_Model {

   var $used_vehicles = 'used_vehicles';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_used_vehicles(){
        
        $sql = "SELECT UV.used_vehicle_model_id, UV.model_id, UV.variant_id , UV.owner_user_id, UV.location_id, UV.color_id, UV.description, UV.current_mileage, UV.anchor_image as img, UV.expected_price, UV.year, UV.owner_type, UV.register_number, UV.mfg_date, UV.title_transfer_flag, UV.roadaside_assistance_flag, UV.warranty_flag, UV.insurance_flag, UV.finance_flag, UV.single_owner_flag, UV.accedent_flag, UV.distance_travelled, UV.status as aproved , VM.*,VC.*,VB.*,UD.name as fname,UD.email_id,UD.mobile FROM used_vehicles UV,vehicle_category VC,vehcle_brand VB ,vehicle_models VM ,user_details UD WHERE VM.category_id = VC.category_id AND VM.brand_id = VB.brand_id AND UV.model_id = VM.vehicle_id AND UV.owner_user_id = UD.user_id ORDER BY UV.used_vehicle_model_id DESC";
       $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_used_vehicles($data) {
        $this->db->insert($this->used_vehicles, $data);
        return $this->db->insert_id();
    }

    function get_used_vehicless($used_vehicles_id) {
        $result = $this->db->get_where($this->used_vehicles,array('vehicle_id'=>$used_vehicles_id));
        return $result->row();
    }
    
    function update_used_vehicles($data,$id){
         $this->db->where('vehicle_id', $id);
        $this->db->update($this->used_vehicles, $data);
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
        
        $sql = "SELECT VTV.*,VM.*,VV.*,VB.* FROM vehicle_to_variant VTV , vehicle_used_vehicles VM , vehicle_variant VV , vehcle_brand VB  WHERE VTV.variant_id = VV.vehicle_variant_id and VM.vehicle_id = $vehicle_id and  VTV.vehicle_id = VM.vehicle_id AND VM.brand_id = VB.brand_id";
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    function get_status($used_vehicle_model_id){   
        $result = $this->db->get_where('used_vehicles',array('used_vehicle_model_id'=>$used_vehicle_model_id));
        return $result->row();  
    }
    
    function update_status($datas,$used_vehicle_model_id){
         $this->db->where('used_vehicle_model_id', $used_vehicle_model_id);
        $this->db->update($this->used_vehicles, $datas);
    }
}?>
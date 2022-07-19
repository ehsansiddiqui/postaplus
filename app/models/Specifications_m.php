<?php

class specifications_m extends CI_Model {

    var $specifications = 'vehicle_specifications';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_specifications() {
        $sql = "SELECT VS.*,VV.*,VM.*,SM.*,VB.*,VC.* FROM vehicle_specifications VS, vehicle_to_variant VTV , vehicle_variant VV,vehicle_models VM , specification_master SM , vehcle_brand VB , vehicle_category VC WHERE VS.`vehicle_to_variant_id` = VTV.`vehicle_to_variant_id` AND VTV.`vehicle_id` = VM.`vehicle_id` AND VTV.`variant_id` = VV.`vehicle_variant_id` AND VS.`specification_id` = SM.`specification_id` AND VM.brand_id = VB.brand_id AND VM.category_id = VC.category_id ORDER BY VS.vehicle_specification_id DESC";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_specifications($data) {
        $this->db->insert($this->specifications, $data);
        return $this->db->insert_id();
    }

    function get_specificationss($specifications_id){
        
        $sql = "SELECT VS.*,VTV.* FROM vehicle_specifications VS, vehicle_to_variant VTV , vehicle_variant VV,vehicle_models VM  WHERE VS.`vehicle_to_variant_id` = VTV.`vehicle_to_variant_id` AND VTV.`vehicle_id` = VM.`vehicle_id` AND VTV.`variant_id` = VV.`vehicle_variant_id` AND VS.vehicle_specification_id = $specifications_id";
        
        
        $result = $this->db->query($sql);
        return $result->row();
    }

    function update_specifications($data, $id) {
        $this->db->where('vehicle_specification_id', $id);
        $this->db->update($this->specifications, $data);
    }

    function get_all_variant() {
        $result = $this->db->get('vehicle_variant');
        return $result->result();
    }

    function get_all_specification_master() {
        $result = $this->db->get('specification_master');
        return $result->result();
    }

    function get_all_vehicle() {
        $result = $this->db->get('vehicle_models');
        return $result->result();
    }
    
    function check_specifications($vehicle_to_variant_id,$sphecification_id){   
      $query =  $this->db->get_where('vehicle_specifications',array('vehicle_to_variant_id'=>$vehicle_to_variant_id,'specification_id'=>$sphecification_id));
      return $query->row();  
    }
    
   function get_vehicle_to_variant_id($vehicle_id,$variants_id){   
      $query =  $this->db->get_where('vehicle_to_variant',array('vehicle_id'=>$vehicle_id,'variant_id'=>$variants_id));
      return $query->row();  
    }
    
    
    function get_variant_by_vehicle($vehicle_id){  
        $sql = "SELECT VV.* , VTV.vehicle_id FROM vehicle_to_variant VTV , vehicle_variant VV WHERE VTV.variant_id = VV.vehicle_variant_id AND VTV.vehicle_id = $vehicle_id"; 
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    
    function check_specifications_edit($vehicle_to_variant_id,$sphecification_id,$id){
        
         $sql = "SELECT vehicle_specification_id FROM vehicle_specifications WHERE vehicle_specification_id != $id AND vehicle_to_variant_id = '$vehicle_to_variant_id' AND specification_id ='$sphecification_id' ";
         $result = $this->db->query($sql);
        return $result->row();
    }
    
    
   
}?>
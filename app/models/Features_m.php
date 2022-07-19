<?php

class features_m extends CI_Model {

   var $features = 'vehicle_features';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_features(){
        
//        $sql = "SELECT VF.*,VV.*,VM.*,F.* FROM vehicle_features VF,vehicle_variant VV,vehicle_models VM , features F WHERE VF.`variant_id` = VV.`vehicle_variant_id` AND VF.`vehicle_id` = VM.`vehicle_id` AND VF.`feature_id` = F.`feature_id` ORDER BY VF.vehicle_feature_id DESC";
        
       $sql = "SELECT VF.*,VV.*,VM.*,F.*,VB.*,VC.* FROM  vehicle_features VF, vehicle_to_variant VTV , vehicle_variant VV,vehicle_models VM , features F , vehcle_brand VB , vehicle_category VC WHERE VF.vehicle_to_variant_id = VTV.vehicle_to_variant_id AND VTV.vehicle_id = VM.vehicle_id AND VTV.variant_id = VV.vehicle_variant_id AND VF.feature_id = F.feature_id AND VM.brand_id = VB.brand_id AND VM.category_id = VC.category_id ORDER BY VF.vehicle_feature_id DESC";    
       $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_features($data) {
        $this->db->insert($this->features, $data);
        return $this->db->insert_id();
    }

    function get_featuress($features_id) {
        
        
                $sql = "SELECT VF.*,VTV.* FROM vehicle_features VF, vehicle_to_variant VTV , vehicle_variant VV,vehicle_models VM  WHERE VF.`vehicle_to_variant_id` = VTV.`vehicle_to_variant_id` AND VTV.`vehicle_id` = VM.`vehicle_id` AND VTV.`variant_id` = VV.`vehicle_variant_id` AND VF.vehicle_feature_id = $features_id";
        
        
        $result = $this->db->query($sql);
        return $result->row();
        
//        $result = $this->db->get_where($this->features,array('vehicle_feature_id'=>$features_id));
//        return $result->row();
    }
    
    function update_features($data,$id){
         $this->db->where('vehicle_feature_id', $id);
        $this->db->update($this->features, $data);
    }
    
    
        function get_all_variant() {
        $result = $this->db->get('vehicle_variant');
        return $result->result();
    }

    function get_all_features_master() {
        $result = $this->db->get('features');
        return $result->result();
    }

    function get_all_vehicle() {
        $result = $this->db->get('vehicle_models');
        return $result->result();
    }
    
 function check_feature($vehicle_to_variant_id,$feature_id){     
$query =  $this->db->get_where('vehicle_features',array('vehicle_to_variant_id'=>$vehicle_to_variant_id,'feature_id'=>$feature_id));
      return $query->row();  
    }
    
    
    function check_features_edit($vehicle_to_variant_id,$feature_id,$id){
        
         $sql = "SELECT vehicle_feature_id FROM vehicle_features WHERE vehicle_feature_id != $id AND vehicle_to_variant_id = '$vehicle_to_variant_id' AND feature_id ='$feature_id' ";
         $result = $this->db->query($sql);
        return $result->row();
    }
    

}?>
<?php
class prices_m extends CI_Model {

    var $prices = 'vehicle_onroadprice';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_prices() {
        
        $sql = "SELECT VOP.*,VTV.*,VM.*,VV.*,C.*,S.*,VB.*,VC.* FROM vehicle_onroadprice VOP, vehicle_to_variant VTV, vehicle_models VM ,vehicle_variant VV, city C , state S ,vehcle_brand VB , vehicle_category VC WHERE VOP.vehicle_to_variant_id = VTV.vehicle_to_variant_id AND VTV.vehicle_id = VM.vehicle_id AND VTV.variant_id = VV.vehicle_variant_id AND VOP.city_id = C.city_id AND C.state_id = S.state_id AND VM.brand_id = VB.brand_id AND VM.category_id = VC.category_id ORDER BY VOP.vehicle_on_road_price_id DESC";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function add_prices($data) {
        $this->db->insert($this->prices, $data);
        return $this->db->insert_id();
    }

    function get_pricess($prices_id) {
     
            $sql = "SELECT VOP.*,VTV.*,VM.*,VV.*,C.*,S.*,VB.*,VC.* FROM vehicle_onroadprice VOP, vehicle_to_variant VTV, vehicle_models VM ,vehicle_variant VV, city C , state S ,vehcle_brand VB , vehicle_category VC WHERE VOP.vehicle_to_variant_id = VTV.vehicle_to_variant_id AND VTV.vehicle_id = VM.vehicle_id AND VTV.variant_id = VV.vehicle_variant_id AND VOP.city_id = C.city_id AND C.state_id = S.state_id AND VM.brand_id = VB.brand_id AND VM.category_id = VC.category_id AND VOP.vehicle_on_road_price_id = $prices_id";
        $query = $this->db->query($sql)->row();
        return $query;
    }

    function update_prices($data, $id) {
        $this->db->where('vehicle_on_road_price_id', $id);
        $this->db->update($this->prices, $data);
    }

    function get_vehicle_to_variant() {
      $sql = "SELECT VTV.*,VM.*,VV.* FROM  vehicle_to_variant VTV, vehicle_models VM ,vehicle_variant VV WHERE  VTV.vehicle_id = VM.vehicle_id AND VTV.variant_id = VV.vehicle_variant_id";
        $query = $this->db->query($sql)->result();
        return $query;
    }
    
    
    function get_city(){
        $query = $this->db->get('city');
        return $query->result();
    }
    
     function get_state(){
        $query = $this->db->get('state');
        return $query->result();
    }
    
    function get_state_city($state_id){
        $result = $this->db->get_where('city', array('state_id' =>$state_id));
        return $result->result(); 
    }
    
    function check_price($vehicle_to_variant_id,$city_id){ 
     $result = $this->db->get_where('vehicle_onroadprice', array('vehicle_to_variant_id' =>$vehicle_to_variant_id,'city_id'=>$city_id));
     return $result->row();   
    }
    
}?>
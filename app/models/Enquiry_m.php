<?php

class enquiry_m extends CI_Model {

   var $enquiry = 'enquiry';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_enquiry(){       
      $sql = "SELECT E.* ,ET.* FROM enquiry E , enquiry_types ET WHERE E.enquiry_type_id = ET.enquiry_type_id ORDER BY enquiry_id DESC";  
      $query = $this->db->query($sql)->result();
      return $query;
    }
    
    
   function get_enquiry_details($enquiry_id){
       
          $sql = "SELECT E.* ,ET.* FROM enquiry E , enquiry_types ET WHERE E.enquiry_type_id = ET.enquiry_type_id AND E.enquiry_id =$enquiry_id ";  
      $query = $this->db->query($sql)->row();
      return $query;
       
//       $query = $this->db->get_where('enquiry',array('enquiry_id'=>$enquiry_id));
//       return $query->row();
   }
   
   function get_new_vehicle_details($vehicle_id){
       $query = $this->db->get_where('vehicle_models',array('vehicle_id'=>$vehicle_id));
       return $query->row(); 
   }
   
   function get_used_vehicle_details($vehicle_id){
       
       $sql = "SELECT UV.* ,  VM.vehicle_id, VM.category_id, VM.brand_id, VM.vehicle_body_type_id, VM.short_title, VM.detail_title, VM.description, VM.expected_price, VM.model_price_max, VM.status, VM.featured_status, VM.recommended_status, VM.popular_status, VM.upcoming_status, VM.bestoffer_status FROM used_vehicles UV , vehicle_models VM WHERE UV.model_id = VM.vehicle_id AND UV.used_vehicle_model_id = $vehicle_id";

       
       $query = $this->db->query($sql);
       return $query->row(); 
   }
   
    function get_parts_vehicle_details($parts_id){
        
        $sql = "SELECT P.*, PT.*, VC.* FROM parts P , parts_types PT , vehicle_category VC  WHERE  P.parts_types_id = PT.parts_type_id AND PT.category_id = VC.category_id AND P.parts_id = $parts_id";
        
       $query = $this->db->query($sql);
        
        
//       $query = $this->db->get_where('parts',array('parts_id'=>$parts_id));
       
       
       return $query->row(); 
   }
   
   
   function get_acess_vehicle_details($accessories_id){
       
     $sql = "SELECT A.*, AT.*, VC.* FROM accessories A , accessories_types AT , vehicle_category VC  WHERE  A.accessories_types_id = AT.accessories_type_id AND AT.category_id = VC.category_id AND A.accessories_id = $accessories_id";
    $query = $this->db->query($sql);   
//       $query = $this->db->get_where('accessories',array('accessories_id'=>$accessories_id));
       return $query->row(); 
   }
           

    function add_enquiry($data){
        $this->db->insert($this->enquiry, $data);
        return $this->db->insert_id();
    }

    function get_enquirys($enquiry_id){
        $result = $this->db->get_where($this->enquiry,array('enquiry_id'=>$enquiry_id));
        return $result->row();
    }
    
    function update_enquiry($data,$id){
         $this->db->where('enquiry_id', $id);
        $this->db->update($this->enquiry, $data);
    }
    
    function get_state(){
        $query = $this->db->order_by('state_id','desc')->get('state')->result();
        return $query;
    }

}

?>
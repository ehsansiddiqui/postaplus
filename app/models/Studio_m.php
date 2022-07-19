<?php

class studio_m extends CI_Model {

    var $studio = 'studio';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_all_studio(){
        $query = $this->db->order_by('studio_id', 'desc')->get_where($this->studio,array('status'=>1));
        return $query->result();
    }
    
     function get_more_studio($id){
        $query = $this->db->get_where('studio_images',array('studio_id_fk'=>$id));
        return $query->result();
    }
   
    function add_studio($data){
        $this->db->insert($this->studio, $data);
        return $this->db->insert_id();
    }
    function add_data_studio($data_studio){
        $this->db->insert('login', $data_studio);
        return $this->db->insert_id();
    }

    function get_studios($studio_id) {
        $result = $this->db->get_where($this->studio, array('studio_id' => $studio_id));
        return $result->row();
    }
     
    
    function get_activity_type($studio_id) {


        $sql = "SELECT s.*,sl.* FROM studio_location sl ,studio s WHERE sl.studio_id = s.studio_id AND s.studio_id=$studio_id  ORDER BY sl.studio_location_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
     function get_locations_studio($studio_id) {


        $sql = "SELECT place,studio_Latitude,studio_Longitude FROM studio_location WHERE studio_id=$studio_id  ORDER BY studio_location_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
    
    function get_locations_studios($studio_id) {
        
        $sql = "SELECT location_id,location_name as place ,locations_latitude as studio_Latitude ,location_longitude as studio_Longitude  FROM locations WHERE location_id IN( SELECT location_id FROM studio_location WHERE studio_id = $studio_id)";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_timings_studio($studio_id) {


        $sql = "SELECT * FROM studio_timing WHERE studio_id=$studio_id  ORDER BY studio_timing_id  ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function update_studio($data, $studio_id) {
        $this->db->where('studio_id', $studio_id);
        $this->db->update($this->studio, $data);
        
    }
    
    function check_studio($studio_id){
       $result = $this->db->get_where($this->studio, array('studio_name' => $studio_id));
        return $result->row();
    }
    
    function get_location(){
        $result = $this->db->get_where('locations', array('status' =>1));
        return $result->result(); 
    }
    
    function get_all_intructor(){        
      $result = $this->db->get_where('instructor', array('status' =>1));
      return $result->result();       
    }
    
    function get_activity(){     
      $result = $this->db->get_where('activity_type', array('status' =>1));
      return $result->result();  
    }
    
    function get_studio_timing($studio_id){     
      $result = $this->db->get_where('studio_timing', array('studio_id' =>$studio_id));
      return $result->result();  
    }
    
    function get_studio_intructor($studio_id){     
      $result = $this->db->get_where('studio_instructor', array('studio_id' =>$studio_id));
      return $result->result();  
    }
    
    function get_studio_location($studio_id){     
      $result = $this->db->get_where('studio_location', array('studio_id' =>$studio_id));
      return $result->result();  
    }
    
    function get_studio_activity($studio_id){     
      $result = $this->db->get_where('studio_activity', array('studio_id' =>$studio_id));
      return $result->result();  
    }

}?>
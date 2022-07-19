<?php

class city_m extends CI_Model {

   var $city = 'city';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function get_city(){
        
      $sql = "SELECT C.*,S.* FROM city C , state S  WHERE C.state_id = S.state_id ORDER BY city_id DESC";  
      $query = $this->db->query($sql)->result();
      
//    $query = $this->db->get($this->city)->result();
      return $query;
    }

    function add_city($data) {
        $this->db->insert($this->city, $data);
        return $this->db->insert_id();
    }

    function get_citys($city_id) {
        $result = $this->db->get_where($this->city,array('city_id'=>$city_id));
        return $result->row();
    }
    
    function update_city($data,$id){
         $this->db->where('city_id', $id);
        $this->db->update($this->city, $data);
    }
    
    function get_state(){
        $query = $this->db->order_by('state_id','desc')->get('state')->result();
        return $query;
    }
    
    function check_city($state_id,$city_name){
        $result = $this->db->get_where($this->city,array('state_id'=>$state_id,'city_name'=>$city_name));
        return $result->row();    
    }
    
    
     function check_city_edit($state_id,$city_name,$id){
         
         $sql = "SELECT city_id FROM city WHERE city_id != $id AND city_name = '$city_name' AND state_id ='$state_id' ";
         $result = $this->db->query($sql);
        return $result->row();
    }
   
}?>
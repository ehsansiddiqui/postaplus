<?php
class colour_m extends CI_Model {

    var $colour = 'vehicle_colors';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_colour() {  
        $query = $this->db->get_where('vehicle_colors')->result();
        return $query;
    }

    function add_colour($data) {
        $this->db->insert($this->colour, $data);
        return $this->db->insert_id();
    }

    function get_colours($colour_id) {
       $query = $this->db->get_where('vehicle_colors',array('vehicle_color_id'=>$colour_id))->row();
       return $query;
    }

    function update_colour($data, $id) {
        $this->db->where('vehicle_color_id', $id);
        $this->db->update($this->colour, $data);
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
    
    
}?>
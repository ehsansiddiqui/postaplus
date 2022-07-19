<?php

class car_m extends CI_Model {

    var $car = 'car_details';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_all_car(){
        $query = $this->db->order_by('car_id', 'desc')->get_where($this->car,array('status'=>1));
        return $query->result();
    }
    
     function get_more_car($id){
        $query = $this->db->get_where('car_images',array('car_id_fk'=>$id));
        return $query->result();
    }
    
    

    function add_car($data){
        $this->db->insert($this->car, $data);
        return $this->db->insert_id();
    }

    function get_cars($car_id) {
        $result = $this->db->get_where($this->car, array('car_id' => $car_id));
        return $result->row();
    }

    function update_car($data, $id) {
        $this->db->where('car_id', $id);
        $this->db->update($this->car, $data);
    }
    
    function check_car($car_id){
       $result = $this->db->get_where($this->car, array('car_name' => $car_id));
        return $result->row();
    }
}?>
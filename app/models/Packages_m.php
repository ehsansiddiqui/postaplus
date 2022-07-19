<?php

class packages_m extends CI_Model {

    var $studio_packages = 'studio_packages';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function get_all_packages(){
        
        $sql = "SELECT SP.* , S.studio_name FROM studio_packages SP , studio S  WHERE SP.studio_id = S.studio_id  ORDER BY SP.studio_packages_id  DESC";      
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
   function get_all_studio() {
        $result = $this->db->get_where('studio', array('status' => 1));
        return $result->result();
    }
    
    
     function get_more_packages($id){
         
        $query = $this->db->get_where('studio_packages_images',array('studio_packages_id_fk'=>$id));
        return $query->result();
    }
    
    

    function add_packages($data){
        
        $this->db->insert($this->studio_packages, $data);
        return $this->db->insert_id();
    }

    function get_packagess($studio_packages_id) {
        
        $result = $this->db->get_where($this->studio_packages, array('studio_packages_id' => $studio_packages_id));
        return $result->row();
    }

    function update_packages($data, $id) {
        
        $this->db->where('studio_packages_id', $id);
        $this->db->update($this->studio_packages, $data);
    }
    
    function check_packages($packages_name){
        
       $result = $this->db->get_where($this->studio_packages, array('packages_name' => $packages_name));
        return $result->row();
    }
    
}?>
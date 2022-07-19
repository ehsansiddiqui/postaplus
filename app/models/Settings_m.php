<?php

class settings_m extends CI_Model {

    var $settings = 'settings';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_settings(){  
        
        $this->db->select('settings.*');
        //$this->db->join('class','settings.class_id=class.class_id');               
        $this->db->order_by('settings.settings_id','desc');
        $query = $this->db->get_where('settings',array('settings.setting_satus'=>1));
        return $query->result();
    }
    
    
    function get_class(){
        
      $query = $this->db->get_where('class',array('class_status'=>1));
      return $query->result();  
    }
            

    function add_settings($data) {
        $this->db->insert($this->settings, $data);
        return $this->db->insert_id();
    }
    
     function add_login_details($data){
        $this->db->insert('login', $data);
        return $this->db->insert_id();
    }

    function get_settingss($settings_id) {
        $this->db->select('b.*');
        $result = $this->db->get_where('settings b', array('b.settings_id' => $settings_id));
        return $result->row();
    }

    function update_settings($data, $id) {
        $this->db->where('settings_id', $id);
        $this->db->update($this->settings, $data);
    }
    
    function update_login_details($data,$id){
        $this->db->where('settings_id',$id);
        $this->db->update('login', $data);
        return TRUE;
    }    
}?>
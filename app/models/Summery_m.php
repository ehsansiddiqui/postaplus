<?php

class summery_m extends CI_Model {

    var $summery = 'summary';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_summery(){          
        $this->db->select('summary.*,class.class_name');
        $this->db->join('class','summary.class_id=class.class_id');  
        $this->db->order_by('summary_id','desc');
        $query = $this->db->get_where('summary',array('summary.status'=>1));
        return $query->result();
    }
    
    
    function get_class(){       
      $query = $this->db->get_where('class',array('class_status'=>1));
      return $query->result();  
    }
    
    
    function get_brand(){       
      $query = $this->db->get_where('brand',array('status'=>1));
      return $query->result();  
    }
            

    function add_summery($data) {
        $this->db->insert($this->summery, $data);
        return $this->db->insert_id();
    }
    
     function add_login_details($data){
        $this->db->insert('login', $data);
        return $this->db->insert_id();
    }

    function get_summerys($summary_id) {
        $this->db->select('b.*');
        $result = $this->db->get_where('summary b', array('b.summary_id' => $summary_id));
        return $result->row();
    }

    function update_summery($data, $id) {
        $this->db->where('summary_id', $id);
        $this->db->update($this->summery, $data);
    }
    
    function update_login_details($data,$id){
        $this->db->where('summary_id',$id);
        $this->db->update('login', $data);
        return TRUE;
    }    
}?>
<?php

class bundle_settings_m extends CI_Model {

    var $bundle_settings = 'bundle_config';
   


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    function get_all_bundle_settings() {

        $query = $this->db->order_by('bundle_config_id', 'desc')->get_where($this->bundle_settings, array('active' => 1));
        return $query->result();
    }

    function add_bundle_settings($data) {
        $this->db->insert($this->bundle_settings, $data);

        return $this->db->insert_id();
    }

    function get_bundle_settingss($bundle_config_id) {
        $result = $this->db->get_where($this->bundle_settings, array('bundle_config_id' => $bundle_config_id));
        return $result->row();
    }
    

    
    function get_bundle_settings_studio($studio_activity_acitivity_id) {
        $studio_id = $this->session->userdata('studio_id');
        $sql = "SELECT sa.studio_activity_acitivity_id,sa.studio_id,sa.bundle_config_id,a.activity_name,a.activity_description,a.bundle_config_id FROM studio_activity sa ,bundle_settings a WHERE sa.bundle_config_id = a.bundle_config_id AND sa.studio_activity_acitivity_id=$studio_activity_acitivity_id AND sa.studio_id=$studio_id  ORDER BY sa.studio_activity_acitivity_id  DESC";

        $result = $this->db->query($sql);
        return $result->row();
    }

    function update_bundle_settings($data, $id) {
        $this->db->where('bundle_config_id', $id);
        $this->db->update($this->bundle_settings, $data);
    }

    function check_bundle_settings($number_of_class, $id) {

        $result = $this->db->get_where($this->bundle_settings, array('number_of_class' => $number_of_class, 'bundle_config_id !=' => $id));
        return $result->row();
    }
    
    
   function check_bundle($number_of_class){

        $result = $this->db->get_where($this->bundle_settings, array('number_of_class'=>$number_of_class));
        return $result->row();
    }

    function check_bundle_settings_class($bundle_settings, $studio_activity_acitivity_id) {
        
        
        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
      $sql = "SELECT bundle_config_id FROM studio_activity WHERE studio_activity_acitivity_id=$studio_activity_acitivity_id AND studio_id=$studio_id ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $bundle_config_id = $results1[0]->bundle_config_id;
        
        
        
        $sql_check = "SELECT bundle_config_id FROM bundle_settings WHERE activity_name='$bundle_settings' AND bundle_config_id != $bundle_config_id ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();


    }

    function check_bundle_settings_add($bundle_settings) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql_check = "SELECT bundle_config_id FROM bundle_settings WHERE activity_name='$bundle_settings' ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }

    function check_activity_class_type_add($bundle_settings) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql = "SELECT bundle_config_id FROM bundle_settings WHERE activity_name='$bundle_settings' ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $bundle_config_id = $results1[0]->bundle_config_id;


        $sql_check = "SELECT bundle_config_id FROM studio_activity WHERE bundle_config_id='$bundle_config_id' AND studio_id='$studio_id' ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }
    
     function get_all_activity(){  
        $sql = "SELECT * FROM bundle_settings";
        $query = $this->db->query($sql);
        return $query->result();
    }
    

    function get_bundle_settings($studio_id) {


        $sql = "SELECT a.activity_name,a.activity_description,a.bundle_config_id,sa.* FROM studio_activity sa ,bundle_settings a WHERE sa.bundle_config_id = a.bundle_config_id AND sa.studio_id=$studio_id  ORDER BY sa.studio_activity_acitivity_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function add_bundle_settings_class($data) {

        $studio_id = $this->session->userdata('studio_id');

        $this->db->insert($this->bundle_settings, $data);
        $insert_id = $this->db->insert_id();

        $sql = "INSERT INTO `studio_activity`( `studio_id`, `bundle_config_id`, `active_id`) VALUES ('$studio_id','$insert_id',1)";
        $this->db->query($sql);


        return $insert_id;
    }

    function add_bundle_settings_class_new($data) {

        $this->db->insert($this->studio_activity, $data);
    }

    function add_bundle_settings_new($data) {

        $this->db->insert($this->bundle_settings, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_bundle_settings_class($activity_name,$activity_description,$studio_activity_acitivity_id) {
        
        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
         $sql = "SELECT bundle_config_id FROM studio_activity WHERE studio_activity_acitivity_id=$studio_activity_acitivity_id AND studio_id=$studio_id ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $bundle_config_id = $results1[0]->bundle_config_id;
          $sql1 = "UPDATE `bundle_settings` SET `activity_name`='$activity_name',`activity_description`='$activity_description',`modified_date`='$time_stamp',`created_date`='$time_stamp' WHERE bundle_config_id='$bundle_config_id'";
                $this->db->query($sql1);
            
       
    }

    public function update_bundle_settings_class_new($insert_id, $id) {

        $studio_id = $this->session->userdata('studio_id'); 
        $sql1 = "UPDATE `studio_activity` SET `studio_id`='$studio_id',`bundle_config_id`='$insert_id',`active_id`=1 WHERE studio_activity_acitivity_id='$id'";
        $this->db->query($sql1);
    }
    
    function select_class_id($studio_id,$bundle_config_id) {

        $sql = "SELECT studio_classes_class_id FROM studio_classes WHERE bundle_config_id = $bundle_config_id AND studio_id=$studio_id  ORDER BY studio_classes_class_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
    function select_class($bundle_config_id){  
        $sql = "SELECT studio_classes_class_id FROM studio_classes WHERE bundle_config_id = $bundle_config_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    

}

?>
<?php

class activity_type_m extends CI_Model {

    var $activity_type = 'activity_type';
    var $studio_activity = 'studio_activity';
        var $studio_classes = 'studio_classes';
 var $class_info = 'class_info';
        var $class_booking = 'class_booking';


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    function get_all_activity_type() {

        $query = $this->db->order_by('activity_id', 'desc')->get_where($this->activity_type, array('status' => 1));
        return $query->result();
    }

    function add_activity_type($data) {
        $this->db->insert($this->activity_type, $data);

        return $this->db->insert_id();
    }

    function get_activity_types($activity_id) {
        $result = $this->db->get_where($this->activity_type, array('activity_id' => $activity_id));
        return $result->row();
    }
    

    
    function get_activity_type_studio($studio_activity_acitivity_id) {
        $studio_id = $this->session->userdata('studio_id');
        $sql = "SELECT sa.studio_activity_acitivity_id,sa.studio_id,sa.activity_id,a.activity_name,a.activity_description,a.activity_id FROM studio_activity sa ,activity_type a WHERE sa.activity_id = a.activity_id AND sa.studio_activity_acitivity_id=$studio_activity_acitivity_id AND sa.studio_id=$studio_id  ORDER BY sa.studio_activity_acitivity_id  DESC";

        $result = $this->db->query($sql);
        return $result->row();
    }

    function update_activity_type($data, $id) {
        $this->db->where('activity_id', $id);
        $this->db->update($this->activity_type, $data);
    }

    function check_activity_type($activity_id, $id) {

        $result = $this->db->get_where($this->activity_type, array('activity_name' => $activity_id, 'activity_id !=' => $id));
        return $result->row();
    }

    function check_activity_type_class($activity_type, $studio_activity_acitivity_id) {
        
        
        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
      $sql = "SELECT activity_id FROM studio_activity WHERE studio_activity_acitivity_id=$studio_activity_acitivity_id AND studio_id=$studio_id ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $activity_id = $results1[0]->activity_id;
        
        
        
        $sql_check = "SELECT activity_id FROM activity_type WHERE activity_name='$activity_type' AND activity_id != $activity_id ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();


    }

    function check_activity_type_add($activity_type) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql_check = "SELECT activity_id FROM activity_type WHERE activity_name='$activity_type' ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }

    function check_activity_class_type_add($activity_type) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql = "SELECT activity_id FROM activity_type WHERE activity_name='$activity_type' ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $activity_id = $results1[0]->activity_id;


        $sql_check = "SELECT activity_id FROM studio_activity WHERE activity_id='$activity_id' AND studio_id='$studio_id' ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }
    
     function get_all_activity(){  
        $sql = "SELECT * FROM activity_type";
        $query = $this->db->query($sql);
        return $query->result();
    }
    

    function get_activity_type($studio_id) {


        $sql = "SELECT a.activity_name,a.activity_description,a.activity_id,sa.* FROM studio_activity sa ,activity_type a WHERE sa.activity_id = a.activity_id AND sa.studio_id=$studio_id  ORDER BY sa.studio_activity_acitivity_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function add_activity_type_class($data) {

        $studio_id = $this->session->userdata('studio_id');

        $this->db->insert($this->activity_type, $data);
        $insert_id = $this->db->insert_id();

        $sql = "INSERT INTO `studio_activity`( `studio_id`, `activity_id`, `active_id`) VALUES ('$studio_id','$insert_id',1)";
        $this->db->query($sql);


        return $insert_id;
    }

    function add_activity_type_class_new($data) {

        $this->db->insert($this->studio_activity, $data);
    }

    function add_activity_type_new($data) {

        $this->db->insert($this->activity_type, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_activity_type_class($activity_name,$activity_description,$studio_activity_acitivity_id) {
        
        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
         $sql = "SELECT activity_id FROM studio_activity WHERE studio_activity_acitivity_id=$studio_activity_acitivity_id AND studio_id=$studio_id ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $activity_id = $results1[0]->activity_id;
          $sql1 = "UPDATE `activity_type` SET `activity_name`='$activity_name',`activity_description`='$activity_description',`modified_date`='$time_stamp',`created_date`='$time_stamp' WHERE activity_id='$activity_id'";
                $this->db->query($sql1);
            
       
    }

    public function update_activity_type_class_new($insert_id, $id) {

        $studio_id = $this->session->userdata('studio_id'); 
        $sql1 = "UPDATE `studio_activity` SET `studio_id`='$studio_id',`activity_id`='$insert_id',`active_id`=1 WHERE studio_activity_acitivity_id='$id'";
        $this->db->query($sql1);
    }
    
    function select_class_id($studio_id,$activity_id) {

        $sql = "SELECT studio_classes_class_id FROM studio_classes WHERE activity_id = $activity_id AND studio_id=$studio_id  ORDER BY studio_classes_class_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
    function select_class($activity_id){
        
        $sql = "SELECT studio_classes_class_id FROM studio_classes WHERE activity_id = $activity_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    

}

?>
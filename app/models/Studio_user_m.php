<?php
class studio_user_m extends CI_Model {

    var $studio_user = 'studio_user';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
    function get_all_studio_user() {
        $sql = "SELECT L.*,SU.*,S.studio_name FROM login L , studio_user SU , studio S  WHERE L.id = SU.user_id AND L.admin_groups_id = 2 AND SU.studio_id = S.studio_id ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_studio(){   
       $query = $this->db->get_where('studio',array('status'=>1));
       return $query->result();   
    }
            

    function add_studio_user($data){  
        $this->db->insert('login', $data);
        return $this->db->insert_id();
    }
    
    
    function add_studio_users($data1){  
        $this->db->insert('studio_user', $data1);
        return TRUE;
    }
    

    function get_studio_users($id) {
        $result = $this->db->get_where('login', array('id'=>$id));
        return $result->row();
    }
    
    
    
    function studio_users($id){
        
        $result = $this->db->get_where('studio_user', array('user_id'=>$id));
        return $result->result();
    }
    

    
    function get_studio_user_studio($studio_activity_acitivity_id) {
        $studio_id = $this->session->userdata('studio_id');
        $sql = "SELECT sa.studio_activity_acitivity_id,sa.studio_id,sa.activity_id,a.activity_name,a.activity_description,a.activity_id FROM studio_activity sa ,studio_user a WHERE sa.activity_id = a.activity_id AND sa.studio_activity_acitivity_id=$studio_activity_acitivity_id AND sa.studio_id=$studio_id  ORDER BY sa.studio_activity_acitivity_id  DESC";

        $result = $this->db->query($sql);
        return $result->row();
    }

    function update_studio_user($data, $id){
        $this->db->where('id', $id);
        $this->db->update('login', $data);
    }
    
    
    function check_user($username){
        
        $result = $this->db->get_where('login',array('username'=>$username));
        return $result->row();
    }

    function check_studio_user($username, $id) {

        $result = $this->db->get_where('login', array('username' => $username, 'id !=' => $id));
        return $result->row();
    }

    function check_studio_user_class($studio_user, $studio_activity_acitivity_id) {
        
        
        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
      $sql = "SELECT activity_id FROM studio_activity WHERE studio_activity_acitivity_id=$studio_activity_acitivity_id AND studio_id=$studio_id ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $activity_id = $results1[0]->activity_id;
        
        
        
        $sql_check = "SELECT activity_id FROM studio_user WHERE activity_name='$studio_user' AND activity_id != $activity_id ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();


    }

    function check_studio_user_add($studio_user) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql_check = "SELECT activity_id FROM studio_user WHERE activity_name='$studio_user' ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }

    function check_activity_class_type_add($studio_user) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql = "SELECT activity_id FROM studio_user WHERE activity_name='$studio_user' ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $activity_id = $results1[0]->activity_id;


        $sql_check = "SELECT activity_id FROM studio_activity WHERE activity_id='$activity_id' AND studio_id='$studio_id' ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }
    
     function get_all_activity(){  
        $sql = "SELECT * FROM studio_user";
        $query = $this->db->query($sql);
        return $query->result();
    }
    

    function get_studio_user($studio_id) {

        $sql = "SELECT a.activity_name,a.activity_description,a.activity_id,sa.* FROM studio_activity sa ,studio_user a WHERE sa.activity_id = a.activity_id AND sa.studio_id=$studio_id  ORDER BY sa.studio_activity_acitivity_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
        
    }

    function add_studio_user_class($data) {

        $studio_id = $this->session->userdata('studio_id');

        $this->db->insert($this->studio_user, $data);
        $insert_id = $this->db->insert_id();

        $sql = "INSERT INTO `studio_activity`( `studio_id`, `activity_id`, `active_id`) VALUES ('$studio_id','$insert_id',1)";
        $this->db->query($sql);


        return $insert_id;
    }

    function add_studio_user_class_new($data) {

        $this->db->insert($this->studio_activity, $data);
    }

    function add_studio_user_new($data) {

        $this->db->insert($this->studio_user, $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    function update_studio_user_class($activity_name,$activity_description,$studio_activity_acitivity_id) {
        
        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
         $sql = "SELECT activity_id FROM studio_activity WHERE studio_activity_acitivity_id=$studio_activity_acitivity_id AND studio_id=$studio_id ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $activity_id = $results1[0]->activity_id;
          $sql1 = "UPDATE `studio_user` SET `activity_name`='$activity_name',`activity_description`='$activity_description',`modified_date`='$time_stamp',`created_date`='$time_stamp' WHERE activity_id='$activity_id'";
                $this->db->query($sql1);
            
       
    }

    public function update_studio_user_class_new($insert_id, $id) {

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
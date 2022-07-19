<?php

class studio_classes_m extends CI_Model{

    var $studio_classes = 'studio_classes';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }

    function get_all_studio_classes(){

        $sql =  "SELECT a.activity_name,sc.*,ci.*,i.*,l.*,s.*,sc.status as stat FROM studio_classes sc , activity_type a , class_info ci , instructor i , class_level l , studio s WHERE sc.activity_id = a.activity_id AND sc.studio_id= s.studio_id AND sc.studio_classes_class_id = ci.class_id AND ci.instructor_id = i.instructor_id AND ci.level_id = l.level_id ORDER BY sc.studio_classes_class_id  DESC";      
        $query = $this->db->query($sql);
        return $query->result();
        
    }
     function get_studio_details($studio_id){

        $sql =  "SELECT a.activity_name,sc.*,ci.*,i.*,l.*,sc.status as stat FROM studio_classes sc , activity_type a , class_info ci , instructor i , class_level l WHERE sc.activity_id = a.activity_id AND sc.studio_id=$studio_id AND sc.studio_classes_class_id = ci.class_id AND ci.instructor_id = i.instructor_id AND ci.level_id = l.level_id ORDER BY sc.studio_classes_class_id  DESC";      
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    function get_studio_instructor($studio_id){

        $sql =  "SELECT si.studio_id,si.instructor_id,i.* FROM studio_instructor si , instructor i WHERE si.instructor_id = i.instructor_id AND si.studio_id=$studio_id  ORDER BY si.studio_instructor_id  DESC";      
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    function get_studio_class_location($studio_id){

        $sql =  "SELECT sl.studio_id,sl.location_id,l.location_id,l.location_name,s.* FROM studio_location sl , studio s,locations l WHERE sl.location_id = l.location_id AND sl.studio_id=s.studio_id AND s.studio_id=$studio_id  ORDER BY s.studio_id  DESC";      
        $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    
      function get_all_studio(){
          
        $result = $this->db->get_where('studio', array('status' => 1));
        return $result->result();
        
    }
    
     function get_more_studio_classes($id){
        $query = $this->db->get_where('studio_classes_images',array('studio_classes_id_fk'=>$id));
        return $query->result();
    }
    
    

    function add_studio_classes($data){
        $this->db->insert($this->studio_classes, $data);
        return $this->db->insert_id();
    }
    
    
   function add_studio_classes_details($data){
        $this->db->insert('class_info', $data);
        return $this->db->insert_id();
    }
    

    function get_studio_classess($studio_classes_id) {
        $result = $this->db->get_where($this->studio_classes, array('studio_classes_class_id' => $studio_classes_id));
        return $result->row();
    }

    function update_studio_classes($data, $id) {
        $this->db->where('studio_classes_class_id', $id);
        $this->db->update($this->studio_classes, $data);
    }
    
    
    function update_studio_class_details($data, $id) {
        $this->db->where('class_id', $id);
        $this->db->update('class_info', $data);
    }
    
    
    
    function get_all_activity($studio_id){  
        $sql = "SELECT * FROM activity_type WHERE activity_id IN ( SELECT activity_id FROM studio_activity WHERE studio_id = $studio_id)";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_studio_class($studio_id){     
       $sql = "SELECT SC.*,CI.* FROM studio_classes SC , class_info CI WHERE SC.studio_classes_class_id = CI.class_id AND SC.studio_classes_class_id = $studio_id";
       $query = $this->db->query($sql);
       return $query->row();   
    }
    
    function get_all_instructor($studio_id){
        
        $sql = "SELECT * FROM instructor WHERE instructor_id IN ( SELECT instructor_id FROM studio_instructor WHERE studio_id = $studio_id)";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_all_level(){
        
        $sql = "SELECT * FROM class_level WHERE status = 1";
        $query = $this->db->query($sql);
        return $query->result();  
    }
    
    function check_class($classes_name,$activity_id,$date,$start_time,$end_time,$studio_id){ 
         $sql = "SELECT studio_classes_class_id  FROM `studio_classes` WHERE `studio_classes_name` LIKE '$classes_name' AND `studio_id` = $studio_id AND `activity_id` = '$activity_id' AND `date` = '$date' AND `start_time` = '$start_time' AND `end_time` = '$end_time'";
         $query = $this->db->query($sql);
         return $query->row();
    }
    
    function canceled($data,$class_id){
        
        $this->db->where('studio_classes_class_id',$class_id);
        $this->db->update('studio_classes', $data);
        return TRUE;
    }
    
    function get_class_user($class_id){
        
      $date = date('Y-m-d');
      //$sql= "SELECT CB.bundle_id,CB.user_id,class_id FROM class_booking CB ,  WHERE CB.bundle_id IN ( SELECT bundle_id FROM  bundle_booking_studios BS WHERE BS.bundle_booking_id = CB.bundle_id AND BS.valid_till >= '$date')"; 
      //$sql = "SELECT DISTINCT UD.device_id FROM class_booking CB , user_details UD WHERE CB.user_id = UD.user_id";   
   
      
      $sql = "SELECT  UD.device_id,UD.device_type FROM  user_details UD WHERE UD.user_id IN ( SELECT CB.user_id FROM class_booking CB  WHERE  CB.class_id = $class_id AND CB.class_status = 'Y')";
      $query = $this->db->query($sql);
      
      $this->db->query("UPDATE class_booking SET class_status = 'N' WHERE class_id = $class_id");
      
      $this->db->select('studio_id,user_id,bundle_id');
      $result = $this->db->get_where('class_booking',array('class_id'=>$class_id))->result();
      
      if(!empty($result)){
          
        foreach ($result as $res){
              
        $sql1 = "UPDATE bundle_booking_studios SET number_of_classes_availed = number_of_classes_availed+1 WHERE studio_id = $res->studio_id AND bundle_booking_id =$res->bundle_id AND user_id = $res->user_id";
        $this->db->query($sql1);      
              
        }
          
      }  
      
        
      
     // $this->db->query("DELETE FROM class_booking WHERE class_id = $class_id");
      return $query->result();
      
    }
    
    
    
    public function Checkcurrentstatus($class_id){
        
      $this->db->select('studio_classes_class_id,status');
      $result = $this->db->get_where('studio_classes',array('studio_classes_class_id'=>$class_id))->row();
      return $result;
        
             
    }
    
    public function get_class_master(){
      $this->db->select('class_name');
      $result = $this->db->get_where('class_master',array('status'=>1))->result();
      return $result;
    }
    
    public function get_classes_details($classes_names){
        
      $result = $this->db->get_where('class_master',array('class_name'=>$classes_names,'status'=>1))->row();
      return $result;
        
    }
    
}?>
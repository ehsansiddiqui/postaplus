<?php

class instructor_m extends CI_Model {

    var $instructor = 'instructor';
    var $studio_instructor = 'studio_instructor';

    public function __construct() {
        
        parent::__construct();
        $this->load->database();
    }
    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }
    
     function get_instructors() {

        $sql = "SELECT * FROM instructor ORDER BY instructor_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_studio_instructor($studio_id) {

        $sql = "SELECT si.studio_instructor_id,si.studio_id,si.instructor_id,i.* FROM studio_instructor si , instructor i WHERE si.instructor_id = i.instructor_id AND si.studio_id=$studio_id  ORDER BY si.studio_instructor_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
     function check_instructor($instructor_email,$instructor_phone) {
       
        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql_check = "SELECT instructor_id FROM instructor WHERE instructor_email='$instructor_email' AND instructor_phone='$instructor_phone'";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
        
    }
    

    function check_instructor_studio($instructor_email,$instructor_phone) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql = "SELECT instructor_id FROM instructor WHERE instructor_email='$instructor_email' AND instructor_phone='$instructor_phone'";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $instructor_id = $results1[0]->instructor_id;


        $sql_check = "SELECT instructor_id FROM studio_instructor WHERE instructor_id='$instructor_id' AND studio_id='$studio_id' ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }
function get_instructor_studio($studio_instructor_id) {
        $studio_id = $this->session->userdata('studio_id');
        $sql = "SELECT si.*,i.* FROM studio_instructor si ,instructor i WHERE si.instructor_id = i.instructor_id AND si.studio_instructor_id=$studio_instructor_id AND si.studio_id=$studio_id";

        $result = $this->db->query($sql);
        return $result->row();
    }
     function get_instructor($instructor_id) {
        $result = $this->db->get_where($this->instructor, array('instructor_id' => $instructor_id));
        return $result->row();
    }

    function get_studio_class_location($studio_id) {

        $sql = "SELECT sl.studio_id,sl.location_id,l.location_id,l.location_name,s.* FROM studio_location sl , studio s,locations l WHERE sl.location_id = l.location_id AND sl.studio_id=s.studio_id AND s.studio_id=$studio_id  ORDER BY s.studio_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function edit_studio_class_location($instructor_id) {
        $result = $this->db->get_where($this->instructor, array('instructor_id' => $instructor_id));
        return $result->row();
    }

   
    public function update_studio_class_instructor($instructor_name,$instructor_email,$instructor_phone,$instructor_experinece,$instructor_description,$instructor_price_per_hour,$studio_instructor_id) {
                $studio_id = $this->session->userdata('studio_id');

         $sql = "SELECT instructor_id FROM studio_instructor WHERE studio_instructor_id=$studio_instructor_id AND studio_id=$studio_id ";
        $result = $this->db->query($sql);
        $results1 = $result->result();
        $instructor_id = $results1[0]->instructor_id;
        $sql1 = "UPDATE `instructor` SET `instructor_name`='$instructor_name',`instructor_email`='$instructor_email',`instructor_phone`='$instructor_phone',`instructor_experinece`='$instructor_experinece',`instructor_description`='$instructor_description',`instructor_price_per_hour`='$instructor_price_per_hour' WHERE instructor_id='$instructor_id'";
                $this->db->query($sql1);
    }

    
    public function insert_studio_class_instructor($data){
        //check if duplicate exist
        $this->db->insert($this->instructor, $data);
        $instructor_id = $this->db->insert_id();
        if ($this->db->insert_id()) {
            $data1 = array('studio_id' => $this->session->userdata('studio_id'), 'instructor_id' => $this->db->insert_id());
            $this->db->insert($this->studio_instructor, $data1);
        }
        return $instructor_id;
    }
    
     public function insert_instructor($data){
        //check if duplicate exist
        $this->db->insert($this->instructor, $data);
        $instructor_id = $this->db->insert_id();
        
        return $instructor_id;
    }
    
     public function update_instructor($instructor_name,$instructor_email,$instructor_phone,$instructor_experinece,$instructor_description,$instructor_price_per_hour,$instructor_id) {
              

         
        $sql1 = "UPDATE `instructor` SET `instructor_name`='$instructor_name',`instructor_email`='$instructor_email',`instructor_phone`='$instructor_phone',`instructor_experinece`='$instructor_experinece',`instructor_description`='$instructor_description',`instructor_price_per_hour`='$instructor_price_per_hour' WHERE instructor_id='$instructor_id'";
                $this->db->query($sql1);
    }

    public function disable_image($instructor_id){
         $sql ="UPDATE `instructor` SET `instructor_image`='' WHERE instructor_id='$instructor_id'";
         $this->db->query($sql);
    }
    function add_studio_class_new($data) {

        $this->db->insert($this->studio_instructor, $data);
    }
    
    
    public function selectclass($instructor_id){
        $result = $this->db->get_where('class_info', array('instructor_id' => $instructor_id));
        return $result->result();
    }
    
    
}?>
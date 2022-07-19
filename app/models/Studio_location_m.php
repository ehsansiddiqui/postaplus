<?php

class studio_location_m extends CI_Model {

    var $locations = 'locations';
    var $studio_location = 'studio_location';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function escapeString($val) {
        $db = get_instance()->db->conn_id;
        $val = mysqli_real_escape_string($db, $val);
        return $val;
    }

    function get_studio_instructor($studio_id) {

        $sql = "SELECT si.studio_id,si.instructor_id,i.* FROM studio_instructor si , instructor i WHERE si.instructor_id = i.instructor_id AND si.studio_id=$studio_id  ORDER BY si.studio_instructor_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_locations() {
        $result = $this->db->get_where('locations', array('status' => 1));
        return $result->result();
    }
     function get_location_use($location_id) {
        $result = $this->db->get_where('locations', array('location_id' => $location_id));
        return $result->result();
    }
    function get_places() {
                $studio_id = $this->session->userdata('studio_id');

        $result = $this->db->get_where('studio_location', array('studio_id' => $studio_id));
        return $result->result();
    }
    
     function check_location($location_name) {
       
        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql_check = "SELECT location_id FROM locations WHERE location_name='$location_name' ";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
        
    }
     function check_location_use($location_name, $location_id) {
        $sql_check = "SELECT location_id FROM locations WHERE location_name='$location_name' AND location_id != $location_id";
   $result1 = $this->db->query($sql_check);
        return $result1->result();
        
    }


    function get_location($studio_location_id) {
        $studio_id = $this->session->userdata('studio_id');

        $sql = "SELECT sl.studio_location_id,sl.studio_id,sl.location_id,sl.studio_Latitude,sl.studio_Longitude,sl.place,sl.phone_number,l.location_id,l.location_name FROM studio_location sl ,locations l WHERE sl.location_id = l.location_id AND sl.studio_location_id=$studio_location_id AND sl.studio_id=$studio_id  ORDER BY sl.studio_id  DESC";

        $result = $this->db->query($sql);
        return $result->row();
    }

//     function get_location($location_id,$studio_id) {
//         $sql = "SELECT sl.studio_id,sl.location_id,l.location_id,l.location_name FROM studio_location sl ,locations l WHERE sl.location_id = l.location_id AND sl.studio_id=$studio_id AND sl.location_id=$location_id ORDER BY sl.studio_id  DESC";
//        $result = $this->db->query($sql);
//        return $result->row();
//    }

    function get_studio_class_location($studio_id) {

        $sql = "SELECT sl.studio_location_id,sl.studio_id,sl.location_id,sl.studio_Latitude,sl.studio_Longitude,sl.place,sl.phone_number,l.location_id,l.location_name FROM studio_location sl ,locations l WHERE sl.location_id = l.location_id AND sl.studio_id=$studio_id  ORDER BY sl.studio_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
    function get_main_locations() {

        $sql = "SELECT * FROM locations ORDER BY location_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_location_info($location_id) {

        $sql = "SELECT s.studio_name,sl.studio_location_id,sl.studio_id,sl.location_id,sl.studio_Latitude,sl.studio_Longitude,sl.place,l.location_id,l.location_name FROM studio_location sl ,locations l,studio s WHERE sl.location_id = l.location_id AND sl.studio_id=s.studio_id AND l.location_id=$location_id  ORDER BY s.studio_id  DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    

    public function edit_studio_class_location($location_id) {
        $studio_id = $this->session->userdata('studio_id');

        $sql = "SELECT sl.studio_location_id,sl.studio_id,sl.location_id,sl.studio_Latitude,sl.studio_Longitude,sl.place,sl.phone_number,l.location_id,l.location_name FROM studio_location sl ,locations l WHERE sl.location_id = l.location_id AND l.location_id=$location_id AND sl.studio_id=$studio_id  ORDER BY sl.studio_id  DESC";

        $result = $this->db->query($sql);
        return $result->row();
    }

    public function update_studio_class_location($studio_location_id, $location_name, $studio_Latitude, $studio_Longitude, $place,$phone_number) {


        $studio_id = $this->session->userdata('studio_id');
         $sql_check = "SELECT `location_id` FROM `locations` WHERE `location_name` = '$location_name'";
        $result = $this->db->query($sql_check);
        $results1 = $result->result();
        $location_id=$results1[0]->location_id;


        $sql1 = "UPDATE `studio_location` SET `location_id`='$location_id',`studio_Latitude`='$studio_Latitude',`studio_Longitude`='$studio_Longitude',`place`='$place',phone_number = '$phone_number' WHERE studio_location_id='$studio_location_id' AND studio_id='$studio_id'";

        $this->db->query($sql1);
    }

    public function insert_studio_class_location($location_name,$place, $studio_Latitude, $studio_Longitude,$phone_number) {
        //check if duplicate exist
        $time_stamp = date("Y-m-d H:i:s");
        $studio_id = $this->session->userdata('studio_id');
        $sql_check = "SELECT `location_id` FROM `locations` WHERE `location_name` = '$location_name'";
        $result = $this->db->query($sql_check);
        $results1 = $result->result();
        $location_id=$results1[0]->location_id;



        $sql = "INSERT INTO `studio_location`( `studio_id`, `location_id`, `place`,`studio_Latitude`,`studio_Longitude`,phone_number) VALUES ('$studio_id','$location_id','$place','$studio_Latitude','$studio_Longitude','$phone_number')";
        $this->db->query($sql);
        $studio_location_id = $this->db->insert_id();

        return $studio_location_id;
    }
     public function insert_location($location_name,$lat,$lng) {
        //check if duplicate exist
        $time_stamp = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO `locations`( `location_name`,`locations_latitude`,`location_longitude`, `created_date`, `status`) VALUES ('$location_name','$lat','$lng','$time_stamp',1)";
        $this->db->query($sql);
        $location_id = $this->db->insert_id();

        return $location_id;
     }
     
     public function update_location($location_name,$lat,$lng,$location_id) {

        $time_stamp = date("Y-m-d H:i:s");
        $sql1 = "UPDATE `locations` SET `location_name`='$location_name',`locations_latitude`='$lat', `location_longitude`='$lng' ,`modified_date`='$time_stamp' WHERE location_id='$location_id'";
        $this->db->query($sql1);
    }
     function check_location_add($studio_Latitude,$studio_Longitude,$studio_location_id) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql_check = "SELECT studio_location_id FROM studio_location WHERE studio_Latitude='$studio_Latitude'AND studio_Longitude='$studio_Longitude' AND studio_id=$studio_id AND studio_location_id != $studio_location_id";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }
    
    
      function check_location_adds($studio_Latitude,$studio_Longitude) {

        $studio_id = $this->session->userdata('studio_id');
        $time_stamp = date("Y-m-d H:i:s");
        $sql_check = "SELECT studio_location_id FROM studio_location WHERE studio_Latitude='$studio_Latitude'AND studio_Longitude='$studio_Longitude' AND studio_id=$studio_id";
        $result1 = $this->db->query($sql_check);
        return $result1->result();
    }

    
    function get_locations_studio($studio_id) {


        $sql = "SELECT place,studio_Latitude,studio_Longitude FROM studio_location WHERE studio_id=$studio_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
}

?>
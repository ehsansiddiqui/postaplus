<?php

class booking_m extends CI_Model {

    var $bundle_booking_studios = 'bundle_booking_studios';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_package_booking() {

        $sql = "SELECT * FROM package_booking ORDER BY package_booking_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

   

    function get_instructor_booking() {

        $sql = "SELECT * FROM instructor_booking ORDER BY instrcuctor_booking_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_bundle_booking() {
        
        
        $sql = " SELECT DISTINCT s.studio_name,bb.bundle_booking_id,bb.total_number_class,bb.total_class_availed,bb.valid_till,bb.user_id,bb.total_amount,bb.payment_status,bbs.user_id,bbs.studio_id,ud.first_name,ud.email_id,ud.phone_number FROM studio s,bundle_booking bb,bundle_booking_studios bbs,user_details ud WHERE bb.bundle_booking_id=bbs.bundle_booking_id AND bbs.user_id=ud.user_id AND bbs.studio_id=s.studio_id AND bb.payment_status='paid' ORDER BY bb.bundle_booking_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_package_booking_per_studio($studio_id) {

        $sql = "SELECT * FROM package_booking WHERE studio_id=$studio_id ORDER BY package_booking_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
     function get_class_booking() {

        $sql = "SELECT s.studio_name,cb.class_status , at.activity_name, cl.level_name, i.instructor_name, ci.description, ci.class_latitude, ci.class_longitude,ud.first_name,sc.date FROM class_booking cb,class_info ci,user_details ud,instructor i,class_level cl,activity_type at,studio_classes sc,studio s WHERE cb.class_id=ci.class_id AND sc.studio_classes_class_id=cb.class_id AND sc.activity_id=at.activity_id AND ci.instructor_id=i.instructor_id AND ci.level_id=cl.level_id AND cb.user_id=ud.user_id AND cb.studio_id=s.studio_id  ORDER BY cb.class_booking_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_class_booking_per_studio($studio_id) {

        $sql = "SELECT cb.class_status , at.activity_name, cl.level_name, i.instructor_name, ci.description, ci.class_latitude, ci.class_longitude,ud.first_name,sc.date FROM class_booking cb,class_info ci,user_details ud,instructor i,class_level cl,activity_type at,studio_classes sc WHERE cb.class_id=ci.class_id AND sc.studio_classes_class_id=cb.class_id AND sc.activity_id=at.activity_id AND ci.instructor_id=i.instructor_id AND ci.level_id=cl.level_id AND cb.user_id=ud.user_id AND cb.studio_id=$studio_id ORDER BY cb.class_booking_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_instructor_booking_per_studio($studio_id) {

        $sql = "SELECT * FROM instructor_booking WHERE studio_id=$studio_id ORDER BY instrcuctor_booking_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_bundle_booking_per_studio($studio_id) {
        $sql = "SELECT DISTINCT bb.bundle_booking_id,bb.total_number_class,bb.total_class_availed,bb.valid_till,bb.user_id,bb.total_amount,bb.payment_status,bbs.user_id,bbs.studio_id,ud.first_name,ud.user_image,ud.email_id,ud.fb_email,ud.phone_number,ud.contact_number FROM bundle_booking bb,bundle_booking_studios bbs,user_details ud WHERE bb.bundle_booking_id=bbs.bundle_booking_id AND bbs.user_id=ud.user_id AND bbs.studio_id=$studio_id AND bb.payment_status='paid' ORDER BY bb.bundle_booking_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_details_bundle_studio($bundle_booking_id) {
        $studio_id = $this->session->userdata('studio_id');
        $sql = "SELECT bb.bundle_booking_id,bbs.*,ud.first_name,ud.user_image,ud.phone_number FROM bundle_booking bb,bundle_booking_studios bbs,user_details ud WHERE bbs.user_id=ud.user_id AND bbs.studio_id=$studio_id AND bb.bundle_booking_id=bbs.bundle_booking_id AND bb.bundle_booking_id=$bundle_booking_id ORDER BY bbs.bundle_booking_studio_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_bundle_booking_studios() {
        $sql = "SELECT * FROM bundle_booking_studios ORDER BY bundle_booking_studio_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function sort_by_date($start_date,$end_date,$studio_id) {

        $sql = "SELECT cb.class_status , at.activity_name, cl.level_name, i.instructor_name, ci.description, ci.class_latitude, ci.class_longitude,ud.first_name,sc.date FROM class_booking cb,class_info ci,user_details ud,instructor i,class_level cl,activity_type at,studio_classes sc  WHERE sc.date >= '$start_date' and sc.date <= '$end_date' AND cb.class_id=ci.class_id AND sc.studio_classes_class_id=cb.class_id AND sc.activity_id=at.activity_id AND ci.instructor_id=i.instructor_id AND ci.level_id=cl.level_id AND cb.user_id=ud.user_id AND cb.studio_id=$studio_id ORDER BY cb.class_booking_id DESC";
        $query = $this->db->query($sql);

        return $query->result();
    }

}

?>
<?php

class Booking extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('booking_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
         if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
        }
         
    }

    function package_booking() {

        $data['result'] = $this->Obj_Track_Type_M->get_package_booking();
        $this->layout->view('package_booking_v', $data);
    }

    function class_booking() {

        $data['result'] = $this->Obj_Track_Type_M->get_class_booking();
        $this->layout->view('class_booking_v', $data);
    }

    function instructor_booking() {

        $data['result'] = $this->Obj_Track_Type_M->get_instructor_booking();
        $this->layout->view('instructor_booking_v', $data);
    }

    function bundle_booking() {

        $data['result'] = $this->Obj_Track_Type_M->get_bundle_booking();
        $this->layout->view('bundle_booking_v', $data);
    }
 function package_booking_per_studio() {

        $data['result'] = $this->Obj_Track_Type_M->get_package_booking_per_studio($this->session->userdata('studio_id'));
        $this->layout->view('package_booking_studio', $data);
    }

    function class_booking_per_studio() {

        $data['result'] = $this->Obj_Track_Type_M->get_class_booking_per_studio($this->session->userdata('studio_id'));
        $this->layout->view('class_booking_studio', $data);
    }

    function instructor_booking_per_studio() {

        $data['result'] = $this->Obj_Track_Type_M->get_instructor_booking_per_studio($this->session->userdata('studio_id'));
        $this->layout->view('instructor_booking_studio', $data);
    }

    function bundle_booking_per_studio() {

        $data['result'] = $this->Obj_Track_Type_M->get_bundle_booking_per_studio($this->session->userdata('studio_id'));
        $this->layout->view('bundle_booking_studio', $data);
    }
    function user_details_per_studio() {

        $data['result'] = $this->Obj_Track_Type_M->get_bundle_booking_per_studio($this->session->userdata('studio_id'));
        $this->layout->view('bundle_booking_studio', $data);
    }
    
    public function view_bundle_studio($bundle_booking_id = '') {
        $data['result'] = $this->Obj_Track_Type_M->get_details_bundle_studio($bundle_booking_id);
        $data['bundle_booking_id'] = $bundle_booking_id;
        $this->layout->view('view_bundle_studio', $data);
    }

    
    function bundle_booking_studios() {

        $data['result'] = $this->Obj_Track_Type_M->get_bundle_booking_studios();
        $this->layout->view('bundle_booking_studios_v', $data);
    }
    
    public function sort_by_date() {
        
           if ($this->input->post('submit')) {
             $start_date =   date('Y-m-d', strtotime($this->input->post('start_date'))); 
             $end_date =   date('Y-m-d', strtotime($this->input->post('end_date')));
             $data['start_date']=$start_date ;
             $data['end_date']=  $end_date;
             $data['result'] = $this->Obj_Track_Type_M->sort_by_date($start_date,$end_date,$this->session->userdata('studio_id'));
             $this->layout->view('class_booking_studio', $data);
           }
          
                
    }

}

?>
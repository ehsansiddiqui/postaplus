<?php

class Studio_location extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('studio_location_m', 'Obj_studio_location_m', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');

         if (!$this->session->userdata('id') && !$this->session->userdata('su_id')) {
            redirect('login/index');
        }
    }

    function index() {
        $data['result'] = $this->Obj_studio_location_m->get_all_instructors();
        $this->layout->view('studio_class_instructor', $data);
    }
    
     public function location() {

        $data = array();
        $data['result'] = $this->Obj_studio_location_m->get_main_locations();
        $this->layout->view('location', $data);
    }

    public function studio_class_location() {

        $data = array();
        $data['studio_location'] = $this->Obj_studio_location_m->get_locations_studio($this->session->userdata('studio_id'));
        $data['result'] = $this->Obj_studio_location_m->get_studio_class_location($this->session->userdata('studio_id'));
        $this->layout->view('studio_class_location', $data);
    }

    public function edit_studio_class_location($studio_location_id = '') {

        
         $data = array();
         $data['location'] = $this->Obj_studio_location_m->get_studio_class_location($this->session->userdata('studio_id'));
         $data['place'] = $this->Obj_studio_location_m->get_places();

        if ($studio_location_id == NULL) {
            $this->layout->view('add_studio_class_location', $data);
        } else {
            $data['result'] = $this->Obj_studio_location_m->get_location($studio_location_id);

            $data['studio_location_id'] = $studio_location_id;
            $this->layout->view('add_studio_class_location', $data);
        }
    }
     public function insert_studio_class_location() {
        
     $studio_id = $this->session->userdata('studio_id');

       
        $data = array();
        $data['location'] = $this->Obj_studio_location_m->get_locations();
        $data['place'] = $this->Obj_studio_location_m->get_places();

        $result = $this->Obj_studio_location_m->check_location_adds($this->input->post('lat'),$this->input->post('lng'));

            if (!empty($result)) {
               
                    $this->session->set_flashdata('message1', 'Already Exist');
                    redirect('studio_location/edit_studio_class_location');

                } else  {
                    
                    
        $location_name = $this->Obj_studio_location_m->escapeString($this->input->post('location_name'));
        $place = $this->Obj_studio_location_m->escapeString(htmlentities($this->input->post('place')));
        $studio_Latitude = $this->input->post('lat');
        $studio_Longitude = $this->input->post('lng');
        $phone_number = $this->input->post('phone_number');

        $this->Obj_studio_location_m->insert_studio_class_location($location_name,$place, $studio_Latitude, $studio_Longitude,$phone_number);
        $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('studio_location/studio_class_location');

                }
                
                
        $this->layout->view('add_studio_class_instructor', $location_name,$place, $studio_Latitude, $studio_Longitude);
    }

    function delete_studio_class_location($studio_location_id) {
        $this->db->delete('studio_location', array('studio_location_id' => $studio_location_id));

        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('studio_location/studio_class_location');
    }

    public function update_studio_class_location() {

        $studio_id = $this->session->userdata('studio_id');

        $data = array();
        $data['location'] = $this->Obj_studio_location_m->get_locations();
        $data['place'] = $this->Obj_studio_location_m->get_places();

        $result = $this->Obj_studio_location_m->check_location_add($this->input->post('lat'),$this->input->post('lng'),$this->input->post('studio_location_id'));

            if (!empty($result)) {
               
                    $this->session->set_flashdata('message1', 'Already Exist');
                    redirect('studio_location/edit_studio_class_location');

                } else  {
        $studio_location_id = $this->Obj_studio_location_m->escapeString($this->input->post('studio_location_id'));
        $location_name = $this->Obj_studio_location_m->escapeString($this->input->post('location_name'));
        $studio_Latitude = $this->Obj_studio_location_m->escapeString(htmlentities($this->input->post('lat')));
        $studio_Longitude = $this->Obj_studio_location_m->escapeString(htmlentities($this->input->post('lng')));
        $place = $this->Obj_studio_location_m->escapeString(htmlentities($this->input->post('place')));
        $phone_number = $this->input->post('phone_number');
        
        $this->Obj_studio_location_m->update_studio_class_location($studio_location_id, $location_name, $studio_Latitude, $studio_Longitude, $place,$phone_number);
        $this->session->set_flashdata('message', 'Updated Successfully');
        redirect('studio_location/studio_class_location');
                }
        $this->layout->view('add_studio_class_location', $studio_location_id, $location_name, $studio_Latitude, $studio_Longitude, $place);
        
      
    }


    
   
   
 public function insert_location(){
        
      $result1 = $this->Obj_studio_location_m->check_location($this->input->post('location_name'));
                if (!empty($result1)) {

                    $this->session->set_flashdata('message1', 'Already Exist');
                            redirect('studio_location/edit_location');

                } else{

       
        $location_name = $this->Obj_studio_location_m->escapeString(htmlspecialchars($this->input->post('location_name')));
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');
        $this->Obj_studio_location_m->insert_location($location_name,$lat,$lng);
        $this->session->set_flashdata('message', 'Inserted Successfully');       
        redirect('studio_location/location');
 }        
    }
    
    
    

    public function edit_location($location_id = '') {

        
         $data['result'] = $this->Obj_studio_location_m->get_location_use($location_id);
            $data['location_id'] = $location_id;
            $this->layout->view('add_location', $data);
        
    }
     public function location_info($location_id = '') {

        
         $data['result'] = $this->Obj_studio_location_m->get_location_info($location_id);
            $data['location_id'] = $location_id;
            $this->layout->view('location_details', $data);
        
    }
    

   
    function update_location($location_id = ''){

       if ($this->input->post('submit')){

            $result = $this->Obj_studio_location_m->check_location_use($this->input->post('location_name'),$location_id);

            if (!empty($result)) {
                $this->session->set_flashdata('message1', 'Already Exist');
              redirect('studio_location/edit_location');

            }  else {


       $location_name = $this->Obj_studio_location_m->escapeString($this->input->post('location_name'));
       $lat = $this->input->post('lat');
       $lng = $this->input->post('lng');
       $this->Obj_studio_location_m->update_location($location_name,$lat,$lng,$location_id);
       $this->session->set_flashdata('message', 'Updated Successfully');
       redirect('studio_location/location');
                
        
            }
        }
        $this->layout->view('add_location', $location_name);
    }

    
    

    function delete($location_id) {

        $this->db->delete('locations', array('location_id' => $location_id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('studio_location/location');

    } 
}
?>
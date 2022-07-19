<?php

class Studio extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('studio_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id') && !$this->session->userdata('studio_id')) {
            redirect('login/index');
        }
    }

    function index() {

        $data = array();
        $data['result'] = $this->Obj_Track_Type_M->get_all_studio();
        $this->layout->view('studio_v', $data);
    }

    public function studio_profile() {

        $data = array();
        $data['result'] = $this->Obj_Track_Type_M->get_studios($this->session->userdata('studio_id'));

        $data['studio_location'] = $this->Obj_Track_Type_M->get_locations_studios($this->session->userdata('studio_id'));

        $data['studio_timings'] = $this->Obj_Track_Type_M->get_timings_studio($this->session->userdata('studio_id'));

        $this->layout->view('studio_profile', $data);
    }

    function add() {

        if ($this->input->post('submit')) {
            $timing = $this->input->post('timing');
            $location_id = $this->input->post('location_id');
            $instructor_id = $this->input->post('instructor_id');
            $activity_id = $this->input->post('activity_id');



            if (!empty($timing) && !empty($location_id) && !empty($activity_id)) {


                $date = date('Y-m-d');
                $result = $this->Obj_Track_Type_M->check_studio($this->input->post('studio_name'));

                if (!empty($result)) {

                    $this->session->set_flashdata('message1', 'Already Exist');

                    redirect('studio');
                } else {

//                        $data = array('studio_name' => $this->input->post('studio_name'),
//                        'studio_address' => $this->input->post('studio_address'),
//                        'place' => $this->input->post('place'),
//                        'studio_latitude' => $this->input->post('lat'),
//                        'studio_longitude' => $this->input->post('lng'),
//                        'studio_bundle_price' => $this->input->post('studio_bundle_price'),
//                        'client_payout' => $this->input->post('client_payout'),
//                        'studio_description' => $this->input->post('studio_description'),
//                        'created_date' => $date, 'modified_date' => $date);


                    $cutoff_time = $this->input->post('cutoff_time');
                    $cutoff_times = date('Y-m-d H:i:s', strtotime($cutoff_time));


                    $studio_address = $this->input->post('studio_address');



                    $data = array('studio_name' => $this->input->post('studio_name'),
                        'studio_address' => $studio_address[0],
                        'studio_bundle_price' => $this->input->post('client_payout'), 
                        'client_payout' => $this->input->post('studio_bundle_price'),
                        'studio_description' => $this->input->post('studio_description'), 'cutoff_time' => $cutoff_times,
                        'created_date' => $date, 'modified_date' => $date);


                    $studio_id = $this->Obj_Track_Type_M->add_studio($data);


                    if (isset($studio_address)) {
                        foreach ($studio_address as $addr) {
                            $data = array('studio_id' => $studio_id, 'studio_address' => $addr);
                            $this->db->insert('studio_address', $data);
                        }
                    }

                    // $data_studio = array('admin_groups_id' => 2, 'studio_id' => $studio_id, 'username' => $this->input->post('studio_username'), 'password' => md5($this->input->post('studio_password')));
                    // $this->Obj_Track_Type_M->add_data_studio($data_studio);


                    if (isset($timing)) {
                        foreach ($timing as $time) {
                            $data = array('studio_id' => $studio_id, 'studio_timings' => $time);
                            $this->db->insert('studio_timing', $data);
                        }
                    }


                    if (isset($location_id)) {
                        foreach ($location_id as $location) {
                            $data = array('studio_id' => $studio_id, 'location_id' => $location);
                            $this->db->insert('studio_location', $data);
                        }
                    }


                    if (isset($instructor_id)) {
                        foreach ($instructor_id as $instructor) {
                            $data = array('studio_id' => $studio_id, 'instructor_id' => $instructor);
                            $this->db->insert('studio_instructor', $data);
                        }
                    }



                    if (isset($activity_id)) {

                        foreach ($activity_id as $activity) {

                            $data = array('studio_id' => $studio_id, 'activity_id' => $activity);
                            $this->db->insert('studio_activity', $data);
                        }
                    }



                    if (!empty($_FILES['userfile']['name'])) {


                        $this->load->helper(array('image_helper'));


                        $config = array(
                            'upload_path' => './studio/',
                            'allowed_types' => "gif|jpg|png|jpeg",
                            'overwrite' => TRUE,);
                        $this->load->library('upload', $config);
                        if ($this->upload->do_upload()) {

                            $upload_data = $this->upload->data();
                            $file_name = $upload_data['file_name'];
                            $data1 = array('studio_image' => $file_name);
                            $this->db->where('studio_id', $studio_id);
                            $this->db->update('studio', $data1);
                        } else {

                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('message1', $error['error']);
                            redirect('studio/add');
                        }
                    }
                }




                $this->session->set_flashdata('message', 'Inserted Successfully');
                redirect('studio');
            } else {
                $this->session->set_flashdata('message1', 'All Mandatory Field Required');
                redirect('studio/add');
            }
        }

        $data = array();
        $data['instructor'] = $this->Obj_Track_Type_M->get_all_intructor();
        $data['location'] = $this->Obj_Track_Type_M->get_location();
        $data['activity'] = $this->Obj_Track_Type_M->get_activity();

        $this->layout->view('add_studio_v', $data);
    }

    function edit($id = '') {

        $data = array();


        $data['instructor'] = $this->Obj_Track_Type_M->get_all_intructor();
        $data['location'] = $this->Obj_Track_Type_M->get_location();
        $data['activity'] = $this->Obj_Track_Type_M->get_activity();

        $data['studio_timing'] = $this->Obj_Track_Type_M->get_studio_timing($id);
        $data['studio_intructor'] = $this->Obj_Track_Type_M->get_studio_intructor($id);
        $data['studio_location'] = $this->Obj_Track_Type_M->get_studio_location($id);
        $data['studio_activity'] = $this->Obj_Track_Type_M->get_studio_activity($id);
        
        $data['studio_address'] = $this->Obj_Track_Type_M->get_studio_address($id);
        
        $data['result'] = $this->Obj_Track_Type_M->get_studios($id);
        $data['id'] = $id;
        $this->layout->view('add_studio_v', $data);
    }

    function edit_studio($studio_id = '') {

        $data = array();

        $data['studio_timing'] = $this->Obj_Track_Type_M->get_studio_timing($this->session->userdata('studio_id'));

        $data['result'] = $this->Obj_Track_Type_M->get_studios($this->session->userdata('studio_id'));
        $data['studio_id'] = $studio_id;
        $this->layout->view('studio_edit', $data);
    }

    function edit_1($id = '') {

        if ($this->input->post('submit')){
            
            $date = date('Y-m-d');           
            $result = $this->Obj_Track_Type_M->check_studio_e($this->input->post('studio_name'),$id);
            
           if (!empty($result)){
                $this->session->set_flashdata('message1', 'Already Exist');
            } else {
//                
//            $data = array('studio_name' => $this->input->post('studio_name'),
//                'studio_address' => $this->input->post('studio_address'),
//                'place' => $this->input->post('place'),
//                'studio_latitude' => $this->input->post('lat'),
//                'studio_longitude' => $this->input->post('lng'),
//                'studio_bundle_price' => $this->input->post('studio_bundle_price'),
//                'client_payout' => $this->input->post('client_payout'),
//                'studio_description' => $this->input->post('studio_description'),
//                'created_date' => $date, 'modified_date' => $date);

            $cutoff_time = $this->input->post('cutoff_time');
            $cutoff_times = date('Y-m-d H:i:s', strtotime($cutoff_time));
            $studio_address = $this->input->post('studio_address');

            $data = array('studio_name' => $this->input->post('studio_name'),
                'studio_address' => $studio_address[0],
                'studio_bundle_price' => $this->input->post('client_payout'),
                'client_payout' => $this->input->post('studio_bundle_price'),
                'studio_description' => $this->input->post('studio_description'), 'cutoff_time' => $cutoff_times,
                'created_date' => $date, 'modified_date' => $date);

            $this->Obj_Track_Type_M->update_studio($data, $id);

            $studio_id = $id;
            $timing = $this->input->post('timing');
            $location_id = $this->input->post('location_id');
            $instructor_id = $this->input->post('instructor_id');
            $activity_id = $this->input->post('activity_id');
            
            $studio_address = $this->input->post('studio_address');

            if (isset($timing)) {
                $this->db->delete('studio_timing', array('studio_id' => $id));
                foreach ($timing as $time) {
                    $data = array('studio_id' => $studio_id, 'studio_timings' => $time);
                    $this->db->insert('studio_timing', $data);
                }
            }

            if (isset($location_id)) {
                $this->db->delete('studio_location', array('studio_id' => $id));
                foreach ($location_id as $location) {
                    $data = array('studio_id' => $studio_id, 'location_id' => $location);
                    $this->db->insert('studio_location', $data);
                }
            }
            if (isset($instructor_id)) {
                $this->db->delete('studio_instructor', array('studio_id' => $id));
                foreach ($instructor_id as $instructor) {
                    $data = array('studio_id' => $studio_id, 'instructor_id' => $instructor);
                    $this->db->insert('studio_instructor', $data);
                }
            }
            
            if (isset($activity_id)) {
                $this->db->delete('studio_activity', array('studio_id' => $id));
                foreach ($activity_id as $activity) {
                    $data = array('studio_id' => $studio_id, 'activity_id' => $activity);
                    $this->db->insert('studio_activity', $data);
                }
            }
            
            if (isset($studio_address)) {
                $this->db->delete('studio_address', array('studio_id' => $id));
                foreach ($studio_address as $adr) {
                    $data = array('studio_id' => $studio_id, 'studio_address' => $adr);
                    $this->db->insert('studio_address', $data);
                }
            }
            
            

            if (!empty($_FILES['userfile']['name'])) {


                $this->load->helper(array('image_helper'));

                $config = array(
                    'upload_path' => './studio/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,);


                $this->load->library('upload', $config);



                if ($this->upload->do_upload()) {

                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];

                    chmod($upload_data['upload_data']['full_path'], 0777);

                    $data1 = array('studio_image' => $file_name);
                    $this->db->where('studio_id', $id);
                    $this->db->update('studio', $data1);
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message1', $error['error']);
                    redirect('studio');
                }
            }


            $this->session->set_flashdata('message', 'Updated Successfully');
            }
        }
        redirect('studio');
    }

    function edit_1_studio() {

        if ($this->input->post('submit')) {

            $studio_id = $this->input->post('studio_id');
            $date = date('Y-m-d');
//            
//            $result = $this->Obj_Track_Type_M->check_studio($this->input->post('studio_name'));
//            
//            if (!empty($result)){
//                $this->session->set_flashdata('message', 'Already Exist');
//            } else {
//                

            $data = array('studio_name' => $this->input->post('studio_name'),
                'studio_address' => $this->input->post('studio_address'),
                'studio_phone_number1' => $this->input->post('studio_phone_number1'),
                'studio_phone_number2' => $this->input->post('studio_phone_number2'),
                'studio_website' => $this->input->post('studio_website'),
                'studio_email_id' => $this->input->post('studio_email_id'),
                'studio_address' => $this->input->post('studio_address'),
                'studio_description' => $this->input->post('studio_description'),
                'created_date' => $date, 'modified_date' => $date);




            $this->Obj_Track_Type_M->update_studio($data, $studio_id);



            $timing = $this->input->post('timing');

            if (isset($timing)) {
                $this->db->delete('studio_timing', array('studio_id' => $studio_id));
                foreach ($timing as $time) {
                    $data = array('studio_id' => $studio_id, 'studio_timings' => $time);
                    $this->db->insert('studio_timing', $data);
                }
            }




            if (!empty($_FILES['userfile']['name'])) {


                $this->load->helper(array('image_helper'));

                $config = array(
                    'upload_path' => './studio/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,);


                $this->load->library('upload', $config);



                if ($this->upload->do_upload()) {

                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];

                    chmod($upload_data['upload_data']['full_path'], 0777);

                    $data1 = array('studio_image' => $file_name);
                    $this->db->where('studio_id', $studio_id);
                    $this->db->update('studio', $data1);
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message1', $error['error']);
                    redirect('studio/studio_profile');
                }
            }


            $this->session->set_flashdata('message', 'Updated Successfully');
            // }
        }
        redirect('studio/studio_profile');
    }

    function delete($id) {

        $data = $this->Obj_Track_Type_M->get_studios($id);
        $path = '/var/www/html/Testwrk/hypber/studio/' . @$data->studio_image;
        @unlink($path);
        $this->db->delete('studio', array('studio_id' => $id));
        $this->db->delete('studio_activity', array('studio_id' => $id));
        $this->db->delete('studio_classes', array('studio_id' => $id));
        $this->db->delete('studio_instructor', array('studio_id' => $id));
        $this->db->delete('studio_location', array('studio_id' => $id));
        $this->db->delete('studio_timing', array('studio_id' => $id));
        $this->db->delete('studio_address', array('studio_id' => $id));
        $this->db->delete('login', array('studio_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('studio');
    }

    function view_more($id) {

        $data['result'] = $this->Obj_Track_Type_M->get_more_studio($id);
        $this->layout->view('studio_more_v', $data);
    }

}

?>
<?php

class Studio_classes extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('studio_classes_m', 'Obj_Track_Type_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->date = date('Y-m-d');

        if (!$this->session->userdata('id')&&!$this->session->userdata('su_id')) {
            redirect('login/index');
        }
    }

    public function index() {
        $data['result'] = $this->Obj_Track_Type_M->get_all_studio_classes();
        $this->layout->view('studio_classes_v', $data);
    }

    public function add(){
  
        if ($this->input->post('submit')) {
            
            
            
            $start_time = date('H:i:s',strtotime($this->input->post('start_time')));
            $end_time  = date('H:i:s',strtotime($this->input->post('end_time')));
            
            if($start_time >= $end_time){
                
                    $this->session->set_flashdata('message1', 'End time should be greater than start time.');
                    redirect('studio_classes/add'); 
                
                
            }else{
            
            

            $datess = date('Y-m-d');


            $date = $this->input->post('date');
            $dates = explode(",", $date);
            $i = 0;

            foreach ($dates as $row) {


                $data = array('studio_classes_name'=>$this->input->post('studio_classes_name'),'studio_id' => $this->input->post('studio_id'),
                    'activity_id' => $this->input->post('activity_id'),
                    'date' => date('Y-m-d', strtotime($row)),
                    'start_time' => date('H:i:s',strtotime($this->input->post('start_time'))),
                    'end_time' => date('H:i:s',strtotime($this->input->post('end_time'))),'total_available_slots' => $this->input->post('total_available_slots'),
                'cutoff_time' => $this->input->post('cutoff_time'),
                    'created_date' => $datess, 'modified_date' => $datess);
                

                $class_id = $this->Obj_Track_Type_M->add_studio_classes($data);

                $data1 = array('class_id' => $class_id,
                    'instructor_id' => $this->input->post('instructor_id'),
                    'level_id' => $this->input->post('level_id'),
                    'description' => $this->input->post('description'),
                    'other_details' => $this->input->post('other_details'),
                    'class_latitude' => $this->input->post('lat'),
                    'class_longitude' => $this->input->post('lng'));
                $class_ids = $this->Obj_Track_Type_M->add_studio_classes_details($data1);

                $i++;
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('studio_classes');
            
            }  
            
        }
        
        
        $data['level'] = $this->Obj_Track_Type_M->get_all_level();
        $data['result'] = $this->Obj_Track_Type_M->get_all_studio();
        $data['class_master'] = $this->Obj_Track_Type_M->get_class_master();
        $this->layout->view('add_studio_classes_v', $data);
        
    }

    public function edit($id = ''){
        
        $data['res'] = $this->Obj_Track_Type_M->get_studio_class($id);
        $data['id'] = $id;
        $data['level'] = $this->Obj_Track_Type_M->get_all_level();
        $data['result'] = $this->Obj_Track_Type_M->get_all_studio();
        $data['class_master'] = $this->Obj_Track_Type_M->get_class_master();
        $this->layout->view('add_studio_classes_v', $data);
    }

    public function edit_1($id = ''){

        if ($this->input->post('submit')) {

            $date = date('Y-m-d');
            $data = array('studio_classes_name'=>$this->input->post('studio_classes_name'),'studio_id' => $this->input->post('studio_id'),
                'activity_id' => $this->input->post('activity_id'),
                'date' => date('Y-m-d', strtotime($this->input->post('date'))),
                'start_time' => date('H:i:s',strtotime($this->input->post('start_time'))),
                'end_time' => date('H:i:s',strtotime($this->input->post('end_time'))),'total_available_slots' => $this->input->post('total_available_slots'),
                'cutoff_time' => $this->input->post('cutoff_time'),
                'created_date' => $date, 'modified_date' => $date);

            $this->Obj_Track_Type_M->update_studio_classes($data, $id);

            $data1 = array('instructor_id' => $this->input->post('instructor_id'),
                'level_id' => $this->input->post('level_id'),
                'description' => $this->input->post('description'),
                'other_details' => $this->input->post('other_details'),
                'class_latitude' => $this->input->post('lat'),
                'class_longitude' => $this->input->post('lng'));

            $this->Obj_Track_Type_M->update_studio_class_details($data1, $id);
            $this->session->set_flashdata('message', 'Updated Successfully');
        }
        
        redirect('studio_classes');
    }

    public function delete($id){    
        $this->db->delete('studio_classes', array('studio_classes_class_id' => $id));
        $this->db->delete('class_info', array('class_id' => $id));
        $this->db->delete('class_booking', array('class_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('studio_classes');
    }

    public function view_more($id) {
        $data['result'] = $this->Obj_Track_Type_M->get_more_studio_classes($id);
        $this->layout->view('studio_classes_more_v', $data);
    }

    public function studio_class() {

        $data = array();
        $data['result'] = $this->Obj_Track_Type_M->get_studio_details($this->session->userdata('studio_id'));
        $this->layout->view('studio_class', $data);
    }

    public function add_classbk() {

        if ($this->input->post('submit')) {
            
            
            $start_time = date('H:i:s',strtotime($this->input->post('start_time')));
            $end_time  = date('H:i:s',strtotime($this->input->post('end_time')));
            
            if($start_time >= $end_time){
                
                    $this->session->set_flashdata('message1', 'End time should be greater than start time .');
                    redirect('studio_classes/add_class'); 
                
                
            }else{
            
            $datess = date('Y-m-d');

            $date  = $this->input->post('date');
            $dates = explode(",", $date);
            $i = 0;

            foreach ($dates as $row) {
                
            $classes_name   =     $this->Obj_Track_Type_M->escapeString(trim($this->input->post('studio_classes_name')));
            $activity_id = $this->input->post('activity_id');
            $date =   date('Y-m-d', strtotime($row));
            $start_time = date('H:i:s',strtotime($this->input->post('start_time')));
            $end_time  = date('H:i:s',strtotime($this->input->post('end_time')));
            $studio_id = $this->session->userdata('studio_id');
            
            
            $result =    $this->Obj_Track_Type_M->check_class($classes_name,$activity_id,$date,$start_time,$end_time,$studio_id);
            
            
             if(!empty($result)){
                 
                   $this->session->set_flashdata('message1', 'Already Exist');
                   redirect('studio_classes/studio_class');
                   
             }else{   
                


                $data = array('studio_classes_name' => $this->Obj_Track_Type_M->escapeString(trim($this->input->post('studio_classes_name'))),
                    'studio_id' => $this->session->userdata('studio_id'),
                    'activity_id' => $this->input->post('activity_id'),
                    'date' => date('Y-m-d', strtotime($row)),
                    'start_time' =>date('H:i:s',strtotime($this->input->post('start_time'))),
                    'end_time' => date('H:i:s',strtotime($this->input->post('end_time'))),'total_available_slots' => $this->input->post('total_available_slots'),'created_date' => $datess, 'modified_date' => $datess);

                $class_id = $this->Obj_Track_Type_M->add_studio_classes($data);

                $data1 = array('class_id' => $class_id,
                    'instructor_id' => $this->input->post('instructor_id'),
                    'level_id' => $this->input->post('level_id'),
                    'description' => $this->Obj_Track_Type_M->escapeString($this->input->post('description')),
                    'other_details' => $this->Obj_Track_Type_M->escapeString($this->input->post('other_details')),
                    'class_latitude' => $this->input->post('lat'),
                    'class_longitude' => $this->input->post('lng'));
                $class_ids = $this->Obj_Track_Type_M->add_studio_classes_details($data1);

                $i++;
            }

          
        }
        
         $this->session->set_flashdata('message', 'Inserted Successfully');
         redirect('studio_classes/studio_class');
         
        }
         
        }


        $data['activity'] = $this->Obj_Track_Type_M->get_all_activity($this->session->userdata('studio_id'));
        $data['instructor'] = $this->Obj_Track_Type_M->get_all_instructor($this->session->userdata('studio_id'));
        $data['level'] = $this->Obj_Track_Type_M->get_all_level();
        $data['result'] = $this->Obj_Track_Type_M->get_all_studio();
        $data['class_master'] = $this->Obj_Track_Type_M->get_class_master();
        $this->layout->view('add_studio_class', $data);
    }

    public function edit_class($id) {

        $data = array();
        $data['id'] = $id;
        $data['activity'] = $this->Obj_Track_Type_M->get_all_activity($this->session->userdata('studio_id'));
        $data['instructor'] = $this->Obj_Track_Type_M->get_all_instructor($this->session->userdata('studio_id'));
        $data['level'] = $this->Obj_Track_Type_M->get_all_level();
        $data['res'] = $this->Obj_Track_Type_M->get_studio_class($id);
        $data['class_master'] = $this->Obj_Track_Type_M->get_class_master();
        $this->layout->view('add_studio_class', $data);
    }

    public function edit_1_class($id = ''){

        if ($this->input->post('submit')){

            $date = date('Y-m-d');
            $data = array('studio_classes_name' => $this->Obj_Track_Type_M->escapeString($this->input->post('studio_classes_name')),
                'studio_id' => $this->session->userdata('studio_id'),
                'activity_id' => $this->input->post('activity_id'),
                'date' => date('Y-m-d', strtotime($this->input->post('date'))),
                'start_time'=>date('H:i:s',strtotime($this->input->post('start_time'))),
                'end_time' =>date('H:i:s',strtotime($this->input->post('end_time'))),'total_available_slots' => $this->input->post('total_available_slots'),'created_date' => $date, 'modified_date' => $date);            

            $this->Obj_Track_Type_M->update_studio_classes($data, $id);
            
            $data1 = array('instructor_id' => $this->input->post('instructor_id'),
                'level_id' => $this->input->post('level_id'),
                'description' => $this->Obj_Track_Type_M->escapeString($this->input->post('description')),
                'other_details'=>$this->Obj_Track_Type_M->escapeString($this->input->post('other_details')),
                'class_latitude'=>$this->input->post('lat'),
                'class_longitude'=>$this->input->post('lng'));
            
            $this->Obj_Track_Type_M->update_studio_class_details($data1, $id);
            $this->session->set_flashdata('message', 'Updated Successfully');
        }

        redirect('studio_classes/studio_class');
    }

    public function delete_class($id) {

        $this->db->delete('studio_classes', array('studio_classes_class_id' => $id));
        $this->db->delete('class_info', array('class_id' => $id));
        $this->db->delete('class_booking', array('class_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('studio_classes/studio_class');
    }
    
    
    public function get_activity(){
        
        if(isset($_POST['ids'])&&!empty($_POST['edit_ids'])){
            
            $data['activity']   = $this->Obj_Track_Type_M->get_all_activity($_POST['ids']);
            $data['instructor'] = $this->Obj_Track_Type_M->get_all_instructor($_POST['ids']);
            $data['res'] = $this->Obj_Track_Type_M->get_studio_class($_POST['edit_ids']);
            $data['edit_id'] = $_POST['edit_ids'];
            $this->load->view('add_studio_class_activity',$data); 
            
            
        }elseif (isset($_POST['ids'])){
            
            $data['activity'] = $this->Obj_Track_Type_M->get_all_activity($_POST['ids']);
            $data['instructor'] = $this->Obj_Track_Type_M->get_all_instructor($_POST['ids']);
            $this->load->view('add_studio_class_activity',$data);
        }
        
    }
    
    
    public function cancel($class_id){
        
        $data = array();
        $data['class_id'] = $class_id;
        $data['res'] = $this->Obj_Track_Type_M->get_studio_class($class_id);
        $this->layout->view('cancel_studio_class', $data);
    
    }
    
    
    
    private function sendPushNotification($registration_ids, $message, $device_type, $notification_type){

        $url = 'https://fcm.googleapis.com/fcm/send';

        if ($device_type == 'android') {
            
            define('GOOGLE_API_KEY', 'AIzaSyD7n4Ux6b4RA6g_sMbg6WvmkPIikIQrp2s');
            $fields = array('to' => $registration_ids,
                'priority' => 'high', 
                'data' => array(
                    'notification_type' => $notification_type,'title'=>'Hypber',
                    'body'=>$message
                )
            );
        }
        
        if ($device_type == 'ios') {

            define('GOOGLE_API_KEY','AIzaSyAOGkM_XBPO2ku9c4l2us4JFeW-Y7jXfHw');

            $fields = array('to' => $registration_ids, 'content_available' => true, 'priority' => 'high', 'notification' => array('body' => $message, 'title' => 'Hypber'), 'data' => array('notification_type' => $notification_type));
        }
        
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        
        //print_r($result);die;
        
        return $result;
    }

    
    
    
    
    public function canceled($class_id){
        
        if(isset($class_id)){
           
            
            $check = $this->Obj_Track_Type_M->Checkcurrentstatus($class_id);
            
            //print_r($check);die;
            
            if($check){
            
                
             if(@$check->status == 0 ){ 
                 
                $this->session->set_flashdata('message1', 'Already Cancelled');
                 
             }else{   
               
            $date = date('Y-m-d H:i:s');
            $data = array('status' => 0,'modified_date'=>$date);
            $result = $this->Obj_Track_Type_M->canceled($data,$class_id);
 
            if($result){
                    
              $data['res'] = $this->Obj_Track_Type_M->get_class_user($class_id);  
              $message = "Your class cancelled ";      
              $notification_type = 1;
              
              foreach ($data['res'] as $row){
                  
         $res = $this->sendPushNotification($row->device_id,$message,$row->device_type,$notification_type);
                                
              }
              
            }
            
            
             $this->session->set_flashdata('message', 'Class cancelled');
            
            }
         
            
            }
            
        }
        
       redirect('studio_classes/studio_class');
       
    }
    
    
        public function canceled1($class_id){
        
        if(isset($class_id)){
           
            
            $check = $this->Obj_Track_Type_M->Checkcurrentstatus($class_id);
            
            //print_r($check);die;
            
            if($check){
            
                
             if(@$check->status == 0 ){ 
                 
                $this->session->set_flashdata('message1', 'Already Cancelled');
                 
             }else{   
               
            
            $date = date('Y-m-d H:i:s');
            $data = array('status' => 0,'modified_date'=>$date);
            $result = $this->Obj_Track_Type_M->canceled($data,$class_id);
 
            if($result){
                    
              $data['res'] = $this->Obj_Track_Type_M->get_class_user($class_id);  
              $message = "Your class canceled ";      
              $notification_type = 1;
              
              foreach ($data['res'] as $row){
                  
         $res = $this->sendPushNotification($row->device_id,$message,$row->device_type,$notification_type);
                                
              }
              
            }
            
            
             $this->session->set_flashdata('message', 'Class cancelled');
            
            }
         
            
            }
            
        }
        
       redirect('studio_classes');
       
    }
    
    
    public function get_classes_name(){
        
    if (isset($_POST['classes_names'])){
            $data['classes_details'] = $this->Obj_Track_Type_M->get_classes_details($_POST['classes_names']);
            $this->load->view('classes_details',$data);
    }
        
    }
    
    
    
    
function array_combine_($keys, $values)
{
    $result = array();
    foreach ($keys as $i => $k) {
        $result[$k][] = $values[$i];
    }
    array_walk($result, create_function('&$v', '$v = (count($v) == 1)? array_pop($v): $v;'));
    return    $result;
}
    
    
    public function add_class(){

        if ($this->input->post('submit')){
                   
            $datess = date('Y-m-d');      
            $date =   $this->input->post('date');
            $s_time = $this->input->post('start_time');
            $e_time = $this->input->post('end_time');
            
            $keys   = $date;
            $start_time  = $s_time;
            $end_time = $e_time;
            $result = array();

    foreach ($keys as $id => $key){
        $result[] = array(
        'date'=>$key,    
        'start_time'  => $start_time[$id],
        'end_time' => $end_time[$id],
      );
    }


    
    foreach ($result as $row){
        
          
            $start_time =   date('H:i:s',strtotime($row['start_time']));
            $end_time  =    date('H:i:s',strtotime($row['end_time']));
            $classes_name = $this->input->post('studio_classes_name');
            $activity_id =  $this->input->post('activity_id');
            $date =  $row['date'];    
            $studio_id = $this->session->userdata('studio_id');
            
            if($start_time >= $end_time){
                
                    $this->session->set_flashdata('message1', 'End time should be greater than start time .');
                    redirect('studio_classes/add_class'); 
        
         
            }else{
                
                
        $result =    $this->Obj_Track_Type_M->check_class($classes_name,$activity_id,$date,$start_time,$end_time,$studio_id);
         
        
          if(!empty($result)){
                 
                   $this->session->set_flashdata('message1', 'Already Exist');
                   redirect('studio_classes/studio_class');
                   
             }else{
                
          $data = array('studio_classes_name' => $this->Obj_Track_Type_M->escapeString(trim($this->input->post('studio_classes_name'))),
                    'studio_id' => $this->session->userdata('studio_id'),
                    'activity_id' => $this->input->post('activity_id'),
                    'date' => $row['date'],
                    'start_time' =>$row['start_time'],
                    'end_time' =>$row['end_time'],'total_available_slots' => $this->input->post('total_available_slots'),'created_date' => $datess, 'modified_date' => $datess);
          
          
                $class_id = $this->Obj_Track_Type_M->add_studio_classes($data);

                $data1 = array('class_id' => $class_id,
                    'instructor_id' => $this->input->post('instructor_id'),
                    'level_id' => $this->input->post('level_id'),
                    'description' => $this->Obj_Track_Type_M->escapeString($this->input->post('description')),
                    'other_details' => $this->Obj_Track_Type_M->escapeString($this->input->post('other_details')),
                    'class_latitude' => $this->input->post('lat'),
                    'class_longitude' => $this->input->post('lng'));
                $class_ids = $this->Obj_Track_Type_M->add_studio_classes_details($data1);
                
                
                
        
            }
            
            }
        
    }
      
    
    $this->session->set_flashdata('message', 'Inserted Successfully');
    redirect('studio_classes/studio_class'); 
         
        }


        $data['activity'] = $this->Obj_Track_Type_M->get_all_activity($this->session->userdata('studio_id'));
        $data['instructor'] = $this->Obj_Track_Type_M->get_all_instructor($this->session->userdata('studio_id'));
        $data['level'] = $this->Obj_Track_Type_M->get_all_level();
        $data['result'] = $this->Obj_Track_Type_M->get_all_studio();
        $data['class_master'] = $this->Obj_Track_Type_M->get_class_master();
        $this->load->view('add_studio_class_test', $data);
    }
    
    
}?>
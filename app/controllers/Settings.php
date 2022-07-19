<?php
class Settings extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('settings_m', 'Obj_Setting_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
        $this->load->helper('string');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }
    
    public function index(){
        $data['result'] = $this->Obj_Setting_M->get_settings();
        $this->layout->view('settings_v', $data);
    }

    public function add(){
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $settings_price      =    $this->input->post('settings_price');
            $settings_name       =    $this->input->post('settings_name');
            $ar_settings_name    =    $this->input->post('ar_settings_name');
            
        $data = array('settings_price'=>$settings_price,'settings_name'=>$settings_name,'ar_settings_name'=>$ar_settings_name);     
        $settings_id =  $this->Obj_Setting_M->add_settings($data);
        $this->session->set_flashdata('message', 'Inserted Successfully');
        redirect('settings');
            
        }else{
            
            $data = array();
           // $data['class'] = $this->Obj_Setting_M->get_class();
            $this->layout->view('add_settings_v',$data);
        }
    }

    function edit($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_Setting_M->get_settingss($id);
        $this->layout->view('add_settings_v',$data);
    }

    function edit_1($id = NULL){

      if ($this->input->post('submit')){
          
            $date = date('Y-m-d h:i:s', time());
            $setting_name        =      $this->input->post('setting_name');
            $setting_value       =    $this->input->post('setting_value');     
            $data = array('setting_name'=>$setting_name,'setting_value'=>$setting_value);    
            $this->Obj_Setting_M->update_settings($data,$id);
            $this->session->set_flashdata('message', 'Updatedd Successfully');
            redirect('settings');
        } else {
            redirect('settings');
        }
    }
//
//    function delete($id){
//        $this->db->delete('settings', array('settings_id'=>$id));
//        $this->session->set_flashdata('message', 'Deleted Successfully');
//        redirect('settings');
//    }        
}?>
<?php
class Classs extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('class_m', 'Obj_Class_M', TRUE);
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
        $data['result'] = $this->Obj_Class_M->get_class();
        $this->layout->view('class_v', $data);
    }

    public function add() {
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $class_name      =       $this->input->post('class_name');
            $class_name_ar   =       $this->input->post('ar_class_name');            
            $data = array('class_name'=>$class_name,'ar_class_name'=>$class_name_ar); 
            $this->Obj_Class_M->add_class($data);
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('classs');
            
        } else {
            $this->layout->view('add_class_v');
        }
    }

    function edit($id = NULL){
        $data["id"] = $id;
        $data['res'] = $this->Obj_Class_M->get_classs($id);
        $this->layout->view('add_class_v',$data);
    }

    function edit_1($id = NULL) {

      if ($this->input->post('submit')) {
    
            
            $date = date('Y-m-d h:i:s', time());
            $class_name      =       $this->input->post('class_name');
            $class_name_ar   =       $this->input->post('ar_class_name');  
            $data = array('class_name'=>$class_name,'ar_class_name'=>$class_name_ar); 
            $this->Obj_Class_M->update_class($data,$id);
            $this->session->set_flashdata('message', 'Updatedd Successfully');
            redirect('classs');
        } else {
            redirect('classs');
        }
    }

    function delete($id){
        $this->db->delete('class', array('class_id'=>$id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('classs');
    }        
}?>
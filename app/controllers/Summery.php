<?php
class Summery extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('summery_m', 'Obj_Summery_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        // date_default_timezone_set('Asia/Kuwait');
        date_default_timezone_set('Asia/Kuwait');
        $this->load->helper('string');
        $this->date = date('Y-m-d');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }
    
    public function index(){
        $data['result'] = $this->Obj_Summery_M->get_summery();
        $this->layout->view('summery_v', $data);
    }

    public function add(){
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $class_id             =    $this->input->post('class_id');
            $brand_id             =    NULL;
            $summary_tittle       =    $this->input->post('summary_tittle');
            $ar_summary_tittle    =    $this->input->post('ar_summary_tittle');           
            $summary_price    =        null;
            
        $data = array('class_id'=>$class_id,'brand_id'=>$brand_id,'summary_tittle'=>$summary_tittle,'ar_summary_tittle'=>$ar_summary_tittle,'summary_price'=>$summary_price);     
        $summery_id =  $this->Obj_Summery_M->add_summery($data);
        $this->session->set_flashdata('message', 'Inserted Successfully');
        redirect('summery');
            
        }else{
            
            $data = array();
            $data['class'] = $this->Obj_Summery_M->get_class();
           // $data['brand'] = $this->Obj_Summery_M->get_brand();
            $this->layout->view('add_summery_v',$data);
        }
    }

    function edit($id = NULL){
        $data["id"] = $id;
        $data['class'] = $this->Obj_Summery_M->get_class();
        $data['result'] = $this->Obj_Summery_M->get_summerys($id);
        $this->layout->view('add_summery_v',$data);
    }

    function edit_1($id = NULL) {

      if ($this->input->post('submit')){
          
            $date = date('Y-m-d h:i:s', time());
            $class_id         =    $this->input->post('class_id');
            $summary_tittle       =    $this->input->post('summary_tittle');
            $ar_summary_tittle    =    $this->input->post('ar_summary_tittle');      
            $data = array('class_id'=>$class_id,'summary_tittle'=>$summary_tittle,'ar_summary_tittle'=>$ar_summary_tittle);    
            $this->Obj_Summery_M->update_summery($data,$id);
            $this->session->set_flashdata('message', 'Updatedd Successfully');
            redirect('summery');
        } else {
            redirect('summery');
        }
    }

    function delete($id){
        $this->db->delete('summary', array('summary_id'=>$id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('summery');
    }        
}?>
<?php
class Brand extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('brand_m', 'Obj_Brand_M', TRUE);
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
        $data['result'] = $this->Obj_Brand_M->get_brand();
        $this->layout->view('brand_v', $data);
    }

    public function add(){
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $brand_price      =    $this->input->post('brand_price');
            $brand_name       =    $this->input->post('brand_name');
            $ar_brand_name    =    $this->input->post('ar_brand_name');
            
        $data = array('brand_price'=>$brand_price,'brand_name'=>$brand_name,'ar_brand_name'=>$ar_brand_name);     
        $brand_id =  $this->Obj_Brand_M->add_brand($data);
        $this->session->set_flashdata('message', 'Inserted Successfully');
        redirect('brand');
            
        }else{
            
            $data = array();
           // $data['class'] = $this->Obj_Brand_M->get_class();
            $this->layout->view('add_brand_v',$data);
        }
    }

    function edit($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_Brand_M->get_brands($id);
        $this->layout->view('add_brand_v',$data);
    }

    function edit_1($id = NULL){

      if ($this->input->post('submit')){
          
            $date = date('Y-m-d h:i:s', time());
            $brand_price      =    $this->input->post('brand_price');
            $brand_name       =    $this->input->post('brand_name');
            $ar_brand_name    =    $this->input->post('ar_brand_name');      
            $data = array('brand_price'=>$brand_price,'brand_name'=>$brand_name,'ar_brand_name'=>$ar_brand_name);    
            $this->Obj_Brand_M->update_brand($data,$id);
            $this->session->set_flashdata('message', 'Updatedd Successfully');
            redirect('brand');
        } else {
            redirect('brand');
        }
    }

    function delete($id){
        $this->db->delete('brand', array('brand_id'=>$id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('brand');
    }        
}?>
<?php
class Offlineservices extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('offlineservices_m', 'Obj_Offlineservices_M', TRUE);
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
        $data['result'] = $this->Obj_Offlineservices_M->get_offlineservices();
        $this->layout->view('offlineservices_v', $data);
    }

    public function add() {
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $others_tittle      =     $this->input->post('others_tittle');
            $ar_others_tittle   =       $this->input->post('ar_others_tittle');
            $others_description =     $this->input->post('others_description');
            $ar_others_description =  $this->input->post('ar_others_description');
            
            
            $data = array('others_tittle'=>$others_tittle,'ar_others_tittle'=>$ar_others_tittle,'others_description'=>$others_description,'ar_others_description'=>$ar_others_description); 
            
            $this->Obj_Offlineservices_M->add_offlineservices($data);
            
            
            $offlineservices_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
                $config = array(
                    'upload_path' => './others/',
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,'encrypt_name' =>TRUE);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('others_image' => $file_name);
                    $this->db->where('others_id', $offlineservices_id);
                    $this->db->update('others', $data1);
                    
                } else {
                    
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('offlineservices/add');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('offlineservices');
            
        } else {
            $this->layout->view('add_offlineservices_v');
        }
    }

    function edit($id = NULL){
        $data["id"] = $id;
        $data['res'] = $this->Obj_Offlineservices_M->get_offlineservicess($id);
        $this->layout->view('add_offlineservices_v',$data);
    }

    function edit_1($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
            
            
            $others_tittle      =     $this->input->post('others_tittle');
            $ar_others_tittle   =       $this->input->post('ar_others_tittle');
            $others_description =     $this->input->post('others_description');
            $ar_others_description =  $this->input->post('ar_others_description');
            
            
                    $data = array('others_tittle'=>$others_tittle,'ar_others_tittle'=>$ar_others_tittle,'others_description'=>$others_description,'ar_others_description'=>$ar_others_description); 
            $this->Obj_Offlineservices_M->update_offlineservices($data,$id);
            $offlineservices_id = $id;
            
            
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
                $config = array(
                    'upload_path' => './others/',
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,'encrypt_name' =>TRUE);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('others_image' => $file_name);
                    $this->db->where('others_id', $offlineservices_id);
                    $this->db->update('others', $data1);
                    
                } else {
                    
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('offlineservices/add');
                }
            }
            
            
            
            $this->session->set_flashdata('message', 'Updatedd Successfully');
            redirect('offlineservices');
        } else {
            redirect('offlineservices');
        }
    }

    function delete($id){
        $this->db->delete('others', array('others_id' => $id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('offlineservices');
    }        
}?>
<?php
class Accountant extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('accountant_m', 'Obj_Accountant_M', TRUE);
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
        $data['result'] = $this->Obj_Accountant_M->get_accountant();
        $this->layout->view('accountant_v', $data);
    }

    public function add() {
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $accountant_name      =    $this->input->post('accountant_name');
            $accountant_name_ar   =    $this->input->post('accountant_name_ar');
            $email            =    $this->input->post('email');
            $phone_number     =    $this->input->post('phone_number');
            $whatsapp_no      =    $this->input->post('whatsapp_no');
            $address =       $this->input->post('address');
            $google_map_url   =    $this->input->post('google_map_url');
            $pincode =  NULL;
            $password   =    $this->input->post('password');
            
            
     $data = array('accountant_name'=>$accountant_name,'accountant_name_ar'=>$accountant_name_ar,'accountant_email'=>$email,'phone_number'=>$phone_number,'whatsapp_no'=>$whatsapp_no,'address'=>$address,'google_map_url'=>$google_map_url); 
            
          $accountant_id =  $this->Obj_Accountant_M->add_accountant($data);
            
            $login_data = array('admin_groups_id'=>3,'accountant_id'=>$accountant_id,'username'=>$email,'password'=>$password);
            $this->Obj_Accountant_M->add_login_details($login_data);
            
            
          

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
                $config = array(
                    'upload_path' => 'accountant/',
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,'encrypt_name' =>TRUE);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('accountant_image' => $file_name);
                    $this->db->where('accountant_id', $accountant_id);
                    $this->db->update('accountant', $data1);
                    
                } else {
                    
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('accountant/add');
                }
            }
            
            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('accountant');
            
        } else {
            $this->layout->view('add_accountant_v');
        }
    }

    function edit($id = NULL){
        $data["id"] = $id;
        $data['res'] = $this->Obj_Accountant_M->get_accountants($id);
        $this->layout->view('add_accountant_v',$data);
    }

    function edit_1($id = NULL) {

      if ($this->input->post('submit')){
    
            
            $date = date('Y-m-d h:i:s', time());
            $accountant_name      =    $this->input->post('accountant_name');
            $accountant_name_ar   =    $this->input->post('accountant_name_ar');
            $email            =    $this->input->post('email');
            $phone_number     =    $this->input->post('phone_number');
            $whatsapp_no      =    $this->input->post('whatsapp_no');
            $address          =    $this->input->post('address');
            $google_map_url   =    $this->input->post('google_map_url');
            $pincode =  NULL;
            $password         =    $this->input->post('password');

            
         $data = array('accountant_name'=>$accountant_name,'accountant_name_ar'=>$accountant_name_ar,'accountant_email'=>$email,'phone_number'=>$phone_number,'whatsapp_no'=>$whatsapp_no,'address'=>$address,'google_map_url'=>$google_map_url); 
             
            $this->Obj_Accountant_M->update_accountant($data,$id);
            
            $login_data = array('password'=>$password);  
            $accountant_id = $id;
            
            $this->Obj_Accountant_M->update_login_details($login_data,$accountant_id);
            
            
                if (!empty($_FILES['userfile']['name'])){
                    
                $this->load->helper(array('image_helper'));
                $config = array(
                    'upload_path' => './accountant/',
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,'encrypt_name' =>TRUE);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('accountant_image' => $file_name);
                    $this->db->where('accountant_id', $accountant_id);
                    $this->db->update('accountant', $data1);
                    
                } else {
                    
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('accountant/add');
                }
            }     
            
            
            
            $this->session->set_flashdata('message', 'Updatedd Successfully');
            redirect('accountant');
        } else {
            redirect('accountant');
        }
    }

    function delete($id){
        $this->db->delete('accountant', array('accountant_id'=>$id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('accountant');
    }        
}?>
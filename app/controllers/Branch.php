<?php
class Branch extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('branch_m', 'Obj_Branch_M', TRUE);
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
        $data['result'] = $this->Obj_Branch_M->get_branch();
        $this->layout->view('branch_v', $data);
    }

    public function add() {
        
        if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $branch_name      =    $this->input->post('branch_name');
            $branch_name_ar   =    $this->input->post('branch_name_ar');
            $email            =    $this->input->post('email');
            $phone_number     =    $this->input->post('phone_number');
            $whatsapp_no      =    $this->input->post('whatsapp_no');
            $address =       $this->input->post('address');
            $google_map_url   =    $this->input->post('google_map_url');
            $pincode =  NULL;
            $password   =    $this->input->post('password');
            
            
     $data = array('branch_name'=>$branch_name,'branch_name_ar'=>$branch_name_ar,'branch_email'=>$email,'phone_number'=>$phone_number,'whatsapp_no'=>$whatsapp_no,'address'=>$address,'google_map_url'=>$google_map_url); 
            
          $branch_id =  $this->Obj_Branch_M->add_branch($data);
            
            $login_data = array('admin_groups_id'=>2,'branch_id'=>$branch_id,'username'=>$email,'password'=>$password);
            $this->Obj_Branch_M->add_login_details($login_data);
            
            
          

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
                $config = array(
                    'upload_path' => 'branch/',
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,'encrypt_name' =>TRUE);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('branch_image' => $file_name);
                    $this->db->where('branch_id', $branch_id);
                    $this->db->update('branch', $data1);
                    
                } else {
                    
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('branch/add');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('branch');
            
        } else {
            $this->layout->view('add_branch_v');
        }
    }

    function edit($id = NULL){
        $data["id"] = $id;
        $data['res'] = $this->Obj_Branch_M->get_branchs($id);
        $this->layout->view('add_branch_v',$data);
    }

    function edit_1($id = NULL) {

      if ($this->input->post('submit')){
    
            
            $date = date('Y-m-d h:i:s', time());
            $branch_name      =    $this->input->post('branch_name');
            $branch_name_ar   =    $this->input->post('branch_name_ar');
            $email            =    $this->input->post('email');
            $phone_number     =    $this->input->post('phone_number');
            $whatsapp_no      =    $this->input->post('whatsapp_no');
            $address          =    $this->input->post('address');
            $google_map_url   =    $this->input->post('google_map_url');
            $pincode =  NULL;
            $password         =    $this->input->post('password');

            
         $data = array('branch_name'=>$branch_name,'branch_name_ar'=>$branch_name_ar,'branch_email'=>$email,'phone_number'=>$phone_number,'whatsapp_no'=>$whatsapp_no,'address'=>$address,'google_map_url'=>$google_map_url); 
             
            $this->Obj_Branch_M->update_branch($data,$id);
            
            $login_data = array('password'=>$password);  
            $branch_id = $id;
            
            $this->Obj_Branch_M->update_login_details($login_data,$branch_id);
            
            
                if (!empty($_FILES['userfile']['name'])){
                    
                $this->load->helper(array('image_helper'));
                $config = array(
                    'upload_path' => './branch/',
                    'allowed_types' => "jpg|png|jpeg",
                    'overwrite' => TRUE,'encrypt_name' =>TRUE);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){
                    
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('branch_image' => $file_name);
                    $this->db->where('branch_id', $branch_id);
                    $this->db->update('branch', $data1);
                    
                } else {
                    
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('branch/add');
                }
            }     
            
            
            
            $this->session->set_flashdata('message', 'Updatedd Successfully');
            redirect('branch');
        } else {
            redirect('branch');
        }
    }

    function delete($id){
        $this->db->delete('branch', array('branch_id'=>$id));
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect('branch');
    }        
}?>
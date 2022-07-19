<?php
class Used_vehicles extends CI_Controller {

    function Used_vehicles() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('used_vehicles_m', 'Obj_used_vehicles_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_used_vehicles_M->get_used_vehicles();
        $this->layout->view('used_vehicles_v', $data);
    }

    public function add_used_vehicles() {
        
        if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
            $data = array('used_vehicles_name' => $this->input->post('used_vehicles_name'));
            $this->Obj_used_vehicles_M->add_used_vehicles($data);
            $used_vehicles_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
//                if (!is_dir('used_vehicles/' . $used_vehicles_id)) {
//                    mkdir('used_vehicles/' . $used_vehicles_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/new/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('vehicle_id', $used_vehicles_id);
                    $this->db->update('vehicle_used_vehicles', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('used_vehicles/add_used_vehicles');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('used_vehicles');
        } else {
            $this->layout->view('add_used_vehicles_v');
        }
    }

    function edit_used_vehicles($id = NULL){
        $data["id"] = $id;
        $data['result'] = $this->Obj_used_vehicles_M->get_used_vehicless($id);
        $this->layout->view('add_used_vehicles_v',$data);
    }

    function edit_used_vehicless($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
          $data = array('used_vehicles_name' => $this->input->post('used_vehicles_name'));
            
            $this->Obj_used_vehicles_M->update_used_vehicles($data,$id);
            $used_vehicles_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('used_vehicles/' . $used_vehicles_id)) {
//                    mkdir('used_vehicles/' . $used_vehicles_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/new/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('vehicle_id', $used_vehicles_id);
                    $this->db->update('vehicle_used_vehicles', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('used_vehicles/add_used_vehicles');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('used_vehicles');
        } else {
            redirect('used_vehicles');
        }
    }

    function delete_used_vehicles($id){
        $this->db->delete('used_vehicles', array('used_vehicle_model_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('used_vehicles');
    }
    
    
    function status($used_vehicle_model_id){
          
           $data = $this->Obj_used_vehicles_M->get_status($used_vehicle_model_id);
           
           if($data->status == 800){ 
               $datas = array('status'=>801);          
           }else {
                $datas = array('status'=>800);
           }
         $this->Obj_used_vehicles_M->update_status($datas,$used_vehicle_model_id);
          redirect('used_vehicles');
    }
    
    
}?>
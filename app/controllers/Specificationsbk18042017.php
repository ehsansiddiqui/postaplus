<?php
class Specifications extends CI_Controller {

    function Specifications() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $this->load->model('specifications_m', 'Obj_specifications_M', TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_specifications_M->get_specifications();
        $this->layout->view('specifications_v', $data);
    }

    public function add_specifications(){
        
        $data = array();
        $data['variant'] = $this->Obj_specifications_M->get_all_variant();
        $data['vehicle'] =    $this->Obj_specifications_M->get_all_vehicle();
        $data['specification'] =    $this->Obj_specifications_M->get_all_specification_master();
   

        if ($this->input->post('submit')){
           
            
            $date = date('Y-m-d h:i:s', time());
            $data = array('vehicle_id' => $this->input->post('vehicle_id'),
                'variant_id' => $this->input->post('variant_id'),
                'specification_id' => $this->input->post('specification_id'),
                'specification_value' => $this->input->post('specification_value'));
            $this->Obj_specifications_M->add_specifications($data);
            $specifications_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));
//                if (!is_dir('specifications/' . $specifications_id)) {
//                    mkdir('specifications/' . $specifications_id, 0777, true);
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
                    $this->db->where('vehicle_id', $specifications_id);
                    $this->db->update('vehicle_specifications', $data1); 
                } else {

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('specifications/add_specifications');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('specifications');
        } else {
            $this->layout->view('add_specifications_v',$data);
        }
    }

    function edit_specifications($id = NULL){
        
        $data['variant'] = $this->Obj_specifications_M->get_all_variant();
        $data['vehicle'] =    $this->Obj_specifications_M->get_all_vehicle();
        $data['specification'] =    $this->Obj_specifications_M->get_all_specification_master();
        $data["id"] = $id;
        $data['result'] = $this->Obj_specifications_M->get_specificationss($id);
        $this->layout->view('add_specifications_v',$data);
    }

    function edit_specificationss($id = NULL) {

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
         $data = array('vehicle_id' => $this->input->post('vehicle_id'),
                'variant_id' => $this->input->post('variant_id'),
                'specification_id' => $this->input->post('specification_id'),
                'specification_value' => $this->input->post('specification_value'));
            
            $this->Obj_specifications_M->update_specifications($data,$id);
            $specifications_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('specifications/' . $specifications_id)) {
//                    mkdir('specifications/' . $specifications_id, 0777, true);
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
                    $this->db->where('vehicle_id', $specifications_id);
                    $this->db->update('vehicle_specifications', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('specifications/add_specifications');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('specifications');
        } else {
            redirect('specifications');
        }
    }

    function delete_specifications($id) {
        $this->db->delete('vehicle_specifications', array('vehicle_specification_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('specifications');
    }   
}?>
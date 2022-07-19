<?php
class Accessories extends CI_Controller {

    function Accessories() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('layout');
        $this->load->library('session');
        $Accessories_Obj = array('accessories_m' => 'Obj_accessories_M','user_m'=>'Obj_User_M');      
        $this->load->model($Accessories_Obj, TRUE);
        $this->load->database();
        $this->load->library('form_validation');
        // date_default_timezone_set('Asia/Kuwait');
        date_default_timezone_set('Asia/Kuwait');
    }

    public function index(){
        $data['result'] = $this->Obj_accessories_M->get_accessories();
        $this->layout->view('accessories_v',$data);
    }

    public function add_accessories(){
        
        
        $data = array();
        
        $data['result'] = $this->Obj_accessories_M->get_accessories_type();
        
         if ($this->input->post('submit')){
            
            $date = date('Y-m-d h:i:s', time());
            $data = array(
                'accessories_types_id' => $this->input->post('accessories_type_id'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'expected_price' => $this->input->post('expected_price'),
                'model_price_max' => $this->input->post('model_price_max'),
                'featured_status' => $this->input->post('featured_status'),
                'recommended_status' => $this->input->post('recommended_status'),
                'popular_status' => $this->input->post('popular_status'),
                'upcoming_status' => $this->input->post('upcoming_status'));
                
            $this->Obj_accessories_M->add_accessories($data);
            $accessories_id = $this->db->insert_id();

            if (!empty($_FILES['userfile']['name'])) {
                
                $this->load->helper(array('image_helper'));
                
//                if (!is_dir('accessories/' . $accessories_id)) {
//                    mkdir('accessories/' . $accessories_id, 0777, true);
//                }
                
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/accessories/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()){
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('accessories_id', $accessories_id);
                    $this->db->update('accessories', $data1); 
                } else{
                    
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message',$error);
                    redirect('accessories/add_accessories');
                }
            }

            $this->session->set_flashdata('message', 'Inserted Successfully');
            redirect('accessories');
        } else {
            $this->layout->view('add_accessories_v',$data);
        }
    }

    function edit_accessories($id = NULL){
        $data["id"] = $id;
        $data['accessories'] = $this->Obj_accessories_M->get_accessories_type();;
        $data['result'] = $this->Obj_accessories_M->get_accessoriess($id);
        $this->layout->view('add_accessories_v',$data);
    }

    function edit_accessoriess($id = NULL){

      if ($this->input->post('submit')) {
            $date = date('Y-m-d h:i:s', time());
       $data = array(
                'accessories_types_id' => $this->input->post('accessories_type_id'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'short_title' => $this->input->post('short_title'),
                'detail_title' => $this->input->post('detail_title'),
                'description' => $this->input->post('description'),
                'expected_price' => $this->input->post('expected_price'),
                'model_price_max' => $this->input->post('model_price_max'),
                'featured_status' => $this->input->post('featured_status'),
                'recommended_status' => $this->input->post('recommended_status'),
                'popular_status' => $this->input->post('popular_status'),
                'upcoming_status' => $this->input->post('upcoming_status'));
            
            $this->Obj_accessories_M->update_accessories($data,$id);
            $accessories_id = $id;
            if (!empty($_FILES['userfile']['name'])) {
                $this->load->helper(array('image_helper'));   
//                if (!is_dir('accessories/' . $accessories_id)) {
//                    mkdir('accessories/' . $accessories_id, 0777, true);
//                }
                $config = array(
                    'upload_path' => 'assets/udayamotors/images/shop/accessories/',
                    'allowed_types' => "gif|jpg|png|jpeg|pdf",
                    'overwrite' => TRUE,);
                $this->load->library('upload', $config);
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                    $data1 = array('anchor_image' => $file_name);
                    $this->db->where('accessories_id', $accessories_id);
                    $this->db->update('accessories', $data1); 
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', $error);
                    redirect('accessories/add_accessories');
                }
            }
            $this->session->set_flashdata('message', 'Update Successfully');
            redirect('accessories');
        } else {
            redirect('accessories');
        }
    }

    function delete_accessories($id){
        $this->db->delete('accessories', array('accessories_id' => $id));
        $this->session->set_flashdata('message', 'Delete Sueccessfully');
        redirect('accessories');
    }
}?>